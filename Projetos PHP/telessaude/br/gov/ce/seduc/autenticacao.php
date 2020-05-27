<?php
/**
 * Autenticacao - Controla a autenticação e recuperação de senha de usuários no padrão SEDUC
 * @package br.gov.ce.seduc
 * @author Thiago Segato Antunes
 * @version 1.0
 * @copyright seduc
 * @license http://opensource.org/licenses/gpl-3.0.html GPL General Public License
 */
 
//Carregando classes
Loader::import('br.gov.ce.seduc.NivelAcesso');

class Autenticacao implements IAuthenticate {

	//Módulo do controle de acesso da SEDUC
	const MODULO = 342; //BOLSAPAIC
	
	/**
	 * Devolve o login que está na sessão
	 * 
	 * @return array
	 */
	public function getLogin(){
		return Session::get('user');
	}
		
	/**
	 * Realiza a autenticação interna do sistema 
	 * 
	 * @return string
	 */
	public function authenticate(){
		
		//Ajustando variáveis do formulário
		$return = '';
		$user = strtoupper(addslashes($_POST['user']));
		$pass = addslashes($_POST['pass']);
		
		//Relaliza a verificação no banco e valida a autenticação
		$sql = "select tu.ci_usuario, 
			tu.nm_usuario, 
			tu.nm_login,
			tu.nm_senha, 
			fl_atualizousenha, 
			tut.ci_unidade_trabalho, 
			tut.nm_unidade_trabalho
		from util.tb_usuario tu 
		left join util.tb_unidade_trabalho tut on(tu.cd_unidade_trabalho = tut.ci_unidade_trabalho)
		where nm_login = '{$user}';";
		$query = @Connection::query($sql);	
		if($query->rowCount() == 1){
		
			//Verifica se a senha é valida
			$user = $query->fetch();
			if($user['nm_senha'] == md5($pass) || $user['nm_senha'] == md5(strtoupper($pass))){
				
				//Ajustando as variáveis que serão gravadas na sessão ($user, $grupos e $transacoes)
				$atualizousenha = $user['fl_atualizousenha'];
				unset($user['nm_senha']); //Excluindo a chave nm_senha para não ser gravada na sessão
				unset($user['fl_atualizousenha']); //Excluindo a chave fl_atualizousenha para não ser gravada na sessão
				$user['ismaster'] = false;
				$user['ultimo_acesso'] = '---';
				$grupos = '';						
				
				//Seleciona uma lista de todos os grupos do usuário deste módulo, ordenados de forma decrescente pelo nível de acesso 
				$queryGrupos = query('select fl_nivel_acesso, nm_grupo
				from util.tb_usuariogrupos tug
				inner join util.tb_grupo tg on tg.ci_grupo = tug.cd_grupo
				where cd_usuario = '.$user['ci_usuario'].'
				and cd_modulo = '.Autenticacao::MODULO.'
				order by 1 desc');
				
				//Se este usuário não estiver vinculado em nenhum grupo a verificação será finalizada aqui
				if($queryGrupos->rowCount() < 1){
			//		$return = Util::alert('Você não tem permissão para acessar este sistema!', false);
				}
				else{
					//Caso o usuário seja um membro MASTER, terá acesso a todas as transações do módulo.
					//Poderá ocorrer casos especiais, onde, terá de ser testado se o usuário tem vínculo 
					//em um grupo específico. Isso acontece, por exemplo, em um "encaminhamento de estagiários", 
					//que somente poderá ser efetuado se o usuário estiver vinculado a um grupo específico, chamado "orientador-aprovado". Considerando assim,
					//o grupo como uma label de transação. Torna-se necessária então que se mantenha na sessão
					//todos os grupos do usuário na sessão exceto o MASTER.
					while($row = $queryGrupos->fetch()){
						if(NivelAcesso::MASTER == $row['fl_nivel_acesso']){
							$user['ismaster'] = true;
						}
						else{
							$grupos .= $row['nm_grupo'].',';
						}
					}
					$grupos = substr($grupos, 0, -1);
					
					//Seleciona o privilégio detalhado de todas as transações deste usuário, neste módulo.
					$transacoes = array();						
					$queryTransacoes = query('select nm_label, fl_inserir, fl_alterar, fl_deletar 
					from util.vw_usuariotransacoes 
					where ci_usuario = '.$user['ci_usuario'].'
					  and ci_modulo = '.Autenticacao::MODULO);
					while($row = $queryTransacoes->fetch()){							
						if(array_key_exists($row['nm_label'], $transacoes)){
							$transacoes[$row['nm_label']] = $this->atualizaPriv($transacoes[$row['nm_label']], $row['fl_inserir'], "S", $row['fl_alterar'], $row['fl_deletar']);
						}	
						else{
							$transacoes[$row['nm_label']] = $this->priv($row['fl_inserir'], "S", $row['fl_alterar'], $row['fl_deletar']);
						}
					}
					
					//Adquirindo o último acesso do usuário
					$rowUltimoAcesso = query('select to_char(dt_inicio, \'DD/MM/YYYY HH24:MI:SS\') as dt_inicio 
					from util.tb_acesso_modulo 
					where ci_acesso_modulo = (select max(ci_acesso_modulo)
											  from util.tb_acesso_modulo 
											  where cd_usuario = '.$user['ci_usuario'].' 
											   and cd_modulo = '.Autenticacao::MODULO.')')->fetch();
					if(@$rowUltimoAcesso['dt_inicio']){
						$user['ultimo_acesso'] = $rowUltimoAcesso['dt_inicio'];
					}
					
					//Inserindo o acesso atual 
					execute('insert into util.tb_acesso_modulo(cd_usuario, cd_modulo, dt_inicio, nr_ip) values('.$user['ci_usuario'].', '.Autenticacao::MODULO.', now(), \''.$_SERVER["REMOTE_ADDR"].'\');');
					
					//Persistindo autenticação na sessão
					Session::save('user', $user);
					Session::save('grupos', $grupos);
					Session::save('transacoes', $transacoes);	

					//Redirencionando para alteração da senha caso seja o primeiro acesso
					if($atualizousenha == 'N'){
						Controller::setInfo('Altere sua senha', 'Para maior segurança!', 'info');	
						Controller::redirect('?page=acesso/alterar-senha');	
					}
					else{
						Controller::redirect('http://'.$_POST['url']);	
					}					
				}
			}
			else{
				$return = Util::alert('Usuário ou Senha incorretos!', false);		
			}
		}
		else{
			$return = Util::alert('Usuário ou Senha incorretos!', false);	
		}
		return $return;
	}
	
	//Verifica se um privilégio, número de uma somatória, tem permissão de acesso para as operações:
	//I - Incluir	- 1
	//P - Pesquisar	- 2
	//A - Alterar	- 4
	//D - Deletar	- 8
	//Exemplos:
	//temPriv(15, "D") retornará true, tem acesso para exclusão
	//temPriv(7, "D") retornará false, pois só tem acesso para criação pesquisa e alteração 
	public function temPriv($priv, $operacao){		
		if($priv >= 8){ //Deletar?
			$priv -= 8;
			if($operacao == 'D')
				return true;
		}			
		if($priv >= 4){ //Alterar?
			$priv -= 4;
			if($operacao == 'A')
				return true;
		}		
		if($priv >= 2){ //Pesquisar?
			$priv -= 2;
			if($operacao == 'P')
				return true;
		}		
		if($priv >= 1){ //Incluir?
			$priv -= 1;
			if($operacao == 'I')
				return true;
		}		
		return false;
	}
		
	//Atualiza o privilégio da transação antiga para a nova caso seja "S" para permitir.
	//Esta função foi criada porque uma transação pode pertencer a vários grupos, 
	//sendo necessário atualizar a transação já incluida em session("Transacoes")
	//Obs: utilizado em login.asp
	public function atualizaPriv($privOld, $I, $P, $A, $D){

		//se o privilégio for igual a 15 quer dizer que o usuário poderá 
		//criar, ler, alterar e excluir, não sendo necessário atualizar
		if($privOld == 15)
			return 15;
			
		//se os parâmetros c-r-u-d forem todos "S" também não será necessário
		//atualizar o privilégio, pois o usuário já poderá realizar todos
		if($I == "S" && $P == "S" && $A == "S" && $D == "S")
			return 15;
		
		//restaurando os privilégios já exsistentes na transação
		$incluir_ = "N";	//1
		$pesquisar_ = "N";	//2
		$alterar_ = "N";	//4
		$deletar_ = "N";	//8
	
		//verifica a permissão de excluir
		if($privOld >= 8){
			$privOld = $privOld - 8;
			$deletar_ = "S";
		}		
	
		//verifica a permissão de alterar
		if($privOld >= 4){
			$privOld = $privOld - 4;
			$alterar_ = "S";
		}
	
		//verifica a permissão de ler
		if($privOld >= 2){
			$privOld = $privOld - 2;
			$pesquisar_ = "S";
		}
	
		//verifica a permissão de excluir
		if($privOld >= 1){
			$privOld = $privOld - 1;
			$incluir_ = "S";
		}
	
		//atualizando os privilégios da transação antiga para a nova
		if($I == "S") $incluir_ = "S";
		if($P == "S") $pesquisar_ = "S";
		if($A == "S") $alterar_ = "S";
		if($D == "S") $deletar_ = "S";
		
		return $this->priv($incluir_, $pesquisar_, $alterar_, $deletar_);		
	}	
	
	//Retorna o número de uma somatória através da string "S" ou "N" vinda do banco, 
	//caso haja dúvida, pesquisar sobre questões somatórias
	//I - Incluir	- 1
	//P - Pesquisar	- 2
	//A - Alterar	- 4
	//D - Deletar	- 8
	//Obs: utilizado em login.asp
	public function priv($I, $P, $A, $D){
		//iniciando com nenhum privilégio para a transação
		$priv = 0;	
		if($I == "S") $priv += 1;	//incluir 	= 1	
		if($P == "S") $priv += 2;	//pesquisar = 2	
		if($A == "S") $priv += 4;	//alterar 	= 4
		if($D == "S") $priv += 8;	//deletar 	= 8	
		return $priv;
	}
	
	
	
	
	/**
	 * Realiza o logout do sistema
	 * 
	 * @return void
	 */
	public function logout(){		
		Session::close();		
	}
	
	/**
	 * Testa se um usuário é master
	 * 
	 * @return boolean
	 */
	public function isMaster(){
		$user = $this->getLogin();
		if($user['ismaster'])
			return true;
		else
			return false;	
	}

	/**
	 * Informa se o usuário corrente tem a permissão de criar
	 * 
	 * @return boolean
	 */
	public function isCreate($transaction){
		$transacoes = Session::get('transacoes');
		$result = false;
		if($this->isMaster()){
			$result = true;
		}
		else{
			if(array_key_exists($transaction, $transacoes)){
				$result = $this->temPriv($transacoes[$transaction], 'I');
			}
		}
		return $result;
	}
	
	/**
	 * Informa se o usuário corrente tem a permissão de ler
	 * 
	 * @return boolean
	 */
	public function isRead($transaction){
		$transacoes = Session::get('transacoes');
		$result = false;
		if($this->isMaster()){
			$result = true;
		}
		else{
			if(array_key_exists($transaction, $transacoes)){
				$result = $this->temPriv($transacoes[$transaction], 'P');
			}
		}
		return $result;
	}
	
	/**
	 * Informa se o usuário corrente tem a permissão de alterar
	 * 
	 * @return boolean
	 */
	public function isUpdate($transaction){
		$transacoes = Session::get('transacoes');
		$result = false;
		if($this->isMaster()){
			$result = true;
		}
		else{
			if(array_key_exists($transaction, $transacoes)){
				$result = $this->temPriv($transacoes[$transaction], 'A');
			}
		}
		return $result;
	}
	
	/**
	 * Informa se o usuário corrente tem a permissão de excluir
	 * 
	 * @return boolean
	 */
	public function isDelete($transaction){
		$transacoes = Session::get('transacoes');
		$result = false;
		if($this->isMaster()){
			$result = true;
		}
		else{
			if(array_key_exists($transaction, $transacoes)){
				$result = $this->temPriv($transacoes[$transaction], 'D');
			}
		}
		return $result;
	}
	
	/**
	 * Testa o formulário de recuperação de senha da SEDUC
	 * 
	 * @return boolean
	 */
	public function passRecovery(){		
		//Compilando variáveis do formulário
		$login = $_POST['nm_login'];
		$email = $_POST['ds_email']; 
		$cpf = preg_replace("/\D+/", "", $_POST['nm_cpf']); //Remove qualquer caracter não numérico
		
		//Adquirindo o registro do usuário através do login
		$sql = "select ci_usuario, ds_email, nm_cpf 
		from util.tb_usuario 
		where nm_login ='$login' 
		   or nm_login = upper('$login')";	
		$query = Connection::query($sql);
		$row = $query->fetch();
		$ci_usuario = $row['ci_usuario'];
		$ds_email = $row['ds_email'];
		$nm_cpf = $row['nm_cpf'];

		//Gerando senha aleatória
		$senha = $this->senhaAleatoria();
		
		//Caso a confirmação dos dados esteja correta o registro será alterado e será enviado por email
		//uma nova senha, caso contrário uma mensagem de erro será mostrada
		if($ci_usuario && strtolower($email) == strtolower($ds_email) && $cpf == $nm_cpf){		
			$update = "update util.tb_usuario set nm_senha = md5('{$senha}'), fl_atualizousenha = 'N' where ci_usuario = $ci_usuario";
			if(Connection::exec($update)){
				$this->emailSenha($login, $senha, $email);
				Util::notice('Aviso', 'Um <b>email</b> foi enviado com sua nova senha!');
				return true;
			}
			else{
				Util::notice('Aviso', 'Não foi possível realizar esta operação.', 'error');
			}			
		}
		else{
			Util::notice('Aviso', 'Usuário não encontrado!', 'alert');			
		}		
		return false;
	}

	/**
	 * Gera uma senha aleatória
	 * 
	 * @return string
	 */
	public function senhaAleatoria(){
		$senha = '';
		$lmin = 'abcdefghijklmnopqrstuvwxyz';
		$lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$num = '1234567890';
		$caracteres = $lmin.$lmai.$num;
		$len = strlen($caracteres);		
		for($i=0;$i<6;$i++){
			$rand = mt_rand(1, $len);
			$senha .= $caracteres[$rand - 1];
		}
		return $senha;
	}
	
	/**
	 * Gera email de recuperação de senha no formato do SIGE Escola
	 * 
	 * @param string $usuario
	 * @param string $senha
	 * @param string $email
	 * @return void
	 */
	public function emailSenha($usuario, $senha, $email){
		$body = "<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN' 'http://www.w3.org/TR/html4/loose.dtd'>
		<html>
		<head>
			<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
			<title>".Config::SYSTEM."</title>
		 </head>
		 <body background='http://sige.seduc.ce.gov.br/Images/fundo_02.jpg' topmargin='0'>
			<table width='500'  border='1' align='center' cellpadding='0' cellspacing='0' bordercolor='#E3E1BA' bgcolor='#FFFFFF'>
				<tr>
					<td><img src='http://sige.seduc.ce.gov.br/Images/top_email.jpg' width='500' height='70'></td>
		 	 	</tr>
		 	 	<tr>
					<td><div align='justify'>
		 	 	    <table width='100%'  border='0' cellpadding='10' cellspacing='0'>
				<tr>
		 	 	    <td><p><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>Bem vindo a SEDUC/CE!<br>
					<br>
					Para concluir o processo de cadastramento voc&ecirc; deve acessar o sistema utilizando o usu&aacute;rio e a senha abaixo:<br>
		 	 	    </font></p>
					<p><font color='#018C93' size='2' face='Verdana, Arial, Helvetica, sans-serif'>
		 	 		<strong><span class='style1'>Usu&aacute;rio= ".$usuario." <br>
		 	 	    Senha= ".$senha."</span></strong></font></p>
					<p><font size='1' face='Verdana, Arial, Helvetica, sans-serif'><strong>Observa&ccedil;&atilde;o</strong>: <br>
		 	 	    Em seu primeiro acesso, o sistema solicitar&aacute; automaticamente a troca da senha. Essa senha &eacute; de sua inteira responsabilidade, n&atilde;o devendo ser compartilhada com ningu&eacute;m. Lembre-se de que o sistema grava o nome do usu&aacute;rio que realizou qualquer opera&ccedil;&atilde;o. Caso sua senha seja compartilhada, tudo que for realizado utilizando sua senha ser&aacute; tamb&eacute;m de sua responsabilidade.<br>
					<br>
					Em caso de d&uacute;vidas, entre em contato com a SEDUC.</font></p></td>
					</tr>
					</table>
					</div></td>
				</tr>
			</table>
		</body>
		</html>";
		Util::mail('Cadastro Seduc', 'seduc@seduc.ce.gov.br', 'SEDUC', $body, $email);
	}
}