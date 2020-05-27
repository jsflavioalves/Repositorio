<?php
// Incluir aquivo de conexão
include("conn.php");
mysql_select_db('estagios');
 
// Recebe o valor enviado
$valor = $_GET['valor'];
 
// Procura titulos no banco relacionados ao valor
$sql1 = mysql_query("SELECT * FROM declaracao WHERE codigo LIKE '$valor'");
$resulatdo = mysql_num_rows($sql1);
$sql2 = mysql_query("SELECT * FROM declaracao_prof WHERE codigo LIKE '$valor'");
$resulatdo2 = mysql_num_rows($sql2);


 
// Exibe todos os valores encontrados
if($resulatdo != 0){
  $noticias = @mysql_fetch_array($sql1);      
  $id_aluno = $noticias['id_aluno'];
  $data = strtoupper($noticias['data']);
  $sql4 = mysql_query("SELECT * FROM alunos WHERE id_aluno LIKE '$id_aluno'");
  $noticias4 = @mysql_fetch_array($sql4);
  $nome = $noticias4['nome'];

  echo utf8_decode('<br><div class="alert alert-success" style="font-weight: bold;">A DECLARAÇÃO DO ALUNO '.@$nome.' FEITA NO DIA '.@$data.' É VALIDA.</div>');
}
if($resulatdo2 != 0){
  $noticias2 = @mysql_fetch_array($sql2);      
  $siape = $noticias2['siape'];
  $data2 = strtoupper($noticias2['data']);
  $sql3 = mysql_query("SELECT * FROM professor_orientador WHERE siape LIKE '$siape'");
  $noticias3 = @mysql_fetch_array($sql3);
  $nome2 = $noticias3['nome'];

  echo utf8_decode('<br><div class="alert alert-success" style="font-weight: bold;">A DECLARAÇÃO FEITA NO DIA '.@$data2.' PELO PROFESSOR '.@$nome2.' É VALIDA.</div>');
}
if ($resulatdo == 0 and $resulatdo2 == 0) {
    echo utf8_decode('<br><div class="alert alert-danger" style="cursor:pointer;"><Strong>AVISO! CÓDIGO INVÁLIDO! </Strong><br>CERTIFIQUE-SE QUE INSERIU CORRETAMENTE O CÓDIGO.</div>');
  } 
// Acentuação
@header("Content-Type: text/html; charset=ISO-8859-1",true);
?>