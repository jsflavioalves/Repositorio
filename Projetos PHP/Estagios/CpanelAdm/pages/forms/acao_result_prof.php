<?php
// Incluir aquivo de conexão
include("../../../conn.php");
mysql_select_db('estagios');
// Recebe o valor enviado
$valor = utf8_decode($_GET['valor']);
 
// Procura titulos no banco relacionados ao valor
$sql = mysql_query("SELECT * FROM professor_orientador WHERE nome LIKE '%$valor%' OR siape LIKE '%$valor%' LIMIT 7");

$resulatdo = mysql_num_rows($sql);

// Exibe todos os valores encontrados
if($resulatdo != 0){

  echo '<div class="box-body table-responsive no-padding" style="display: block;" onclick="divConv_and();">
              <table class="table table-hover">
                <tr>
                  <th>Id_Professor</th>
                  <th>Nome</th>
                  <th>Siape</th>
                  <th>Telefone</th>
                  <th>Email</th>
                  <th>Lotação</th>
                  <th>Cpf</th>
                </tr>';
                
                while ($noticias = mysql_fetch_array($sql)) {
                  echo utf8_encode('<tr>
                          <td>'.$noticias['id_professor'].'</td>
                          <td>'.$noticias['nome'].'</td>
                          <td>'.$noticias['siape'].'</td>
                          <td>'.$noticias['fone'].'</td>
                          <td>'.$noticias['email'].'</td>
                          <td>'.$noticias['lotacao'].'</td>
                          <td>'.$noticias['cpf'].'</td>
                        </tr>');
                }
  echo '</div>';
}
if ($resulatdo == 0) {
    echo '  <div class="box-body table-responsive no-padding" style="margin-left:20px;" >
                <table class="table table-hover">
                   <div class="form-group">
                     <div class="note2 note-danger2"><h4 class="box-heading2"><Strong><font color="red">AVISO! </font></Strong></h4>
                     <p><font color="red">NENHUM RESULTADO ENCONTRADO.</font></p>
                     </div>
                   </div>
                </table>
              </div>';
            }




// Acentuação
?>