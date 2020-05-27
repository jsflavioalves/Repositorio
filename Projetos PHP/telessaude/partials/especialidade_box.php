<?php
if(!@$_POST['tipo'])
	exit;

$where = '';
if($_POST['tipo'] == 1){
	$where = ' te.fl_exame = true and';
}
else {
	$where = ' te.fl_online = true and';
}

//teste
require_once('../includes/frameworkajax.php');
$sqlEspecialidades = 'select te.ci_especialidade, te.nm_especialidade
from tb_profissional_especialidade tpe
inner join tb_especialidade te on(tpe.cd_especialidade=te.ci_especialidade)
where'.$where.' tpe.cd_profissional = '.$user['ci_usuario'];
$queryEspecialidades = query($sqlEspecialidades);
echo '<select id="cd_especialidade" name="cd_especialidade" class="form-control">
<option value="0">...</option>';							
while($row = $queryEspecialidades->fetch()){
	echo '<option value="'.$row['ci_especialidade'].'">'.$row['nm_especialidade'].'</option>';
}
echo '</select>';
?>