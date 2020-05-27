<?php
defined('EXEC') or die();

//VALIDANDO OS POSSÍVEIS ERROS NA VISUALIZAÇÃO DA TELECONSULTA

///Se o usuário não for um profissional é emitida uma mensagem de erro
if(!$auth->isProfissional()){
	Util::info(Config::AUTH_MESSAGE);
	return true;
}

if(@!$_GET['id'] || @!$_GET['type']){
	Util::info('Houve um erro. Por favor, entre em contato com o administrador.');
	return true;
}
$ci_teleconsulta = $_GET['id'];

//Carregando classes
Loader::import('br.ufc.nuteds.Teleconsulta');
Loader::import('br.ufc.nuteds.File');
Loader::import('com.atitudeweb.Crypt');

//Carregando a teleconsulta
$sql = "select 	tt.ci_teleconsulta, 
tt.cd_profissional_solicitante,
tu1.nm_usuario as nm_profissional_solicitante,
tt.cd_profissional_especialista,
tu2.nm_usuario as nm_profissional_especialista,
tt.tp_tipo,
tt.cd_localidade,
tl.sg_estado || ' - ' || tl.ds_localidade as ds_localidade,
tt.cd_especialidade,
te.nm_especialidade,
tp.nr_codigo || ' - ' || tp.nm_paciente as nm_paciente,
tt.tp_status, 
tt.fl_urgencia,
tt.fl_inconclusivo,
tt.ds_solicitacao,
tcc.nm_categoria_cid,
tsc.nm_subcategoria_cid,
td.nm_duvida,
tor.nm_orientacao,
to_char(tt.dt_solicitacao, 'dd/mm/yyyy às HH24:MI') as dt_solicitacao,
tt.ds_resposta,
tt.ds_medicamento,
to_char(tt.dt_resposta, 'dd/mm/yyyy às HH24:MI') as dt_resposta
from tb_teleconsulta tt
inner join tb_localidade tl on(tt.cd_localidade=tl.ci_localidade)
inner join tb_especialidade te on(tt.cd_especialidade=te.ci_especialidade)
inner join tb_usuario tu1 on(tt.cd_profissional_solicitante=tu1.ci_usuario)
left join tb_usuario tu2 on(tt.cd_profissional_especialista=tu2.ci_usuario)
left join tb_paciente tp on(tt.cd_paciente=tp.ci_paciente)
left join tb_categoria_cid tcc on(tt.cd_categoria_cid=tcc.ci_categoria_cid)
left join tb_subcategoria_cid tsc on(tt.cd_subcategoria_cid=tsc.ci_subcategoria_cid)
left join tb_duvida td on(tt.cd_duvida=td.ci_duvida)
left join tb_orientacao tor on(tt.cd_orientacao=tor.ci_orientacao)
where tt.ci_teleconsulta = $ci_teleconsulta";
$row = query($sql)->fetch();
$teleconsulta = new Teleconsulta($row, $user, $auth);

/**
 * Lança o registro da entidade mobile para o aplicativo se atualizar
 */
function refreshMobile() {
	//global $ci_teleconsulta, $row;
	//$cd_profissional = $row['cd_profissional_solicitante'];
	//$queryVerifica = query('select ci_mobile_log from tb_mobile_log where cd_profissional = '.$cd_profissional.' limit 1');
	//if ($queryVerifica->rowCount() > 0) {
	//	execute('insert into tb_mobile_teleconsulta(cd_profissional, cd_teleconsulta) values('.$cd_profissional.', '.$ci_teleconsulta.');');
	//}	
}

//Verificando se o especialista está alterando o status da teleconsulta para laudar
if(@$_POST['laudar']){
	$sql = 'update tb_teleconsulta set cd_profissional_especialista='.$user['ci_usuario'].', tp_status='.Teleconsulta::STATUS_EM_ANALISE.' where ci_teleconsulta='.$ci_teleconsulta;
	if(execute($sql)){	
		if($row['tp_tipo'] == Teleconsulta::TIPO_OPNIAO_FORMATIVA){
			
			//Atualizando mobile
			refreshMobile();
			
			//Enviando email para o solicitante da teleconsulta
			$rowEmail = query('select tu.ds_email from tb_teleconsulta tt inner join tb_usuario tu on(tt.cd_profissional_solicitante=tu.ci_usuario) where tt.ci_teleconsulta = '.$ci_teleconsulta)->fetch();
			if(@$rowEmail['ds_email']){
				$body = "<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN' 'http://www.w3.org/TR/html4/loose.dtd'>
				<html>
				<head>
					<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
					<title>".Config::SYSTEM."</title>
				 </head>
				 <body topmargin='0'>
					<table width='600' border='0' align='center' cellpadding='0' cellspacing='0' bordercolor='#E3E1BA' bgcolor='#FFFFFF'>
						<tr>
							<td><img src='http://www.nuteds.ufc.br/home/images/logo_nuteds.png' width='262' height='62'></td>
						</tr>
						<tr>
							<td><div align='justify'>
							<table width='100%' border='0' cellpadding='10' cellspacing='0'>
						<tr>
							<td><p><font size='2' face='Verdana, Arial, Helvetica, sans-serif'>Prezado Profissional,<br>
							<br>
							Sua solicita&ccedil;&atilde;o est&aacute; sendo analisada. Fique atento! Dentro de 48hs sua solicita&ccedil;&atilde;o ser&aacute; atendida.<br><br>
							<a href=\"".Config::SITE."index.php?page=teleconsulta&id=".$ci_teleconsulta."&view=h&type=2\">".Config::SITE."index.php?page=teleconsulta&id=".$ci_teleconsulta."&view=h&type=2</a><br><br>
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
				Util::mail(utf8_decode('Teleconsulta está sendo analisada'), 'nuteds@ufc.br', 'NUTEDS', $body, $rowEmail['ds_email']);				
			}

			//Removendo a teleconsulta do serviço de informação do especialista, caso haja
			//(service_mail_2)
			query("delete from tb_service_mail_2 where cd_teleconsulta = $ci_teleconsulta");
			
		}
		Controller::setInfo('Teleconsulta', 'Salva com sucesso!');	
		Controller::redirect(Util::setLink());
	}
	else{
		Util::notice('Teleconsulta', 'Ocorreu um erro!', 'error');
	}	
}

//Verificando se há arquivo para adicionar
if(@$_POST['addfile']){	
	$file = new File();
	if($file->uploadAposCadastro($teleconsulta, $user)){
	
		//Atualizando mobile
		if($row['tp_tipo'] == Teleconsulta::TIPO_OPNIAO_FORMATIVA) {
			refreshMobile();
		}
		
		Controller::setInfo('Teleconsulta', 'Arquivo enviado!', 'ok', array('ds_mensagem_backup' => @$_POST['ds_mensagem_backup']));	
		Controller::redirect(Util::setLink());
	}
	else{
		Util::notice('Teleconsulta', 'Ocorreu um erro ao enviar o arquivo!', 'error');
	}
}

//Verificando se o usuáro está finalizando a teleconsulta
if(@$_POST['resposta']){	
	$fl_inconclusivo = (@$_POST['fl_inconclusivo'] == '1' ? 'true' : 'false');
	$cd_orientacao = (@$_POST['cd_orientacao'] ? $_POST['cd_orientacao'] : 'null');
	$ds_resposta = (@$_POST['ds_resposta'] ? "'".addslashes($_POST['ds_resposta'])."'" : 'null');
	$ds_medicamento = (@$_POST['ds_medicamento'] ? "'".addslashes($_POST['ds_medicamento'])."'" : 'null');
	if($row['tp_tipo'] == Teleconsulta::TIPO_EXAME){	
		$sql = "update tb_teleconsulta set fl_inconclusivo=$fl_inconclusivo, ds_resposta=$ds_resposta, dt_resposta=now(), tp_status=".Teleconsulta::STATUS_FINALIZADO." where ci_teleconsulta=$ci_teleconsulta";
	} 
	elseif($row['tp_tipo'] == Teleconsulta::TIPO_OPNIAO_FORMATIVA){
		$sql = "update tb_teleconsulta set cd_orientacao=$cd_orientacao, ds_resposta=$ds_resposta, dt_resposta=now(), ds_medicamento=$ds_medicamento, tp_status=".Teleconsulta::STATUS_FINALIZADO." where ci_teleconsulta=$ci_teleconsulta";				
	}
	
	if(execute($sql)){
		
		//if($row['tp_tipo'] == Teleconsulta::TIPO_OPNIAO_FORMATIVA) {
		
			//Atualizando mobile
			refreshMobile();
			
			//Enviando email para o solicitante da teleconsulta, informando sua finalização
			$rowEmail = query('select tu.ds_email from tb_teleconsulta tt inner join tb_usuario tu on(tt.cd_profissional_solicitante=tu.ci_usuario) where tt.ci_teleconsulta = '.$ci_teleconsulta)->fetch();
			if(@$rowEmail['ds_email']){
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
							Sua solicita&ccedil;&atilde;o foi finalizada. Por favor, verifique no link abaixo:<br><br>
							<a href=\"".Config::SITE."index.php?page=teleconsulta&id=".$ci_teleconsulta."&view=h&type=2\">".Config::SITE."index.php?page=teleconsulta&id=".$ci_teleconsulta."&view=h&type=2</a><br><br>
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
				Util::mail(utf8_decode('Teleconsulta finalizada'), 'nuteds@ufc.br', 'NUTEDS', $body, $rowEmail['ds_email']);				
			}
			
		//}
		if($row['tp_tipo'] == Teleconsulta::TIPO_EXAME) {
		
			//Verificando se há arquivo para adicionar em teleconsultas do tipo exame
			if(@$_FILES['file_upload']){
				$rowDados = query("select tp.nm_paciente, tl.ds_localidade || '_' || tl.sg_estado as ds_localidade
				from tb_teleconsulta tt
				inner join tb_paciente tp on(tt.cd_paciente=tp.ci_paciente)
				inner join tb_localidade tl on(tt.cd_localidade=tl.ci_localidade)
				where ci_teleconsulta = $ci_teleconsulta")->fetch();
			
				$file = new File();
				$file->uploadExame($ci_teleconsulta, $user, $rowDados['nm_paciente'], $rowDados['ds_localidade']);
			}
		}
		
		//Informando o sucesso e redirecionando
		Controller::setInfo('Teleconsulta', 'Salva com sucesso!');	
		Controller::redirect(Util::setLink());
	}
	else{
		Util::notice('Teleconsulta', 'Ocorreu um erro!', 'error');
	}
}

//Verificando se o usuário está enviando uma mensagem
if(@$_POST['mensagem']){
	$ds_resposta = addslashes($_POST['ds_mensagem']);
	$sql = "insert into tb_teleconsulta_resposta(cd_teleconsulta, cd_profissional, ds_resposta) values($ci_teleconsulta, ".$user['ci_usuario'].", '$ds_resposta'); ";
	
	if($teleconsulta->isEspecialistaOwner()){
		$sql .= "update tb_teleconsulta set tp_status=".Teleconsulta::STATUS_RESPONDIDO." where ci_teleconsulta=$ci_teleconsulta;";
	}
	elseif($row['cd_profissional_especialista']){
		$sql .= "update tb_teleconsulta set tp_status=".Teleconsulta::STATUS_EM_ANALISE." where ci_teleconsulta=$ci_teleconsulta;";
	}
	
	$email = "";
	if(execute($sql)){
	
		//Atualizando mobile
		if($row['tp_tipo'] == Teleconsulta::TIPO_OPNIAO_FORMATIVA) {
			refreshMobile();
		}
		
		if($teleconsulta->isEspecialistaOwner()){
			$rowEmail = query('select ds_email from tb_usuario where ci_usuario = '.$row['cd_profissional_solicitante'])->fetch();
			if(@$rowEmail['ds_email']){
				$email = $rowEmail['ds_email'];
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
						O Profissional respondeu sua solicita&ccedil;&atilde;o. Para ler o coment&aacute;rio, acesse o sistema.<br><br>
						<a href=\"".Config::SITE."index.php?page=teleconsulta&id=".$ci_teleconsulta."&view=h&type=2\">".Config::SITE."index.php?page=teleconsulta&id=".$ci_teleconsulta."&view=h&type=2</a><br><br>
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
		}
		elseif($row['cd_profissional_especialista']){
			$rowEmail = query('select ds_email from tb_usuario where ci_usuario = '.$row['cd_profissional_especialista'])->fetch();
			if(@$rowEmail['ds_email']){
				$email = $rowEmail['ds_email'];
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
						O Solicitante respondeu sua pergunta. Para ler o coment&aacute;rio, acesse o sistema.<br><br>
						<a href=\"".Config::SITE."index.php?page=teleconsulta&id=".$ci_teleconsulta."&view=h&type=2\">".Config::SITE."index.php?page=teleconsulta&id=".$ci_teleconsulta."&view=h&type=2</a><br><br>
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
		}
		if($email != "")
			Util::mail(utf8_decode('Teleconsulta respondida'), 'nuteds@ufc.br', 'NUTEDS', $body, $rowEmail['ds_email']);
	
		Controller::setInfo('Teleconsulta', 'Salva com sucesso!');	
		Controller::redirect(Util::setLink());
	}
	else{
		Util::notice('Teleconsulta', 'Ocorreu um erro!', 'error');
	}
}

//Adiquirindo os arquivos da teleconsulta
$sql = 'select ci_file, cd_usuario, nm_file, cd_teleconsulta, tp_tipo, ds_tamanho, to_char(dt_data, \'DD/MM/YYYY\') as dt_data, ds_tamanho
	 from tb_file where cd_teleconsulta='.$ci_teleconsulta;
$queryFiles = query($sql);

$fl_urgencia['t'] = '<font color="red"><b>SIM</b></font>';
$fl_urgencia['f'] = '<font color="green"><b>NÃO</b></font>';

$ci_profissao_solicitante = 0;
$nm_profissao_solicitante = '';
if($row['cd_profissional_solicitante']){
	$rowSolicitante = query('select tpro.ci_profissao, tpro.nm_profissao from tb_profissional tp
	inner join tb_profissao tpro on(tp.cd_profissao=tpro.ci_profissao)
	where tp.ci_profissional = '.$row['cd_profissional_solicitante'])->fetch();
	$ci_profissao_solicitante = $rowSolicitante['ci_profissao'];
	$nm_profissao_solicitante = $rowSolicitante['nm_profissao'];
}

$ci_profissao_especialista = 0;
$nm_profissao_especialista = '';
if($row['cd_profissional_especialista']){
	$rowEspecialista = query('select tpro.ci_profissao, tpro.nm_profissao, tpro.nm_registro, tp.nr_registro from tb_profissional tp
	inner join tb_profissao tpro on(tp.cd_profissao=tpro.ci_profissao)
	where tp.ci_profissional = '.$row['cd_profissional_especialista'])->fetch();
	$ci_profissao_especialista = $rowEspecialista['ci_profissao'];
	$nm_profissao_especialista = $rowEspecialista['nm_profissao'].' '.$rowEspecialista['nm_registro'].'('.$rowEspecialista['nr_registro'].')';
}

?>
<style>
fieldset{ border:1px solid #E0E0E0; margin-bottom:6px; }
legend{ color:#555555; }
@media print
{
	#btVoltar,#btLaudar,#btPrint,#btFile,#btResponder,#formMensagem,#blocoLaudar,.breadcrumb,.header-task { display:none; }	
}
</style>
<div id="container">

	<div class="row bgGrey">
		<img src="assets/teleconsulta.png"/>
		<span class="actionview"><?php echo $teleconsulta->getTipo(); ?></span>			
		<button id="btPrint" onclick="window.print();" class="btn btn-info btn-sm pull-right btn-space"><span class="glyphicon glyphicon-print"></span> Imprimir</button>		
		<?php if($teleconsulta->isAptoLaudo()){ ?>
			<button id="btLaudar" data-toggle="modal" data-target="#modalConfirmLaudar" class="btn btn-info btn-sm pull-right btn-space"><span class="glyphicon glyphicon-hand-up"></span> Laudar</a></button>
		<?php } ?>		
		<button id="btVoltar" onclick="window.location='<?php echo '?page='.(@$_GET['view'] == 'h' ? 'historico' : 'laudar').'&type='.(@$_GET['type'] ? $_GET['type'] : '1'); ?>';" class="btn btn-info btn-sm pull-right"><span class="glyphicon glyphicon-circle-arrow-left"></span> Voltar</button>						
	</div>
	<br>
	<div class="row bgGrey">
		<div class="container">
		<legend>Informações</legend>
			<div class="row">
				<div class="col-md-2 align-right-middle">Código:</div>
				<div class="col-md-4"><?php echo $row['ci_teleconsulta']; ?></div>
				<div class="col-md-2 align-right-middle">Profissional Solicitante:</div>
				<div class="col-md-4"><?php echo $row['nm_profissional_solicitante'].' - '.$nm_profissao_solicitante; ?></div>
			</div>
			<div class="row">
				<div class="col-md-2 align-right-middle">Município:</div>
				<div class="col-md-4"><?php echo $row['ds_localidade']; ?></div>
				<div class="col-md-2 align-right-middle">Profissional Especialista:</div>
				<div class="col-md-4"><?php echo ($row['nm_profissional_especialista'] ? $row['nm_profissional_especialista'].' - '.$nm_profissao_especialista : '...'); ?></div>
			</div>
			<div class="row">
				<div class="col-md-2 align-right-middle">Especialidade:</div>
				<div class="col-md-4"><?php echo $row['nm_especialidade']; ?></div>
				<div class="col-md-2 align-right-middle">Status:</div>
				<div class="col-md-4"><?php echo '<font color="'.Teleconsulta::$statusCor[$row['tp_status']].'"><b>'.Teleconsulta::$status[$row['tp_status']].'</b></font>'; ?></div>
			</div>
			<div class="row">
				<div class="col-md-2 align-right-middle">Paciente:</div>
				<div class="col-md-4"><?php echo ($row['nm_paciente'] ? $row['nm_paciente'] : '--- PACIENTE PADRÃO ---'); ?></div>
				<div class="col-md-2 align-right-middle">Data:</div>
				<div class="col-md-4"><?php echo $row['dt_solicitacao']; ?></div>
			</div>
			<?php if($row['tp_tipo'] == Teleconsulta::TIPO_EXAME){ ?>
				<div class="row">
					<div class="col-md-2 align-right-middle">Urgência:</div>
					<div class="col-md-4"><?php echo $fl_urgencia[$row['fl_urgencia']]; ?></div>				
					
					<?php if($row['tp_status'] == Teleconsulta::STATUS_FINALIZADO && $row['fl_inconclusivo'] == 't'){ ?>
					<div class="col-md-2 align-right-middle"></div>
					<div class="col-md-4"><img src="assets/exame_inconclusivo.png" title="Inconclusivo"/>INCONCLUSIVO</div>
					<?php } ?>
					
				</div>	
			<?php } ?>			
			<?php if(Teleconsulta::TIPO_OPNIAO_FORMATIVA == $row['tp_tipo']){ ?>
				<div class="row">
					<div class="col-md-2 align-right-middle">Categoria CID:</div>
					<div class="col-md-4"><?php echo $row['nm_categoria_cid']; ?></div>
					<div class="col-md-2 align-right-middle">Tipo de Dúvida:</div>
					<div class="col-md-4"><?php echo $row['nm_duvida']; ?></div>				
				</div>
				<div class="row">
					<div class="col-md-2 align-right-middle">Subcategoria CID:</div>
					<div class="col-md-10"><?php echo $row['nm_subcategoria_cid']; ?></div>
				</div>
			<?php } ?>			
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-7">
			<legend>Descrição:</legend>
			<p><?php echo ($row['ds_solicitacao'] ? $row['ds_solicitacao'] : '...'); ?></p>
		</div>
		<div class="col-md-5">
			<legend>Arquivo(s):</legend>
			<?php if($queryFiles->rowCount() < 1){ ?>
				<p>...</p>
			<?php } else { ?>
				<div class="panel-group" id="accordion">				
					<?php while($rowFile = $queryFiles->fetch()){ ?>				
					<div class="panel panel-default">
						<div class="panel-heading">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapseFile<?php echo $rowFile['ci_file']; ?>">
							<h4 class="panel-title" style="font-size:14px;">								
								<?php echo $rowFile['nm_file']; ?>								
							</h4>
							</a>
						</div>
						<div id="collapseFile<?php echo $rowFile['ci_file']; ?>" class="panel-collapse collapse">
							<div class="panel-body">
								<div class="row">
								<div class="col-xs-8">
								<table>
									<tr><td align="right"><b>Tamanho:&nbsp;</b></td><td align="left"><?php echo $rowFile['ds_tamanho']; ?></td></tr>
									<tr><td align="right"><b>Tipo:&nbsp;</b></td><td align="left"><?php echo $rowFile['tp_tipo']; ?></td></tr>
									<tr><td align="right"><b>Data:&nbsp;</b></td><td align="left"><?php echo $rowFile['dt_data']; ?></td></tr>									
								</table>
								</div>
								<div class="col-xs-4">
								<a href="down.php?h=<?php echo Crypt::hash(array('file' => $rowFile['ci_file'])); ?>" class="btn btn-success btn-sm pull-right"><span class="glyphicon glyphicon-download-alt"></span> Download</a>
								</div>
								</div>
								
							</div>
						</div>
					</div>				
					<?php } ?>				
				</div>
			<?php } ?>			
			<?php if($row['tp_tipo'] == Teleconsulta::TIPO_OPNIAO_FORMATIVA && ($teleconsulta->isLaudando() || ($teleconsulta->isOwner() && !$teleconsulta->isStatusFinalizado()))){ ?>
				<a href="javascript:void(0);" id="btFile" data-toggle="modal" data-target="#modalInput" onclick="$('#ds_mensagem_backup').val($('#ds_mensagem').val());" class="btn btn-info btn-sm pull-right"><span class="glyphicon glyphicon-plus"></span> Anexar</a>
			<?php } ?>
		</div>
	</div>
	
	<div class="row"><div id="validateBox" class="col-md-7"></div></div>
	
	<?php 
	//Caso a teleconsulta seja um exame não terá a opção de mostrar as mensagens
	if($row['tp_tipo'] != Teleconsulta::TIPO_EXAME){
	?>
	<div class="row">
		<div class="col-md-7">
			<legend>Mensagens:</legend>
			<?php
			$sqlMensagens = 'select tu.nm_usuario,
				ttr.ds_resposta,
				to_char(ttr.dt_resposta, \'dd/mm/yyyy às HH24:MI\') as dt_resposta 
			from tb_teleconsulta_resposta ttr
			inner join tb_usuario tu on(ttr.cd_profissional=tu.ci_usuario)
			where cd_teleconsulta = '.$ci_teleconsulta;
			$queryMensagens = query($sqlMensagens);
			
			if($queryMensagens->rowCount() < 1){
				echo '...<br>';
			}
			else{
			while($rowMsg = $queryMensagens->fetch()){ 
			?>
				<legend><?php echo $rowMsg['nm_usuario'].' - '.$rowMsg['dt_resposta']; ?></legend>
				<?php echo $rowMsg['ds_resposta']; ?><br/><br/>
			<?php }} ?>
			<br/>
			<?php if($teleconsulta->isOwner() && !$teleconsulta->isStatusFinalizado()){ ?>
				<form method="post" id="formMensagem">
					<textarea class="form-control" name="ds_mensagem" id="ds_mensagem" rows="3"><?php echo @$_POST['ds_mensagem_backup']; ?></textarea>
					<div style="margin-bottom:5px;"></div>
					<input type="hidden" name="mensagem" value="1"/>
					<a href="javascript:void(0);" onclick="testMessage();" class="btn btn-info btn-sm pull-right"><span class="glyphicon glyphicon-ok"></span> Enviar Mensagem</a>					
				</form>
			<?php } ?>			
			
		</div>
	</div>	
	<?php } ?>
	
	<br>
	
	<?php if($teleconsulta->isLaudando()){ ?>
	<div class="row" id="blocoLaudar">
		<div class="col-md-7">
			<legend>Laudar:</legend>			
			<form method="post" id="formResposta" enctype="multipart/form-data">
			<?php if($row['tp_tipo'] == Teleconsulta::TIPO_EXAME){ ?>
				<div class="row">
					<div class="col-md-4 align-right-middle"><label for="fl_inconclusivo">Inconclusivo?:</label></div>
					<div class="col-md-8"><input type="checkbox" id="fl_inconclusivo" name="fl_inconclusivo" value="1" onclick="checkInconclusivo();"/></div>					
				</div>
				<div class="row" id="bloco_arquivo_exame">
					<div class="col-md-4 align-right-middle">Arquivo:</div>
					<div class="col-md-8"><input id="file_upload" type="file" name="file_upload" class="form-control"/></div>
				</div>
				<div class="row" id="bloco_resposta_exame" style="display:none;">
					<div class="col-md-4 align-right-middle">Descrição:</div>
					<div class="col-md-8"><textarea id="ds_resposta" name="ds_resposta" class="form-control"></textarea></div>
				</div>
			<?php } elseif($row['tp_tipo'] == Teleconsulta::TIPO_OPNIAO_FORMATIVA){ 
				$queryOrientacoes = query('select * from tb_orientacao order by 2');							
			?>
				Orientação: *<br>
				<select id="cd_orientacao" name="cd_orientacao" class="form-control">
					<option value="0">...</option>
					<?php
					while($ori = $queryOrientacoes->fetch()){
						echo '<option value="'.$ori['ci_orientacao'].'">'.$ori['nm_orientacao'].'</option>';
					}
					?>
				</select>
				<div style="margin-bottom:10px;"></div>
				Descrição: *<br>
				<textarea class="form-control" name="ds_resposta" id="ds_resposta" rows="3"></textarea>
				<?php if($ci_profissao_solicitante != 2 && $ci_profissao_especialista != 2){ ?>
					<div style="margin-bottom:10px;"></div>
					Medicamentos: <br>
					<textarea class="form-control" name="ds_medicamento" id="ds_medicamento" rows="2"></textarea>
				<?php } ?>				
			<?php } ?>
			<input type="hidden" name="resposta" value="1"/>
			<br>
			<a id="btResponder" href="javascript:void(0);" class="btn btn-info btn-sm pull-right"><span class="glyphicon glyphicon-ok"></span> Finalizar Teleconsulta</a>
			</form>			
		</div>
	</div>
	<?php } ?>
	
	<?php if($teleconsulta->isStatusFinalizado()){ ?>				
	<div class="row">
		<div class="col-md-7">	
			<legend>Resposta</legend>	
			<?php if($row['tp_tipo'] == Teleconsulta::TIPO_EXAME){
				echo ($row['ds_resposta'] ? $row['ds_resposta'] : '...');
			} elseif($row['tp_tipo'] == Teleconsulta::TIPO_OPNIAO_FORMATIVA){ ?>
				<div class="row">
					<div class="col-md-2 align-right-middle">Orientação:</div>
					<div class="col-md-10"><?php echo $row['nm_orientacao']; ?></div>
				</div>
				<div class="row">
					<div class="col-md-2 align-right-middle">Descrição:</div>
					<div class="col-md-10"><?php echo $row['ds_resposta']; ?></div>
				</div>			
				<?php if($ci_profissao_solicitante != 2 && $ci_profissao_especialista != 2){ ?>
				<div class="row">
					<div class="col-md-2 align-right-middle">Medicamentos:</div>
					<div class="col-md-10"><?php echo ($row['ds_medicamento'] ? $row['ds_medicamento'] : '...'); ?></div>
				</div>
				<?php } ?>
			<?php } ?>
		</div>
	</div>
	<?php } ?>
	
	<br/>
</div>

<!-- Modal Upload File -->
<div class="modal fade" id="modalInput" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Selecione o Arquivo</h4>
      </div>
		  <form enctype="multipart/form-data" method="post">
		  <div class="modal-body">
			<br><input id="file_upload" type="file" name="file_upload" size="38" /> 
			<input type="hidden" name="addfile" value="1"/>
			<input type="hidden" name="ds_mensagem_backup" id="ds_mensagem_backup"/>
		  </div>
		  <div class="modal-footer">
			<a href="javascript:void(0);" class="btn btn-default" data-dismiss="modal">Cancelar</a>
			<button class="btn btn-primary">Ok</button>
		  </div>
	  </form>
    </div>
  </div>
</div>
<!-- Fim Modal Upload File -->
<!-- Modal Confirm Message -->
<div id="modalConfirmMessage" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content clearfix">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>        
		<p><br>Tem certeza que deseja enviar esta mensagem?</p>
	  </div>
	  <div class="modal-body pull-right">      
		<button class="btn btn-small btn-default" data-dismiss="modal">Cancelar</button>
		<button class="btn btn-primary" onclick="$('#formMensagem').submit();">OK</button>
	  </div>
	</div>
  </div>
</div>
<!-- Fim Modal Confirm Message -->
<!-- Modal Confirm Resposta -->
<div id="modalConfirmResposta" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content clearfix">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>        
		<br><p><b>A resposta procede?</b><br><br>Clique em ok para confirmar!</p>
	  </div>
	  <div class="modal-body pull-right">      
		<button class="btn btn-small btn-default" data-dismiss="modal">Cancelar</button>
		<button class="btn btn-primary" onclick="$('#formResposta').submit();">OK</button>
	  </div>
	</div>
  </div>
</div>
<!-- Fim Modal Confirm Resposta -->
<!-- Modal Confirm Laudar -->
<div id="modalConfirmLaudar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content clearfix">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>        
		<br><p><b>Tem certeza que deseja realizar o laudo?</b><br><br>Este processo não poderá ser revertido!</p>
	  </div>
	  <div class="modal-body">      
		<div class="row">
			<div class="col-xs-4 col-md-offset-8 col-md-2 col-sm-offset-8 col-sm-2">
				<button class="btn btn-small btn-default" data-dismiss="modal">Cancelar</button>
			</div>
			<div class="col-xs-3 col-md-2 col-sm-2">
				<form id="formLaudar" method="post">
					<input type="hidden" name="laudar" value="1"/>
					<button class="btn btn-primary" >OK</button>
				</form>		
			</div>
		</div>
	  </div>
	</div>
  </div>
</div>
<!-- Fim Modal Confirm Laudar -->

<script type="text/javascript">
<?php if($teleconsulta->isOwner()){ ?>
function testMessage(){
	var valid = true;
	valid = checkLength('ds_mensagem', 'Mensagem', 3) && valid;
	if(valid)
		$("#modalConfirmMessage").modal('show');	
}
<?php } ?>

$(function(){	
	<?php if($teleconsulta->isLaudando() || ($teleconsulta->isOwner() && !$teleconsulta->isStatusFinalizado())){ ?>
	$("#btResponder").click(function(){
		var valid = true;		
		$("#formResposta").find("input,select,textarea").each(function(index){
			$(this).removeClass("ui-state-error");						
		});
		<?php if($row['tp_tipo'] == Teleconsulta::TIPO_EXAME){ ?>
		var fl_inconclusivo = $("input[name='fl_inconclusivo']:checked").val();
		if(fl_inconclusivo){
			if($('#ds_resposta').val().length < 1){
				$('#ds_resposta').addClass("ui-state-error");
				valid = false;	
				updateTips('É necessário informar uma descrição caso seja inconclusivo.');
			}		
		}
		else{		
			if($('#file_upload').val().length < 1){
				$('#file_upload').addClass("ui-state-error");
				valid = false;	
				updateTips('É necessário informar um arquivo para finalizar!');
			}	
		}
		if(valid)
			$("#modalConfirmResposta").modal('show');			
			
		return false;
		<?php } elseif($row['tp_tipo'] == Teleconsulta::TIPO_OPNIAO_FORMATIVA){ ?>		
		if($('#cd_orientacao').val() == 0){
			$('#cd_orientacao').addClass("ui-state-error");
			valid = false;	
			updateTips('Selecione uma Orientação.');
		}		
		valid = checkLength('ds_resposta', 'Descrição', 1) && valid;
		if(valid)
			$("#modalConfirmResposta").modal('show');
		
		return false;
		<?php } ?>
	});
	<?php } ?>
});
function checkInconclusivo(){
	if($('#fl_inconclusivo').is(':checked')){
		$('#bloco_arquivo_exame').hide();
		$('#bloco_resposta_exame').show();			
	}
	else{
		$('#bloco_arquivo_exame').show();
		$('#bloco_resposta_exame').hide();
	}	
}
</script>