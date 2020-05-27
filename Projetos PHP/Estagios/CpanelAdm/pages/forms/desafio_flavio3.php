<?php 
require('../../../conn.php');
mysql_select_db('estagios');

	$busca_alunos = mysql_query("SELECT * FROM alunos4");
	while($array = mysql_fetch_array($busca_alunos)) {
		$id_aluno = $array['id_aluno'];
		$nome_aluno = $array['nome']; 	 	
		$matricula_aluno = $array['matricula'];

		$busca_alunos2 = mysql_query("SELECT * FROM alunos3 WHERE nome LIKE '$nome_aluno' AND matricula LIKE '$matricula_aluno'");
		while($array2 = mysql_fetch_array($busca_alunos2)){
			$id_correto = $array2['id_aluno'];
			echo $id_correto;
			//$deletar = mysql_query("DELETE FROM alunos4 WHERE id_aluno != '$id_correto'");
		}
	}
?>