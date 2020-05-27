<?php
//defined('EXEC') or die();
//$transacao = 'geracertificado';
//$ufDefault = 'CE';

//if($auth->isRead($transacao) && !$auth->isAdmin()){
	//Util::info(Config::AUTH_MESSAGE);
	//return true;
//}

?>
<script language="javascript" type="text/javascript">
    function abreResposta(formulario) {
      window.open("_blank","novaJanela","......"); 
      formulario.target = 'novaJanela';
      return true;      
     }
    
     function completar_declaracao(){
      $(document).ready(function()
    {
      $('#input1').autocomplete(
      {
        source: "search_consulta_dec.php",
        minLength: 1
      });

    });
    }
    function sumir(){
      var mudar = document.getElementById("sumir").style.display = 'none';
    }
</script>
  
	<!-- FORMULARIO VALIDA CERTIFICADOS -->
	<form action=" <?php  echo Util::setLink(array('page=acesso/valcertificado')); ?>" onsubmit="javascript: abreResposta(this)" method="post">  
				<div class="row">
				<div class="col-md-12">
					<div class="col-md-6">
											
						  <?php 
						   echo '<input type="text" size=100 name="codvalidacao">'; 
						   echo '<button type="submit" class="btn btn-primary" type="button" style="margin-left:10%;" class="btn btn-box-tool">Verificar Autenticidade</button>'; ?>
						   			
					</div>
				</div>
			</div>
		</form>

	
	
	
