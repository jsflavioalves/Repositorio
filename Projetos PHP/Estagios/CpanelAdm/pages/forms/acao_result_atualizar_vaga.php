<?php
// Incluir aquivo de conexão
include("../../../conn.php");
 mysql_select_db('estagios');
// Recebe o valor enviado
$valor = $_GET['valor'];
 
// Procura titulos no banco relacionados ao valor 
$sql = mysql_query("SELECT * FROM vagas_estagios WHERE id_vagas_estagios LIKE '$valor'");

$resulatdo = mysql_num_rows($sql);

  
 
// Exibe todos os valores encontrados
if($resulatdo != 0){
  $noticias = @mysql_fetch_object($sql);
 
  echo utf8_encode('<br><a onclick="siim_atualizar()" id="nome_atualizar"><div class="alert alert-success">ID_Vaga: '.@$noticias->id_vagas_estagios.'</div></a>');

  echo '<div id="dasinp_atualizar" onclick="siim_atualizar();" style="display:none">';

  echo utf8_encode('<form action="acao_atualizar_vaga.php" method="POST">
                     <div class="form-group">
                   <label>Grupo da vaga</label>
                     <div class="form-group">
                     <select class="form-control select2" style="width: 100%;" name="CD_CENTRO" require>'); 

                                            $grupo = mysql_query("SELECT * FROM centros WHERE CD_CENTRO LIKE '$noticias->CD_CENTRO'");
                                            $grupo2 = mysql_fetch_object($grupo);
                                            $noticias3 = $grupo2->NM_CENTRO; 

                                            echo utf8_encode('<option value="'.$noticias->CD_CENTRO.'">'.$noticias3.'</option>'); 

                                      $consulta2 = mysql_query("SELECT * FROM centros");
                                      $result2 = mysql_num_rows($consulta2);

                                      while ($sql2 = mysql_fetch_array($consulta2)) {
                                        $CD_CENTRO = $sql2['CD_CENTRO'];
                                        $NM_CENTRO = $sql2['NM_CENTRO'];
                                        echo utf8_encode('<option value="'.$CD_CENTRO.'">'.$NM_CENTRO.'</option>');
                                      }
                                      
                      echo utf8_encode('</select>
                        </div>');
                         if($noticias->foto_vaga == ""){

                          echo' <div class="form-group">
                            <div class="input-group">
                              Selecione um arquivo: <input name="foto_vaga" type="file"/>              
                            </div>
                            </div>';

                         }else if($noticias->foto_vaga != ""){
                          echo'
                            </div>
                            <label>Imagem da vaga</label>
                    <div class="form-group">
                            <div class="input-group">
                              
                              <img src="vagas_foto/'.$noticias->foto_vaga.'" class="img" height="200" width="200">
                            </div>
                    </div>
                    <div class="form-group">
                            <div class="input-group">
                              Selecione uma imagem: <input name="foto_vaga" type="file"/>              
                            </div>
                            </div>';
                  }



                  if($noticias->foto_vaga2 == ""){

                          echo' <div class="form-group">
                            <div class="input-group">
                              Selecione um arquivo: <input name="foto_vaga2" type="file"/>              
                            </div>
                            </div>';

                         }else if($noticias->foto_vaga2 != ""){
                          echo'
                            </div>
                            <label>Arquivo da vaga</label>
                    <div class="form-group">
                            <div class="input-group">
                              
                             <a target="_blank" href="vagas_foto/'.$noticias->foto_vaga2.'"><input type="button" class="btn btn-success" name="foto_vaga2" value="'.$noticias->foto_vaga2.'" style="width:200px;"></a>
                            </div>
                    </div>
                    <div class="form-group">
                            <div class="input-group">
                              Selecione um arquivo PDF: <input name="foto_vaga2" type="file"/>              
                            </div>
                            </div>';
                  }


                  echo utf8_encode('

                    <label>Descricao da Vaga</label>
                    <div class="form-group">
                            <div class="input-group">
                              
                              <textarea  id="inputName" onclick="btn();" class="form-control" name="descricao_n" style="width:290px; height:200px;;">'.$noticias->descricao.'</textarea>
                            </div>
                    </div>
                    <label>Link da Vaga</label>
                    <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-link"></i>
                              </div>
                              
                              <input type="text" id="inputName"  onclick="btn();" class="form-control" name="link_n" value="'.$noticias->link.'">
                            </div>
                    </div>
                         
                    <input type="hidden" name="id_vagas_estagios" value="'.$noticias->id_vagas_estagios.'"/>
                    <button type="submit" name="inserir" id="mostrar_div4" class="btn btn-primary pull-left">Salvar</button>
                    </form>
                    <a href="page_result_vagas.php"><button type="button" class="btn btn-danger pull-right" type="button">Cancelar</button></a>'); 
   }               
if ($resulatdo == 0) {
   echo '<div class="note2 note-danger2"><h4 class="box-heading2"><Strong><font color="red">AVISO! </font></Strong></h4>
               <p><font color="red">NENHUM RESULTADO ENCONTRADO.</font></p>
               </div>';
  } 


// Acentuação
/*@header("Content-Type: text/html; charset=ISO-8859-1",true);*/
?>