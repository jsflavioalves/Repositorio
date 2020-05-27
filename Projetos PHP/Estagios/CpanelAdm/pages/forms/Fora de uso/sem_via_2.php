 <?php
require('../../../conn.php');
mysql_select_db('estagios');
if(isset($_POST['semviabtn'])){

$dt_inicio = $_POST['ano'];
$busca = mysql_query("SELECT * FROM termo_compromisso WHERE SUBSTRING(dt_inicio, 7, 4) = '$dt_inicio' AND obs = 'FALTA VIA UFC'");
while($array = mysql_fetch_array($busca)){
  echo $id_termo_compromisso = $array['id_termo_compromisso']." ";
  echo $cd_tcc = $array['cd_tcc']." ";
  echo $id_curso = $array['id_curso']." ";
  echo $matricula = $array['matricula_aluno']." ";
  echo $valor = $array['valor']." ";
  echo $nome = $array['nome']." ";
  echo $id_setor = $array['id_setor']." ";
  echo $dt_inicio = $array['dt_inicio']." ";
  echo $dt_fim = $array['dt_fim']." ";
  echo $rescisao = $array['rescisao']." ";
  echo $agente = $array['agente']." ";
  echo $tipo_termo = $array['tipo_termo']." ";
  echo $carga_horaria = $array['carga_horaria']." ";
  echo $hora_inicio = $array['hora_inicio']." ";
  echo $hora_fim = $array['hora_fim']." ";
  echo $variavel = $array['variavel']." ";
  echo $classificacao_termo = $array['classificacao_termo']." ";
  echo $relatorio = $array['relatorio']." ";
  echo $data_relatorio_1 = $array['data_relatorio_1']." ";
  echo $data_relatorio_2 = $array['data_relatorio_2']." ";
  echo $data_relatorio_3 = $array['data_relatorio_4']." ";
  echo $data_relatorio_4 = $array['data_relatorio_4']." ";
  echo $prof_orientador = $array['prof_orientador']." ";
  echo $siape = $array['siape']." ";
  echo $arquivo = $array['arquivo']." ";
  echo $obs = $array['obs']." ";
  echo $status = $array['status']."<br><br>";

  }
}

?>