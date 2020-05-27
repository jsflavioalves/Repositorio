<?php

defined('EXEC') or die();
$transacao = 'impmodelo';
$ufDefault = 'CE';


if($auth->isRead($transacao) && !$auth->isAdmin()){
   Util::info(Config::AUTH_MESSAGE);
   return true;
 }

 function dataready($data) {
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
 } 
 
// $indice = $_POST['indice'];
$cdcurso = $_POST['selcurso']; 
$textcertif = $_POST['myeditor'];
$textcertiftras = $_POST['myeditortras'];
$pasta = './templatecert/';
$arqtemplatefrente='';
$arqtemplatetras='';
$arqtemplatefrente = $_SESSION['pdf'];
$arqtemplatetras = $_SESSION['pdftras'];

// $nm_usuario = $_POST['nm_usuario'];
$cpf = $_POST['cpf'];
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$dia = strftime('%d', strtotime('today'));
$mes = strftime('%B', strtotime('today'));
$ano = strftime('%Y', strtotime('today'));
$hora = date('H:i:s');

$val  = "123456789ABCDEFGHIJKLMNOPQRSTUVXZ".time().date("GisYmd");
$md5   	 = md5($val);
$chave 	 = strtoupper(substr($md5, 0, 20));

$sqlProcNome = "SELECT nm_usuario,nm_login FROM tb_usuario WHERE nm_login ='". $cpf. "'";
$query1 = query($sqlProcNome);
$row1 = $query1->fetch();
$nm_usuario = $row1['nm_usuario'];

$sqlProcCurso = "SELECT ds_codigo,ds_descricao,dt_inicio, dt_fim, nr_ch FROM tb_curso WHERE ds_codigo = '". $cdcurso. "'";
$query2 = query($sqlProcCurso);
$row2 = $query2->fetch();
$curso = $row2['ds_descricao'];
$dt_inicio = date("d/m/Y", strtotime($row2['dt_inicio']));
$dt_fim = date("d/m/Y", strtotime($row2['dt_fim']));
$carga_horaria = $row2['nr_ch'];


//Importando a classe de SQL
Loader::import('com.atitudeweb.SQL');

$sqlInsDec = "SELECT nm_usuario,cpf,curso,dia_mes_ano,hora,CodValidacao FROM tb_certificados_imp";
$consinserir = query($sqlInsDec);
$inserir = $consinserir -> fetch();

$sqlInsTex = "SELECT TeorCertificadoFrente,curso,TeorCertificadoTras FROM tb_textocertif"; 
$consinserir2 = query($sqlInsTex);
$inserir2 = $consinserir2 -> fetch();

ob_clean();
echo "Modelo de certificado salvo com sucesso! ";
echo '<form>
	    <input type="button" style="background-color:ruby" value="Voltar" onClick="JavaScript: window.history.back();">
	    </form>';


?>