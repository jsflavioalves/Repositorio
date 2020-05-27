<?php
require('../../../conn.php');
mysql_select_db('estagios');
$processo_atu=$_POST['processo_atu'];
$id_convenio=$_POST['id_convenio'];
$n_processo = strtoupper($_POST['n_processo']);
$dt_inicio=$_POST['dt_inicio'];
$dt_fim = $_POST['dt_fim'];
$arquivo = $_FILES['pdf']['name'];
$tipo_convenio = strtoupper(utf8_decode($_POST['tipo_convenio']));

if ($_FILES['pdf']['name'] != "") {
        $pasta = './convenio_pdf/';
        move_uploaded_file($_FILES['pdf']['tmp_name'], $pasta.$_FILES['pdf']['name']);
    }   
if ($_FILES['pdf']['name'] != "") {
	$up = mysql_query("UPDATE termo_convenio SET NR_PROCESSO='$n_processo', dt_inicio='$dt_inicio', dt_fim='$dt_fim', tipo_convenio='$tipo_convenio', arquivo='$arquivo' WHERE NR_PROCESSO='$processo_atu'");
	header("location:cadastro_empresas_convenio.php");

} else if($_FILES['pdf']['name'] == "") {

	$up = mysql_query("UPDATE termo_convenio SET NR_PROCESSO='$n_processo', dt_inicio='$dt_inicio', dt_fim='$dt_fim', tipo_convenio='$tipo_convenio' WHERE NR_PROCESSO='$processo_atu'");
header("location:cadastro_empresas_convenio.php");
}
?>