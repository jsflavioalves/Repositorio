<?php
require_once('../includes/frameworkajax.php');
//Adquirindo nome da bolsista se válido
$nr_codigo = @$_POST['nr_codigo'];
$sql = "select ci_paciente, nm_paciente from tb_paciente where nr_codigo='$nr_codigo'";
$row = query($sql)->fetch();
echo '{"ci_paciente":"'.@$row['ci_paciente'].'", "nm_paciente":"'.(@$row['nm_paciente']).'"}';
?>