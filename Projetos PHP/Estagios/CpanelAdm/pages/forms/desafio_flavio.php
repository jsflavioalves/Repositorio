<?php 
require('../../../conn.php');
mysql_select_db('estagios');

	$busca_id_convenio = mysql_query("SELECT * FROM termo_convenio2");
	while($array2 = mysql_fetch_array($busca_id_convenio)) {
		$busca_id = $array2['CD_EMPRESA'];
		//echo $busca_id."<br>";

		$busca_nomes = mysql_query("SELECT * FROM empresas2 WHERE CD_EMPRESA LIKE '$busca_id'");
		while($array3 = mysql_fetch_array($busca_nomes)) {
			$nomes_empresas = $array3['nome'];
			$id_teste = $array3['CD_EMPRESA'];

			$busca_id_correto = mysql_query("SELECT * FROM empresas4 WHERE nome LIKE '$nomes_empresas'");
			while($array = mysql_fetch_array($busca_id_correto)){
				$nome_correto = $array['nome'];
				$id_correto = $array['MAX(CD_EMPRESA)'];
			}

			echo "NOME: ".$nomes_empresas."<br>";
			echo "CD DUPLICADO: ".$id_teste."<br>";
			echo "CD CORRETO: ".$id_correto."<br><br>";

			$atualizar = mysql_query("UPDATE termo_convenio2 SET CD_EMPRESA='$id_correto' WHERE CD_EMPRESA LIKE '$id_teste'");

		}
	}


?>