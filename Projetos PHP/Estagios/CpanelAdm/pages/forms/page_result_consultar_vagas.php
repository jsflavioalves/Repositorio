<?php
// Incluir aquivo de conexão
include("../../../conn.php");
mysql_select_db('estagios');

// Recebe o valor enviado
session_start();
$escolha_mes = $_GET['valor'];
$_SESSION['mes'] = $escolha_mes;
$escolha_ano = date('Y');

// Procura titulos no banco relacionados ao valor
$sql = mysql_query("SELECT * FROM vagas_agend WHERE mes LIKE '$escolha_mes'");

$resultado = mysql_num_rows($sql);


// Exibe todos os valores encontrados
if($resultado != 0){
    echo '<form action="acao_deleta_agendamento.php" method="POST">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Agendamentos</h3>
        </div> 
            
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <tr>
              <th>Nº AGENDAMENTO</th>
              <th>MATRICULA_ALUNO</th>
              <th>ALUNO</th>
              <th>TELEFONE</th>
              <th>E-MAIL</th>
              <th>DATA</th> 
              <th>HORA</th>
              <th></th>
            </tr>';

          $sql2 = mysql_query("SELECT * FROM agendamentos WHERE data LIKE '%$escolha_mes/$escolha_ano%' ORDER BY data ASC");
            $cont = 1;

            while($noticias = mysql_fetch_array($sql2)){
              $id_agendamento = $noticias['id_agendamento'];
                                 
              $data = $noticias['data'];
              $hora = $noticias['hora'];
              
              echo utf8_encode('
                      <tr>
                        <td><input type="checkbox" name="opt'.$cont.'" value="'.$id_agendamento.'"> '.$id_agendamento.'</td>
                        <td>'.$noticias['matricula_aluno'].'</td>
                        <td>'.$noticias['nome_aluno'].'</td>
                        <td>'.$noticias['telefone'].'</td>
                        <td>'.$noticias['email'].'</td>
                        <td>'.$data.'</td>
                        <td>'.$hora.'</td> 
                        <td><input type="hidden" name="id_agendamento" value="'.$id_agendamento.'"></td>
                        <td><input type="hidden" name="data" value="'.$data.'"></td>
                        <td><input type="hidden" name="hora" value="'.$hora.'"></td>
                      </tr>
                      ');
                  $opagend = array($cont => $id_agendamento);
                  $cont = $cont + 1;
               }
               echo utf8_encode('<tr><td><button type="submit" name="excluir" style="float: right;" class="btn btn-block btn-primary">EXCLUIR</button></td></tr></form>');
               
       echo'</table>
        </div>
      </div>
    ';

} else if ($resultado == 0){
    echo '<form action="acao_deleta_agendamento.php" method="POST">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Agendamentos</h3>
        </div>
        
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <tr>
              <th>Nº AGENDAMENTO</th>
              <th>MATRICULA_ALUNO</th>
              <th>ALUNO</th>
              <th>TELEFONE</th>
              <th>E-MAIL</th>
              <th>DATA</th> 
              <th>HORA</th>
              <th></th>
            </tr>
            <tr>
              <th>
                <div class="note2 note-danger2"><h4 class="box-heading2"><Strong><font color="red">Nenhum agendamento para o mês selecionado!</font></Strong></h4>  
                </div>
              </th>
            </tr>
          </table>
        </div>
      </div>';

}

?>
