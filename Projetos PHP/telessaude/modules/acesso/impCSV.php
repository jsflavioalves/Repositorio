<?php
defined('EXEC') or die();
$transacao = 'montacertificado';
$ufDefault = 'CE';

//if($auth->isRead($transacao) && !$auth->isAdmin()){
if(!$auth->isRead($transacao)){
	Util::info(Config::AUTH_MESSAGE);
	return true;
}

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

  
	<!-- FORMULÁRIO MONTA CERTIFICADOS -->
	<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
    
	<?php if(!isset($_GET['form'])){ ?>	
			
	<!--  <form action="<?php //echo Util::setLink(array('p=null')); ?>" onsubmit="javascript: abreResposta(this)" method="post"> --> 
	<!--  <form action="modules/acesso/geracertificado.php" onsubmit="javascript: abreResposta(this)" method="post"> -->
	 
	<!--  <form action=" <?php  // echo Util::setLink(array('page=acesso/importaCSV')); ?>" enctype="multipart/form-data" onsubmit="javascript: abreResposta(this)" method="post">   -->
           <form action=" <?php  echo Util::setLink(array('page=acesso/importaCSV')); ?>" enctype="multipart/form-data" method="post"> 
	          <?php 
	           echo '<form action="';
	          echo Util::setLink(array('page=acesso/importaCSV'));
	          echo '" method="post">';
	          ?>
	              <div class="col-md-12">
	                    Esquema:
	                    <b>id_curso;nr_cpf;aprov</b>
                        <br>
                            <label> Insira o arquivo CSV (para atualizar status aprovado): </label>
                            <div class="form-group">
                                <div class="input-group"><div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                                 <input type="file" id="inputName" class="form-control" name="pdf"  >
                                </div>
                             </div>
                             <div class="form-group" style="float:right;width:20%">
                               <input type="submit" name="btn_perfil" value="Upload" style="float:right;width:70%;height:25px;">
                            </div>
                            </br> </br>
                            
                     </div>
                <?php 
                    echo '</form>';
               ?>
        
       </form> 
      <form action=" <?php  echo Util::setLink(array('page=acesso/importaCSVinclui')); ?>" enctype="multipart/form-data" method="post"> 
	          <?php 
	           echo '<form action="';
	          echo Util::setLink(array('page=acesso/importaCSVinclui'));
	          echo '" method="post">';
	          ?>
	              <div class="col-md-12">
	                    Esquema:
	                    <b>id_curso;nr_tipo;nm_aluno;nr_codigo_sus;nr_cpf;nr_cns;nr_cnes;nr_cbo;ds_email;fl_sexo;cd_localidade;cd_profissao;dt_nascimento;ds_escolaridade;ds_numero;ds_telefone1;ds_telefone2;aprov</b>
                        <br>
                            <label> Insira o arquivo CSV (para incluir novos alunos): </label>
                            <div class="form-group">
                                <div class="input-group"><div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                                 <input type="file" id="inputName2" class="form-control" name="pdf2"  >
                                </div>
                             </div>
                             <div class="form-group" style="float:right;width:20%">
                               <input type="submit" name="btn_perfil2" value="Upload" style="float:right;width:70%;height:25px;">
                            </div>
                            </br> </br>
                            
                     </div>
                <?php 
                    echo '</form>';
               ?>
        
       </form> 

		<?php
				}
				?>
						
	</body>
	
	
