<?php
defined('EXEC') or die();
$transacao = 'duvida';

if(!$auth->isRead($transacao)){
	Util::info(Config::AUTH_MESSAGE);
	return true;
}

//Importando a classe de SQL
Loader::import('com.atitudeweb.SQL');

//Exclusão de vários ou um registro
if(isset($_POST['checkdel'])){	
	if($auth->isDelete($transacao)){	
		if(@SQL::remove('tb_duvida', 'ci_duvida', $_POST['checkdel'])){
			Util::notice('Dúvidas', 'Excluída com sucesso!', 'ok');	
		}
		else{
			Util::notice('Dúvidas', 'Erro ao Excluir. A dúvida já pode estar sendo utilizada por uma teleconsultoria ou houve falha na conexão com o banco de dados!', 'error');
		}		
	}
	else{
		Util::info(Config::AUTH_MESSAGE);
	}
}

//Alteração ou inclusão de um registro
if(isset($_GET['db']) && isset($_GET['form'])){
	
	$ci_duvida = $_GET['form'];
	$pass = true;
	
	if($_GET['form'] == 0){ //cadastro		
		if(!@SQL::save('tb_duvida')){
			$pass = false;
		}		
	}	
	elseif($_GET['form'] > 0){ //alteração		
		if(!@SQL::update('tb_duvida', array('ci_duvida' => $ci_duvida))){
			$pass = false;
		}		
	}
		
	if($pass){
		Controller::setInfo('Dúvidas', 'Salva com sucesso!');	
		Controller::redirect(Util::setLink(array('form=null', 'db=null')));	
	}
	else{
		$rowEdit = $_POST;
		Util::notice('Dúvidas', 'Ocorreu um erro. Esta dúvida já pode existir!', 'error');	
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
			$rowEdit = query('select * from tb_duvida where ci_duvida = '.$_GET['form'])->fetch();		
			
	}
}
else{ //Consulta no banco para listagem dos registros
	
	$where = '';
	if(@$_POST['search1']){
		$term = addslashes($_POST['search1']);
		$where .=  "and nm_duvida ilike '%{$term}%' ";		
	}
	
	$sql = "select * from tb_duvida
	where 1=1 $where
	order by nm_duvida asc
	limit {$limitPagina} offset ".(($p - 1) * $limitPagina);
	$query = query($sql);
	$sqlNum = "select count(*) as num from tb_duvida where 1=1 $where";
	$rowNum = query($sqlNum)->fetch();
	$registros = $rowNum['num'];	
	$paginacao = Util::pagination($registros, 1);	
}

?>

	<div class="row bgGrey">
		<img src="assets/duvida.png"/>
		<span class="actiontitle">Dúvidas</span>
		<span class="actionview"> - <?php echo (!isset($_GET['form']) ? 'Pesquisa' : (@$_GET['form'] > 0 ? 'Edição' : 'Cadastro')); ?></span>
		<?php if(!isset($_GET['form'])){ ?>
			<button type="button" id="btAdd" class="btn btn-info btn-sm pull-right"><span class="glyphicon glyphicon-plus-sign"></span> Novo</button>   
		<?php } else{ ?>		
			<button id="btVoltar" onclick="window.location='?page=duvida';" class="btn btn-info btn-sm pull-right"><span class="glyphicon glyphicon-circle-arrow-left"></span> Voltar</button>
		<?php } ?>		
	</div>
	
	<!-- FORMULÁRIO DE PESQUISA -->
	<?php if(!isset($_GET['form'])){ ?>	
	
		<form action="<?php echo Util::setLink(array('p=null')); ?>" method="post">
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
		</form>
	
		<br>
		
		<div class="row">
			<form id="formSearch" method="post">
				<div class="table-responsive btMarginRight">
				<table class="table table-hover table-bordered">
					<thead>
						<tr class="btn-info">
							<td><input id="btCheckAll" type="checkbox"></td>
							<th>Dúvida</th>
							<td></td>							
						</tr>
					</thead>
					<tbody>
						<?php 
						while($row = $query->fetch()){
						?>
						<tr>
							<td><input type="checkbox" name="checkdel[]" value="<?php echo $row['ci_duvida']; ?>" class="btCheck"></td>
							<td><?php echo $row['nm_duvida']; ?></td>
							<td class="text-center">
								<a href="javascript:void(0);" onclick="window.location='<?php echo Util::setLink(array('form='.$row['ci_duvida'])); ?>';">
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
				<div id="modalDel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
					<div class="modal-content clearfix">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>        
						<p><br>Tem certeza que deseja excluir os registros selecionados?</p>
					  </div>
					  <div class="modal-body pull-right">      
						<button type="button" class="btn btn-small btn-default" data-dismiss="modal">Cancelar</button>
						<input type="submit" class="btn btn-primary" value="OK"/>
					  </div>
					</div>
				  </div>
				</div>			
			</form>
			<div class="row">
				<div class="col-md-1">
					<button class="btn btn-danger" data-toggle="modal" data-target="#modalDel" title="Excluir selecionados" style="float:left;"><span class="glyphicon glyphicon-remove-sign"></span> Excluir</button>
				</div>
			</div>
			<?php echo $paginacao; ?>
		</div>
	
	<?php } else{ ?>
	
		<!-- FORMULÁRIO DE CADASTRO -->
		<form action="<?php echo Util::setLink(array('db=1')) ?>" method="post" id="formInsertEdit" onsubmit="return test();">		
			
			<div class="row"><div id="validateBox" class="col-md-8 col-md-offset-2"></div></div>
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<fieldset class="" style="">
						<div class="row">
						<div class="col-md-12">
							Dúvida: *
							<input type="text" id="nm_duvida" name="nm_duvida" value="<?php echo @$rowEdit['nm_duvida']; ?>" maxlength="50" size="35" class="form-control"/></td>
						</div>
						</div>
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
	valid = checkLength('nm_duvida', 'Dúvida', 2) && valid;		
	return valid;	
}	
</script>