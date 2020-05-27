<?php
defined('EXEC') or die();
$transacao = 'cursos';

if(!$auth->isRead($transacao)){
	Util::info(Config::AUTH_MESSAGE);
	return true;
}

//Importando a classe de SQL
Loader::import('com.atitudeweb.SQL');

//Alteração ou inclusão de um registro
if(isset($_GET['db']) && isset($_GET['form'])){
	
	$ci_curso = $_GET['form'];
	$pass = true;
	
	$_POST['fl_ativo'] = (@$_POST['fl_ativo'] == 't' ? 'true' : 'false');
	if(@$_POST['dt_inicio']){
		$parts = explode('/', $_POST['dt_inicio']);
		$_POST['dt_inicio'] = $parts[2].'-'.@$parts[1].'-'.@$parts[0];
	}
	if(@$_POST['dt_fim']){
		$parts = explode('/', $_POST['dt_fim']);
		$_POST['dt_fim'] = $parts[2].'-'.@$parts[1].'-'.@$parts[0];
	}
	
	if($_GET['form'] == 0){ //cadastro		
		if(!@SQL::save('tb_curso')){
			$pass = false;
		}		
	}	
	elseif($_GET['form'] > 0){ //alteração		
		if(!@SQL::update('tb_curso', array('ci_curso' => $ci_curso))){
			$pass = false;
		}		
	}
		
	if($pass){
		Controller::setInfo('Cursos', 'Salvo com sucesso!');	
		Controller::redirect(Util::setLink(array('form=null', 'db=null')));	
	}
	else{
		$rowEdit = $_POST;
		Util::notice('Cursos', 'Ocorreu um erro. Este curso já pode existir!', 'error');	
	}		
}

if(isset($_GET['form'])){ //Formulário para adição ou alteração de registro
	if($_GET['form'] == 0){
		if(!$auth->isCreate($transacao)){
			Util::info(Config::AUTH_MESSAGE);
			return true;
		}		
	}
	else{
		if(!$auth->isUpdate($transacao)){
			Util::info(Config::AUTH_MESSAGE);
			return true;
		}
		
		if(@!$rowEdit)
			$rowEdit = query('select * from tb_curso where ci_curso = '.$_GET['form'])->fetch();	

		$rowCountSUS = query("select count(*) as num from tb_aluno where id_curso = '".$rowEdit['ds_codigo']."' and nr_tipo = 1")->fetch();
		$countSUS = $rowCountSUS['num'];
		$rowCountCOMUM = query("select count(*) as num from tb_aluno where id_curso = '".$rowEdit['ds_codigo']."' and nr_tipo = 2")->fetch();		
		$countCOMUM = $rowCountCOMUM['num'];
			
	}
}
else{ //Consulta no banco para listagem dos registros
	
	$where = '';
	if(@$_POST['search1']){
		$term = addslashes($_POST['search1']);
		$where .=  "and nm_duvida ilike '%{$term}%' ";		
	}
	
	$sql = "select * from tb_curso
	where 1=1 $where
	order by ci_curso desc
	limit {$limitPagina} offset ".(($p - 1) * $limitPagina);
	$query = query($sql);
	$sqlNum = "select count(*) as num from tb_curso where 1=1 $where";
	$rowNum = query($sqlNum)->fetch();
	$registros = $rowNum['num'];	
	$paginacao = Util::pagination($registros, 1);	
}

?>

	<div class="row bgGrey">
		<img src="assets/curso.png"/>
		<span class="actiontitle">Cursos</span>
		<?php if(!isset($_GET['form'])){ ?>
			<button type="button" id="btAdd" class="btn btn-info btn-sm pull-right"><span class="glyphicon glyphicon-plus-sign"></span> Novo</button>   
		<?php } else{ ?>		
			<button id="btVoltar" onclick="window.location='?page=cursos';" class="btn btn-info btn-sm pull-right"><span class="glyphicon glyphicon-circle-arrow-left"></span> Voltar</button>
		<?php } ?>		
	</div>
	
	<!-- FORMULÁRIO DE PESQUISA -->
	<?php if(!isset($_GET['form'])){ ?>	
	
		<!--<form action="<?php echo Util::setLink(array('p=null')); ?>" method="post">
			<div class="row">
				<div class="col-lg-6 col-lg-offset-3">
					<div class="col-lg-9">
						<label>Dúvida:</label><input type="text" class="form-control" id="search1" name="search1" value="<?php echo @$_POST['search1']; ?>">
					</div>
					<div class="col-lg-3">
						<br/>
						<button type="submit" name="search" value="1" class="btn btn-info"><span class="glyphicon glyphicon-zoom-in"></span> Pesquisar</button>
					</div>					
				</div>
			</div>
		</form>-->
	
		<br>
		
		<div class="row">
			<form id="formSearch" method="post">
				<div class="table-responsive btMarginRight">
				<table class="table table-hover table-bordered">
					<thead>
						<tr class="btn-info">
							<th>ID</th>
							<th>Código</th>
							<th>Descrição</th>
							<th>Data inicio</th>
							<th>Data fim</th>
							<th>Vagas</th>
							<th>CH</th>
							<th>Ativo?</th>
							<td></td>							
						</tr>
					</thead>
					<tbody>
						<?php 
						while($row = $query->fetch()){
							
							$fl_ativo['t'] = '<font color="green"><b>ATIVADO</b></font>';
							$fl_ativo['f'] = '<font color="red"><b>DESATIVADO</b></font>';
							
						?>
						<tr>
							<td><?php echo $row['ci_curso']; ?></td>
							<td><?php echo '<a href="'.Config::SITE . 'cursos/index.php?codigo='.$row['ds_codigo'].'" target="_blank">' . $row['ds_codigo'] . '</a>'; ?></td>
							<td><?php echo $row['ds_descricao']; ?></td>
							<td><?php echo $row['dt_inicio']; ?></td>
							<td><?php echo $row['dt_fim']; ?></td>
							<td><?php echo $row['nr_vagas']; ?></td>
							<td><?php echo $row['nr_ch']; ?></td>
							<td><?php echo $fl_ativo[$row['fl_ativo']] ?></td>
							<td class="text-center">
								<a href="javascript:void(0);" onclick="window.location='<?php echo Util::setLink(array('form='.$row['ci_curso'])); ?>';">
									<span class="glyphicon glyphicon-edit"></span>
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
	
	<?php } else{ ?>
	
		<!-- FORMULÁRIO DE CADASTRO -->
		<form action="<?php echo Util::setLink(array('db=1')) ?>" method="post" id="formInsertEdit" onsubmit="return test();">		
			
			<br>
			
			<div class="row"><div id="validateBox" class="col-md-8 col-md-offset-2"></div></div>
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<fieldset class="" style="">
						<?php if(@$_GET['form'] == 0){ ?>	
						<div class="row">
						<div class="col-md-12">
							Código: *
							<input type="text" id="ds_codigo" name="ds_codigo" value="<?php echo @$rowEdit['ds_codigo']; ?>" maxlength="50" class="form-control"/></td>
						</div>
						</div>
						<div class="row">
						<div class="col-md-12">
							Descrição: *
							<textarea id="ds_descricao" name="ds_descricao" class="form-control"><?php echo @$rowEdit['ds_descricao']; ?></textarea>							
						</div>
						</div>						
						<div class="row">
						<div class="col-md-12">
							Data de inicio: 
							<div class="input-group date">
							  <input type="tel" id="dt_inicio" name="dt_inicio" value="<?php echo @$rowEdit['dt_inicio']; ?>" class="form-control input-mask-date"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
							</div>
						</div>
						</div>
						<div class="row">
						<div class="col-md-12">
							Data de fim: 
							<div class="input-group date">
							  <input type="tel" id="dt_fim" name="dt_fim" value="<?php echo @$rowEdit['dt_fim']; ?>" class="form-control input-mask-date"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
							</div>
						</div>
						</div>
						<div class="row">
						<div class="col-md-6">
							Vagas: *
							<input type="tel" id="nr_vagas" name="nr_vagas" value="<?php echo @$rowEdit['nr_vagas']; ?>" maxlength="10" class="form-control input-mask-numbers"/></td>
						</div>
						<div class="col-md-6">
							CH: *
							<input type="tel" id="nr_ch" name="nr_ch" value="<?php echo @$rowEdit['nr_ch']; ?>" maxlength="10" class="form-control input-mask-numbers"/></td>
						</div>
						</div>
						<div class="row">
						<div class="col-md-12">
							Tema bireme: *
							<input type="text" id="ds_tema" name="ds_tema" value="<?php echo @$rowEdit['ds_tema']; ?>" maxlength="50" class="form-control"/></td>
						</div>
						</div>
						
						<?php } else { ?>
						
						
						<div class="row">
							<div class="col-md-6">
								<div style="background:#f0f0f0; border-radius:5px; padding:10px; min-height:150px;">
									<h4>Alunos Vinculados ao SUS</h4>
									<?php echo $countSUS; ?>
									<br>
									<a href="partial1.php?page=cursoslistagem&codigo=<?php echo $_GET['form']; ?>&type=1" class="btn btn-info pull-right">Listagem</a>
									<br><br>
								</div>
							</div>
							<div class="col-md-6">
								<div style="background:#f0f0f0; border-radius:5px; padding:10px; min-height:150px;">
									<h4>Alunos sem vínculo com o SUS</h4>
									<?php echo $countCOMUM; ?>
									<br>
									<a href="partial1.php?page=cursoslistagem&codigo=<?php echo $_GET['form']; ?>&type=2" class="btn btn-info pull-right">Listagem</a>
									<br><br>
								</div>
							</div>
						</div>
						
						<br>
						
						<?php  Util::alert('Após o cadastro da oferta, não será possível alterar as informações, além de ativá-la ou desativá-la!'); ?>
						
						<div class="row">
						<div class="col-md-12">
							Código: *
							<input type="text" value="<?php echo @$rowEdit['ds_codigo']; ?>" maxlength="50" class="form-control" disabled /></td>
						</div>
						</div>
						<div class="row">
						<div class="col-md-12">
							Descrição: *
							<textarea class="form-control" disabled><?php echo @$rowEdit['ds_descricao']; ?></textarea>							
						</div>
						</div>						
						<div class="row">
						<div class="col-md-12">
							Data de inicio: 
							<div class="input-group date">
							  <input type="tel" value="<?php echo @$rowEdit['dt_inicio']; ?>" class="form-control input-mask-date" disabled ><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
							</div>
						</div>
						</div>
						<div class="row">
						<div class="col-md-12">
							Data de fim: 
							<div class="input-group date">
							  <input type="tel" value="<?php echo @$rowEdit['dt_fim']; ?>" class="form-control input-mask-date" disabled><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
							</div>
						</div>
						</div>
						<div class="row">
						<div class="col-md-6">
							Vagas: *
							<input type="tel" value="<?php echo @$rowEdit['nr_vagas']; ?>" maxlength="10" class="form-control input-mask-numbers" disabled />
						</div>
						<div class="col-md-6">
							CH: *
							<input type="tel" value="<?php echo @$rowEdit['nr_ch']; ?>" maxlength="10" class="form-control input-mask-numbers" disabled />
						</div>
						</div>
						<div class="row">
						<div class="col-md-12">
							Tema bireme: *
							<input type="text" value="<?php echo @$rowEdit['ds_tema']; ?>" maxlength="50" class="form-control" disabled /></td>
						</div>
						</div>
						<div class="row">
						<div class="col-md-12">
							<br>
							Ativo?: *
							<input type="checkbox" id="fl_ativo" name="fl_ativo" value="t" <?php echo (@$rowEdit['fl_ativo'] == 't' ? 'checked="checked"' : ''); ?>/>
						</div>
						</div>
						
						<?php } ?>
						
					</fieldset>
				</div>
			</div>
			
			<br>
			
			<div class="row">
				<div class="col-md-6 col-md-offset-3 text-center">
					<button id="btInsertEdit" type="submit" class="btn btn-success text-center">Salvar</button>
					<img class="loader" src="assets/loading.gif"/>
				</div>
			</div>
			
		</form>
	
	<?php } ?>

<script type="text/javascript">
function test(){	
	var valid = true;
	$("#formInsertEdit").find("input,select").each(function(index){
		$(this).removeClass("ui-state-error");						
	});	
	valid = checkLength('ds_codigo', 'Código', 2) && valid;
	valid = checkLength('ds_descricao', 'Descrição', 2) && valid;	
	valid = checkLength('dt_inicio', 'Data inicio', 2) && valid;	
	valid = checkLength('dt_fim', 'Data fim', 2) && valid;	
	valid = checkLength('nr_vagas', 'Vagas', 2) && valid;	
	valid = checkLength('nr_ch', 'CH', 2) && valid;	
	valid = checkLength('ds_tema', 'Tema bireme', 2) && valid;	
	return valid;	
}	
</script>