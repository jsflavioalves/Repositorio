<?php
header("Content-Type: text/html; charset=utf-8");
require("classes/integra.class.php");
error_reporting(E_ALL);
ini_set("display_errors", 1);
set_time_limit(0);


////////////////////////////////////////////////////////////////
//1 - Teleconsultorias - Cadastro profissionais
$profissionalTeleconsultorias = new ProfissionalSaude("0000088", "112018");
$profissionalTeleconsultorias->addProfissionalSaude(null, "02073794327", "KAMILA MARQUES VIANA", "2481928", "225142", null, "02", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "01682354393", "TIAGO COSTA GOMES", "2610574", "225142", null, "02", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "02881618316", "ANTONIO SAMUEL MOURA SANTOS", "2724626", "225142", null, "03", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "03138826300", "DÉBORA PINHEIRO LEITE", "2528231", "225142", null, "02", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "04824387388", "ANDRÉ LAVOR ALVES", "6813801", "225142", null, "02", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "02337497305", "ELOILDA MARIA DE AGUIAR SILVA", "2645106", "225142", null, "02", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "01049312309", "ROSILENE GOMES NEVES", "2482312", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "04200102382", "FRANCISCA LUCIANA ALMEIDA COLARES", "5130042", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "04824445337", "GISELLE CASTRO DE ABREU", "3535150", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "05825115340", "IGOR RAFAEL ABREU", "6379338", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "00526896388", "PATRÍCIA DE ALMEIDA AIRES", "6358225", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "00297134396", "FERNANDA ROCHELLE ROCHA", "2528770", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "08330550117", "JOSE FELIX MORENO REYES", "2724618", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "04241948308", "ANA JESSICA ANDRADE GOMES", "3897788", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "03567505319", "ANTONIA GABRIELA DA SILVA NASCIMENTO", "2426609", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "64525538368", "JOSÉ ROBERTO MOURA PIRES", "2479761", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "04185660383", "MARIANE ARAUJO GUERRA", "2478722", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "03288466350", "IVO BRADLEY MOURA FERREIRA", "6380611", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "02642792390", "TUIANNE CAMBOIM MORAIS", "2528991", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "00503686212", "IZIK REIR CARVALHO ALMEIDA", "2724960", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "04412179311", "RAQUEL VIANA FURTADO", "2528703", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "03456967195", "JHULIA NATASHA NOLETO DA SILVA NUNES", "6226361", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "33870627883", "WÊNYO JOSÉ CARVALHO SANTOS", "2656000", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "08098871185", "ELIZABETH REYES AGUILA", "2527758", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "08295644114", "ALEXIS GARCIA GALINDO", "5248140", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "02961944333", "STEPHANIE HENRIQUE DE ARAUJO MOREIRA", "2552175", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "01728043379", "ADRIAN EVERTON FACUNDES", "2460858", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "31784763187", "LÁZARO EURIPEDES CAMARGO", "5452228", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "04460155397", "ANA KELE NUNES DA SILVA DE OLIVEIRA", "2464918", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "72249242372", "RSTANNIXON CORREA MATOS ", "5462924", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "08748070777", "MARCUS FABIO SILVA FONTINELI", "7943776", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "08121651107", "ADISNERIS ALMENARES ROMERO", "2726467", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "61938300300", "JOAO NOGUEIRA SANTOS FILHO", "7038593", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "96426705349", "SINDYA CRISTINA PEREIRA ALMEIDA", "2455552", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "08589226140", "YANIRIS PÉREZ BELTRÁN", "6178987", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "03675611310", "FRANCISCO MENEZES FEITOSA JÚNIOR", "7658354", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "03492750338", "SÁVIO EMMANUEL DOS SANTOS MOURA", "2699958", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "09089836110", "RODOLFO LAZARO GARCÍA BENAVIDES", "3491048", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "08578758170", "YOSLAIDY MARTINEZ MONTEAGUDO", "2463512", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "05573705903", "THIAGO JOSE DE RAMOS ", "2644460", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "09395545186", "ROSA RAMIREZ REYNALDO", "2371928", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "04851761309", "MAYJANE SILVA DE SOUSA PORTO ", "5284422", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "29310880805", "SILENIR CRUZ DE LIMA", "2310880", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "09311795135", "YUNIEL VELOZ PANTOJA", "2327406", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "04836147344", "ANTONIO EDUARDO DOS SANTOS SILVA", "7181477", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "62482157234", "NERISVALDO CRUZ", "2450402", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "03529795348", "AMANADA SANTOS CHAGAS", "2454211", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "01919354336", "LUCIANA LIMA SILVA", "5879760", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "09310554150", "YANAISI BLANCO LESCAY", "7020309", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "09393958190", "FIDEL ANTONIO HERNANDEZ HUERGO", "7449682", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "99967570300", "ANTONIVANIA RODRIGUES QUEIROZ MIRANDA", "2307642", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "40732608805", "VANDRIANE OLIVEIRA LEITE ", "5851289", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "09310092190", "ADRIANA RAMIREZ GUTIERREZ ", "2464144", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "48763896320", "FRANCISCA GELVANIA RIBEIRO CRUZ", "2645548", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "04329530350", "ALYSSON DUARTE LIMA ALVES", "2614103", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "01231019301", "TIAGO SILVA DE BRITO", "3388921", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "08594192150", "EDUARDO MENDOZA GUERRA", "6932290", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "09392632118", "ALDO NESLAN MONTES DE OCA AVALOS", "2481413", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "08319616190", "YOSEL CABRERA ALVAREZ", "2464586", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "08389163179", "ANELIS RIZO BONNE", "6461255", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "03755255308", "TAMARA DE SOUZA SAMPAIO", "2699958", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "00699360218", "SELÂNDIA MARTINS DA SILVA", "2563789", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "00477371582", "VINICIUS DE SÁ CARVALHO", "2480972", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "91188849204", "PEDRO HENRIQUE ARÁUJO CRUZ", "2552191", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "09391325165", "MILENE SALINAS HERNANDEZ", "2564106", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "99384396320", "WANDERSON MAIA GUEDES DA SILVA ", "2454661", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "08390211190", "MARIA DEL ROSARIO ALARCON MACIAS", "6862020", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "39126951215", "RAIMUNDO JESUSPINHEIRO", "2482193", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "04528219328", "FLAYLSON MOURA BARROS", "2426471", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "09310402130", "DAYANA GARCIA RAMIREZ", "3393224", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "09312003186", "LEYDIS RODRIGUEZ TAMAYO", "2480069", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "93040040200", "JAMILENA FLORES QUEIROZ", "5922550", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "02925059309", "LUIZA CARACAS", "2805073", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "03184421406", "LUCIMARIO DE OLIVEIRA VALE", "2529084", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "08492302178", "OLGA MARIA GOMEZ EMASABE ", "2645718", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "09395559136", "MAYULIS GARCIA TRIANA ", "2820072", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "00673513360", "KELLYTON EMANUEL CRAVEIRO DA SILVA", "2460122", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "67669492368", "THOMÁS DE AQUINO ROSSAS MOTA FILHO", "2482096", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "64439828272", "HARRISSON MARTINS AGUIAR", "2528967", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "08590223159", "YOANDRY SOTOMAYOR ESPINOS", "7130627", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "65279743291", "NUBIA CARLA BORGES DA CRUZ SANTOS", "2611279", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "08588941147", "RACIEL ERNESTO BAGLAN GRANA", "6821863", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "00669341339", "DORYSDELIA MARIA GONCALVES PEREIRA", "2373149", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "00344856356", "YASSER RIVA SAMPAIO LUCENA", "2478862", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "04250164390", "EDYMARAH NÁGGHIA SNARAH LINHARES LIMA", "7490542", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "08589108104", "YOELBY OMAR RODRIGUEZ GALAFET", "2655993", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "05101161322", "MARIA SUYANE PARENTE PAULINO LINHARES", "2480247", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "02730504354", "NATACHA RAFAELA DE SOUSA REGO", "7234414", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "23288493349", "CARLOS CEZAR DE CASTRO MONTEIRO", "2373548", "225225", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "17461406825", "LINDOMAR ALENCAR PEREIRA", "5765986", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "93371845320", "MÁRCIO SERRA CAMPOS", "2465701", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "65325605372", "FRANCINEIDE SANTANA SILVA", "2531178", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "02608946305", "GERMANA BRAGA RÊGO", "2424274", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "00297007289", "HALINE DA SILVA LOPES", "2327732", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "39080404268", "DAVI MARQUES CUNHA", "3005712", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "01225156335", "CARLOS ALBERTO SILVA SANTOS JUNIOR", "2454343", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "74676725353", "ANTONIO RODRIGUES DOS SANTOS", "3317080", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "85809586368", "JOSÉ RICARDO FERREIRA ", "7079710", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "57909385234", "NEIVA COSTA DOS SANTOS", "7636504", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "08492313102", "SANURKY TELLEZ BERMUDEZ", "2451123", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "08171938124", "YUDITH CESPEDES IGLESIAS", "5891345", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "01862582327", "ANDRE PADRON FERNANDES DE SOUZA", "2530511", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "35200792835", "KELLY KAROLINY DE LEMOS SACCHI", "2327759", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "36597767268", "ARTEMIZIA GONÇALVES DE SOUZA", "7926871", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "04010174358", "LÉO BATISTA SOUSA", "2565439", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "03826886941", "FERNANDO TEIXEIRA MACHADO", "6996191", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "98562118320", "THIAGO ALBINO DE MENEZES", "5018137", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "03589225343", "IGOR MAIA SERRA CALLOU DE MATOS", "2478625", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "02601250321", "DIEGO ONILTON COSTA SALES", "2552027", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "02162398346", "JOSIMAR VIEIRA PROTASIO", "7309325", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "09311986151", "LISANDRA MARTINEZ PLANAS", "2499002", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "02183171316", "RAPHAEL MAGALHAES VIANA", "3907309", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "08389174103", "ALEXEIS NASH CASCARET", "2328208", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "43433766304", "VANIA BENEVIDES MONTENEGRO", "2373793", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "08574978124", "ZURISADAI RODRIGUEZ LEONARD", "2726491", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "03263256386", "LUCIANA COSTA CORREIA ", "2347652", "225142", null, "01", "F");
$profissionalTeleconsultorias->addProfissionalSaude(null, "08389873117", "YUNIS CARIDAD MARTINEZ PUPO", "7131135", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "37654985304", "AQUIM PEREIRA COSTA ", "2307499", "225142", null, "01", "M");
$profissionalTeleconsultorias->addProfissionalSaude(null, "02563162106", "BRUNIELLY FERREIRA CANDIDO", "2726076", "225142", null, "01", "F");


////////////////////////////////////////////////////////////////
//2 - Teleconsultorias
$teleconsultoria = new Teleconsultoria("0000088", "112018");
$teleconsultoria->addSolicitacao("05/07/2016 18:59:39", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "03138826300", "225142", "2528231", null, "02", ["L989"], ["S76"], "05/11/2018 18:40:18", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("22/10/2018 18:56:29", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "98562118320", "225142", "5018137", null, "01", ["G620"], ["N94"], "05/11/2018 07:49:00", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("28/10/2018 16:10:15", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "67669492368", "225142", "2482096", null, "01", ["A528"], ["X70"], "08/11/2018 02:10:29", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("29/10/2018 21:28:49", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "08574978124", "225142", "2726491", null, "01", ["I500"], ["K77"], "02/11/2018 22:58:57", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("30/10/2018 15:38:53", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "02073794327", "225142", "2481928", null, "02", ["C73"], ["T71"], "07/11/2018 21:47:15", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("30/10/2018 20:19:28", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "03492750338", "225142", "2699958", null, "01", ["I159"], ["K87"], "02/11/2018 23:24:12", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("30/10/2018 21:19:05", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "03184421406", "225142", "2529084", null, "01", ["H919"], ["H84"], "02/11/2018 17:35:40", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("30/10/2018 21:26:58", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "03184421406", "225142", "2529084", null, "01", ["R040"], ["R06"], "02/11/2018 17:26:48", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("30/10/2018 22:02:06", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "00503686212", "225142", "2724960", null, "01", ["L309"], ["S88"], "01/11/2018 11:09:57", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("31/10/2018 16:54:10", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "04010174358", "225142", "2565439", null, "01", ["Z880"], ["A23"], "01/11/2018 04:20:18", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("31/10/2018 17:06:22", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "65279743291", "225142", "2611279", null, "01", ["N111"], ["U70"], "03/11/2018 14:21:59", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("31/10/2018 19:10:45", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "03755255308", "225142", "2699958", null, "01", ["O249"], ["K73"], "02/11/2018 11:34:47", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("31/10/2018 19:52:43", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "03675611310", "225142", "7658354", null, "01", ["B350"], ["S74"], "01/11/2018 11:48:50", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("31/10/2018 20:31:25", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "08121651107", "225142", "2726467", null, "01", ["O231"], ["W71"], "02/11/2018 11:38:48", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("31/10/2018 22:16:41", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "02925059309", "225142", "2805073", null, "01", ["R104"], ["D01"], "02/11/2018 11:46:20", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("01/11/2018 00:49:05", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "02881618316", "225142", "2724626", null, "03", ["A309"], ["A78"], "01/11/2018 15:36:44", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("01/11/2018 10:06:58", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "02337497305", "225142", "2645106", null, "02", ["B18"], ["D72"], "02/11/2018 21:34:42", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("01/11/2018 11:20:49", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "09312003186", "225142", "2480069", null, "01", ["A169"], ["A70"], "02/11/2018 21:35:53", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("01/11/2018 11:47:49", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "08389163179", "225142", "6461255", null, "01", ["A305"], ["A78"], "02/11/2018 21:40:27", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("01/11/2018 11:47:53", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "08389163179", "225142", "6461255", null, "01", ["A305"], ["A78"], "02/11/2018 21:40:57", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("01/11/2018 11:48:33", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "08389163179", "225142", "6461255", null, "01", ["A305"], ["A78"], "02/11/2018 21:39:53", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("01/11/2018 12:25:40", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "02337497305", "225142", "2645106", null, "02", ["B181"], ["D72"], "02/11/2018 21:42:13", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("01/11/2018 16:54:43", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "39080404268", "225142", "3005712", null, "01", ["B07"], ["S03"], "02/11/2018 16:01:17", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("01/11/2018 17:30:43", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "00477371582", "225142", "2480972", null, "01", ["E149"], ["T89"], "02/11/2018 08:02:07", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("01/11/2018 17:45:23", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "43433766304", "225142", "2373793", null, "01", ["O239"], ["W71"], "02/11/2018 11:51:30", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("02/11/2018 09:17:49", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "23288493349", "225225", "2373548", null, "01", ["Q740"], ["L82"], "02/11/2018 15:34:24", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("02/11/2018 09:23:44", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "04250164390", "225142", "7490542", null, "01", ["P059"], ["A94"], "02/11/2018 11:55:03", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("02/11/2018 10:17:16", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "08594192150", "225142", "6932290", null, "01", ["Z000"], ["A97"], "04/11/2018 11:12:02", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("02/11/2018 11:01:37", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "64525538368", "225142", "2479761", null, "01", ["D239"], ["S79"], "04/11/2018 11:24:47", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("02/11/2018 12:31:55", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "08098871185", "225142", "2527758", null, "01", ["B86"], ["S72"], "04/11/2018 11:32:05", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("02/11/2018 12:38:24", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "00669341339", "225142", "2373149", null, "01", ["L42"], ["S90"], "04/11/2018 12:10:19", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("02/11/2018 15:34:37", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "08390211190", "225142", "6862020", null, "01", ["E149"], ["T89"], "03/11/2018 15:40:39", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("02/11/2018 16:15:18", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "09310554150", "225142", "7020309", null, "01", ["A159"], ["A70"], "02/11/2018 17:43:15", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("02/11/2018 16:29:39", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "03826886941", "225142", "6996191", null, "01", ["Q790"], ["L82"], "03/11/2018 16:12:02", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("04/11/2018 09:30:20", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "02183171316", "225142", "3907309", null, "01", ["C770"], ["B74"], "07/11/2018 22:00:40", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("04/11/2018 18:18:36", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "02601250321", "225142", "2552027", null, "01", ["B029"], ["S70"], "05/11/2018 10:39:15", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("04/11/2018 18:23:45", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "64439828272", "225142", "2528967", null, "01", ["A528"], ["X70"], "05/11/2018 12:38:05", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("04/11/2018 18:35:32", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "03263256386", "225142", "2347652", null, "01", ["L400"], ["S91"], "05/11/2018 10:56:51", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("04/11/2018 21:48:23", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "00344856356", "225142", "2478862", null, "01", ["N61"], ["X21"], "05/11/2018 15:47:05", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("04/11/2018 21:48:30", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "00344856356", "225142", "2478862", null, "01", ["N61"], ["X21"], "05/11/2018 15:49:57", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("04/11/2018 22:33:00", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "91188849204", "225142", "2552191", null, "01", ["D50"], ["B80"], "05/11/2018 09:56:47", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("05/11/2018 10:17:12", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "93040040200", "225142", "5922550", null, "01", ["N939"], ["X08"], "05/11/2018 15:58:31", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("05/11/2018 11:50:11", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "09393958190", "225142", "7449682", null, "01", ["G560"], ["353"], "07/11/2018 22:03:10", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("05/11/2018 12:58:49", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "08098871185", "225142", "2527758", null, "01", ["N46"], ["Y10"], "07/11/2018 11:35:55", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("05/11/2018 13:34:14", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "09395545186", "225142", "2371928", null, "01", ["A309"], ["A78"], "05/11/2018 20:21:43", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("05/11/2018 17:31:49", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "85809586368", "225142", "7079710", null, "01", ["L988"], ["S76"], "05/11/2018 18:39:19", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("05/11/2018 18:36:18", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "09392632118", "225142", "2481413", null, "01", ["I500"], ["K77"], "06/11/2018 10:42:25", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("05/11/2018 18:48:20", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "08389174103", "225142", "2328208", null, "01", ["I500"], ["K77"], "08/11/2018 23:10:27", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("05/11/2018 18:50:44", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "39126951215", "225142", "2482193", null, "01", ["N920"], ["X07"], "06/11/2018 08:11:26", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("05/11/2018 19:34:30", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "09391325165", "225142", "2564106", null, "01", ["E115"], ["T90"], "07/11/2018 20:23:16", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("05/11/2018 20:11:43", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "05101161322", "225142", "2480247", null, "01", ["A160"], ["A70"], "06/11/2018 23:36:31", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("05/11/2018 20:28:58", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "02961944333", "225142", "2552175", null, "01", ["E119"], ["T90"], "06/11/2018 06:28:02", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("05/11/2018 20:38:11", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "09311795135", "225142", "2327406", null, "01", ["E112"], ["T90"], "07/11/2018 06:40:44", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("05/11/2018 20:59:57", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "00699360218", "225142", "2563789", null, "01", ["H82"], ["H82"], "06/11/2018 06:38:19", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("05/11/2018 21:38:52", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "09311986151", "225142", "2499002", null, "01", ["M128"], ["L99"], "06/11/2018 23:51:22", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("05/11/2018 22:06:36", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "98562118320", "225142", "5018137", null, "01", ["B028"], ["S70"], "06/11/2018 12:31:42", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("05/11/2018 23:27:45", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "05825115340", "225142", "6379338", null, "01", ["L439"], ["S99"], "06/11/2018 12:23:00", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("06/11/2018 12:52:08", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "02337497305", "225142", "2645106", null, "02", ["W570"], ["S04"], "07/11/2018 00:05:53", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("06/11/2018 15:35:19", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "03567505319", "225142", "2426609", null, "01", ["B07"], ["S03"], "07/11/2018 10:20:17", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("06/11/2018 15:35:37", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "03567505319", "225142", "2426609", null, "01", ["B07"], ["S03"], "07/11/2018 10:18:18", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("07/11/2018 15:53:06", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "02073794327", "225142", "2481928", null, "02", ["Z000"], ["A97"], "07/11/2018 21:16:33", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("07/11/2018 15:53:17", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "02073794327", "225142", "2481928", null, "02", ["B86"], ["S72"], "07/11/2018 21:35:52", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("07/11/2018 17:36:05", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "01049312309", "225142", "2482312", null, "01", ["B354"], ["S74"], "07/11/2018 21:52:34", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("07/11/2018 17:48:07", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "03755255308", "225142", "2699958", null, "01", ["Z300"], ["W14"], "07/11/2018 20:18:32", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("07/11/2018 19:11:08", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "35200792835", "225142", "2327759", null, "01", ["Z000"], ["A97"], "07/11/2018 20:36:34", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("08/11/2018 08:02:05", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "02642792390", "225142", "2528991", null, "01", ["B92"], ["A78"], "08/11/2018 15:18:02", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("08/11/2018 09:10:15", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "00297007289", "225142", "2327732", null, "01", ["Z358"], ["W84"], "08/11/2018 10:22:59", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("08/11/2018 10:48:42", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "02642792390", "225142", "2528991", null, "01", ["D500"], ["B80"], "08/11/2018 18:09:48", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("08/11/2018 15:35:13", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "04528219328", "225142", "2426471", null, "01", ["I209"], ["K74"], "09/11/2018 16:48:18", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("08/11/2018 20:29:44", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "01682354393", "225142", "2610574", null, "02", ["R72"], ["B84"], "09/11/2018 11:41:08", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("09/11/2018 17:26:51", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "03589225343", "225142", "2478625", null, "01", ["A150"], ["A70"], "10/11/2018 13:53:01", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("09/11/2018 17:46:01", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "03589225343", "225142", "2478625", null, "01", ["Z008"], ["A97"], "13/11/2018 07:50:01", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("09/11/2018 17:59:08", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "02642792390", "225142", "2528991", null, "01", ["C73"], ["T71"], "12/11/2018 06:58:29", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("09/11/2018 22:33:53", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "02608946305", "225142", "2424274", null, "01", ["M545"], ["L01"], "13/11/2018 08:50:00", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("11/11/2018 19:14:34", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "02563162106", "225142", "2726076", null, "01", ["L102"], ["S99"], "11/11/2018 20:41:26", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("12/11/2018 18:00:13", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "08330550117", "225142", "2724618", null, "01", ["K808"], ["D98"], "16/11/2018 07:28:58", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("14/11/2018 13:53:17", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "04412179311", "225142", "2528703", null, "01", ["I269"], ["K93"], "17/11/2018 23:57:44", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("15/11/2018 15:58:00", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "02608946305", "225142", "2424274", null, "01", ["C97"], ["A79"], "16/11/2018 08:04:45", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("16/11/2018 18:11:57", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "00526896388", "225142", "6358225", null, "01", ["I450"], ["K84"], "18/11/2018 00:32:43", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("17/11/2018 17:37:00", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "04824387388", "225142", "6813801", null, "02", ["I48"], ["K78"], "22/11/2018 08:09:49", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("20/11/2018 11:21:54", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "04412179311", "225142", "2528703", null, "01", ["R002"], ["K04"], "25/11/2018 14:02:59", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("20/11/2018 21:52:22", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "00297134396", "225142", "2528770", null, "01", ["D649"], ["B79"], "23/11/2018 10:11:30", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("21/11/2018 11:29:14", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "04824445337", "225142", "3535150", null, "01", ["K519"], ["D94"], "28/11/2018 11:21:52", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("22/11/2018 15:42:03", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "03288466350", "225142", "6380611", null, "01", ["H330"], ["F82"], "23/11/2018 07:47:53", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("22/11/2018 15:47:03", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "03288466350", "225142", "6380611", null, "01", ["H330"], ["F82"], "23/11/2018 07:46:36", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("22/11/2018 15:54:50", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "03288466350", "225142", "6380611", null, "01", ["L45"], ["S99"], "26/11/2018 18:52:04", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("22/11/2018 18:51:04", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "04241948308", "225142", "3897788", null, "01", ["I828"], ["K94"], "23/11/2018 10:08:10", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("22/11/2018 20:05:30", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "03184421406", "225142", "2529084", null, "01", ["O990"], ["W76"], "26/11/2018 20:32:33", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("26/11/2018 11:35:12", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "04185660383", "225142", "2478722", null, "01", ["L810"], ["S99"], "26/11/2018 19:03:24", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);
$teleconsultoria->addSolicitacao("26/11/2018 19:01:35", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "04200102382", "225142", "5130042", null, "01", ["E042"], ["T81"], "29/11/2018 07:43:09", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);


////////////////////////////////////////////////////////////////
//3 - Telegiagnósticos - Cadastro profissionais
$profissionalTelediagnosticos = new ProfissionalSaude("0000088", "112018");


////////////////////////////////////////////////////////////////
//4 - Telediagnósticos
$telediagnostico = new Telediagnostico("0000088", "112018");


////////////////////////////////////////////////////////////////
//INTEGRA
$url = 'http://smart.telessaude.ufrn.br/';
$integra = new Integra("ad9c2aa3622033fc9d79703fde22a4e892641221");


////////////////////////////////////////////////////////////////
//0 - Estabelecimentos - Atualização
echo "<br/><br/><fieldset><legend>Estabelecimentos - Atualização</legend>";
$estabelecimento = new EstabelecimentoSaude("0000088", "112018");
$estabelecimento->atualizarEstabelecimentoSaude("2373793", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2327759", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("6461255", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2328208", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2481928", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2552175", true, true, false);
$estabelecimento->atualizarEstabelecimentoSaude("2426471", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2528231", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("5922550", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2480069", true, true, false);
$estabelecimento->atualizarEstabelecimentoSaude("2527758", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2373149", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("7449682", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("3907309", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2726491", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2478625", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("7658354", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("6996191", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2724618", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2726076", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("5018137", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2424274", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("6379338", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2480972", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2565439", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2479761", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("3535150", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2480247", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("3005712", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2552191", true, true, false);
$estabelecimento->atualizarEstabelecimentoSaude("2478722", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("3897788", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2499002", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("6862020", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2611279", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2645106", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("7490542", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2529084", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2528770", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("7020309", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2552027", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("5130042", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("6358225", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2373548", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("6932290", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2426609", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2347652", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2724626", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2564106", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2610574", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2482193", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("6380611", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2726467", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2528967", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2327732", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2327406", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2481413", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2528703", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2563789", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2482096", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("6813801", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2478862", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2482312", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2699958", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("7079710", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2528991", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2724960", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2371928", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2805073", true, false, false);
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