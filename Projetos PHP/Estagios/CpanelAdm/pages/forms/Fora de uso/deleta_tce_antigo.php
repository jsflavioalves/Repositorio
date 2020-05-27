<?php
require('../../../conn.php');
mysql_select_db('estagios');
$id_termo_compromisso=$_POST['id_termo_compromisso'];

$up = mysql_query("DELETE FROM termo_compromisso WHERE id_termo_compromisso='$id_termo_compromisso'");

 echo'<script type="text/javascript">alert("Atualizado com sucesso!");</script>';
 header("location:termo_compromisso.php"); 
?>