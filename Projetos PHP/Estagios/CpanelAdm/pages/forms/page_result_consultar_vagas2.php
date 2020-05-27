<?php
// Incluir aquivo de conexão
include("../../../conn.php");
mysql_select_db('estagios');

// Recebe o valor enviado
session_start();
$escolha_mes = $_GET['valor'];
$escolha_ano = date('Y');


// Procura titulos no banco relacionados ao valor
$sql = mysql_query("SELECT * FROM agendamentos where SUBSTRING(data, 7, 4) = '$escolha_ano' and SUBSTRING(data, 4, 2) = '$escolha_mes'  GROUP BY data ORDER BY data");

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
          $sql2 = mysql_query("SELECT * FROM agendamentos where SUBSTRING(data, 7, 4) = '$escolha_ano' GROUP BY data ORDER BY data");
            while($noticias = mysql_fetch_array($sql2)){
              $id_agendamento = $noticias['id_agendamento'];
              $data = $noticias['data'];
              $hora = $noticias['hora'];
              echo utf8_encode('
                      <tr>
                        <td style="text-align: center;">'.$id_agendamento.'</td>
                        <td>'.$noticias['matricula_aluno'].'</td>
                        <td>'.$noticias['nome_aluno'].'</td>
                        <td>'.$noticias['telefone'].'</td>
                        <td>'.$noticias['email'].'</td>
                        <td>'.$data.'</td>
                        <td>'.$hora.'</td> 
                        <td><input type="hidden" name="id_agendamento" value="'.$id_agendamento.'"></td>
                        <td><input type="hidden" name="data" value="'.$data.'"></td>
                        <td><input type="hidden" name="hora" value="'.$hora.'"></td>
                        <td><input type="submit" name="btn" style="margin-right: 10px;" class="btn btn-danger pull-right" value="EXCLUIR"></td>
                      </tr>
                      </form>');
            }
       echo'</table>
        </div>
      </div>
    ';

} else if($resultado == 0){
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
