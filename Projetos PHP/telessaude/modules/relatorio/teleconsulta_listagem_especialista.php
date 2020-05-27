<?php
defined('EXEC') or die();
$transacao = 'rel_teleconsultas_-_finalizadas_por_especialistas';

if(!$auth->isRead($transacao)){
	Util::info(Config::AUTH_MESSAGE);
	return true;
}

//Carregando classes
Loader::import('br.ufc.nuteds.Teleconsulta');

$queryEspecialistas = query("select tu.ci_usuario, upper(tu.nm_usuario) as nm_usuario from tb_usuario_grupo tug 
inner join tb_usuario tu on(tug.cd_usuario=tu.ci_usuario)
where tug.cd_grupo in(3,4)
group by 1,2
order by 2");

if(@$_POST){
	
	$params = array();
	$params['tipo'] = $_POST['tp_tipo'];
	
	if($_POST['especialista'] != 0)
		$params['especialista'] = $_POST['especialista'];
		
	if(@$_POST['dt_inicio'] && @$_POST['dt_fim']){
		$inicio = explode("/", $_POST['dt_inicio']);
		$dt_inicio = $inicio[2].'-'.$inicio[1].'-'.$inicio[0];
		$fim = explode("/", $_POST['dt_fim']);
		$dt_fim = $fim[2].'-'.$fim[1].'-'.$fim[0];
		$params['periodo'] = "'".$dt_inicio."' and '".$dt_fim." 24:00:00'";
		$params['periodo_descr'] = $_POST['dt_inicio'].' - '.$_POST['dt_fim'];
	}

	Util::reportCSV('teleconsulta_listagem_especialista', $params);	
	
	/*$type = $_POST['tipo_exp'];
	$popup = true;
	if($type == 'XLS')
		$popup = false;
	
	$params['SUBREPORT_DIR'] = '';
	
	if($_POST['tipo_rel'] == 1){	
		Util::ireport('teleconsultas_listagem_especialista.jasper', 'teleconsultorias_listagem_especialista', $params, $popup, $type);
	}
	elseif($_POST['tipo_rel'] == 2){	
		Util::ireport('teleconsultas_sumario_especialista.jasper', 'teleconsultorias_sumario_especialista', $params, $popup, $type);
	}*/
}

?>

	<div class="row bgGrey">
		<img src="assets/relatorios.png"/>
		<span class="actiontitle">Teleconsultas - Finalizadas por Especialistas</span>		
	</div>

	<form method="post" id="formInsertEdit" onsubmit="return test();">
		<div class="row"><div id="validateBox" class="col-md-8 col-md-offset-2"></div></div>
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<!--<div class="row">
					<div class="col-md-6 text-center">
						<label>Listagem <input type="radio" name="tipo_rel" value="1" checked="checked"/></label>						
					</div>
					<div class="col-md-6 text-center">
						<label>Sumário <input type="radio" name="tipo_rel" value="2"/></label>
					</div>
				</div>-->
				<div class="row">
					<div class="col-md-12">
						Tipo: *
						<select id="tp_tipo" name="tp_tipo" class="form-control">
						<?php
						foreach(Teleconsulta::$tipos as $key=>$value){
							if(@$_POST['tp_tipo'] == $key)
								echo '<option value="'.$key.'" selected="selected">'.$value.'</option>';
							else
								echo '<option value="'.$key.'">'.$value.'</option>';
						}
						?>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						Especialista: 
						<select id="especialista" name="especialista" class="form-control">
						<option value="0">...</option>
						<?php
						while($row = $queryEspecialistas->fetch()){
							if(@$_POST['especialista'] == $row['ci_usuario'])
								echo '<option value="'.$row['ci_usuario'].'" selected="selected">'.$row['nm_usuario'].'</option>';
							else
								echo '<option value="'.$row['ci_usuario'].'">'.$row['nm_usuario'].'</option>';
						}
						?>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						De:
						<div class="input-group date">
						  <input type="tel" id="dt_inicio" name="dt_inicio" value="<?php echo @$_POST['dt_inicio']; ?>" class="form-control input-mask-date"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
						</div>
					</div>
					<div class="col-md-6">
						Até:
						<div class="input-group date">
						  <input type="tel" id="dt_fim" name="dt_fim" value="<?php echo @$_POST['dt_fim']; ?>" class="form-control input-mask-date"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
						</div>
					</div>					
				</div>
				<!--<div class="row">
					<div class="col-md-12">
						Exportação: 
						<select id="tipo_exp" name="tipo_exp" class="form-control">
						<option value="PDF">PDF</option>
						<option value="XLS">XLS</option>						
						</select>
					</div>
				</div>-->
			</div>
		</div>
		
		<br/>
		
		<div class="row">
			<div class="col-md-6 col-md-offset-3 text-center">
				<button id="btInsertEdit" type="submit" class="btn btn-success text-center"><span class="glyphicon glyphicon-download-alt"></span> Gerar</button>
				<img class="loader" src="assets/loading.gif"/>
			</div>
		</div>
		
		<br/>
		
	</form>

<script type="text/javascript">
function test(){	
	var valid = true;
	$("#formInsertEdit").find("input,select").each(function(index){
		$(this).removeClass("ui-state-error");						
	});	
	//if($('#dt_inicio').val().length > 0 || $('#dt_fim').val().length > 0){	
		if(!checkData($('#dt_inicio').val())){
			$('#dt_inicio').addClass("ui-state-error");
			valid = false;	
			updateTips('Período inválido.');
		}
		if(!checkData($('#dt_fim').val())){
			$('#dt_fim').addClass("ui-state-error");
			valid = false;	
			updateTips('Período inválido.');
		}
		valid = checkLength('dt_inicio', 'Período', 10) && valid;
		valid = checkLength('dt_fim', 'Período', 10) && valid;
	//}
	return valid;	
}	
</script>