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

$mes_envio 				= "052018";
$tipo_palestra 			= TipoAtividade::WEBAULAS_PALESTRAS;
$atividade = new TeleeducacaoAtividade("0000088", $mes_envio);

$profissionalTeleconsultorias = new ProfissionalSaude("0000088", "052018");



///////////////////////////////////////////////
$cpfs = ['61739260325',
'39035670353',
'62930850353',
'83941398334',
'74377930320',
'36001309353',
'04223182307',
'03068443385',
'02149406322',
'96104180310',
'02494371392',
'91156980330',
'01773603302',
'01274587352',
'04357721393',
'05927045308',
'63034441304',
'05415989374',
'05917234337',
'02019697343',
'05846411339',
'01890813338',
'62436244391',
'01586621300',
'46452346334',
'05503462793',
'23039035304',
'64934560378'];
$codigo_identificacao 	= 'RM2018050701';
$data 					= "07/05/2018 20:00:00";
$ch_horaria 			= 120;
$tema_america 			= "H01.158.782.323";
$atividade->addAtividade($codigo_identificacao, $data, $ch_horaria, TipoAtividade::REUNIAO, $tema_america);
for($i=0;$i<count($cpfs);$i++) {
	$sql = "select 	itp.nome, itp.codigo_cbo, itp.estabelecimento_codigo_cnes, coalesce(itp.equipe_codigo_ine, 'null') as equipe_codigo_ine, tu.fl_sexo
from integracao.tb_profissional as itp 
inner join tb_profissional tp on(itp.cpf=replace(replace(tp.nr_cpf, '.', ''), '-', ''))
inner join tb_usuario tu on(tp.ci_profissional=tu.ci_usuario)
where itp.cpf = '" . $cpfs[$i] . "'";	
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


///////////////////////////////////////////////
$cpfs = ['28542304349',
'57569959353',
'84692774304',
'48394041353',
'32138350304',
'64308421349'];
$codigo_identificacao 	= 'RM2018050702';
$data 					= "07/05/2018 08:00:00";
$ch_horaria 			= 120;
$tema_america 			= "H02.403.429.163";
$atividade->addAtividade($codigo_identificacao, $data, $ch_horaria, TipoAtividade::REUNIAO, $tema_america);
for($i=0;$i<count($cpfs);$i++) {
	$sql = "select 	itp.nome, itp.codigo_cbo, itp.estabelecimento_codigo_cnes, coalesce(itp.equipe_codigo_ine, 'null') as equipe_codigo_ine, tu.fl_sexo
from integracao.tb_profissional as itp 
inner join tb_profissional tp on(itp.cpf=replace(replace(tp.nr_cpf, '.', ''), '-', ''))
inner join tb_usuario tu on(tp.ci_profissional=tu.ci_usuario)
where itp.cpf = '" . $cpfs[$i] . "'";	
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



///////////////////////////////////////////////
$cpfs = ['28542304349',
'57569959353',
'84692774304',
'48394041353',
'32138350304',
'64308421349'];
$codigo_identificacao 	= 'RM2018051401';
$data 					= "14/05/2018 08:00:00";
$ch_horaria 			= 120;
$tema_america 			= "H01.158.782.323";
$atividade->addAtividade($codigo_identificacao, $data, $ch_horaria, TipoAtividade::REUNIAO, $tema_america);
for($i=0;$i<count($cpfs);$i++) {
	$sql = "select 	itp.nome, itp.codigo_cbo, itp.estabelecimento_codigo_cnes, coalesce(itp.equipe_codigo_ine, 'null') as equipe_codigo_ine, tu.fl_sexo
from integracao.tb_profissional as itp 
inner join tb_profissional tp on(itp.cpf=replace(replace(tp.nr_cpf, '.', ''), '-', ''))
inner join tb_usuario tu on(tp.ci_profissional=tu.ci_usuario)
where itp.cpf = '" . $cpfs[$i] . "'";	
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





///////////////////////////////////////////////
$cpfs = ['28542304349',
'57569959353',
'84692774304',
'48394041353',
'32138350304',
'64308421349'];
$codigo_identificacao 	= 'RM2018052101';
$data 					= "21/05/2018 08:00:00";
$ch_horaria 			= 120;
$tema_america 			= "H02.403.429.163";
$atividade->addAtividade($codigo_identificacao, $data, $ch_horaria, TipoAtividade::REUNIAO, $tema_america);
for($i=0;$i<count($cpfs);$i++) {
	$sql = "select 	itp.nome, itp.codigo_cbo, itp.estabelecimento_codigo_cnes, coalesce(itp.equipe_codigo_ine, 'null') as equipe_codigo_ine, tu.fl_sexo
from integracao.tb_profissional as itp 
inner join tb_profissional tp on(itp.cpf=replace(replace(tp.nr_cpf, '.', ''), '-', ''))
inner join tb_usuario tu on(tp.ci_profissional=tu.ci_usuario)
where itp.cpf = '" . $cpfs[$i] . "'";	
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




///////////////////////////////////////////////
$cpfs = ['28542304349',
'57569959353',
'84692774304',
'48394041353',
'32138350304',
'64308421349'];
$codigo_identificacao 	= 'RM2018052801';
$data 					= "28/05/2018 08:00:00";
$ch_horaria 			= 120;
$tema_america 			= "H02.403.429.163";
$atividade->addAtividade($codigo_identificacao, $data, $ch_horaria, TipoAtividade::REUNIAO, $tema_america);
for($i=0;$i<count($cpfs);$i++) {
	$sql = "select 	itp.nome, itp.codigo_cbo, itp.estabelecimento_codigo_cnes, coalesce(itp.equipe_codigo_ine, 'null') as equipe_codigo_ine, tu.fl_sexo
from integracao.tb_profissional as itp 
inner join tb_profissional tp on(itp.cpf=replace(replace(tp.nr_cpf, '.', ''), '-', ''))
inner join tb_usuario tu on(tp.ci_profissional=tu.ci_usuario)
where itp.cpf = '" . $cpfs[$i] . "'";	
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