<!--// Recebe Valores do arquivo "busca_tcc.php" //-->

<?php
require('conn.php');
mysql_select_db('estagios');

if(isset($_POST['btnatutcc'])){


$id_tcc_n=$_POST['cd_tcc'];
$dt_cadastro_n=utf8_decode($_POST['dt_cadastro']);
$concedente_n=utf8_decode($_POST['concedente_n']);
$cg_hrr_n=utf8_decode($_POST['cg_hrr_n']);
$tp_trm_n=utf8_decode($_POST['tp_trm_n']);
$cl_trm_n=utf8_decode($_POST['cl_trm_n']);
$agente_n=utf8_decode($_POST['agente_n']);
$prof_n=utf8_decode($_POST['prof_n']);
$siape=utf8_decode($_POST['siape']);


 $empresa_r=mysql_query("SELECT * FROM empresas WHERE nome LIKE '$concedente_n'");
 $count=mysql_num_rows($empresa_r);
 $dates=mysql_fetch_object($empresa_r);


//$con2=mysql_query("SELECT * FROM termo_compromisso WHERE id_termo_compromisso LIKE '$id_termo_compromisso'");
//$obg=mysql_fetch_object($con2);

	if($count != 0){

    $cd_emp=$dates->CD_EMPRESA;

	$atualizar = mysql_query("UPDATE termo_c_coletivo SET 
    cd_emp='$cd_emp', 
    agente='$agente_n', 
    tipo_termo='$tp_trm_n', 
    carga_horaria='$cg_hrr_n', 
    classificacao_termo='$cl_trm_n', 
    prof_orientador='$prof_n',
    siape='$siape'

   WHERE cd_tcc like '$id_tcc_n'");

    $atualizar2 = mysql_query("UPDATE termo_compromisso SET 
    nome='$cd_emp', 
    agente='$agente_n', 
    tipo_termo='$tp_trm_n', 
    carga_horaria='$cg_hrr_n', 
    classificacao_termo='$cl_trm_n', 
    prof_orientador='$prof_n',
    siape='$siape'

    WHERE cd_tcc LIKE '$id_tcc_n'");

        header("location:acoes_tcc.php");
	}
   
}
?>