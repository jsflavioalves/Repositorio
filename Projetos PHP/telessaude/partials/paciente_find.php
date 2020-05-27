<?php
require_once('../includes/frameworkajax.php');

$where = '';
if(@$_POST['paciente_search1']){
	$term = addslashes($_POST['paciente_search1']);
	$where .=  "and nm_paciente ilike '%{$term}%' ";
}
if(@$_POST['paciente_search2']){
	$term = addslashes($_POST['paciente_search2']);
	$where .=  "and nr_codigo ilike '%{$term}%' ";
}
if(@$_POST['paciente_search3']){
	$term = addslashes($_POST['paciente_search3']);
	$parts = explode('/', $term);
	$term = $parts[2].'-'.$parts[1].'-'.$parts[0];
	$where .=  "and dt_nascimento = '{$term}' ";
}
if(@$_POST['paciente_search4']){
	$term = addslashes($_POST['paciente_search4']);
	$where .= "and fl_sexo = '{$term}' ";
}

$sql = "select 	tp.ci_paciente,
	tp.nm_paciente,
	tp.nr_cpf,
	tp.nr_codigo,
	tp.nr_cep,
	tl.sg_estado,
	tl.ds_localidade,
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
$paginacao = Util::paginationAjax($registros, 'paciente_dialog', 'paciente_find');	
?>
<form id="paciente_dialog_form">
	<table border="0" cellpadding="2" cellspacing="2">			
		<tr>
			<td align="right">Nome Completo:</td>
			<td>
			<table border="0" cellpadding="0" cellspacing="0" width="560">
				<tr>
					<td width="300">
						<input type="text" name="paciente_search1" id="paciente_search1" value="<?php echo @$_POST['paciente_search1']; ?>" class="text ui-widget-content ui-corner-all" style="width:290px;" />
					</td>
					<td align="right">
						CNS:&nbsp;<input type="text" id="paciente_search2" name="paciente_search2" value="<?php echo @$_POST['paciente_search2']; ?>" onkeypress="mask(this, numeros)" maxlength="15" style="width:115px;" class="text ui-widget-content ui-corner-all"/>
					</td>
					<td width="100">&nbsp;</td>
				</tr>
			</table>
		</tr>
		<tr>
			<td align="right">Data de Nascimento:</td>
			<td>
				<table border="0" cellpadding="0" cellspacing="0" width="560">
					<tr>
						<td width="165">
							<input type="text" id="paciente_search3" name="paciente_search3" value="<?php echo @$_POST['paciente_search3']; ?>" onkeypress="mask(this, data)" class="datepicker text ui-widget-content ui-corner-all" maxlength="10" style="width:110px;"/>
						</td>
						<td align="right">
							Sexo:&nbsp;<select id="paciente_search4" name="paciente_search4" class="ui-corner-all" style="width:121px;">
								<option value="">...</option>
								<option value="1" <?php echo (@$_POST['paciente_search4'] == 1 ? 'selected="selected"' : ''); ?>>Masculino</option>
								<option value="2" <?php echo (@$_POST['paciente_search4'] == 2 ? 'selected="selected"' : ''); ?>>Feminino</option>
							</select>							
						</td>
						<td width="100" align="right">
							<button id="paciente_dialog_submit">Pesquisar</button>								
						</td>
					</tr>
				</table>
			</td>
		</tr>		
	</table>
</form>
<?php if($registros > 0){ ?>
	<table class="tablelist ui-widget ui-widget-content">
		<thead>
			<tr class="ui-widget-header">
				<th>Nome Completo</th>
				<th>CNS</th>
				<th>Município</th>
				<th>CEP</th>
				<th>Nascimento</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php 
			while($row = $query->fetch()){
				echo '<tr onclick="paciente_select(\''.$row['ci_paciente'].'\', \''.$row['nm_paciente'].'\', \''.$row['nr_codigo'].'\')" style="cursor:pointer;">
					<td>'.$row['nm_paciente'].'</td>
					<td>'.$row['nr_codigo'].'</td>
					<td>'.$row['sg_estado'].' - '.$row['ds_localidade'].'</td>
					<td>'.$row['nr_cep'].'</td>
					<td>'.$row['dt_nascimento'].'</td>
					<td width="30" align="center">
						<div onclick="paciente_select(\''.$row['ci_paciente'].'\', \''.$row['nm_paciente'].'\', \''.$row['nr_codigo'].'\')" class="btEdit ui-widget ui-helper-clearfix" title="Selecionar Paciente">
							<div class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-circle-check"></span></div>
						</div>				    
					</td>
				</tr>';
			}
			?>        	
		</tbody>
	</table>	
<?php 
	echo $paginacao;
} 
else{ 
?>
	<br><br>
	<div align="center">Nenhum registro encontrado!</div>
	<br><br>
<?php 
} 
?>