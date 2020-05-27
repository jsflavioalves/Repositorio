<?php
defined('EXEC') or die();

$limitPagina = 5;

//VALIDANDO OS POSSÍVEIS ERROS NA VISUALIZAÇÃO DO LAUDO DA TELECONSULTA

///Se o usuário não for um profissional é emitida uma mensagem de erro
if(!$auth->isProfissional()){
	Util::info(Config::AUTH_MESSAGE);
	return true;
}

//Se o usuário não for vinculado a alguma transação de especialista é emitida uma mensagem de erro
//Transações de solicitação de exame e segunda opnião formativa
if(!$auth->isOn('especialista_exame') && !$auth->isOn('especialista_2_op_form')){
	Util::info(Config::AUTH_MESSAGE);
	return true;
}

//Carregando classes
Loader::import('br.ufc.nuteds.Teleconsulta');
Loader::import('br.ufc.nuteds.File');
Loader::import('com.atitudeweb.Crypt');

//Verificando se o especialista está laudando a teleconsulta do tipo exame
if(@$_POST['teleconsulta_exame_laudo']){	
	$ci_teleconsulta = $_POST['teleconsulta_exame_laudo'];
	if(@!$_FILES['file_upload_'.$ci_teleconsulta]['tmp_name']){
		Util::notice('Teleconsultoria '.$ci_teleconsulta, 'Arquivo não informado!', 'error');
	}
	else{
		$sql = "update tb_teleconsulta set cd_profissional_especialista=".$user['ci_usuario'].", dt_resposta=now(), tp_status=".Teleconsulta::STATUS_FINALIZADO." where ci_teleconsulta=$ci_teleconsulta";
		if(execute($sql)){	
			//Adicionando arquivos
			$rowDados = query("select tp.nm_paciente, tl.ds_localidade || '_' || tl.sg_estado as ds_localidade
			from tb_teleconsulta tt
			inner join tb_paciente tp on(tt.cd_paciente=tp.ci_paciente)
			inner join tb_localidade tl on(tt.cd_localidade=tl.ci_localidade)
			where ci_teleconsulta = $ci_teleconsulta")->fetch();
			$file = new File();
			$file->uploadExameHistorico($ci_teleconsulta, $user, $rowDados['nm_paciente'], $rowDados['ds_localidade']);
			Controller::setInfo('Teleconsultoria '.$ci_teleconsulta, 'Salva com sucesso!');	
			Controller::redirect(Util::setLink());
		}
		else{
			Util::notice('Teleconsultoria '.$ci_teleconsulta, 'Ocorreu um erro!', 'error');
		}
	}
}

//REALIZANDO CONSULTA DAS TELECONSULTAS DISPONÍVEIS PARA ESTE USUÁRIO LAUDAR
//VERIFICANDO ATRAVÉS DE SEUS VÍNCULOS

//Selecionando somente as teleconsultas com o status aguardando
//e que não foram solicitadas por este usuário
$where = 'where tt.cd_profissional_solicitante != '.$user['ci_usuario'].' and tp_status = '.Teleconsulta::STATUS_AGUARDANDO.' ';

//Verificando as especialidades 
$sqlEspecialidades = 'select cd_especialidade from tb_profissional_especialidade where cd_profissional = '.$user['ci_usuario'];
$queryEspecialidades = query($sqlEspecialidades);
if($queryEspecialidades->rowCount() < 1){
	Util::info('Não foi encontrada nenhuma especialidade vinculada!');
	return true;
}
while($row = $queryEspecialidades->fetch()){
	$especialidade[] = $row['cd_especialidade'];
}
if(@$_POST['search2']){
	$term = $_POST['search2'];
	$where .=  "and tt.cd_especialidade = $term ";
}
else{
	$where .= 'and tt.cd_especialidade in('.implode(',', $especialidade).') ';
}

//Verificando o tipo
if($auth->isOn('especialista_exame')){
	$tipo[] = Teleconsulta::TIPO_EXAME;
	$tiposSelect[Teleconsulta::TIPO_EXAME]['label'] = Teleconsulta::$tipos[Teleconsulta::TIPO_EXAME];
	
	//Consultando a quantidade de exames
	$sqlNum = 'select count(*) as num 
	from tb_teleconsulta tt 
	where tt.cd_profissional_solicitante != '.$user['ci_usuario'].' 
	and tt.tp_status = '.Teleconsulta::STATUS_AGUARDANDO.' 
	and tt.tp_tipo = '.Teleconsulta::TIPO_EXAME.' and tt.cd_especialidade in('.implode(',', $especialidade).')';
	$queryNum = query($sqlNum)->fetch();
	
	$tiposSelect[Teleconsulta::TIPO_EXAME]['num'] = $queryNum['num'];
} 
if($auth->isOn('especialista_2_op_form')){
	$tipo[] = Teleconsulta::TIPO_OPNIAO_FORMATIVA;
	$tiposSelect[Teleconsulta::TIPO_OPNIAO_FORMATIVA]['label'] = Teleconsulta::$tipos[Teleconsulta::TIPO_OPNIAO_FORMATIVA];
	
	//Consultando a quantidade de opinião formativas
	$sqlNum = 'select count(*) as num 
	from tb_teleconsulta tt 
	where tt.cd_profissional_solicitante != '.$user['ci_usuario'].' 
	and tt.tp_status = '.Teleconsulta::STATUS_AGUARDANDO.' 
	and tt.tp_tipo = '.Teleconsulta::TIPO_OPNIAO_FORMATIVA.' and tt.cd_especialidade in('.implode(',', $especialidade).')';
	$queryNum = query($sqlNum)->fetch();	
	
	$tiposSelect[Teleconsulta::TIPO_OPNIAO_FORMATIVA]['num'] = $queryNum['num'];
}
if(@$_POST['search1']){
	$term = addslashes($_POST['search1']);
	$where .=  "and tt.tp_tipo = $term ";
}
else{
	if(@$_GET['type'] && @!$_POST['search1']){
		if(@$tiposSelect[$_GET['type']])		
			$_POST['search1'] = $_GET['type'];
	}
			
	if(@!$_POST['search1'])
		$_POST['search1'] = $tipo[0];

	$where .= 'and tt.tp_tipo = '.$_POST['search1'].' ';;
}

//Consultando as especialidades relacionadas
$sqlEspecialidades = 'select te.ci_especialidade, te.nm_especialidade 
from tb_profissional_especialidade tpe
inner join tb_especialidade te on(tpe.cd_especialidade=te.ci_especialidade) 
where tpe.cd_profissional = '.$user['ci_usuario'].' order by 2';
$queryEspecialidades = query($sqlEspecialidades);


//Consultando os municípios relacionados
$sqlMunicipios = "select tl.ci_localidade, tl.ds_localidade, tl.sg_estado
from tb_teleconsulta tt
inner join tb_localidade tl on(tt.cd_localidade=tl.ci_localidade)
inner join tb_especialidade te on(tt.cd_especialidade=te.ci_especialidade)
left join tb_paciente tp on(tt.cd_paciente=tp.ci_paciente)
$where
group by 1,2,3
order by 1 asc";
$queryMunicipios = query($sqlMunicipios);


//Verificando a pesquisa para o nome do paciente
if(@$_POST['search3']){
	$term = "'%".addslashes($_POST['search3'])."%'";
	$where .=  "and tp.nm_paciente ilike $term ";
}

//Verificando a pesquisa para o município
if(@$_POST['search4']){
	$term = addslashes($_POST['search4']);
	$where .=  "and tt.cd_localidade = $term ";
}

//Recuperando o sql
$sql = "select 	tt.ci_teleconsulta,
tt.cd_profissional_solicitante,
tt.cd_profissional_especialista,
tt.tp_tipo,
tl.sg_estado || ' - ' || tl.ds_localidade as ds_localidade,
tt.cd_especialidade,
te.nm_especialidade,
tp.nm_paciente,
tt.tp_status, 
tt.fl_urgencia,
to_char(tt.dt_solicitacao, 'dd/mm/yyyy às HH24:MI') as dt_solicitacao
from tb_teleconsulta tt
inner join tb_localidade tl on(tt.cd_localidade=tl.ci_localidade)
inner join tb_especialidade te on(tt.cd_especialidade=te.ci_especialidade)
left join tb_paciente tp on(tt.cd_paciente=tp.ci_paciente)
$where
order by tt.fl_urgencia desc, tt.ci_teleconsulta asc
limit {$limitPagina} offset ".(($p - 1) * $limitPagina);
$sqlNum = "select count(*) as num 
from tb_teleconsulta tt
inner join tb_localidade tl on(tt.cd_localidade=tl.ci_localidade)
inner join tb_especialidade te on(tt.cd_especialidade=te.ci_especialidade)
left join tb_paciente tp on(tt.cd_paciente=tp.ci_paciente)
$where";

$queryNum = query($sqlNum);
$rowNum = $queryNum->fetch();
$registros = $rowNum['num'];
$query = query($sql);
$paginacao = Util::pagination1($registros, 4, 5);

$type = Teleconsulta::TIPO_OPNIAO_FORMATIVA;
$sqlAnalise = "select 	tt.ci_teleconsulta,
tt.cd_profissional_solicitante,
tt.cd_profissional_especialista,
tt.tp_tipo,
tl.sg_estado || ' - ' || tl.ds_localidade as ds_localidade,
tt.cd_especialidade,
te.nm_especialidade,
tp.nm_paciente,
tt.tp_status, 
tt.fl_urgencia,
to_char(tt.dt_solicitacao, 'dd/mm/yyyy às HH24:MI') as dt_solicitacao
from tb_teleconsulta tt
inner join tb_localidade tl on(tt.cd_localidade=tl.ci_localidade)
inner join tb_especialidade te on(tt.cd_especialidade=te.ci_especialidade)
left join tb_paciente tp on(tt.cd_paciente=tp.ci_paciente)
where tt.tp_tipo = $type 
  and (tt.cd_profissional_solicitante = ".$user['ci_usuario']." or cd_profissional_especialista = ".$user['ci_usuario'].") 
  and tt.tp_status = ".Teleconsulta::STATUS_EM_ANALISE."
order by tt.fl_urgencia desc, tt.ci_teleconsulta asc";
$queryAnalise = query($sqlAnalise);

$queryAnaliseNum = $queryAnalise->rowCount();
if($queryAnaliseNum > 1){
	$descrRows = $queryAnaliseNum." registros encontrados";
}
else{
	$descrRows = $queryAnaliseNum." registro encontrado";
}



?>

	
	<legend>Laudar</legend>
	
    <!-- NOME DO MÓDULO E FORMULÁRIO DE PESQUISA -->
    <form id="formPesquisa" action="<?php echo Util::setLink(array('p=null')); ?>" method="post">

	<div class="row" style="font-size:12px;">
		<div class="col-lg-12">	
			<div class="panel panel-default">
				<div class="panel-body">					
					<div class="bs-example">
						<ul class="nav nav-pills">
							<?php
							foreach($tiposSelect as $key=>$value){
								echo '<li '.(@$_POST['search1'] == $key ? 'class="active"' : '').'>
								<a href="javascript:void(0)" onclick="pesquisar('.$key.')">'.$value['label'].' ('.$value['num'].')</a>
								</li>';							
							}
							?>				
						</ul>
						<input type="hidden" id="formPesquisaType" name="search1" value="<?php echo @$_POST['search1']; ?>"/>
					</div>
					<br>
					<div class="row">
						<div class="col-lg-12">						
							<div class="col-sm-3">
								<label>Paciente:</label><input type="text" class="form-control" id="search3" name="search3" placeholder="Nome do Paciente" value="<?php echo @$_POST['search3']; ?>">
							</div>
							<div class="col-sm-3">
								<label>Município:</label>
								<select id="search4" name="search4" class="form-control">
								<option value="0">...</option>
								<?php
								while($row = $queryMunicipios->fetch()){
									if(@$_POST['search4'] == $row['ci_localidade'])
										echo '<option value="'.$row['ci_localidade'].'" selected="selected">'.$row['sg_estado'].' - '.$row['ds_localidade'].'</option>';
									else
										echo '<option value="'.$row['ci_localidade'].'">'.$row['sg_estado'].' - '.$row['ds_localidade'].'</option>';
								}								
								?>
								</select>
							</div>							
							<div class="col-sm-3">
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
							<div class="col-sm-3">
								<br/>
								<button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-zoom-in"></span> Pesquisar</button>
							</div>
						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>

	</form>


	<!-- LISTAGEM DOS REGISTROS -->
	<?php if(@$_POST['search1'] == Teleconsulta::TIPO_EXAME){ 
	
		if($registros < 1){
			Util::alert('Nenhum exame encontrado!');
		}
		else{

			$linkDown = 'downtarexame.php?h=' . Crypt::hash(array('id' => $user['ci_usuario']));
			
	?>		
			
			<button onclick="window.open('<?php echo $linkDown; ?>','_blank'); $(this).prop('disabled', true);" class="btn btn-success btn-sm pull-right"><span class="glyphicon glyphicon-download-alt"></span> Baixar exames</button>
			<br><br>
	
			<form id="formLaudo" method="post" enctype="multipart/form-data">
			<?php
			$fl_urgencia['t'] = '<font color="red"><b>SIM</b></font>';
			$fl_urgencia['f'] = '<font color="green"><b>NÃO</b></font>';
			while($row = $query->fetch()){
				$teleconsulta = new Teleconsulta($row, $user, $auth);			
				$rowFile = query('select ci_file, nm_file, tp_tipo, ds_tamanho, ds_tamanho from tb_file where cd_teleconsulta = '.$row['ci_teleconsulta'].' limit 1')->fetch();
			?>
			
			<legend>Exame, Cód. <?php echo $row['ci_teleconsulta']; ?></legend>
			

			<div class="row">				
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-2 align-right-middle">Paciente:</div>
						<div class="col-md-4"><?php echo $row['nm_paciente']; ?></div>
						<div class="col-md-1 align-right-middle">Urgência:</div>
						<div class="col-md-5"><?php echo $fl_urgencia[$row['fl_urgencia']]; ?></div>
					</div>
					<div class="row">
						<div class="col-md-2 align-right-middle">Município:</div>
						<div class="col-md-4"><?php echo $row['ds_localidade']; ?></div>
						<div class="col-md-1 align-right-middle">Data:</div>
						<div class="col-md-5"><?php echo $row['dt_solicitacao']; ?></div>
					</div>
					<div class="row">
						<div class="col-md-2 align-right-middle">Especialidade:</div>
						<div class="col-md-4"><?php echo $row['nm_especialidade']; ?></div>						
						<div class="col-md-1 align-right-middle">Laudar:</div>
						<div class="col-md-5">
							<div class="row">
								<div class="col-md-11">
									<input id="file_upload_<?php echo $row['ci_teleconsulta']; ?>" type="file" name="file_upload_<?php echo $row['ci_teleconsulta']; ?>" class="form-control"/>
								</div>
								<div class="col-md-1">
									<a id="btResponder_<?php echo $row['ci_teleconsulta']; ?>" href="javascript:void(0);" title="Laudar" class="btn btn-success btn-sm pull-right btResponder"><span class="glyphicon glyphicon-ok"></span></a>
								</div>
							</div>
						</div>
					</div>					
				</div>				
			</div>
			<br/>		
			<div class="row">				
				<div class="col-md-2">
					<a href="javascript:void(0);" onclick="window.location='index.php?page=teleconsulta&id=<?php echo $row['ci_teleconsulta']; ?>&view=l&type=1';" title="Mais informações" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-plus-sign"></span> Mais Informações</a>
				</div>			
				<div class="col-md-10">
					<div class="panel panel-default" style="height:30px; padding:6px 0 0 6px;">
						<a href="down.php?h=<?php echo Crypt::hash(array('file' => $rowFile['ci_file'])); ?>">
						<h4 class="panel-title" style="font-size:14px;">								
							<?php echo $rowFile['nm_file']; ?>								
						</h4>
						</a>
					</div>
				</div>				
			</div>		
			<?php } ?>
			<input type="hidden" id="teleconsulta_exame_laudo" name="teleconsulta_exame_laudo" value="0"/>
			</form>

	<?php 
		}
	} 
	elseif(@$_POST['search1'] == Teleconsulta::TIPO_OPNIAO_FORMATIVA){ 
	
		if($registros < 1){
			echo '<div style="font-size:12px">';
			Util::alert('Nenhuma teleconsultoria encontrada!');
			echo '</div>';
		}
		else{
			?>
				<div class="row" style="font-size:12px;">
					<div class="table-responsive">
						<table class="table table-hover table-bordered">
							<thead>
								<tr class="btn-info">
									<th class="text-center">Código</th>
									<th class="text-center">Município</th>
									<th class="text-center">Especialidade</th>
									<th class="text-center">Paciente</th>
									<th class="text-center">Data</th>	
									<th class="text-center"></th>						
								</tr>
							</thead>
							<tbody>
								<?php
								while($row = $query->fetch()){
								?>
								<tr>
									<td><b><?php echo $row['ci_teleconsulta']; ?></b></td>
									<td><?php echo $row['ds_localidade']; ?></td>
									<td><?php echo $row['nm_especialidade']; ?></td>
									<td><?php echo ($row['nm_paciente'] ? $row['nm_paciente'] : '--- PACIENTE PADRÃO ---'); ?></td>
									<td><?php echo $row['dt_solicitacao']; ?></td>
									<td class="text-center">
										<a href="javascript:void(0);" onclick="window.location='index.php?page=teleconsulta&id=<?php echo $row['ci_teleconsulta']; ?>&view=l&type=2';">
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
			<?php
		}	
	} 
	
	?>
	<div style="font-size:12px;">
		<?php echo $paginacao; ?>	
	</div>

	<legend>Em Análise</legend>

	<?php 
		if($queryAnaliseNum < 1){
			echo '<div style="font-size:12px">';
			Util::alert('Nenhuma teleconsultoria em análise!');
			echo '</div>';
		}
		else{
	?>
	<div class="row" style="font-size:12px;">
		<div class="table-responsive">
			<table class="table table-hover table-bordered">
				<thead>
					<tr style="background-color: orange;     color: #fff;">
						<th class="text-center">Código</th>
						<th class="text-center">Município</th>
						<th class="text-center">Especialidade</th>
						<th class="text-center">Paciente</th>
						<th class="text-center">Data</th>	
						<th class="text-center"></th>						
					</tr>
				</thead>
				<tbody>
					<?php
					while($row = $queryAnalise->fetch()){
					?>
					<tr>
						<td><b><?php echo $row['ci_teleconsulta']; ?></b></td>
						<td><?php echo $row['ds_localidade']; ?></td>
						<td><?php echo $row['nm_especialidade']; ?></td>
						<td><?php echo ($row['nm_paciente'] ? $row['nm_paciente'] : '--- PACIENTE PADRÃO ---'); ?></td>
						<td><?php echo $row['dt_solicitacao']; ?></td>
						<td class="text-center">
							<a href="javascript:void(0);" onclick="window.location='index.php?page=teleconsulta&id=<?php echo $row['ci_teleconsulta']; ?>&view=l&type=2';">
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
	<div class="row" style="font-size:12px;">
		<div class="col-md-4"></div>
		<div class="col-md-4"></div>
		<div class="col-md-4"><div class="pull-right"><i><?php echo $descrRows; ?></i></div></div>
	</div>
	<?php 
	}
	?>


<script type="text/javascript">
$(function(){	
	
	<?php
	//Verificando se o usuário está solicitando um arquivo
	if(@$_GET['downfile']){
		echo "window.location = 'down.php?h=".Crypt::hash(array('file' => $_GET['downfile']))."';";	
	}
	?>	
	
	$(".btResponder").click(function(){
		var id = $(this).attr('id').split('_')[1];
		$('#teleconsulta_exame_laudo').val(id);
		$('#formLaudo').submit();
	});	
});
function pesquisar(type){
	$("#formPesquisaType").val(type);
	$("#formPesquisa").submit();
}
</script>