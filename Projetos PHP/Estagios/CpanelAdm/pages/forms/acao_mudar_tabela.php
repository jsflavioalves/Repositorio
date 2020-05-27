<?php
require('../../../conn.php');
mysql_select_db('estagios');

    $id_convenio = $_POST['check'];

    session_start();
    $_SESSION['valores'] = 0;
    foreach ($id_convenio as $indice => $valor) {
        $_SESSION['valores'] = $valor;
        echo $_SESSION['valores'];
    }


    $consulta = mysql_query("SELECT * FROM convenios_andamento WHERE id_convenios_andamento = '$id_convenio'");
    $conta = mysql_num_rows($consulta);

    if($conta != 0){            
          while($valor = mysql_fetch_array($consulta)){
            $dt_abertura = $valor['dt_abertura'];
            $processo = $valor['processo'];
            $interessado = $valor['interessado'];
            $cnpj = $valor['cnpj'];
            $saida_procuradoria = $valor['saida_procuradoria'];
            $retorno_procuradoria = $valor['retorno_procuradoria'];
            $saida_prex = $valor['saida_prex'];
            $retorno_prex = $valor['retorno_prex'];
            $pendencia = $valor['pendencia'];      
          }
    }else{
        echo '<script> alert("ERRO!"); </script>';
        header("location:convenios_andamento.php");
    }

    $inserir = mysql_query("INSERT INTO convenios_pendentes VALUES('', '$dt_abertura', '$processo', '$interessado', '$cnpj','$saida_procuradoria', '$retorno_procuradoria', '$saida_prex', '$retorno_prex', '$pendencia', '', '', '', '', '')");
   


    $delete = mysql_query("DELETE FROM convenios_andamento WHERE id_convenios_andamento = '$id_convenio'");


    header("location:convenios_andamento.php");

?>