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
						$sqlCursosRealizados = 'select id_curso, ds_codigo, ds_descricao,dt_inicio,dt_fim,nr_ch,nr_cpf from tb_curso INNER JOIN tb_aluno ON tb_curso.ds_codigo = tb_aluno.id_curso';
						$sqlCursosRealizados = $sqlCursosRealizados . " WHERE nr_cpf ='". $cpf. "'";
						$query = query($sqlCursosRealizados); ?>
						<table class="table" width="100%">
						  <thead>
						    <tr class="btn-info">
						      <th>Cursos realizados</th></td>
						    </tr>
						  </thead>
						  <tbody>
						  <?php 
						  
						  echo '<input type="hidden" size=100 name="nm_usuario" value='.$nome_usuario.'>'; ?>
						     <?php  
						     $listadecursos = array();
						     $i=1;
						     while($row = $query->fetch()){ ?>
						          <tr> 
						            <td> <?php  echo $row['ds_descricao'].'</br>'; ?>
						             </td>
	                                
	                                 <?php 
	                                 $listadecursos[$i] = $row['ds_codigo'];
	                                 	                                 
	                                 echo '<form action="';
						             echo Util::setLink(array('page=acesso/geracertificado')); 
						             echo '" onsubmit="javascript: abreResposta(this)" method="post">'; 
						             
						             echo '<input type="hidden" name="indice" value='.$i.'>';
						             echo utf8_encode('<input type="hidden" name="curso" value='.$listadecursos[$i].'>');
						             echo '<input type="hidden" name="cpf" value='.$cpf.'>';
						             echo '<input type="hidden" name="dtinicio" value='.$row['dt_inicio'].'>';
						             echo '<input type="hidden" name="dtfim" value='.$row['dt_fim'].'>';
						             echo '<input type="hidden" name="nrch" value='.$row['nr_ch'].'>';
						             echo '<td><button type="submit" class="btn btn-primary" type="button" style="margin-left:20%;" class="btn btn-box-tool">Certificado</button></td>';
						             echo '</form>';?>
						            						              
						             </tr>
						     <?php  $i=$i+1;} ?>
					      </tbody>
					    </table>  
					</div>
				</div>
			</div>
		</form>

		<?php
				}
				?>
						
	
	
	
