<?php
require('../../../conn.php');
mysql_select_db('estagios'); 

$consulta = mysql_query("SELECT * FROM alunos");
while($array = @mysql_fetch_array($consulta)){
	$atualizar = mysql_query("UPDATE alunos SET id_curso=''");
}

?>