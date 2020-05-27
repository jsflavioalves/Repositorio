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

    if(isset($_POST['opt20'])){$cd_centro=20;
    $inserir = mysql_query("INSERT INTO vagas_estagios VALUES ('','$cd_centro','$descricao','$link','$arquivo','$arquivo2','$autor','$dia/$mes/$ano')");}

    if(isset($_POST['opt15'])){$cd_centro=15;
    $inserir = mysql_query("INSERT INTO vagas_estagios VALUES ('','$cd_centro','$descricao','$link','$arquivo','$arquivo2','$autor','$dia/$mes/$ano')");}

    if(isset($_POST['opt21'])){$cd_centro=21;
    $inserir = mysql_query("INSERT INTO vagas_estagios VALUES ('','$cd_centro','$descricao','$link','$arquivo','$arquivo2','$autor','$dia/$mes/$ano')");}

    if(isset($_POST['opt18'])){$cd_centro=18;
    $inserir = mysql_query("INSERT INTO vagas_estagios VALUES ('','$cd_centro','$descricao','$link','$arquivo','$arquivo2','$autor','$dia/$mes/$ano')");}

    if(isset($_POST['opt17'])){$cd_centro=17;
    $inserir = mysql_query("INSERT INTO vagas_estagios VALUES ('','$cd_centro','$descricao','$link','$arquivo','$arquivo2','$autor','$dia/$mes/$ano')");}

    if(isset($_POST['opt10'])){$cd_centro=10;
    $inserir = mysql_query("INSERT INTO vagas_estagios VALUES ('','$cd_centro','$descricao','$link','$arquivo','$arquivo2','$autor','$dia/$mes/$ano')");}

    if(isset($_POST['opt24'])){$cd_centro=24;
    $inserir = mysql_query("INSERT INTO vagas_estagios VALUES ('','$cd_centro','$descricao','$link','$arquivo','$arquivo2','$autor','$dia/$mes/$ano')");}

    if(isset($_POST['opt2'])){$cd_centro=2;
    $inserir = mysql_query("INSERT INTO vagas_estagios VALUES ('','$cd_centro','$descricao','$link','$arquivo','$arquivo2','$autor','$dia/$mes/$ano')");}

    if(isset($_POST['opt3'])){$cd_centro=3;
    $inserir = mysql_query("INSERT INTO vagas_estagios VALUES ('','$cd_centro','$descricao','$link','$arquivo','$arquivo2','$autor','$dia/$mes/$ano')");}

    if(isset($_POST['opt5'])){$cd_centro=5;
    $inserir = mysql_query("INSERT INTO vagas_estagios VALUES ('','$cd_centro','$descricao','$link','$arquivo','$arquivo2','$autor','$dia/$mes/$ano')");}

    if(isset($_POST['opt6'])){$cd_centro=6;
    $inserir = mysql_query("INSERT INTO vagas_estagios VALUES ('','$cd_centro','$descricao','$link','$arquivo','$arquivo2','$autor','$dia/$mes/$ano')");}

   if(isset($_POST['opt7'])){$cd_centro=7;
    $inserir = mysql_query("INSERT INTO vagas_estagios VALUES ('','$cd_centro','$descricao','$link','$arquivo','$arquivo2','$autor','$dia/$mes/$ano')");}

   if(isset($_POST['opt8'])){$cd_centro=8;
    $inserir = mysql_query("INSERT INTO vagas_estagios VALUES ('','$cd_centro','$descricao','$link','$arquivo','$arquivo2','$autor','$dia/$mes/$ano')");}

    if(isset($_POST['opt9'])){$cd_centro=9;
    $inserir = mysql_query("INSERT INTO vagas_estagios VALUES ('','$cd_centro','$descricao','$link','$arquivo','$arquivo2','$autor','$dia/$mes/$ano')");}

  if(isset($_POST['opt14'])){$cd_centro=14;
    $inserir = mysql_query("INSERT INTO vagas_estagios VALUES ('','$cd_centro','$descricao','$link','$arquivo','$arquivo2','$autor','$dia/$mes/$ano')");}

    if(isset($_POST['opt11'])){$cd_centro=11;
    $inserir = mysql_query("INSERT INTO vagas_estagios VALUES ('','$cd_centro','$descricao','$link','$arquivo','$arquivo2','$autor','$dia/$mes/$ano')");}

    if(isset($_POST['opt12'])){$cd_centro=12;
    $inserir = mysql_query("INSERT INTO vagas_estagios VALUES ('','$cd_centro','$descricao','$link','$arquivo','$arquivo2','$autor','$dia/$mes/$ano')");}

    if(isset($_POST['opt13'])){$cd_centro=13;
    $inserir = mysql_query("INSERT INTO vagas_estagios VALUES ('','$cd_centro','$descricao','$link','$arquivo','$arquivo2','$autor','$dia/$mes/$ano')");}

    header('location:vagas_estagios2.php');
} 

 ?>