<?php
defined('EXEC') or die();

Loader::import('com.google.recaptcha');

//Verificando mensagem de suporte
if (@$_POST['suporte_send']) {
	
	
	$nome  	= addslashes($_POST['suporte_nome']); 
	$email 	= strtolower(addslashes($_POST['suporte_email'])); 
	$duvida = $_POST['suporte_duvida']; 
	$secret = "6LfDqg4UAAAAABtyCrwSrSWoHh9GPX0siRDTa2sY"; 
	$response = null;
	$reCaptcha = new ReCaptcha($secret);
	
	$body = "<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN' 'http://www.w3.org/TR/html4/loose.dtd'>
	<html>
	<head>
		<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
		<title>".Config::SYSTEM."</title>
	 </head>
	 <body topmargin='0'>
		<table width='500'  border='0' align='center' cellpadding='0' cellspacing='0' bordercolor='#E3E1BA' bgcolor='#FFFFFF'>
			<tr>
				<td><img src='http://www.nuteds.ufc.br/home/images/logo_nuteds.png' width='262' height='62'></td>
			</tr>
			<tr>
				<td>
					<table border='0'>
						<tr><td>Nome:</td><td>".$nome."</td></tr>
						<tr><td>Email:</td><td>".$email."</td></tr>
						<tr><td>Dúvida:</td><td>".$duvida."</td></tr>						
					</table>				
				</td>
			</tr>
		</table>			
	</body>
	</html>";
	
	if(@$_POST["g-recaptcha-response"]){	
	
		$response = $reCaptcha->verifyResponse(
			$_SERVER["REMOTE_ADDR"],
			$_POST["g-recaptcha-response"]
		);
		if ($response != null && $response->success) {
			Util::mail(utf8_decode('Telessaúde - Dúvida ou Sugestão'), 'telessaude@medicina.ufc.br', 'NUTEDS', $body, 'suporte.telessaude@nuteds.ufc.br'); //$email
			Controller::setInfo('Dúvida', 'Enviada com sucesso! Por favor aguarde!');		
		} 
		else {
			Controller::setInfo('Dúvida', 'Erro ao verificar capcha!', 'error');
		}
	}
	else{
		Controller::setInfo('Dúvida', 'Erro ao enviar, verifique o formulário!', 'error');
	}
	Controller::redirect();	
}


//Verificando a recuperação do acesso
if (@$_POST['ds_email']) {
	$auth->passRecovery();
}

//Autenticando o usuário e o redirecionando
if(@$_POST['user'] && @$_POST['pass']){	
	$test = $auth->authenticate();
}

?>
<script src='https://www.google.com/recaptcha/api.js?hl=pt-BR'></script>
	
	
		<div class="col-sm-12">
			
			<div class="container" style="min-height:95px; padding-top:5px;">
				<div class="row">
					<div class="col-sm-6">
						<img src="assets/logo_telessaude.png"/>
					</div>
					<div class="col-sm-6 text-right">
						<a href="https://goo.gl/forms/xkmqZh64RdDAkz4m1" target="blank" class="btn btn-primary" style="margin-top:15px; margin-right:20px; width:120px;">INSCRIÇÃO</a>	
						<a href="#" class="btn btn-login" data-toggle="modal" data-target="#modalSuporte" style="margin-top:15px; margin-right:20px; width:100px;">SUPORTE</a>
						<div style="margin-top:15px;" class="hidden-sm hidden-md hidden-lg"></div>
					</div>
				</div>
			</div>		
			<div style="background:url('assets/banner.png') no-repeat; max-width:1700px; margin:0 auto;">				
				<div class="container">
					
					<div class="row">
					
						<div class="col-sm-8 hidden-xs hidden-sm">
						
							
							<div style="margin-top:430px;" class="hidden-xs hidden-sm hidden-lg"></div>
							<div style="margin-top:480px;" class="hidden-xs hidden-sm hidden-md"></div>
						
							<div class="">
								<span style="font-size:38px; text-shadow: 2px 2px 5px #ddd; font-weight:bold;">NÚCLEO DE TELESSAÚDE DO CEARÁ</span><br>
								Núcleo de Tecnlogias e Educação a Distância em Saúde da Universidade Federal do Ceará
							</div>
							
						</div>
					
						<div class="col-sm-12 col-md-4">
					
							<div class="text-center" style="background:url('assets/login_background.png') no-repeat; width:323px; min-height:589px; padding:0 20px 0 20px; margin:0 auto;">
						
								<div style="padding-top:60px;"></div>
								
								<img src="assets/logo_neg_telessaude_ce.png" width="170"/>
								
								<?php if(@$test){ echo '<div style="margin-top:20px;"></div>'.$test; } else { echo '<div style="margin-top:60px;"></div>'; } ?>
								
								<form method="post">						
									<div class="input-group">
										<div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
										<input type="text" name="user" id="user" class="form-control" style="height:46px;" placeholder="Digite seu usuário" required="required">
									</div>
									
									<div style="margin-top:20px;"></div>
									
									<div class="input-group">
										<div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
										<input type="password" name="pass" id="pass" class="form-control" style="height:46px;" placeholder="Digite sua senha" required="required">
									</div>
									
									<div style="margin-top:20px;"></div>
									<input type="hidden" name="url" value="<?php echo $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>"/>
									<button class="btn btn-login" style="width:220px; height:50px;"><b>ENTRAR</b></button>								
									
									<div style="margin-top:20px;"></div>
									
									<a href="javascript:void(0);" data-toggle="modal" data-target="#modalEsqueceu" style="color: white; text-decoration: underline;">Esqueceu o usuário ou senha?</a>
									
								</form>						
								
							</div>
					
						</div>
					
					</div>
					
				</div>			
			</div>
			
			<div style="margin-top:40px;"></div>
			
			<div class="container text-center">
				<div style="font-size:28px; font-weight:bold; color:#157eb8;">PARCEIROS</div>
			</div>
			
			<div style="margin-top:40px;"></div>
			
			<div class="container text-center">
				<img src="assets/parceiros1.png"/>
				<img src="assets/parceiros0.png"/>
				<img src="assets/parceiros2.png"/>
				<img src="assets/parceiros0.png"/>
				<img src="assets/parceiros3.png"/>
				<img src="assets/parceiros0.png"/>
				<img src="assets/parceiros4.png"/>
			</div>
		
		</div>
	
<div class="modal fade" id="modalEsqueceu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Recuperar Senha</h4>
      </div>
	  <form method="post">
		  <div class="modal-body">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
				<p>Olá! Para recuperar seu usuário ou senha informe o email de cadastro:</p>
				<input id="ds_email" name="ds_email" type="email" class="form-control" placeholder="Digite seu email" required="required"/>
				</div>
			</div>
		  </div>
		  <div class="modal-footer">
			<input type="submit" class="btn btn-primary" value="Recuperar"/>
		  </div>
	  </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modalSuporte" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Suporte</h4>
      </div>
	  <form method="post">
		<input type="hidden" name="suporte_send" value="1"/>
		  <div class="modal-body">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<label>Nome</label>
					<input id="suporte_nome" name="suporte_nome" type="text" class="form-control" placeholder="Digite seu Nome" required="required"/>
				</div>
				<div class="col-md-10 col-md-offset-1" style="margin-top:5px;">
					<label>Email</label>
					<input id="suporte_email" name="suporte_email" type="email" class="form-control" placeholder="Digite seu Email" required="required"/>
				</div>
				<div class="col-md-10 col-md-offset-1" style="margin-top:5px;">
					<label>Dúvida</label>
					<textarea id="suporte_duvida" rows="5" name="suporte_duvida" class="form-control" placeholder="Descreva sua Dúvida" required="required"></textarea>
				</div>
				<div class="col-md-10 col-md-offset-1" style="margin-top:5px;">
					<label>Clique no item abaixo:</label>
					<div class="g-recaptcha" data-sitekey="6LfDqg4UAAAAABAIsz6CaLhU3GeaVjwWqtgrwqm1"></div>
				</div>
				
				
				
			</div>
		  </div>
		  <div class="modal-footer">
			<input type="submit" class="btn btn-primary" value="Enviar"/>
		  </div>
	  </form>
    </div>
  </div>
</div>
<script type="text/javascript">
$(function(){	
	$("#user").focus();
});
</script>
