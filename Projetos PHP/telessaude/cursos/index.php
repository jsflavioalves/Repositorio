<?php

//83516328304
/**
 * Cursos Telessaúde
 * @version 1.1
 * 
 * Responsável pelo comportamento do programa
 * $status == 0		- Início cadastro
 * $status == 1		- Cadastro SUS
 * $status == 2		- Cadastro Normal
 * $status == 3		- Finalizado cadastro
 *
 * Caso a variável erro seja maior que zero irá sobrepor o comportamento do programa
 * $error == 1		- CPF inválido ou encontrado
 * $error == 2		- CPF já cadastrado no curso
 * $error == 3		- CPF inválido mas não completo na base do SUS
 * $error == 4		- Email já cadastrado no curso ou erro de finalização
 * 
*/
 
require_once('../includes/frameworkcurso.php');

function validaCPF($cpf = null) { 
    if(empty($cpf)) {
        return false;
    } 
  //  $cpf = @ereg_replace('[^0-9]', '', $cpf);
    $cpf = @preg_replace('[^0-9]', '', $cpf);
    $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);     
    if (strlen($cpf) != 11) {
        return false;
    }
    else if ($cpf == '00000000000' || 
        $cpf == '11111111111' || 
        $cpf == '22222222222' || 
        $cpf == '33333333333' || 
        $cpf == '44444444444' || 
        $cpf == '55555555555' || 
        $cpf == '66666666666' || 
        $cpf == '77777777777' || 
        $cpf == '88888888888' || 
        $cpf == '99999999999') {
        return false;
     } else {            
        for ($t = 9; $t < 11; $t++) {             
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{$c} != $d) {
                return false;
            }
        } 
        return true;
    }
}

function getLAIS(&$obj, $cpf){
	$url = 'https://barramento.lais.huol.ufrn.br/api/v2/profissionais/'.$cpf.'/vinculos/?necessita_atualizar=True&format=json';
	$ch = curl_init();
	$header = array(	"Accept:application/json",
						"Content-Type:application/json; charset=utf-8",
						"Authorization: Token fd72c110b87d8fbacb45609dfc90eb447e16220b"
					);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_URL, $url);
	$resp = curl_exec($ch);
	$error = false;
	if($resp === false){
		$error = curl_error($ch);
	}		
	curl_close($ch);
	
	if($error){
		$obj = null;
		return 0;
	}
	else{			
		$data = json_decode($resp);			
		if(@property_exists($data, 'errors') || !@$data || !@$data[0]){
			$obj = null;
			return 0;
		}
		
		$obj = $data[0];
		return 1;
	}
}


function getSUS(&$obj, $send, $phase = 0) {	
	$url = 'http://cnes.datasus.gov.br/services/profissionais?cpf=' . $send;
	if($phase == 1) {
		$url = 'http://cnes.datasus.gov.br/services/profissionais/' . $send;		
	}	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL, $url);
	$resp = curl_exec($ch);
	if($resp === false){
	    $error = curl_error($ch);
	    echo $error;
	}
	curl_close($ch);
	$temp = json_decode($resp, true);	
	if($temp != null) {
		$obj = $temp;
		return 1;
	}
	else {
		$obj = null;
		return 0;
	}
}

// Variáveis do comportamento do sistema
$status 		= 0;
$error 			= 0;
$errorMessage 	= '';
$ufDefault 		= 'CE';
$codigo 		= (@$_GET['codigo'] ? $_GET['codigo'] : 0);
$codigo = 123;
if(!$codigo) {
	echo '<div class="alert alert-error">Curso inexistente ou não ativo!</div>';
	exit;
}
if(@$_GET['cancel']) {
	session_destroy();
	Controller::redirect('index.php?codigo='.$codigo);
}
if(@$_GET['fim']) {
	Session::save('form', 0);
	session_destroy();
	$status = 3;
}

$sql = "select * from tb_curso where ds_codigo = '$codigo' and fl_ativo = true";
$query = query($sql);
if($query->rowCount() < 1) {
	echo '<div class="alert alert-error">Curso inexistente ou não ativo!</div>';
	exit;
}

$row = $query->fetch();
$id_codigo_curso = $row['ci_curso'];
$session = Session::get('form');

if(@$_POST['valida']) {

	try {
		
		$cpf = $_POST['nr_cpf'];
		$cpf = str_replace('-', '', str_replace('.', '', $cpf));	
		$obj = null;
		
		// Valida CPF inválido
		if(!validaCPF($cpf)) {
			$error = 1;
			$errorMessage = 'CPF inválido!';			
			throw new Exception();
		}
		
		// Valida CPF já cadastrado no curso
		$sqlTest1 = "select 1 from tb_aluno where nr_cpf = '{$cpf}' and id_curso = '$codigo'";
		$queryTest1 = query($sqlTest1);
		if($queryTest1->rowCount() > 0){
			$error = 2;
			$errorMessage = 'CPF já matriculado neste curso!';			
			throw new Exception();
		}
		
		// Valida cadastro SUS ou inicia um cadastro normal
		/* if(getSUS($obj, $cpf)){				
			$obj 			= $obj[0];
			$form 			= array();
			$form['type']	= 'sus';
			$form['id'] 	= $obj['id'];
			$form['cpf']	= $cpf;
			$form['nome'] 	= $obj['nome'];
			$form['cns'] 	= $obj['cns'];				
			$obj 			= null;
			if(getSUS($obj, $form['id'], 1)) {			
				echo "<pre>"; print_r($obj); echo "</pre>";
				$form['cbo'] 	= $obj['vinculos'][0]['cbo'];	
				$form['cnes'] 	= $obj['vinculos'][0]['cnes'];							
				/* Session::save('form', $form);
				Controller::redirect('index.php?codigo='.$codigo); 
			}
			else {				
				$error = 3;
				$errorMessage = 'CPF inválido, incompleto SUS!';			
				throw new Exception(); 
			}
	   	}*/
		  if(getLAIS($obj, $cpf)){				
			$form 			= array();
			$form['type']	= 'sus';
			$form['id'] 	= $obj->id;
			$form['cpf']	= $cpf;
			$form['nome'] 	= $obj->profissional->nome;
			$form['cns'] 	= $obj->profissional->cns;
			$form['cbo'] 	= $obj->ocupacao->codigo;	
			$form['cnes'] 	= $obj->estabelecimento->cnes;		
			echo "Passei CNES". $form['cnes'];
			Session::save('form', $form);
			Controller::redirect('index.php?codigo='.$codigo);			
		}
		else {
			$form 			= array();
			$form['type']	= 'normal';
			$form['cpf']	= $cpf;
			echo "nao passei";
			Session::save('form', $form);
			Controller::redirect('index.php?codigo='.$codigo);
		}		
		
	}
	catch(Exception $e){} 
	
}
elseif(@$_POST['finaliza']) {
	
	try {	
	
		$error 				= '';
		$sessionPOST 		= $_POST;	
		$nr_cpf 			= $session['cpf'];		
		if($session['type'] == 'sus') {
			$nr_tipo		= 1;
			$nm_aluno 		= $session['nome'];
			$nr_codigo_sus	= $session['id'];
			$nr_cns			= $session['cns'];
			$nr_cnes		= $session['cnes'];
			$nr_cbo			= $session['cbo'];		
		}
		else {
			$nr_tipo		= 2;
			$nm_aluno 		= $_POST['nm_aluno'];
			$nr_codigo_sus	= '';
			$nr_cns			= '';
			$nr_cnes		= '';
			$nr_cbo			= '';		
		}		
		$ds_email 		= $_POST['ds_email'];
		$fl_sexo 		= $_POST['fl_sexo'];
		$cd_localidade	= $_POST['cd_localidade'];
		$cd_profissao	= $_POST['cd_profissao'];
		$dt_nascimento	= $_POST['dt_nascimento'];
		$ds_escolaridade= $_POST['ds_escolaridade'];
		$ds_numero		= $_POST['ds_numero'];
		$ds_telefone1 	= $_POST['ds_telefone1'];
		$ds_telefone2 	= $_POST['ds_telefone2'];			
		$sqlTest1 = "select 1 from tb_aluno where ds_email = '{$ds_email}' and id_curso = '$codigo'";
		$queryTest1 = query($sqlTest1);
		if($queryTest1->rowCount() > 0) {
			$status = 2;	
			if($session['type'] == 'sus') {
				$status = 1;
			}	
			$sessionPOST = $_POST;	
			$error = 4;	
			$errorMessage = 'Email já cadastrado neste curso!';			
			throw new Exception();						
		}
		else {
			$sql = "select nextval('tb_aluno_ci_aluno_seq') as id";
			$query = query($sql);
			$rowID = $query->fetch();
			$id_aluno = $rowID['id'];
			
			$sql = "
			INSERT INTO tb_aluno(ci_aluno, id_curso, nr_tipo, nm_aluno, nr_codigo_sus, nr_cpf, nr_cns, nr_cnes, nr_cbo, ds_email, 
			fl_sexo, cd_localidade, cd_profissao, dt_nascimento, ds_escolaridade, ds_numero, ds_telefone1, ds_telefone2)
			VALUES ($id_aluno, '{$codigo}', $nr_tipo, '{$nm_aluno}', '{$nr_codigo_sus}', '{$nr_cpf}', '{$nr_cns}', '{$nr_cnes}', '{$nr_cbo}',
					'{$ds_email}', '{$fl_sexo}', {$cd_localidade}, '{$cd_profissao}', '{$dt_nascimento}', '{$ds_escolaridade}', '{$ds_numero}', '{$ds_telefone1}', '{$ds_telefone2}');	
			";
			
			//echo $sql; exit;
			if(execute($sql)){			
				$body = "<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN' 'http://www.w3.org/TR/html4/loose.dtd'>
				<html>
				<head>
					<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
					<title>Email Confirmação - Curso ".$codigo."</title>
				 </head>
				 <body topmargin='0'>
					<table width='600'  border='0' align='center' cellpadding='0' cellspacing='0' bordercolor='#E3E1BA' bgcolor='#FFFFFF'>
						<tr>
							<td><img src='http://www.nuteds.ufc.br/home/images/logo_nuteds.png' width='262' height='62'></td>
						</tr>
						<tr>
							<td><div align='justify'>
							<table width='100%'  border='0' cellpadding='10' cellspacing='0'>
						<tr>
							<td><p><font size='2' face='Verdana, Arial, Helvetica, sans-serif'>Prezado Profissional,<br>
							<br>
							Sua solicita&ccedil;&atilde;o foi finalizada com sucesso.<br><br>
							<br><br>
							Este &eacute; um email autom&aacute;tico, por favor n&atilde;o responda.
							</font></p>
							</td>
							</tr>
							</table>
							</div></td>
						</tr>
					</table>
				</body>
				</html>";			
				Util::mail(utf8_decode('Email Confirmação - Curso '.$codigo), 'nuteds@ufc.br', 'NUTEDS', $body, $ds_email);				
				Controller::redirect('index.php?codigo='.$codigo.'&fim=1');
			}
			else {
				$status = 2;	
				if($session['type'] == 'sus') {
					$status = 1;
				}	
				$sessionPOST = $_POST;	
				$error = 4;	
				$errorMessage = 'Erro ao finalizar o cadastro! Por favor tente mais tarde.';			
				throw new Exception();
			}						
		}		
	}
	catch(Exception $e){}
	
}
elseif(@$session) {
	
	// Continuação do cadastro depois da validação do CPF
	$status = 2;	
	if($session['type'] == 'sus') {
		$status 		= 1;
	}

	if(@!$_POST['nm_aluno']) {
		$sqlBase = "select ta.*, tl.* from tb_aluno ta
		inner join tb_localidade tl on(tl.ci_localidade=ta.cd_localidade)
		where nr_cpf = '".$session['cpf']."'
		order by ci_aluno desc limit 1";
		$queryBase = query($sqlBase);
		if($queryBase->rowCount() > 0) {
			$alunoBase = $queryBase->fetch();
			$sessionPOST = $alunoBase;
			$ufDefault = $alunoBase['sg_estado'];
		}
	} 
	else {
		$sessionPOST 	= $_POST;
	}
}


// Consultando os estados e os municípios do estado padrão
$sqlEstados = 'select distinct sg_estado from tb_localidade order by 1';
$queryEstados = query($sqlEstados);
$sqlMunicipios = "select ci_localidade, ds_localidade from tb_localidade where sg_estado = '$ufDefault' order by ds_localidade asc";
$queryMunicipios = query($sqlMunicipios);
$sqlProfissoes = 'select ci_profissao, nm_profissao from tb_profissao where ci_profissao != 4 order by nm_profissao asc';
$queryProfissoes = query($sqlProfissoes);


?>
<!DOCTYPE HTML>
<html>
<head>	
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $row['ds_descricao']; ?></title>	
	<script type="text/javascript" src="../assets/js/jquery-1.9.0.min.js"></script>
	<script type="text/javascript" src="../assets/js/jquery-ui-1.10.4.custom.min.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../assets/js/framework.js"></script>	
	<link type="text/css" href="../assets/css/bootstrap.min.css" rel="stylesheet" />
	<link type="text/css" href="../assets/css/theme-default/jquery-ui-1.10.3.custom.min.css" rel="stylesheet" />	
	<link type="text/css" href="../assets/css/framework.css" rel="stylesheet" />	
	<link rel="shortcut icon" href="../assets/assets/favicon.ico" type="image/x-icon" />	  
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
      <script src="../assets/js/respond.min.js"></script>
    <![endif]-->
	<style>
		.row {
			padding-bottom: 5px;
		}
	</style>
	
</head>
<body>
	<div class="container">
		
		<div class="text-center">
			<h1><?php echo $row['ds_descricao']; ?></h1>
			<p><i>Bem vindo a inscrição do curso de telessaúde / ce</i></p>
			<h4><?php echo $row['ds_codigo']; ?></h4>
		</div>
		
		
		<div class="row">
		<div class="col-md-10 col-md-offset-1">
		
		<div class="panel panel-default">
			<div class="panel-body">		

				<!-- INICIO VALIDAÇÕES-->

				<?php if($error > 0 || $error == 4){ ?>				
					<div class="alert alert-danger">
						<strong><?php echo $errorMessage; ?></strong> Não foi possível realizar a operação!						
					</div>
					<a href="index.php?codigo=<?php echo $codigo; ?>" class="btn btn-primary" type="button"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</a>
				<?php } ?>
				
				<?php if($status == 3) { ?>
					<div class="alert alert-info">
						<strong>Parabéns!</strong> Usuário cadastrado com sucesso!
					</div>
					<a href="index.php?codigo=<?php echo $codigo; ?>" class="btn btn-primary" type="button">Novo Cadastro</a>
				<?php } ?>									
			
				<?php if($status == 0 && !$error) { ?>			
					<form method="post">
						<div class="row">
							<div class="col-md-4">
								Informe o CPF para continuar:
								<input type="text" id="nr_cpf" name="nr_cpf" value="<?php echo @$rowEdit['nr_cpf']; ?>" maxlength="14" class="form-control input-mask-cpf"/>
							</div>
							<div class="col-md-2">
								<button style="margin-top:19px;" class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-exclamation-sign"></span> Validar</button>
								<input type="hidden" name="valida" value="1"/>
								<img class="loader" src="../assets/loading.gif"/>
							</div>
						</div>					
					</form>				
				<?php } ?>
				
				<!-- FIM VALIDAÇÕES-->
				
				<!-- INICIO FORMULÁRIO-->
				
				<form method="post" id="formInsertEdit" onsubmit="return test();"><br>
					
				
					<?php if($status == 1 && !$error) { ?>
					
						<!-- INICIO ALUNO SUS-->
						
						<div class="alert alert-success">
							<strong>Muito bem!</strong> CPF foi validado com sucesso!
						</div>
						
						<div class="row">
							<div class="col-md-4">
								Nome:
								<input type="text" id="nm_aluno" name="nm_aluno" value="<?php echo @$session['nome']; ?>" class="form-control" disabled/>
							</div>
							<div class="col-md-4">
								CPF:
								<input type="text" value="<?php echo @$session['cpf']; ?>" class="form-control" disabled/>
							</div>
							<div class="col-md-4">
								CNS:
								<input type="text" value="<?php echo @$session['cns']; ?>" class="form-control" disabled/>
							</div>
						</div>	
						<div class="row">
							<div class="col-md-4">
								CBO:
								<input type="text" value="<?php echo @$session['cbo']; ?>" class="form-control" disabled/>
							</div>
							<div class="col-md-4">
								CNES:
								<input type="text" value="<?php echo @$session['cnes']; ?>" class="form-control" disabled/>
							</div>
						</div>
						
						<hr>

						<!-- FIM ALUNO SUS -->						
					
					<?php } elseif($status == 2 && (!$error || $error == 4)) { ?>
					
						<!-- INICIO ALUNO NORMAL -->
						
						<div class="alert alert-success">
							<strong>Muito bem!</strong> CPF foi validado com sucesso!
						</div>
						
						<div class="row">
							<div class="col-md-8">
								Nome *:
								<input type="text" id="nm_aluno" name="nm_aluno" class="form-control" value="<?php echo @$sessionPOST['nm_aluno']; ?>" minlength="5" maxlength="150" required/>
							</div>							
							<div class="col-md-4">
								CPF:
								<input type="text" value="<?php echo @$session['cpf']; ?>" class="form-control" disabled/>
							</div>							
						</div>					
						
						<hr>	
						
						<!-- FIM ALUNO NORMAL -->
					
					<?php } ?>
					
					
					<?php if( ($status == 1 || $status == 2) && ($error == 0 || $error == 4) ) { ?>
					
						<!-- INICIO DADOS ADICIONAIS -->
						
						<?php if($error == 4){ ?>
							<div class="alert alert-danger">
								<?php echo $errorMessage; ?>
							</div>
						<?php } ?>
					
						<div class="row"><div id="validateBox" class="col-md-12"></div></div>						
						
						<div class="alert alert-info">							
						<div class="row">
							<div class="col-md-6">
								Email *:
								<input type="email" id="ds_email" name="ds_email" value="<?php echo @$sessionPOST['ds_email']; ?>" maxlength="150" class="form-control" required/>
							</div>
							<div class="col-md-6">
								Confirme seu Email *:
								<input type="email" id="ds_email2" name="ds_email2" value="<?php echo @$sessionPOST['ds_email2']; ?>" maxlength="150" class="form-control" required/>
							</div>
						</div>
						</div>
						<div class="row">
							<div class="col-md-2">
								UF: *
								<select id="cd_estado" name="cd_estado" onchange="atualizaBoxLocalidade();" class="form-control" required>
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
							<div class="col-md-6">
								Município: *
								<div id="boxLocalidade">
								<select id="cd_localidade" name="cd_localidade" class="form-control" required>
									<?php
									while($row = $queryMunicipios->fetch()){
										if(@$sessionPOST['cd_localidade'] == $row['ci_localidade'])
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
							<div class="col-md-4">
								Sexo *:
								<select id="fl_sexo" name="fl_sexo" class="form-control" required>
									<option value="">...</option>
									<option value="1" <?php echo (@$sessionPOST['fl_sexo'] == '1' ? 'selected' : ''); ?>>MASCULINO</option>
									<option value="2" <?php echo (@$sessionPOST['fl_sexo'] == '2' ? 'selected' : ''); ?>>FEMININO</option>
								</select>						
							</div>
							<div class="col-md-4">
								Data de Nascimento *:
								<div class="input-group date">
									<input type="tel" id="dt_nascimento" name="dt_nascimento" value="<?php echo @$sessionPOST['dt_nascimento']; ?>" class="form-control input-mask-date"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>								
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								Escolaridade *:
								<select id="ds_escolaridade" name="ds_escolaridade" class="form-control" required>
									<option value="">...</option>
									<option value="Ensino Médio" <?php echo (@$sessionPOST['ds_escolaridade'] == 'Ensino Médio' ? 'selected' : ''); ?>>Ensino Médio</option>
									<option value="Superior Incompleto" <?php echo (@$sessionPOST['ds_escolaridade'] == 'Superior Incompleto' ? 'selected' : ''); ?>>Superior Incompleto</option>
									<option value="Superior Completo" <?php echo (@$sessionPOST['ds_escolaridade'] == 'Superior Completo' ? 'selected' : ''); ?>>Superior Completo</option>
								</select>						
							</div>	
							<div class="col-md-4">
								Profissão *:
								<select id="cd_profissao" name="cd_profissao" class="form-control" required>
									<option value="">...</option>
									<?php
									while($row = $queryProfissoes->fetch()){
										if(@$sessionPOST['cd_profissao'] == $row['ci_profissao'])
											echo '<option value="'.$row['ci_profissao'].'" selected="selected">'.$row['nm_profissao'].'</option>';
										else
											echo '<option value="'.$row['ci_profissao'].'">'.$row['nm_profissao'].'</option>';
									}
									?>	
								</select>
							</div>
							<div class="col-md-4">
								Número Registro Profissão *:
								<input type="tel" id="ds_numero" name="ds_numero" value="<?php echo @$sessionPOST['ds_numero']; ?>" maxlength="50" class="form-control" required/>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								Telefone 1 *:
								<input type="tel" id="ds_telefone1" name="ds_telefone1" value="<?php echo @$sessionPOST['ds_telefone1']; ?>" minlength="8" maxlength="50" class="form-control input-mask-phone" required/>
							</div>
							<div class="col-md-4">
								Telefone 2:
								<input type="tel" id="ds_telefone2" name="ds_telefone2" value="<?php echo @$sessionPOST['ds_telefone2']; ?>" minlength="8" maxlength="50" class="form-control input-mask-phone"/>
							</div>
						</div>
						<hr>						
						<a href="index.php?codigo=<?php echo $codigo; ?>&cancel=1" class="btn btn-lg btn-danger pull-left"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>						
						<button class="btn btn-lg btn-success pull-right" type="submit"><span class="glyphicon glyphicon-hand-right"></span> Concluir Cadastro</button>						
						<input type="hidden" name="finaliza" value="1"/>						
						
						<!-- FIM DADOS ADICIONAIS -->
				
					<?php } ?>
				
				</form>				
				
			</div>
		</div>
		
		</div>
		</div>
		
		
	</div>
</body>

<script type="text/javascript">
function test(){	
	var valid = true;
	$("#formInsertEdit").find("input,select").each(function(index){
		$(this).removeClass("ui-state-error");						
	});		
	valid = checkLength('nm_aluno', 'Nome', 5) && valid;		
	if(!checkMail($('#ds_email').val())){
		valid = false;
		$('#ds_email').addClass("ui-state-error").focus();			
		updateTips('Email inválido.');
	}	
	if($('#ds_email').val() != $('#ds_email2').val()){
		valid = false;
		$('#ds_email').addClass("ui-state-error").focus();			
		$('#ds_email2').addClass("ui-state-error").focus();			
		updateTips('Confirme seu email corretamente.');
	}
	if($('#cd_localidade').val() == ""){
		valid = false;
		$('#cd_localidade').addClass("ui-state-error").focus();			
		updateTips('Município inválido.');
	}
	//valid = checkLength('ds_endereco', 'Endereço', 5) && valid;		
	if($('#fl_sexo').val() == ""){
		valid = false;
		$('#fl_sexo').addClass("ui-state-error").focus();			
		updateTips('Sexo inválido.');
	}
	valid = checkLength('dt_nascimento', 'Data de Nascimento', 10) && valid;		
	if($('#ds_escolaridade').val() == ""){
		valid = false;
		$('#ds_escolaridade').addClass("ui-state-error").focus();			
		updateTips('Escolaridade inválida.');
	}	
	if($('#cd_profissao').val() == ""){
		valid = false;
		$('#cd_profissao').addClass("ui-state-error").focus();			
		updateTips('Profissão inválida.');
	}
	valid = checkLength('ds_numero', 'Número Registro Profissão', 3) && valid;		
	valid = checkLength('ds_telefone1', 'Telefone 1', 8) && valid;		
	return valid;	
}	
function atualizaBoxLocalidade(){
	var cd_estado = $('#cd_estado').val();
	$('#boxLocalidade').load('../partials/localizacao_box.php', {cd_estado: cd_estado});
}
$(document).ready(function(){
   $('#ds_email,#ds_email2').bind("cut copy paste",function(e) {
      e.preventDefault();
   });
});
</script>

</html>