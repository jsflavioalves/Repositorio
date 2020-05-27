<?php
// Incluir aquivo de conexão
include("../../../conn.php");
 mysql_select_db('estagios');
// Recebe o valor enviado
$valor = $_GET['valor'];
 
// Procura titulos no banco relacionados ao valor
// $sql = mysql_query("SELECT curso, count('matricula') as totTCE FROM alunos, termo_compromisso WHERE matricula = matricula_aluno AND substr(termo_compromisso.dt_inicio,7) = '$valor' GROUP BY curso");
$sql = mysql_query("SELECT curso,matricula FROM alunos order BY curso");

$TotGeral = 0;

while($dados=mysql_fetch_array($sql)){
	$curso=$dados['curso'];
	$matric = $dados['matricula'];
	$sql1 = mysql_query("SELECT matricula_aluno FROM termo_compromisso WHERE dt_inicio like '%$valor%' and matricula_aluno like '%$matric%'");
	$dados1=mysql_fetch_array($sql1);
	$temtermo = mysql_num_rows($sql1);
	if($temtermo !=0) echo '<br>'.utf8_encode($curso); echo '  '. $matric;
$TotGeral=$TotGeral+1;}

$resultado = mysql_num_rows($sql);

 
// Exibe todos os valores encontrados
if($resultado != 0){
    echo utf8_encode('<br><span class="info-box-number"><center><a onclick="siim_tceano()" id="nome_tceano"> Total: ' .$TotGeral. '</a></center></span>');             
}
if ($resultado == 0) {
    echo utf8_encode('<br><center><option>INEXISTENTE!</option></center>');
  } 


// Acentuação
@header("Content-Type: text/html; charset=ISO-8859-1",true);
?>