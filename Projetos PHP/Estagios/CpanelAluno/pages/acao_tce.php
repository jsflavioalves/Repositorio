<?php 
require('../../conn.php');
mysql_select_db('estagios');
//padrao
$id_termo=$_POST['id_tce'];
$id_aluno=$_POST['id_aluno'];

// cadastrar
$valor_nn=utf8_decode($_POST['valor_n']);
$nome_concedente_nn=utf8_decode($_POST['concedente_n']);
$setor_nn=$_POST['setor_n'];
$dt_ini_nn=utf8_decode($_POST['dt_ini_n']);
$dt_fim_nn=utf8_decode($_POST['dt_fim_n']);
$rescisao_nn=utf8_decode($_POST['rescisao_n']);
$hr_ini_nn=utf8_decode($_POST['hr_ini_n']);
$hr_fim_nn=utf8_decode($_POST['hr_fim_n']);
$variavel_nn=utf8_decode($_POST['variavel_n']);
$carga_hrr_nn=utf8_decode($_POST['carga_hrr_n']);
$tp_termo_nn=utf8_decode($_POST['tp_termo_n']);
$cl_termo_nn=utf8_decode($_POST['cl_termo_n']);
$relatorio_nn=utf8_decode($_POST['relatorio_n']);
$data_relatorio_1=utf8_decode($_POST['data_relatorio_1']);
$data_relatorio_2=utf8_decode($_POST['data_relatorio_2']);
$data_relatorio_3=utf8_decode($_POST['data_relatorio_3']);
$data_relatorio_4=utf8_decode($_POST['data_relatorio_4']);
$agente_nn=utf8_decode($_POST['agente_n']);
$prof_nn=utf8_decode($_POST['prof_n']);
$siape=utf8_decode($_POST['siape']);
$file_n=utf8_decode($_POST['pdf']);
$obs=utf8_decode($_POST['obs']);

$sql = mysql_query("SELECT * FROM empresas WHERE nome='$nome_concedente_nn'");
$conta = mysql_num_rows($sql);
if($conta == 0){
echo '<script> alert("VERIFIQUE NOME DA CONCEDENTE!"); </script>';
header('location:termo_compromisso.php');
} else if($conta != 0){
$emp = mysql_fetch_object($sql);
$codigo_empresa=$emp->CD_EMPRESA;
}
$curso=utf8_decode(strtoupper($_POST['curso']));
$nome=utf8_decode(strtoupper($_POST['nm']));
$matricula=utf8_decode($_POST['id_aluno']);
$cpf=utf8_decode($_POST['cpf']);
$rg=utf8_decode($_POST['rg']);
$email=$_POST['email'];
$mt_old=utf8_decode($_POST['mt_old']);
$id_aluno2=utf8_decode($_POST['cd_aluno']);

// CONSULTA PARA PEGAR O ID DO CURSO
$sql2 = mysql_query("SELECT * FROM alunos WHERE matricula='$id_aluno'");
$x = mysql_fetch_array($sql2);
$id_curso= $x['id_curso'];

$arquivo = $_FILES['pdf']['name'];

if ($_FILES['pdf']['name'] != "") {
	$pasta = './termos_pdf/';
	move_uploaded_file($_FILES['pdf']['tmp_name'], $pasta . $_FILES['pdf']['name']);
	

}
if (isset($_POST['cdt']) and $arquivo!=null) {
	// $sql = mysql_query("SELECT * FROM empresas WHERE nom LIKE '$nome_concedente_nn'");
	// $noticias = mysql_fetch_object($sql);
	//  $codigo_empresa=$noticias->CD_EMPRESA;
	//  echo $codigo_empresa;

	$inserir = mysql_query("INSERT INTO termo_compromisso VALUES ('','','$id_curso','$id_aluno','$valor_nn','$codigo_empresa','$setor_nn','$dt_ini_nn','$dt_fim_nn','$rescisao_nn','$agente_nn','$tp_termo_nn','$carga_hrr_nn','$hr_ini_nn','$hr_fim_nn','$variavel_nn','$cl_termo_nn','$relatorio_nn','$data_relatorio_1', '$data_relatorio_2', '$data_relatorio_3', '$data_relatorio_4', '$prof_nn','$siape','$arquivo','$obs','ATIVO')");
	echo '<script> alert("TERMO DE COMPROMISSO CADASTRADO COM SUCESSO!"); </script>';
	header('location:termo_compromisso.php');
}
if (isset($_POST['cdt']) and $arquivo==null) {
	// $sql = mysql_query("SELECT * FROM empresas WHERE nom LIKE '$nome_concedente_nn'");
	// $noticias = mysql_fetch_object($sql);
 // $codigo_empresa=$noticias->CD_EMPRESA;
 // echo $codigo_empresa;
	echo "ID: ";
	echo $id_curso;

	$inserir = mysql_query("INSERT INTO termo_compromisso VALUES ('','','$id_curso','$id_aluno','$valor_nn','$codigo_empresa','$setor_nn','$dt_ini_nn','$dt_fim_nn','$rescisao_nn','$agente_nn','$tp_termo_nn','$carga_hrr_nn','$hr_ini_nn','$hr_fim_nn','$variavel_nn','$cl_termo_nn','$relatorio_nn','$data_relatorio_1', '$data_relatorio_2', '$data_relatorio_3', '$data_relatorio_4', '$prof_nn','$siape','','$obs','ATIVO')");
	echo '<script> alert("TERMO DE COMPROMISSO CADASTRADO COM SUCESSO!"); </script>';
	header('location:termo_compromisso.php');
}
if (isset($_POST['atualizar'])) {
	$up1 = mysql_query("UPDATE alunos SET nome='$nome', cpf='$cpf', rg='$rg', email='$email', matricula='$matricula' , curso='$curso' WHERE id_aluno='$id_aluno2'");	
	$up2 = mysql_query("UPDATE termo_compromisso SET matricula_aluno='$matricula' WHERE matricula_aluno='$mt_old'");	
	header('location:termo_compromisso.php');
}




 ?>