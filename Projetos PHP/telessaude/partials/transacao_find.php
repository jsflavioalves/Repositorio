<?php
require_once('../includes/frameworkajax.php');

//Selecinando as transações disponíveis
$sqlTransacoesDisp = "select * from util.tb_transacao 
order by nm_transacao asc
limit 15 offset ".(($p - 1) * 15);
$queryTransacoesDisp = query($sqlTransacoesDisp);
$sqlNumTransacoesDisp = "select count(*) as num from util.tb_transacao";
$rowNumTransacoesDisp = query($sqlNumTransacoesDisp)->fetch();
$registrosTransacoesDisp = $rowNumTransacoesDisp['num'];	
$paginacaoTransacoesDisp = Util::paginationAjaxSimple($registrosTransacoesDisp, 'transacoes_disp', 'transacao_find');
?>
<?php if($registrosTransacoesDisp > 0){ ?>
	<table id="transacoes_disp_table" cellpadding="0" cellspacing="0" class="selectable" style="width:350px;" bgcolor="silver">
		<thead>
			<th align="left">Transações disponíveis:</th>
		</thead>
		<tbody>
			<?php
			while($transacao = $queryTransacoesDisp->fetch()){
				echo '<tr><td>'.$transacao['nm_transacao'].'</td></tr>';
			}
			?>
		</tbody>
	</table>
	<?php echo $paginacaoTransacoesDisp; ?>
<?php 
} 
else{ 
?>
	<br><br>
	<div align="center">Nenhum registro encontrado!</div>
	<br><br>
<?php 
} 
?>
<script type="text/javascript">
$(function() {
	$('#transacoes_disp_table').selectable({
		filter:'tbody tr',
		stop: function(event, ui){
			$(this).find("tr.ui-selected").unbind('click');
			//$(this).find("tr.ui-selected").draggable("destroy");
			$(this).find("tr.ui-draggable").draggable("destroy");
			$(this).find("tr.ui-selected").draggable({
				helper: function() {
					return $("<table cellpadding='0' cellspacing='0'></table>").append($(this).closest("tbody").find("tr.ui-selected").clone())[0];
				},
				appendTo: "body",
				opacity: 0.7,
				revert: true
			});
			$(this).find("tr.ui-selected").click(function(e){
				$("#transacoes_disp_table").find("tr.ui-draggable").draggable("destroy");
				$("#transacoes_disp_table").find("tr.ui-draggable").remove();
				$("#transacoes_disp_table").find("tr.ui-selected").removeClass("ui-selected");
				$(this).addClass('ui-selected');
				$(this).draggable({
					helper: function() {
						return $("<table cellpadding='0' cellspacing='0'></table>").append($(this).closest("tbody").find("tr.ui-selected").clone())[0];
					},
					appendTo: "body",
					opacity: 0.7,
					revert: true
				});
			});
		}
	});
});
</script>