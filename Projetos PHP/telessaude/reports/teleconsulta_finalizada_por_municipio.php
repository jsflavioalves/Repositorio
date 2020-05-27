<?php
require_once('../includes/frameworkajax.php');

defined('EXEC') or die();
define('DL', ";"); //delimiter
define('BR', "\n"); //new line
$transacao = 'rel_teleconsultas_-_finalizadas_por_municipios';

if(!$auth->isRead($transacao)){
	Util::info(Config::AUTH_MESSAGE);
	exit;
}

if(@!$_GET['params']) {
	exit;
}

$params = unserialize(base64_decode($_GET['params']));

$sql_extra = @!$params['periodo'] ? "" : "and tt.dt_resposta between {$params['periodo']}";

$sql = "select 
tt.cd_localidade, 
tl.sg_estado,
tl.ds_localidade, 
tt.cd_especialidade, 
te.nm_especialidade, 
count(tt.ci_teleconsulta) as count_esp
from tb_teleconsulta tt
inner join tb_especialidade te on(tt.cd_especialidade=te.ci_especialidade)
inner join tb_localidade tl on(tt.cd_localidade=tl.ci_localidade)
where tt.tp_tipo = {$params['tipo']}
  and tt.tp_status = 4
  {$sql_extra}
group by 1,2,3,4,5
order by tl.sg_estado || ' - ' || tl.ds_localidade, te.nm_especialidade";

	$query = query($sql);

	$blockA = array();
	$blockB = array();
	$count = 0;
	while($row = $query->fetch()) {
		
		$line = $row['sg_estado'].DL;
		$line .= $row['ds_localidade'].DL;
		$line .= $row['nm_especialidade'].DL;
		$line .= $row['count_esp'];
		$count += $row['count_esp'];

		$blockA[] = $line;
		
		if(array_key_exists($row['cd_localidade'], $blockB)) {
			$blockB[$row['cd_localidade']]['value'] += $row['count_esp'];
		}
		else {
			$blockB[$row['cd_localidade']] = 
				array(	
					'uf'		=> $row['sg_estado'],
					'municipio' => $row['ds_localidade'],
					'value'		=> $row['count_esp'] 
				);
		}
	}

	$lines = '';
	foreach($blockA as $key=>$valueA) {
		
		$valueB = current($blockB);
		$lines .= $valueA.DL.DL.DL.$valueB['uf'].DL.$valueB['municipio'].DL.$valueB['value'].BR;
		next($blockB);
	}

	$table = "sep=;\nTeleconsulta - Finalizadas por Município".BR;
	$table .= "Tipo;" . ($params['tipo'] == "1" ? "EXAME" : "OPNIÃO FORMATIVA").BR;
	$table .= "Localidade;Todas".BR;
	$table .= "Período;" . (@!$params['periodo'] ? "-" : $params['periodo_descr']).BR;
	$table .= "Total;" . $count;
	$table .= BR.BR;
	$table .= "UF".DL;
	$table .= "Município".DL;
	$table .= "Especialidade".DL;
	$table .= "Total".DL.DL.DL;
	$table .= "UF".DL;
	$table .= "Município".DL;
	$table .= "Total".BR;
	$table .= $lines;	

	Util::downCSV($params['filename'], $table);

?>