<?php
// Incluir aquivo de conexão
/*include("../../../conn.php");
mysql_select_db('estagios');
 
// Recebe o valor enviado
$valor = $_GET['valor'];
 
// Procura titulos no banco relacionados ao valor
$sql = mysql_query("SELECT * FROM agentes WHERE NM_AGENTE LIKE '%$valor%'");

$resulatdo = mysql_num_rows($sql);


 
// Exibe todos os valores encontrados
if($resulatdo != 0){
  $noticias = @mysql_fetch_object($sql);

  echo '<BR><a onclick="siim()" id="nome"><div class="alert alert-success">' . @$noticias->NM_AGENTE . '</div></a>';

  echo '<div id="dasinp" onclick="siim();" style="display:none">';
  echo '<form action="atualizar_agente.php" method="POST">
  <div class="form-group">
           <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user-plus"></i>
                  </div>
                  <input type="text" id="inputName" onclick="btn();" class="form-control" name="nm_agente" value="'.$noticias->NM_AGENTE.'" placeholder="Nome do Agente" >
                </div>
    </div>
    <label>Data inicio:</label>
       <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  
                  <input type="text" id="inputName" onclick="btn();" class="form-control" name="dt_ini" value="'.$noticias->DT_INI.'"  placeholder="00/00/0000" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10">
                </div>
        </div>
    <label id="mostrar_div1" style="display:none;"> Data fim: </label>
       <div class="form-group" id="mostrar_div2" style="display:none;">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  
                  <input type="text" id="inputName"  onclick="btn();" class="form-control" name="dt_fim" value="'.$noticias->DT_FIM.'" placeholder="00/00/0000" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10">
                </div>
        </div>
      
         <div class="form-group" id="mostrar_div3" style="display:none;">

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-exclamation-triangle"></i>
                  </div>
                  <input type="text" id="inputName" onclick="btn();" class="form-control" name="obs" value="'.$noticias->TX_OBS.'"  placeholder="Observacao" uppercase>
                </div>
        </div>
            <input type="hidden" name="cd_agente" value="'.$noticias->CD_AGENTE.'"/>
            
                <button type="submit" id="mostrar_div4" style="display:none;" class="btn btn-primary pull-left">Salvar</button>
              </form>
             <a href="agente.php"><button type="submit" class="btn btn-primary pull-right">Voltar</button></a>
                 ';
              
  echo '</div>';  
}
if ($resulatdo == 0) {
    echo utf8_encode('<option>NENHUM RESULTADO ENCONTRADO!</option>');
  } 




// Acentuação
@header("Content-Type: text/html; charset=ISO-8859-1",true);
?>