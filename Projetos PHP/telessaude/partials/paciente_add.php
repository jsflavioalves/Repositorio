<?php
require_once('../includes/frameworkajax.php');
$encoded = json_decode(stripslashes($_POST['paciente']), true);
for($i=0;$i<count($encoded);$i++){
	$_POST[$encoded[$i]['name']] = $encoded[$i]['value'];
}

$cd_usuario = $user['ci_usuario'];	
$cd_localidade = $_POST['pacienteadd_cd_localidade'];
$nm_paciente = addslashes($_POST['pacienteadd_nm_paciente']);
$nr_cpf = (@$_POST['pacienteadd_nr_cpf'] ? "'".$_POST['pacienteadd_nr_cpf']."'" : 'null');
$nr_rg = (@$_POST['pacienteadd_nr_rg'] ? "'".$_POST['pacienteadd_nr_rg']."'" : 'null');
$ds_orgao_emissor = (@$_POST['pacienteadd_ds_orgao_emissor'] ? "'".$_POST['pacienteadd_ds_orgao_emissor']."'" : 'null');
$dt_nascimento = (@$_POST['pacienteadd_dt_nascimento'] ? $_POST['pacienteadd_dt_nascimento'] : 'null');
if(@$_POST['pacienteadd_dt_nascimento']){
	$parts = explode('/', $dt_nascimento);
	$dt_nascimento = "'".$parts[2].'-'.$parts[1].'-'.$parts[0]."'";
}
$fl_sexo = $_POST['pacienteadd_fl_sexo'];
$nr_codigo = $_POST['pacienteadd_nr_codigo'];
$ds_endereco = (@$_POST['pacienteadd_ds_endereco'] ? "'".addslashes($_POST['pacienteadd_ds_endereco'])."'" : 'null');
$nr_numero = (@$_POST['pacienteadd_nr_numero'] ? "'".addslashes($_POST['pacienteadd_nr_numero'])."'" : 'null');
$ds_complemento = (@$_POST['pacienteadd_ds_complemento'] ? "'".addslashes($_POST['pacienteadd_ds_complemento'])."'" : 'null');
$ds_bairro = (@$_POST['pacienteadd_ds_bairro'] ? "'".addslashes($_POST['pacienteadd_ds_bairro'])."'" : 'null');
$nr_cep = (@$_POST['pacienteadd_nr_cep'] ? "'".$_POST['pacienteadd_nr_cep']."'" : 'null');
$nr_telefone1 = (@$_POST['pacienteadd_nr_telefone1'] ? "'".$_POST['pacienteadd_nr_telefone1']."'" : 'null');
$nr_telefone2 = (@$_POST['pacienteadd_nr_telefone2'] ? "'".$_POST['pacienteadd_nr_telefone2']."'" : 'null');
$ds_email = (@$_POST['pacienteadd_ds_email'] ? "'".$_POST['pacienteadd_ds_email']."'" : 'null');



//Validando para que não haja cns, cpf e emails duplicados
$queryTestCNS = query("select ci_paciente from tb_paciente where nr_codigo = '$nr_codigo' and ci_paciente != 0");
$queryTestCPF = query("select ci_paciente from tb_paciente where nr_cpf = $nr_cpf and ci_paciente != 0");
$queryTestEmail = query("select ci_paciente from tb_paciente where ds_email = '$ds_email' and ci_paciente != 0");

if($queryTestCNS->rowCount() > 0){
	$rowEdit = $_POST;
	echo '{"result":"Já existe um paciente com este CNS: '.$nr_codigo.' !"}';		
	exit;
}		
elseif($queryTestCPF->rowCount() > 0){
	$rowEdit = $_POST;
	echo '{"result":"Já existe um paciente com este CPF: '.$nr_cpf.' !"}';		
	exit;
}
elseif($queryTestEmail->rowCount() > 0 && $ds_email != ''){
	$rowEdit = $_POST;
	echo '{"result":"Já existe um paciente com este Email: '.$ds_email.' !"}';		
	exit;
}
else{		
	$rowId = query("select nextval('tb_paciente_ci_paciente_seq') as id;")->fetch();
	$ci_paciente = $rowId['id'];
	$sql = "INSERT INTO tb_paciente(
					ci_paciente, cd_localidade, nm_paciente, nr_cpf, nr_rg, ds_orgao_emissor, 
					fl_sexo, nr_codigo, ds_endereco, ds_complemento, ds_bairro, nr_numero, 
					nr_cep, nr_telefone1, nr_telefone2, ds_email, dt_nascimento, cd_usuario_insert)
			VALUES ($ci_paciente, $cd_localidade, '$nm_paciente', $nr_cpf, $nr_rg, $ds_orgao_emissor, 
					'$fl_sexo', $nr_codigo, $ds_endereco, $ds_complemento, $ds_bairro, $nr_numero, 
					$nr_cep, $nr_telefone1, $nr_telefone2, $ds_email, $dt_nascimento, $cd_usuario);";
	execute($sql);
	echo '{"result":"true", "ci_paciente":"'.$ci_paciente.'", "nr_codigo":"'.$nr_codigo.'", "nm_paciente":"'.$nm_paciente.'"}';	
}
?>