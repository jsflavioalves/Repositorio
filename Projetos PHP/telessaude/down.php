<?php
//Força o download de qualquer arquivo com outro nome 
//Em máquinas windows ler http://bytes.com/topic/php/answers/798356-mime-magic-fileinfo-help

//Ajustando para se basear no diretório do framework 
define('ATITUDE_BASE', getcwd());
require_once('includes/frameworkajax.php');

//Carregando classes
Loader::import('com.atitudeweb.Crypt');

if(!@$_GET['h'])
	exit;

$obj = @Crypt::decode($_GET['h']);
if(!@$obj['file'])
	exit;

$ci_file = $obj['file'];
$row = query('select cd_teleconsulta, nm_file, tp_tipo from tb_file where ci_file = '.$ci_file)->fetch();

function getUrlMimeType($url) {
    $buffer = file_get_contents($url);
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    return $finfo->buffer($buffer);
}



$file = 'files/'.$row['cd_teleconsulta'].'/'.$ci_file.'.'.$row['tp_tipo'];
$file1 = 'files_2016_08_19/'.$row['cd_teleconsulta'].'/'.$ci_file.'.'.$row['tp_tipo'];
$file2 = 'files_2018_01_25/'.$row['cd_teleconsulta'].'/'.$ci_file.'.'.$row['tp_tipo'];



$name = $row['nm_file'].'.'.$row['tp_tipo'];



if(file_exists($file)){		
	$fp = fopen($file, 'rb');
	if($fp){
		header('Content-Type: '.getUrlMimeType($file));
		header('Content-Length: '.filesize($file));
		header('Content-Disposition: attachment; filename="'.$name.'"');
		header('Pragma: no-cache');
		fpassthru($fp);
		exit;
	}
}	
elseif(file_exists($file1)){		
	$fp = fopen($file1, 'rb');
	if($fp){
		header('Content-Type: '.getUrlMimeType($file1));
		header('Content-Length: '.filesize($file1));
		header('Content-Disposition: attachment; filename="'.$name.'"');
		header('Pragma: no-cache');
		fpassthru($fp);
		exit;
	}
}
elseif(file_exists($file2)){		
	$fp = fopen($file2, 'rb');
	if($fp){
		header('Content-Type: '.getUrlMimeType($file2));
		header('Content-Length: '.filesize($file2));
		header('Content-Disposition: attachment; filename="'.$name.'"');
		header('Pragma: no-cache');
		fpassthru($fp);
		exit;
	}
}
else{
	echo 'Arquivo não encontrado!';
}
?>