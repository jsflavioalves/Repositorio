<?php
// Incluir aquivo de conexão
include("../../../conn.php");
 mysql_select_db('estagios');
// Recebe o valor enviado
$valor = $_GET['valor'];
 
// Procura titulos no banco relacionados ao valor
$sql = mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$valor'");

$resulatdo = mysql_num_rows($sql);
session_start();
$_SESSION['matricula'];
$_SESSION['matricula'] = $valor;
// Exibe todos os valores encontrados
if($resulatdo == 0){
  echo utf8_decode('<br><form action="page_inserir_aluno.php" method="POST" target="_blank">
                      <div class="alert alert-warning"><label> A Matricula </label> <label style="color:black;"> '. $_SESSION['matricula'] . '</label> <label> no Campo em Edição Não Existe. Deseja Cadastrar o(a) Aluno(a)?</label><button type="submit" style="float:right;font-size: 12px;"  class="btn btn-danger" name="Cadastrar">Cadastrar</button></div>');
}

// Acentuação
@header("Content-Type: text/html; charset=ISO-8859-1",true);
?>