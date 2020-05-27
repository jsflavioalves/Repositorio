<?php
require('../../../conn.php');
mysql_select_db('estagios');
$id_convenios_pendentes=$_POST['id_convenios_pendentes'];
$dt_abertura=$_POST['dt_abertura'];
$processo=$_POST['processo'];
$interessado=utf8_decode($_POST['interessado']);
$saida_procuradoria=$_POST['saida_procuradoria'];
$retorno_procuradoria=$_POST['retorno_procuradoria'];
$saida_prex=$_POST['saida_prex'];
$retorno_prex=$_POST['retorno_prex'];
$pendencia=utf8_decode($_POST['pendencia']);
$data_arquivamento=utf8_decode($_POST['data_arquivamento']);
$data_email_01 = $_POST['data_email_01'];
$data_email_02 = $_POST['data_email_02'];
$observacao=utf8_decode($_POST['observacao']);
$arquivo = $_FILES['pdf']['name'];

 if($arquivo == ""){

$up = mysql_query("UPDATE convenios_pendentes SET dt_abertura='$dt_abertura', processo='$processo', interessado='$interessado', saida_procuradoria='$saida_procuradoria', retorno_procuradoria='$retorno_procuradoria', saida_prex='$saida_prex',retorno_prex='$retorno_prex',pendencia='$pendencia',data_arquivamento='$data_arquivamento', data_email1='$data_email_01', data_email2='$data_email_02' ,observacao='$observacao' WHERE id_convenios_pendentes='$id_convenios_pendentes'");
	header("location:convenios_pendentes.php");

}
if($arquivo != ""){
$up2 = mysql_query("UPDATE convenios_pendentes SET dt_abertura='$dt_abertura', processo='$processo', interessado='$interessado', saida_procuradoria='$saida_procuradoria', retorno_procuradoria='$retorno_procuradoria', saida_prex='$saida_prex',retorno_prex='$retorno_prex',pendencia='$pendencia',data_arquivamento='$data_arquivamento', data_email1='$data_email_01', data_email2='$data_email_02' ,observacao='$observacao',arquivo='$arquivo' WHERE id_convenios_pendentes='$id_convenios_pendentes'");
	if ($_FILES['pdf']['name'] != "") {
        $pasta = './convenio_pendentes/';
        move_uploaded_file($_FILES['pdf']['tmp_name'], $pasta.$_FILES['pdf']['name']);
    }   

header("location:convenios_pendentes.php");
}


?>