<?php
defined('EXEC') or die();
$transacao = 'paciente';
$ufDefault = 'CE';

if(!$auth->isRead($transacao)){
	Util::info(Config::AUTH_MESSAGE);
	return true;
}

//Importando a classe de SQL
Loader::import('com.atitudeweb.SQL');

//Exclusão de vários ou um registro
if(isset($_POST['checkdel'])){	
	if($auth->isDelete($transacao)){	
		if(SQL::remove('tb_paciente', 'ci_paciente', $_POST['checkdel'])){
			Util::notice('Paciente', 'Excluído com sucesso!');	
		}
		else{
			Util::notice('Paciente', 'Houve um erro ao excluir!', 'error');
		}
	}
	else{
		Util::info(Config::AUTH_MESSAGE);
	}
}

//Alteração ou inclusão de um registro
if(isset($_GET['db']) && isset($_GET['form'])){
	
	$ci_paciente = $_GET['form'];
	$cd_usuario = $user['ci_usuario'];	
	$cd_localidade = $_POST['cd_localidade'];
	$nm_paciente = addslashes($_POST['nm_paciente']);
	$nr_cpf = (@$_POST['nr_cpf'] ? "'".addslashes($_POST['nr_cpf'])."'" : 'null');
	$nr_rg = (@$_POST['nr_rg'] ? "'".$_POST['nr_rg']."'" : 'null');
	$ds_orgao_emissor = (@$_POST['ds_orgao_emissor'] ? "'".$_POST['ds_orgao_emissor']."'" : 'null');
	$dt_nascimento = (@$_POST['dt_nascimento'] ? $_POST['dt_nascimento'] : 'null');
	if(@$_POST['dt_nascimento']){
		$parts = explode('/', $dt_nascimento);
		$dt_nascimento = "'".$parts[2].'-'.$parts[1].'-'.$parts[0]."'";
	}
	$fl_sexo = $_POST['fl_sexo'];
	$nr_codigo = $_POST['nr_codigo'];
	$ds_endereco = (@$_POST['ds_endereco'] ? "'".addslashes($_POST['ds_endereco'])."'" : 'null');
	$nr_numero = (@$_POST['nr_numero'] ? "'".addslashes($_POST['nr_numero'])."'" : 'null');
	$ds_complemento = (@$_POST['ds_complemento'] ? "'".addslashes($_POST['ds_complemento'])."'" : 'null');
	$ds_bairro = (@$_POST['ds_bairro'] ? "'".addslashes($_POST['ds_bairro'])."'" : 'null');
	$nr_cep = (@$_POST['nr_cep'] ? "'".$_POST['nr_cep']."'" : 'null');
	$nr_telefone1 = (@$_POST['nr_telefone1'] ? "'".$_POST['nr_telefone1']."'" : 'null');
	$nr_telefone2 = (@$_POST['nr_telefone2'] ? "'".$_POST['nr_telefone2']."'" : 'null');
	$ds_email = (@$_POST['ds_email'] ? "'".$_POST['ds_email']."'" : 'null');
	
	$pass = true;
	
	//Caso esteja alterando o paciente e não seja administrador, não poderá alterar o nome cpf e rg	
	if($auth->isOn('paciente_cad_facil')){
		if($_GET['form'] > 0 && !$auth->isAdmin()){
			$queryTest = query("select nm_paciente, nr_codigo from tb_paciente where ci_paciente=".$_GET['form'])->fetch();
			if($nr_codigo != $queryTest['nr_codigo']){ //$nm_paciente != $queryTest['nm_paciente'] || 
				$pass = false;
				//$rowEdit = $_POST;
				Util::alert('Não é possível alterar o Nome Completo e CNS!');
				Util::info('Entre em contato com a equipe administrativa.');
			}
		}
	}
	else{
		if($_GET['form'] > 0 && !$auth->isAdmin()){
			$queryTest = query("select nm_paciente, nr_codigo, nr_cpf, nr_rg, ds_orgao_emissor from tb_paciente where ci_paciente=".$_GET['form'])->fetch();
			if($nm_paciente != $queryTest['nm_paciente'] || $nr_codigo != $queryTest['nr_codigo'] || $_POST['nr_cpf'] != $queryTest['nr_cpf'] 
				|| $_POST['nr_rg'] != $queryTest['nr_rg'] || $_POST['ds_orgao_emissor'] != $queryTest['ds_orgao_emissor']){
				$pass = false;
				//$rowEdit = $_POST;
				Util::alert('Não é possível alterar o Nome Completo, CNS, CPF, RG e Órgão Emissor!');
				Util::info('Entre em contato com a equipe administrativa.');
			}
		}	
	}
	
	if($pass){
	
		//Validando para que não haja cns, cpf e emails duplicados
		$queryTestCNS = query("select ci_paciente from tb_paciente where nr_codigo = '$nr_codigo' and ci_paciente != ".$_GET['form']);
		$queryTestCPF = query("select ci_paciente from tb_paciente where nr_cpf = $nr_cpf and ci_paciente != ".$_GET['form']);
		$queryTestEmail = query("select ci_paciente from tb_paciente where ds_email = '$ds_email' and ci_paciente != ".$_GET['form']);
		
		if($queryTestCNS->rowCount() > 0){
			$rowEdit = $_POST;
			Util::alert('Já existe um paciente com este CNS: '.$nr_codigo.' !');		
		}		
		elseif($queryTestCPF->rowCount() > 0){
			$rowEdit = $_POST;
			Util::alert('Já existe um paciente com este CPF: '.$nr_cpf.' !');		
		}
		elseif($queryTestEmail->rowCount() > 0 && $ds_email != ''){
			$rowEdit = $_POST;
			Util::alert('Já existe um paciente com este Email: '.$ds_email.' !');		
		}
		else{		
			if($_GET['form'] == 0){ //cadastro
				$sql = "INSERT INTO tb_paciente(
						cd_localidade, nm_paciente, nr_cpf, nr_rg, ds_orgao_emissor, 
						fl_sexo, nr_codigo, ds_endereco, ds_complemento, ds_bairro, nr_numero, 
						nr_cep, nr_telefone1, nr_telefone2, ds_email, dt_nascimento, cd_usuario_insert)
				VALUES ($cd_localidade, '$nm_paciente', $nr_cpf, $nr_rg, $ds_orgao_emissor, 
						'$fl_sexo', $nr_codigo, $ds_endereco, $ds_complemento, $ds_bairro, $nr_numero, 
						$nr_cep, $nr_telefone1, $nr_telefone2, $ds_email, $dt_nascimento, $cd_usuario);";		
			}	
			elseif($_GET['form'] > 0){ //alteração		
				$sql = "UPDATE tb_paciente
				   SET cd_localidade=$cd_localidade, nm_paciente='$nm_paciente', nr_cpf=$nr_cpf, nr_rg=$nr_rg, 
					   ds_orgao_emissor=$ds_orgao_emissor, fl_sexo='$fl_sexo', nr_codigo=$nr_codigo, ds_endereco=$ds_endereco, ds_complemento=$ds_complemento, 
					   ds_bairro=$ds_bairro, nr_numero=$nr_numero, nr_cep=$nr_cep, nr_telefone1=$nr_telefone1, nr_telefone2=$nr_telefone2, 
					   ds_email=$ds_email, dt_nascimento=$dt_nascimento, cd_usuario_update=$cd_usuario
				 WHERE ci_paciente = $ci_paciente;";			
			}		
			
			if(execute($sql)){
				Controller::setInfo('Paciente', 'Salvo com sucesso!');	
				Controller::redirect(Util::setLink(array('form=null', 'db=null')));	
			}
			else{
				Util::notice('Paciente', 'Ocorreu um erro!', 'error');	
			}
		}	
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
		if(@!$rowEdit){
			$rowEdit = query('select tp.*, to_char(tp.dt_nascimento, \'dd/mm/yyyy\') as dt_nascimento from tb_paciente tp where ci_paciente = '.$_GET['form'])->fetch();
		}
		else{
			foreach($rowEdit as $key=>$value){
				$rowEdit[$key] = addslashes($value);
			}
		}
		//Verificando o estado para carregar os municípios deste
		$rowUf = query('select sg_estado from tb_localidade where ci_localidade = '.$rowEdit['cd_localidade'])->fetch();
		$ufDefault = $rowUf['sg_estado'];		
	}
	
	//Consultando os estados e os municípios do estado padrão
	$sqlEstados = 'select distinct sg_estado from tb_localidade order by 1';
	$queryEstados = query($sqlEstados);
	$sqlMunicipios = "select ci_localidade, ds_localidade from tb_localidade where sg_estado = '$ufDefault' order by ds_localidade asc";
	$queryMunicipios = query($sqlMunicipios);	
}
else{ //Consulta no banco para listagem dos registros
	
	$where = '';
	$search = false;
	if(@$_POST['search1']){
		$term = addslashes($_POST['search1']);
		$where .=  "and nm_paciente ilike '%{$term}%' ";
		$search = true;
	}
	if(@$_POST['search2']){
		$term = addslashes($_POST['search2']);
		$where .=  "and nr_codigo ilike '%{$term}%' ";
		$search = true;
	}
	if(@$_POST['search3']){
		$term = addslashes($_POST['search3']);
		$where .= "and fl_sexo = {$term} ";
		$search = true;
	}
		
	if($search){
		$sql = "select 	tp.ci_paciente,
			tp.nm_paciente,
			tp.nr_cpf,
			tp.nr_codigo,
			tp.nr_cep,
			tl.sg_estado,
			tl.ds_localidade,
			tp.fl_sexo,
			to_char(tp.dt_nascimento, 'dd/mm/yyyy') as dt_nascimento
		from tb_paciente tp
		inner join tb_localidade tl on(tp.cd_localidade=tl.ci_localidade)
		where 1=1 $where
		order by tp.nm_paciente asc
		limit {$limitPagina} offset ".(($p - 1) * $limitPagina);
		$query = query($sql);
		$sqlNum = "select count(*) as num from tb_paciente where 1=1 $where";
		$rowNum = query($sqlNum)->fetch();
		$registros = $rowNum['num'];	
		$paginacao = Util::pagination($registros, 3);	
	}
}

?>

	<div class="row bgGrey">
		<img src="assets/paciente.png"/>
		<span class="actiontitle">Pacientes</span>
		<span class="actionview"> - <?php echo (!isset($_GET['form']) ? 'Pesquisa' : (@$_GET['form'] > 0 ? 'Edição' : 'Cadastro')); ?></span>
		<?php if(!isset($_GET['form'])){ ?>
			<button type="button" id="btAdd" class="btn btn-info btn-sm pull-right"><span class="glyphicon glyphicon-plus-sign"></span> Novo</button>   
		<?php } else{ ?>		
			<button id="btVoltar" onclick="window.location='?page=paciente';" class="btn btn-info btn-sm pull-right"><span class="glyphicon glyphicon-circle-arrow-left"></span> Voltar</button>
		<?php } ?>		
	</div>
	
	<!-- FORMULÁRIO DE PESQUISA -->
	<?php if(!isset($_GET['form'])){ ?>	
	
		<?php if(@$_POST['search'] && (!@$_POST['search1'] && !@$_POST['search2'] && !@$_POST['search3'])) { ?>
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="alert alert-warning">
						<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
						<p>Preencha um dos campos abaixo para pesquisa!</p>
					</div>
				</div>
			</div>
		<?php } ?>
	
		<form action="<?php echo Util::setLink(array('p=null')); ?>" method="post">
			<div class="row">
				<div class="col-lg-6 col-lg-offset-3">
					<div class="col-lg-9">
						<label>Nome Completo:</label><input type="text" class="form-control" id="search1" name="search1" placeholder="Digite o nome do paciente" value="<?php echo @$_POST['search1']; ?>">
					</div>
					<div class="col-lg-3">
						<label>Sexo:</label>
						<select id="search3" name="search3" class="form-control">
								<option value="0">...</option>
								<option value="1" <?php echo (@$_POST['search3'] == 1 ? 'selected="selected"' : ''); ?>>Masculino</option>
								<option value="2" <?php echo (@$_POST['search3'] == 2 ? 'selected="selected"' : ''); ?>>Feminino</option>
						</select>					
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 col-lg-offset-3">
					<div class="col-lg-9">					
						<label>CNS:</label>
						<div class="input-group">
						<input type="tel" id="search2" name="search2" value="<?php echo @$rowEdit['search2']; ?>" placeholder="Número do CNS" maxlength="15" class="form-control input-mask-numbers"/>
						<span class="input-group-addon" data-toggle="modal" data-target="#modalCNS"><a href="#"><span class="glyphicon glyphicon-question-sign"></span></a></span>
						</div>
					</div>
					<div class="col-lg-3">
						<br/>
						<button type="submit" name="search" value="1" class="btn btn-info"><span class="glyphicon glyphicon-zoom-in"></span> Pesquisar</button>
					</div>
				</div>
			</div>
		</form>
	
		<br>	
		
		<?php if($search){ ?>
		
			<div class="row">
				<form id="formSearch" method="post">
					<div class="table-responsive btMarginRight">		
						
						<?php if($auth->isOn('paciente_cad_facil')){ ?>

							<!-- PACIENTE CADASTRO FÁCIL -->
							<table class="table table-hover table-bordered">
								<thead>
									<tr class="btn-info">
										<td><input id="btCheckAll" type="checkbox"></td>
										<th>Nome Completo</th>
										<th>CNS</th>
										<th>Município</th>
										<th>Sexo</th>
										<td></td>							
									</tr>
								</thead>
								<tbody>
									<?php 
									$fl_sexo[1] = 'M';
									$fl_sexo[2] = 'F';
									while($row = $query->fetch()){
									?>
									<tr>
										<td><input type="checkbox" name="checkdel[]" value="<?php echo $row['ci_paciente']; ?>" class="btCheck"></td>
										<td><?php echo $row['nm_paciente']; ?></td>
										<td><?php echo $row['nr_codigo']; ?></td>
										<td><?php echo $row['sg_estado'].' - '.$row['ds_localidade']; ?></td>
										<td class="text-center"><?php echo $fl_sexo[$row['fl_sexo']]; ?></td>
										<td class="text-center">
											<a href="javascript:void(0);" onclick="window.location='<?php echo Util::setLink(array('form='.$row['ci_paciente'])); ?>';">
												<span class="glyphicon glyphicon-edit"></span>
											</a>
										</td>
									</tr>
									<?php
									}
									?>
								</tbody>
							</table>
							
						<?php } else{ ?>
						
							<!-- PACIENTE CADASTRO NORMAL -->
							<table class="table table-hover">
								<thead>
									<tr class="btn-info">
										<td><input id="btCheckAll" type="checkbox"></td>
										<th>Nome Completo</th>
										<th>CNS</th>
										<th>Município</th>
										<th>CEP</th>
										<th>Nascimento</th>
										<th>Sexo</th>
										<td></td>							
									</tr>
								</thead>
								<tbody>
									<?php 
									$fl_sexo[1] = 'M';
									$fl_sexo[2] = 'F';
									while($row = $query->fetch()){
									?>
									<tr>
										<td><input type="checkbox" name="checkdel[]" value="<?php echo $row['ci_paciente']; ?>" class="btCheck"></td>
										<td><?php echo $row['nm_paciente']; ?></td>
										<td><?php echo $row['nr_codigo']; ?></td>
										<td><?php echo $row['sg_estado'].' - '.$row['ds_localidade']; ?></td>
										<td><?php echo $row['nr_cep']; ?></td>
										<td><?php echo $row['dt_nascimento']; ?></td>
										<td class="text-center"><?php echo $fl_sexo[$row['fl_sexo']]; ?></td>
										<td class="text-center">
											<a href="javascript:void(0);" onclick="window.location='<?php echo Util::setLink(array('form='.$row['ci_paciente'])); ?>';">
												<span class="glyphicon glyphicon-edit"></span>
											</a>
										</td>
									</tr>
									<?php
									}
									?>
								</tbody>
							</table>			
						<?php } ?>
						
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
		<?php } ?>
	
	<?php } else{ ?>	
	
	
		<!-- FORMULÁRIO DE CADASTRO -->
		<form action="<?php echo Util::setLink(array('db=1')) ?>" method="post" id="formInsertEdit" onsubmit="return test();">		
			
			<div class="row"><div id="validateBox" class="col-md-8 col-md-offset-2"></div></div>
			
			<?php if($auth->isOn('paciente_cad_facil')){ ?>
			
				<!-- PACIENTE CADASTRO FÁCIL -->
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<fieldset class="" style="">
							<legend>DADOS GERAIS</legend>		
							<div class="row">
							<div class="col-md-12">
								Nome Completo: *
								<input type="text" id="nm_paciente" name="nm_paciente" value="<?php echo @$rowEdit['nm_paciente']; ?>" maxlength="150" class="form-control"/>
							</div>
							</div>
							<div class="row">
							<div class="col-md-5">
								CNS: *
								<div class="input-group">
								<input type="tel" id="nr_codigo" name="nr_codigo" value="<?php echo @$rowEdit['nr_codigo']; ?>" placeholder="Número do CNS" maxlength="15" class="form-control input-mask-numbers"/>
								<span class="input-group-addon" data-toggle="modal" data-target="#modalCNS"><a href="#"><span class="glyphicon glyphicon-question-sign"></span></a></span>
								</div>
							</div>
							<div class="col-md-4 col-md-offset-3">
								Sexo: *
								<select id="fl_sexo" name="fl_sexo" class="form-control">
									<option value="1" <?php echo (@$rowEdit['fl_sexo'] == 1 ? 'selected="selected"' : ''); ?>>Masculino</option>
									<option value="2" <?php echo (@$rowEdit['fl_sexo'] == 2 ? 'selected="selected"' : ''); ?>>Feminino</option>
								</select>
							</div>
							</div>
							
							<div class="row">
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
										if(@$rowEdit['cd_localidade'] == $row['ci_localidade'])
											echo '<option value="'.$row['ci_localidade'].'" selected="selected">'.$row['ds_localidade'].'</option>';
										else
											echo '<option value="'.$row['ci_localidade'].'">'.$row['ds_localidade'].'</option>';
									}
									?>	
								</select>
								</div>
							</div>							
							</div>
						</fieldset>
					</div>
				</div>				
			
			<?php } else{ ?>
			
				<!-- PACIENTE CADASTRO NORMAL -->
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<fieldset class="" style="">
							<legend>DADOS PESSOAIS</legend>		
							<div class="row">
							<div class="col-md-12">
								Nome Completo: *
								<input type="text" id="nm_paciente" name="nm_paciente" value="<?php echo @$rowEdit['nm_paciente']; ?>" maxlength="150" class="form-control"/></td>
							</div>
							</div>
							<div class="row">
							<div class="col-md-5">
								CNS: *
								<div class="input-group">
								<input type="tel" id="nr_codigo" name="nr_codigo" value="<?php echo @$rowEdit['nr_codigo']; ?>" placeholder="Número do CNS" maxlength="15" class="form-control input-mask-numbers"/>
								<span class="input-group-addon" data-toggle="modal" data-target="#modalCNS"><a href="#"><span class="glyphicon glyphicon-question-sign"></span></a></span>								
								</div>
							</div>
							<div class="col-md-4 col-md-offset-3">
								RG: *
								<input type="tel" id="nr_rg" name="nr_rg" value="<?php echo @$rowEdit['nr_rg']; ?>" maxlength="20" class="form-control"/>
							</div>
							</div>
							<div class="row">
							<div class="col-md-4">
								CPF: *
								<input type="tel" id="nr_cpf" name="nr_cpf" value="<?php echo @$rowEdit['nr_cpf']; ?>" class="form-control input-mask-cpf"/>
							</div>
							<div class="col-md-4 col-md-offset-4">
								Orgão Emissor: *
								<input type="text" id="ds_orgao_emissor" name="ds_orgao_emissor" value="<?php echo @$rowEdit['ds_orgao_emissor']; ?>" maxlength="10" class="form-control"/>
							</div>
							</div>
							<div class="row">
							<div class="col-md-4">
								Data de Nascimento: *
								<div class="input-group date">
								  <input type="tel" id="dt_nascimento" name="dt_nascimento" value="<?php echo @$rowEdit['dt_nascimento']; ?>" class="form-control input-mask-date"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
								</div>
							</div>
							<div class="col-md-4 col-md-offset-4">
								Sexo: *
								<select id="fl_sexo" name="fl_sexo" class="form-control">
										<option value="1" <?php echo (@$rowEdit['fl_sexo'] == 1 ? 'selected="selected"' : ''); ?>>Masculino</option>
										<option value="2" <?php echo (@$rowEdit['fl_sexo'] == 2 ? 'selected="selected"' : ''); ?>>Feminino</option>
								</select>
							</div>
							</div>
						</fieldset>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<fieldset>
							<legend>ENDEREÇO E CONTATO</legend>		
							<div class="row">
							<div class="col-md-2">
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
							<div class="col-md-5">
								Município: *
								<div id="boxLocalidade">
								<select id="cd_localidade" name="cd_localidade" class="form-control">
									<?php
									while($row = $queryMunicipios->fetch()){
										if(@$rowEdit['cd_localidade'] == $row['ci_localidade'])
											echo '<option value="'.$row['ci_localidade'].'" selected="selected">'.$row['ds_localidade'].'</option>';
										else
											echo '<option value="'.$row['ci_localidade'].'">'.$row['ds_localidade'].'</option>';
									}
									?>	
								</select>
								</div>
							</div>
							<div class="col-md-4 col-md-offset-1">
								CEP: *
								<input type="tel" id="nr_cep" name="nr_cep" value="<?php echo @$rowEdit['nr_cep']; ?>" class="form-control input-mask-cep"/>
							</div>
							</div>
							<div class="row">
							<div class="col-md-8">
								Endereço: *
								<input type="mail" id="ds_endereco" name="ds_endereco" value="<?php echo @$rowEdit['ds_endereco']; ?>" maxlength="200" class="form-control" />
							</div>
							<div class="col-md-4">
								Nº.: *
								<input type="tel" id="nr_numero" name="nr_numero" value="<?php echo @$rowEdit['nr_numero']; ?>" maxlength="50" class="form-control"/>
							</div>
							</div>
							<div class="row">
							<div class="col-md-5">
								Bairro: *
								<input type="text" id="ds_bairro" name="ds_bairro" value="<?php echo @$rowEdit['ds_bairro']; ?>" maxlength="100" class="form-control"/>
							</div>
							<div class="col-md-4 col-md-offset-3">
								Compl.: 
								<input type="text" id="ds_complemento" name="ds_complemento" value="<?php echo @$rowEdit['ds_complemento']; ?>" maxlength="50" class="form-control"/>
							</div>
							</div>
							<div class="row">
							<div class="col-md-4">
								Telefone 1: *
								<input type="tel" id="nr_telefone1" name="nr_telefone1" value="<?php echo @$rowEdit['nr_telefone1']; ?>" class="form-control input-mask-phone"/>
							</div>
							<div class="col-md-4 col-md-offset-4">
								Telefone 2: 
								<input type="tel" id="nr_telefone2" name="nr_telefone2" value="<?php echo @$rowEdit['nr_telefone2']; ?>" class="form-control input-mask-phone"/>
							</div>
							</div>
							<div class="row">
							<div class="col-md-12">
								Email: 
								<input type="email" id="ds_email" name="ds_email" value="<?php echo @$rowEdit['ds_email']; ?>" maxlength="150" class="form-control"/>
							</div>
							</div>
						</fieldset>
					</div>
				</div>
				
			<?php } ?>
			
			<br>
			
			<div class="row">
				<div class="col-md-6 col-md-offset-3 text-center">
					<button id="btInsertEdit" type="submit" class="btn btn-success text-center">Salvar</button>
					<img class="loader" src="assets/loading.gif"/>
				</div>
			</div>				
			
		</form>		

	<?php } ?>

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

<script type="text/javascript">
<?php if($auth->isOn('paciente_cad_facil')){ ?>
function test(){	
	var valid = true;
	$("#formInsertEdit").find("input,select").each(function(index){
		$(this).removeClass("ui-state-error");						
	});	
	valid = checkLength('nm_paciente', 'Nome Completo', 2) && valid;
	if(!checkCNS($('#nr_codigo').val())){
		$('#nr_codigo').addClass("ui-state-error");
		valid = false;	
		updateTips('Cadastro Nacional do SUS inválido.');
	}
	return valid;	
}
<?php } else{ ?>
function test(){	
	var valid = true;
	$("#formInsertEdit").find("input,select").each(function(index){
		$(this).removeClass("ui-state-error");						
	});	
	valid = checkLength('nm_paciente', 'Nome Completo', 2) && valid;
	if(!checkCNS($('#nr_codigo').val())){
		$('#nr_codigo').addClass("ui-state-error");
		valid = false;	
		updateTips('Cadastro Nacional do SUS inválido.');
	}
	if(!checkCpf($('#nr_cpf').val())){
		$('#nr_cpf').addClass("ui-state-error");
		valid = false;	
		updateTips('CPF inválido.');
	}
	valid = checkLength('nr_cpf', 'CPF', 14) && valid;
	valid = checkLength('nr_rg', 'RG', 2) && valid;
	valid = checkLength('ds_orgao_emissor', 'Órgão Emissor', 2) && valid;
	if(!checkData($('#dt_nascimento').val())){
		$('#dt_nascimento').addClass("ui-state-error");
		valid = false;	
		updateTips('Data de Nascimento inválida.');
	}
	valid = checkLength('dt_nascimento', 'Data de Nascimento', 10) && valid;
	valid = checkLength('nr_cep', 'CEP', 2) && valid;
	valid = checkLength('ds_endereco', 'Endereço', 2) && valid;
	valid = checkLength('nr_numero', 'Número', 1) && valid;
	valid = checkLength('ds_bairro', 'Bairro', 2) && valid;
	valid = checkLength('nr_telefone1', 'Telefone1', 2) && valid;	
	if($('#ds_email').val().length > 1 && !checkMail($('#ds_email').val())){
		$('#ds_email').addClass("ui-state-error");
		valid = false;	
		updateTips('Email inválido.');
	}
	return valid;	
}
<?php } ?>
function atualizaBoxLocalidade(){
	var cd_estado = $('#cd_estado').val();
	$('#boxLocalidade').load('partials/localizacao_box.php', {cd_estado: cd_estado});
}
</script>