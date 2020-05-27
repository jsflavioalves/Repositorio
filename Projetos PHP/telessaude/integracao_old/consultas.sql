--2159 => este usuário estava lotado em irapua






--QUADRO 1
--$num_profissionais_qualificados
select count(*)
from tb_usuario tu 
inner join tb_profissional tp on(tu.ci_usuario=tp.ci_profissional)
where tu.fl_ativo = true
  and tu.fl_profissional = true

--QUADRO 1 - addProfissionaisRegistrados
--select sum(foo.count) from (
select itm.codigo, tpro.nr_familia_cbo, count(*), 
'$quadroUm->addProfissionaisRegistrados("' || itm.codigo || '", "' || tpro.nr_familia_cbo || '", ' || count(*) || ');' as linha
from tb_usuario tu
inner join tb_profissional tp on(tu.ci_usuario=tp.ci_profissional)
inner join tb_profissao tpro on(tp.cd_profissao=tpro.ci_profissao)
inner join tb_profissional_localidade tpl on(tp.ci_profissional=tpl.cd_profissional)
inner join tb_localidade tl on(tpl.cd_localidade=tl.ci_localidade)
inner join integracao.tb_municipio itm on(tl.ci_localidade=itm.cd_localidade)
where tu.fl_ativo = true
  and tu.fl_profissional = true
group by 1,2
order by 1
--) as foo



-------------------------------------------------------------------------------------------------
--QUADRO 2 - Teleconsultas assíncronas
select count(*)
from tb_teleconsulta tt
where tt.tp_tipo = 2
  and tt.tp_status = 4
  and extract(year from dt_resposta) = 2016
  and extract(month from dt_resposta) = 03


--QUADRO 2 - Teleconsulta por município respondidas - (addSolicitacoesMunicipio)
--select sum(foo.count) from (
select itm.codigo, count(*),
'$quadroDois->addSolicitacoesMunicipio("' || itm.codigo || '", ' || count(*) || ');' as line
from tb_teleconsulta tt
inner join tb_localidade tl on(tt.cd_localidade=tl.ci_localidade)
inner join integracao.tb_municipio itm on(tt.cd_localidade=itm.cd_localidade)
where tt.tp_tipo = 2
  and tt.tp_status = 4
  and extract(year from tt.dt_resposta) = 2016
  and extract(month from tt.dt_resposta) = 03
group by 1
order by 1
--) as foo

--QUADRO 2 - Teleconsulta por equipe de saúde respondidas - (addSolicitacoesEquipe)
--select sum(foo.count) from (
select itp.equipe_codigo_ine, count(*),
'$quadroDois->addSolicitacoesEquipe(null, "' || itp.equipe_codigo_ine || '", ' || count(*) || ');' as line
from tb_teleconsulta tt
inner join tb_profissional tp on(tp.ci_profissional=tt.cd_profissional_solicitante)
inner join integracao.tb_profissional itp on(itp.cpf = replace(replace(tp.nr_cpf, '.', ''), '-', ''))
where tt.tp_tipo = 2
  and tt.tp_status = 4
  and extract(year from dt_resposta) = 2016
  and extract(month from dt_resposta) = 03
group by 1
--) as foo







--INSERINDO UM NOVO PROFISSIONAL NA TABELA DO MINISTÉRIO
INSERT INTO integracao.tb_profissional(
            cpf, cns, nome, codigo_cbo, equipe_codigo_ine, estabelecimento_codigo_cnes, 
            fl_alterado)
    VALUES ('06662179124', null, 'DAYMIS CABALLERO', '225142', '0000098477', '2554534', 1);
--select * from integracao.tb_profissional  where fl_alterado = 1
-------------------------------------------------------------------------

"CE";"CEDRO";"MEYLING ANTONIA HARDY SANCHEZ";"067.475.641-03";2149
"CE";"CEDRO";"HILDA ALICIA JONES CABRALES";"067.812.861-88";2150
"CE";"MOMBACA";"DAYMIS CABALLERO";"066.621.791-24";1878





--ACOPIARA
"06601888133";"700200920012925";"YOVANNIS GRIMON GONZALEZ";"225142";"0000078980";"2414961";0
--ASSARE
"05270115417";"980016295284618";"ANDRESSA ALENCAR ARAUJO MAIA";"225142";"0000080519";"2563134";0
--ARACATI
"07202493411";"700004641522701";"MIRNNA LOPES DE AQUINO";"225142";"0000080020";"2372940";0
--ARACOIABA
"02888435330";"980016296923835";"ALISSON FALCAO DE CARVALHO";"225142";"0000080160";"2426765";1
--BANABUIU
"01209822342";"980016296975762";"RAFAEL DA SILVA HOLANDA";"225142";"0000080764";"2564866";0
--BARBALHA
"02646802358";"";"Priscilla Davila Cruz Macedo";"225142";"0000080837";"2564386";1
--CARNAUBAL
"00354113330";"980016296934659";"YVES DAMON GONCALVES FEITOSA";"225142";"0000083003";"2327120";0
--CEDRO
"02893482341";"";"José Thiefeson Serpa da Silva";"225142";"0000086282";"2415593";1
--DEPUTADO IRAPUAN PINHEIRO
"06552258119";"700504797229357";"IRENO DAVID ESQUIJAROSA CUETO";"225142";"0000085758";"3703436";0
--FORQUILHA
"06609515174";"700408318296150";"SUCELL REYES MACEO";"225142";"0000086169";"2664356";0
--FORTALEZA
"85119962300";"980016289566518";"JORDANYA ALVES E SILVA";"225142";"0000088145";"2515261";0
--IGUATU
"06603914140";"708903759498916";"MAGNA OLINDA MENDEZ PEREZ";"225142";"0000092916";"2699958";0
--ITAREMA
"60048668303";"706700538695010";"MARIA LUISA RIBEIRO MARTINS";"225142";"0001500244";"7379137";0
--INDEPENDENCIA
"06570608100";"898004238051051";"JULIA MIZEIDA RONDA REYES";"225142";"0000093009";"2726114";1
--JARDIM
"02492828360";"980016296167682";"FLORA ARAUJO ULISSES";"225142";"0000094986";"2425734";0
--LIMOEIRO DO NORTE
"06615952181";"700007133738109";"OLGA LIDIA PARRA MARTINEZ";"225142";"0000096245";"2551969";0
--MILHA
"06533277146";"709801070522997";"GISELLE PENSADO QUESADA";"225142";"0000098191";"2564912";0
--MORADA NOVA
"06570805193";"708605051868082";"YURISMAM SUAREZ AVILES";"225142";"0000098779";"2564130";0
--MOMBACA
"00968788351";"";"Livia stefania fernandes pinheiro";"225142";"0000098477";"2554534";1
--PACATUBA
"02206535343";"";"Nathalia Bruna de Sousa Ribeiro";"225142";"0000099945";"2723719";1
--PARAMBU
"06617394143";"702805671655963";"ALEXIS ALVAREZ HECHAVARIA";"225130";"0000100560";"2611732";0
--PEREIRO
"06604096157";"703602077708135";"ANA VICTORIA COUREAUX CARRION";"225142";"0000101087";"2682893";0
--PENTECOSTE
"03714002367";"";"Pedro Yzaac Alencar Duarte";"225142";"0000100935";"2562367";1
--PINDORETAMA
"01543788360";"980016296585883";"CAROLINE BARBOSA LIMA";"225142";"0000101141";"5464498";0
--QUIXERAMOBIM
"00678788308";"706800225316427";"DIEGO E SILVA ALMEIDA";"225142";"0000101966";"2565471";0
--SANTANA DO CARIRI
"00492896321";"980016295681137";"ANTONIO GILSON SAMPAIO COELHO JUNIOR";"225142";"0000102989";"6845606";0
--SOBRAL
"96759623304";"700303906330135";"MARIA DO SOCORRO SALES DE VASCONCELOS SILVA";"223565";"0000104280";"2424436";0
--TABULEIRO DO NORTE
"06602748173";"708200615903841";"JOEL DIAZ DIAZ";"225142";"0000104604";"2552191";0
--TAMBORIL
"06606473110";"700206415534621";"JACQUELINE RAMOS ROJAS";"225142";"0000104795";"3852369";0
--VICOSA DO CEARA
"04431217371";"";"Francisco Edson Portela de Aguiar Filho";"225142";"0000106321";"2563592";1



select * from tb_localidade where sg_estado = 'CE' and ds_localidade = 'MOMBACA'
select * from tb_profissional_localidade where cd_localidade = 1516
select replace(replace(nr_cpf, '.', ''), '-', '') from tb_profissional where ci_profissional = 2781


"65805615304"
select * from integracao.tb_municipio where uf = 'CE' and nome = 'PACUJA'


select * from integracao.tb_profissional where cpf = '00968788351'





--PROFISSIONAIS NÃO ENCONTRADOS NA TABELA DO MINISTÉRIO----------------
select tl.sg_estado, tl.ds_localidade, upper(tu.nm_usuario), tpro.nr_cpf, tu.*, tpro.*
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
  and extract(year from dt_resposta) = 2016
  and extract(month from dt_resposta) = 02
group by 1
except
select itp.cpf as cpf
from tb_teleconsulta tt
inner join tb_profissional tp on(tp.ci_profissional=tt.cd_profissional_solicitante)
inner join integracao.tb_profissional itp on(itp.cpf = replace(replace(tp.nr_cpf, '.', ''), '-', ''))
where tt.tp_tipo = 2
  and tt.tp_status = 4
  and extract(year from dt_resposta) = 2016
  and extract(month from dt_resposta) = 02
group by 1 )
-------------------------------------------------------------------------





select * from tb_teleconsulta where cd_profissional_solicitante = 2759

--QUADRO 2 - Teleconsulta por ponto de telessaúde respondidas - (addSolicitacoesPontoTelessaude)
--select sum(foo.count) from (
select itp.estabelecimento_codigo_cnes, count(*),
'$quadroDois->addSolicitacoesPontoTelessaude("' || itp.estabelecimento_codigo_cnes || '", ' || count(*) || ');' as line
from tb_teleconsulta tt
inner join tb_profissional tp on(tp.ci_profissional=tt.cd_profissional_solicitante)
inner join integracao.tb_profissional itp on(itp.cpf = replace(replace(tp.nr_cpf, '.', ''), '-', ''))
where tt.tp_tipo = 2
  and tt.tp_status = 4
  and extract(year from dt_resposta) = 2016
  and extract(month from dt_resposta) = 03
group by 1
--) as foo



--QUADRO 2 - addSolicitacoesProfissional
select foo.*, 
'$quadroDois->addSolicitacoesProfissional("' || foo.nr_cpf || '", null, "' || foo.nm_usuario ||'", "' || foo.ds_email || '", "' || foo.tipo || '", "' || foo.codigo_cbo || '", null, "' || foo.equipe_codigo_ine || '", ' || foo.num || ');' from 
(select 
	replace(replace(tp.nr_cpf, '.', ''), '-', '') as nr_cpf, 
	upper(tu.nm_usuario) as nm_usuario, 
	tu.ds_email,
	case (select cd_grupo from tb_usuario_grupo tug where tug.cd_usuario = tt.cd_profissional_solicitante limit 1)
		when 5 then '02' --provab
		when 6 then '03' --mais médicos
		else '01' --profissionais de saúde
	end as tipo,
	itp.codigo_cbo,
	itp.equipe_codigo_ine,
	count(*) as num
from tb_teleconsulta tt
inner join tb_usuario tu on(tt.cd_profissional_solicitante=tu.ci_usuario)
inner join tb_profissional tp on(tt.cd_profissional_solicitante=tp.ci_profissional)
inner join integracao.tb_profissional itp on(itp.cpf = replace(replace(tp.nr_cpf, '.', ''), '-', ''))
where tt.tp_tipo = 2
  and tt.tp_status = 4
  and extract(year from tt.dt_resposta) = 2016
  and extract(month from tt.dt_resposta) = 03
group by 1,2,3,4,5,6
order by 2) as foo




--QUADRO 2 - addSolicitacoesProfissionalTema
--
select foo.cid, foo.categoria, foo.subcategoria, foo.ciap,
'$quadroDois->addSolicitacoesProfissionalTema("' || foo.nr_cpf || '", null, "' || foo.ds_email || '", "' || foo.cid || '", "' || ciap || '", ' || foo.num || ');'
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
  and extract(year from tt.dt_resposta) = 2016
  and extract(month from tt.dt_resposta) = 03
group by 1,2,3,4,5,6,7
order by 3) as foo
where ciap is null
order by cid asc





--QUADRO 2 - addSolicitacoesCatProfissional
select foo.*, '$quadroDois->addSolicitacoesCatProfissional("' || foo.nr_familia_cbo || '", ' || foo.num || ');'
from
(select 
	tpro.nr_familia_cbo,
	count(*) as num
from tb_teleconsulta tt
inner join tb_usuario tu on(tt.cd_profissional_solicitante=tu.ci_usuario)
inner join tb_profissional tp on(tt.cd_profissional_solicitante=tp.ci_profissional)
inner join tb_profissao tpro on(tp.cd_profissao=tpro.ci_profissao)
where tt.tp_tipo = 2
  and tt.tp_status = 4
  and extract(year from tt.dt_resposta) = 2016
  and extract(month from tt.dt_resposta) = 03
group by 1) as foo





--QUADRO 3 - addSolicitacoesTelediagnosticoUF
select count(*)
from tb_teleconsulta tt
where tt.tp_tipo = 1
  and tt.tp_status = 4
  and extract(year from dt_resposta) = 2016
  and extract(month from dt_resposta) = 03



--QUADRO 3 - addSolicitacoesTelediagnosticoMunicipio
--select sum(foo.count) from (
select itm.codigo, count(*),
'$quadroDois->addSolicitacoesMunicipio("' || itm.codigo || '", ' || count(*) || ');' as line
from tb_teleconsulta tt
inner join tb_localidade tl on(tt.cd_localidade=tl.ci_localidade)
inner join integracao.tb_municipio itm on(tt.cd_localidade=itm.cd_localidade)
where tt.tp_tipo = 1
  and tt.tp_status = 4
  and extract(year from tt.dt_resposta) = 2016
  and extract(month from tt.dt_resposta) = 03
group by 1
order by 1
--) as foo




-- VINCULACAO PROFISSIONAIS MINISTÉRIO / CEARÁ
select * from integracao.tb_profissional itp
where itp.cpf ilike '%241611148%'


select replace(replace(tp_.nr_cpf, '.', ''), '-', '') as nr_cpf, tu_.nm_usuario, tu_.ds_email 
from tb_usuario tu_
inner join tb_profissional tp_ on(tu_.ci_usuario=tp_.ci_profissional)
where tu_.fl_ativo = true and tu_.fl_profissional = true
  and tp_.ci_profissional not in(
select tp.ci_profissional from tb_profissional tp 
inner join tb_usuario tu on(tp.ci_profissional=tu.ci_usuario)
inner join integracao.tb_profissional itp on(replace(replace(tp.nr_cpf, '.', ''), '-', '') = itp.cpf)
where tu.fl_ativo = true and tu.fl_profissional = true 
)



select * from integracao.tb_municipio 
where uf = 'CE' and nome in (
upper('Ararenda'),
upper('Barreira'),
upper('Caninde'),
upper('Carnaubal'),
upper('Choro'),
upper('Eusebio'),
upper('Iguatu'),
upper('Itaicaba'),
upper('Jaguaribe'),
upper('Jaguaruana'),
upper('Limoeiro do Norte'),
upper('Maracanau'),
upper('Morada Nova'),
upper('Nova Russas'),
upper('Ocara'),
upper('Quixere'),
upper('Redencao'),
upper('Sao Goncalo do Amarante'),
upper('Sao Joao do Jaguaribe'),
upper('Tabuleiro Do Norte'),
upper('Trairi')
)
order by nome asc
