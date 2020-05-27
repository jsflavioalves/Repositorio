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
    $data_email_01 = $_POST['data_email_01'];
    $data_email_02 = $_POST['data_email_02'];
    $observacao = utf8_decode($_POST['observacao']);
    $arquivo = $_FILES['pdf']['name'];

    $inserir = mysql_query("INSERT INTO convenios_pendentes VALUES ('','$dt_abertura','$processo','$interessado', '$cnpj','$saida_procuradoria','$retorno_procuradoria','$saida_prex','$retorno_prex','$pendencia','$data_arquivamento', '$data_email_01', '$data_email_02' ,'$observacao', '$arquivo')");
    if ($_FILES['pdf']['name'] != "") {
        $pasta = './convenio_pendentes/';
        move_uploaded_file($_FILES['pdf']['tmp_name'], $pasta.$_FILES['pdf']['name']);
    }   

    echo '<script> alert("Inserido com Sucesso!"); </script>';
    header('location:convenios_pendentes.php');

 ?>