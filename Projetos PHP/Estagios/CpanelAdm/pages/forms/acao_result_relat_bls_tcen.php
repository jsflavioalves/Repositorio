

<?
function mask($val, $mask)
{
 $maskared = '';
 $k = 0;
 for($i = 0; $i<=strlen($mask)-1; $i++)
 {
 if($mask[$i] == '#')
 {
 if(isset($val[$k]))
 $maskared .= $val[$k++];
 }
 else
 {
 if(isset($mask[$i]))
 $maskared .= $mask[$i];
 }
 }
 return $maskared;
}
 
?>

<?php
// Incluir aquivo de conexão

include("../../../conn.php");
 mysql_select_db('estagios');
// Recebe o valor enviado
$valor = $_GET['valor'];
 
// Procura titulos no banco relacionados ao valor
$sql = mysql_query("SELECT SUM(Replace(valor,'.','')) valor_total FROM termo_compromisso where dt_inicio like '%$valor%' and classificacao_termo != 'OBRIGATORIO' ");

$resulatdo = mysql_num_rows($sql);


 
// Exibe todos os valores encontrados
if($resulatdo != 0){
  $noticias =mysql_fetch_array($sql);

 $vlr_t=$noticias['valor_total'];


if($vlr_t<1){

  echo utf8_encode('<br><span class="info-box-number"><center><a onclick="siim_tceano()" id="nome_tceano">R$'); echo mask ($vlr_t,'0,00'); echo utf8_encode('</a></center></span>');

}

elseif($vlr_t<100000){

  echo utf8_encode('<br><span class="info-box-number"><center><a onclick="siim_tceano()" id="nome_tceano">R$'); echo mask ($vlr_t,'#,##'); echo utf8_encode('</a></center></span>');

}
elseif($vlr_t<1000000){

  echo utf8_encode('<br><span class="info-box-number"><center><a onclick="siim_tceano()" id="nome_tceano">R$'); echo mask ($vlr_t,'##,##'); echo utf8_encode('</a></center></span>');

}
elseif($vlr_t<10000000){

  echo utf8_encode('<br><span class="info-box-number"><center><a onclick="siim_tceano()" id="nome_tceano">R$'); echo mask ($vlr_t,'###,##'); echo utf8_encode('</a></center></span>');

}
elseif($vlr_t<100000000){

  echo utf8_encode('<br><span class="info-box-number"><center><a onclick="siim_tceano()" id="nome_tceano">R$'); echo mask ($vlr_t,'#.###,##'); echo utf8_encode('</a></center></span>');

} 
elseif($vlr_t<1000000000){

 echo utf8_encode('<br><span class="info-box-number"><center><a onclick="siim_tceano()" id="nome_tceano">R$'); echo mask ($vlr_t,'##.###,##'); echo utf8_encode('</a></center></span>');

} 
elseif($vlr_t<10000000000){
echo utf8_encode('<br><span class="info-box-number"><center><a onclick="siim_tceano()" id="nome_tceano">R$'); echo mask ($vlr_t,'###.###,##'); echo utf8_encode('</a></center></span>');

} 
elseif($vlr_t<100000000000){

	echo utf8_encode('<br><span class="info-box-number"><center><a onclick="siim_tceano()" id="nome_tceano">R$'); echo mask ($vlr_t,'#.###.###,##'); echo utf8_encode('</a></center></span>');
}
elseif($vlr_t<1000000000000){

	echo utf8_encode('<br><span class="info-box-number"><center><a onclick="siim_tceano()" id="nome_tceano">R$');echo mask ($vlr_t,'##.###.###,##'); echo utf8_encode('</a></center></span>');
}
}
if ($resulatdo == 0) {
    echo utf8_encode('<br><center><option>INEXISTENTE!</option></center>');
  } 



// Acentuação
@header("Content-Type: text/html; charset=ISO-8859-1",true);
?>