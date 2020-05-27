<?php 
	require ('../../../conn.php');
        mysql_select_db('estagios');

	$nome = utf8_decode($_POST['nome']);
	$nome = mb_strtoupper($nome);

    if (isset($nome)) {
        $inserir = mysql_query("INSERT INTO centros VALUES ('','$nome')");

        header('location:centros.php');
    }if (!isset($nome)) {
        header('location:centros.php');
    }

    

 ?>