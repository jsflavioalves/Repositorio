<?php
/*
// Incluir aquivo de conexão
include("../../../conn.php");
 mysql_select_db('estagios');
// Recebe o valor enviado
$valor = $_GET['valor'];
 
// Procura titulos no banco relacionados ao valor
$sql = mysql_query("SELECT * FROM alunos WHERE nome LIKE '%$valor%'");

$resulatdo = mysql_num_rows($sql);


 
// Exibe todos os valores encontrados
if($resulatdo != 0){
$noticias = @mysql_fetch_object($sql);

$sql1 = mysql_query("SELECT * FROM termo_compromisso WHERE id_aluno LIKE '$noticias->matricula'");

 while($noticias1 = @mysql_fetch_object($sql1)){

$resulatdo1 = mysql_num_rows($sql1);

  echo utf8_decode('<br><a onclick="siim()" id="nome"><div class="alert alert-success">' . @$noticias->nome . ' - '.$noticias1->dt_inicio.' - '.$noticias1->dt_fim.'</div></a>');

  echo '<div id="dasinp" onclick="siim();" style="display:none">';
  echo utf8_decode(
    
  ' <div class="form-group">
           <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user-plus"></i>
                  </div>
                  <input type="text" id="inputName" onclick="btn();" class="form-control" name="nm_agente" value="'.$noticias->nome.'" placeholder="Nome do Aluno" disabled>
                </div>
    </div>

    

     

       <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  
                  <input type="text" id="inputName" onclick="btn();" class="form-control" value="'.$noticias->cpf.'" placeholder="cpf" disabled>
                </div>
        </div>

         

         

       <div class="form-group" id="mostrar_div1" style="display:none;">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  
                  <input type="text" id="inputName"  onclick="btn();" class="form-control" value="'.$noticias->email.'" placeholder="email" disabled>
                </div>
        </div>

      

       

         <div class="form-group" id="mostrar_div2" style="display:none;">

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-exclamation-triangle"></i>
                  </div>
                  <input type="text" id="inputName" onclick="btn();" class="form-control" name="obs" value="'.$noticias->matricula.'"  placeholder="Nº matricula" disabled>
                </div>
        </div>

        


         

        <div class="form-group" id="mostrar_div3" style="display:none;">

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-exclamation-triangle"></i>
                  </div>
                  <input type="text" id="inputName" onclick="btn();" class="form-control" name="obs" value="'.$noticias->curso.'"  placeholder="Curso" disabled>
                </div>
        </div>
        <div class="form-group" >

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-exclamation-triangle"></i>
                  </div>
                  <input type="text" id="inputName" onclick="btn();" class="form-control" name="obs" value="'.$noticias1->dt_inicio.' - '.$noticias1->dt_inicio.'"  placeholder="Curso" disabled>
                </div>
        </div>
        <div class="form-group" ">

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-exclamation-triangle"></i>
                  </div>
                  <input type="textarea" id="inputName" onclick="btn();" class="form-control" name="obs" value="'.$noticias1->obs.'"  placeholder="NENHUMA OBSERVAÇÂO" disabled >
                </div>
        </div>

            <input type="hidden" name="cd_aluno" value="'.$noticias->id_aluno.'"/>
            ' );}}

if ($resulatdo == 0) {
    echo utf8_decode('<option>NENHUM RESULTADO ENCONTRADO!</option>');
  } 



// Acentuação
@header("Content-Type: text/html; charset=ISO-8859-1",true);*/
?>