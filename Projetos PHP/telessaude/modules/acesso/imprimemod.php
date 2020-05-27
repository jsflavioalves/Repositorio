<?php
defined('EXEC') or die();
$transacao = 'imptemplate';
$ufDefault = 'CE';

if($auth->isRead($transacao) && !$auth->isAdmin()){
	Util::info(Config::AUTH_MESSAGE);
	return true;
}

?>

  
	<!-- FAZ UPLOAD DO ARQUIVO -->
	<?php  
	$arquivo = $_FILES['pdf']['name'];
	$tmpName =$_FILES['pdf']['tmp_name'];
		
	function dataready($data) {
	    $data = trim($data);
	//    $data = stripslashes($data);
	 //   $data = htmlspecialchars($data);
	    return $data;
	}
	
	$editor_data = dataready($_POST['myeditor']);
	
	//Decoding html codes for storing in DB
	$editor_data_insert = html_entity_decode($editor_data);
		
	echo "Conteudo".$editor_data_insert;
	
	?>
										
	
	
	
