<?php
//CUIDADO!
//ESSE CÓDIGO ESTÁ INTERLIGADO COM DUPLICIDADE 2 E 3 E DUPLICIDADE_EMPRESA_EXCLUIR
//CÓDIGO  TAMBÉM INTERLIGADO COM AS TABELAS
//TERMO_COMPROMISSO
//TERMO_CONVENIO
//EMPRESAS
//EM_DUP3 (EMPRESAS QUE ESTÃO DUPLICADAS E OUTRAS JÁ FORAM RESOLVIDAS)
//ESSE CÓDIGO FOI ELABORADO PARA EXCLUIR A DUPLICIDADE DE EMPRESAS NO BANCO DE DADOS
//COMO BEM SABE, CASO COLOQUE O NOME DESSA PÁGINA PARA PESQUISAR NA URL DENTRO DO SISTEMA, TEM A POSSIBILIDADE DE COMPROMETER ALGUMA DADO DO BANCO SE ATUALIZAR MAIS DE UMA VEZ
//ISSO SE FOR APENAS OLHAR O CÓDIGO
//CASO FOR UTILIZAR, DESCONSIDERE AS INFORMAÇÕES ACIMA
require('../../../conn.php');
mysql_select_db('estagios');

	$busca1 = mysql_query("SELECT * FROM emp_dup3");
	while($array1 = mysql_fetch_array($busca1)){
	$codigo_novo = $array1['CD_EMPRESA'];
	$cnpj = $array1['cnpj'];
	$nome_empresa = $array1['nome'];

	$busca2 = mysql_query("SELECT * FROM empresas WHERE cnpj LIKE '$cnpj' AND nome LIKE '$nome_empresa'");
	while($array2 = mysql_fetch_array($busca2)){ 
		$CD_EMPRESA = $array2['CD_EMPRESA'];

	$busca4 = mysql_query("UPDATE termo_convenio SET CD_EMPRESA = '$codigo_novo' WHERE CD_EMPRESA = '$CD_EMPRESA'");

	}
	
	
	}

?>