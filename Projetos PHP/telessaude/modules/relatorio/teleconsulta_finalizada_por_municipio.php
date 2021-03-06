<?php
defined('EXEC') or die();
$transacao = 'rel_teleconsultas_-_finalizadas_por_municipios';

if(!$auth->isRead($transacao)){
	Util::info(Config::AUTH_MESSAGE);
	return true;
}

//Carregando classes
Loader::import('br.ufc.nuteds.Teleconsulta');

/*$queryMunicipio = query("select tt.cd_localidade, tl.sg_estado || ' - ' || tl.ds_localidade as ds_localidade
from tb_teleconsulta tt
inner join tb_localidade tl on(tt.cd_localidade=tl.ci_localidade)
group by 1,2
order by tl.sg_estado || ' - ' || tl.ds_localidade asc");
*/

if(@$_POST){
	
	$params = array();
	$params['tipo'] = $_POST['tp_tipo'];
	
	//if($_POST['ci_localidade'] != 0)
	//	$params['localidade'] = $_POST['ci_localidade'];
		
	if(@$_POST['dt_inicio'] && @$_POST['dt_fim']){
		$inicio = explode("/", $_POST['dt_inicio']);
		$dt_inicio = $inicio[2].'-'.$inicio[1].'-'.$inicio[0];
		$fim = explode("/", $_POST['dt_fim']);
		$dt_fim = $fim[2].'-'.$fim[1].'-'.$fim[0];
		$params['periodo'] = "'".$dt_inicio."' and '".$dt_fim." 24:00:00'";
		$params['periodo_descr'] = $_POST['dt_inicio'].' - '.$_POST['dt_fim'];
	}
	
	Util::reportCSV('teleconsulta_finalizada_por_municipio', $params);	
}

?>

	<div class="row bgGrey">
		<img src="assets/relatorios.png"/>
		<span class="actiontitle">Teleconsultas - Finalizadas por Municípios</span>		
	</div>

	<form method="post" id="formInsertEdit" onsubmit="return test();">
		<div class="row"><div id="validateBox" class="col-md-8 col-md-offset-2"></div></div>
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
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
				<!--<div class="row">
					<div class="col-md-12">
						Município: *
						<select id="ci_localidade" name="ci_localidade" class="form-control">
						<option value="0">...</option>
						<?php
						/*while($row = $queryMunicipio->fetch()){
							if(@$_POST['ci_localidade'] == $row['cd_localidade'])
								echo '<option value="'.$row['cd_localidade'].'" selected="selected">'.$row['ds_localidade'].'</option>';
							else
								echo '<option value="'.$row['cd_localidade'].'">'.$row['ds_localidade'].'</option>';
						}*/
						?>
						</select>
					</div>
				</div>-->
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