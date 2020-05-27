<?php
defined('EXEC') or die();
define('BR', "\n");
error_reporting(E_ALL);
ini_set('display_errors', 1);
set_time_limit(0);

if(!$auth->isAdmin()){
	Util::info(Config::AUTH_MESSAGE);
	return true;
}

//Carregando classes
require('integracao/classes/integra.class1.php');

if(@$_POST['mes'] && @$_POST['ano']){

	$mes = $_POST['mes'];
	$ano = $_POST['ano'];
	$fileStr = "<?php".BR;
	$fileStr .= 'header("Content-Type: text/html; charset=utf-8");'.BR;
	$fileStr .= 'require("classes/integra.class.php");'.BR;
	$fileStr .= 'error_reporting(E_ALL);'.BR;
	$fileStr .= 'ini_set("display_errors", 1);'.BR;
	$fileStr .= 'set_time_limit(0);'.BR;
	$fileStr .= BR.BR;	
	
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
	$fileStr .= '////////////////////////////////////////////////////////////////'.BR;
	$fileStr .= '//1 - Teleconsultorias - Cadastro profissionais'.BR;
	$fileStr .= '$profissionalTeleconsultorias = new ProfissionalSaude("0000088", "'.$mes.$ano.'");'.BR;
	while($row = $queryProfissionaisTeleconsultorias->fetch()){
		$fileStr .= '$profissionalTeleconsultorias->addProfissionalSaude(null, "'.$row['cpf'].'", "'.$row['nome'].'", "'.$row['estabelecimento_codigo_cnes'].'", "'.$row['codigo_cbo'].'", "'.$row['equipe_codigo_ine'].'", "'.$row['tipo_profissional'].'", "'.$row['sexo'].'");';
		$fileStr .= BR;
	}
	$fileStr .= BR.BR;	
		
	////////////////////////////////////////////////////////////////
	//2º passo - Enviar Teleconsultorias
	$estabelecimentosAtualiza1 = array();
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
	order by tt.dt_solicitacao) as foo";
	$queryTeleconsultorias = query($sqlTeleconsultorias);
	$fileStr .= '////////////////////////////////////////////////////////////////'.BR;
	$fileStr .= '//2 - Teleconsultorias'.BR;
	$fileStr .= '$teleconsultoria = new Teleconsultoria("0000088", "'.$mes.$ano.'");'.BR;
	while($row = $queryTeleconsultorias->fetch()){
		$estabelecimentosAtualiza1[] = "'".$row['estabelecimento_codigo_cnes']."'";
		$fileStr .= '$teleconsultoria->addSolicitacao("'.$row['data_hora_solicitacao'].'", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, "'.$row['nr_cpf'].'", "'.$row['codigo_cbo'].'", "'.$row['estabelecimento_codigo_cnes'].'", "'.$row['equipe_codigo_ine'].'", "'.$row['tipo_profissional'].'", ["'.$row['cid'].'"], ["'.$row['ciap'].'"], "'.$row['data_hora_resposta'].'", EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);';
		$fileStr .= BR;
	}	
	$sqlUpdateEstabelecimento1 = "update integracao.tb_estabelecimento set t1 = true where codigo_cnes in(".implode(",", $estabelecimentosAtualiza1).")";
	execute($sqlUpdateEstabelecimento1);
	$fileStr .= BR.BR;	
	
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
	$fileStr .= '////////////////////////////////////////////////////////////////'.BR;
	$fileStr .= '//3 - Telegiagnósticos - Cadastro profissionais'.BR;
	$fileStr .= '$profissionalTelediagnosticos = new ProfissionalSaude("0000088", "'.$mes.$ano.'");'.BR;
	while($row = $queryProfissionaisTelediagnosticos->fetch()){
		$fileStr .= '$profissionalTelediagnosticos->addProfissionalSaude(null, "'.$row['cpf'].'", "'.$row['nome'].'", "'.$row['estabelecimento_codigo_cnes'].'", "'.$row['codigo_cbo'].'", "'.$row['equipe_codigo_ine'].'", "'.$row['tipo_profissional'].'", "'.$row['sexo'].'");';
		$fileStr .= BR;
	}
	$fileStr .= BR.BR;	
	
	////////////////////////////////////////////////////////////////
	//4º passo - Enviar Telegiagnósticos
	$estabelecimentosAtualiza2 = array();
	$sqlTelediagnosticosReal = "select count(*) as num
	from tb_teleconsulta tt
	where tt.tp_tipo = 1
	  and tt.tp_status = 4
	  and extract(year from dt_resposta) = $ano
	  and extract(month from dt_resposta) = $mes";
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
	order by tt.dt_solicitacao) as foo";
	$queryTelediagnosticos = query($sqlTelediagnosticos);
	$fileStr .= '////////////////////////////////////////////////////////////////'.BR;
	$fileStr .= '//4 - Telediagnósticos'.BR;
	$fileStr .= '$telediagnostico = new Telediagnostico("0000088", "'.$mes.$ano.'");'.BR;
	while($row = $queryTelediagnosticos->fetch()){
		$estabelecimentosAtualiza2[] = "'".$row['estabelecimento_codigo_cnes']."'";
		$fileStr .= '$telediagnostico->addSolicitacao("'.$row['data_hora_solicitacao'].'", "H04001010", "41", null, "'.$row['estabelecimento_codigo_cnes'].'", "'.$row['nr_cpf_solicitante'].'", "'.$row['codigo_cbo'].'", "'.$row['estabelecimento_codigo_cnes'].'", "'.$row['data_hora_resposta'].'", "'.$row['nr_cpf_laudista'].'", "'.$row['codigo_cbo_laudista'].'", "'.$row['estabelecimento_codigo_cnes_laudista'].'", null, "'.$row['nr_cns_paciente'].'", "'.$row['codigo_ibge_cidade_paciente'].'");';
		$fileStr .= BR;
	}
	$sqlUpdateEstabelecimento2 = "update integracao.tb_estabelecimento set t2 = true where codigo_cnes in(".implode(",", $estabelecimentosAtualiza2).")";
	execute($sqlUpdateEstabelecimento2);
	$fileStr .= BR.BR;
	
	$fileStr .= '////////////////////////////////////////////////////////////////'.BR;
	$fileStr .= '//INTEGRA'.BR;
	$fileStr .= '$url = \'http://smart.telessaude.ufrn.br/\';'.BR;
	$fileStr .= '$integra = new Integra("ad9c2aa3622033fc9d79703fde22a4e892641221");'.BR;
	$fileStr .= BR.BR;
	
	$returnEstabelecimentosAtualiza = array_merge($estabelecimentosAtualiza1, $estabelecimentosAtualiza2);
	$sqlEstabelecimentosAtualiza = "select codigo_cnes,t1,t2,t3 
	from integracao.tb_estabelecimento 
	where codigo_cnes in(".implode(",", $returnEstabelecimentosAtualiza).")
	group by 1,2,3,4";	
	$queryEstabelecimentosAtualiza = query($sqlEstabelecimentosAtualiza);
	$fileStr .= '////////////////////////////////////////////////////////////////'.BR;
	$fileStr .= '//0 - Estabelecimentos - Atualização'.BR;
	$fileStr .= 'echo "<br/><br/><fieldset><legend>Estabelecimentos - Atualização</legend>";'.BR;	
	$fileStr .= '$estabelecimento = new EstabelecimentoSaude("0000088", "'.$mes.$ano.'");'.BR;
	while($row = $queryEstabelecimentosAtualiza->fetch()){
		$t1 = ($row['t1'] ==  't' ? 'true' : 'false');
		$t2 = ($row['t2'] ==  't' ? 'true' : 'false');
		$t3 = ($row['t3'] ==  't' ? 'true' : 'false');
		$fileStr .= '$estabelecimento->atualizarEstabelecimentoSaude("'.$row['codigo_cnes'].'", '.$t1.', '.$t2.', '.$t3.');';
		$fileStr .= BR;
	}
	$fileStr .= '$dados_serializados_estabelecimento = Integra::serializar(TipoDeDados::JSON, $estabelecimento);'.BR;
    $fileStr .= 'echo "<h3>.: Dados Serializados - Estabelecimentos :.</h3>";'.BR;
    $fileStr .= 'echo $dados_serializados_estabelecimento;'.BR;
    $fileStr .= '$resposta_estabelecimento = $integra->enviarDados(TipoDeDados::JSON, $url."api/v2/dados-estabelecimentos-saude/?format=json", $dados_serializados_estabelecimento);'.BR;
    $fileStr .= 'echo "<h3>.: Resposta do Servidor - Estabelecimentos :.</h3>";'.BR;
    $fileStr .= 'echo $resposta_estabelecimento;'.BR;
    $fileStr .= 'echo "</fieldset>";'.BR;
	$fileStr .= BR.BR;	
	
	$fileStr .= '////////////////////////////////////////////////////////////////'.BR;
	$fileStr .= '//1 - Teleconsultorias - Enviar Cadastro profissionais'.BR;
	$fileStr .= 'echo "<br/><br/><fieldset><legend>Teleconsultoria - Profissionais de Saúde</legend>";'.BR;	
	$fileStr .= '$dados_profissionalTeleconsultorias = Integra::serializar(TipoDeDados::JSON, $profissionalTeleconsultorias);'.BR;
    $fileStr .= 'echo "<h3>.: Dados Serializados - Profissional de Saúde :.</h3>";'.BR;
    $fileStr .= 'echo $dados_profissionalTeleconsultorias;'.BR;
    $fileStr .= '$resposta_profissional = $integra->enviarDados(TipoDeDados::JSON, $url."api/v2/profissionais-saude/?format=json", $dados_profissionalTeleconsultorias);'.BR;
    $fileStr .= 'echo "<h3>.: Resposta do Servidor - Profissional de Saúde :.</h3>";'.BR;
    $fileStr .= 'echo $resposta_profissional;'.BR;
    $fileStr .= 'echo "</fieldset>";'.BR;
	$fileStr .= BR.BR;	
	
	$fileStr .= '////////////////////////////////////////////////////////////////'.BR;
	$fileStr .= '//2 - Enviar Teleconsultorias'.BR;
	$fileStr .= 'echo "<br/><br/><fieldset><legend>Teleconsultoria</legend>";'.BR;	
	$fileStr .= '$dados_teleconsultoria = Integra::serializar(TipoDeDados::JSON, $teleconsultoria);'.BR;
	$fileStr .= 'echo "<h3>.: Dados Serializados - Teleconsultoria :.</h3>";'.BR;
    $fileStr .= 'echo $dados_teleconsultoria;'.BR;
    $fileStr .= '$resposta_teleconsultoria = $integra->enviarDados(TipoDeDados::JSON, $url."api/v2/teleconsultorias/?format=json", $dados_teleconsultoria);'.BR;
    $fileStr .= 'echo "<h3>.: Resposta do Servidor - Teleconsultoria :.</h3>";'.BR;
    $fileStr .= 'echo $resposta_teleconsultoria;'.BR;
    $fileStr .= 'echo "</fieldset>";'.BR;
	$fileStr .= BR.BR;	
	
	$fileStr .= '////////////////////////////////////////////////////////////////'.BR;
	$fileStr .= '//3 - Telediagnósticos - Enviar Cadastro profissionais'.BR;
	$fileStr .= 'echo "<br/><br/><fieldset><legend>Teleconsultoria - Profissionais de Saúde</legend>";'.BR;	
	$fileStr .= '$dados_profissionalTeleconsultorias = Integra::serializar(TipoDeDados::JSON, $profissionalTelediagnosticos);'.BR;
    $fileStr .= 'echo "<h3>.: Dados Serializados - Profissional de Saúde :.</h3>";'.BR;
    $fileStr .= 'echo $dados_profissionalTeleconsultorias;'.BR;
    $fileStr .= '$resposta_profissional = $integra->enviarDados(TipoDeDados::JSON, $url."api/v2/profissionais-saude/?format=json", $dados_profissionalTeleconsultorias);'.BR;
    $fileStr .= 'echo "<h3>.: Resposta do Servidor - Profissional de Saúde :.</h3>";'.BR;
    $fileStr .= 'echo $resposta_profissional;'.BR;
    $fileStr .= 'echo "</fieldset>";'.BR;
	$fileStr .= BR.BR;
	
	$fileStr .= '////////////////////////////////////////////////////////////////'.BR;
	$fileStr .= '//4 - Enviar Teledignósticos'.BR;
	$fileStr .= 'echo "<br/><br/><fieldset><legend>Telediagnóstico</legend>";'.BR;	
	$fileStr .= '$dados_telediagnosticos = Integra::serializar(TipoDeDados::JSON, $telediagnostico);'.BR;
	$fileStr .= 'echo "<h3>.: Dados Serializados - Telediagnóstico :.</h3>";'.BR;
    $fileStr .= 'echo $dados_telediagnosticos;'.BR;
    $fileStr .= '$resposta_telediagnostico = $integra->enviarDados(TipoDeDados::JSON, $url."api/v2/telediagnosticos/?format=json", $dados_telediagnosticos);'.BR;
    $fileStr .= 'echo "<h3>.: Resposta do Servidor - Telediagnóstico :.</h3>";'.BR;
    $fileStr .= 'echo $resposta_telediagnostico;'.BR;
    $fileStr .= 'echo "</fieldset>";'.BR;
	$fileStr .= BR.BR;
	
	$fileStr .= BR."?>";
	$fp = fopen('integracao/temp.bkp', 'w');
	fwrite($fp, $fileStr);
	fclose($fp);	
}

?>

	<div class="row bgGrey">
		<img src="assets/integracao.png"/>
		<span class="actiontitle">Integração Ministério</span>
		<span class="actionview"> - Gerar Arquivo</span>
		<button id="btVoltar" onclick="window.location='?page=integracao';" class="btn btn-info btn-sm pull-right"><span class="glyphicon glyphicon-circle-arrow-left"></span> Voltar</button>		
	</div>

	<h3>Arquivo Gerado!</h3>
	<a href="integracao/temp.bkp">BAIXAR...</a>