<?php
header("Content-Type: text/html; charset=utf-8");
require("classes/integra.class.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);
set_time_limit(0);


////////////////////////////////////////////////////////////////
//1º passo - Enviar cadastro profissionais das teleconsultorias
function enviarCadastroProfissionalTeleconsultoria($integra, $url) {
    echo '<br/><br/>';
    echo '<fieldset>';
    echo '<legend>Profissionais de Saúde</legend>';

		$profissional = new ProfissionalSaude("0000088", "032016");
		$profissional->addProfissionalSaude(null, "84735732349", "PABLO ARAUJO DE SOUSA", "2529106", "225142", "0000089664", "01", "M");
    $dados_serializados_profissional = Integra::serializar(TipoDeDados::JSON, $profissional);
    echo "<h3>.: Dados Serializados - Profissional de Saúde :.</h3>";
    echo $dados_serializados_profissional;
    $resposta_profissional = $integra->enviarDados(TipoDeDados::JSON, $url."api/v2/profissionais-saude/?format=json", $dados_serializados_profissional);
    echo "<h3>.: Resposta do Servidor - Profissional de Saúde :.</h3>";
    echo $resposta_profissional;
    echo '</fieldset>';
}


////////////////////////////////////////////////////////////////
//2º passo - Enviar Teleconsultorias
function enviarTeleconsultoria($integra, $url) {
    echo '<br/><br/>';
    echo '<fieldset>';
    echo '<legend>Teleconsultoria</legend>';

		$teleconsultoria = new Teleconsultoria("0000088", "032016");
		$teleconsultoria->addSolicitacao("01/02/2016 21:50:42", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "00220899347", "223505", "2562332", "0001499777", "01", ["E301"], ["T99"], "23/03/2016 09:29:18", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
    
    $dados_serializados_teleconsultoria = Integra::serializar(TipoDeDados::JSON, $teleconsultoria);
    echo "<h2>.: Dados Serializados - Teleconsultoria :.</h2>";
    echo $dados_serializados_teleconsultoria;
    $resposta_teleconsultoria = $integra->enviarDados(TipoDeDados::JSON, $url."api/v2/teleconsultorias/?format=json", $dados_serializados_teleconsultoria);
    echo "<h2>.: Resposta do Servidor - Teleconsultoria :.</h2>";
    echo $resposta_teleconsultoria;
    echo "</fieldset>";
}



////////////////////////////////////////////////////////////////
//3º passo - Enviar cadastro profissionais das teleconsultorias
function enviarCadastroProfissionalTelediagnostico($integra, $url) {
    echo '<br/><br/>';
    echo '<fieldset>';
    echo '<legend>Profissionais de Saúde</legend>';

		$profissional = new ProfissionalSaude("0000088", "032016");
		$profissional->addProfissionalSaude(null, "00922089329", "YANDRA HELEN SILVA LIMA ", "3860108", "322245", "0000103551", "01", "F");
		
    $dados_serializados_profissional = Integra::serializar(TipoDeDados::JSON, $profissional);
    echo "<h3>.: Dados Serializados - Profissional de Saúde :.</h3>";
    echo $dados_serializados_profissional;
    $resposta_profissional = $integra->enviarDados(TipoDeDados::JSON, $url."api/v2/profissionais-saude/?format=json", $dados_serializados_profissional);
    echo "<h3>.: Resposta do Servidor - Profissional de Saúde :.</h3>";
    echo $resposta_profissional;
    echo '</fieldset>';
}



////////////////////////////////////////////////////////////////
//4º passo - Enviar Telegiagnostico
function enviarTelediagnostico($integra, $url) {
    echo '<br/><br/>';
    echo '<fieldset>';
    echo '<legend>Telediagnóstico</legend>';

		$telediagnostico = new Telediagnostico("0000088", "032016");
		$telediagnostico->addSolicitacao("26/02/2016 08:25:19", "H04001010", "41", null, "5105315", "88463982387", "223505", "5105315", "01/03/2016 17:37:59", "64308421349", "225120", "2497670", null, "165757472570006", "230428");


    $dados_serializados_telediagnostico = Integra::serializar(TipoDeDados::JSON, $telediagnostico);
    echo "<h3>.: Dados Serializados - Telediagnóstico :.</h3>";
    echo $dados_serializados_telediagnostico;

    $resposta_telediagnostico = $integra->enviarDados(TipoDeDados::JSON, $url."api/v2/telediagnosticos/?format=json", $dados_serializados_telediagnostico);
    echo "<h3>.: Resposta do Servidor - Telediagnóstico :.</h3>";
    echo $resposta_telediagnostico;
    echo "</fieldset>";
  }





  $url = 'http://smartteste.telessaude.ufrn.br/';
  $integra = new Integra("ad9c2aa3622033fc9d79703fde22a4e892641221");

  
  enviarCadastroProfissionalTeleconsultoria($integra, $url);
  enviarTeleconsultoria($integra, $url);
  enviarCadastroProfissionalTelediagnostico($integra, $url);
  enviarTelediagnostico($integra, $url);
?>
