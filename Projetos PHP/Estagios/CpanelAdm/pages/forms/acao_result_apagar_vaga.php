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
  echo'<br><form action="acao_deleta_vaga.php" method="POST">
                      <div class="alert alert-success"><label>ID VAGA: '. $noticias->id_vagas_estagios.'</label><button type="submit" style="float:right;font-size: 9px;"  class="btn btn-danger" name="excluir">Excluir</button></div><input type="hidden" style="display:none;" name="id_vagas_estagios" value="'.$noticias->id_vagas_estagios.'"/><img src="vagas_foto/'.$noticias->foto_vaga.'" 
         				style="display:none;" name="foto_vaga" class="img" height="200" width="200">
         				<input type="hidden" class="btn btn-success" name="arquivo" value="vagas_foto/'.$noticias->foto_vaga2.'" style="width:100%;"></a>';
}
if ($resulatdo == 0) {
    echo '<div class="note2 note-danger2"><h4 class="box-heading2"><Strong><font color="red">AVISO! </font></Strong></h4>
               <p><font color="red">NENHUM RESULTADO ENCONTRADO.</font></p>
               </div>';
  } 

// Acentuação
@header("Content-Type: text/html; charset=ISO-8859-1",true);
?>