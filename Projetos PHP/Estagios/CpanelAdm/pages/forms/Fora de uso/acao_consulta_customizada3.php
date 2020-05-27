<?php
require('../../../conn.php');
mysql_select_db('estagios');

header("Content-type: text/html; charset=utf-8");

$dt_inicio = $_POST['dt_inicio'];
$opt = $_POST['opt'];
$id_curso = $_POST['escolha_curso'];

if($opt == "relacao_alunos"){
$z = 0;
while($z <= 3){
	$ano = $dt_inicio-$z;
	echo "<p style='color: green;'>ANO: ".$ano."</p>";

	$busca1 = mysql_query("SELECT emp.nome as nome_empresa,Count(tc.matricula_aluno) AS nro_alunos FROM termo_compromisso tc LEFT JOIN empresas emp  ON (tc.nome=emp.cd_empresa)  WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano' GROUP BY emp.nome ORDER BY emp.nome ");
	
	$total = 0;
	while($array = mysql_fetch_array($busca1)){
		$CD_EMPRESA = $array['nome_empresa'];
		$nro_alunos = $array['nro_alunos'];
		$total = $total + $nro_alunos;
			
		if($array['nome_empresa'] ==  ""){
			echo "OUTROS: ".$nro_alunos."<br>";
		}else{
			echo utf8_encode($array['nome_empresa']).": ".$nro_alunos."<br>";
		}
	}
		echo "<p style='color: red;'>TOTAL: ".$total."</p>";
		echo "--------------------------------------------------------------------------------->>>";

	$z++;
}

} else if($opt == "emp_curso"){
	$busca11 = mysql_query("SELECT emp.nome as nome_empresa, cur.curso as nome_curso,Count(tc.matricula_aluno) AS nro_alunos FROM termo_compromisso tc LEFT JOIN empresas emp ON (tc.nome=emp.cd_empresa) LEFT JOIN cursos cur ON (tc.id_curso=cur.id_curso) WHERE SUBSTRING(dt_inicio, 7, 4) = '$dt_inicio' GROUP BY emp.nome,cur.curso ORDER BY emp.nome,cur.curso");

	
	$nome_empresa_dif = "";
	while($array11 = mysql_fetch_array($busca11)){
		$nome_empresa = $array11['nome_empresa'];
		$nome_curso = $array11['nome_curso'];
		$quantidade_alunos = $array11['nro_alunos'];
		$total = $total + $quantidade_alunos;

		if($nome_empresa == ""){
			echo "<p style='color: blue;'>OUTRAS EMPRESAS: ".$quantidade_alunos."<p>";
		}else if($nome_curso == ""){ 
			echo "<p style='color: blue; padding-left: 15px;'>OUTROS CURSOS: ".$quantidade_alunos."<p>";
		}else{
			if($nome_empresa_dif != $nome_empresa){
				echo utf8_encode("<p style='color: red;'>EMPRESA: ".$nome_empresa)."</p>";	
			}
			echo utf8_encode("<p style='padding-left: 15px;'>CURSO: ".$nome_curso)." = ".$quantidade_alunos."</p>";
		}

		$nome_empresa_dif = $nome_empresa;

		/*
		if($nome_curso == ""){
			echo "OUTROS CURSOS: ".$quantidade_alunos."<br><br>";
		} else{
			echo utf8_encode($nome_curso).": ".$quantidade_alunos."<br><br>";
		}
		*/
	}	
			echo "<p style='color: green;'>TOTAL GERAL: ".$total."</p><br>";
		
} else if($opt == "curso_emp"){
	$busca12 = mysql_query("SELECT cur.curso as nome_curso, emp.nome as nome_empresa,Count(tc.matricula_aluno) AS nro_alunos FROM termo_compromisso tc LEFT JOIN cursos cur ON (tc.id_curso=cur.id_curso) LEFT JOIN empresas emp ON (tc.nome=emp.cd_empresa) WHERE SUBSTRING(dt_inicio, 7, 4) = '$dt_inicio' GROUP BY cur.curso,emp.nome ORDER BY cur.curso,emp.nome");

	$sub_total = 0;
	$total = 0;
	$nome_curso_dif = "x";
	while ($array12 = mysql_fetch_array($busca12)) {
		$nome_empresa = utf8_encode($array12['nome_empresa']);
		$nome_curso = utf8_encode($array12['nome_curso']);
		$quantidade_alunos = $array12['nro_alunos'];
		$total = $total + $quantidade_alunos;
		//BLOCO DOS CURSOS
		if($nome_curso_dif != $nome_curso){
			if($nome_curso == ""){
				echo "<p style='color: blue;'>OUTROS CURSOS: "."</p>";	
			}else{
				echo "<p style='color: blue;'>CURSO: ".$nome_curso."<p>";	
			}
		}else{

		}
		//BLOCO DAS EMPRESAS
		if($nome_empresa == ""){
			echo "OUTRAS EMPRESAS: ".$quantidade_alunos."<br>";	
		}else{
			echo $nome_empresa.": ".$quantidade_alunos."<br>";
		}

		$nome_curso_dif = $nome_curso;
		
	}	

		echo "<p style='color: green;'>TOTAL GERAL: ".$total."</p><br>";
	
}

?>
