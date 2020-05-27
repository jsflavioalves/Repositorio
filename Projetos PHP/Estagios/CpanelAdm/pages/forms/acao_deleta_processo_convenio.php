<?php
require('../../../conn.php');
mysql_select_db('estagios');
if(isset($_POST['btna2'])){

	$NR_PROCESSO = utf8_decode($_POST['proc']);
	$arquivodeleta = mysql_query("SELECT * FROM termo_convenio WHERE NR_PROCESSO LIKE '$NR_PROCESSO'");
	$deleta = mysql_fetch_array($arquivodeleta);
	}

	$arquivo1 = $deleta['arquivo'];
	
	if($arquivo1 != ""){
	@unlink("convenio_pdf/$arquivo1");
	}

	$up = mysql_query("DELETE FROM termo_convenio WHERE NR_PROCESSO LIKE '$NR_PROCESSO'");

header("location:cadastro_empresas_convenio.php");
?>