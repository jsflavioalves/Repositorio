<?php
require('../../../conn.php');
mysql_select_db('estagios');

$consulta = mysql_query("SELECT * FROM alunos WHERE id_curso=0");
while($array = @mysql_fetch_array($consulta)){
	$id_aluno = $array['id_aluno'];
	$curso = $array['curso'];

	$busca_id = mysql_query("SELECT * FROM cursos3 WHERE curso LIKE '$curso'");
	while($array2 = mysql_fetch_array($busca_id)) {
		$id_curso = $array2['id_curso'];
		$atualizar = mysql_query("UPDATE alunos SET id_curso='$id_curso' WHERE id_aluno LIKE '$id_aluno'");
	}
}

?>