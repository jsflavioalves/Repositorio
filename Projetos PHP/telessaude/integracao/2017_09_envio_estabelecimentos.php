<?php
header("Content-Type: text/html; charset=utf-8");
require("classes/integra.class.php");
error_reporting(E_ALL);
ini_set("display_errors", 1);
set_time_limit(0);


////////////////////////////////////////////////////////////////
//INTEGRA
$url = 'http://smart.telessaude.ufrn.br/';
$integra = new Integra("ad9c2aa3622033fc9d79703fde22a4e892641221");


////////////////////////////////////////////////////////////////
//0 - Estabelecimentos - Atualização
echo "<br/><br/><fieldset><legend>Estabelecimentos - Atualização</legend>";
$estabelecimento = new EstabelecimentoSaude("0000088", "092017");
$estabelecimento->atualizarEstabelecimentoSaude("2726297", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2479591", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2645106", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("8002614", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2372738", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("6744923", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2478927", false, true, false);
$estabelecimento->atualizarEstabelecimentoSaude("2478730", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("6085350", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2551934", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2326949", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("7282125", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("8014949", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2372371", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("7173318", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2611392", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2664321", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2426366", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2327104", false, true, false);
$estabelecimento->atualizarEstabelecimentoSaude("3643891", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2424436", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("7379153", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("3535150", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2610906", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2645017", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2326914", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("6728944", false, true, false);
$estabelecimento->atualizarEstabelecimentoSaude("2479680", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2482193", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2552019", true, true, false);
$estabelecimento->atualizarEstabelecimentoSaude("2564327", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2479753", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("5105315", false, true, false);
$estabelecimento->atualizarEstabelecimentoSaude("2552191", false, true, false);
$estabelecimento->atualizarEstabelecimentoSaude("4011279", false, true, false);
$estabelecimento->atualizarEstabelecimentoSaude("2798441", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2326957", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2372959", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2481928", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2528118", true, true, false);
$estabelecimento->atualizarEstabelecimentoSaude("2563819", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2482223", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("7423241", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2372800", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2424320", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("5128439", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("3860108", false, true, false);
$estabelecimento->atualizarEstabelecimentoSaude("2552388", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("6429181", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2528533", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2372754", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2374064", false, true, false);
$estabelecimento->atualizarEstabelecimentoSaude("2479710", false, true, false);
$estabelecimento->atualizarEstabelecimentoSaude("2528010", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("7191510", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("6942156", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2560917", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2372673", false, true, false);
$estabelecimento->atualizarEstabelecimentoSaude("2562154", false, true, false);
$estabelecimento->atualizarEstabelecimentoSaude("6224741", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("7390734", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2528088", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2479109", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2527189", false, true, false);
$estabelecimento->atualizarEstabelecimentoSaude("2482282", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2480069", true, true, false);
$estabelecimento->atualizarEstabelecimentoSaude("2529106", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2478099", false, true, false);
$estabelecimento->atualizarEstabelecimentoSaude("5472598", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2554534", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("5269881", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2644983", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("5833590", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2563851", false, true, false);
$estabelecimento->atualizarEstabelecimentoSaude("2529114", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2529556", false, true, false);
$estabelecimento->atualizarEstabelecimentoSaude("2529181", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2478714", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2726009", false, true, false);
$estabelecimento->atualizarEstabelecimentoSaude("2372940", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2373203", false, true, false);
$estabelecimento->atualizarEstabelecimentoSaude("7191383", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2478536", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2426641", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2424223", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("6358225", true, false, false);
$estabelecimento->atualizarEstabelecimentoSaude("2561530", true, false, false);
$dados_serializados_estabelecimento = Integra::serializar(TipoDeDados::JSON, $estabelecimento);
echo "<h3>.: Dados Serializados - Estabelecimentos :.</h3>";
echo $dados_serializados_estabelecimento;
$resposta_estabelecimento = $integra->enviarDados(TipoDeDados::JSON, $url."api/v2/dados-estabelecimentos-saude/?format=json", $dados_serializados_estabelecimento);
echo "<h3>.: Resposta do Servidor - Estabelecimentos :.</h3>";
echo $resposta_estabelecimento;
echo "</fieldset>";




?>