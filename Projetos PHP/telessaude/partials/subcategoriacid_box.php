<?php
if(@$_POST['ci_categoria']){
	require_once('../includes/frameworkajax.php');
	$querySubcategorias = query('select * from tb_subcategoria_cid where cd_categoria_cid = '.$_POST['ci_categoria']);
	echo '<select id="cd_subcategoria_cid" name="cd_subcategoria_cid" class="form-control">';							
	while($row = $querySubcategorias->fetch()){
		echo '<option value="'.$row['ci_subcategoria_cid'].'">'.$row['nm_subcategoria_cid'].'</option>';
	}
	echo '</select>';
}
else{
	echo '<select id="cd_subcategoria_cid" name="cd_subcategoria_cid" class="form-control"><option value="0">...</option></select>';
}
?>