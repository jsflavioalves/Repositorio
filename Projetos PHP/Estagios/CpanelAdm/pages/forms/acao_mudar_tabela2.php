<?php
require('../../../conn.php');
mysql_select_db('estagios');

    $id_convenio = $_POST['check'];

    $consulta = mysql_query("SELECT * FROM convenios_pendentes WHERE id_convenios_pendentes = '$id_convenio'");
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
        header("location:convenios_pendentes.php");
    }

    $inserir = mysql_query("INSERT INTO convenios_andamento VALUES('', '$dt_abertura', '$processo', '$interessado', '$cnpj','$saida_procuradoria', '$retorno_procuradoria', '$saida_prex', '$retorno_prex', '$pendencia')");
   


    $delete = mysql_query("DELETE FROM convenios_pendentes WHERE id_convenios_pendentes = '$id_convenio'");


    header("location:convenios_pendentes.php");

?>