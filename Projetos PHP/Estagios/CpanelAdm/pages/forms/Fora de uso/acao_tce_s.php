<?php 
require('../../../conn.php');
mysql_select_db('estagios');
//padrao

if(isset($_POST['cdt_tces'])){

	$QuantidadeTermos = $_POST['quant'];

	$id_termo=$_POST['id_tce'];
	$id_aluno=$_POST['id_aluno'];

		$z="1";
		for($i = $QuantidadeTermos; $i > 0; $i--){

				// Recebe todos os valores do Formuláro
				$valor_nn=utf8_decode($_POST['valor_n'.$z++.'']);
				$nome_concedente_nn=utf8_decode($_POST['concedente_n'.$z++.'']);
				$setor_nn=$_POST['setor_n'.$z++.''];
				$dt_ini_nn=utf8_decode($_POST['dt_ini_n'.$z++.'']);
				$dt_fim_nn=utf8_decode($_POST['dt_fim_n'.$z++.'']);
				$rescisao_nn=utf8_decode($_POST['rescisao_n'.$z++.'']);
				$hr_ini_nn=utf8_decode($_POST['hr_ini_n'.$z++.'']);
				$hr_fim_nn=utf8_decode($_POST['hr_fim_n'.$z++.'']);
				$variavel_nn=utf8_decode($_POST['variavel_n'.$z++.'']);
				$carga_hrr_nn=utf8_decode($_POST['carga_hrr_n'.$z++.'']);
				$tp_termo_nn=utf8_decode($_POST['tp_termo_n'.$z++.'']);
				$cl_termo_nn=utf8_decode($_POST['cl_termo_n'.$z++.'']);
				$relatorio_nn=utf8_decode($_POST['relatorio_n'.$z++.'']);
				$data_relatorio_1=utf8_decode($_POST['data_relatorio_1'.$z++.'']);
				$data_relatorio_2=utf8_decode($_POST['data_relatorio_2'.$z++.'']);
				$data_relatorio_3=utf8_decode($_POST['data_relatorio_3'.$z++.'']);
				$data_relatorio_4=utf8_decode($_POST['data_relatorio_4'.$z++.'']);
				$agente_nn=utf8_decode($_POST['agente_n'.$z++.'']);
				$prof_nn=utf8_decode($_POST['prof_n'.$z++.'']);
				$siape=utf8_decode($_POST['siape'.$z++.'']);
				$file_n=utf8_decode($_POST['pdf'.$z++.'']);
				$obs=utf8_decode($_POST['obs'.$z++.'']);
		

				//Seleciona na taela 'empresas' todos os registros os quais seus nome são iguais ao valor do campo
				$sql = mysql_query("SELECT * FROM empresas WHERE nome='$nome_concedente_nn'");

				//Contagem do resultado da consulta
				$conta = mysql_num_rows($sql);

						//se a Contagem retornar ZERO executa o código
						if($conta == 0){
							echo '<script> alert("VERIFIQUE NOME DA CONCEDENTE!"); </script>';
							header('location:termo_compromisso.php');

						//Se retornar um valor diferente de ZERO executa o código
						} else if($conta != 0){

							//transforma o resultado da consulta em um Fatch_object
							$emp = mysql_fetch_object($sql);
							$codigo_empresa=$emp->CD_EMPRESA;
						}


				$curso=utf8_decode(strtoupper($_POST['curso']));
				$grupo=utf8_decode(strtoupper($_POST['grupo']));
				$nome=utf8_decode(strtoupper($_POST['nm']));
				$matricula=utf8_decode($_POST['matricula']);
				$cpf=utf8_decode($_POST['cpf']);
				$rg=utf8_decode($_POST['rg']);
				$email=$_POST['email'];
				$obs2=$_POST['obs2'];
				$mt_old=utf8_decode($_POST['mt_old']);
				$id_aluno2=utf8_decode($_POST['cd_aluno']);


						// CONSULTA PARA PEGAR O ID DO CURSO
						$sql2 = mysql_query("SELECT * FROM alunos WHERE matricula='$id_aluno'");
						$x = mysql_fetch_array($sql2);
						$id_curso= $x['id_curso'];


							$arquivo = $_FILES['pdf'.$x++.'']['name'];

								//verifica se existe algum arquivo no campo de arquivos, se existir executa o código
								if ($_FILES['pdf'.$x++.'']['name'] != "") {
									$pasta = './termos_pdf/';
									move_uploaded_file($_FILES['pdf'.$x++.'']['tmp_name'], $pasta . $_FILES['pdf'.$x++.'']['name']);
									

								}
								//Verifica se o clique de ação do botão 'cdt' e se não há algum arquivo no campo de arquivos, em seguida executa o código 
								if (isset($_POST['cdt_tces']) and $arquivo!=null) {

									//Cadastra na tabela termo_compromisso os dados que ele recebe do forulário, em seguida retorna a página 'Termo de Compromisso' 
									$inserir = mysql_query("INSERT INTO termo_compromisso VALUES ('','','$id_curso','$id_aluno','$valor_nn','$codigo_empresa','$setor_nn','$dt_ini_nn','$dt_fim_nn','$rescisao_nn','$agente_nn','$tp_termo_nn','$carga_hrr_nn','$hr_ini_nn','$hr_fim_nn','$variavel_nn','$cl_termo_nn','$relatorio_nn','$data_relatorio_1', '$data_relatorio_2', '$data_relatorio_3', '$data_relatorio_4', '$prof_nn','$siape','$arquivo','$obs','ATIVO')");
									header('location:termo_compromisso.php');
								}

								//Verifica se o clique de ação do botão 'cdt' e se não há nenhum arquivo no campo de arquivos, em seguida executa o código
								if (isset($_POST['cdt_tces']) and $arquivo==null) {

									echo "ID: ";
									echo $id_curso;

									//Cadastra na tabela termo_compromisso os dados que ele recebe do forulário, em seguida retorna a página 'Termo de Compromisso' 
									$inserir = mysql_query("INSERT INTO termo_compromisso VALUES ('','','$id_curso','$id_aluno','$valor_nn','$codigo_empresa','$setor_nn','$dt_ini_nn','$dt_fim_nn','$rescisao_nn','$agente_nn','$tp_termo_nn','$carga_hrr_nn','$hr_ini_nn','$hr_fim_nn','$variavel_nn','$cl_termo_nn','$relatorio_nn','$data_relatorio_1', '$data_relatorio_2', '$data_relatorio_3', '$data_relatorio_4', '$prof_nn','$siape','','$obs','ATIVO')");
									header('location:termo_compromisso.php');
								}

							$consulta_id = mysql_query("SELECT * FROM cursos WHERE curso = '$curso'");
							$conta = mysql_num_rows($consulta_id);

							if($conta == 0){
								echo '<script> alert("CURSO NÃO EXISTENTE!"); </script>';
								echo "<script>direct(); </script>";
							} else if($conta != 0){
								$dados = @mysql_fetch_array($consulta_id);
								$id_curso2 = $dados['id_curso'];
							}

							$consulta_grupo = mysql_query("SELECT * FROM grupo_vagas WHERE descricao_grupo = '$grupo'");
							$contagrupo = mysql_num_rows($consulta_grupo);

							if($contagrupo == 0){
								echo '<script> alert("GRUPO NÃO EXISTENTE!"); </script>';
								echo "<script>direct(); </script>";
							} else if($contagrupo != 0){
								$dadosgrupo = @mysql_fetch_array($consulta_grupo);
								$id_grupo = $dadosgrupo['id_grupo'];
							}
						}
}
						 ?>