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

$mes_envio 				= "012018";
$tipo_palestra 			= TipoAtividade::WEBAULAS_PALESTRAS;
$atividade = new TeleeducacaoAtividade("0000088", $mes_envio);

//WA2018012601
$cpfs = ["08212727130", "08112325146", "08102679182", "04241948308", "04587546330", "02229681338", "83976671304", "08303473131", "08298790138", "00665296380", "08165100165", "08318746198", "00819493325", "00720565332", "01159811369", "02783696509", "05900104338", "02865568393", "08294695165", "08389173131", "08321514162", "08037738116", "71114677108", "04338937378", "08476970102", "08122918166", "04814625383", "86405187349", "76113400344", "01678275379", "00297134396", "04190775371", "04868374320", "01928838367", "03467969380", "08301172100", "92142796320", "01573256102", "08297445178", "08590438198", "66356890282", "08389562111", "08304970139", "08295931105", "08302135119", "04937315390", "07641488188", "04821655373", "60040819302", "00499185323", "06779243132", "78766010306", "02655309111", "02731523352", "08123126190", "08594159102", "04422630318", "04076934326", "77221524300", "08305046133", "08389208105", "03503638385", "35580437315", "00667010319", "08389647109", "01634331354", "04185660383", "02215288302", "64327035300", "68163460415", "87670453320", "08574793183", "01022756370", "00335082327", "02236712316", "08076526108", "08483122103", "08579421152", "65804910353", "04494622346", "02835250379", "08421038133", "08213838173", "04228637345", "08415440189", "71236287215", "03217559363", "81017340315", "82716633304", "08573726105", "08189660179", "63912090300", "99499126368", "03512090346", "08398490101", "08248951189", "91963664272", "86447343349", "08405096183", "08594167121", "08100549141", "08399788120", "08303532162", "08416822166", "71100124179", "08319609143", "08100607109", "08321501184", "08321489117", "08076489148", "08318849167", "08321317170", "08086209164", "08413173132", "08165917170", "08321349102", "08100171130", "08110682189", "08160009135", "08108810124", "08104702173"];
$codigo_identificacao 	= 'WA2018012601';
$data 					= "26/01/2018 11:00:00";
$ch_horaria 			= 60;
$tema_america 			= "SP3.071";
$tipo_palestra 			= 5;
$atividade->addAtividade($codigo_identificacao, $data, $ch_horaria, $tipo_palestra, $tema_america);


$profissionalTeleconsultorias = new ProfissionalSaude("0000088", "012018");

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