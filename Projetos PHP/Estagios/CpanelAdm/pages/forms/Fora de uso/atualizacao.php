<?php
require('../../../conn.php');
mysql_select_db('estagios');

$sql2 = mysql_query("SELECT * FROM AlunoCurso");
while ($dados = mysql_fetch_array($sql2)) {
	$matricula = $dados['Matricula'];
	$curso = $dados['NM_CURSO'];
	$sql = mysql_query("UPDATE alunos SET curso = '$curso' WHERE matricula = '$matricula'");
	// $result = mysql_num_rows($sql);
	// $dados2 = mysql_fetch_array($sql);
	// if ($result == 0) {
	//   echo $sql4 = "UPDATE alunos SET curso = '$curso' WHERE matricula = '$matricula'";
	//   echo "<br>";
	//   $mysql = mysql_query($sql4);
	// }
}

//$up = mysql_query("UPDATE termo_compromisso SET classificacao_termo = '$nome' WHERE classificacao_termo LIKE 'NÃƒO OBRIGATORIO'");
//echo $sql = mysql_query("SELECT SUM('Bolsa') as Bolsa FROM TermoCompromissoIten");
//echo $resultado = count($up2);

/*$query_valor = "SELECT COUNT('Bolsa') FROM TermoCompromissoIten" ;
$result_valor = mysql_query($query_valor);
echo $resultado = mysql_result($result_valor, row);
while($valorlist = mysql_fetch_array($result_valor))          
{echo $valorlist['Bolsa'];}*/

/*header("location:cursos.php");*/
?>