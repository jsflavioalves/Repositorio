<?php
require('../../../conn.php');
mysql_select_db('estagios');
if(isset($_POST['btn_del2'])){

$id_termo=trim($_POST['id_tce_hv']);
$id_termo=$id_termo . " ";
/* echo "selecionado". $id_termo; */
// Verifica a existencia do termo //
$posini = 0;

/* echo "tamanho dos escolhidos". strlen($id_termo); */
$cont = 0;
for ($i=0;$i<=strlen ($id_termo)+1; $i=$i+$cont){
$codsel = substr($id_termo,$posini,strpos($id_termo," ",$posini) - $posini);
if($posini+$cont>strlen ($id_termo)) $codsel = substr($id_termo,$posini,-1);
/* echo "codsel - candidatos".$codsel; */
if(isset($_POST['opt'.$codsel])){$up = mysql_query("DELETE FROM horario_variado WHERE id_termo='$codsel'");
/* echo "codsel que sera deletado".$codsel; */}
$posini = strpos($id_termo," ",$posini)+1;
if($cont==0) $cont = $posini;
/* echo "Posicao Inicial".$posini; */}


header("location:acoes_tcc.php"); 
}
?>