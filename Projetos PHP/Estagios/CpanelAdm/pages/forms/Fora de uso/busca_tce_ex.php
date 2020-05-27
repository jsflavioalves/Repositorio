<?php
// Incluir aquivo de conexão
/*include("../../../conn.php");
 mysql_select_db('estagios');
// Recebe o valor enviado
$valor = $_GET['valor'];
 
// Procura titulos no banco relacionados ao valor
$sql = mysql_query("SELECT * FROM termo_compromisso WHERE id_termo_compromisso LIKE '$valor'");

$resulatdo = mysql_num_rows($sql);


 
// Exibe todos os valores encontrados
if($resulatdo != 0){
  $noticias = @mysql_fetch_object($sql);
  $sql1 = mysql_query("SELECT * FROM alunos WHERE matricula LIKE '%$noticias->matricula_aluno%'");
  $noticias1 = @mysql_fetch_object($sql1);

  echo utf8_decode('<br><form action="deleta_tce.php" method="POST">
                      <div class="alert alert-success"><label>'.$noticias1->nome.' - '.$noticias->dt_inicio.' - '.$noticias->dt_inicio.'</label><button type="submit" style="float:right;font-size: 9px;"  class="btn btn-danger">Excluir</button></div><input type="hidden" style="display:none;" name="id_termo_compromisso" value="'.$noticias->id_termo_compromisso.'"/></form>');
}
if ($resulatdo == 0) {
    echo utf8_decode('<option>NENHUM RESULTADO ENCONTRADO!</option>');
  } 




// Acentuação
@header("Content-Type: text/html; charset=ISO-8859-1",true);
?>