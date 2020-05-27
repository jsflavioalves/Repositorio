<?php
require('../../../conn.php');
mysql_select_db('estagios');

header("Content-type: text/html; charset=utf-8");

$dt_inicio = $_POST['dt_inicio'];
$opt = $_POST['opt'];

if($opt == "emp_cnpj"){
	$x = "";
	$busca_empresas = mysql_query("SELECT * FROM empresas WHERE cnpj = '$x' ORDER BY nome ASC");
	$conta = mysql_num_rows($busca_empresas);
			echo "<p style='color: red;'>EMPRESAS SEM CNPJ"."<p>";
		while($array1 = mysql_fetch_array($busca_empresas)){
			echo "NOME: ".utf8_encode($array1['nome'])."<br>";
		}
	
	echo "<p style='color: red;'>TOTAL: ".$conta."</p>";

} else if($opt == "emp_duplicadas"){
	$busca1 = mysql_query("SELECT cnpj, Count(*) FROM empresas GROUP BY cnpj HAVING Count(*) > 1");
	$conta = mysql_num_rows($busca1);
	while ($array = mysql_fetch_array($busca1)) {
		$cnpj = $array['cnpj'];
		$qtd = $array['Count(*)'];
		if($cnpj == ""){
			$qtd = 0;
		} else{
		echo "<p style='color: red;'>CNPJ DUPLICADO: ".$cnpj."</p>";
		$busca_nome = mysql_query("SELECT * FROM empresas WHERE cnpj LIKE '$cnpj'");
			while ($array2 = mysql_fetch_array($busca_nome)) {	
				$nome_empresa = utf8_encode($array2['nome']);
				echo "EMPRESA: ".$nome_empresa."<br>";
			}
		echo "<br>SUB-TOTAL: ".$qtd."<br>"; 
		}
	}

		echo "<p style='color: blue;'>TOTAL: ".$conta."</p>";
	
} else if($opt == "conv_duplicados"){
	$busca1 = mysql_query("SELECT NR_PROCESSO, Count(*) FROM termo_convenio GROUP BY NR_PROCESSO HAVING Count(*) > 1");
	$conta = mysql_num_rows($busca1);
	$total = "0";
	while ($array = mysql_fetch_array($busca1)) {
		$processo = $array['NR_PROCESSO'];
		$qtd = $array['Count(*)'];
		$total = $total+$qtd;
		echo "<p style='color: red;'>PROCESSO DUPLICADO: ".$processo."</p>";
		$busca_processo = mysql_query("SELECT * FROM termo_convenio WHERE NR_PROCESSO LIKE '$processo'");
		$conta = mysql_num_rows($busca_processo);				
		echo "SUB-TOTAL: ".$qtd."<br>"; 
	}

		echo "<p style='color: blue;'>TOTAL GERAL: ".$total."</p>";

} else if($opt == "alunos_duplicados"){
	
	$consulta = mysql_query("SELECT matricula, Count(*) FROM alunos GROUP BY matricula HAVING Count(*) > 1");
	$conta = mysql_num_rows($consulta);
	
	while($array = mysql_fetch_array($consulta)){
		$matricula = $array['matricula'];
	
		echo "<p style='color: red;'>MATRÍCULA: ".$matricula."</p>";
	
		$consulta2 = mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$matricula'");
	
		while($array2 = mysql_fetch_array($consulta2)){
			echo "ALUNO: ".utf8_encode($array2['nome'])."<br>";	
		}
		
	}
	echo "<p style='color: blue;'>TOTAL: ".$conta."</p>";

}
	
?>
