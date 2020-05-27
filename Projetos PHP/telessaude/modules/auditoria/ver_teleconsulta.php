<?php
defined('EXEC') or die();

$transacao = 'auditoria_teleconsulta';

if(!$auth->isRead($transacao) && !$auth->isAdmin()){
	Util::info(Config::AUTH_MESSAGE);
	return true;
}

Controller::addHead('bootstrap-combobox');
Controller::addHead('bootstrap-combobox', 'css');

//VALIDANDO OS POSSÍVEIS ERROS NA VISUALIZAÇÃO DA TELECONSULTA

if(@!$_GET['id']){
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
tci.nr_ciap,
tci.nm_ciap,
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
left join tb_ciap tci on(tt.cd_ciap=tci.ci_ciap)
left join tb_duvida td on(tt.cd_duvida=td.ci_duvida)
left join tb_orientacao tor on(tt.cd_orientacao=tor.ci_orientacao)
where tt.ci_teleconsulta = $ci_teleconsulta";
$row = query($sql)->fetch();
$teleconsulta = new Teleconsulta($row, $user, $auth);

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
	$rowEspecialista = query('select tpro.ci_profissao, tpro.nm_profissao from tb_profissional tp
	inner join tb_profissao tpro on(tp.cd_profissao=tpro.ci_profissao)
	where tp.ci_profissional = '.$row['cd_profissional_especialista'])->fetch();
	$ci_profissao_especialista = $rowEspecialista['ci_profissao'];
	$nm_profissao_especialista = $rowEspecialista['nm_profissao'];
}

//Permite ao médico a troca de especialidades das teleconsultas antes do laudo
$medico_regulador1 = false;
if($auth->isOn('medico_regulador_-_troca_especialidades') && $teleconsulta->isAptoLaudo()){
	$medico_regulador1 = true;
	$sql = 'select 
		ci_especialidade, 
		nm_especialidade 
	from tb_especialidade 
	order by 2 asc';
	$queryEspecialidades = query($sql);	
}

//Testando para verificar se o profissional está laudando e se é opnião formativa
$isSelectCIDCIAP = false;
if($teleconsulta->isLaudando() && $row['tp_tipo'] == Teleconsulta::TIPO_OPNIAO_FORMATIVA){
	$isSelectCIDCIAP = true;

	//Consultando as categorias
	$queryCategorias = Connection::query('select * from tb_categoria_cid order by 3');

	//Consultando os ciaps
	$queryCiaps = Connection::query('select * from tb_ciap order by 2 asc');

}
//onclick="window.location='index.php?page=auditoria/teleconsultas';"
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
		<span class="actiontitle">Teleconsultoria</span>
		<span class="actionview"> - <?php echo $teleconsulta->getTipo(); ?></span>			
		<button id="btVoltar" onclick="window.location='index.php?page=auditoria/teleconsultas';" class="btn btn-info btn-sm pull-right"><span class="glyphicon glyphicon-circle-arrow-left"></span> Voltar</button>						
	</div>
	
	<br>
	 
	<div class="row bgGrey">
		<div class="container">
		<legend>Informações</legend>
			<div class="row">
				<div class="col-md-2 align-right-middle">Código:</div>
				<div class="col-md-4"><b><?php echo $row['ci_teleconsulta']; ?></b></div>
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
				<div class="col-md-4">					
				<?php 
					if($medico_regulador1){
						echo '<form method="post">
						<select id="cd_especialidade_medico_regulador" name="cd_especialidade_medico_regulador" class="form-control">';
						while($rowTemp = $queryEspecialidades->fetch()){
							if($row['cd_especialidade'] == $rowTemp['ci_especialidade'])
								echo '<option value="'.$rowTemp['ci_especialidade'].'" selected="selected">'.$rowTemp['nm_especialidade'].'</option>';
							else
								echo '<option value="'.$rowTemp['ci_especialidade'].'">'.$rowTemp['nm_especialidade'].'</option>';
						}
						echo '</select>
						<input type="hidden" name="medico_regulador1" value="1"/>
						<input type="submit" class="btn btn-info" value="Editar"/>
						</form>';
					}
					else{
						echo $row['nm_especialidade']; 
					}	
				?>
				</div>
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
				
				<?php if($isSelectCIDCIAP){  ?>
				
					<div class="row">
						<div class="col-md-2 align-right-middle"></div>
						<div class="col-md-4"><?php echo Util::alert('Informe CID e CIAP na <u>FINALIZAÇÃO</u> da teleconsultoria'); ?></div>										
					</div>
					<div class="row">
						<div class="col-md-2 align-right-middle">Categoria CID:</div>
						<div class="col-md-4">
							
							<div id="boxCategoriaCid" class="form-group">
								<select id="cd_categoria_cid" name="cd_categoria_cid" onchange="atualizaSubcategoria();" class="combobox input-large form-control">
									<option value="" selected="selected">SELECIONE CATEGORIA CID...</option>									
									<?php
									while($row_cid = $queryCategorias->fetch()){
										echo '<option value="'.$row_cid['ci_categoria_cid'].'">'.$row_cid['nm_categoria_cid'].'</option>';						
									}
									?>								  
								</select>
							</div>
							
							<?php
							/*<select id="cd_categoria_cid" name="cd_categoria_cid" onchange="atualizaSubcategoria();" class="form-control">
								<option value="0">SELECIONE...</option>
								<?php
								while($row_cid = $queryCategorias->fetch()){
									echo '<option value="'.$row_cid['ci_categoria_cid'].'">'.$row_cid['nm_categoria_cid'].'</option>';						
								}
								?>
							</select>*/
							?>
						</div>
						<div class="col-md-2 align-right-middle">Tipo de Dúvida:</div>
						<div class="col-md-4"><?php echo $row['nm_duvida']; ?></div>				
					</div>
					<div class="row">
						<div class="col-md-2 align-right-middle">Subcategoria CID:</div>
						<div class="col-md-4">						
							<div id="cd_subcategoria_cid_box">
								<select id="cd_subcategoria_cid" name="cd_subcategoria_cid" class="form-control">
									<option value="0">SELECIONE...</option>					
								</select>
							</div>
						</div>
					</div>
					<!--<div class="row">
						<div class="col-md-2 align-right-middle">CIAP:</div>
						<div class="col-md-4">						
							<div id="cd_subcategoria_cid_box">
								<select id="cd_ciap" name="cd_ciap" class="form-control">
									<option value="0">SELECIONE...</option>	
									<?php
									//while($row_ciap = $queryCiaps->fetch()){
									//	echo '<option value="'.$row_ciap['ci_ciap'].'">'.$row_ciap['nr_ciap'].' - '.$row_ciap['nm_ciap'].'</option>';						
									//}
									?>
								</select>
							</div>
						</div>
					</div>-->
				
				<?php } else{ ?>
				
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
					<div class="row">
						<div class="col-md-2 align-right-middle">CIAP:</div>
						<div class="col-md-4"><?php echo $row['nr_ciap'].' - '.$row['nm_ciap']; ?></div>
					</div>
				
				<?php } ?>			
				
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
					<a href="javascript:void(0);" onclick="testMessage();" class="btn btn-info btn-sm pull-right"><span class="glyphicon glyphicon-envelope"></span> Enviar Mensagem</a>					
				</form>
			<?php } ?>			
			
		</div>
	</div>	
	<?php } ?>
	
	<br>
	
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


<script type="text/javascript">

$(function(){	

	$('.combobox').combobox();
	

});
</script>