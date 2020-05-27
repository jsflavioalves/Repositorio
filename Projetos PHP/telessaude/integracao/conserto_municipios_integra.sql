select itm.codigo, itm.nome from tb_localidade tl
	inner join integracao.tb_municipio itm on(tl.ci_localidade=itm.cd_localidade)
	where tl.sg_estado = 'CE' 
	order by 2 asc
select distinct uf from integracao.tb_municipio order by 1
select itm.codigo, itm.nome from tb_localidade tl
	inner join integracao.tb_municipio itm on(tl.ci_localidade=itm.cd_localidade)
	where tl.sg_estado = 'MA' 
	order by 2 asc



select itm.*, (select ci_localidade from tb_localidade where sg_estado = 'MA' and ds_localidade = itm.nome) 
from integracao.tb_municipio itm 
where itm.uf = 'MA'

--conserto
update integracao.tb_municipio itm 
set cd_localidade = (select ci_localidade from tb_localidade where sg_estado = 'MA' and ds_localidade = itm.nome)
where itm.uf = 'MA'


select * 
from tb_localidade 
where sg_estado = 'MA'
  and ds_localidade ilike '%PINDAR%'




update tb_localidade set ds_localidade = 'BURITIRANA' where ci_localidade = 2419;
update tb_localidade set ds_localidade = 'GOVERNADOR EDISON LOBAO' where ci_localidade = 2462;
update tb_localidade set ds_localidade = 'SENADOR LA ROCQUE' where ci_localidade = 2599;
update tb_localidade set ds_localidade = 'SANTO AMARO DO MARANHAO' where ci_localidade = 2568;
update tb_localidade set ds_localidade = 'PINDARE-MIRIM' where ci_localidade = 2537;
  