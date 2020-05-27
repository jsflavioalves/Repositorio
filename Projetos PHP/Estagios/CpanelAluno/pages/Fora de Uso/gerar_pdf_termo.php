<?php
require('fpdf/fpdf.php');
require('conn.php');
mysql_select_db('estagios');

$pdf = new FPDF('P','pt','A4');
$pdf->SetTitle(utf8_decode('Termo de Compromisso de Estágio'));
$pdf->AddPage(); 

$id_termo_compromisso = $_POST['id_termo_compromisso'];

$consulta = mysql_query("SELECT * FROM termo_compromisso WHERE id_termo_compromisso LIKE '$id_termo_compromisso'");
$array = mysql_fetch_array($consulta);

// DADOS DA EMPRESA
$id_empresa = $array['nome'];
$representante = strtoupper(utf8_decode($_POST['representante']));
$cidade_empresa = strtoupper(utf8_decode($_POST['cidade']));
$atualiza_empresa = mysql_query("UPDATE empresas SET cidade_uf='$cidade_empresa', representante='$representante' WHERE 	CD_EMPRESA LIKE '$id_empresa'");
$busca_empresa = mysql_query("SELECT * FROM empresas WHERE CD_EMPRESA LIKE '$id_empresa'");
$array_empresa = mysql_fetch_array($busca_empresa);
$nome_empresa = $array_empresa['nome'];
$cnpj_empresa = $array_empresa['cnpj'];
$endereco_empresa = $array_empresa['endereco'];
$fone_empresa = $array_empresa['tel'];
// FIM DADOS DA EMPRESA

// DADOS PESSOAIS DO ALUNO
$matricula_aluno = $array['matricula_aluno'];
$busca_aluno = mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$matricula_aluno'");
$array_aluno = mysql_fetch_array($busca_aluno);
$nome_aluno = $array_aluno['nome'];
$cpf = $array_aluno['cpf'];
$rg = $array_aluno['rg'];
$nome_mae = $array_aluno['nome_mae'];
$curso_aluno = $array_aluno['curso'];
$endereco_aluno = $array_aluno['endereco'];
$cidade_aluno = $array_aluno['cidade'];
$uf_aluno = $array_aluno['uf'];
$fone_aluno = $array_aluno['telefone'];
// FIM DADOS PESSOAIS DO ALUNO

//DADOS DO ALUNO - ESTÁGIO
$dt_inicio = $array['dt_inicio'];
$dt_fim = $array['dt_fim'];
$meses = $_POST['meses'];
$valor_bolsa = $array['valor'];
$horas_semanais = $array['carga_horaria'];
$supervisor = strtoupper(utf8_decode($_POST['supervisor']));
//FIM DADOS DO ALUNO - ESTÁGIO

// DADOS DO PROFESSOR ORIENTADOR
$nome_professor = $array['prof_orientador'];
$siape_professor = $array['siape'];
$fone_professor = $_POST['fone'];
$email_professor = $_POST['email'];
$lotacao = strtoupper(utf8_decode($_POST['lotacao']));

$busca_professor = mysql_query("SELECT * FROM professor_orientador WHERE siape LIKE '$siape_professor'");
$conta = mysql_num_rows($busca_professor);
if($conta == 0){
$inserir_professor = mysql_query("INSERT INTO professor_orientador VALUES('', '$nome_professor', '$siape_professor', '$fone_professor', '$email_professor', '$lotacao')");
} else if($conta != 0){

}
// FIM DADOS DO PROFESSOR ORIENTADOR

// CORPO
$classificacao = utf8_encode($array['classificacao_termo']);
if($classificacao == "OBRIGATORIO"){

// CABEÇALHO
$pdf->Image('images/brasao.png',40,30,30,0);
$pdf->Image('images/brasao2.png',80,30,150,40);
$pdf->Ln(50);
// FIM CABEÇALHO

$tipo = utf8_decode("OBRIGATÓRIO");

// TÍTULO
$pdf->SetFont('arial','B',10);
$pdf->Cell(0,5,utf8_decode('TERMO DE COMPROMISSO DE ESTÁGIO ').$tipo,0,1,'C');
$pdf->Ln(15);

// DADOS DA INSTITUIÇÃO DE ENSINO
$pdf->SetFont('arial','B',8);
$pdf->MultiCell(535, 15, utf8_decode("Dados da Instituição de Ensino"), 1, 'L');

$pdf->SetFont('arial','',8);
$pdf->MultiCell(535, 10, utf8_decode("Nome: Universidade Federal do Ceará - UFC                                           CNPJ: 07.272.636/0001-31"), 0, 'L');
$pdf->MultiCell(535, 10, utf8_decode("Endereço: Av. da Universidade, 2853, Benfica, Fortaleza - CE                 Fone/Fax: (85) 3366 7413 / 3366 7881
"), 0, 'L');
$pdf->MultiCell(570, 10, utf8_decode("Represent. Legal: Reitor Henry de Holanda Campos                                Coordenador Agência de Estágios: Prof. Rogério Teixeira Masih
"), 0, 'L');
// FIM DADOS DA INSTITUIÇÃO DE ENSINO



// DADOS DA UNIDADES CONCEDENTE
$pdf->SetFont('arial','B',8);
$pdf->MultiCell(535, 15, utf8_decode("Dados da Unidade Concedente"), 1, 'L');
$pdf->SetFont('arial','',8);
$pdf->MultiCell(535, 10, utf8_decode("Razão Social: ").$nome_empresa."          CNPJ: ".$cnpj_empresa, 0, 'L');
$pdf->MultiCell(535, 10, utf8_decode("Endereço: ").$endereco_empresa."                                                     Cidade/UF: ".$cidade_empresa, 0, 'L');
$pdf->MultiCell(535, 10, utf8_decode("Fone/Fax: ").$fone_empresa."                                                      Setor:                                                Representante Legal: ".$representante, 0, 'L');
$pdf->MultiCell(535, 10, utf8_decode("Supervisor: ").$supervisor, 0, 'L');
// FIM DADOS DA UNIDADES CONCEDENTE



// DADOS DO ALUNO
$pdf->SetFont('arial','B',8);
$pdf->MultiCell(535, 15, utf8_decode("Dados do Aluno"), 1, 'L');
$pdf->SetFont('arial','',8);
$pdf->MultiCell(535, 10, utf8_decode("Nome: ").$nome_aluno.utf8_decode("                                             Matrícula: ").$matricula_aluno."            CPF: ".$cpf. "              RG: ".$rg, 0, 'L');
$pdf->MultiCell(535, 10, utf8_decode("Nome da Mãe: ").$nome_mae."                      Curso: ".$curso_aluno."                                       Semestre: ", 0, 'L');
$pdf->MultiCell(535, 10, utf8_decode("Endereço: ").$endereco_aluno."                                        Cidade/UF: ".$cidade_aluno." - ".$uf_aluno."                                        Fone: ".$fone_aluno, 0, 'L');
// FIM DADOS DO ALUNO


// DADOS DO PROFESSOR ORIENTADOR
$pdf->SetFont('arial','B',8);
$pdf->MultiCell(535, 15, utf8_decode("Dados do Professor Orientador"), 1, 'L');
$pdf->SetFont('arial','',8);
$pdf->MultiCell(535, 10, utf8_decode("Nome: ").$nome_professor."                                    SIAPE: ".$siape_professor."             Fone: ".$fone_professor. utf8_decode("               Lotação: ").$lotacao, 0, 'L');
// FIM DADOS DO PROFESSOR ORIENTADOR


// TEXTO PÁGINA 01
$pdf->Ln(10);
$pdf->SetFont('arial','',8);
$pdf->MultiCell(535, 10, utf8_decode("As partes firmam o presente Termo de Compromisso de Estágio Obrigatório, observando o disposto na Lei nº 11.788 de 25 de setembro de 2008, na Resolução no 23/CEPE de 30 de outubro 2009 e no Termo de Convênio já firmado entre a Unidade Concedente e a UFC, além das seguintes cláusulas:
CLÁUSULA PRIMEIRA: Através deste Termo, a UNIDADE CONCEDENTE se compromete a conceder experiência prática profissional ao ESTAGIÁRIO previamente selecionado, e com frequência regular no curso de graduação em que está matriculado na UFC, em conformidade com o Art. 3º, I, da Lei nº 11.788 de 25/09/2008.
CLÁUSULA SEGUNDA: O estágio tem como objetivo proporcionar ao estudante integração entre teoria e prática, a partir de situações reais e adequadas de trabalho, visando ao seu aprimoramento profissional e pessoal, e obedecerá ao seguinte Plano de Atividades, devendo tais atividades ser compatíveis com o currículo e com os horários escolares do ESTAGIÁRIO, conforme estabelecem o art. 7o, parágrafo único, o art. 3o, III, e o art. 10 da Lei nº 11.788 de 25/09/2008:"), 0, 'J');

$pdf->MultiCell(535, 100,"Atividades Previstas:", 1, 'L');
$pdf->Ln(3);
$pdf->MultiCell(535, 10, utf8_decode("CLÁUSULA TERCEIRA: Além das atividades previstas no plano, ficam definidas as seguintes características do estágio:
a) O estágio terá início em ".$dt_inicio." e término em ".$dt_fim.", compreendendo ".$meses." meses;
b) Por deliberação da UNIDADE CONCEDENTE, o valor da bolsa auxílio será de R$ ".$valor_bolsa." mensais;
c) O estudante estagiará ".$horas_semanais." horas semanais, respeitando o art. 10 da Lei nº 11.788 de 25/09/2008, que serão distribuídas da seguinte forma:"), 0, 'J');

$pdf->SetFont('arial','B',8);
$pdf->Ln(3);
$pdf->Cell(74,12,utf8_decode('Turnos'),1,0,'C');
$pdf->Cell(77,12,utf8_decode('Segunda'),1,0,'C');
$pdf->Cell(77,12,utf8_decode('Terça'),1,0,'C');
$pdf->Cell(77,12,utf8_decode('Quarta'),1,0,'C');
$pdf->Cell(77,12,utf8_decode('Quinta'),1,0,'C');
$pdf->Cell(77,12,utf8_decode('Sexta'),1,0,'C');
$pdf->Cell(77,12,utf8_decode('Sábado'),1,1,'C');

$pdf->SetFont('arial','',8);
$pdf->Cell(74,12,utf8_decode('Manhã'),1,0,'C');
$pdf->Cell(77,12,utf8_decode('____h a ____h'),1,0,'C');
$pdf->Cell(77,12,utf8_decode('____h a ____h'),1,0,'C');
$pdf->Cell(77,12,utf8_decode('____h a ____h'),1,0,'C');
$pdf->Cell(77,12,utf8_decode('____h a ____h'),1,0,'C');
$pdf->Cell(77,12,utf8_decode('____h a ____h'),1,0,'C');
$pdf->Cell(77,12,utf8_decode('____h a ____h'),1,1,'C');

$pdf->Cell(74,12,utf8_decode('Tarde'),1,0,'C');
$pdf->Cell(77,12,utf8_decode('____h a ____h'),1,0,'C');
$pdf->Cell(77,12,utf8_decode('____h a ____h'),1,0,'C');
$pdf->Cell(77,12,utf8_decode('____h a ____h'),1,0,'C');
$pdf->Cell(77,12,utf8_decode('____h a ____h'),1,0,'C');
$pdf->Cell(77,12,utf8_decode('____h a ____h'),1,0,'C');
$pdf->Cell(77,12,utf8_decode('____h a ____h'),1,1,'C');

$pdf->Cell(74,12,utf8_decode('Noite'),1,0,'C');
$pdf->Cell(77,12,utf8_decode('____h a ____h'),1,0,'C');
$pdf->Cell(77,12,utf8_decode('____h a ____h'),1,0,'C');
$pdf->Cell(77,12,utf8_decode('____h a ____h'),1,0,'C');
$pdf->Cell(77,12,utf8_decode('____h a ____h'),1,0,'C');
$pdf->Cell(77,12,utf8_decode('____h a ____h'),1,0,'C');
$pdf->Cell(77,12,utf8_decode('____h a ____h'),1,1,'C');

$pdf->Ln(3);
$pdf->MultiCell(535, 10,utf8_decode("d) A carga horária do estágio será reduzida pelo menos à metade nos períodos de avaliação do ESTAGIÁRIO, para garantir o bom desempenho do estudante, nos termos do Art. 10, §2o, da Lei n° 11.788 de 25/09/2008;
e) A UFC oferece seguro contra acidentes pessoais a todos os seus estudantes devidamente matriculados, também contemplando o ESTAGIÁRIO, parte deste Termo, durante a vigência do presente. Seguem as informações do seguro:"), 0, 'J');

$pdf->Ln(3);
$pdf->Cell(360,12,utf8_decode('Empresa Seguradora: SEGUROS SURA S/A'),1,0,'C');
$pdf->Cell(177,12,utf8_decode('Apólice: 071.00982.00820-13'),1,1,'C');
$pdf->Cell(180,12,utf8_decode('Vigência: de 30/11/2016 até 30/11/2017'),1,0,'C');
$pdf->Cell(180,12,utf8_decode('Morte Acidental: R$ 10.000,00'),1,0,'C');
$pdf->Cell(177,12,utf8_decode('Invalidez Permanente: R$ 10.000,00'),1,1,'C');

$pdf->Ln(3);
$pdf->MultiCell(535, 10,utf8_decode("f) O estágio somente poderá ter início após a assinatura deste Termo pelas partes envolvidas, conforme estabelece o Art. 9º, inciso I da Lei nº 11.788 de 25/09/2008, e o Art. 7°, 'g', da Resolução no 23/CEPE de 30/10/2009.
CLÁUSULA QUARTA: Compete ao ESTAGIÁRIO:
a) Cumprir as normas internas da UNIDADE CONCEDENTE, especialmente as de orientação do plano de atividades constante neste Termo, devendo apresentar à UFC, em prazo não superior a 6 (seis) meses, o relatório das atividades desenvolvidas
b) Seguir a orientação articulada entre os Supervisores de Estágio designados pela UNIDADE CONCEDENTE e pela UFC;
c) Diante da impossibilidade de cumprir o estabelecido neste Termo, comunicar a circunstância à UNIDADE CONCEDENTE, ficando esclarecido, desde logo, que suas obrigações escolares e a pertinência das atividades à sua qualificação profissional serão consideradas motivos justos;
d) Em caso de desistência do Estágio, comunicar à Empresa com antecedência mínima de 05 (cinco) dias e entregar termo de rescisão contratual à UFC, no setor competente."), 0, 'J');

// FIM TEXTO PÁGINA 01

$pdf->AddPage(); 
// CABEÇALHO PÁGINA 02
$pdf->Image('images/brasao.png',40,30,30,0);
$pdf->Image('images/brasao2.png',80,30,150,40);
$pdf->Ln(50);
// FIM CABEÇALHO PÁGINA 02

// TEXTO PÁGINA 02
$pdf->MultiCell(535, 10,utf8_decode("CLÁUSULA QUINTA: São motivos para a rescisão imediata deste Termo de Compromisso de Estágio a ocorrência das seguintes hipóteses: 
a) Conclusão, trancamento ou abandono do Curso;
b) Transferência para Curso que não tenha relação com as atividades de estágio desenvolvidas na Empresa;
c) Descumprimento do convencionado no presente Termo;
d) Prática comprovada de conduta danosa, não estando o ESTAGIÁRIO isento de arcar com as perdas e os danos desta decorrentes.
CLÁUSULA SEXTA: O estágio não acarretará vínculo empregatício de qualquer natureza, conforme Art. 3º, caput e § 2º, e Art. 2° da Lei nº 11.788 de 25/09/2008.
CLÁUSULA SÉTIMA: O descumprimento das condições estabelecidas neste Termo pela UNIDADE CONCEDENTE caracteriza vínculo de emprego com o ESTAGIÁRIO, para todos os fins da legislação trabalhista e previdenciária, conforme estabelece o art. 15 da Lei nº 11.788 de 25/09/2008.
CLÁUSULA OITAVA: Qualquer alteração do estabelecido neste Termo será feita mediante Aditivo, com a anuência das partes envolvidas.
E, por estarem devidamente cientes das condições aqui estipuladas, bem como das disposições legais vigentes sobre o assunto, firmam a UNIDADE CONCEDENTE e o ESTAGIÁRIO, com interveniência da UFC, o presente TERMO, em 03 (três) vias de igual teor e forma, para que este produza seus devidos efeitos legais."), 0, 'J');

$pdf->Ln(20);
$pdf->MultiCell(535, 10,utf8_decode("DECLARO, serem exatas e verdadeiras as informações aqui prestadas, sob pena de responsabilidade administrativa, cível e penal."), 0, 'J');

$pdf->Ln(30);
$pdf->MultiCell(535, 10,utf8_decode("Fortaleza - CE, ___ de _____________ de _______"), 0, 'J');

$pdf->Ln(50);
$pdf->MultiCell(535, 10,utf8_decode("____________________________________________                                                       ____________________________________________"), 0, 'J');
$pdf->MultiCell(535, 10,utf8_decode("                                  Estagiário                                                                                                                           Unidade Concedente"), 0, 'J');

$pdf->Ln(50);
$pdf->MultiCell(535, 10,utf8_decode("____________________________________________                                                       ____________________________________________"), 0, 'J');
$pdf->MultiCell(535, 10,utf8_decode("                      Professor Orientador UFC                                                                                                        Agência de Estágios UFC"), 0, 'J');

$pdf->Ln(80);
$pdf->SetFont('arial','B',8);
$pdf->MultiCell(535, 10,utf8_decode("Observações Gerais:"), 0, 'J');
$pdf->SetFont('arial','',8);
$pdf->MultiCell(535, 10,utf8_decode("1. A assinatura do Professor Orientador UFC não substitui a assinatura da agência de estágios UFC;
2. O estágio somente será formalizado e reconhecido pela UFC após a assinatura e o carimbo da Agência de Estágios no Termo de Compromisso;
3. O Termo de Compromisso deve ser apresentado à Agência de Estágios UFC antes do início das atividades."), 0, 'J');
// FIM TEXTO 02


} else if($classificacao == "NÃO OBRIGATORIO"){

// CABEÇALHO PÁGINA 01
$pdf->Image('images/brasao.png',40,30,30,0);
$pdf->Image('images/brasao2.png',80,30,150,40);
$pdf->Ln(50);
// FIM CABEÇALHO PÁGINA 01

$tipo = utf8_decode("NÃO OBRIGATÓRIO");

// TÍTULO
$pdf->SetFont('arial','B',10);
$pdf->Cell(0,5,utf8_decode('TERMO DE COMPROMISSO DE ESTÁGIO ').$tipo,0,1,'C');
$pdf->Ln(15);


// DADOS DA INSTITUIÇÃO DE ENSINO
$pdf->SetFont('arial','B',8);
$pdf->MultiCell(535, 15, utf8_decode("Dados da Instituição de Ensino"), 1, 'L');

$pdf->SetFont('arial','',8);
$pdf->MultiCell(535, 10, utf8_decode("Nome: Universidade Federal do Ceará - UFC                                           CNPJ: 07.272.636/0001-31"), 0, 'L');
$pdf->MultiCell(535, 10, utf8_decode("Endereço: Av. da Universidade, 2853, Benfica, Fortaleza - CE                 Fone/Fax: (85) 3366 7413 / 3366 7881
"), 0, 'L');
$pdf->MultiCell(570, 10, utf8_decode("Represent. Legal: Reitor Henry de Holanda Campos                                Coordenador Agência de Estágios: Prof. Rogério Teixeira Masih
"), 0, 'L');
// FIM DADOS DA INSTITUIÇÃO DE ENSINO



// DADOS DA UNIDADES CONCEDENTE
$pdf->SetFont('arial','B',8);
$pdf->MultiCell(535, 15, utf8_decode("Dados da Unidade Concedente"), 1, 'L');
$pdf->SetFont('arial','',8);
$pdf->MultiCell(535, 10, utf8_decode("Razão Social: ").$nome_empresa."          CNPJ: ".$cnpj_empresa, 0, 'L');
$pdf->MultiCell(535, 10, utf8_decode("Endereço: ").$endereco_empresa."                                                     Cidade/UF: ", 0, 'L');
$pdf->MultiCell(535, 10, utf8_decode("Fone/Fax: ").$fone_empresa."                                                      Setor:                                                Representante Legal: ", 0, 'L');
$pdf->MultiCell(535, 10, utf8_decode("Supervisor: "), 0, 'L');
// FIM DADOS DA UNIDADES CONCEDENTE



// DADOS DO ALUNO
$pdf->SetFont('arial','B',8);
$pdf->MultiCell(535, 15, utf8_decode("Dados do Aluno"), 1, 'L');
$pdf->SetFont('arial','',8);
$pdf->MultiCell(535, 10, utf8_decode("Nome: ").$nome_aluno.utf8_decode("                                             Matrícula: ").$matricula_aluno."            CPF: ".$cpf. "              RG: ".$rg, 0, 'L');
$pdf->MultiCell(535, 10, utf8_decode("Nome da Mãe: ").$nome_mae."                      Curso: ".$curso_aluno."                                       Semestre: ", 0, 'L');
$pdf->MultiCell(535, 10, utf8_decode("Endereço: ").$endereco_aluno."                                        Cidade/UF: ".$cidade_aluno." - ".$uf_aluno."                                        Fone: ".$fone_aluno, 0, 'L');
// FIM DADOS DO ALUNO


// DADOS DO PROFESSOR ORIENTADOR
$pdf->SetFont('arial','B',8);
$pdf->MultiCell(535, 15, utf8_decode("Dados do Professor Orientador"), 1, 'L');
$pdf->SetFont('arial','',8);
$pdf->MultiCell(535, 10, utf8_decode("Nome: ").$nome_professor."                                    SIAPE: ".$siape_professor."                 Fone: ".utf8_decode("                                  Lotação: "), 0, 'L');
// FIM DADOS DO PROFESSOR ORIENTADOR

// DADOS DO SEGURO
$pdf->SetFont('arial','B',8);
$pdf->MultiCell(535, 15, utf8_decode("Dados do Seguro Contra acidentes pessoais"), 1, 'L');
$pdf->SetFont('arial','',8);
$pdf->MultiCell(535, 10, utf8_decode("Empresa Seguradora:                                                                           Apólice: "), 0, 'L');
// FIM DADOS DO SEGURO


// TEXTO PÁGINA 01
$pdf->Ln(10);
$pdf->SetFont('arial','',8);
$pdf->MultiCell(535, 10, utf8_decode("As partes firmam o presente Termo de Compromisso de Estágio Não Obrigatório, observando o disposto na Lei nº 11.788, de 25 de setembro de 2008, na Resolução no 32/CEPE de 30 de outubro 2009, e no Termo de Convênio já firmado entre a Unidade Concedente e a UFC, além das seguintes cláusulas:
CLÁUSULA PRIMEIRA: Através deste Termo, a UNIDADE CONCEDENTE se compromete a conceder experiência prática profissional ao ESTAGIÁRIO previamente selecionado, e com frequência regular no curso de graduação em que está matriculado na UFC, em conformidade com o Art. 3º, I, da Lei nº 11.788 de 25/09/2008.
CLÁUSULA SEGUNDA: O estágio tem como objetivo proporcionar ao estudante integração entre teoria e prática, a partir de situações reais e adequadas de trabalho, visando ao seu aprimoramento profissional e pessoal, e obedecerá ao seguinte Plano de Atividades, devendo tais atividades ser compatíveis com o currículo e com os horários escolares do ESTAGIÁRIO, conforme estabelecem o art. 7o, parágrafo único, o art. 3o, III, e o art. 10 da Lei nº 11.788 de 25/09/2008:"), 0, 'J');

$pdf->MultiCell(535, 100,"Atividades Previstas:", 1, 'L');
$pdf->Ln(3);
$pdf->MultiCell(535, 10, utf8_decode("CLÁUSULA TERCEIRA: Além das atividades previstas no plano, ficam definidas as seguintes características do estágio:
a) O estágio terá início em ".$dt_inicio." e término em ".$dt_fim.", compreendendo ___ meses, não podendo, em qualquer hipótese, ultrapassar o último dia do semestre do ano fixado para a conclusão do curso do estagiário;
b) O valor da bolsa mensal ou de outra forma de contraprestação acordada entre a UNIDADE CONCEDENTE e o ESTAGIÁRIO é de ".$valor_bolsa.", sendo compulsória a sua concessão, bem como a do auxílio-transporte;
c) O estudante estagiará ".$horas_semanais." horas semanais, respeitando o art. 10 da Lei nº 11.788 de 25/09/2008, que serão distribuídas da seguinte forma:"), 0, 'J');

$pdf->SetFont('arial','B',8);
$pdf->Ln(3);
$pdf->Cell(74,12,utf8_decode('Turnos'),1,0,'C');
$pdf->Cell(77,12,utf8_decode('Segunda'),1,0,'C');
$pdf->Cell(77,12,utf8_decode('Terça'),1,0,'C');
$pdf->Cell(77,12,utf8_decode('Quarta'),1,0,'C');
$pdf->Cell(77,12,utf8_decode('Quinta'),1,0,'C');
$pdf->Cell(77,12,utf8_decode('Sexta'),1,0,'C');
$pdf->Cell(77,12,utf8_decode('Sábado'),1,1,'C');

$pdf->SetFont('arial','',8);
$pdf->Cell(74,12,utf8_decode('Manhã'),1,0,'C');
$pdf->Cell(77,12,utf8_decode('____h a ____h'),1,0,'C');
$pdf->Cell(77,12,utf8_decode('____h a ____h'),1,0,'C');
$pdf->Cell(77,12,utf8_decode('____h a ____h'),1,0,'C');
$pdf->Cell(77,12,utf8_decode('____h a ____h'),1,0,'C');
$pdf->Cell(77,12,utf8_decode('____h a ____h'),1,0,'C');
$pdf->Cell(77,12,utf8_decode('____h a ____h'),1,1,'C');

$pdf->Cell(74,12,utf8_decode('Tarde'),1,0,'C');
$pdf->Cell(77,12,utf8_decode('____h a ____h'),1,0,'C');
$pdf->Cell(77,12,utf8_decode('____h a ____h'),1,0,'C');
$pdf->Cell(77,12,utf8_decode('____h a ____h'),1,0,'C');
$pdf->Cell(77,12,utf8_decode('____h a ____h'),1,0,'C');
$pdf->Cell(77,12,utf8_decode('____h a ____h'),1,0,'C');
$pdf->Cell(77,12,utf8_decode('____h a ____h'),1,1,'C');

$pdf->Cell(74,12,utf8_decode('Noite'),1,0,'C');
$pdf->Cell(77,12,utf8_decode('____h a ____h'),1,0,'C');
$pdf->Cell(77,12,utf8_decode('____h a ____h'),1,0,'C');
$pdf->Cell(77,12,utf8_decode('____h a ____h'),1,0,'C');
$pdf->Cell(77,12,utf8_decode('____h a ____h'),1,0,'C');
$pdf->Cell(77,12,utf8_decode('____h a ____h'),1,0,'C');
$pdf->Cell(77,12,utf8_decode('____h a ____h'),1,1,'C');

$pdf->Ln(3);
$pdf->MultiCell(535, 10,utf8_decode("d) A carga horária do estágio será reduzida pelo menos à metade nos períodos de avaliação do ESTAGIÁRIO, para garantir o bom desempenho do estudante, nos termos do Art. 10, §2o, da Lei n° 11.788 de 25/09/2008;
e) É assegurado ao estagiário, sempre que o estágio tiver duração igual ou superior a 1 (um) ano, recesso remunerado de 30 (trinta) dias a ser gozado, preferencialmente, durante as férias escolares, ficando assegurado recesso de maneira proporcional, nos casos em que o estágio tiver duração inferior a 1 (um) ano;"), 0, 'J');

$pdf->MultiCell(535, 10,utf8_decode("f) A UNIDADE CONCEDENTE obriga-se a contratar em favor do ESTAGIÁRIO, na vigência do presente Termo, seguro contra Acidentes Pessoais, de acordo com o Art. 9º, inciso IV da Lei n° 11.788 de 25/09/2008. 
g) O estágio somente poderá ter início após a assinatura deste Termo pelas partes envolvidas, conforme estabelece o Art. 9º, inciso I da Lei nº 11.788 de 25/09/2008, e o Art. 7o, 'g', da Resolução no 23/CEPE de 30/10/2009;"), 0, 'J');

// FIM TEXTO PÁGINA 01

$pdf->AddPage(); 
// CABEÇALHO
$pdf->Image('images/brasao.png',40,30,30,0);
$pdf->Image('images/brasao2.png',80,30,150,40);
$pdf->Ln(50);
// FIM CABEÇALHO

// TEXTO PÁGINA 02
$pdf->MultiCell(535, 10,utf8_decode("CLÁUSULA QUARTA: Compete ao ESTAGIÁRIO:
a) Cumprir as normas internas da UNIDADE CONCEDENTE, especialmente as de orientação do plano de atividades anexo a este Termo, devendo apresentar à UFC, em prazo não superior a 6 (seis) meses, o relatório das atividades desenvolvidas
b) Seguir a orientação articulada entre os Supervisores de Estágio designados pela UNIDADE CONCEDENTE e pela UFC;
c) Diante da impossibilidade de cumprir o estabelecido neste Termo, comunicar a circunstância à UNIDADE CONCEDENTE, ficando esclarecido, desde logo, que suas obrigações escolares e a pertinência das atividades à sua qualificação profissional serão consideradas motivos justos;
d) Em caso de desistência do Estágio, comunicar à Empresa com antecedência mínima de 05 (cinco) dias e entregar termo de rescisão à UFC, no setor competente."), 0, 'J');
$pdf->Ln(5);
$pdf->MultiCell(535, 10,utf8_decode("CLÁUSULA QUINTA: São motivos para a rescisão imediata deste Termo de Compromisso de Estágio a ocorrência das seguintes hipóteses: 
a) Conclusão, trancamento ou abandono do Curso;
b) Transferência para Curso que não tenha relação com as atividades de estágio desenvolvidas na Empresa;
c) Descumprimento do convencionado no presente Termo;
d) Prática comprovada de conduta danosa, não estando o ESTAGIÁRIO isento de arcar com as perdas e os danos desta decorrentes."), 0, 'J');
$pdf->Ln(5);
$pdf->MultiCell(535, 10,utf8_decode("CLÁUSULA SEXTA: O estágio não acarretará vínculo empregatício de qualquer natureza, conforme Art. 3º, caput e § 2º, e Art. 2° da Lei nº 11.788 de 25/09/2008."), 0, 'J');
$pdf->Ln(5);
$pdf->MultiCell(535, 10,utf8_decode("CLÁUSULA SÉTIMA: O descumprimento das condições estabelecidas neste Termo pela UNIDADE CONCEDENTE caracteriza vínculo de emprego com o ESTAGIÁRIO, para todos os fins da legislação trabalhista e previdenciária, conforme estabelece o art. 15 da Lei nº 11.788 de 25/09/2008."), 0, 'J');
$pdf->Ln(5);
$pdf->MultiCell(535, 10,utf8_decode("CLÁUSULA OITAVA: O aluno não poderá acumular estágio com recebimento de bolsa da UFC."), 0, 'J');
$pdf->Ln(5);
$pdf->MultiCell(535, 10,utf8_decode("CLÁUSULA NONA: Qualquer alteração do estabelecido neste Termo será feita mediante Aditivo, com a anuência das partes envolvidas.
E, por estarem devidamente cientes das condições aqui estipuladas, bem como das disposições legais vigentes sobre o assunto, firmam a EMPRESA e o ESTAGIÁRIO, com interveniência da UFC, o presente TERMO, em 03 (três) vias de igual teor e forma, para que este produza seus devidos efeitos legais."), 0, 'J');


$pdf->Ln(20);
$pdf->MultiCell(535, 10,utf8_decode("DECLARO, serem exatas e verdadeiras as informações aqui prestadas, sob pena de responsabilidade administrativa, cível e penal."), 0, 'J');

$pdf->Ln(30);
$pdf->MultiCell(535, 10,utf8_decode("Fortaleza - CE, ___ de _____________ de _______"), 0, 'J');

$pdf->Ln(50);
$pdf->MultiCell(535, 10,utf8_decode("____________________________________________                                                       ____________________________________________"), 0, 'J');
$pdf->MultiCell(535, 10,utf8_decode("                                  Estagiário                                                                                                                           Unidade Concedente"), 0, 'J');

$pdf->Ln(50);
$pdf->MultiCell(535, 10,utf8_decode("____________________________________________                                                       ____________________________________________"), 0, 'J');
$pdf->MultiCell(535, 10,utf8_decode("                      Professor Orientador UFC                                                                                                        Agência de Estágios UFC"), 0, 'J');

$pdf->Ln(80);
$pdf->SetFont('arial','B',8);
$pdf->MultiCell(535, 10,utf8_decode("Observações Gerais:"), 0, 'J');
$pdf->SetFont('arial','',8);
$pdf->MultiCell(535, 10,utf8_decode("1. A assinatura do Professor Orientador UFC não substitui a assinatura da Agência de Estágios UFC;
2. O estágio somente será formalizado e reconhecido pela UFC após a assinatura e o carimbo da Agência de Estágios no Termo de Compromisso;
3. O Termo de Compromisso deve ser apresentado à Agência de Estágios UFC antes do início das atividades."), 0, 'J');
// FIM TEXTO 02
}


$pdf->Output(utf8_decode("termo_de_compromisso.pdf"),"I");

?>