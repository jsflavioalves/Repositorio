<?php
header("Content-Type: text/html; charset=utf-8");
require("classes/integra.class.php");
error_reporting(E_ALL);
ini_set("display_errors", 1);
set_time_limit(0);


////////////////////////////////////////////////////////////////
//1 - Teleconsultorias - Cadastro profissionais
$profissionalTeleconsultorias = new ProfissionalSaude("0000088", "092019");
$profissionalTeleconsultorias->addProfissionalSaude(null, "84735732349", "PABLO ARAUJO DE SOUSA", "2529106", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "01487505329", "JOÃO TARCISIO ALVES MAIA FILHO", "2480603", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "04160682359", "MARIA ALICE ROCHA MAIA", "2482010", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "02807433359", "DANIEL RIBEIRO BARBOSA", "2426781", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "63132745472", "ANTONIO AURY DE MACÊDO TORQUATO", "2499185", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "96753056300", "SAHAROFF MARTINEZ FIGUEIREDO", "3489957", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "60019317395", "ÍTALAN DE JESUS PORTELA SANTOS", "2528770", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "91452350230", "FERNANDO PAIXÃO DA COSTA", "2480093", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "04454649332", "ALISSON CARPINO FREITAS", "5250447", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "04632763373", "ANA CAROLINNE BATISTA BRAGA RICARTE", "2724855", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "03755255308", "TAMARA DE SOUZA SAMPAIO", "2699958", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "67669492368", "THOMÁS DE AQUINO ROSSAS MOTA FILHO", "2482096", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "99286076304", "PEDRO HENRIQUE MELO QUEIROZ", "2528908", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "04361650314", "ELYABE DA SILVA MELO", "2464152", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "03445628327", "EMMANUELLE DAS MERCÊS CRUZ MARAMALDO", "2464195", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "00583822320", "BRENO HENRIQUE ROCHA VIEIRA", "2311178", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "02557234311", "IZA PEREIRA BEZERRA", "2613816", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "02405701383", "DENIS FERNANDO GOMES GUIMARÃES", "6687032", "225142", null, "01", "M");


////////////////////////////////////////////////////////////////
//2 - Teleconsultorias
$teleconsultoria = new Teleconsultoria("0000088", "092019");
$teleconsultoria->addSolicitacao("26/08/2019 16:13:23", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "01487505329", "225142", "2480603", null, "01", ["L400"], ["S91"], "01/09/2019 07:13:26", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("28/08/2019 11:25:17", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "96753056300", "225142", "3489957", null, "01", ["A302"], ["A78"], "01/09/2019 07:33:02", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("28/08/2019 21:14:08", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "91452350230", "225142", "2480093", null, "01", ["B351"], ["S74"], "01/09/2019 09:42:34", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("30/08/2019 11:08:58", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "04454649332", "225142", "5250447", null, "01", ["L728"], ["S93"], "01/09/2019 10:07:10", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("30/08/2019 16:58:42", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "60019317395", "225142", "2528770", null, "01", ["E042"], ["T81"], "01/09/2019 04:16:22", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("31/08/2019 19:41:19", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "02807433359", "225142", "2426781", null, "01", ["B86"], ["S72"], "01/09/2019 07:45:41", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("31/08/2019 19:52:36", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "02807433359", "225142", "2426781", null, "01", ["B86"], ["S72"], "01/09/2019 10:14:10", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("03/09/2019 19:26:57", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "04632763373", "225142", "2724855", null, "01", ["L309"], ["S88"], "09/09/2019 18:20:04", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("04/09/2019 12:52:59", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "04160682359", "225142", "2482010", null, "01", ["D582"], ["B78"], "05/09/2019 07:41:55", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("04/09/2019 13:00:09", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "04160682359", "225142", "2482010", null, "01", ["O13"], ["W81"], "09/09/2019 13:09:20", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("04/09/2019 13:02:27", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "04160682359", "225142", "2482010", null, "01", ["E300"], ["T99"], "05/09/2019 10:53:45", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("04/09/2019 13:07:42", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "04160682359", "225142", "2482010", null, "01", ["A528"], ["X70"], "04/09/2019 17:00:53", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("04/09/2019 18:56:18", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "04160682359", "225142", "2482010", null, "01", ["A529"], ["X70"], "05/09/2019 16:19:50", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("06/09/2019 11:30:44", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "04454649332", "225142", "5250447", null, "01", ["L400"], ["S91"], "09/09/2019 18:34:00", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("06/09/2019 12:14:57", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "02807433359", "225142", "2426781", null, "01", ["J020"], ["R74"], "07/09/2019 01:02:03", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("06/09/2019 12:15:39", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "02807433359", "225142", "2426781", null, "01", ["A309"], ["A78"], "12/09/2019 22:20:41", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("09/09/2019 09:52:19", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "04454649332", "225142", "5250447", null, "01", ["R001"], ["K04"], "10/09/2019 17:33:43", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("11/09/2019 12:35:03", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "99286076304", "225142", "2528908", null, "01", ["I499"], ["K80"], "19/09/2019 23:28:55", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("11/09/2019 12:44:43", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "99286076304", "225142", "2528908", null, "01", ["L259"], ["S88"], "25/09/2019 22:00:22", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("14/09/2019 18:57:59", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "04454649332", "225142", "5250447", null, "01", ["E300"], ["T99"], "15/09/2019 06:31:29", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("16/09/2019 16:18:46", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "03755255308", "225142", "2699958", null, "01", ["F320"], ["P76"], "17/09/2019 15:39:59", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("16/09/2019 22:11:54", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "84735732349", "225142", "2529106", null, "01", ["I499"], ["K80"], "19/09/2019 23:53:37", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("17/09/2019 18:21:17", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "04632763373", "225142", "2724855", null, "01", ["J370"], [""], "18/09/2019 06:51:05", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("23/09/2019 18:10:10", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "60019317395", "225142", "2528770", null, "01", ["E063"], ["T99"], "24/09/2019 16:04:20", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("24/09/2019 09:40:25", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "67669492368", "225142", "2482096", null, "01", ["Z369"], ["W78"], "25/09/2019 09:09:08", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("25/09/2019 17:57:09", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "63132745472", "225142", "2499185", null, "01", ["E119"], ["T90"], "26/09/2019 21:11:52", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);


////////////////////////////////////////////////////////////////
//3 - Telegiagnósticos - Cadastro profissionais
$profissionalTelediagnosticos = new ProfissionalSaude("0000088", "092019");


////////////////////////////////////////////////////////////////
//4 - Telediagnósticos
$telediagnostico = new Telediagnostico("0000088", "092019");


////////////////////////////////////////////////////////////////
//INTEGRA
$url = 'http://smart.telessaude.ufrn.br/';
$integra = new Integra("ad9c2aa3622033fc9d79703fde22a4e892641221");


////////////////////////////////////////////////////////////////
//0 - Estabelecimentos - Atualização
echo "<br/><br/><fieldset><legend>Estabelecimentos - Atualização</legend>";
$estabelecimento = new EstabelecimentoSaude("0000088", "092019");
$estabelecimento->atualizarEstabelecimentoSaude("2426781", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2529106", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2528770", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2482010", false, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2480603", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2499185", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2482096", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("5250447", false, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2480093", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2699958", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("3489957", false, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2528908", true, false, false);
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