<?php
defined('EXEC') or die();
error_reporting(E_ALL);
ini_set('display_errors', 1);
set_time_limit(0);


if(!$auth->isAdmin()){
	Util::info(Config::AUTH_MESSAGE);
	return true;
}

//Carregando classes
require('integracao/classes/integra.class1.php');

//Alteração ou inclusão de um registro
if(isset($_GET['db']) && @$_POST['mes_gerar'] && @$_POST['ano_gerar']){

	$mes = $_POST['mes_gerar'];
	$ano = $_POST['ano_gerar'];
	
	////////////////////////////////////////////////////////////////
	//1º passo - Enviar cadastro profissionais das teleconsultorias
	$sqlProfissionaisTeleconsultorias = "select 
		foo.cpf, foo.nome, foo.estabelecimento_codigo_cnes, foo.codigo_cbo, foo.equipe_codigo_ine, foo.tipo_profissional, foo.sexo
	from
	(select itp.cpf,
		upper(itp.nome) as nome,
		itp.estabelecimento_codigo_cnes,
		itp.codigo_cbo,
		itp.equipe_codigo_ine,
		case (select cd_grupo from tb_usuario_grupo tug where tug.cd_usuario = tp.ci_profissional limit 1)
			when 5 then '02' --provab
			when 6 then '03' --mais médicos
			else '01' --profissionais de saúde
		end as tipo_profissional,
		case tu.fl_sexo
			when 1 then 'M'
			else 'F'
		end as sexo
	from integracao.tb_profissional itp
	inner join tb_profissional tp on(itp.cpf = replace(replace(tp.nr_cpf, '.', ''), '-', ''))
	inner join tb_usuario tu on(tp.ci_profissional=tu.ci_usuario)
	where itp.cpf in (
		select distinct foo.cpf
		from (select 
			replace(replace(tp.nr_cpf, '.', ''), '-', '') as cpf
		from tb_teleconsulta tt
		inner join tb_usuario tu on(tt.cd_profissional_solicitante=tu.ci_usuario)
		inner join tb_profissional tp on(tt.cd_profissional_solicitante=tp.ci_profissional)
		inner join integracao.tb_profissional itp on(itp.cpf = replace(replace(tp.nr_cpf, '.', ''), '-', ''))
		left join tb_categoria_cid tcc on(tt.cd_categoria_cid=tcc.ci_categoria_cid)
		left join tb_subcategoria_cid tsc on(tt.cd_subcategoria_cid=tsc.ci_subcategoria_cid)
		where tt.tp_tipo = 2
		  and tt.tp_status = 4
		  and extract(year from tt.dt_resposta) = $ano
		  and extract(month from tt.dt_resposta) = $mes
		) as foo
	)
	) as foo";	
	$queryProfissionaisTeleconsultorias = query($sqlProfissionaisTeleconsultorias);
	$numProfissionaisTeleconsultorias = $queryProfissionaisTeleconsultorias->rowCount();
		
	////////////////////////////////////////////////////////////////
	//2º passo - Enviar Teleconsultorias
	$sqlTeleconsultoriasReal = "select count(*) as num
	from tb_teleconsulta tt
	where tt.tp_tipo = 2
	  and tt.tp_status = 4
	  and extract(year from dt_resposta) = $ano
	  and extract(month from dt_resposta) = $mes";
	$queryTeleconsultoriasReal = query($sqlTeleconsultoriasReal)->fetch();
	$numTeleconsultoriasReal = $queryTeleconsultoriasReal['num'];
	$sqlTeleconsultorias = "select
	foo.data_hora_solicitacao, foo.nr_cpf, foo.codigo_cbo, foo.estabelecimento_codigo_cnes, foo.equipe_codigo_ine,
	foo.tipo_profissional, foo.cid, foo.ciap, foo.data_hora_resposta
	from 
	(select 
		to_char(tt.dt_solicitacao, 'dd/mm/yyyy HH24:MI:SS') as data_hora_solicitacao,
		replace(replace(tp.nr_cpf, '.', ''), '-', '') as nr_cpf, 
		itp.codigo_cbo,
		itp.estabelecimento_codigo_cnes,
		itp.equipe_codigo_ine,
		case (select cd_grupo from tb_usuario_grupo tug where tug.cd_usuario = tt.cd_profissional_solicitante limit 1)
			when 5 then '02' --provab
			when 6 then '03' --mais médicos
			else '01' --profissionais de saúde
		end as tipo_profissional,
		coalesce(tsc.nr_subcategoria_cid, tcc.nr_categoria_cid) as cid,
		tcc.nm_categoria_cid as categoria,
		tsc.nm_subcategoria_cid as subcategoria,
		tcc.nr_ciap as ciap,
		to_char(tt.dt_resposta, 'dd/mm/yyyy HH24:MI:SS') as data_hora_resposta
	from tb_teleconsulta tt
	inner join tb_usuario tu on(tt.cd_profissional_solicitante=tu.ci_usuario)
	inner join tb_profissional tp on(tt.cd_profissional_solicitante=tp.ci_profissional)
	inner join integracao.tb_profissional itp on(itp.cpf = replace(replace(tp.nr_cpf, '.', ''), '-', ''))
	left join tb_categoria_cid tcc on(tt.cd_categoria_cid=tcc.ci_categoria_cid)
	left join tb_subcategoria_cid tsc on(tt.cd_subcategoria_cid=tsc.ci_subcategoria_cid)
	where tt.tp_tipo = 2
	  and tt.tp_status = 4
	  and extract(year from tt.dt_resposta) = $ano
	  and extract(month from tt.dt_resposta) = $mes
	--group by 1,2,3,4,5,6
	order by tt.dt_solicitacao) as foo";
	$queryTeleconsultorias = query($sqlTeleconsultorias);
	$numTeleconsultorias = $queryTeleconsultorias->rowCount();
	$errosTeleconsultorias = $numTeleconsultoriasReal - $numTeleconsultorias;
	
	////////////////////////////////////////////////////////////////
	//3º passo - Enviar cadastro profissionais de telediagnósticos
	$sqlProfissionaisTelediagnosticos = "select
	foo.cpf, foo.nome, foo.estabelecimento_codigo_cnes, foo.codigo_cbo, foo.equipe_codigo_ine, foo.tipo_profissional, foo.sexo
	from
	(select itp.cpf,
		upper(itp.nome) as nome,
		itp.estabelecimento_codigo_cnes,
		itp.codigo_cbo,
		itp.equipe_codigo_ine,
		case (select cd_grupo from tb_usuario_grupo tug where tug.cd_usuario = tp.ci_profissional limit 1)
			when 5 then '02' --provab
			when 6 then '03' --mais médicos
			else '01' --profissionais de saúde
		end as tipo_profissional,
		case tu.fl_sexo
			when 1 then 'M'
			else 'F'
		end as sexo
	from integracao.tb_profissional itp
	inner join tb_profissional tp on(itp.cpf = replace(replace(tp.nr_cpf, '.', ''), '-', ''))
	inner join tb_usuario tu on(tp.ci_profissional=tu.ci_usuario)
	where itp.cpf in (
			select distinct foo.cpf
			from (select 
				replace(replace(tp.nr_cpf, '.', ''), '-', '') as cpf
			from tb_teleconsulta tt
			inner join tb_usuario tu on(tt.cd_profissional_solicitante=tu.ci_usuario)
			inner join tb_profissional tp on(tt.cd_profissional_solicitante=tp.ci_profissional)
			inner join integracao.tb_profissional itp on(itp.cpf = replace(replace(tp.nr_cpf, '.', ''), '-', ''))
			left join tb_categoria_cid tcc on(tt.cd_categoria_cid=tcc.ci_categoria_cid)
			left join tb_subcategoria_cid tsc on(tt.cd_subcategoria_cid=tsc.ci_subcategoria_cid)
			where tt.tp_tipo = 1
			  and tt.tp_status = 4
			  and extract(year from tt.dt_resposta) = $ano
			  and extract(month from tt.dt_resposta) = $mes
			) as foo
		union
			select distinct foo.cpf
			from (select 
				replace(replace(tp.nr_cpf, '.', ''), '-', '') as cpf
			from tb_teleconsulta tt
			inner join tb_usuario tu on(tt.cd_profissional_especialista=tu.ci_usuario)
			inner join tb_profissional tp on(tt.cd_profissional_especialista=tp.ci_profissional)
			inner join integracao.tb_profissional itp on(itp.cpf = replace(replace(tp.nr_cpf, '.', ''), '-', ''))
			left join tb_categoria_cid tcc on(tt.cd_categoria_cid=tcc.ci_categoria_cid)
			left join tb_subcategoria_cid tsc on(tt.cd_subcategoria_cid=tsc.ci_subcategoria_cid)
			where tt.tp_tipo = 1
			  and tt.tp_status = 4
			  and extract(year from tt.dt_resposta) = $ano
			  and extract(month from tt.dt_resposta) = $mes
			) as foo
	)) as foo";
	$queryProfissionaisTelediagnosticos = query($sqlProfissionaisTelediagnosticos);
	$numProfissionaisTelediagnosticos = $queryProfissionaisTelediagnosticos->rowCount();	
	
	////////////////////////////////////////////////////////////////
	//4º passo - Enviar Telegiagnósticos
	$sqlTelediagnosticosReal = "select count(*) as num
	from tb_teleconsulta tt
	where tt.tp_tipo = 1
	  and tt.tp_status = 4
	  and extract(year from dt_resposta) = $ano
	  and extract(month from dt_resposta) = $mes
	  and cd_profissional_solicitante != 1055"; //"solicitantemedico"
	$queryTelediagnosticosReal = query($sqlTelediagnosticosReal)->fetch();
	$numTelediagnosticosReal = $queryTelediagnosticosReal['num'];
	$sqlTelediagnosticos = "select 
	foo.data_hora_solicitacao, foo.estabelecimento_codigo_cnes, foo.nr_cpf_solicitante, foo.codigo_cbo, foo.estabelecimento_codigo_cnes,
	foo.data_hora_resposta, foo.nr_cpf_laudista, foo.codigo_cbo_laudista, foo.estabelecimento_codigo_cnes_laudista, foo.nr_cns_paciente, foo.codigo_ibge_cidade_paciente
	from 
	(select 
		to_char(tt.dt_solicitacao, 'dd/mm/yyyy HH24:MI:SS') as data_hora_solicitacao,
		replace(replace(tp.nr_cpf, '.', ''), '-', '') as nr_cpf_solicitante, 
		itp.codigo_cbo,
		itp.estabelecimento_codigo_cnes,
		to_char(tt.dt_resposta, 'dd/mm/yyyy HH24:MI:SS') as data_hora_resposta,
		replace(replace(tpe.nr_cpf, '.', ''), '-', '') as nr_cpf_laudista, 
		itpe.codigo_cbo as codigo_cbo_laudista,
		itpe.estabelecimento_codigo_cnes as estabelecimento_codigo_cnes_laudista,
		replace(replace(tpa.nr_codigo, '.', ''), '-', '') as nr_cns_paciente, 
		itm.codigo as codigo_ibge_cidade_paciente
	from tb_teleconsulta tt
	inner join tb_profissional tp on(tt.cd_profissional_solicitante=tp.ci_profissional)
	inner join integracao.tb_profissional itp on(itp.cpf = replace(replace(tp.nr_cpf, '.', ''), '-', ''))
	inner join tb_profissional tpe on(tt.cd_profissional_especialista=tpe.ci_profissional)
	inner join integracao.tb_profissional itpe on(itpe.cpf = replace(replace(tpe.nr_cpf, '.', ''), '-', ''))
	inner join tb_paciente tpa on(tt.cd_paciente=tpa.ci_paciente)
	inner join integracao.tb_municipio itm on(tt.cd_localidade=itm.cd_localidade)
	where tt.tp_tipo = 1
	  and tt.tp_status = 4
	  and extract(year from tt.dt_resposta) = $ano
	  and extract(month from tt.dt_resposta) = $mes
	  and tt.cd_profissional_solicitante != 1055
	order by tt.dt_solicitacao) as foo";
	$queryTelediagnosticos = query($sqlTelediagnosticos);
	$numTelediagnosticos = $queryTelediagnosticos->rowCount();
	$errosTelediagnosticos = $numTelediagnosticosReal - $numTelediagnosticos;	
	

	//--PROFISSIONAIS NÃO ENCONTRADOS NA TABELA DO MINISTÉRIO----------------
	$sqlProfissionaisNaoEncontrados = "select tl.sg_estado, tl.ds_localidade, upper(tu.nm_usuario), tpro.nr_cpf
	from tb_profissional tpro
	inner join tb_usuario tu on(tpro.ci_profissional=tu.ci_usuario)
	inner join tb_profissional_localidade tprol on(tpro.ci_profissional=tprol.cd_profissional)
	inner join tb_localidade tl on(tprol.cd_localidade=tl.ci_localidade)
	where replace(replace(nr_cpf, '.', ''), '-', '') in(

	select replace(replace(tp.nr_cpf, '.', ''), '-', '') as cpf
	from tb_teleconsulta tt
	inner join tb_profissional tp on(tp.ci_profissional=tt.cd_profissional_solicitante)
	--inner join integracao.tb_profissional itp on(itp.cpf = replace(replace(tp.nr_cpf, '.', ''), '-', ''))
	where tt.tp_tipo = 2
	  and tt.tp_status = 4
	  and extract(year from dt_resposta) = $ano
	  and extract(month from dt_resposta) = $mes
	group by 1
	except
	select itp.cpf as cpf
	from tb_teleconsulta tt
	inner join tb_profissional tp on(tp.ci_profissional=tt.cd_profissional_solicitante)
	inner join integracao.tb_profissional itp on(itp.cpf = replace(replace(tp.nr_cpf, '.', ''), '-', ''))
	where tt.tp_tipo = 2
	  and tt.tp_status = 4
	  and extract(year from dt_resposta) = $ano
	  and extract(month from dt_resposta) = $mes
	group by 1 )";
	$queryProfissionaisNaoEncontrados = query($sqlProfissionaisNaoEncontrados);
	$numProfissionaisNaoEncontrados = $queryProfissionaisNaoEncontrados->rowCount();

	
	//Ciaps faltantes
	$sqlCiapsFaltantes = "select 
	foo.cid, foo.categoria, foo.subcategoria, foo.ciap	
	from 
	(select 
		replace(replace(tp.nr_cpf, '.', ''), '-', '') as nr_cpf, 
		'null' as nr_cns,
		tu.ds_email,
		coalesce(tsc.nr_subcategoria_cid, tcc.nr_categoria_cid) as cid,
		tcc.nm_categoria_cid as categoria,
		tsc.nm_subcategoria_cid as subcategoria,
		tcc.nr_ciap as ciap,
		count(*) as num
	from tb_teleconsulta tt
	inner join tb_usuario tu on(tt.cd_profissional_solicitante=tu.ci_usuario)
	inner join tb_profissional tp on(tt.cd_profissional_solicitante=tp.ci_profissional)
	left join tb_categoria_cid tcc on(tt.cd_categoria_cid=tcc.ci_categoria_cid)
	left join tb_subcategoria_cid tsc on(tt.cd_subcategoria_cid=tsc.ci_subcategoria_cid)
	where tt.tp_tipo = 2
	  and tt.tp_status = 4
	  and extract(year from tt.dt_resposta) = $ano
	  and extract(month from tt.dt_resposta) = $mes
	group by 1,2,3,4,5,6,7
	order by 3) as foo
	where ciap is null
	order by cid asc";
	$queryCiapsFaltantes = query($sqlCiapsFaltantes);
	$numCiapsFaltantes = $queryCiapsFaltantes->rowCount();
	
	
	
	
	
}

/*if(!isset($_GET['form'])){ //Consulta no banco para listagem dos registros
	$where = '';
	if(@$_POST['search1']){
		$term = addslashes($_POST['search1']);
		$where .=  "and nm_grupo ilike '%{$term}%' ";
	}
	if(@$_POST['search2']){
		$term = addslashes($_POST['search2']);
		$where .=  "and ds_descricao = {$term} ";
	}
	
	$sql = "select * from tb_grupo
	where 1=1 $where
	order by nm_grupo asc
	limit {$limitPagina} offset ".(($p - 1) * $limitPagina);
	$query = query($sql);
	$sqlNum = "select count(*) as num from tb_grupo where 1=1 $where";
	$rowNum = query($sqlNum)->fetch();
	$registros = $rowNum['num'];	
	$paginacao = Util::pagination($registros, 2);	
}*/
?>


	<div class="row bgGrey">
		<img src="assets/integracao.png"/>
		<span class="actiontitle">Integração Ministério</span>
		<span class="actionview"> - <?php echo (!isset($_GET['form']) ? 'Pesquisa' : (@$_GET['form'] > 0 ? 'Edição' : 'Cadastro')); ?></span>
		<?php if(!isset($_GET['form'])){ ?>
			<!--<button id="btAdd" class="btn btn-info btn-sm pull-right"><span class="glyphicon glyphicon-plus-sign"></span> Novo</button>-->
		<?php } else{ ?>		
			<button id="btVoltar" onclick="window.location='?page=integracao';" class="btn btn-info btn-sm pull-right"><span class="glyphicon glyphicon-circle-arrow-left"></span> Voltar</button>
		<?php } ?>		
	</div>
	
	
		<br>
	
		
		<form action="<?php echo Util::setLink(array('db=1')) ?>" method="post" id="formInsertEdit" onsubmit="return test();">		
			
			<div class="row"><div id="validateBox" class="col-md-8 col-md-offset-2"></div></div>
			
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="col-md-3" style="margin-top:5px;">
						Informe Mês e Ano:
					</div>
					<div class="col-md-2">
						<input type="text" id="mes_gerar" name="mes_gerar" placeholder="MM" class="form-control input-mask-numbers" maxlength="2" value="<?php echo @$_POST['mes_gerar']; ?>"/>
					</div>
					<div class="col-md-2">
						<input type="text" id="ano_gerar" name="ano_gerar" placeholder="AAAA" class="form-control input-mask-numbers" maxlength="4" value="<?php echo @$_POST['ano_gerar']; ?>"/>
					</div>					
					<div class="col-md-5">
						<button id="btInsertEdit" type="submit" class="btn btn-warning text-center"><span class="glyphicon glyphicon-qrcode"></span> Gerar</button>
						<a href="integracao/smartdoc/index.html" type="button" class="btn btn-info text-center"><span class="glyphicon glyphicon-book"></span> Documentação</a>
					</div>
				</div>
			</div>
			
		</form>
			
			<br>
			
			<?php if(@$_POST['mes_gerar'] && @$_POST['ano_gerar']){ ?>
			
			<div id="box1">
			<div class="panel panel-default">
				<div class="panel-heading" style="overflow:auto;">
					<div class="col-md-12">
						Mês Referência: <b><?php echo $mes.'/'.$ano; ?></b>
					</div>
				</div>
			
			
			<!--Teleconsultorias-->
			<h4>Teleconsultorias</h4>
			<div class="row" style="padding:10px;">
				<div class="col-md-12">			
					<div class="row">
						<div class="col-md-4">
							Envio cadastro profissionais:<br>
							<b><?php echo $numProfissionaisTeleconsultorias; ?></b>
						</div>
						<div class="col-md-4">
							Teleconsultorias:<br>
							<b><?php echo $numTeleconsultorias; ?></b>
						</div>
						<div class="col-md-4">
							Erros (possívelmente teleconsultas realizadas por profissionais que não estão vinculados em estabelecimento de saúde):<br>
							<font color="red"><b><?php echo $errosTeleconsultorias; ?></b></font>
						</div>
					</div>							
				</div>
			</div>
			
			<?php if($numProfissionaisNaoEncontrados > 0){ ?>
			Profissionais não vinculados (<?php echo $numProfissionaisNaoEncontrados; ?>):
			<div class="table-responsive">
				<table class="table table-hover table-bordered">
					<thead>
						<tr class="btn-info">
							<th>Estado</th>
							<th>Localidade</th>
							<th>Nome</th>
							<th>CPF</th>							
						</tr>
					</thead>
					<tbody>
						<?php 
						while($row = $queryProfissionaisNaoEncontrados->fetch()){
						?>
						<tr>
							<td><?php echo $row['sg_estado']; ?></td>
							<td><?php echo $row['ds_localidade']; ?></td>
							<td><?php echo $row['upper']; ?></td>
							<td><?php echo $row['nr_cpf']; ?></td>							
						</tr>
						<?php
						}
						?>
					</tbody>
				</table>
			</div>
			<?php } ?>
			
			<?php if($numCiapsFaltantes > 0){ ?>
			Ciaps faltantes (<?php echo $numCiapsFaltantes; ?>):
			<div class="table-responsive">
				<table class="table table-hover table-bordered">
					<thead>
						<tr class="btn-info">
							<th>CID</th>
							<th>CATEGORIA</th>
							<th>SUBCATEGORIA</th>
							<th>CIAP</th>							
						</tr>
					</thead>
					<tbody>
						<?php 
						while($row = $queryCiapsFaltantes->fetch()){
						?>
						<tr>
							<td><?php echo $row['cid']; ?></td>
							<td><?php echo $row['categoria']; ?></td>
							<td><?php echo $row['subcategoria']; ?></td>
							<td><?php echo $row['ciap']; ?></td>							
						</tr>
						<?php
						}
						?>
					</tbody>
				</table>
			</div>
			<?php } ?>
			
			<br>
			
			<!--Fim Teleconsultorias-->
			
			<!--Telediagnósticos-->
			<h4>Telediagnósticos</h4>
			<div class="row" style="padding:10px;">
				<div class="col-md-12">			
					<div class="row">
						<div class="col-md-4">
							Envio cadastro profissionais:<br>
							<b><?php echo $numProfissionaisTelediagnosticos; ?></b>
						</div>
						<div class="col-md-4">
							Telediagnósticos:<br>
							<b><?php echo $numTelediagnosticos; ?></b>
						</div>						
						<div class="col-md-4">
							Erros:<br>
							<font color="red"><b><?php echo $errosTelediagnosticos; ?></b></font>
						</div>
					</div>							
				</div>
			</div>
			<!--Fim Telediagnósticos-->			
			
			
			</div>
			</div>
			
			<form action="<?php echo Util::setLink(array('page=integracao_gerararquivo')) ?>" method="post">		
				<input type="hidden" name="mes" value="<?php echo @$_POST['mes_gerar']; ?>"/>
				<input type="hidden" name="ano" value="<?php echo @$_POST['ano_gerar']; ?>"/>
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center">
						<button id="btInsertEdit" type="submit" class="btn btn-success text-center">Fazer Download</button>
						<img class="loader" src="assets/loading.gif"/>
					</div>
				</div>
			</form>
			
			<?php } ?>
			
			
			</div>
			
			
			
			
			
			
			
			
			
			<br>
			
		
	
<script type="text/javascript">
/*function changeTipo(){
	var tipo = $('#tp_tipo').val();	
	if(tipo == 1){
		$('#box1').show();
		$('#box2').hide();
	}
	else if(tipo == 2){
		$('#box1').hide();
		$('#box2').show();
	}
	else{
		$('#box1').hide();
		$('#box2').hide();
	}
}*/
</script>