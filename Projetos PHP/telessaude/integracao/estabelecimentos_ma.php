<?php
echo "<pre>";
$obj = json_decode($strJson);
for($i=0;$i<count($obj);$i++) {
	echo "INSERT INTO integracao.tb_estabelecimento(codigo_cnes, codigo_municipio, cnpj, cep, email, logradouro, nome, num_endereco, razao_social, telefone, uf)
VALUES ('".$obj[$i]->codigo_cnes."', '".$obj[$i]->codigo_municipio."', '".$obj[$i]->cnpj."', '".$obj[$i]->cep."', '".$obj[$i]->email."', '".$obj[$i]->logradouro."', '".$obj[$i]->nome."', '".$obj[$i]->num_endereco."', '".$obj[$i]->razao_social."', '".$obj[$i]->telefone."', '".$obj[$i]->uf."');
";
}



