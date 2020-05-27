<?php
require('../../../conn.php');
mysql_select_db('estagios');
if(isset($_POST['btnalunodel'])){

$nome = utf8_decode($_POST['aluno_del']);
$mat = utf8_decode($_POST['mat_del']);

$cosul = mysql_query("SELECT * FROM alunos WHERE nome like '$nome' and matricula LIKE '$mat'");

$result = mysql_fetch_array($cosul);
$id_aluno = $result["id_aluno"];

$up = mysql_query("DELETE FROM alunos WHERE id_aluno like '$id_aluno'");

}
header("location:termo_compromisso.php");
?>