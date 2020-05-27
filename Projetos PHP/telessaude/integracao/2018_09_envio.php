<?php
header("Content-Type: text/html; charset=utf-8");
require("classes/integra.class.php");
error_reporting(E_ALL);
ini_set("display_errors", 1);
set_time_limit(0);


////////////////////////////////////////////////////////////////
//1 - Teleconsultorias - Cadastro profissionais
$profissionalTeleconsultorias = new ProfissionalSaude("0000088", "092018");
$profissionalTeleconsultorias->addProfissionalSaude(null, "02073794327", "KAMILA MARQUES VIANA", "2481928", "225142", null, "02", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "07492443137", "ERNESTO RAFAEL BORRERO SANCHEZ", "2479869", "225142", null, "03", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "04112848358", "CESAR PORTUGAL PRADO MARTINS", "3268055", "225142", null, "02", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "08100755124", "YASMARI BARRERA FONSECA", "2414821", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "02807433359", "DANIEL RIBEIRO BARBOSA", "2426781", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "04255596379", "ROMULO FIGUEIREDO DE ARAUJO", "2610701", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "03567505319", "ANTONIA GABRIELA DA SILVA NASCIMENTO", "2426609", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "04190775371", "FILOMENO BASTOS DE MESQUITA NETO", "2478765", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "04185660383", "MARIANE ARAUJO GUERRA", "2478722", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "08329220133", "YADIRA RIGEL COBAS", "3444589", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "43689973368", "JÉSSICA LUCENA E LUCENA", "5128439", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "91452350230", "FERNANDO PAIXÃO DA COSTA", "2480093", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "04632763373", "ANA CAROLINNE BATISTA BRAGA RICARTE", "2724855", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "87258579249", "BÁRBARA ORTIZ BRASIL", "2529440", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "06626041304", "STENIO DO NASCIMENTO LIMA", "2517248", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "08295644114", "ALEXIS GARCIA GALINDO", "5248140", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "30669117803", "DANIEL WILLIANS LACAVA GARREFA", "6489990", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "89307410372", "NILDES CASTRO DE SOUSA", "2307766", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "08590639177", "CLAUDIA LAZARA NOVAL FERRER", "6623719", "225142", null, "01", "F");


////////////////////////////////////////////////////////////////
//2 - Teleconsultorias
$teleconsultoria = new Teleconsultoria("0000088", "092018");
$teleconsultoria->addSolicitacao("02/08/2018 12:07:11", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "91452350230", "225142", "2480093", null, "01", ["B86"], ["S72"], "19/09/2018 13:40:37", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("31/08/2018 09:06:58", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "07492443137", "225142", "2479869", null, "03", ["Z008"], ["A97"], "20/09/2018 09:10:01", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("03/09/2018 17:56:02", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "04185660383", "225142", "2478722", null, "01", ["R060"], ["R02"], "05/09/2018 06:34:42", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("11/09/2018 08:41:18", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "04185660383", "225142", "2478722", null, "01", ["N63"], ["X19"], "11/09/2018 20:19:34", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("12/09/2018 15:46:34", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "02807433359", "225142", "2426781", null, "01", ["B589"], ["R83"], "13/09/2018 16:23:17", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("12/09/2018 18:31:47", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "03567505319", "225142", "2426609", null, "01", ["L86"], ["L03"], "13/09/2018 17:39:33", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("12/09/2018 18:32:57", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "03567505319", "225142", "2426609", null, "01", ["L86"], ["L03"], "13/09/2018 17:40:27", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("12/09/2018 18:33:33", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "03567505319", "225142", "2426609", null, "01", ["L86"], ["L03"], "13/09/2018 17:41:08", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("14/09/2018 15:05:10", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "87258579249", "225142", "2529440", null, "01", ["A441"], ["A78"], "16/09/2018 14:40:28", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("14/09/2018 15:10:40", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "43689973368", "225142", "5128439", null, "01", ["A58"], ["Y99"], "15/09/2018 09:19:04", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("14/09/2018 15:10:45", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "43689973368", "225142", "5128439", null, "01", ["A58"], ["Y99"], "15/09/2018 09:20:35", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("17/09/2018 11:25:59", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "87258579249", "225142", "2529440", null, "01", ["C341"], ["R84"], "19/09/2018 08:03:37", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("19/09/2018 20:54:42", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "04190775371", "225142", "2478765", null, "01", ["L548"], ["S99"], "24/09/2018 18:48:14", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("19/09/2018 21:03:53", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "04190775371", "225142", "2478765", null, "01", ["A160"], ["A70"], "20/09/2018 07:21:45", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("24/09/2018 11:16:58", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "02073794327", "225142", "2481928", null, "02", ["L998"], ["S76"], "24/09/2018 17:42:34", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("24/09/2018 11:17:10", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "02073794327", "225142", "2481928", null, "02", ["L998"], ["S76"], "24/09/2018 17:41:52", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("24/09/2018 18:15:44", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "04112848358", "225142", "3268055", null, "02", ["A528"], ["X70"], "24/09/2018 21:45:03", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("25/09/2018 16:08:53", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "04632763373", "225142", "2724855", null, "01", ["L700"], ["S96"], "27/09/2018 16:39:13", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("25/09/2018 17:39:46", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "08100755124", "225142", "2414821", null, "01", ["Z000"], ["A97"], "27/09/2018 16:24:41", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("25/09/2018 18:44:23", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "04255596379", "225142", "2610701", null, "01", ["Z340"], ["W78"], "28/09/2018 15:57:34", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("25/09/2018 19:46:00", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "04255596379", "225142", "2610701", null, "01", ["D259"], ["X76"], "28/09/2018 12:53:42", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("26/09/2018 17:32:29", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "08590639177", "225142", "6623719", null, "01", ["R398"], ["U07"], "27/09/2018 06:08:37", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("27/09/2018 09:33:48", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "04112848358", "225142", "3268055", null, "02", ["Z300"], ["W14"], "28/09/2018 12:56:49", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("27/09/2018 17:02:07", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "30669117803", "225142", "6489990", null, "01", ["Z369"], ["W78"], "28/09/2018 13:01:35", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);


////////////////////////////////////////////////////////////////
//3 - Telegiagnósticos - Cadastro profissionais
$profissionalTelediagnosticos = new ProfissionalSaude("0000088", "092018");


////////////////////////////////////////////////////////////////
//4 - Telediagnósticos
$telediagnostico = new Telediagnostico("0000088", "092018");


////////////////////////////////////////////////////////////////
//INTEGRA
$url = 'http://smart.telessaude.ufrn.br/';
$integra = new Integra("ad9c2aa3622033fc9d79703fde22a4e892641221");


////////////////////////////////////////////////////////////////
//0 - Estabelecimentos - Atualização
echo "<br/><br/><fieldset><legend>Estabelecimentos - Atualização</legend>";
$estabelecimento = new EstabelecimentoSaude("0000088", "092018");
$estabelecimento->atualizarEstabelecimentoSaude("6489990", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2414821", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2426781", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2481928", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("5128439", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2610701", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("3268055", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2480093", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2478722", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2529440", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2426609", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("6623719", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2479869", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2478765", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2724855", true, false, false);
$dados_serializados_estabelecimento = Integra::serializar(TipoDeDados::JSON, $estabelecimento);
echo "<h3>.: Dados Serializados - Estabelecimentos :.</h3>";
echo $dados_serializados_estabelecimento;
$resposta_estabelecimento = $integra->enviarDados(TipoDeDados::JSON, $url."api/v2/dados-estabelecimentos-saude/?format=json", $dados_serializados_estabelecimento);
echo "<h3>.: Resposta do Servidor - Estabelecimentos :.</h3>";
echo $resposta_estabelecimento;
echo "</fieldset>";


////////////////////////////////////////////////////////////////
//1 - Teleconsultorias - Enviar Cadastro profissionais
echo "<br/><br/><fieldset><legend>Teleconsultoria - Profissionais de Saúde</legend>";
$dados_profissionalTeleconsultorias = Integra::serializar(TipoDeDados::JSON, $profissionalTeleconsultorias);
echo "<h3>.: Dados Serializados - Profissional de Saúde :.</h3>";
echo $dados_profissionalTeleconsultorias;
$resposta_profissional = $integra->enviarDados(TipoDeDados::JSON, $url."api/v2/profissionais-saude/?format=json", $dados_profissionalTeleconsultorias);
echo "<h3>.: Resposta do Servidor - Profissional de Saúde :.</h3>";
echo $resposta_profissional;
echo "</fieldset>";


////////////////////////////////////////////////////////////////
//2 - Enviar Teleconsultorias
echo "<br/><br/><fieldset><legend>Teleconsultoria</legend>";
$dados_teleconsultoria = Integra::serializar(TipoDeDados::JSON, $teleconsultoria);
echo "<h3>.: Dados Serializados - Teleconsultoria :.</h3>";
echo $dados_teleconsultoria;
$resposta_teleconsultoria = $integra->enviarDados(TipoDeDados::JSON, $url."api/v2/teleconsultorias/?format=json", $dados_teleconsultoria);
echo "<h3>.: Resposta do Servidor - Teleconsultoria :.</h3>";
echo $resposta_teleconsultoria;
echo "</fieldset>";


////////////////////////////////////////////////////////////////
//3 - Telediagnósticos - Enviar Cadastro profissionais
echo "<br/><br/><fieldset><legend>Teleconsultoria - Profissionais de Saúde</legend>";
$dados_profissionalTeleconsultorias = Integra::serializar(TipoDeDados::JSON, $profissionalTelediagnosticos);
echo "<h3>.: Dados Serializados - Profissional de Saúde :.</h3>";
echo $dados_profissionalTeleconsultorias;
$resposta_profissional = $integra->enviarDados(TipoDeDados::JSON, $url."api/v2/profissionais-saude/?format=json", $dados_profissionalTeleconsultorias);
echo "<h3>.: Resposta do Servidor - Profissional de Saúde :.</h3>";
echo $resposta_profissional;
echo "</fieldset>";


////////////////////////////////////////////////////////////////
//4 - Enviar Teledignósticos
echo "<br/><br/><fieldset><legend>Telediagnóstico</legend>";
$dados_telediagnosticos = Integra::serializar(TipoDeDados::JSON, $telediagnostico);
echo "<h3>.: Dados Serializados - Telediagnóstico :.</h3>";
echo $dados_telediagnosticos;
$resposta_telediagnostico = $integra->enviarDados(TipoDeDados::JSON, $url."api/v2/telediagnosticos/?format=json", $dados_telediagnosticos);
echo "<h3>.: Resposta do Servidor - Telediagnóstico :.</h3>";
echo $resposta_telediagnostico;
echo "</fieldset>";



?>