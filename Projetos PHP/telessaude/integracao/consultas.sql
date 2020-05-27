
select * from tb_usuario where nm_senha = md5('123456')


select * from tb_teleconsulta 
where tp_tipo = 2
and extract(year from dt_resposta) = 2018
and extract(month from dt_resposta) = 09


--1	SOLICITANTE 2ª OPINIÃO FORMATIVA
2
3
4
--2	SOLICITANTE EXAME


--Todos os grupos de solicitação teleconsulta
--1,5,6,8e
select distinct ci_grupo from tb_grupo where ci_grupo in(
	select distinct cd_grupo from tb_grupo_transacao where cd_transacao=4
)



select * from tb_grupo
select * from tb_grupo_transacao where cd_grupo = 1

select * from tb_transacao where ci_transacao in(2,3,4)


INSERT INTO integracao.tb_profissional(cpf, cns, nome, codigo_cbo, 
					equipe_codigo_ine, estabelecimento_codigo_cnes, fl_alterado)
					VALUES ('$cpfMinisterio', null, '$nm_usuario', '$codigo_cbo', $codigo_ine, '$codigo_cnes', 1); 

select 'INSERT INTO integracao.tb_profissional(cpf, cns, nome, codigo_cbo, equipe_codigo_ine, estabelecimento_codigo_cnes, fl_alterado) values ('
|| '''' || profissional_cpf || ''', ''' || profissional_cns || ''', ''' || profissional_nome || ''', ''' || ocupacao_codigo || ''', ''' || 
equipe_ine || ''', ''' || equipe_estabelecimento || ''', 1);' 
from integracao.tb_aluno_lais 
where profissional_cpf in ('99547686372','00198446381','92919073320','04283637335','08104945408','06609539197','69529140304','06695096120','00984025367','61708321349','02156980373','00533717396','31456073320','06609578176','00573584354','66983541391','06677935183','00980438381','02202585389','06772974166','02261737394','06750088163','67029140320','63479664334','00865756350','06602863193','06992991108','99023377320','04694970330','63730464353','01690006307','01404648321','01606333380','01904758380','03012505377','06400663304','02867401330','06784974190','82252270349','02014159335','06662140180','02893443362','06621718101','02578045364','06785482186','42578817553','01601581335','50677993315','67221190330','03624445367','06612671130','51826097368','62035266300','61960691368','94705321391','06604674100','06764756120','69456160459','06784935101','06537895138','01465130373','04770147473','06754616180','00509802389','07311169410','02680200357','06615217104','01333843305','84780592372','06561579178','65162102334','00667653317','64080625391','00662802306','03212922354','02541145390','02384195336','06570644165','01331041333','06556098140','42270472349','01669069303','01712419323','62924095387','02699693308','99888254391','66034132304','03317490330','93277920330','66712190363','03507790319','01120067367','06662199150','10665628730','03187385389','06766678135','00767383451','00228808367','03370360390','02690975386','06754964111','02760847306','70522183131','06611876162','03199551335','01970063378','41687426368','74760629300','06775782101','06724517192','06662174165','06757609177','06730308141','76279405320','02348459370','00319434389','84538694304','02704829381','01959569317','02458734308','06791560118','63008130372','94748195215','00044153376','02946135365','00463457366','03582193373','96153067387','02707544310','01292452323','06573562127','06757560143','03542224308','02673212361','02701207347','00042530350','06784959124','89559517368','00183223365','02129983316','06719730100','02679417305','00007122306','23645546839','06785035163','98914944387','06777116117','00155354361','06747530110','01856517390','67241441320','01325838365','06556069124','50061747300','81965290310','06615923165','02287813373','61699810320','01983444308','02073845339','02728963304','06625151106','02693092337','01394058527','00238343316','01046437305','60003752399','21439036691','02742974342','06754906189','06562763126','00408647310','06757563169','00804027390','06725305113','02285796358','01254133356','64503950363','50079450300','62277472387','01037665376','06678435150','67813828372','01769393340','01822003377','00505009374','78371953372','03600352300','00658298321','20143818368','01735855316','00569616344','06784214129','62866044304','77661222353','72434597300','01850414343','06756734105','06628047164','85573990306','00027632300','47959444315','00573711305','02931703397','57375852391','61803170387','01364592347','02633222382','01001519302','89227867368','97668761349','00351763341','06785285194','04208154306','00987211358','00055911390','01363973363','06711857488','03223489355','85190977315','42645190391','04948172324','06600802146','00441960324','01356973361','06785412137','06750034152','02192511345','06754772123','06625144169','06611776109','60016912314','03283825319','00742220311','00451419324','65680146304','01232124303','06771447170','06570335103','06558524171','06754876174','93654880363','06695097100','06602704125','60023849363','92587380391','06783324109','02464715301','03236045361','86060554334','00143222341','06774790186','06616874141','01703206347','01586621300','68850751320','06784978188','02157109323','67027920344','02681165393','03529566314','01236699360','06681585140','79165346300','01368535364','06554468188','01985799340','06617449142','00307814343','60123365350','06790448179','27310671368','06678279190','06569695126','06750038140','01110124309','06749300103','02917842326','01385317302','01500410390','02567357351','06589645183','06600599162','02110689340','01244017329','00050948369','82052182349','02744353302','61529966353','06615911159','75560763349','06761980151','06772324110','01760229377','06193131450','06764123195','03620523363','06600589108','01838196323','02941463348','06620699197','00372956327','02559038390','06785031176','02338209303','61452955387','06553822166','36238910372','06601566101','00308895371','62783076349','02485918350','97743810330','01922617385','06620807186','06784230167','00672449390','06604637174','05958125460','99893851300','06610204101','01435031385','01035922371','06778424141','06271485731','06558494167','02672374309','04149098360','85893899520','80219152349','06774995152','06678188128','46594574353','04658189356','00869625314','02905968311','02497481342','02182391304','06695197156','01001181352','06725421105','02375143388','06761978173','96492481372','61513652320','06623293175','01977224318','01001288319','00043674305','06754664150','00286386380','02717642366','61685194320','02676793357','02382122382','99630931320','65842421372','00526927364','01789981336','06610607133','03631046316','11658339304','02515787398','04323590369','06611941169','06725307167','06603940140','06754509180','06569371142','66983568320','03144590304','79733026387','97696161334','06782274116','63263297104','94961140325','06754909102','01690824310','06774952186','01175676390','05212656303','60003950352','99883546300','03282621370','03549899360','00336929390','01799476308','63034441304','00673500381','02690684306','02667394313','96426217387','67131093300','02514384303','72986077153','06779277118','01195729316','99294656349','11742399304','06695196184','01568330340','01110230338','74136038372','01046189301','02832247385','67070531320','91597919349','03091232328','06599754163','00341546399','02476186325','80192190300','00972816380','93456174349','01324394331','04366156300','60000458325','06714876122','64053067391','01362783374','00982511396','02191212301','64666883304','02690786303','96955171372','64414850363','01586162357','03041799308','87689618391','91156980330','00629972389','02381241345','02107737312','79620248368','43373526353','06743779156','03305889314','03579045326','02530537305','06784885171','85884880359','01829819321','00346921341','06603717158','54563089320','02337095339','06615977176','01865128309','73802689372','00706624360','06557079131','02669449301','06764125139','00503988308','06754914106','00357954335','62049348304','06782259150','06776948143','00051327384','02694885373','06597171152','06553711178','02289659347','99422662320','01489408380','92432042387','01668829339','00783279388','06603523116','05053281351','00548319383','60035861339','00303173394','00380648393','02522598317','06758855155','61933058315','43672450391','62883801304','03514734321','06760094174','00737494352','06570817108','03002743356','02166432360','06722767124','06782216183','61809237360','01876665394','02247142362','02370136308','93302770391','06570721178','01265115354','01356222390','93073720391','04762528307','00848790332','95326740397','01775142302','82868433391','02699259373','01526953382','03846613355','00027431320','06727634190','00456602399','95854924315','01048622380','02676599380','01121753337','02837645389','01766776310','04185529325','62877089304','61728039304','00010697306','57570361334','01074847300','00670607304','02764744307','40390489387','06558480107','01444124382','06992995197','06750068138','06625625183','02535979357','66057680359','02080291335','02937440339','00452965373','00552288365','00478445318','08417003622','25968858320','06750108105','06606289106','06599642101','69000590159','02539886329','03605535321','01366595351','02726922392','01636076300','95775951387','06603441144','64857794349','03343187348','42064554653','01889884324','02720147370','60035164379','00501969365','06784921151','61763632334','02709692333','00714425370','02494369304','01093182342','16411935300','00865791341','06777061118','06706818143','86719696220','00786739339','00122119312','01006255338','95952756387','00374531307','03570648362','00353578355','56969600734','12535990334','00464476364','03977575309','00671497316','66593476315','06601752150','01425276377','01189878364','06612576146','02690078309','00659361329','01357928351','06611048189','01646644832','01465247300','01464407304','00966478339','06756688162','06560799166','00059936363','06552306105','00313302316','03547203333','00283620390','06730084103','01819934306','60056903375','02470109361','03262718300','06761892104','85649830363','06695099146','06678425197','05180607302','96034033349','06556070130','01013820304','01462418350','06784969197','02664310380','06795456110','10484124315','02703089384','00335407307','82250596387','00568779355','61898732353','06763446152','99895340397','06511713423','06766620137','91621631320','05953244959','03447700360','74986341200','95702431391','56167687315','06774783139','63292890349','06747463170','34890043020','99419505391','06751674180','02391785305','05659444440','01920469184','06604657108','02504242310','00254141358','02472193394','06606328101','06552648170','06762188141','02011129303','10040635716','06753133178','00973042397','06598778131','81413335349','03582346382','80935680349','06762257135','60024231339','67082076304','06785319196','98947737372','03936734305','01315381362','03330616326','02094107361','01910644323','01518352332','00421916370','02157699376','00261390309','01031873325','99903687320','02403456306','03540473378','64871860310','06755087114','06764792194','78147352387','60012060313','62913174353','42446309372','01474398332','02490775316','01108278302','61331015391','02543939342','02629665305','11731508387','02685905324','06785516188','03309011330','01543711308','04278540329','03270910371','01390002322','02674000392','84055413300','01370155344','06621672101','06620805132','01789641314','00286466309','66861764353','06625723193','01805262351','06624010185','97916048353','01969152362','00472655310','06602695118','00350783322','06785523125','96661330325','68585390344','29356059349','06695133182','93395728315','01809485398','06609543119','01015953360','03070795382','06784796152','06780424110','01049452305','03570022374','83584218268','06695067104','96359250349','73186988268','90792106334','06760156110','01382663366','00426038380','06605517130','03053976307','00768446333','00718465300','01746458305','01336180307','04686126967','06606142199','06748818184','00247594300','96298189300','03766309307','06731860166','61933040378','00576810312','06552568142','08273619478','06607643183','79963404391','03502629340','81952716500','02000786316','79357962387','06596867161','06570883151','01159612323','01105609308','00625969340','06789346147','06774931189','56698232734','05183104425','06790536116','89388275349','00899770339','06718216100','04618179341','06779276146','74247190334','02323058380','52901505287','03255082323','91542529387','13662350378','01307496300','06782232111','02731301376','06747333128','02710983338','00051805383','01197697357','06609551138','01182882374','00896056163','00178389323','00498627314','00507704380','00937056383','62412159300','01490296328','02696221367','02726396305','01008656313','06570562193','61530161380','70168750325','60042286301','49572580310','02726910386','01959148303','02057661377','01851016317','87640163315','06754896108','04966084369')
  and equipe_ine is not null

  
  INSERT INTO integracao.tb_profissional(cpf, cns, nome, codigo_cbo, equipe_codigo_ine, estabelecimento_codigo_cnes, fl_alterado) 
  values ('42064554653', '980016002702836', 'FERNANDO MARCIO CAPANEMA PEREIRA', '225142', '0000088315', '2528541', 1);

select * from integracao.tb_profissional 
where estabelecimento_codigo_cnes = '2372088'


select '85333611300' as cpf union
select '02703113358' as cpf union
select '04180695499' as cpf union
select '21339708353' as cpf union
select '01871153087' as cpf union
select '04872401387' as cpf union
select '05315611353' as cpf union
select '07446055391' as cpf union
select '80631908315' as cpf union
select '01253988676' as cpf union
select '02464432350' as cpf union
select '02149406322' as cpf union
select '04223182307' as cpf union
select '01227685319' as cpf union
select '01586621300' as cpf union
select '03068443385' as cpf union
select '03582312305' as cpf union
select '01785766384'

except

select * from integracao.tb_aluno_lais where profissional_emails = 'l.castelob@gmail.com'


select profissional_cpf, profissional_nome, profissional_emails
from integracao.tb_aluno_lais
where profissional_cpf in (
'85333611300',
'02703113358',
'04180695499',
'21339708353',
'01871153087',
'04872401387',
'05315611353',
'07446055391',
'80631908315',
'01253988676',
'02464432350',
'02149406322',
'04223182307',
'01227685319',
'01586621300',
'03068443385',
'03582312305',
'01785766384'
)






select '05917234337' as cpf union
select '02703113358' as cpf union
select '03582312305' as cpf union
select '01890813338' as cpf union
select '39035670353' as cpf union
select '05503462793' as cpf union
select '74377930320' as cpf union
select '05846411339' as cpf union
select '05927045308' as cpf union
select '23039035304' as cpf union
select '85333611300' as cpf union
select '96104180310' as cpf union
select '36001309353' as cpf union
select '83941398334' as cpf union
select '04872401387' as cpf union
select '03068443385' as cpf union
select '05315611353' as cpf union
select '01785766384' as cpf union
select '04357721393' as cpf union
select '07446055391' as cpf union
select '01871153387' as cpf union
select '64934560378' as cpf union
select '01274587352' as cpf union
select '62436244391' as cpf union
select '01586621300' as cpf union
select '91156980330' as cpf union
select '46452346334' as cpf union
select '01253988676' as cpf union
select '80631908315' as cpf union
select '61739260325' as cpf union
select '62930850353' as cpf union
select '01773603302' as cpf union
select '02494371392' as cpf union
select '02464432350' as cpf union
select '63034441304' as cpf union
select '02019697343' as cpf union
select '01227685319' as cpf union
select '02149406322' as cpf union
select '21339708353' as cpf union
select '04180695499' as cpf union
select '04223182307' as cpf union
select '05415989374' as cpf union
select '81224680391' as cpf



except


select replace(replace(nr_cpf, '.', ''), '-', '') as cpf
from tb_profissional tp
inner join tb_usuario tu on(tu.ci_usuario=tp.ci_profissional)
where replace(replace(nr_cpf, '.', ''), '-', '') in (
'05917234337',
'02703113358',
'03582312305',
'01890813338',
'39035670353',
'05503462793',
'74377930320',
'05846411339',
'05927045308',
'23039035304',
'85333611300',
'96104180310',
'36001309353',
'83941398334',
'04872401387',
'03068443385',
'05315611353',
'01785766384',
'04357721393',
'07446055391',
'01871153387',
'64934560378',
'01274587352',
'62436244391',
'01586621300',
'91156980330',
'46452346334',
'01253988676',
'80631908315',
'61739260325',
'62930850353',
'01773603302',
'02494371392',
'02464432350',
'63034441304',
'02019697343',
'01227685319',
'02149406322',
'21339708353',
'04180695499',
'04223182307',
'05415989374',
'81224680391'
)
order by 1 ASC


select replace(replace(foo.nr_cpf, '.', ''), '-', '') as nr_cpf_ok, foo.tem_teleconsulta from 
(select 
	(select 1 from integracao.tb_profissional where cpf = replace(replace(tp.nr_cpf, '.', ''), '-', '')) as tem_ine,
	(select 1 from tb_teleconsulta where cd_profissional_solicitante = tp.ci_profissional or cd_profissional_especialista = tp.ci_profissional limit 1) as tem_teleconsulta,
	tp.* 
from tb_profissional tp where ci_profissional in(
		select distinct cd_usuario from tb_usuario_grupo where cd_grupo in (1,5,6,8)
	)
) as foo
where tem_ine is null


select 1 from tb_teleconsulta where cd_profissional_solicitante = 1 or cd_profissional_especialista = 1 


select 1 from integracao.tb_profissional where cpf = '19577303315'



select count(*) as num
	from tb_teleconsulta tt
	where tt.tp_tipo = 1
	  and tt.tp_status = 4
	  and extract(year from dt_resposta) = 2018
	  and extract(month from dt_resposta) = 08
	  and cd_profissional_solicitante != 1055

	  
	  
select
tt.ci_teleconsulta,
	tt.cd_localidade,
	tl.sg_estado,
	tl.ds_localidade,
	tt.cd_especialidade,
	te.nm_especialidade,
	tt.tp_status,
	case tt.tp_status	when 1 then 'Aguardando'
			when 2 then 'Em análise'
			when 3 then 'Respondido'
			when 4 then 'Finalizado'
	end as nm_status,
	tp_sol.nr_cpf as nr_cpf_solicitante,
	tu_sol.ci_usuario as ci_usuario_sol,
	tu_sol.nm_usuario as nm_usuario_solicitante,
	tu_esp.ci_usuario as ci_usuario_esp,
	tu_esp.nm_usuario as nm_usuario_especialista,
	to_char(tt.dt_solicitacao, 'DD/MM/YYYY HH24:MI:SS') as dt_solicitacao,
	to_char(tt.dt_resposta, 'DD/MM/YYYY HH24:MI:SS') as dt_resposta	
from tb_teleconsulta tt
inner join tb_localidade tl on(tt.cd_localidade=tl.ci_localidade)
inner join tb_especialidade te on(tt.cd_especialidade=te.ci_especialidade)
inner join tb_usuario tu_sol on(tt.cd_profissional_solicitante=tu_sol.ci_usuario)
inner join tb_profissional tp_sol on(tt.cd_profissional_solicitante=tp_sol.ci_profissional)
left join tb_usuario tu_esp on(tt.cd_profissional_especialista=tu_esp.ci_usuario)
where tt.tp_tipo = 2
and coalesce(tt.dt_resposta, tt.dt_solicitacao) between '2018-08-01' and '2018-08-31'
--and tt.dt_resposta between '2018-08-01' and '2018-08-31'
--and tt.dt_solicitacao between '2018-08-01' and '2018-08-31'
order by tt.tp_status, tt.dt_solicitacao asc
	  




select tm.codigo, tm.nome from integracao.tb_municipio as tm 
where tm.cd_localidade is not null 
  and tm.uf = 'CE'
  and tm.codigo not in(select cd_municipio from nuteds.tb_dados_municipio)
order by tm.nome asc


select * from nuteds.tb_dados_municipio where cd_municipio = 

select tm.*, ntdm.* from nuteds.tb_dados_municipio as ntdm
inner join integracao.tb_municipio as tm on(ntdm.cd_municipio=tm.codigo)
where ntdm.cd_municipio = 230075
 


select tm.uf, count(*) from nuteds.tb_dados_municipio as ntdm
inner join integracao.tb_municipio as tm on(ntdm.cd_municipio=tm.codigo)
group by 1
order by 1


select tm.uf, count(*) from nuteds.tb_dados_municipio as ntdm
inner join integracao.tb_municipio as tm on(ntdm.cd_municipio=tm.codigo)
group by 1
order by 1


select count(*) from nuteds.tb_dados_municipio
where nr_cres is not null and
nm_populacao is not null and
nm_site is not null and
nm_pr_nome is not null and
nm_pr_email is not null and
nm_pr_fone is not null and
nm_pr_endereco is not null and
nm_se_nome is not null and
nm_se_email is not null and
nm_se_fone is not null and
nm_se_endereco is not null and 
nr_mais_medicos is not null and
nr_equipe_saude is not null and
nr_nasf is not null and
nr_nasf_tipo is not null and
fl_sad is not null and
fl_cardio is not null and
nr_cardio_visita is not null and
fl_eletro_digital is not null and	
fl_exame_imagem is not null
	

select count(*) from nuteds.tb_pontos_telessaude where id = 2 cd_dados_municipio = 230440

truncate table nuteds.tb_pontos_telessaude

CREATE TABLE tb_mapa (
	id SERIAL not null,
	cd_user integer,
	cd_municipio integer
);


SELECT tm.uf, count(*) AS qtd
FROM tb_mapa tma
INNER JOIN tb_municipio tm on(tma.cd_municipio=tm.codigo)
GROUP BY 1;

SELECT tm.uf, tm.codigo, tm.nome, count(*) AS qtd
FROM tb_mapa tma
INNER JOIN tb_municipio tm on(tma.cd_municipio=tm.codigo)
GROUP BY 1,2,3;







CREATE TABLE nuteds.tb_pontos_telessaude (
	id SERIAL not null,
	cd_dados_municipio integer not NULL,
	tp_tipo integer,
	nr_cnes integer,
	nm_nome varchar(200),
	nm_endereco varchar(200),
	nm_coordenador varchar(200),
	nm_responsavel varchar(200),
	nm_email varchar(200),
	nm_fone varchar(200),
	nm_ocupacao varchar(200),
	fl_sala_palestra boolean,
	fl_telecardio boolean,
	fl_internet boolean,
	nm_internet_velocidade varchar(200)	 
);


CREATE TABLE nuteds.tb_dados_municipio (
	id SERIAL not null,
	cd_municipio integer not NULL,
	nr_cres integer,
	nm_populacao varchar(20),
	nm_site varchar(200),
	nm_pr_nome varchar(200),
	nm_pr_email varchar(200),
	nm_pr_fone varchar(100),
	nm_pr_endereco varchar(200),
	nm_se_nome varchar(200),
	nm_se_email varchar(200),
	nm_se_fone varchar(100),
	nm_se_endereco varchar(200), 
	nr_mais_medicos integer,
	nr_equipe_saude integer,
	nr_nasf integer,
	nr_nasf_tipo integer,
	fl_sad boolean,
	fl_cardio boolean,
	nr_cardio_visita integer,
	fl_eletro_digital boolean,
	nm_eletro_modelo varchar(100),
	fl_esp_1 boolean,
	fl_esp_9 boolean,
	fl_esp_2 boolean,
	fl_esp_10 boolean,
	fl_esp_8 boolean,
	fl_esp_12 boolean,
	fl_esp_11 boolean,
	fl_esp_3 boolean,
	fl_exame_imagem boolean,
	fl_exame_imagem_1 boolean,
	fl_exame_imagem_2 boolean,
	fl_exame_imagem_3 boolean,
	fl_exame_imagem_4 boolean,
	fl_exame_imagem_5 boolean,
	fl_exame_imagem_6 boolean	
);



select codigo, nome from integracao.tb_municipio where cd_localidade is not null and uf = ''

select distinct uf from integracao.tb_municipio order by 1 asc


select * from tb_teleconsulta 
where tp_tipo = 2 
  and tp_status = 2 
  and dt_resposta > '2018-01-25'
  

  
 select 1 as dd, 2 as cc into tb_temp123;
 select 3 as dd, 4 as cc into tb_temp123;

select 
(select count(*) from tb_categoria_cid)
+
(select count(*) from tb_subcategoria_cid)


select itm.uf, itm.nome
from integracao.tb_profissional itp
inner join integracao.tb_estabelecimento ite on(itp.estabelecimento_codigo_cnes=ite.codigo_cnes)
inner join integracao.tb_municipio itm on(ite.codigo_municipio::integer=itm.codigo)
limit 0

select count(*) from tb_localidade

--enviarTeleconsultoria
select foo.*, 
'$teleconsultoria->addSolicitacao("' || foo.data_hora_solicitacao || '", TipoTeleconsultoria::ASSINCRONA, CanalAcesso::INTERNET, ' ||
'"' || foo.nr_cpf || '", "' || foo.codigo_cbo || '", "' || foo.estabelecimento_codigo_cnes || '", "' || foo.equipe_codigo_ine || '", ' || 
'"' || foo.tipo_profissional || '", ' ||
'["' || foo.cid || '"], ' ||
'["' || foo.ciap || '"], ' ||
'"' || foo.data_hora_resposta || '", ' ||
'EvitouEncaminhamentoTeleconsultoria::NAO, IntencaoEncaminhamentoTeleconsultoria::NAO, GrauSatisfacao::SATISFEITO, ResolucaoDuvidaTeleconsultoria::ATENDEU_TOTALMENTE, false);' 
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
  and extract(year from tt.dt_resposta) = 2016
  and extract(month from tt.dt_resposta) = 03
--group by 1,2,3,4,5,6
order by tt.dt_solicitacao) as foo


--enviarCadastroProfissional Teleconsultoria
select 	foo.*,
	'$profissional->addProfissionalSaude(null, "' || foo.cpf || '", "' || foo.nome || '", "' || foo.estabelecimento_codigo_cnes || '", "' || foo.codigo_cbo || '", "' || foo.equipe_codigo_ine || '", "' || foo.tipo_profissional || '", "' || foo.sexo || '");'
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
	  and extract(year from tt.dt_resposta) = 2016
	  and extract(month from tt.dt_resposta) = 07
	) as foo
)
) as foo












--enviarTelediagnostico
select count(*)
from tb_teleconsulta tt
where tt.tp_tipo = 1
  and tt.tp_status = 4
  and extract(year from dt_resposta) = 2016
  and extract(month from dt_resposta) = 05


select 
'$telediagnostico->addSolicitacao("' || foo.data_hora_solicitacao || '", "H04001010", "41", null, "' || foo.estabelecimento_codigo_cnes || '", ' ||
'"' || foo.nr_cpf_solicitante || '", "' || foo.codigo_cbo || '", "' || foo.estabelecimento_codigo_cnes || '", ' || 
'"' || foo.data_hora_resposta || '", ' ||
'"' || foo.nr_cpf_laudista || '", ' ||
'"' || foo.codigo_cbo_laudista || '", ' ||
'"' || foo.estabelecimento_codigo_cnes_laudista || '", ' ||
'null, ' ||
'"' || foo.nr_cns_paciente || '", ' ||
'"' || foo.codigo_ibge_cidade_paciente || '");' AS TESTES
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
  and extract(year from tt.dt_resposta) = 2016
  and extract(month from tt.dt_resposta) = 01
order by tt.dt_solicitacao) as foo


--enviarCadastroProfissional Telediagnostico
select 	foo.*,
	'$profissional->addProfissionalSaude(null, "' || foo.cpf || '", "' || foo.nome || '", "' || foo.estabelecimento_codigo_cnes || '", "' || foo.codigo_cbo || '", "' || foo.equipe_codigo_ine || '", "' || foo.tipo_profissional || '", "' || foo.sexo || '");'
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
	  and extract(year from tt.dt_resposta) = 2016
	  and extract(month from tt.dt_resposta) = 07
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
	  and extract(year from tt.dt_resposta) = 2016
	  and extract(month from tt.dt_resposta) = 07
	) as foo
	


)

) as foo




--PROCURANDO PROFISSIONAIS NÃO VINCULADOS
select distinct replace(replace(tp.nr_cpf, '.', ''), '-', '') as nr_cpf
from tb_teleconsulta tt
inner join tb_profissional tp on(tt.cd_profissional_solicitante=tp.ci_profissional)
where tt.tp_tipo = 1
  and tt.tp_status = 4
  and extract(year from dt_resposta) = 2016
  and extract(month from dt_resposta) = 07
except
select distinct replace(replace(tp.nr_cpf, '.', ''), '-', '') as nr_cpf
from tb_teleconsulta tt
inner join tb_profissional tp on(tt.cd_profissional_solicitante=tp.ci_profissional)
inner join integracao.tb_profissional itp on(itp.cpf = replace(replace(tp.nr_cpf, '.', ''), '-', ''))
where tt.tp_tipo = 1
  and tt.tp_status = 4
  and extract(year from dt_resposta) = 2016
  and extract(month from dt_resposta) = 07
union
select distinct replace(replace(tp.nr_cpf, '.', ''), '-', '') as nr_cpf
from tb_teleconsulta tt
inner join tb_profissional tp on(tt.cd_profissional_especialista=tp.ci_profissional)
where tt.tp_tipo = 1
  and tt.tp_status = 4
  and extract(year from dt_resposta) = 2016
  and extract(month from dt_resposta) = 07
except
select distinct replace(replace(tp.nr_cpf, '.', ''), '-', '') as nr_cpf
from tb_teleconsulta tt
inner join tb_profissional tp on(tt.cd_profissional_especialista=tp.ci_profissional)
inner join integracao.tb_profissional itp on(itp.cpf = replace(replace(tp.nr_cpf, '.', ''), '-', ''))
where tt.tp_tipo = 1
  and tt.tp_status = 4
  and extract(year from dt_resposta) = 2016
  and extract(month from dt_resposta) = 07



--enviarCadastroProfissional
select 	foo.*,
	'$profissional->addProfissionalSaude(null, "' || foo.cpf || '", "' || foo.nome || '", "' || foo.estabelecimento_codigo_cnes || '", "' || foo.codigo_cbo || '", "' || foo.equipe_codigo_ine || '", "' || foo.tipo_profissional || '", "' || foo.sexo || '");'
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
where itp.fl_alterado = 1) as foo







select distinct fl_sexo from tb_usuario
select * from integracao.tb_profissional limit 0
select * from tb_paciente limit 0


00344413365
select *
from integracao.tb_profissional itp
--inner join tb_profissional tp on(itp.cpf = replace(replace(tp.nr_cpf, '.', ''), '-', ''))
--inner join tb_usuario tu on(tp.ci_profissional=tu.ci_usuario)
where itp.fl_alterado = 1
except
select itp.cpf
from integracao.tb_profissional itp
inner join tb_profissional tp on(itp.cpf = replace(replace(tp.nr_cpf, '.', ''), '-', ''))
--inner join tb_usuario tu on(tp.ci_profissional=tu.ci_usuario)
where itp.fl_alterado = 1




"RENATA BARBOSA MENEZES"



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
  and extract(month from dt_resposta) = 05


--QUADRO 2 - Teleconsulta por município respondidas - (addSolicitacoesMunicipio)
select sum(foo.count) from (
select itm.codigo, count(*),
'$quadroDois->addSolicitacoesMunicipio("' || itm.codigo || '", ' || count(*) || ');' as line
from tb_teleconsulta tt
inner join tb_localidade tl on(tt.cd_localidade=tl.ci_localidade)
inner join integracao.tb_municipio itm on(tt.cd_localidade=itm.cd_localidade)
where tt.tp_tipo = 2
  and tt.tp_status = 4
  and extract(year from tt.dt_resposta) = 2016
  and extract(month from tt.dt_resposta) = 04
group by 1
order by 1
) as foo

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
  and extract(month from dt_resposta) = 04
group by 1
--) as foo


--05/03/2018 --- verificar pq está sem cns
CE	RUSSAS	URIPIDE	 MARTINEZ SILEGA	066.795.891-69
CE	CAMPOS SALES	RAIMEL MATURELL TORO	066.008.091-59




--INSERINDO UM NOVO PROFISSIONAL NA TABELA DO MINISTÉRIO
INSERT INTO integracao.tb_profissional(
            cpf, cns, nome, codigo_cbo, equipe_codigo_ine, estabelecimento_codigo_cnes, 
            fl_alterado)
    VALUES ('01064922414', null, 'Priscilla Rodrigues Figliuolo Simoes', '225142', null, '6042414', 1);
--select * from integracao.tb_profissional  where fl_alterado = 1
-------------------------------------------------------------------------

   
select * from tb_usuario where nm_login = '01064922414'
select * from integracao.tb_profissional
where fl_alterado = 1
select * from integracao.tb_estabelecimento
where codigo_cnes = '6042414'
95683054320	980016286668743	NAHME NICOLAU NAGIB KARBAGE	225142	0000105848	2561573	0



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
--CAMPOS SALES
"01860155340";"980016294311859";"ELAYNE CHRISTINNE MARCELINO E SILVA";"225142";"0000082260";"2724510";0
--CARNAUBAL
"00354113330";"980016296934659";"YVES DAMON GONCALVES FEITOSA";"225142";"0000083003";"2327120";0
--CEDRO
"02893482341";"";"José Thiefeson Serpa da Silva";"225142";"0000086282";"2415593";1
--CRATO
"95766162391";"";"Fernanda de Alencar Souza";"225142";"0001489232";"2415097";1
--DEPUTADO IRAPUAN PINHEIRO
"06552258119";"700504797229357";"IRENO DAVID ESQUIJAROSA CUETO";"225142";"0000085758";"3703436";0
--FORQUILHA
"06609515174";"700408318296150";"SUCELL REYES MACEO";"225142";"0000086169";"2664356";0
--FORTALEZA
"85119962300";"980016289566518";"JORDANYA ALVES E SILVA";"225142";"0000088145";"2515261";0
"62172395315";"980016289843171";"ALEX SOARES ANDRADE";"225142";"0000086835";"2482118";0
--GUARAMIRANGA
95683054320	980016286668743	NAHME NICOLAU NAGIB KARBAGE	225142	0000105848	2561573	0
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
--RUSSAS
"64418251391";"980016288776993";"DEBORA OLIVEIRA DA SILVA";"223565";"0000093610";"2481774";0
--SANTANA DO CARIRI
"00492896321";"980016295681137";"ANTONIO GILSON SAMPAIO COELHO JUNIOR";"225142";"0000102989";"6845606";0
--SANTA QUITERIA
"06558505118";"708105682818740";"JELDY LEON REINA";"225142";"0000103020";"2478099";0
--SOBRAL
"96759623304";"700303906330135";"MARIA DO SOCORRO SALES DE VASCONCELOS SILVA";"223565";"0000104280";"2424436";0
--TABULEIRO DO NORTE
"06602748173";"708200615903841";"JOEL DIAZ DIAZ";"225142";"0000104604";"2552191";0
--TAMBORIL
"06606473110";"700206415534621";"JACQUELINE RAMOS ROJAS";"225142";"0000104795";"3852369";0
--VICOSA DO CEARA
"04431217371";"";"Francisco Edson Portela de Aguiar Filho";"225142";"0000106321";"2563592";1



select tl.sg_estado, tl.ds_localidade, upper(tu.nm_usuario), tpro.nr_cpf, tu.*, tpro.*
from tb_profissional tpro
inner join tb_usuario tu on(tpro.ci_profissional=tu.ci_usuario)
inner join tb_profissional_localidade tprol on(tpro.ci_profissional=tprol.cd_profissional)
inner join tb_localidade tl on(tprol.cd_localidade=tl.ci_localidade)
where replace(replace(nr_cpf, '.', ''), '-', '') in('01064922414')




select * from tb_profissional where nr_cpf in('846.927.743-04', '692.360.543-15');
select * from tb_usuario where ci_usuario in(2146, 1056);




select * from tb_localidade where sg_estado = 'CE' and ds_localidade = 'GUARAMIRANGA'
select * from tb_profissional_localidade where cd_localidade = 1369
select replace(replace(nr_cpf, '.', ''), '-', '') from tb_profissional where ci_profissional = 498


select * from integracao.tb_municipio where uf = 'CE' and nome = 'PACUJA'


select * from integracao.tb_profissional where cpf = '95683054320'
select * from integracao.tb_profissional where estabelecimento_codigo_cnes = ''
select * from tb_profissional where nr_cpf = '749.864.303-00'
select * from tb_usuario where ci_usuario = 3061

--"74986430300";"CIBELE DINIZ CARNEIRO"
EQUIPE_CODIGO_INE
"0000101745"
ESTABELECIMENTO_CODIGO_CNES
"2565811"

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
  and extract(month from dt_resposta) = 12
group by 1
except
select itp.cpf as cpf
from tb_teleconsulta tt
inner join tb_profissional tp on(tp.ci_profissional=tt.cd_profissional_solicitante)
inner join integracao.tb_profissional itp on(itp.cpf = replace(replace(tp.nr_cpf, '.', ''), '-', ''))
where tt.tp_tipo = 2
  and tt.tp_status = 4
  and extract(year from dt_resposta) = 2016
  and extract(month from dt_resposta) = 12
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
  and extract(month from dt_resposta) = 04
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
  and extract(month from tt.dt_resposta) = 04
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
  and extract(month from tt.dt_resposta) = 05
group by 1,2,3,4,5,6,7
order by 3) as foo
where ciap is null
order by cid asc




select * from tb_categoria_cid where nr_ciap is not null
2036 cids
1714 cids sem ciap


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
  and extract(month from tt.dt_resposta) = 04
group by 1) as foo





--QUADRO 3 - addSolicitacoesTelediagnosticoUF
select count(*)
from tb_teleconsulta tt
where tt.tp_tipo = 1
  and tt.tp_status = 4
  and extract(year from dt_resposta) = 2016
  and extract(month from dt_resposta) = 04



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
  and extract(month from tt.dt_resposta) = 04
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
