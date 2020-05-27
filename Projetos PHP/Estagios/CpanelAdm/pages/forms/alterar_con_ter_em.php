<?php

require('../../../conn.php');
mysql_select_db('estagios');

$empresa = mysql_query("SELECT * FROM empresas WHERE CD_EMPRESA LIKE ''");
$empresa2 = mysql_num_rows($empresa);

$termo = mysql_query("SELECT * FROM termo_compromisso WHERE nome LIKE ''");
$termo2 = mysql_num_rows($termo);

$convenio = mysql_query("SELECT * FROM termo_convenio WHERE CD_EMPRESA LIKE ''");
$convenio2 = mysql_num_rows($convenio);

$convenio_coletivo = mysql_query("SELECT * FROM termo_c_coletivo WHERE cd_emp LIKE ''");
$convenio_coletivo2 = mysql_num_rows($convenio_coletivo);

if($empresa2 != 0){
	$empresa3 = mysql_query("DELETE FROM empresas WHERE CD_EMPRESA = ''");
	echo'ok1';
}else if($termo2 != 0){
	$termo3 = mysql_query("UPDATE termo_compromisso SET nome = '' WHERE nome = ''");
	echo'ok2';
} else if($convenio2 != 0){
	$convenio3 = mysql_query("UPDATE termo_convenio SET CD_EMPRESA = '' WHERE CD_EMPRESA = ''");
	echo'ok3';
} else if($convenio_coletivo2 != 0){
	$convenio_coletivo3 = mysql_query("UPDATE termo_c_coletivo SET cd_emp = '' WHERE cd_emp = ''");
	echo'ok4';
}else{
	echo 'FINALIZADO';
}

//precisa atualizar tres vezes para funcionar todas as condições lógicas
//para atualizar usar a tecla F5
//os bancos conectados são testes
?>