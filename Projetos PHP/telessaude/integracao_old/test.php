<?php 
header('Content-Type: text/html; charset=utf-8');
require('classes/integra.class.php');

$URL = 'http://integra.telessaude.ufrn.br/';

// Criando e alimentando os quadros
$quadroUm = new QuadroUm(1, 2, 3);
$quadroUm->addAvaliacaoEstrutura("240810", 11, 12, 13);
$quadroUm->addAvaliacaoEstrutura("240325", 11, 12, 13);
$quadroUm->addProfissionaisRegistrados("240810", "2251", 14);
$quadroUm->addProfissionaisRegistrados("240810", "2231", 15);

$quadroDois = new QuadroDois(4, 5, 6, 7);
$quadroDois->addSolicitacoesCatProfissional("2251", 21);
$quadroDois->addSolicitacoesCatProfissional("2231", 21);
$quadroDois->addSolicitacoesEquipe("1000",null, 22);
$quadroDois->addSolicitacoesEquipe("1001",null, 22);
$quadroDois->addSolicitacoesMunicipio("240810", 30);
$quadroDois->addSolicitacoesMunicipio("240325", 10);
$quadroDois->addSolicitacoesUF("24", 24);
$quadroDois->addSolicitacoesUF("25", 25);
$quadroDois->addSolicitacoesMembroGestao(null, "cns4321", "Nome Membro Gestão 1", "membro1@telessaude.ufrn.br", 24);
$quadroDois->addSolicitacoesMembroGestao("70030044450", "cns", "Nome Membro Gestão 2", "membro2@telessaude.ufrn.br", 24);
$quadroDois->addSolicitacoesPontoTelessaude("2653982", 26);
$quadroDois->addSolicitacoesPontoTelessaude("2408635", 2);
$quadroDois->addSolicitacoesProfissional("70030044450", null, "Nome Profissional 1", "prof1@telessaude.ufrn.br", "01", 27);
$quadroDois->addSolicitacoesProfissional(null, null, "Nome Profissional 2", "prof2@telessaude.ufrn.br", "03",  28);
$quadroDois->addSolicitacoesProfissional(null, null, "Nome Profissional 3", "prof3@telessaude.ufrn.br", "02",  28);

$quadroTres = new QuadroTres(8, 9);
$quadroTres->addSolicitacoesTelediagnosticoEquipe("1000",null, 10);
$quadroTres->addSolicitacoesTelediagnosticoEquipe("1001",null, 11);
$quadroTres->addSolicitacoesTelediagnosticoMunicipio("240810", 30);
$quadroTres->addSolicitacoesTelediagnosticoMunicipio("240325", 10);
$quadroTres->addSolicitacoesTelediagnosticoPontoTelessaude("2653982", 33);
$quadroTres->addSolicitacoesTelediagnosticoPontoTelessaude("2408635", 33);
$quadroTres->addSolicitacoesTelediagnosticoTipo("H21010137", 10);
$quadroTres->addSolicitacoesTelediagnosticoTipo("H97019003", 10);
$quadroTres->addSolicitacoesTelediagnosticoUF("24", 24);
$quadroTres->addSolicitacoesTelediagnosticoUF("25", 25);

$quadroQuatro = new QuadroQuatro(10, 11);
$quadroQuatro->addAcessosObjetosAprendizagem("24", "240810", "1000",null, "2653982", 41);
$quadroQuatro->addAcessosObjetosAprendizagem("25", "250750", "1000",null, "2400103", 41);
$quadroQuatro->addAcessosObjetosAprendizagemCatProfissional("2251", 42);
$quadroQuatro->addAcessosObjetosAprendizagemCatProfissional("2231", 42);
$quadroQuatro->addAcessosObjetosAprendizagemEquipe("1000",null, 100);
$quadroQuatro->addAcessosObjetosAprendizagemEquipe("1001",null, 101);
$quadroQuatro->addAcessosObjetosAprendizagemMunicipio("240810", 44);
$quadroQuatro->addAcessosObjetosAprendizagemMunicipio("240325", 10);
$quadroQuatro->addAcessosObjetosAprendizagemPontoTelessaude("2653982", 45);
$quadroQuatro->addAcessosObjetosAprendizagemPontoTelessaude("2408635", 10);
$quadroQuatro->addAtividadesRealizadasEquipe("1000",null, 50);
$quadroQuatro->addAtividadesRealizadasEquipe("1001",null, 25);
$quadroQuatro->addAtividadesRealizadasMunicipio("240810", 40);
$quadroQuatro->addAtividadesRealizadasMunicipio("240810", 40);
$quadroQuatro->addAtividadesRealizadasPontoTelessaude("2653982", 30);
$quadroQuatro->addAtividadesRealizadasPontoTelessaude("2408635", 10);
$quadroQuatro->addAtividadesRealizadasUF("24", 50);
$quadroQuatro->addAtividadesRealizadasUF("25", 20);
$quadroQuatro->addParticipantesCatProfissionalEquipe("1000",null, "2251", 100);
$quadroQuatro->addParticipantesCatProfissionalEquipe("1000",null, "2231", 101);
$quadroQuatro->addParticipantesCatProfissionalMunicipio("240810", "2251", 50);
$quadroQuatro->addParticipantesCatProfissionalMunicipio("240325", "2231", 30);
$quadroQuatro->addParticipantesCatProfissionalPontoTelessaude("2653982", "2251", 52);
$quadroQuatro->addParticipantesCatProfissionalPontoTelessaude("2408635", "2231", 52);
$quadroQuatro->addParticipantesCatProfissionalUF("24", "2251", 50);
$quadroQuatro->addParticipantesCatProfissionalUF("25", "2231", 30);

$quadroCinco = new QuadroCinco(13, 14, 15, 16);
$quadroCinco->addEvitacaoEncaminhamentoCatProfissional("2231", 55.5, 44.5); 
$quadroCinco->addEvitacaoEncaminhamentoCatProfissional("2251", 30.1, 69.9);
$quadroCinco->addCatProfissionaisFrequentes("2251"); //médicos clínicos
$quadroCinco->addCatProfissionaisFrequentes("2235"); // médicos
$quadroCinco->addEspecialidadesFrequentes("225125"); // médicos clínicos
$quadroCinco->addEspecialidadesFrequentes("223565"); //Enfermeiro da estrategia de saude da familia
$quadroCinco->addEspecialidadesFrequentes("225124");//Médico pediatra 
$quadroCinco->addResolucaoDuvida(80.0, 10.0, 5.0, 5.0); //sim, parcial, não e não sei
$quadroCinco->addSatisfacaoSolicitante("1", 60.0); //Muito Insatisfeito
$quadroCinco->addSatisfacaoSolicitante("2", 35.0);//Insatisfeito
$quadroCinco->addSatisfacaoSolicitante("3", 5.0); //Indiferente
$quadroCinco->addSatisfacaoSolicitante("4", 0.0); //Satisfeito
$quadroCinco->addSatisfacaoSolicitante("5", 0.0); //Muito Satisfeito
$quadroCinco->addTemasFrequentes("R05", "R05");
$quadroCinco->addTemasFrequentes("R070", "D11");

$quadroSeis = new QuadroSeis();
$quadroSeis->addAvaliacaoSatisfacaoObjetoAprendizagem("1", 60.0);
$quadroSeis->addAvaliacaoSatisfacaoObjetoAprendizagem("2", 35.0);
$quadroSeis->addAvaliacaoSatisfacaoObjetoAprendizagem("3", 5.0);
$quadroSeis->addAvaliacaoSatisfacaoParticipantes("1", 60.0);
$quadroSeis->addAvaliacaoSatisfacaoParticipantes("2", 35.0);
$quadroSeis->addAvaliacaoSatisfacaoParticipantes("3", 5.0);
$quadroSeis->addTemasFrequentesObjetoAprendizagem("1");
$quadroSeis->addTemasFrequentesObjetoAprendizagem("2");
$quadroSeis->addTemasFrequentesParticipacao("1");
$quadroSeis->addTemasFrequentesParticipacao("2");

// Agrupando os quadros de indicadores 
//código de identificação do núcleo da paltaforma integra é 3
$indicadorGeralN1 = new IndicadorGeral(3, "012013", $quadroUm, $quadroDois, $quadroTres, $quadroQuatro, $quadroCinco, $quadroSeis);

// Serializando os dados
$dados_serializadosN1 = Integra::serializar(TipoDeDados::JSON, $indicadorGeralN1);

echo '<h1>.: Dados Serializados :.</h1>';
echo $dados_serializadosN1;
echo '<hr/>';

// Criando o cliente Integra, token relativo ao usuário tavares.sti
$integra = new Integra('ad9c2aa3622033fc9d79703fde22a4e892641221');

// Criando as equipes de Saúde
$equipesSaude = new EquipesSaude();

//código de identificação do núcleo da paltaforma integra é 3 
$equipesSaude->addEquipeSaude("3", "1000", "","ABC123","2653982",null);
$equipesSaude->addEquipeSaude("3", "1001","", "ESF", "2653982",null);
$dados_serializados_equipes = Integra::serializar(TipoDeDados::JSON, $equipesSaude->lista_equipes_saude);
print($dados_serializados_equipes);
$respostasEquipes = $integra->enviarDados(TipoDeDados::JSON, $URL.'api/equipes/.json', $dados_serializados_equipes);

// Enviando os Indicadores
$respostaN1 = $integra->enviarDados(TipoDeDados::JSON, $URL.'api/indicadores/.json', $dados_serializadosN1);

// Exibindo as Respostas do Servidor
echo '<h1>.: Resposta do Servidor :.</h1>';
echo $respostasEquipes;
echo '<hr/>';
echo '<h1>.: Resposta do Servidor :.</h1>';
echo $respostaN1;
echo '<hr/>';

?>
