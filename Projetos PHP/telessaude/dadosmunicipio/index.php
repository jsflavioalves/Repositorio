<?php
/**
 * Dados Município
 * @version 1.0
*/
require_once('../includes/frameworkdados.php');
$transacao = 'dados_municipios';

$ufDefault = Session::get('uf');

if(@$_GET['uf']) {
	Session::save('uf', $_GET['uf']);
	$ufDefault = $_GET['uf'];
}

if(!$ufDefault) {
	$ufDefault = 'CE';
}

if(!$auth->isRead($transacao)){
	Util::info(Config::AUTH_MESSAGE);
	return true;
}

//Consultando os estados e os municípios do estado padrão
$sqlEstados = 'select distinct uf from integracao.tb_municipio order by 1 asc';
$queryEstados = query($sqlEstados);
$sqlMunicipios = "select tm.codigo, tm.nome from nuteds.tb_dados_municipio as ntdm
inner join integracao.tb_municipio as tm on(ntdm.cd_municipio=tm.codigo and tm.uf='$ufDefault')
order by tm.nome";
$queryMunicipios = query($sqlMunicipios);

?>
<!DOCTYPE HTML>
<html>
<head>	
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dados Municípios</title>	
	<script type="text/javascript" src="../assets/js/jquery-1.9.0.min.js"></script>
	<script type="text/javascript" src="../assets/js/jquery-ui-1.10.4.custom.min.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../assets/js/framework.js"></script>	
	<link type="text/css" href="css/bootstrap.min.css" rel="stylesheet" />
	<link type="text/css" href="../assets/css/theme-default/jquery-ui-1.10.3.custom.min.css" rel="stylesheet" />	
	<link type="text/css" href="../assets/css/framework.css" rel="stylesheet" />	
	<link type="text/css" href="css/style.css" rel="stylesheet" />
	<link rel="shortcut icon" href="../assets/assets/favicon.ico" type="image/x-icon" />	
	<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">  
	<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
      <script src="../assets/js/respond.min.js"></script>
    <![endif]-->	
	<style>
		label { font-weight:unset !important; }
	</style>
</head>
<body>
	<div id="wrapper">
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="index.php" class="navbar-brand">
					Dados Municípios
				</a>				
			</div>
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul id="ulItems" class="nav navbar-nav side-nav nuteds">
					<li <?php echo (@$_GET['page'] ? ($_GET['page'] == 'novo' ? 'class="active"' : '') : 'class="active"'); ?>><a href="index.php"><i class="fa fa-dashboard"></i> DASHBOARD</a></li>				
					<div class="input-group">
						<input id="txtBusca" type="text" style="border-radius:0px;" class="form-control" placeholder="BUSCA..." aria-describedby="basic-addon2">
						<span class="input-group-addon" id="basic-addon2" style="border-radius:0px;"><i class="fa fa-search"></i></span>
					</div>
					<?php
					while($row = $queryMunicipios->fetch()){
						$active = 'class="municipio ';
						if(@$_GET['codigo'] == $row['codigo']) {
							$active .= ' active';
						}						
						$active .= '"';
						echo '<li '.$active.'><a href="index.php?page=view&codigo='.$row['codigo'].'"> '.$row['nome'].'</a></li>';
					}
					?>
				</ul>
				<ul class="nav navbar-nav navbar-right navbar-user">
					<li style="padding-top:6px;">
						<select id="cd_estado" name="cd_estado" onchange="atualizaBoxLocalidade();" class="form-control">
							<?php
							while($row = $queryEstados->fetch()){
								if($ufDefault == $row['uf'])
									echo '<option value="'.$row['uf'].'" selected="selected">'.$row['uf'].'</option>';						
								else
									echo '<option value="'.$row['uf'].'">'.$row['uf'].'</option>';
							}
							?>	
						</select>					
					</li>
					<li class="dropdown user-dropdown">
						<a href="#" class="dropdown-toggle navbar-user-nuteds" data-toggle="dropdown"> Opções <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="../index.php"><i class="fa fa-power-off"></i> Voltar ao Telessaúde</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
	</div>
	<div id="page-wrapper">
		
		<?php
			if(!@$_GET['page']){
				include('home.php');
			}
			else{
				if(file_exists($_GET['page'].'.php')){
					include($_GET['page'].'.php');
				}
				else{
					echo 'Módulo não encontrado: <b>'.$_GET['page'].'.php</b>';
				}				
			}
		?>
		

		<!--<div class="row">
			<div class="col-lg-12">
				<h3 class="nuteds-title">BISTURI<small>  172.18.0.9</small></h3>	
			</div>
		</div>-->
	</div>
<script type="text/javascript">
$(function(){
    $("#txtBusca").keyup(function(){
        var texto = $(this).val().toUpperCase();         
        $("#ulItems .municipio").css("display", "block");
        $("#ulItems .municipio").each(function(){
            if($(this).text().indexOf(texto) < 0)
               $(this).css("display", "none");
        });
    });
});
function atualizaBoxLocalidade(){
	var cd_estado = $('#cd_estado').val();
	//$('#boxLocalidade').load('../partials/localizacao_box.php', {cd_estado: cd_estado});
	window.location = 'index.php?uf=' + cd_estado;
}
</script>
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