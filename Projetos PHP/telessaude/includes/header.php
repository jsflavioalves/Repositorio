<?php
defined('EXEC') or die();
function readMenu($menuxml){
	global $pages;
	foreach ($menuxml->li as $li){
		$href = @$li->a['href'];
		$parts = explode('=', $href);
		unset($parts[0]);
		$parts = implode('=', $parts);
		$parts = explode('/', $parts);
		$menuitem = $parts[count($parts) - 1];
		if($menuitem)
			$pages[$menuitem] = array(	'label' => (string) $li->a, 'link' => (string) $href );
			
		if(@$li->ul){
			readMenu($li->ul);
		}
	}
}	

$isProfissional = $auth->isProfissional();
?>
<div class="header-task">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
			<a href="index.php">
				<img src="assets/logos.png" alt="Logotipo" class="center-block" />
			</a>
			</div>
		</div>
	</div>
</div>

	<div class="navbar navbar-default navbar-static-top">
		<div class="container">
		<div class="row">
			<button class="navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<div class="collapse navbar-collapse navHeaderCollapse">			
			<?php 
			ob_start();
			require('includes/menu.php');
			$menuhtml = ob_get_contents();
			ob_end_clean();	
			$menuxml = simplexml_load_string($menuhtml, 'SimpleXMLElement', LIBXML_NOCDATA);	
			$pages = array();
			readMenu($menuxml);	
			echo $menuhtml;
			?>
		        <ul class="nav navbar-nav navbar-right">
					<li class="btn-danger"><a href="?logout=1" class="link-white"><span class="glyphicon glyphicon-off"></span> Sair</a></li>
		        </ul>
			</div>
			</div>
		</div>
		
	</div>

	<div class="breadcrumb breadcrumb-teleconsulta">
		<div class="container">
			<?php echo @Controller::getLocation($pages); ?>	
		</div>
	</div>