<?php
require('conn.php');
mysql_select_db('estagios');
$selecionar=mysql_query("SELECT*FROM seguro");
$result=mysql_fetch_array($selecionar);

$empresa_seguradora = $result['empresa_seguradora'];
$apolice = $result['apolice'];
$dt_inicio = $result['dt_inicio'];
$dt_fim = $result['dt_fim'];
$morte = $result['morte'];
$invalidez = $result['invalidez'];

$id_aluno = utf8_decode($_POST['id_aluno']);
$tipo_termo = utf8_decode($_POST['tipo_termo']);

$nomeEmpresa = utf8_decode($_POST['nomeEmpresa']);

mysql_select_db('estagios');
$selecionar1=mysql_query("SELECT*FROM empresas where nome like '$nomeEmpresa' ");
$result1=mysql_fetch_array($selecionar1);
$CD_EMPRESA = $result1['CD_EMPRESA'];

$cnpj = utf8_decode($_POST['cnpj']);
$foneEmpresa = utf8_decode($_POST['foneEmpresa']);
$enderecoEmpresa = utf8_decode($_POST['enderecoEmpresa']);
$cidadeEmpresa = utf8_decode($_POST['cidadeEmpresa']);
$setor = utf8_decode($_POST['setor']);
$represetante = utf8_decode($_POST['representante']);
$supervisor = utf8_decode($_POST['supervisor']);

$nomeAluno = utf8_decode($_POST['nomeAluno']);
$cpf = utf8_decode($_POST['cpf']);
$foneAluno = utf8_decode($_POST['foneAluno']);
$mae = utf8_decode($_POST['mae']);
$matricula = utf8_decode($_POST['matricula']);
$curso = utf8_decode($_POST['curso']);
$semestre = utf8_decode($_POST['semestre']);
$enderecoAluno = utf8_decode($_POST['enderecoAluno']);
$cidadeAluno = utf8_decode($_POST['cidadeAluno']);
$ufAluno = utf8_decode($_POST['ufAluno']);

$nomeOrientador = utf8_decode($_POST['nomeOrientador']);
$siape = utf8_decode($_POST['siape']);
$foneOrientador = utf8_decode($_POST['foneOrientador']);
$lotacao = utf8_decode($_POST['lotacao']);

$atividades = utf8_decode($_POST['atividades']);
$dataInicio = utf8_decode($_POST['dataInicio']);
$dataFim = utf8_decode($_POST['dataFim']);
$meses = utf8_decode($_POST['meses']);
$valor = utf8_decode($_POST['valor']);
$horasSemanais = utf8_decode($_POST['horasSemanais']);

$segundaManhaIni = utf8_decode($_POST['segundaManhaIni']);
$segundaManhaFim = utf8_decode($_POST['segundaManhaFim']);
$segundaTardeIni = utf8_decode($_POST['segundaTardeIni']);
$segundaTardeFim = utf8_decode($_POST['segundaTardeFim']);
$segundaNoiteIni = utf8_decode($_POST['segundaNoiteIni']);
$segundaNoiteFim = utf8_decode($_POST['segundaNoiteFim']);

$tercaManhaIni = utf8_decode($_POST['tercaManhaIni']);
$tercaManhaFim = utf8_decode($_POST['tercaManhaFim']);
$tercaTardeIni = utf8_decode($_POST['tercaTardeIni']);
$tercaTardeFim = utf8_decode($_POST['tercaTardeFim']);
$tercaNoiteIni = utf8_decode($_POST['tercaNoiteIni']);
$tercaNoiteFim = utf8_decode($_POST['tercaNoiteFim']);

$quartaManhaIni = utf8_decode($_POST['quartaManhaIni']);
$quartaManhaFim = utf8_decode($_POST['quartaManhaFim']);
$quartaTardeIni = utf8_decode($_POST['quartaTardeIni']);
$quartaTardeFim = utf8_decode($_POST['quartaTardeFim']);
$quartaNoiteIni = utf8_decode($_POST['quartaNoiteIni']);
$quartaNoiteFim = utf8_decode($_POST['quartaNoiteFim']);

$quintaManhaIni = utf8_decode($_POST['quintaManhaIni']);
$quintaManhaFim = utf8_decode($_POST['quintaManhaFim']);
$quintaTardeIni = utf8_decode($_POST['quintaTardeIni']);
$quintaTardeFim = utf8_decode($_POST['quintaTardeFim']);
$quintaNoiteIni = utf8_decode($_POST['quintaNoiteIni']);
$quintaNoiteFim = utf8_decode($_POST['quintaNoiteFim']);

$sextaManhaIni = utf8_decode($_POST['sextaManhaIni']);
$sextaManhaFim = utf8_decode($_POST['sextaManhaFim']);
$sextaTardeIni = utf8_decode($_POST['sextaTardeIni']);
$sextaTardeFim = utf8_decode($_POST['sextaTardeFim']);
$sextaNoiteIni = utf8_decode($_POST['sextaNoiteIni']);
$sextaNoiteFim = utf8_decode($_POST['sextaNoiteFim']);

$sabadoManhaIni = utf8_decode($_POST['sabadoManhaIni']);
$sabadoManhaFim = utf8_decode($_POST['sabadoManhaFim']);
$sabadoTardeIni = utf8_decode($_POST['sabadoTardeIni']);
$sabadoTardeFim = utf8_decode($_POST['sabadoTardeFim']);
$sabadoNoiteIni = utf8_decode($_POST['sabadoNoiteIni']);
$sabadoNoiteFim = utf8_decode($_POST['sabadoNoiteFim']);

setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$data_atual = strftime('%d de %B de %Y', strtotime('today'));

$relatorio = utf8_decode('NÃO');
$obs = utf8_decode('TERMO NÃO CONFIRMADO');
$tipo_termo2 = utf8_decode('OBRIGATÓRIO');

$inserir1 = mysql_query("INSERT INTO termo_compromisso VALUES ('','$matricula','$valor','$CD_EMPRESA','$dataInicio','$dataFim','','103','T.C','$horasSemanais','','','','$tipo_termo2','$relatorio','$nomeOrientador','','$obs','INATIVO')");

$selecionar2=mysql_query("SELECT*FROM termo_compromisso where matricula_aluno like '$matricula' ORDER BY id_termo_compromisso DESC");
$result2=mysql_fetch_array($selecionar2);
$id_termo_compromisso = $result2['id_termo_compromisso'];
$inserir2 = mysql_query("INSERT INTO termo_pdf VALUES ('','$id_termo_compromisso','$nomeEmpresa','$cnpj','$foneEmpresa','$enderecoEmpresa','$cidadeEmpresa','$setor','$represetante','$supervisor','$id_aluno','$nomeAluno','$cpf','$foneAluno','$mae','$matricula','$curso','$semestre','$enderecoAluno','$cidadeAluno','$ufAluno','$nomeOrientador','$siape','$foneOrientador','$lotacao','$atividades','$dataInicio','$dataFim','$meses','$valor','$horasSemanais','$tipo_termo','$segundaManhaIni','$segundaManhaFim','$segundaTardeIni','$segundaTardeFim','$segundaNoiteIni','$segundaNoiteFim','$tercaManhaIni','$tercaManhaFim','$tercaTardeIni','$tercaTardeFim','$tercaNoiteIni','$tercaNoiteFim','$quartaManhaIni','$quartaManhaFim','$quartaTardeIni','$quartaTardeFim','$quartaNoiteIni','$quartaNoiteFim','$quintaManhaIni','$quintaManhaFim','$quintaTardeIni','$quintaTardeFim','$quintaNoiteIni','$quintaNoiteFim','$sextaManhaIni','$sextaManhaFim','$sextaTardeIni','$sextaTardeFim','$sextaNoiteIni','$sextaNoiteFim','$sabadoManhaIni','$sabadoManhaFim','$sabadoTardeIni','$sabadoTardeFim','$sabadoNoiteIni','$sabadoNoiteFim','$data_atual')");


require_once('fpdf/fpdf.php');

$pdf = new FPDF('P','pt','A4');
$pdf->AddPage(); 

$pdf->SetTitle(utf8_decode('TERMO DE COMPROMISSO DE ESTÁGIO OBRIGATÓRIO - '.$nomeAluno.''));

$pdf->Image('logo2.jpg',50,30,-370,40);
$pdf->Ln(10);
$pdf->SetFont('arial','B',12);
$pdf->Ln(70);
$pdf->Cell(0,5,utf8_decode('TERMO DE COMPROMISSO DE ESTÁGIO OBRIGATÓRIO'),0,1,'C');
$pdf->Ln(30);
$pdf->setFillColor(217, 217, 217);
$pdf->SetFont('arial','B',10);
$pdf->Cell(0,15,utf8_decode('Dados da Instituição de Ensino'),0,1,'L',1);
$pdf->setFillColor(255, 255, 255);
$pdf->SetFont('arial','',10);
$pdf->Cell(269,15,utf8_decode('Nome: Universidade Federal do Ceará - UFC'),0,0,'L');
$pdf->Cell(270,15,utf8_decode('CNPJ: 07.272.636/0001-31'),0,1,'L');
$pdf->Cell(269,15,utf8_decode('Endereço: Av. da Universidade, 2853, Benfica, '),0,0,'L');
$pdf->Cell(270,15,utf8_decode('Fone/Fax: (85) 3366 7413 / 3366 7881'),0,1,'L');
$pdf->Cell(269,15,utf8_decode('Fortaleza - CE'),0,1,'L');
$pdf->Cell(270,15,utf8_decode('Represent. Legal: Reitor Henry de Holanda Campos'),0,0,'L');
$pdf->Cell(269,15,utf8_decode('Coord. Agéncia de Estágios: Prof. Rogério Teixeira Masih'),0,1,'L');

$pdf->setFillColor(217, 217, 217);
$pdf->SetFont('arial','B',10);
$pdf->Cell(0,15,utf8_decode('Dados da Unidade Concedente'),0,1,'L',1);
$pdf->setFillColor(255, 255, 255);
$pdf->SetFont('arial','',10); 
$pdf->Cell(389,15,utf8_decode('Razão Social: ').strtoupper($nomeEmpresa),0,1,'L');
$pdf->Cell(389,15,utf8_decode('Endereço: ').strtoupper($enderecoEmpresa),0,0,'L');
$pdf->Cell(120,15,'CNPJ: '.$cnpj,0,1,'L');
$pdf->Cell(190,15,'Cidade/UF: '.strtoupper($cidadeEmpresa),0,0,'L');
$pdf->Cell(200,15,'Setor: '.strtoupper($setor),0,0,'L');
$pdf->Cell(269,15,'Fone/Fax: '.$foneEmpresa,0,1,'L');
$pdf->Cell(269,15,'Representante Legal: '.strtoupper($represetante),0,0,'L');
$pdf->Cell(269,15,'Supervisor: '.strtoupper($supervisor),0,1,'L');

$pdf->setFillColor(217, 217, 217);
$pdf->SetFont('arial','B',10);
$pdf->Cell(0,15,'Dados do Aluno',0,1,'L',1);
$pdf->setFillColor(255, 255, 255);
$pdf->SetFont('arial','',10);
$pdf->Cell(389,15,ucwords(strtolower('Nome: '.$nomeAluno)),0,0,'L');
$pdf->Cell(120,15,'CPF: '.$cpf,0,1,'L');
$pdf->Cell(270,15,ucwords(strtolower(utf8_decode('Nome Da Mãe: ').$mae)),0,0,'L');
$pdf->Cell(120,15,utf8_decode('Matrícula: ').$matricula,0,0,'L');
$pdf->Cell(269,15,'Fone: '.$foneAluno,0,1,'L');
$pdf->Cell(269,15,'Cidade/UF: '.$cidadeAluno.'/'.$ufAluno,0,0,'L');
$pdf->Cell(270,15,ucwords('Curso: '.$curso),0,1,'L');
$pdf->Cell(269,15,utf8_decode('Endereço: ').$enderecoAluno,0,1,'L');

$pdf->setFillColor(217, 217, 217);
$pdf->SetFont('arial','B',10);
$pdf->Cell(0,15,'Dados do Professor Orientador',0,1,'L',1);
$pdf->setFillColor(255, 255, 255);
$pdf->SetFont('arial','',10);
$pdf->Cell(150,15,ucwords(strtolower('Nome: '.$nomeOrientador)),0,0,'L');
$pdf->Cell(120,15,'SIAPE: '.$siape,0,0,'L');
$pdf->Cell(120,15,'Fone: '.$foneOrientador,0,0,'L');
$pdf->Cell(270,15,utf8_decode('Lotação: ').$lotacao,0,1,'L');

$pdf->Ln(20);
$pdf->setFillColor(255, 255, 255);
$pdf->SetFont('arial','',10); 
$pdf->Write(15,utf8_decode('As partes firmam o presente Termo de Compromisso de Estágio Obrigatório, observando o disposto na Lei nº 11.788 de 25 de setembro de 2008, na Resolução no 23/CEPE de 30 de outubro 2009 e no Termo de Convênio já firmado entre a Unidade Concedente e a UFC em __/__/____, além das seguintes cláusulas:'));
$pdf->Ln(15);
$pdf->Write(15,utf8_decode('CLÁUSULA PRIMEIRA: Através deste Termo, a UNIDADE CONCEDENTE se compromete a conceder experiência prática profissional ao ESTAGIÁRIO previamente selecionado, e com frequência regular no curso de graduação em que está matriculado na UFC, em conformidade com o Art. 3º, I, da Lei nº 11.788 de 25/09/2008.'));
$pdf->Ln(15);
$pdf->Write(15,utf8_decode('CLÁUSULA SEGUNDA: O estágio tem como objetivo proporcionar ao estudante integração entre teoria e prática, a partir de situações reais e adequadas de trabalho, visando ao seu aprimoramento profissional e pessoal, e obedecerá ao seguinte Plano de Atividades, devendo tais atividades ser compatíveis com o currículo e com os horários escolares do ESTAGIÁRIO, conforme estabelecem o art. 7o, parágrafo único, o art. 3o, III, e o art. 10 da Lei nº 11.788 de 25/09/2008:'));
$pdf->Ln(15);
$pdf->setFillColor(255, 255, 255);
$pdf->Cell(0,0,'',1,1,'L',1);
$pdf->Ln(5);
$pdf->Write(15,utf8_decode(ucwords(strtolower('Atividades Previstas: '.$atividades))));
$pdf->Ln(100);
$pdf->Cell(0,0,'',1,1,'L',1);
$pdf->Ln(5);
$pdf->Write(15,utf8_decode('CLÁUSULA TERCEIRA: Além das atividades previstas no plano, ficam definidas as seguintes características do estágio:'));
$pdf->Ln(15);
$pdf->Write(15,utf8_decode('a) O estágio terá início em '.$dataInicio.' e término em '.$dataFim.', compreendendo '.$meses.';'));
$pdf->Ln(15);
$pdf->Write(15,utf8_decode('b) Por deliberação da UNIDADE CONCEDENTE, o valor da bolsa auxílio será de R$ '.$valor.' mensais;'));
$pdf->Ln(15);
$pdf->Write(15,utf8_decode('c) O estudante estagiará '.$horasSemanais.' horas semanais, respeitando o art. 10 da Lei nº 11.788 de 25/09/2008, que serão distribuídas da seguinte forma:'));
$pdf->Ln(50);

$pdf->Cell(0,15,'',0,1,'L',1);
$pdf->Image('logo2.jpg',50,30,-370,40);
$pdf->Ln(50);
$pdf->setFillColor(255, 255, 255);
$pdf->SetFont('arial','',10);
$pdf->Cell(75,15,'Turnos',1,0,'C',1);
$pdf->Cell(75,15,utf8_decode('Segunda'),1,0,'C',1);
$pdf->Cell(75,15,utf8_decode('Terça'),1,0,'C',1);
$pdf->Cell(75,15,utf8_decode('Quarta'),1,0,'C',1);
$pdf->Cell(75,15,utf8_decode('Quinta'),1,0,'C',1);
$pdf->Cell(75,15,utf8_decode('Sexta'),1,0,'C',1);
$pdf->Cell(75,15,utf8_decode('Sábado'),1,1,'C',1);
$pdf->Cell(75,15,utf8_decode('Manhã'),1,0,'C',1);
$pdf->Cell(75,15,$segundaManhaIni.'h a '.$segundaManhaFim.'h',1,0,'C',1);
$pdf->Cell(75,15,$tercaManhaIni.'h a '.$tercaManhaFim.'h',1,0,'C',1);
$pdf->Cell(75,15,$quartaManhaIni.'h a '.$quartaManhaFim.'h',1,0,'C',1);
$pdf->Cell(75,15,$quintaManhaIni.'h a '.$quintaManhaFim.'h',1,0,'C',1);
$pdf->Cell(75,15,$sextaManhaIni.'h a '.$sextaManhaFim.'h',1,0,'C',1);
$pdf->Cell(75,15,$sabadoManhaIni.'h a '.$sabadoManhaFim.'h',1,1,'C',1);
$pdf->Cell(75,15,'Tarde',1,0,'C',1);
$pdf->Cell(75,15,$segundaTardeIni.'h a '.$segundaTardeFim.'h',1,0,'C',1);
$pdf->Cell(75,15,$tercaTardeIni.'h a '.$tercaTardeFim.'h',1,0,'C',1);
$pdf->Cell(75,15,$quartaTardeIni.'h a '.$quartaTardeFim.'h',1,0,'C',1);
$pdf->Cell(75,15,$quintaTardeIni.'h a '.$quintaTardeFim.'h',1,0,'C',1);
$pdf->Cell(75,15,$sextaTardeIni.'h a '.$sextaTardeFim.'h',1,0,'C',1);
$pdf->Cell(75,15,$sabadoTardeIni.'h a '.$sabadoTardeFim.'h',1,1,'C',1);
$pdf->Cell(75,15,'Noite',1,0,'C',1);
$pdf->Cell(75,15,$segundaNoiteIni.'h a '.$segundaNoiteFim.'h',1,0,'C',1);
$pdf->Cell(75,15,$tercaNoiteIni.'h a '.$tercaNoiteFim.'h',1,0,'C',1);
$pdf->Cell(75,15,$quartaNoiteIni.'h a '.$quartaNoiteFim.'h',1,0,'C',1);
$pdf->Cell(75,15,$quintaNoiteIni.'h a '.$quintaNoiteFim.'h',1,0,'C',1);
$pdf->Cell(75,15,$sextaNoiteIni.'h a '.$sextaNoiteFim.'h',1,0,'C',1);
$pdf->Cell(75,15,$sabadoNoiteIni.'h a '.$sabadoNoiteFim.'h',1,1,'C',1);
$pdf->Write(15,utf8_decode('d) A carga horária do estágio será reduzida pelo menos à metade nos períodos de avaliação do ESTAGIÁRIO, para garantir o bom desempenho do estudante, nos termos do Art. 10, §2o, da Lei n° 11.788 de 25/09/2008;'));
$pdf->Ln(15);
$pdf->Write(15,utf8_decode('e) A UFC oferece seguro contra acidentes pessoais a todos os seus estudantes devidamente matriculados, também contemplando o ESTAGIÁRIO, parte deste Termo, durante a vigência do presente. Seguem as informações do seguro:'));
$pdf->Ln(15);
$pdf->SetFont('arial','',10);
$pdf->Cell(345,15,utf8_decode($empresa_seguradora),1,0,'C',1);
$pdf->Cell(180,15,utf8_decode('Apólice: '.$apolice.''),1,1,'C',1);
$pdf->Cell(185,15,utf8_decode('Vigência: de '.$dt_inicio.' até '.$dt_fim.''),1,0,'C',1);
$pdf->Cell(160,15,utf8_decode('Morte Acidental: R$ '.$morte.''),1,0,'C',1);
$pdf->Cell(180,15,utf8_decode('Invalidez Permanente: R$ '.$invalidez.''),1,1,'C',1);
$pdf->Write(15,utf8_decode('f) O estágio somente poderá ter início após a assinatura deste Termo pelas partes envolvidas, conforme estabelece o Art. 9º, inciso I da Lei nº 11.788 de 25/09/2008, e o Art. 7o, g, da Resolução no 23/CEPE de 30/10/2009.'));
$pdf->Ln(15);
$pdf->Write(15,utf8_decode('CLÁUSULA QUARTA: Compete ao ESTAGIÁRIO:'));
$pdf->Ln(15);
$pdf->Write(15,utf8_decode('a) Cumprir as normas internas da UNIDADE CONCEDENTE, especialmente as de orientação do plano de atividades constante neste Termo, devendo apresentar à UFC, em prazo não superior a 6 (seis) meses, o relatório das atividades desenvolvidas'));
$pdf->Ln(15);
$pdf->Write(15,utf8_decode('b) Seguir a orientação articulada entre os Supervisores de Estágio designados pela UNIDADE CONCEDENTE e pela UFC;'));
$pdf->Ln(15);
$pdf->Write(15,utf8_decode('c) Diante da impossibilidade de cumprir o estabelecido neste Termo, comunicar a circunstância à UNIDADE CONCEDENTE, ficando esclarecido, desde logo, que suas obrigações escolares e a pertinência das atividades à sua qualificação profissional serão consideradas motivos justos;'));
$pdf->Ln(15);
$pdf->Write(15,utf8_decode('d) Em caso de desistência do Estágio, comunicar à Empresa com antecedência mínima de 05 (cinco) dias e entregar termo de rescisão contratual à UFC, no setor competente.'));
$pdf->Ln(15);
$pdf->Write(15,utf8_decode('CLÁUSULA QUINTA: São motivos para a rescisão imediata deste Termo de Compromisso de Estágio a ocorrência das seguintes hipóteses: '));
$pdf->Ln(15);
$pdf->Write(15,utf8_decode('a) Conclusão, trancamento ou abandono do Curso;'));
$pdf->Ln(15);
$pdf->Write(15,utf8_decode('b) Transferência para Curso que não tenha relação com as atividades de estágio desenvolvidas na Empresa;'));
$pdf->Ln(15);
$pdf->Write(15,utf8_decode('c) Descumprimento do convencionado no presente Termo;'));
$pdf->Ln(15);
$pdf->Write(15,utf8_decode('d) Prática comprovada de conduta danosa, não estando o ESTAGIÁRIO isento de arcar com as perdas e os danos desta decorrentes.'));
$pdf->Ln(15);
$pdf->Write(15,utf8_decode('CLÁUSULA SEXTA: O estágio não acarretará vínculo empregatício de qualquer natureza, conforme Art. 3º, caput e § 2º, e Art. 2° da Lei nº 11.788 de 25/09/2008.'));
$pdf->Ln(15);
$pdf->Write(15,utf8_decode('CLÁUSULA SÉTIMA: O descumprimento das condições estabelecidas neste Termo pela UNIDADE CONCEDENTE caracteriza vínculo de emprego com o ESTAGIÁRIO, para todos os fins da legislação trabalhista e previdenciária, conforme estabelece o art. 15 da Lei nº 11.788 de 25/09/2008.'));
$pdf->Ln(15);
$pdf->Write(15,utf8_decode('CLÁUSULA OITAVA: Qualquer alteração do estabelecido neste Termo será feita mediante Aditivo, com a anuência das partes envolvidas.'));
$pdf->Ln(15);
$pdf->Write(15,utf8_decode('E, por estarem devidamente cientes das condições aqui estipuladas, bem como das disposições legais vigentes sobre o assunto, firmam a UNIDADE CONCEDENTE e o ESTAGIÁRIO, com interveniência da UFC, o presente TERMO, em 03 (três) vias de igual teor e forma, para que este produza seus devidos efeitos legais.'));
$pdf->Ln(15);
$pdf->Ln(100);
$pdf->Cell(0,15,'',0,1,'L',1);
$pdf->Image('logo2.jpg',50,30,-370,40);
$pdf->Ln(80);
$pdf->Write(15,utf8_decode('DECLARO, serem exatas e verdadeiras as informações aqui prestadas, sob pena de responsabilidade administrativa, cívil e penal.'));
$pdf->Ln(50);
$pdf->Cell(0,15,'Fortaleza - CE, '.$data_atual.'.',0,1,'L',1);
$pdf->Ln(90);
$pdf->setFillColor(217, 217, 217);
$pdf->SetFont('arial','',10);
$pdf->Cell(210,15,'______________________________________',0,0,'L');
$pdf->Cell(120,15,'',0,0,'C');
$pdf->Cell(210,15,'______________________________________',0,1,'R');
$pdf->Cell(210,15,utf8_decode('Estagiário'),0,0,'C');
$pdf->Cell(120,15,utf8_decode(''),0,0,'C');
$pdf->Cell(210,15,utf8_decode('Unidade Concedente'),0,1,'C');
$pdf->Ln(60);
$pdf->Cell(210,15,utf8_decode('______________________________________'),0,0,'L');
$pdf->Cell(120,15,utf8_decode(''),0,0,'C');
$pdf->Cell(210,15,utf8_decode('______________________________________'),0,1,'R');
$pdf->Cell(210,15,utf8_decode('Professor Orientador UFC'),0,0,'C');
$pdf->Cell(120,15,utf8_decode(''),0,0,'C');
$pdf->Cell(210,15,utf8_decode('Agéncia de Estágios UFC'),0,1,'C');

$pdf->Output(utf8_decode("Termo de Compromsso de Estágio Obrigatório - ".$nomeAluno.".pdf"),"I");
?>	