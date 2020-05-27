
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<script type="text/javascript">function direct(){setTimeout("window.location='http://www.estagios.ufc.br/siges/public_html/',3000");}</script>
</head>
<body>
<?php 

require('conn.php');
mysql_select_db('estagios');

// INÍCIO CADASTRO DE EMPRESA
$nome_empresa = utf8_decode(strtoupper($_POST['nome_empresa']));
$cnpj = $_POST['cnpj'];
$endereco_empresa = utf8_decode(strtoupper($_POST['endereco_empresa']));
$cidade_uf = utf8_decode(strtoupper($_POST['cidade']));
$cep = $_POST['cep'];
$telefone_empresa = $_POST['telefone_empresa'];
$email_empresa = $_POST['email_empresa'];
$tipo_empresa = $_POST['tipo_empresa'];
$representante = utf8_decode(strtoupper($_POST['representante']));
$senha = $_POST['senha'];

$consulta = mysql_query("SELECT * FROM empresas WHERE cnpj LIKE '$cnpj'");
$conta = mysql_num_rows($consulta);

if($conta != 0){
	echo'<script type="text/javascript">alert("EMPRESA JÁ EXISTE COM ESSE CNPJ!");</script>';	
    echo "<script>direct(); </script>";
} else if($conta == 0){
	$inserir_usuario2 = mysql_query("INSERT INTO usuarios_agencia VALUES('', '$nome_empresa', '$cnpj','$senha', 'empresa', '', 'user_padrao.jpg', 'Pendente')");
	$inserir_empresa = mysql_query("INSERT INTO empresas VALUES('', '$nome_empresa', '$cnpj', '$endereco_empresa', '$cidade_uf' ,'$cep', '$telefone_empresa', '$email_empresa', '$tipo_empresa', '', '$representante')");

	echo'<script type="text/javascript">alert("Empresa cadastrada com sucesso, você ja pode realizar seu primeiro login!");</script>';	
    echo "<script>direct(); </script>";
}
// FIM CADASTRO DE EMPRESA
?>
</body>
</html>
