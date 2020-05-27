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
	$_SESSION['pdf']=$arquivo;
	$tmpName =$_FILES['pdf']['tmp_name'];
	
	
	$arquivotras = $_FILES['pdftras']['name'];
	$_SESSION['pdftras']=$arquivotras;
	$tmpNametras =$_FILES['pdftras']['tmp_name'];
		
			
	if ($_FILES['pdf']['name'] != "") {
	    $pasta = './templatecert/';
	    move_uploaded_file($_FILES['pdf']['tmp_name'], $pasta . $_FILES['pdf']['name']);
	 	}
	if ($_FILES['pdftras']['name'] != "") {
	    $pasta = './templatecert/';
	    move_uploaded_file($_FILES['pdftras']['tmp_name'], $pasta . $_FILES['pdftras']['name']);
	   	}
	echo "Upload realizado com sucesso! ";
	echo '<form>
	    <input type="button" style="background-color:ruby" value="Voltar" onClick="JavaScript: window.history.back();">
	    </form>';
	?>
										
	
	
	
