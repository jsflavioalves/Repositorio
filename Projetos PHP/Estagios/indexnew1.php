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
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style2.css" rel="stylesheet">
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

	<script src="http://code.jquery.com/jquery-1.4.2.min.js"></script>
	<script src="http://jquery-joshbush.googlecode.com/files/jquery.maskedinput-1.2.2.min.js"></script>
	<script src="http://ajax.microsoft.com/ajax/jquery.validate/1.6/jquery.validate.min.js"></script>
	
    <link href="css/style2.css" rel="stylesheet">

	<!-- CSS DO ASSETS -->

    <link href="assets/css/material-kit.css" rel="stylesheet"/>
	<link href="assets/css/demo.css" rel="stylesheet" />

    <script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>

    <!-- FUNÇÃO PARA VERIFICAR QUAL NAVEGADOR O USUÁRIO ESTÁ UTILIZANDO -->
    <script type="text/javascript">
    function GetBrowser() {
        var isOpera = !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
   
        var isFirefox = typeof InstallTrigger !== 'undefined';   // Firefox 1.0+
        var isSafari = Object.prototype.toString.call(window.HTMLElement).indexOf('Constructor') > 0;
   
        var isChrome = !!window.chrome && !isOpera;              // Chrome 1+
        var isIE = /*@cc_on!@*/false || !!document.documentMode;   // At least IE6
    
        if (isOpera) {
            window.location="mensagem_navegador.php";
            return 1;
        }
        else if (isFirefox) {
            //alert("Mozilla Firefox");
            return 2;
        }
        else if (isChrome) {
            window.location="mensagem_navegador.php";
            return 3;
        }
        else if (isSafari) {
            window.location="mensagem_navegador.php";
            return 4;
        }
        else if (isIE) {
            window.location="mensagem_navegador.php";
            return 5;
        }
        else {
            window.location="mensagem_navegador.php";
            return 0;
        }
    }

    </script>

    <script type="text/javascript">
    	function opt(x){
    		if(x == 1){ 
    			var muda = document.getElementById("cadastro_aluno").style.display = 'block';
    			var muda = document.getElementById("cadastro_empresa").style.display = 'none';
                var muda = document.getElementById("cadastro_professor").style.display = 'none';
    			var muda = document.getElementById("modal-footer3").style.display = 'none';
    		}
    		if(x == 2){
    			var muda = document.getElementById("cadastro_aluno").style.display = 'none';
    			var muda = document.getElementById("cadastro_empresa").style.display = 'block';
                var muda = document.getElementById("cadastro_professor").style.display = 'none';
    					
    		}
            if(x == 3){
                var muda = document.getElementById("cadastro_aluno").style.display = 'none';
                var muda = document.getElementById("cadastro_empresa").style.display = 'none';
                var muda = document.getElementById("cadastro_professor").style.display = 'block';

                        
            }
    	}

        function login(y){
            if(y == 1){ 
                var muda = document.getElementById("login_aluno").style.display = 'block';
                var muda = document.getElementById("login_empresa").style.display = 'none';
                var muda = document.getElementById("login_professor").style.display = 'none';
                var muda = document.getElementById("footer_aluno").style.display = 'block';
                var muda = document.getElementById("footer_empresa").style.display = 'none';
                var muda = document.getElementById("footer_professor").style.display = 'none';      
      
            }
            if(y == 2){
                var muda = document.getElementById("login_aluno").style.display = 'none';
                var muda = document.getElementById("login_empresa").style.display = 'block';
                var muda = document.getElementById("login_professor").style.display = 'none';
                var muda = document.getElementById("footer_aluno").style.display = 'none';
                var muda = document.getElementById("footer_empresa").style.display = 'block'; 
                var muda = document.getElementById("footer_professor").style.display = 'none';      
     
            }
             if(y == 3){
                var muda = document.getElementById("login_aluno").style.display = 'none';
                var muda = document.getElementById("login_empresa").style.display = 'none';
                var muda = document.getElementById("login_professor").style.display = 'block';
                var muda = document.getElementById("footer_aluno").style.display = 'none';
                var muda = document.getElementById("footer_empresa").style.display = 'none';
                var muda = document.getElementById("footer_professor").style.display = 'block';      
      
            }
        }

    	function formatar(mascara, documento){
  			var i = documento.value.length;
  			var saida = mascara.substring(0,1);
  			var texto = mascara.substring(i)
  
  			if (texto.substring(0,1) != saida){
            	documento.value += texto.substring(0,1);
  			}
  
		}
    </script>
<style type="text/css">
#img1{
margin-right: 10px;
}
#img2{
margin-right: 10px;
}
</style>
</head><!--/head-->
<body onload="GetBrowser()">

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
						<li class="scroll"><a href="legislacao.php">Legislação</a></li> 
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
		                    <!-- <li class="divider"></li>
		                    <li><a href="termo_estagio.php">Termo de compromisso</a></li>
                            <li><a href="termo_aditivo.php">Termo Aditivo</a></li>
                            <li><a href="termo_coletivo.php">Termo Coletivo</a></li>
                            <li><a href="ajuda_estagio.php">faqs - estágio</a></li> -->
		                  

			            </ul>
						</li>   
						<li class="scroll"><a href="index.php#contact">Contato</a></li>

						<li class="scroll2"><a href="#" id="btn_login" role="button" data-toggle="modal" data-target="#login-modal">Agendamento / login</a></li>


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
		                <div id="login_aluno" class="modal-body">
				    		<div id="div-login-msg">
                                <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-login-msg">Informe seus dados.</span>
                            </div>
                            <div id="div_padrao" class="modal-body" >
                            <select class="form-control" name="tipo_usuario" style="width: 100%; margin-bottom: 10px;">
                                <option selected="selected" disabled="disabled" >TIPO DE USUÁRIO</option>
                                <option value="aluno" onclick="login(1);">ADMINISTRADOR</option>
                                <option value="aluno" onclick="login(1);">ALUNO</option>
                                <option value="empresa" onclick="login(2);">EMPRESA</option>
                                <option value="professor" onclick="login(3);">PROFESSOR</option>

                            </select>
                            </div>
                            <p>Nº de Matrícula:</p>
				    		<input id="login_username" class="form-control" name="matricula" type="text" placeholder="Nº de Matricula" required>
                            <br>
                            <p>CPF:</p>
				    		<input id="login_password" class="form-control" name="cpf" type="password" placeholder="CPF" OnKeyPress="formatar('###.###.###-##', this)" maxlength="14" required>
        		    	
                        </div>
                        <div id="footer_aluno" class="modal-footer">
                            <div>
                                <button type="submit" class="btn btn-default slider-btn animated bounceInUp">Entrar</button>
                            </div>
                            <div>
                                <button id="login_lost_btn" type="button" class="btn btn-link"></button>
                                <button id="login_register_btn" type="button" class="btn btn-link">Esse é o seu primeiro login ?</button>
                            </div>
                        </div>
                        
                    </form>

                    <form action="login2.php" id="login-form" method="POST" name="form2">
                        <div id="login_empresa" class="modal-body" style="display: none;">
                            <div id="div-login-msg">
                                <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-login-msg">Informe seus dados.</span>
                            </div>
                            <div id="div_padrao" class="modal-body" >
                            <select class="form-control" name="tipo_usuario" style="width: 100%; margin-bottom: 10px;">
                                <option selected="selected" disabled="disabled" >TIPO DE USUÁRIO</option>
                                <option value="aluno" onclick="login(1);">ADMINISTRADOR</option>
                                <option value="aluno" onclick="login(1);">ALUNO</option>
                                <option value="empresa" onclick="login(2);">EMPRESA</option>
                                <option value="professor" onclick="login(3);">PROFESSOR</option>

                            </select>
                            </div>
                            <p>CNPJ:</p>
                            <input id="login_username" class="form-control" name="cnpj" type="text" placeholder="CNPJ" maxlength="18" OnKeyPress="formatar('##.###.###/####-##', this)" required><br>
                            <p>Senha:</p>
                            <input id="login_password" class="form-control" name="senha" type="password" placeholder="Senha" minlength="8" required>
                        </div>

				        <div id="footer_empresa" class="modal-footer" style="display: none;">
                            <div>
                                <button type="submit" class="btn btn-default slider-btn animated bounceInUp">Entrar</button>
                            </div>
                            <div>
                                <button id="login_lost_btn" type="button" class="btn btn-link"></button>
                                <button id="login_register_btn" type="button" class="btn btn-link">Esse é o seu primeiro login ?</button>
                            </div>
				        </div>
                    </form>  
                   

                     <form action="login3.php" id="login-form" method="POST" name="form3">
                        <div id="login_professor" class="modal-body" style="display: none;">
                            <div id="div-login-msg">
                                <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-login-msg">Informe seus dados.</span>
                            </div>
                            <div id="div_padrao" class="modal-body" >
                            <select class="form-control" name="tipo_usuario" style="width: 100%; margin-bottom: 10px;">
                                <option selected="selected" disabled="disabled" >TIPO DE USUÁRIO</option>
                                <option value="aluno" onclick="login(1);">ADMINISTRADOR</option>
                                <option value="aluno" onclick="login(1);">ALUNO</option>
                                <option value="empresa" onclick="login(2);">EMPRESA</option>
                                <option value="professor" onclick="login(3);">PROFESSOR</option>

                            </select>
                            </div>
                            <p>SIAPE</p>
                            <input id="login_username" class="form-control" name="siape" type="text" placeholder="SIAPE" maxlength="7" required><br>
                            <p>CPF:</p>
                            <input id="login_password" class="form-control" name="cpf" type="password" placeholder="CPF" OnKeyPress="formatar('###.###.###-##', this)" maxlength="14" required>
                        </div>

                        <div id="footer_professor" class="modal-footer" style="display: none;">
                            <div>
                                <button type="submit" class="btn btn-default slider-btn animated bounceInUp">Entrar</button>
                            </div>
                            <div>
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
                    <form action="autenticar.php" method="POST" id="register-form" style="display:none;">
                        <!-- INÍCIO DIV PADRÃO -->
                    	<div id="div-register-msg" style="margin-top: 30px; ">
                                <div id="icon-register-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-register-msg">Meu primeiro login</span>
                        </div>
                        <div id="div_padrao" class="modal-body" >
                        	<select class="form-control" name="tipo_usuario" style="width: 100%; margin-bottom: 10px;">
		    					<option selected="selected" disabled="disabled" >TIPO DE USUÁRIO</option>
		    					<option value="aluno" onclick="opt(1);">ALUNO</option>
		    					<option value="empresa" onclick="opt(2);">EMPRESA</option>
                                <option value="professor" onclick="opt(3);">PROFESSOR</option>

		    				</select>
                        </div>
                        <!-- FIM DIV PADRÃO -->

                        <!-- INÍCIO DIV DO CADASTRO DO ALUNO -->
            		    <div id="cadastro_aluno" class="modal-body">              
                            <select class="form-control select2" name="curso" style="width: 100%;" required>
                            <option disabled="disabled" selected="selected">SELECIONE O CURSO</option>
            <?php 
            require("conn.php"); 
            mysql_select_db('estagios');
            $sql4 = mysql_query("SELECT * FROM cursos group by curso order by curso");
            while($resultado4=mysql_fetch_object($sql4)){echo utf8_encode('<option>'.$resultado4->curso.'</option>');}

                ?>        
                              </select>

                            <input id="register_username" name="nome" class="form-control" type="text"  placeholder="Nome Completo" style="text-transform:uppercase" required>
		    				<input id="register_username" name="matricula" class="form-control" type="text" placeholder="Nº de Matricula" style="text-transform:uppercase" required>
		    				
                            <input id="register_password" name="cpf" class="form-control" type="text" onkeypress="mascara( this, mcpf );" maxlength="14" placeholder="CPF" style="text-transform:uppercase" required>
                            <input id="register_password" name="rg" class="form-control" type="text" placeholder="RG" style="text-transform:uppercase" required>
                            <input id="register_username" name="mae" class="form-control" type="text" placeholder="NOME DA MÃE" style="text-transform:uppercase" required>
                            <input id="register_username" name="telefone" class="form-control" type="text" onkeypress="mascara( this, mfone );" maxlength="15" placeholder="TELEFONE" style="text-transform:uppercase" required>
                            <input id="register_username" name="email" class="form-control" type="text" placeholder="E-MAIL" required>
                            <input id="register_username" name="endereco" class="form-control" type="text" placeholder="ENDEREÇO" style="text-transform:uppercase" required>
                            <input id="register_username" name="cidade" class="form-control" type="text" placeholder="CIDADE" style="text-transform:uppercase" required>
                            <input id="register_username" name="uf" class="form-control" type="text" placeholder="UF" maxlength="2" style="text-transform:uppercase" required>
                            
            			<div class="modal-footer2" style="margin-left: -30px; margin-top: 20px;">
                            <div>
                                <button type="submit" class="btn btn-default slider-btn animated bounceInUp">Cadastrar</button>
                            </div>
                             <div>
                                <button style="margin-left: 135px;" id="register_login_btn" type="button" class="btn btn-link"> LOGIN </button>
                            </div>
		    		    </div>
            			</div>
            			
            			</form>
            			<!-- FIM DIV DO CADASTRO DO ALUNO -->


            			<!-- INÍCIO DIV DO CADASTRO DA EMPRESA -->
            			<form action="autenticar2.php" method="POST" id="register-form">
            		    <div id="cadastro_empresa" style="display: none;" class="modal-body"> 

                            <input id="register_username" name="nome_empresa" class="form-control" type="text" placeholder="Nome Empresa" style="text-transform:uppercase" required>
		    				<input id="register_username" name="cnpj" class="form-control" type="text" placeholder="Nº de CNPJ" OnKeyPress="formatar('##.###.###/####-##', this)" maxlength="18" style="text-transform:uppercase" required>
		    				<input id="register_username" name="endereco_empresa" class="form-control" type="text" placeholder="ENDEREÇO" style="text-transform:uppercase" required>
                            <input id="register_username" name="cidade" class="form-control" type="text" placeholder="CIDADE - UF" style="text-transform:uppercase" required>
		    				<input id="register_username" name="cep" class="form-control" type="text" placeholder="CEP" OnKeyPress="formatar('#####-###', this)" maxlength="9" style="text-transform:uppercase" required>
                            <input id="register_username" name="telefone_empresa" class="form-control" type="text" onkeypress="mascara( this, mfone );" maxlength="15" placeholder="TELEFONE" style="text-transform:uppercase" required>
                            <input id="register_username" name="email_empresa" class="form-control" type="text" placeholder="E-MAIL">
                            <select style="margin-top: 10px;" class="form-control select2" style="width: 100%;" name="tipo_empresa" required>
                            <option value="" disabled="disabled" selected="selected">TIPO EMPRESA</option>
                      <?php 
                        require('conn.php');

                        $consulta = mysql_query("SELECT * FROM tipo_empresa");
                        $result = mysql_num_rows($consulta);

                        while ($sql = mysql_fetch_array($consulta)) {
                          $id_tipo_empresa = $sql['id_tipo_empresa'];
                          $nome = $sql['nome'];

                          echo utf8_encode('<option value="'.$id_tipo_empresa.'">'.$nome.'</option>');
                        }
                       ?>
                    </select>
                        <input id="register_username" name="representante" class="form-control" type="text" placeholder="REPRESENTANTE LEGAL" required>
                    	<input id="register_username" minlength="8" name="senha" class="form-control" type="password" placeholder="SENHA PARA ACESSSO" required>
                        <br><br>
                        <div class="modal-footer2" style="margin-left: -30px;">
                            <div>
                                <button type="submit" class="btn btn-default slider-btn animated bounceInUp">Cadastrar</button>
                            </div>
                             <div>
                                <button style="margin-left: 135px;" id="register_login_btn" type="button" class="btn btn-link"> LOGIN </button>
                            </div>
		    		    </div>
            			</div>
            			</form>
            			<!-- FIM DIV DO CADASTRO DA EMPRESA -->

                        <!-- INÍCIO DIV DO CADASTRO DO PROFESSOR -->
                        <form action="autenticar3.php" method="POST" id="register-form">
                        <div id="cadastro_professor" style="display: none;" class="modal-body"> 
 
                        </div>
                        </form>

                    <!-- End | Register Form -->
                    
                </div>
                <!-- End # DIV Form -->
                
			</div>
		</div>
	</div>
	
			
	<section id="home" style="margin: 0 auto; width: 70%; height: 380px;">
		<div class="home-pattern"></div>
		<div id="main-carousel" class="carousel slide" data-ride="carousel" style="width:100%; height: 400px"> 
			<ol class="carousel-indicators">
				<li data-target="#main-carousel" data-slide-to="0" class="active"></li>
				<li data-target="#main-carousel" data-slide-to="1"></li>
				<li data-target="#main-carousel" data-slide-to="2"></li>
			</ol><!--/.carousel-indicators--> 
			<div class="carousel-inner">
				<div class="item active" style="background-image: url(images/slider/slide3.jpg); background-position: 40% 20%;width:100%; height: 400px" > 
					<div class="carousel-caption"> 
						<div> 
							<h2 class="heading animated bounceInDown"></h2> 
							<p class="animated bounceInUp"></p> 
						</div> 
					</div> 
				</div>
				<div class="item" style="background-image: url(images/slider/slide2.jpg);"> 
					<div class="carousel-caption"> <div> 
							<p class="animated bounceInUp"> </p> <a class="btn btn-default slider-btn animated fadeIn" data-toggle="modal" data-target="#login-modal" href="#">Saiba Mais</a> 
					</div> 
				</div> 
			</div> 
			<div class="item" style="background-image: url(images/slider/slide1.jpg); width:100%; height: 400px" > 
				<div class="carousel-caption"> 
					<div> 
					<p class="animated bounceInLeft"></p> 
						<a class="btn btn-default slider-btn animated bounceInUp" data-toggle="modal" data-target="#login-modal" href="#">Saiba Mais</a> 
					</div> 
				</div> 
			</div>
		</div><!--/.carousel-inner-->
		<a class="carousel-left member-carousel-control hidden-xs" href="#main-carousel" data-slide="prev"><i class="fa fa-angle-left"></i></a>
		<a class="carousel-right member-carousel-control hidden-xs" href="#main-carousel" data-slide="next"><i class="fa fa-angle-right"></i></a>
	</div> 
</section><!--/#home--> 

<div class="content">
    <div class="content_resize">
      <div class="mainbar">
        <div class="article">
          <h2><span>Entrega de Relatório de Atividades</span> à Agência de Estágios</h2>
          <p class="infopost">Posted on <span class="date">28 set 2017</span> by <a href="#">Admin</a> &nbsp;&nbsp;|&nbsp;&nbsp; Filed under  <a href="#">internet</a> <a href="#" class="com"><span>0</span></a></p>
          <div class="clr"></div>
          <br>
          <div class="img" id="img1"><img src="images/Relatorio.png" align="left" width="110" height="75" alt="" class="fl" /></div>
          <div class="post_content">
            <p align="justify">Lembramos que, a cada período de 6 (seis) meses de realização de estágio, é necessária a apresentação de relatório de atividades à Agência de Estágios da UFC. O relatório deverá ser assinado pela concedente da vaga, pelo estagiário e pelo professor orientador, sendo posteriormente remetido à Agência para registro.
            Ressaltamos que a apresentação periódica de relatórios é uma exigência prevista no art. 7º, inciso IV, da Lei 11.788/2008 e que a pendência quanto aos relatórios impede a prorrogação de estágios em curso e a celebração de novos termos de compromisso de estágio.
            Lei 11.788/2008
            Art. 7o São obrigações das instituições de ensino, em relação aos estágios de seus educandos:
            IV – exigir do educando a apresentação periódica, em prazo não superior a 6 (seis) meses, de relatório das atividades.
           </p>
           </div>
          <div class="clr"></div>
        </div>
         <div class="article">
          <h2><span>Vale, 3M e outras 53 empresas recrutam estagiários e </span> trainees</h2>
          <p class="infopost">Posted on <span class="date">03 out 2017</span> by <a href="#">Admin</a> &nbsp;&nbsp;|&nbsp;&nbsp; Filed under  <a href="#">internet</a> <a href="#" class="com"><span>1</span></a></p>
          <div class="clr"></div>
          <br>
          <div class="img" id="img1"><a href="https://exame.abril.com.br/carreira/vale-3m-e-outras-45-empresas-recrutam-estagiarios-e-trainees/" class="rm"><img src="images/Vale.jpg" align="left" width="110" height="75" alt="" class="fl" /></a></div>
          <div class="post_content">
            <p align="justify">Local de trabalho: Escritório Odebrecht. Horário: a definir. Carga horária: 6h. Bolsa Estágio: R$ 1.210,00. Benefícios: plano de saúde/odontológico, refeição. Atividades a serem executadas:Atividades relacionadas a estudos de potencial e vocação de terrenos, estudos de massa e viabilidade de produtos, desenvolvimento de anteprojetos, estudos do mercado imobiliário de Fortaleza – tanto aplicado no produto/arquitetura (tipos de plantas; especificações de materiais; características do produto), quanto a dados de venda (VV, quantidade de estoque, classificação do estoque, etc). Perfil do candidato (competências técnicas e comportamentais): Desejável:Conhecimentos de Autocad, Corel, Revit, SketchUp, Pacote Office (word, excel, internet, outlook). Conhecimento da Legislação Municipal de Fortaleza, Plano Diretor de Desenvolvimento Urbano, Leis de Uso e Ocupação de Solo, demais legislações aplicáveis à Fortaleza. Experiência em estudos de massa, viabilidade de projetos.Capacidade de servir, humildade, simplicidade, maturidade natural a sua faixa etária, vontade de aprender e proatividade.Interessados enviar email até dia 16/10 para: recrutamentoorpe@odebrecht.com  </p>
           <p class="spec"><a href="https://exame.abril.com.br/carreira/vale-3m-e-outras-45-empresas-recrutam-estagiarios-e-trainees/" class="rm">Leia Mais</a></p>
          </div>
          <div class="clr"></div>
        </div>
        <div class="article">
          <h2><span>Nove anos da</span> Lei de Estágios</h2>
          <p class="infopost">Posted on <span class="date">29 set 2017</span> by <a href="#">Admin</a> &nbsp;&nbsp;|&nbsp;&nbsp; Filed under  <a href="#">internet</a> <a href="#" class="com"><span>2</span></a></p>
          <div class="clr"></div>
          <br>
          <div class="img" id="img1"><a href="https://pt-br.facebook.com/cnj.oficial/posts/1713417935397626" class="rm"><img src="images/9anosLeiEstag.jpg" align="left" width="110" height="75" alt="" class="fl" /></a></div>
          <div class="post_content">
            <p align="justify">Nesta segunda-feira (25/9), a Lei n. 11.788/2008 completa nove anos de garantias para os estudantes que estão no começo da vida profissional. Criada para estender direitos trabalhistas ao estagiário, a lei reforça que o estudo vem primeiro e dá prioridade sempre às atividades de ensino (fonte: CNJ set 2017). Texto: 9 anos da Lei do Estágio. Toda grande história tem um começo. </p>
           <p class="spec"><a href="https://pt-br.facebook.com/cnj.oficial/posts/1713417935397626" class="rm">Leia Mais</a></p>
          </div>
          <div class="clr"></div>
        </div>
        <div class="article">
          <h2><span>Encontros Universitários e Encontros de Estágios</span> 2017</h2>
          <p class="infopost">Posted on <span class="date">04 set 2017</span> by <a href="#">Admin</a> &nbsp;&nbsp;|&nbsp;&nbsp; Filed under  <a href="#">internet</a> <a href="#" class="com"><span>3</span></a></p>
          <div class="clr"></div>
          <br>
          <div class="img" id="img2"><a href="http://www.prex.ufc.br/encontros-de-extensao/xxvi-encontrodeextensao-e-i-encontrodeestagios/" class="rm"><img src="images/encontroextensao.jpg" align="left" width="150" height="95" alt="" class="fl" /></a></div>
          <div class="post_content">
            <p>Foi publicado o edital dos Encontros Universitários de 2017 e o edital do 1o. Encontros de Estágios de 2017.</p>
            <p><strong>O XXVI Encontro de Extensão e o I Encontro de Estágios realizam-se no mesmo período dos Encontros Universitários 2017, o qual acontecerá no periodo de 8 a 10 de novembro de 2017.</p>
            <p class="spec"><a href="http://www.prex.ufc.br/encontros-de-extensao/xxvi-encontrodeextensao-e-i-encontrodeestagios/" class="rm">Leia Mais</a></p>
          </div>
          <div class="clr"></div>
        </div>
    </div>
</div> 


					<?php date_default_timezone_set('America/Sao_Paulo'); $data = date('d/m/Y'); $hora = date('H:i'); ?>

                    
							
							<div class="container">
								<div class="contact-details">
									<div class="pattern"></div>
									<div class="row text-center clearfix">
										<div class="col-sm-6">
											<div class="contact-address"><address><p><span>UFC</span> - Agencia de Estágios</p><strong>Av. da Universidade<br>Fortaleza/Ce<br> 2853 - Benfica - CEP 60020-181</strong><br><small>( Universidade Federal do Ceará )</small></address>
												<div class="social-icons">
													<a href="https://www.facebook.com/estagiosufc/"><i class="fa fa-facebook"></i></a>
													<a href="https://twitter.com/estagiosufc"><i class="fa fa-twitter"></i></a>
													<a href="#"><i class="fa fa-google-plus"></i></a>
												</div>
											</div>
										</div>

										<div class="col-sm-6"> 
											<div id="contact-form-section">
												<div class="status alert alert-success" style="display: none"></div>
												<form id="contact-form" class="contact" name="contact-form" method="post" action="send-mail.php">
													<div class="form-group">
														<input type="text" name="name" class="form-control name-field" required="required" placeholder="Nome Completo"></div>
														<div class="form-group">
															<input type="email" name="email" class="form-control mail-field" required="required" placeholder="Email">
														</div>
														 <div class="form-group">
															<input type="text" name="assunto" class="form-control mail-field" required="required" placeholder="Assunto" style="width: 100% ">
														</div>
														<div class="form-group">
															<textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Mensagem"></textarea>
														</div> 
														<div class="form-group">
															<button type="submit" class="btn btn-primary">Enviar</button>
														</div>
													</form> 
												</div>
											</div>
										</div>
									</div>
								</div> 
							</section> <!--/#contact--> 

	<footer id="footer"> 
		<div class="container"> 
			<div class="text-center"> 
				<p>Copyright &copy; 2017 - <a href="http://ufc.br">UFC</a> - Agência de Estágio | Todos os direitos reservados</p> 
			</div> 
		</div> 
	</footer> <!--/#footer--> 

    <script type="text/javascript" src="js/jquery.js"></script> 
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/smoothscroll.js"></script> 
	<script type="text/javascript" src="js/jquery.isotope.min.js"></script>
	<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script> 
	<script type="text/javascript" src="js/jquery.parallax.js"></script> 
	<script type="text/javascript" src="js/main.js"></script>  
	<script type="text/javascript" src="js/modal.js"></script>

    <script type="text/javascript">
    	function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
function mcep(v){
    v=v.replace(/\D/g,"")                    //Remove tudo o que não é dígito
    v=v.replace(/^(\d{5})(\d)/,"$1-$2")         //Esse é tão fácil que não merece explicações
    return v
}
function mhora(v){
    v=v.replace(/\D/g,"");                    //Remove tudo o que não é dígito
    v=v.replace(/(\d{2})(\d)/,"$1:$2");        
                                           
    return v;
}
function mdata(v){
    v=v.replace(/\D/g,"");                    //Remove tudo o que não é dígito
    v=v.replace(/(\d{2})(\d)/,"$1/$2");       
    v=v.replace(/(\d{2})(\d)/,"$1/$2");       
                                             
    v=v.replace(/(\d{2})(\d{2})$/,"$1$2");
    return v;
}
function mrg(v){
  v=v.replace(/\D/g,'');
  v=v.replace(/^(\d{10})(\d)/g,"$1-$2");
  return v;
}
function mcpf(v){
  v=v.replace(/\D/g,'');
  v=v.replace(/(\d{9})(\d)/g,"$1-$2");
  v=v.replace(/(\d{6})(\d)/g,"$1.$2");
  v=v.replace(/(\d{3})(\d)/g,"$1.$2");
  return v;
}
function mfone(v){
  v=v.replace(/\D/g,"");
  v=v.replace(/(\d{6})(\d)/g,"$1$2-");
  v=v.replace(/^(\d{1})(\d)/g,"($1$2) ");
  return v;
}
function mvalor(v){
    v=v.replace(/\D/g,"");//Remove tudo o que não é dígito
    v=v.replace(/(\d)(\d{8})$/,"$1.$2");//coloca o ponto dos milhões
    v=v.replace(/(\d)(\d{5})$/,"$1.$2");//coloca o ponto dos milhares
        
    v=v.replace(/(\d)(\d{2})$/,"$1,$2");//coloca a virgula antes dos 2 últimos dígitos
    return v;
}
           
function Verifica_Hora(v){ 
hrs = (document.forms[0].Hora.value.substring(0,2)); 
min = (document.forms[0].Hora.value.substring(3,5)); 
               
estado = ""; 
if ((hrs < 00 ) || (hrs > 23) || ( min < 00) ||( min > 59)){ 
estado = "errada"; 
} 
               
if (document.forms[0].Hora.value == "") { 
estado = "errada"; 
} 
 
if (estado == "errada") { 
alert("Hora inválida!"); 
document.forms[0].Hora.focus(); 
} 
}
    </script>

</body>
</html>