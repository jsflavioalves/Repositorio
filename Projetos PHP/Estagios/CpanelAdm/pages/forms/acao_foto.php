<?php 
require('../../../conn.php');
mysql_select_db('estagios');
//padrao
$id_user=$_POST['id_user'];
// cadastrar
$arquivo = $_FILES['pdf']['name'];

if ($_FILES['pdf']['name'] != "") {
	$pasta = './perfil/';
	move_uploaded_file($_FILES['pdf']['tmp_name'], $pasta . $_FILES['pdf']['name']);
}
if (isset($_POST['btn_perfil'])) {
	$up = mysql_query("UPDATE usuarios_agencia SET perfil='$arquivo' WHERE id_user='$id_user'");
	header('location:profile.php');
}




 ?>