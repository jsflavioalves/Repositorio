<?php
defined('EXEC') or die();
$transacao = 'auditoria_teleconsulta';

if(!$auth->isRead($transacao) && !$auth->isAdmin()){
	Util::info(Config::AUTH_MESSAGE);
	return true;
}

Loader::import('br.ufc.nuteds.Teleconsulta');

if(!isset($_GET['form'])){ //Formulário para adição ou alteração de registro
	
	//Verificando a pesquisa rápida por login
	if(@$_GET['nm_login'] && !isset($_POST['search2']))
		$_POST['search2'] = $_GET['nm_login'];

	$where = '';
	$search = true;
	if(@$_POST['search1']){
		$term = addslashes($_POST['search1']);
		$where .= "and tu_solicitante.nm_usuario ilike '%{$term}%' ";
		$search = true;
	}
	if(@$_POST['search2']){
		$term = addslashes($_POST['search2']);
		$where .= "and tp_solicitante.nr_cpf = '{$term}' ";
		$search = true;
	}
	if(@$_POST['search3']){
		$term = addslashes($_POST['search3']);
		$where .= "and tu_especialista.nm_usuario ilike '%{$term}%' ";
		$search = true;
	}
	if(@$_POST['search4']){
		$term = addslashes($_POST['search4']);
		$where .= "and tp_especialista.nr_cpf = '{$term}' ";
		$search = true;
	}
	if(@$_POST['search5']){
		$term = addslashes($_POST['search5']);
		$where .= "and tt.cd_especialidade = {$term} ";
		$search = true;
	}
	if(@$_POST['search6']){
		$term = addslashes($_POST['search6']);
		$where .= "and tt.cd_categoria_cid = {$term} ";
		$search = true;
	}
	if(@$_POST['search7']){
		$term = addslashes($_POST['search7']);
		$where .= "and tt.cd_localidade = {$term} ";
		$search = true;
	}
	if(@$_POST['search8']){
		$term = addslashes($_POST['search8']);
		$where .= "and tt.cd_duvida = {$term} ";
		$search = true;
	}
	if(@$_POST['search11']){
		$term = addslashes($_POST['search11']);
		$where .= "and tt.tp_status = {$term} ";
		$search = true;
	}
	if(@$_POST['search9'] && @$_POST['search10']){
		$term1 = addslashes($_POST['search9']);
		$term2 = addslashes($_POST['search10']);
		$inicio = explode("/", $term1);
		$dt_inicio = $inicio[2].'-'.$inicio[1].'-'.$inicio[0];
		$fim = explode("/", $term2);
		$dt_fim = $fim[2].'-'.$fim[1].'-'.$fim[0];
		

		$status = @$_POST['search11'];
		if($status == 1 || $status == 2 || $status == 3) {
			$where .= "and tt.dt_solicitacao between '{$dt_inicio}' and '{$dt_fim} 24:00:00' ";
		}
		else {
			$where .= "and tt.dt_resposta between '{$dt_inicio}' and '{$dt_fim} 24:00:00' ";
		}

		$search = true;
	}
	if(@$_POST['search12']){
		$term = addslashes($_POST['search12']);
		$descr = Teleconsulta::$laudosPadroes[$term - 1];
		//echo $descr['msg']; exit;
		$where .= "and tt.ds_resposta = '{$descr['msg']}' ";
		$search = true;
	}
	
	
	$innerDefault = "
	inner join tb_localidade tl on(tt.cd_localidade=tl.ci_localidade)
	inner join tb_duvida td on(tt.cd_duvida=td.ci_duvida)
	inner join tb_especialidade te on(tt.cd_especialidade=te.ci_especialidade)
	inner join tb_usuario tu_solicitante on(tt.cd_profissional_solicitante=tu_solicitante.ci_usuario)
	inner join tb_profissional tp_solicitante on(tt.cd_profissional_solicitante=tp_solicitante.ci_profissional)
	left join tb_usuario tu_especialista on(tt.cd_profissional_especialista=tu_especialista.ci_usuario)
	left join tb_profissional tp_especialista on(tt.cd_profissional_especialista=tp_especialista.ci_profissional)
	left join integracao.tb_profissional itp on(itp.cpf = replace(replace(tp_solicitante.nr_cpf, '.', ''), '-', ''))
	left join tb_categoria_cid tcc on(tt.cd_categoria_cid=tcc.ci_categoria_cid)	
	";
		
	$sql = "
	select 
		tt.ci_teleconsulta,
		tt.cd_duvida,
		td.nm_duvida,
		tt.cd_especialidade,
		te.nm_especialidade,
		tt.cd_categoria_cid,
		tcc.nm_categoria_cid,
		tt.cd_localidade as ci_municipio,
		tl.sg_estado || ' - ' || tl.ds_localidade as nm_municipio,
		tp_solicitante.nr_cpf as nr_cpf_solicitante,
		upper(tu_solicitante.nm_usuario) as nm_usuario_solicitante,
		tp_especialista.nr_cpf as nr_cpf_especialista,
		upper(tu_especialista.nm_usuario) as nm_usuario_especialista,
		tt.dt_solicitacao,
		to_char(tt.dt_solicitacao, 'dd/mm/yyyy HH24:MI:SS') as data_solicitacao,
		tt.dt_resposta,
		tt.tp_status,
		to_char(tt.dt_resposta, 'dd/mm/yyyy HH24:MI:SS') as data_finalizacao
	from tb_teleconsulta tt
	$innerDefault
	where tt.tp_tipo = 2	  
	  $where
	order by dt_solicitacao asc
	limit {$limitPagina} offset ".(($p - 1) * $limitPagina);
	$query = query($sql);
	//echo $sql;
	$sqlNum = "	
	select 
		count(*) as num 
	from tb_teleconsulta tt
	$innerDefault
	where tt.tp_tipo = 2	  
	  $where";
	$rowNum = query($sqlNum)->fetch();
	$registros = $rowNum['num'];	
	$paginacao = Util::pagination($registros, 10);
	
	//Consultando Município baseado nas teleconsultas existentes
	$sqlMunicipios = "select
		tt.cd_localidade as ci_municipio,
		tl.sg_estado || ' - ' || tl.ds_localidade as nm_municipio
	from tb_teleconsulta tt
	inner join tb_localidade tl on(tt.cd_localidade=tl.ci_localidade)
	inner join tb_duvida td on(tt.cd_duvida=td.ci_duvida)
	inner join tb_especialidade te on(tt.cd_especialidade=te.ci_especialidade)
	inner join tb_usuario tu_solicitante on(tt.cd_profissional_solicitante=tu_solicitante.ci_usuario)
	inner join tb_profissional tp_solicitante on(tt.cd_profissional_solicitante=tp_solicitante.ci_profissional)
	inner join tb_usuario tu_especialista on(tt.cd_profissional_especialista=tu_especialista.ci_usuario)
	inner join tb_profissional tp_especialista on(tt.cd_profissional_especialista=tp_especialista.ci_profissional)
	inner join integracao.tb_profissional itp on(itp.cpf = replace(replace(tp_solicitante.nr_cpf, '.', ''), '-', ''))
	left join tb_categoria_cid tcc on(tt.cd_categoria_cid=tcc.ci_categoria_cid)
	where tt.tp_tipo = 2	  
	group by 1,2
	order by 2";
	$queryMunicipios = query($sqlMunicipios);
	
	//Consultando Categoria CID baseada nas teleconsultas existentes
	$sqlCategoriaCid = "select
		tt.cd_categoria_cid,
		tcc.nm_categoria_cid
	from tb_teleconsulta tt
	inner join tb_localidade tl on(tt.cd_localidade=tl.ci_localidade)
	inner join tb_duvida td on(tt.cd_duvida=td.ci_duvida)
	inner join tb_especialidade te on(tt.cd_especialidade=te.ci_especialidade)
	inner join tb_usuario tu_solicitante on(tt.cd_profissional_solicitante=tu_solicitante.ci_usuario)
	inner join tb_profissional tp_solicitante on(tt.cd_profissional_solicitante=tp_solicitante.ci_profissional)
	inner join tb_usuario tu_especialista on(tt.cd_profissional_especialista=tu_especialista.ci_usuario)
	inner join tb_profissional tp_especialista on(tt.cd_profissional_especialista=tp_especialista.ci_profissional)
	inner join integracao.tb_profissional itp on(itp.cpf = replace(replace(tp_solicitante.nr_cpf, '.', ''), '-', ''))
	left join tb_categoria_cid tcc on(tt.cd_categoria_cid=tcc.ci_categoria_cid)
	where tt.tp_tipo = 2	  
	group by 1,2
	order by 2";
	$queryCategoriaCid = query($sqlCategoriaCid);
	
	//Consultando Especialidades
	$sqlEspecialidades = "select * from tb_especialidade order by 2";
	$queryEspecialidades = query($sqlEspecialidades);
	
	//Consultando Dúvidas
	$sqlDuvidas = "select * from tb_duvida order by 2";
	$queryDuvidas = query($sqlDuvidas);

	//laudos padrões
	$laudosPadroes = Teleconsulta::$laudosPadroes;

}
?>

	<div class="row bgGrey">
		<img src="assets/historico.png"/>
		<span class="actiontitle">Teleconsultas</span>
		<span class="actionview"> - Pesquisa</span>				
	</div>

	<!-- FORMULÁRIO DE PESQUISA -->
	<?php if(!isset($_GET['form'])){ ?>	
		
		
	
	
		<form id="formSearch" action="<?php echo Util::setLink(array('p=null')); ?>" method="post" onsubmit="return test();">
			<div id="validateBox" class="col-md-8 col-md-offset-2"></div>
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="col-md-8">
						<label>Nome Solicitante:</label>
						<input type="text" class="form-control" id="search1" name="search1" value="<?php echo @$_POST['search1']; ?>">
					</div>
					<div class="col-md-4">
						<label>CPF Solicitante:</label>
						<input type="tel" id="search2" name="search2" value="<?php echo @$_POST['search2']; ?>" maxlength="14" class="form-control input-mask-cpf"/>						
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="col-md-8">
						<label>Nome Especialista:</label>
						<input type="text" class="form-control" id="search3" name="search3" value="<?php echo @$_POST['search3']; ?>">
					</div>
					<div class="col-md-4">
						<label>CPF Especialista:</label>
						<input type="tel" id="search4" name="search4" value="<?php echo @$_POST['search4']; ?>" maxlength="14" class="form-control input-mask-cpf"/>						
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="col-md-6">
						<label>Especialidade:</label>
						<select id="search5" name="search5" class="form-control">						
							<option value="">...</option>
							<?php 
							while($row = $queryEspecialidades->fetch()){
								if(@$_POST['search5'] == $row['ci_especialidade'])
									echo '<option value="'.$row['ci_especialidade'].'" selected="selected">'.$row['nm_especialidade'].'</option>';
								else
									echo '<option value="'.$row['ci_especialidade'].'">'.$row['nm_especialidade'].'</option>';
							} 
							?>
						</select>						
					</div>
					<div class="col-md-6">
						<label>Categoria CID:</label>
						<select id="search6" name="search6" class="form-control">						
							<option value="">...</option>
							<?php 
							while($row = $queryCategoriaCid->fetch()){
								if(@$_POST['search6'] == $row['cd_categoria_cid'])
									echo '<option value="'.$row['cd_categoria_cid'].'" selected="selected">'.$row['nm_categoria_cid'].'</option>';
								else
									echo '<option value="'.$row['cd_categoria_cid'].'">'.$row['nm_categoria_cid'].'</option>';
							} 
							?>
						</select>						
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="col-md-4">
						<label>Município:</label>
						<select id="search7" name="search7" class="form-control">						
							<option value="">...</option>
							<?php 
							while($row = $queryMunicipios->fetch()){
								if(@$_POST['search7'] == $row['ci_municipio'])
									echo '<option value="'.$row['ci_municipio'].'" selected="selected">'.$row['nm_municipio'].'</option>';
								else
									echo '<option value="'.$row['ci_municipio'].'">'.$row['nm_municipio'].'</option>';
							} 
							?>
						</select>						
					</div>
					<div class="col-md-4">
						<label>Tipo de Dúvida:</label>
						<select id="search8" name="search8" class="form-control">
							<option value="">...</option>
							<?php 
							while($row = $queryDuvidas->fetch()){
								if(@$_POST['search8'] == $row['ci_duvida'])
									echo '<option value="'.$row['ci_duvida'].'" selected="selected">'.$row['nm_duvida'].'</option>';
								else
									echo '<option value="'.$row['ci_duvida'].'">'.$row['nm_duvida'].'</option>';
							} 
							?>
						</select>						
					</div>
					<div class="col-md-4">
						<label>Status:</label>
						<select id="search11" name="search11" class="form-control">
							<option value="">...</option>
							<?php 
							foreach(Teleconsulta::$status as $key=>$value) {
								if(@$_POST['search11'] == $key)
									echo '<option value="'.$key.'" selected="selected">'.$value.'</option>';
								else
									echo '<option value="'.$key.'">'.$value.'</option>';
							}
							?>
						</select>						
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					
					<div class="col-md-4">
						Mensagem Padrão
						<select id="search12" name="search12" class="form-control">
							<option value="">---LAUDO PADRÃO---</option>
							<?php foreach($laudosPadroes as $key=>$value){
								if(@$_POST['search12'] == ($key + 1))
									echo '<option value="'.($key + 1).'" selected="selected">'.$value['lab'].'</option>';
								else
									echo '<option value="'.($key + 1).'">'.$value['lab'].'</option>';
							}
							?>					
						</select>
					</div>

					<div class="col-md-4">
						De:
						<div class="input-group date">
						  <input type="tel" id="search9" name="search9" value="<?php echo @$_POST['search9']; ?>" class="form-control input-mask-date"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
						</div>
					</div>
					<div class="col-md-4">
						Até:
						<div class="input-group date">
						  <input type="tel" id="search10" name="search10" value="<?php echo @$_POST['search10']; ?>" class="form-control input-mask-date"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
						</div>
					</div>						
				</div>
			</div>
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="col-md-4">
					</div>
					<div class="col-md-4">
					</div>	
					<div class="col-md-4">
						<button type="submit" name="search" value="1" class="btn btn-info" style="margin-top:20px; width:100%;"><span class="glyphicon glyphicon-zoom-in"></span> Pesquisar</button>
						<img class="loader" src="assets/loading.gif"/>					
					</div>
				</div>
			</div>						
		</form>
		
	
		<br>
		
		<?php if($search){ ?>
		
			<div class="row">
				<form id="formSearch" method="post">
					<div class="table-responsive btMarginRight">		
						<table class="table table-hover table-bordered">
							<thead>
								<tr class="btn-info">
									<th>ID</th>
									<th>Especialidade</th>
									<th>Categoria CID</th>
									<th>Município</th>
									<th>Status</th>
									<th>Data Solicitado</th>
									<th>Data Finalizado</th>
									<th></th>						
								</tr>
							</thead>
							<tbody>
								<?php 
								while($row = $query->fetch()){
								?>
								<tr>
									<td><?php echo $row['ci_teleconsulta']; ?></td>
									<td><?php echo $row['nm_especialidade']; ?></td>
									<td><?php echo $row['nm_categoria_cid']; ?></td>
									<td><?php echo $row['nm_municipio']; ?></td>
									<td><?php echo '<font color="'.Teleconsulta::$statusCor[$row['tp_status']].'"><b>'.Teleconsulta::$status[$row['tp_status']].'</b></font>'; ?></td>
									<td><?php echo $row['data_solicitacao']; ?></td>
									<td><?php echo $row['data_finalizacao']; ?></td>
									<td class="text-center">
										<a href="index.php?page=auditoria/ver_teleconsulta&id=<?php echo $row['ci_teleconsulta']; ?>" target="_blank">
											<span class="glyphicon glyphicon-search"></span>
										</a>
									</td>
								</tr>
								<?php
								}
								?>
							</tbody>
						</table>
					</div>						
				</form>
				<?php echo $paginacao; ?>
			</div>
			
		<?php } ?>		
		
	
	<?php } ?>
	
<script type="text/javascript">
function test(){	
	var valid = true;
	$("#formSearch").find("input,select").each(function(index){
		$(this).removeClass("ui-state-error");						
	});	
	if($('#dt_inicio').val().length > 0 || $('#dt_fim').val().length > 0){	
		if(!checkData($('#search9').val())){
			$('#search9').addClass("ui-state-error");
			valid = false;	
			updateTips('Período inválido.');
		}
		if(!checkData($('#search10').val())){
			$('#search10').addClass("ui-state-error");
			valid = false;	
			updateTips('Período inválido.');
		}
		valid = checkLength('search9', 'Período "De"', 10) && valid;
		valid = checkLength('search10', 'Período "Até"', 10) && valid;
	}
	return valid;	
}	
</script>