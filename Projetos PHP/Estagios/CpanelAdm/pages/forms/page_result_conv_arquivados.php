<?php
function guarda_nome (){ 
  echo passei.$noticias['interessado'];
  if($nomeemp=="") $nomeemp = $noticias['interessado'];}
// Incluir aquivo de conexão
include("../../../conn.php");
mysql_select_db('estagios');
// Recebe o valor enviado


$valor = utf8_decode($_GET['valor']);
 
// Procura titulos no banco relacionados ao valor
$sql = mysql_query("SELECT * FROM convenios_arquivados WHERE  interessado LIKE '%$valor%' ORDER BY id_convenios_arquivados DESC lIMIT 20");

$resulatdo = mysql_num_rows($sql);



 
// Exibe todos os valores encontrados
if($resulatdo != 0){

 echo'<div class="box-body table-responsive no-padding" id="tabela" style="display: block;" >
              <table class="table table-hover">
                <tr>
                  <th><!--COLUNA DOS CHECKBOX--></th>
                  <th>Data de Abertura de Processo</th>
                  <th>Processo</th>
                  <th>Interessado</th>
                  <th>Saida P/ Procuradoria</th>
                  <th>Retorno da Procuradoria</th>
                  <th>Saida P/ PREX</th>
                  <th>Data da Assinatura/Convênio ativo</th>
                  <th>Pendência</th>
                  <th>Data Arquivamento</th>
                  <th>Observação</th>
                  <th>Status</th>
                  <th><!--COLUNA DO BOTÃO INSERIR--></th>
                </tr>';


                  while($noticias = mysql_fetch_array($sql)){

                    echo utf8_encode('
                        <form action="mudar_tabela4.php" method="POST">
                          <tr>
                            <td><input type="checkbox" name="check" id="check" value="'.$id_convenios_arquivados.'"></td>

                            <td>'.$noticias['dt_abertura'].' <input type="hidden" value="'.$dt_abertura.'" class="form-control" name="dt_abertura" id="dt_abertura"> </td>
                            
                            <td>'.$noticias['processo'].' <input type="hidden" value="'.$processo.'" class="form-control" name="processo" id="processo"> </td>

                            <td><label id="interessado">'.$noticias['interessado'].'</label> <input type="hidden" value="'.$interessado.'" class="form-control" name="interessado" id="interessado"> </td>

                            <td>'.$noticias['saida_procuradoria'].' <input type="hidden" value="'.$saida_procuradoria.'" class="form-control" name="saida_procuradoria" id="saida_procuradoria"></td>
                            
                            <td><label id="ret_proc_nome">'.$noticias['retorno_procuradoria'].'</label><input type="hidden" value="'.$retorno_procuradoria.'" class="form-control" name="retorno_procuradoria" id="retorno_procuradoria" onclick="editar();" data-inputmask=""alias": "dd/mm/yyyy"" data-mask></td>
                            
                            <td><label id="sai_prex_nome">'.$noticias['saida_prex'].'</label><input type="hidden" value="'.$saida_prex.'" class="form-control" name="saida_prex" id="saida_prex" onclick="editar();" data-inputmask=""alias": "dd/mm/yyyy"" data-mask></td>
                            <td><label id="ret_prex_nome">'.$noticias['retorno_prex'].'</label><input type="hidden" value="'.$retorno_prex.'" class="form-control" name="retorno_prex" id="retorno_prex" onclick="editar();" data-inputmask=""alias": "dd/mm/yyyy"" data-mask></td>
                            <td><label id="pendencia_nome">'.$noticas['pendencia'].'</label><input type="hidden" value="'.$pendencia.'" class="form-control" name="pendencia" id="pendencia" onclick="editar();"></td>
                            <td><label>'.$noticas['data_arquivamento'].'</label><input type="hidden" value="'.$data_arquivamento.'" class="form-control" name="data_arquivamento" id="data_arquivamento" onclick="editar();"></td>
                            <td><label id="pendencia_nome">'.$noticias['observacao'].'</label><input type="hidden" value="'.$observacao.'" class="form-control" name="observacao" id="observacao" onclick="editar();"></td>
                            <td><label id="status">'.$noticias['status'].'</label><input type="hidden" value="'.$status.'" class="form-control" name="status" id="status" onclick="editar();"></td>
                          </tr>');
                  } 
                      echo '<td><input type="submit" name="btn_desarquivar" value="DESARQUIVAR" class="btn btn-block btn-primary"></td>';
                      echo '<td><a href="convenios_arquivados.php"><button type="submit" class="btn btn-primary pull-right">VOLTAR</button></a></td>';

                      echo '</form>';
           }

if ($resulatdo == 0) {
    echo '    <div class="box-body table-responsive no-padding" id="tabela" style="margin-left:20px;" >
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
@header("Content-Type: text/html; charset=ISO-8859-1",true);
?>

                    