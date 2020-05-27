<?php
// Incluir aquivo de conexão
include("conn.php");
mysql_select_db('estagios');
// Recebe o valor enviado
$valor = utf8_decode($_GET['valor']);
 
// Procura titulos no banco relacionados ao valor
$sql = mysql_query("SELECT * FROM convenios_andamento WHERE interessado LIKE '%$valor%'");

$resulatdo = mysql_num_rows($sql);


 
// Exibe todos os valores encontrados
if($resulatdo != 0){

  echo '<div class="box-body table-responsive no-padding" style="display: block;" onclick="divConv_and();">
              <table class="table table-hover">
                <tr>
                  <th></th>
                  <th>Abertura do Processo</th>
                  <th>Processo</th>
                  <th>Interessado</th>
                  <th>Saida P/ Procuradoria</th>
                  <th>Retorno da Procuradoria</th>
                  <th>Saida P/ PREX</th>
                  <th>Retorno da PREX</th>
                  <th>Pendência</th>
                </tr>';
                
                while ($noticias = mysql_fetch_array($sql)) {
                  echo utf8_encode('<tr>
                          <td></td>
                          <td>'.$noticias['dt_abertura'].'</td>
                          <td>'.$noticias['processo'].'</td>
                          <td>'.$noticias['interessado'].'</td>
                          <td><label>'.$noticias['saida_procuradoria'].'</label></td>
                          <td><label>'.$noticias['retorno_procuradoria'].'</label></td>
                          <td><label>'.$noticias['saida_prex'].'</label></td>
                          <td><label>'.$noticias['retorno_prex'].'</label></td>
                          <td><label>'.$noticias['pendencia'].'</label></td>
                        </tr>');
                }
  echo '</div>';
}
if ($resulatdo == 0) {
    echo '  <div class="box-body table-responsive no-padding" style="margin-left:20px;" >
                <table class="table table-hover">
                   <div class="form-group">
                     <div class="note2 note-danger2"><h4 class="box-heading2"><Strong><font color="red">AVISO! </font></Strong></h4>
                     <p><font color="red">NENHUM RESULTADO ENCONTRADO.</font></p>
                     </div>
                   </div>
                </table>
              </div>';
  } 




// Acentuação
?>