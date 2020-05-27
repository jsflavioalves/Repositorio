<?php
defined('EXEC') or die();
$transacao = 'usuario';
$ufDefault = 'CE';

if(!$auth->isUpdate($transacao) && !$auth->isAdmin()){
	Util::info(Config::AUTH_MESSAGE);
	return true;
}

if(@!$_GET['id'])
	exit;
	
//Salvando o formulário com os municípios e especialidades para o profissional
if(@$_POST['saveForm']){
	
	//Manipulando os municípios
	$sql = '';
	execute('delete from tb_profissional_localidade where cd_profissional = '.$_GET['id']);
	for($i=0;$i<count($_POST['listMunicipios']);$i++){
		$sql .= 'insert into tb_profissional_localidade(cd_profissional, cd_localidade) values('.$_GET['id'].', '.$_POST['listMunicipios'][$i].'); ';		
	}
	//echo $sql; exit;
	execute($sql);
	
	//Manipulando as especialidades
	$sql = '';
	execute('delete from tb_profissional_especialidade where cd_profissional = '.$_GET['id']);
	for($i=0;$i<count($_POST['listEspecialidades']);$i++){
		$sql .= 'insert into tb_profissional_especialidade (cd_profissional, cd_especialidade) values('.$_GET['id'].', '.$_POST['listEspecialidades'][$i].'); ';		
	}
	execute($sql);
	
	?>
	<script>
		window.parent.closeVinculos();		
	</script>
	<?php
	
	exit;
	//Controller::setInfo('Usuários', 'Vínculos profissionais salvos com sucesso!');
	//Controller::redirect('index.php?page=acesso/usuario');
}

//Consultando os dados do profissional
$rowProfissional = query('select tu.nm_usuario, tp.nr_cpf from tb_usuario tu join tb_profissional tp on(tu.ci_usuario=tp.ci_profissional) where tu.ci_usuario = '.$_GET['id'])->fetch();

//Consultando os estados e os municípios do estado padrão
$sqlEstados = 'select distinct sg_estado from tb_localidade order by 1';
$queryEstados = query($sqlEstados);
$sqlMunicipios = "select tl.ci_localidade, tl.ds_localidade from tb_localidade tl
inner join integracao.tb_municipio itm on(tl.ci_localidade=itm.cd_localidade)
where tl.sg_estado = '$ufDefault' 
order by tl.ds_localidade asc";
$queryMunicipios = query($sqlMunicipios);

//Consultando os municípios já selecionados
$sqlMunicipiosSel = 'select tl.ci_localidade, tl.ds_localidade, tl.sg_estado 
					from tb_profissional_localidade tpl
					join tb_localidade tl on(tpl.cd_localidade=tl.ci_localidade)
					where tpl.cd_profissional = '.$_GET['id'];
$queryMunicipiosSel = query($sqlMunicipiosSel);

//Consultando as especialidades
$queryEspecialidades = Connection::query('select te.ci_especialidade, te.nm_especialidade from tb_especialidade te
where te.ci_especialidade not in(
	select cd_especialidade from tb_profissional_especialidade tpe
	where tpe.cd_profissional = '.$_GET['id'].')
order by te.nm_especialidade asc');

?>

	<div class="row bgGrey">
		<img src="assets/usuarios.png"/>
		<span class="actiontitle">Profissionais</span>
		<span class="actionview"> - Vínculos</span>			
	</div>

	<br>
	
	<legend><?php echo $rowProfissional['nm_usuario'].' - '.$rowProfissional['nr_cpf']; ?></legend>	
	
	<br>
	
	<form method="post" onsubmit="return test();">
	<div class="col-lg-12">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				Municípios - Solicitação Teleconsultoria:
				<div class="row">
					
					
					<div class="col-lg-9 col-md-9 col-sm-11 col-xs-12">
						<div class="row">
								<div class="col-lg-11 col-md-11 col-sm-10 col-xs-12">
									<select id="cd_estado" name="cd_estado" onchange="atualizaBoxLocalidade();" class="form-control" style="width:100px;">
										<?php
										while($row = $queryEstados->fetch()){
											if($ufDefault == $row['sg_estado'])
												echo '<option value="'.$row['sg_estado'].'" selected="selected">'.$row['sg_estado'].'</option>';						
											else
												echo '<option value="'.$row['sg_estado'].'">'.$row['sg_estado'].'</option>';
										}
										?>	
									</select>
									<div id="boxLocalidade">											
										<select id="cd_localidade" name="cd_localidade" class="form-control">
										<?php
										while($row = $queryMunicipios->fetch()){
											echo '<option value="'.$row['ci_localidade'].'">'.$row['ds_localidade'].'</option>';
										}
										?>	
										</select>				
									</div>
								</div>
								<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
									<br>
									<button type="button" onclick="addMunicipio()" class="btn btn-info hackBt"><span class="glyphicon glyphicon-plus-sign"></span></button>
								</div>
						</div>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-11 col-xs-12">
					<div class="row hack-row">
						<br>
						<select id="listMunicipios" name="listMunicipios[]" multiple="multiple" size="10" style="font-family:courier; padding:0px;" class="form-control">
							<?php					
							while($row = $queryMunicipiosSel->fetch()){
								echo '<option value="'.$row['ci_localidade'].'" ondblclick="$(this).remove();">'.$row['sg_estado'].' - '.$row['ds_localidade'].'</option>';
							}
							?>
						</select>
						<span style="font-size:11px;"><i>Dê um duplo clique para remover</i></span>
						<hr>
					</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				Especialidades:
				<div class="row">
					<div class="col-lg-11 col-md-11 col-sm-10 col-xs-12">
						<div style="padding:7px;">&nbsp;</div>
						<select id="cd_especialidade" class="form-control">
							<?php 
							while($row = $queryEspecialidades->fetch()){
								echo '<option value="'.$row['ci_especialidade'].'">'.$row['nm_especialidade'].'</option>';
							}											
							?>
						</select>
					</div>
					<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12 hackBt">
						<br>
						<button type="button" onclick="addEspecialidade()" class="btn btn-info"><span class="glyphicon glyphicon-plus-sign"></span></button>
					</div>
				</div>
				<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="row hack-row">
					<br>
					<select id="listEspecialidades" name="listEspecialidades[]" multiple="multiple" size="10" style="font-family:courier; padding:0px" class="form-control">						
						<?php
						$sql = 'select te.ci_especialidade, te.nm_especialidade from tb_profissional_especialidade tpe
						inner join tb_especialidade te on(tpe.cd_especialidade=te.ci_especialidade)
						where tpe.cd_profissional = '.$_GET['id'].' order by te.nm_especialidade asc';
						$query_esp = Connection::query($sql);
						while($row = $query_esp->fetch()){
							echo '<option value="'.$row['ci_especialidade'].'" ondblclick="removeItem(this)">'.$row['nm_especialidade'].'</option>';
						}
						?>
					</select>
					<span style="font-size:11px;"><i>Dê um duplo clique para remover</i></span>
					<hr>
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
	
		<input type="hidden" name="saveForm" value="1"/>
		
		<div class="row">
			<div class="col-md-9 col-md-offset-1 text-center">
				<button id="btInsertEdit" type="submit" class="btn btn-success text-center">Salvar</button>
				<img class="loader" src="assets/loading.gif"/>
			</div>
		</div>
	
	</form>


<script type="text/javascript">
function addMunicipio(){
	var val = true;
	var nm_estado = $('#cd_estado option:selected').text();	
	var ci_municipio = $('#cd_localidade').val();
	var nm_municipio = $('#cd_localidade option:selected').text();
	
	$('#listMunicipios option').each(function(index, item){
		if($(item).attr('value') == ci_municipio){
			val = false;
		}
	});
	if(val)
		$('#listMunicipios').append('<option value="'+ci_municipio+'" ondblclick="$(this).remove();">'+nm_estado+' - '+nm_municipio+'</option>');	
}
function addEspecialidade(){
	var val = true;
	var ci_especialidade = $('#cd_especialidade').val();
	var nm_especialidade = $('#cd_especialidade option:selected').text();
	
	if(ci_especialidade != null){
	
		$('#listEspecialidades option').each(function(index, item){
			if($(item).attr('value') == ci_especialidade){
				val = false;
			}
		});
		if(val){
			$('#listEspecialidades').append('<option value="'+ci_especialidade+'" ondblclick="removeItem(this)">'+nm_especialidade+'</option>');
			$('#cd_especialidade option:selected').remove();
		}
	
	}
}
function removeItem(comp){
	var ci_table = $(comp).attr('value');
	var nm_table = $(comp).text();
	$('#cd_especialidade').append('<option value="'+ci_table+'">'+nm_table+'</option>');
	$(comp).remove();
}
function test(){
	var valid = true;
	$('#listMunicipios option').each(function(index, item){
		$(item).prop('selected', 'selected');
		
	});
	$('#listEspecialidades option').each(function(index, item){
		$(item).prop('selected', 'selected');
	});
	return valid;
}

function atualizaBoxLocalidade(){
	var cd_estado = $('#cd_estado').val();
	$('#boxLocalidade').load('partials/localizacao_box.php', {cd_estado: cd_estado});
}
</script>