<?php
defined('EXEC') or die();
$transacao = 'usuario';
$ufDefault = 'CE';

if(!$auth->isRead($transacao) && !$auth->isAdmin()){
	Util::info(Config::AUTH_MESSAGE);
	return true;
}

//Validando formulário de resetar senha
if(@$_POST['resetarSenha'] && @$_GET['form'] > 0){
	if(!$auth->isMaster()){
		Util::info(Config::AUTH_MESSAGE);
		return true;
	}
	
	$ci_usuario = $_GET['form'];	
	$senha = '123456';
	$sql = "UPDATE tb_usuario
			   SET nm_senha=md5('$senha'), fl_atualizousenha=false
			 WHERE ci_usuario = $ci_usuario; ";
	if(execute($sql)){
		Controller::setInfo('Usuários', 'Senha resetada com sucesso!');
		Controller::redirect(Util::setLink(array('form=null', 'db=null')));
	}	
}

//Validando formulário de gerar uma nova senha e reenviar boas vindas
if(@$_POST['gerarSenha'] && @$_GET['form'] > 0){
	if(!$auth->isOn('reenviar_senha_boas_vindas')){
		Util::info(Config::AUTH_MESSAGE);
		return true;
	}
	
	$ci_usuario = $_GET['form'];	
	$queryGeraSenha = query("select nm_login, ds_email from tb_usuario where ci_usuario = $ci_usuario")->fetch();	
	$nm_login = $queryGeraSenha['nm_login'];
	$senha = $auth->senhaAleatoria();
	$ds_email = $queryGeraSenha['ds_email'];
	$sql = "UPDATE tb_usuario
			   SET nm_senha=md5('$senha'), fl_atualizousenha=false
			 WHERE ci_usuario = $ci_usuario; ";
	if(execute($sql)){
		$auth->emailSenhaNovoUsuario($nm_login, $senha, $ds_email);
		Controller::setInfo('Usuários', 'Nova senha gerada e reenvio de email com sucesso!');
		Controller::redirect(Util::setLink(array('form=null', 'db=null')));
	}	
}

//Alteração ou inclusão de um registro
if(isset($_GET['db']) && isset($_GET['form'])){
	
	$nm_usuario = pg_escape_string($_POST['nm_usuario']);
	$nm_login = addslashes(strtoupper($_POST['nm_login']));
	$ds_email = addslashes(strtolower($_POST['ds_email']));
	$fl_sexo = $_POST['fl_sexo'];
	$grupos = @$_POST['cd_grupo_select'];
	$fl_ativo = $_POST['fl_ativo'];
	$tp_nivelacesso = $_POST['tp_nivelacesso'];
	$fl_profissional = (@$_POST['fl_profissional'] == 't' ? 'true' : 'false');
	$nr_cpf = @$_POST['nr_cpf'];
	$nr_rg = @$_POST['nr_rg'];
	$ds_orgao_emissor = @$_POST['ds_orgao_emissor'];
	$cd_profissao = @$_POST['cd_profissao'];
	$nr_registro = @$_POST['nr_registro'];
	$cd_localidade = @$_POST['cd_localidade'];
	$ds_endereco = @$_POST['ds_endereco'];
	$ds_complemento = @$_POST['ds_complemento'];
	$ds_bairro = @$_POST['ds_bairro'];
	$nr_numero = @$_POST['nr_numero'];
	$nr_cep = @$_POST['nr_cep'];
	$nr_telefone1 = @$_POST['nr_telefone1'];
	$nr_telefone2 = @$_POST['nr_telefone2'];
	$nr_telefone3 = @$_POST['nr_telefone3'];
	if(@$_POST['dt_nascimento']){
		$parts = explode('/', $_POST['dt_nascimento']);
		$dt_nascimento = "'".$parts[2].@$parts[1].@$parts[0]."'";
	}
	else{
		$dt_nascimento = 'null';	
	}
	$nr_cnes = @$_POST['nr_cnes'];	
	$codigo_cbo = @$_POST['codigo_cbo'];
	
	if(@$_POST['codigo_ine']){
		$codigo_ine = "'".@$_POST['codigo_ine']."'";
	}
	else{
		$codigo_ine = 'null';
	}
	
	$codigo_cnes = @$_POST['codigo_cnes'];
	
	
	//Gerando senha aleatória
	$senha = $auth->senhaAleatoria();
	
	//Validando para que não haja cpfs, emails ou logins duplicados
	$queryTestLogin = query("select ci_usuario from tb_usuario where nm_login = '$nm_login' and ci_usuario != ".$_GET['form']);
	$queryTestEmail = query("select ci_usuario from tb_usuario where ds_email = '$ds_email' and ci_usuario != ".$_GET['form']);
	$queryTestCPF = query("select ci_profissional from tb_profissional where nr_cpf = '$nr_cpf' and ci_profissional != ".$_GET['form']);
	if($queryTestLogin->rowCount() > 0){
		$rowEdit = $_POST;
		$rowEditPro = $_POST;
		Util::alert('Já existe um usuário com este Login: '.$nm_login.' !');		
	}
	elseif($queryTestEmail->rowCount() > 0){
		$rowEdit = $_POST;
		$rowEditPro = $_POST;
		Util::alert('Já existe um usuário com este Email: '.$ds_email.' !');		
	}
	elseif($fl_profissional == 'true' && $queryTestCPF->rowCount() > 0){
		$rowEdit = $_POST;
		$rowEditPro = $_POST;
		Util::alert('Já existe um profissional com este CPF: '.$nr_cpf.' !');		
	}
	else{
		$ci_usuario = $_GET['form'];
		if($_GET['form'] == 0){ //cadastro
			$rowId = query("select nextval('tb_usuario_ci_usuario_seq') as num")->fetch();
			$ci_usuario = $rowId['num'];
			$sql = "INSERT INTO tb_usuario(
				ci_usuario, nm_usuario, nm_login, nm_senha, ds_email, fl_sexo, fl_ativo, tp_nivelacesso, fl_profissional)
			VALUES ($ci_usuario, '$nm_usuario', '$nm_login', md5('$senha'), '$ds_email', '$fl_sexo', $fl_ativo, $tp_nivelacesso, $fl_profissional); ";

			$cpfMinisterio = str_replace('.', '', $nr_cpf);
			$cpfMinisterio = str_replace('-', '', $cpfMinisterio);
			
			if($fl_profissional == 'true'){
				$sql .= "INSERT INTO tb_profissional(
				ci_profissional, cd_profissao, cd_localidade, nr_cpf, nr_rg, ds_orgao_emissor,
				nr_registro, ds_endereco, ds_complemento, ds_bairro, nr_numero, 
				nr_cep, nr_telefone1, nr_telefone2, nr_telefone3, dt_nascimento, nr_cnes)
				VALUES ($ci_usuario, $cd_profissao, $cd_localidade, '$nr_cpf', '$nr_rg', '$ds_orgao_emissor',
						'$nr_registro', '$ds_endereco', '$ds_complemento', '$ds_bairro', '$nr_numero', 
						'$nr_cep', '$nr_telefone1', '$nr_telefone2', '$nr_telefone3', $dt_nascimento, '$nr_cnes'); ";	
				if(@$_POST['ministerio_cpf'] == 1){
					$sql .= "UPDATE integracao.tb_profissional SET codigo_cbo='$codigo_cbo', 
					equipe_codigo_ine=$codigo_ine, estabelecimento_codigo_cnes='$codigo_cnes', fl_alterado=1 where cpf='$cpfMinisterio'; ";
				}
				else{
					$sql .= "INSERT INTO integracao.tb_profissional(cpf, cns, nome, codigo_cbo, 
					equipe_codigo_ine, estabelecimento_codigo_cnes, fl_alterado)
					VALUES ('$cpfMinisterio', null, '$nm_usuario', '$codigo_cbo', $codigo_ine, '$codigo_cnes', 1); ";
				}
			}
		}	
		elseif($_GET['form'] > 0){ //alteração
			$sql = "UPDATE tb_usuario
			   SET nm_usuario='$nm_usuario', nm_login='$nm_login', 
				   ds_email='$ds_email', fl_sexo='$fl_sexo', fl_ativo=$fl_ativo, tp_nivelacesso=$tp_nivelacesso, fl_profissional=$fl_profissional
			 WHERE ci_usuario = $ci_usuario; ";	

			if($fl_profissional == 'true'){
				$queryTest = query('select ci_profissional from tb_profissional where ci_profissional = '.$ci_usuario);
				if($queryTest->rowCount() > 0){
					$sql .= "UPDATE tb_profissional
					   SET cd_profissao=$cd_profissao, cd_localidade=$cd_localidade, nr_cpf='$nr_cpf', ds_orgao_emissor='$ds_orgao_emissor',
						   nr_rg='$nr_rg', nr_registro='$nr_registro', ds_endereco='$ds_endereco', ds_complemento='$ds_complemento', ds_bairro='$ds_bairro', 
						   nr_numero='$nr_numero', nr_cep='$nr_cep', nr_telefone1='$nr_telefone1', nr_telefone2='$nr_telefone2', nr_telefone3='$nr_telefone3', 
						   dt_nascimento=$dt_nascimento, nr_cnes='$nr_cnes'
					 WHERE ci_profissional = $ci_usuario;";					 
				}
				else{
					$sql .= "INSERT INTO tb_profissional(
					ci_profissional, cd_profissao, cd_localidade, nr_cpf, nr_rg, ds_orgao_emissor,
					nr_registro, ds_endereco, ds_complemento, ds_bairro, nr_numero, 
					nr_cep, nr_telefone1, nr_telefone2, nr_telefone3, dt_nascimento, nr_cnes)
					VALUES ($ci_usuario, $cd_profissao, $cd_localidade, '$nr_cpf', '$nr_rg', '$ds_orgao_emissor',
							'$nr_registro', '$ds_endereco', '$ds_complemento', '$ds_bairro', '$nr_numero', 
							'$nr_cep', '$nr_telefone1', '$nr_telefone2', '$nr_telefone3', $dt_nascimento, '$nr_cnes');";
				}
			}
		}
		
		//echo $sql; exit;
		if(execute($sql)){
			
			//Para alterar os grupos do usuário, terá de ser administrador
			//if($_GET['form'] == 0 || $auth->isAdmin()){
				
				//Removendo todos os grupos do usuario deste módulo
				execute('delete from tb_usuario_grupo where cd_usuario = '.$ci_usuario);
				
				//Adicionando os grupos do usuario deste módulo
				$sqlGrupos = '';
				for ($i=0;$i<count($grupos);$i++){ 
					$sqlGrupos .= 'insert into tb_usuario_grupo (cd_usuario, cd_grupo) values('.$ci_usuario.', '.$grupos[$i].'); ';				
				}
				if($sqlGrupos != '')
					execute($sqlGrupos);
			//}
		
			if($_GET['form'] == 0){
				$auth->emailSenhaNovoUsuario($nm_login, $senha, $ds_email);
				Controller::setInfo('Um email foi enviado para este usuário', 'Salvo com sucesso!');
			}
			else{
				Controller::setInfo('Usuários', 'Salvo com sucesso!');
			}
			Controller::redirect(Util::setLink(array('form=null', 'db=null', 'nm_login='.$nm_login)));	
		}
		else{
			Util::notice('Usuários', 'Ocorreu um erro!', 'error');	
		}
	}		
}

if(isset($_GET['form'])){ //Formulário para adição ou alteração de registro
	if($_GET['form'] == 0){
		if(!$auth->isCreate($transacao) && !$auth->isAdmin()){
			Util::info(Config::AUTH_MESSAGE);
			return true;
		}
		$queryGruposDisponiveis = query('select ci_grupo, nm_grupo, ds_descricao from tb_grupo order by nm_grupo asc');
		$queryGruposUtilizados = null;
	}
	else{
		if(!$auth->isUpdate($transacao) && !$auth->isAdmin()){
			Util::info(Config::AUTH_MESSAGE);
			return true;
		}
		if(@!$rowEdit){
			$rowEdit = query("select * from tb_usuario where ci_usuario = ".$_GET['form'])->fetch();
		}
		else{
			foreach($rowEdit as $key=>$value){
				$rowEdit[$key] = addslashes($value);
			}
		}		
		
		$queryGruposDisponiveis = query('select ci_grupo, nm_grupo, ds_descricao from tb_grupo where ci_grupo not in(select cd_grupo from tb_usuario_grupo where cd_usuario = '.$_GET['form'].') order by nm_grupo asc');
		$queryGruposUtilizados = query('select tg.ci_grupo, tg.nm_grupo, tg.ds_descricao from tb_usuario_grupo tug inner join tb_grupo tg on(tug.cd_grupo=tg.ci_grupo) where tug.cd_usuario = '.$_GET['form']);
		
		if($rowEdit['fl_profissional'] == 't'){
			//Consultando dados do profissional
			if(@!$rowEditPro){
				$rowEditPro = query('select tp.*, to_char(tp.dt_nascimento, \'dd/mm/yyyy\') as dt_nascimento from tb_profissional tp where ci_profissional = '.$_GET['form'])->fetch();
			}
			else{
				foreach($rowEdit as $key=>$value){
					$rowEdit[$key] = addslashes($value);
				}
			}
			
			//Verificando o estado para carregar os municípios deste
			$rowUf = query('select sg_estado from tb_localidade where ci_localidade = '.$rowEditPro['cd_localidade'])->fetch();
			$ufDefault = $rowUf['sg_estado'];
		}
	}
	
	//Consultando as profissões
	$queryProfissoes = query('select * from tb_profissao order by 2');	

	//Deixando pré-selecinada a opção masculino
	if(@!$rowEdit['fl_sexo'])
		$rowEdit['fl_sexo'] = 1;

	//Consultando os estados e os municípios do estado padrão
	$sqlEstados = 'select distinct sg_estado from tb_localidade order by 1';
	$queryEstados = query($sqlEstados);
	$sqlMunicipios = "select ci_localidade, ds_localidade from tb_localidade where sg_estado = '$ufDefault' order by ds_localidade asc";
	$queryMunicipios = query($sqlMunicipios);

	
	///////////////////////////// INTEGRAÇÃO MINISTÉRIO //////////////////////
	
	//Consultando dados integração ministério
	$sqlEspecialidadeCBO = 'select * from integracao.tb_especialidade_cbo where codigo in(select distinct codigo_cbo from integracao.tb_profissional) order by nome asc';
	$queryEspecialidadeCBO = query($sqlEspecialidadeCBO);
		
	//Consultando estados ministério
	$sqlEstadosMinisterio = "select distinct uf from integracao.tb_municipio order by 1";
	$queryEstadosMinisterio = query($sqlEstadosMinisterio);
		
	//Consultando municípios para integração ministério
	$sqlMunicipiosIntegracao = "select itm.codigo, itm.nome from tb_localidade tl
	inner join integracao.tb_municipio itm on(tl.ci_localidade=itm.cd_localidade)
	where tl.sg_estado = '$ufDefault' 
	order by 2 asc";
	$queryMunicipiosIntegracao = query($sqlMunicipiosIntegracao);
	
	
}
else{ //Consulta no banco para listagem dos registros

	//Verificando a pesquisa rápida por login
	if(@$_GET['nm_login'] && !isset($_POST['search2']))
		$_POST['search2'] = $_GET['nm_login'];

	$where = '';
	$search = false;
	if(@$_POST['search1']){
		$term = addslashes($_POST['search1']);
		$where .= "and tu.nm_usuario ilike '%{$term}%' ";
		$search = true;
	}
	if(@$_POST['search2']){
		$term = addslashes($_POST['search2']);
		$where .= "and tu.nm_login ilike '%{$term}%' ";
		$search = true;
	}
	if(@$_POST['search3']){
		$term = addslashes($_POST['search3']);
		$where .= "and tu.ds_email ilike '%{$term}%' ";
		$search = true;
	}
	if(@$_POST['search4']){
		$term = addslashes($_POST['search4']);
		$where .= "and tu.fl_ativo = '{$term}' ";
		$search = true;
	}
	if(@$_POST['search5']){
		$term = addslashes($_POST['search5']);
		$where .= "and tp.nr_cpf ilike '%{$term}%' ";
		$search = true;
	}
	if(@$_POST['search6']){
		$term = addslashes($_POST['search6']);
		$where .= "and tp.nr_cnes ilike '%{$term}%' ";
		$search = true;
	}
	if(@$_POST['search7']){
		$term = addslashes($_POST['search7']);		
		$where .= "and tu.ci_usuario in(
			select distinct cd_usuario
			from tb_usuario_grupo
			where cd_grupo in(
				--Especialistas
				select distinct cd_grupo
				from tb_grupo_transacao
				where cd_transacao in(6,7)
			)		
		) ";
		$search = true;
	}
	if(@$_POST['search8']){
		$term = addslashes($_POST['search8']);		
		$where .= "and tu.ci_usuario in(
			select distinct cd_profissional
			from tb_profissional_localidade
			where cd_localidade = $term	
		) ";
		$search = true;
	}
	if(@$_POST['search9']){
		$term = addslashes($_POST['search9']);		
		$where .= "and tu.ci_usuario in(
			select distinct cd_profissional
			from tb_profissional_especialidade
			where cd_especialidade = $term	
		) ";
		$search = true;
	}
	if(@$_POST['search10']){
		$term = addslashes($_POST['search10']);		
		$where .= "and tu.tp_nivelacesso = $term ";
		$search = true;
	}		
	
	$nivelWhere = '1';
	if($auth->isAdmin())
		$nivelWhere .= ', 2';
	if($auth->isMaster())
		$nivelWhere .= ', 3';
		
	$sql = "select 	tu.ci_usuario,
		tu.nm_usuario,
		tu.nm_login,
		tu.ds_email,		
		tu.fl_ativo,
		tu.fl_profissional,
		tu.tp_nivelacesso,
		tp.nr_telefone1
	from tb_usuario tu
	left join tb_profissional tp on(tu.ci_usuario=tp.ci_profissional)
	where tu.tp_nivelacesso in($nivelWhere) $where
	order by 2
	limit {$limitPagina} offset ".(($p - 1) * $limitPagina);
	$query = query($sql);
	$sqlNum = "select count(*) as num 
	from tb_usuario tu
	left join tb_profissional tp on(tu.ci_usuario=tp.ci_profissional)
	where 1=1 $where";
	$rowNum = query($sqlNum)->fetch();
	$registros = $rowNum['num'];	
	$paginacao = Util::pagination($registros, 10);
	
	//Município trabalho
	$sql = "select 	tl.ci_localidade,
		tl.ds_localidade
	from tb_profissional_localidade tpl
	inner join tb_localidade tl on(tpl.cd_localidade=tl.ci_localidade)
	group by 1,2
	order by 2";
	$queryMun = query($sql);

	//Consultando especialidades
	$sqlEspecialidades = 'select ci_especialidade, nm_especialidade from tb_especialidade order by 2 asc';
	$queryEspecialidades = query($sqlEspecialidades);
	
	//Consultando os programas
	//$queryProgramas = query("select ci_programa, nm_programa from tb_programa where fl_ativo = true order by 2");
	//$programas = $queryProgramas->fetchAll();	
}
?>

	<div class="row bgGrey">
		<img src="assets/usuarios.png"/>
		<span class="actiontitle">Usuários</span>
		<span class="actionview"> - <?php echo (!isset($_GET['form']) ? 'Pesquisa' : (@$_GET['form'] > 0 ? 'Edição' : 'Cadastro')); ?></span>		
		<?php if(!isset($_GET['form'])){ ?>
			<button type="button" id="btAdd" class="btn btn-info btn-sm pull-right"><span class="glyphicon glyphicon-plus-sign"></span> Novo</button>   
		<?php } else{ ?>					
			<button id="btVoltar" onclick="window.location='?page=acesso/usuario';" class="btn btn-info btn-sm pull-right btn-space"><span class="glyphicon glyphicon-circle-arrow-left"></span> Voltar</button>
		<?php } ?>
		<?php if($auth->isOn('reenviar_senha_boas_vindas') && @$_GET['form'] > 0){ ?>
			<button type="button" data-toggle="modal" data-target="#modalGerarSenha" class="btn btn-info btn-sm pull-right btn-space"><span class="glyphicon glyphicon-export"></span> Gerar nova senha e reenviar boas vindas</button>
		<?php } ?>
		<?php if($auth->isMaster() && @$_GET['form'] > 0){ ?>
			<button type="button" data-toggle="modal" data-target="#modalResetSenha" class="btn btn-info btn-sm pull-right btn-space"><span class="glyphicon glyphicon-export"></span> Resetar Senha</button>
		<?php } ?>
	</div>

	<!-- FORMULÁRIO DE PESQUISA -->
	<?php if(!isset($_GET['form'])){ ?>	
		
		<?php if(@$_POST['search'] && (!@$_POST['search1'] && !@$_POST['search2'] && !@$_POST['search3'] && !@$_POST['search4'] && !@$_POST['search5'] && !@$_POST['search6'] && !@$_POST['search7'] && !@$_POST['search8'] && !@$_POST['search9'] && !@$_POST['search10'])) { ?>
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="alert alert-warning">
						<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
						<p>Preencha um dos campos abaixo para pesquisa!</p>
					</div>
				</div>
			</div>
		<?php } ?>
	
	
		<form action="<?php echo Util::setLink(array('p=null')); ?>" method="post">
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-6">
						<label>Nome Completo:</label>
						<input type="text" class="form-control" id="search1" name="search1" value="<?php echo @$_POST['search1']; ?>">
					</div>
					<div class="col-md-3">
						<label>Login:</label>
						<input type="text" class="form-control" id="search2" name="search2" value="<?php echo @$_POST['search2']; ?>">											
					</div>
					<div class="col-md-3">
						<label>CPF:</label>
						<input type="tel" id="search5" name="search5" value="<?php echo @$_POST['search5']; ?>" maxlength="14" class="form-control input-mask-cpf"/>						
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-6">					
						<label>Email:</label>
						<input type="tel" id="search3" name="search3" value="<?php echo @$rowEdit['search3']; ?>" class="form-control"/>
					</div>
					<div class="col-md-3">
						<label>Status:</label>
						<select id="search4" name="search4" class="form-control">
							<option value="0">...</option>
							<option value="true" <?php echo (@$_POST['search4'] == 'true' ? 'selected="selected"' : ''); ?> style="color:green; font-weight:bold;">ATIVADO</option>
							<option value="false" <?php echo (@$_POST['search4'] == 'false' ? 'selected="selected"' : ''); ?> style="color:red; font-weight:bold;">DESATIVADO</option>
						</select>
					</div>					
					<div class="col-md-3">
						<label>CNES:</label>
						<input type="tel" id="search6" name="search6" value="<?php echo @$_POST['search6']; ?>" maxlength="7" class="form-control input-mask-numbers"/>						
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-6">					
						<label>Município Trabalho:</label>
						<select id="search8" name="search8" class="form-control">
							<option value="">...</option>
							<?php while($row = $queryMun->fetch()){ ?>
								<option value="<?php echo $row['ci_localidade']; ?>" <?php echo (@$_POST['search8'] == $row['ci_localidade'] ? 'selected="selected"' : ''); ?>><?php echo $row['ds_localidade']; ?></option>
							<?php } ?>							
						</select>
					</div>
					<div class="col-md-3">					
						<label>Especialidade:</label>
						<select id="search9" name="search9" class="form-control">
							<option value="">...</option>
							<?php while($row = $queryEspecialidades->fetch()){ ?>
								<option value="<?php echo $row['ci_especialidade']; ?>" <?php echo (@$_POST['search9'] == $row['ci_especialidade'] ? 'selected="selected"' : ''); ?>><?php echo $row['nm_especialidade']; ?></option>
							<?php } ?>							
						</select>
					</div>
					<div class="col-md-3">
						Nível de Acesso: *
						<select id="search10" name="search10" class="form-control">
						<option value="">...</option>
						<?php
							$niveis = array();
							$niveis[1] = NivelAcesso::$niveis[1];
							if($auth->isAdmin())	
								$niveis[2] = NivelAcesso::$niveis[2];						
							if($auth->isMaster())
								$niveis[3] = NivelAcesso::$niveis[3];						
						
							foreach($niveis as $key=>$value){						
								if(@$_POST['search10'] == $key)
									echo '<option value="'.$key.'" selected="selected">'.$value.'</option>';
								else						
									echo '<option value="'.$key.'">'.$value.'</option>';
							}
						?>
						</select>							
					</div>					
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-9">
						<label for="search7">Especialista?</label><br>
						<input type="checkbox" id="search7" name="search7" value="true" <?php echo (@$_POST['search7'] == 'true' ? 'checked="checked"' : ''); ?>/>
					</div>
					<div class="col-md-3">
						<div class="col-md-12">
							<div class="marginBottom"></div>
							<button type="submit" name="search" value="1" class="btn btn-info"><span class="glyphicon glyphicon-zoom-in"></span> Pesquisar</button>
							<img class="loader" src="assets/loading.gif"/>
						</div>					
					</div>
				</div>
			</div>
		</form>
	
		<br>
		
		<?php if($search){ ?>
		
			<div class="row">
				<form id="formSearch" method="post">
					<div class="table-responsive btMarginRight">		
						<table class="table table-hover table-bordered">
							<thead>
								<tr class="btn-info">
									<td><input id="btCheckAll" type="checkbox"></td>
									<th>Usuário</th>
									<th>Login</th>
									<th>Email</th>
									<th>Telefone</th>
									<th>Município Trab.</th>
									<th>Especialidades Trab.</th>
									<th>Acesso</th>
									<th>Status</th>
									<th>Prof.</th>
									<th></th>
									<th></th>						
								</tr>
							</thead>
							<tbody>
								<?php 
								$fl_ativo['t'] = '<font color="green"><b>ATIVADO</b></font>';
								$fl_ativo['f'] = '<font color="red"><b>DESATIVADO</b></font>';
								$fl_profissional['t'] = '<font color="green"><b>SIM</b></font>';
								$fl_profissional['f'] = '<font color="red"><b>NÃO</b></font>';
								while($row = $query->fetch()){
									
									$sql1 = 'select tl.ds_localidade
									from tb_profissional_localidade tpl
									inner join tb_localidade tl on(tpl.cd_localidade=tl.ci_localidade)
									where cd_profissional = '.$row['ci_usuario'].'
									group by 1
									order by 1';
									$query1 = query($sql1);
									$municipios_trabalho = array();
									while($row1 = $query1->fetch()){ $municipios_trabalho[] = $row1['ds_localidade']; }
									
									$sql2 = 'select te.nm_especialidade
									from tb_profissional_especialidade tpe
									inner join tb_especialidade te on(tpe.cd_especialidade=te.ci_especialidade)
									where tpe.cd_profissional = '.$row['ci_usuario'].'
									group by 1
									order by 1';
									$query2 = query($sql2);
									$especialidades_trabalho = array();
									while($row2 = $query2->fetch()){ $especialidades_trabalho[] = $row2['nm_especialidade']; }
									
								?>
								<tr>
									<td><input type="checkbox" name="checkdel[]" value="<?php echo $row['ci_usuario']; ?>" class="btCheck"></td>
									<td><?php echo $row['nm_usuario']; ?></td>
									<td><?php echo $row['nm_login']; ?></td>
									<td><?php echo $row['ds_email']; ?></td>
									<td><?php echo $row['nr_telefone1']; ?></td>
									<td><?php echo implode(', <br>', $municipios_trabalho); ?></td>
									<td><?php echo implode(', <br>', $especialidades_trabalho); ?></td>
									<td><?php echo NivelAcesso::$niveis[$row['tp_nivelacesso']]; ?></td>
									<td><?php echo $fl_ativo[$row['fl_ativo']] ?></td>
									<td><?php echo $fl_profissional[$row['fl_profissional']]; ?></td>
									<td class="text-center">
										<?php if($row['fl_profissional'] == 't'){ ?>
										<a href="javascript:void(0);" onclick="openVinculos(<?php echo $row['ci_usuario']; ?>);">
											<span class="glyphicon glyphicon-paperclip"></span>
										</a>
										<?php } ?>
									</td>
									<td class="text-center">
										<a href="javascript:void(0);" onclick="window.location='<?php echo Util::setLink(array('form='.$row['ci_usuario'])); ?>';">
											<span class="glyphicon glyphicon-edit"></span>
										</a>
									</td>
								</tr>
								<?php
								}
								?>
							</tbody>
						</table>
					</div>
					<div id="modalDel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
						<div class="modal-content clearfix">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>        
							<p><br>Tem certeza que deseja excluir os registros selecionados?</p>
						  </div>
						  <div class="modal-body pull-right">      
							<button type="button" class="btn btn-small btn-default" data-dismiss="modal">Cancelar</button>
							<input type="submit" class="btn btn-primary" value="OK"/>
						  </div>
						</div>
					  </div>
					</div>	
				</form>
				<div class="row">
					<div class="col-md-1">
						<button class="btn btn-danger" data-toggle="modal" data-target="#modalDel" title="Excluir selecionados" style="float:left;"><span class="glyphicon glyphicon-remove-sign"></span> Excluir</button>
					</div>
				</div>
				<?php echo $paginacao; ?>
			</div>
			
		<?php } ?>		
		
	<?php } else{ ?>
	
		<!-- FORMULÁRIO DE CADASTRO -->
		<form action="<?php echo Util::setLink(array('db=1')) ?>" method="post" id="formInsertEdit" onsubmit="return test();">
		
			<div class="row"><div id="validateBox" class="col-md-8 col-md-offset-2"></div></div>
			
			<div class="row">
				<div class="col-md-6 col-md-offset-3">					
					<legend>DADOS GERAIS</legend>		
					<div class="row">
					<div class="col-md-12">
						Nome Completo: *
						<input type="text" id="nm_usuario" name="nm_usuario" value="<?php echo @$rowEdit['nm_usuario']; ?>" maxlength="150" class="form-control"/>
					</div>
					</div>
					<div class="row">
					<div class="col-md-12">
						Email: *
						<input type="text" id="ds_email" name="ds_email" value="<?php echo @$rowEdit['ds_email']; ?>" maxlength="100" class="form-control"/>
					</div>
					</div>
					<div class="row">
					<div class="col-md-5">
						Login: *
						<input type="text" id="nm_login" name="nm_login" value="<?php echo @$rowEdit['nm_login']; ?>" maxlength="50" class="form-control"/>							
					</div>
					<div class="col-md-4 col-md-offset-3">
						Nível de Acesso: *
						<select id="tp_nivelacesso" name="tp_nivelacesso" class="form-control">
						<?php
							$niveis = array();
							$niveis[1] = NivelAcesso::$niveis[1];
							if($auth->isAdmin())	
								$niveis[2] = NivelAcesso::$niveis[2];						
							if($auth->isMaster())
								$niveis[3] = NivelAcesso::$niveis[3];						
						
							foreach($niveis as $key=>$value){						
								if(@$rowEdit['tp_nivelacesso'] == $key)
									echo '<option value="'.$key.'" selected="selected">'.$value.'</option>';
								else						
									echo '<option value="'.$key.'">'.$value.'</option>';
							}
						?>
						</select>							
					</div>
					</div>
					<div class="row">
					<div class="col-md-5">
						Sexo: *<br>
						<label><input type="radio" name="fl_sexo" value="1" <?php echo (@$rowEdit['fl_sexo'] == 1 ? 'checked="checked"' : ''); ?>/> Masculino</label>&nbsp;
						<label><input type="radio" name="fl_sexo" value="2" <?php echo (@$rowEdit['fl_sexo'] == 2 ? 'checked="checked"' : ''); ?>/> Feminino</label>
					</div>
					<div class="col-md-4 col-md-offset-3">
						Profissional: *<br>
						<input type="checkbox" id="fl_profissional" name="fl_profissional" value="t" <?php echo (@$rowEdit['fl_profissional'] == 't' ? 'checked="checked"' : ''); ?>/>					
					</div>
					</div>
					<div class="row">
					<div class="col-md-5">
						Status: 
						<select id="fl_ativo" name="fl_ativo" class="form-control">
							<option value="true" <?php echo (@$rowEdit['fl_ativo'] == 't' ? 'selected="selected"' : ''); ?> style="color:green; font-weight:bold;">ATIVADO</option>
							<option value="false" <?php echo (@$rowEdit['fl_ativo'] == 'f' ? 'selected="selected"' : ''); ?> style="color:red; font-weight:bold;">DESATIVADO</option>									
						</select>
					</div>
					</div>					
					
					<div id="box_profissional" style="<?php echo (@$rowEdit['fl_profissional'] == 't' ? '' : 'display:none;'); ?>">							
						<br/>
						<legend>DADOS - PROFISSIONAL</legend>
						<div class="row">
						<div class="col-md-5">
							CPF: *
							<input type="tel" id="nr_cpf" name="nr_cpf" value="<?php echo @$rowEditPro['nr_cpf']; ?>" maxlength="14" class="form-control input-mask-cpf"/>
						</div>
						<div class="col-md-4 col-md-offset-3">
							CNES: 
							<input type="tel" id="nr_cnes" name="nr_cnes" value="<?php echo @$rowEditPro['nr_cnes']; ?>" maxlength="7" class="form-control input-mask-numbers"/>
						</div>
						</div>
						<div class="row">
						<div class="col-md-5">
							RG: *
							<input type="tel" id="nr_rg" name="nr_rg" value="<?php echo @$rowEditPro['nr_rg']; ?>" maxlength="20" class="form-control input-mask-numbers"/>
						</div>
						<div class="col-md-4 col-md-offset-3">
							Órgão Emissor: 
							<input type="text" id="ds_orgao_emissor" name="ds_orgao_emissor" value="<?php echo @$rowEditPro['ds_orgao_emissor']; ?>" maxlength="10" class="form-control"/>
						</div>
						</div>
						<div class="row">
						<div class="col-md-12">
							Profissão: *
							<select id="cd_profissao" name="cd_profissao" class="form-control">
								<option value="0">...</option>
								<?php
								while($row = $queryProfissoes->fetch()){
									if($row['nm_registro'])
										$row['nm_registro'] = ' - '.$row['nm_registro'];
									
									if(@$rowEditPro['cd_profissao'] == $row['ci_profissao'])
										echo '<option value="'.$row['ci_profissao'].'" selected="selected">'.$row['nm_profissao'].$row['nm_registro'].'</option>';
									else
										echo '<option value="'.$row['ci_profissao'].'">'.$row['nm_profissao'].$row['nm_registro'].'</option>';
								}
								?>
							</select>
						</div>						
						</div>						
						<div class="row">
						<div class="col-md-5">
							Nº. Registro: *
							<input type="tel" id="nr_registro" name="nr_registro" value="<?php echo @$rowEditPro['nr_registro']; ?>" maxlength="20" class="form-control"/>
						</div>
						<div class="col-md-4 col-md-offset-3">
							Data de Nascimento: 
							<div class="input-group date">
							  <input type="tel" id="dt_nascimento" name="dt_nascimento" value="<?php echo @$rowEditPro['dt_nascimento']; ?>" class="form-control input-mask-date"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
							</div>
						</div>
						</div>
						
						<br/>
						<legend>ENDEREÇO  - PROFISSIONAL</legend>
						
						<div class="row">
						<div class="col-md-5">
							CEP: *
							<input type="tel" id="nr_cep" name="nr_cep" value="<?php echo @$rowEditPro['nr_cep']; ?>" maxlength="10" class="form-control input-mask-cep"/>
						</div>
						</div>
						
						<div class="row">
						<div class="col-md-3">
							UF: *
							<select id="cd_estado" name="cd_estado" onchange="atualizaBoxLocalidade();" class="form-control">
								<?php
								while($row = $queryEstados->fetch()){
									if($ufDefault == $row['sg_estado'])
										echo '<option value="'.$row['sg_estado'].'" selected="selected">'.$row['sg_estado'].'</option>';						
									else
										echo '<option value="'.$row['sg_estado'].'">'.$row['sg_estado'].'</option>';
								}
								?>	
							</select>
						</div>
						<div class="col-md-9">
							Município: *
							<div id="boxLocalidade">
							<select id="cd_localidade" name="cd_localidade" class="form-control">
								<?php
								while($row = $queryMunicipios->fetch()){
									if(@$rowEditPro['cd_localidade'] == $row['ci_localidade'])
										echo '<option value="'.$row['ci_localidade'].'" selected="selected">'.$row['ds_localidade'].'</option>';
									else
										echo '<option value="'.$row['ci_localidade'].'">'.$row['ds_localidade'].'</option>';
								}
								?>	
							</select>
							</div>
						</div>						
						</div>
						<div class="row">
						<div class="col-md-9">
							Endereço: 
							<input type="text" id="ds_endereco" name="ds_endereco" value="<?php echo @$rowEditPro['ds_endereco']; ?>" maxlength="200" class="form-control"/>
						</div>
						<div class="col-md-3">
							Nº.: 
							<input type="tel" id="nr_numero" name="nr_numero" value="<?php echo @$rowEditPro['nr_numero']; ?>" maxlength="10" class="form-control input-mask-numbers"/>
						</div>
						</div>
						<div class="row">
						<div class="col-md-9">
							Bairro: 
							<input type="text" id="ds_bairro" name="ds_bairro" value="<?php echo @$rowEditPro['ds_bairro']; ?>" maxlength="100" class="form-control"/>
						</div>
						<div class="col-md-3">
							Complemento: 
							<input type="text" id="ds_complemento" name="ds_complemento" value="<?php echo @$rowEditPro['ds_complemento']; ?>" maxlength="50" class="form-control"/>
						</div>
						</div>
						<div class="row">
						<div class="col-md-4">
							Telefone1: *
							<input type="tel" id="nr_telefone1" name="nr_telefone1" value="<?php echo @$rowEditPro['nr_telefone1']; ?>" maxlength="16" class="form-control input-mask-phone"/>
						</div>
						<div class="col-md-4">
							Telefone2: 
							<input type="tel" id="nr_telefone2" name="nr_telefone2" value="<?php echo @$rowEditPro['nr_telefone2']; ?>" maxlength="16" class="form-control input-mask-phone"/>
						</div>
						<div class="col-md-4">
							Fax: 
							<input type="tel" id="nr_telefone3" name="nr_telefone3" value="<?php echo @$rowEditPro['nr_telefone3']; ?>" maxlength="16" class="form-control input-mask-phone"/>
						</div>
						</div>
						
						
						<?php if($_GET['form'] == 0){ ?>
						<br/>
						<legend>INTEGRAÇÃO MINISTÉRIO</legend>
						
						<div class="row">
						<div class="col-md-12">
							<input id="ministerio_cpf" name="ministerio_cpf" type="hidden" value="0"/>
							<div id="ministerio_find"></div>
						</div>
						</div>
						
						<div class="row">
						<div class="col-md-12">
							Código CBO: *
							<select id="codigo_cbo" name="codigo_cbo" class="form-control">
								<option value="0">...</option>
								<?php
								while($row = $queryEspecialidadeCBO->fetch()){
									echo '<option value="'.$row['codigo'].'">'.$row['codigo'].' - '.$row['nome'].'</option>';
								}
								?>	
							</select>
						</div>								
						</div>						
						<div class="row">
						<div class="col-md-3">
							UF: *
							<select id="codigo_municipio_uf" name="codigo_municipio_uf" onchange="atualizaBoxLocalidadeMinisterio();" class="form-control">
								<?php
								while($row = $queryEstadosMinisterio->fetch()){
									if($ufDefault == $row['uf'])
										echo '<option value="'.$row['uf'].'" selected="selected">'.$row['uf'].'</option>';						
									else
										echo '<option value="'.$row['uf'].'">'.$row['uf'].'</option>';
								}
								?>	
							</select>
						</div>
						<div class="col-md-9">
							Município:
							<div id="boxMunicipioMinisterio">
							<select id="codigo_municipio" onchange="atualizaBoxIntegracao1();" name="codigo_municipio" class="form-control">
								<option value="0">...</option>
								<?php
								while($row = $queryMunicipiosIntegracao->fetch()){
									echo '<option value="'.$row['codigo'].'">'.$row['nome'].'</option>';
								}
								?>	
							</select>
							</div>
						</div>								
						</div>						
						<div id="boxIntegracao1"><select id="codigo_cnes" name="codigo_cnes" style="display:none;"><option value="0">...</option></select></div>
						<div id="boxIntegracao2"><select id="codigo_ine" name="codigo_ine" style="display:none;"><option value="0">...</option></select></div>
						
						<?php } ?>
						
					</div>				
					
				</div>
			</div>
			
			<br/>
			
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<legend>GRUPOS</legend>					
					<div id="cd_grupo" class="row">
						<div class="col-md-6">
							Disponíveis:
							<select size="10" style="font-family:courier; padding:0px;" class="form-control">
								<?php
								if(@$queryGruposDisponiveis){
									while($row = $queryGruposDisponiveis->fetch()){
										echo '<option value="'.$row['ci_grupo'].'" title="'.$row['ds_descricao'].'">'.$row['nm_grupo'].'</option>';
									}
								}
								?>							
							</select>
						</div>
						<div class="col-md-1 text-center controls" style="margin-top:20px;"></div>
						<div class="col-md-5">
							Selecionados:
							<select id="cd_grupo_select" name="cd_grupo_select[]" size="10" style="font-family:courier; padding:0px" class="form-control">						
								<?php
								if(@$queryGruposUtilizados){
									while($row = $queryGruposUtilizados->fetch()){
										echo '<option value="'.$row['ci_grupo'].'" title="'.$row['ds_descricao'].'">'.$row['nm_grupo'].'</option>';
									}
								}
								?>
							</select>
						</div>
					</div>
				</div>
			</div>
			
			<br>
			
			<div class="row">
				<div class="col-md-6 col-md-offset-3 text-center">
					<button id="btInsertEdit" type="submit" class="btn btn-success text-center">Salvar</button>
					<img class="loader" src="assets/loading.gif"/>
				</div>
			</div>				
			
		</form>		
	
	<?php } ?>	

	
	
	<?php if($auth->isMaster() && @$_GET['form'] > 0){ ?>
	<div id="modalResetSenha" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content clearfix">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>        
			<p><br>Tem certeza que deseja <b>RESETAR</b> a senha?</p>
			<p>Este processo não poderá ser revertido, a senha nova será "123456"!</p><br>
		  </div>
		  <div class="modal-body pull-right">      
			<form method="post">
				<input type="hidden" name="resetarSenha" value="1"/>
				<input type="submit" class="btn btn-primary" value="OK"/>
				<button type="button" class="btn btn-small btn-default" data-dismiss="modal">Cancelar</button>
			</form>
		  </div>
		</div>
	  </div>
	</div>
	<?php } ?>	
	
	<?php if($auth->isOn('reenviar_senha_boas_vindas') && @$_GET['form'] > 0){ ?>
	<div id="modalGerarSenha" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content clearfix">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>        
			<p><br>Tem certeza que deseja realizar esta operação?</p>
			<p>Este processo não poderá ser revertido!</p><br>
		  </div>
		  <div class="modal-body pull-right">      
			<form method="post">
				<input type="hidden" name="gerarSenha" value="1"/>
				<input type="submit" class="btn btn-primary" value="OK"/>
				<button type="button" class="btn btn-small btn-default" data-dismiss="modal">Cancelar</button>
			</form>
		  </div>
		</div>
	  </div>
	</div>
	<?php } ?>	
	
<!-- Modal Vínculos -->
<div id="modalVinculos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog  modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>				
				<iframe id="modalVinculosFrame" width="100%" height="500" style="border:none;"></iframe>				
			</div>
		</div>
	</div>
</div>
<!-- Fim Modal Vínculos -->
	
<script type="text/javascript">
$(function(){
    $("#cd_grupo").pickList();
	$('#fl_profissional').click(function(){
		if($('#fl_profissional').is(':checked'))
			$('#box_profissional').show();
		else
			$('#box_profissional').hide();		
	});
	
	$("#nr_cpf").blur(function(){
		var cpf = $(this).val();
		cpf = cpf.replace(".", "");
		cpf = cpf.replace(".", "");
		cpf = cpf.replace("-", "");
		console.log(cpf);
		$("#ministerio_cpf").val(0);
		$("#ministerio_find").html("");
		
		$.ajax({
			url: "partials/ministerio_dados.php",
			type: "POST",
			dataType: "json",
			data: {nr_cpf:cpf},
			success: function(data){
				if(data.find == 1){
					$("#ministerio_cpf").val(1);
					$("#ministerio_find").html("<b><font color='red'>AVISO: Este profissional já existe na base de dados do ministério!</font></b><br><br>Nome: <b>"+data.nome+"</b><br><br>Código CBO: "+data.codigo_cbo+"<br>Código Equipe INE: "+data.equipe_codigo_ine+"<br>Código Estabelecimento CNES: "+data.estabelecimento_codigo_cnes+"<br><br>");
				}				
			}
		});
		
	});
	
	/*$('.cd_programa').change(function(){
		//console.log('user: ' + $(this).attr('data-id') + ', programa: ' + $(this).val());
		var cd_usuario = $(this).attr('data-id');
		var cd_programa = $(this).val();
		$.ajax({
			type: "POST",
			url: "partials/programa_edit.php",
			data: { cd_usuario: cd_usuario, cd_programa: cd_programa }
		});
	});*/
});
function test(){
	var valid = true;
	$("#formInsertEdit").find("input,select").each(function(index){
		$(this).removeClass("ui-state-error");						
	});	
	valid = checkLength('nm_usuario', 'Nome Completo', 3) && valid;
	valid = checkLength('nm_login', 'Login', 3) && valid;
	if(!checkMail($('#ds_email').val())){
		valid = false;
		$('#ds_email').addClass("ui-state-error").focus();			
		updateTips('Email inválido.');
	}
	if($('#fl_profissional').is(':checked')){
		valid = checkLength('nr_cpf', 'CPF', 14) && valid;
		if(!checkCpf($('#nr_cpf').val())){
			$('#nr_cpf').addClass("ui-state-error").focus();
			valid = false;	
			updateTips('CPF inválido.');
		}
		valid = checkLength('nr_rg', 'RG', 2) && valid;		
		if($('#cd_profissao').val() == 0){
			$('#cd_profissao').addClass("ui-state-error");
			valid = false;	
			updateTips('Selecione uma Profissão.');
		}		
		valid = checkLength('nr_registro', 'Nº Registro', 1) && valid;	
		valid = checkLength('nr_telefone1', 'Telefone1', 2) && valid;		
		
		<?php if(@$_GET['form'] == 0){ ?>
		
		if($('#codigo_cbo').val() == 0){
			$('#codigo_cbo').addClass("ui-state-error");
			valid = false;	
			updateTips('Código CBO.');
		}	
		//if($('#codigo_ine').val() == 0){
		//	$('#codigo_ine').addClass("ui-state-error");
		//	valid = false;	
		//	updateTips('Selecione um Código Equipe INE.');
		//}	
		if($('#codigo_cnes').val() == 0){
			$('#codigo_cnes').addClass("ui-state-error");
			valid = false;	
			updateTips('Selecione um Código Estabelecimento CNES.');
		}	
		
		<?php } ?>
		
	}	
	return valid;
}
function atualizaBoxLocalidade(){
	var cd_estado = $('#cd_estado').val();
	$('#boxLocalidade').load('partials/localizacao_box.php', {cd_estado: cd_estado});
}
function atualizaBoxLocalidadeMinisterio(){
	var uf = $('#codigo_municipio_uf').val();
	$('#boxMunicipioMinisterio').load('partials/localizacao_box_ministerio.php', {uf: uf});
	$('#boxIntegracao1').html('<select id="codigo_cnes" name="codigo_cnes" style="display:none;"><option value="0">...</option></select>');
	$('#boxIntegracao2').html('<select id="codigo_ine" name="codigo_ine" style="display:none;"><option value="0">...</option></select>');
}
function atualizaBoxIntegracao1(){
	var codigo_municipio = $('#codigo_municipio').val();
	$('#boxIntegracao1').load('partials/integracao_box1.php', {codigo_municipio: codigo_municipio});
	$('#boxIntegracao2').html('<select id="codigo_ine" name="codigo_ine" style="display:none;"><option value="0">...</option></select>');
}
function atualizaBoxIntegracao2(){
	var codigo_cnes = $('#codigo_cnes').val();
	$('#boxIntegracao2').load('partials/integracao_box2.php', {codigo_cnes: codigo_cnes});
}
function openVinculos(id){
	$('#modalVinculosFrame').attr('src', "partial.php?page=acesso/profissionais&id=" + id);
	$('#modalVinculos').modal('show');	
	console.log($('#modalVinculos'));	
}
window.closeVinculos = function(){
	$('#modalVinculos').modal('hide');
}
</script>