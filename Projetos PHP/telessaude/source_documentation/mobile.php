<?php
//	REQUEST
//	==OPERATIONS==
//	1 - Authentication

//	MESSAGE
//	==CODE==
//	0 - Error
//	1 - Success
//	==TYPES==
//	1 - String

// Check valid request
if (!@$_POST['op']) {
	exit;
}

define('ATITUDE_BASE', getcwd());
define('OPERATION_AUTH', 1);
define('OPERATION_REFRESH', 2);
define('SUCESSO', 1);
define('FALHA', 0);
require_once('includes/frameworkmobile.php');

$msg = array(	'code' 	=> FALHA,
				'data'	=> '');

switch ($_POST['op']) {

	case OPERATION_REFRESH:
	
		// Verificação de segurança, se este profissional está na base
		$cd_profissional_app 	= $_POST['cd_p'];
		$dt_data_app			= $_POST['dt_d'];
		$queryVerifica = query('select ci_mobile_log from tb_mobile_log where cd_profissional = '.$cd_profissional_app.' limit 1');
		if ($queryVerifica->rowCount() > 0){
		
			// Verificando teleconsultas a serem atualizadas
			$sqlTeleconsultasAtualizadas = "select distinct cd_teleconsulta from tb_mobile_teleconsulta where cd_profissional = $cd_profissional_app and dt_data >= '$dt_data_app'";
			$sqlTeleconsulta = 'select	ci_teleconsulta, 
					cd_profissional_especialista, 
					cd_localidade,
					cd_especialidade,
					cd_categoria_cid,
					cd_duvida,
					cd_orientacao,
					tp_status,
					ds_solicitacao,
					ds_resposta,
					to_char(dt_solicitacao, \'dd/mm/yyyy às HH24:MI\') as dt_solicitacao
			from tb_teleconsulta
			where ci_teleconsulta in('.$sqlTeleconsultasAtualizadas.')';
			$teleconsulta = query($sqlTeleconsulta)->fetchAll();
			$sqlProfissional = 'select tu.ci_usuario as ci, tu.nm_usuario || \' - \' || tpro.nm_profissao as nm from tb_usuario tu
			inner join tb_profissional tp on(tu.ci_usuario=tp.ci_profissional)
			inner join tb_profissao tpro on(tp.cd_profissao=tpro.ci_profissao)
			where tu.ci_usuario in(select distinct cd_profissional_especialista	
			from tb_teleconsulta
			where ci_teleconsulta in('.$sqlTeleconsultasAtualizadas.')) order by 1';
			$profissional = query($sqlProfissional)->fetchAll();			
			$sqlTeleconsultaResp = 'select 	ci_teleconsulta_resposta as ci, 
				cd_teleconsulta as cd_t, 
				cd_profissional as cd_p, 
				ds_resposta as ds,
				to_char(dt_resposta, \'dd/mm/yyyy às HH24:MI\') as dt 
			from tb_teleconsulta_resposta 
			where cd_teleconsulta in('.$sqlTeleconsultasAtualizadas.') order by 1';
			$teleconsultaResp = query($sqlTeleconsultaResp)->fetchAll();
			$sqlFile = 'select 	ci_file as ci,
				cd_usuario as cd_u,
				cd_teleconsulta as cd_t,
				nm_file as nm,
				tp_tipo as tp,
				ds_tamanho as ds_t,
				dt_data as dt
			from tb_file where cd_teleconsulta in('.$sqlTeleconsultasAtualizadas.')';
			$files = query($sqlFile)->fetchAll();
			$sqlLocalidade = 'select tl.ci_localidade as ci, tl.sg_estado || \' - \' || tl.ds_localidade as nm from tb_teleconsulta tt 
				inner join tb_localidade tl on(tt.cd_localidade=tl.ci_localidade)
				where tt.ci_teleconsulta in('.$sqlTeleconsultasAtualizadas.') group by 1,2';
			$localidade = query($sqlLocalidade)->fetchAll();
			$rowData = query('select now()::timestamp as data')->fetch();
			
			// Criando mensagem
			$msg['code'] = SUCESSO;
			$msg['data'] = array(	'teleconsulta'		=>	$teleconsulta,
									'profissional'		=>	$profissional,
									'teleconsultaresp'	=>	$teleconsultaResp,
									'files'				=>	$files,
									'localidade'		=>	$localidade,
									'data'				=>	$rowData['data']);
			
			// Atualiza as teleconsultas enviadas
			// execute('update tb_mobile_teleconsulta set fl_update = true where cd_profissional = '.$cd_profissional_app);
		}
		
		break;
	case OPERATION_AUTH:
	
		if (@$_POST['user'] && @$_POST['pass']) {
			$user = strtoupper(addslashes($_POST['user']));
			$pass = addslashes($_POST['pass']);
			$row = query("select ci_usuario, nm_usuario from tb_usuario where nm_login = '$user' and nm_senha = md5('$pass')")->fetch();
			if ($row['ci_usuario']) {				
				
				// Configurações
				$rowData = query('select now()::timestamp as data')->fetch();
				$config = array(	'cd_profissional'	=>	$row['ci_usuario'],
									'nm_profissional'	=>	$row['nm_usuario'],
									'dt_data'			=>	$rowData['data']);
				// Especialidades
				$especialidade = query('select ci_especialidade as ci, nm_especialidade as nm from tb_especialidade order by 1')->fetchAll();
				
				// Dúvidas
				$duvida = query('select ci_duvida as ci, nm_duvida as nm from tb_duvida order by 1')->fetchAll();
				
				// Orientações
				$orientacao = query('select ci_orientacao as ci, nm_orientacao as nm from tb_orientacao order by 1')->fetchAll();
				
				// Localidades
				$sql = "select tl.ci_localidade as ci, tl.sg_estado || ' - ' || tl.ds_localidade as nm from tb_teleconsulta tt 
				inner join tb_localidade tl on(tt.cd_localidade=tl.ci_localidade)
				where tt.tp_tipo = 2 and tt.cd_profissional_solicitante = ".$row['ci_usuario'].' group by 1,2';
				$localidade = query($sql)->fetchAll();
				
				// Profissionais
				$sqlProfissional = "select tu.ci_usuario as ci, tu.nm_usuario || ' - ' || tpro.nm_profissao as nm from tb_usuario tu
				inner join tb_profissional tp on(tu.ci_usuario=tp.ci_profissional)
				inner join tb_profissao tpro on(tp.cd_profissao=tpro.ci_profissao)
				where tu.ci_usuario in(select	cd_profissional_especialista
				from tb_teleconsulta
				where tp_tipo = 2 and cd_profissional_solicitante = ".$row['ci_usuario']." group by 1)";
				$profissional = query($sqlProfissional)->fetchAll();
				
				// Localidades do Profissional
				$sql = "select tl.ci_localidade as ci, tl.sg_estado || ' - ' || tl.ds_localidade as nm
				from tb_profissional_localidade tpl
				inner join tb_localidade tl on(tpl.cd_localidade=tl.ci_localidade)
				where tpl.cd_profissional = ".$row['ci_usuario'].' group by 1,2';
				$localidadeProfissional = query($sql)->fetchAll();
				
				// Especialidades do Profissional
				$sql = "select te.ci_especialidade as ci, te.nm_especialidade as nm 
				from tb_profissional_especialidade tpe
				inner join tb_especialidade te on(tpe.cd_especialidade=te.ci_especialidade)
				where tpe.cd_profissional = ".$row['ci_usuario'].' group by 1,2';
				$especialidadeProfissional = query($sql)->fetchAll();
				
				// Teleconsultas
				$sqlTeleconsulta = 'select	ci_teleconsulta, 
					cd_profissional_especialista, 
					cd_localidade,
					cd_especialidade,
					cd_categoria_cid,
					cd_duvida,
					cd_orientacao,
					tp_status,
					ds_solicitacao,
					ds_resposta,
					to_char(dt_solicitacao, \'dd/mm/yyyy às HH24:MI\') as dt_solicitacao
				from tb_teleconsulta
				where tp_tipo = 2 and cd_profissional_solicitante = '.$row['ci_usuario'].' order by 1';
				$teleconsulta = query($sqlTeleconsulta)->fetchAll();
				
				// Respostas das Teleconsultas
				$sqlTeleconsultaResp = 'select 	ci_teleconsulta_resposta as ci, 
					cd_teleconsulta as cd_t, 
					cd_profissional as cd_p, 
					ds_resposta as ds,
					to_char(dt_resposta, \'dd/mm/yyyy às HH24:MI\') as dt 
				from tb_teleconsulta_resposta 
				where cd_teleconsulta in(select ci_teleconsulta
				from tb_teleconsulta
				where tp_tipo = 2 and cd_profissional_solicitante = '.$row['ci_usuario'].')
				order by 1';
				$teleconsultaResp = query($sqlTeleconsultaResp)->fetchAll();
				
				// Arquivos das Teleconsultas
				$sqlFile = 'select 	ci_file as ci,
				cd_usuario as cd_u,
				cd_teleconsulta as cd_t,
				nm_file as nm,
				tp_tipo as tp,
				ds_tamanho as ds_t,
				dt_data as dt
				from tb_file where cd_teleconsulta in(select ci_teleconsulta from tb_teleconsulta
				where tp_tipo = 2 and cd_profissional_solicitante = '.$row['ci_usuario'].')';
				$files = query($sqlFile)->fetchAll();
				
				// Criando mensagem
				$msg['code'] = SUCESSO;
				$msg['data'] = array(	'config'			=>	$config,
										'especialidade'		=>	$especialidade,
										'duvida'			=>	$duvida,
										'orientacao'		=>	$orientacao,
										'localidade'		=>	$localidade,
										'profissional'		=>	$profissional,
										'localidadeP'		=>	$localidadeProfissional,
										'especialidadeP'	=>	$especialidadeProfissional,
										'teleconsulta'		=>	$teleconsulta,
										'teleconsultaresp'	=>	$teleconsultaResp,
										'files'				=>	$files);
				
				// Atualizando a entidade tb_mobile_log
				execute('insert into tb_mobile_log(cd_profissional) values('.$row['ci_usuario'].');');
			}
		}
		
		break;
}

// Convert and send message
try {
	$json = json_encode($msg);
}
catch (Exception $e) {
	$json = '{"code":0,"data":"Error"}';
}
echo $json;
?>