<?php
defined('EXEC') or die();
$transacao = 'montacertificado';
$ufDefault = 'CE';

// if($auth->isRead($transacao) && !$auth->isAdmin()){
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
         <script src="ckeditor/ckeditor.js"></script>
   </head>
<body>
         
	          <?php 
	          $sqlProcCPF = 'SELECT ci_usuario,nm_login FROM tb_usuario WHERE ci_usuario ='. $user['ci_usuario'];
			  $query1 = query($sqlProcCPF);
			  $row1 = $query1->fetch();
			  $cpf = $row1['nm_login'];
			  $nome_usuario = $user['nm_usuario'];
			  echo $user['ci_usuario'] . " - " . $nome_usuario ." - CPF:".$cpf ."</br>"."</br>" ;
			  $_SESSION['pdf']='';
			  $_SESSION['pdftras']='';
			  ?>
	  	  	   
      <form name="template" action=" <?php  echo Util::setLink(array('page=acesso/imptemplate')); ?>" enctype="multipart/form-data" method="post">         
	              <div class="col-md-12">
                        <br>
                            <label> Insira o Template da Frente: </label>
                            <div class="form-group">
                                <div class="input-group"><div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                                 <input type="file" id="inputName" class="form-control" name="pdf"  >
                                </div>
                             </div>
                                                         
                   </div>
                   <div class="col-md-12">
                        <label> Insira o Template de Tr&#225;s: </label>
                            <div class="form-group">
                                <div class="input-group"><div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                                 <input type="file" id="inputName" class="form-control" name="pdftras"  >
                                </div>
                             </div>
                                                        
                     </div>   
                     <div class="form-group" style="float:right;width:20%">
                               <input type="submit" name="btn_perfil" value="Upload" style="float:right;width:70%;height:25px;">
                     </div>
                     </br> </br>
                           	
		</form>
				
		 <form name="vercertif" action=" <?php  echo Util::setLink(array('page=acesso/impmodelo')); ?>" enctype="multipart/form-data" method="post">
		      <div class="form-group">
                <label>Curso:</label>
                <select class="form-control select2" style="width: 40%;" name="selcurso">
                  <?php 
               //   $sqlCursosRealizados = 'select id_curso, ds_codigo, ds_descricao,dt_inicio,dt_fim,nr_ch,nr_cpf from tb_curso INNER JOIN tb_aluno ON tb_curso.ds_codigo = tb_aluno.id_curso';
                  $sqlCursosRealizados = 'select ds_codigo, ds_descricao from tb_curso INNER JOIN tb_aluno ON tb_curso.ds_codigo = tb_aluno.id_curso';
                //  $sqlCursosRealizados = $sqlCursosRealizados . " WHERE nr_cpf ='". $cpf. "'";
                  $sqlCursosRealizados = $sqlCursosRealizados . ' GROUP BY ds_descricao,ds_codigo ORDER BY ds_descricao,ds_codigo';
                  $query = query($sqlCursosRealizados);
                    while($row = $query->fetch()){
                      $ds_codigo = $row['ds_codigo'];
                      $ds_descricao = $row['ds_descricao'];
                      echo '<option value="'.$ds_codigo.'">'.$ds_descricao.'</option>';
                    }
                   ?>
                </select>
               </div>
		        <div id="textocertif">
		             <b>Texto da frente do certificado.</b> Palavras reservadas=<b>{aluno},{cpf},{curso},{dt_inicio},{dt_fim},{cargahoraria}</b>
                     <textarea id="myeditor" name="myeditor" id="myeditor">
                     Certificamos que, {aluno} CPF No. {cpf}, concluiu o curso de {curso}, promovido pelo N&uacute;cleo de Tecnologias e Educa&ccedil;&atilde;o&nbsp;&agrave; Dist&acirc;ncia em Sa&uacute;de da Faculdade de Medicina da Universidade Federal do Cear&aacute; (NUTEDS/FAMED/UFC), em parceria com o Programa Nacional de Telessa&uacute;de Brasil Redes, com aproveitamento satisfat&oacute;rio, no per&iacute;odo compreendido entre {dt_inicio} a {dt_fim}, com carga hor&aacute;ria de {cargahoraria} horas semanais. 
                     </textarea>
                </div>
                <script type="text/javascript">
		              CKEDITOR.replace('myeditor');
	            </script>
	            <script type="text/javascript">
                      CKEDITOR.replace('myeditor',{
	                      width: "700px",
                          height: "400px"
                          }
                        );
                  </script>
               </br>   
               <div id="textocertiftras">
		             <b>Texto das costas do certificado.</b> Palavras reservadas=<b>{cargahoraria},{dataemissao}</b>
                     <textarea id="myeditortras" name="myeditortras" id="myeditortras">
                     Conte&#250;do Program&#225;tico: Carga Hor&#225;ria: {cargahoraria} Data de Emiss&#227;o: {dataemissao}
                     </textarea>
                </div>
                <script type="text/javascript">
		              CKEDITOR.replace('myeditortras');
	            </script>
	            <script type="text/javascript">
                      CKEDITOR.replace('myeditortras',{
	                      width: "700px",
                          height: "400px"
                          }
                        );
                  </script>   
               <?php echo '<input type="hidden" name="cpf" value='.$cpf.'>'; ?>
                            
		       <input type="submit" name="vermodelo" value="Ver Modelo" style="background-color:sky;float:right;width:10%;height:30px;">
         </form>
         <form name="salvarcertif" action=" <?php  echo Util::setLink(array('page=acesso/salvamodelo')); ?>" enctype="multipart/form-data" method="post">
               <input type="submit" name="salvamodelo" value="Salvar Modelo" style="background-color:sky;float:right;width:10%;height:30px;">
         </form>
</body>
</html>
	
	
