<?php
// Incluir aquivo de conexão
include("../../../conn.php");
 mysql_select_db('estagios');
// Recebe o valor enviado
 
$valor = utf8_decode($_GET['valor']);


                  $consulta = mysql_query("SELECT * FROM empresas WHERE nome LIKE '%$valor%' OR cnpj LIKE '%$valor%' ORDER BY nome ASC LIMIT 8");
               
                  while($sql = mysql_fetch_array($consulta)){
                    $CD_EMPRESA = $sql['CD_EMPRESA'];
                    $nome = $sql['nome'];

                    echo utf8_encode('
                        <form action="busca_empres" method="POST">
                          
                            <a id="nome"><input type="submit" onclick="empresas()" style="width:100%;" class="alert btn-primary" name="check" id="check" value="'.$nome.'"></a>
                            </form>
                  ');
             }

if(isset($_POST['check'])){
$valor2 = $_POST['check'];

// Procura titulos no banco relacionados ao valor
$sql0 = mysql_query("SELECT * FROM empresas WHERE nome LIKE '$valor2' or cnpj LIKE '$valor2'");

$resulatdo = mysql_num_rows($sql0);

 
// Exibe todos os valores encontrados
if($resulatdo != 0){
   
    

                        
             
    echo '<div id="empresa" onclick="empresas();" style="display:none">';
    echo utf8_encode(' <form action="atualizar_empresa.php" method="POST">
                                  <label> Nome da Empresa </label>
                                  <div class="form-group">
                                          <div class="input-group">
                                            <div class="input-group-addon">
                                              <i class="fa fa-calendar"></i>
                                            </div>
                                            
                                            <input type="text" onclick="mostrar_salvar()" id="conv" class="form-control" name="nome" value="'.$noticias->nome.'">
                                          </div>
                                  </div>
                                  <label>CNPJ</label>
                                  <div class="form-group">
                                          <div class="input-group">
                                            <div class="input-group-addon">
                                              <i class="fa fa-calendar"></i>
                                            </div>
                                            
                                            <input type="text" onclick="mostrar_salvar()" id="cnpj2" onkeypress="cnpj_empresa(cnpj2)" maxlength="18" class="form-control" name="cnpj" value="'.$noticias->cnpj.'">
                                          </div>
                                  </div>');
                                 echo' <label>ENDEREÇO</label>';
                                 echo utf8_encode( '<div class="form-group">
                                          <div class="input-group">
                                            <div class="input-group-addon">
                                              <i class="fa fa-calendar"></i>
                                            </div>
                                            
                                            <input type="text" onclick="mostrar_salvar()" class="form-control" name="endereco" value="'.$noticias->endereco.'">
                                          </div>
                                  </div>
                                  <label> TELEFONE </label>
                                  <div class="form-group">
                                          <div class="input-group">
                                            <div class="input-group-addon">
                                              <i class="fa fa-calendar"></i>
                                            </div>
                                            
                                            <input type="text" id="tel" onkeypress="telefone_emp(tel)" maxlength="15" class="form-control" name="tel" value="'.$noticias->tel.'">
                                          </div>
                                  </div>
                                  <label> EMAIL </label>
                                  <div class="form-group">
                                          <div class="input-group">
                                            <div class="input-group-addon">
                                              <i class="fa fa-calendar"></i>
                                            </div>
                                            
                                            <input type="email" id="email" class="form-control" name="email" value="'.$noticias->email.'">
                                          </div>
                                  </div>
                                  <label>CEP </label>
                                  <div class="form-group" id="mostrar_div2">
                                        <div class="input-group">
                                          <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                          </div>
                                          <input type="text" onclick="mostrar_salvar()" id="cep_emp" onkeypress="cep2(cep_emp)" maxlength="9" class="form-control" name="cep" value="'.$noticias->cep.'">
                                        </div>
                                  </div>'); 
                                  $sql2 = mysql_query("SELECT * FROM tipo_empresa WHERE id_tipo_empresa LIKE '$noticias->CD_TIPO'");
                                  $resulatdo2 = mysql_num_rows($sql2);
                                  $busca = mysql_fetch_object($sql2);

                          echo utf8_encode('<label> TIPO EMPRESA </label>
                                  <div class="form-group" id="mostrar_div2">
                                          <div class="input-group">
                                            <div class="input-group-addon">
                                              <i class="fa fa-calendar"></i>
                                            </div>
                                             <select class="form-control select2" style="width: 100%;" name="tipo_empresa">
                                                <option value="'.$busca->id_tipo_empresa.'">'.$busca->nome.'</option>'); 
                                                $sql3 = mysql_query("SELECT * FROM tipo_empresa");
                                                $resulatdo3 = mysql_num_rows($sql3);
                                                while ($busca2 = mysql_fetch_object($sql3)) {
                                                  echo utf8_encode('<option value="'.$busca2->id_tipo_empresa.'">'.$busca2->nome.'</option>');
                                                }
                          echo utf8_encode('</select>
                                          </div>
                                  </div>');
                                  echo utf8_encode('<label> AGENTE INTEGRADOR </label>
                                  <div class="form-group" id="mostrar_div2">
                                          <div class="input-group">
                                            <div class="input-group-addon">
                                              <i class="fa fa-calendar"></i>
                                            </div>
                                             <select class="form-control select2" style="width: 100%;" name="agente">
                                                <option>'.$noticias->AGENTE_INTEGRADOR.'</option>'); 
                                                  $consulta2 = mysql_query("SELECT * FROM agente_integrador order by nome ASC");
                                      $result2 = mysql_num_rows($consulta2);

                                      while ($sql2 = mysql_fetch_array($consulta2)) {
                                        $CD_AGENTE2 = $sql2['CD_AGENTE'];
                                        $nome = $sql2['nome'];

                                        echo utf8_encode('<option value="'.$nome.'">'.$nome.'</option>');
                                      }

                                      $consulta1 = mysql_query("SELECT * FROM agentes order by NM_AGENTE ASC");
                                      $result1 = mysql_num_rows($consulta1);

                                      while ($sql1 = mysql_fetch_array($consulta1)) {
                                        $CD_AGENTE = $sql1['CD_AGENTE'];
                                        $NM_AGENTE = $sql1['NM_AGENTE'];

                                        echo utf8_encode('<option value="'.$NM_AGENTE.'">'.$NM_AGENTE.'</option>');
                                      }
                          echo utf8_encode('</select>
                                          </div>
                                  </div>
                      <input type="hidden" name="CD_EMPRESA" value="'.$noticias->CD_EMPRESA.'"/>
                      <br>
                                  <button type="submit" onclick="mostrar_salvar()" id="mostrar_div4" style="display:block;" class="btn btn-primary pull-left">SALVAR</button>
                                  <a href="cadastro_empresas_agentes.php"><button type="button" class="btn btn-primary pull-right">Cancelar</button></a>
                      </form>
                            
                                ');
        } 
     if ($resulatdo == 0) {
    echo utf8_decode('<div class="note2 note-danger2"><h4 class="box-heading2"><Strong><font color="red">Aviso! </font></Strong></h4>
               <p><font color="red">Empresa Não Cadastrada.</font></p>
               </div>');
  } 
}
// Acentuação
@header("Content-Type: text/html; charset=ISO-8859-1",true);
?>