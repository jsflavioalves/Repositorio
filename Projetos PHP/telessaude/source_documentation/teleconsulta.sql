-- =============================================================================
-- Diagram Name: teleconsulta
-- Created on: 02/12/2014 16:46:09
-- Diagram Version: 
-- =============================================================================

CREATE SCHEMA "integracao";


CREATE TABLE "tb_usuario_grupo" (
	"ci_usuario_grupo" SERIAL NOT NULL,
	"cd_usuario" int4 NOT NULL,
	"cd_grupo" int4 NOT NULL,
  PRIMARY KEY("ci_usuario_grupo")
);


CREATE TABLE "tb_grupo_transacao" (
	"ci_grupo_transacao" SERIAL NOT NULL,
	"cd_grupo" int4 NOT NULL,
	"cd_transacao" int4 NOT NULL,
	"fl_inserir" char(1) NOT NULL DEFAULT 'N',
	"fl_alterar" char(1) NOT NULL DEFAULT 'N',
	"fl_deletar" char(1) NOT NULL DEFAULT 'N',
	"dt_cadastro" timestamp NOT NULL DEFAULT now(),
  PRIMARY KEY("ci_grupo_transacao")
);


CREATE TABLE "tb_grupo" (
	"ci_grupo" SERIAL NOT NULL,
	"nm_grupo" varchar(50) NOT NULL,
	"ds_descricao" varchar(100),
	"dt_cadastro" timestamp NOT NULL DEFAULT now(),
  PRIMARY KEY("ci_grupo")
);


CREATE TABLE "tb_usuario" (
	"ci_usuario" SERIAL NOT NULL,
	"tp_nivelacesso" int2 NOT NULL DEFAULT 1,
	"nm_usuario" varchar(150) NOT NULL,
	"nm_login" varchar(50) NOT NULL,
	"nm_senha" varchar(250) NOT NULL,
	"ds_email" varchar(150) NOT NULL,
	"fl_sexo" int2 NOT NULL DEFAULT 1,
	"fl_atualizousenha" bool NOT NULL DEFAULT False,
	"fl_ativo" bool NOT NULL DEFAULT False,
	"fl_profissional" bool NOT NULL DEFAULT False,
	"dt_cadastro" timestamp NOT NULL DEFAULT now(),
	"dt_acesso" timestamp,
  PRIMARY KEY("ci_usuario"),
  CONSTRAINT "unq_tb_usuario_nm_login" UNIQUE("nm_login"),
  CONSTRAINT "unq_tb_usuario_ds_email" UNIQUE("ds_email")
);


COMMENT ON COLUMN "tb_usuario"."fl_sexo" IS '1 = Masculino, 2 = Feminino';

CREATE TABLE "tb_transacao" (
	"ci_transacao" SERIAL NOT NULL,
	"nm_transacao" varchar(50) NOT NULL,
	"nm_label" varchar(100) NOT NULL,
	"tp_tipo" int2 NOT NULL DEFAULT 1,
	"ds_descricao" varchar(100),
  PRIMARY KEY("ci_transacao")
);


CREATE TABLE "tb_localidade" (
	"ci_localidade" int4 NOT NULL,
	"sg_estado" char(2),
	"ds_localidade" varchar(100) NOT NULL,
	"tipo" char(1) NOT NULL,
	"situacao" char(1) NOT NULL,
  PRIMARY KEY("ci_localidade")
);


COMMENT ON COLUMN "tb_localidade"."tipo" IS 'M - Município, P - Povoado, D - Distrito, R - Região Administativa';

COMMENT ON COLUMN "tb_localidade"."situacao" IS 'C - Município codificado  à nível de Logradouro, I - Distrito ou Povoado inserido na codificação à  nível de Logradouro, N - Não codificada à nível de  Logradouro';

CREATE TABLE "tb_profissao" (
	"ci_profissao" SERIAL NOT NULL,
	"nm_profissao" varchar(50) NOT NULL,
	"nm_registro" varchar(10),
	"nr_familia_cbo" int4,
  PRIMARY KEY("ci_profissao")
);


CREATE TABLE "tb_profissional" (
	"ci_profissional" int4 NOT NULL,
	"cd_profissao" int4,
	"cd_localidade" int4,
	"nr_cpf" char(14) NOT NULL,
	"nr_rg" varchar(20) NOT NULL,
	"ds_orgao_emissor" varchar(10),
	"nr_registro" varchar(20),
	"ds_endereco" varchar(200) NOT NULL,
	"ds_complemento" varchar(50),
	"ds_bairro" varchar(100) NOT NULL,
	"nr_numero" varchar(10) NOT NULL,
	"nr_cep" char(10),
	"nr_telefone1" char(14),
	"nr_telefone2" char(14),
	"nr_telefone3" char(14),
	"dt_nascimento" date,
	"nr_cnes" varchar(10),
  PRIMARY KEY("ci_profissional")
);


COMMENT ON COLUMN "tb_profissional"."nr_registro" IS 'Número do CRM / COREM / Outros';

CREATE TABLE "tb_paciente" (
	"ci_paciente" SERIAL NOT NULL,
	"cd_localidade" int4 NOT NULL,
	"nm_paciente" varchar(150) NOT NULL,
	"nr_cpf" char(14),
	"nr_rg" varchar(20),
	"ds_orgao_emissor" varchar(10),
	"fl_sexo" int2 NOT NULL DEFAULT 1,
	"nr_codigo" varchar(20) NOT NULL,
	"ds_endereco" varchar(200),
	"ds_complemento" varchar(50),
	"ds_bairro" varchar(100),
	"nr_numero" varchar(10),
	"nr_cep" char(10),
	"nr_telefone1" char(14),
	"nr_telefone2" char(14),
	"ds_email" varchar(150),
	"dt_nascimento" date,
	"dt_cadastro" timestamp NOT NULL DEFAULT now(),
	"cd_usuario_insert" int4,
	"cd_usuario_update" int4,
  PRIMARY KEY("ci_paciente")
);


COMMENT ON COLUMN "tb_paciente"."fl_sexo" IS '1 = Masculino, 2 = Feminino';

CREATE TABLE "tb_especialidade" (
	"ci_especialidade" SERIAL NOT NULL,
	"nm_especialidade" varchar(50) NOT NULL,
	"fl_exame" bool NOT NULL DEFAULT False,
	"fl_online" bool NOT NULL DEFAULT False,
	"nr_especialidade_cbo" int4,
  PRIMARY KEY("ci_especialidade"),
  CONSTRAINT "unique_nm_especialidade" UNIQUE("nm_especialidade")
);


CREATE TABLE "tb_profissional_especialidade" (
	"ci_profissional_especialidade" SERIAL NOT NULL,
	"cd_profissional" int4 NOT NULL,
	"cd_especialidade" int4 NOT NULL,
  PRIMARY KEY("ci_profissional_especialidade")
);


CREATE TABLE "tb_profissional_localidade" (
	"ci_profissional_localidade" SERIAL NOT NULL,
	"cd_profissional" int4 NOT NULL,
	"cd_localidade" int4 NOT NULL,
  PRIMARY KEY("ci_profissional_localidade")
);


CREATE TABLE "tb_file" (
	"ci_file" SERIAL NOT NULL,
	"cd_usuario" int4 NOT NULL,
	"cd_teleconsulta" int4 NOT NULL,
	"nm_file" varchar NOT NULL,
	"tp_tipo" varchar NOT NULL,
	"nr_tamanho" numeric(30),
	"ds_tamanho" varchar,
	"nr_versao" int2,
	"ds_descricao" varchar,
	"dt_data" timestamp NOT NULL DEFAULT now(),
  PRIMARY KEY("ci_file")
);


CREATE TABLE "tb_orientacao" (
	"ci_orientacao" SERIAL NOT NULL,
	"nm_orientacao" varchar(50) NOT NULL,
  PRIMARY KEY("ci_orientacao"),
  CONSTRAINT "unique_nm_orientacao" UNIQUE("nm_orientacao")
);


CREATE TABLE "tb_teleconsulta" (
	"ci_teleconsulta" SERIAL NOT NULL,
	"cd_profissional_solicitante" int4 NOT NULL,
	"cd_profissional_especialista" int4,
	"cd_paciente" int4,
	"cd_localidade" int4 NOT NULL,
	"cd_especialidade" int4 NOT NULL,
	"cd_categoria_cid" int4,
	"cd_subcategoria_cid" int4,
	"cd_duvida" int4,
	"cd_orientacao" int4,
	"tp_tipo" int2 NOT NULL,
	"tp_status" int2 NOT NULL DEFAULT 1,
	"ds_solicitacao" text,
	"dt_solicitacao" timestamp NOT NULL DEFAULT now(),
	"ds_resposta" text,
	"dt_resposta" timestamp,
	"ds_medicamento" text,
	"fl_urgencia" bool NOT NULL DEFAULT False,
	"fl_inconclusivo" bool NOT NULL DEFAULT False,
  PRIMARY KEY("ci_teleconsulta")
);


COMMENT ON COLUMN "tb_teleconsulta"."tp_tipo" IS '1 - Exame, 2 - Segunda Opnião Formativa';

COMMENT ON COLUMN "tb_teleconsulta"."tp_status" IS '1 = Aguardando, 2 = Em andamento, 3 = Finalizada';

CREATE TABLE "tb_subcategoria_cid" (
	"ci_subcategoria_cid" int4 NOT NULL,
	"cd_categoria_cid" int4 NOT NULL,
	"nr_subcategoria_cid" varchar NOT NULL,
	"nm_subcategoria_cid" varchar NOT NULL,
	"nr_categoria_cid" varchar NOT NULL,
  PRIMARY KEY("ci_subcategoria_cid")
);


CREATE TABLE "tb_categoria_cid" (
	"ci_categoria_cid" int4 NOT NULL,
	"nr_categoria_cid" varchar NOT NULL,
	"nm_categoria_cid" varchar NOT NULL,
  PRIMARY KEY("ci_categoria_cid")
);


CREATE TABLE "tb_duvida" (
	"ci_duvida" SERIAL NOT NULL,
	"nm_duvida" varchar(100) NOT NULL,
  PRIMARY KEY("ci_duvida"),
  CONSTRAINT "unique_nm_duvida" UNIQUE("nm_duvida")
);


CREATE TABLE "tb_exame_telecardiologia" (
	"ci_exame_telecardiologia" SERIAL NOT NULL,
	"cd_teleconsulta" int4,
	"peso" char(5),
	"altura" char(5),
	"imc" char(5),
	"medi_diuretico" bool NOT NULL DEFAULT False,
	"medi_digital" bool NOT NULL DEFAULT False,
	"medi_betabloqueador" bool NOT NULL DEFAULT False,
	"medi_inibidor" bool NOT NULL DEFAULT False,
	"medi_amiodarona" bool NOT NULL DEFAULT False,
	"medi_bloquadorcalcio" bool NOT NULL DEFAULT False,
	"medi_nenhum" bool NOT NULL DEFAULT False,
	"medi_outro" varchar,
	"risco_hipertensaoarterial" bool NOT NULL DEFAULT False,
	"risco_doencachagas" bool NOT NULL DEFAULT False,
	"risco_obesidade" bool NOT NULL DEFAULT False,
	"risco_diabete" bool NOT NULL DEFAULT False,
	"risco_tabagismo" bool NOT NULL DEFAULT False,
	"risco_infarto" bool NOT NULL DEFAULT False,
	"risco_dislipdemia" bool NOT NULL DEFAULT False,
	"risco_historico" bool NOT NULL DEFAULT False,
	"risco_doencarenal" bool NOT NULL DEFAULT False,
	"risco_doencapulmonar" bool NOT NULL DEFAULT False,
	"risco_revascularizacao" bool NOT NULL DEFAULT False,
	"risco_nenhum" bool NOT NULL DEFAULT False,
	"dor_momentoexame" bool NOT NULL DEFAULT False,
	"dor_tempodor" char(5),
	"dor_dataultimoepsodio" char(10),
	"dor_duracaoultimoepsodio" char(5),
  PRIMARY KEY("ci_exame_telecardiologia")
);


CREATE TABLE "tb_teleconsulta_resposta" (
	"ci_teleconsulta_resposta" SERIAL NOT NULL,
	"cd_teleconsulta" int4 NOT NULL,
	"cd_profissional" int4 NOT NULL,
	"ds_resposta" text NOT NULL,
	"dt_resposta" timestamp NOT NULL DEFAULT now(),
  PRIMARY KEY("ci_teleconsulta_resposta")
);


CREATE TABLE "tb_mobile_teleconsulta" (
	"ci_mobile_teleconsulta" SERIAL NOT NULL,
	"cd_profissional" int4 NOT NULL,
	"cd_teleconsulta" int4 NOT NULL,
	"dt_data" timestamp NOT NULL DEFAULT now(),
  PRIMARY KEY("ci_mobile_teleconsulta")
);


CREATE TABLE "tb_mobile_log" (
	"ci_mobile_log" SERIAL NOT NULL,
	"cd_profissional" int4 NOT NULL,
	"dt_data" timestamp NOT NULL DEFAULT now(),
  PRIMARY KEY("ci_mobile_log")
);


CREATE TABLE "tb_service_mail_2" (
	"cd_teleconsulta" int4 NOT NULL,
	"cd_especialidade" int4 NOT NULL,
  PRIMARY KEY("cd_teleconsulta")
);


CREATE TABLE "integracao"."tb_integracao" (
	"ci_integracao" SERIAL NOT NULL,
	"tp_titpo" int2 NOT NULL DEFAULT 1,
	"ds_envio" text NOT NULL,
	"ds_resposta" text,
	"dt_data" timestamp NOT NULL DEFAULT now(),
  PRIMARY KEY("ci_integracao")
);


COMMENT ON COLUMN "integracao"."tb_integracao"."tp_titpo" IS '1 = Cadastro de Equipe
2 = Envio de Indicadores';

CREATE TABLE "integracao"."tb_municipio" (
	"codigo" int4 NOT NULL,
	"nome" varchar(200) NOT NULL,
	"uf" char(2) NOT NULL,
	"cd_localidade" int4,
  PRIMARY KEY("codigo")
);


CREATE TABLE "integracao"."tb_profissional" (
	"cpf" char(11) NOT NULL,
	"cns" varchar(100),
	"nome" varchar(250),
	"codigo_cbo" varchar(100),
	"equipe_codigo_ine" varchar(100),
	"estabelecimento_codigo_cnes" varchar(100),
	"fl_alterado" int2 NOT NULL DEFAULT 0,
  PRIMARY KEY("cpf")
);



--curso----------------------------------------------------------

CREATE TABLE "tb_curso" (
	"ci_curso" SERIAL NOT NULL,
	"ds_codigo" varchar NOT NULL,
	"ds_descricao" varchar NOT NULL,
	"dt_inicio" timestamp NOT NULL,
	"dt_fim" timestamp NOT NULL,
	"nr_vagas" int4 NOT NULL,
	"ds_tema" varchar NOT NULL,
	"nr_ch" int4 NOT NULL,
	"fl_ativo" bool NOT NULL default true,
  PRIMARY KEY("ci_curso"),
  CONSTRAINT "unq_tb_curso_ds_codigo" UNIQUE("ds_codigo")
);

CREATE TABLE "tb_aluno" (
	"ci_aluno" SERIAL NOT NULL,
	"id_curso" varchar NOT NULL,
	"nr_tipo" int2 NOT NULL, --1 sus | 2 normal
	"nm_aluno" varchar NOT NULL,
	"nr_codigo_sus" varchar,
	"nr_cpf" varchar,
	"nr_cns" varchar,
	"nr_cnes" varchar,
	"nr_cbo" varchar,
	"ds_email" varchar NOT NULL,
	"fl_sexo" int2 NOT NULL DEFAULT 1,
	"cd_localidade" int4 NOT NULL,
	"cd_profissao" int4 NOT NULL,
	"dt_nascimento" varchar NOT NULL,
	"ds_escolaridade" varchar NOT NULL,
	"ds_numero" varchar NOT NULL,
	"ds_telefone1" varchar NOT NULL,
	"ds_telefone2" varchar,
	"dt_data" timestamp NOT NULL DEFAULT now(),
  PRIMARY KEY("ci_aluno")
);



	
--fim curso----------------------------------------------------------



COMMENT ON COLUMN "integracao"."tb_profissional"."fl_alterado" IS 'Informa se o registro foi informado pelo ministério';


ALTER TABLE "tb_usuario_grupo" ADD CONSTRAINT "Ref_tb_usuario_grupo_to_tb_usuario" FOREIGN KEY ("cd_usuario")
	REFERENCES "tb_usuario"("ci_usuario")
	MATCH SIMPLE
	ON DELETE RESTRICT
	ON UPDATE RESTRICT
	NOT DEFERRABLE;

ALTER TABLE "tb_usuario_grupo" ADD CONSTRAINT "Ref_tb_usuario_grupo_to_tb_grupo" FOREIGN KEY ("cd_grupo")
	REFERENCES "tb_grupo"("ci_grupo")
	MATCH SIMPLE
	ON DELETE RESTRICT
	ON UPDATE RESTRICT
	NOT DEFERRABLE;

ALTER TABLE "tb_grupo_transacao" ADD CONSTRAINT "Ref_tb_grupo_transacao_to_tb_grupo" FOREIGN KEY ("cd_grupo")
	REFERENCES "tb_grupo"("ci_grupo")
	MATCH SIMPLE
	ON DELETE RESTRICT
	ON UPDATE RESTRICT
	NOT DEFERRABLE;

ALTER TABLE "tb_grupo_transacao" ADD CONSTRAINT "Ref_tb_grupo_transacao_to_tb_transacao" FOREIGN KEY ("cd_transacao")
	REFERENCES "tb_transacao"("ci_transacao")
	MATCH SIMPLE
	ON DELETE RESTRICT
	ON UPDATE RESTRICT
	NOT DEFERRABLE;

ALTER TABLE "tb_profissional" ADD CONSTRAINT "Ref_tb_profissional_to_tb_profissao" FOREIGN KEY ("cd_profissao")
	REFERENCES "tb_profissao"("ci_profissao")
	MATCH SIMPLE
	ON DELETE RESTRICT
	ON UPDATE RESTRICT
	NOT DEFERRABLE;

ALTER TABLE "tb_profissional" ADD CONSTRAINT "Ref_tb_profissional_to_tb_localidade" FOREIGN KEY ("cd_localidade")
	REFERENCES "tb_localidade"("ci_localidade")
	MATCH SIMPLE
	ON DELETE RESTRICT
	ON UPDATE RESTRICT
	NOT DEFERRABLE;

ALTER TABLE "tb_paciente" ADD CONSTRAINT "Ref_tb_paciente_to_tb_localidade" FOREIGN KEY ("cd_localidade")
	REFERENCES "tb_localidade"("ci_localidade")
	MATCH SIMPLE
	ON DELETE RESTRICT
	ON UPDATE RESTRICT
	NOT DEFERRABLE;

ALTER TABLE "tb_profissional_especialidade" ADD CONSTRAINT "Ref_tb_profissional_especialidade_to_tb_profissional" FOREIGN KEY ("cd_profissional")
	REFERENCES "tb_profissional"("ci_profissional")
	MATCH SIMPLE
	ON DELETE RESTRICT
	ON UPDATE RESTRICT
	NOT DEFERRABLE;

ALTER TABLE "tb_profissional_especialidade" ADD CONSTRAINT "Ref_tb_profissional_especialidade_to_tb_especialidade" FOREIGN KEY ("cd_especialidade")
	REFERENCES "tb_especialidade"("ci_especialidade")
	MATCH SIMPLE
	ON DELETE RESTRICT
	ON UPDATE RESTRICT
	NOT DEFERRABLE;

ALTER TABLE "tb_profissional_localidade" ADD CONSTRAINT "Ref_tb_profissional_localidade_to_tb_profissional" FOREIGN KEY ("cd_profissional")
	REFERENCES "tb_profissional"("ci_profissional")
	MATCH SIMPLE
	ON DELETE RESTRICT
	ON UPDATE RESTRICT
	NOT DEFERRABLE;

ALTER TABLE "tb_profissional_localidade" ADD CONSTRAINT "Ref_tb_profissional_localidade_to_tb_localidade" FOREIGN KEY ("cd_localidade")
	REFERENCES "tb_localidade"("ci_localidade")
	MATCH SIMPLE
	ON DELETE RESTRICT
	ON UPDATE RESTRICT
	NOT DEFERRABLE;

ALTER TABLE "tb_file" ADD CONSTRAINT "Ref_tb_file_to_tb_usuario" FOREIGN KEY ("cd_usuario")
	REFERENCES "tb_usuario"("ci_usuario")
	MATCH SIMPLE
	ON DELETE RESTRICT
	ON UPDATE RESTRICT
	NOT DEFERRABLE;

ALTER TABLE "tb_file" ADD CONSTRAINT "Ref_tb_file_to_tb_teleconsulta" FOREIGN KEY ("cd_teleconsulta")
	REFERENCES "tb_teleconsulta"("ci_teleconsulta")
	MATCH SIMPLE
	ON DELETE RESTRICT
	ON UPDATE RESTRICT
	NOT DEFERRABLE;

ALTER TABLE "tb_teleconsulta" ADD CONSTRAINT "Ref_tb_teleconsulta_to_tb_profissional" FOREIGN KEY ("cd_profissional_solicitante")
	REFERENCES "tb_profissional"("ci_profissional")
	MATCH SIMPLE
	ON DELETE RESTRICT
	ON UPDATE RESTRICT
	NOT DEFERRABLE;

ALTER TABLE "tb_teleconsulta" ADD CONSTRAINT "Ref_tb_teleconsulta_to_tb_profissional0" FOREIGN KEY ("cd_profissional_especialista")
	REFERENCES "tb_profissional"("ci_profissional")
	MATCH SIMPLE
	ON DELETE NO ACTION
	ON UPDATE RESTRICT
	NOT DEFERRABLE;

ALTER TABLE "tb_teleconsulta" ADD CONSTRAINT "Ref_tb_teleconsulta_to_tb_paciente" FOREIGN KEY ("cd_paciente")
	REFERENCES "tb_paciente"("ci_paciente")
	MATCH SIMPLE
	ON DELETE RESTRICT
	ON UPDATE RESTRICT
	NOT DEFERRABLE;

ALTER TABLE "tb_teleconsulta" ADD CONSTRAINT "Ref_tb_teleconsulta_to_tb_localidade" FOREIGN KEY ("cd_localidade")
	REFERENCES "tb_localidade"("ci_localidade")
	MATCH SIMPLE
	ON DELETE RESTRICT
	ON UPDATE RESTRICT
	NOT DEFERRABLE;

ALTER TABLE "tb_teleconsulta" ADD CONSTRAINT "Ref_tb_teleconsulta_to_tb_especialidade" FOREIGN KEY ("cd_especialidade")
	REFERENCES "tb_especialidade"("ci_especialidade")
	MATCH SIMPLE
	ON DELETE RESTRICT
	ON UPDATE RESTRICT
	NOT DEFERRABLE;

ALTER TABLE "tb_teleconsulta" ADD CONSTRAINT "Ref_tb_teleconsulta_to_tb_categoria_cid" FOREIGN KEY ("cd_categoria_cid")
	REFERENCES "tb_categoria_cid"("ci_categoria_cid")
	MATCH SIMPLE
	ON DELETE RESTRICT
	ON UPDATE RESTRICT
	NOT DEFERRABLE;

ALTER TABLE "tb_teleconsulta" ADD CONSTRAINT "Ref_tb_teleconsulta_to_tb_subcategoria_cid" FOREIGN KEY ("cd_subcategoria_cid")
	REFERENCES "tb_subcategoria_cid"("ci_subcategoria_cid")
	MATCH SIMPLE
	ON DELETE RESTRICT
	ON UPDATE RESTRICT
	NOT DEFERRABLE;

ALTER TABLE "tb_teleconsulta" ADD CONSTRAINT "Ref_tb_teleconsulta_to_tb_duvida" FOREIGN KEY ("cd_duvida")
	REFERENCES "tb_duvida"("ci_duvida")
	MATCH SIMPLE
	ON DELETE RESTRICT
	ON UPDATE RESTRICT
	NOT DEFERRABLE;

ALTER TABLE "tb_teleconsulta" ADD CONSTRAINT "Ref_tb_teleconsulta_to_tb_orientacao" FOREIGN KEY ("cd_orientacao")
	REFERENCES "tb_orientacao"("ci_orientacao")
	MATCH SIMPLE
	ON DELETE RESTRICT
	ON UPDATE RESTRICT
	NOT DEFERRABLE;

ALTER TABLE "tb_subcategoria_cid" ADD CONSTRAINT "Ref_tb_subcategoria_cid_to_tb_categoria_cid" FOREIGN KEY ("cd_categoria_cid")
	REFERENCES "tb_categoria_cid"("ci_categoria_cid")
	MATCH SIMPLE
	ON DELETE NO ACTION
	ON UPDATE NO ACTION
	NOT DEFERRABLE;

ALTER TABLE "tb_exame_telecardiologia" ADD CONSTRAINT "Ref_tb_exame_telecardiologia_to_tb_teleconsulta" FOREIGN KEY ("cd_teleconsulta")
	REFERENCES "tb_teleconsulta"("ci_teleconsulta")
	MATCH SIMPLE
	ON DELETE RESTRICT
	ON UPDATE RESTRICT
	NOT DEFERRABLE;

ALTER TABLE "tb_teleconsulta_resposta" ADD CONSTRAINT "Ref_tb_teleconsulta_resposta_to_tb_teleconsulta" FOREIGN KEY ("cd_teleconsulta")
	REFERENCES "tb_teleconsulta"("ci_teleconsulta")
	MATCH SIMPLE
	ON DELETE RESTRICT
	ON UPDATE RESTRICT
	NOT DEFERRABLE;

ALTER TABLE "tb_teleconsulta_resposta" ADD CONSTRAINT "Ref_tb_teleconsulta_resposta_to_tb_profissional" FOREIGN KEY ("cd_profissional")
	REFERENCES "tb_profissional"("ci_profissional")
	MATCH SIMPLE
	ON DELETE RESTRICT
	ON UPDATE RESTRICT
	NOT DEFERRABLE;


