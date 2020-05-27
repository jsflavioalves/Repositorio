<?php
// Incluir aquivo de conexão
include("../../../conn.php");
mysql_select_db('estagios');

// Recebe o valor enviado
session_start();
$escolha_mes = $_GET['valor'];
$_SESSION['escolha_mes'] = $escolha_mes;

// Procura titulos no banco relacionados ao valor
$sql = mysql_query("SELECT * FROM vagas_agend WHERE mes LIKE '$escolha_mes' GROUP BY dia");

$resultado = mysql_num_rows($sql);


// Exibe todos os valores encontrados
if($resultado != 0){
    echo '<form action="acao_deleta_dia.php" method="POST">
        <div class="col-md-2"></div>
          <div class="col-md-5">
            <div class="box box-primary">
              <div class="box-header">
                <h3 class="box-title" style="margin-left: 60px;">Dia</h3>
              </div> ';

              setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
              date_default_timezone_set('America/Sao_Paulo');
              $data = date('d/m/Y');
              $hora = date('H:i');

              echo '<select class="form-control" name="dia">';
              echo '<option selected="selected" disable="disable">Esolha o dia</option>';
              while($array = mysql_fetch_array($sql)){
                $dias = $array['dia'];
                echo '
                  <center>
                    <option value="'.$dias.'" onclick="aparece_btn()">'.$dias.'</option>
                  </center>
                ';  
              }
              echo '</select>'; 
      
    echo '</div></div>';

    echo '
        <div id="confirmar" class="col-md-2" style="display: none;">
            
  
                  <center>
                  <input type="submit" name="btn_excluir" class="btn btn-success" style="margin-left: 5px;" value="EXCLUIR"> </br></br>
                  <a href="gerenciar_vagas_agendamento.php"><input type="button" class="btn btn-danger" value="CANCELAR"></a>
                  </center>
                  
              </br>
             </div>
            
      ';

      echo '</form>';


}else if($resultado == 0) {
    echo '<div class="note2 note-danger2"><h4 class="box-heading2"><Strong><font color="red">Aviso! Nenhuma dia encontrado.</font></Strong></h4>       
          </div>';
  }

?>
