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

$mes_envio 				= "052017";
$tipo_palestra 			= TipoAtividade::WEBAULAS_PALESTRAS;
$atividade = new TeleeducacaoAtividade("0000088", $mes_envio);

//RM2017050101
$cpfs = ["28542304349", "57569959353", "84692774304", "48394041353", "32138350304", "64308421349"];
$codigo_identificacao 	= 'RM2017050101';
$data 					= "01/05/2017 08:00:00";
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



//RM2017050801
$cpfs = ["28542304349", "57569959353", "84692774304", "48394041353", "32138350304", "64308421349"];
$codigo_identificacao 	= 'RM2017050801';
$data 					= "08/05/2017 08:00:00";
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



//RM2017051501
$cpfs = ["28542304349", "57569959353", "84692774304", "48394041353", "32138350304", "64308421349"];
$codigo_identificacao 	= 'RM2017051501';
$data 					= "15/05/2017 08:00:00";
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



//RM2017052201
$cpfs = ["28542304349", "57569959353", "84692774304", "48394041353", "32138350304", "64308421349"];
$codigo_identificacao 	= 'RM2017052201';
$data 					= "22/05/2017 08:00:00";
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



//RM2017052901
$cpfs = ["28542304349", "57569959353", "84692774304", "48394041353", "32138350304", "64308421349"];
$codigo_identificacao 	= 'RM2017052901';
$data 					= "29/05/2017 08:00:00";
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



//WA2017052901
$cpfs = ["06997925170", "07861468690", "07015695146", "07823824108", "80332188353", "64741591387",  "09926672752", "07053520137", "07039924145", "07492436190", "07492429142", "06560803104", "35892765334",  "07734043178", "01068606312",  "07798106197", "02881618316"];
$codigo_identificacao 	= 'WA2017052901';
$data 					= "29/05/2017 14:00:00";
$ch_horaria 			= 60;
$tema_america 			= "A06.407.900";
$tipo_palestra 			= 2;
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


//WA2017053001
$cpfs = ["40082539391", "06997925170", "07861468690", "07015695146", "07823824108", "80332188353", "02881618316",  "09926672752", "07053520137", "07039924145", "07492436190", "07492429142", "06560803104", "35892765334",  "07734043178", "01068606312",  "07798106197", "64741591387",  "06804129130", "01110230338", "03326634340", "65245415372"];
$codigo_identificacao 	= 'WA2017053001';
$data 					= "30/05/2017 14:00:00";
$ch_horaria 			= 60;
$tema_america 			= "A06.407.900";
$tipo_palestra 			= 2;
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


//WA2017053101
$cpfs = ["40082539391", "06997925170", "07861468690", "07015695146", "07823824108", "80332188353", "09926672752", "07053520137", "07039924145", "07492429142", "06560803104", "35892765334",  "07734043178", "01068606312",  "07798106197",  "06804129130", "07492436190", "01110230338", "02881618316",   "07734043178"];
$codigo_identificacao 	= 'WA2017053101';
$data 					= "31/05/2017 14:00:00";
$ch_horaria 			= 60;
$tema_america 			= "A06.407.900";
$tipo_palestra 			= 2;
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


//RM2017050102
$cpfs = ["28542304349", "57569959353", "84692774304", "48394041353", "32138350304", "64308421349"];
$codigo_identificacao 	= 'RM2017050102';
$data 					= "01/05/2017 20:00:00";
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