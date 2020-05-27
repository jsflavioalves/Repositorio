<?php
if(!@$_POST['uf'])
	exit;

require_once('../includes/frameworkajax.php');
$uf = $_POST['uf'];
$sqlMunicipiosIntegracao = "select itm.codigo, itm.nome from tb_localidade tl
	inner join integracao.tb_municipio itm on(tl.ci_localidade=itm.cd_localidade)
	where tl.sg_estado = '$uf' 
	order by 2 asc";
	$queryMunicipiosIntegracao = query($sqlMunicipiosIntegracao);


echo '<select id="codigo_municipio" onchange="atualizaBoxIntegracao1();" name="codigo_municipio" class="form-control">
<option value="0">...</option>';							
while($row = $queryMunicipiosIntegracao->fetch()){
	echo '<option value="'.$row['codigo'].'">'.$row['nome'].'</option>';
}								
echo '</select>';
?>