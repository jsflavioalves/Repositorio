<?php
require('../../../conn.php');
mysql_select_db('estagios');

header("Content-type: text/html; charset=utf-8");

$dt_inicio = $_POST['data'];
$opt = $_POST['opt'];

if($opt == "centro"){

$z = 0;
while($z <= 3){
	$ano = $dt_inicio-$z;
	echo "<p style='color: green;'>ANO: ".$ano."</p>";


	$busca1 = mysql_query("SELECT cent.NM_CENTRO AS nome_centro, Count( vg.CD_CENTRO ) AS quant FROM vagas_estagios vg LEFT JOIN centros cent ON ( vg.CD_CENTRO = cent.CD_CENTRO ) WHERE SUBSTRING( data, 7, 4 ) = '$ano' GROUP BY cent.NM_CENTRO ORDER BY cent.NM_CENTRO");
	
	$total = 0;
	while($array1 = mysql_fetch_array($busca1)){
		$nome_centro = $array1['nome_centro'];
		$quantidade = $array1['quant'];
		$total = $total + $quantidade;
		if($nome_centro ==  ""){
			echo "OUTROS - ".$quantidade."<br>";
		}else{
			echo utf8_encode($nome_centro." - ".$quantidade."<br>");
		}
	}
		echo "<p style='color: red;'>TOTAL: ".$total."</p><br>";
	$z++;
}

} else if($opt == "ano"){

$z = 0;
while($z <= 3){
	$ano = $dt_inicio-$z;
	echo "<p style='color: green;'>ANO: ".$ano."</p>";

$x = 1;
$total = 0;
while($x <= 12){
	$meses = array(1 => "JANEIRO", 2 => "FEVEREIRO", 3 => "MARÇO", 4 => "ABRIL", 5 => "MAIO", 6 => "JUNHO", 7 => "JULHO", 8 => "AGOSTO", 9 => "SETEMBRO", 10 => "OUTUBRO", 11 => "NOVEMBRO", 12 => "DEZEMBRO");

	if($x <= 9){
		$sql1 = mysql_query("SELECT * FROM vagas_estagios WHERE data LIKE '%0$x-$ano%' OR data LIKE '%0$x/$ano%'");
		$conta = mysql_num_rows($sql1);
		echo $meses[$x]." - ".$conta."<br>";	
		$x++;
	} else if($x > 9){
		$sql1 = mysql_query("SELECT * FROM vagas_estagios WHERE data LIKE '%$x-$ano%' OR data LIKE '%$x/$ano%'");
		$conta = mysql_num_rows($sql1);
		echo $meses[$x]." - ".$conta."<br>";	
		$x++;
	}

		$total = $total + $conta;

	}

		echo "<p style='color: red;'>TOTAL: ".$total."</p><br>";

	$z++;
}

} 

?>