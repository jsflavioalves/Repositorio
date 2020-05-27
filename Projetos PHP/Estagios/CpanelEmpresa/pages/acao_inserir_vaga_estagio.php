<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
		function redi() {
			alert("VAGA CADASTRADA COM SUCESSO!");
			window.location = "../vagas_estagio.php";
		}
	</script>
</head>
<body>

</body>
</html>

<?php 
require('../conn.php');
mysql_select_db('estagios');

$id_centro = $_POST['id_centro'];
$descricao = utf8_decode($_POST['descricao']);
$link = $_POST['link'];
$arquivo = $_FILES['foto_vaga']['name'];
$autor = $_POST['autor'];

if ($_FILES['foto_vaga']['name'] != "") {
	$pasta = '../CpanelAdm/pages/forms/vagas_foto/';
	move_uploaded_file($_FILES['foto_vaga']['tmp_name'], $pasta.$_FILES['foto_vaga']['name']);

	$inserir = mysql_query("INSERT INTO vagas_estagios VALUES ('','$id_centro','$descricao','$link','$arquivo', '$autor')");
	echo '<script> redi(); </script>';

} else if($_FILES['foto_vaga']['name'] == ""){
	$inserir = mysql_query("INSERT INTO vagas_estagios VALUES ('','$id_centro','$descricao','$link','', '$autor')");
	echo '<script> redi(); </script>';
}

 ?>
