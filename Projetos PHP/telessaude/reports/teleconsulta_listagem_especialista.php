<?php
require_once('../includes/frameworkajax.php');

defined('EXEC') or die();
define('DL', ";"); //delimiter
define('BR', "\n"); //new line
$transacao = 'rel_teleconsultas_-_finalizadas_por_especialistas';

if(!$auth->isRead($transacao)){
	Util::info(Config::AUTH_MESSAGE);
	exit;
}

if(@!$_GET['params']) {
	exit;
}

$params = unserialize(base64_decode($_GET['params']));

$sql_extra = @!$params['especialista'] ? "and tt.cd_profissional_especialista is not null" : "and tt.cd_profissional_especialista = " . $params['especialista'];
$sql_extra1 = @!$params['periodo'] ? "" : "and tt.dt_resposta between " . $params['periodo'];

$sql = "select 	
upper(tu_esp.nm_usuario) as nm_usuario_especialista,
te.nm_especialidade,
count(*) as num
from tb_teleconsulta tt
inner join tb_especialidade te on(tt.cd_especialidade=te.ci_especialidade)
left join tb_usuario tu_esp on(tt.cd_profissional_especialista=tu_esp.ci_usuario)
where tt.tp_tipo = {$params['tipo']}
and tt.tp_status = 4
{$sql_extra}
{$sql_extra1}
group by 1,2
order by 1 asc";

	$query = query($sql);

	$lines = '';
	$count = 0;
	while($row = $query->fetch()) {
		
		$nm_usuario_especialista = strtoupper($row['nm_usuario_especialista']);
		$lines .= $nm_usuario_especialista.DL;
		$lines .= $row['nm_especialidade'].DL;
		$lines .= $row['num'].BR;		
		$count += $row['num'];		
	}
	$table = "sep=;\nTeleconsulta - Listagem Especialista".BR;
	$table .= "Tipo;" . ($params['tipo'] == "1" ? "EXAME" : "OPNIÃO FORMATIVA").BR;
	$table .= "Período;" . (@!$params['periodo'] ? "-" : $params['periodo_descr']).BR;
	$table .= "Total;" . $count.BR;
	$table .= BR.BR;
	$table .= "Especialista".DL;
	$table .= "Especialidade".DL;
	$table .= "Total".BR;
	$table .= $lines;	


	Util::downCSV($params['filename'], $table);

?>