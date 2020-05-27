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

$mes_envio 				= "022018";
$tipo_palestra 			= TipoAtividade::WEBAULAS_PALESTRAS;
$atividade = new TeleeducacaoAtividade("0000088", $mes_envio);

$profissionalTeleconsultorias = new ProfissionalSaude("0000088", "022018");

//WA2018022001
$cpfs = ["05428438380", "02129983316", "01950881318", "46503706391", "00048266396", "00760930341", "82136530763", "46142541368", "54207983368"];
$codigo_identificacao 	= 'WA2018022001';
$data 					= "26/02/2018 11:00:00";
$ch_horaria 			= 60;
$tema_america 			= "SP3.071";
$tipo_palestra 			= 5;
$atividade->addAtividade($codigo_identificacao, $data, $ch_horaria, $tipo_palestra, $tema_america);


for($i=0;$i<count($cpfs);$i++) {
	
	$sql = "select 	itp.nome, itp.codigo_cbo, itp.estabelecimento_codigo_cnes, coalesce(itp.equipe_codigo_ine, 'null') as equipe_codigo_ine, tu.fl_sexo
from integracao.tb_profissional as itp 
inner join tb_profissional tp on(itp.cpf=replace(replace(tp.nr_cpf, '.', ''), '-', ''))
inner join tb_usuario tu on(tp.ci_profissional=tu.ci_usuario)
where itp.cpf = '" . $cpfs[$i] . "'
";	
	
	$q = query($sql)->fetch();
	if($q['codigo_cbo'] != '' || $q['estabelecimento_codigo_cnes'] != '') {
		$atividade->addParticipacaoAtividade($codigo_identificacao, $data, $cpfs[$i], 
		$q['codigo_cbo'], $q['estabelecimento_codigo_cnes'], null, GrauSatisfacao::SATISFEITO);  	
		
		$fl_sexo = "M";
		if($q['fl_sexo'] == '2'){
			$fl_sexo = "F";
		}
		
		$profissionalTeleconsultorias->addProfissionalSaude(null, $cpfs[$i], $q['nome'], $q['estabelecimento_codigo_cnes'], $q['codigo_cbo'], null, "02", $fl_sexo);
		
	}
}

//WA2018022601
$cpfs = ["70787158100", "86334662600", "67228666453", "41858387353", "44673574834", "09534391786", "29154472253", "44917791391"];
$codigo_identificacao 	= 'WA2018022601';
$data 					= "26/02/2018 11:00:00";
$ch_horaria 			= 60;
$tema_america 			= "H02.403.429.163";
$tipo_palestra 			= 5;
$atividade->addAtividade($codigo_identificacao, $data, $ch_horaria, $tipo_palestra, $tema_america);






for($i=0;$i<count($cpfs);$i++) {
	
	$sql = "select 	itp.nome, itp.codigo_cbo, itp.estabelecimento_codigo_cnes, coalesce(itp.equipe_codigo_ine, 'null') as equipe_codigo_ine, tu.fl_sexo
from integracao.tb_profissional as itp 
inner join tb_profissional tp on(itp.cpf=replace(replace(tp.nr_cpf, '.', ''), '-', ''))
inner join tb_usuario tu on(tp.ci_profissional=tu.ci_usuario)
where itp.cpf = '" . $cpfs[$i] . "'
";	
	
	$q = query($sql)->fetch();
	if($q['codigo_cbo'] != '' || $q['estabelecimento_codigo_cnes'] != '') {
		$atividade->addParticipacaoAtividade($codigo_identificacao, $data, $cpfs[$i], 
		$q['codigo_cbo'], $q['estabelecimento_codigo_cnes'], null, GrauSatisfacao::SATISFEITO);  	
		
		$fl_sexo = "M";
		if($q['fl_sexo'] == '2'){
			$fl_sexo = "F";
		}
		
		$profissionalTeleconsultorias->addProfissionalSaude(null, $cpfs[$i], $q['nome'], $q['estabelecimento_codigo_cnes'], $q['codigo_cbo'], null, "02", $fl_sexo);
		
	}
}






echo "<br/><br/><fieldset><legend>Teleconsultoria - Profissionais de Saúde</legend>";
$dados_profissionalTeleconsultorias = Integra::serializar(TipoDeDados::JSON, $profissionalTeleconsultorias);
echo "<h3>.: Dados Serializados - Profissional de Saúde :.</h3>";
echo $dados_profissionalTeleconsultorias;
$resposta_profissional = $integra->enviarDados(TipoDeDados::JSON, $url."api/v2/profissionais-saude/?format=json", $dados_profissionalTeleconsultorias);
echo "<h3>.: Resposta do Servidor - Profissional de Saúde :.</h3>";
echo $resposta_profissional;
echo "</fieldset>";





	
$dados_serializados_atividade = Integra::serializar(TipoDeDados::JSON, $atividade);
echo "<h3>.: Dados Serializados - Atividades de Tele-educação :.</h3>";
echo $dados_serializados_atividade;

//exit;

$resposta_atividade = $integra->enviarDados(TipoDeDados::JSON, $url."api/v2/atividades-teleeducacao/?format=json", $dados_serializados_atividade);
echo "<h3>.: Resposta do Servidor - Atividades de Tele-educação :.</h3>";
echo $resposta_atividade;
echo "</fieldset>";
	
	



?>