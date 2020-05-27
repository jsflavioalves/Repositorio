<?php 
    require ('conn.php');
    mysql_select_db('estagios');
    $id_empresa = $_POST['id_empresa'];
    $processo = $_POST['processo'];
    $dt_inicio = $_POST['dt_inicio'];
    $dt_fim = $_POST['dt_fim'];

    $inserir = mysql_query("INSERT INTO termo_convenio VALUES ('','$id_empresa','$processo','$dt_inicio','$dt_fim','1')");

    echo '<script> alert("CONVÊNIO CADASTRADO COM SUCESSO!") </script>';
    header('location:../index.php');

 ?>