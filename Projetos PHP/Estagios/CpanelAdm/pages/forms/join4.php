<?php
require('../../../conn.php');
mysql_select_db('estagios');

$consulta = mysql_query("SELECT * FROM cursos3");
while($array = mysql_fetch_array($consulta)){
	 $curso = $array['curso'];
	
	$busca_cursos = mysql_query("SELECT * FROM cursos WHERE curso LIKE '$curso'");
	while($array2 = mysql_fetch_array($busca_cursos)) {
		$id_curso = $array2['id_curso'];
		$atualizar = mysql_query("UPDATE cursos3 SET id_curso='$id_curso' WHERE curso = '$curso'");
		
	}
}

?>