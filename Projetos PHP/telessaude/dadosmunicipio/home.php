<?php
defined('EXEC') or die();	

$sql1 = 'select count(*) from nuteds.tb_dados_municipio';
$query1 = query($sql1);
$row1 = $query1->fetch();

$sql2 = 'select count(*) from nuteds.tb_dados_municipio
where nr_cres is not null and
nm_populacao is not null and
nm_site is not null and
nm_pr_nome is not null and
nm_pr_email is not null and
nm_pr_fone is not null and
nm_pr_endereco is not null and
nm_se_nome is not null and
nm_se_email is not null and
nm_se_fone is not null and
nm_se_endereco is not null and 
nr_mais_medicos is not null and
nr_equipe_saude is not null and
nr_nasf is not null and
nr_nasf_tipo is not null and
fl_sad is not null and
fl_cardio is not null and
nr_cardio_visita is not null and
fl_eletro_digital is not null and	
fl_exame_imagem is not null';
$query2 = query($sql2);
$row2 = $query2->fetch();

$sql3 = 'select count(*) from nuteds.tb_pontos_telessaude';
$query3 = query($sql3);
$row3 = $query3->fetch();


$num1 = $row1['count'];
$num2 = $row2['count'];
$num3 = $row3['count'];

$sqlExtra1 = 'select tm.uf, count(*) from nuteds.tb_dados_municipio as ntdm
inner join integracao.tb_municipio as tm on(ntdm.cd_municipio=tm.codigo)
group by 1
order by 1';
$queryExtra1 = query($sqlExtra1);




?>
<div class="row">
  <div class="col-lg-12">
	<h3 class="nuteds-title">Dashboard <small>Todos os Estados</small></h3>
	<a href="index.php?page=novo" class="btn btn-primary">Novo Município</a><br><br>
	
	<div class="row">
	  
		
		<div class="col-md-4 col-sm-4">
		<div class="panel panel-info">
		  <div class="panel-heading">
				<div class="row">
					<div class="col-xs-6">
						<i class="fa fa-database fa-5x"></i>
					</div>
					<div class="col-xs-6 text-right">
						<p style="font-size:3.5em;"><?php echo $num1; ?></p>
					</div>
				</div>
		  </div>
		  <div class="panel-footer text-center">
			<h4>MUNICÍPIOS</h4>
			<div class="table-responsive btMarginRight">
				<table class="table">
					<tbody>
					<?php 
						while($row = $queryExtra1->fetch()){
							echo '<tr>
							<td>'.$row['uf'].'</td>
							<td>'.$row['count'].'</td>
						</tr>';
						}
					?>
					</tbody>
				</table>
			</div>
		  </div>
		</div>
	  </div>

		<div class="col-md-4 col-sm-4">
		<div class="panel panel-success">
		  <div class="panel-heading">
				<div class="row">
					<div class="col-xs-6">
						<i class="fa fa-check-circle fa-5x"></i>
					</div>
					<div class="col-xs-6 text-right">
						<p style="font-size:3.5em;"><?php echo $num2; ?></p>
					</div>
				</div>
		  </div>
		  <div class="panel-footer text-center">
			<h4>MUNICÍPIOS 100%</h4>
			<small>Com todos os dados preenchidos!</small>
		  </div>
		</div>
	  </div>	



	  <div class="col-md-4 col-sm-4">
		<div class="panel panel-info">
		  <div class="panel-heading">
				<div class="row">
					<div class="col-xs-6">
						<i class="fa fa-ambulance fa-5x"></i>
					</div>
					<div class="col-xs-6 text-right">
						<p style="font-size:3.5em;"><?php echo $num3; ?></p>
					</div>
				</div>
		  </div>
		  <div class="panel-footer text-center">
			<h4>PONTOS TELESSAÚDE</h4><small>Todos os pontos de telessaúde</small>
		  </div>
		</div>
	  </div>



	  


	</div>
	<br>
	<div align="center"><img src="assets/logo_nuteds.png"/></div>
  </div>
</div>