<?php
// Incluir aquivo de conexão
/*include("../../../conn.php");
mysql_select_db('estagios');
// Recebe o valor enviado
$valor = $_GET['valor'];
 
// Procura titulos no banco relacionados ao valor
$sql = mysql_query("SELECT * FROM alunos WHERE nome LIKE '%$valor%' or matricula like '%$valor%' ");

$resulatdo = mysql_num_rows($sql);
// Exibe todos os valores encontrados
if($resulatdo != 0){
  

  $noticias = @mysql_fetch_object($sql);
  $matricula = $noticias->matricula;
  
      $sql1 = mysql_query("SELECT * FROM termo_compromisso WHERE matricula_aluno LIKE '%$matricula%' ORDER BY id_termo_compromisso DESC");
      $noticias1 = @mysql_fetch_object($sql1);

      $resulatdo1 = mysql_num_rows($sql1);

          echo utf8_encode('<br><a><div class="alert alert-success" onclick="siim()" style="display:block;" id="nome">' . @$noticias->nome . '</div></a>');

          echo '<div id="dasinp" style="display:none">';
          echo utf8_encode('<div class="form-group">
                      
                      <div class="input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-user-plus"></i>
                        </div>
                        <input type="text" id="habilitar" onclick="alterar();" class="form-control" name="nm" value="'.$noticias->nome.'" placeholder="Nome do Aluno" disabled>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" id="habilitar1" name="cpf" onclick="alterar();" class="form-control" value="'.$noticias->cpf.'" placeholder="cpf" disabled>
                      </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" id="habilitar2" name="rg"  onclick="alterar();" class="form-control" value="'.$noticias->rg.'" placeholder="RG" disabled>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="email" id="habilitar3" name="email"  onclick="alterar();" class="form-control" value="'.$noticias->email.'" placeholder="E-MAIL" disabled>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-exclamation-triangle"></i>
                          </div>
                          <input type="text" id="habilitar4" onclick="alterar();" class="form-control" name="matricula" value="'.$noticias->matricula.'"  placeholder="Nº matricula" disabled>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-user-plus"></i>
                          </div>
                          <select class="form-control select2" id="habilitar5" name="curso" style="width: 100%;" disabled><option>'.$noticias->curso.'</option>');

                          $sql4 = mysql_query("SELECT * FROM cursos order by curso ASC");
  
                          while($resultado4=mysql_fetch_object($sql4)){echo utf8_encode('<option>'.$resultado4->curso.'</option>');}   
  
        echo utf8_encode('</select>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-exclamation-triangle"></i>
                          </div>
                          <input type="textarea" id="obs" onclick="alterar();" class="form-control" name="obs" value="'.$noticias1->obs.'"  placeholder="Nenhuma Observação" disabled>
                        </div>
                      </div>
                      <input type="hidden" name="cd_aluno" value="'.$noticias->id_aluno.'">
                      <input type="hidden" name="mt_old" value="'.$noticias->matricula.'">
                      <button type="button" id="btn_01" class="btn btn-primary pull-right" onclick="alterar();" style="display:block; margin-right:5px;"> ATUALIZAR DADOS </button>
                      <button type="submit" id="btn_02" class="btn btn-primary pull-right" name="atualizar" onclick="alterar();" style="display:none; margin-right:5px;"> SALVAR </button>
                      <a id="btn_03" class="btn btn-danger pull-right" onclick="cancelar();" style="display:none; margin-right:5px;"> CANCELAR </a>') ;
      if($resulatdo1 != 0){

             echo'<br>
                  <div class="row">
                    <div class="col-xs-12"><br>
                      <div class="box box-primary">
                        <div class="box-header">
                          <h3 class="box-title">Termos de Compromisso</h3>
                        </div>';

                        $sql3 = mysql_query("SELECT * FROM termo_compromisso WHERE matricula_aluno LIKE '%$noticias->matricula%' ");

                        // BUSCAR O ID DO CURSO
                        session_start();

                        $busca_curso = mysql_query("SELECT * FROM alunos WHERE nome LIKE '$noticias->nome' or matricula LIKE '$noticias->matricula'");

                            $x = @mysql_fetch_array($busca_curso);
                            $_SESSION['curso'] = $x['id_curso'];

                        //////////////////////////////////////////////////////////////////////////

                        $sql2 = mysql_query("SELECT variavel FROM termo_compromisso WHERE id_termo_compromisso LIKE '$noticias->id_termo_compromisso'");

                            $fta=mysql_fetch_array($sql2);
                            $result=$fta['variavel'];

                   echo'<div class="box-body table-responsive no-padding">
                          <table class="table table-hover">
                            <tr>
                              <th>ID_TCE</th>
                              <th>ID_CURSO</th>
                              <th>VALOR_BOLSA</th>
                              <th>CONCEDENTE/EMPRESA</th> 
                              <th>DATA_INICIO</th>
                              <th>DATA_TERMINO</th> 
                              <th>RESCISÃO_TCE</th>
                              <th>CARGA_HORARIA</th>
                              <th>HORA_ENTRADA</th>
                              <th>HORA_SAIDA</th>
                              <th>VARIAVEL</th>
                              <th>TIPO_TERMO</th>
                              <th>CLASSIFICACAO_TERMO</th>
                              <th>RELATORIO</th>
                              <th>DATA_RELATORIO 01</th>
                              <th>DATA_RELATORIO 02</th>
                              <th>DATA_RELATORIO 03</th>
                              <th>DATA_RELATORIO 04</th>
                              <th>AGENTE</th>
                              <th>PROF.ORIENTADOR</th>
                              <th>SIAPE</th>
                              <th>ARQUIVO</th>
                              <th>STATUS</th>
                            </tr>';

                             while($noticias3=@mysql_fetch_array($sql3)){ 

                              $empresa = $noticias3['nome'];
                              $sql_empresa = mysql_query("SELECT * FROM empresas WHERE CD_EMPRESA LIKE '$empresa' ORDER BY nome ASC");
                              $noticias_empresa = @mysql_fetch_array($sql_empresa);

                              $agente = $noticias3['agente'];
                              $sq4 = mysql_query("SELECT * FROM agentes WHERE CD_AGENTE LIKE '$agente'");
                              $noticias4 = @mysql_fetch_array($sq4);


          echo utf8_encode('<tr>
                              <td>'.$noticias3['id_termo_compromisso'].'</td>
                              <td>'.$_SESSION['curso'].'</td>
                              <td>'.$noticias3['valor'].'</td>
                              <td>'.$noticias_empresa['nome'].'</td>
                              <td><label style="color:#00a258;">'.$noticias3['dt_inicio'].'</label></td>
                              <td><label  style="color:#00a258;">'.$noticias3['dt_fim'].'</label></td>
                              <td><label  style="color:#dd4b39;">'.$noticias3['rescisao'].'</label></td>
                              <td>'.$noticias3['carga_horaria'].'</td>
                              <td>'.$noticias3['hora_inicio'].'</td>
                              <td>'.$noticias3['hora_fim'].'</td>
                              <td><label  style="color:#00a258;">'.$noticias3['variavel'].'</label></td>
                              <td>'.$noticias3['tipo_termo'].'</td>
                              <td>'.$noticias3['classificacao_termo'].'</td>
                              <td><label  style="color:#00a258;">'.$noticias3['relatorio'].'</label></td>
                              <td><label  style="color:#00a258;">'.$noticias3['data_relatorio_1'].'</label></td>
                              <td><label  style="color:#00a258;">'.$noticias3['data_relatorio_2'].'</label></td>
                              <td><label  style="color:#00a258;">'.$noticias3['data_relatorio_3'].'</label></td>
                              <td><label  style="color:#00a258;">'.$noticias3['data_relatorio_4'].'</label></td>
                              <td>'.$noticias4['NM_AGENTE'].'</td>
                              <td>'.$noticias3['prof_orientador'].'</td>
                              <td>'.$noticias3['siape'].'</td>');
                    
                     
                                  if ( $noticias3['arquivo']==null) {
                                    echo '<td>Sem Arquivo</td>'; 
                                  }
                                  if ( $noticias3['arquivo']!=null) {
                                    echo '<td><a href="termos_pdf/'.$noticias3['arquivo'].'" target="_blank" >Abrir</a></td>'; 
                                  }
                                    echo '<td>'.$noticias3['status'].'</td>
                                          <td><input type="hidden" class="form-control" onclick="salvar();" name="id_tce" placeholder="R$ 000.00" value="'.$noticias3['id_termo_compromisso'].'"></td>
                                        </tr>';
                            }
                    echo '</table>
                        </div>
                      </div>
                    </div>
                  </div>
                ';
      }

      if($resulatdo1 == 0){
          echo utf8_encode('<br>
                  <div class="row">
                    <div class="col-xs-12"><br>
                      <div class="box box-primary">
                        <div class="box-header">
                          <h3 class="box-title">Termos de Compromisso</h3>
                        </div>
                        <div class="box-body table-responsive no-padding">
                          <table class="table table-hover">
                            <tr>
                              <th><label  style="color:#dd4b39;">O(A) ALUNO(A) ');echo utf8_encode($noticias->nome); echo utf8_encode(' NÃO POSSUI TERMO DE COMPROMISSO!</label></th>
                            </tr>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>');
      }  
                echo '<div id="adc" style="display:none;" class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                          <tr>
                            <th>VALOR_BOLSA</th>
                            <th>CONCEDENTE/EMPRESA</th> 
                            <th>DATA_INICIO</th>
                            <th>DATA_TERMINO</th> 
                            <th>RESCISÃO_DO_TCE</th>
                            <th>CARGA_HORARIA</th>
                            <th>HORA_ENTRADA</th>
                            <th>HORA_SAIDA</th>
                            <th>HORARIO_VARIADO</th>
                            <th>TIPO_DE_TERMO</th>
                            <th>CLASSIFICAÇÃO_DO_TERMO</th>
                            <th>RELATORIO_SEMESTRAL</th>
                            <th>DATA_RELATORIO 01</th>
                            <th>DATA_RELATORIO 02</th>
                            <th>DATA_RELATORIO 03</th>
                            <th>DATA_RELATORIO 04</th>
                            <th>AGENTE_DE_INTEGRAÇÂO</th>
                            <th>PROF.ORIENTADOR</th>
                            <th>SIAPE</th>
                            <th>ARQUIVO</th>
                            <th>OBSERVAÇÃO</th>
                          </tr>
                          <tr>
                            <div class="col-xs-6">
                              <td><input type="text" id="desabilitar1" class="form-control" name="valor_n" placeholder="R$ 000.00" onkeypress="mascara( this, mvalor );" maxlength="14" required></td>
                            </div>
                            <td>
                            <div class="col-xs-6">
                      <input type="text" id="desabilitar2" OnKeypress="completar();"   name="concedente_n" style="width: 450px;" class="form-control" required>
                     ';

                echo '</div>
                        </td>  
                        <div class="col-xs-6">
                          <td><input type="text" id="desabilitar3" class="form-control" name="dt_ini_n" placeholder="00-00-0000" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" required></td>
                        </div>
                        <div class="col-xs-6">
                          <td><input type="text" id="desabilitar4" class="form-control" name="dt_fim_n" placeholder="00-00-0000" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" required></td>
                        </div>
                        <div class="col-xs-6">
                          <td><input type="text" id="desabilitar5" class="form-control" name="rescisao_n" placeholder="00-00-0000" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" ></td>
                        </div>
                        <div class="col-xs-2">
                          <td><input type="text" id="desabilitar9" class="form-control" name="carga_hrr_n" placeholder="00 hs" required></td>
                        </div>
                        <div class="col-xs-6">
                          <td><input type="text" id="desabilitar6" class="form-control" name="hr_ini_n" placeholder="00:00" id="hora" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" ></td>
                        </div>
                        <div class="col-xs-6">
                          <td><input type="text" id="desabilitar7" class="form-control" name="hr_fim_n" placeholder="00:00" id="hora" OnKeypress="mascara(this, mhora)" size="5" maxlength="5"></td>
                        </div>
                        <td>
                          <div class="form-group">
                            <select class="form-control select2" id="desabilitar8" name="variavel_n" style="width: 100%;" required>
                              <option selected="selected"></option>
                              <option>SIM</option>
                              <option>NÃO</option>
                            </select>
                          </div>
                        </td>
                        <div class="col-xs-6">
                          <td>
                            <div class="form-group">
                              <select class="form-control select2" id="desabilitar10" name="tp_termo_n" style="width: 100%;" required>
                                <option selected="selected"></option>
                                <option>T.A</option>
                                <option>T.C</option>
                              </select>
                            </div>
                          </td>
                        </div>
                        <td>
                          <div class="form-group">
                            <select class="form-control select2" id="desabilitar11"  name="cl_termo_n" style="width: 100%;" required>
                              <option selected="selected"></option>
                              <option>OBRIGATORIO</option>
                              <option>NÃO OBRIGATORIO</option>
                            </select>
                          </div>
                        </td>
                        <td> 
                          <div class="form-group">
                            <select class="form-control select2" id="desabilitar12" name="relatorio_n" style="width: 100%;" required>
                              <option selected="selected"></option>
                              <option>SIM</option>
                              <option>NÃO</option>
                            </select>
                          </div>
                        </td>
                        <div class="col-xs-6">
                          <td><input type="text" id="desabilitar15" class="form-control" name="data_relatorio_1" placeholder="00-00-0000" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" ></td>
                        </div>
                        <div class="col-xs-6">
                          <td><input type="text" id="desabilitar15" class="form-control" name="data_relatorio_2" placeholder="00-00-0000" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" ></td>
                        </div>
                        <div class="col-xs-6">
                          <td><input type="text" id="desabilitar15" class="form-control" name="data_relatorio_3" placeholder="00-00-0000" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" ></td>
                        </div>
                        <div class="col-xs-6">
                          <td><input type="text" id="desabilitar15" class="form-control" name="data_relatorio_4" placeholder="00-00-0000" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" ></td>
                        </div>
                        <td>
                          <div class="form-group">
                            <select class="form-control select2" id="desabilitar13" name="agente_n" style="width: 100%;" required>
                              <option selected="selected"></option>';
                             
                              $sql5 = mysql_query("SELECT * FROM agentes");
                              
                              while($resultado5=mysql_fetch_object($sql5)){
                                 echo utf8_encode('<option value="'.$resultado5->CD_AGENTE.'">'.$resultado5->NM_AGENTE.'</option>');
                              }
                      
                      echo '</select>
                          </div>
                        </td>
                        <div class="col-xs-6">
                          <td><input type="text" id="desabilitar14" class="form-control" name="prof_n" placeholder="Prof. Orientador" required></td>
                        </div>
                        <div class="col-xs-6">
                          <td><input type="number" id="desabilitar16" class="form-control" name="siape" placeholder="SIAPE" style="width:150px;" required></td>
                          <td><input name="pdf" id="desabilitar17" class="realupload" type="file" id="arquivo_file" accept=”image/*”/></td>
                          <td><input type="text" style="width:450px" id="desabilitar18" class="form-control" name="obs" placeholder="Observacao"></td>
                        </div>
                        <input type="hidden" class="form-control" name="id_aluno" value="'.$noticias->matricula.'">
                      </tr>  
                    </table>
                  </div><br>';
                      $sql6 = mysql_query("SELECT * FROM termo_compromisso where matricula_aluno like '$noticias->matricula'  ORDER BY id_termo_compromisso ASC ");  
                      $resultado6=mysql_fetch_object($sql6);
                           
                      if ( $resultado6->obs==null) {
                        echo '<a id="btn_adc" onclick="adc();" style="cursor:pointer; display:none;" class="btn btn-primary pull-right" >Adicionar</a> '; 
                      }
                      if ( $resultado6->obs!=null) {
                        echo '<a id="btn_adc" style="cursor:no-drop; display:none;" class="btn btn-danger pull-right" >Adicionar</a> '; 
                      }
                      echo'<button type="submit" id="btn_cdt" class="btn btn-primary pull-right" name="cdt" value="cadastrar" style="display:none; margin-right:5px;"> Cadastrar </button>
                           <button type="submit" id="btn_sv" class="btn btn-primary pull-right" name="sv" value="salvar" style="display:none; margin-right:5px;"> Salvar </button>';


                            
            }

if ($resulatdo == 0) {
    echo utf8_encode('NENHUM RESULTADO ENCONTRADO!');
  } 



?>