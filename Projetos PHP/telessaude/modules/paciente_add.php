<?php
defined('EXEC') or die();
$transacao = 'paciente';
$ufDefault = 'CE';

//Importando a classe de SQL
Loader::import('com.atitudeweb.SQL');

if(!$auth->isCreate($transacao)){
	Util::info(Config::AUTH_MESSAGE);
	return true;
}

//Alteração ou inclusão de um registro
if(isset($_GET['db'])){
	
	$cd_usuario = $user['ci_usuario'];	
	$cd_localidade = $_POST['cd_localidade'];
	$nm_paciente = addslashes($_POST['nm_paciente']);
	$nr_cpf = (@$_POST['nr_cpf'] ? "'".addslashes($_POST['nr_cpf'])."'" : 'null');
	$nr_rg = (@$_POST['nr_rg'] ? "'".$_POST['nr_rg']."'" : 'null');
	$ds_orgao_emissor = (@$_POST['ds_orgao_emissor'] ? "'".$_POST['ds_orgao_emissor']."'" : 'null');
	$dt_nascimento = (@$_POST['dt_nascimento'] ? $_POST['dt_nascimento'] : 'null');
	if(@$_POST['dt_nascimento']){
		$parts = explode('/', $dt_nascimento);
		$dt_nascimento = "'".$parts[2].'-'.$parts[1].'-'.$parts[0]."'";
	}
	$fl_sexo = $_POST['fl_sexo'];
	$nr_codigo = $_POST['nr_codigo'];
	$ds_endereco = (@$_POST['ds_endereco'] ? "'".addslashes($_POST['ds_endereco'])."'" : 'null');
	$nr_numero = (@$_POST['nr_numero'] ? "'".addslashes($_POST['nr_numero'])."'" : 'null');
	$ds_complemento = (@$_POST['ds_complemento'] ? "'".addslashes($_POST['ds_complemento'])."'" : 'null');
	$ds_bairro = (@$_POST['ds_bairro'] ? "'".addslashes($_POST['ds_bairro'])."'" : 'null');
	$nr_cep = (@$_POST['nr_cep'] ? "'".$_POST['nr_cep']."'" : 'null');
	$nr_telefone1 = (@$_POST['nr_telefone1'] ? "'".$_POST['nr_telefone1']."'" : 'null');
	$nr_telefone2 = (@$_POST['nr_telefone2'] ? "'".$_POST['nr_telefone2']."'" : 'null');
	$ds_email = (@$_POST['ds_email'] ? "'".$_POST['ds_email']."'" : 'null');
	
	//Validando para que não haja cns, cpf e emails duplicados
	$queryTestCNS = query("select ci_paciente from tb_paciente where nr_codigo = '$nr_codigo'");	
	$queryTestCPF = query("select ci_paciente from tb_paciente where nr_cpf = $nr_cpf");
	$queryTestEmail = query("select ci_paciente from tb_paciente where ds_email = $ds_email");
	
	if($queryTestCNS->rowCount() > 0){
		$rowEdit = $_POST;
		Util::alert('Já existe um paciente com este CNS: '.$nr_codigo.' !');		
	}		
	elseif($queryTestCPF->rowCount() > 0){
		$rowEdit = $_POST;
		Util::alert('Já existe um paciente com este CPF: '.$nr_cpf.' !');		
	}
	elseif($queryTestEmail->rowCount() > 0 && $ds_email != ''){
		$rowEdit = $_POST;
		Util::alert('Já existe um paciente com este Email: '.$ds_email.' !');		
	}
	else{		
		$rowId = query("select nextval('tb_paciente_ci_paciente_seq') as id;")->fetch();
		$ci_paciente = $rowId['id'];	
		$sql = "INSERT INTO tb_paciente(
				ci_paciente, cd_localidade, nm_paciente, nr_cpf, nr_rg, ds_orgao_emissor, 
				fl_sexo, nr_codigo, ds_endereco, ds_complemento, ds_bairro, nr_numero, 
				nr_cep, nr_telefone1, nr_telefone2, ds_email, dt_nascimento, cd_usuario_insert)
		VALUES ($ci_paciente, $cd_localidade, '$nm_paciente', $nr_cpf, $nr_rg, $ds_orgao_emissor, 
				'$fl_sexo', '$nr_codigo', $ds_endereco, $ds_complemento, $ds_bairro, $nr_numero, 
				$nr_cep, $nr_telefone1, $nr_telefone2, $ds_email, $dt_nascimento, $cd_usuario);";	
		if(execute($sql)){			
			echo '<script type="text/javascript"> $(function(){ parent.paciente_add('.$ci_paciente.', \''.$nm_paciente.'\', \''.$nr_codigo.'\'); }); </script>';
		}
		else{
			Util::notice('Paciente', 'Ocorreu um erro!', 'error');	
		}
	}
}
	
//Consultando os estados e os municípios do estado padrão
$sqlEstados = 'select distinct sg_estado from tb_localidade order by 1';
$queryEstados = query($sqlEstados);
$sqlMunicipios = "select ci_localidade, ds_localidade from tb_localidade where sg_estado = '$ufDefault' order by ds_localidade asc";
$queryMunicipios = query($sqlMunicipios);	

?>

	<div class="row bgGrey">
		<img src="assets/paciente.png"/>
		<span class="actiontitle">Pacientes</span>
		<span class="actionview"> - Cadastro</span>		
	</div>	
	
	<!-- FORMULÁRIO DE CADASTRO -->
	<form action="<?php echo Util::setLink(array('db=1')) ?>" method="post" id="formInsertEdit" onsubmit="return test();">		
		
		<div class="row"><div id="validateBox" class="col-md-8 col-md-offset-2"></div></div>
		
		<?php if($auth->isOn('paciente_cad_facil')){ ?>
		
			<!-- PACIENTE CADASTRO FÁCIL -->
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<fieldset class="" style="">
						<legend>DADOS GERAIS</legend>		
						<div class="row">
						<div class="col-md-12">
							Nome Completo: *
							<input type="text" id="nm_paciente" name="nm_paciente" value="<?php echo @$rowEdit['nm_paciente']; ?>" maxlength="150" class="form-control"/></td>
						</div>
						</div>
						<div class="row">
						<div class="col-md-5">
							CNS: *
							<div class="input-group">
							<input type="tel" id="nr_codigo" name="nr_codigo" value="<?php echo @$rowEdit['nr_codigo']; ?>" placeholder="Número do CNS" maxlength="15" class="form-control input-mask-numbers"/>
							<span class="input-group-addon" data-toggle="modal" data-target="#modalCNS"><a href="#"><span class="glyphicon glyphicon-question-sign"></span></a></span>
							</div>
						</div>
						<div class="col-md-4 col-md-offset-3">
							Sexo: *
							<select id="fl_sexo" name="fl_sexo" class="form-control">
									<option value="1" <?php echo (@$rowEdit['fl_sexo'] == 1 ? 'selected="selected"' : ''); ?>>Masculino</option>
									<option value="2" <?php echo (@$rowEdit['fl_sexo'] == 2 ? 'selected="selected"' : ''); ?>>Feminino</option>
							</select>
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
									if(@$rowEdit['cd_localidade'] == $row['ci_localidade'])
										echo '<option value="'.$row['ci_localidade'].'" selected="selected">'.$row['ds_localidade'].'</option>';
									else
										echo '<option value="'.$row['ci_localidade'].'">'.$row['ds_localidade'].'</option>';
								}
								?>	
							</select>
							</div>
						</div>							
						</div>
					</fieldset>
				</div>
			</div>				
		
		<?php } else{ ?>
		
			<!-- PACIENTE CADASTRO NORMAL -->
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<fieldset class="" style="">
						<legend>DADOS PESSOAIS</legend>		
						<div class="row">
						<div class="col-md-12">
							Nome Completo: *
							<input type="text" id="nm_paciente" name="nm_paciente" value="<?php echo @$rowEdit['nm_paciente']; ?>" maxlength="150" class="form-control"/></td>
						</div>
						</div>
						<div class="row">
						<div class="col-md-5">
							CNS: *
							<div class="input-group">
							<input type="tel" id="nr_codigo" name="nr_codigo" value="<?php echo @$rowEdit['nr_codigo']; ?>" placeholder="Número do CNS" maxlength="15" class="form-control input-mask-numbers"/>
							<span class="input-group-addon" data-toggle="modal" data-target="#modalCNS"><a href="#"><span class="glyphicon glyphicon-question-sign"></span></a></span>								
							</div>
						</div>
						<div class="col-md-4 col-md-offset-3">
							RG: *
							<input type="tel" id="nr_rg" name="nr_rg" value="<?php echo @$rowEdit['nr_rg']; ?>" maxlength="20" class="form-control"/>
						</div>
						</div>
						<div class="row">
						<div class="col-md-4">
							CPF: *
							<input type="tel" id="nr_cpf" name="nr_cpf" value="<?php echo @$rowEdit['nr_cpf']; ?>" class="form-control input-mask-cpf"/>
						</div>
						<div class="col-md-4 col-md-offset-4">
							Orgão Emissor: *
							<input type="tel" id="ds_orgao_emissor" name="ds_orgao_emissor" value="<?php echo @$rowEdit['ds_orgao_emissor']; ?>" maxlength="10" class="form-control"/>
						</div>
						</div>
						<div class="row">
						<div class="col-md-4">
							Data de Nascimento: *
							<div class="input-group date">
							  <input type="tel" id="dt_nascimento" name="dt_nascimento" value="<?php echo @$rowEdit['dt_nascimento']; ?>" class="form-control input-mask-date"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
							</div>
						</div>
						<div class="col-md-4 col-md-offset-4">
							Sexo: *
							<select id="fl_sexo" name="fl_sexo" class="form-control">
									<option value="1" <?php echo (@$rowEdit['fl_sexo'] == 1 ? 'selected="selected"' : ''); ?>>Masculino</option>
									<option value="2" <?php echo (@$rowEdit['fl_sexo'] == 2 ? 'selected="selected"' : ''); ?>>Feminino</option>
							</select>
						</div>
						</div>
					</fieldset>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<fieldset>
						<legend>ENDEREÇO E CONTATO</legend>		
						<div class="row">
						<div class="col-md-2">
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
						<div class="col-md-5">
							Município: *
							<div id="boxLocalidade">
							<select id="cd_localidade" name="cd_localidade" class="form-control">
								<?php
								while($row = $queryMunicipios->fetch()){
									if(@$rowEdit['cd_localidade'] == $row['ci_localidade'])
										echo '<option value="'.$row['ci_localidade'].'" selected="selected">'.$row['ds_localidade'].'</option>';
									else
										echo '<option value="'.$row['ci_localidade'].'">'.$row['ds_localidade'].'</option>';
								}
								?>	
							</select>
							</div>
						</div>
						<div class="col-md-4 col-md-offset-1">
							CEP: *
							<input type="tel" id="nr_cep" name="nr_cep" value="<?php echo @$rowEdit['nr_cep']; ?>" class="form-control input-mask-cep"/>
						</div>
						</div>
						<div class="row">
						<div class="col-md-8">
							Endereço: *
							<input type="mail" id="ds_endereco" name="ds_endereco" value="<?php echo @$rowEdit['ds_endereco']; ?>" maxlength="200" class="form-control" />
						</div>
						<div class="col-md-4">
							Nº.: *
							<input type="tel" id="nr_numero" name="nr_numero" value="<?php echo @$rowEdit['nr_numero']; ?>" maxlength="50" class="form-control"/>
						</div>
						</div>
						<div class="row">
						<div class="col-md-5">
							Bairro: *
							<input type="text" id="ds_bairro" name="ds_bairro" value="<?php echo @$rowEdit['ds_bairro']; ?>" maxlength="100" class="form-control"/>
						</div>
						<div class="col-md-4 col-md-offset-3">
							Compl.: 
							<input type="text" id="ds_complemento" name="ds_complemento" value="<?php echo @$rowEdit['ds_complemento']; ?>" maxlength="50" class="form-control"/>
						</div>
						</div>
						<div class="row">
						<div class="col-md-4">
							Telefone 1: *
							<input type="tel" id="nr_telefone1" name="nr_telefone1" value="<?php echo @$rowEdit['nr_telefone1']; ?>" class="form-control input-mask-phone"/>
						</div>
						<div class="col-md-4 col-md-offset-4">
							Telefone 2: 
							<input type="tel" id="nr_telefone2" name="nr_telefone2" value="<?php echo @$rowEdit['nr_telefone2']; ?>" class="form-control input-mask-phone"/>
						</div>
						</div>
						<div class="row">
						<div class="col-md-12">
							Email: 
							<input type="email" id="ds_email" name="ds_email" value="<?php echo @$rowEdit['ds_email']; ?>" maxlength="150" class="form-control"/>
						</div>
						</div>
					</fieldset>
				</div>
			</div>
			
		<?php } ?>
		
		<br>
		
		<div class="row">
			<div class="col-md-6 col-md-offset-3 text-center">
				<button id="btInsertEdit" type="submit" class="btn btn-success text-center">Salvar</button>
				<img class="loader" src="assets/loading.gif"/>
			</div>
		</div>				
		
	</form>		

	

<div id="modalCNS" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Cadastro Nacional do SUS</h4>
			</div>
			<br>
			<img src="assets/cns_exemplo.jpg" alt="" class="img-responsive img-rounded marginCenter">      
			<br>
		</div>
	</div>
</div>

<script type="text/javascript">
<?php if($auth->isOn('paciente_cad_facil')){ ?>
function test(){	
	var valid = true;
	$("#formInsertEdit").find("input,select").each(function(index){
		$(this).removeClass("ui-state-error");						
	});	
	valid = checkLength('nm_paciente', 'Nome Completo', 2) && valid;
	if(!checkCNS($('#nr_codigo').val())){
		$('#nr_codigo').addClass("ui-state-error");
		valid = false;	
		updateTips('Cadastro Nacional do SUS inválido.');
	}
	return valid;	
}
<?php } else{ ?>
function test(){	
	var valid = true;
	$("#formInsertEdit").find("input,select").each(function(index){
		$(this).removeClass("ui-state-error");						
	});	
	valid = checkLength('nm_paciente', 'Nome Completo', 2) && valid;
	if(!checkCNS($('#nr_codigo').val())){
		$('#nr_codigo').addClass("ui-state-error");
		valid = false;	
		updateTips('Cadastro Nacional do SUS inválido.');
	}
	if(!checkCpf($('#nr_cpf').val())){
		$('#nr_cpf').addClass("ui-state-error");
		valid = false;	
		updateTips('CPF inválido.');
	}
	valid = checkLength('nr_cpf', 'CPF', 14) && valid;
	valid = checkLength('nr_rg', 'RG', 2) && valid;
	valid = checkLength('ds_orgao_emissor', 'Órgão Emissor', 2) && valid;
	if(!checkData($('#dt_nascimento').val())){
		$('#dt_nascimento').addClass("ui-state-error");
		valid = false;	
		updateTips('Data de Nascimento inválida.');
	}
	valid = checkLength('dt_nascimento', 'Data de Nascimento', 10) && valid;
	valid = checkLength('nr_cep', 'CEP', 2) && valid;
	valid = checkLength('ds_endereco', 'Endereço', 2) && valid;
	valid = checkLength('ds_bairro', 'Bairro', 2) && valid;
	valid = checkLength('nr_telefone1', 'Telefone1', 2) && valid;	
	if($('#ds_email').val().length > 1 && !checkMail($('#ds_email').val())){
		$('#ds_email').addClass("ui-state-error");
		valid = false;	
		updateTips('Email inválido.');
	}
	return valid;	
}
<?php } ?>
function atualizaBoxLocalidade(){
	var cd_estado = $('#cd_estado').val();
	$('#boxLocalidade').load('partials/localizacao_box.php', {cd_estado: cd_estado});
}
</script>