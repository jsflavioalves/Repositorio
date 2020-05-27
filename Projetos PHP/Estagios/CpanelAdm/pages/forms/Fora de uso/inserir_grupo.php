<?php 
	require ('../../../conn.php');
        mysql_select_db('estagios');

	$descricao_grupo = utf8_decode($_POST['descricao_grupo']);
	$descricao_grupo = mb_strtoupper($descricao_grupo);

        $inserir = mysql_query("INSERT INTO grupo_vagas VALUES ('', '$descricao_grupo', '')");

        header('location:grupo.php');

    

 ?>