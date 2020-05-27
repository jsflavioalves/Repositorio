<?php
defined('EXEC') or die();
$transacao = 'importaCSV';
$ufDefault = 'CE';

if($auth->isRead($transacao) && !$auth->isAdmin()){
	Util::info(Config::AUTH_MESSAGE);
	return true;
}

?>
  
	<!-- FAZ UPLOAD DO ARQUIVO -->
	<?php  
	function getCSV($name) {
	   
	    $file = fopen($name, "r");
	    $result = array();
	    $i = 0;
	    while (!feof($file)):
	    if (substr(($result[$i] = fgets($file)), 0, 10) !== ';;;;;;;;') :
	    $i++;
	    endif;
	    endwhile;
	    $_SESSION['nrolinhas']=$i-1;
	    fclose($file);
	    return $result;
	}
	
	function getLine($array, $index) {
	    return explode(';', $array[$index]);
	}
	
	
	$arquivo = $_FILES['pdf']['name'];
	$_SESSION['pdf']=$arquivo;
	$tmpName =$_FILES['pdf']['tmp_name'];
	

	if ($_FILES['pdf']['name'] != "") {
	    $pasta = './csv/';
	     move_uploaded_file($_FILES['pdf']['tmp_name'], $pasta . $arquivo);
	 	}

	 	//Importando a classe de SQL
	 	Loader::import('com.atitudeweb.SQL');
	    
	 	$arq = fopen($pasta.$arquivo,'r');// le o arquivo csv
	 	$ll=0;
	 	$aprov=0;
	 	while(!feof($arq))
	 	    for($i=0; $i<1; $i++){
	 	        if ($conteudo = fgets($arq)){//se extrair uma linha e não for false
	 	            $ll++; // $ll recebe mais 1 ==== em quanto o existir linha sera somada aqui
	 	            $linha = explode(';', $conteudo);// divide por coluna onde tiver ponto e virgula
	 	        }
	 	        
	 	        if(!feof($arq)) {
	 	     	 	            
	 	            $id_curso = $linha[0];
	 	            $nr_tipo=intval($linha[1]);
	 	            $nm_aluno=$linha[2];
	 	            $nr_codigo_sus=$linha[3];
	 	            $nr_cpf=$linha[4];
	 	            $nr_cns=$linha[5];
	 	            $nr_cnes=$linha[6];
	 	            $nr_cbo=$linha[7];
	 	            $ds_email=$linha[8];
	 	            $fl_sexo=intval($linha[9]);
	 	            $cd_localidade=intval($linha[10]);
	 	            $cd_profissao=intval($linha[11]);
	 	            $dt_nascimento=$linha[12];
	 	            $ds_escolaridade=$linha[13];
	 	            $ds_numero=$linha[14];
	 	            $ds_telefone1=$linha[15];
	 	            $ds_telefone2=$linha[16];
	 	            $aprov=$linha[17];
	 	          
	 	   //         echo $linha[0].$linha[1].$linha[2].$linha[3].$linha[4].$linha[5].$linha[6].$linha[7].$linha[8].$linha[9].$linha[10].$linha[11].$linha[12].$linha[13].$linha[14].$linha[15].$linha[16].'</br>';
	 	            
	 	            if($ll!=1){
	 	               $buscasql = "SELECT * FROM tb_aluno_temp WHERE nr_cpf='".$nr_cpf."' and id_curso='".$id_curso."'";
	 	               $resultbusca = query($buscasql);
	 	               $consulta = $resultbusca -> fetch();
	 	          //     echo "aprovados".$aprov."</br>";
	 	               if($consulta['id_curso']==''){
	 	               $sql = "INSERT INTO tb_aluno_temp (id_curso, nr_tipo,nm_aluno,nr_codigo_sus,nr_cpf,nr_cns,nr_cnes,nr_cbo,ds_email,fl_sexo,cd_localidade,cd_profissao,dt_nascimento,ds_escolaridade,ds_numero,ds_telefone1,ds_telefone2) VALUES ('$id_curso', $nr_tipo,'$nm_aluno','$nr_codigo_sus','$nr_cpf','$nr_cns','$nr_cnes','$nr_cbo','$ds_email',$fl_sexo,$cd_localidade,$cd_profissao,'$dt_nascimento','$ds_escolaridade','$ds_numero','$ds_telefone1','$ds_telefone2')";
	 	               $result = query($sql);
	 	               if($aprov!=0){
	 	                   $buscasql2 = "SELECT * FROM tb_aluno_aprov WHERE nr_cpf='".$nr_cpf."' and id_curso='".$id_curso."'";
	 	                   $resultbusca2 = query($buscasql2);
	 	                   $consulta2 = $resultbusca2 -> fetch();
	 	                   /** só insere aluno aprovado se não existir na tabela de alunos aprovados **/
	 	                   if($consulta2['nr_cpf']==''){
	 	                   $sql2 = "INSERT INTO tb_aluno_aprov (id_curso, nr_cpf,aprov) VALUES ('$id_curso', '$nr_cpf','1')";
	 	                   $result = query($sql2);}
	 	                   }
	 	               }
	 	            }}
	 	        $aprov=0;
	 	        $linha = array();// linpa o array de $linha e volta para o for
	 	}
	 	echo "quantidade de linhas importadas = ".$ll.'</br>';
	    
		
	echo "Upload realizado com sucesso! ";
	echo '<form>
	    <input type="button" style="background-color:ruby" value="Voltar" onClick="JavaScript: window.history.back();">
	    </form>';
	
	
	
	?>
										
	
	
	
