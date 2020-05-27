<?php
defined('EXEC') or die();
$transacao = 'rel_especialistas';

if(!$auth->isRead($transacao)){
	Util::info(Config::AUTH_MESSAGE);
	return true;
}


if(@$_POST){
	
	$params = array();
	
	
	Util::reportCSV('especialistas', $params);	
}

?>

	<div class="row bgGrey">
		<img src="assets/relatorios.png"/>
		<span class="actiontitle">Especialistas</span>		
	</div>

	<form method="post" id="formInsertEdit" onsubmit="return test();">
		<div class="row"><div id="validateBox" class="col-md-8 col-md-offset-2"></div></div>
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				
				<input type="hidden" name="temp" value="1"/>
				
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
	/*$("#formInsertEdit").find("input,select").each(function(index){
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
	//}*/
	return valid;	
}	
</script>