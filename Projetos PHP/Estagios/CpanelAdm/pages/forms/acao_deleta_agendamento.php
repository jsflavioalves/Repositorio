<?php
header("Content-type: text/html; charset=utf-8");
require('../../../conn.php');
mysql_select_db('estagios');

$data = $_POST['data'];
$partes = explode("/", $data);
$dia = $partes[0];
$mes = $partes[1];
$ano = $partes[2];
$hora = $_POST['hora'];


$id_agend=0;
$atualizar = mysql_query("UPDATE vagas_agend SET qt_vagas = qt_vagas+'$x' WHERE dia = '$dia' AND mes = '$mes' AND ano = '$ano' AND hora = '$hora'");
if (isset($_POST['excluir'])) {
	echo '<script> alert("excluir ok"); </script>';
    // $id_agend = $_POST['opt'.$x];
    // echo '<script> alert("agendamento'. $id_agend.'"); </script>';
    for ($x=1; $x <= 101; $x++ )
    {	 
	  if(isset($_POST['opt'.$x])){
	    $id_agend = $_POST['opt'.$x];	
	    echo '<script> alert("AGENDAMENTO que vou deletar'. $id_agend.'"); </script>';
        $deletar = mysql_query("DELETE FROM agendamentos WHERE id_agendamento ='".$id_agend."'");}
    }    
 }
// echo '<script> alert("AGENDAMENTO EXCLUÍDO COM SUCESSO! ". $id_agendamento ); </script>';
 header('location:consultar_vagas_agendamento.php');
?>