<?php
header("Content-Type: text/html; charset=utf-8");
require("classes/integra.class.php");
error_reporting(E_ALL);
ini_set("display_errors", 1);
set_time_limit(0);


////////////////////////////////////////////////////////////////
//1 - Teleconsultorias - Cadastro profissionais
$profissionalTeleconsultorias = new ProfissionalSaude("0000088", "052019");
$profissionalTeleconsultorias->addProfissionalSaude(null, "00307657302", "REIFER GOMES LEITE", "2481278", "225142", null, "03", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "00526896388", "PATRÍCIA DE ALMEIDA AIRES", "6358225", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "04241948308", "ANA JESSICA ANDRADE GOMES", "3897788", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "60019317395", "ÍTALAN DE JESUS PORTELA SANTOS", "2528770", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "02894739346", "RAISSA DEBORA MENDONCA AGUIAR NOBRE", "3981509", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "04632763373", "ANA CAROLINNE BATISTA BRAGA RICARTE", "2724855", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "01786778335", "DANIEL RICARDO DO NASCIMENTO SANTOS", "6017274", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "00691740321", "LUIZ GERALDO DE OLIVEIRA NETO", "2725878", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "30669117803", "DANIEL WILLIANS LACAVA GARREFA", "6489990", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "89307410372", "NILDES CASTRO DE SOUSA", "2307766", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "08748070777", "MARCUS FABIO SILVA FONTINELI", "7943776", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "03531870386", "MICAELLA CRYSTINA FREITAS ARAUJO", "2311127", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "96426705349", "SINDYA CRISTINA PEREIRA ALMEIDA", "2455552", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "60033722307", "JOAQUIN TOMAS DE LA PUENTE SUAREZ", "2478854", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "00883601486", "KARLY MICHELLE NERIS RODRIGUES", "3778991", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "03492750338", "SÁVIO EMMANUEL DOS SANTOS MOURA", "2699958", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "65005309349", "LEONEL LINHARES DE OLIVEIRA", "2460807", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "04851761309", "MAYJANE SILVA DE SOUSA PORTO ", "5284422", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "29310880805", "SILENIR CRUZ DE LIMA", "2310880", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "04836147344", "ANTONIO EDUARDO DOS SANTOS SILVA", "7181477", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "03529795348", "AMANADA SANTOS CHAGAS", "2454211", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "00549513302", "OTNIEL ALVES LEONCIO DE ALMEIDA", "6294774", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "02706643358", "DANDARA RUANA SOARES BARBOSA", "2478455", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "40732608805", "VANDRIANE OLIVEIRA LEITE ", "5851289", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "04329530350", "ALYSSON DUARTE LIMA ALVES", "2614103", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "03755255308", "TAMARA DE SOUZA SAMPAIO", "2699958", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "85217182334", "ANDRE FALCAO SILVA", "2454599", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "99384396320", "WANDERSON MAIA GUEDES DA SILVA ", "2454661", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "93040040200", "JAMILENA FLORES QUEIROZ", "5922550", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "02925059309", "LUIZA CARACAS", "2805073", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "10365389234", "TELDA MARIA COSTA FERREIRA", "2456117", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "00673513360", "KELLYTON EMANUEL CRAVEIRO DA SILVA", "2460122", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "00669341339", "DORYSDELIA MARIA GONCALVES PEREIRA", "2373149", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "05101161322", "MARIA SUYANE PARENTE PAULINO LINHARES", "2480247", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "63874814300", "LEANDRO FERRAZ CASTRO", "2454548", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "93371845320", "MÁRCIO SERRA CAMPOS", "2465701", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "65325605372", "FRANCINEIDE SANTANA SILVA", "2531178", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "95645659368", "ANIVIA SILVA CARVALHO", "2453886", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "39080404268", "DAVI MARQUES CUNHA", "3005712", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "01225156335", "CARLOS ALBERTO SILVA SANTOS JUNIOR", "2454343", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "85809586368", "JOSÉ RICARDO FERREIRA ", "7079710", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "57909385234", "NEIVA COSTA DOS SANTOS", "7636504", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "36597767268", "ARTEMIZIA GONÇALVES DE SOUZA", "7926871", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "04010174358", "LÉO BATISTA SOUSA", "2565439", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "64198006253", "CHRISTIANE PASTRO TONACO", "2454610", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "98562118320", "THIAGO ALBINO DE MENEZES", "5018137", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "03589225343", "IGOR MAIA SERRA CALLOU DE MATOS", "2478625", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "02601250321", "DIEGO ONILTON COSTA SALES", "2552027", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "03263256386", "LUCIANA COSTA CORREIA ", "2347652", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "37654985304", "AQUIM PEREIRA COSTA ", "2307499", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "00377379379", "FRANCIGLECIA BARBOZA LOPES", "3794695", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "99643545334", "CELSO DIAS DE MOURA JUNIOR", "2529831", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "04776826500", "EMANUELA SILVA REIS", "7155395", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "06094096460", "MARIA NATALIA DE CARVALHO COSTA DORNELLES ", "2455420", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "99286076304", "PEDRO HENRIQUE MELO QUEIROZ", "2528908", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "60246596872", "FRANCISCO TADEU SOUSA DOS SANTOS", "2427095", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "02507914394", "LUIZ CAVALCANTE MOTA NETO ", "2478935", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "99252155368", "CICERA DOS SANTOS MOURA", "3028437", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "80981895204", "EMERSON DA SILVA TEOTONIO", "3541509", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "04677871310", "VANESSA ANDRADE DE OLIVEIRA ", "7179405", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "04900353370", "BRENDA PAULA BRITO LOBÃO ", "2307561", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "04361650314", "ELYABE DA SILVA MELO", "2464152", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "05135641360", "RAFAELLA SILVA MELO", "2307359", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "03445628327", "EMMANUELLE DAS MERCÊS CRUZ MARAMALDO", "2464195", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "03094577342", "MARIANA SAMPAIO RODRIGUES", "7247486", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "04186405301", "MARIA LINDAIANE FERREIRA CAMPOS", "6178987", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "04935568348", "BIANCA PORTELA TELES PESSOA", "2307480", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "01588402673", "DIOGO AUGUSTO FERREIRA", "2610965", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "03422406336", "LORENA DE SOUSA MOURA ARAÚJO", "2424304", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "05447242592", "RAFAEL FERNANDES DE SOUZA", "2463903", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "03459051302", "RAIZA RÉGIA DE SOUSA SILVA", "6153860", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "00583822320", "BRENO HENRIQUE ROCHA VIEIRA", "2311178", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "03693584303", "JORGIANA MENDES VIEIRA COELHO", "2794187", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "03674218364", "LUIZA BEZERRA CAVALCANTE SOARES", "2529351", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "93401728334", "CESAR SEGUNDO GOMES TIMBÓ MORORÓ", "2478722", "223565", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "01343453470", "LARISSA RODRIGUES NUNES", "2311151", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "75143801249", "MARCOS DE MELO LIMA ", "2454092", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "02557234311", "IZA PEREIRA BEZERRA", "2613816", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "03089394332", "DEUSDETE CAIO ROCHA GOMES", "2458780", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "01896562396", "LADMARK DE MENESES LEAL", "2308037", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "02651234370", "SARAH DALYLLA DOS SANTOS DA SILVA", "3326853", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "06582557114", "RUBERLANDO ORIOL HIDALGO TORANZO", "5171512", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "05004283362", "LUBIO BOECHAT NETO", "6687865", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "05195908303", "RAYRES RIBEIRO OLIVEIRA", "3255212", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "91587085372", "JAILSON CAVALCANTE LIMA", "2465353", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "05330184398", "GESSICA PEREIRA DA SILVA", "3099059", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "05397656356", "YURI ANTHONY TEIXEIRA FARIAS", "2644142", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "00869307452", "PAULO ROBERTO LIMA DA SILVA", "3549097", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "00635378345", "ARISTOTELES ANDRADE DOS SANTOS", "2459736", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "05174901709", "PABLO LUIZ MOURA MACHADO", "2613786", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "04583856113", "MARCELO CLEMENCIO SANTELLO", "6917283", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "60021796319", "EFRAIM DE SENA CARVALHO", "6907210", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "03777466301", "RONALDO DOS SANTOS ALVES JUNIOR", "5525888", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "03148228367", "RAFAEL SAMPAIO ROLIM", "2527294", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "00268179778", "LUIZ OTAVIO MENDES DE CARVALHO", "2461668", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "02603946374", "JÉSSICA OLIVEIRA CHAVES", "3459985", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "06265799371", "ANDERSON BARBOSA BRAGA", "2664356", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "06220004469", "BETANIA CARDOSO", "2644436", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "04602472397", "SOCRATES BELEM GOMES", "6372589", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "03941651366", "RAYLENA MARIA DA SILVA OLIVEIRA	", "6359922", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "04173429347", "ALINE MOTA ALVES", "2561980", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "04230079397", "RAFAELA VIEIRA RIPARDO", "2373467", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "79571107204", "ADRIANA DA SILVA NASCIMENTO", "6976050", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "07228383605", "SCARLETT COSTA DE OLIVEIRA", "2310597", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "01343826330", "ARIELLA AGUIAR NOGUEIRA ", "5072387", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "03988796301", "LARISSE MARIA DI PAULA ALENCAR SOUSA", "2455137", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "05155420326", "BIANCA DA SILVA DE SOUZA", "2656108", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "04083834374", "ZANICLEIA DOS SANTOS SOUSA", "2717859", "225142", null, "01", "F");


////////////////////////////////////////////////////////////////
//2 - Teleconsultorias
$teleconsultoria = new Teleconsultoria("0000088", "052019");
$teleconsultoria->addSolicitacao("22/04/2019 12:58:40", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "02925059309", "225142", "2805073", null, "01", ["I709"], ["K92"], "03/05/2019 21:39:39", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("22/04/2019 19:18:25", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "04010174358", "225142", "2565439", null, "01", ["L040"], ["B70"], "09/05/2019 17:02:55", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("26/04/2019 19:45:13", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "03492750338", "225142", "2699958", null, "01", ["Q380"], [""], "09/05/2019 17:20:56", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("29/04/2019 19:14:59", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "05101161322", "225142", "2480247", null, "01", ["K100"], [""], "02/05/2019 19:13:50", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("30/04/2019 09:59:17", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "93040040200", "225142", "5922550", null, "01", ["A370"], ["R71"], "01/05/2019 06:37:11", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("30/04/2019 10:04:08", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "93040040200", "225142", "5922550", null, "01", ["L84"], [""], "03/05/2019 21:05:25", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("30/04/2019 10:24:41", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "39080404268", "225142", "3005712", null, "01", ["Z123"], ["A98"], "04/05/2019 08:43:23", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("30/04/2019 17:33:12", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "03263256386", "225142", "2347652", null, "01", ["N911"], ["X05"], "01/05/2019 09:58:29", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("30/04/2019 17:38:50", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "03263256386", "225142", "2347652", null, "01", ["L599"], ["S80"], "03/05/2019 21:16:35", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("30/04/2019 18:27:17", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "03263256386", "225142", "2347652", null, "01", ["Z369"], ["W78"], "01/05/2019 10:00:28", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("30/04/2019 21:59:22", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "04776826500", "225142", "7155395", null, "01", ["L650"], ["S23"], "07/05/2019 21:09:39", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("30/04/2019 22:08:48", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "04776826500", "225142", "7155395", null, "01", ["L920"], ["L87"], "01/05/2019 07:07:15", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("30/04/2019 22:09:36", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "04776826500", "225142", "7155395", null, "01", ["L920"], ["L87"], "01/05/2019 07:12:32", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("30/04/2019 22:14:26", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "04776826500", "225142", "7155395", null, "01", ["L920"], ["L87"], "01/05/2019 09:44:44", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("30/04/2019 22:33:56", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "02601250321", "225142", "2552027", null, "01", ["E115"], ["T90"], "01/05/2019 10:16:49", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("30/04/2019 22:37:12", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "04776826500", "225142", "7155395", null, "01", ["L210"], ["S86"], "01/05/2019 10:01:36", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("30/04/2019 22:42:39", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "02601250321", "225142", "2552027", null, "01", ["N959"], ["X11"], "01/05/2019 10:03:47", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("30/04/2019 22:50:06", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "02601250321", "225142", "2552027", null, "01", ["I250"], ["K76"], "03/05/2019 21:52:28", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("30/04/2019 23:00:49", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "02601250321", "225142", "2552027", null, "01", ["Z000"], ["A97"], "03/05/2019 20:10:44", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("30/04/2019 23:14:29", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "02601250321", "225142", "2552027", null, "01", ["Z124"], ["A98"], "01/05/2019 10:05:28", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("30/04/2019 23:20:14", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "02601250321", "225142", "2552027", null, "01", ["I00"], ["K71"], "03/05/2019 22:00:46", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("01/05/2019 04:47:33", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "04632763373", "225142", "2724855", null, "01", ["I839"], ["K95"], "06/05/2019 17:10:33", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("01/05/2019 10:58:18", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "00377379379", "225142", "3794695", null, "01", ["B99"], ["A78"], "08/05/2019 20:42:07", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("01/05/2019 12:20:31", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "60033722307", "225142", "2478854", null, "01", ["O13"], ["W81"], "01/05/2019 22:12:07", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("01/05/2019 12:29:15", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "60033722307", "225142", "2478854", null, "01", ["Z000"], ["A97"], "07/05/2019 21:14:20", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("01/05/2019 12:39:03", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "60033722307", "225142", "2478854", null, "01", ["I880"], ["B71"], "01/05/2019 23:42:13", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("01/05/2019 18:39:44", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "00669341339", "225142", "2373149", null, "01", ["Z359"], ["W84"], "01/05/2019 22:10:23", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("01/05/2019 21:21:18", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "00377379379", "225142", "3794695", null, "01", ["E039"], ["T86"], "02/05/2019 11:23:47", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("01/05/2019 21:44:50", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "00377379379", "225142", "3794695", null, "01", ["I200"], ["K74"], "03/05/2019 22:25:42", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("02/05/2019 10:01:37", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "00691740321", "225142", "2725878", null, "01", ["E039"], ["T86"], "02/05/2019 12:27:06", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("02/05/2019 10:09:22", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "00691740321", "225142", "2725878", null, "01", ["E042"], ["T81"], "02/05/2019 12:51:36", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("02/05/2019 15:44:26", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "60246596872", "225142", "2427095", null, "01", ["E109"], ["T89"], "02/05/2019 17:22:55", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("02/05/2019 16:14:00", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "60246596872", "225142", "2427095", null, "01", ["L560"], ["S80"], "02/05/2019 16:39:01", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("02/05/2019 17:26:52", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "60246596872", "225142", "2427095", null, "01", ["M950"], ["L81"], "03/05/2019 07:53:04", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("02/05/2019 18:05:28", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "00691740321", "225142", "2725878", null, "01", ["Z000"], ["A97"], "07/05/2019 21:36:38", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("03/05/2019 11:02:42", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "03589225343", "225142", "2478625", null, "01", ["Z000"], ["A97"], "03/05/2019 13:33:37", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("03/05/2019 11:10:05", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "03589225343", "225142", "2478625", null, "01", ["L280"], ["S99"], "07/05/2019 21:55:19", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("03/05/2019 14:54:44", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "30669117803", "225142", "6489990", null, "01", ["O150"], ["W81"], "03/05/2019 16:24:49", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("05/05/2019 20:03:48", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "98562118320", "225142", "5018137", null, "01", ["I209"], ["K74"], "11/05/2019 12:29:05", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("06/05/2019 16:29:43", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "03589225343", "225142", "2478625", null, "01", ["E46"], ["T91"], "07/05/2019 06:57:17", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("06/05/2019 16:55:46", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "03589225343", "225142", "2478625", null, "01", ["Z000"], ["A97"], "06/05/2019 21:05:27", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("06/05/2019 17:10:38", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "03589225343", "225142", "2478625", null, "01", ["D570"], ["B78"], "12/05/2019 20:21:09", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("06/05/2019 17:10:38", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "03589225343", "225142", "2478625", null, "01", ["D570"], ["B78"], "12/05/2019 20:23:05", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("06/05/2019 18:40:11", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "85809586368", "225142", "7079710", null, "01", ["A160"], ["A70"], "12/05/2019 20:47:36", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("07/05/2019 07:51:32", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "99286076304", "225142", "2528908", null, "01", ["Z000"], ["A97"], "08/05/2019 20:36:06", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("07/05/2019 13:09:12", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "02706643358", "225142", "2478455", null, "01", ["K210"], ["D84"], "08/05/2019 06:39:17", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("09/05/2019 08:40:47", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "93040040200", "225142", "5922550", null, "01", ["I10"], ["K86"], "12/05/2019 20:58:08", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("09/05/2019 08:40:57", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "93040040200", "225142", "5922550", null, "01", ["I10"], ["K86"], "12/05/2019 20:59:08", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("10/05/2019 21:53:35", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "04241948308", "225142", "3897788", null, "01", ["B589"], ["R83"], "11/05/2019 10:07:43", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("14/05/2019 23:37:47", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "02706643358", "225142", "2478455", null, "01", ["L280"], ["S99"], "15/05/2019 05:24:13", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("15/05/2019 07:27:20", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "99286076304", "225142", "2528908", null, "01", ["E039"], ["T86"], "16/05/2019 14:59:23", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("15/05/2019 17:55:22", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "99286076304", "225142", "2528908", null, "01", ["I500"], ["K77"], "21/05/2019 07:19:48", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("16/05/2019 11:05:51", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "99286076304", "225142", "2528908", null, "01", ["I490"], ["K80"], "16/05/2019 16:31:00", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("17/05/2019 11:22:02", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "00307657302", "225142", "2481278", null, "03", ["I459"], ["K84"], "21/05/2019 14:53:12", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("17/05/2019 17:00:22", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "02706643358", "225142", "2478455", null, "01", ["B350"], ["S74"], "19/05/2019 17:42:42", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("17/05/2019 17:12:28", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "02706643358", "225142", "2478455", null, "01", ["E039"], ["T86"], "18/05/2019 11:12:38", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("20/05/2019 14:47:22", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "03755255308", "225142", "2699958", null, "01", ["J22"], ["R78"], "20/05/2019 16:09:55", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("22/05/2019 11:15:46", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "93401728334", "223565", "2478722", null, "01", ["D689"], ["B83"], "22/05/2019 15:17:58", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("22/05/2019 22:48:24", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "01588402673", "225142", "2610965", null, "01", ["B99"], ["A78"], "23/05/2019 06:28:15", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("23/05/2019 18:34:52", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "03674218364", "225142", "2529351", null, "01", ["D500"], ["B80"], "24/05/2019 07:18:30", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("23/05/2019 20:17:01", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "93401728334", "223565", "2478722", null, "01", ["K409"], ["D89"], "25/05/2019 16:21:09", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("24/05/2019 08:10:19", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "01786778335", "225142", "6017274", null, "01", ["Z351"], ["W84"], "25/05/2019 07:50:02", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("24/05/2019 10:28:19", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "02894739346", "225142", "3981509", null, "01", ["I872"], ["K06"], "25/05/2019 16:32:04", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("24/05/2019 11:38:44", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "00526896388", "225142", "6358225", null, "01", ["E221"], ["T99"], "24/05/2019 15:12:33", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("24/05/2019 14:00:03", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "03693584303", "225142", "2794187", null, "01", ["I500"], ["K77"], "26/05/2019 16:14:18", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("25/05/2019 18:52:09", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "02507914394", "225142", "2478935", null, "01", ["I500"], ["K77"], "26/05/2019 16:38:19", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("25/05/2019 19:26:30", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "02507914394", "225142", "2478935", null, "01", ["B269"], ["D71"], "27/05/2019 13:40:30", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("27/05/2019 10:51:21", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "80981895204", "225142", "3541509", null, "01", ["A91"], [""], "28/05/2019 07:00:48", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("27/05/2019 11:55:06", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "03148228367", "225142", "2527294", null, "01", ["N938"], ["X08"], "27/05/2019 19:15:18", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("27/05/2019 13:43:59", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "02706643358", "225142", "2478455", null, "01", ["E039"], ["T86"], "27/05/2019 14:11:54", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("27/05/2019 19:40:50", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "03941651366", "225142", "6359922", null, "01", ["B589"], ["R83"], "30/05/2019 08:49:00", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("28/05/2019 00:27:35", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "03422406336", "225142", "2424304", null, "01", ["M060"], ["L88"], "28/05/2019 10:50:52", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("28/05/2019 12:11:41", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "60021796319", "225142", "6907210", null, "01", ["Z368"], ["W78"], "30/05/2019 08:59:48", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("28/05/2019 14:53:30", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "04230079397", "225142", "2373467", null, "01", ["E221"], ["T99"], "29/05/2019 13:57:20", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("28/05/2019 15:57:26", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "04602472397", "225142", "6372589", null, "01", ["K050"], [""], "29/05/2019 19:47:51", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("28/05/2019 18:13:03", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "06265799371", "225142", "2664356", null, "01", ["E440"], ["T91"], "29/05/2019 19:15:51", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("28/05/2019 21:26:40", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "03777466301", "225142", "5525888", null, "01", ["Z368"], ["W78"], "30/05/2019 14:52:40", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("28/05/2019 22:20:56", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "04173429347", "225142", "2561980", null, "01", ["O860"], [""], "30/05/2019 15:23:21", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("29/05/2019 14:25:59", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "60019317395", "225142", "2528770", null, "01", ["E062"], ["T99"], "29/05/2019 16:53:14", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("29/05/2019 18:16:03", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "04632763373", "225142", "2724855", null, "01", ["A500"], ["Y70"], "29/05/2019 19:29:19", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("29/05/2019 19:52:30", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "04632763373", "225142", "2724855", null, "01", ["A500"], ["Y70"], "30/05/2019 10:06:55", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);


////////////////////////////////////////////////////////////////
//3 - Telegiagnósticos - Cadastro profissionais
$profissionalTelediagnosticos = new ProfissionalSaude("0000088", "052019");


////////////////////////////////////////////////////////////////
//4 - Telediagnósticos
$telediagnostico = new Telediagnostico("0000088", "052019");


////////////////////////////////////////////////////////////////
//INTEGRA
$url = 'http://smart.telessaude.ufrn.br/';
$integra = new Integra("ad9c2aa3622033fc9d79703fde22a4e892641221");


////////////////////////////////////////////////////////////////
//0 - Estabelecimentos - Atualização
echo "<br/><br/><fieldset><legend>Estabelecimentos - Atualização</legend>";
$estabelecimento = new EstabelecimentoSaude("0000088", "052019");
$estabelecimento->atualizarEstabelecimentoSaude("2373467", false, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("3794695", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("5922550", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2373149", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2427095", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2478625", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2528908", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("5018137", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2565439", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("7155395", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("6372589", false, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("6907210", false, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("5525888", false, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2481278", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2480247", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("3005712", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2424304", false, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2478722", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("3897788", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2478854", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("6017274", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2561980", false, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2724855", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("3541509", false, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("6489990", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2478455", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2528770", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2478935", false, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2552027", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2664356", false, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("6358225", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2610965", false, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2347652", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2529351", false, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("3981509", false, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2699958", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("7079710", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("6359922", false, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2805073", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2527294", false, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2725878", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2794187", false, false, false);
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