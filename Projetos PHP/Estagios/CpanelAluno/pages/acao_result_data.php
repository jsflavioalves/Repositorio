<?php
// Incluir aquivo de conexão
include("conn.php");
mysql_select_db('estagios');

// Recebe o valor enviado
session_start();
$escolha_mes = $_GET['valor'];
$_SESSION['escolha_mes'] = $escolha_mes;
$mes_atual = date('m');
$ano_atual = date('Y');

if($escolha_mes > $mes_atual){
// Procura titulos no banco relacionados ao valor
$sql = mysql_query("SELECT * FROM vagas_agend WHERE mes LIKE '$escolha_mes' AND ano LIKE '$ano_atual' AND qt_vagas != '0' GROUP BY dia");

$resultado = mysql_num_rows($sql);


// Exibe todos os valores encontrados
if($resultado != 0){
    echo '
          <div class="col-md-2">
            <div class="box box-primary">
              <div class="box-header">
                <h3 class="box-title" style="margin-left: 60px;">Dia</h3>
              </div> ';

              setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
              date_default_timezone_set('America/Sao_Paulo');
              $data = date('d/m/Y');
              $hora = date('H:i');

              echo '<select class="form-control">';
              echo '<option disabled selected>Escolha o dia</option>';
              while($array = mysql_fetch_array($sql)){
                $dia = $array['dia'];
                echo '
                  <option onclick="buscarHora(this.value)" name="dia" value="'.$dia.'">'.$dia.'</option>
                ';  
              }
              echo ' </select>'; 
     
    echo '</div>';


  }else if($resultado == 0) {
    echo '<div class="note2 note-danger2"><h4 class="box-heading2"><Strong><font color="red">Aviso! Nenhuma vaga disponível para o mês selecionado.</font></Strong></h4>       
          </div>';
  } 

} else if($escolha_mes == $mes_atual){

$dia_atual = date('d');

// Procura titulos no banco relacionados ao valor
$sql = mysql_query("SELECT * FROM vagas_agend WHERE dia > '$dia_atual' AND mes LIKE '$escolha_mes' AND ano LIKE '$ano_atual' AND qt_vagas != '0' GROUP BY dia");

$resultado = mysql_num_rows($sql);

// Exibe todos os valores encontrados
  if($resultado != 0){
    echo '
          <div class="col-md-2">
            <div class="box box-primary">
              <div class="box-header">
                <h3 class="box-title" style="margin-left: 60px;">Dia</h3>
              </div> ';

              setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
              date_default_timezone_set('America/Sao_Paulo');
              $data = date('d/m/Y');
              $hora = date('H:i');

              echo '<select class="form-control">';
              echo '<option disabled selected>Escolha o dia</option>';
              while($array = mysql_fetch_array($sql)){
                $dia = $array['dia'];
                echo '
                  <option onclick="buscarHora(this.value)" value="'.$dia.'">'.$dia.'</option>
                ';  
              }
              echo ' </select>'; 
     
    echo '</div>';


  }else if($resultado == 0) {
    echo '<div class="note2 note-danger2"><h4 class="box-heading2"><Strong><font color="red">Aviso! Nenhuma vaga disponível para o mês selecionado.</font></Strong></h4>       
          </div>';
  } 
} else if($escolha_mes < $mes_atual){
  echo '<div class="note2 note-danger2"><h4 class="box-heading2"><Strong><font color="red">Aviso! Nenhuma vaga disponível para o mês selecionado.</font></Strong></h4>       
          </div>';
}

?>