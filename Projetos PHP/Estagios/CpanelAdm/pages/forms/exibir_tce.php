<?php
// Incluir aquivo de conexão
include("conn.php");
 
// Recebe a id enviada no método GET
$id = $_GET['cnpj'];
 
// Seleciona a noticia que tem essa ID
$sql = mysqli_query($conn,"SELECT * FROM alunos WHERE nome = '".$id."'");
 
// Pega os dados e armazena em uma variável
$noticia = mysqli_fetch_object($sql);
 
// Exibe o conteúdo da notica
echo $noticia->nome;
 
// Acentuação
header("Content-Type: text/html; charset=ISO-8859-1",true);
?>