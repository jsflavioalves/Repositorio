<?php 
    require ('../../../conn.php');
    mysql_select_db('estagios');
    $nome_empresa = utf8_decode($_POST['nome_empresa']);
    $endereco = utf8_decode($_POST['endereco']);
    $cidade_uf = utf8_decode($_POST['cidade_uf']);
    $tipo_empresa = utf8_decode($_POST['tipo_empresa']);
    $nome_agente = utf8_decode($_POST['nome_agente']);
    $cnpj = utf8_decode($_POST['cnpj']);
    $cep = utf8_decode($_POST['cep']);
    $fone = utf8_decode($_POST['fone']);
    $email = utf8_decode($_POST['email']);
    $representante = utf8_decode($_POST['representante']);

    $pesquisa=mysql_query("SELECT * FROM empresas WHERE cnpj = '$cnpj'");
    $result=mysql_num_rows($pesquisa);

    $pesquisa2=mysql_query("SELECT * FROM empresas WHERE nome = '$nome_empresa'");
    $result2=mysql_num_rows($pesquisa2);
    

    if($result == 0 AND $result2 == 0){
    $inserir = mysql_query("INSERT INTO empresas VALUES('','$nome_empresa','$cnpj','$endereco', '$cidade_uf' ,'$cep','$fone','$email','$tipo_empresa','$nome_agente', '$representante')");
    header('location:cadastro_empresas_agentes.php');
    } else if($result != 0){
        echo '<script>alert("A EMPRESA JA EXISTE COM ESSE CNPJ!");</script>'; 
        $insertGoTo='cadastro_empresas_agentes.php';
        header( "refresh:0;url={$insertGoTo}" );
    } else if($result2 != 0){
        echo '<script>alert("A EMPRESA JA EXISTE COM ESSE NOME!");</script>'; 
        $insertGoTo='cadastro_empresas_agentes.php';
        header( "refresh:0;url={$insertGoTo}" );
    }

    
 ?>