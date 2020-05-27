<?php
// Incluir aquivo de conexão
include("../../../conn.php");
 mysql_select_db('estagios');
// Recebe o valor enviado
$valor = $_GET['valor'];
 
// Procura titulos no banco relacionados ao valor
$sql = mysql_query("SELECT * FROM termo_compromisso WHERE dt_inicio LIKE '%$valor%' and classificacao_termo like 'OBRIGATORIO' ");

$resulatdo = mysql_num_rows($sql);


 
// Exibe todos os valores encontrados
if($resulatdo != 0){
  $noticias = @mysql_fetch_object($sql);




  echo utf8_encode('<br><span class="info-box-number"><center><a onclick="siim_tceano()" id="nome_tceano"> Total: ' .$resulatdo. '</a></center></span>');

$sql1 = mysql_query("SELECT * FROM termo_compromisso WHERE dt_inicio LIKE '%01-$valor%'  and classificacao_termo like 'OBRIGATORIO'");

$resulatdo1 = mysql_num_rows($sql1);

 echo utf8_encode('<span class="info-box-number"><center><a onclick="siim_tceano()" id="nome_tceano"> Janeiro: ' .$resulatdo1. '</a></center></span>');
                
$sql2 = mysql_query("SELECT * FROM termo_compromisso WHERE dt_inicio LIKE '%02-$valor%'  and classificacao_termo like 'OBRIGATORIO'");

$resulatdo2 = mysql_num_rows($sql2);

 echo utf8_encode('<span class="info-box-number"><center><a onclick="siim_tceano()" id="nome_tceano"> Fevereiro: ' .$resulatdo2. '</a></center></span>');
                
$sql3 = mysql_query("SELECT * FROM termo_compromisso WHERE dt_inicio LIKE '%03-$valor%'  and classificacao_termo like 'OBRIGATORIO'");

$resulatdo3 = mysql_num_rows($sql3);

 echo utf8_encode('<span class="info-box-number"><center><a onclick="siim_tceano()" id="nome_tceano"> Marco: ' .$resulatdo3. '</a></center></span>');
                
$sql4 = mysql_query("SELECT * FROM termo_compromisso WHERE dt_inicio LIKE '%04-$valor%'  and classificacao_termo like 'OBRIGATORIO'");

$resulatdo4 = mysql_num_rows($sql4);

 echo utf8_encode('<span class="info-box-number"><center><a onclick="siim_tceano()" id="nome_tceano"> Abril: ' .$resulatdo4. '</a></center></span>');
                
$sql5 = mysql_query("SELECT * FROM termo_compromisso WHERE dt_inicio LIKE '%05-$valor%'  and classificacao_termo like 'OBRIGATORIO'");

$resulatdo5 = mysql_num_rows($sql5);

 echo utf8_encode('<span class="info-box-number"><center><a onclick="siim_tceano()" id="nome_tceano"> Maio: ' .$resulatdo5. '</a></center></span>');
                
$sql6 = mysql_query("SELECT * FROM termo_compromisso WHERE dt_inicio LIKE '%06-$valor%'  and classificacao_termo like 'OBRIGATORIO'");

$resulatdo6 = mysql_num_rows($sql6);

 echo utf8_encode('<span class="info-box-number"><center><a onclick="siim_tceano()" id="nome_tceano"> Junho: ' .$resulatdo6. '</a></center></span>');
                
$sql7 = mysql_query("SELECT * FROM termo_compromisso WHERE dt_inicio LIKE '%07-$valor%'  and classificacao_termo like 'OBRIGATORIO'");

$resulatdo7 = mysql_num_rows($sql7);

 echo utf8_encode('<span class="info-box-number"><center><a onclick="siim_tceano()" id="nome_tceano"> Julho: ' .$resulatdo7. '</a></center></span>');
                
$sql8 = mysql_query("SELECT * FROM termo_compromisso WHERE dt_inicio LIKE '%08-$valor%'  and classificacao_termo like 'OBRIGATORIO'");

$resulatdo8 = mysql_num_rows($sql8);

 echo utf8_encode('<span class="info-box-number"><center><a onclick="siim_tceano()" id="nome_tceano"> Agosto: ' .$resulatdo8. '</a></center></span>');
                
$sql9 = mysql_query("SELECT * FROM termo_compromisso WHERE dt_inicio LIKE '%09-$valor%'  and classificacao_termo like 'OBRIGATORIO'");

$resulatdo9 = mysql_num_rows($sql9);

 echo utf8_encode('<span class="info-box-number"><center><a onclick="siim_tceano()" id="nome_tceano"> Setembro: ' .$resulatdo9. '</a></center></span>');
                
$sql10 = mysql_query("SELECT * FROM termo_compromisso WHERE dt_inicio LIKE '%10-$valor%'  and classificacao_termo like 'OBRIGATORIO'");

$resulatdo10 = mysql_num_rows($sql10);

 echo utf8_encode('<span class="info-box-number"><center><a onclick="siim_tceano()" id="nome_tceano"> Outubro: ' .$resulatdo10. '</a></center></span>');
                
$sql11 = mysql_query("SELECT * FROM termo_compromisso WHERE dt_inicio LIKE '%11-$valor%'  and classificacao_termo like 'OBRIGATORIO'");

$resulatdo11 = mysql_num_rows($sql11);

 echo utf8_encode('<span class="info-box-number"><center><a onclick="siim_tceano()" id="nome_tceano"> Novembro: ' .$resulatdo11. '</a></center></span>');

$sql12 = mysql_query("SELECT * FROM termo_compromisso WHERE dt_inicio LIKE '%12-$valor%'  and classificacao_termo like 'OBRIGATORIO'");

$resulatdo12 = mysql_num_rows($sql12);

 echo utf8_encode('<span class="info-box-number"><center><a onclick="siim_tceano()" id="nome_tceano"> Dezembro: ' .$resulatdo12. '</a></center></span>');
                
                
}
if ($resulatdo == 0) {
    echo utf8_encode('<br><center><option>INEXISTENTE!</option></center>');
  } 



// Acentuação
@header("Content-Type: text/html; charset=ISO-8859-1",true);
?>