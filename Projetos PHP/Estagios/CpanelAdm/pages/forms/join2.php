<?php
require('../../../conn.php');
mysql_select_db('estagios');

$consulta = mysql_query("SELECT * FROM termo_compromisso");
while($array = @mysql_fetch_array($consulta)){
	$id_termo_compromisso = $array['id_termo_compromisso'];
	$matricula = $array['matricula_aluno'];

	$busca_id = mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$matricula'");
	while($array2 = mysql_fetch_array($busca_id)) {
		$id_curso = $array2['id_curso'];
		$atualizar = mysql_query("UPDATE termo_compromisso SET id_curso='$id_curso' WHERE id_termo_compromisso LIKE '$id_termo_compromisso'");
	}
}

?>