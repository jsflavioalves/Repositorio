<?php
 // include("AcessContato.php");
 $conexao = mysqli_connect("localhost","root","","contatos","3306");
  
// $conexao = mysqli_connect("http://127.0.0.1:3307","root","fla123","contatos");
// $reccurso = $_GET("fnomcurso");
 $selecao = mysqli_query($conexao, "SELECT * FROM curso");
 while($campo = mysqli_fetch_array($selecao)){
    // echo $campo["id_curso"] & " " & $campo["nome_curso"];
    print $campo['nome_curso']."\n"; 
   }

// header("location:lista.php");
?>