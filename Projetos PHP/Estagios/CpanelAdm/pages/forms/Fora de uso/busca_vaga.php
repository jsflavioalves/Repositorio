<?php
// Incluir aquivo de conexão
/*include("../../../conn.php");
mysql_select_db('estagios');
 
// Recebe o valor enviado
$valor = utf8_encode($_GET['valor']);
 
// Procura titulos no banco relacionados ao valor
$sql = mysql_query("SELECT * FROM vagas_estagios WHERE CD_CENTRO LIKE '%$valor%' order by id_vagas_estagios DESC");

$resulatdo = mysql_num_rows($sql);


 
// Exibe todos os valores encontrados da tabela vagas_estagios2
if($resulatdo != 0){
 

  echo utf8_decode('<BR><div class="box-body table-responsive no-padding"  style="height: 400px; overflow:auto; display:block;" >
              <table class="table table-hover" >
              <tr>
                            <td WIDTH=40>Id_Vagas</td>
                            <td WIDTH=60>Grupo Vaga</td>
                            <td WIDTH=40>Descrição</label></td>
                            <td WIDTH=40>Link</label></td>
                            <td WIDTH=40>Imagem da Vaga</label></td>

              </tr>
              ');
                
                  while($noticias = @mysql_fetch_array($sql)){

               
                    $id_vagas_estagios = $noticias['id_vagas_estagios'];
                    $CD_CENTRO  = $noticias['CD_CENTRO'];
                    $descricao = $noticias['descricao'];
                    $link = $noticias['link'];
                    $foto_vaga = $noticias['foto_vaga'];

                    
                    $consulta1 = mysql_query("SELECT * FROM centros WHERE CD_CENTRO LIKE '$CD_CENTRO'");
                    $var = mysql_fetch_object($consulta1);

                    echo '
                    
                      <tr>
                            <td WIDTH=40>'.$id_vagas_estagios.'</td>
                            <td WIDTH=60>'.$var->NM_CENTRO.'</td>
                            <td WIDTH=40><label id="ret_proc_nome">'.$descricao.'</label></td>
                            <td WIDTH=40><label id="sai_prex_nome">'. $link .'</label></td>';
                            if($foto_vaga == ""){

                            }else if($foto_vaga != ""){
                            echo'<td WIDTH=40><label id="sai_prex_nome"><a target="_blank" href="vagas_foto/'.$foto_vaga.'"><img src="vagas_foto/'.$foto_vaga.'" class="img" height="100" width="100"></a></label></td>';
                          }
                            
                          echo'</tr>
                  
                          ';
               }

               echo  '
              </table>
            </div>';

  
}
if ($resulatdo == 0) {
    echo '<div class="note2 note-danger2"><h4 class="box-heading2"><Strong><font color="red">AVISO! </font></Strong></h4>
               <p><font color="red">NENHUM RESULTADO ENCONTRADO.</font></p>
               </div>';
  } 




// Acentuação
@header("Content-Type: text/html; charset=ISO-8859-1",true);
?>