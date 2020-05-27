<html>
<head>
  <title></title>
</head>
<body>
  <?php 
    require ('conn.php');
    mysql_select_db('estagios');

    $arquivo = $_FILES['pdf']['name'];

    if ($_FILES['pdf']['name'] != "") {
      $pasta = './';
      move_uploaded_file($_FILES['pdf']['tmp_name'], $pasta . $_FILES['pdf']['name']);
    }
    if (isset($_POST['btn_perfil'])) {
      $nome_arquivo = $arquivo;
      $objeto = fopen($nome_arquivo, 'r');
      while (($dados = fgetcsv($objeto, 1000, ";")) !== FALSE) {
        $sql = "INSERT INTO convenios_andamento VALUES ('','$dados[0]','$dados[1]','$dados[2]','$dados[3]','$dados[4]','$dados[5]','$dados[6]','$dados[7]')";
        $mysql = mysql_query($sql);
      }
      fclose($objeto);
      //header('location:http://www.estagios.ufc.br/siges/public_html/CpanelAdm/');
    }

    

   ?>
</body>
</html>