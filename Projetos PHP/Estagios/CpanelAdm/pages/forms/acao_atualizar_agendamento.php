<?php
// Incluir aquivo de conexão
include("../../../conn.php");
mysql_select_db('estagios');

// Recebe o valor enviado
session_start();
$id_agendamento = $_GET['valor'];

// Procura titulos no banco relacionados ao valor
$sql = mysql_query("SELECT * FROM agendamentos WHERE id_agendamento LIKE '$id_agendamento'");
$noticias = mysql_fetch_array($sql);
$resultado = mysql_num_rows($sql);


// Exibe todos os valores encontrados
if($resultado != 0){
	$nomealuno = utf8_encode($noticias['nome_aluno']);
    echo '
        <div class="alert alert-success" style="cursor:pointer; margin-top:5px;">Matrícula: '.$noticias['matricula_aluno'].' <br> Aluno: '.$nomealuno.' <br> Data: '.$noticias['data'].' <br> Hora: '.$noticias['hora'].'</div> <input class="btn btn-primary" type="submit" style="margin-top : -10px; margin-left: 60px;" value="ATUALIZAR"> ';     
      
}else if($resultado == 0) {
    echo '<div class="note2 note-danger2"><h4 class="box-heading2"><Strong><font color="red">Aviso! Nenhum resultado encontrado.</font></Strong></h4>       
          </div>';
  }

?>