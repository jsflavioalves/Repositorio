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
						<li class="scroll"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Convênios<b class="caret"></b></a>
                        <ul class="dropdown-menu">
						<li class="scroll"><a href="sobre.php">sobre</a></li> 
						<li><a href="ajuda_convenio.php">faqs - convênio</a></li>
                        <li><a href="tds_convenio.php">Empresas Conveniadas</a></li>
                        <li><a href="convenios_andamento.php">Convênios em Andamento</a></li>
                        <li><a href="convenios_pendentes.php">Convênios Pendentes</a></li>
			            </ul>
						</li> 

						<li class="scroll"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Termos<b class="caret"></b></a>
                        <ul class="dropdown-menu">
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
				    	    <div>
				    	    <br>
                                <button id="login_lost_btn" type="button" class="btn btn-link"></button>
                                <button id="login_register_btn" type="button" class="btn btn-link">Esse é o seu primeiro login ?</button>
                            </div>
				        </div>
                    </form>
                    <!-- End # Login Form -->
                    
                    <!-- Begin | Lost Password Form -->
                    <form id="lost-form" style="display:none;">
    	    		    <div class="modal-body">
		    				<div id="div-lost-msg">
                                <div id="icon-lost-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-lost-msg">Informe sua Matricula</span>
                            </div>
		    				<input id="lost_email" class="form-control" type="text" placeholder="CPF" required>
            			</div>
		    		    <div class="modal-footer">
                            <div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Solicitar</button>
                            </div>
                            <div>
                                <button id="lost_login_btn"  type="button" class="btn btn-link">Login</button>
                                <button id="lost_register_btn" type="button" class="btn btn-link">Registrar</button>
                            </div>
		    		    </div>
                    </form>
                    <!-- End | Lost Password Form -->
                    
                    <!-- Begin | Register Form -->
                    <form id="register-form" style="display:none;">
            		    <div class="modal-body">
		    				<div id="div-register-msg">
                                <div id="icon-register-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-register-msg">Meu primeiro login.</span>
                            </div>
                            <input id="register_username" class="form-control" type="text" placeholder="Nome Completo" required>
		    				<input id="register_username" class="form-control" type="text" placeholder="Nº de Matricula" required>
                            <input id="register_email" class="form-control" type="text" placeholder="RG" required>
                            <input id="register_password" class="form-control" type="text" placeholder="CPF" required>
            			</div>
		    		    <div class="modal-footer2">
                            <div>
                                <button type="submit" class="btn btn-default slider-btn animated bounceInUp">Registrar</button>
                            </div>
                            <div>
                                <button id="register_login_btn" type="button" class="btn btn-link"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Login </button>
                            </div>
		    		    </div>
                    </form>
                    <!-- End | Register Form -->
                    
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
				<h2 class="title-one">Termos Coletivo</h2>
				<p>Tirando as duvidas sobre estágio.</p>
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
						<div class="panel-title"> Termo Coletivo</div>
						
						<div class="panel-options">
							<a href="#" data-rel="collapse"><i class="fa fa-chevron-down" aria-hidden="true"></i></a>
						</div>
					</div>
					
					<!-- panel body -->
					<div class="panel-body">
						
					<strong>Termo de compromisso coletivo de estágio obrigatório:</strong><br><br> 

					<font color="#f34a4a">O termo de compromisso coletivo de estágio obrigatório aplica-se a situações nas quais grupos de alunos matriculados em estágio obrigatório realizam estágio simultaneamente em uma mesma concedente. Este modelo de termo de compromisso de estágio obrigatório visa melhorar o trabalho do professor orientador na elaboração dos termos de compromisso e se diferencia por apresentar em anexo a lista com o nome de todos os alunos que irão realizar o estágio em uma mesma concedente. Este termo de compromisso deve igualmente ser impresso em 3 (três) vias e encaminhado para a Agência de Estágios para assinatura. Cada uma das vias deve ser assinada pelo representante da concedente, pelo professor orientador e pelo representante da Agência de Estágios da UFC. Os alunos devem assinar na lista em anexo, no campo correspondente ao seu nome. No termo de compromisso devem constar as seguintes informações:</font><br><br>

					Dados da empresa;<br>
					Dados de cada estagiário;<br>
					Dados do professor orientador do estágio;<br>
					Dados do supervisor da unidade concedente;<br>
					Horário e período de realização do estágio;<br>
					Seguro contra acidentes pessoais, contratado pela UFC;<br>
					Plano de atividade.<br>


						
						
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