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
	<link href="assets/css/demo.css" rel="stylesheet" />


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
				    	    <br><br>
				        </div>
                    </form>
                    <!-- End # Login Form -->
                    
                  
                </div>
                <!-- End # DIV Form -->
                
			</div>
		</div>
	</div>
	
			
	<br>
<section id="about-us">
	<div class="container">
		<div class="text-center">
			<div class="col-sm-8 col-sm-offset-2">
				<h2 class="title-one">FAQs - Estágio</h2>
				<p>Aqui se encontra as perguntas mais frequentes sobre estágios.</p>
			</div>
		</div>
		<div class="about-us">
			<div class="row">
				<div class="col-sm-12">

			<script type="text/javascript">
		jQuery(document).ready(function($)
		{
			$('.dd').nestable({});
		});
		</script>
		
		
		
		
			
			<div class="col-sm-12">
				
				<div class="panel panel-primary" data-collapsed="0">
						
					
					<div class="panel-body">
							
						<div id="list-2" class="nested-list dd with-margins custom-drag-button"><!-- adding class "custom-drag-button" will create specific handler for dragging list items -->
							<!-- começa -->
							<ul class="dd-list">
								
								<li class="dd-item">
									<div class="dd-handle">
									<a onclick="abrir1();"><i class="fa fa-sort-asc" id="abrir_btn1" aria-hidden="true" style="display:block;"></i></a>
                                    <a onclick="fechar1();"><i class="fa fa-sort-desc" id="fechar_btn1" aria-hidden="true" style="display:none;"></i></a>
									</div>
									
									<div class="dd-content">
										O Que é um Estágio?
									</div>
									
									<ul class="dd-list" id="abrir1" style="display:none;">
									
										<li class="dd-item">
											<div class="dd-handle">
												<span>.</span>
												<span>.</span>
												<span>.</span>
											</div>
											
											<div class="dd-content">
												Estágio é ato educativo escolar supervisionado, desenvolvido no ambiente de trabalho, realizado por estudantes matriculados e efetivos da UFC junto a pessoas jurídicas de direito privado, ONGs, órgãos da administração pública e instituições de ensino. O estágio se configura como uma excelente oportunidade de desenvolvimento de atividades relacionadas às respectivas áreas de formação profissional dos estudantes.
											</div>
										</li>
									
										
									
										
										
									</ul>
								</li>
								
								
								
								
							</ul>
							<!-- termina -->
							<!-- começo -->
							<ul class="dd-list">
								
								<li class="dd-item">
									<div class="dd-handle">
									<a onclick="abrir2();"><i class="fa fa-sort-asc" id="abrir_btn2" aria-hidden="true" style="display:block;"></i></a>
                                    <a onclick="fechar2();"><i class="fa fa-sort-desc" id="fechar_btn2" aria-hidden="true" style="display:none;"></i></a>
									</div>
									
									<div class="dd-content">
										Qual é a Finalidade de um Estágio?
									</div>
									
									<ul class="dd-list" id="abrir2" style="display:none;">
									
										<li class="dd-item">
											<div class="dd-handle">
												<span>.</span>
												<span>.</span>
												<span>.</span>
											</div>
											
											<div class="dd-content">
												Propiciar a complementação do ensino e da aprendizagem realizados na UFC. As atividades do estágio devem estar coerentes com os currículos, programas e calendários universitários, a fim de se constituírem em instrumentos de integração, em termos de treinamento prático, aperfeiçoamento técnico-cultural, científico e relacionamento humano.
											</div>
										</li>
									</ul>
								</li>
							</ul>
							<!-- fim -->

							<!-- começo -->
							<ul class="dd-list">
								
								<li class="dd-item">
									<div class="dd-handle">
									<a onclick="abrir3();"><i class="fa fa-sort-asc" id="abrir_btn3" aria-hidden="true" style="display:block;"></i></a>
                                    <a onclick="fechar3();"><i class="fa fa-sort-desc" id="fechar_btn3" aria-hidden="true" style="display:none;"></i></a>
									</div>
									
									<div class="dd-content">
										Quais São as Modalidades de Estágios na UFC?
									</div>
									
									<ul class="dd-list" id="abrir3" style="display:none;">
									
										<li class="dd-item">
											<div class="dd-handle">
												<span>.</span>
												<span>.</span>
												<span>.</span>
											</div>
											
											<div class="dd-content">
												De acordo com a Lei nº 11.788/2008, Art. 1º, §1º e §2º, existem duas modalidades de estágios:<br><br>

												Estágio Curricular Supervisionado Obrigatório é aquele definido como tal no projeto do curso, cuja carga horária é requisito para aprovação e obtenção de diploma. Nessa modalidade de estágio, o estudante se matricula em componente curricular específico de estágio na Coordenadoria da Agência de Estágios seu curso, sendo de responsabilidade da Coordenação do Curso assegurar a matrícula e orientação didática. As normas que regem essa modalidade de estágio são definidas pela Pró-Reitoria de Graduação e executadas pela Agência de Estágios da UFC.<br><br>
												Estágio Curricular Supervisionado Não Obrigatório é aquele desenvolvido como atividade opcional, acrescida à carga horária regular e obrigatória. Esta modalidade de estágio também tem um aspecto profissionalizante, direto e específico, sendo conduzido a partir de interesse do estudante por uma vivência adicional junto ao mercado de trabalho. Esta modalidade segue as normas definidas pela Pró-Reitoria de Extensão e executadas pela Agência de Estágios da UFC.
											</div>
										</li>
									</ul>
								</li>
							</ul>
							<!-- fim -->


							<!-- começo -->
							<ul class="dd-list">
								
								<li class="dd-item">
									<div class="dd-handle">
									<a onclick="abrir4();"><i class="fa fa-sort-asc" id="abrir_btn4" aria-hidden="true" style="display:block;"></i></a>
                                    <a onclick="fechar4();"><i class="fa fa-sort-desc" id="fechar_btn4" aria-hidden="true" style="display:none;"></i></a>
									</div>
									
									<div class="dd-content">
										Quem Pode Contratar Estagiário?
									</div>
									
									<ul class="dd-list" id="abrir4" style="display:none;">
									
										<li class="dd-item">
											<div class="dd-handle">
												<span>.</span>
												<span>.</span>
												<span>.</span>
											</div>
											
											<div class="dd-content">
												As pessoas jurídicas de direito privado e os órgãos da administração pública direta, autárquicas e fundacional de qualquer dos poderes da União, dos Estados, do Distrito Federal e dos Municípios. Também os profissionais de nível superior, devidamente registrados em seus respectivos conselhos, podem oferecer estágios (Art. 9º da Lei nº 11.788/2008). Os setores acadêmicos ou administrativos da UFC poderão receber estudantes para vivências curriculares, como estágio obrigatório e não obrigatório (Resolução nº 32/CEPE Art. 9º). O primeiro passo é verificar se a unidade concedente possui convênio vigente com a UFC, conforme Resolução nº 32/CEPE, Art. 4º. Caso não exista convênio, ou o mesmo esteja expirado, será necessário realizar um novo convênio. É importante destacar que o estágio não gera vínculo empregatício desde que cumpra o que determina o Art. 3º da Lei nº 11.788/2008. O descumprimento de qualquer dos incisos deste artigo ou de qualquer obrigação contida no Termo de Compromisso Obrigatório ou Não Obrigatório caracteriza vínculo de emprego do educando com a parte concedente do estágio para todos os fins da legislação trabalhista e previdenciária (Lei nº11.788/2008, Art. 3º, § 2º).
											</div>
										</li>
									</ul>
								</li>
							</ul>
							<!-- fim -->
								
									<!-- começo -->
							<ul class="dd-list">
								
								<li class="dd-item">
									<div class="dd-handle">
									<a onclick="abrir5();"><i class="fa fa-sort-asc" id="abrir_btn5" aria-hidden="true" style="display:block;"></i></a>
                                    <a onclick="fechar5();"><i class="fa fa-sort-desc" id="fechar_btn5" aria-hidden="true" style="display:none;"></i></a>
									</div>
									
									<div class="dd-content">
										O Que Deve Constar no Termo de Compromisso de Estágio Obrigatório, Não Obrigatório e Coletivo?
									</div>
									
									<ul class="dd-list" id="abrir5" style="display:none;">
									
										<li class="dd-item">
											<div class="dd-handle">
												<span>.</span>
												<span>.</span>
												<span>.</span>
											</div>
											
											<div class="dd-content">
											É obrigação das instituições de ensino celebrar termo de compromisso com os dispositivos seguintes (Lei nº11.788/2008 Art. 7º inciso I, Art. 9º inciso I – Resolução Art. 4º): <br><br>
											Termo de compromisso de estágio não obrigatório:<br><br> Os termos de compromisso de estágio não obrigatório devem ser impressos em 3 (três) vias e encaminhados para a Agência de Estágios para assinatura. Cada uma das vias deve ser assinada por representante da concedente, pelo aluno e pelo representante da Agência de Estágios da UFC;<br><br>  No termo de compromisso devem constar as seguintes informações:<br><br>

											Dados da empresa;<br>
											Dados do estagiário;<br>
											Dados do professor orientador;<br>
											Dados do supervisor da unidade concedente;<br>
											Horário e período de realização do estágio;<br>
											Valor da bolsa ou outra forma de contraprestação acordada;<br>
											Seguro contra acidentes pessoais a ser contratado pela concedente;<br>
											Histórico e comprovante de matrícula (apenas uma via);<br>
											Plano de atividades assinado pelo Professor orientador, pelo aluno e pelo Supervisor da concedente.<br><br>
											Termos de compromisso de estágio obrigatório:<br><br>
											Os termos de compromisso de estágio obrigatório devem ser impressos em 3 (três) vias e encaminhados para a Agência de Estágios para assinatura. Cada uma das vias deve ser assinada pelo representante da concedente, pelo aluno e pelo representante da Agência de Estágios da UFC; No termo de compromisso devem constar as seguintes informações:<br><br>

											Dados da empresa;<br>
											Dados do estagiário;<br>
											Dados do professor orientador do estágio;<br>
											Dados do supervisor da unidade concedente;<br>
											Horário e período de realização do estágio;<br>
											Valor da bolsa ou outra forma de contraprestação acordada, quando houver;<br>
											Seguro contra acidentes pessoais, contratado pela UFC;<br>
											Histórico e comprovante de matrícula (apenas uma via);<br>
											Plano de atividades assinado pelo Professor orientador, pelo aluno e pelo Supervisor da concedente.<br><br>
											Termo de compromisso coletivo de estágio obrigatório:
											<br><br>
											O termo de compromisso coletivo de estágio obrigatório aplica-se a situações nas quais grupos de alunos matriculados em estágio obrigatório realizam estágio simultaneamente em uma mesma concedente. Este modelo de termo de compromisso de estágio obrigatório visa melhorar o trabalho do professor orientador na elaboração dos termos de compromisso e se diferencia por apresentar em anexo a lista com o nome de todos os alunos que irão realizar o estágio em uma mesma concedente. Este termo de compromisso deve igualmente ser impresso em 3 (três) vias e encaminhado para a Agência de Estágios para assinatura. Cada uma das vias deve ser assinada pelo representante da concedente, pelo professor orientador e pelo representante da Agência de Estágios da UFC. Os alunos devem assinar na lista em anexo, no campo correspondente ao seu nome. No termo de compromisso devem constar as seguintes informações:<br><br>

											Dados da empresa;<br>
											Dados de cada estagiário;<br>
											Dados do professor orientador do estágio;<br>
											Dados do supervisor da unidade concedente;<br>
											Horário e período de realização do estágio;<br>
											Seguro contra acidentes pessoais, contratado pela UFC;<br>
											Plano de atividade.<br><br>
											É Possível Utilizar o Modelo Próprio de Termo de Compromisso de Estágio Fornecido Pela Concedente?
											Sim, desde que esse termo de compromisso apresente todas as informações listadas no item 4.5.
											</div>
										</li>
									</ul>
								</li>
							</ul>
							<!-- fim -->
							<!-- começo -->
							<ul class="dd-list">
								
								<li class="dd-item">
									<div class="dd-handle">
									<a onclick="abrir6();"><i class="fa fa-sort-asc" id="abrir_btn6" aria-hidden="true" style="display:block;"></i></a>
                                    <a onclick="fechar6();"><i class="fa fa-sort-desc" id="fechar_btn6" aria-hidden="true" style="display:none;"></i></a>
									</div>
									
									<div class="dd-content">
										O que é o Termo de Responsabilidade?
									</div>
									
									<ul class="dd-list" id="abrir6" style="display:none;">
									
										<li class="dd-item">
											<div class="dd-handle">
												<span>.</span>
												<span>.</span>
												<span>.</span>
											</div>
											
											<div class="dd-content">
												Quando os setores acadêmicos ou administrativos da UFC receberem estudantes para vivências curriculares (como estágio obrigatório e não obrigatório), será necessário celebrar Termo de Responsabilidade entre as unidades envolvidas, devidamente acompanhado do Plano de Trabalho (Resolução Art. 9º).
											</div>
										</li>
									</ul>
								</li>
							</ul>
							<!-- fim -->
								<!-- começo -->
							<ul class="dd-list">
								
								<li class="dd-item">
									<div class="dd-handle">
									<a onclick="abrir7();"><i class="fa fa-sort-asc" id="abrir_btn7" aria-hidden="true" style="display:block;"></i></a>
                                    <a onclick="fechar7();"><i class="fa fa-sort-desc" id="fechar_btn7" aria-hidden="true" style="display:none;"></i></a>
									</div>
									
									<div class="dd-content">
										O que são Agentes de Integração?
									</div>
									
									<ul class="dd-list" id="abrir7" style="display:none;">
									
										<li class="dd-item">
											<div class="dd-handle">
												<span>.</span>
												<span>.</span>
												<span>.</span>
											</div>
											
											<div class="dd-content">
												São entidades que realizam um trabalho de operacionalização de Programas de Estágios, mediante a celebração de convênios específicos. As empresas podem assinar um convênio com um agente de integração visando ao desenvolvimento de atividades conjuntas capazes de propiciar a plena operacionalização do Estudantes e estabelecendo os respectivos procedimentos de caráter legal, técnico, burocrático, administrativo e financeiro (Lei nº 11.788/2008 Art. 5º).
											</div>
										</li>
									</ul>
								</li>
							</ul>
							<!-- fim -->
								<!-- começo -->
							<ul class="dd-list">
								
								<li class="dd-item">
									<div class="dd-handle">
									<a onclick="abrir8();"><i class="fa fa-sort-asc" id="abrir_btn8" aria-hidden="true" style="display:block;"></i></a>
                                    <a onclick="fechar8();"><i class="fa fa-sort-desc" id="fechar_btn8" aria-hidden="true" style="display:none;"></i></a>
									</div>
									
									<div class="dd-content">
										O Estágio Pode Começar Mesmo Sem Que a Documentação Esteja Completa?
									</div>
									
									<ul class="dd-list" id="abrir8" style="display:none;">
									
										<li class="dd-item">
											<div class="dd-handle">
												<span>.</span>
												<span>.</span>
												<span>.</span>
											</div>
											
											<div class="dd-content">
												Não. O estudante só poderá iniciar o estágio depois que toda a documentação relacionada ao convênio e ao termo de compromisso estiver devidamente regularizada e assinada, evitando problemas para si e para a empresa onde estiver estagiando.
											</div>
										</li>
									</ul>
								</li>
							</ul>
							<!-- fim -->
								<!-- começo -->
							<ul class="dd-list">
								
								<li class="dd-item">
									<div class="dd-handle">
									<a onclick="abrir9();"><i class="fa fa-sort-asc" id="abrir_btn9" aria-hidden="true" style="display:block;"></i></a>
                                    <a onclick="fechar9();"><i class="fa fa-sort-desc" id="fechar_btn9" aria-hidden="true" style="display:none;"></i></a>
									</div>
									
									<div class="dd-content">
										O que Pode Impedir ou Interromper a Realização do Estágio?
									</div>
									
									<ul class="dd-list" id="abrir9" style="display:none;">
									
										<li class="dd-item">
											<div class="dd-handle">
												<span>.</span>
												<span>.</span>
												<span>.</span>
											</div>
											
											<div class="dd-content">
												A situação escolar do estudante: conclusão ou abandono do curso, e trancamento de matrícula são eventos que interrompem a realização do estágio, impedindo a sua continuidade, pois descaracterizam a condição legal de estagiário, podendo gerar vínculo empregatício. Por ocasião do desligamento do estagiário, entregar termo de realização do estágio com indicação resumida das atividades desenvolvidas, dos períodos e da avaliação de desempenho (Lei n° 11.788/2008 Art. 9º inciso V).
											</div>
										</li>
									</ul>
								</li>
							</ul>
							<!-- fim -->
									<!-- começo -->
							<ul class="dd-list">
								
								<li class="dd-item">
									<div class="dd-handle">
									<a onclick="abrir10();"><i class="fa fa-sort-asc" id="abrir_btn10" aria-hidden="true" style="display:block;"></i></a>
                                    <a onclick="fechar10();"><i class="fa fa-sort-desc" id="fechar_btn10" aria-hidden="true" style="display:none;"></i></a>
									</div>
									
									<div class="dd-content">
										Todo Estágio é Remunerado?
									</div>
									
									<ul class="dd-list" id="abrir10" style="display:none;">
									
										<li class="dd-item">
											<div class="dd-handle">
												<span>.</span>
												<span>.</span>
												<span>.</span>
											</div>
											
											<div class="dd-content">
												Não. Alguns estágios não são remunerados. Outros podem oferecer uma bolsa em dinheiro ou outra forma de contraprestação que venha a ser acordada para os estudantes (Lei n° 11.788/2008, art. 12º). No caso dos estágios obrigatórios é opcional a concessão de bolsa ou outra forma de contraprestação, já nos estágios obrigatórios é compulsória a concessão de bolsa ou outra forma de contraprestação. A bolsa em dinheiro, paga diretamente pela empresa ou por meio do Agente de Integração, não precisa obedecer ao salário mínimo. A finalidade do pagamento de uma bolsa em dinheiro ao estagiário é permitir ao estudante a cobertura parcial de suas despesas escolares e de outras, decorrentes do estágio.
											</div>
										</li>
									</ul>
								</li>
							</ul>
							<!-- fim -->
									<!-- começo -->
							<ul class="dd-list">
								
								<li class="dd-item">
									<div class="dd-handle">
									<a onclick="abrir11();"><i class="fa fa-sort-asc" id="abrir_btn11" aria-hidden="true" style="display:block;"></i></a>
                                    <a onclick="fechar11();"><i class="fa fa-sort-desc" id="fechar_btn11" aria-hidden="true" style="display:none;"></i></a>
									</div>
									
									<div class="dd-content">
										Estudantes Estrangeiros Matriculados na UFC Têm os Mesmos Direitos dos Estudantes Brasileiros em Participar de Estágios?
									</div>
									
									<ul class="dd-list" id="abrir11" style="display:none;">
									
										<li class="dd-item">
											<div class="dd-handle">
												<span>.</span>
												<span>.</span>
												<span>.</span>
											</div>
											
											<div class="dd-content">
												Sim. Aplicam-se aos estudantes estrangeiros regularmente matriculados na UFC, as normas constantes do Decreto nº 87.497/82 – Art. 11º; Lei nº 6.815/80, art. 13º; Lei nº 11.788/2008, art. 4º no que se refere ao direito de realizar estágios em empresas.
											</div>
										</li>
									</ul>
								</li>
							</ul>
							<!-- fim -->
								<!-- começo -->
							<ul class="dd-list">
								
								<li class="dd-item">
									<div class="dd-handle">
									<a onclick="abrir12();"><i class="fa fa-sort-asc" id="abrir_btn12" aria-hidden="true" style="display:block;"></i></a>
                                    <a onclick="fechar12();"><i class="fa fa-sort-desc" id="fechar_btn12" aria-hidden="true" style="display:none;"></i></a>
									</div>
									
									<div class="dd-content">
										Como um Aluno Pode Comprovar a Realização de um Estágio?
									</div>
									
									<ul class="dd-list" id="abrir12" style="display:none;">
									
										<li class="dd-item">
											<div class="dd-handle">
												<span>.</span>
												<span>.</span>
												<span>.</span>
											</div>
											
											<div class="dd-content">
												O principal documento que comprova a realização de um estágio é o termo de compromisso de estágio devidamente assinado pela empresa, pelo estagiário e pela Agência de Estágios da UFC. Além do termo de compromisso de estágio, é possível solicitar uma declaração de realização de estágio junto à Agência de Estágios da UFC.
											</div>
										</li>
									</ul>
								</li>
							</ul>
							<!-- fim -->

							<!-- começo -->
							<ul class="dd-list">
								
								<li class="dd-item">
									<div class="dd-handle">
									<a onclick="abrir13();"><i class="fa fa-sort-asc" id="abrir_btn13" aria-hidden="true" style="display:block;"></i></a>
                                    <a onclick="fechar13();"><i class="fa fa-sort-desc" id="fechar_btn13" aria-hidden="true" style="display:none;"></i></a>
									</div>
									
									<div class="dd-content">
										Como análisamos os termos ?
									</div>
									
									<ul class="dd-list" id="abrir13" style="display:none;">
									
										<li class="dd-item">
											<div class="dd-handle">
												<span>.</span>
												<span>.</span>
												<span>.</span>
											</div>
											
											<div class="dd-content">
												PREENCHIMENTO DO TERMO DE COMPROMISSO:<br><br> 
												Os termos de compromisso não devem ser preenchidos com caneta ou lápis. O preenchimento deve ser realizado no computador.<br><br>
												DOCUMENTAÇÃO INCOMPLETA:<br><br>
												 Não serão aceitos termos de compromisso com documentação incompleta. Os termos de compromisso devem ser acompanhados pelo atestado de matrícula e histórico escolar de graduação. <br><br>
												CHOQUE DE HORÁRIO:<br><br> 
												Não é permitido choque de horário entre estágio e disciplina nas quais o aluno esteja matriculado.<br><br>
												FALTA DE TERMO DE RESCISÃO DE ESTÁGIO:<br><br> 
												Um novo estágio somente poderá ser assinado após rescisão do anterior. Assim, é necessário apresentar o termo de rescisão de estágio antes de assinar um novo termo de compromisso.<br><br>
												FALTA DE CONVÊNIO: <br><br>
												O termo de compromisso somente poderá ser assinado após a formalização de convênio da concedente com a UFC.<br><br> 
												DURAÇÃO DO ESTÁGIO:<br><br> 
												No caso de estágio obrigatório, o período de duração deve ser compatível com a disciplina ou atividade de estágio, ou seja, o estágio obrigatório somente poderá ocorrer enquanto o aluno estiver matriculado na disciplina ou atividade de estágio. No caso de estágio não obrigatório, o período não deve ser superior a 2 (dois) anos. Para o estágio não obrigatório, recomenda-se que o termo de compromisso de estágio seja assinado com vigência de 1 (um) ano e, sendo do interesse das partes, seja renovado por mais 1 (um) ano.<br><br>
												CARGA HORÁRIA: <br><br>
												A carga horária do estágio não pode ultrapassar 6 (seis) horas diárias e 30 (trinta) horas semanais.<br><br>
												SEGURO: <br><br>
												No caso de estágio não obrigatório, o seguro deve ser contratado pela concedente. As informações sobre o seguro devem constar no termo de compromisso de estágio não obrigatório.<br><br>

											</div>
										</li>
									</ul>
								</li>
							</ul>
							<!-- fim -->


								<!-- começo -->
							<ul class="dd-list">
								
								<li class="dd-item">
									<div class="dd-handle">
									<a onclick="abrir14();"><i class="fa fa-sort-asc" id="abrir_btn14" aria-hidden="true" style="display:block;"></i></a>
                                    <a onclick="fechar14();"><i class="fa fa-sort-desc" id="fechar_btn14" aria-hidden="true" style="display:none;"></i></a>
									</div>
									
									<div class="dd-content">
										Onde eu Posso Obter mais Informações Sobre os Estágios na UFC ?
									</div>
									
									<ul class="dd-list" id="abrir14" style="display:none;">
									
										<li class="dd-item">
											<div class="dd-handle">
												<span>.</span>
												<span>.</span>
												<span>.</span>
											</div>
											
											<div class="dd-content">
												Entrando em contato com a Agência de Estágios:<br><br>
												• No endereço: Av. da Universidade, 2853- Prédio da
												Reitoria – Benfica;<br>
												• Através dos telefones: 3366-7413 / 3366-7881;<br>
												• Pelo e-mail: estágios@ufc.br;<br>
												• Acessando a página no Facebook da Agência de Estágios
												UFC, que tem como finalidade divulgar as oportunidades
												de cursos, palestras, concursos, entre outros;<br>
												• Acessando os grupos criados no Facebook com objetivo
												de divulgar vagas de estágio para cada unidade
												acadêmica da UFC.
											</div>
										</li>
									</ul>
								</li>
							</ul>
							<!-- fim -->


						</div>
						
					</div>
				
						<!-- End Skill Bar --></div>
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

	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/smoothscroll.js"></script> 
	<script type="text/javascript" src="js/jquery.isotope.min.js"></script>
	<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script> 
	<script type="text/javascript" src="js/jquery.parallax.js"></script> 
	<script type="text/javascript" src="js/main.js"></script>  
	<script type="text/javascript" src="js/modal.js"></script>

	<script src="assets/js/jquery.nestable.js"></script>


	
</body>
</html>