<?php
/**
 * Página principal
 * @package default
 * @version 1.0
 * @copyright atitudeweb
 * @license http://opensource.org/licenses/gpl-3.0.html GPL General Public License
*/
 
define('EXEC', 1);
define('ATITUDE_BASE', dirname(__FILE__));
define('DS', DIRECTORY_SEPARATOR);
require_once(ATITUDE_BASE.DS.'includes'.DS.'framework.php');

//Verificando o logout do sistema
if(@$_GET['logout']){	
	$auth->logout();
	$user = null;
}

ob_start();
?>
<!DOCTYPE HTML>
<html>
<head>	
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo Config::SYSTEM; ?></title>	
	<script type="text/javascript" src="assets/js/jquery-1.9.0.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery-ui-1.10.4.custom.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/framework.js"></script>	
	<link type="text/css" href="assets/css/bootstrap.min.css" rel="stylesheet" />
	<link type="text/css" href="assets/css/theme-default/jquery-ui-1.10.3.custom.min.css" rel="stylesheet" />	
	<link type="text/css" href="assets/css/framework.css" rel="stylesheet" />	
	<link rel="shortcut icon" href="assets/assets/favicon.ico" type="image/x-icon" />	  
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
	<atitudeweb:include type="head" />
</head>
<body>
    
    <div id="corpo">
		<?php 
		
		if(!$user){
		    /** o login monta a p�gina toda **/
			include('includes/login.php');
		}
		else{
			include('includes/header.php'); 
			echo '<div class="container">';
			if(!@$_GET['page']){
			include('includes/home.php');
			}
			else{
			if(file_exists('modules/'.$_GET['page'].'.php')){
			include('modules/'.$_GET['page'].'.php');
			}
		else{
			echo 'Módulo não encontrado: <b>'.'modules/'.$_GET['page'].'.php</b>';
			}				
		}
			echo '</div>';			
		}
		?>		
	</div>  
</body>
</html>
 <?php
	$data = ob_get_contents();
	ob_end_clean();	
	$matches = array();
	if(preg_match_all('#<atitudeweb:include\ type="([^"]+)" (.*)\/>#iU', $data, $matches)){
		if($matches[1][0] == 'head'){
			$buffer = '';
			for($i=0;$i<count(Controller::$head);$i++){
				$buffer .= Controller::$head[$i]."\n";
			}
			$data = str_replace($matches[0][0], $buffer, $data);
		}
	}
	echo $data;		
	if(@$_POST['info']){
		Util::notice($_POST['title'], $_POST['text'], $_POST['type']);
	}	
?> 