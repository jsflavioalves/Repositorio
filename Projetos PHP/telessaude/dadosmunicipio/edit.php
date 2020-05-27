<?php
defined('EXEC') or die();	

if(@!$_GET['codigo']) {
	die('sem município...');
}

$codigo = @$_GET['codigo'];
$sql = "select tm.*, ntdm.* from nuteds.tb_dados_municipio as ntdm
inner join integracao.tb_municipio as tm on(ntdm.cd_municipio=tm.codigo)
where ntdm.cd_municipio = $codigo";
$query = query($sql);
$rowEdit = $query->fetch();


if(@$_GET['db']) {

	$sqlColumns = [];
	$sqlValues = [];
	$sql = 'UPDATE nuteds.tb_dados_municipio set ';
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
	$sql .= ' where cd_municipio = '.$codigo;

	//$sql = 'UPDATE nuteds.tb_dados_municipio set ('.implode(', ', $sqlColumns).') values('.implode(', ', $sqlValues).');';
	//echo $sql;


	if(execute($sql)) {
		Controller::setInfo('Município', 'Salvo com sucesso!');	
		Controller::redirect('index.php?page=view&codigo='.$codigo);	
	}

	
}


?>

<div class="row">
	<div class="col-md-6">
		<h3 class="nuteds-title"><?php echo $rowEdit['nome']; ?> </h3>
	</div>
	<div class="col-md-6">
		<a href="index.php?page=view&codigo=<?php echo $codigo; ?>" class="btn btn-primary pull-right">Voltar</a><br><br>
	</div>
</div>

<!-- FORMULÁRIO DE CADASTRO -->
<form action="<?php echo Util::setLink(array('db=1')) ?>" method="post" id="formInsertEdit" onsubmit="return test();">		
			
			<div class="row"><div id="validateBox" class="col-md-8 col-md-offset-2"></div></div>
			
			<div class="row">
			
				<div class="col-md-6">
					<div class="col-md-3">
						CRES
						<input type="text" id="nr_cres" name="nr_cres" value="<?php echo @$rowEdit['nr_cres']; ?>" maxlength="10" class="form-control input-mask-numbers"/>
					</div>
					<div class="col-md-3">
						População
						<input type="text" id="nm_populacao" name="nm_populacao" value="<?php echo @$rowEdit['nm_populacao']; ?>" maxlength="20" class="form-control"/>
					</div>
				</div>		
				<div class="col-md-6">
					<div class="col-md-12">
						Site
						<input type="url" class="form-control" id="nm_site" name="nm_site" value="<?php echo @$rowEdit['nm_site']; ?>" maxlength="200" aria-describedby="basic-addon3">						
					</div>					
				</div>
			</div>

			<hr>
			<div class="row">
				<div class="col-md-6">
					<b>Prefeitura</b>
					<div class="col-md-12">
						Prefeito(a)
						<input type="text" id="nm_pr_nome" name="nm_pr_nome" value="<?php echo @$rowEdit['nm_pr_nome']; ?>" maxlength="200" class="form-control"/>
					</div>
					<div class="col-md-12">
						E-mail
						<input type="text" id="nm_pr_email" name="nm_pr_email" value="<?php echo @$rowEdit['nm_pr_email']; ?>" maxlength="200" class="form-control"/>
					</div>
					<div class="col-md-12">
						Telefones
						<input type="text" id="nm_pr_fone" name="nm_pr_fone" value="<?php echo @$rowEdit['nm_pr_fone']; ?>" maxlength="100" class="form-control"/>
					</div>
					<div class="col-md-12">
						Endereço
						<input type="text" id="nm_pr_endereco" name="nm_pr_endereco" value="<?php echo @$rowEdit['nm_pr_endereco']; ?>" maxlength="200" class="form-control"/>
					</div>
				</div>
				<div class="col-md-6">
					<b>Secretaria de Saúde</b>
					<div class="col-md-12">
						Secretário(a)
						<input type="text" id="nm_se_nome" name="nm_se_nome" value="<?php echo @$rowEdit['nm_se_nome']; ?>" maxlength="200" class="form-control"/>
					</div>
					<div class="col-md-12">
						E-mail
						<input type="text" id="nm_se_email" name="nm_se_email" value="<?php echo @$rowEdit['nm_se_email']; ?>" maxlength="200" class="form-control"/>
					</div>
					<div class="col-md-12">
						Telefones
						<input type="text" id="nm_se_fone" name="nm_se_fone" value="<?php echo @$rowEdit['nm_se_fone']; ?>" maxlength="100" class="form-control"/>
					</div>
					<div class="col-md-12">
						Endereço
						<input type="text" id="nm_se_endereco" name="nm_se_endereco" value="<?php echo @$rowEdit['nm_se_endereco']; ?>" maxlength="200" class="form-control"/>
					</div>
				</div>
			</div>
			
			<hr>

			<div class="row">
				<div class="col-md-2">
					Programa Mais Médicos
					<input type="text" id="nr_mais_medicos" name="nr_mais_medicos" value="<?php echo @$rowEdit['nr_mais_medicos']; ?>" placeholder="Profissionais" maxlength="10" class="form-control input-mask-numbers"/>
				</div>
				<div class="col-md-2">
					Equipes da Saúde da Família
					<input type="text" id="nr_equipe_saude" name="nr_equipe_saude" value="<?php echo @$rowEdit['nr_equipe_saude']; ?>" placeholder="Profissionais" maxlength="10" class="form-control input-mask-numbers"/>
				</div>
				<div class="col-md-2">
					Número de NASF
					<input type="text" id="nr_nasf" name="nr_nasf" value="<?php echo @$rowEdit['nr_nasf']; ?>" maxlength="10" class="form-control input-mask-numbers"/>
				</div>
				<div class="col-md-2">
					Tipo NASF<br>
					<div style="margin-top:7px;">
						<label><input type="radio" name="nr_nasf_tipo" value="1" <?php echo (@$rowEdit['nr_nasf_tipo'] == '1' ? 'checked="checked"' : ''); ?>/> 1 &nbsp;&nbsp;&nbsp;</label>
						<label><input type="radio" name="nr_nasf_tipo" value="2" <?php echo (@$rowEdit['nr_nasf_tipo'] == '2' ? 'checked="checked"' : ''); ?>/> 2 &nbsp;&nbsp;&nbsp;</label>
						<label><input type="radio" name="nr_nasf_tipo" value="3" <?php echo (@$rowEdit['nr_nasf_tipo'] == '3' ? 'checked="checked"' : ''); ?>/> 3</label>
					</div>
				</div>
				<div class="col-md-2">
					SAD?<br>
					<div style="margin-top:7px;">
						<label><input type="radio" name="fl_sad" value="true" <?php echo (@$rowEdit['fl_sad'] == 't' ? 'checked="checked"' : ''); ?>/> Sim &nbsp;&nbsp;&nbsp;</label>
						<label><input type="radio" name="fl_sad" value="false" <?php echo (@$rowEdit['fl_sad'] == 'f' ? 'checked="checked"' : ''); ?>/> Não</label>
					</div>
				</div>
			</div>

			<hr>

			<div class="row">				
				<div class="col-md-3">
					Cardiologista?<br>
					<div style="margin-top:7px;">
						<label><input type="radio" name="fl_cardio" value="true" <?php echo (@$rowEdit['fl_cardio'] == 't' ? 'checked="checked"' : ''); ?>/> Sim &nbsp;&nbsp;&nbsp;</label>
						<label><input type="radio" name="fl_cardio" value="false" <?php echo (@$rowEdit['fl_cardio'] == 'f' ? 'checked="checked"' : ''); ?>/>	Não</label>
					</div>
				</div>
				<div class="col-md-3">
					Cardiologista visita? 
					<input type="text" id="nr_cardio_visita" name="nr_cardio_visita" placeholder="Frequência em dias" value="<?php echo @$rowEdit['nr_cardio_visita']; ?>" maxlength="4" class="form-control input-mask-numbers"/>
				</div>
				<div class="col-md-3">
					Eletrocardiógrafo Digital?<br>
					<div style="margin-top:7px;">
						<label><input type="radio" name="fl_eletro_digital" value="true" <?php echo (@$rowEdit['fl_eletro_digital'] == 't' ? 'checked="checked"' : ''); ?>/> Sim &nbsp;&nbsp;&nbsp; </label>
						<label><input type="radio" name="fl_eletro_digital" value="false" <?php echo (@$rowEdit['fl_eletro_digital'] == 'f' ? 'checked="checked"' : ''); ?>/> Não </label>	
					</div>
				</div>
				<div class="col-md-3">
					Modelo Eletrocardiógrafo
					<input type="text" id="nm_eletro_modelo" name="nm_eletro_modelo" value="<?php echo @$rowEdit['nm_eletro_modelo']; ?>" maxlength="100" class="form-control"/>
				</div>
			</div>

			<hr>
			
			<div class="row">
				<div class="col-md-6">
					Especialidades no município<br>
					<div style="margin-top:7px;">
						<label><input type="checkbox" name="fl_esp_1" value="true" <?php echo (@$rowEdit['fl_esp_1'] == 't' ? 'checked="checked"' : ''); ?>/> CARDIOLOGISTA</label><br>
						<label><input type="checkbox" name="fl_esp_9" value="true" <?php echo (@$rowEdit['fl_esp_9'] == 't' ? 'checked="checked"' : ''); ?>/> CIRURGIA DE CABEÇA E PESCOÇO</label><br>
						<label><input type="checkbox" name="fl_esp_2" value="true" <?php echo (@$rowEdit['fl_esp_2'] == 't' ? 'checked="checked"' : ''); ?>/> DERMATOLOGISTA</label><br>
						<label><input type="checkbox" name="fl_esp_10" value="true" <?php echo (@$rowEdit['fl_esp_10'] == 't' ? 'checked="checked"' : ''); ?>/> ENDOCRINOLOGISTA</label><br>
						<label><input type="checkbox" name="fl_esp_8" value="true" <?php echo (@$rowEdit['fl_esp_8'] == 't' ? 'checked="checked"' : ''); ?>/> GINECOLOGIA-OBSTETRICIA</label><br>
						<label><input type="checkbox" name="fl_esp_12" value="true" <?php echo (@$rowEdit['fl_esp_12'] == 't' ? 'checked="checked"' : ''); ?>/> HEMATOLOGIA E HEMOTERAPIA</label><br>
						<label><input type="checkbox" name="fl_esp_11" value="true" <?php echo (@$rowEdit['fl_esp_11'] == 't' ? 'checked="checked"' : ''); ?>/> INFECTOLOGISTA</label><br>
						<label><input type="checkbox" name="fl_esp_3" value="true"<?php echo (@$rowEdit['fl_esp_3'] == 't' ? 'checked="checked"' : ''); ?>/> PEDIATRA</label>		
					</div>
				</div>
				<div class="col-md-6">
					Realiza exames de imagem?<br>
					<div style="margin-top:7px;">
						<label><input type="radio" name="fl_exame_imagem" value="true" <?php echo (@$rowEdit['fl_exame_imagem'] == 't' ? 'checked="checked"' : ''); ?>/> Sim &nbsp;&nbsp;&nbsp; </label>
						<label><input type="radio" name="fl_exame_imagem" value="false" <?php echo (@$rowEdit['fl_exame_imagem'] == 'f' ? 'checked="checked"' : ''); ?>/> Não </label>					
					</div>
					
					<div style="margin-top:7px;">
						<label><input type="checkbox" name="fl_exame_imagem_1" value="true" <?php echo (@$rowEdit['fl_exame_imagem_1'] == 't' ? 'checked="checked"' : ''); ?>/> ULTRASSOM</label><br>
						<label><input type="checkbox" name="fl_exame_imagem_2" value="true" <?php echo (@$rowEdit['fl_exame_imagem_2'] == 't' ? 'checked="checked"' : ''); ?>/> RADIOGRAFIA</label><br>
						<label><input type="checkbox" name="fl_exame_imagem_3" value="true" <?php echo (@$rowEdit['fl_exame_imagem_3'] == 't' ? 'checked="checked"' : ''); ?>/> TOMOGRAFIA</label><br>
						<label><input type="checkbox" name="fl_exame_imagem_4" value="true" <?php echo (@$rowEdit['fl_exame_imagem_4'] == 't' ? 'checked="checked"' : ''); ?>/> RESSONÂNCIA MAGNÉTICA</label><br>
						<label><input type="checkbox" name="fl_exame_imagem_5" value="true" <?php echo (@$rowEdit['fl_exame_imagem_5'] == 't' ? 'checked="checked"' : ''); ?>/> MAMOGRAFIA</label><br>
						<label><input type="checkbox" name="fl_exame_imagem_6" value="true" <?php echo (@$rowEdit['fl_exame_imagem_6'] == 't' ? 'checked="checked"' : ''); ?>/> DENSITOMETRIA ÓSSEA</label>
					</div>
				</div>
			</div>

			<br>			

			<button id="btInsertEdit" type="submit" class="btn btn-success btn-lg">Salvar Município</button>
			<img class="loader" src="assets/loading.gif"/>
			
		</form>