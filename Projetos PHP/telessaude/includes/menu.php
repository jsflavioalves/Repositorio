<?php
defined('EXEC') or die();	
?>
<ul class="nav navbar-nav">  
	<?php if($auth->isProfissional()){ ?>
		<?php if($auth->isOn('solicitante_exame') || $auth->isOn('solicitante_2_op_form')){ ?>			
			<li><a href="?page=addteleconsulta">Teleconsultoria</a></li>
		<?php } ?>
		<?php if($auth->isOn('especialista_exame') || $auth->isOn('especialista_2_op_form')){ ?>
			<li><a href="?page=laudar">Laudos</a></li>
		<?php } ?>		
		<li><a href="?page=historico">Histórico</a></li>
	<?php } ?>
	<?php echo ($auth->isRead('paciente') ? '<li><a href="?page=paciente">Pacientes</a></li>' : '' ); ?>
	<?php if($auth->isAdmin() || $auth->isOn('especialidade') || $auth->isOn('duvida') || $auth->isOn('orientacao')){ ?>
	<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Tabelas Auxiliares <b class="caret"></b></a>
			<ul class="dropdown-menu">
					<li><a href="?page=duvida">Dúvidas</a></li>
					<li><a href="?page=especialidade">Especialidades</a></li>
					<li><a href="?page=orientacao">Orientações</a></li>
					<!--<li><a href="?page=programa">Programas</a></li>-->
			</ul>
	</li>
	<?php } ?>

	<?php 
	if($auth->isOn('rel_teleconsultas_-_listagem_detalhada')
		|| $auth->isOn('rel_teleconsultas_-_finalizadas_por_municipios')
		|| $auth->isOn('rel_teleconsultas_-_finalizadas_por_especialistas')
		|| $auth->isOn('rel_teleconsultas_-_pendentes')
		|| $auth->isOn('rel_especialistas')) { ?>
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Relatórios <b class="caret"></b></a>
			<ul class="dropdown-menu">
				<?php if($auth->isOn('rel_teleconsultas_-_listagem_detalhada')) { ?>
					<li><a href="?page=relatorio/teleconsulta_listagem_detalhada">Teleconsultas - Listagem Detalhada</a></li>
				<?php } ?>
				<?php if($auth->isOn('rel_teleconsultas_-_finalizadas_por_municipios')) { ?>
					<li><a href="?page=relatorio/teleconsulta_finalizada_por_municipio">Teleconsultas - Listagem Municípios (Finalizadas)</a></li>					
				<?php } ?>
				<?php if($auth->isOn('rel_teleconsultas_-_finalizadas_por_especialistas')) { ?>
					<li><a href="?page=relatorio/teleconsulta_listagem_especialista">Teleconsultas - Listagem Especialistas (Finalizadas)</a></li>
				<?php } ?>
				<?php if($auth->isOn('rel_teleconsultas_-_pendentes')) { ?>
					<li><a href="?page=relatorio/teleconsulta_pendente">Teleconsultas - Pendentes</a></li>
				<?php } ?>
				<?php if($auth->isOn('rel_especialistas')) { ?>
					<li><a href="?page=relatorio/especialistas">Especialistas</a></li>
				<?php } ?>
			</ul>
		</li>
	<?php } ?>	

	<?php if($auth->isOn('auditoria_teleconsulta')){ ?>
		<li><a href="?page=auditoria/teleconsultas">Auditoria Teleconsultas</a></li>
	<?php } ?>	
	<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Opções <b class="caret"></b></a>
			<ul class="dropdown-menu">
					<li><a href="?page=acesso/alterar-senha">Alterar Senha</a></li>
					<?php echo ($auth->isProfissional() ? '<li><a href="?page=editardados">Editar Dados</a></li>' : '' ); ?>
					<?php echo ($auth->isRead('usuario') ? '<li><a href="?page=acesso/usuario">Usuários</a></li>' : '' ); ?>
					<?php echo ($auth->isAdmin() ? '<li><a href="?page=acesso/grupo">Grupos</a></li>' : '' ); ?>
					<?php echo ($auth->isAdmin() ? '<li><a href="?page=integracao">Integração Ministério</a></li>' : '' ); ?>
					<?php echo ($auth->isAdmin() ? '<li><a href="?page=integra_alunos_lais">Integração Alunos LAIS</a></li>' : '' ); ?>
					<?php echo ($auth->isAdmin() ? '<li><a href="?page=cursos">Cursos</a></li>' : '' ); ?>
					<?php echo ($auth->isOn('dados_municipios') ? '<li><a href="dadosmunicipio/">Dados Municípios CE</a></li>' : '' ); ?>
					<?php echo ($auth->isMaster() ? '<li><a href="?page=acesso/transacao">Transações</a></li>' : '' ); ?>
			</ul>
	</li>
	<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Certificados <b class="caret"></b></a>
			<ul class="dropdown-menu">
					<?php // echo ($auth->isRead('usuario') ? '<li><a href="?page=acesso/certificado">Imprimir Certificados</a></li>' : '' ); ?>
					<?php echo ($auth->isMaster() ? '<li><a href="?page=acesso/impCSV">Importar CSV</a></li>': ''); ?>
					<?php echo ($auth->isMaster() ? '<li><a href="?page=acesso/montacertificado">Montar Certificados</a></li>': ''); ?>					
					<?php echo ('<li><a href="?page=acesso/certificado">Imprimir Certificados</a></li>'); ?>
			</ul>
	</li>
</ul>