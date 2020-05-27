<?php
defined('EXEC') or die();
$transacao = 'rel_teleconsultas_-_pendentes';

if(!$auth->isRead($transacao)){
	Util::info(Config::AUTH_MESSAGE);
	return true;
}

//Carregando classes
Loader::import('br.ufc.nuteds.Teleconsulta');

$queryMunicipio = query("select tt.cd_localidade, tl.sg_estado || ' - ' || tl.ds_localidade as ds_localidade
from tb_teleconsulta tt
inner join tb_localidade tl on(tt.cd_localidade=tl.ci_localidade)
group by 1,2
order by tl.sg_estado || ' - ' || tl.ds_localidade asc");

if(@$_POST){
	
	$params = array();
	$params['tipo'] = $_POST['tp_tipo'];
	$params['dias'] = $_POST['nr_dias'];	
	
	
	Util::reportCSV('teleconsulta_pendente', $params);	
}

?>

	<div class="row bgGrey">
		<img src="assets/relatorios.png"/>
		<span class="actiontitle">Teleconsultas - Pendentes</span>		
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
				<div class="row">
					<div class="col-md-12">
						Atrasadas mais que (dias): *
						<input type="number" name="nr_dias" min="1" max="1800" value="<?php echo @$_POST['nr_dias']; ?>" placeholder="dia(s)" class="form-control">
					</div>
				</div>
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
	if($('#dt_inicio').val().length > 0 || $('#dt_fim').val().length > 0){	
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
	}
	return valid;	
}	
</script>