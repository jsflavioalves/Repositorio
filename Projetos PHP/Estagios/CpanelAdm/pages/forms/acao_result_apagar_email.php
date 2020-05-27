<?php
// Incluir aquivo de conexão
include("../../../conn.php");
 mysql_select_db('estagios');
// Recebe o valor enviado
$valor = $_GET['valor'];
 
// Procura titulos no banco relacionados ao valor
$sql = mysql_query("SELECT * FROM email WHERE id_email LIKE '$valor'");

$resulatdo = mysql_num_rows($sql);

// Exibe todos os valores encontrados
if($resulatdo != 0){
  $noticias = @mysql_fetch_object($sql);
  echo'<br><form action="apagar_email.php" method="POST">
                      <div class="alert alert-success"><label>ID EMAIL: '. $noticias->id_email.' - '.$noticias->nome.'</label><button type="submit" style="float:right;font-size: 9px;"  class="btn btn-danger" name="excluir_email">Excluir</button></div><input type="hidden" style="display:none;" name="id_email" value="'.$noticias->id_email.'"/>';
}
if ($resulatdo == 0) {
    echo '<div class="note2 note-danger2"><h4 class="box-heading2"><Strong><font color="red">AVISO! </font></Strong></h4>
               <p><font color="red">NENHUM RESULTADO ENCONTRADO.</font></p>
               </div>';
  } 

// Acentuação
@header("Content-Type: text/html; charset=ISO-8859-1",true);
?>