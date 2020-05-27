<?php
require('../../../conn.php');
mysql_select_db('estagios');
$id_vagas_estagios=utf8_decode($_POST['id_vagas_estagios']);
$CD_CENTRO=utf8_decode($_POST['CD_CENTRO']);
$descricao_n=utf8_decode($_POST['descricao_n']);
$link_n=utf8_decode($_POST['link_n']);
$arquivo = $_FILES['foto_vaga']['name'];
$arq = $_FILES['foto_vaga2']['name'];

if ($_FILES['foto_vaga']['name'] != "" AND $_FILES['foto_vaga2']['name'] == "") {
	$pasta = './vagas_foto/';
	move_uploaded_file($_FILES['foto_vaga']['tmp_name'], $pasta.$_FILES['foto_vaga']['name']);

	 $novo1 = mysql_query("UPDATE vagas_estagios SET CD_CENTRO='$CD_CENTRO', descricao='$descricao_n', link='$link_n', foto_vaga='$arquivo' WHERE id_vagas_estagios like '$id_vagas_estagios'");
	     header('location:page_result_vagas.php');
}

if ($_FILES['foto_vaga2']['name'] != "" AND $_FILES['foto_vaga']['name'] == ""){
	$pasta = './vagas_foto/';
	move_uploaded_file($_FILES['foto_vaga2']['tmp_name'], $pasta.$_FILES['foto_vaga2']['name']);

	$novo2 = mysql_query("UPDATE vagas_estagios SET CD_CENTRO='$CD_CENTRO', descricao='$descricao_n', link='$link_n', foto_vaga2='$arq' WHERE id_vagas_estagios like '$id_vagas_estagios'");
	     header('location:page_result_vagas.php');
}

if ($_FILES['foto_vaga2']['name'] != "" AND $_FILES['foto_vaga']['name'] != ""){
	$pasta = './vagas_foto/';
	move_uploaded_file($_FILES['foto_vaga']['tmp_name'], $pasta.$_FILES['foto_vaga']['name']);
	move_uploaded_file($_FILES['foto_vaga2']['tmp_name'], $pasta.$_FILES['foto_vaga2']['name']);

	$novo3 = mysql_query("UPDATE vagas_estagios SET CD_CENTRO='$CD_CENTRO', descricao='$descricao_n', link='$link_n', foto_vaga='$arquivo',foto_vaga2='$arq' WHERE id_vagas_estagios like '$id_vagas_estagios'");
	     header('location:page_result_vagas.php');
}

if ($_FILES['foto_vaga']['name'] == "" AND $_FILES['foto_vaga2']['name'] == "") {

	$novo4 = mysql_query("UPDATE vagas_estagios SET CD_CENTRO='$CD_CENTRO', descricao='$descricao_n', link='$link_n' WHERE id_vagas_estagios like '$id_vagas_estagios'");
	header('location:page_result_vagas.php');

}
?>