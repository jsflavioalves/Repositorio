<?php
defined('EXEC') or die();
$limitPagina = 20;
$where = '';
$search = false;
if(@$_POST['search1']){
	$term = addslashes($_POST['search1']);
	$where .=  "and nm_paciente ilike '%{$term}%' ";
	$search = true;
}
if(@$_POST['search2']){
	$term = addslashes($_POST['search2']);
	$where .=  "and nr_codigo ilike '%{$term}%' ";
	$search = true;
}
if(@$_POST['search3']){
	$term = addslashes($_POST['search3']);
	$where .= "and fl_sexo = {$term} ";
	$search = true;
}
	
if($search){
	$sql = "select 	tp.ci_paciente,
		tp.nm_paciente,
		tp.nr_cpf,
		tp.nr_codigo,
		tp.nr_cep,
		tl.sg_estado,
		tl.ds_localidade,
		tp.fl_sexo,
		to_char(tp.dt_nascimento, 'dd/mm/yyyy') as dt_nascimento
	from tb_paciente tp
	inner join tb_localidade tl on(tp.cd_localidade=tl.ci_localidade)
	where 1=1 $where
	order by tp.nm_paciente asc
	limit {$limitPagina} offset ".(($p - 1) * $limitPagina);
	$query = query($sql);
	$sqlNum = "select count(*) as num from tb_paciente where 1=1 $where";
	$rowNum = query($sqlNum)->fetch();
	$registros = $rowNum['num'];	
}

?>

	<div class="row bgGrey">
		<img src="assets/paciente.png"/>
		<span class="actiontitle">Pacientes</span>
		<span class="actionview"> - Pesquisa</span>		
	</div>
	
	<!-- FORMULÁRIO DE PESQUISA -->
	
	<?php if(@$_POST['search'] && (!@$_POST['search1'] && !@$_POST['search2'] && !@$_POST['search3'])) { ?>
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<div class="alert alert-warning">
					<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
					<p>Preencha um dos campos abaixo para pesquisa!</p>
				</div>
			</div>
		</div>
	<?php } ?>

	<form action="<?php echo Util::setLink(array('p=null')); ?>" method="post">
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3">
				<div class="col-lg-9">
					<label>Nome Completo:</label>
					<input type="text" class="form-control" id="search1" name="search1" placeholder="Digite o nome do paciente" value="<?php echo @$_POST['search1']; ?>">
				</div>
				<div class="col-lg-3">
					<label>Sexo:</label>
					<select id="search3" name="search3" class="form-control">
							<option value="0">...</option>
							<option value="1" <?php echo (@$_POST['search3'] == 1 ? 'selected="selected"' : ''); ?>>Masculino</option>
							<option value="2" <?php echo (@$_POST['search3'] == 2 ? 'selected="selected"' : ''); ?>>Feminino</option>
					</select>					
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3">
				<div class="col-lg-9">					
					<label>CNS:</label>
					<div class="input-group">
					<input type="tel" id="search2" name="search2" value="<?php echo @$rowEdit['search2']; ?>" placeholder="Número do CNS" maxlength="15" class="form-control input-mask-numbers"/>
					<span class="input-group-addon" data-toggle="modal" data-target="#modalCNS"><a href="#"><span class="glyphicon glyphicon-question-sign"></span></a></span>
					</div>
				</div>
				<div class="col-lg-3">
					<br/>
					<button type="submit" name="search" value="1" class="btn btn-info"><span class="glyphicon glyphicon-zoom-in"></span> Pesquisar</button>
				</div>
			</div>
		</div>
	</form>

	<br>	
	
	<?php if($search){ ?>
	
		<div class="row">
			
			<div class="table-responsive btMarginRight">		
				
				<?php if($auth->isOn('paciente_cad_facil')){ ?>

					<!-- PACIENTE CADASTRO FÁCIL -->
					<table class="table table-hover table-bordered">
						<thead>
							<tr class="btn-info">
								<th>Nome Completo</th>
								<th>CNS</th>
								<th>Município</th>
								<th>Sexo</th>
								<td></td>							
							</tr>
						</thead>
						<tbody>
							<?php 
							$fl_sexo[1] = 'M';
							$fl_sexo[2] = 'F';
							while($row = $query->fetch()){
							?>
							<tr onclick="<?php echo "paciente_select('".$row['ci_paciente']."', '".$row['nm_paciente']."', '".$row['nr_codigo']."');"; ?>" style="cursor:pointer;">
								<td><?php echo $row['nm_paciente']; ?></td>
								<td><?php echo $row['nr_codigo']; ?></td>
								<td><?php echo $row['sg_estado'].' - '.$row['ds_localidade']; ?></td>
								<td class="text-center"><?php echo $fl_sexo[$row['fl_sexo']]; ?></td>
								<td class="text-center">
									<a href="javascript:void(0);">
										<span class="glyphicon glyphicon-ok"></span>
									</a>
								</td>
							</tr>
							<?php
							}
							?>
						</tbody>
					</table>
					
				<?php } else{ ?>
				
					<!-- PACIENTE CADASTRO NORMAL -->
					<table class="table table-hover">
						<thead>
							<tr class="btn-info">
								<th>Nome Completo</th>
								<th>CNS</th>
								<th>Município</th>
								<th>CEP</th>
								<th>Nascimento</th>
								<th>Sexo</th>
								<td></td>							
							</tr>
						</thead>
						<tbody>
							<?php 
							$fl_sexo[1] = 'M';
							$fl_sexo[2] = 'F';
							while($row = $query->fetch()){
							?>
							<tr onclick="<?php echo "paciente_select('".$row['ci_paciente']."', '".$row['nm_paciente']."', '".$row['nr_codigo']."');"; ?>" style="cursor:pointer;">
								<td><?php echo $row['nm_paciente']; ?></td>
								<td><?php echo $row['nr_codigo']; ?></td>
								<td><?php echo $row['sg_estado'].' - '.$row['ds_localidade']; ?></td>
								<td><?php echo $row['nr_cep']; ?></td>
								<td><?php echo $row['dt_nascimento']; ?></td>
								<td class="text-center"><?php echo $fl_sexo[$row['fl_sexo']]; ?></td>
								<td class="text-center">
									<a href="javascript:void(0);">
										<span class="glyphicon glyphicon-ok"></span>
									</a>
								</td>
							</tr>
							<?php
							}
							?>
						</tbody>
					</table>			
				<?php } ?>
				
			</div>				
			<p><i>* Caso não encontre o paciente, refaça a pesquisa.</i></p>
		</div>	
	<?php } ?>

<div id="modalCNS" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Cadastro Nacional do SUS</h4>
			</div>
			<br>
			<img src="assets/cns_exemplo.jpg" alt="" class="img-responsive img-rounded marginCenter">      
			<br>
		</div>
	</div>
</div>
<script type="text/javascript">
function paciente_select(ci_paciente, nm_paciente, nr_codigo){
	parent.paciente_select(ci_paciente, nm_paciente, nr_codigo);
}
</script>