<?php
header("Content-Type: text/html; charset=utf-8");
require("classes/integra.class.php");
error_reporting(E_ALL);
ini_set("display_errors", 1);
set_time_limit(0);


////////////////////////////////////////////////////////////////
//1 - Teleconsultorias - Cadastro profissionais
$profissionalTeleconsultorias = new ProfissionalSaude("0000088", "082018");
$profissionalTeleconsultorias->addProfissionalSaude(null, "02073794327", "KAMILA MARQUES VIANA", "2481928", "225142", null, "02", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "01043616381", "LARA RIBEIRO ANTUNES", "2481936", "225142", null, "02", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "04798438480", "JOSÉ DANTAS CHAVES", "2664542", "225142", null, "02", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "04824387388", "ANDRÉ LAVOR ALVES", "6813801", "225142", null, "02", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "01049312309", "ROSILENE GOMES NEVES", "2482312", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "02783696509", "BEATRIZ RIBEIRO DAS VIRGENS", "2372991", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "08320332192", "XIOMARA NEGRET TORRES", "6020216", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "01246159457", "MARISSA RAYANNE MOREIRA DE ALENCAR", "2610698", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "63227266253", "NIRLANDO MEIRELES DE SOUZA", "2645793", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "00424556340", "LUCIANA INGRID GRAZIELLE NISHIDA SANTOS", "2515261", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "08319751136", "YAIMA ROMERO VIERA", "2451026", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "04185660383", "MARIANE ARAUJO GUERRA", "2478722", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "03926971304", "RHUAN VICTOR BAGGIO MONTEIRO", "7926928", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "02642792390", "TUIANNE CAMBOIM MORAIS", "2528991", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "91452350230", "FERNANDO PAIXÃO DA COSTA", "2480093", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "01761111310", "RAFAEL LIMA DA CUNHA", "2426765", "225142", null, "01", "M");


////////////////////////////////////////////////////////////////
//2 - Teleconsultorias
$teleconsultoria = new Teleconsultoria("0000088", "082018");
$teleconsultoria->addSolicitacao("18/09/2017 23:25:16", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "02783696509", "225142", "2372991", null, "01", ["L998"], ["S76"], "31/08/2018 00:43:47", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("30/07/2018 10:16:26", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "02642792390", "225142", "2528991", null, "01", ["L52"], ["S99"], "03/08/2018 00:03:21", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("30/07/2018 20:58:45", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "04798438480", "225142", "2664542", null, "02", ["A160"], ["A70"], "01/08/2018 09:06:07", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("31/07/2018 15:12:03", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "01049312309", "225142", "2482312", null, "01", ["L814"], ["S99"], "03/08/2018 00:10:15", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("31/07/2018 15:32:09", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "04185660383", "225142", "2478722", null, "01", ["I209"], ["K74"], "09/08/2018 15:18:58", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("31/07/2018 22:11:56", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "01246159457", "225142", "2610698", null, "01", ["Z000"], ["A97"], "03/08/2018 00:17:14", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("01/08/2018 10:14:14", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "91452350230", "225142", "2480093", null, "01", ["D229"], ["S82"], "02/08/2018 23:57:20", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("01/08/2018 15:53:22", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "04824387388", "225142", "6813801", null, "02", ["N300"], ["U71"], "07/08/2018 11:35:35", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("06/08/2018 08:37:14", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "02642792390", "225142", "2528991", null, "01", ["B084"], ["A76"], "07/08/2018 11:39:37", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("07/08/2018 05:49:19", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "02642792390", "225142", "2528991", null, "01", ["I48"], ["K78"], "09/08/2018 23:04:16", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("13/08/2018 18:08:59", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "01761111310", "225142", "2426765", null, "01", ["Z300"], ["W14"], "14/08/2018 08:26:27", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("13/08/2018 18:09:19", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "01761111310", "225142", "2426765", null, "01", ["Z300"], ["W14"], "14/08/2018 08:27:57", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("14/08/2018 12:54:55", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "91452350230", "225142", "2480093", null, "01", ["B86"], ["S72"], "14/08/2018 21:01:02", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("15/08/2018 08:16:03", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "91452350230", "225142", "2480093", null, "01", ["B86"], ["S72"], "16/08/2018 08:39:57", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("17/08/2018 17:28:49", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "02642792390", "225142", "2528991", null, "01", ["L430"], ["S99"], "19/08/2018 20:34:05", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("18/08/2018 05:17:29", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "02642792390", "225142", "2528991", null, "01", ["L539"], ["S06"], "19/08/2018 20:10:50", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("19/08/2018 16:26:49", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "02642792390", "225142", "2528991", null, "01", ["L548"], ["S99"], "19/08/2018 19:55:51", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("19/08/2018 16:34:05", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "02642792390", "225142", "2528991", null, "01", ["L86"], ["L03"], "19/08/2018 20:19:09", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("20/08/2018 11:12:58", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "02642792390", "225142", "2528991", null, "01", ["L400"], ["S91"], "20/08/2018 19:57:45", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("20/08/2018 11:13:48", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "02642792390", "225142", "2528991", null, "01", ["L400"], ["S91"], "20/08/2018 19:57:13", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("22/08/2018 14:51:56", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "00424556340", "225142", "2515261", null, "01", ["I255"], ["K76"], "23/08/2018 07:01:57", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("22/08/2018 15:25:02", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "00424556340", "225142", "2515261", null, "01", ["F329"], ["P76"], "30/08/2018 09:21:40", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("23/08/2018 12:30:50", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "00424556340", "225142", "2515261", null, "01", ["A160"], ["A70"], "24/08/2018 20:48:35", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("28/08/2018 22:38:36", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "01043616381", "225142", "2481936", null, "02", ["E063"], ["T99"], "31/08/2018 07:28:42", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("30/08/2018 08:01:45", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "02073794327", "225142", "2481928", null, "02", ["Z300"], ["W14"], "30/08/2018 15:10:43", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("30/08/2018 20:01:34", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "02073794327", "225142", "2481928", null, "02", ["N819"], ["L99"], "31/08/2018 10:39:16", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);


////////////////////////////////////////////////////////////////
//3 - Telegiagnósticos - Cadastro profissionais
$profissionalTelediagnosticos = new ProfissionalSaude("0000088", "082018");
$profissionalTelediagnosticos->addProfissionalSaude(null, "00922089329", "YANDRA HELEN SILVA LIMA ", "3860108", "322245", null, "01", "F");
$profissionalTelediagnosticos->addProfissionalSaude(null, "06804198379", "RAQUEL FREIRE DE LIMA", "2481685", "223565", null, "01", "F");
$profissionalTelediagnosticos->addProfissionalSaude(null, "14214008391", "ANA MARIA FERREIRA DE SALES", "2562154", "322230", null, "01", "F");
$profissionalTelediagnosticos->addProfissionalSaude(null, "37019376304", "IVONELHA RODRIGUES LIMA", "2478927", "322230", null, "01", "F");
$profissionalTelediagnosticos->addProfissionalSaude(null, "43063675334", "MARIA JOSE DA SILVA ROCHA NUNES", "2374064", "322230", null, "01", "F");
$profissionalTelediagnosticos->addProfissionalSaude(null, "48655546372", "JOAO MARCIO DA SILVA", "2552191", "223565", null, "01", "M");
$profissionalTelediagnosticos->addProfissionalSaude(null, "53859561391", "ANTONIA REGINA DE SOUZA VIANA", "6005969", "322245", null, "01", "F");
$profissionalTelediagnosticos->addProfissionalSaude(null, "74798618349", "ALINE MARIA DA CRUZ FARIAS SARAIVA", "2373203", "322250", null, "01", "F");
$profissionalTelediagnosticos->addProfissionalSaude(null, "77777298372", "CLAUDIS PATRICIA HOLANDA LIMA", "6728944", "322250", null, "01", "F");
$profissionalTelediagnosticos->addProfissionalSaude(null, "84692774304", "JOAO JOSE AQUINO MACHADO", "2482118", "225142", null, "01", "M");
$profissionalTelediagnosticos->addProfissionalSaude(null, "85326348349", "ANTONIA CICERA DA SILVA BEZERRA", "2527189", "322245", null, "01", "F");
$profissionalTelediagnosticos->addProfissionalSaude(null, "88169529387", "ELAINE CRISTINA SILVA FREITAS", "2563851", "515105", null, "01", "F");
$profissionalTelediagnosticos->addProfissionalSaude(null, "88463982387", "LIDIANNE FERNANDES DA SILVA LOBO", "5105315", "223505", null, "01", "F");
$profissionalTelediagnosticos->addProfissionalSaude(null, "88775437368", "MIRELLA CARLA LEITAO COSTA", "2552175", "223505", null, "01", "F");


////////////////////////////////////////////////////////////////
//4 - Telediagnósticos
$telediagnostico = new Telediagnostico("0000088", "082018");
$telediagnostico->addSolicitacao("30/07/2018 08:57:06", "H04001010", "41", null, "2478927", "37019376304", "322230", "2478927", "01/08/2018 12:00:53", "84692774304", "225142", "2482118", null, "898000533496766", "230280");
$telediagnostico->addSolicitacao("30/07/2018 09:03:45", "H04001010", "41", null, "2552175", "88775437368", "223505", "2552175", "01/08/2018 11:58:19", "84692774304", "225142", "2482118", null, "160392112970000", "230760");
$telediagnostico->addSolicitacao("30/07/2018 10:30:22", "H04001010", "41", null, "2563851", "88169529387", "515105", "2563851", "01/08/2018 11:59:25", "84692774304", "225142", "2482118", null, "706405677198080", "230700");
$telediagnostico->addSolicitacao("30/07/2018 11:04:41", "H04001010", "41", null, "2552175", "88775437368", "223505", "2552175", "01/08/2018 11:29:28", "84692774304", "225142", "2482118", null, "209818457830006", "230760");
$telediagnostico->addSolicitacao("30/07/2018 11:31:10", "H04001010", "41", null, "6005969", "53859561391", "322245", "6005969", "01/08/2018 12:02:26", "84692774304", "225142", "2482118", null, "700408987465242", "231240");
$telediagnostico->addSolicitacao("31/07/2018 07:30:36", "H04001010", "41", null, "2478927", "37019376304", "322230", "2478927", "01/08/2018 11:17:43", "84692774304", "225142", "2482118", null, "898000421510023", "230280");
$telediagnostico->addSolicitacao("31/07/2018 07:42:36", "H04001010", "41", null, "2478927", "37019376304", "322230", "2478927", "01/08/2018 11:35:39", "84692774304", "225142", "2482118", null, "898050063047235", "230280");
$telediagnostico->addSolicitacao("31/07/2018 07:44:01", "H04001010", "41", null, "2478927", "37019376304", "322230", "2478927", "01/08/2018 11:18:38", "84692774304", "225142", "2482118", null, "163891873360018", "230280");
$telediagnostico->addSolicitacao("31/07/2018 07:51:51", "H04001010", "41", null, "2527189", "85326348349", "322245", "2527189", "01/08/2018 11:44:40", "84692774304", "225142", "2482118", null, "898003214194501", "231400");
$telediagnostico->addSolicitacao("31/07/2018 07:53:48", "H04001010", "41", null, "6728944", "77777298372", "322250", "6728944", "01/08/2018 11:47:33", "84692774304", "225142", "2482118", null, "126295402370018", "230600");
$telediagnostico->addSolicitacao("31/07/2018 07:56:54", "H04001010", "41", null, "2478927", "37019376304", "322230", "2478927", "01/08/2018 11:06:22", "84692774304", "225142", "2482118", null, "898003261143691", "230280");
$telediagnostico->addSolicitacao("31/07/2018 08:05:07", "H04001010", "41", null, "2374064", "43063675334", "322230", "2374064", "01/08/2018 11:28:38", "84692774304", "225142", "2482118", null, "702505360317538", "230690");
$telediagnostico->addSolicitacao("31/07/2018 08:05:52", "H04001010", "41", null, "6728944", "77777298372", "322250", "6728944", "01/08/2018 11:07:25", "84692774304", "225142", "2482118", null, "702306546611420", "230600");
$telediagnostico->addSolicitacao("31/07/2018 08:08:58", "H04001010", "41", null, "2527189", "85326348349", "322245", "2527189", "01/08/2018 11:31:16", "84692774304", "225142", "2482118", null, "700504533234054", "231400");
$telediagnostico->addSolicitacao("31/07/2018 08:12:17", "H04001010", "41", null, "2552191", "48655546372", "223565", "2552191", "01/08/2018 11:26:12", "84692774304", "225142", "2482118", null, "898003276220093", "231310");
$telediagnostico->addSolicitacao("31/07/2018 08:12:43", "H04001010", "41", null, "2478927", "37019376304", "322230", "2478927", "01/08/2018 11:28:27", "84692774304", "225142", "2482118", null, "210263230470018", "230280");
$telediagnostico->addSolicitacao("31/07/2018 08:14:18", "H04001010", "41", null, "6728944", "77777298372", "322250", "6728944", "01/08/2018 11:47:08", "84692774304", "225142", "2482118", null, "708203106561449", "230600");
$telediagnostico->addSolicitacao("31/07/2018 08:20:33", "H04001010", "41", null, "6005969", "53859561391", "322245", "6005969", "01/08/2018 11:25:31", "84692774304", "225142", "2482118", null, "701208099678118", "231240");
$telediagnostico->addSolicitacao("31/07/2018 08:21:51", "H04001010", "41", null, "2552175", "88775437368", "223505", "2552175", "01/08/2018 11:31:05", "84692774304", "225142", "2482118", null, "898002922664874", "230760");
$telediagnostico->addSolicitacao("31/07/2018 08:22:35", "H04001010", "41", null, "2563851", "88169529387", "515105", "2563851", "01/08/2018 11:54:37", "84692774304", "225142", "2482118", null, "898003230561483", "230700");
$telediagnostico->addSolicitacao("31/07/2018 08:23:27", "H04001010", "41", null, "2552175", "88775437368", "223505", "2552175", "01/08/2018 11:01:33", "84692774304", "225142", "2482118", null, "160707860820009", "230760");
$telediagnostico->addSolicitacao("31/07/2018 08:25:18", "H04001010", "41", null, "2374064", "43063675334", "322230", "2374064", "01/08/2018 11:41:37", "84692774304", "225142", "2482118", null, "708608017367184", "230690");
$telediagnostico->addSolicitacao("31/07/2018 08:26:58", "H04001010", "41", null, "2527189", "85326348349", "322245", "2527189", "01/08/2018 11:00:33", "84692774304", "225142", "2482118", null, "160856884670005", "231400");
$telediagnostico->addSolicitacao("31/07/2018 08:27:31", "H04001010", "41", null, "2552175", "88775437368", "223505", "2552175", "01/08/2018 11:46:43", "84692774304", "225142", "2482118", null, "708207136724749", "230760");
$telediagnostico->addSolicitacao("31/07/2018 08:28:21", "H04001010", "41", null, "6005969", "53859561391", "322245", "6005969", "01/08/2018 11:49:26", "84692774304", "225142", "2482118", null, "708207120594344", "231240");
$telediagnostico->addSolicitacao("31/07/2018 08:29:22", "H04001010", "41", null, "6005969", "53859561391", "322245", "6005969", "01/08/2018 11:36:17", "84692774304", "225142", "2482118", null, "704007384810067", "231240");
$telediagnostico->addSolicitacao("31/07/2018 08:29:57", "H04001010", "41", null, "2563851", "88169529387", "515105", "2563851", "01/08/2018 12:03:36", "84692774304", "225142", "2482118", null, "700202909747126", "230700");
$telediagnostico->addSolicitacao("31/07/2018 08:29:57", "H04001010", "41", null, "2563851", "88169529387", "515105", "2563851", "01/08/2018 11:51:25", "84692774304", "225142", "2482118", null, "700202909747126", "230700");
$telediagnostico->addSolicitacao("31/07/2018 08:37:29", "H04001010", "41", null, "6728944", "77777298372", "322250", "6728944", "01/08/2018 11:30:32", "84692774304", "225142", "2482118", null, "700008998427006", "230600");
$telediagnostico->addSolicitacao("31/07/2018 08:38:57", "H04001010", "41", null, "3860108", "00922089329", "322245", "3860108", "01/08/2018 11:42:05", "84692774304", "225142", "2482118", null, "702800111987362", "231250");
$telediagnostico->addSolicitacao("31/07/2018 08:40:00", "H04001010", "41", null, "3860108", "00922089329", "322245", "3860108", "01/08/2018 11:32:26", "84692774304", "225142", "2482118", null, "702501343164733", "231250");
$telediagnostico->addSolicitacao("31/07/2018 08:42:08", "H04001010", "41", null, "3860108", "00922089329", "322245", "3860108", "01/08/2018 11:48:50", "84692774304", "225142", "2482118", null, "706801296845822", "231250");
$telediagnostico->addSolicitacao("31/07/2018 08:42:33", "H04001010", "41", null, "2552191", "48655546372", "223565", "2552191", "01/08/2018 11:30:02", "84692774304", "225142", "2482118", null, "704805008601741", "231310");
$telediagnostico->addSolicitacao("31/07/2018 08:43:04", "H04001010", "41", null, "2527189", "85326348349", "322245", "2527189", "01/08/2018 11:43:22", "84692774304", "225142", "2482118", null, "162134276600001", "231400");
$telediagnostico->addSolicitacao("31/07/2018 08:45:52", "H04001010", "41", null, "2374064", "43063675334", "322230", "2374064", "01/08/2018 11:48:08", "84692774304", "225142", "2482118", null, "708609078472086", "230690");
$telediagnostico->addSolicitacao("31/07/2018 08:49:03", "H04001010", "41", null, "3860108", "00922089329", "322245", "3860108", "01/08/2018 11:40:40", "84692774304", "225142", "2482118", null, "700205922584424", "231250");
$telediagnostico->addSolicitacao("31/07/2018 08:57:52", "H04001010", "41", null, "2374064", "43063675334", "322230", "2374064", "01/08/2018 11:45:05", "84692774304", "225142", "2482118", null, "709006859534018", "230690");
$telediagnostico->addSolicitacao("31/07/2018 09:18:13", "H04001010", "41", null, "2563851", "88169529387", "515105", "2563851", "01/08/2018 12:00:02", "84692774304", "225142", "2482118", null, "206240045590001", "230700");
$telediagnostico->addSolicitacao("31/07/2018 09:20:57", "H04001010", "41", null, "2562154", "14214008391", "322230", "2562154", "01/08/2018 11:38:26", "84692774304", "225142", "2482118", null, "898003982923559", "230630");
$telediagnostico->addSolicitacao("31/07/2018 09:23:32", "H04001010", "41", null, "2562154", "14214008391", "322230", "2562154", "01/08/2018 11:38:18", "84692774304", "225142", "2482118", null, "898003982923559", "230630");
$telediagnostico->addSolicitacao("31/07/2018 09:23:50", "H04001010", "41", null, "2552175", "88775437368", "223505", "2552175", "01/08/2018 11:30:15", "84692774304", "225142", "2482118", null, "898003948507467", "230760");
$telediagnostico->addSolicitacao("31/07/2018 09:24:13", "H04001010", "41", null, "2481685", "06804198379", "223565", "2481685", "01/08/2018 11:18:11", "84692774304", "225142", "2482118", null, "160850845020008", "230945");
$telediagnostico->addSolicitacao("31/07/2018 09:25:59", "H04001010", "41", null, "2552175", "88775437368", "223505", "2552175", "01/08/2018 11:34:55", "84692774304", "225142", "2482118", null, "898003049565375", "230760");
$telediagnostico->addSolicitacao("31/07/2018 09:34:31", "H04001010", "41", null, "2552191", "48655546372", "223565", "2552191", "01/08/2018 10:59:29", "84692774304", "225142", "2482118", null, "704203255709984", "231310");
$telediagnostico->addSolicitacao("31/07/2018 09:39:34", "H04001010", "41", null, "2563851", "88169529387", "515105", "2563851", "01/08/2018 11:54:21", "84692774304", "225142", "2482118", null, "898003048121333", "230700");
$telediagnostico->addSolicitacao("31/07/2018 09:39:34", "H04001010", "41", null, "2373203", "74798618349", "322250", "2373203", "01/08/2018 11:34:01", "84692774304", "225142", "2482118", null, "703003866126475", "231160");
$telediagnostico->addSolicitacao("31/07/2018 09:39:56", "H04001010", "41", null, "6728944", "77777298372", "322250", "6728944", "01/08/2018 11:33:34", "84692774304", "225142", "2482118", null, "163596543860006", "230600");
$telediagnostico->addSolicitacao("31/07/2018 09:42:03", "H04001010", "41", null, "2373203", "74798618349", "322250", "2373203", "01/08/2018 11:24:38", "84692774304", "225142", "2482118", null, "706206726237970", "231160");
$telediagnostico->addSolicitacao("31/07/2018 09:47:42", "H04001010", "41", null, "6005969", "53859561391", "322245", "6005969", "01/08/2018 11:46:56", "84692774304", "225142", "2482118", null, "702907518431370", "231240");
$telediagnostico->addSolicitacao("31/07/2018 09:49:04", "H04001010", "41", null, "2373203", "74798618349", "322250", "2373203", "01/08/2018 11:26:58", "84692774304", "225142", "2482118", null, "704001397938460", "231160");
$telediagnostico->addSolicitacao("31/07/2018 09:49:22", "H04001010", "41", null, "2527189", "85326348349", "322245", "2527189", "01/08/2018 11:14:57", "84692774304", "225142", "2482118", null, "898002394795966", "231400");
$telediagnostico->addSolicitacao("31/07/2018 09:51:52", "H04001010", "41", null, "2552191", "48655546372", "223565", "2552191", "01/08/2018 11:16:35", "84692774304", "225142", "2482118", null, "700200431093620", "231310");
$telediagnostico->addSolicitacao("31/07/2018 09:53:51", "H04001010", "41", null, "2373203", "74798618349", "322250", "2373203", "01/08/2018 11:01:45", "84692774304", "225142", "2482118", null, "706906169683231", "231160");
$telediagnostico->addSolicitacao("31/07/2018 09:54:32", "H04001010", "41", null, "2374064", "43063675334", "322230", "2374064", "01/08/2018 11:37:15", "84692774304", "225142", "2482118", null, "700903905811991", "230690");
$telediagnostico->addSolicitacao("31/07/2018 09:55:03", "H04001010", "41", null, "2373203", "74798618349", "322250", "2373203", "01/08/2018 11:50:12", "84692774304", "225142", "2482118", null, "165808456520008", "231160");
$telediagnostico->addSolicitacao("31/07/2018 09:56:20", "H04001010", "41", null, "2373203", "74798618349", "322250", "2373203", "01/08/2018 11:27:33", "84692774304", "225142", "2482118", null, "702900547853672", "231160");
$telediagnostico->addSolicitacao("31/07/2018 09:57:41", "H04001010", "41", null, "3860108", "00922089329", "322245", "3860108", "01/08/2018 11:31:59", "84692774304", "225142", "2482118", null, "706308748674177", "231250");
$telediagnostico->addSolicitacao("31/07/2018 10:03:59", "H04001010", "41", null, "2374064", "43063675334", "322230", "2374064", "01/08/2018 11:28:13", "84692774304", "225142", "2482118", null, "700200902404930", "230690");
$telediagnostico->addSolicitacao("31/07/2018 10:06:23", "H04001010", "41", null, "2527189", "85326348349", "322245", "2527189", "01/08/2018 11:27:47", "84692774304", "225142", "2482118", null, "898002788527111", "231400");
$telediagnostico->addSolicitacao("31/07/2018 10:09:39", "H04001010", "41", null, "2552191", "48655546372", "223565", "2552191", "01/08/2018 11:43:04", "84692774304", "225142", "2482118", null, "700508179415554", "231310");
$telediagnostico->addSolicitacao("31/07/2018 10:13:41", "H04001010", "41", null, "2373203", "74798618349", "322250", "2373203", "01/08/2018 11:26:35", "84692774304", "225142", "2482118", null, "706203053988560", "231160");
$telediagnostico->addSolicitacao("31/07/2018 10:14:47", "H04001010", "41", null, "2373203", "74798618349", "322250", "2373203", "01/08/2018 11:01:58", "84692774304", "225142", "2482118", null, "705606416581612", "231160");
$telediagnostico->addSolicitacao("31/07/2018 10:15:50", "H04001010", "41", null, "2373203", "74798618349", "322250", "2373203", "01/08/2018 11:33:04", "84692774304", "225142", "2482118", null, "700105845846890", "231160");
$telediagnostico->addSolicitacao("31/07/2018 10:18:01", "H04001010", "41", null, "2374064", "43063675334", "322230", "2374064", "01/08/2018 11:01:04", "84692774304", "225142", "2482118", null, "700006627345603", "230690");
$telediagnostico->addSolicitacao("31/07/2018 10:18:59", "H04001010", "41", null, "2373203", "74798618349", "322250", "2373203", "01/08/2018 11:48:21", "84692774304", "225142", "2482118", null, "705207432690476", "231160");
$telediagnostico->addSolicitacao("31/07/2018 10:19:58", "H04001010", "41", null, "2373203", "74798618349", "322250", "2373203", "01/08/2018 11:25:44", "84692774304", "225142", "2482118", null, "707401042018276", "231160");
$telediagnostico->addSolicitacao("31/07/2018 10:23:32", "H04001010", "41", null, "2552191", "48655546372", "223565", "2552191", "01/08/2018 11:16:16", "84692774304", "225142", "2482118", null, "702101756498695", "231310");
$telediagnostico->addSolicitacao("31/07/2018 10:24:27", "H04001010", "41", null, "2374064", "43063675334", "322230", "2374064", "01/08/2018 11:29:10", "84692774304", "225142", "2482118", null, "702909545878579", "230690");
$telediagnostico->addSolicitacao("31/07/2018 10:24:32", "H04001010", "41", null, "2373203", "74798618349", "322250", "2373203", "01/08/2018 11:11:58", "84692774304", "225142", "2482118", null, "702809107608067", "231160");
$telediagnostico->addSolicitacao("31/07/2018 10:27:20", "H04001010", "41", null, "6005969", "53859561391", "322245", "6005969", "01/08/2018 11:20:41", "84692774304", "225142", "2482118", null, "704207737326281", "231240");
$telediagnostico->addSolicitacao("31/07/2018 10:29:08", "H04001010", "41", null, "2374064", "43063675334", "322230", "2374064", "01/08/2018 11:25:03", "84692774304", "225142", "2482118", null, "705004043513858", "230690");
$telediagnostico->addSolicitacao("31/07/2018 10:30:02", "H04001010", "41", null, "2373203", "74798618349", "322250", "2373203", "01/08/2018 11:02:12", "84692774304", "225142", "2482118", null, "703200619602594", "231160");
$telediagnostico->addSolicitacao("31/07/2018 10:31:13", "H04001010", "41", null, "6005969", "53859561391", "322245", "6005969", "01/08/2018 11:06:03", "84692774304", "225142", "2482118", null, "898000494289319", "231240");
$telediagnostico->addSolicitacao("31/07/2018 10:34:21", "H04001010", "41", null, "2527189", "85326348349", "322245", "2527189", "01/08/2018 11:37:54", "84692774304", "225142", "2482118", null, "165364948150000", "231400");
$telediagnostico->addSolicitacao("31/07/2018 10:36:33", "H04001010", "41", null, "2373203", "74798618349", "322250", "2373203", "01/08/2018 11:46:04", "84692774304", "225142", "2482118", null, "700209931386730", "231160");
$telediagnostico->addSolicitacao("31/07/2018 10:37:50", "H04001010", "41", null, "6005969", "53859561391", "322245", "6005969", "01/08/2018 11:21:41", "84692774304", "225142", "2482118", null, "700606910448064", "231240");
$telediagnostico->addSolicitacao("31/07/2018 10:41:19", "H04001010", "41", null, "6005969", "53859561391", "322245", "6005969", "01/08/2018 11:47:44", "84692774304", "225142", "2482118", null, "702404588045528", "231240");
$telediagnostico->addSolicitacao("31/07/2018 10:42:11", "H04001010", "41", null, "2374064", "43063675334", "322230", "2374064", "01/08/2018 11:23:01", "84692774304", "225142", "2482118", null, "700003816256400", "230690");
$telediagnostico->addSolicitacao("31/07/2018 10:43:48", "H04001010", "41", null, "6005969", "53859561391", "322245", "6005969", "01/08/2018 11:02:47", "84692774304", "225142", "2482118", null, "702004870789486", "231240");
$telediagnostico->addSolicitacao("31/07/2018 10:44:54", "H04001010", "41", null, "2373203", "74798618349", "322250", "2373203", "01/08/2018 11:36:52", "84692774304", "225142", "2482118", null, "700304962182937", "231160");
$telediagnostico->addSolicitacao("31/07/2018 10:47:31", "H04001010", "41", null, "2374064", "43063675334", "322230", "2374064", "01/08/2018 11:15:12", "84692774304", "225142", "2482118", null, "702501390711230", "230690");
$telediagnostico->addSolicitacao("31/07/2018 10:53:23", "H04001010", "41", null, "6005969", "53859561391", "322245", "6005969", "01/08/2018 11:15:44", "84692774304", "225142", "2482118", null, "700207492915228", "231240");
$telediagnostico->addSolicitacao("31/07/2018 10:56:10", "H04001010", "41", null, "2374064", "43063675334", "322230", "2374064", "01/08/2018 11:22:32", "84692774304", "225142", "2482118", null, "705403442994790", "230690");
$telediagnostico->addSolicitacao("31/07/2018 10:57:32", "H04001010", "41", null, "2562154", "14214008391", "322230", "2562154", "01/08/2018 11:44:21", "84692774304", "225142", "2482118", null, "201332010280006", "230630");
$telediagnostico->addSolicitacao("31/07/2018 11:02:33", "H04001010", "41", null, "2373203", "74798618349", "322250", "2373203", "01/08/2018 11:18:56", "84692774304", "225142", "2482118", null, "708001875918329", "231160");
$telediagnostico->addSolicitacao("31/07/2018 11:03:11", "H04001010", "41", null, "6005969", "53859561391", "322245", "6005969", "01/08/2018 11:40:06", "84692774304", "225142", "2482118", null, "898003238465297", "231240");
$telediagnostico->addSolicitacao("31/07/2018 11:04:52", "H04001010", "41", null, "2527189", "85326348349", "322245", "2527189", "01/08/2018 11:33:46", "84692774304", "225142", "2482118", null, "898003288362831", "231400");
$telediagnostico->addSolicitacao("31/07/2018 11:04:55", "H04001010", "41", null, "2562154", "14214008391", "322230", "2562154", "01/08/2018 11:43:39", "84692774304", "225142", "2482118", null, "700701932939480", "230630");
$telediagnostico->addSolicitacao("31/07/2018 11:06:48", "H04001010", "41", null, "6005969", "53859561391", "322245", "6005969", "01/08/2018 11:21:12", "84692774304", "225142", "2482118", null, "707708618098510", "231240");
$telediagnostico->addSolicitacao("31/07/2018 11:10:16", "H04001010", "41", null, "2374064", "43063675334", "322230", "2374064", "01/08/2018 11:28:00", "84692774304", "225142", "2482118", null, "708109588473038", "230690");
$telediagnostico->addSolicitacao("31/07/2018 11:12:45", "H04001010", "41", null, "2552191", "48655546372", "223565", "2552191", "01/08/2018 11:20:20", "84692774304", "225142", "2482118", null, "705405446048794", "231310");
$telediagnostico->addSolicitacao("31/07/2018 11:13:40", "H04001010", "41", null, "2552191", "48655546372", "223565", "2552191", "01/08/2018 12:03:56", "84692774304", "225142", "2482118", null, "700606433705668", "231310");
$telediagnostico->addSolicitacao("31/07/2018 11:14:15", "H04001010", "41", null, "2552191", "48655546372", "223565", "2552191", "01/08/2018 11:21:27", "84692774304", "225142", "2482118", null, "709004814982419", "231310");
$telediagnostico->addSolicitacao("31/07/2018 11:14:50", "H04001010", "41", null, "6005969", "53859561391", "322245", "6005969", "01/08/2018 11:08:58", "84692774304", "225142", "2482118", null, "706404621858084", "231240");
$telediagnostico->addSolicitacao("31/07/2018 11:15:16", "H04001010", "41", null, "2527189", "85326348349", "322245", "2527189", "01/08/2018 11:28:57", "84692774304", "225142", "2482118", null, "160594434950008", "231400");
$telediagnostico->addSolicitacao("31/07/2018 11:17:04", "H04001010", "41", null, "2527189", "85326348349", "322245", "2527189", "01/08/2018 11:24:51", "84692774304", "225142", "2482118", null, "898002396623259", "231400");
$telediagnostico->addSolicitacao("31/07/2018 11:18:31", "H04001010", "41", null, "2527189", "85326348349", "322245", "2527189", "01/08/2018 11:40:57", "84692774304", "225142", "2482118", null, "708409770389567", "231400");
$telediagnostico->addSolicitacao("31/07/2018 11:28:10", "H04001010", "41", null, "2374064", "43063675334", "322230", "2374064", "01/08/2018 11:41:13", "84692774304", "225142", "2482118", null, "161837572930000", "230690");
$telediagnostico->addSolicitacao("31/07/2018 11:29:40", "H04001010", "41", null, "6005969", "53859561391", "322245", "6005969", "01/08/2018 11:25:17", "84692774304", "225142", "2482118", null, "704004308805462", "231240");
$telediagnostico->addSolicitacao("31/07/2018 12:20:56", "H04001010", "41", null, "2481685", "06804198379", "223565", "2481685", "01/08/2018 11:18:25", "84692774304", "225142", "2482118", null, "898004836290092", "230945");
$telediagnostico->addSolicitacao("31/07/2018 12:32:15", "H04001010", "41", null, "2481685", "06804198379", "223565", "2481685", "01/08/2018 11:37:36", "84692774304", "225142", "2482118", null, "160487306170003", "230945");
$telediagnostico->addSolicitacao("31/07/2018 12:41:58", "H04001010", "41", null, "2481685", "06804198379", "223565", "2481685", "01/08/2018 11:00:20", "84692774304", "225142", "2482118", null, "898004243835995", "230945");
$telediagnostico->addSolicitacao("31/07/2018 13:18:07", "H04001010", "41", null, "2481685", "06804198379", "223565", "2481685", "01/08/2018 11:12:49", "84692774304", "225142", "2482118", null, "898004279198952", "230945");
$telediagnostico->addSolicitacao("31/07/2018 13:19:17", "H04001010", "41", null, "2552175", "88775437368", "223505", "2552175", "01/08/2018 11:29:40", "84692774304", "225142", "2482118", null, "706906133030432", "230760");
$telediagnostico->addSolicitacao("31/07/2018 13:20:14", "H04001010", "41", null, "5105315", "88463982387", "223505", "5105315", "01/08/2018 11:47:20", "84692774304", "225142", "2482118", null, "700407178792850", "230428");
$telediagnostico->addSolicitacao("31/07/2018 13:20:36", "H04001010", "41", null, "2481685", "06804198379", "223565", "2481685", "01/08/2018 11:36:40", "84692774304", "225142", "2482118", null, "700506719971859", "230945");
$telediagnostico->addSolicitacao("31/07/2018 13:22:05", "H04001010", "41", null, "2481685", "06804198379", "223565", "2481685", "01/08/2018 11:13:30", "84692774304", "225142", "2482118", null, "898004216387723", "230945");
$telediagnostico->addSolicitacao("31/07/2018 13:23:06", "H04001010", "41", null, "2481685", "06804198379", "223565", "2481685", "01/08/2018 11:29:51", "84692774304", "225142", "2482118", null, "160604060850009", "230945");
$telediagnostico->addSolicitacao("31/07/2018 13:24:05", "H04001010", "41", null, "2481685", "06804198379", "223565", "2481685", "01/08/2018 11:36:01", "84692774304", "225142", "2482118", null, "898000507214252", "230945");
$telediagnostico->addSolicitacao("31/07/2018 13:25:01", "H04001010", "41", null, "2478927", "37019376304", "322230", "2478927", "01/08/2018 11:33:22", "84692774304", "225142", "2482118", null, "700503380782556", "230280");
$telediagnostico->addSolicitacao("31/07/2018 13:25:11", "H04001010", "41", null, "2481685", "06804198379", "223565", "2481685", "01/08/2018 11:17:05", "84692774304", "225142", "2482118", null, "160849372260005", "230945");
$telediagnostico->addSolicitacao("31/07/2018 13:25:28", "H04001010", "41", null, "5105315", "88463982387", "223505", "5105315", "01/08/2018 11:15:58", "84692774304", "225142", "2482118", null, "898003999635683", "230428");
$telediagnostico->addSolicitacao("31/07/2018 13:27:50", "H04001010", "41", null, "2481685", "06804198379", "223565", "2481685", "01/08/2018 11:30:54", "84692774304", "225142", "2482118", null, "210202220950008", "230945");
$telediagnostico->addSolicitacao("31/07/2018 13:30:22", "H04001010", "41", null, "5105315", "88463982387", "223505", "5105315", "01/08/2018 11:22:14", "84692774304", "225142", "2482118", null, "702907533573474", "230428");
$telediagnostico->addSolicitacao("31/07/2018 13:32:00", "H04001010", "41", null, "2481685", "06804198379", "223565", "2481685", "01/08/2018 11:49:49", "84692774304", "225142", "2482118", null, "898003298247458", "230945");
$telediagnostico->addSolicitacao("31/07/2018 13:33:14", "H04001010", "41", null, "6728944", "77777298372", "322250", "6728944", "01/08/2018 11:20:06", "84692774304", "225142", "2482118", null, "701104042327410", "230600");
$telediagnostico->addSolicitacao("31/07/2018 13:34:27", "H04001010", "41", null, "2481685", "06804198379", "223565", "2481685", "01/08/2018 11:36:29", "84692774304", "225142", "2482118", null, "164276101560008", "230945");
$telediagnostico->addSolicitacao("31/07/2018 13:35:21", "H04001010", "41", null, "2481685", "06804198379", "223565", "2481685", "01/08/2018 11:45:49", "84692774304", "225142", "2482118", null, "162403504010005", "230945");
$telediagnostico->addSolicitacao("31/07/2018 13:35:41", "H04001010", "41", null, "5105315", "88463982387", "223505", "5105315", "01/08/2018 11:35:25", "84692774304", "225142", "2482118", null, "700003565010503", "230428");
$telediagnostico->addSolicitacao("31/07/2018 13:37:48", "H04001010", "41", null, "2481685", "06804198379", "223565", "2481685", "01/08/2018 11:37:03", "84692774304", "225142", "2482118", null, "165290204710005", "230945");
$telediagnostico->addSolicitacao("31/07/2018 13:38:40", "H04001010", "41", null, "2481685", "06804198379", "223565", "2481685", "01/08/2018 11:02:32", "84692774304", "225142", "2482118", null, "898004242383446", "230945");
$telediagnostico->addSolicitacao("31/07/2018 13:40:09", "H04001010", "41", null, "2481685", "06804198379", "223565", "2481685", "01/08/2018 11:24:14", "84692774304", "225142", "2482118", null, "898004852505901", "230945");
$telediagnostico->addSolicitacao("31/07/2018 13:41:10", "H04001010", "41", null, "2481685", "06804198379", "223565", "2481685", "01/08/2018 11:26:47", "84692774304", "225142", "2482118", null, "898004272765835", "230945");
$telediagnostico->addSolicitacao("31/07/2018 13:41:51", "H04001010", "41", null, "5105315", "88463982387", "223505", "5105315", "01/08/2018 11:16:49", "84692774304", "225142", "2482118", null, "898002733545193", "230428");
$telediagnostico->addSolicitacao("31/07/2018 13:42:02", "H04001010", "41", null, "2481685", "06804198379", "223565", "2481685", "01/08/2018 11:43:58", "84692774304", "225142", "2482118", null, "160662429040004", "230945");
$telediagnostico->addSolicitacao("31/07/2018 13:44:04", "H04001010", "41", null, "2478927", "37019376304", "322230", "2478927", "01/08/2018 11:34:13", "84692774304", "225142", "2482118", null, "898000533524298", "230280");
$telediagnostico->addSolicitacao("31/07/2018 13:49:34", "H04001010", "41", null, "5105315", "88463982387", "223505", "5105315", "01/08/2018 11:32:13", "84692774304", "225142", "2482118", null, "898002809698114", "230428");
$telediagnostico->addSolicitacao("31/07/2018 13:49:43", "H04001010", "41", null, "2481685", "06804198379", "223565", "2481685", "01/08/2018 11:14:16", "84692774304", "225142", "2482118", null, "160493671250018", "230945");
$telediagnostico->addSolicitacao("31/07/2018 13:54:18", "H04001010", "41", null, "2481685", "06804198379", "223565", "2481685", "01/08/2018 11:19:09", "84692774304", "225142", "2482118", null, "160602901760001", "230945");
$telediagnostico->addSolicitacao("31/07/2018 13:54:53", "H04001010", "41", null, "2478927", "37019376304", "322230", "2478927", "01/08/2018 11:07:09", "84692774304", "225142", "2482118", null, "706808745218125", "230280");
$telediagnostico->addSolicitacao("31/07/2018 13:55:46", "H04001010", "41", null, "2552191", "48655546372", "223565", "2552191", "01/08/2018 11:19:50", "84692774304", "225142", "2482118", null, "702006805021384", "231310");
$telediagnostico->addSolicitacao("31/07/2018 14:00:27", "H04001010", "41", null, "2374064", "43063675334", "322230", "2374064", "01/08/2018 11:35:06", "84692774304", "225142", "2482118", null, "204292981820005", "230690");
$telediagnostico->addSolicitacao("31/07/2018 14:01:35", "H04001010", "41", null, "2481685", "06804198379", "223565", "2481685", "01/08/2018 11:22:47", "84692774304", "225142", "2482118", null, "160494392740001", "230945");
$telediagnostico->addSolicitacao("31/07/2018 14:01:58", "H04001010", "41", null, "6005969", "53859561391", "322245", "6005969", "01/08/2018 11:08:37", "84692774304", "225142", "2482118", null, "704204258490186", "231240");
$telediagnostico->addSolicitacao("31/07/2018 14:03:20", "H04001010", "41", null, "5105315", "88463982387", "223505", "5105315", "01/08/2018 11:38:48", "84692774304", "225142", "2482118", null, "200498157380005", "230428");
$telediagnostico->addSolicitacao("31/07/2018 14:04:18", "H04001010", "41", null, "2478927", "37019376304", "322230", "2478927", "01/08/2018 11:06:46", "84692774304", "225142", "2482118", null, "132194971940018", "230280");
$telediagnostico->addSolicitacao("31/07/2018 14:05:14", "H04001010", "41", null, "2481685", "06804198379", "223565", "2481685", "01/08/2018 11:01:19", "84692774304", "225142", "2482118", null, "160491654920009", "230945");
$telediagnostico->addSolicitacao("31/07/2018 14:07:43", "H04001010", "41", null, "6005969", "53859561391", "322245", "6005969", "01/08/2018 11:41:25", "84692774304", "225142", "2482118", null, "706209060173165", "231240");
$telediagnostico->addSolicitacao("31/07/2018 14:08:49", "H04001010", "41", null, "2552191", "48655546372", "223565", "2552191", "01/08/2018 11:34:40", "84692774304", "225142", "2482118", null, "700208901921025", "231310");
$telediagnostico->addSolicitacao("31/07/2018 14:09:26", "H04001010", "41", null, "2481685", "06804198379", "223565", "2481685", "01/08/2018 11:22:00", "84692774304", "225142", "2482118", null, "898000501613147", "230945");
$telediagnostico->addSolicitacao("31/07/2018 14:10:52", "H04001010", "41", null, "5105315", "88463982387", "223505", "5105315", "01/08/2018 11:00:04", "84692774304", "225142", "2482118", null, "161036779210003", "230428");
$telediagnostico->addSolicitacao("31/07/2018 14:13:34", "H04001010", "41", null, "6005969", "53859561391", "322245", "6005969", "01/08/2018 11:50:00", "84692774304", "225142", "2482118", null, "166019338220000", "231240");
$telediagnostico->addSolicitacao("31/07/2018 14:13:51", "H04001010", "41", null, "2481685", "06804198379", "223565", "2481685", "01/08/2018 11:47:55", "84692774304", "225142", "2482118", null, "898004215863041", "230945");
$telediagnostico->addSolicitacao("31/07/2018 14:17:11", "H04001010", "41", null, "5105315", "88463982387", "223505", "5105315", "01/08/2018 11:35:49", "84692774304", "225142", "2482118", null, "707008810781637", "230428");
$telediagnostico->addSolicitacao("31/07/2018 14:17:14", "H04001010", "41", null, "2481685", "06804198379", "223565", "2481685", "01/08/2018 11:14:01", "84692774304", "225142", "2482118", null, "898000501169719", "230945");
$telediagnostico->addSolicitacao("31/07/2018 14:17:52", "H04001010", "41", null, "2373203", "74798618349", "322250", "2373203", "01/08/2018 11:32:37", "84692774304", "225142", "2482118", null, "700001111654101", "231160");
$telediagnostico->addSolicitacao("31/07/2018 14:18:55", "H04001010", "41", null, "6005969", "53859561391", "322245", "6005969", "01/08/2018 11:24:26", "84692774304", "225142", "2482118", null, "706702581421417", "231240");
$telediagnostico->addSolicitacao("31/07/2018 14:22:29", "H04001010", "41", null, "2481685", "06804198379", "223565", "2481685", "01/08/2018 11:11:21", "84692774304", "225142", "2482118", null, "700006547066805", "230945");
$telediagnostico->addSolicitacao("31/07/2018 14:22:40", "H04001010", "41", null, "5105315", "88463982387", "223505", "5105315", "01/08/2018 11:10:01", "84692774304", "225142", "2482118", null, "703205607366194", "230428");
$telediagnostico->addSolicitacao("31/07/2018 14:25:48", "H04001010", "41", null, "2478927", "37019376304", "322230", "2478927", "01/08/2018 11:42:46", "84692774304", "225142", "2482118", null, "161832352970009", "230280");
$telediagnostico->addSolicitacao("31/07/2018 14:27:04", "H04001010", "41", null, "2481685", "06804198379", "223565", "2481685", "01/08/2018 11:10:29", "84692774304", "225142", "2482118", null, "700508195561152", "230945");
$telediagnostico->addSolicitacao("31/07/2018 14:32:15", "H04001010", "41", null, "2481685", "06804198379", "223565", "2481685", "01/08/2018 11:32:48", "84692774304", "225142", "2482118", null, "164011972190000", "230945");
$telediagnostico->addSolicitacao("31/07/2018 14:34:15", "H04001010", "41", null, "2481685", "06804198379", "223565", "2481685", "01/08/2018 11:49:38", "84692774304", "225142", "2482118", null, "898004506164557", "230945");
$telediagnostico->addSolicitacao("31/07/2018 14:34:45", "H04001010", "41", null, "2552175", "88775437368", "223505", "2552175", "01/08/2018 11:20:57", "84692774304", "225142", "2482118", null, "160520155010005", "230760");
$telediagnostico->addSolicitacao("31/07/2018 14:36:18", "H04001010", "41", null, "2374064", "43063675334", "322230", "2374064", "01/08/2018 11:27:18", "84692774304", "225142", "2482118", null, "700007960425102", "230690");
$telediagnostico->addSolicitacao("31/07/2018 14:38:11", "H04001010", "41", null, "3860108", "00922089329", "322245", "3860108", "01/08/2018 11:38:05", "84692774304", "225142", "2482118", null, "704600112292722", "231250");
$telediagnostico->addSolicitacao("31/07/2018 14:42:26", "H04001010", "41", null, "3860108", "00922089329", "322245", "3860108", "01/08/2018 11:31:30", "84692774304", "225142", "2482118", null, "706307789467973", "231250");
$telediagnostico->addSolicitacao("31/07/2018 14:43:29", "H04001010", "41", null, "2481685", "06804198379", "223565", "2481685", "01/08/2018 11:12:34", "84692774304", "225142", "2482118", null, "161117937810006", "230945");
$telediagnostico->addSolicitacao("31/07/2018 14:44:19", "H04001010", "41", null, "3860108", "00922089329", "322245", "3860108", "01/08/2018 11:13:04", "84692774304", "225142", "2482118", null, "708203157162142", "231250");
$telediagnostico->addSolicitacao("31/07/2018 14:45:21", "H04001010", "41", null, "6728944", "77777298372", "322250", "6728944", "01/08/2018 11:42:17", "84692774304", "225142", "2482118", null, "162360007280002", "230600");
$telediagnostico->addSolicitacao("31/07/2018 14:45:32", "H04001010", "41", null, "3860108", "00922089329", "322245", "3860108", "01/08/2018 11:25:59", "84692774304", "225142", "2482118", null, "700203431299825", "231250");
$telediagnostico->addSolicitacao("31/07/2018 14:50:50", "H04001010", "41", null, "2374064", "43063675334", "322230", "2374064", "01/08/2018 11:34:25", "84692774304", "225142", "2482118", null, "703009808953173", "230690");
$telediagnostico->addSolicitacao("31/07/2018 14:51:42", "H04001010", "41", null, "2552191", "48655546372", "223565", "2552191", "01/08/2018 11:30:43", "84692774304", "225142", "2482118", null, "700504750210056", "231310");
$telediagnostico->addSolicitacao("31/07/2018 14:57:31", "H04001010", "41", null, "2481685", "06804198379", "223565", "2481685", "01/08/2018 11:49:06", "84692774304", "225142", "2482118", null, "700209435432223", "230945");
$telediagnostico->addSolicitacao("31/07/2018 15:00:24", "H04001010", "41", null, "6005969", "53859561391", "322245", "6005969", "01/08/2018 11:23:14", "84692774304", "225142", "2482118", null, "702402526938926", "231240");
$telediagnostico->addSolicitacao("31/07/2018 15:04:10", "H04001010", "41", null, "2374064", "43063675334", "322230", "2374064", "01/08/2018 11:45:23", "84692774304", "225142", "2482118", null, "705408487236490", "230690");
$telediagnostico->addSolicitacao("31/07/2018 15:25:58", "H04001010", "41", null, "2481685", "06804198379", "223565", "2481685", "01/08/2018 11:17:55", "84692774304", "225142", "2482118", null, "125044526420001", "230945");
$telediagnostico->addSolicitacao("31/07/2018 15:59:49", "H04001010", "41", null, "2481685", "06804198379", "223565", "2481685", "01/08/2018 11:19:30", "84692774304", "225142", "2482118", null, "898002730240804", "230945");
$telediagnostico->addSolicitacao("31/07/2018 16:38:51", "H04001010", "41", null, "2552191", "48655546372", "223565", "2552191", "01/08/2018 11:26:23", "84692774304", "225142", "2482118", null, "708708143380290", "231310");


////////////////////////////////////////////////////////////////
//INTEGRA
$url = 'http://smart.telessaude.ufrn.br/';
$integra = new Integra("ad9c2aa3622033fc9d79703fde22a4e892641221");


////////////////////////////////////////////////////////////////
//0 - Estabelecimentos - Atualização
echo "<br/><br/><fieldset><legend>Estabelecimentos - Atualização</legend>";
$estabelecimento = new EstabelecimentoSaude("0000088", "082018");
$estabelecimento->atualizarEstabelecimentoSaude("2426765", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2610698", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("3860108", false, true, false);
$estabelecimento->atualizarEstabelecimentoSaude("2515261", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2481928", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2480093", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2664542", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2527189", false, true, false);
$estabelecimento->atualizarEstabelecimentoSaude("2481936", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2563851", false, true, false);
$estabelecimento->atualizarEstabelecimentoSaude("6728944", false, true, false);
$estabelecimento->atualizarEstabelecimentoSaude("6005969", false, true, false);
$estabelecimento->atualizarEstabelecimentoSaude("2374064", false, true, false);
$estabelecimento->atualizarEstabelecimentoSaude("2482312", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2478927", false, true, false);
$estabelecimento->atualizarEstabelecimentoSaude("5105315", false, true, false);
$estabelecimento->atualizarEstabelecimentoSaude("2552191", false, true, false);
$estabelecimento->atualizarEstabelecimentoSaude("2481685", false, true, false);
$estabelecimento->atualizarEstabelecimentoSaude("2552175", false, true, false);
$estabelecimento->atualizarEstabelecimentoSaude("2478722", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2372991", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("6813801", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2373203", false, true, false);
$estabelecimento->atualizarEstabelecimentoSaude("2528991", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2562154", false, true, false);
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