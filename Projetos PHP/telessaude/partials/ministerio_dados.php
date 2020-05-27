<?php
require_once('../includes/frameworkajax.php');

$nr_cpf = @$_POST['nr_cpf'];
$sql = "select * from integracao.tb_profissional where cpf = '$nr_cpf'";
$query = query($sql);
if($query->rowCount() > 0){
	$row = $query->fetch(); 
	echo '{"find": 1, "nome":"'.@$row['nome'].'", "codigo_cbo":"'.@$row['codigo_cbo'].'", "equipe_codigo_ine":"'.@$row['equipe_codigo_ine'].'", 
	"estabelecimento_codigo_cnes":"'.@$row['estabelecimento_codigo_cnes'].'"}';	
}
else{
	echo '{"find": 0}';
}
?>