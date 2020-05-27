<?php
defined('EXEC') or die();
$transacao = 'geracertificado';
$ufDefault = 'CE';

if($auth->isRead($transacao) && !$auth->isAdmin()){
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
  
	<!-- FORMULÃ�RIO ACESSA CERTIFICADOS -->
	<?php if(!isset($_GET['form'])){ ?>	
			
	<!--  <form action="<?php //echo Util::setLink(array('p=null')); ?>" onsubmit="javascript: abreResposta(this)" method="post"> --> 
	<!--  <form action="modules/acesso/geracertificado.php" onsubmit="javascript: abreResposta(this)" method="post"> --> 
	<form action=" <?php  echo Util::setLink(array('page=acesso/impcertificado')); ?>" onsubmit="javascript: abreResposta(this)" method="post">  
				<div class="row">
				<div class="col-md-12">
					<div class="col-md-6">
						<label>Usuário:</label>
						<?php // $user = $auth->getLogin();
						$sqlProcCPF = 'SELECT ci_usuario,nm_login FROM tb_usuario WHERE ci_usuario ='. $user['ci_usuario'];
						$query1 = query($sqlProcCPF);
						$row1 = $query1->fetch();
						$cpf = $row1['nm_login'];
						$nome_usuario = $user['nm_usuario'];
						echo $user['ci_usuario'] . " - " . $nome_usuario ." - CPF:".$cpf ."</br>"."</br>" ;
					//	echo "      Busca:"."</br>"."</br>";
				//		$sqlCursosRealizados = 'select id_curso, ds_codigo, ds_descricao,dt_inicio,dt_fim,nr_ch,nr_cpf from tb_curso INNER JOIN tb_aluno ON tb_curso.ds_codigo = tb_aluno.id_curso';
						$sqlCursosRealizados = 'select id_curso, ds_codigo, ds_descricao,dt_inicio,dt_fim,nr_ch,nr_cpf from tb_curso INNER JOIN tb_aluno_aprov ON tb_curso.ds_codigo = tb_aluno_aprov.id_curso';
						$sqlCursosRealizados = $sqlCursosRealizados . " WHERE nr_cpf ='". $cpf. "'";
						$query = query($sqlCursosRealizados); ?>
						
						  <?php 
						  
						  echo '<input type="hidden" size=100 name="nm_usuario" value='.$nome_usuario.'>'; 
						  $row = $query -> fetch();
						  
						  if($row['ds_codigo'] == '')echo "<b>"."N&#227;o h&#225; certificados para imprimir para este aluno. Verifique aprova&#231;&#227;o no curso."."</b>"."</br>";
						  /** s� mostro o select se tiver certificados **/
						  if ($row['ds_codigo'] != ''){
						  echo '<div class="form-group">
                               <label>Escolha o Curso:</label>
                                   <select class="form-control select2" style="width: 60%;" name="selcurso">';   
						                 while($row){ 
				                            $ds_codigo = $row['ds_codigo'];
				                            $ds_descricao = $row['ds_descricao'];
				                            echo '<option value="'.$ds_codigo.'">'.$ds_descricao.'</option>';
				                            $row = $query->fetch();
	                                    }  
                          echo  '     </select>
                          </div>
						  </br> ';
                    
						  echo '<input type="hidden" name="cpf" value='.$cpf.'>';
						  echo '<button type="submit" class="btn btn-primary" type="button" style="margin-left:10%;" class="btn btn-box-tool">Imprime Certificado</button>';} ?>
						   			
					</div>
				</div>
			</div>
		</form>

		<?php
				}
				?>
						
	
	
	
