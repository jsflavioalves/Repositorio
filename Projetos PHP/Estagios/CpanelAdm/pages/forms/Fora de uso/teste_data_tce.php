<?

/*

Retorna diferença entre as datas em Dias, Horas ou Minutos

Function Diferenca(data maior, [data menos],[dias horas ou minutos])

Primeiro parametro, Data de inicio, no formato 04/05/2006 12:00
Se não passado o seundo parametro, dá o valor da data atual
Terceiro parametro, diferença a ser retornada:

 "m" Minútos
 "H" Horas
 "h": Horas arredondada
 "D": Dias 
 "d": Dias arredontados

*/

Function Diferenca($data1, $data2="",$tipo=""){

if($data2==""){
$data2 = date("d/m/Y H:i");
}

if($tipo==""){
$tipo = "h";
}

for($i=1;$i<=2;$i++){
${"dia".$i} = substr(${"data".$i},0,2);
${"mes".$i} = substr(${"data".$i},3,2);
${"ano".$i} = substr(${"data".$i},6,4);
${"horas".$i} = substr(${"data".$i},11,2);
${"minutos".$i} = substr(${"data".$i},14,2);
}

$segundos = mktime($horas2,$minutos2,0,$mes2,$dia2,$ano2)-mktime($horas1,$minutos1,0,$mes1,$dia1,$ano1);

	switch($tipo){

 		case "m": $difere = $segundos/60;	break;
 		case "H": $difere = $segundos/3600;	break;
 		case "h": $difere = round($segundos/3600);	break;
 		case "D": $difere = $segundos/86400;	break;
 		case "d": $difere = round($segundos/86400);	break;
 
}

return $difere;

}

Function verifica(){
	echo "SOMA DOS PERÍODOS DE ESTÁGIO NESTA EMPRESA MAIOR DO QUE 2 ANOS!";
}


$data1 = "18/01/2016";
$data2 = "18/05/2016";

$diferenca = Diferenca($data1,$data2,"d");
echo $diferenca;
echo " dias.<br>";

if($diferenca > 730){
	verifica();
}

?>