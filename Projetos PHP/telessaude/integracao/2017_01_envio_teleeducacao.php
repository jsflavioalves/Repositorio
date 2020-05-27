<?php
header("Content-Type: text/html; charset=utf-8");
require("classes/integra.class.php");
error_reporting(E_ALL);
ini_set("display_errors", 1);
set_time_limit(0);
require_once('../includes/frameworkajax.php');


////////////////////////////////////////////////////////////////
//INTEGRA
$url = 'http://smart.telessaude.ufrn.br/';
$integra = new Integra("ad9c2aa3622033fc9d79703fde22a4e892641221");


$cpfs = [
 "04227526302", "06130569300", "06997925170", "07015695146", "07638864166", "07823824108", "07861468690", "08312921729", "40082539391", "64741591387", "73921319315", "80332188353"
];


$mes_envio 				= "012017";
$codigo_identificacao 	= 'WA2017012601';
$data 					= "26/01/2017 14:00:00";
$ch_horaria 			= 60;
$tema_america 			= "J01.897.115";
$tipo_palestra 			= TipoAtividade::WEBAULAS_PALESTRAS;



$atividade = new TeleeducacaoAtividade("0000088", $mes_envio);
$atividade->addAtividade($codigo_identificacao, $data, $ch_horaria, $tipo_palestra, $tema_america);

for($i=0;$i<count($cpfs);$i++) {
	$sql = "select 	codigo_cbo, estabelecimento_codigo_cnes, coalesce(equipe_codigo_ine, 'null') as equipe_codigo_ine
	from integracao.tb_profissional where cpf = '" . $cpfs[$i] . "'";
	$q = query($sql)->fetch();
	if($q['codigo_cbo'] != '' || $q['estabelecimento_codigo_cnes'] != '') {
		$atividade->addParticipacaoAtividade($codigo_identificacao, $data, $cpfs[$i], 
		$q['codigo_cbo'], $q['estabelecimento_codigo_cnes'], null, GrauSatisfacao::SATISFEITO);  	
	}
}

	
$dados_serializados_atividade = Integra::serializar(TipoDeDados::JSON, $atividade);
echo "<h3>.: Dados Serializados - Atividades de Tele-educação :.</h3>";
echo $dados_serializados_atividade;

//exit;

$resposta_atividade = $integra->enviarDados(TipoDeDados::JSON, $url."api/v2/atividades-teleeducacao/?format=json", $dados_serializados_atividade);
echo "<h3>.: Resposta do Servidor - Atividades de Tele-educação :.</h3>";
echo $resposta_atividade;
echo "</fieldset>";
	
	



?>