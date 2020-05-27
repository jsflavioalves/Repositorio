<?php
require('conn.php');
mysql_select_db('estagios');

$matricula_aluno = $_POST['matricula_aluno'];
$id_termo_valor = $_POST['id_valor'];
$dataInicio_nova = $_POST['dataInicio'];
$dataFiim = $_POST['dataFiim'];
$valor_nn = $_POST['valor'];
$horasSemanais = $_POST['carga_horaria'];
$naum_hora = $_POST['naum'];
	
$segundaManhaIni = $_POST['segundaManhaIni'];
$segundaManhaFim = $_POST['segundaManhaFim'];
$segundaTardeIni = $_POST['segundaTardeIni'];
$segundaTardeFim = $_POST['segundaTardeFim'];
$segundaNoiteIni = $_POST['segundaNoiteIni'];
$segundaNoiteFim = $_POST['segundaNoiteFim'];

$tercaManhaIni = $_POST['tercaManhaIni'];
$tercaManhaFim = $_POST['tercaManhaFim'];
$tercaTardeIni = $_POST['tercaTardeIni'];
$tercaTardeFim = $_POST['tercaTardeFim'];
$tercaNoiteIni = $_POST['tercaNoiteIni'];
$tercaNoiteFim = $_POST['tercaNoiteFim'];

$quartaManhaIni = $_POST['quartaManhaIni'];
$quartaManhaFim = $_POST['quartaManhaFim'];
$quartaTardeIni = $_POST['quartaTardeIni'];
$quartaTardeFim = $_POST['quartaTardeFim'];
$quartaNoiteIni = $_POST['quartaNoiteIni'];
$quartaNoiteFim = $_POST['quartaNoiteFim'];

$quintaManhaIni = $_POST['quintaManhaIni'];
$quintaManhaFim = $_POST['quintaManhaFim'];
$quintaTardeIni = $_POST['quintaTardeIni'];
$quintaTardeFim = $_POST['quintaTardeFim'];
$quintaNoiteIni = $_POST['quintaNoiteIni'];
$quintaNoiteFim = $_POST['quintaNoiteFim'];

$sextaManhaIni = $_POST['sextaManhaIni'];
$sextaManhaFim = $_POST['sextaManhaFim'];
$sextaTardeIni = $_POST['sextaTardeIni'];
$sextaTardeFim = $_POST['sextaTardeFim'];
$sextaNoiteIni = $_POST['sextaNoiteIni'];
$sextaNoiteFim = $_POST['sextaNoiteFim'];

$sabadoManhaIni = $_POST['sabadoManhaIni'];
$sabadoManhaFim = $_POST['sabadoManhaFim'];
$sabadoTardeIni = $_POST['sabadoTardeIni'];
$sabadoTardeFim = $_POST['sabadoTardeFim'];
$sabadoNoiteIni = $_POST['sabadoNoiteIni'];
$sabadoNoiteFim = $_POST['sabadoNoiteFim'];

$data_atual = $_POST['data_atual'];

$termo =  mysql_query("SELECT * FROM termo_compromisso WHERE matricula_aluno = '$matricula_aluno' and id_termo_compromisso = '$id_termo_valor' ");
$result_termo = @mysql_num_rows($termo);

$sql_termo = mysql_fetch_array($termo);
$tipo_termo = $sql_termo['classificacao_termo'];
$relatorio = $sql_termo['relatorio'];
$classificacao_termo = $sql_termo['classificacao_termo'];
$id_empresa_2 = $sql_termo['nome'];
$prof_orientador = $sql_termo['prof_orientador'];
$dt_inicio = $sql_termo['dt_inicio'];
$agente = $sql_termo['agente'];
$atividades = $sql_termo['atividades'];

$empresa =  mysql_query("SELECT * FROM empresas WHERE CD_EMPRESA LIKE '$id_empresa_2'");
$result_empresa = @mysql_num_rows($empresa);

$sql_empresa = @mysql_fetch_array($empresa);
$nomeEmpresa = $sql_empresa['nome'];
$cnpj = $sql_empresa['cnpj'];
$foneEmpresa = $sql_empresa['tel'];
$enderecoEmpresa = $sql_empresa['endereco'];


$horario_old =  mysql_query("SELECT * FROM termo_pdf WHERE termo_compromisso LIKE '$id_termo_valor'");
$horario_old_sql = @mysql_fetch_array($horario_old);

$atividades_old = $horario_old_sql['atividades'];

$meses_old = $horario_old_sql['meses'];

$semestre_old = $horario_old_sql['semestre'];

$prof_orientador_old = $horario_old_sql['nomeOrientador'];
$setor_old = $horario_old_sql['setor'];
$represetante_old = $horario_old_sql['represetante'];
$supervisor_old = $horario_old_sql['supervisor'];

$cidade_empresa_old = $horario_old_sql['cidadeEmpresa'];
$siape_old = $horario_old_sql['siape'];
$fone_prof_old = $horario_old_sql['foneOrientador'];
$lotacao_old = $horario_old_sql['lotacao'];

$segundaManhaIni_old = $horario_old_sql['segundaManhaIni'];
$segundaManhaFim_old = $horario_old_sql['segundaManhaFim'];
$segundaTardeIni_old = $horario_old_sql['segundaTardeIni'];
$segundaTardeFim_old = $horario_old_sql['segundaTardeFim'];
$segundaNoiteIni_old = $horario_old_sql['segundaNoiteIni'];
$segundaNoiteFim_old = $horario_old_sql['segundaNoiteFim'];

$tercaManhaIni_old = $horario_old_sql['tercaManhaIni'];
$tercaManhaFim_old = $horario_old_sql['tercaManhaFim'];
$tercaTardeIni_old = $horario_old_sql['tercaTardeIni'];
$tercaTardeFim_old = $horario_old_sql['tercaTardeFim'];
$tercaNoiteIni_old = $horario_old_sql['tercaNoiteIni'];
$tercaNoiteFim_old = $horario_old_sql['tercaNoiteFim'];

$quartaManhaIni_old = $horario_old_sql['quartaManhaIni'];
$quartaManhaFim_old = $horario_old_sql['quartaManhaFim'];
$quartaTardeIni_old = $horario_old_sql['quartaTardeIni'];
$quartaTardeFim_old = $horario_old_sql['quartaTardeFim'];
$quartaNoiteIni_old = $horario_old_sql['quartaNoiteIni'];
$quartaNoiteFim_old = $horario_old_sql['quartaNoiteFim'];

$quintaManhaIni_old = $horario_old_sql['quintaManhaIni'];
$quintaManhaFim_old = $horario_old_sql['quintaManhaFim'];
$quintaTardeIni_old = $horario_old_sql['quintaTardeIni'];
$quintaTardeFim_old = $horario_old_sql['quintaTardeFim'];
$quintaNoiteIni_old = $horario_old_sql['quintaNoiteIni'];
$quintaNoiteFim_old = $horario_old_sql['quintaNoiteFim'];

$sextaManhaIni_old = $horario_old_sql['sextaManhaIni'];
$sextaManhaFim_old = $horario_old_sql['sextaManhaFim'];
$sextaTardeIni_old = $horario_old_sql['sextaTardeIni'];
$sextaTardeFim_old = $horario_old_sql['sextaTardeFim'];
$sextaNoiteIni_old = $horario_old_sql['sextaNoiteIni'];
$sextaNoiteFim_old = $horario_old_sql['sextaNoiteFim'];

$sabadoManhaIni_old = $horario_old_sql['sabadoManhaIni'];
$sabadoManhaFim_old = $horario_old_sql['sabadoManhaFim'];
$sabadoTardeIni_old = $horario_old_sql['sabadoTardeIni'];
$sabadoTardeFim_old = $horario_old_sql['sabadoTardeFim'];
$sabadoNoiteIni_old = $horario_old_sql['sabadoNoiteIni'];
$sabadoNoiteFim_old = $horario_old_sql['sabadoNoiteFim'];


$aluno =  mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$matricula_aluno'");
$result_aluno = @mysql_num_rows($aluno);

$sql_aluno = @mysql_fetch_array($aluno);
$id_aluno2 = $sql_aluno['id_aluno'];
$nomeAluno2 = $sql_aluno['nome'];
$cpf2 = $sql_aluno['cpf'];
$foneAluno2 = $sql_aluno['telefone'];
$mae2 = $sql_aluno['nome_mae'];
$matricula2 = $sql_aluno['matricula'];
$curso2 = $sql_aluno['curso'];
$enderecoAluno2 = $sql_aluno['endereco'];
$cidadeAluno2 = $sql_aluno['cidade'];
$ufAluno2 = $sql_aluno['uf'];

setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$date = strftime('%d de %B de %Y', strtotime('today'));

$inserir1 = mysql_query("INSERT INTO termo_compromisso VALUES ('','$matricula_aluno','$valor_nn','$id_empresa_2','$dataInicio_nova','$dataFiim','','$agente','T.A','$horasSemanais','','','','$classificacao_termo','$relatorio','$prof_orientador','','TERMO NÃO CONFIRMADO','INATIVO')");

$selecionar2=mysql_query("SELECT*FROM termo_compromisso where matricula_aluno like '$matricula' ORDER BY id_termo_valor DESC");
$result2=mysql_fetch_array($selecionar2);	
$id_termo_compromisso = $result2['id_termo_compromisso'];

if ($naum_hora != '') {
	$inserir2 = mysql_query("INSERT INTO termo_pdf VALUES ('','$id_termo_valor','$nomeEmpresa','$cnpj','$foneEmpresa','$enderecoEmpresa','$cidade_empresa_old','$setor_old','$represetante_old','$supervisor_old','$id_aluno2','$nomeAluno2','$cpf2','$foneAluno2','$mae2','$matricula2','$curso2','$semestre_old','$enderecoAluno2','$cidadeAluno2','$ufAluno2','$prof_orientador_old','$siape_old','$fone_prof_old','$lotacao_old','$atividades_old','$dataInicio_nova','$dataFiim','$horasSemanais','$valor_nn','$horasSemanais','$tipo_termo','$segundaManhaIni_old','$segundaManhaFim_old','$segundaTardeIni_old','$segundaTardeFim_old','$segundaNoiteIni_old','$segundaNoiteFim_old','$tercaManhaIni_old','$tercaManhaFim_old','$tercaTardeIni_old','$tercaTardeFim_old','$tercaNoiteIni_old','$tercaNoiteFim_old','$quartaManhaIni_old','$quartaManhaFim_old','$quartaTardeIni_old','$quartaTardeFim_old','$quartaNoiteIni_old','$quartaNoiteFim_old','$quintaManhaIni_old','$quintaManhaFim_old','$quintaTardeIni_old','$quintaTardeFim_old','$quintaNoiteIni_old','$quintaNoiteFim_old','$sextaManhaIni_old','$sextaManhaFim_old','$sextaTardeIni_old','$sextaTardeFim_old','$sextaNoiteIni_old','$sextaNoiteFim_old','$sabadoManhaIni_old','$sabadoManhaFim_old','$sabadoTardeIni_old','$sabadoTardeFim_old','$sabadoNoiteIni_old','$sabadoNoiteFim_old','$date')");
	$up = mysql_query("UPDATE termo_compromisso SET status = 'INATIVO' WHERE id_termo_compromisso = '$id_termo_valor'");
}
if ($naum_hora == '') {
	$inserir3 = mysql_query("INSERT INTO termo_pdf VALUES ('','$id_termo_valor','$nomeEmpresa','$cnpj','$foneEmpresa','$enderecoEmpresa','$cidade_empresa_old','$setor_old','$represetante_old','$supervisor_old','$id_aluno2','$nomeAluno2','$cpf2','$foneAluno2','$mae2','$matricula2','$curso2','$semestre_old','$enderecoAluno2','$cidadeAluno2','$ufAluno2','$prof_orientador_old','$siape_old','$fone_prof_old','$lotacao_old','$atividades_old','$dataInicio_nova','$dataFiim','$horasSemanais','$valor_nn','$horasSemanais','$tipo_termo','$segundaManhaIni','$segundaManhaFim','$segundaTardeIni','$segundaTardeFim','$segundaNoiteIni','$segundaNoiteFim','$tercaManhaIni','$tercaManhaFim','$tercaTardeIni','$tercaTardeFim','$tercaNoiteIni','$tercaNoiteFim','$quartaManhaIni','$quartaManhaFim','$quartaTardeIni','$quartaTardeFim','$quartaNoiteIni','$quartaNoiteFim','$quintaManhaIni','$quintaManhaFim','$quintaTardeIni','$quintaTardeFim','$quintaNoiteIni','$quintaNoiteFim','$sextaManhaIni','$sextaManhaFim','$sextaTardeIni','$sextaTardeFim','$sextaNoiteIni','$sextaNoiteFim','$sabadoManhaIni','$sabadoManhaFim','$sabadoTardeIni','$sabadoTardeFim','$sabadoNoiteIni','$sabadoNoiteFim','$date')");
	$up = mysql_query("UPDATE termo_compromisso SET status = 'INATIVO' WHERE id_termo_compromisso = '$id_termo_valor'");
}


setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$dia = strftime('%d', strtotime('today'));
$mes = strftime('%B', strtotime('today'));
$ano = strftime('%Y', strtotime('today'));

require_once('fpdf/fpdf.php');

$pdf = new FPDF('P','pt','A4');
$pdf->AddPage(); 

$pdf->SetTitle(utf8_decode('ADITIVO AO TERMO DE COMPROMISSO - '.$segundaManhaIni_old.''));

$pdf->Image('logo2.jpg',50,30,-370,40);
/*$pdf->Image('imagem.jpg',1,1,'JPG');*/
$pdf->Ln(10);
$pdf->SetFont('arial','B',12);
$pdf->Ln(70);
$pdf->Cell(0,5,utf8_decode('ADITIVO AO TERMO DE COMPROMISSO'.$segundaManhaIni),0,1,'C');
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
$pdf->Cell(200,15,'Setor: '.strtoupper($setor_old),0,0,'L');
$pdf->Cell(269,15,'Fone/Fax: '.$foneEmpresa_old,0,1,'L');
$pdf->Cell(269,15,'Representante Legal: '.strtoupper($represetante_old),0,0,'L');
$pdf->Cell(269,15,'Supervisor: '.strtoupper($supervisor_old),0,1,'L');

$pdf->setFillColor(217, 217, 217);
$pdf->SetFont('arial','B',10);
$pdf->Cell(0,15,utf8_decode('Dados do Aluno'),0,1,'L',1);
$pdf->setFillColor(255, 255, 255);
$pdf->SetFont('arial','',10);
$pdf->Cell(269,15,utf8_decode(ucwords(strtolower('Nome: '.$nomeAluno2))),0,0,'L');
$pdf->Cell(120,15,utf8_decode('CPF: '.$cpf2),0,0,'L');
$pdf->Cell(269,15,utf8_decode('Cidade/UF: '.$cidadeAluno2.'/'. $ufAluno2),0,1,'L');
$pdf->Cell(270,15,utf8_decode(ucwords(strtolower('Nome da mãe: '.$mae2))),0,0,'L');
$pdf->Cell(120,15,utf8_decode('Matrícula: '.$matricula2),0,0,'L');
$pdf->Cell(269,15,utf8_decode('Fone: '.$foneAluno2),0,1,'L');
$pdf->Cell(270,15,'Curso: '.$curso2,0,0,'L');
$pdf->Cell(269,15,utf8_decode('Endereço: '.$enderecoAluno2),0,1,'L');

$pdf->setFillColor(217, 217, 217);
$pdf->SetFont('arial','B',10);
$pdf->Cell(0,15,utf8_decode('Dados do Professor Orientador'),0,1,'L',1);
$pdf->setFillColor(255, 255, 255);
$pdf->SetFont('arial','',10);
$pdf->Cell(150,15,utf8_decode('Nome: '.$prof_orientador),0,0,'L');
$pdf->Cell(120,15,utf8_decode('SIAPE: '.$siape),0,0,'L');
$pdf->Cell(120,15,utf8_decode('Fone: '.$foneOrientador),0,0,'L');
$pdf->Cell(270,15,utf8_decode('Lotação: '.$lotacao),0,1,'L');

$pdf->Ln(20);
$pdf->setFillColor(255, 255, 255);
$pdf->SetFont('arial','',10); 
$pdf->Write(15,utf8_decode('Pelo presente Aditivo, decidem a Unidade Concedente e o Estagiário, com interveniência da Universidade Federal do Ceará, todos acima qualificados, aditar o Termo de Compromisso de Estágio celebrado em '.$dt_inicio.', respeitadas as disposições da Lei nº 11.788 de 25 de setembro de 2008, na Resolução no 23/CEPE de 30 de outubro 2009, conforme estabelecido nas seguintes cláusulas:'));
$pdf->Ln(15);
$pdf->Write(15,utf8_decode('CLÁUSULA PRIMEIRA: Fica prorrogada a vigência do Termo de Compromisso de Estágio ora aditado, passando este a vigorar de '.$data_atual.' a '.$dataFiim.'.'));
$pdf->Ln(15);
$pdf->Write(15,utf8_decode('CLÁUSULA SEGUNDA: O estágio tem como objetivo proporcionar ao estudante integração entre teoria e prática, a partir de situações reais e adequadas de trabalho, visando ao seu aprimoramento profissional e pessoal, e obedecerá ao seguinte Plano de Atividades, devendo tais atividades ser compatíveis com o currículo e com os horários escolares do ESTAGIÁRIO, conforme estabelecem o art. 7o, parágrafo único, o art. 3o, III, e o art. 10 da Lei nº 11.788 de 25/09/2008:'));
$pdf->Ln(15);
$pdf->setFillColor(255, 255, 255);
$pdf->Cell(0,0,'',1,1,'L',1);
$pdf->Ln(5);
$pdf->Write(15,utf8_decode(ucwords(strtolower('Atividades Previstas: '.$atividades_old))));
$pdf->Ln(100);
$pdf->Cell(0,0,'',1,1,'L',1);
$pdf->Ln(5);
$pdf->Write(15,utf8_decode('CLÁUSULA TERCEIRA: Ficam definidas também as seguintes características do estágio:'));
$pdf->Ln(15);
$pdf->Write(15,utf8_decode('a) O valor da bolsa mensal ou de outra forma de contraprestação acordada entre a UNIDADE CONCEDENTE e o ESTAGIÁRIO é de R$ '.$valor_nn.', sendo compulsória a sua concessão, bem como a do auxílio-transporte;'));
$pdf->Ln(15);
if ($naum_hora == '') {
	echo $pdf->Write(15,utf8_decode('b) O estudante estagiará '.$horasSemanais.' horas semanais, respeitando o art. 10 da Lei nº 11.788 de 25/09/2008, que serão distribuídas da seguinte forma:'));
	echo $pdf->Ln(90);
	echo $pdf->Cell(0,15,'',0,1,'L',1);
	echo $pdf->Image('logo2.jpg',50,30,-370,40);
	echo $pdf->Ln(50);
	echo $pdf->setFillColor(255, 255, 255);
	echo $pdf->SetFont('arial','',10);
	echo $pdf->Cell(75,15,'Turnos',1,0,'C',1);
	echo $pdf->Cell(75,15,utf8_decode('Segunda'),1,0,'C',1);
	echo $pdf->Cell(75,15,utf8_decode('Terça'),1,0,'C',1);
	echo $pdf->Cell(75,15,utf8_decode('Quarta'),1,0,'C',1);
	echo $pdf->Cell(75,15,utf8_decode('Quinta'),1,0,'C',1);
	echo $pdf->Cell(75,15,utf8_decode('Sexta'),1,0,'C',1);
	echo $pdf->Cell(75,15,utf8_decode('Sábado'),1,1,'C',1);
	echo $pdf->Cell(75,15,utf8_decode('Manhã'),1,0,'C',1);
	echo $pdf->Cell(75,15,$segundaManhaIni.'h a '.$segundaManhaFim.'h',1,0,'C',1);
	echo $pdf->Cell(75,15,$tercaManhaIni.'h a '.$tercaManhaFim.'h',1,0,'C',1);
	echo $pdf->Cell(75,15,$quartaManhaIni.'h a '.$quartaManhaFim.'h',1,0,'C',1);
	echo $pdf->Cell(75,15,$quintaManhaIni.'h a '.$quintaManhaFim.'h',1,0,'C',1);
	echo $pdf->Cell(75,15,$sextaManhaIni.'h a '.$sextaManhaFim.'h',1,0,'C',1);
	echo $pdf->Cell(75,15,$sabadoManhaIni.'h a '.$sabadoManhaFim.'h',1,1,'C',1);
	echo $pdf->Cell(75,15,'Tarde',1,0,'C',1);
	echo $pdf->Cell(75,15,$segundaTardeIni.'h a '.$segundaTardeFim.'h',1,0,'C',1);
	echo $pdf->Cell(75,15,$tercaTardeIni.'h a '.$tercaTardeFim.'h',1,0,'C',1);
	echo $pdf->Cell(75,15,$quartaTardeIni.'h a '.$quartaTardeFim.'h',1,0,'C',1);
	echo $pdf->Cell(75,15,$quintaTardeIni.'h a '.$quintaTardeFim.'h',1,0,'C',1);
	echo $pdf->Cell(75,15,$sextaTardeIni.'h a '.$sextaTardeFim.'h',1,0,'C',1);
	echo $pdf->Cell(75,15,$sabadoTardeIni.'h a '.$sabadoTardeFim.'h',1,1,'C',1);
	echo $pdf->Cell(75,15,'Noite',1,0,'C',1);
	echo $pdf->Cell(75,15,$segundaNoiteIni.'h a '.$segundaNoiteFim.'h',1,0,'C',1);
	echo $pdf->Cell(75,15,$tercaNoiteIni.'h a '.$tercaNoiteFim.'h',1,0,'C',1);
	echo $pdf->Cell(75,15,$quartaNoiteIni.'h a '.$quartaNoiteFim.'h',1,0,'C',1);
	echo $pdf->Cell(75,15,$quintaNoiteIni.'h a '.$quintaNoiteFim.'h',1,0,'C',1);
	echo $pdf->Cell(75,15,$sextaNoiteIni.'h a '.$sextaNoiteFim.'h',1,0,'C',1);
	echo $pdf->Cell(75,15,$sabadoNoiteIni.'h a '.$sabadoNoiteFim.'h',1,1,'C',1);
	echo $pdf->Ln(15);
}
$pdf->Write(15,utf8_decode('CLÁUSULA QUARTA: As demais cláusulas do Termo de Compromisso de Estágio ora aditado permanecem inalteradas e vigentes.'));
$pdf->Ln(15);
$pdf->Write(15,utf8_decode('E, por estarem devidamente cientes das condições ora estipuladas, bem como das disposições legais vigentes sobre o assunto, firmam a EMPRESA e o ESTAGIÁRIO, com interveniência da UFC, o presente TERMO, em 03 (três) vias de igual teor e forma, para que este produza seus devidos efeitos legais.'));
$pdf->Ln(50);
if ($naum_hora != '') { echo $pdf->Ln(15); }
if ($naum_hora == '') { echo $pdf->Ln(70); echo $pdf->Cell(0,15,'',0,1,'L',1); echo $pdf->Image('logo2.jpg',50,30,-370,40); echo $pdf->Ln(60);}
$pdf->Cell(0,15,'Fortaleza - CE, '.$dia.' de '.$mes.' de '.$ano.'.',0,1,'L',1);
$pdf->Ln(70);
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

$pdf->Output(utf8_decode("ADITIVO AO TERMO DE COMPROMISSO - ".$nomeAluno.".pdf"),"I");

	
?>	