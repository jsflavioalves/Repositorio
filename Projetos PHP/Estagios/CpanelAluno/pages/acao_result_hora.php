<?php
// Incluir aquivo de conexão
include("conn.php");
mysql_select_db('estagios');
session_start();

// Recebe o valor enviado
$escolha_dia = utf8_decode($_GET['valor']);
$mes = $_SESSION['escolha_mes'];

// Procura titulos no banco relacionados ao valor
$sql = mysql_query("SELECT * FROM vagas_agend WHERE dia LIKE '$escolha_dia' AND mes LIKE '$mes' AND qt_vagas != '0'");

$resultado = mysql_num_rows($sql);

  // Exibe todos os valores encontrados
  if($resultado != 0){
  echo '<form action="acao_agendar.php" method="POST">';
  echo '<input type="hidden" name="escolha_dia" value="'.$escolha_dia.'">
        <input type="hidden" name="escolha_mes" value="'.$_SESSION['escolha_mes'].'">
        <input type="hidden" name="matricula_aluno" value="'.$_SESSION['sesaomatricula'].'">
  ';

    echo '
      <div class="col-md-2">
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title" style="margin-left: 50px;">Horário</h3>
          </div>
    ';

    echo '<select class="form-control" name="escolha_hora" required>';
    echo '<option disabled selected>Escolha o Horário</option>';
    while($noticias = mysql_fetch_array($sql)){
      echo '
          <option onclick="aparece_btn()" value="'.$noticias['hora'].'"> '.$noticias['hora'].' - '.$noticias['qt_vagas'].' Vaga(s)</option>  
      ';
    }
    echo '</select>';
    echo '</div></div>';

    echo '
        <div id="confirmar" class="col-md-2" style="display: none;">
            <div class="box box-primary">
                  <div class="box-header">
                    
                  </div>
  
                  <center>
                  <input type="submit" class="btn btn-success" style="border-radius: 5px;" value="AGENDAR"> </br></br>
                  <a href="realizar_agendamento.php"><input type="button" class="btn btn-danger" style="border-radius: 5px;" value="CANCELAR"></a>
                  </center>
                  
              </br>
             </div>
            </div
    ';

  echo '</form>';

  }
?>