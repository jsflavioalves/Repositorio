<?php 
	require ('../../../conn.php');
mysql_select_db('estagios');

	$id_centro = $_POST['id_centro'];
    $curso = utf8_decode($_POST['curso']);
    $curso = mb_strtoupper($curso);

    if (isset($curso)) {
        $inserir = mysql_query("INSERT INTO cursos VALUES ('','$curso','$id_centro')");

        header('location:cursos.php');
    }if (!isset($curso)) {
        header('location:cursos.php');
    }


 ?>