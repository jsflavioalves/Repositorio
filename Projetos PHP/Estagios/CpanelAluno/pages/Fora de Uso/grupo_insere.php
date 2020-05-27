<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta charset="utf-8">
  <script type="text/javascript">function direct(){setTimeout("window.location='http://www.estagios.ufc.br/siges/public_html/CpanelAluno/pages/vagas_estagios.php',3000");}</script>
</head>
<body>
<?php 
  require ('conn.php');
mysql_select_db('estagios');

    $matricula=utf8_decode($_POST['matricula']);
    $id_grupo = utf8_decode($_POST['grupo']);
    $id_grupo = mb_strtoupper($id_grupo);

  $consulta = mysql_query("SELECT * FROM permissoes_grupo WHERE matricula_aluno = '$matricula'");
  $conta = mysql_num_rows($consulta);

  $consulta_id = mysql_query("SELECT * FROM grupo_vagas WHERE id_grupo = '$id_grupo'");
  $conta2 = mysql_num_rows($consulta_id);
  $dados = @mysql_fetch_array($consulta_id);
  $grupo = $dados['descricao_grupo'];

  if($conta == 0){

     $up = mysql_query("INSERT INTO permissoes_grupo VALUES('', '$matricula', '$id_grupo', '$grupo')");
      header('location:cadastrar_grupo.php');

  } else if($conta != 0){

    echo '<script> alert("VOCÊ JÁ É CADASTRADO(A) EM UM GRUPO DE VAGAS!"); </script>';
    echo "<script>direct(); </script>";

  }


 ?>
 </body>
</html>
