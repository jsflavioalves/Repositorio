<?php
require_once('../includes/frameworkajax.php');

defined('EXEC') or die();
define('DL', ";"); //delimiter
define('BR', "\n"); //new line
$transacao = 'rel_especialistas';

if(!$auth->isRead($transacao)){
	Util::info(Config::AUTH_MESSAGE);
	exit;
}

if(@!$_GET['params']) {
	exit;
}

$params = unserialize(base64_decode($_GET['params']));

$sql = "select
tu.ci_usuario,
upper(tu.nm_usuario) as nm_usuario,
tu.nm_login,
tu.ds_email,
tu.fl_ativo,
tu.tp_nivelacesso,
tp.nr_telefone1,
tp.nr_telefone2,
tp.nr_telefone3,
(select array_to_string( array(select tl.ds_localidade
from tb_profissional_localidade tpl
inner join tb_localidade tl on(tpl.cd_localidade=tl.ci_localidade)
where cd_profissional = tu.ci_usuario
group by 1
order by 1), ' | ')) as municipios,
(select array_to_string( array(select te.nm_especialidade
from tb_profissional_especialidade tpe
inner join tb_especialidade te on(tpe.cd_especialidade=te.ci_especialidade)
where tpe.cd_profissional = tu.ci_usuario
group by 1
order by 1), ' | ')) as especialidades,
to_char(tu.dt_cadastro, 'DD/MM/YYYY HH24:MI:SS') as dt_cadastro,
to_char(tu.dt_acesso, 'DD/MM/YYYY HH24:MI:SS') as dt_acesso
from tb_usuario tu
inner join tb_profissional tp on(tu.ci_usuario=tp.ci_profissional)
where tu.ci_usuario in(
select distinct cd_usuario
from tb_usuario_grupo
where cd_grupo in(
	select distinct cd_grupo
	from tb_grupo_transacao
	where cd_transacao in(6,7)
)
)
order by tu.nm_usuario";

	$query = query($sql);

	$lines = '';
	$count = 0;
	while($row = $query->fetch()) {
		
		$lines .= $row['ci_usuario'].DL;
		$lines .= $row['nm_usuario'].DL;
		$lines .= $row['nm_login'].DL;
		$lines .= $row['nm_email'].DL;
		$lines .= $row['fl_ativo'].DL;		
		$lines .= $row['tp_nivelacesso'].DL;		
		$lines .= $row['nr_telefone1'].DL;
		$lines .= $row['nr_telefone2'].DL;
		$lines .= $row['nr_telefone3'].DL;
		$lines .= $row['especialidades'].DL;
		$lines .= $row['municipios'].DL;
		$lines .= $row['dt_cadastro'].DL;
		$lines .= $row['dt_acesso'].BR;
		$count++;
		
	}

	
	$table = "sep=;\nTeleconsulta - Especialistas".BR;
	$table .= "Total;" . $count;
	$table .= BR.BR;
	$table .= "ID".DL;
	$table .= "Especialista".DL;
	$table .= "Login".DL;
	$table .= "Email".DL;
	$table .= "Ativo".DL;
	$table .= "Nível Acesso".DL;
	$table .= "Telefone1".DL;
	$table .= "Telefone2".DL;
	$table .= "Telefone3".DL;
	$table .= "Especialidades".DL;
	$table .= "Municípios".DL;
	$table .= "Data Cadastro".DL;
	$table .= "Data Acesso".BR;
	$table .= $lines;	
	

	Util::downCSV($params['filename'], $table);

?>