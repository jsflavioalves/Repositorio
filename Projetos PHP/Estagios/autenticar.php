
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


// INÍCIO CADASTRO DE ALUNO

$curso=utf8_decode(strtoupper($_POST['curso']));
//$instituicao=utf8_decode(strtoupper($_POST['instituicao']));
//$origem=$_POST['origem'];
$nome=utf8_decode(strtoupper($_POST['nome']));
$nome2=utf8_decode($_POST['nome']);
$matricula=utf8_decode($_POST['matricula']);
$cpf=utf8_decode($_POST['cpf']);
$rg=utf8_decode($_POST['rg']);
$mae=utf8_decode(strtoupper($_POST['mae']));
$telefone=utf8_decode($_POST['telefone']);
$email=$_POST['email'];
$endereco=utf8_decode(strtoupper($_POST['endereco']));
$cidade=utf8_decode(strtoupper($_POST['cidade']));
$uf=utf8_decode(strtoupper($_POST['uf']));

$consulta_id = mysql_query("SELECT * FROM cursos WHERE curso = '$curso'");
	$conta = mysql_num_rows($consulta_id);

	if($conta == 0){
		echo '<script> alert("CURSO NÃO EXISTENTE!"); </script>';
		echo "<script>direct(); </script>";
	} else if($conta != 0){
		$dados = @mysql_fetch_array($consulta_id);
		$id_curso = $dados['id_curso'];
	}

$opt=$_POST['opt'];
$id_grupo=$_POST['grupo'];
$busca_grupo = mysql_query("SELECT * FROM grupo_vagas WHERE id_grupo LIKE '$id_grupo'");
$array = mysql_fetch_array($busca_grupo);
$grupo=$array['descricao_grupo'];

if($opt == "sim"){
	$inserir_permissao = mysql_query("INSERT INTO permissoes_grupo VALUES('', '$matricula', '$id_grupo', '$grupo')");
} 

$selecionar=mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$matricula'");
$result=mysql_num_rows($selecionar);

$selecionar2=mysql_query("SELECT * FROM usuarios_agencia WHERE login LIKE '$matricula'");
$result2=mysql_num_rows($selecionar2);

if ($result == 0) {
	$inserir_aluno = mysql_query("INSERT INTO alunos VALUES('', '$nome', '$cpf', '$rg', '$matricula', '$id_curso', '$curso', '', '', '', '$mae', '$telefone', '$email' ,'$endereco', '$cidade', '$uf')");
    if ($inserir_aluno != 0){echo'<script type="text/javascript">alert("Aluno cadastrado com sucesso");</script>';}
    	
     echo "<script>direct(); </script>"; 
}
if ($result2 == 0) {
	$inserir_usuario = mysql_query("INSERT INTO usuarios_agencia VALUES('', '$nome2', '$matricula', '$cpf', 'aluno', '', 'user_padrao.jpg', 'Pendente')");
	
    echo'<script type="text/javascript">alert("Usuário cadastrado com sucesso, você ja pode realizar seu primeiro login!");</script>';	

    echo "<script>direct(); </script>"; 
}
if ($result != 0) {
	$atualizar_aluno = mysql_query("UPDATE alunos SET email = '$email', rg= '$rg', telefone = '$telefone', endereco = '$endereco', nome_mae='$mae', cidade='$cidade', uf='$uf'  WHERE matricula = '$matricula'");
    echo'<script type="text/javascript">alert("Usuário já cadastrado, realize apenas o seu login!");</script>';	
    echo "<script>direct(); </script>"; 
}

// FIM CADASTRO DE ALUNO
?>
</body>
</html>
