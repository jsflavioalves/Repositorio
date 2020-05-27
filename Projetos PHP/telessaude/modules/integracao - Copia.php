<?php
defined('EXEC') or die();

if(!$auth->isAdmin()){
	Util::info(Config::AUTH_MESSAGE);
	return true;
}

//Carregando classes
require('integracao/classes/integra.class.php');

//Alteração ou inclusão de um registro
if(isset($_GET['db']) && isset($_GET['form'])){
	
	$ci_grupo = $_GET['form'];
	$nm_grupo = addslashes($_POST['nm_grupo']);
	$ds_descricao = addslashes($_POST['ds_descricao']);
	$transacao = @$_POST['transacao'];
	
	if($_GET['form'] == 0){ //cadastro		
		$ciRow = query("SELECT nextval('tb_grupo_ci_grupo_seq') as ci_grupo")->fetch();
		$ci_grupo = $ciRow['ci_grupo'];	
		$sql = "INSERT INTO tb_grupo(ci_grupo, nm_grupo, ds_descricao)
		VALUES ($ci_grupo, '$nm_grupo', '$ds_descricao'); ";	
		
		if($transacao){
			for($i=0;$i<count($transacao);$i++){
				$ci_transacao = $transacao[$i];
				$fl_inserir = (@$_POST['insert_'.$ci_transacao] ? "S" : "N");
				$fl_alterar = (@$_POST['update_'.$ci_transacao] ? "S" : "N");
				$fl_deletar = (@$_POST['delete_'.$ci_transacao] ? "S" : "N");
				$sql .= "INSERT INTO tb_grupo_transacao(cd_grupo, cd_transacao, fl_inserir, fl_alterar, fl_deletar)
				VALUES ($ci_grupo, $ci_transacao, '$fl_inserir', '$fl_alterar', '$fl_deletar');";			
			}
		}
	}	
	elseif($_GET['form'] > 0){ //alteração	
		$sql = "UPDATE tb_grupo
				SET nm_grupo='$nm_grupo', ds_descricao='$ds_descricao'
		WHERE ci_grupo = $ci_grupo; 
		DELETE FROM tb_grupo_transacao
		WHERE cd_grupo = $ci_grupo; ";
		
		if($transacao){
			for($i=0;$i<count($transacao);$i++){
				$ci_transacao = $transacao[$i];
				$fl_inserir = (@$_POST['insert_'.$ci_transacao] ? "S" : "N");
				$fl_alterar = (@$_POST['update_'.$ci_transacao] ? "S" : "N");
				$fl_deletar = (@$_POST['delete_'.$ci_transacao] ? "S" : "N");
				$sql .= "INSERT INTO tb_grupo_transacao(cd_grupo, cd_transacao, fl_inserir, fl_alterar, fl_deletar)
				VALUES ($ci_grupo, $ci_transacao, '$fl_inserir', '$fl_alterar', '$fl_deletar');";			
			}
		}
	}
		
	if(execute($sql)){
		Controller::setInfo('Grupo', 'Salvo com sucesso!');	
		Controller::redirect(Util::setLink(array('form=null', 'db=null')));	
	}
	else{
		Util::notice('Grupo', 'Ocorreu um erro!', 'error');	
	}	
}

if(isset($_GET['form'])){ //Formulário para adição ou alteração de registro
	if($_GET['form'] == 0){
		if(!$auth->isAdmin()){
			Util::info(Config::AUTH_MESSAGE);
			return true;
		}	
		
		//Selecionando todas as transacões possíveis do módulo
		$sqlPossiveis = "select ci_transacao, nm_transacao, ds_descricao, tp_tipo
		from tb_transacao
		order by nm_transacao";
		$queryPossiveis = query($sqlPossiveis);				
	}
	else{
		if(!$auth->isAdmin()){
			Util::info(Config::AUTH_MESSAGE);
			return true;
		}
		
		//Selecionando todas as transacões possíveis do módulo exceto as já selecionadas
		$sqlPossiveis = "select tt.ci_transacao, tt.nm_transacao, tt.ds_descricao, tt.tp_tipo
		from tb_transacao tt
		where tt.ci_transacao not in(select cd_transacao from tb_grupo_transacao where cd_grupo = ".$_GET['form'].")
		order by tt.nm_transacao";
		$queryPossiveis = query($sqlPossiveis);
		
		//Selecionando as transações já selecionadas
		$sqlSelecionadas = 'select tt.ci_transacao, tt.nm_transacao, tt.ds_descricao, tt.tp_tipo, tgt.fl_inserir, tgt.fl_alterar, tgt.fl_deletar
		from tb_grupo_transacao tgt
		inner join tb_transacao tt on(tgt.cd_transacao=tt.ci_transacao)
		where tgt.cd_grupo = '.$_GET['form'].'
		order by tt.nm_transacao asc';
		$querySelecionadas = query($sqlSelecionadas);
		
		$rowEdit = query('select * from tb_grupo where ci_grupo = '.$_GET['form'])->fetch();
	}
}
else{ //Consulta no banco para listagem dos registros
	
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
}



?>


	<div class="row bgGrey">
		<img src="assets/integracao.png"/>
		<span class="actiontitle">Integração Ministério</span>
		<span class="actionview"> - <?php echo (!isset($_GET['form']) ? 'Pesquisa' : (@$_GET['form'] > 0 ? 'Edição' : 'Cadastro')); ?></span>
		<?php if(!isset($_GET['form'])){ ?>
			<button id="btAdd" class="btn btn-info btn-sm pull-right"><span class="glyphicon glyphicon-plus-sign"></span> Novo</button>			
		<?php } else{ ?>		
			<button id="btVoltar" onclick="window.location='?page=integracao';" class="btn btn-info btn-sm pull-right"><span class="glyphicon glyphicon-circle-arrow-left"></span> Voltar</button>
		<?php } ?>		
	</div>
	
	<!-- FORMULÁRIO DE PESQUISA -->
	<?php if(!isset($_GET['form'])){ ?>	
	
		<br>
		<div class="row">
			<form id="formSearch" method="post">
				<div class="table-responsive btMarginRight">
				<table class="table table-hover table-bordered">
					<thead>
						<tr class="btn-info">
							<th>Ano</th>
							<th>Mes</th>
							<th>Resposta</th>
							<th>Data</th>
							<th>Usuário</th>
							<td></td>							
						</tr>
					</thead>
					<tbody>
						<?php 
						//while($row = $query->fetch()){
						?>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td class="text-center">
								<a href="javascript:void(0);" onclick="window.location='';">
									<span class="glyphicon glyphicon-download"></span>
								</a>
							</td>
						</tr>
						<?php
						//}
						?>
					</tbody>
				</table>
				</div>				
			</form>			
			<?php echo $paginacao; ?>
		</div>
	
	<?php } else{ ?>


	<?php
	
/*	//Testando
$quadroUm = new QuadroUm(1, 2, 3);
$quadroUm->addAvaliacaoEstrutura("240810", 11, 12, 13);
$quadroUm->addAvaliacaoEstrutura("240325", 11, 12, 13);
$quadroUm->addProfissionaisRegistrados("240810", "2251", 14);
$quadroUm->addProfissionaisRegistrados("240810", "2231", 15);



$quadroDois = new QuadroDois(4, 5, 6, 7);
$quadroDois->addSolicitacoesCatProfissional("2251", 21);
$quadroDois->addSolicitacoesCatProfissional("2231", 21);
$quadroDois->addSolicitacoesEquipe("1000",null, 22);
$quadroDois->addSolicitacoesEquipe("1001",null, 22);
$quadroDois->addSolicitacoesMunicipio("240810", 30);
$quadroDois->addSolicitacoesMunicipio("240325", 10);
$quadroDois->addSolicitacoesUF("23", 30);
$quadroDois->addSolicitacoesMembroGestao(null, "cns4321", "Nome Membro Gestão 1", "membro1@telessaude.ufrn.br", 24);
$quadroDois->addSolicitacoesMembroGestao("70030044450", "cns", "Nome Membro Gestão 2", "membro2@telessaude.ufrn.br", 24);
$quadroDois->addSolicitacoesPontoTelessaude("2653982", 26);
$quadroDois->addSolicitacoesPontoTelessaude("2408635", 2);
$quadroDois->addSolicitacoesProfissional("70030044450", null, "Nome Profissional 1", "prof1@telessaude.ufrn.br", "01", 27, 1, null, 200);
$quadroDois->addSolicitacoesProfissional("70030044450", null, "Nome Profissional 2", "prof1@telessaude.ufrn.br", "01", 27, 1, null, 200);
$quadroDois->addSolicitacoesProfissional("70030044450", null, "Nome Profissional 3", "prof1@telessaude.ufrn.br", "01", 27, 1, null, 200);
$quadroDois->addSolicitacoesProfissionalTema("70030044450", null, "prof1@telessaude.ufrn.br", "CID 12345", null, 55);



$quadroTres = new QuadroTres(8, 9);
$quadroTres->addSolicitacoesTelediagnosticoUF("23", 24);
$quadroTres->addSolicitacoesTelediagnosticoEquipe("1000",null, 10);
$quadroTres->addSolicitacoesTelediagnosticoEquipe("1001",null, 11);
$quadroTres->addSolicitacoesTelediagnosticoMunicipio("240810", 30);
$quadroTres->addSolicitacoesTelediagnosticoMunicipio("240325", 10);
$quadroTres->addSolicitacoesTelediagnosticoPontoTelessaude("2653982", 33);
$quadroTres->addSolicitacoesTelediagnosticoPontoTelessaude("2408635", 33);
$quadroTres->addSolicitacoesTelediagnosticoTipo("H21010137", 10);
$quadroTres->addSolicitacoesTelediagnosticoTipo("H97019003", 10);




$quadroQuatro = new QuadroQuatro(10, 11);
$quadroQuatro->addAtividadesRealizadasUF("23", 50);
$quadroQuatro->addAcessosObjetosAprendizagem("24", "240810", "1000",null, "2653982", 41);
$quadroQuatro->addAcessosObjetosAprendizagem("25", "250750", "1000",null, "2400103", 41);
$quadroQuatro->addAcessosObjetosAprendizagemCatProfissional("2251", 42);
$quadroQuatro->addAcessosObjetosAprendizagemCatProfissional("2231", 42);
$quadroQuatro->addAcessosObjetosAprendizagemEquipe("1000",null, 100);
$quadroQuatro->addAcessosObjetosAprendizagemEquipe("1001",null, 101);
$quadroQuatro->addAcessosObjetosAprendizagemMunicipio("240810", 44);
$quadroQuatro->addAcessosObjetosAprendizagemMunicipio("240325", 10);
$quadroQuatro->addAcessosObjetosAprendizagemPontoTelessaude("2653982", 45);
$quadroQuatro->addAcessosObjetosAprendizagemPontoTelessaude("2408635", 10);
$quadroQuatro->addAtividadesRealizadasEquipe("1000",null, 50);
$quadroQuatro->addAtividadesRealizadasEquipe("1001",null, 25);
$quadroQuatro->addAtividadesRealizadasMunicipio("240810", 40);
$quadroQuatro->addAtividadesRealizadasMunicipio("240810", 40);
$quadroQuatro->addAtividadesRealizadasPontoTelessaude("2653982", 30);
$quadroQuatro->addAtividadesRealizadasPontoTelessaude("2408635", 10);
$quadroQuatro->addParticipantesCatProfissionalEquipe("1000",null, "2251", 100);
$quadroQuatro->addParticipantesCatProfissionalEquipe("1000",null, "2231", 101);
$quadroQuatro->addParticipantesCatProfissionalMunicipio("240810", "2251", 50);
$quadroQuatro->addParticipantesCatProfissionalMunicipio("240325", "2231", 30);
$quadroQuatro->addParticipantesCatProfissionalPontoTelessaude("2653982", "2251", 52);
$quadroQuatro->addParticipantesCatProfissionalPontoTelessaude("2408635", "2231", 52);
$quadroQuatro->addParticipantesCatProfissionalUF("23", "2251", 50);
$quadroQuatro->addParticipantesCatProfissionalUF("23", "2231", 30);



$quadroCinco = new QuadroCinco(13, 14, 15, 16);
$quadroCinco->addEvitacaoEncaminhamentoCatProfissional("2231", 55.5, 44.5); 
$quadroCinco->addEvitacaoEncaminhamentoCatProfissional("2251", 30.1, 69.9);
$quadroCinco->addCatProfissionaisFrequentes("2251"); //médicos clínicos
$quadroCinco->addCatProfissionaisFrequentes("2235"); // médicos
$quadroCinco->addEspecialidadesFrequentes("225125"); // médicos clínicos
$quadroCinco->addEspecialidadesFrequentes("223565"); //Enfermeiro da estrategia de saude da familia
$quadroCinco->addEspecialidadesFrequentes("225124");//Médico pediatra 
$quadroCinco->addResolucaoDuvida(80.0, 10.0, 5.0, 5.0); //sim, parcial, não e não sei
$quadroCinco->addSatisfacaoSolicitante("1", 60.0); //Muito Insatisfeito
$quadroCinco->addSatisfacaoSolicitante("2", 35.0);//Insatisfeito
$quadroCinco->addSatisfacaoSolicitante("3", 5.0); //Indiferente
$quadroCinco->addSatisfacaoSolicitante("4", 0.0); //Satisfeito
$quadroCinco->addSatisfacaoSolicitante("5", 0.0); //Muito Satisfeito
$quadroCinco->addTemasFrequentes("R05", "R05");
$quadroCinco->addTemasFrequentes("R070", "D11");

$quadroSeis = new QuadroSeis();
$quadroSeis->addAvaliacaoSatisfacaoObjetoAprendizagem("1", 60.0);
$quadroSeis->addAvaliacaoSatisfacaoObjetoAprendizagem("2", 35.0);
$quadroSeis->addAvaliacaoSatisfacaoObjetoAprendizagem("3", 5.0);
$quadroSeis->addAvaliacaoSatisfacaoParticipantes("1", 60.0);
$quadroSeis->addAvaliacaoSatisfacaoParticipantes("2", 35.0);
$quadroSeis->addAvaliacaoSatisfacaoParticipantes("3", 5.0);
$quadroSeis->addTemasFrequentesObjetoAprendizagem("1");
$quadroSeis->addTemasFrequentesObjetoAprendizagem("2");
$quadroSeis->addTemasFrequentesParticipacao("1");
$quadroSeis->addTemasFrequentesParticipacao("2");


// Agrupando os quadros de indicadores 
//código de identificação do núcleo da paltaforma integra é 3
$indicadorGeral = new IndicadorGeral(3, "012013", $quadroUm, $quadroDois, $quadroTres, $quadroQuatro, $quadroCinco, $quadroSeis);

// Criando as equipes de Saúde
$equipesSaude = new EquipesSaude();

//código de identificação do núcleo da paltaforma integra é 3 
$equipesSaude->addEquipeSaude("3", "1000", "","ABC123","2653982",null);
$equipesSaude->addEquipeSaude("3", "1001","", "ESF", "2653982",null);*/

	
	?>
	
		<!-- FORMULÁRIO DE CADASTRO -->
		<form action="<?php echo Util::setLink(array('db=1')) ?>" method="post" id="formInsertEdit" onsubmit="return test();">		
			
			<div class="row"><div id="validateBox" class="col-md-8 col-md-offset-2"></div></div>
			
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<h3>Selecione o tipo:</h3>
					<select id="tp_tipo" name="tp_tipo" class="form-control" onchange="changeTipo()">
						<option value="0">...</option>
						<option value="1" <?php echo (@$_POST['tp_tipo'] == '1' ? 'selected="selected"' : ''); ?>>Cadastro de Equipe</option>
						<option value="2" <?php echo (@$_POST['tp_tipo'] == '2' ? 'selected="selected"' : ''); ?>>Envio de Indicadores</option>
					</select>
				</div>
			</div>
			
			<br><br>
			
			<div id="box1" style="display:none;">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>Equipes Saúde</h2>
					<h3>Representa uma coleção de dados cadastrais de equipes de saúde</h3>					
				</div>
				<div style="padding-left:8px">
			
			
			
			<!--Quadro Um-->
			<div class="row">
				<div class="col-md-12">			
					<div class="row">
						<div class="col-md-12">
							Adiciona os dados cadastrais de uma equipe de saúde:
							<div class="row">
								<div class="col-md-12">
									<div class="table-responsive btMarginRight">
										<table class="table table-hover table-bordered">
											<thead>
												<tr class="btn-info">
													<th>Código núcleo</th>
													<th>~ Código equipe</th>
													<th>~ Código equipe INE</th>
													<th>Nome</th>
													<th>CNES estaelecimento</th>
													<th>~ Código tipo equipe</th>
												</tr>
											</thead>
											<tbody>
												<?php
												foreach($equipesSaude->lista_equipes_saude as $key=>$obj){
												?>
												<tr>
													<td><?php echo $obj->codigo_nucleo; ?></td>
													<td><?php echo @$obj->codigo_equipe; ?></td>
													<td><?php echo @$obj->codigo_equipe_ine; ?></td>
													<td><?php echo $obj->nome; ?></td>
													<td><?php echo $obj->cnes_estabelecimento; ?></td>
													<td><?php echo @$obj->codigo_tipo_equipe; ?></td>
												</tr>
												<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>					
				</div>
			</div>
			<!--Fim Quadro Um-->
			</div>
			</div>
			</div>
			
			<br><br>
			<div id="box2" style="display:none;">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>Indicador Geral</h2>
					<h3>Determina quais são os indicadores (quadros) a serem enviados</h3>					
				</div>
			<!--Indicador Geral-->
			<div style="padding-left:8px">
			<div class="row">
				<div class="col-md-12">			
					<div class="row">
						<div class="col-md-3">					
							<div class="row">
								<div class="col-md-12">
									Código núcleo:
									<input type="text" id="indicadorgeral_codigo_nucleo" name="indicadorgeral_codigo_nucleo" value="<?php echo $indicadorGeral->codigo_nucleo; ?>" class="form-control"/>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									Mês referência:
									<input type="text" id="indicadorgeral_mes_referencia" name="indicadorgeral_mes_referencia" value="<?php echo $indicadorGeral->mes_referencia; ?>" class="form-control"/>
								</div>
							</div>							
						</div>
						<div class="col-md-9">
							
							
						</div>
					</div>					
				</div>
			</div>
			<!--Fim Indicador Geral-->
			
			<!--Quadro Um-->
			<div class="row">
				<div class="col-md-12">			
					<div class="row">
						<div class="col-md-3">
							<h2>Quadro Um</h2>
						</div>
						<div class="col-md-9">						
							<h3>(Indicadores de estrutura para monitoramento e avaliação do Programa Nacional Telessaúde Brasil Redes)</h3>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">					
							<div class="row">
								<div class="col-md-12">
									Profissionais qualificados:
									<input type="text" id="quadroum_num_profissionais_qualificados" name="quadroum_num_profissionais_qualificados" value="<?php echo $quadroUm->num_profissionais_qualificados; ?>" class="form-control"/>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									Dispositivos móveis:
									<input type="text" id="quadroum_num_dispositivos_movel" name="quadroum_num_dispositivos_movel" value="<?php echo $quadroUm->num_dispositivos_movel; ?>" class="form-control"/>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									Dispositivos fixos:
									<input type="text" id="quadroum_num_dispositivos_fixo" name="quadroum_num_dispositivos_fixo" value="<?php echo $quadroUm->num_dispositivos_fixo; ?>" class="form-control"/>
								</div>
							</div>
						</div>
						<div class="col-md-9">
							Municípios - avaliação de estrutura:
							<div class="row">
								<div class="col-md-12">
									<div class="table-responsive btMarginRight">
										<table class="table table-hover table-bordered">
											<thead>
												<tr class="btn-info">
													<th>Código município</th>
													<th>UBS pontos implantação</th>
													<th>UBS pontos implantados</th>
													<th>Equipe saúde atendidas</th>
												</tr>
											</thead>
											<tbody>
												<?php
												foreach($quadroUm->avaliacao_estrutura_municipio as $key=>$obj){
												?>
												<tr>
													<td><?php echo $obj->codigo_municipio; ?></td>
													<td><?php echo $obj->num_ubs_pontos_em_implantacao; ?></td>
													<td><?php echo $obj->num_ubs_pontos_implantados; ?></td>
													<td><?php echo $obj->num_equipe_saude_atendidas; ?></td>
												</tr>
												<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							
							Municípios - profissionais registrados:
							<div class="row">
								<div class="col-md-12">
									<div class="table-responsive btMarginRight">
										<table class="table table-hover table-bordered">
											<thead>
												<tr class="btn-info">
													<th>Código município</th>
													<th>Código família CBO</th>
													<th>Número</th>													
												</tr>
											</thead>
											<tbody>
												<?php
												foreach($quadroUm->profissionais_registrados as $key=>$obj){
												?>
												<tr>
													<td><?php echo $obj->codigo_municipio; ?></td>
													<td><?php echo $obj->codigo_familia_cbo; ?></td>
													<td><?php echo $obj->numero; ?></td>													
												</tr>
												<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>					
				</div>
			</div>
			<!--Fim Quadro Um-->
			
			<!--Quadro Dois-->
			<div class="row">
				<div class="col-md-12">			
					<div class="row">
						<div class="col-md-3">
							<h2>Quadro Dois</h2>
						</div>
						<div class="col-md-9">						
							<h3>(Indicadores mínimos de processo para monitoramento e avaliação de Teleconsultoria)</h3>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">					
							<div class="row">
								<div class="col-md-12">
									Teleconsultas síncronas:
									<input type="text" id="quadrodois_num_sincronas" name="quadrodois_num_sincronas" value="<?php echo $quadroDois->num_sincronas; ?>" class="form-control"/>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									Teleconsultas assíncronas:
									<input type="text" id="quadrodois_num_assincronas" name="quadrodois_num_assincronas" value="<?php echo $quadroDois->num_assincronas; ?>" class="form-control"/>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									Pontos ativos:
									<input type="text" id="quadrodois_num_dispositivos_fixo" name="quadrodois_num_dispositivos_fixo" value="<?php echo $quadroDois->num_pontos_ativos; ?>" class="form-control"/>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									Percentual aprovado CIB:
									<input type="text" id="quadrodois_percentual_aprovado_cib" name="quadrodois_percentual_aprovado_cib" value="<?php echo $quadroDois->percentual_aprovado_cib; ?>" class="form-control"/>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									Teleconsultas respondidas - Ceará:
									<input type="text" id="quadrodois_solicitacoes_uf" name="quadrodois_solicitacoes_uf" value="<?php echo $quadroDois->solicitacoes_uf[0]->numero; ?>" class="form-control"/>
								</div>
							</div>
						</div>
						<div class="col-md-9">
							Teleconsultas por município respondidas:
							<div class="row">
								<div class="col-md-12">
									<div class="table-responsive btMarginRight">
										<table class="table table-hover table-bordered">
											<thead>
												<tr class="btn-info">
													<th>Código município</th>
													<th>Número</th>													
												</tr>
											</thead>
											<tbody>
												<?php
												foreach($quadroDois->solicitacoes_municipio as $key=>$obj){
												?>
												<tr>
													<td><?php echo $obj->codigo_municipio; ?></td>
													<td><?php echo $obj->numero; ?></td>													
												</tr>
												<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							
							Teleconsultas por equipe de saúde respondidas:
							<div class="row">
								<div class="col-md-12">
									<div class="table-responsive btMarginRight">
										<table class="table table-hover table-bordered">
											<thead>
												<tr class="btn-info">
													<th>~ Código equipe</th>
													<th>~ Código equipe INE</th>
													<th>Número</th>													
												</tr>
											</thead>
											<tbody>
												<?php
												foreach($quadroDois->solicitacoes_equipe as $key=>$obj){
												?>
												<tr>
													<td><?php echo @$obj->codigo_equipe; ?></td>
													<td><?php echo @$obj->codigo_equipe_ine; ?></td>
													<td><?php echo $obj->numero; ?></td>													
												</tr>
												<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							
							Teleconsultas por membro de gestão respondidas:
							<div class="row">
								<div class="col-md-12">
									<div class="table-responsive btMarginRight">
										<table class="table table-hover table-bordered">
											<thead>
												<tr class="btn-info">
													<th>~ CPF</th>
													<th>~ CNS</th>
													<th>Email</th>
													<th>Membro nome</th>
													<th>Número</th>
												</tr>
											</thead>
											<tbody>
												<?php
												foreach($quadroDois->solicitacoes_membro as $key=>$obj){
												?>
												<tr>
													<td><?php echo @$obj->codigo_cpf; ?></td>
													<td><?php echo @$obj->codigo_cns; ?></td>
													<td><?php echo $obj->email; ?></td>
													<td><?php echo $obj->membro_nome; ?></td>
													<td><?php echo $obj->numero; ?></td>
												</tr>
												<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							
							Teleconsultas por ponto de telessaúde respondidas
							<div class="row">
								<div class="col-md-12">
									<div class="table-responsive btMarginRight">
										<table class="table table-hover table-bordered">
											<thead>
												<tr class="btn-info">
													<th>Código ponto</th>
													<th>Número</th>
												</tr>
											</thead>
											<tbody>
												<?php
												foreach($quadroDois->solicitacoes_ponto as $key=>$obj){
												?>
												<tr>
													<td><?php echo $obj->codigo_ponto; ?></td>
													<td><?php echo $obj->numero; ?></td>
												</tr>
												<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							
							Total de solicitações por profissional respondidas:
							<div class="row">
								<div class="col-md-12">
									<div class="table-responsive btMarginRight">
										<table class="table table-hover table-bordered">
											<thead>
												<tr class="btn-info">
													<th>~ CPF</th>
													<th>~ CNS</th>
													<th>Nome</th>
													<th>Email</th>
													<th>Tipo</th>
													<th>CBO</th>
													<th>~ Código equipe</th>
													<th>~ Código equipe INE</th>
													<th>Número</th>
												</tr>
											</thead>
											<tbody>
												<?php
												foreach($quadroDois->solicitacoes_profissional as $key=>$obj){
												?>
												<tr>
													<td><?php echo @$obj->profissional_cpf; ?></td>
													<td><?php echo @$obj->profissional_codigo_cns; ?></td>
													<td><?php echo $obj->nome; ?></td>
													<td><?php echo $obj->profissional_email; ?></td>
													<td><?php echo $obj->codigo_tipo_profissional; ?></td>
													<td><?php echo $obj->codigo_cbo; ?></td>
													<td><?php echo @$obj->codigo_equipe; ?></td>
													<td><?php echo @$obj->codigo_equipe_ine; ?></td>
													<td><?php echo $obj->numero; ?></td>
												</tr>
												<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							
							Total de solicitações por profissional de saúde e por tema (CID e/ou CIAP2) respondidas:
							<div class="row">
								<div class="col-md-12">
									<div class="table-responsive btMarginRight">
										<table class="table table-hover table-bordered">
											<thead>
												<tr class="btn-info">
													<th>~ CPF</th>
													<th>~ CNS</th>
													<th>Email</th>
													<th>~ Código CID</th>
													<th>~ Código CIAP</th>
													<th>Número</th>
												</tr>
											</thead>
											<tbody>
												<?php
												foreach($quadroDois->solicitacoes_tema_profissional as $key=>$obj){
												?>
												<tr>
													<td><?php echo @$obj->profissional_cpf; ?></td>
													<td><?php echo @$obj->profissional_codigo_cns; ?></td>
													<td><?php echo $obj->profissional_email; ?></td>
													<td><?php echo @$obj->codigo_cid; ?></td>
													<td><?php echo @$obj->codigo_ciap; ?></td>
													<td><?php echo $obj->numero; ?></td>
												</tr>
												<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							
							Solicitações por categoria profissional respondidas:
							<div class="row">
								<div class="col-md-12">
									<div class="table-responsive btMarginRight">
										<table class="table table-hover table-bordered">
											<thead>
												<tr class="btn-info">
													<th>Código família CBO</th>
													<th>Número</th>
												</tr>
											</thead>
											<tbody>
												<?php
												foreach($quadroDois->solicitacoes_cat_profissional as $key=>$obj){
												?>
												<tr>
													<td><?php echo $obj->codigo_familia_cbo; ?></td>
													<td><?php echo $obj->numero; ?></td>
												</tr>
												<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							
						</div>
					</div>					
				</div>
			</div>
			<!--Fim Quadro Dois-->			
			
			<!--Quadro Três-->
			<div class="row">
				<div class="col-md-12">			
					<div class="row">
						<div class="col-md-3">
							<h2>Quadro Três</h2>
						</div>
						<div class="col-md-9">						
							<h3>(Indicadores mínimos de processo para monitoramento e avaliação de Telediagnóstico)</h3>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">					
							<div class="row">
								<div class="col-md-12">
									Pontos ativos:
									<input type="text" id="quadrotres_num_pontos_ativos" name="quadrotres_num_pontos_ativos" value="<?php echo $quadroTres->num_pontos_ativos; ?>" class="form-control"/>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									Percentual aprovado CIB:
									<input type="text" id="quadrotres_percentual_aprovado_cib" name="quadrotres_percentual_aprovado_cib" value="<?php echo $quadroTres->porcentual_aprovado_cib; ?>" class="form-control"/>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									Exame realizado e laudo enviado ao solicitado - Ceará:
									<input type="text" id="quadrotres_solicitacoes_telediagnostico_uf" name="quadrotres_solicitacoes_telediagnostico_uf" value="<?php echo $quadroTres->solicitacoes_telediagnostico_uf[0]->numero; ?>" class="form-control"/>
								</div>
							</div>
						</div>
						<div class="col-md-9">
							Exame realizado e laudo enviado ao solicitado por município:
							<div class="row">
								<div class="col-md-12">
									<div class="table-responsive btMarginRight">
										<table class="table table-hover table-bordered">
											<thead>
												<tr class="btn-info">
													<th>Código município</th>
													<th>Número</th>													
												</tr>
											</thead>
											<tbody>
												<?php
												foreach($quadroTres->solicitacoes_telediagnostico_municipio as $key=>$obj){
												?>
												<tr>
													<td><?php echo $obj->codigo_municipio; ?></td>
													<td><?php echo $obj->numero; ?></td>													
												</tr>
												<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							
							Exame realizado e laudo enviado ao solicitante por equipe:
							<div class="row">
								<div class="col-md-12">
									<div class="table-responsive btMarginRight">
										<table class="table table-hover table-bordered">
											<thead>
												<tr class="btn-info">
													<th>~ Código equipe</th>
													<th>~ Código equipe INE</th>
													<th>Número</th>													
												</tr>
											</thead>
											<tbody>
												<?php
												foreach($quadroTres->solicitacoes_telediagnostico_equipe as $key=>$obj){
												?>
												<tr>
													<td><?php echo @$obj->codigo_equipe; ?></td>
													<td><?php echo @$obj->codigo_equipe_ine; ?></td>
													<td><?php echo $obj->numero; ?></td>													
												</tr>
												<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							
							Exame realizado e laudo enviado ao solicitante por ponto de telessaúde:
							<div class="row">
								<div class="col-md-12">
									<div class="table-responsive btMarginRight">
										<table class="table table-hover table-bordered">
											<thead>
												<tr class="btn-info">
													<th>Código ponto</th>
													<th>Número</th>
												</tr>
											</thead>
											<tbody>
												<?php
												foreach($quadroTres->solicitacoes_telediagnostico_ponto as $key=>$obj){
												?>
												<tr>
													<td><?php echo $obj->codigo_ponto; ?></td>
													<td><?php echo $obj->numero; ?></td>
												</tr>
												<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							
							Exame realizado e laudo enviado ao solicitante por tipo (codigoSIA):
							<div class="row">
								<div class="col-md-12">
									<div class="table-responsive btMarginRight">
										<table class="table table-hover table-bordered">
											<thead>
												<tr class="btn-info">
													<th>Código SIA</th>
													<th>Número</th>
												</tr>
											</thead>
											<tbody>
												<?php
												foreach($quadroTres->solicitacoes_telediagnostico_tipo as $key=>$obj){
												?>
												<tr>
													<td><?php echo $obj->codigo_sia; ?></td>
													<td><?php echo $obj->numero; ?></td>
												</tr>
												<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>					
				</div>
			</div>
			<!--Fim Quadro Três-->
			
			<!--Quadro Quatro-->
			<div class="row">
				<div class="col-md-12">			
					<div class="row">
						<div class="col-md-3">
							<h2>Quadro Quatro</h2>
						</div>
						<div class="col-md-9">						
							<h3>(Indicadores mínimos de processo para monitoramento e avaliação de Tele-educação)</h3>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">					
							<div class="row">
								<div class="col-md-12">
									Quantidade disponibilizada ARES:
									<input type="text" id="quadroquatro_quantidade_disponibilizada_ares" name="quadroquatro_quantidade_disponibilizada_ares" value="<?php echo $quadroQuatro->quantidade_disponibilizada_ares; ?>" class="form-control"/>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									Pontos ativos:
									<input type="text" id="quadroquatro_num_pontos_ativos" name="quadroquatro_num_pontos_ativos" value="<?php echo $quadroQuatro->num_pontos_ativos; ?>" class="form-control"/>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									Atividades realizadas - Ceará:
									<input type="text" id="quadroquatro_atividades_realizadas_uf" name="quadroquatro_atividades_realizadas_uf" value="<?php echo $quadroQuatro->atividades_realizadas_uf[0]->numero; ?>" class="form-control"/>
								</div>
							</div>
						</div>
						<div class="col-md-9">
							Atividades realizadas por município:
							<div class="row">
								<div class="col-md-12">
									<div class="table-responsive btMarginRight">
										<table class="table table-hover table-bordered">
											<thead>
												<tr class="btn-info">
													<th>Código município</th>
													<th>Número</th>													
												</tr>
											</thead>
											<tbody>
												<?php
												foreach($quadroQuatro->atividades_realizadas_municipio as $key=>$obj){
												?>
												<tr>
													<td><?php echo $obj->codigo_municipio; ?></td>
													<td><?php echo $obj->numero; ?></td>													
												</tr>
												<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							
							Atividades realizadas por ponto de telessaúde:
							<div class="row">
								<div class="col-md-12">
									<div class="table-responsive btMarginRight">
										<table class="table table-hover table-bordered">
											<thead>
												<tr class="btn-info">
													<th>Código ponto</th>
													<th>Número</th>
												</tr>
											</thead>
											<tbody>
												<?php
												foreach($quadroQuatro->atividades_realizadas_ponto as $key=>$obj){
												?>
												<tr>
													<td><?php echo $obj->codigo_ponto; ?></td>
													<td><?php echo $obj->numero; ?></td>
												</tr>
												<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							
							Atividades realizdas por equipe:
							<div class="row">
								<div class="col-md-12">
									<div class="table-responsive btMarginRight">
										<table class="table table-hover table-bordered">
											<thead>
												<tr class="btn-info">
													<th>~ Código equipe</th>
													<th>~ Código equipe INE</th>
													<th>Número</th>													
												</tr>
											</thead>
											<tbody>
												<?php
												foreach($quadroQuatro->atividades_realizadas_equipe as $key=>$obj){
												?>
												<tr>
													<td><?php echo @$obj->codigo_equipe; ?></td>
													<td><?php echo @$obj->codigo_equipe_ine; ?></td>
													<td><?php echo $obj->numero; ?></td>													
												</tr>
												<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							
							Particpantes por categoriga profissional (codigoFamiliaCBO) por estado:
							<div class="row">
								<div class="col-md-12">
									<div class="table-responsive btMarginRight">
										<table class="table table-hover table-bordered">
											<thead>
												<tr class="btn-info">
													<th>Código UF</th>
													<th>Código família CBO</th>
													<th>Número</th>
												</tr>
											</thead>
											<tbody>
												<?php
												foreach($quadroQuatro->participantes_cat_profissional_uf as $key=>$obj){
												?>
												<tr>
													<td><?php echo $obj->codigo_uf; ?></td>
													<td><?php echo $obj->codigo_familia_cbo; ?></td>
													<td><?php echo $obj->numero; ?></td>
												</tr>
												<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							
							Particpantes por categoriga profissional (codigoFamiliaCBO) por município:
							<div class="row">
								<div class="col-md-12">
									<div class="table-responsive btMarginRight">
										<table class="table table-hover table-bordered">
											<thead>
												<tr class="btn-info">
													<th>Código município</th>
													<th>Código família CBO</th>
													<th>Número</th>
												</tr>
											</thead>
											<tbody>
												<?php
												foreach($quadroQuatro->participantes_cat_profissional_municipio as $key=>$obj){
												?>
												<tr>
													<td><?php echo $obj->codigo_municipio; ?></td>
													<td><?php echo $obj->codigo_familia_cbo; ?></td>
													<td><?php echo $obj->numero; ?></td>
												</tr>
												<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							
							Particpantes por categoriga profissional (codigoFamiliaCBO) por equipe:
							<div class="row">
								<div class="col-md-12">
									<div class="table-responsive btMarginRight">
										<table class="table table-hover table-bordered">
											<thead>
												<tr class="btn-info">
													<th>~ Código equipe</th>
													<th>~ Código equipe INE</th>
													<th>Código família CBO</th>
													<th>Número</th>
												</tr>
											</thead>
											<tbody>
												<?php
												foreach($quadroQuatro->participantes_cat_profissional_equipe as $key=>$obj){
												?>
												<tr>
													<td><?php echo @$obj->codigo_equipe; ?></td>
													<td><?php echo @$obj->codigo_equipe_ine; ?></td>
													<td><?php echo $obj->codigo_familia_cbo; ?></td>
													<td><?php echo $obj->numero; ?></td>
												</tr>
												<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							
							Particpantes por categoriga profissional (codigoFamiliaCBO) por ponto/mês (codigoPonto):
							<div class="row">
								<div class="col-md-12">
									<div class="table-responsive btMarginRight">
										<table class="table table-hover table-bordered">
											<thead>
												<tr class="btn-info">
													<th>Código ponto</th>
													<th>Código família CBO</th>
													<th>Número</th>
												</tr>
											</thead>
											<tbody>
												<?php
												foreach($quadroQuatro->participantes_cat_profissional_ponto as $key=>$obj){
												?>
												<tr>
													<td><?php echo $obj->codigo_ponto; ?></td>
													<td><?php echo $obj->codigo_familia_cbo; ?></td>
													<td><?php echo $obj->numero; ?></td>
												</tr>
												<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							
							Número global de acessos aos objetos de aprendizagem por estado, município, equipe e ponto/mês:
							<div class="row">
								<div class="col-md-12">
									<div class="table-responsive btMarginRight">
										<table class="table table-hover table-bordered">
											<thead>
												<tr class="btn-info">
													<th>Código UF</th>
													<th>Código município</th>
													<th>~ Código equipe</th>
													<th>~ Código equipe INE</th>
													<th>Código ponto</th>
													<th>Número</th>
												</tr>
											</thead>
											<tbody>
												<?php
												foreach($quadroQuatro->acessos_objetos_aprendizagem as $key=>$obj){
												?>
												<tr>
													<td><?php echo $obj->codigo_uf; ?></td>
													<td><?php echo $obj->codigo_municipio; ?></td>
													<td><?php echo @$obj->codigo_equipe; ?></td>
													<td><?php echo @$obj->codigo_equipe_ine; ?></td>
													<td><?php echo $obj->codigo_ponto; ?></td>
													<td><?php echo $obj->numero; ?></td>
												</tr>
												<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							
							Número global de acessos aos objetos de aprendizagem por município:
							<div class="row">
								<div class="col-md-12">
									<div class="table-responsive btMarginRight">
										<table class="table table-hover table-bordered">
											<thead>
												<tr class="btn-info">
													<th>Código município</th>
													<th>Número</th>
												</tr>
											</thead>
											<tbody>
												<?php
												foreach($quadroQuatro->acessos_objetos_aprendizagem_municipio as $key=>$obj){
												?>
												<tr>
													<td><?php echo $obj->codigo_municipio; ?></td>
													<td><?php echo $obj->numero; ?></td>
												</tr>
												<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							
							Número global de acessos aos objetos de aprendizagem por equipe:
							<div class="row">
								<div class="col-md-12">
									<div class="table-responsive btMarginRight">
										<table class="table table-hover table-bordered">
											<thead>
												<tr class="btn-info">
													<th>~ Código equipe</th>
													<th>~ Código equipe INE</th>
													<th>Número</th>
												</tr>
											</thead>
											<tbody>
												<?php
												foreach($quadroQuatro->acessos_objetos_aprendizagem_equipe as $key=>$obj){
												?>
												<tr>
													<td><?php echo @$obj->codigo_equipe; ?></td>
													<td><?php echo @$obj->codigo_equipe_ine; ?></td>
													<td><?php echo $obj->numero; ?></td>
												</tr>
												<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							
							Número global de acessos aos objetos de aprendizagem por ponto de telessaúde:
							<div class="row">
								<div class="col-md-12">
									<div class="table-responsive btMarginRight">
										<table class="table table-hover table-bordered">
											<thead>
												<tr class="btn-info">
													<th>Código ponto</th>
													<th>Número</th>
												</tr>
											</thead>
											<tbody>
												<?php
												foreach($quadroQuatro->acessos_objetos_aprendizagem_ponto as $key=>$obj){
												?>
												<tr>
													<td><?php echo $obj->codigo_ponto; ?></td>
													<td><?php echo $obj->numero; ?></td>
												</tr>
												<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							
							Número global de acessos aos objetos de aprendizagem por categoria profissional (codigoFamiliaCBO):
							<div class="row">
								<div class="col-md-12">
									<div class="table-responsive btMarginRight">
										<table class="table table-hover table-bordered">
											<thead>
												<tr class="btn-info">
													<th>Código família CBO</th>
													<th>Número</th>
												</tr>
											</thead>
											<tbody>
												<?php
												foreach($quadroQuatro->acessos_objetos_aprendizagem_cat_profissional as $key=>$obj){
												?>
												<tr>
													<td><?php echo $obj->codigo_familia_cbo; ?></td>
													<td><?php echo $obj->numero; ?></td>
												</tr>
												<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							
						</div>
					</div>					
				</div>
			</div>
			<!--Fim Quadro Quatro-->
			
			<!--Quadro Cinco-->
			<div class="row">
				<div class="col-md-12">			
					<div class="row">
						<div class="col-md-3">
							<h2>Quadro Cinco</h2>
						</div>
						<div class="col-md-9">						
							<h3>(Indicadores mínimos de resultados e avaliação para monitoramento de Teleconsultoria)</h3>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">					
							<div class="row">
								<div class="col-md-12">
									num_sof_enviada_bireme: ????
									<input type="text" id="quadrocinco_num_sof_enviada_bireme" name="quadrocinco_num_sof_enviada_bireme" value="<?php echo $quadroCinco->num_sof_enviada_bireme; ?>" class="form-control"/>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									Tempo médio síncronas:
									<input type="text" id="quadrocinco_tempo_medio_sincronas" name="quadrocinco_tempo_medio_sincronas" value="<?php echo $quadroCinco->tempo_medio_sincronas; ?>" class="form-control"/>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									Tempo médio assíncronas:
									<input type="text" id="quadrocinco_tempo_medio_assincronas" name="quadrocinco_tempo_medio_assincronas" value="<?php echo $quadroCinco->tempo_medio_assincronas; ?>" class="form-control"/>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									Percentual assíncrona resp_emmenos72: ????
									<input type="text" id="quadrocinco_percentual_assinc_resp_emmenos72" name="quadrocinco_percentual_assinc_resp_emmenos72" value="<?php echo $quadroCinco->percentual_assinc_resp_emmenos72; ?>" class="form-control"/>
								</div>
							</div>
						</div>
						<div class="col-md-9">
							Percentual de teleconsultorias respondidas em que houve satisfação do solicitante:
							<div class="row">
								<div class="col-md-12">
									<div class="table-responsive btMarginRight">
										<table class="table table-hover table-bordered">
											<thead>
												<tr class="btn-info">
													<th>Código escala likert</th>
													<th>Percentual</th>													
												</tr>
											</thead>
											<tbody>
												<?php
												foreach($quadroCinco->satisfacao_solicitante as $key=>$obj){
												?>
												<tr>
													<td><?php echo $obj->codigo_escala_likert; ?></td>
													<td><?php echo $obj->percentual; ?></td>													
												</tr>
												<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							
							Percentual de teleconsultorias respondidas em que houve resolução da dúvida (sim, parcialmente, não, não sei):
							<div class="row">
								<div class="col-md-12">
									<div class="table-responsive btMarginRight">
										<table class="table table-hover table-bordered">
											<thead>
												<tr class="btn-info">
													<th>Percentual sim</th>
													<th>Percentual parcial</th>
													<th>Percentual não</th>
													<th>Percentual não sei</th>
												</tr>
											</thead>
											<tbody>
												<?php
												foreach($quadroCinco->resolucao_duvida as $key=>$obj){
												?>
												<tr>
													<td><?php echo $obj->percentual_sim; ?></td>
													<td><?php echo $obj->percentual_parcial; ?></td>
													<td><?php echo $obj->percentual_nao; ?></td>
													<td><?php echo $obj->percentual_nao_sei; ?></td>
												</tr>
												<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							
							Lista dos 10 temas mais frequentes das solicitações de teleconsultorias respondidas:
							<div class="row">
								<div class="col-md-12">
									<div class="table-responsive btMarginRight">
										<table class="table table-hover table-bordered">
											<thead>
												<tr class="btn-info">
													<th>Código CID</th>
													<th>Código CIAP</th>																										
												</tr>
											</thead>
											<tbody>
												<?php
												foreach($quadroCinco->temas_frequentes as $key=>$obj){
												?>
												<tr>
													<td><?php echo $obj->codigo_cid; ?></td>
													<td><?php echo $obj->codigo_ciap; ?></td>													
												</tr>
												<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							
							Categoria profissional dos teleconsultores mais frequentes entre as solicitações de telconsultorias respondidas:
							<div class="row">
								<div class="col-md-12">
									<div class="table-responsive btMarginRight">
										<table class="table table-hover table-bordered">
											<thead>
												<tr class="btn-info">
													<th>Código família CBO</th>													
												</tr>
											</thead>
											<tbody>
												<?php
												foreach($quadroCinco->cat_profissionais_frequentes as $key=>$obj){
												?>
												<tr>
													<td><?php echo $obj->codigo_familia_cbo; ?></td>													
												</tr>
												<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							
							Especialidades dos teleconsultores mais frequentes entre as solicitações de telconsultorias respondidas:
							<div class="row">
								<div class="col-md-12">
									<div class="table-responsive btMarginRight">
										<table class="table table-hover table-bordered">
											<thead>
												<tr class="btn-info">
													<th>Código CBO</th>													
												</tr>
											</thead>
											<tbody>
												<?php
												foreach($quadroCinco->especialidades_frequentes as $key=>$obj){
												?>
												<tr>
													<td><?php echo $obj->codigo_cbo; ?></td>													
												</tr>
												<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							
							% teleconsultorias respondidas que havia intenção de encaminhar paciente em que houve evitação de encaminhamentos:
							<div class="row">
								<div class="col-md-12">
									<div class="table-responsive btMarginRight">
										<table class="table table-hover table-bordered">
											<thead>
												<tr class="btn-info">
													<th>Código família CBO</th>
													<th>Percentual sim</th>
													<th>Percentual não</th>
												</tr>
											</thead>
											<tbody>
												<?php
												foreach($quadroCinco->evitacao_encaminhamentos as $key=>$obj){
												?>
												<tr>
													<td><?php echo $obj->codigo_familia_cbo; ?></td>
													<td><?php echo $obj->percentual_sim; ?></td>
													<td><?php echo $obj->percentual_nao; ?></td>
												</tr>
												<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>					
				</div>
			</div>
			<!--Fim Quadro Cinco-->
			
			<!--Quadro Seis-->
			<div class="row">
				<div class="col-md-12">			
					<div class="row">
						<div class="col-md-3">
							<h2>Quadro Seis</h2>
						</div>
						<div class="col-md-9">						
							<h3>(Indicadores de resultados e avaliação para a Tele-educação)</h3>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							Até 5 temas com maior participação por mês:
							<div class="row">
								<div class="col-md-12">
									<div class="table-responsive btMarginRight">
										<table class="table table-hover table-bordered">
											<thead>
												<tr class="btn-info">
													<th>Código desc bireme ????</th>													
												</tr>
											</thead>
											<tbody>
												<?php
												foreach($quadroSeis->temas_frequentes_participacao as $key=>$obj){
												?>
												<tr>
													<td><?php echo $obj->codigo_decs_bireme; ?></td>													
												</tr>
												<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							
							Avaliação global da satisfação dos profissionais participantes do mês:
							<div class="row">
								<div class="col-md-12">
									<div class="table-responsive btMarginRight">
										<table class="table table-hover table-bordered">
											<thead>
												<tr class="btn-info">
													<th>Código escala likert</th>
													<th>Percentual</th>
												</tr>
											</thead>
											<tbody>
												<?php
												foreach($quadroSeis->avaliacao_satisfacao_participantes as $key=>$obj){
												?>
												<tr>
													<td><?php echo $obj->codigo_escala_likert; ?></td>
													<td><?php echo $obj->percentual; ?></td>													
												</tr>
												<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							
							Até 5 temas mais acessados, por objetos de aprendizagem:
							<div class="row">
								<div class="col-md-12">
									<div class="table-responsive btMarginRight">
										<table class="table table-hover table-bordered">
											<thead>
												<tr class="btn-info">
													<th>Código desc bireme ????</th>													
												</tr>
											</thead>
											<tbody>
												<?php
												foreach($quadroSeis->temas_frequntes_objeto_aprendizagem as $key=>$obj){
												?>
												<tr>
													<td><?php echo $obj->codigo_decs_bireme; ?></td>													
												</tr>
												<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							
							Avaliação global da satisfação profissional com os objetos de aprendizagem por mês:
							<div class="row">
								<div class="col-md-12">
									<div class="table-responsive btMarginRight">
										<table class="table table-hover table-bordered">
											<thead>
												<tr class="btn-info">
													<th>Código escala likert</th>
													<th>Percentual</th>													
												</tr>
											</thead>
											<tbody>
												<?php
												foreach($quadroSeis->avaliacao_satisfacao_objeto_aprendizagem as $key=>$obj){
												?>
												<tr>
													<td><?php echo $obj->codigo_escala_likert; ?></td>
													<td><?php echo $obj->percentual; ?></td>													
												</tr>
												<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>							
						</div>
					</div>					
				</div>
			</div>
			<!--Fim Quadro Seis-->
			</div>
			</div>
			</div>
			
			
			
			
			
			<br>
			
			<div class="row">
				<div class="col-md-6 col-md-offset-3 text-center">
					<button id="btInsertEdit" type="submit" class="btn btn-success text-center">Salvar</button>
					<img class="loader" src="assets/loading.gif"/>
				</div>
			</div>
			
			<br>
			
		</form>
	
	<?php } ?>

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