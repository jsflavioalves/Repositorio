<?php

defined('EXEC') or die();
$transacao = 'atualizaaprov';
$ufDefault = 'CE';


if($auth->isRead($transacao) && !$auth->isAdmin()){
   Util::info(Config::AUTH_MESSAGE);
   return true;
 }
 
 /** armazenas todos os cpfs selecionados **/
 $opalunos = array();
 $cont=1;
 $curso = $_POST['cdcurso'];

 for($i=1;$i<=700;$i++){if(isset($_POST['opt'.$i])){$opalunos[$cont] = $_POST['opt'.$i];  $cont=$cont+1;}}
//Importando a classe de SQL
Loader::import('com.atitudeweb.SQL');

/** deleta todos os alunos que não estão marcados da tabela aprovados **/
$sqlDelAluno = "DELETE FROM tb_aluno_aprov WHERE id_curso='".$curso."'";
$consDelAluno = query($sqlDelAluno);
$deleta = $consDelAluno -> fetch();

for($i=1;$i<=$cont-1;$i++){
 /** insere só os alunos aprovados daquele curso **/   
    $sqlInsAluno = "INSERT INTO tb_aluno_aprov (id_curso,nr_cpf,aprov) VALUES('$curso','$opalunos[$i]','1')";
    $consInsAluno = query($sqlInsAluno);
    $insere = $consInsAluno -> fetch();
}
    
echo "Aprova&#231;&#245;es atualizadas com sucesso! ";
echo '<form>
	    <input type="button" style="background-color:ruby" value="Voltar" onClick="JavaScript: window.history.back();">
	    </form>';


?>