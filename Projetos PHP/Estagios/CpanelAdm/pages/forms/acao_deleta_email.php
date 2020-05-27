<?php
require('../../../conn.php');
mysql_select_db('estagios');

if(isset($_POST['excluir_email'])){
	
	$id_email=$_POST['id_email'];
	
	$up = mysql_query("DELETE FROM email WHERE id_email='$id_email'");
}

header("location:email.php");
?>