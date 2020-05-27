<?php 
  require('conn.php');
  mysql_select_db('estagios');

  $sesao=mysql_query("DELETE FROM convenios_andamento");

  header('location:http://www.estagios.ufc.br/siges/public_html/CpanelAdm/importacoes/imports.php')

?>