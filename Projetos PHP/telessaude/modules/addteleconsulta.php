<?php
defined('EXEC') or die();

Controller::addHead('pell.min');
Controller::addHead('pell.min', 'css');


//VALIDANDO OS POSSÍVEIS ERROS NO CADASTRO DE UMA TELECONSULTA


///Se o usuário não for um profissional é emitida uma mensagem de erro
if(!$auth->isProfissional()){
	Util::info(Config::AUTH_MESSAGE);
	return true;
}

//Se o usuário não for vinculado a alguma transação de solicitação é emitida uma mensagem de erro
//Transações de solicitação de exame e segunda opnião formativa
if(!$auth->isOn('solicitante_exame') && !$auth->isOn('solicitante_2_op_form')){
	Util::info(Config::AUTH_MESSAGE);
	return true;
}

//Carregando classes
Loader::import('br.ufc.nuteds.Teleconsulta');
Loader::import('br.ufc.nuteds.File');

/**
 * Lança o registro da entidade mobile para o aplicativo se atualizar
 */
function refreshMobile() {
	//global $ci_teleconsulta, $row;
		
}

//Cadastro de uma nova teleconsulta
if(isset($_GET['db'])){
	
	//Processando variávies de formulário
	$cd_profissional_solicitante = $user['ci_usuario'];	
	$tp_tipo = $_POST['tiposolicitacao'];
	if($tp_tipo == Teleconsulta::TIPO_OPNIAO_FORMATIVA && $_POST['cd_paciente'] == 'paciente_padrao'){
		$cd_paciente = 'null';
	}
	else{
		$cd_paciente = $_POST['cd_paciente'];
	}	
	$cd_localidade = $_POST['cd_localidade'];
	$cd_especialidade = $_POST['cd_especialidade'];	
	$cd_duvida = ($_POST['cd_duvida'] == 0 ? 'null' : $_POST['cd_duvida']);
	$ds_solicitacao = ($_POST['ds_solicitacao'] ? "'".pg_escape_string($_POST['ds_solicitacao'])."'" : 'null');
	$fl_urgencia = (@$_POST['fl_urgencia'] == 1 ? 'true' : 'false');
	$nm_paciente = addslashes(@$_POST['paciente_nm_paciente']);
	
	//Adquirindo o código da teleconsulta
	$rowId = query("select nextval('tb_teleconsulta_ci_teleconsulta_seq') as num;")->fetch();
	$ci_teleconsulta = $rowId['num'];
		
	$sql = "INSERT INTO tb_teleconsulta(
	ci_teleconsulta, cd_profissional_solicitante, cd_paciente, 
	cd_localidade, cd_especialidade, 
	cd_duvida, tp_tipo, ds_solicitacao, fl_urgencia)
	VALUES ($ci_teleconsulta, $cd_profissional_solicitante, $cd_paciente, 
			$cd_localidade, $cd_especialidade, $cd_duvida, $tp_tipo, $ds_solicitacao, $fl_urgencia);";
	
	//Se for exame do tipo cardiologia, força para encontrar o arquivo
	if ($tp_tipo == Teleconsulta::TIPO_EXAME && @!$_FILES['file_upload']) { //$cd_especialidade == 1
		Util::notice('Teleconsultoria', 'Ocorreu um erro! Arquivo não encontrado!', 'error');	
	}
	else{
	
		if(@execute($sql)){	
			//Cadastrando o arquivo
			if(@$_FILES['file_upload']){
				$file = new File();
				$ds_localidade = null;			
				if(Teleconsulta::TIPO_EXAME == $tp_tipo){
					$rowLocalidade = query("select ds_localidade || '_' || sg_estado as ds_localidade from tb_localidade where ci_localidade = $cd_localidade")->fetch();
					$ds_localidade = $rowLocalidade['ds_localidade'];
				}
				$file->uploadCadastro($ci_teleconsulta, $tp_tipo, $nm_paciente, $cd_profissional_solicitante, $ds_localidade);
			}

			//Atualizando mobile
			if ($tp_tipo == Teleconsulta::TIPO_OPNIAO_FORMATIVA) {
				//$queryVerifica = query('select ci_mobile_log from tb_mobile_log where cd_profissional = '.$cd_profissional_solicitante.' limit 1');
				//if ($queryVerifica->rowCount() > 0) {
				//	execute('insert into tb_mobile_teleconsulta(cd_profissional, cd_teleconsulta) values('.$cd_profissional_solicitante.', '.$ci_teleconsulta.');');
				//}
				
				//Cadastrando a teleconsulta do serviço de informação do especialista
				query("insert into tb_service_mail_2 values($ci_teleconsulta, $cd_especialidade);");			
			}
			
			//Registrando a teleconsulta no histórico de emails		
			//refreshMobile($cd_profissional_solicitante, $ci_teleconsulta);
			Controller::setInfo('Teleconsultoria', 'Salva com sucesso!');	
			Controller::redirect('index.php?page=teleconsulta&id='.$ci_teleconsulta.'&view=h&type='.$tp_tipo);	
		}
		else{
			Util::notice('Teleconsultoria', 'Ocorreu um erro!', 'error');	
		}
	
	}
}

//Avaliando as permissões do usuário para o tipo de teleconsulta
$permissao = 0;
if($auth->isOn('solicitante_exame') && $auth->isOn('solicitante_2_op_form')){
	$permissao = 3;
}
elseif($auth->isOn('solicitante_exame')){
	$permissao = 2;
}
elseif($auth->isOn('solicitante_2_op_form')){
	$permissao = 1;
}

//Consultando os municípios vinculados ao usuário
$sqlMunicipios = 'select tl.ci_localidade, tl.sg_estado, tl.ds_localidade 
	from tb_profissional_localidade tpl
	inner join tb_localidade tl on(tpl.cd_localidade=tl.ci_localidade)
	where tpl.cd_profissional = '.$user['ci_usuario'].' order by tl.ds_localidade asc';
$queryMunicipios = query($sqlMunicipios);
$rowQueryMunicipios = $queryMunicipios->rowCount();

//Consultando as especialidades vinculadas ao usuário, porém somente as que poderão solicitar exames
if($permissao >= 2){
	$sqlEspecialidades = 'select te.ci_especialidade, te.nm_especialidade
		from tb_profissional_especialidade tpe
		inner join tb_especialidade te on(tpe.cd_especialidade=te.ci_especialidade)
		where te.fl_exame = true and tpe.cd_profissional = '.$user['ci_usuario'];
		//te.ci_especialidade != 12 and
}
elseif($permissao == 1){
	$sqlEspecialidades = 'select te.ci_especialidade, te.nm_especialidade
		from tb_profissional_especialidade tpe
		inner join tb_especialidade te on(tpe.cd_especialidade=te.ci_especialidade)
		where te.fl_online = true and tpe.cd_profissional = '.$user['ci_usuario'];
		//te.ci_especialidade != 12 and
}

$queryEspecialidades = query($sqlEspecialidades);

//Consultando as dúvidas
$queryDuvidas = Connection::query('select * from tb_duvida order by 2');
?>  
	
    <!-- FORMULÁRIO DE CADASTRO -->
	<form action="<?php echo Util::setLink(array('db=1')) ?>" method="post" enctype="multipart/form-data" id="formInsertEdit" onsubmit="return test();">
	<div class="row bgGrey">
		<img src="assets/addteleconsulta.png"/>
		<span class="actiontitle">Teleconsultoria</span>
		<span class="actionview"> - Cadastro</span>
	</div>
	<div class="marginBottom"></div>	
	<div class="row"><div id="validateBox" class="col-md-8 col-md-offset-2"></div></div>
	<div class="row">
		<div class="container bgTopGrey">			
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<legend>PACIENTE</legend>		
				</div>
			</div>
			<div class="row">
				<div class="col-md-3 col-md-offset-1">
					CNS:
					<div class="input-group">
					<input type="tel" id="paciente_nr_codigo" name="paciente_nr_codigo" value="" onkeypress="$('#paciente_nm_paciente').val(''); $('#cd_paciente').val(0);" onblur="paciente_get();" placeholder="Número do CNS" maxlength="15" class="form-control input-mask-numbers"/>
					<span class="input-group-addon" data-toggle="modal" data-target="#modalCNS"><a href="#"><span class="glyphicon glyphicon-question-sign"></span></a></span>
					</div>
				</div>
				<div class="col-md-4">
					Nome Completo:
					<input type="text" id="paciente_nm_paciente" name="paciente_nm_paciente" value="" onkeypress="$('#cd_paciente').val(0);" class="form-control">
					<input type="hidden" id="cd_paciente" name="cd_paciente" value="0"/>
				</div>
				<div class="col-md-3 form-inline">
					<br>
					<div class="col-xs-6 btCorrecao">						
						<a href="#" class="btn btn-info" data-toggle="modal" data-target="#modalPacienteSearch"><span class="glyphicon glyphicon-search"></span> Procurar</a>						
					</div>
					<div class="col-xs-6 btCorrecao">						
						<a href="#" class="btn btn-info" data-toggle="modal" data-target="#modalPacienteAdd"><span class="glyphicon glyphicon-plus-sign"></span> Adicionar</a>						
					</div>
				</div>
			</div>			
			<div class="marginBottom"></div>
			<div id="bloco_paciente_padrao" <?php echo ($permissao == 1 ? '' : 'style="display:none;"'); ?> class="row">
				<div class="col-md-3 col-md-offset-1">
					<label style="cursor:pointer;"><input id="fl_paciente_padrao" type="checkbox" onclick="changePacientePadrao();"/> PERGUNTA EDUCATIVA</label>
				</div>
			</div>
			<div class="marginBottom"></div>
		</div>
	</div>
	<br/>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<?php
			if($permissao == 3){
			?>
			<label style="cursor:pointer;" title="Solicitação de um exame simples">
				<input type="radio" value="1" name="tiposolicitacao" onclick="atualizaTipo()" checked="checked"/> EXAME
			</label>
			&nbsp;&nbsp;&nbsp;
			<label style="cursor:pointer;" title="Uma segunda opnião formalizada com respaudo médico">
				<input type="radio" value="2" name="tiposolicitacao" onclick="atualizaTipo()"/> OPNIÃO FORMATIVA
			</label>
			<?php
			}
			elseif($permissao == 2){
			?>
			<label style="cursor:pointer;" title="Solicitação de um exame simples">
				<input type="radio" value="1" name="tiposolicitacao" checked="checked"/> EXAME
			</label>
			<?php
			}
			elseif($permissao == 1){						
			?>
			<label style="cursor:pointer;" title="Uma segunda opnião formalizada com respaudo médico">
				<input type="radio" value="2" name="tiposolicitacao" checked="checked"/> OPNIÃO FORMATIVA
			</label>
			<?php
			}
			?>		
		</div>
	</div>
	<br/>
	<div class="row">
		<div class="col-md-3 col-md-offset-1">
			Município: *
			<select id="cd_localidade" name="cd_localidade" class="form-control">
					<?php 
						if($rowQueryMunicipios > 0) {
							while($row = $queryMunicipios->fetch()) {
								echo '<option value="'.$row['ci_localidade'].'">'.$row['sg_estado'].' - '.$row['ds_localidade'].'</option>';						
							}
						}
						else {
							echo '<option value="0">...</option>';						
						}
					?>					
			</select>
		</div>
		<div class="col-md-4">
			Especialidade: *
			<div id="cd_especialidade_box">
			<select id="cd_especialidade" name="cd_especialidade" class="form-control">
				<option value="0">...</option>
				<?php
				while($row = $queryEspecialidades->fetch()){
					echo '<option value="'.$row['ci_especialidade'].'">'.$row['nm_especialidade'].'</option>';
				}
				?>
			</select>
			</div>
		</div>
	</div>
	<div id="bloco_duvida" <?php echo ($permissao == 1 ? '' : 'style="display:none;"'); ?> class="row">
		<div class="col-md-5 col-md-offset-1">
			Tipo de Dúvida: *
			<select id="cd_duvida" name="cd_duvida" class="form-control">
				<option value="0">...</option>
				<?php
				while($row = $queryDuvidas->fetch()){
					echo '<option value="'.$row['ci_duvida'].'">'.$row['nm_duvida'].'</option>';						
				}
				?>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="col-md-7 col-md-offset-1">
			<div id="bloco_label_descricao"><?php echo ($permissao == 1 ? 'Descrição: *' : 'Descrição: '); ?></div>
			<div id="editor" class="pell"></div>
			<input type="hidden" name="ds_solicitacao" id="ds_solicitacao" value=""/>
		</div>
	</div>
	<div class="row">
		<div class="col-md-7 col-md-offset-1">
			<div id="bloco_label_anexo">Anexo: *</div>
			<input id="file_upload" type="file" name="file_upload" class="form-control" size="40"/>
			<div id="bloco_label_anexoinfo" <?php echo ($permissao == 1 ? '' : 'style="display:none;"'); ?>>* Será possível adicionar arquivos posteriormente.</div>
		</div>
	</div>	
	<div class="marginBottom"></div>
	<div id="bloco_urgencia" <?php echo ($permissao == 1 ? 'style="display:none;"' : ''); ?> class="row">
		<div class="col-md-4 col-md-offset-1">
			<label><input type="checkbox" name="fl_urgencia" id="fl_urgencia" value="1"/> Urgência?</label>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 col-md-offset-3 text-center">
			<button id="btInsertEdit" type="submit" class="btn btn-success text-center"><span class="glyphicon glyphicon-ok"></span> Salvar</button>
			<img class="loader" src="assets/loading.gif"/>
		</div>
	</div><br/>
	</form>
	<!-- FIM FORMULÁRIO DE CADASTRO -->

<!-- Modal CNS -->
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
<!-- Fim Modal CNS -->

<!-- Modal PacienteSearch -->
<div id="modalPacienteSearch" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog  modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>				
				<iframe src="partial.php?page=paciente_search" width="100%" height="500" style="border:none;"></iframe>				
			</div>
		</div>
	</div>
</div>
<!-- Fim Modal PacienteSearch -->

<!-- Modal PacienteAdd -->
<div id="modalPacienteAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog  modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>				
				<iframe src="partial.php?page=paciente_add" width="100%" height="430" style="border:none;"></iframe>				
			</div>
		</div>
	</div>
</div>
<!-- Fim Modal PacienteAdd -->

<script type="text/javascript">

$(function(){	
	pell.init({
		element:document.getElementById('editor'),
		onChange: function(html) {
			$('#ds_solicitacao').val(html);
		}
	});
});

function changePacientePadrao(){
	if($('#fl_paciente_padrao').is(':checked')){
		$('#paciente_nr_codigo').val('000000000000000');
		$('#paciente_nr_codigo').attr('disabled', true);
		$('#paciente_nm_paciente').val('PERGUNTA EDUCATIVA');
		$('#paciente_nm_paciente').attr('disabled', true);
		$('#cd_paciente').val('paciente_padrao');
	}
	else{
		$('#paciente_nr_codigo').val('');
		$('#paciente_nr_codigo').attr('disabled', false);
		$('#paciente_nm_paciente').val('');
		$('#paciente_nm_paciente').attr('disabled', false);
		$('#cd_paciente').val(0);
	}
}
function atualizaTipo(){
	var tipo = $("input[name='tiposolicitacao']:checked").val();
	$('#cd_especialidade_box').load('partials/especialidade_box.php', {tipo:tipo});	
	if(tipo == 1){
		$('#bloco_categoria_cid').hide();
		$('#bloco_subcategoria_cid').hide();
		$('#bloco_duvida').hide();
		$('#bloco_urgencia').show();
		$('#bloco_paciente_padrao').hide();
		$('#bloco_label_anexoinfo').hide();		
		$('#bloco_label_descricao').text('Descrição: ');
		$('#bloco_label_anexo').text('Anexo: *');		
		if($('#fl_paciente_padrao').is(':checked')){
			$('#paciente_nr_codigo').val('');
			$('#paciente_nr_codigo').attr('disabled', false);
			$('#paciente_nm_paciente').val('');
			$('#paciente_nm_paciente').attr('disabled', false);
			$('#cd_paciente').val(0);
			$('#fl_paciente_padrao').attr('checked', false);			
		}		
	}
	else{
		$('#bloco_categoria_cid').show();
		$('#bloco_subcategoria_cid').show();
		$('#bloco_duvida').show();
		$('#bloco_urgencia').hide();
		$('#bloco_paciente_padrao').show();
		$('#bloco_label_anexoinfo').show();
		$('#bloco_label_descricao').text('Descrição: *');
		$('#bloco_label_anexo').text('Anexo: ');		
	}	
}
function test(){	
	var valid = true;
	var tipo = $("input[name='tiposolicitacao']:checked").val();
	$("#formInsertEdit").find("input,select,textarea").each(function(index){
		$(this).removeClass("ui-state-error");						
	});	
	if($('#cd_paciente').val() == '0' || $('#paciente_nr_codigo').val().length == 0 || $('#paciente_nm_paciente').val().length == 0){
		valid = false;
		$('#paciente_nr_codigo').addClass("ui-state-error");
		$('#paciente_nm_paciente').addClass("ui-state-error");
		updateTips('Selecione corretamente um Paciente.');
	}	
	if($('#cd_localidade').val() == 0){
		$('#cd_localidade').addClass("ui-state-error");
		valid = false;	
		updateTips('Selecione um Município.');
	}	
	if($('#cd_especialidade').val() == 0){
		$('#cd_especialidade').addClass("ui-state-error");
		valid = false;	
		updateTips('Selecione uma Especialidade.');
	}
	if(tipo == 1){
		if($('#file_upload').val().length < 1){
			$('#file_upload').addClass("ui-state-error");
			valid = false;	
			updateTips('Informe um arquivo.');
		}
	}
	else if(tipo == 2){
		if($('#cd_duvida').val() == 0){
			$('#cd_duvida').addClass("ui-state-error");
			valid = false;	
			updateTips('Selecione uma Dúvida.');
		}
		if($('#ds_solicitacao').val().length < 1){
			$('#ds_solicitacao').addClass("ui-state-error");
			valid = false;	
			updateTips('Informe uma Descrição.');
		}
	}
	return valid;	
}
function paciente_select(ci_paciente, nm_paciente, nr_codigo){
	$('#modalPacienteSearch').modal('hide');
	$('#modalPacienteAdd').modal('hide');
	$('#cd_paciente').val(ci_paciente);	
	$('#paciente_nm_paciente').val(nm_paciente);	
	$('#paciente_nr_codigo').val(nr_codigo);
	$('#paciente_nr_codigo').attr('disabled', false);
	$('#paciente_nm_paciente').attr('disabled', false);	
	$('#fl_paciente_padrao').attr('checked', false);
}
function paciente_add(ci_paciente, nm_paciente, nr_codigo){
	paciente_select(ci_paciente, nm_paciente, nr_codigo);
	$.gritter.add({
		title: 'Paciente',
		text: 'Salvo com sucesso!',
		image: 'assets/css/gritter/growl_ok.png',				
	});
}
function paciente_get(){
	var nr_codigo = $('#paciente_nr_codigo').val();
	if(nr_codigo.length == 15){
		$.ajax({
			url: "partials/paciente_get.php",
			type: "POST",
			dataType: "json",
			data: {nr_codigo:nr_codigo},
			success: function(data){
				if(data.nm_paciente == ""){
					alert('Paciente não encontrado!');
				}
				else{
					$('#cd_paciente').val(data.ci_paciente);
					$('#paciente_nm_paciente').val(data.nm_paciente);										
				}				
			}
		});
	}	
}
</script>