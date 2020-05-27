<?php 
	require ('../../../conn.php');
    mysql_select_db('estagios');
	$cd_centro = utf8_decode($_POST['CD_CENTRO']);
    $descricao = utf8_decode($_POST['descricao']);
    $link = utf8_decode($_POST['link']);
    $arquivo = $_FILES['foto_vaga']['name'];
    $arquivo2 = $_FILES['foto_vaga2']['name'];
    $autor = $_POST['autor'];

     setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                    date_default_timezone_set('America/Sao_Paulo');
                    $dia = strftime('%d', strtotime('today'));
                    $mes = date('m');
                    $ano = strftime('%Y', strtotime('today'));

if ($_FILES['foto_vaga']['name'] != "") {
	$pasta = './vagas_foto/';
	move_uploaded_file($_FILES['foto_vaga']['tmp_name'], $pasta.$_FILES['foto_vaga']['name']);
}
if ($_FILES['foto_vaga2']['name'] != "") {
    $pasta = './vagas_foto/';
    move_uploaded_file($_FILES['foto_vaga2']['tmp_name'], $pasta.$_FILES['foto_vaga2']['name']);
}
if (isset($_POST['inserir'])) {

    $inserir = mysql_query("INSERT INTO vagas_estagios VALUES ('','$cd_centro','$descricao','$link','$arquivo','$arquivo2','$autor','$dia/$mes/$ano')");

    header('location:vagas_estagios.php');
}

 ?>