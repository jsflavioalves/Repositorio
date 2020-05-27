04872401387
01785766384
01253988676
80631908315
02464432350
01227685319
04180695499

--Inserindo tb_usuario
INSERT INTO tb_usuario(nm_usuario, nm_login, nm_senha, ds_email, fl_sexo, fl_ativo, tp_nivelacesso, fl_profissional)
	--testar antes...
select	upper(tal.profissional_nome),
		tal.profissional_cpf,
		md5('123456'),
		tal.profissional_emails,
		case tal.profissional_sexo when 'M' then 1 when 'F' then 2 end,
		true,
		1,
		true
from integracao.tb_aluno_lais tal
where profissional_cpf in(
'04872401387',
'01785766384',
'01253988676',
'80631908315',
'02464432350',
'01227685319',
'04180695499'
)

--Inserindo profissoes
INSERT INTO public.tb_profissao (nm_profissao, nm_registro, nr_familia_cbo)
	--testar antes...
select	upper(tal.ocupacao_nome),
		null,
		tal.ocupacao_codigo
from integracao.tb_aluno_lais tal
where profissional_cpf in(
'04872401387',
'01785766384',
'01253988676',
'80631908315',
'02464432350',
'01227685319',
'04180695499'
)
group by 1,2,3


--Inserindo profissoes do smart
INSERT INTO public.tb_profissao (nm_profissao, nm_registro, nr_familia_cbo)
select 
	upper(nome),
	null,
	codigo
from integracao.tb_especialidade_cbo 
where codigo in(
--CBOs...
)


--Inserindo tb_profissional
INSERT INTO tb_profissional(ci_profissional, cd_profissao, cd_localidade, nr_cpf, nr_rg, ds_orgao_emissor, nr_cep, nr_telefone1, dt_nascimento)
	--testar antes...
select	(select ci_usuario from tb_usuario where nm_login = tal.profissional_cpf),
		(select ci_profissao from tb_profissao where nr_familia_cbo = tal.ocupacao_codigo),
		(select itm.cd_localidade from integracao.tb_estabelecimento ite
		inner join integracao.tb_municipio itm on(ite.codigo_municipio::integer=itm.codigo)
		where ite.codigo_cnes = tal.estabelecimento_cnes),	
		substr(tal.profissional_cpf, 1, 3) || '.' || substr(tal.profissional_cpf, 4, 3) || '.' || substr(tal.profissional_cpf, 7, 3) || '-' || substr(tal.profissional_cpf, 10, 2),
		tal.profissional_municipio_nascimento_unidade_frg_codigo,
		tal.profissional_municipio_nascimento_unidade_frg_nome,
		tal.profissional_cep_moradia,
		tal.profissional_telefones,
		case 
			when tal.profissional_data_nascimento = '' then null 
			else to_date(tal.profissional_data_nascimento, 'YYYY-MM-DD') end		
from integracao.tb_aluno_lais tal
where profissional_cpf in(
'04872401387',
'01785766384',
'01253988676',
'80631908315',
'02464432350',
'01227685319',
'04180695499'
)


--Inserindo integracao.tb_profissional
INSERT INTO integracao.tb_profissional(cpf, cns, nome, codigo_cbo, equipe_codigo_ine, estabelecimento_codigo_cnes, fl_alterado)
	--testar antes...
select	tal.profissional_cpf,
		tal.profissional_cns,
		upper(tal.profissional_nome),
		tal.ocupacao_codigo,
		tal.equipe_ine,
		tal.estabelecimento_cnes,
		1
from integracao.tb_aluno_lais tal
where profissional_cpf in(
'04872401387',
'01785766384',
'01253988676',
'80631908315',
'02464432350',
'01227685319',
'04180695499'
)







select *
from tb_profissional tp
inner join tb_usuario tu on(tu.ci_usuario=tp.ci_profissional)
where replace(replace(nr_cpf, '.', ''), '-', '') in (
'04223182307'
)


