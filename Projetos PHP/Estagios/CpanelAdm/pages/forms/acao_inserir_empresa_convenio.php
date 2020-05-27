<?php 
	header("Content-type: text/html; charset=utf-8");
	
    require ('../../../conn.php');
    mysql_select_db('estagios');
    $id_empresa = $_POST['id_empresa'];
    $processo = $_POST['processo'];
    $dt_inicio = $_POST['dt_inicio'];
    $dt_fim = $_POST['dt_fim'];
    $arquivo = $_FILES['pdf']['name'];
    $tipo_convenio = strtoupper(utf8_decode($_POST['tipo_convenio']));

    $busca = mysql_query("SELECT * FROM termo_convenio WHERE NR_PROCESSO LIKE '$processo'");
    $resultado = mysql_num_rows($busca);

    if($resultado == 0){
    	$inserir = mysql_query("INSERT INTO termo_convenio VALUES ('','$id_empresa','$processo','$dt_inicio','$dt_fim', '$tipo_convenio' ,'1', '$arquivo')");
         if ($_FILES['pdf']['name'] != "") {
        $pasta = './convenio_pdf/';
        move_uploaded_file($_FILES['pdf']['tmp_name'], $pasta.$_FILES['pdf']['name']);
    }   
    	header('location:cadastro_empresas_convenio.php');
    } else if($resultado != 0){
    	echo '<script>alert("NÚMERO DE PROCESSO JÁ EXISTE!");</script>'; 
        $insertGoTo='cadastro_empresas_convenio.php';
        header( "refresh:0;url={$insertGoTo}" );
    }

 ?>