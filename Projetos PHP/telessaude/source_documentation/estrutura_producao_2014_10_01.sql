LEGENDA
	tb	=	tabela
	ci	=	código
	cd	=	chave estrangeira
	nm	=	nome
	nr	=	número
	fl	= 	bandeira sim ou não
	tp	=	tipo
	ds	=	descrição
	dt	=	data	

tb_categoria_cid
	ci_categoria_cid
	nr_categoria_cid
	nm_categoria_cid
	
tb_duvida
	ci_duvida
	nm_duvida
	
tb_especialidade
	ci_especialidade
	nm_especialidade
	fl_exame
	fl_online
	
tb_file
	ci_file
	cd_usuario
	cd_teleconsulta
	nm_file
	tp_tipo
	nr_tamanho
	ds_tamanho
	nr_versao
	ds_descricao
	dt_data
	
tb_grupo
	ci_grupo
	nm_grupo
	ds_descricao
	dt_cadastro
	
tb_grupo_transacao
	ci_grupo_transacao
	cd_grupo
	cd_transacao
	fl_inserir
	fl_alterar
	fl_deletar
	dt_cadastro
	
tb_localidade
	ci_localidade
	sg_estado
	ds_localidade
	tipo
	situacao
	
tb_orientacao
	ci_orientacao
	nm_orientacao
	
tb_paciente
	ci_paciente
	cd_localidade
	nm_paciente
	nr_cpf
	nr_rg
	ds_orgao_emissor
	fl_sexo
	nr_codigo
	ds_endereco
	ds_complemento
	ds_bairro
	nr_numero
	nr_cep
	nr_telefone1
	nr_telefone2
	ds_email
	dt_nascimento
	dt_cadastro
	cd_usuario_insert
	cd_usuario_update
	
tb_profissao
	ci_profissao
	nm_profissao
	nm_registro
	
tb_profissional
	ci_profissional
	cd_profissao
	cd_localidade
	nr_cpf
	nr_rg
	ds_orgao_emissor
	nr_registro
	ds_endereco
	ds_complemento
	ds_bairro
	nr_numero
	nr_cep
	nr_telefone1
	nr_telefone2
	nr_telefone3
	dt_nascimento
	nr_cnes
	
tb_profissional_especialidade
	ci_profissional_especialidade
	cd_profissional
	cd_especialidade
	
tb_profissional_localidade
	ci_profissional_localidade
	cd_profissional
	cd_localidade

tb_subcategoria_cid
	ci_subcategoria_cid
	cd_categoria_cid
	nr_subcategoria_cid
	nm_subcategoria_cid
	nr_categoria_cid
	
tb_teleconsulta
	ci_teleconsulta
	cd_profissional_solicitante
	cd_profissional_especialista
	cd_paciente
	cd_localidade
	cd_especialidade
	cd_categoria_cid
	cd_subcategoria_cid
	cd_duvida
	cd_orientacao
	tp_tipo
	tp_status
	ds_solicitacao
	dt_solicitacao
	ds_resposta
	dt_resposta
	ds_medicamento
	fl_urgencia
	fl_inconclusivo
	
tb_teleconsulta_resposta
	ci_teleconsulta_resposta
	cd_teleconsulta
	cd_profissional
	ds_resposta
	dt_resposta
	
tb_transacao
	ci_transacao
	nm_transacao
	nm_label
	tp_tipo
	ds_descricao
	
tb_usuario
	ci_usuario
	tp_nivelacesso
	nm_usuario
	nm_login
	nm_senha
	ds_email
	fl_sexo
	fl_atualizousenha
	fl_ativo
	fl_profissional
	dt_cadastro
	dt_acesso
	
tb_usuario_grupo
	ci_usuario_grupo
	cd_usuario
	cd_grupo
	

