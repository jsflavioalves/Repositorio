<?php
// Incluir aquivo de conexão
include("../../../conn.php");
mysql_select_db('estagios');
session_start();

// Recebe o valor enviado
$escolha_dia = utf8_decode($_GET['valor']);

// Procura titulos no banco relacionados ao valor
$sql = mysql_query("SELECT * FROM vagas_agend WHERE dia LIKE '$escolha_dia' AND qt_vagas != '0'");

$resultado = mysql_num_rows($sql);


// Exibe todos os valores encontrados
if($resultado != 0){
  echo '<form action="agendar.php" method="POST">';
  echo '<input type="hidden" name="escolha_dia" value="'.$escolha_dia.'">
        <input type="hidden" name="escolha_mes" value="'.$_SESSION['escolha_mes'].'">
        <input type="hidden" name="matricula_aluno" value="'.$_SESSION['sesaomatricula'].'">
  ';

    echo '
      <div class="col-md-2">
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title" style="margin-left: 25px;">Horário - Qtd</h3>
          </div>
    ';

    while($noticias = mysql_fetch_array($sql)){
      echo '
        <center>
          <label><input type="radio" onclick="aparece_btn()" name="escolha_hora" value="'.$noticias['hora'].'" required> '.$noticias['hora'].' - '.$noticias['qt_vagas'].' </label> </br>
        </center>     
      ';
    }

    echo '</br></div></div>';

    echo '
        <div id="confirmar" class="col-md-2" style="display: none;">
            <div class="box box-primary">
                  <div class="box-header">
                    
                  </div>
  
                  <center>
                  <input type="submit" class="btn btn-success" value="AGENDAR"> </br></br>
                  <a href="realizar_agendamento.php"><input type="button" class="btn btn-danger" value="CANCELAR"></a>
                  </center>
                  
              </br>
             </div>
            </div
    ';

  echo '</form>';

}else if($resultado == 0) {
    echo '<div class="note2 note-danger2"><h4 class="box-heading2"><Strong><font color="red">Aviso! Nenhuma vaga disponível para essa data</font></Strong></h4>       
          </div>';
  } 

?>