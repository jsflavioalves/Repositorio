<?php
// Incluir aquivo de conexão
include("../../../conn.php");
mysql_select_db('estagios');
 
// Recebe o valor enviado
$valor = $_GET['valor'];
 
// Procura titulos no banco relacionados ao valor
$sql = mysql_query("SELECT * FROM centros WHERE NM_CENTRO LIKE '%$valor%'");

$resulatdo = mysql_num_rows($sql);


 
// Exibe todos os valores encontrados
if($resulatdo != 0){
  $noticias = @mysql_fetch_object($sql);

  echo' <a onclick="mostrar()" id="nome_curso"><div class="alert alert-success" style="margin-top:10px;">' .@$noticias->NM_CENTRO. '</div></a>';

  echo '<div class="row" id="divAtualiza" onclick="mostrar()" style="display:none;">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Nome da Centro:</label>
                      <input type="text" name="nome_centro" class="form-control" value="'.$noticias->NM_CENTRO.'">
                      <input type="hidden" name="id_centro" class="form-control" value="'.$noticias->CD_CENTRO.'">
                    <!-- /.input group -->
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-block btn-info">ATUALIZAR</button>
                  </div>
                </div>
              </div>';

  
}
if ($resulatdo == 0) {
    echo utf8_encode('<option>NENHUM RESULTADO ENCONTRADO!</option>');
  } 




// Acentuação
@header("Content-Type: text/html; charset=ISO-8859-1",true);
?>