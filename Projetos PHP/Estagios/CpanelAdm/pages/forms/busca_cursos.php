<?php
// Incluir aquivo de conexão
/*include("../../../conn.php");
mysql_select_db('estagios');
 
// Recebe o valor enviado
$valor = $_GET['valor'];
 
// Procura titulos no banco relacionados ao valor
$sql = mysql_query("SELECT * FROM cursos WHERE curso LIKE '%$valor%'");

$resulatdo = mysql_num_rows($sql);


 
// Exibe todos os valores encontrados
if($resulatdo != 0){
  $noticias = @mysql_fetch_object($sql);

  echo utf8_encode(' <a onclick="mostrar()" id="nome_curso"><div class="alert alert-success" style="margin-top:10px;">' .@$noticias->curso. '</div></a>');

  echo utf8_encode('<div class="row" id="divAtualiza" onclick="mostrar()" style="display:none;">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Nome do Curso:</label>
                      <input type="text" name="nome_curso" class="form-control" value="'.$noticias->curso.'">
                      <input type="hidden" name="id_curso" class="form-control" value="'.$noticias->id_curso.'">
                    <!-- /.input group -->
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary pull-right">ATUALIZAR</button>
                  </div>
                </div>
              </div>');

  
}
if ($resulatdo == 0) {
    echo utf8_encode('<option>NENHUM RESULTADO ENCONTRADO!</option>');
  } 

// Acentuação
@header("Content-Type: text/html; charset=ISO-8859-1",true);
?>