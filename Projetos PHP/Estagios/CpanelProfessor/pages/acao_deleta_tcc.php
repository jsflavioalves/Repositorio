<?php

//Recebe Valores do arquivo "acoes_tcc.php" //
require('conn.php');
mysql_select_db('estagios');
if(isset($_POST['btntccdel'])){

$cd_tcc_del=$_POST['cd_tcc_del'];


$up = mysql_query("DELETE FROM termo_c_coletivo WHERE cd_tcc LIKE '$cd_tcc_del'");
$down = mysql_query("DELETE FROM termo_compromisso WHERE cd_tcc LIKE '$cd_tcc_del'");

header("location:acoes_tcc.php");
}
?>