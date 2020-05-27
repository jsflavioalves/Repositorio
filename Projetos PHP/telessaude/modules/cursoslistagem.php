<script javascript>
function guarda_aluno($cpf as string)
{
  var checkbox = document.getElementById('aprov');
  var alunos = array();
  if (checkbox.checked != true)
  {
    alunos[i]= $cpf;
  }
}
</script>
<?php
defined('EXEC') or die();
$transacao = 'cursos';

if(!$auth->isRead($transacao)){
	Util::info(Config::AUTH_MESSAGE);
	return true;
}

$codigo = (@$_GET['codigo'] ? $_GET['codigo'] : 0);
if(!$codigo) {
	echo '<div class="alert alert-error">Curso inexistente!</div>';
	return;
}
$type = (@$_GET['type'] ? $_GET['type'] : 0);
if(!$type) {
	echo '<div class="alert alert-error">Tipo inexistente!</div>';
	return;
}
$down = (@$_GET['down'] ? $_GET['down'] : 0);

$sql = "select * from tb_curso where ci_curso = '$codigo'";
$queryCurso = query($sql);
if($queryCurso->rowCount() < 1) {
	echo '<div class="alert alert-error">Curso inexistente!</div>';
	exit;
}
$curso = $queryCurso->fetch();


$descrInfo = 'Alunos Vinculados ao SUS';
if($type == 2)
	$descrInfo = 'Alunos sem v&iacute;nculo com o SUS';

$sql = "select ta.*, tl.*, tp.* from tb_aluno ta
inner join tb_localidade tl on(tl.ci_localidade=ta.cd_localidade)
inner join tb_profissao tp on(ta.cd_profissao=tp.ci_profissao)
where ta.nr_tipo = $type and ta.id_curso = '".$curso['ds_codigo']."'
order by ta.nm_aluno asc";
$query = query($sql);

if($down){
	
	$filename = $curso['ds_codigo'].'_SUS';
	if($type == 2)
		$filename = $curso['ds_codigo'].'_NORMAL';	
	
	$xls = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>Excel Document Name</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>';
	$columns = '';
	$lines = '';
	$isColumns = true;
	while($row = $query->fetch()) {		
		$lines .= '<tr>';		
		foreach($row as $key=>$value){						
			if($isColumns){			
				$columns .= '<th>'.$key.'</th>';
			}		
			$lines .= '<td>'.$value.'</td>';
		}		
		$lines .= '</tr>';
		$isColumns = false;
	}
	$xls .= '<tr>'.$columns.'</tr>'.$lines.'</table></body></html>';
	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	header('Content-Disposition: attachment; filename='.$filename.'.xls');
	header('Pragma: no-cache');
	echo $xls;
	exit;
}


?>
  <form action=" <?php  echo Util::setLink(array('page=atualizaaprov')); ?>" method="post"> 
		<h2><?php echo $curso['ds_descricao']; ?></h2>
		<h4><?php echo $curso['ds_codigo']; ?></h4>
		<p><?php echo $descrInfo; ?></p>
		<?php echo '<input type="hidden" name="cdcurso" value="'. $curso['ds_codigo'].'">'; ?>
		<a href="index.php?page=cursos&form=<?php echo $codigo; ?>" class="btn btn-info">Voltar</a>
		<a href="partial1.php?page=cursoslistagem&codigo=<?php echo $codigo; ?>&type=<?php echo $type; ?>&down=1" class="btn btn-info">Baixar XLS</a>
		<button type="submit" class="btn btn-primary" type="button" style="margin-left:10%;" class="btn btn-box-tool">Atualizar Aprovados</button>
	
		<br><br>
	
		<div class="row">
			<table class="table" width="100%">
				<thead>
					<tr class="btn-info">
					    <th>APROVADO</th>
						<th>ID</th>
						<th>CURSO</th>
						<th>ALUNO</th>
						<th>CPF</th>
						<th>CNS</th>
						<th>CNES</th>
						<th>CBO</th>
						<th>EMAIL</th>
						<td>SEXO</td>
						<td>UF</td>
						<td>MUNICÃ�PIO</td>
						<td>NASCIMENTO</td>
						<td>ESCOLARIDADE</td>
						<td>NÂº PROF.</td>
						<td>TELEFONE1</td>
						<td>TELEFONE2</td>
						<td>DATA</td>
					</tr>
				</thead>
				<tbody>
					<?php 
					$cont = 1;
					while($row = $query->fetch()){
					?>
					<tr>
					    <?php 
					    $marcado = '';
					    $sqlConsAluno = "SELECT * FROM tb_aluno_aprov WHERE id_curso='".$curso['ds_codigo']."' and nr_cpf='".$row['nr_cpf']."'";
					    $consAluno = query($sqlConsAluno);
					    $consulta = $consAluno -> fetch();
					    if($consulta['nr_cpf']!='')$marcado = 'checked';
					    echo utf8_encode('<td align="center"><input type="checkbox" name="opt'.$cont.'" value='.$row['nr_cpf'].' '. $marcado.'>');
                          $cont = $cont + 1;?>
						<td><?php echo $row['ci_aluno']; ?></td>
						<td><?php echo $row['id_curso']; ?></td>
						<td><?php echo $row['nm_aluno']; ?></td>
						<td><?php echo $row['nr_cpf']; ?></td>
						<td><?php echo $row['nr_cns']; ?></td>
						<td><?php echo $row['nr_cnes']; ?></td>
						<td><?php echo $row['nr_cbo']; ?></td>
						<td><?php echo $row['ds_email']; ?></td>
						<td><?php echo $row['fl_sexo']; ?></td>
						<td><?php echo $row['sg_estado']; ?></td>
						<td><?php echo $row['ds_localidade']; ?></td>						
						<td><?php echo $row['dt_nascimento']; ?></td>
						<td><?php echo $row['ds_escolaridade']; ?></td>
						<td><?php echo $row['ds_numero']; ?></td>
						<td><?php echo $row['ds_telefone1']; ?></td>
						<td><?php echo $row['ds_telefone2']; ?></td>						
						<td><?php echo $row['dt_data']; ?></td>						
					</tr>
					<?php
					}
					?>
				</tbody>
			</table>
		</div>
</form>	


<script type="text/javascript">
</script>