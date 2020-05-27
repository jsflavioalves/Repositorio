<?php 
require('../../../conn.php');
mysql_select_db('estagios');


//padrao
$id_termo=$_POST['id_termo'];

// Recebe todos os valores do Formuláro
$seg_manha=utf8_decode($_POST['seg_manh']);
$seg_tarde=utf8_decode($_POST['seg_tard']);
$seg_noite=utf8_decode($_POST['seg_noit']);
$ter_manha=utf8_decode($_POST['ter_manh']);
$ter_tarde=utf8_decode($_POST['ter_tard']);
$ter_noite=utf8_decode($_POST['ter_noit']);
$qua_manha=utf8_decode($_POST['qua_manh']);
$qua_tarde=utf8_decode($_POST['qua_tard']);
$qua_noite=utf8_decode($_POST['qua_noit']);
$qui_manha=utf8_decode($_POST['qui_manh']);
$qui_tarde=utf8_decode($_POST['qui_tard']);
$qui_noite=utf8_decode($_POST['qui_noit']);
$sex_manha=utf8_decode($_POST['sex_manh']);
$sex_tarde=utf8_decode($_POST['sex_tard']);
$sex_noite=utf8_decode($_POST['sex_noit']);
$sab_manha=utf8_decode($_POST['sab_manh']);
$sab_tarde=utf8_decode($_POST['sab_tard']);
$sab_noite=utf8_decode($_POST['sab_noit']);
$dom_manha=utf8_decode($_POST['dom_manh']);
$dom_tarde=utf8_decode($_POST['dom_tard']);
$dom_noite=utf8_decode($_POST['dom_noit']);


if(isset($_POST['btn_ins_hv'])){

	// Verifica a existencia do termo //
	$cons_tce = mysql_query("SELECT * FROM termo_compromisso WHERE id_termo_compromisso LIKE '$id_termo'");
	$cont_tce = mysql_num_rows($cons_tce);

	$cons_hv = mysql_query("SELECT * FROM horario_variado WHERE id_termo LIKE '$id_termo'");
	$cont_hv = mysql_num_rows($cons_hv);

		// Verifica se existe o tce // 
		if ($cont_tce != 0 AND $cont_hv == 0){

			//Cadastra na tabela horario_variado os dados que ele recebe do forulário, em seguida retorna a página 'Termo de Compromisso' para uma nova Consulta // 
			$inserir = mysql_query("INSERT INTO horario_variado VALUES ('','$id_termo','$seg_manha','$seg_tarde','$seg_noite','$ter_manha','$ter_tarde','$ter_noite','$qua_manha','$qua_tarde','$qua_noite','$qui_manha','$qui_tarde','$qui_noite','$sex_manha','$sex_tarde','$sex_noite','$sab_manha','$sab_tarde','$sab_noite','$dom_manha','$dom_tarde','$dom_noite')");
		
			header('location:termo_compromisso.php');

		}

}
if(isset($_POST['btn_atu_hv'])){

	$up1 = mysql_query("UPDATE horario_variado SET seg_M='$seg_manha', seg_T='$seg_tarde', seg_N='$seg_noite', ter_M='$ter_manha', ter_T='$ter_tarde', ter_N='$ter_noite', qua_M='$qua_manha', qua_T='$qua_tarde', qua_N='$qua_noite', qui_M='$qui_manha', qui_T='$qui_tarde', qui_N='$qui_noite', sex_M='$sex_manha', sex_T='$sex_tarde', sex_N='$sex_noite', sab_M='$sab_manha', sab_T='$sab_tarde', sab_N='$sab_noite', dom_M='$dom_manha', dom_T='$dom_tarde', dom_N='$dom_noite' WHERE id_termo='$id_termo'");	

	header('location:termo_compromisso.php');

}
