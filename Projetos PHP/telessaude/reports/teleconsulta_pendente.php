<?php
require_once('../includes/frameworkajax.php');

defined('EXEC') or die();
define('DL', ";"); //delimiter
define('BR', "\n"); //new line
$transacao = 'rel_teleconsultas_-_pendentes';

if(!$auth->isRead($transacao)){
	Util::info(Config::AUTH_MESSAGE);
	exit;
}

if(@!$_GET['params']) {
	exit;
}

$params = unserialize(base64_decode($_GET['params']));

$sql = "select	tt.ci_teleconsulta,
tt.cd_localidade,
tl.sg_estado,
tl.ds_localidade,
tt.cd_especialidade,
te.nm_especialidade,
tt.tp_status,
case tt.tp_status	when 1 then 'Aguardando'
		when 2 then 'Em análise'
		when 3 then 'Respondido'
		when 4 then 'Finalizado'
end as nm_status,
tp_sol.nr_cpf as nr_cpf_solicitante,
tu_sol.ci_usuario as ci_usuario_sol,
tu_sol.nm_usuario as nm_usuario_solicitante,
tu_esp.ci_usuario as ci_usuario_esp,
tu_esp.nm_usuario as nm_usuario_especialista,
to_char(tt.dt_solicitacao, 'dd/mm/yyyy às HH24:MI') as dt_solicitacao,
tu_sol.ds_email as ds_email_sol,
tp_sol.nr_telefone1 as nr_telefone1_sol,
tp_sol.nr_telefone2 as nr_telefone2_sol,
tu_esp.ds_email as ds_email_esp,
tp_esp.nr_telefone1 as nr_telefone1_esp,
tp_esp.nr_telefone2 as nr_telefone2_esp,
age(tt.dt_solicitacao) as dias
from tb_teleconsulta tt
inner join tb_localidade tl on(tt.cd_localidade=tl.ci_localidade)
inner join tb_especialidade te on(tt.cd_especialidade=te.ci_especialidade)
inner join tb_usuario tu_sol on(tt.cd_profissional_solicitante=tu_sol.ci_usuario)
inner join tb_profissional tp_sol on(tt.cd_profissional_solicitante=tp_sol.ci_profissional)
left join tb_usuario tu_esp on(tt.cd_profissional_especialista=tu_esp.ci_usuario)
left join tb_profissional tp_esp on(tt.cd_profissional_especialista=tp_esp.ci_profissional)
where tt.tp_tipo = {$params['tipo']}
and tt.tp_status != 4
and tt.dt_solicitacao <= (current_date - {$params['dias']} )
order by tt.tp_status, tt.dt_solicitacao, te.nm_especialidade, tl.sg_estado, tl.ds_localidade asc";

	$query = query($sql);

	$lines = '';
	$count = 0;
	while($row = $query->fetch()) {
		
		$ds_localidade = $row['ds_localidade'];
		//$nr_cpf = str_replace('.', '', $row['nr_cpf_solicitante']);
		//$nr_cpf = str_replace('-', '', $nr_cpf);		
		$nm_usuario_solicitante = strtoupper($row['nm_usuario_solicitante']);
		$nm_usuario_especialista = strtoupper($row['nm_usuario_especialista']);
		$dias = $row['dias'];
		$dias = str_replace('days', 'dias', $dias);
		$dias = str_replace('day', 'dia', $dias);
		$dias = str_replace('mons', 'meses', $dias);
		$dias = str_replace('mon', 'mês', $dias);
		$dias = str_replace('years', 'anos', $dias);
		$dias = str_replace('year', 'ano', $dias);
		$dias = substr($dias, 0, -15);

		$lines .= $row['sg_estado'].DL;
		$lines .= $ds_localidade.DL;
		$lines .= $row['nm_especialidade'].DL;
		$lines .= $row['nm_status'].DL;
		$lines .= $dias.DL;
		$lines .= $row['ci_usuario_sol'].DL;
		$lines .= $nm_usuario_solicitante.DL;
		$lines .= $row['nr_telefone1_sol'].DL;
		$lines .= $row['nr_telefone2_sol'].DL;
		$lines .= $row['ci_usuario_esp'].DL;
		$lines .= $nm_usuario_especialista.DL;
		$lines .= $row['nr_telefone1_esp'].DL;
		$lines .= $row['nr_telefone2_esp'].DL;
		$lines .= $row['dt_solicitacao'].BR;
		//$lines .= $nr_cpf.BR;
		$count++;
		
	}
	$table = "sep=;\nTeleconsulta - Pendente".BR;
	$table .= "Tipo;" . ($params['tipo'] == "1" ? "EXAME" : "OPNIÃO FORMATIVA").BR;
	$table .= "Atrasadas mais que (dias);" . $params['dias'].BR;
	$table .= "Total;" . $count;
	$table .= BR.BR;
	$table .= DL.DL.DL.DL.DL."SOLICITANTE".DL.DL.DL.DL."ESPECIALISTA".DL.BR;
	$table .= "UF".DL;
	$table .= "Município".DL;
	$table .= "Especialidade".DL;
	$table .= "Status".DL;
	$table .= "Atraso".DL;
	$table .= "ID".DL;
	$table .= "Nome".DL;
	$table .= "Telefone1".DL;
	$table .= "Telefone2".DL;
	$table .= "ID".DL;
	$table .= "Nome".DL;
	$table .= "Telefone1".DL;
	$table .= "Telefone2".DL;
	$table .= "Data Solicitado".BR;
	$table .= $lines;	


	Util::downCSV($params['filename'], $table);

?>