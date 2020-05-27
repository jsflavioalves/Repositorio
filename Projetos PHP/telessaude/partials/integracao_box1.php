<?php
if(!@$_POST['codigo_municipio'])
	exit;

require_once('../includes/frameworkajax.php');
$codigo_municipio = $_POST['codigo_municipio'];


$sqlEstabelecimentoCNES = "select ites.codigo_cnes, ites.nome from integracao.tb_estabelecimento ites 
	inner join integracao.tb_municipio itmu on(ites.codigo_municipio=itmu.codigo::character varying)
	--inner join integracao.tb_equipe_saude iteq on(ites.codigo_cnes=iteq.estabelecimento_cnes)
	where itmu.codigo = '$codigo_municipio'
	order by 2 asc";
$queryEstabelecimentoCNES = query($sqlEstabelecimentoCNES);

?>
<div class="row">
<div class="col-md-12">
	Código Estabelecimento CNES: *
	<select id="codigo_cnes" onchange="atualizaBoxIntegracao2();" name="codigo_cnes" class="form-control">
		<option value="0">...</option>
		<?php
		while($row = $queryEstabelecimentoCNES->fetch()){
			echo '<option value="'.$row['codigo_cnes'].'">'.$row['codigo_cnes'].' - '.$row['nome'].'</option>';
		}
		?>	
	</select>
</div>								
</div>