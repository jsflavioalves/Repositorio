<?php
defined('EXEC') or die();	

$codigo = @$_GET['codigo'];

$sql = "select tm.*, ntdm.* from nuteds.tb_dados_municipio as ntdm
inner join integracao.tb_municipio as tm on(ntdm.cd_municipio=tm.codigo)
where ntdm.cd_municipio = $codigo";
$query = query($sql);
$row = $query->fetch();


$sqlPontos = 'select * from nuteds.tb_pontos_telessaude where cd_dados_municipio = '.$codigo;
$queryPontos = query($sqlPontos);


?>
			<div class="row">
  				<div class="col-md-6">
					<h3 class="nuteds-title"><?php echo $row['nome']; ?> </h3>
				</div>
				<div class="col-md-6">
					<a href="index.php?page=edit&codigo=<?php echo $row['codigo']; ?>" class="btn btn-primary pull-right">Editar Dados</a><br><br>
				</div>
			</div>

			<div class="row">
			
				<div class="col-md-6">
					<div class="col-md-3">
						CRES<br>
						<?php echo @$row['nr_cres']; ?>
					</div>
					<div class="col-md-3">
						População<br>
						<?php echo @$row['nm_populacao']; ?>
					</div>
				</div>		
				<div class="col-md-6">
					<div class="col-md-12">
						Site<br>
						<a href="<?php echo @$row['nm_site']; ?>" target="_blank"><?php echo @$row['nm_site']; ?></a>
					</div>					
				</div>
			</div>

			<hr>
			<div class="row">
				<div class="col-md-6">
					<b>Prefeitura</b>
					<div class="col-md-12">
						<div class="col-md-3">Prefeito(a)</div>
						<div class="col-md-9"><?php echo @$row['nm_pr_nome']; ?></div>
					</div>
					<div class="col-md-12">
						<div class="col-md-3">E-mail</div>
						<div class="col-md-9"><?php echo @$row['nm_pr_email']; ?></div>
					</div>
					<div class="col-md-12">
						<div class="col-md-3">Telefones</div>
						<div class="col-md-9"><?php echo @$row['nm_pr_fone']; ?></div>
					</div>
					<div class="col-md-12">
						<div class="col-md-3">Endereço</div>
						<div class="col-md-9"><?php echo @$row['nm_pr_endereco']; ?></div>
					</div>
				</div>
				<div class="col-md-6">
					<b>Secretaria de Saúde</b>
					<div class="col-md-12">
						<div class="col-md-3">Secretário(a)</div>
						<div class="col-md-9"><?php echo @$row['nm_se_nome']; ?></div>
					</div>
					<div class="col-md-12">
						<div class="col-md-3">E-mail</div>
						<div class="col-md-9"><?php echo @$row['nm_se_email']; ?></div>
					</div>
					<div class="col-md-12">
						<div class="col-md-3">Telefones</div>
						<div class="col-md-9"><?php echo @$row['nm_se_fone']; ?></div>
					</div>
					<div class="col-md-12">
						<div class="col-md-3">Endereço</div>
						<div class="col-md-9"><?php echo @$row['nm_se_endereco']; ?></div>
					</div>
				</div>
			</div>
			
			<hr>

			<div class="row">
				<div class="col-md-2">
					Programa Mais Médicos<br>
					<?php echo @$row['nr_mais_medicos']; ?>
				</div>
				<div class="col-md-2">
					Equipes da Saúde da Família<br>
					<?php echo @$row['nr_equipe_saude']; ?>
				</div>
				<div class="col-md-2">
					Número de NASF<br>
					<?php echo @$row['nr_nasf']; ?>
				</div>
				<div class="col-md-2">
					Tipo NASF<br>
					<?php echo @$row['nr_nasf_tipo']; ?>
				</div>
				<div class="col-md-2">
					SAD?<br>
					<?php if(@$row['fl_sad']){ echo (@$row['fl_sad'] == 't' ? 'Sim' : 'Não'); } ?>					
				</div>
			</div>

			<hr>

			<div class="row">				
				<div class="col-md-3">
					Cardiologista?<br>
					<?php if(@$row['fl_cardio']){ echo (@$row['fl_cardio'] == 't' ? 'Sim' : 'Não'); } ?>					
				</div>
				<div class="col-md-3">
					Cardiologista visita? <small>Frequancia dias</small><br>
					<?php echo @$row['nr_cardio_visita']; ?>
				</div>
				<div class="col-md-3">
					Eletrocardiógrafo Digital?<br>
					<?php if(@$row['fl_eletro_digital']){ echo (@$row['fl_eletro_digital'] == 't' ? 'Sim' : 'Não'); } ?>								
				</div>
				<div class="col-md-3">
					Modelo Eletrocardiógrafo<br>
					<?php echo @$row['nm_eletro_modelo']; ?>
				</div>
			</div>

			<hr>
			
			<div class="row">
				<div class="col-md-6">
					Especialidades no município<br>
					<div style="margin-top:7px;">
						<?php echo (@$row['fl_esp_1'] == 't' ? 'CARDIOLOGISTA' : ''); ?>
						<?php echo (@$row['fl_esp_9'] == 't' ? ', CIRURGIA DE CABEÇA E PESCOÇO' : ''); ?>
						<?php echo (@$row['fl_esp_2'] == 't' ? ', DERMATOLOGISTA' : ''); ?>
						<?php echo (@$row['fl_esp_10'] == 't' ? ', ENDOCRINOLOGISTA' : ''); ?>
						<?php echo (@$row['fl_esp_8'] == 't' ? ', GINECOLOGIA-OBSTETRICIA' : ''); ?>
						<?php echo (@$row['fl_esp_12'] == 't' ? ', HEMATOLOGIA E HEMOTERAPIA' : ''); ?>
						<?php echo (@$row['fl_esp_11'] == 't' ? ', INFECTOLOGISTA' : ''); ?>
						<?php echo (@$row['fl_esp_3'] == 't' ? ', PEDIATRA' : ''); ?>						
					</div>
				</div>
				<div class="col-md-6">
					Realiza exames de imagem?<br>
					<div style="margin-top:7px;">
						<?php if(@$row['fl_exame_imagem']){ echo (@$row['fl_exame_imagem'] == 't' ? 'Sim' : 'Não'); } ?>						
					</div>					
					<div style="margin-top:7px;">
						<?php echo (@$row['fl_exame_imagem_1'] == 't' ? 'ULTRASSOM' : ''); ?>
						<?php echo (@$row['fl_exame_imagem_2'] == 't' ? ', RADIOGRAFIA' : ''); ?>
						<?php echo (@$row['fl_exame_imagem_3'] == 't' ? ', TOMOGRAFIA' : ''); ?>
						<?php echo (@$row['fl_exame_imagem_4'] == 't' ? ', RESSONÂNCIA MAGNÉTICA' : ''); ?>
						<?php echo (@$row['fl_exame_imagem_5'] == 't' ? ', MAMOGRAFIA' : ''); ?>
						<?php echo (@$row['fl_exame_imagem_6'] == 't' ? ', DENSITOMETRIA ÓSSEA' : ''); ?>
					</div>
				</div>
			</div>

		</form>

		<br>
		<hr>

		<div class="row">
			<div class="col-md-6">
				<h3 class="nuteds-title">Pontos Telessaúde </h3>				
			</div>
			<div class="col-md-6">
				<a href="index.php?page=novo_ponto&codigo=<?php echo $row['codigo']; ?>" class="btn btn-primary pull-right">Novo</a><br><br>
			</div>
		</div>

<div class="table-responsive btMarginRight">
				<table class="table table-hover table-bordered">
					<thead>
						<tr class="btn-info">
							<th>Tipo</th>
							<th>Nome</th>
							<th>Telefone</th>
							<th>CNES</th>
							<td></td>							
						</tr>
					</thead>
					<tbody>
						<?php 
						$tipo[1] = 'Unidade Básica de Saúde';
						$tipo[2] = 'Hospital';
						$tipo[3] = 'Secretaria de Saúde';						
						while($row = $queryPontos->fetch()){
						?>
						<tr>
							<td><?php echo $tipo[$row['tp_tipo']]; ?></td>
							<td><?php echo $row['nm_nome']; ?></td>
							<td><?php echo $row['nm_fone']; ?></td>
							<td><?php echo $row['nr_cnes']; ?></td>
							<td class="text-center">
								<a href="javascript:void(0);" onclick="window.location='<?php echo 'index.php?page=edit_ponto&id='.$row['id']; ?>';">
									<span class="fa fa-edit"></span>
								</a>
							</td>
						</tr>
						<?php
						}
						?>
					</tbody>
				</table>
				</div>
