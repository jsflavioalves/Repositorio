<!DOCTYPE html>
<html>
<head>
  <title></title>
  <script type="text/javascript">
    function ok(){
      alert("ATUALIZADO COM SUCESSO!");
      location.href="consultar_vagas_agendamento.php";
    }
    function erro() {
      alert("SEM VAGAS PARA O DIA ESCOLHIDO!");
      location.href="consultar_vagas_agendamento.php";
    }
  </script>
</head>
<body>

</body>
</html>


<?php
include("../../../conn.php");
mysql_select_db('estagios');

$id_agendamento = $_POST['id_agendamento'];
$data_antiga = $_POST['data_antiga'];
$hora_antiga = $_POST['hora_antiga'];

$nova_data = $_POST['nova_data'];
$nova_hora = $_POST['nova_hora'];

$partes = explode("/", $data_antiga);
$dia = $partes[0];
$mes = $partes[1];
$ano = $partes[2];

$partes2 = explode("/", $nova_data);
$dia2 = $partes2[0];
$mes2 = $partes2[1];
$ano2 = $partes2[2];

// CONSULTA SE TEM VAGAS DISPONÍVEIS NA NOVA DATA
$consulta = mysql_query("SELECT * FROM vagas_agend WHERE dia = '$dia2' AND mes = '$mes2' AND ano = '$ano2' AND hora = '$nova_hora'");
$array = mysql_fetch_array($consulta);
$qt_vagas = $array['qt_vagas'];

if($qt_vagas != 0){
//PRIMEIRO ATUALIZA O AGENDAMENTO DO ALUNO
$atualiza_agend = mysql_query("UPDATE agendamentos SET data = '$nova_data', hora = '$nova_hora' WHERE id_agendamento = '$id_agendamento'");

//DEPOIS ATUALIZA A TABELA "vagas_agend"
$x=1;
$atualiza_agend2 = mysql_query("UPDATE vagas_agend SET qt_vagas = qt_vagas+'$x' WHERE dia = '$dia' AND mes = '$mes' AND ano = '$ano' AND hora = '$hora_antiga'");
$atualiza_agend2 = mysql_query("UPDATE vagas_agend SET qt_vagas = qt_vagas-'$x' WHERE dia = '$dia2' AND mes = '$mes2' AND ano = '$ano2' AND hora = '$nova_hora'");

//REDIRECIONA
echo "<script> ok() </script>";
} else if($qt_vagas == 0){
  echo "<script> erro() </script>";
}

?>