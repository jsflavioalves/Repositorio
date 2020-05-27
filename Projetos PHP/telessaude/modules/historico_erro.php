<?php
defined('EXEC') or die();

//VALIDANDO OS POSSÍVEIS ERROS NA VISUALIZAÇÃO DOS HISTÓRICOS DA TELECONSULTA

///Se o usuário não for um profissional é emitida uma mensagem de erro
if(!$auth->isProfissional()){
	Util::info(Config::AUTH_MESSAGE);
	return true;
}

//Carregando classes
Loader::import('br.ufc.nuteds.Teleconsulta');
Loader::import('com.atitudeweb.Crypt');

//Verificando se o usuáro está laudando um exame
/*if(@$_POST['ci_teleconsulta_exame']){	
	$ci_teleconsulta = $_POST['ci_teleconsulta_exame'];
	$fl_inconclusivo = (@$_POST['inconclusivo_'.$ci_teleconsulta] == '1' ? 'true' : 'false');	
	$ds_resposta = (@$_POST['resposta_'.$ci_teleconsulta] ? "'".addslashes($_POST['resposta_'.$ci_teleconsulta])."'" : 'null');	
	$sql = "update tb_teleconsulta set fl_inconclusivo=$fl_inconclusivo, ds_resposta=$ds_resposta, dt_resposta=now(), tp_status=".Teleconsulta::STATUS_FINALIZADO." where ci_teleconsulta=$ci_teleconsulta";
	if(execute($sql)){	
		//Verificando se há arquivo para adicionar
		if(@$_FILES['fileexame_'.$ci_teleconsulta]){
			$rowDados = query("select tp.nm_paciente, tl.ds_localidade || '_' || tl.sg_estado as ds_localidade
			from tb_teleconsulta tt
			inner join tb_paciente tp on(tt.cd_paciente=tp.ci_paciente)
			inner join tb_localidade tl on(tt.cd_localidade=tl.ci_localidade)
			where ci_teleconsulta = $ci_teleconsulta")->fetch();
			$file = new File();
			$file->uploadExameHistorico($ci_teleconsulta, $user, $rowDados['nm_paciente'], $rowDados['ds_localidade']);
		}
		Controller::setInfo('Teleconsulta', 'Salva com sucesso!');	
		Controller::redirect(Util::setLink());
	}
	else{
		Util::notice('Teleconsultoria', 'Ocorreu um erro!', 'error');
	}
}*/

//Consultando os tipos de teleconsulta que este usuário já realizou
$sqlTipos = 'select tp_tipo, count(*) as num
from tb_teleconsulta
where (cd_profissional_solicitante = '.$user['ci_usuario'].' or cd_profissional_especialista = '.$user['ci_usuario'].')
group by tp_tipo
order by 1 desc';
$queryTipos = query($sqlTipos)->fetchAll();

//Realizando a escolha do tipo default de pesquisa - Opinião Formativa
//Porém se o usuário tiver somente exame o tipo default será exame
if(count($queryTipos) > 0 && $queryTipos[0]['tp_tipo'] == Teleconsulta::TIPO_EXAME){
	$type = Teleconsulta::TIPO_EXAME;
}
else{
	$type = (@$_GET['type'] ? $_GET['type'] : Teleconsulta::TIPO_OPNIAO_FORMATIVA);
}

//Consultando as especialidades que este usuário já realizou
$sqlEspecialidades = 'select ci_especialidade, nm_especialidade from tb_especialidade
where ci_especialidade in(select distinct cd_especialidade
from tb_teleconsulta where cd_profissional_solicitante = '.$user['ci_usuario'].' or cd_profissional_especialista = '.$user['ci_usuario'].')
order by 2';
$queryEspecialidades = query($sqlEspecialidades);

//Realizando consulta de todas as teleconsultas realizadas por este usuário
$where = '';
if(@$_POST['search2']){
	$term = $_POST['search2'];
	$where .=  "and tt.cd_especialidade = $term ";
}
if(@$_POST['search3']){
	$term = $_POST['search3'];
	$where .=  "and tt.tp_status = $term ";
}
if(@$_POST['search4']){
	$term = addslashes($_POST['search4']);
	$where .=  "and to_char(tt.dt_solicitacao, 'dd/mm/yyyy') = '$term' ";
}
$sql = "select 	tt.ci_teleconsulta, 
tt.cd_profissional_solicitante,
tt.cd_profissional_especialista,
tt.tp_tipo,
tl.sg_estado || ' - ' || tl.ds_localidade as ds_localidade,
te.nm_especialidade,
tp.nm_paciente,
tt.tp_status, 
tt.fl_urgencia,
tt.fl_inconclusivo,
to_char(tt.dt_solicitacao, 'dd/mm/yyyy às HH24:MI') as dt_solicitacao
from tb_teleconsulta tt
inner join tb_localidade tl on(tt.cd_localidade=tl.ci_localidade)
inner join tb_especialidade te on(tt.cd_especialidade=te.ci_especialidade)
left join tb_paciente tp on(tt.cd_paciente=tp.ci_paciente)
where tt.tp_tipo = $type and (tt.cd_profissional_solicitante = ".$user['ci_usuario']." 
or cd_profissional_especialista = ".$user['ci_usuario'].") $where
order by tt.tp_status asc, tt.fl_urgencia desc, tt.ci_teleconsulta asc
limit {$limitPagina} offset ".(($p - 1) * $limitPagina);
$sqlNum = "select count(*) as num 
from tb_teleconsulta tt
inner join tb_localidade tl on(tt.cd_localidade=tl.ci_localidade)
inner join tb_especialidade te on(tt.cd_especialidade=te.ci_especialidade)
left join tb_paciente tp on(tt.cd_paciente=tp.ci_paciente)
where tt.tp_tipo = $type and (tt.cd_profissional_solicitante = ".$user['ci_usuario']." 
or tt.cd_profissional_especialista = ".$user['ci_usuario'].") $where";	
$queryNum = @query($sqlNum);
$rowNum = $queryNum->fetch();
$registros = $rowNum['num'];
$query = @query($sql);
$paginacao = Util::pagination($registros, 4);

?>
    
	<div class="row bgGrey">
		<img src="assets/historico.png"/>
		<span class="actiontitle">Histórico</span>
		<span class="actionview"> - Pesquisa</span>
	</div>
	
    <!-- NOME DO MÓDULO E FORMULÁRIO DE PESQUISA -->
    <form id="formPesquisa" method="post">

	<div class="row">
		<div class="col-lg-10 col-lg-offset-1">	
			<div class="panel panel-default">
				<div class="panel-body">					
					<div class="bs-example">
						<ul class="nav nav-pills">
							<?php
							for($i=0;$i<count($queryTipos);$i++){
								$row = $queryTipos[$i];					
								echo '<li '.($type == $row['tp_tipo'] ? 'class="active"' : '').'>
								<a href="index.php?page=historico&type='.$row['tp_tipo'].'">'.Teleconsulta::$tipos[$row['tp_tipo']].' ('.$row['num'].')</a>
								</li>';					
							}					
							?>				
						</ul>			    
					</div>					
					<div class="row">
						<div class="col-lg-10 col-lg-offset-1">
							<div class="col-sm-6">
								<label>CNS:</label>
								<div class="input-group">
								<input type="tel" id="search2" name="search2" value="<?php echo @$rowEdit['search2']; ?>" placeholder="Número do CNS" maxlength="15" class="form-control input-mask-numbers"/>
								<span class="input-group-addon" data-toggle="modal" data-target="#modalCNS"><a href="#"><span class="glyphicon glyphicon-question-sign"></span></a></span>
								</div>
							</div>
							<div class="col-sm-4">
								<label>Status:</label>
								<select id="search3" name="search3" class="form-control">
									<option value="0">...</option>
									<?php
									foreach(Teleconsulta::$status as $key=>$value){
										if(@$_POST['search3'] == $key)
											echo '<option value="'.$key.'" style="color:'.Teleconsulta::$statusCor[$key].'; font-weight:bold;" selected="selected">'.$value.'</option>';
										else
											echo '<option value="'.$key.'" style="color:'.Teleconsulta::$statusCor[$key].'; font-weight:bold;">'.$value.'</option>';
									}
									?>	
								</select>					
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-10 col-lg-offset-1">
							<div class="col-sm-6">
								<label>Especialidade:</label>
								<select id="search2" name="search2" class="form-control">
								<option value="0">...</option>
								<?php
								while($row = $queryEspecialidades->fetch()){
									if(@$_POST['search2'] == $row['ci_especialidade'])
										echo '<option value="'.$row['ci_especialidade'].'" selected="selected">'.$row['nm_especialidade'].'</option>';
									else
										echo '<option value="'.$row['ci_especialidade'].'">'.$row['nm_especialidade'].'</option>';
								}
								?>
								</select>
							</div>
							<div class="col-sm-4">
								<label>Data:</label>
								<div class="input-group date">
								  <input id="search4" name="search4" type="tel" value="<?php echo @$_POST['search4']; ?>" class="form-control input-mask-date"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
								</div>
							</div>
							<div class="col-xs-2 text-center">
								<br>
								<button type="submit" id="btAdd" class="btn btn-info btMarginTop"><span class="glyphicon glyphicon-zoom-in"></span> Pesquisar</button>
							</div>
						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>
	
	</form>

	<!-- LISTAGEM DOS REGISTROS -->	
	<?php if($type == Teleconsulta::TIPO_EXAME){ ?>
		<!-- EXAME -->
		<?php
		$fl_urgencia['t'] = '<font color="red"><b>SIM</b></font>';
		$fl_urgencia['f'] = '<font color="green"><b>NÃO</b></font>';
		while($row = $query->fetch()){
			$teleconsulta = new Teleconsulta($row, $user, $auth);
		
			$strInconclusivo = '';
			if($row['tp_status'] == Teleconsulta::STATUS_FINALIZADO && $row['fl_inconclusivo'] == 't'){
				$strInconclusivo = ' <img src="assets/exame_inconclusivo.png" title="Inconclusivo"/>';				
			}
			
			echo '<legend>Exame, Cód. '.$row['ci_teleconsulta'].'</legend>				
			<div class="container">
			<div class="row">				
				<div class="col-md-10 col-md-offset-1">
					<div class="row">
						<div class="col-md-2 align-right-middle">Paciente:</div>
						<div class="col-md-4">'.$row['nm_paciente'].'</div>
						<div class="col-md-2 align-right-middle">Status:</div>
						<div class="col-md-4"><b><font color="'.Teleconsulta::$statusCor[$row['tp_status']].'">'.Teleconsulta::$status[$row['tp_status']].'</font></b>'.$strInconclusivo.'</div>
					</div>
					<div class="row">
						<div class="col-md-2 align-right-middle">Município:</div>
						<div class="col-md-4">'.$row['ds_localidade'].'</div>
						<div class="col-md-2 align-right-middle">Urgência:</div>
						<div class="col-md-4">'.$fl_urgencia[$row['fl_urgencia']].'</div>
					</div>
					<div class="row">
						<div class="col-md-2 align-right-middle">Especialidade:</div>
						<div class="col-md-4">'.$row['nm_especialidade'].'</div>
						<div class="col-md-2 align-right-middle">Data:</div>
						<div class="col-md-4">'.$row['dt_solicitacao'].'</div>
					</div>
					<br>
					<div class="row text-center">
					<a href="javascript:void(0);" onclick="window.location=\'index.php?page=teleconsulta&id='.$row['ci_teleconsulta'].'&view=h&type=1\';" title="Mais informações" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-plus-sign"></span> Mais Informações</a>
					</div>
				</div>				
			</div>
			</div>';
				
			if($teleconsulta->isStatusFinalizado() && $row['fl_inconclusivo'] != 't' && $user['ci_usuario'] == $row['cd_profissional_solicitante']){
				$rowFile = query('select * from tb_file where cd_teleconsulta = '.$row['ci_teleconsulta'].' order by 1 desc limit 1')->fetch();
				echo '<table border="0" cellpadding="2" cellspacing="2" align="center">
				<tr><td>
				<ul class="arquivos">
				<li>				
					<a href="down.php?h='.Crypt::hash(array('file' => $rowFile['ci_file'])).'">
						<div class="info">
							<table border="0">
								<tr><td align="right"><b>Tamanho:</b></td><td align="left">'.$rowFile['ds_tamanho'].'</td></tr>
								<tr><td align="right"><b>Tipo:</b></td><td align="left">'.$rowFile['tp_tipo'].'</td></tr>
								<tr><td align="right"><b>Data:</b></td><td align="left">'.$rowFile['dt_data'].'</td></tr>
								<tr><td align="right"><b>Versão:</b></td><td align="left">'.$rowFile['nr_versao'].'</td></tr>										
							</table>						
						</div>					
						'.$rowFile['nm_file'].'
					</a>
				</li></ul></td></tr></table>';
			}
			echo '</fieldset></td></tr>';
		}
		?>        		      
		<!-- FIM EXAME -->
	
	<?php } elseif(@$type == Teleconsulta::TIPO_OPNIAO_FORMATIVA){ ?>
	
		<!-- OPINIÃO FORMATIVA -->
		<?php if($query->rowCount() < 1){ ?>
		
		<div class="alert alert-info col-lg-10 col-lg-offset-1">
			<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
			<p>Nenhum histórico encontrado.</p>
		</div>
		
		<?php } else { ?>
	
		<div class="row">
			<div class="table-responsive">
				<table class="table table-hover table-bordered">
					<thead>
						<tr class="btn-info">
							<th class="text-center">Cód.</th>
							<th class="text-center">Município</th>
							<th class="text-center">Especialidade</th>
							<th class="text-center">Paciente</th>
							<th class="text-center">Status</th>
							<th class="text-center">Data</th>	
							<th class="text-center"></th>						
						</tr>
					</thead>
					<tbody>
						<?php
						while($row = $query->fetch()){
						?>
						<tr>
							<td><?php echo $row['ci_teleconsulta']; ?></td>
							<td><?php echo $row['ds_localidade']; ?></td>
							<td><?php echo $row['nm_especialidade']; ?></td>
							<td><?php echo ($row['nm_paciente'] ? $row['nm_paciente'] : '--- PACIENTE PADRÃO ---'); ?></td>
							<td><?php echo '<font color="'.Teleconsulta::$statusCor[$row['tp_status']].'"><b>'.Teleconsulta::$status[$row['tp_status']].'</b></font>'; ?></td>
							<td><?php echo $row['dt_solicitacao']; ?></td>
							<td class="text-center">
								<a href="javascript:void(0);" onclick="window.location='index.php?page=teleconsulta&id=<?php echo $row['ci_teleconsulta']; ?>&view=h&type=2';">
									<span class="glyphicon glyphicon-plus-sign btMore"></span>
								</a>
							</td>
						</tr>
						<?php
						}
						?>
					</tbody>
				</table>
			</div>
		</div>	
		<!-- FIM OPINIÃO FORMATIVA -->
		
		<?php } ?>
		
	<?php } ?>
	
	<?php echo $paginacao; ?>
	
	
<div id="modalCNS" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Cadastro Nacional do SUS</h4>
			</div>
			<br>
			<img src="assets/cns_exemplo.jpg" alt="" class="img-responsive img-rounded marginCenter">      
			<br>
		</div>
	</div>
</div>