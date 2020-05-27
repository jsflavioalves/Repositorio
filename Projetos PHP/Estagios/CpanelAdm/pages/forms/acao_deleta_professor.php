<?php
require('../../../conn.php');
mysql_select_db('estagios');
$id_professor=$_POST['id_professor'];

$consulta = mysql_query("SELECT * FROM professor_orientador WHERE id_professor LIKE '$id_professor'");
$resultado = mysql_num_rows($consulta);
$result = mysql_fetch_array($consulta);
$siape = $result['siape'];
$cpf = $result['cpf'];

$up1 = mysql_query("DELETE FROM usuarios_agencia2 WHERE login LIKE '$siape' AND senha LIKE '$cpf'");

$up2 = mysql_query("DELETE FROM professor_orientador WHERE id_professor LIKE '$id_professor'");

echo'<script type="text/javascript">alert("PROFESSOR EXCLUIDO COM SUCESSO!"); </script>';
header('location:professores.php')
?>