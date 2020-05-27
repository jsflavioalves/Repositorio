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
      $pasta = './importacoes/';
      move_uploaded_file($_FILES['pdf']['tmp_name'], $pasta . $_FILES['pdf']['name']);
    }
    if (isset($_POST['btn_perfil'])) {
      $nome_arquivo = $arquivo;
      $objeto = fopen($nome_arquivo, 'r');
      while (($dados = fgetcsv($objeto, 1000, ";")) !== FALSE) {
        echo $sql = "INSERT INTO convenios_andamento VALUES ('','$dados[1]','$dados[2]','$dados[3]','$dados[4]','$dados[5]','$dados[6]','$dados[7]','$dados[8]')";
        // $mysql = mysql_query($sql);
      }
      fclose($objeto);
    }

    

   ?>
</body>
</html>