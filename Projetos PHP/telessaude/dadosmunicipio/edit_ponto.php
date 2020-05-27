<?php
defined('EXEC') or die();	

if(@!$_GET['id']) {
	die('sem codigo...');
}

$id = $_GET['id'];
$sql = 'select * from nuteds.tb_pontos_telessaude where id = '.$id;
$query = query($sql);
$rowEdit = $query->fetch();
$codigo = $rowEdit['cd_dados_municipio'];

$sql = "select tm.*, ntdm.* from nuteds.tb_dados_municipio as ntdm
inner join integracao.tb_municipio as tm on(ntdm.cd_municipio=tm.codigo)
where ntdm.cd_municipio = $codigo";
$query = query($sql);
$row = $query->fetch();

if(@$_GET['db']) {

	$sqlColumns = [];
	$sqlValues = [];
	$sql = 'UPDATE nuteds.tb_pontos_telessaude set ';
	foreach($_POST as $key=>$value) {
		$sqlColumns[] = $key;
		if(!$value) {
			$value = 'null';
		}
		else {
			if(strpos($key, 'nm') === 0) {
				$value = "'".$value."'";
			}
		}
		$sqlValues[] = $value;

		$sql .= $key.'='.$value.', ';		
	}
	$sql = substr($sql, 0, -2);
	$sql .= ' where id = '.$id;

	if(execute($sql)) {
		Controller::setInfo('Ponto de Telessaúde', 'Salvo com sucesso!');	
		Controller::redirect('index.php?page=view&codigo='.$codigo);	
	}
	
}


?>

<div class="row">
	<div class="col-md-6">
		<h3 class="nuteds-title"><?php echo $row['nome']; ?> - Ponto de Telessaúde</h3>
	</div>
	<div class="col-md-6">
		<a href="index.php?page=view&codigo=<?php echo $row['codigo']; ?>" class="btn btn-primary pull-right">Voltar</a><br><br>
	</div>
</div>

<!-- FORMULÁRIO DE CADASTRO -->
<form action="<?php echo Util::setLink(array('db=1')) ?>" method="post" id="formInsertEdit" onsubmit="return test();">		
			
			<div class="row"><div id="validateBox" class="col-md-8 col-md-offset-2"></div></div>
			
			<div class="row">
				<div class="col-md-3">
					CNES
					<input type="text" id="nr_cnes" name="nr_cnes" value="<?php echo @$rowEdit['nr_cnes']; ?>" maxlength="10" class="form-control input-mask-numbers"/>
				</div>				
				<div class="col-md-9">
					Tipo
					<div style="margin-top:7px;">
						<label><input type="radio" name="tp_tipo" value="1" <?php echo (@$rowEdit['tp_tipo'] == '1' ? 'checked="checked"' : ''); ?>/> Unidade Básica de Saúde &nbsp;&nbsp;&nbsp;</label>
						<label><input type="radio" name="tp_tipo" value="2" <?php echo (@$rowEdit['tp_tipo'] == '2' ? 'checked="checked"' : ''); ?>/> Hospital &nbsp;&nbsp;&nbsp;</label>
						<label><input type="radio" name="tp_tipo" value="3" <?php echo (@$rowEdit['tp_tipo'] == '3' ? 'checked="checked"' : ''); ?>/> Secretaria de Saúde</label>
					</div>
				</div>
			</div>

			<hr>

			<div class="row">
				<div class="col-md-6">
					Nome
					<input type="text" id="nm_nome" name="nm_nome" value="<?php echo @$rowEdit['nm_nome']; ?>" maxlength="200" class="form-control"/>
				</div>
				<div class="col-md-6">
					Endereço
					<input type="text" id="nm_endereco" name="nm_endereco" value="<?php echo @$rowEdit['nm_endereco']; ?>" maxlength="200" class="form-control"/>
				</div>
				<div class="col-md-6">
					Coordenador
					<input type="text" id="nm_coordenador" name="nm_coordenador" value="<?php echo @$rowEdit['nm_coordenador']; ?>" maxlength="200" class="form-control"/>
				</div>
				<div class="col-md-6">
					Responsável
					<input type="text" id="nm_responsavel" name="nm_responsavel" value="<?php echo @$rowEdit['nm_responsavel']; ?>" maxlength="200" class="form-control"/>
				</div>
				<div class="col-md-6">
					E-mail
					<input type="text" id="nm_email" name="nm_email" value="<?php echo @$rowEdit['nm_email']; ?>" maxlength="200" class="form-control"/>
				</div>
				<div class="col-md-6">
					Telefone
					<input type="text" id="nm_fone" name="nm_fone" value="<?php echo @$rowEdit['nm_fone']; ?>" maxlength="200" class="form-control"/>
				</div>
				<div class="col-md-6">
					Ocupação
					<input type="text" id="nm_ocupacao" name="nm_ocupacao" value="<?php echo @$rowEdit['nm_ocupacao']; ?>" maxlength="200" class="form-control"/>
				</div>				
			</div>
			
			<hr>

			<div class="row">				
				<div class="col-md-3">
					Sala para palestras?<br>
					<div style="margin-top:7px;">
						<label><input type="radio" name="fl_sala_palestra" value="true" <?php echo (@$rowEdit['fl_sala_palestra'] == 't' ? 'checked="checked"' : ''); ?>/> Sim &nbsp;&nbsp;&nbsp;</label>
						<label><input type="radio" name="fl_sala_palestra" value="false" <?php echo (@$rowEdit['fl_sala_palestra'] == 'f' ? 'checked="checked"' : ''); ?>/>	Não</label>
					</div>
				</div>
				<div class="col-md-3">
					Telecaridologia?<br>
					<div style="margin-top:7px;">
						<label><input type="radio" name="fl_telecardio" value="true" <?php echo (@$rowEdit['fl_telecardio'] == 't' ? 'checked="checked"' : ''); ?>/> Sim &nbsp;&nbsp;&nbsp;</label>
						<label><input type="radio" name="fl_telecardio" value="false" <?php echo (@$rowEdit['fl_telecardio'] == 'f' ? 'checked="checked"' : ''); ?>/>	Não</label>
					</div>
				</div>
				<div class="col-md-3">
					Internet?<br>
					<div style="margin-top:7px;">
						<label><input type="radio" name="fl_internet" value="true" <?php echo (@$rowEdit['fl_internet'] == 't' ? 'checked="checked"' : ''); ?>/> Sim &nbsp;&nbsp;&nbsp;</label>
						<label><input type="radio" name="fl_internet" value="false" <?php echo (@$rowEdit['fl_internet'] == 'f' ? 'checked="checked"' : ''); ?>/>	Não</label>
					</div>
				</div>
				<div class="col-md-3">
					Velocidade Internet
					<select id="nm_internet_velocidade" name="nm_internet_velocidade" class="form-control">
						<option value="" <?php echo (@$rowEdit['nm_internet_velocidade'] == '' ? 'selected="selected"' : ''); ?>>...</option>
						<option value="1" <?php echo (@$rowEdit['nm_internet_velocidade'] == '1' ? 'selected="selected"' : ''); ?>>1mb</option>
						<option value="2" <?php echo (@$rowEdit['nm_internet_velocidade'] == '2' ? 'selected="selected"' : ''); ?>>2mb</option>
						<option value="5" <?php echo (@$rowEdit['nm_internet_velocidade'] == '5' ? 'selected="selected"' : ''); ?>>5mb</option>
						<option value="10" <?php echo (@$rowEdit['nm_internet_velocidade'] == '10' ? 'selected="selected"' : ''); ?>>10mb</option>
						<option value="15" <?php echo (@$rowEdit['nm_internet_velocidade'] == '15' ? 'selected="selected"' : ''); ?>>15mb</option>
						<option value="20" <?php echo (@$rowEdit['nm_internet_velocidade'] == '20' ? 'selected="selected"' : ''); ?>>20mb ou +</option>						
					</select>					
				</div>
			</div>

			<br>			

			<button id="btInsertEdit" type="submit" class="btn btn-success btn-lg">Salvar Ponto de Telessaúde</button>
			<img class="loader" src="assets/loading.gif"/>
			
		</form>