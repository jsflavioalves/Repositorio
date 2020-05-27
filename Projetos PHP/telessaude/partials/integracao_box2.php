<?php
if(!@$_POST['codigo_cnes'])
	exit;

require_once('../includes/frameworkajax.php');
$codigo_cnes = $_POST['codigo_cnes'];



$sqlEquipeINE = "select iteq.codigo_ine, iteq.nome from integracao.tb_equipe_saude iteq
	where iteq.estabelecimento_cnes = '$codigo_cnes'
	order by 2 asc";
$queryEquipeINE = query($sqlEquipeINE);	


?>
<div class="row">
<div class="col-md-12">
	Código Equipe INE: *
	<select id="codigo_ine" name="codigo_ine" class="form-control">
		<option value="0">...</option>
		<?php
		while($row = $queryEquipeINE->fetch()){
			echo '<option value="'.$row['codigo_ine'].'">'.$row['codigo_ine'].' - '.$row['nome'].'</option>';
		}
		?>	
	</select>
</div>								
</div>