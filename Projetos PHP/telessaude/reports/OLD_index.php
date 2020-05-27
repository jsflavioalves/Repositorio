<?php
//Realiza o gerenciamento de relatórios IReport 
//Como utilizar
//$params['id'] = 1;
//Util::ireport('relatorio.jasper', 'meu_relatorio', $params, true);

require_once('../includes/frameworkajax.php');

if(@$_GET){
	
	//Importando a biblioteca do IReport e PHP
	Loader::import('reports.PHPIReport');
	
	//Gerando o relatório
	$reportName = $_GET['reportName'];
	$relName = $_GET['relName'];
	$params = base64_decode($_GET['hash']);
	$params = unserialize($params);
	$ireport = new PHPIReport($reportName, $relName, $params, $_GET['popup'], $_GET['type']);
	$ireport->make();
}
?>