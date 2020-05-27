<?php
require('../../../conn.php');
mysql_select_db('estagios');
session_start();

// RECEBE A OPÇÃO SELECIONADA NO FORMULÁRIO DA PAGINA ANTERIOR (RADIO - "SIM" OU "NÃO")
$opt = $_POST['opt'];

// RECEBE OS DADOS PREENCHIDOS NO FORMULÁRIO
$id_convenios_andamento=$_POST['id_convenios_andamento'];
$dt_abertura=$_POST['dt_abertura'];
$processo=$_POST['processo'];
$interessado=utf8_decode($_POST['interessado']);
$cnpj = $_POST['cnpj'];
echo "o meu cnpj é". $cnpj;

$saida_procuradoria=$_POST['saida_procuradoria'];
$retorno_procuradoria=$_POST['retorno_procuradoria'];
$saida_prex=$_POST['saida_prex'];
$retorno_prex=$_POST['retorno_prex'];
$pendencia=utf8_decode($_POST['pendencia']);

$_SESSION['empresa'] = $interessado;
$_SESSION['cnpj'] = $cnpj;
$_SESSION['processo'] = $processo;
$_SESSION['dt_inicio'] = $saida_procuradoria;

// SE A OPÇÃO FOR SIM:
if($opt == "sim"){
	//VERIFICAR SE A EMPRESA JÁ ESTÁ CADASTRADA NO BANCO DE DADOS
	$sql = mysql_query("SELECT * FROM empresas WHERE nome LIKE '$interessado'");
	$resultado = mysql_num_rows($sql);
	$noticias = @mysql_fetch_array($sql);

	$_SESSION['id'] = $noticias['CD_EMPRESA'];
	$id_empresa = $noticias['CD_EMPRESA'];
	
	//SE ELA NÃO ESTIVER CADASTRADA, REDIRECIONA PARA A PÁGINA DE CADASTRAR EMPRESA
	if($resultado == 0){
		//ATUALIZAR OS CAMPOS QUE FORAM ALTERADOS EM "CONVÊNIOS EM ANDAMENTO"
		$up = mysql_query("UPDATE convenios_andamento SET dt_abertura='$dt_abertura', processo='$processo', interessado='$interessado', cnpj='$cnpj', saida_procuradoria='$saida_procuradoria', retorno_procuradoria='$retorno_procuradoria', saida_prex='$saida_prex',retorno_prex='$retorno_prex',pendencia='$pendencia' WHERE id_convenios_andamento='$id_convenios_andamento'");

		header("location:page_cadastro_empresas_agentes2.php");
		
	//SE ELA JÁ ESTIVER CADASTRADA, INSERIR CONVÊNIO COM A CONDIÇÃO A SEGUIR:
	} else if($resultado == 1){
		// VERIFICAR SE O NÚMERO DO PROCESSO JÁ EXISTE
		$sql = mysql_query("SELECT * FROM termo_convenio WHERE NR_PROCESSO LIKE '$processo'");
		$verifica = mysql_num_rows($sql);

		// SE NÃO EXISTIR, FAÇA O CADASTRO DO CONVENIO NORMALMENTE
		if($verifica == 0){
		//ATUALIZAR OS CAMPOS QUE FORAM ALTERADOS EM "CONVÊNIOS EM ANDAMENTO"
		$up = mysql_query("UPDATE convenios_andamento SET dt_abertura='$dt_abertura', processo='$processo', interessado='$interessado', cnpj='$cnpj', saida_procuradoria='$saida_procuradoria', retorno_procuradoria='$retorno_procuradoria', saida_prex='$saida_prex',retorno_prex='$retorno_prex',pendencia='$pendencia' WHERE id_convenios_andamento='$id_convenios_andamento'");

		// PEGAR A DATA E ADICIONAR MAIS 5 ANOS
		setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
		date_default_timezone_set('America/Sao_Paulo');

		$data = DateTime::createFromFormat('d/m/Y', $saida_procuradoria);
		$data->add(new DateInterval('P5Y')); // + 5 ANOS
		$data->format('d/m/Y');
		$fim = $data->format('d/m/Y');
		$_SESSION['dt_fim'];
		$_SESSION['dt_fim'] = $fim;

    	header("location:page_cadastro_empresas_convenio2.php");

		// SE JÁ EXISTIR, EXIBA UMA MENSAGEM DE ERRO
		} else if($verifica != 0){
			header("location:acao_erro.php");
		}
		
	}

// SE A OPÇÃO FOR NÃO:
} else if($opt == "nao"){
//ATUALIZAR OS CAMPOS QUE FORAM ALTERADOS EM "CONVÊNIOS EM ANDAMENTO"
$up = mysql_query("UPDATE convenios_andamento SET dt_abertura='$dt_abertura', processo='$processo', interessado='$interessado', cnpj='$cnpj', saida_procuradoria='$saida_procuradoria', retorno_procuradoria='$retorno_procuradoria', saida_prex='$saida_prex',retorno_prex='$retorno_prex',pendencia='$pendencia' WHERE id_convenios_andamento='$id_convenios_andamento'");

echo'<script type="text/javascript">alert("Atualizado com sucesso!");</script>';
header("location:convenios_andamento.php");

// SE NENHUMA OPÇÃO FOR SELECIONADA, APENAS ATUALIZE AS INFORMAÇÕES
} else{
//ATUALIZAR OS CAMPOS QUE FORAM ALTERADOS EM "CONVÊNIOS EM ANDAMENTO"
$up = mysql_query("UPDATE convenios_andamento SET dt_abertura='$dt_abertura', processo='$processo', interessado='$interessado', cnpj='$cnpj', saida_procuradoria='$saida_procuradoria', retorno_procuradoria='$retorno_procuradoria', saida_prex='$saida_prex',retorno_prex='$retorno_prex',pendencia='$pendencia' WHERE id_convenios_andamento='$id_convenios_andamento'");

echo'<script type="text/javascript">alert("Atualizado com sucesso!");</script>';
header("location:convenios_andamento.php");
}

?>