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

$mes_envio 				= "092017";
$tipo_palestra 			= TipoAtividade::WEBAULAS_PALESTRAS;
$atividade = new TeleeducacaoAtividade("0000088", $mes_envio);

//RM2017090401
$cpfs = ["28542304349", "57569959353", "84692774304", "48394041353", "32138350304", "64308421349"];
$codigo_identificacao 	= 'RM2017090401';
$data 					= "04/09/2017 08:00:00";
$ch_horaria 			= 120;
$tema_america 			= "H02.403.429.163";
$tipo_palestra 			= 5;
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



//RM2017091101
$cpfs = ["28542304349", "57569959353", "84692774304", "48394041353", "32138350304", "64308421349"];
$codigo_identificacao 	= 'RM2017091101';
$data 					= "11/09/2017 08:00:00";
$ch_horaria 			= 120;
$tema_america 			= "H02.403.429.163";
$tipo_palestra 			= 5;
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



//RM2017091801
$cpfs = ["28542304349", "57569959353", "84692774304", "48394041353", "32138350304", "64308421349"];
$codigo_identificacao 	= 'RM2017091801';
$data 					= "18/09/2017 08:00:00";
$ch_horaria 			= 120;
$tema_america 			= "H02.403.429.163";
$tipo_palestra 			= 5;
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





//RM2017092501
$cpfs = ["28542304349", "57569959353", "84692774304", "48394041353", "32138350304", "64308421349"];
$codigo_identificacao 	= 'RM2017092501';
$data 					= "25/09/2017 08:00:00";
$ch_horaria 			= 120;
$tema_america 			= "H02.403.429.163";
$tipo_palestra 			= 5;
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




//RM2017090402
$cpfs = ["28542304349", "57569959353", "84692774304", "48394041353", "32138350304", "64308421349"];
$codigo_identificacao 	= 'RM2017090402';
$data 					= "04/09/2017 20:00:00";
$ch_horaria 			= 120;
$tema_america 			= "H01.158.782.323";
$tipo_palestra 			= 5;
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