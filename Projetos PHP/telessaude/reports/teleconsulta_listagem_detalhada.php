<?php
require_once('../includes/frameworkajax.php');

defined('EXEC') or die();
define('DL', ";"); //delimiter
define('BR', "\n"); //new line
$transacao = 'rel_teleconsultas_-_listagem_detalhada';

if(!$auth->isRead($transacao)){
	Util::info(Config::AUTH_MESSAGE);
	exit;
}

if(@!$_GET['params']) {
	exit;
}

$params = unserialize(base64_decode($_GET['params']));

$sql_extra = @!$params['localidade'] ? "" : "and tt.cd_localidade = {$params['localidade']}";
$sql_extra1 = @!$params['periodo'] ? "" : (@$params['status'] == "4" ? "and tt.dt_resposta between {$params['periodo']}" : "and tt.dt_solicitacao between " . $params['periodo']);
$sql_extra2 = @!$params['status'] ? "" : "and tt.tp_status = {$params['status']}";
$sql_extra3 = @!$params['especialidade'] ? "" : "and tt.cd_especialidade = {$params['especialidade']}";
$sql_extra4 = @!$params['especialista'] ? "" : "and tu_esp.ci_usuario = {$params['especialista']}";

if(@!$params['status']) {
	$sql_extra1 = "and coalesce(tt.dt_resposta, tt.dt_solicitacao) between {$params['periodo']}";
}

$sql = "select 	tt.ci_teleconsulta,
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
to_char(tt.dt_solicitacao, 'DD/MM/YYYY HH24:MI:SS') as dt_solicitacao,
to_char(tt.dt_resposta, 'DD/MM/YYYY HH24:MI:SS') as dt_resposta,
tt.cd_categoria_cid,
tt.cd_subcategoria_cid, 
tt.cd_ciap,
tt.cd_paciente,
tp.nm_paciente as paciente_nm_paciente,
tp.nr_cpf as paciente_nr_cpf,
tp.nr_rg as paciente_nr_rg,
tp.nr_codigo as paciente_cartao_sus,
tp.fl_sexo as paciente_fl_sexo,
tp.nr_telefone1 as paciente_nr_telefone1,
tlp.sg_estado as paciente_sg_estado,
tlp.ds_localidade as paciente_ds_localidade		
from tb_teleconsulta tt
inner join tb_localidade tl on(tt.cd_localidade=tl.ci_localidade)
inner join tb_especialidade te on(tt.cd_especialidade=te.ci_especialidade)
inner join tb_usuario tu_sol on(tt.cd_profissional_solicitante=tu_sol.ci_usuario)
inner join tb_profissional tp_sol on(tt.cd_profissional_solicitante=tp_sol.ci_profissional)
left join tb_usuario tu_esp on(tt.cd_profissional_especialista=tu_esp.ci_usuario)
left join tb_paciente tp on(tt.cd_paciente=tp.ci_paciente)
left join tb_localidade tlp on(tp.cd_localidade=tlp.ci_localidade)
where tt.tp_tipo = {$params['tipo']} {$sql_extra} {$sql_extra1} {$sql_extra2} {$sql_extra3} {$sql_extra4}
order by tt.tp_status, tt.dt_solicitacao asc";

	$query = query($sql);

	$lines = '';
	$count = 0;
	while($row = $query->fetch()) {
		
		$ds_localidade = $row['ds_localidade'];
		$nr_cpf = str_replace('.', '', $row['nr_cpf_solicitante']);
		$nr_cpf = str_replace('-', '', $nr_cpf);		
		$nm_usuario_solicitante = strtoupper($row['nm_usuario_solicitante']);
		$nm_usuario_especialista = strtoupper($row['nm_usuario_especialista']);

		$lines .= $row['sg_estado'].DL;
		$lines .= $ds_localidade.DL;
		$lines .= $row['nm_especialidade'].DL;
		$lines .= $row['nm_status'].DL;
		$lines .= $row['ci_usuario_sol'].DL;
		$lines .= $nm_usuario_solicitante.DL;
		$lines .= $row['ci_usuario_esp'].DL;
		$lines .= $nm_usuario_especialista.DL;
		$lines .= $row['dt_solicitacao'].DL;
		$lines .= $row['dt_resposta'].DL;
		$lines .= $nr_cpf.DL;
		$lines .= $row['cd_categoria_cid'].DL;
		$lines .= $row['cd_subcategoria_cid'].DL;
		$lines .= $row['cd_ciap'].DL;
		$lines .= $row['cd_paciente'].DL;
		$lines .= $row['paciente_nm_paciente'].DL;
		$lines .= $row['paciente_nr_cpf'].DL;
		$lines .= $row['paciente_nr_rg'].DL;
		$lines .= $row['paciente_cartao_sus'].DL;
		$lines .= $row['paciente_fl_sexo'].DL;
		$lines .= $row['paciente_nr_telefone1'].DL;
		$lines .= $row['paciente_sg_estado'].DL;
		$lines .= $row['paciente_ds_localidade'].BR;
		$count++;
		
	}
	$table = "sep=;\nTeleconsulta - Listagem Detalhada".BR;
	$table .= "Tipo;" . ($params['tipo'] == "1" ? "EXAME" : "OPNIÃO FORMATIVA").BR;
	$table .= "Localidade;" . (@!$params['localidade'] ? "Todas" : $ds_localidade).BR;
	$table .= "Período;" . (@!$params['periodo'] ? "-" : $params['periodo_descr']).BR;
	$table .= "Total;" . $count;
	$table .= BR.BR;
	$table .= "UF".DL;
	$table .= "Município".DL;
	$table .= "Especialidade".DL;
	$table .= "Status".DL;
	$table .= "ID".DL;
	$table .= "Solicitante".DL;
	$table .= "ID".DL;
	$table .= "Especialista".DL;
	$table .= "Data Solicitado".DL;
	$table .= "Data Finalizado".DL;
	$table .= "CPF Solicitante".DL;
	$table .= "Categoria CID".DL;
	$table .= "Subcategoria CID".DL;
	$table .= "CIAP".DL;
	$table .= "ID".DL;
	$table .= "Paciente Nome".DL;
	$table .= "Paciente CPF".DL;
	$table .= "Paciente RG".DL;
	$table .= "Paciente SUS".DL;
	$table .= "Paciente Sexo".DL;
	$table .= "Paciente Telefone".DL;
	$table .= "Paciente Estado".DL;
	$table .= "Paciente Município".BR;
	$table .= $lines;	


	Util::downCSV($params['filename'], $table);

?>