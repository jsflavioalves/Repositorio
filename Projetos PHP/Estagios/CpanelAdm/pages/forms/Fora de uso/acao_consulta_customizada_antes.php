<?php
require('../../../conn.php');
mysql_select_db('estagios');

header("Content-type: text/html; charset=utf-8");

$dt_inicio = $_POST['dt_inicio'];
$dt_fim = $_POST['dt_fim'];
$opt = $_POST['opt'];

if($opt == "agente"){
$z = 0;
while($z <= 3){
	$ano = $dt_inicio-$z;
	echo "<p style='color: green;'>ANO: ".$ano."</p>";

	if ($dt_fim != "") {
		$busca1 = mysql_query("SELECT ag.NM_AGENTE as nome_agente,Count(tc.agente) AS nro_alunos FROM termo_compromisso tc LEFT JOIN agentes ag ON (tc.agente=ag.CD_AGENTE) WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano' AND SUBSTRING(dt_fim, 7, 4) = '$dt_fim'  GROUP BY ag.NM_AGENTE ORDER BY ag.NM_AGENTE");
	}

	elseif ($dt_fim == "") {
		$busca1 = mysql_query("SELECT ag.NM_AGENTE as nome_agente,Count(tc.agente) AS nro_alunos FROM termo_compromisso tc LEFT JOIN agentes ag ON (tc.agente=ag.CD_AGENTE) WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano' GROUP BY ag.NM_AGENTE ORDER BY ag.NM_AGENTE");
	}
	
    $total = 0;
	while($array1 = mysql_fetch_array($busca1)){
		$nome_agente = utf8_encode($array1['nome_agente']);
		$qtd = $array1['nro_alunos'];
		$total = $total + $qtd;
			
		if($nome_agente == ""){
			//$agente_nome = "OUTROS";	
			echo "OUTROS - ".$qtd."<br>";	
		}else{
			echo $nome_agente." - ".$qtd."<br>";
		}
	}

    echo "---------------------------------->>>";
    echo "<p style='color: red;'>TOTAL: ".$total."</p>";

    $z++;
}

}else if($opt == "tipo_termo"){

$z = 0;
while($z <= 3){
	$ano = $dt_inicio-$z;
	echo "<p style='color: green;'>ANO: ".$ano."</p>";
	
	if ($dt_fim != "") {
		$busca2 = mysql_query("SELECT * FROM termo_compromisso WHERE SUBSTRING(dt_inicio, 7, 4) >= '$ano' AND SUBSTRING(dt_fim, 7, 4) <= '$dt_fim' AND tipo_termo LIKE 'T.A'");
	}
	
	elseif ($dt_fim == "") {
		$busca2 = mysql_query("SELECT * FROM termo_compromisso WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano'  AND tipo_termo = 'T.A'");
	}
	
	$conta2 = mysql_num_rows($busca2);

    if ($dt_fim != "") {
		$busca3 = mysql_query("SELECT * FROM termo_compromisso WHERE SUBSTRING(dt_inicio, 7, 4) >= '$ano' AND SUBSTRING(dt_fim, 7, 4) <= '$dt_fim' AND tipo_termo LIKE 'T.C'");
	}
	
	elseif ($dt_fim == "") {
		$busca3 = mysql_query("SELECT * FROM termo_compromisso WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano' AND tipo_termo = 'T.C'");
		$busca4 = mysql_query("SELECT * FROM termo_compromisso WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano' AND tipo_termo != 'T.C' AND tipo_termo != 'T.A'");
     }

	$conta3 = mysql_num_rows($busca3);
	$conta4 = mysql_num_rows($busca4);
    $total = $conta2 + $conta3 + $conta4;

		echo "TERMO ADITIVO - ".$conta2;
		echo "<br>";
		echo "TERMO DE COMPROMISSO - ".$conta3;
		echo "<br>";
		echo "OUTROS - ".$conta4;
	    echo "<p style='color: red;'>TOTAL: ".$total."</p>";

	$z++;
}

}else if($opt == "mes"){

$z = 0;
while($z <= 3){
	$ano = $dt_inicio-$z;
	echo "<p style='color: green;'>ANO: ".$ano."</p>";

// BLOCO DO OBRIGATÓRIO
	$x = 1;
	$total1 = 0;
	$total2 = 0;
	$total_geral = 0;
	while($x <= 12){
		$meses = array(1 => "JANEIRO", 2 => "FEVEREIRO", 3 => "MARÇO", 4 => "ABRIL", 5 => "MAIO", 6 => "JUNHO", 7 => "JULHO", 8 => "AGOSTO", 9 => "SETEMBRO", 10 => "OUTUBRO", 11 => "NOVEMBRO", 12 => "DEZEMBRO");

		if($x <= 9){
			$sql1 = mysql_query("SELECT * FROM termo_compromisso WHERE dt_inicio LIKE '%0$x-$ano%' OR dt_inicio LIKE '%0$x/$ano%'");
			$conta = mysql_num_rows($sql1);
			echo $meses[$x]." - ".$conta."<br>";	
			$x++;
			$total1 = $total1+$conta;
		} else if($x > 9){
			$sql2 = mysql_query("SELECT * FROM termo_compromisso WHERE dt_inicio LIKE '%$x-$ano%' OR dt_inicio LIKE '%$x/$ano%'");
			$conta2 = mysql_num_rows($sql2);
			echo $meses[$x]." - ".$conta2."<br>";	
			$x++;
			$total2 = $total2+$conta2;
		}

	}	
		$total_geral = $total1+$total2;
		echo "<p style='color: red;'>TOTAL: ".$total_geral."</p>";

// FIM DO WHILE PRINCIPAL - REPETIÇÃO DE ANOS
	$z++;
}


}else if($opt == "curso"){
$z = 0;
while($z <= 3){
	$ano = $dt_inicio-$z;
	echo "<p style='color: green;'>ANO: ".$ano."</p>";

	if($dt_fim != ""){
		$busca1 = mysql_query("SELECT tc.id_curso as id_curso, cur.curso as nome_curso,Count(tc.id_curso) AS nro_alunos FROM termo_compromisso tc LEFT JOIN cursos cur ON (tc.id_curso=cur.id_curso) WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano' AND SUBSTRING(dt_fim, 7, 4) = '$dt_fim' GROUP BY cur.curso ORDER BY cur.curso");
	} else if($dt_fim == ""){
		$busca1 = mysql_query("SELECT tc.id_curso as id_curso, cur.curso as nome_curso,Count(tc.id_curso) AS nro_alunos FROM termo_compromisso tc LEFT JOIN cursos cur ON (tc.id_curso=cur.id_curso) WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano' GROUP BY cur.curso ORDER BY cur.curso");
	}
	$total = 0;
	while($array = mysql_fetch_array($busca1)){
		$nome_curso = $array['nome_curso'];	
		$id_curso = $array['id_curso'];
		$nro_alunos = $array['nro_alunos'];
		$total = $total + $nro_alunos;
			
		if($array['id_curso'] == 0){
			echo "OUTROS: ".$nro_alunos."<br>";
		}else{
			echo utf8_encode($array['nome_curso']).": ".$nro_alunos."<br>";
		}
	}
		echo "<p style='color: red;'>TOTAL: ".$total."</p>";

		$z++;
}

}else if($opt == "centro"){

$z = 0;
while($z <= 3){
	$ano = $dt_inicio-$z;
	echo "<p style='color: green;'>ANO: ".$ano."</p>";

	if($dt_fim != ""){
		$busca6 = mysql_query("SELECT cent.NM_CENTRO as nome_centro, cur.id_curso as id_centro,Count(tc.id_curso) AS nro_alunos FROM termo_compromisso tc LEFT JOIN cursos cur ON (tc.id_curso=cur.id_curso) LEFT JOIN centros cent ON (cur.id_centro=cent.CD_CENTRO) WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano' AND
			SUBSTRING(dt_fim, 7, 4) = '$dt_fim' GROUP BY cent.NM_CENTRO ORDER BY cent.NM_CENTRO");
	} else if($dt_fim == ""){
		$busca6 = mysql_query("SELECT cent.NM_CENTRO as nome_centro, cur.id_curso as id_centro,Count(tc.id_curso) AS nro_alunos FROM termo_compromisso tc LEFT JOIN cursos cur ON (tc.id_curso=cur.id_curso) LEFT JOIN centros cent ON (cur.id_centro=cent.CD_CENTRO) WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano' GROUP BY cent.NM_CENTRO ORDER BY cent.NM_CENTRO");
	}
	$total = 0;
	while($array6 = mysql_fetch_array($busca6)){
		$nome_centro = $array6['nome_centro'];
		$nro_alunos = $array6['nro_alunos'];
		$total = $total + $nro_alunos;

		if($array6['nome_centro'] == NULL){
			echo "OUTROS: ".$nro_alunos."<br>";
		}else{
			echo utf8_encode($array6['nome_centro']).": ".$nro_alunos."<br>";
		}
	}
		echo "<p style='color: red;'>TOTAL: ".$total."</p><br>";

		$z++;
}
		
}else if($opt == "total_bolsa"){
// FALTA FORMATAR O NÚMERO
$z = 0;
while($z <= 3){
	$ano = $dt_inicio-$z;
	echo "<p style='color: green;'>ANO: ".$ano."</p>";

	if($dt_fim != ""){
		$busca9 = mysql_query("SELECT classificacao_termo AS classificacao_termo, SUM(valor) FROM termo_compromisso WHERE dt_inicio LIKE '%$ano%' AND dt_fim LIKE '%$dt_fim%' GROUP BY classificacao_termo ");
  	}else if($dt_fim == ""){
  		$busca9 = mysql_query("SELECT classificacao_termo AS classificacao_termo, SUM(valor) AS soma_valores FROM termo_compromisso WHERE dt_inicio LIKE '%$ano%' GROUP BY classificacao_termo  ");
  	}

  	$total_obrigatorio = 0;
  	$total_n_obrigatorio = 0;
  	$total_geral = 0;
	while($array = mysql_fetch_array($busca9)){
		$classificacao_termo = utf8_encode($array['classificacao_termo']);
		$valor = $array['soma_valores'];

		if($classificacao_termo == ""){
			$classificacao_termo = "OBRIGATORIO";
		}
		if($classificacao_termo == "OBRIGATORIO" || $classificacao_termo == "OBRIGATÓRIO"){
			$total_obrigatorio = $total_obrigatorio+$valor;
		} else if($classificacao_termo == "NÃO OBRIGATORIO" || $classificacao_termo == "NAO OBRIGATORIO" || $classificacao_termo == "NÃO OBRIGATÓRIO"){
			$total_n_obrigatorio = $total_n_obrigatorio+$valor;
		}

	}
		echo "OBRIGATÓRIO".": R$ ".$total_obrigatorio."<br>";
		echo "NÃO OBRIGATÓRIO".": R$ ".$total_n_obrigatorio."<br>";

		$total_geral = $total_obrigatorio+$total_n_obrigatorio;

		echo "<p style='color: red;'>TOTAL: R$ ".$total_geral."</p>";

		echo "--------------------------------------------------------------------------------->>>";

	$z++;
}


}else if($opt == "erro_bolsa"){
	$x = 100.00;
	$busca = mysql_query("SELECT tc.matricula_aluno as matricula_aluno, tc.valor as valor_bolsa FROM termo_compromisso tc WHERE tc.valor<$x AND SUBSTRING(dt_inicio, 7, 4) = '$dt_inicio' ORDER BY tc.valor DESC");
	$total = mysql_num_rows($busca);
	
	while($array = mysql_fetch_array($busca)){
		//$nome_aluno = utf8_encode($array['nome_aluno']);
		$matricula_aluno = $array['matricula_aluno'];
		$valor = $array['valor_bolsa'];

		/*if($nome_aluno == ""){	
			$nome_aluno = "SEM NOME";
		}*/
		if($matricula_aluno == ""){
			$matricula_aluno = "SEM MATRÍCULA";
		}
		
		//echo "ALUNO: ".$nome_aluno."<br>";
		echo "MATRÍCULA: ".$matricula_aluno."<br>";
		echo "VALOR DA BOLSA: ".$valor."<br><br>";

	}

		echo "<p style='color: red;'>TOTAL:".$total."</p>";

}else if($opt == "classificacao"){

$z = 0;
while($z <= 3){
	$ano = $dt_inicio-$z;
	echo "<p style='color: green;'>ANO: ".$ano."</p>";

	if($dt_fim != ""){
		$busca9 = mysql_query("SELECT * FROM termo_compromisso WHERE dt_inicio LIKE '%$ano%' AND dt_fim LIKE '%$dt_fim%' AND classificacao_termo LIKE 'OBRIGATORIO' ");
  		$busca10 = mysql_query("SELECT * FROM termo_compromisso WHERE dt_inicio LIKE '%$ano%' AND dt_fim LIKE '%$dt_fim%' AND classificacao_termo != 'OBRIGATORIO' ");
  	}else if($dt_fim == ""){
  		$busca9 = mysql_query("SELECT * FROM termo_compromisso WHERE dt_inicio LIKE '%$ano%' AND classificacao_termo LIKE 'OBRIGATORIO' ");
  		$busca10 = mysql_query("SELECT * FROM termo_compromisso WHERE dt_inicio LIKE '%$ano%' AND classificacao_termo != 'OBRIGATORIO' ");
  	}
  	$conta9 = mysql_num_rows($busca9);
	$conta10 = mysql_num_rows($busca10);
	$total = $conta9+$conta10;

	  	echo "OBRIGATÓRIO - ".$conta9;
	  	echo "<br>";
	  	echo "NÃO OBRIGATÓRIO - ".$conta10;
	  	echo "<br>";
	  	echo "<p style='color: red;'>TOTAL: ".$total."</p><br>";

	$z++;
}

}else if($opt == "classificacao_mes"){

// WHILE PRINCIPAL - REPETIÇÃO DE ANOS 
$z = 0;
while($z <= 3){
	$ano = $dt_inicio-$z;
	echo "<p style='color: green;'>ANO: ".$ano."</p>";

// BLOCO DO OBRIGATÓRIO
  	echo "<p style='color: blue;'>OBRIGATÓRIO: "."</p>";
	$x = 1;
	$total1 = 0;
	$total2 = 0;
	while($x <= 12){
		$meses = array(1 => "JANEIRO", 2 => "FEVEREIRO", 3 => "MARÇO", 4 => "ABRIL", 5 => "MAIO", 6 => "JUNHO", 7 => "JULHO", 8 => "AGOSTO", 9 => "SETEMBRO", 10 => "OUTUBRO", 11 => "NOVEMBRO", 12 => "DEZEMBRO");

		if($x <= 9){
			$sql1 = mysql_query("SELECT * FROM termo_compromisso WHERE classificacao_termo LIKE 'OBRIGATORIO' AND dt_inicio LIKE '%0$x-$ano%' OR dt_inicio LIKE '%0$x/$ano%'");
			$conta = mysql_num_rows($sql1);
			echo $meses[$x]." - ".$conta."<br>";	
			$x++;
			$total1 = $total1+$conta;
		} else if($x > 9){
			$sql2 = mysql_query("SELECT * FROM termo_compromisso WHERE classificacao_termo LIKE 'OBRIGATORIO' AND dt_inicio LIKE '%$x-$ano%' OR dt_inicio LIKE '%$x/$ano%'");
			$conta2 = mysql_num_rows($sql2);
			echo $meses[$x]." - ".$conta2."<br>";	
			$x++;
			$total2 = $total2+$conta2;
		}

	}	
			$total_obrigatorio = $total1+$total2;
			echo "<p style='color: red;'>TOTAL OBRIGATÓRIO: ".$total_obrigatorio."</p>";
		

// BLOCO DO NÃO OBRIGATÓRIO
  	echo "<p style='color: blue;'>NÃO OBRIGATÓRIO: "."</p>";
	$y = 1;
	$total3 = 0;
	$total4 = 0;
	while($y <= 12){
		$meses = array(1 => "JANEIRO", 2 => "FEVEREIRO", 3 => "MARÇO", 4 => "ABRIL", 5 => "MAIO", 6 => "JUNHO", 7 => "JULHO", 8 => "AGOSTO", 9 => "SETEMBRO", 10 => "OUTUBRO", 11 => "NOVEMBRO", 12 => "DEZEMBRO");

		if($y <= 9){
			$sql3 = mysql_query("SELECT * FROM termo_compromisso WHERE classificacao_termo != 'OBRIGATORIO' AND dt_inicio LIKE '%0$y-$ano%' OR dt_inicio LIKE '%0$y/$ano%'");
			$conta3 = mysql_num_rows($sql3);
			echo $meses[$y]." - ".$conta3."<br>";	
			$y++;
			$total3 = $total3+$conta3;
		} else if($y > 9){
			$sql4 = mysql_query("SELECT * FROM termo_compromisso WHERE classificacao_termo != 'OBRIGATORIO' AND dt_inicio LIKE '%$y-$ano%' OR dt_inicio LIKE '%$y/$ano%'");
			$conta4 = mysql_num_rows($sql4);
			echo $meses[$y]." - ".$conta4."<br>";	
			$y++;
			$total4 = $total4+$conta4;
		}
		
	}
		$total_nao_obrigatorio = $total3+$total4;
		echo "<p style='color: red;'>TOTAL NÃO OBRIGATÓRIO: ".$total_nao_obrigatorio."</p>";

		$total_geral = $total_obrigatorio+$total_nao_obrigatorio;
		echo "<p>TOTAL GERAL: ".$total_geral."</p>";

// FIM DO WHILE PRINCIPAL - REPETIÇÃO DE ANOS
	$z++;
}

}else if($opt == "empresa"){

$z = 0;
while($z <= 3){
	$ano = $dt_inicio-$z;
	echo "<p style='color: green;'>ANO: ".$ano."</p>";

	if($dt_fim != ""){
		$busca1 = mysql_query("SELECT emp.nome AS nome_empresa, Count(tc.nome) AS qtd FROM termo_compromisso tc LEFT JOIN empresas emp ON (tc.nome=emp.CD_EMPRESA) WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano' AND SUBSTRING(dt_fim, 7, 4) = '$dt_fim' GROUP BY emp.nome ORDER BY emp.nome");
	} else if($dt_fim == ""){
		$busca1 = mysql_query("SELECT emp.nome AS nome_empresa, Count(tc.nome) AS qtd FROM termo_compromisso tc LEFT JOIN empresas emp ON (tc.nome=emp.CD_EMPRESA) WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano' GROUP BY emp.nome ORDER BY emp.nome");
	}
	$total = 0;
	while($array = mysql_fetch_array($busca1)){
		$nome_empresa = utf8_encode($array['nome_empresa']);
		$qtd = $array['qtd'];
		$total = $total+$qtd;

		if($nome_empresa == NULL){
			echo "OUTROS: ".$qtd."<br>";
		}else{
			echo "EMPRESA: ".$nome_empresa." - ".$qtd."<br>";
		}
	}
		echo "<p style='color: red;'>TOTAL: ".$total."</p><br>";
	
		$z++;
}

}else if($opt == "tipo_empresa"){

$z = 0;
while($z <= 3){
	$ano = $dt_inicio-$z;
	echo "<p style='color: green;'>ANO: ".$ano."</p>";

	if($dt_fim != ""){
		$busca6 = mysql_query("SELECT tipo.nome as tipo_empresa,Count(tipo.id_tipo_empresa) AS qtd FROM termo_compromisso tc LEFT JOIN empresas emp ON (tc.nome=emp.CD_EMPRESA) LEFT JOIN tipo_empresa tipo ON (emp.CD_TIPO=tipo.id_tipo_empresa) WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano' AND
			SUBSTRING(dt_fim, 7, 4) = '$dt_fim' GROUP BY tipo.nome ORDER BY tipo.nome");
	} else if($dt_fim == ""){
		$busca6 = mysql_query("SELECT tipo.nome as tipo_empresa,Count(tipo.id_tipo_empresa) AS qtd FROM termo_compromisso tc LEFT JOIN empresas emp ON (tc.nome=emp.CD_EMPRESA) LEFT JOIN tipo_empresa tipo ON (emp.CD_TIPO=tipo.id_tipo_empresa) WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano' GROUP BY tipo.nome ORDER BY tipo.nome");
	}
	
	$total = 0;
	while($array = mysql_fetch_array($busca6)){
		$tipo_empresa = utf8_encode($array['tipo_empresa']);
		$qtd = $array['qtd'];
		$total = $total+$qtd;

		if($tipo_empresa == NULL){
			echo "OUTROS: ".$qtd."<br>";
		}else{
			echo $tipo_empresa." - ".$qtd."<br>";
		}
	}
		echo "<p style='color: red;'>TOTAL: ".$total."</p><br>";

		$z++;
}

}else if($opt == "top_10_empresas"){

$z = 0;
while($z <= 3){
	$ano = $dt_inicio-$z;
	echo "<p style='color: green;'>ANO: ".$ano."</p>";

	if($dt_fim != ""){
		$busca1 = mysql_query("SELECT emp.nome AS nome_empresa, Count(tc.nome) AS qtd FROM termo_compromisso tc LEFT JOIN empresas emp ON (tc.nome=emp.CD_EMPRESA) WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano' AND SUBSTRING(dt_fim, 7, 4) = '$dt_fim' GROUP BY emp.nome ORDER BY qtd DESC LIMIT 0,10");
	} else if($dt_fim == ""){
		$busca1 = mysql_query("SELECT emp.nome AS nome_empresa, Count(tc.nome) AS qtd FROM termo_compromisso tc LEFT JOIN empresas emp ON (tc.nome=emp.CD_EMPRESA) WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano' GROUP BY emp.nome ORDER BY qtd DESC LIMIT 0,10");
	}

	$nome_emp_dif = "x";
	$a = 1;
	while($array = mysql_fetch_array($busca1) AND $a <= 10){
		$nome_empresa = utf8_encode($array['nome_empresa']);
		$qtd = $array['qtd'];

		echo "<p style='color: blue;'>".$a."º LUGAR:</p>";		
		if($nome_emp_dif != $nome_empresa){
			if($nome_empresa == NULL){
				echo "OUTROS: ".$qtd."<br>";
			}else{
				echo "EMPRESA: ".$nome_empresa." - ".$qtd."<br>";
			}
		}else{

		}

		$nome_emp_dif = $nome_empresa;
		$a++;
	}
	echo "--------------------------------------------------------------------------------->>>";

	$z++;
}
}else if($opt == "top_10_emp_nao_obrig"){

$z = 0;
while($z <= 3){
	$ano = $dt_inicio-$z;
	echo "<p style='color: green;'>ANO: ".$ano."</p>";

	if($dt_fim != ""){
		$busca1 = mysql_query("SELECT emp.nome AS nome_empresa, Count(tc.nome) AS qtd FROM termo_compromisso tc LEFT JOIN empresas emp ON (tc.nome=emp.CD_EMPRESA) WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano' AND SUBSTRING(dt_fim, 7, 4) = '$dt_fim' AND classificacao_termo LIKE '%N%' GROUP BY emp.nome ORDER BY qtd DESC LIMIT 0,10");
	} else if($dt_fim == ""){
		$busca1 = mysql_query("SELECT emp.nome AS nome_empresa, Count(tc.nome) AS qtd, classificacao_termo FROM termo_compromisso tc LEFT JOIN empresas emp ON (tc.nome=emp.CD_EMPRESA) WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano' AND classificacao_termo != 'OBRIGATORIO' GROUP BY emp.nome ORDER BY qtd DESC LIMIT 0,10");
	}

	$nome_emp_dif = "x";
	$a = 1;
	while($array = mysql_fetch_array($busca1) AND $a <= 10){
		$nome_empresa = utf8_encode($array['nome_empresa']);
		$qtd = $array['qtd'];
		$classificacao_termo = $array['classificacao_termo'];
		
		echo "<p style='color: blue;'>".$a."º LUGAR:</p>";		
		if($nome_emp_dif != $nome_empresa){
			if($nome_empresa == NULL){
				echo "OUTROS: ".$qtd."<br>";
			}else{
				echo "EMPRESA: ".$nome_empresa." - ".$qtd."<br>";
			}
		}else{

		}

		$nome_emp_dif = $nome_empresa;
		$a++;
	}
	echo "--------------------------------------------------------------------------------->>>";

	$z++;
}

}else if($opt == "top_10_cursos"){

$z = 0;
while($z <= 3){
	$ano = $dt_inicio-$z;
	echo "<p style='color: green;'>ANO: ".$ano."</p>";

	if($dt_fim != ""){
		$busca1 = mysql_query("SELECT cur.curso AS nome_curso, Count(tc.id_curso) AS qtd FROM termo_compromisso tc LEFT JOIN cursos cur ON (tc.id_curso=cur.id_curso) WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano' AND SUBSTRING(dt_fim, 7, 4) = '$dt_fim' GROUP BY cur.curso ORDER BY qtd DESC LIMIT 0,10");
	} else if($dt_fim == ""){
		$busca1 = mysql_query("SELECT cur.curso AS nome_curso, Count(tc.id_curso) AS qtd FROM termo_compromisso tc LEFT JOIN cursos cur ON (tc.id_curso=cur.id_curso) WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano' GROUP BY cur.curso ORDER BY qtd DESC LIMIT 0,10");
	}

	$nome_curso_dif = "x";
	$a = 1;
	while($array = mysql_fetch_array($busca1) AND $a <= 10){
		$nome_curso = utf8_encode($array['nome_curso']);
		$qtd = $array['qtd'];

		echo "<p style='color: blue;'>".$a."º LUGAR:</p>";		
		if($nome_curso_dif != $nome_curso){
			if($nome_curso == NULL){
				echo "OUTROS: ".$qtd."<br>";
			}else{
				echo "CURSO: ".$nome_curso." - ".$qtd."<br>";
			}
		}else{

		}

		$nome_curso_dif = $nome_curso;
		$a++;
	}
	echo "--------------------------------------------------------------------------------->>>";

	$z++;
}

}
?>
