<?php
//Este serviço tem a finalidade de enviar emails informando
//aos usuários especialistas, novas teleconsultas que foram 
//criadas e se encaixam no perfil para laudar, destes especialistas

set_time_limit(0);
define('ATITUDE_BASE', getcwd());
require_once('includes/frameworkdefault.php');
Loader::import('com.atitudeweb.Util');

//Selecionando as especialidades das teleconsultas novas
$sql = "select tsm.cd_especialidade, te.nm_especialidade, count(*) as num
from tb_service_mail_2 tsm
inner join tb_especialidade te on(tsm.cd_especialidade=te.ci_especialidade)
group by 1,2";
$especialidades = query($sql);
while($row = $especialidades->fetch()){
	
	//Selecionando os emails dos profissionais especialistas na área
	$sql = "select tu.ds_email
	from tb_usuario tu
	inner join tb_profissional_especialidade tpe on(tu.ci_usuario=tpe.cd_profissional)
	where tu.fl_profissional = true
	  and tpe.cd_especialidade = ".$row['cd_especialidade']."
	  and tu.fl_ativo = true
	  and tu.ci_usuario in(
		select cd_usuario 
		from tb_usuario_grupo tug
		where tug.cd_grupo in(
			select cd_grupo from tb_grupo_transacao 
			where cd_transacao = (select ci_transacao from tb_transacao where nm_label = 'especialista_2_op_form')
		)
	)";
	$emails = array();
	$queryProfissionais = query($sql);
	
	//Confeccionando emails
	$descr = 'existem '.$row['num'].' teleconsultorias para '.$row['nm_especialidade'].' que dever&atilde;o ser laudadas';
	if($row['num'] == 1){
		$descr = 'existe uma teleconsultorias para '.$row['nm_especialidade'].' que dever&aacute; ser laudada';
	}	
	$body = "<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN' 'http://www.w3.org/TR/html4/loose.dtd'>
	<html>
	<head>
		<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
		<title>".Config::SYSTEM."</title>
	 </head>
	 <body topmargin='0'>
		<table width='600'  border='0' align='center' cellpadding='0' cellspacing='0' bordercolor='#E3E1BA' bgcolor='#FFFFFF'>
			<tr>
				<td><img src='http://www.nuteds.ufc.br/home/images/logo_nuteds.png' width='262' height='62'></td>
			</tr>
			<tr>
				<td><div align='justify'>
				<table width='100%'  border='0' cellpadding='10' cellspacing='0'>
			<tr>
				<td><p><font size='2' face='Verdana, Arial, Helvetica, sans-serif'>Prezado Profissional,<br>
				<br>
				Informamos que, no sistema, ".$descr.". Consulte o sistema e verifique a disponibilidade.
				Informamos que voc&ecirc; tem um prazo de 24hs para responder as solicita&ccedil;&otilde;es.<br><br>
				Responder agora?<br>
				<a href=\"".Config::SITE."index.php?page=laudar\">".Config::SITE."index.php?page=laudar</a>
				<br><br>
				===Caso n&atilde;o consiga acessar diratamente o site atrav&eacute;s do link disponibilizado acima, copie e cole em seu navegador!===
				<br><br>
				Att.<br><br>
				Este &eacute; um email autom&aacute;tico, por favor n&atilde;o responda.
				</font></p>
				</td>
				</tr>
				</table>
				</div></td>
			</tr>
		</table>
	</body>
	</html>";
	
	//Enviando os emails
	while($prof = $queryProfissionais->fetch()){
		$delay = rand(1, 120) / 100;
		sleep($delay);
		Util::mail(utf8_decode('Existem teleconsultorias pendentes'), 'telessaude@medicina.ufc.br', 'NUTEDS', $body, $prof['ds_email']);
	}
}

//Excluindo as teleconsultas da notificação
query("delete from tb_service_mail_2");

?>