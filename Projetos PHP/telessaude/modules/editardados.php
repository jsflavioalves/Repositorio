<?php
defined('EXEC') or die();
$ufDefault = 'CE';

//Verificar se o usuário é um profissional
if(!$auth->isProfissional()){
	Util::alert('É necessário ser profissional para editar os dados de cadastro!');
	return;
}

//Alteração ou inclusão de um registro
if(isset($_GET['db'])){
	$ci_usuario = $user['ci_usuario'];
	$cd_localidade = @$_POST['cd_localidade'];
	$ds_endereco = @$_POST['ds_endereco'];
	$ds_complemento = @$_POST['ds_complemento'];
	$ds_bairro = @$_POST['ds_bairro'];
	$nr_numero = @$_POST['nr_numero'];
	$nr_cep = @$_POST['nr_cep'];
	$nr_telefone1 = @$_POST['nr_telefone1'];
	$nr_telefone2 = @$_POST['nr_telefone2'];	
	if(@$_POST['dt_nascimento']){
		$parts = explode('/', $_POST['dt_nascimento']);
		$dt_nascimento = "'".$parts[2].@$parts[1].@$parts[0]."'";
	}
	else{
		$dt_nascimento = 'null';	
	}
	
	
	$sql .= "UPDATE tb_profissional
	   SET cd_localidade=$cd_localidade, ds_endereco='$ds_endereco', ds_complemento='$ds_complemento', ds_bairro='$ds_bairro', 
		   nr_numero='$nr_numero', nr_cep='$nr_cep', nr_telefone1='$nr_telefone1', nr_telefone2='$nr_telefone2',  
		   dt_nascimento=$dt_nascimento
	 WHERE ci_profissional = $ci_usuario;";					 
	
	if(execute($sql)){		
		Controller::setInfo('Dados', 'Atualizados com sucesso!');
		Controller::redirect(Util::setLink(array('db=null')));	
	}
	else{
		Util::notice('Dados', 'Ocorreu um erro!', 'error');	
	}			
}

$ci_usuario = $user['ci_usuario'];
$sql = 'select tp.*, to_char(tp.dt_nascimento, \'dd/mm/yyyy\') as dt_nascimento, tu.*, to_char(tu.dt_acesso, \'dd/mm/yyyy às HH24:MI\') as dt_acesso, tpro.nm_profissao
from tb_profissional tp 
inner join tb_usuario tu on(tp.ci_profissional=tu.ci_usuario) 
inner join tb_profissao tpro on(tp.cd_profissao=tpro.ci_profissao)
where tp.ci_profissional = '.$ci_usuario;
$rowEditPro = query($sql)->fetch();
$queryGruposDisponiveis = query('select ci_grupo, nm_grupo, ds_descricao from tb_grupo where ci_grupo not in(select cd_grupo from tb_usuario_grupo where cd_usuario = '.$ci_usuario.') order by nm_grupo asc');
$queryGruposUtilizados = query('select tg.ci_grupo, tg.nm_grupo, tg.ds_descricao from tb_usuario_grupo tug inner join tb_grupo tg on(tug.cd_grupo=tg.ci_grupo) where tug.cd_usuario = '.$ci_usuario);
	
//Verificando o estado para carregar os municípios deste
$rowUf = query('select sg_estado from tb_localidade where ci_localidade = '.$rowEditPro['cd_localidade'])->fetch();
$ufDefault = $rowUf['sg_estado'];
	
//Consultando as profissões
$queryProfissoes = query('select * from tb_profissao order by 2');	

//Consultando os estados e os municípios do estado padrão
$sqlEstados = 'select distinct sg_estado from tb_localidade order by 1';
$queryEstados = query($sqlEstados);
$sqlMunicipios = "select ci_localidade, ds_localidade from tb_localidade where sg_estado = '$ufDefault' order by ds_localidade asc";
$queryMunicipios = query($sqlMunicipios);



?>
	
	<div class="row">
		
		<div class="col-md-6">	
			<div align="center">
				<img src="assets/user_icon.png" class="img-responsive"/><br>				
			</div>
				
			<div class="table-responsive btMarginRight">		
				<table class="table">
					<tr><td colspan="2" class="active" align="center"><?php echo $rowEditPro['nm_usuario']; ?></td></tr>
					<tr><td>Login</td><td><?php echo $rowEditPro['nm_login']; ?></td></tr>
					<tr>
						<td>Email</td>
						<td>
							<?php echo $rowEditPro['ds_email']; ?>
							<span class="label label-warning">Não validado</span><br>
							<button type="button" class="btn btn-secondary"><span class="glyphicon glyphicon-refresh"></span> Reenviar validação</button>
						</td>
					</tr>
					<tr><td>CPF</td><td><?php echo $rowEditPro['nr_cpf']; ?></td></tr>
					<tr><td>RG</td><td><?php echo $rowEditPro['nr_rg']; ?></td></tr>
					<tr><td>Profissão</td><td><?php echo $rowEditPro['nm_profissao']; ?></td></tr>
					<tr><td>Último acesso</td><td><?php echo $rowEditPro['dt_acesso']; ?></td></tr>
					
					
				</table>
			</div>
		</div>
		
	
		<div class="col-md-6">
			<form action="<?php echo Util::setLink(array('db=1')) ?>" method="post" id="formInsertEdit" onsubmit="return test();">			
				<legend>Atualizar meus dados</legend>
				<div id="validateBox""></div>
				<div class="row">
				<div class="col-md-3">
					UF
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
					Município
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
				</div>
				<div class="row">
					<div class="col-md-3">
						CEP
						<input type="tel" id="nr_cep" name="nr_cep" value="<?php echo @$rowEditPro['nr_cep']; ?>" maxlength="10" class="form-control input-mask-cep"/>
					</div>
					<div class="col-md-9">
						Endereço
						<input type="text" id="ds_endereco" name="ds_endereco" value="<?php echo @$rowEditPro['ds_endereco']; ?>" maxlength="200" class="form-control"/>
					</div>							
				</div>
				<div class="row">
					<div class="col-md-3">
						Nº.
						<input type="tel" id="nr_numero" name="nr_numero" value="<?php echo @$rowEditPro['nr_numero']; ?>" maxlength="10" class="form-control input-mask-numbers"/>
					</div>
					<div class="col-md-6">
						Bairro
						<input type="text" id="ds_bairro" name="ds_bairro" value="<?php echo @$rowEditPro['ds_bairro']; ?>" maxlength="100" class="form-control"/>
					</div>
					<div class="col-md-3">
						Complemento
						<input type="text" id="ds_complemento" name="ds_complemento" value="<?php echo @$rowEditPro['ds_complemento']; ?>" maxlength="50" class="form-control"/>
					</div>
				</div>
				<div class="row">
				<div class="col-md-4">
					Telefone fixo
					<input type="tel" id="nr_telefone1" name="nr_telefone1" value="<?php echo @$rowEditPro['nr_telefone1']; ?>" maxlength="14" class="form-control input-mask-phone"/>
				</div>
				<div class="col-md-4">
					Celular
					<input type="tel" id="nr_telefone2" name="nr_telefone2" value="<?php echo @$rowEditPro['nr_telefone2']; ?>" maxlength="14" class="form-control input-mask-phone"/>
				</div>
				<div class="col-md-4">
					Data de Nascimento
					<div class="input-group date">
					<input type="tel" id="dt_nascimento" name="dt_nascimento" value="<?php echo @$rowEditPro['dt_nascimento']; ?>" class="form-control input-mask-date"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
					</div>
				</div>
				</div>
				<br/>
				<div align="right">
					<img class="loader" src="assets/loading.gif"/>
					<button id="btInsertEdit" type="submit" class="btn btn-success">Salvar</button>					
				</div>
			</form>

			<br>

			<legend>Mais opções</legend>
			<button type="button" class="btn btn-primary">Alterar email</button>
			
		</div>
	</div>		
<script type="text/javascript">
function test(){
	var valid = true;
	if(!checkData($('#dt_nascimento').val())){
		$('#dt_nascimento').addClass("ui-state-error");
		valid = false;	
		updateTips('Data de Nascimento inválida.');
	}
	valid = checkLength('dt_nascimento', 'Data de Nascimento', 10) && valid;
	valid = checkLength('nr_cep', 'CEP', 2) && valid;
	valid = checkLength('ds_endereco', 'Endereço', 1) && valid;	
	valid = checkLength('nr_numero', 'Nº endereço', 1) && valid;
	valid = checkLength('ds_bairro', 'Bairro', 1) && valid;	
	valid = checkLength('nr_telefone1', 'Telefone1', 2) && valid;		
	return valid;
}
function atualizaBoxLocalidade(){
	var cd_estado = $('#cd_estado').val();
	$('#boxLocalidade').load('partials/localizacao_box.php', {cd_estado: cd_estado});
}
</script>