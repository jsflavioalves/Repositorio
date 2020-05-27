<?php
defined('EXEC') or die();
$transacao = 'dados_municipios';
$ufDefault = 'CE';

if(!$auth->isRead($transacao)){
	Util::info(Config::AUTH_MESSAGE);
	return true;
}

//Importando a classe de SQL
Loader::import('com.atitudeweb.SQL');

//Alteração ou inclusão de um registro
if(isset($_GET['db']) && isset($_GET['form'])){
	
	$ci_orientacao = $_GET['form'];
	$pass = true;
	
	if($_GET['form'] == 0){ //cadastro		
		if(!@SQL::save('tb_orientacao')){
			$pass = false;
		}		
	}	
	elseif($_GET['form'] > 0){ //alteração		
		if(!@SQL::update('tb_orientacao', array('ci_orientacao' => $ci_orientacao))){
			$pass = false;
		}		
	}
		
	if($pass){
		Controller::setInfo('Orientações', 'Salva com sucesso!');	
		Controller::redirect(Util::setLink(array('form=null', 'db=null')));	
	}
	else{
		$rowEdit = $_POST;
		Util::notice('Orientações', 'Ocorreu um erro. Esta Orientação já pode existir!', 'error');	
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
			$rowEdit = query('select * from tb_orientacao where ci_orientacao = '.$_GET['form'])->fetch();		
			
	}
}
else{ //Consulta no banco para listagem dos registros
	
	$where = '';
	if(@$_POST['search1']){
		$term = addslashes($_POST['search1']);
		$where .=  "and nm_orientacao ilike '%{$term}%' ";
	}
	
	$sql = "select * from tb_orientacao
	where 1=1 $where
	order by nm_orientacao asc
	limit {$limitPagina} offset ".(($p - 1) * $limitPagina);
	$query = query($sql);
	$sqlNum = "select count(*) as num from tb_orientacao where 1=1 $where";
	$rowNum = query($sqlNum)->fetch();
	$registros = $rowNum['num'];	
	$paginacao = Util::pagination($registros, 1);	
}

//Consultando os estados e os municípios do estado padrão
$sqlEstados = 'select distinct sg_estado from tb_localidade order by 1';
$queryEstados = query($sqlEstados);
$sqlMunicipios = "select ci_localidade, ds_localidade from tb_localidade where sg_estado = '$ufDefault' order by ds_localidade asc";
$queryMunicipios = query($sqlMunicipios);

?>

	<div class="row bgGrey">
		<img src="assets/orientacao.png"/>
		<span class="actiontitle">Municípios</span>
		<span class="actionview"> - <?php echo (!isset($_GET['form']) ? 'Pesquisa' : (@$_GET['form'] > 0 ? 'Edição' : 'Cadastro')); ?></span>
		<?php if(!isset($_GET['form'])){ ?>
			<button type="button" id="btAdd" class="btn btn-info btn-sm pull-right"><span class="glyphicon glyphicon-plus-sign"></span> Novo</button>   
		<?php } else{ ?>		
			<button id="btVoltar" onclick="window.location='?page=orientacao';" class="btn btn-info btn-sm pull-right"><span class="glyphicon glyphicon-circle-arrow-left"></span> Voltar</button>
		<?php } ?>		
	</div>
	
	<!-- FORMULÁRIO DE PESQUISA -->
	<?php if(!isset($_GET['form'])){ ?>	
	
		<form action="<?php echo Util::setLink(array('p=null')); ?>" method="post">
			<div class="row">
				<div class="col-lg-6 col-lg-offset-3">
					<div class="col-lg-9">
						<label>Orientação:</label><input type="text" class="form-control" id="search1" name="search1" value="<?php echo @$_POST['search1']; ?>">
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
							<th>Orientação</th>
							<td></td>							
						</tr>
					</thead>
					<tbody>
						<?php 
						while($row = $query->fetch()){
						?>
						<tr>
							<td><?php echo $row['nm_orientacao']; ?></td>
							<td class="text-center">
								<a href="javascript:void(0);" onclick="window.location='<?php echo Util::setLink(array('form='.$row['ci_orientacao'])); ?>';">
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
			
			<b>Município</b>
			<div class="row">
			
				<div class="col-md-6">
					<div class="col-md-3">
						UF: *
						<select id="cd_estado" name="cd_estado" onchange="atualizaBoxLocalidade();" class="form-control">
							<?php
							while($row = $queryEstados->fetch()){
								if($ufDefault == $row['sg_estado'])
									echo '<option value="'.$row['sg_estado'].'" selected="selected">'.$row['sg_estado'].'</option>';						
								else
									echo '<option value="'.$row['sg_estado'].'">'.$row['sg_estado'].'</option>';
							}
							?>	
						</select>
					</div>
					<div class="col-md-9">
						Município: *
						<div id="boxLocalidade">
						<select id="cd_localidade" name="cd_localidade" class="form-control">
							<?php
							while($row = $queryMunicipios->fetch()){
								if(@$rowEditPro['cd_localidade'] == $row['ci_localidade'])
									echo '<option value="'.$row['ci_localidade'].'" selected="selected">'.$row['ds_localidade'].'</option>';
								else
									echo '<option value="'.$row['ci_localidade'].'">'.$row['ds_localidade'].'</option>';
							}
							?>	
						</select>
						</div>
					</div>
					<div class="col-md-12">
						CRES: 
						<input type="text" id="nm_orientacao" name="nm_orientacao" value="<?php echo @$rowEdit['nm_orientacao']; ?>" maxlength="50" size="35" class="form-control"/>
					</div>
				</div>		
				<div class="col-md-6">
					<div class="col-md-12">
						Site do Município: 
						<input type="text" id="nm_orientacao" name="nm_orientacao" value="<?php echo @$rowEdit['nm_orientacao']; ?>" maxlength="50" size="35" class="form-control"/>
					</div>
					<div class="col-md-12">
						População: 
						<input type="text" id="nm_orientacao" name="nm_orientacao" value="<?php echo @$rowEdit['nm_orientacao']; ?>" maxlength="50" size="35" class="form-control"/>
					</div>
				</div>
			</div>

			<hr>
			<div class="row">
				<div class="col-md-6">
					<b>Prefeitura</b>
					<div class="col-md-12">
						Prefeito(a): 
						<input type="text" id="nm_orientacao" name="nm_orientacao" value="<?php echo @$rowEdit['nm_orientacao']; ?>" maxlength="50" size="35" class="form-control"/>
					</div>
					<div class="col-md-12">
						E-mail: 
						<input type="text" id="nm_orientacao" name="nm_orientacao" value="<?php echo @$rowEdit['nm_orientacao']; ?>" maxlength="50" size="35" class="form-control"/>
					</div>
					<div class="col-md-12">
						Telefones:
						<input type="text" id="nm_orientacao" name="nm_orientacao" value="<?php echo @$rowEdit['nm_orientacao']; ?>" maxlength="50" size="35" class="form-control"/>
					</div>
					<div class="col-md-12">
						Endereço:
						<input type="text" id="nm_orientacao" name="nm_orientacao" value="<?php echo @$rowEdit['nm_orientacao']; ?>" maxlength="50" size="35" class="form-control"/>
					</div>
				</div>
				<div class="col-md-6">
					<b>Secretaria de Saúde</b>
					<div class="col-md-12">
						Secretário(a):
						<input type="text" id="nm_orientacao" name="nm_orientacao" value="<?php echo @$rowEdit['nm_orientacao']; ?>" maxlength="50" size="35" class="form-control"/>
					</div>
					<div class="col-md-12">
						E-mail:
						<input type="text" id="nm_orientacao" name="nm_orientacao" value="<?php echo @$rowEdit['nm_orientacao']; ?>" maxlength="50" size="35" class="form-control"/>
					</div>
					<div class="col-md-12">
						Telefones:
						<input type="text" id="nm_orientacao" name="nm_orientacao" value="<?php echo @$rowEdit['nm_orientacao']; ?>" maxlength="50" size="35" class="form-control"/>
					</div>
					<div class="col-md-12">
						Endereço:
						<input type="text" id="nm_orientacao" name="nm_orientacao" value="<?php echo @$rowEdit['nm_orientacao']; ?>" maxlength="50" size="35" class="form-control"/>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					Número de Profissionais do Programa Mais Médico:
					<input type="text" id="nm_orientacao" name="nm_orientacao" value="<?php echo @$rowEdit['nm_orientacao']; ?>" maxlength="50" size="35" class="form-control"/>
				</div>
				<div class="col-md-12">
					Número de Equipes de Saúde da Família:
					<input type="text" id="nm_orientacao" name="nm_orientacao" value="<?php echo @$rowEdit['nm_orientacao']; ?>" maxlength="50" size="35" class="form-control"/>
				</div>
				<div class="col-md-12">
					Número de NASF:
					<input type="text" id="nm_orientacao" name="nm_orientacao" value="<?php echo @$rowEdit['nm_orientacao']; ?>" maxlength="50" size="35" class="form-control"/>
				</div>
				<div class="col-md-12">
					Tipo NASF:
					1 <input type="radio" name="nasf_tipo" value="1"/>&nbsp;&nbsp;&nbsp;
					2 <input type="radio" name="nasf_tipo" value="1"/>&nbsp;&nbsp;&nbsp;
					3 <input type="radio" name="nasf_tipo" value="1"/>
				</div>
				<div class="col-md-12">
					Existe SAD?
					Sim <input type="radio" name="nasf_tipo" value="1"/>&nbsp;&nbsp;&nbsp;
					Não <input type="radio" name="nasf_tipo" value="1"/>					
				</div>
				<div class="col-md-12">
					O Município tem Cardiologista?
					Sim <input type="radio" name="nasf_tipo" value="1"/>&nbsp;&nbsp;&nbsp;
					Não <input type="radio" name="nasf_tipo" value="1"/>					
				</div>
				<div class="col-md-12">
					Caso sim:<br><br>
					Com qual Frequência Visita o Município? 
					Número de NASF:
					<input type="text" id="nm_orientacao" name="nm_orientacao" value="<?php echo @$rowEdit['nm_orientacao']; ?>" maxlength="50" size="35" class="form-control"/>Dias
				</div>
				<div class="col-md-12">
					O Município Possui Eletrocardiógrafo Digital?
					Sim <input type="radio" name="nasf_tipo" value="1"/>&nbsp;&nbsp;&nbsp;
					Não <input type="radio" name="nasf_tipo" value="1"/>					
				</div>
				<div class="col-md-12">
					Modelo:
					<input type="text" id="nm_orientacao" name="nm_orientacao" value="<?php echo @$rowEdit['nm_orientacao']; ?>" maxlength="50" size="35" class="form-control"/>
				</div>
				<hr>
				<h4>Especialidades no município</h4>
				<label><input type="checkbox" name="nasf_tipo" value="1"/> CARDIOLOGISTA</label><br>
				<label><input type="checkbox" name="nasf_tipo" value="1"/> CIRURGIA DE CABEÇA E PESCOÇO</label><br>
				<label><input type="checkbox" name="nasf_tipo" value="1"/> DERMATOLOGISTA</label><br>
				<label><input type="checkbox" name="nasf_tipo" value="1"/> ENDOCRINOLOGISTA</label><br>
				<label><input type="checkbox" name="nasf_tipo" value="1"/> GINECOLOGIA-OBSTETRICIA</label><br>
				<label><input type="checkbox" name="nasf_tipo" value="1"/> HEMATOLOGIA E HEMOTERAPIA</label><br>
				<label><input type="checkbox" name="nasf_tipo" value="1"/> INFECTOLOGISTA</label><br>
				<label><input type="checkbox" name="nasf_tipo" value="1"/> PEDIATRA</label>		
				<hr>
				<div class="col-md-12">
					O Município tem Dermatologista?
					<label>Sim <input type="radio" name="nasf_tipo" value="1"/></label>&nbsp;&nbsp;&nbsp;
					<label>Não <input type="radio" name="nasf_tipo" value="1"/></label>					
				</div>
				<div class="col-md-12">
					O Município tem Ginecologista?
					<label>Sim <input type="radio" name="nasf_tipo" value="1"/></label>&nbsp;&nbsp;&nbsp;
					<label>Não <input type="radio" name="nasf_tipo" value="1"/></label>					
				</div>
				<div class="col-md-12">
					O Município tem Pediatria?
					<label>Sim <input type="radio" name="nasf_tipo" value="1"/></label>&nbsp;&nbsp;&nbsp;
					<label>Não <input type="radio" name="nasf_tipo" value="1"/></label>					
				</div>
				<div class="col-md-12">
					O Município realiza exames de imagem?
					<label>Sim <input type="radio" name="nasf_tipo" value="1"/></label>&nbsp;&nbsp;&nbsp;
					<label>Não <input type="radio" name="nasf_tipo" value="1"/></label>					
				</div>
				<div class="col-md-12">
					Caso sim:<br><br>
					Quais?<br>
					<label><input type="checkbox" id="nm_orientacao" name="nm_orientacao" value="1"/> Ultrassom</label><br>
					<label><input type="checkbox" id="nm_orientacao" name="nm_orientacao" value="1"/> Radiografia</label><br>
					<label><input type="checkbox" id="nm_orientacao" name="nm_orientacao" value="1"/> Tomografia</label><br>
					<label><input type="checkbox" id="nm_orientacao" name="nm_orientacao" value="1"/> Ressonância Magnética</label><br>
					<label><input type="checkbox" id="nm_orientacao" name="nm_orientacao" value="1"/> Mamografia</label><br>
					<label><input type="checkbox" id="nm_orientacao" name="nm_orientacao" value="1"/> Densitometria Óssea</label>
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
	valid = checkLength('nm_orientacao', 'Orientação', 2) && valid;		
	return valid;	
}	
function atualizaBoxLocalidade(){
	var cd_estado = $('#cd_estado').val();
	$('#boxLocalidade').load('partials/localizacao_box.php', {cd_estado: cd_estado});
}

</script>