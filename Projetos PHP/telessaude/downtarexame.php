<?php
//Ajustando para se basear no diretório do framework 
define('ATITUDE_BASE', getcwd());
require_once('includes/frameworkajax.php');

//Carregando classes
Loader::import('com.atitudeweb.Crypt');

if(!@$_GET['h'])
	exit;

$obj = @Crypt::decode($_GET['h']);
if(!@$obj['id'])
	exit;
	
$profissional = $obj['id'];


$sql = "select 	tt.ci_teleconsulta,
tt.cd_profissional_solicitante,
tt.cd_profissional_especialista,
tt.tp_tipo,
tl.sg_estado || ' - ' || tl.ds_localidade as ds_localidade,
tt.cd_especialidade,
te.nm_especialidade,
tp.nm_paciente,
tt.tp_status, 
tt.fl_urgencia,
to_char(tt.dt_solicitacao, 'dd/mm/yyyy às HH24:MI') as dt_solicitacao
from tb_teleconsulta tt
inner join tb_localidade tl on(tt.cd_localidade=tl.ci_localidade)
inner join tb_especialidade te on(tt.cd_especialidade=te.ci_especialidade)
left join tb_paciente tp on(tt.cd_paciente=tp.ci_paciente)
where tt.cd_profissional_solicitante != ".$profissional." and tp_status = 1 and tt.cd_especialidade in(1) and tt.tp_tipo = 1 
order by tt.fl_urgencia desc, tt.ci_teleconsulta asc";
$query = query($sql);

$files = array();

while($row = $query->fetch()){
	
	$rowFile = query('select ci_file, nm_file, tp_tipo from tb_file where cd_teleconsulta = '.$row['ci_teleconsulta'].' limit 1')->fetch();

	###
	$_file = '';
	$file = 'files/'.$row['ci_teleconsulta'].'/'.$rowFile['ci_file'].'.'.$rowFile['tp_tipo'];
	$file1 = 'files_2016_08_19/'.$row['ci_teleconsulta'].'/'.$rowFile['ci_file'].'.'.$rowFile['tp_tipo'];
	$file2 = 'files_2018_01_25/'.$row['ci_teleconsulta'].'/'.$rowFile['ci_file'].'.'.$rowFile['tp_tipo'];
	$name = $rowFile['nm_file'].'.'.$rowFile['tp_tipo'];
	if(file_exists($file)){		
		$_file = $file;
	}	
	elseif(file_exists($file1)){		
		$_file = $file1;
	}
	elseif(file_exists($file2)){		
		$_file = $file2;
	}
	###
	
	//$_file = 'telessaude.backup';

	if(empty($_file)){
		die('algum arquivo nao encontrado!');
	}
	
	$files[] = array(0 => $_file, 1 => $name);

}

$namefile = $user['ci_usuario'].@date('YmdHis');
$folder = '/tmp/'.$namefile;
$folderTar = $folder.'.tar.gz';
if(mkdir($folder)) 
{
	foreach($files as $key=>$value) 
	{
		if($value[1] == '.')
			continue;
		
		$newfile = $folder.'/'.$value[1];
		//$tmp = `cp $value[0] $value[1]`;
		copy($value[0], $newfile);
		//echo 'value[0] => '.$value[0].' | ';
		//echo 'value[1] => '.$newfile;
		//echo '<br>';

	}
	$tmp = `tar -zcf $folderTar $folder`;
}

//exit;

$fp = fopen($folderTar, 'rb');
header('Content-Type: application/x-tar');
header('Content-Length: '.filesize($folderTar));
header('Content-Disposition: attachment; filename="'.$namefile.'.tar.gz"');
header('Pragma: no-cache');
fpassthru($fp);

?>