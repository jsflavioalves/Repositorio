<?php
require('../../../conn.php');
mysql_select_db('estagios');

if(isset($_POST['btn_salvar'])){


$id_termo_compromisso=utf8_decode($_POST['id_termo_compromisso']);
$concedente_n=utf8_decode($_POST['concedente_n']);
$dt_ini_n=utf8_decode($_POST['dt_ini_n']);
$dt_fim_n=utf8_decode($_POST['dt_fim_n']);
$valor_n=utf8_decode($_POST['valor_n']);
$rescisao_nn=utf8_decode($_POST['rescisao_nn']);
$hr_ini_n=utf8_decode($_POST['hr_ini_n']);
$hr_fim_n=utf8_decode($_POST['hr_fim_n']);
$variavel=utf8_decode($_POST['variavel_n']);
$cg_hrr_n=utf8_decode($_POST['cg_hrr_n']);
$tp_trm_n=utf8_decode($_POST['tp_trm_n']);
$cl_trm_n=utf8_decode($_POST['cl_trm_n']);
$agente_n=utf8_decode($_POST['agente_n']);
$prof_n=utf8_decode($_POST['prof_n']);
$siape=utf8_decode($_POST['siape']);
$status_n=utf8_decode($_POST['status_n']);

//$con2=mysql_query("SELECT * FROM termo_compromisso WHERE id_termo_compromisso LIKE '$id_termo_compromisso'");
//$obg=mysql_fetch_object($con2);


	if($rescisao_nn!= 0){
	$atualizar = mysql_query("UPDATE termo_compromisso SET 
    nome='$concedente_n', 
    dt_inicio='$dt_ini_n', 
    dt_fim='$dt_fim_n',
    valor='$valor_n',  
    rescisao='$rescisao_nn', 
    agente='$agente_n', 
    tipo_termo='$tp_trm_n', 
    carga_horaria='$cg_hrr_n', 
    hora_inicio='$hr_ini_n', 
    hora_fim='$hr_fim_n',
    variavel='$variavel', 
    classificacao_termo='$cl_trm_n', 
    prof_orientador='$prof_n',
    siape='$siape', 
    status='INATIVO'

   WHERE id_termo_compromisso like '$id_termo_compromisso'");
	}
    if($rescisao_nn==null){
    $novo = mysql_query("UPDATE termo_compromisso SET 
    nome='$concedente_n',  
    dt_inicio='$dt_ini_n', 
    dt_fim='$dt_fim_n', 
    valor='$valor_n', 
    rescisao='$rescisao_nn', 
    agente='$agente_n', 
    tipo_termo='$tp_trm_n', 
    carga_horaria='$cg_hrr_n', 
    hora_inicio='$hr_ini_n', 
    hora_fim='$hr_fim_n',
    variavel='$variavel', 
    classificacao_termo='$cl_trm_n',  
    prof_orientador='$prof_n',
    siape='$siape', 
    status='ATIVO'

   WHERE id_termo_compromisso like '$id_termo_compromisso'");
    }
    if($arquivo!=null){
    $novo = mysql_query("UPDATE termo_compromisso SET arquivo='$arquivo' WHERE id_termo_compromisso like '$id_termo_compromisso'");
    }

header("location:acoes_tcc.php");

}
?>