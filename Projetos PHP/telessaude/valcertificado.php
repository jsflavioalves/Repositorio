<?php
//defined('EXEC') or die();
//$transacao = 'validacertif';
//$ufDefault = 'CE';

//if(!$auth->isRead($transacao)){
//	Util::info(Config::AUTH_MESSAGE);
//   return true;
//}
// $conexaopg = pg_connect("host=172.18.0.8 port=5432 dbname=telessaude user=postgres password=vnoboru3nb1q2w3e");
$conexaopg = pg_connect("dbname=telessaude user=postgres password=vnoboru3nb1q2w3e");

//*** para evitar sql injection **/
$_POST['codvalida'] = preg_replace('/[^[:alnum:]_]/', '',$_POST['codvalida']);

$codvalida = $_POST['codvalida'];

$sql ='SELECT * FROM tb_certificados_imp WHERE "CodValidacao"='."'".$codvalida."'";
$result = pg_query($conexaopg,$sql);
//$result = query($sql);

/*** Verifica dados adicionais do curso para o certificado ***/
$sql2 ='select ds_codigo, ds_descricao,dt_inicio,dt_fim,nr_ch,cpf,nm_usuario from tb_curso INNER JOIN tb_certificados_imp ON tb_curso.ds_codigo = tb_certificados_imp.curso WHERE "CodValidacao"='."'".$codvalida."'";
$result2 = pg_query($conexaopg,$sql2);
//$result2 = query($sql2);
$campo2 = pg_fetch_array($result2);
//$campo2 = $result2 -> fetch();
$campo = pg_fetch_array($result);

// if($campo = pg_fetch_array($result)){
echo '<head>
    <style>
    input[type=button], input[type=submit], input[type=reset] {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 16px 32px;
        text-decoration: none;
        margin: 4px 2px;
        cursor: pointer;
    }
    </style>
    </head>';
echo "</br>"."</br>"."</br>"."</br>"."</br>"."</br>"."</br>";
if($campo['cpf']!=''){
    echo "<center>";
    echo "<font size=5>";
    echo "O aluno ". "<b>".$campo2['nm_usuario']."</b></br>";
    echo "Concluiu o curso de ". "<b>". $campo2['ds_descricao']."</b></br>";
    $dt_inicio = date("d/m/Y", strtotime($campo2['dt_inicio']));
    $dt_fim = date("d/m/Y", strtotime($campo2['dt_fim']));
    echo "De ". "<b>". $dt_inicio." a ". $dt_fim."</b></br>";
    echo "<b>"."Para imprimir o certificado, favor se logar."."</b>";
    echo "</font>";
    
}
else {  echo "<center>"; 
    echo "<font size=5>";
    echo "C&#243;digo de Valida&#231;&#227;o n&#227;o reconhecido. ";
    echo "</font>";}
    echo "</br>"."</br>";
	echo '<form>
	    <input type="button"  value="Fechar" onClick="JavaScript: window.close();">
	    </form>';
	// style="background-color:blue"
	echo "</center>";
?>
										
	
	
	
