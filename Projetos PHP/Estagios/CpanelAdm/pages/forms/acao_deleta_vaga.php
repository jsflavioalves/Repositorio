<?php
require('../../../conn.php');
mysql_select_db('estagios');

if(isset($_POST['excluir'])){
	
	$id_vagas_estagios=$_POST['id_vagas_estagios'];
	$foto_vaga=$_POST['foto_vaga'];
	$arquivo=$_POST['foto_vaga2'];
	$apagafoto = mysql_query("SELECT * FROM vagas_estagios WHERE id_vagas_estagios='$id_vagas_estagios'");
	$deleta = mysql_fetch_array($apagafoto);
	}
	
	
	$foto = $deleta['foto_vaga'];
	
	
	if($foto != ""){
	@unlink("vagas_foto/$foto");
	}

	$arq = $deleta['foto_vaga2'];

	if($arq != ""){
	@unlink("vagas_foto/$arq");
	}

	$up = mysql_query("DELETE FROM vagas_estagios WHERE id_vagas_estagios='$id_vagas_estagios'");


header("location:page_result_vagas.php");
?>