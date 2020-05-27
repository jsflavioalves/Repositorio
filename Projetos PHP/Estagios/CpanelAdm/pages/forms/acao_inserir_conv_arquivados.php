<?php 
	require ('../../../conn.php');
mysql_select_db('estagios');

	$dt_abertura = $_POST['dt_abertura'];
    $processo = $_POST['processo'];
    $interessado = utf8_decode($_POST['interessado']);
    $cnpj = $_POST['cnpj'];
    $saida_procuradoria = $_POST['saida_procuradoria'];
    $retorno_procuradoria = $_POST['retorno_procuradoria'];
    $saida_prex = $_POST['saida_prex'];
    $retorno_prex = $_POST['retorno_prex'];
    $pendencia = utf8_decode($_POST['pendencia']);
    $data_arquivamento = $_POST['data_arquivamento'];
    $observacao = utf8_decode($_POST['observacao']);
    $status = utf8_decode($_POST['status']);

    $inserir = mysql_query("INSERT INTO convenios_arquivados VALUES ('','$dt_abertura','$processo','$interessado', '$cnpj','$saida_procuradoria','$retorno_procuradoria','$saida_prex','$retorno_prex','$pendencia','$data_arquivamento', '$observacao', '$status')");

    echo '<script> alert("Inserido com Sucesso!"); </script>';
    header('location:convenios_arquivados.php');

 ?>