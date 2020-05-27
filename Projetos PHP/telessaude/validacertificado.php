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
<!-- 	<form action="valcertificado.php" onsubmit="javascript: abreResposta(this)" method="post">  -->
          <form action="valcertificado.php" method="post">  
        <!--<form action=" <?php  echo Util::setLink(array('valcertificado')); ?>" onsubmit="javascript: abreResposta(this)" method="post">--> 
				<div class="row">
				<div class="col-md-12">
					<div class="col-md-6">
					    </br></br></br></br>
					    <p align="center">
						<label>Digite o C&#243;digo de Valida&#231;&#227;o:</label>			
						  <?php 
						   //echo '<input type="text" size=30 name="codvalidacao">'; 
						   echo '<input id="codvalid" name="codvalida" size=30 type="text" required>';
						   echo '<button type="submit" class="btn btn-primary" type="button" style="margin-left:10%;" class="btn btn-box-tool">Verificar Autenticidade</button>'; ?>
						 </p>  			
					</div>
				</div>
			</div>
		</form>

	
	
	
