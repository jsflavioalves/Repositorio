<?php
header('Content-Type: text/html; charset=utf-8');
require('classes/integra.class.php');

// $URL = 'http://smart.telessaude.ufrn.br/';
// $URL = 'http://smartteste.telessaude.ufrn.br/';
$URL = 'http://localhost:8000/';

// Criando e alimentando os quadros
$quadroUm = new QuadroUm(1, 2, 3);
$quadroUm->addAvaliacaoEstrutura("240810", 11, 12, 13);
$quadroUm->addAvaliacaoEstrutura("240325", 11, 12, 13);
$quadroUm->addProfissionaisRegistrados("240810", "2251", 14);
$quadroUm->addProfissionaisRegistrados("240810", "2231", 15);

$quadroDois = new QuadroDois(4, 5, 6, 7);
$quadroDois->addSolicitacoesCatProfissional("2251", 21);
$quadroDois->addSolicitacoesCatProfissional("2231", 21);
$quadroDois->addSolicitacoesEquipe("1000", null, 10);
$quadroDois->addSolicitacoesEquipe("1001", null, 5);
$quadroDois->addSolicitacoesEquipe("1002", null, 5);
$quadroDois->addSolicitacoesEquipe("1003", null, 30);
$quadroDois->addSolicitacoesMunicipio("240810", 30);
$quadroDois->addSolicitacoesMunicipio("240325", 10);
$quadroDois->addSolicitacoesUF("24", 24);
$quadroDois->addSolicitacoesUF("25", 25);
$quadroDois->addSolicitacoesMembroGestao("62868537316", "cns4321", "a@a.com", "Fulano da Silva", 24);
$quadroDois->addSolicitacoesMembroGestao("55263374216", "cns", "b@b.com", "Beltrano da Silva", 24);
$quadroDois->addSolicitacoesPontoTelessaude("2653982", 26);
$quadroDois->addSolicitacoesPontoTelessaude("2408635", 2);
$quadroDois->addSolicitacoesProfissional("62868537316", null, "Nome Profissional 1", "prof1@telessaude.ufrn.br", "01","223565","1000",null, 27); //tipo: 01 - Profissionais de Saúde
$quadroDois->addSolicitacoesProfissional("31413907709", null, "Nome Profissional 2", "prof2@telessaude.ufrn.br", "03","225125",null ,"1001",  28); //tipo: 03 - Mais Médicos
$quadroDois->addSolicitacoesProfissional("55263374216", "cns_1234", "Nome Profissional 3", "prof3@telessaude.ufrn.br", "02","225125",null,"1002",  28); //tipo: 02 - PROVAB
$quadroDois->addSolicitacoesProfissionalTema("62868537316", null, null, null, "R05", 10);
$quadroDois->addSolicitacoesProfissionalTema("31413907709", null, "prof2@telessaude.ufrn.br", null, "A03", 10);
$quadroDois->addSolicitacoesProfissionalTema("55263374216", "cns_1234", null, null, "D11", 10);

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
$quadroQuatro->addAtividadesRealizadasEquipe("1000",null, 50, 100);
$quadroQuatro->addAtividadesRealizadasEquipe("1001",null, 25, 50);
$quadroQuatro->addAtividadesRealizadasMunicipio("240810", 40, 80);
$quadroQuatro->addAtividadesRealizadasMunicipio("240325", 10, 20);
$quadroQuatro->addAtividadesRealizadasPontoTelessaude("2653982", 30, 60);
$quadroQuatro->addAtividadesRealizadasPontoTelessaude("2408635", 10, 20);
$quadroQuatro->addAtividadesRealizadasUF("24", 50, 100);
$quadroQuatro->addAtividadesRealizadasUF("25", 20, 40);
$quadroQuatro->addParticipantesCatProfissionalEquipe("1000",null, "2251", 100, 200);
$quadroQuatro->addParticipantesCatProfissionalEquipe("1000",null, "2231", 101, 202);
$quadroQuatro->addParticipantesCatProfissionalMunicipio("240810", "2251", 50, 100);
$quadroQuatro->addParticipantesCatProfissionalMunicipio("240325", "2231", 30, 60);
$quadroQuatro->addParticipantesCatProfissionalPontoTelessaude("2653982", "2251", 52, 104);
$quadroQuatro->addParticipantesCatProfissionalPontoTelessaude("2408635", "2231", 52, 104);
$quadroQuatro->addParticipantesCatProfissionalUF("24", "2251", 50, 100);
$quadroQuatro->addParticipantesCatProfissionalUF("25", "2231", 30, 60);

$quadroCinco = new QuadroCinco(13, 14, 15, 16);
// $quadroCinco->addEvitacaoEncaminhamentoCatProfissional("2231", 55.5, 44.5);
// $quadroCinco->addEvitacaoEncaminhamentoCatProfissional("2251", 30.1, 69.9);
$quadroCinco->addCatProfissionaisFrequentes("2251"); //médicos clínicos
$quadroCinco->addCatProfissionaisFrequentes("2235"); // médicos
$quadroCinco->addEspecialidadesFrequentes("225125"); // médicos clínicos
$quadroCinco->addEspecialidadesFrequentes("223565"); //Enfermeiro da estrategia de saude da familia
$quadroCinco->addEspecialidadesFrequentes("225124"); //Médico pediatra
$quadroCinco->addResolucaoDuvida(80.0, 10.0, 5.0, 5.0); //sim, parcial, não e não sei
$quadroCinco->addSatisfacaoSolicitante("1", 60.0); //Muito Insatisfeito
$quadroCinco->addSatisfacaoSolicitante("2", 35.0); //Insatisfeito
$quadroCinco->addSatisfacaoSolicitante("3", 5.0); //Indiferente
$quadroCinco->addSatisfacaoSolicitante("4", 0.0); //Satisfeito
$quadroCinco->addSatisfacaoSolicitante("5", 0.0); //Muito Satisfeito
$quadroCinco->addTemasFrequentes("R05", "R05");
$quadroCinco->addTemasFrequentes("A03", "D11");

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
$indicadorGeralN1 = new IndicadorGeral("0000010", "012012", $quadroUm, $quadroDois, $quadroTres, $quadroQuatro, $quadroCinco, $quadroSeis);

// $quadroDois->addSolicitacoesEquipe("1002", null, 25);
// $quadroDois->addSolicitacoesEquipe("1003", null, 25);
// $quadroDois->addSolicitacoesProfissional(null, null, "Nome Profissional 3", "prof3@telessaude.ufrn.br", "02",  25);
// $quadroDois->addSolicitacoesProfissional(null, null, "Nome Profissional 4", "prof4@telessaude.ufrn.br", "02",  25);

$indicadorGeralN2 = new IndicadorGeral("0000010", "022012", $quadroUm, $quadroDois, $quadroTres, $quadroQuatro, $quadroCinco, $quadroSeis);

// $quadroDois->addSolicitacoesEquipe("1000", null, 20);
// $quadroDois->addSolicitacoesEquipe("1004", null, 15);
// $quadroDois->addSolicitacoesEquipe("1005", null, 15);
// $quadroDois->addSolicitacoesProfissional("70030044450", null, "Nome Profissional 1", "prof1@telessaude.ufrn.br", "01", 20);
// $quadroDois->addSolicitacoesProfissional(null, null, "Nome Profissional 6", "prof6@telessaude.ufrn.br", "02",  15);
// $quadroDois->addSolicitacoesProfissional(null, null, "Nome Profissional 7", "prof7@telessaude.ufrn.br", "02",  15);

$indicadorGeralN3 = new IndicadorGeral("0000010", "032012", $quadroUm, $quadroDois, $quadroTres, $quadroQuatro, $quadroCinco, $quadroSeis);

// Serializando os dados
$dados_serializadosN1 = Integra::serializar(TipoDeDados::JSON, $indicadorGeralN1);
$dados_serializadosN2 = Integra::serializar(TipoDeDados::JSON, $indicadorGeralN2);
$dados_serializadosN3 = Integra::serializar(TipoDeDados::JSON, $indicadorGeralN3);

echo '<h1>.: Dados Serializados :.</h1>';
echo $dados_serializadosN1;
echo '<hr/>';

// Criando o cliente Integra
$integra = new Integra('2fa6bae267556da376aaa4ac37a537ae8a8c3d85');

// Criando as equipes de Saúde
$equipesSaude = new EquipesSaude();

$equipesSaude->addEquipeSaude("0000010", "1000", null, "ESF 1000", "2653982", null);
$equipesSaude->addEquipeSaude("0000010", null, "1001", "ESF 1001", "2653982", null);
$equipesSaude->addEquipeSaude("0000010", null, "1002", "ESF 1002", "2653982", null);
$equipesSaude->addEquipeSaude("0000010", null, "1003", "ESF 1003", "2653982", null);
$dados_serializados_equipes = Integra::serializar(TipoDeDados::JSON, $equipesSaude->lista_equipes_saude);
print($dados_serializados_equipes);
$respostasEquipes = $integra->enviarDados(TipoDeDados::JSON, $URL.'api/equipes/.json', $dados_serializados_equipes);

// Enviando os Indicadores
$respostaN1 = $integra->enviarDados(TipoDeDados::JSON, $URL.'api/indicadores/.json', $dados_serializadosN1);
$respostaN2 = $integra->enviarDados(TipoDeDados::JSON, $URL.'api/indicadores/.json', $dados_serializadosN2);
$respostaN3 = $integra->enviarDados(TipoDeDados::JSON, $URL.'api/indicadores/.json', $dados_serializadosN3);

// Exibindo as Respostas do Servidor
echo '<h1>.: Resposta do Servidor :.</h1>';
echo $respostasEquipes;
echo '<hr/>';
echo '<h1>.: Resposta do Servidor :.</h1>';
echo $respostaN1;
echo "<br/>";
echo "<br/>";
echo '<hr/>';
echo "<br/>";
echo $respostaN2;
echo "<br/>";
echo "<br/>";
echo '<hr/>';
echo "<br/>";
echo $respostaN3;
echo "<br/>";
echo "<br/>";
echo '<hr/>';
echo "<br/>";
echo $respostaN4;
echo '<hr/>';

?>
