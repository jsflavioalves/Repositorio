	<!DOCTYPE html>
<html lang="en">
<head> 
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<meta name="description" content="Creative One Page Parallax Template">
	<meta name="keywords" content="Creative, Onepage, Parallax, HTML5, Bootstrap, Popular, custom, personal, portfolio" /> 
	<meta name="author" content=""> 
	<title>UFC - Agência de Estágios</title> 
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/prettyPhoto.css" rel="stylesheet"> 
	<link href="css/font-awesome.min.css" rel="stylesheet"> 
	<link href="css/animate.css" rel="stylesheet"> 
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="css/modal.css">
	<script language="JavaScript" type="text/javascript" src="js/MascaraValidacao.js"></script> 


	<!--[if lt IE 9]> <script src="js/html5shiv.js"></script> 

	<script src="js/respond.min.js"></script> <![endif]--> 
	<link rel="shortcut icon" href="images/ico/icon.png"> 
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png"> 
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png"> 
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png"> 
	<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

    <link href="css/style2.css" rel="stylesheet">

	<!-- CSS DO ASSETS -->

    <link href="assets/css/material-kit.css" rel="stylesheet"/>

	<link rel="stylesheet" href="assets/css/bootstrap.css">

	<link rel="stylesheet" href="assets/css/neon-theme.css">

	<script src="assets/js/jquery-1.11.0.min.js"></script>

    <script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>
</head><!--/head-->
<body>
	<div class="preloader">
		<div class="preloder-wrap">
			<div class="preloder-inner"> 
				<div class="ball"></div> 
				<div class="ball"></div> 
				<div class="ball"></div> 
				<div class="ball"></div> 
				<div class="ball"></div> 
				<div class="ball"></div> 
				<div class="ball"></div>
			</div>
		</div>
	</div><!--/.preloader-->
	<header id="navigation"> 
		<div class="navbar navbar-inverse navbar-fixed-top" role="banner"> 
			<div class="container"> 
				<div class="navbar-header"> 
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> 
						<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> 
					</button> 
					<a href="index.php" class="imglogo"><h1><img src="images/logo.png" alt="logo" class="img"></h1></a> 
				</div> 
				<div class="collapse navbar-collapse"> 
					<ul class="nav navbar-nav navbar-right"> 
						<li class="scroll"><a href="index.php">Inicio</a></li>
					
						<!-- <li class="scroll"><a href="#services">Serviços</a></li> -->  
						<li class="scroll"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Agência<b class="caret"></b></a>
                        <ul class="dropdown-menu">
						<li class="scroll"><a href="sobre.php">sobre</a></li> 
                        <li><a href="tds_convenio.php">Empresas Conveniadas</a></li>
                        <li><a href="convenios_andamento.php">Convênios em Andamento</a></li>
                        <li><a href="convenios_pendentes.php">Convênios Pendentes</a></li>
			            </ul>
						</li> 

						<li class="scroll"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Termos<b class="caret"></b></a>
                        <ul class="dropdown-menu">

		                    <li><a href="termo_convenio.php">Termos de Convênio</a></li>
		                    <li><a href="ajuda_convenio.php">faqs - convênio</a></li>
		                    <li class="divider"></li>
		                    <li><a href="termo_estagio.php">Termo de compromisso</a></li>
                            <li><a href="termo_aditivo.php">Termo Aditivo</a></li>
                            <li><a href="termo_coletivo.php">Termo Coletivo</a></li>
                            <li><a href="ajuda_estagio.php">faqs - estágio</a></li>
		                  

			            </ul>
						</li>
						<li class="scroll"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Serviços<b class="caret"></b></a>
                        <ul class="dropdown-menu">

		                    <li><a href="validar_declaracao.php">Validar Declaração</a></li>
		                    <li><a href="prof_orientador.php">Professor Orientador</a></li>
		                    <!-- <li><a href="ajuda_convenio.php">faqs - convênio</a></li>
		                    <li class="divider"></li>
		                    <li><a href="termo_estagio.php">Termo de compromisso</a></li>
                            <li><a href="termo_aditivo.php">Termo Aditivo</a></li>
                            <li><a href="termo_coletivo.php">Termo Coletivo</a></li>
                            <li><a href="ajuda_estagio.php">faqs - estágio</a></li> -->
		                  

			            </ul>
						</li>     
						<li class="scroll"><a href="contact.php">Contato</a></li>


					</ul> 
				</div> 
			</div> 
		</div><!--/navbar--> 
	</header> <!--/#navigation--> 

<!-- BEGIN # MODAL LOGIN -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" align="center">
					<img class="img_logo" src="images/logo2.png">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
					</button>
				</div>
                
                <!-- Begin # DIV Form -->
                <div id="div-forms">
                
                    <!-- Begin # Login Form -->
                    <form id="login-form" method="POST" name="form1" action="login.php">
		                <div class="modal-body">
				    		<div id="div-login-msg">
                                <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-login-msg">Informe seus dados.</span>
                            </div>
				    		<input id="login_username" class="form-control" name="matricula" type="text" placeholder="Nº de Matricula" required>
				    		<input id="login_password" class="form-control" name="cpf" type="text" placeholder="CPF" onKeyPress="MascaraCPF(form1.cpf);" maxlength="14" required>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Preencher automaticamente.
                                </label>
                            </div>
        		    	</div>
				        <div class="modal-footer">
                            <div>
                                <button type="submit" class="btn btn-default slider-btn animated bounceInUp">Entrar</button>
                            </div>
				    	    <br><br>
				        </div>
                    </form>
                    <!-- End # Login Form -->
                    
                  
                </div>
                <!-- End # DIV Form -->
                
			</div>
		</div>
	</div>
	
			
	<br><br><br>
<section id="about-us">
	<div class="container">
		<div class="text-center">
			<div class="col-sm-8 col-sm-offset-2">
				<h2 class="title-one">Termo de convênio</h2>
				<p>Tirando as duvidas sobre convênio.</p>
			</div>
		</div>

		<div class="about-us">
			<div class="row">
				<div class="col-sm-12">
		<br><br>
		<div class="row">
			<div class="col-md-12">
			
				<div class="panel panel-primary" data-collapsed="0">
					
					<!-- panel head -->
					<div class="panel-heading">
						<div class="panel-title"> Empresa</div>
						
						<div class="panel-options">
							<a href="#" data-rel="collapse"><i class="fa fa-chevron-down" aria-hidden="true"></i></a>
						</div>
					</div>
					
					<!-- panel body -->
					<div class="panel-body">
					O Termo de Convênio de Estágio deverá ser entregue em 3 vias à Agência de Estágios, carimbado e assinado pela empresa, juntamente com 1 via dos seguintes documentos:<br><br>

					1) Plano de Trabalho assinado (está na última folha);<br>
					  
					2) Cópia do Estatuto ou do Contrato Social da empresa, ou de Termo de Posse ou de Portaria de Nomeação designando representante;<br>
					 
					3) Certidão Negativa de débitos fiscais junto à Receita Federal;<br>
					 
					4) Certidão Negativa de regularidade fiscal do FGTS;<br>

					5) Certidão Negativa de débitos trabalhistas.<br><br>

					Obs: O nome do subscritor do convênio têm que constar no estatuto ou contrato social da empresa. Se não constar, deve ser anexado uma procuração conferindo poderes ao representante para efetuar a subscrição. <br><br>

					<div class="btn-group">
								<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" >Download</button>
								<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
									<i class="fa fa-download"></i>
								</button>
								
								<ul class="dropdown-menu dropdown-danger" role="menu">
									<li><a href="#" target="_blank"><i class="entypo-right"></i>Formato PDF</a>
									</li>
									<li><a href="termos/T.C-Empresa.doc"><i class="entypo-right"></i>Formato DOC</a>
									</li>
									
								</ul>
							</div>

					</div>
					
				</div>
				
			</div>

			<div class="col-md-12">
			
				<div class="panel panel-primary" data-collapsed="1">
					
					<!-- panel head -->
					<div class="panel-heading">
						<div class="panel-title"> Profissional Liberal</div>
						
						<div class="panel-options">
							<a href="#" data-rel="collapse"><i class="fa fa-chevron-down" aria-hidden="true"></i></a>
						</div>
					</div>
					
					<!-- panel body -->
					<div class="panel-body">
						
					O Termo de Convênio de estágio deverá ser entregue assinado e carimbado pela empresa e enviado para agência de estágios em 3 vias e plano de trabalho em 1 via com:<br><br>

						

						1) Uma cópia de registro no conselho competente ou registro na junta comercial como firma individual ou micro empreendedor individual.<br>

						2) uma Certidão Negativa de Débitos Fiscais junto a Secretaria da Receita Federal do Brasil.<br>

						3) Comprovante de endereço do escritório do Profissional Liberal.<br><br>

						Se houver empregados:<br><br>

						3) Uma Certidão Negativa de Débitos Trabalhistas.<br>

						4) Certidão Negativa de Débitos junto ao FGTS.<br>

						<br><br>

                     <div class="btn-group">
								<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" >Download</button>
								<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
									<i class="fa fa-download"></i>
								</button>
								
								<ul class="dropdown-menu dropdown-danger" role="menu">
									<li><a href="#" target="_blank"><i class="entypo-right"></i>Formato PDF</a>
									</li>
									<li><a href="termos/T.C-PL.doc"><i class="entypo-right"></i>Formato DOC</a>
									</li>
									
								</ul>
							</div>
						
						
					</div>
					
				</div>
				
			</div>
						<div class="col-md-12">
			
				<div class="panel panel-primary" data-collapsed="1">
					
					<!-- panel head -->
					<div class="panel-heading">
						<div class="panel-title"> Agente de Integração</div>
						
						<div class="panel-options">
							<a href="#" data-rel="collapse"><i class="fa fa-chevron-down" aria-hidden="true"></i></a>
						</div>
					</div>
					
					<!-- panel body -->
					<div class="panel-body">
						
				   <div class="panel-body">
					O Termo de Convênio de Estágio deverá ser entregue em 3 vias à Agência de Estágios, carimbado e assinado pela empresa, juntamente com 1 via dos seguintes documentos:<br><br>

					1) Plano de Trabalho assinado (está na última folha);<br>
					  
					2) Cópia do Estatuto ou do Contrato Social da empresa, ou de Termo de Posse ou de Portaria de Nomeação designando representante;<br>
					 
					3) Certidão Negativa de débitos fiscais junto à Receita Federal;<br>
					 
					4) Certidão Negativa de regularidade fiscal do FGTS;<br>

					5) Certidão Negativa de débitos trabalhistas.<br><br>

					Obs: O nome do subscritor do convênio têm que constar no estatuto ou contrato social da empresa. Se não constar, deve ser anexado uma procuração conferindo poderes ao representante para efetuar a subscrição. <br><br>
                     <div class="btn-group">
								<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" >Download</button>
								<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
									<i class="fa fa-download"></i>
								</button>
								
								<ul class="dropdown-menu dropdown-danger" role="menu">
									<li><a href="#" target="_blank"><i class="entypo-right"></i>Formato PDF</a>
									</li>
									<li><a href="termos/T.C-AI.doc"><i class="entypo-right"></i>Formato DOC</a>
									</li>
									
								</ul>
							</div>


						
						
					</div>
					
				</div>
				
			</div>
						
		
		
				</div>
				</div>
			</div>
		</div>
	</section>
	<footer id="footer"> 
		<div class="container"> 
			<div class="text-center"> 
				<p>Copyright &copy; 2017 - <a href="http://ufc.br">UFC</a> - Agência de Estágio | Todos os direitos reservados</p> 
			</div> 
		</div> 
	</footer> <!--/#footer--> 

	<script src="assets/js/main-gsap.js"></script>
	<script src="assets/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="assets/js/resizeable.js"></script>


	<!-- Imported scripts on this page -->

	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/jquery.tocify.min.js"></script>
	<script src="assets/js/neon-custom.js"></script>	

	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/smoothscroll.js"></script> 
	<script type="text/javascript" src="js/jquery.isotope.min.js"></script>
	<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script> 
	<script type="text/javascript" src="js/jquery.parallax.js"></script> 
	<script type="text/javascript" src="js/main.js"></script>  
	<script type="text/javascript" src="js/modal.js"></script>




	
</body>
</html>