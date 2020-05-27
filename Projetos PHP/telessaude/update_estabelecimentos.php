<?php
//Este serviço tem a finalidade de atualizar os estabelecimentos de saúde
//se baseando no serviço da LAIS

error_reporting(E_ALL);
ini_set('display_errors', 1);
set_time_limit(0);

define('ATITUDE_BASE', getcwd());
require_once('includes/frameworkdefault.php');
Loader::import('com.atitudeweb.Util');


function connect($url = 'http://barramento.lais.huol.ufrn.br/api/v2/tipos/ibge/unidades-federativas/CE/estabelecimentos/?format=json'){
	$ch = curl_init();
	$header = array(	"Accept:application/json",
						"Content-Type:application/json; charset=utf-8",
						"Authorization: Token 2c23eca380c9ad8824a47e7f50b66f4cc651f705"
					);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_URL, $url);
	$resp = curl_exec($ch);
	$error = false;
	if($resp === false){
		$error = curl_error($ch);
	}		
	curl_close($ch);	
	if($error){		
		echo 'error: '.$error; exit;					
	}
	else{			
		$data = json_decode($resp);			
		return $data;
	}
}

echo "<pre>";

$lais = connect();

foreach($lais as $key=>$obj) {
	
	$cnes 		= $obj->cnes;
	$mun 		= $obj->municipio->codigo;
	$cnpj		= $obj->cnpj;
	$cep		= $obj->cep;
	$email		= $obj->email;
	$logradouro = $obj->logradouro;
	$nome		= $obj->nome;
	$num		= $obj->num_endereco;
	$razao		= $obj->razao_social;
	$tel		= $obj->telefone;
	$uf			= $obj->municipio->unidade_federativa->sigla;
	$ativo		= ($obj->ativo == '1' ? 'true' : 'false');
	
	$insert = "INSERT INTO integracao.tb_estabelecimento (codigo_cnes, codigo_municipio, cnpj, cep, email, logradouro, nome, num_endereco, razao_social, telefone, uf, ativo)
	VALUES('$cnes', '$mun', '$cnpj', '$cep', '$email', '$logradouro', '$nome', '$num', '$razao', '$tel', '$uf', $ativo);";

	if(!@execute($insert)){		
		$update = "UPDATE integracao.tb_estabelecimento
		SET codigo_municipio='$mun', cnpj='$cnpj', cep='$cep', email='$email', logradouro='$logradouro', nome='$nome', num_endereco='$num', razao_social='$razao',
		 telefone='$tel', uf='$uf' WHERE codigo_cnes='$cnes';";	
	}
}

echo count($lais).' Atualizados ou inseridos com sucesso!!!';

?>