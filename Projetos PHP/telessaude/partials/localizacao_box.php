<?php
if(!@$_POST['cd_estado'])
	exit;

require_once('../includes/frameworkajax.php');
$name = (@$_POST['name'] ? $_POST['name'] : 'cd_localidade');
$ufDefault = $_POST['cd_estado'];
$sqlMunicipios = "select ci_localidade, ds_localidade from tb_localidade where sg_estado = '$ufDefault' order by ds_localidade asc";
$queryMunicipios = query($sqlMunicipios);
echo '<select id="'.$name.'" name="'.$name.'" class="form-control">';							
while($row = $queryMunicipios->fetch()){
	if(@$rowEdit['cd_localidade'] == $row['ci_localidade'])
		echo '<option value="'.$row['ci_localidade'].'" selected="selected">'.$row['ds_localidade'].'</option>';
	else
		echo '<option value="'.$row['ci_localidade'].'">'.$row['ds_localidade'].'</option>';
}
echo '</select>';
?>