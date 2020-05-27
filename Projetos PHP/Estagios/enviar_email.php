<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <script type="text/javascript">function direct(){setTimeout("window.location='http://www.estagios.ufc.br/siges/public_html/contact.php',3000");}</script>
</head>
<body>
<?php 
	require ('conn.php');
        mysql_select_db('estagios');

	$nome = utf8_decode($_POST['nome']);
	$nome = mb_strtoupper($nome);
    $email = utf8_decode($_POST['email']);
    $email = mb_strtoupper($email);
    $assunto = utf8_decode($_POST['assunto']);
    $assunto = mb_strtoupper($assunto);
    $mensagem = utf8_decode($_POST['mensagem']);
    $mensagem = mb_strtoupper($mensagem);

    setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                    date_default_timezone_set('America/Sao_Paulo');
                    $dia = strftime('%d', strtotime('today'));
                    $mes = date('m');
                    $ano = strftime('%Y', strtotime('today'));
                    $hora = date('H:i');

        $inserir = mysql_query("INSERT INTO email VALUES ('','$nome', '$email', '$assunto', '$mensagem','$dia/$mes/$ano','$hora')");
        echo "<script>alert('E-MAIL ENVIADO COM SUCESSO!'); </script>";
        echo "<script>direct(); </script>";

    

 ?>
 </body>
</html>