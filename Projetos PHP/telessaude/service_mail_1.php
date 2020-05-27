<?php
//Este serviço tem a finalidade de enviar um email para o
//administrador do sistema, informando as teleconsultas 
//que não estão finalizadas há mais de 1 dia.

define('ATITUDE_BASE', getcwd());
require_once('includes/frameworkdefault.php');
Loader::import('com.atitudeweb.Util');

$email = array('cleyson87@gmail.com', 'tavares.sti@gmail.com', 'sheila.barbosa@nuteds.ufc.br', 'narcisodemedeiros@gmail.com', 'rmrolim@hotmail.com');

//Selecionando Teleconsultas
$sqlNum = "select 	count(*) as num
from tb_teleconsulta tt
inner join tb_localidade tl on(tt.cd_localidade=tl.ci_localidade)
inner join tb_especialidade te on(tt.cd_especialidade=te.ci_especialidade)
inner join tb_usuario tu_sol on(tt.cd_profissional_solicitante=tu_sol.ci_usuario)
left join tb_usuario tu_esp on(tt.cd_profissional_especialista=tu_esp.ci_usuario)
where tt.tp_tipo = 2 and tt.tp_status != 4 and tt.dt_solicitacao <= (current_date - integer '2')
  and extract(year from tt.dt_solicitacao) >= 2018";
$queryNum = query($sqlNum)->fetch();
if(@$queryNum['num'] > 0) {

	$sql = "select 	tt.ci_teleconsulta,
		tt.cd_localidade,
		tl.sg_estado || ' - ' || tl.ds_localidade as ds_localidade,
		tt.cd_especialidade,
		te.nm_especialidade,
		tt.tp_status,
		case tt.tp_status	when 1 then 'Aguardando'
				when 2 then 'Em análise'
				when 3 then 'Respondido'
				when 4 then 'Finalizado'
		end as nm_status,
		tu_sol.ci_usuario || ' - ' || tu_sol.nm_usuario as nm_usuario_solicitante,
		tu_esp.ci_usuario || ' - ' || tu_esp.nm_usuario as nm_usuario_especialista,
		to_char(tt.dt_solicitacao, 'dd/mm/yyyy HH24:MI') as dt_solicitacao,
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
	where tt.tp_tipo = 2 and tt.tp_status != 4 and tt.dt_solicitacao <= (current_date - integer '1')
	  and extract(year from tt.dt_solicitacao) >= 2018
	order by tt.tp_status, tt.dt_solicitacao, te.nm_especialidade, tl.sg_estado || ' - ' || tl.ds_localidade asc";

	$query = query($sql);
	$table = '<table border="1" cellpadding="5" cellspacing="0">
	<tr bgcolor="#f0f0f0"><th>Status</th><th>Atraso</th><th>Solicitado</th><th>Especialidade</th><th>Município</th><th>Solicitante</th><th>Especialista</th><th>Cód.</th></tr>';
	while($row = $query->fetch()){
		$dias = $row['dias'];
		$dias = str_replace('days', 'dias', $dias);
		$dias = str_replace('day', 'dia', $dias);
		$dias = str_replace('mons', 'meses', $dias);
		$dias = str_replace('mon', 'mês', $dias);
		$dias = str_replace('years', 'anos', $dias);
		$dias = str_replace('year', 'ano', $dias);
		$dias = substr($dias, 0, -15);
		$table .= '<tr><td>'.$row['nm_status'].'</td><td>'.$dias.'</td><td>'.$row['dt_solicitacao'].'</td><td>'.$row['nm_especialidade'].'</td><td>'.$row['ds_localidade'].'</td>
		<td>'.$row['nm_usuario_solicitante'].'<br>'.$row['ds_email_sol'].'<br>'.$row['nr_telefone1_sol'].' - '.$row['nr_telefone2_sol'].'</td>
		<td>'.$row['nm_usuario_especialista'].'<br>'.$row['ds_email_esp'].'<br>'.$row['nr_telefone1_esp'].' - '.$row['nr_telefone2_esp'].'</td>
		<td>'.$row['ci_teleconsulta'].'</td></tr>';
	}	
	$table .= '</table><br>'.$queryNum['num'].' teleconsultorias encontradas';
}
else {
	$table = 'Não existem teleconsultorias pendentes até o presente momento!';
}

$body = "<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN' 'http://www.w3.org/TR/html4/loose.dtd'>
<html>
<head>
	<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
	<title>Telessaude - NUTEDS</title>
	<style>
		table { font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; }		
	</style>
 </head>
 <body topmargin='0'>
	<table width='100%'  border='0' align='center' cellpadding='0' cellspacing='0' bordercolor='#E3E1BA' bgcolor='#FFFFFF'>
		<tr>
			<td><div align='justify'>
			<table width='100%'  border='0' cellpadding='10' cellspacing='0'>
		<tr>
			<td>
			<br>
			".Config::SITE."
			<br>
			Teleconsultorias pendentes há mais de dois dias:<br>
			".$table."			
			</td>
			</tr>
			</table>
			</div></td>
		</tr>
	</table>
</body>
</html>";
//echo $body;
Util::mail(utf8_decode('Rotina de verificação de teleconsultorias pendentes'), 'telessaude@medicina.ufc.br', 'NUTEDS', $body, $email);
?>