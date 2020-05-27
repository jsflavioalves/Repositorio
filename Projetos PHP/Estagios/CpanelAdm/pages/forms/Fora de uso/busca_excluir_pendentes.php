<?php
// Incluir aquivo de conexão
include("../../../conn.php");
mysql_select_db('estagios');
 
// Recebe o valor enviado
$valor = utf8_encode($_GET['valor']);
 
// Procura titulos no banco relacionados ao valor
$sql = mysql_query("SELECT * FROM convenios_pendentes WHERE interessado LIKE '%$valor%'");


$resulatdo = mysql_num_rows($sql);

 
// Exibe todos os valores encontrados
if($resulatdo != 0){
  $noticias = @mysql_fetch_object($sql);

  echo utf8_decode('<form action="deleta_conv_pendentes.php" method="POST">
                      <div class="alert alert-success" id="resultado3"><label>' . @utf8_encode($noticias->interessado) . '</label><button type="submit" style="float:right;font-size: 9px;"  class="btn btn-danger">EXCLUIR</button></div><input type="hidden" style="display:none;" name="id_convenios_pendentes" value="'.$noticias->id_convenios_pendentes.'"/></form>');
}
if ($resulatdo == 0) {
    echo utf8_decode('<option>NENHUM RESULTADO ENCONTRADO!</option>');
  } 




// Acentuação
@header("Content-Type: text/html; charset=ISO-8859-1",true);
?>