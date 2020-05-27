<?php
defined('EXEC') or die();
error_reporting(E_ALL);
ini_set('display_errors', 1);
set_time_limit(0);


if(!$auth->isAdmin()){
	Util::info(Config::AUTH_MESSAGE);
	return true;
}


function createValues() {	
	$args = func_get_args();
	$str = '';
	$obj = $args[0];	
	array_shift($args);	
	$backKey = implode('_', $args);
	if($backKey != '')
		$backKey .= '_';
	
	foreach($obj as $key=>$value) {
		if(is_object($value)) {
			$str .= createValues($value, $backKey.$key);			
		}
		else {			
			$str .= "'".$value."', ";
		}		
	}
	return $str;
}
function createColumns() {	
	$args = func_get_args();
	$str = '';
	$obj = $args[0];	
	array_shift($args);	
	$backKey = implode('_', $args);
	if($backKey != '')
		$backKey .= '_';
	
	foreach($obj as $key=>$value) {
		if(is_object($value)) {
			$str .= createColumns($value, $backKey.$key);			
		}
		else {			
			$str .= $backKey.$key.', ';			
		}		
	}
	return $str;
}
function connect($cpf, $url = 'https://barramento.lais.huol.ufrn.br/api/v2/profissionais/', $dataGET = array('format' => 'json'), $dataPOST = null){
	//echo 'connect...<br>';
	//necessita_atualizar=True&format=json
	$url .= $cpf.'/vinculos/?necessita_atualizar=True&format=json';
	$ch = curl_init();
	$header = array(	"Accept:application/json",
						"Content-Type:application/json; charset=utf-8",
						"Authorization: Token fd72c110b87d8fbacb45609dfc90eb447e16220b"
					);
	//print_r($header);
	//exit;
	curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	//echo $url.'<br>';
	curl_setopt($ch, CURLOPT_URL, $url);
	if($dataPOST){
		$json = json_encode($dataPOST);
		//echo $json.'<br>';
		curl_setopt($ch, CURLOPT_POST, 1);			
		curl_setopt($ch, CURLOPT_POSTFIELDS, $json); //$data -> array('postvar1' => 'value1')			
	}
	$resp = curl_exec($ch);
	$error = false;
	if($resp === false){
		$error = curl_error($ch);
	}		
	curl_close($ch);
	
	if($error){
		
		echo 'error: '.$error; exit;			
		
	}
	else{			
		$data = json_decode($resp);			
		if(@property_exists($data, 'errors'))
			return $data;
		
		return $data[0];
	}
}

//Carregando classes
//require('integracao/classes/integra.class1.php');

//Alteração ou inclusão de um registro
if(isset($_GET['db'])){

	$testOK = false;
	
	if(!@$_POST['cpfs']) {
		Util::notice('Error', 'CPFS vazio', 'error');
	}
	else {	
	
		$cpfs = $_POST['cpfs'];
		$_cpfs = explode(';', $cpfs);
		
		if(count($_cpfs) < 1) {
			Util::notice('Error', 'CPFS sem itens', 'error');
		}
		else {
			
			//Check is numeric
			$test1 = false;
			for($i=0;$i<count($_cpfs);$i++) {
				if(!is_numeric($_cpfs[$i])) {
					$test1 = true;
					break;
				}
			}
			if($test1) {
				Util::notice('Error', 'CPFS com item não numérico: '. $_cpfs[$i], 'error');
			}
			else {
				
				//Check is length 11
				$test2 = false;
				for($i=0;$i<count($_cpfs);$i++) {
					if(strlen($_cpfs[$i]) != 11) {
						$test2 = true;
						break;
					}
				}
				if($test2) {
					Util::notice('Error', 'CPFS com item sem tamanho 11: '. $_cpfs[$i], 'error');
				}
				else {
				
					$testOK = true;
					$numberCPFS = count($_cpfs);
					$numberAdicionados = 0;
					$numberNaoEncontrados = 0;
				
					for($i=0;$i<count($_cpfs);$i++) {
						
						$cpf = $_cpfs[$i];
						$sqlTest = "select * from integracao.tb_aluno_lais where profissional_cpf = '".$cpf."';";
						$queryTest = query($sqlTest);
						//echo 'queryTest: '.$queryTest->rowCount().'<br><br>';
						
						if($queryTest->rowCount() < 1) {
														
							$obj = connect($cpf);

							//print_r($obj); exit;
	
							if(@property_exists($obj, 'errors')){
								//
							}
							else{
								



								if(is_object($obj)) {
									
									if(is_object($obj->profissional)) {
									
										unset($obj->profissional->municipio_nascimento);
										unset($obj->profissional->municipio_ies_graduacao);
										unset($obj->profissional->municipio_alocado);										
										unset($obj->profissional->ies_graduacao);
										unset($obj->profissional->ciclo_formacao);
										unset($obj->profissional->perfil_municipio);
										unset($obj->profissional->uf_rms);
										
										
										
										
										
										
									}
									
								
									//echo "<pre>";
									//print_r($obj);
									//echo "</pre>";
									
									$sql = 'insert into integracao.tb_aluno_lais (';
									$sqlColumns = createColumns($obj);
									
									$sqlColumns = str_replace('profissional_municipio_moradia_unidade_federativa_regiao_geopolitica_codigo', 'profissional_municipio_moradia_unidade_frg_codigo', $sqlColumns);
									$sqlColumns = str_replace('profissional_municipio_moradia_unidade_federativa_regiao_geopolitica_nome', 'profissional_municipio_moradia_unidade_frg_nome', $sqlColumns);
									$sqlColumns = str_replace('profissional_municipio_nascimento_unidade_federativa_regiao_geopolitica_codigo', 'profissional_municipio_nascimento_unidade_frg_codigo', $sqlColumns);
									$sqlColumns = str_replace('profissional_municipio_nascimento_unidade_federativa_regiao_geopolitica_nome', 'profissional_municipio_nascimento_unidade_frg_nome', $sqlColumns);
									
									$sqlColumns = substr($sqlColumns, 0, -2);
									$sqlValues = createValues($obj);
									$sqlValues = substr($sqlValues, 0, -2);
									$sql .= $sqlColumns.') values('.$sqlValues.');';
									
									//echo $sql.'<br>';
									execute($sql);
									
									
									$numberAdicionados++;
									
								}
								else {
									$numberNaoEncontrados++;
								}
							}
							
							
						}
				
					}
					
				
				}


			
			}
			
			
				
		}
	
	}
	
}

//Alunos já cadastrados
$sqlNum = 'select count(*) as num from integracao.tb_aluno_lais';
$queryNum = query($sqlNum);
$rowNum = $queryNum->fetch();
$numAlunos = $rowNum['num'];

//Alunos com estabelecimento e equipe
$sqlNum = 'select count(*) as num from integracao.tb_aluno_lais where ocupacao_codigo is not null and estabelecimento_cnes is not null';
$queryNum = query($sqlNum);
$rowNum = $queryNum->fetch();
$numAlunosCorretos = $rowNum['num'];





?>


	<div class="row bgGrey">
		<img src="assets/integracao.png"/>
		<span class="actiontitle">Integração Alunos Plataforma LAIS</span>
		<span class="actionview"> - Cadastro</span>		
	</div>
	
	<br>
	
		<?php if(isset($_GET['db']) && $testOK){ ?>
			
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="panel panel-default">
						<div class="panel-heading" style="overflow:auto;">
							<div class="col-md-12">
								Resultado
							</div>
						</div>
			
				
						<div class="row">
							<div class="col-md-4 text-center">			
								<h4>
									CPFs<br>
									<?php echo $numberCPFS; ?>
								</h4>							
							</div>			
							<div class="col-md-4 text-center">			
								<h4>
									Adicionados<br>
									<?php echo $numberAdicionados; ?>
								</h4>							
							</div>
							<div class="col-md-4 text-center">			
								<h4>
									Não encontrados LAIS<br>
									<?php echo $numberNaoEncontrados; ?>
								</h4>							
							</div>
							
							
						</div>
			
					</div>
				</div>
			</div>
			
			
		<?php } ?>
	
		
	
		
		<form action="<?php echo Util::setLink(array('db=1')) ?>" method="post" id="formInsertEdit" onsubmit="return test();">		
			
			<div class="row"><div id="validateBox" class="col-md-8 col-md-offset-2"></div></div>
			
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					
					
					<div class="col-md-12">
						Informe os CPFs com (;):
						<textarea name="cpfs" rows="7" class="form-control" placeholder="00000000000;11111111111;22222222222;33333333333"><?php echo @$_POST['cpfs']; ?></textarea>						
					
					</div>					
					<div class="col-md-6">
						<br>
						<button id="btInsertEdit" type="submit" class="btn btn-success text-center"><span class="glyphicon glyphicon-heart"></span> Cadastrar</button>						
					</div>
					<div class="col-md-6">
						<br>
						<b><?php echo $numAlunos; ?></b> Alunos em nossa base<br>
						<font color="green">
							<b><?php echo $numAlunosCorretos; ?></b> Alunos com Estabelecimento (CNES) e Ocupação (Código CBO)
						</font>
					</div>
				</div>
			</div>
			
		</form>
			
			<br>
			
			
			
			
			
			
			
			
			<br>
			
		



<?php

/** CREATE TABLE 
function printColumns() {	
	$args = func_get_args();
	$str = '';
	$obj = $args[0];	
	array_shift($args);	
	$backKey = implode('_', $args);
	if($backKey != '')
		$backKey .= '_';
	
	foreach($obj as $key=>$value) {
		if(is_object($value)) {
			$str .= printColumns($value, $backKey.$key);			
		}
		else {			
			$str .= $backKey.$key.' varchar(250),
';
		}		
	}
	return $str;
}
echo "<pre>";
//echo '<table border="1"><tr><th>CPF</th><th>Nome</th><th>Estabelecimento</th><th>CBO</th><th>Equipe Saude</th></tr>';
for($i=0;$i<count($cpfs);$i++){
	$obj = connect($cpfs[$i]);
	
	//print_r($obj);
	
	if(property_exists($obj, 'errors')){
		echo "<tr>
			<td> {$cpfs[$i]} </td>
			<td> {$obj->errors[0]->userMessage} </td>
			<td>  </td>
			<td>  </td>
			<td>  </td>
		</tr>";
	}
	else{
		//print_r($obj);
		
		
		$sql = printColumns($obj);
		echo $sql;
		
		
		print_r($obj);
		
		//echo "<tr>
		//	<td> {$cpfs[$i]} </td>
		//	<td> {$obj->profissional->nome} </td>
		//	<td> {$obj->estabelecimento->cnes} - {$obj->estabelecimento->nome} </td>
		//	<td> {$obj->ocupacao->codigo} - {$obj->ocupacao->nome} </td>
		//	<td> {$obj->equipe->ine} - {$obj->equipe->nome} </td>
		//</tr>";
	}
}
//echo '</table>';
echo "</pre>";
*/


//Tabela
/*
CREATE TABLE integracao.tb_aluno_lais (
id varchar(250),
estabelecimento_cnes varchar(250),
estabelecimento_nome varchar(250),
estabelecimento_cnpj varchar(250),
estabelecimento_ativo varchar(250),
profissional_cpf varchar(250),
profissional_pais_moradia varchar(250),
profissional_municipio_moradia varchar(250),
profissional_municipio_nascimento varchar(250),
profissional_municipio_ies_graduacao varchar(250),
profissional_ies_graduacao varchar(250),
profissional_tipo varchar(250),
profissional_perfil varchar(250),
profissional_municipio_alocado varchar(250),
profissional_ciclo_formacao varchar(250),
profissional_perfil_municipio varchar(250),
profissional_uf_rms varchar(250),
profissional_nome varchar(250),
profissional_cns varchar(250),
profissional_cns_master varchar(250),
profissional_sexo varchar(250),
profissional_nome_mae varchar(250),
profissional_url_lattes varchar(250),
profissional_eh_especialista varchar(250),
profissional_cep_moradia varchar(250),
profissional_bairro_moradia varchar(250),
profissional_logradouro_moradia varchar(250),
profissional_numero_moradia varchar(250),
profissional_complemento_moradia varchar(250),
profissional_data_graduacao varchar(250),
profissional_data_nascimento varchar(250),
profissional_data_atualizacao varchar(250),
profissional_data_formatura varchar(250),
profissional_telefones varchar(250),
profissional_emails varchar(250),
profissional_numero_registro_geral varchar(250),
profissional_nacionalidade varchar(250),
profissional_cnpj_municipio varchar(250),
profissional_numero_rms varchar(250),
profissional_participacao_em_programa varchar(250),
ocupacao_codigo varchar(250),
ocupacao_nome varchar(250),
vinculo_empregaticio_id varchar(250),
vinculo_empregaticio_nome varchar(250),
tipo_vinculo_empregaticio_id varchar(250),
tipo_vinculo_empregaticio_nome varchar(250),
subtipo_vinculo_empregaticio_id varchar(250),
subtipo_vinculo_empregaticio_nome varchar(250),
subtipo_vinculo_empregaticio_tipo varchar(250),
equipe_ine varchar(250),
equipe_tipo_id varchar(250),
equipe_tipo_nome varchar(250),
equipe_nome varchar(250),
equipe_ativo varchar(250),
equipe_area varchar(250),
equipe_quilombola varchar(250),
equipe_assentado varchar(250),
equipe_geral varchar(250),
equipe_escola varchar(250),
equipe_pronasci varchar(250),
equipe_indigena varchar(250),
equipe_ribeirinha varchar(250),
equipe_data_ativacao varchar(250),
equipe_data_desativacao varchar(250),
equipe_estabelecimento varchar(250),
ativo varchar(250),
data_entrada varchar(250),
data_atribuicao varchar(250),
minima varchar(250),
diferenciada varchar(250),
complementar varchar(250),
ch_outros varchar(250),
ch_amb varchar(250),
ch_hosp varchar(250),
eh_sus varchar(250),
eh_residente varchar(250),
eh_perceptor varchar(250),
solicitacao_desligamento varchar(250),
dt_cadastro timestamp NOT NULL DEFAULT now(),
PRIMARY KEY(id)
);
*/
?>