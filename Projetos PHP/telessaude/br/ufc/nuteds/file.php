<?php
/**
 * Responsável por upload de arquivos
 * @package br.ufc.nuteds
 * @version 1.0
 * @copyright nuteds
 * @license http://opensource.org/licenses/gpl-3.0.html GPL General Public License
 */

Loader::import('br.ufc.nuteds.Teleconsulta');
 
final class File {	

	public function uploadAposCadastro($teleconsulta, $user){	
		$ci_teleconsulta = $teleconsulta->getId();
	
		$rowId = query("select nextval('tb_file_ci_file_seq') as num;")->fetch();
		$ci_file = $rowId['num'];
	
		//Se a pasta não existir é então criada
		if (!file_exists("files/".$ci_teleconsulta)) { 
			mkdir("files/".$ci_teleconsulta); 			
		}		
	
		//Tipo do arquivo
		$parts = explode('.', $_FILES['file_upload']['name']);
		$tipo = strtolower($parts[count($parts) - 1]);	
		array_pop($parts);
		$nm_file = join('.', $parts);
		if($nm_file == ""){
			$nm_file = $tipo;
		}		
		$targetFile = 'files/'.$ci_teleconsulta.'/'.$ci_file.'.'.$tipo;

		//Se o upload for bem sucedido
		if(move_uploaded_file($_FILES['file_upload']['tmp_name'], $targetFile))
		{
			//Tamanho do file
			$this->bytesAndDescription($bytes, $ds_tamanho, $targetFile);
			
			//Inserindo o arquivo no banco
			$sql = "insert into tb_file (ci_file, cd_usuario, nm_file, cd_teleconsulta, tp_tipo, ds_descricao, nr_tamanho, ds_tamanho, nr_versao, dt_data) ". 
				"values({$ci_file}, ".$user['ci_usuario'].", '{$nm_file}', {$ci_teleconsulta}, '{$tipo}', '', {$bytes}, '{$ds_tamanho}', 1, now()); ";
				
			if($teleconsulta->isEspecialistaOwner()){
				$sql .= "update tb_teleconsulta set tp_status=".Teleconsulta::STATUS_RESPONDIDO." where ci_teleconsulta=$ci_teleconsulta;";
			}
			elseif($row['cd_profissional_especialista']){
				$sql .= "update tb_teleconsulta set tp_status=".Teleconsulta::STATUS_EM_ANALISE." where ci_teleconsulta=$ci_teleconsulta;";
			}			
			return execute($sql);
		}
		else{
			return false;
		}	
	}
	
	public function uploadCadastro($ci_teleconsulta, $tp_tipo, $nm_paciente, $cd_profissional_solicitante, $ds_localidade=null){	
		//Se a pasta não existir é então criada
		if (!file_exists("files/".$ci_teleconsulta)) { 
			mkdir("files/".$ci_teleconsulta); 			
		}
		$rowId = query("select nextval('tb_file_ci_file_seq') as num;")->fetch();
		$ci_file = $rowId['num'];
		$parts = explode('.', $_FILES['file_upload']['name']);
		$tipo = strtolower($parts[count($parts) - 1]);	
		array_pop($parts);
		$nm_file = join('.', $parts);
		if($nm_file == ""){
			$nm_file = $tipo;
		}
		
		//Se o tipo da teleconsulta for exame terá de ser uma nomenclatura padrão
		if(Teleconsulta::TIPO_EXAME == $tp_tipo){
			$nm_paciente = str_replace(" ", "_", $nm_paciente);
			$nm_file = $ci_teleconsulta.'_'.$ci_file.'_'.$nm_paciente.'_'.$ds_localidade.'_'.date('YmdHi');
		}
		
		//Caminho do arquivo
		$targetFile = 'files/'.$ci_teleconsulta.'/'.$ci_file.'.'.$tipo;
		
		//Se o upload for bem sucedido
		if(move_uploaded_file($_FILES['file_upload']['tmp_name'], $targetFile))
		{
			//Tamanho do file
			$this->bytesAndDescription($bytes, $ds_tamanho, $targetFile);		
				
			//Inserindo o arquivo no banco
			$sql = "insert into tb_file (ci_file, cd_usuario, nm_file, cd_teleconsulta, tp_tipo, ds_descricao, nr_tamanho, ds_tamanho, nr_versao, dt_data) ". 
				"values({$ci_file}, {$cd_profissional_solicitante}, '{$nm_file}', {$ci_teleconsulta}, '{$tipo}', '', {$bytes}, '{$ds_tamanho}', 1, now());";
			
			return execute($sql);					
		}
		else{
			return false;
		}	
	}
	
	public function uploadExameHistorico($ci_teleconsulta, $user, $nm_paciente, $ds_localidade){	
		$rowId = query("select nextval('tb_file_ci_file_seq') as num;")->fetch();
		$ci_file = $rowId['num'];
	
		//Se a pasta não existir é então criada
		if (!file_exists("files/".$ci_teleconsulta)) { 
			mkdir("files/".$ci_teleconsulta); 			
		}		
	
		//Tipo do arquivo
		$parts = explode('.', $_FILES['file_upload_'.$ci_teleconsulta]['name']);
		$tipo = strtolower($parts[count($parts) - 1]);	
		array_pop($parts);
		$nm_file = join('.', $parts);
		if($nm_file == ""){
			$nm_file = $tipo;
		}
		
		//Se o tipo da teleconsulta for exame terá de ser uma nomenclatura padrão
		$nm_paciente = str_replace(" ", "_", $nm_paciente);
		$nm_file = $ci_teleconsulta.'_'.$ci_file.'_'.$nm_paciente.'_'.$ds_localidade.'_'.date('YmdHi').'_LAUDADO';		
		
		$targetFile = 'files/'.$ci_teleconsulta.'/'.$ci_file.'.'.$tipo;

		//Se o upload for bem sucedido
		if(move_uploaded_file($_FILES['file_upload_'.$ci_teleconsulta]['tmp_name'], $targetFile))
		{
			//Tamanho do file
			$this->bytesAndDescription($bytes, $ds_tamanho, $targetFile);		
				
			//Inserindo o arquivo no banco
			$sql = "insert into tb_file (ci_file, cd_usuario, nm_file, cd_teleconsulta, tp_tipo, ds_descricao, nr_tamanho, ds_tamanho, nr_versao, dt_data) ". 
				"values({$ci_file}, ".$user['ci_usuario'].", '{$nm_file}', {$ci_teleconsulta}, '{$tipo}', '', {$bytes}, '{$ds_tamanho}', 1, now()); ";
				
			return execute($sql);
		}
		else{
			return false;
		}	
	}
	
	public function uploadExame($ci_teleconsulta, $user, $nm_paciente, $ds_localidade){	
		$rowId = query("select nextval('tb_file_ci_file_seq') as num;")->fetch();
		$ci_file = $rowId['num'];
	
		//Se a pasta não existir é então criada
		if (!file_exists("files/".$ci_teleconsulta)) { 
			mkdir("files/".$ci_teleconsulta); 			
		}		
	
		//Tipo do arquivo
		$parts = explode('.', $_FILES['file_upload']['name']);
		$tipo = strtolower($parts[count($parts) - 1]);	
		array_pop($parts);
		$nm_file = join('.', $parts);
		if($nm_file == ""){
			$nm_file = $tipo;
		}
		
		//Se o tipo da teleconsulta for exame terá de ser uma nomenclatura padrão
		$nm_paciente = str_replace(" ", "_", $nm_paciente);
		$nm_file = $ci_teleconsulta.'_'.$ci_file.'_'.$nm_paciente.'_'.$ds_localidade.'_'.date('YmdHi').'_LAUDADO';
		
		$targetFile = 'files/'.$ci_teleconsulta.'/'.$ci_file.'.'.$tipo;

		//Se o upload for bem sucedido
		if(move_uploaded_file($_FILES['file_upload']['tmp_name'], $targetFile))
		{
			//Tamanho do file
			$this->bytesAndDescription($bytes, $ds_tamanho, $targetFile);		
				
			//Inserindo o arquivo no banco
			$sql = "insert into tb_file (ci_file, cd_usuario, nm_file, cd_teleconsulta, tp_tipo, ds_descricao, nr_tamanho, ds_tamanho, nr_versao, dt_data) ". 
				"values({$ci_file}, ".$user['ci_usuario'].", '{$nm_file}', {$ci_teleconsulta}, '{$tipo}', '', {$bytes}, '{$ds_tamanho}', 1, now()); ";
				
			return execute($sql);
		}
		else{
			return false;
		}	
	}
	
	public function bytesAndDescription(&$bytes, &$description, $targetFile){
		$bytes = filesize($targetFile);				
		if ($bytes < 1024) $description = $bytes.' B';
		elseif ($bytes < 1048576) $description = round($bytes / 1024, 2).' KB';
		elseif ($bytes < 1073741824) $description = round($bytes / 1048576, 2).' MB';
		elseif ($bytes < 1099511627776) $description = round($bytes / 1073741824, 2).' GB';
		else $description = round($bytes / 1099511627776, 2).' TB';
	}
	
} 
 ?>