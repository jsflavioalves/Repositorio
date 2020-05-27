<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="utf-8"> 
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Creative One Page Parallax Template">
    <meta name="keywords" content="Creative, Onepage, Parallax, HTML5, Bootstrap, Popular, custom, personal, portfolio" /> 
    <meta name="author" content=""> 
    <title>UFC - Agência de Estágios</title> 
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/plugins/colorpicker/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" href="css/plugins/timepicker/bootstrap-timepicker.min.css">
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

    <script type="text/javascript">
        var getBrowser = function() {
        var b = "unknown";
        try {
            var e;
            var f = e.width;
        } catch (e) {
            var err = e.toString();
            if(err.search("not an object") !== -1){
                window.location="mensagem_navegador.php";
            } else if(err.search("Cannot read") !== -1){
                window.location="mensagem_navegador.php";
            }else if(err.search("e is undefined") !== -1){
            
            } else if(err.search("Unable to get property 'width' of undefined or null reference") !== -1){

            if(!(false || !!document.documentMode) && !!window.StyleMedia){
                
            } else {   
            }
            } else if(err.search("cannot convert e into object") !== -1){
                window.location="mensagem_navegador.php";
            } else {
                //window.location="mensagem_navegador.php";
            }
        }
        };

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
    margin: 0px;
    }
    #img2{
    margin: 0px;
    }
    #img3{
    margin: 0px;
    }
    #img4{
    margin: -20px;
    }
    </style>
</head><!--/head-->
<!-- <body onload="getBrowser()"> -->
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
        <div class="navbar navbar-inverse navbar-fixed-top" style="filter:alpha(opacity=50); opacity: 0.7;-moz-opacity:0.7;-webkit-opacity:0.7;" role="banner"> 
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
                        <!-- <li><a href="ajuda_convenio.php">faqs - convênio</a></li> -->
                        <li><a href="tds_convenio.php">Empresas Conveniadas</a></li>
                        <li><a href="convenios_andamento.php">Convênios em Andamento</a></li>
                        <li><a href="convenios_pendentes.php">Convênios Pendentes</a></li>
                        </ul>
                        </li> 

                        <li class="scroll"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Termos<b class="caret"></b></a>
                        <ul class="dropdown-menu">

                            <!-- <li><a href="termo_convenio.php">Termos de Convênio</a></li>-->
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
                        <li class="scroll"><a href="https://docs.google.com/document/d/187v07nIxrXzT6v0i9bg7vdbG3rE10DX31D2IOLweo64/edit"><font color="green" font-weight="900">DÚVIDAS???</font></a></li>

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
                                <!--<button id="login_lost_btn" type="button" class="btn btn-link"></button> -->
                                <!-- <button id="login_register_btn" type="button" class="btn btn-link">Esse é o seu primeiro login ?</button> -->
                                <button id="login_register_btn" style="margin-left: 80px; color: red; font-size: 16px; font-weight: bolder" type="button" class="btn btn-link">PRIMEIRO LOGIN</button>
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
                                <button id="login_lost_btn"  type="button" class="btn btn-link">Login</button>
                                <button id="login_register_btn" type="button" class="btn btn-link">Registrar</button>
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
           // mysql_select_db('estagios');
            $sql4 = mysqli_query($conn, "SELECT * FROM cursos group by curso order by curso");
            
            while($resultado4=mysqli_fetch_object($sql4)){echo utf8_encode('<option>'.$resultado4->curso.'</option>');}

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

                        $consulta = mysqli_query("SELECT * FROM tipo_empresa");
                        $result = mysqli_num_rows($consulta);

                        while ($sql = mysqli_fetch_array($consulta)) {
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
                        <input id="register_username" name="nome_professor" class="form-control" type="text" placeholder="Nome" style="text-transform:uppercase" required>
                         <input id="register_username" name="cpf" class="form-control" type="text" placeholder="Cpf" style="text-transform:uppercase" onkeypress="mascara( this, mcpf );" maxlength="14" required>
                          <input id="register_username" name="siape" class="form-control" type="text" placeholder="Siape" style="text-transform:uppercase"  maxlength="7" required>
                          <input id="register_username" name="fone" class="form-control" type="text" placeholder="Telefone" style="text-transform:uppercase" onkeypress="mascara( this, mfone );" maxlength="15" required>
                          <input id="register_username" name="email" class="form-control" type="text" placeholder="E-mail" style="text-transform:uppercase" required>
                          <input id="register_username" name="lotacao" class="form-control" type="text" placeholder="Lotação" style="text-transform:uppercase" required></br>
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

                    <!-- End | Register Form -->
                    
                </div>
                <!-- End # DIV Form -->
                
            </div>
        </div>
    </div>
    
            
    <section id="home" style="margin: 0 auto; width: 90%; height: 380px;">
        <div class="home-pattern"></div>
        <div id="main-carousel" class="carousel slide" data-ride="carousel" style="width:100%; height: 100%"> 
            <ol class="carousel-indicators">
                <li data-target="#main-carousel" data-slide-to="0" class="active"></li>
                <li data-target="#main-carousel" data-slide-to="1"></li>
                <li data-target="#main-carousel" data-slide-to="2"></li>
            </ol><!--/.carousel-indicators--> 
            <div class="carousel-inner">
                <!--<div class="item active" style="background-image: url(images/1oEncEst.jpg); background-position: 40% 100%; width:100%; height: 70%;" > -->
                <div class="item active" style="background-image: url(images/Atendimento_Estudante.jpg); background-position: 40% 100%; width:100%; height: 70%;" > 
                    <div class="carousel-caption"> 
                        <div> 
                            <h2 class="heading animated bounceInDown"></h2> 
                            <p class="animated bounceInUp"></p> 
                        </div> 
                    </div> 
                </div>
                <!-- <div class="item" style="background-image: url(images/MuralEncEst.jpg); background-position: 70% 75%;width:100%; height: 100%;"> -->
                 <div class="item" style="background-image: url(images/foto2encletras.jpg); background-position: 70% 75%;width:100%; height: 100%;">
                    <div class="carousel-caption"> <div> 
                             
                    </div> 
                </div> 
            </div> 
            <div class="item" style="background-image: url(images/foto2encestag.jpg); background-position: 70% 75%;width:100%; height: 100%;" > 
                <div class="carousel-caption"> 
                    <div> 
                    <p class="animated bounceInLeft"></p> 
                        
                    </div> 
                </div> 
            </div>
        </div><!--/.carousel-inner-->
        <a class="carousel-left member-carousel-control hidden-xs" href="#main-carousel" data-slide="prev"><i class="fa fa-angle-left"></i></a>
        <a class="carousel-right member-carousel-control hidden-xs" href="#main-carousel" data-slide="next"><i class="fa fa-angle-right"></i></a>
    </div> 
</section>
<section id="blog"> 
    <div class="container">
        <div class="col-sm-4">
        <div class="row">
            <div class="sidebar">
        <div class="gadget">
          <h2 class="star">Menu</h2>
          <div class="clr"></div>
          <ul class="sb_menu">
            <li><a href="index.php">Início</a></li>
            <li><a href="formularios.php">Formulários</a></li>
            <li><a href="legislacao.php">Legislação</a></li>
            <li><a href="agentes.php">Agentes</a></li>
            <li><a href="convenios.php">Convênios</a></li>
            <li><a href="MANUAL.pdf">Manual de Estágios</a></li>
           </ul>
        </div>
        <!-- <div class="gadget">
          <h4>Fotos 1° Encontro de Estágios</h4>
          <div class="clr"></div>
          <a href="https://www.flickr.com/people/153502122@N07/">ÁLBUM DE FOTOS</a>
          </div> -->
           
        <div class="gadget">
          <br>
          <h4 class="star" align=justify><span>Motivos que inviabilizam a assinatura do TCE</span></h4>
          <div class="clr"></div>
          <ul class="ex_menu" align=justify>
            <li><b>1)</b> Empresas sem convênio<br></li>
            <li><b>2)</b> Termos de Compromissos retroativos<br></li>
            <li><b>3)</b> Termo de Compromisso sem o plano de atividades ou sem o número de apólice de seguro<br></li>
            <li><b>4)</b> Choque de horário com disciplinas da graduação<br></li>
            <li><b>5)</b> Termo de Compromisso sem assinatura do professor orientador<br></li>
            <li><b>6)</b> Alunos sem matrícula ou com matrícula institucional<br></li>
          </ul>
        </div>

        <div class="gadget">
          <h4 class="star" align=justify><span>Atendimento pelo Whatsapp </span></h4>
          <ul class="ex_menu" align=justify>
          <li>  <div class="col-md-12">
          	    <div class="col-md-4" id="img1"><img src="images/whatsapp.jpg" align="left" alt=""  style="width:100%; height:100%;"></div></div>
          </li>
          <li> <h3><b>(85) (9) 9646-0170 </b></h3></li></ul>
          <br>
        </div>
        <h4 align=justify><span>Horário de Funcionamento= 8:00h às 17:00hs.</span></h4>
        <h4 class="star" align=justify><span>De Segunda a Quinta-feira</span></h4>
        </div>
        </div>
        </div>
        <div class="col-sm-1"></div>
        <div class="col-sm-7 ">
        <div class="row">
                 <!-- <div class="article">
                        <h4>Inscrições para Avaliadores dos Trabalhos do II Encontro de Estágios</h4>
                        <p class="infopost">Posted on <span class="date">11 set 2018</span> by <a href="#">Admin</a> &nbsp;&nbsp;|&nbsp;&nbsp; Filed under  <a href="#">internet</a> <a href="#" class="com"><span>1</span></a></p>
                        <br>
                        <div class="col-md-12">
                        <div class="post_content">
                             <div class="col-md-4" id="img1"><img src="images/Relatorio.png" align="left" alt="" class="fl" style="width:100%; height:100%;"></div> 
                            <div class="col-md-4" id="img1"><img src="images/avaliador.jpg" align="left" alt="" class="fl" style="width:100%; height:100%;" /></div>                            
                            <div class="col-md-8">
                            <p align="justify">
                             Estão abertas as inscrições para avaliadores dos trabalhos do II Encontro de Estágios, evento integrante dos Encontro Universitários 2018, que ocorrerá entre os dias 24 e 26 de outubro no campus do Pici. 
                            </p>
                            </div>
                            <p align="justify">
                                    Poderão se inscrever professores e técnicos de nível superior da Universidade Federal do Ceará, além de estudantes dos programas de mestrado e doutorado da UFC.

                                    Gostaríamos de contar com a sua colaboração para a realização desse evento que propicia a troca de experiências e de conhecimentos adquiridos durante as atividades de estágio desenvolvidas pelos nossos estudantes.
                            </p>
                            <p align="justify">
                               As inscrições ocorrerão até o dia 20 de setembro e poderão ser realizadas a partir do preenchimento do formulário disponível no link: 
                            </p>
                            <p align="center">
                            	<a href=" https://goo.gl/forms/8YlZhEtQ47AHKlD63">https://goo.gl/forms/8YlZhEtQ47AHKlD63</a>
                            </p>
                            <p align="justify">
                            Baixe o edital completo da seleção dos avaliadores:
                            <a href=" arquivos/Edital 03 2018 EU Inscricao Avaliadores.pdf">Edital 03 2018 EU Inscricao Avaliadores.pdf</a>
                            </p>
                        </div>
                        </div>
                    </div> -->
                                       
                    <!-- <div class="article">
                        <h4>O Encontro de Estágios se consolida no calendário da UFC realizando a sua segunda edição</h4>
                        <p class="infopost">Posted on <span class="date">29 out 2018</span> by <a href="#">Admin</a> &nbsp;&nbsp;|&nbsp;&nbsp; Filed under  <a href="#">internet</a> <a href="#" class="com"><span>1</span></a>
                        <div class="col-md-12">
                        <div class="post_content">
                            <div class="col-md-12">
                            <p align="justify"> <h6>
                            Nos dias 24, 25 e 26 de outubro, ocorreu, no Centro de Convivência do campus do Pici, o II Encontro de Estágios da UFC, que reuniu as experiências de estágio dos alunos, compartilhando-as com a comunidade acadêmica.</h6> 
                            </p>
                            <p align="justify"> <h6>
                           O evento, que fez parte dos Encontros Universitários 2018, contou com a participação de 96 estagiários, dos quais 70 optaram por apresentações na modalidade oral e 26 em formato pôster. Comentaram e discutiram os trabalhos 56 avaliadores, dentre eles estudantes dos cursos de mestrado e doutorado da UFC, servidores e professores.</h6> 
                            </p>
                            <p align="justify"> <h6>
                            Foram realizados ainda durante o Encontro de Estágios dois workshops abertos ao público. Num deles, o Grupo Ourho Conecta , que atua na área de Consultoria em RH, trouxe o tema “ Estou me formando. E agora? – Empregabilidade e Comportamento no processo seletivo”. Já o Sistema SAS realizou um bate papo com o tema “As possibilidades de trilha de carreiras para a licenciatura: conhecendo o mundo editorial”.</h6> 
                            </p>
                            </div>
                          </div>
                        </div>
                    </div> -->
                  <br>            
                  <div class="article ">
                        <h3>
                            <span>O Encontro de Estágios se consolida no calendário da UFC realizando a sua segunda edição</span>
                        </h3>
                        <p class="infopost">Posted on 
                            <span class="date">29 out 2018</span> 
                            by <a href="#">Admin</a> &nbsp;&nbsp;|&nbsp;&nbsp; 
                            Filed under  <a href="#">internet</a> 
                            <a href="#" class="com">
                                <span>1</span>
                            </a>
                        </p>
                        <br>
                        <div class="col-md-12">
                                
                                 <div class="col-md-4" id="img1"><a href="http://www.estagios.ufc.br/siges/public_html/images/fotonoticia.jpg" ><img src="images/fotonoticia.jpg" align="left" alt="" class="fl" style="width:100%; height:100%;" /></a></div>                       
                                <div class="col-md-8">
                                    <p align="justify">
                                    Nos dias 24, 25 e 26 de outubro, ocorreu, no Centro de Convivência do campus do Pici, o II Encontro de Estágios da UFC, que reuniu as experiências de estágio dos alunos, compartilhando-as com a comunidade acadêmica.
                                    </p>
                                </div>
                                <br>
                                <div class="col-md-12">
                                    <p align="justify">
                                    O evento, que fez parte dos Encontros Universitários 2018, contou com a participação de 96 estagiários, dos quais 70 optaram por apresentações na modalidade oral e 26 em formato pôster. Comentaram e discutiram os trabalhos 56 avaliadores, dentre eles estudantes dos cursos de mestrado e doutorado da UFC, servidores e professores.
                                    </p>
                                                                                          
                                    <p align="justify">
                                    Foram realizados ainda durante o Encontro de Estágios dois workshops abertos ao público. Num deles, o Grupo Ourho Conecta , que atua na área de Consultoria em RH, trouxe o tema “ Estou me formando. E agora? – Empregabilidade e Comportamento no processo seletivo”. Já o Sistema SAS realizou um bate papo com o tema “As possibilidades de trilha de carreiras para a licenciatura: conhecendo o mundo editorial”
                                    </p>
                               
                                    <p align="justify">
                                   <b>
                                    Confira os melhores momentos do evento no link:<a href="https://flic.kr/s/aHsmpZgMxE">[https://flic.kr/s/aHsmpZgMxE]</a> </b>
                                    </p>
                                    
                                </div>
                        </div>
                    </div> 
                  <br>  
                  <div class="article">
                        
                        <h4>Novo horário de funcionamento da Agência de Estágios</h4>
                        <p class="infopost">Posted on <span class="date">11 abr 2018</span> by <a href="#">Admin</a> &nbsp;&nbsp;|&nbsp;&nbsp; Filed under  <a href="#">internet</a> <a href="#" class="com"><span>2</span></a></p>
                    
                        <br>
                        <div class="col-md-12">
                        <div class="post_content">
                            <!-- <div class="col-md-4" id="img1"><img src="images/Relatorio.png" align="left" alt="" class="fl" style="width:100%; height:100%;"></div> -->
                            <div class="col-md-4" id="img1"><img src="images/Trabalho_Agencia.jpg" align="left" alt="" class="fl" style="width:100%; height:100%;" /></div>                            
                            <div class="col-md-8">
                            <p align="justify">
                                	Informamos que a Agência de Estágios, a partir desta semana, não realizará atendimento ao público na sexta-feira, de modo que o expediente será apenas interno. De segunda a quinta, o atendimento será mantido durante o horário de sempre, das 8:00 às 17:00, ininterruptamente. Assim, a partir de 23.03.2018, não haverá mais atendimento ao público durante as sextas. 
                            </p>
                            </div>
                            <p align="justify">
                                    Aconselhamos que os alunos, para evitarem eventuais filas de espera, marquem o horário de atendimento em nosso site, o qual deve ser acessado pelo Firefox: http://www.estagios.ufc.br/siges/public_html/index.php. Antes de marcar atendimento, o estudante deve se cadastrar em nossa página. O acesso será liberado dentro de 1 dia útil. Será dada prioridade de atendimento àqueles que marcarem horário e comparecem na hora previamente agendada.

                                    Ressaltamos que o serviço de atendimento por whatsapp (85) 99646-0170 para tirar dúvidas (não se realiza análise de termo de compromisso por esse meio de comunicação) funcionará normalmente durante toda a semana.
                            </p>
                        
                        </div>
                        </div>
                    </div>  
               
                    <br>
                    <div class="article">
                        
                        <h4><span>Entrega de Relatório de Atividades</span> à Agência de Estágios</h4>
                        <p class="infopost">Posted on <span class="date">21 fev 2018</span> by <a href="#">Admin</a> &nbsp;&nbsp;|&nbsp;&nbsp; Filed under  <a href="#">internet</a> <a href="#" class="com"><span>3</span></a></p>
                    
                        <br>
                        <div class="col-md-12">
                        <div class="post_content">
                            <div class="col-md-4" id="img1"><img src="images/Relatorio.png" align="left" alt="" class="fl" style="width:100%; height:100%;"></div>
                            <div class="col-md-8">
                            <p align="justify">
                                Lembramos que, a cada período de 6 (seis) meses de realização de estágio, é necessária a apresentação de relatório de atividades à Agência de Estágios da UFC. O relatório deverá ser assinado pela concedente da vaga, pelo estagiário e pelo professor orientador, sendo posteriormente remetido à Agência para registro.
                                Ressaltamos que a apresentação periódica de relatórios é uma exigência prevista no art. 7º, inciso IV, da Lei 11.788/2008 e que a pendência quanto aos relatórios impede a prorrogação de estágios em curso e a celebração de novos termos de compromisso de estágio.
                                Lei 11.788/2008
                                Art. 7o São obrigações das instituições de ensino, em relação aos estágios de seus educandos:
                                IV – exigir do educando a apresentação periódica, em prazo não superior a 6 (seis) meses, de relatório das atividades.
                            </p>
                        </div>
                        </div>
                        </div>
                    </div>
                    <br>
                    <div class="article">
                        <h4><span>Dez anos da</span> Lei de Estágios</h4>
                        <p class="infopost">Posted on <span class="date">10 out 2018</span> by <a href="#">Admin</a> &nbsp;&nbsp;|&nbsp;&nbsp; Filed under  <a href="#">internet</a> <a href="#" class="com"><span>4</span></a></p>
                        <div class="clr"></div>
                        <br>
                        <div class="col-md-12">
                           <div class="post_content">
                            <div class="col-md-4" id="img1"><a href="https://www.educamaisbrasil.com.br/educacao/noticias/10-anos-da-lei-do-estagio-conheca-os-beneficios-conquistados-com-a-legislacao" ><img src="images/10anosLeiEstag.jpg" align="left" alt=""  style="width:100%; height:100%;"></a></div>
                                <div class="col-md-8">
                                <p align="justify">Em 25 de setembro, a Lei n. 11.788/2008 completou dez anos de garantias para os estudantes que estão no começo da vida profissional. O estágio é uma etapa importante na vida estudantil, sendo um momento de aprendizado e a possibilidade de se destacar no mercado de trabalho. Considerado obrigatório para a conclusão de alguns cursos, o estágio também é utilizado para cumprir a carga horária de atividades complementares para a faculdade. (fonte:educamaisbrasil) </p>
                               <p class="spec"><a href="https://www.educamaisbrasil.com.br/educacao/noticias/10-anos-da-lei-do-estagio-conheca-os-beneficios-conquistados-com-a-legislacao" class="rm">Leia Mais</a></p>
                           </div>
                        </div>
                    </div>
                    </div>               
        </div> 
    </div>
    </div> 
</section>
<section id="blog"> 
    <div class="container">
        <div class="fbg">
            <div class="fbg_resize">
                  <div class="col-sm-4 c1">
                     <h3><span>Sistemas e </span> Revistas</h3>
                         <a title="SIGAA" href="http://www.si3.ufc.br/sigaa/verTelaLogin.do;jsessionid=C488C8FCEE0BCCA9A1AD1A6DA75DEB94.node143"><img          src="/novos/banner_si3_sigaa.png" alt="Consulta ao SI3 - UFC" width="75" height="75" class="gal"></a>
                         <a title="Guia" href="http://ufc.br/ensino/guia-de-profissoes"><img src="/novos/banner_guia_profissoes.jpg" alt="Guia das                    Profissões" width="75" height="75" class="gal"></a>
                          <a title="Revista" href="http://pt.calameo.com/books/0040283405ce02eed04d9"><img src="/novos/revista das profissoes.jpg"                     alt="Revista das Profissões" width="75" height="75" class="gal"></a>
                          <a title="Calendário Universitário" href="http://www.ufc.br/calendario-universitario"><img                     src="/novos/banner_calendario_academico.png" alt="Calendário Universitário" width="75" height="75" class="gal"></a> 
                          <a title="Sistema de Gestão de Estágio" href="http://www.estagios.ufc.br/siges/public_html/"><img                     src="images/amostra2.png" alt="Sistema de Gestao de Estagio" width="75" height="75" class="gal"></a>  
                  </div>
                  <div class="col-sm-4 c2">
                    <h3><span>Overview</span> de Servicos</h3>
                    <p align=justify>A Agência de Estágios gerencia os contratos de estágio e de convênio de Estágio:</p>
                    <ul class="fbg_ul">
                      <li>De todos os cursos de graduação</li>
                      <li>Do campus de Fortaleza</li>
                      <li>Do campus de Quixadá, Russas e Sobral</li>
                    </ul>
                  </div>
                  <div class="col-sm-4 c3">
                    <h3><span>Sobre</span> nós</h3>
                    <p>Agência de Estágios</p>
                    <p class="contact_info"> <span>Endereço:</span> Avenida da Universidade, 2853<br>
                      <!-- <span>Telefone:</span> (85) 3366-7413<br>
                      <span>FAX:</span> (85) 3366-7881<br> -->
                      <span>E-mail:</span> <a href="#">estagios@ufc.br</a> </p>
                  </div>
              <div class="clr"></div>
            </div>
        </div>
    </div>
</section>

    <footer id="footer"> 
        <div class="container"> 
            <div class="text-center"> 
                <p>Copyright &copy; 2018 - <a href="http://ufc.br">UFC</a> - Agência de Estágio | Todos os direitos reservados</p> 
            </div> 
        </div> 
    </footer>

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