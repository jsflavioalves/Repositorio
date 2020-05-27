<?php 
require('../../../conn.php');
mysql_select_db('estagios');
//padrao
if(isset($_POST['btn_cadastrar'])){

//FORMULÁRIO DA EMPRESA
$nome_concedente_nn=$_POST['concedente_n'];
$prof_nn=utf8_decode($_POST['prof_n']);
$agente_nn=utf8_decode($_POST['agente_n']);
$siape=utf8_decode($_POST['siape']);
$tp_termo_nn=utf8_decode($_POST['tp_trm_n']);
$cl_termo_nn=utf8_decode($_POST['cl_trm_n']);
$carga_hrr_nn=utf8_decode($_POST['cg_hrr_n']);

//Seleciona na taela 'empresas' todos os registros os quais seus nome são iguais ao valor do campo
$sql = mysql_query("SELECT * FROM empresas WHERE nome LIKE '$nome_concedente_nn'");

//Contagem do resultado da consulta
$conta = mysql_num_rows($sql);

  //se a Contagem retornar ZERO executa o código
  if($conta == 0){
    header('location:termo_compromisso_coletivo.php');

  //Se retornar um valor diferente de ZERO executa o código
  } 
  if($conta != 0){

    //transforma o resultado da consulta em um Fatch_object
    $emp = mysql_fetch_array($sql);
    $codigo_empresa=$emp['CD_EMPRESA'];
  }


// FORMULÁRIO DOS ALUNOS
$id_aluno=$_POST['matricula'];
$dt_ini_nn=utf8_decode($_POST['dt_ini_n']);
$dt_fim_nn=utf8_decode($_POST['dt_fim_n']);
$hr_ini_nn=utf8_decode($_POST['hr_ini_n']);
$hr_fim_nn=utf8_decode($_POST['hr_fim_n']);

$id_aluno2=$_POST['matricula2'];
$dt_ini_nn2=utf8_decode($_POST['dt_ini_n2']);
$dt_fim_nn2=utf8_decode($_POST['dt_fim_n2']);
$hr_ini_nn2=utf8_decode($_POST['hr_ini_n2']);
$hr_fim_nn2=utf8_decode($_POST['hr_fim_n2']);

$id_aluno3=$_POST['matricula3'];
$dt_ini_nn3=utf8_decode($_POST['dt_ini_n3']);
$dt_fim_nn3=utf8_decode($_POST['dt_fim_n3']);
$hr_ini_nn3=utf8_decode($_POST['hr_ini_n3']);
$hr_fim_nn3=utf8_decode($_POST['hr_fim_n3']);

$id_aluno4=$_POST['matricula4'];
$dt_ini_nn4=utf8_decode($_POST['dt_ini_n4']);
$dt_fim_nn4=utf8_decode($_POST['dt_fim_n4']);
$hr_ini_nn4=utf8_decode($_POST['hr_ini_n4']);
$hr_fim_nn4=utf8_decode($_POST['hr_fim_n4']);

$id_aluno5=$_POST['matricula5'];
$dt_ini_nn5=utf8_decode($_POST['dt_ini_n5']);
$dt_fim_nn5=utf8_decode($_POST['dt_fim_n5']);
$hr_ini_nn5=utf8_decode($_POST['hr_ini_n5']);
$hr_fim_nn5=utf8_decode($_POST['hr_fim_n5']);

$id_aluno6=$_POST['matricula6'];
$dt_ini_nn6=utf8_decode($_POST['dt_ini_n6']);
$dt_fim_nn6=utf8_decode($_POST['dt_fim_n6']);
$hr_ini_nn6=utf8_decode($_POST['hr_ini_n6']);
$hr_fim_nn6=utf8_decode($_POST['hr_fim_n6']);

$id_aluno7=$_POST['matricula7'];
$dt_ini_nn7=utf8_decode($_POST['dt_ini_n7']);
$dt_fim_nn7=utf8_decode($_POST['dt_fim_n7']);
$hr_ini_nn7=utf8_decode($_POST['hr_ini_n7']);
$hr_fim_nn7=utf8_decode($_POST['hr_fim_n7']);

$id_aluno8=$_POST['matricula8'];
$dt_ini_nn8=utf8_decode($_POST['dt_ini_n8']);
$dt_fim_nn8=utf8_decode($_POST['dt_fim_n8']);
$hr_ini_nn8=utf8_decode($_POST['hr_ini_n8']);
$hr_fim_nn8=utf8_decode($_POST['hr_fim_n8']);

$id_aluno9=$_POST['matricula9'];
$dt_ini_nn9=utf8_decode($_POST['dt_ini_n9']);
$dt_fim_nn9=utf8_decode($_POST['dt_fim_n9']);
$hr_ini_nn9=utf8_decode($_POST['hr_ini_n9']);
$hr_fim_nn9=utf8_decode($_POST['hr_fim_n9']);

$id_aluno10=$_POST['matricula10'];
$dt_ini_nn10=utf8_decode($_POST['dt_ini_n10']);
$dt_fim_nn10=utf8_decode($_POST['dt_fim_n10']);
$hr_ini_nn10=utf8_decode($_POST['hr_ini_n10']);
$hr_fim_nn10=utf8_decode($_POST['hr_fim_n10']);

$id_aluno11=$_POST['matricula11'];
$dt_ini_nn11=utf8_decode($_POST['dt_ini_n11']);
$dt_fim_nn11=utf8_decode($_POST['dt_fim_n11']);
$hr_ini_nn11=utf8_decode($_POST['hr_ini_n11']);
$hr_fim_nn11=utf8_decode($_POST['hr_fim_n11']);

$id_aluno12=$_POST['matricula12'];
$dt_ini_nn12=utf8_decode($_POST['dt_ini_n12']);
$dt_fim_nn12=utf8_decode($_POST['dt_fim_n12']);
$hr_ini_nn12=utf8_decode($_POST['hr_ini_n12']);
$hr_fim_nn12=utf8_decode($_POST['hr_fim_n12']);

$id_aluno13=$_POST['matricula13'];
$dt_ini_nn13=utf8_decode($_POST['dt_ini_n13']);
$dt_fim_nn13=utf8_decode($_POST['dt_fim_n13']);
$hr_ini_nn13=utf8_decode($_POST['hr_ini_n13']);
$hr_fim_nn13=utf8_decode($_POST['hr_fim_n13']);

$id_aluno14=$_POST['matricula14'];
$dt_ini_nn14=utf8_decode($_POST['dt_ini_n14']);
$dt_fim_nn14=utf8_decode($_POST['dt_fim_n14']);
$hr_ini_nn14=utf8_decode($_POST['hr_ini_n14']);
$hr_fim_nn14=utf8_decode($_POST['hr_fim_n14']);

$id_aluno15=$_POST['matricula15'];
$dt_ini_nn15=utf8_decode($_POST['dt_ini_n15']);
$dt_fim_nn15=utf8_decode($_POST['dt_fim_n15']);
$hr_ini_nn15=utf8_decode($_POST['hr_ini_n15']);
$hr_fim_nn15=utf8_decode($_POST['hr_fim_n15']);

$id_aluno16=$_POST['matricula16'];
$dt_ini_nn16=utf8_decode($_POST['dt_ini_n16']);
$dt_fim_nn16=utf8_decode($_POST['dt_fim_n16']);
$hr_ini_nn16=utf8_decode($_POST['hr_ini_n16']);
$hr_fim_nn16=utf8_decode($_POST['hr_fim_n16']);

$id_aluno17=$_POST['matricula17'];
$dt_ini_nn17=utf8_decode($_POST['dt_ini_n17']);
$dt_fim_nn17=utf8_decode($_POST['dt_fim_n17']);
$hr_ini_nn17=utf8_decode($_POST['hr_ini_n17']);
$hr_fim_nn17=utf8_decode($_POST['hr_fim_n17']);

$id_aluno18=$_POST['matricula18'];
$dt_ini_nn18=utf8_decode($_POST['dt_ini_n18']);
$dt_fim_nn18=utf8_decode($_POST['dt_fim_n18']);
$hr_ini_nn18=utf8_decode($_POST['hr_ini_n18']);
$hr_fim_nn18=utf8_decode($_POST['hr_fim_n18']);

$id_aluno19=$_POST['matricula19'];
$dt_ini_nn19=utf8_decode($_POST['dt_ini_n19']);
$dt_fim_nn19=utf8_decode($_POST['dt_fim_n19']);
$hr_ini_nn19=utf8_decode($_POST['hr_ini_n19']);
$hr_fim_nn19=utf8_decode($_POST['hr_fim_n19']);

$id_aluno20=$_POST['matricula20'];
$dt_ini_nn20=utf8_decode($_POST['dt_ini_n20']);
$dt_fim_nn20=utf8_decode($_POST['dt_fim_n20']);
$hr_ini_nn20=utf8_decode($_POST['hr_ini_n20']);
$hr_fim_nn20=utf8_decode($_POST['hr_fim_n20']);

$id_aluno21=$_POST['matricula21'];
$dt_ini_nn21=utf8_decode($_POST['dt_ini_n21']);
$dt_fim_nn21=utf8_decode($_POST['dt_fim_n21']);
$hr_ini_nn21=utf8_decode($_POST['hr_ini_n21']);
$hr_fim_nn21=utf8_decode($_POST['hr_fim_n21']);

$id_aluno22=$_POST['matricula22'];
$dt_ini_nn22=utf8_decode($_POST['dt_ini_n22']);
$dt_fim_nn22=utf8_decode($_POST['dt_fim_n22']);
$hr_ini_nn22=utf8_decode($_POST['hr_ini_n22']);
$hr_fim_nn22=utf8_decode($_POST['hr_fim_n22']);

$id_aluno23=$_POST['matricula23'];
$dt_ini_nn23=utf8_decode($_POST['dt_ini_n23']);
$dt_fim_nn23=utf8_decode($_POST['dt_fim_n23']);
$hr_ini_nn23=utf8_decode($_POST['hr_ini_n23']);
$hr_fim_nn23=utf8_decode($_POST['hr_fim_n23']);

$id_aluno24=$_POST['matricula24'];
$dt_ini_nn24=utf8_decode($_POST['dt_ini_n24']);
$dt_fim_nn24=utf8_decode($_POST['dt_fim_n24']);
$hr_ini_nn24=utf8_decode($_POST['hr_ini_n24']);
$hr_fim_nn24=utf8_decode($_POST['hr_fim_n24']);

$id_aluno25=$_POST['matricula25'];
$dt_ini_nn25=utf8_decode($_POST['dt_ini_n25']);
$dt_fim_nn25=utf8_decode($_POST['dt_fim_n25']);
$hr_ini_nn25=utf8_decode($_POST['hr_ini_n25']);
$hr_fim_nn25=utf8_decode($_POST['hr_fim_n25']);

$id_aluno26=$_POST['matricula26'];
$dt_ini_nn26=utf8_decode($_POST['dt_ini_n26']);
$dt_fim_nn26=utf8_decode($_POST['dt_fim_n26']);
$hr_ini_nn26=utf8_decode($_POST['hr_ini_n26']);
$hr_fim_nn26=utf8_decode($_POST['hr_fim_n26']);

$id_aluno27=$_POST['matricula27'];
$dt_ini_nn27=utf8_decode($_POST['dt_ini_n27']);
$dt_fim_nn27=utf8_decode($_POST['dt_fim_n27']);
$hr_ini_nn27=utf8_decode($_POST['hr_ini_n27']);
$hr_fim_nn27=utf8_decode($_POST['hr_fim_n27']);

$id_aluno28=$_POST['matricula28'];
$dt_ini_nn28=utf8_decode($_POST['dt_ini_n28']);
$dt_fim_nn28=utf8_decode($_POST['dt_fim_n28']);
$hr_ini_nn28=utf8_decode($_POST['hr_ini_n28']);
$hr_fim_nn28=utf8_decode($_POST['hr_fim_n28']);

$id_aluno29=$_POST['matricula29'];
$dt_ini_nn29=utf8_decode($_POST['dt_ini_n29']);
$dt_fim_nn29=utf8_decode($_POST['dt_fim_n29']);
$hr_ini_nn29=utf8_decode($_POST['hr_ini_n29']);
$hr_fim_nn29=utf8_decode($_POST['hr_fim_n29']);

$id_aluno30=$_POST['matricula30'];
$dt_ini_nn30=utf8_decode($_POST['dt_ini_n30']);
$dt_fim_nn30=utf8_decode($_POST['dt_fim_n30']);
$hr_ini_nn30=utf8_decode($_POST['hr_ini_n30']);
$hr_fim_nn30=utf8_decode($_POST['hr_fim_n30']);

$id_aluno31=$_POST['matricula31'];
$dt_ini_nn31=utf8_decode($_POST['dt_ini_n31']);
$dt_fim_nn31=utf8_decode($_POST['dt_fim_n31']);
$hr_ini_nn31=utf8_decode($_POST['hr_ini_n31']);
$hr_fim_nn31=utf8_decode($_POST['hr_fim_n31']);

$id_aluno32=$_POST['matricula32'];
$dt_ini_nn32=utf8_decode($_POST['dt_ini_n32']);
$dt_fim_nn32=utf8_decode($_POST['dt_fim_n32']);
$hr_ini_nn32=utf8_decode($_POST['hr_ini_n32']);
$hr_fim_nn32=utf8_decode($_POST['hr_fim_n32']);

$id_aluno33=$_POST['matricula33'];
$dt_ini_nn33=utf8_decode($_POST['dt_ini_n33']);
$dt_fim_nn33=utf8_decode($_POST['dt_fim_n33']);
$hr_ini_nn33=utf8_decode($_POST['hr_ini_n33']);
$hr_fim_nn33=utf8_decode($_POST['hr_fim_n33']);

$id_aluno34=$_POST['matricula34'];
$dt_ini_nn34=utf8_decode($_POST['dt_ini_n34']);
$dt_fim_nn34=utf8_decode($_POST['dt_fim_n34']);
$hr_ini_nn34=utf8_decode($_POST['hr_ini_n34']);
$hr_fim_nn34=utf8_decode($_POST['hr_fim_n34']);

$id_aluno35=$_POST['matricula35'];
$dt_ini_nn35=utf8_decode($_POST['dt_ini_n35']);
$dt_fim_nn35=utf8_decode($_POST['dt_fim_n35']);
$hr_ini_nn35=utf8_decode($_POST['hr_ini_n35']);
$hr_fim_nn35=utf8_decode($_POST['hr_fim_n35']);

$id_aluno36=$_POST['matricula36'];
$dt_ini_nn36=utf8_decode($_POST['dt_ini_n36']);
$dt_fim_nn36=utf8_decode($_POST['dt_fim_n36']);
$hr_ini_nn36=utf8_decode($_POST['hr_ini_n36']);
$hr_fim_nn36=utf8_decode($_POST['hr_fim_n36']);

$id_aluno37=$_POST['matricula37'];
$dt_ini_nn37=utf8_decode($_POST['dt_ini_n37']);
$dt_fim_nn37=utf8_decode($_POST['dt_fim_n37']);
$hr_ini_nn37=utf8_decode($_POST['hr_ini_n37']);
$hr_fim_nn37=utf8_decode($_POST['hr_fim_n37']);

$id_aluno38=$_POST['matricula38'];
$dt_ini_nn38=utf8_decode($_POST['dt_ini_n38']);
$dt_fim_nn38=utf8_decode($_POST['dt_fim_n38']);
$hr_ini_nn38=utf8_decode($_POST['hr_ini_n38']);
$hr_fim_nn38=utf8_decode($_POST['hr_fim_n38']);

$id_aluno39=$_POST['matricula39'];
$dt_ini_nn39=utf8_decode($_POST['dt_ini_n39']);
$dt_fim_nn39=utf8_decode($_POST['dt_fim_n39']);
$hr_ini_nn39=utf8_decode($_POST['hr_ini_n39']);
$hr_fim_nn39=utf8_decode($_POST['hr_fim_n39']);

if ($concedente_n != null) {
      //Cadastra na tabela termo_compromisso os dados que ele recebe do forulário, em seguida retorna a página 'Termo de Compromisso' 
      $intcc = mysql_query("INSERT INTO tcc VALUES ('','$codigo_empresa','$agente_nn','$tp_termo_nn','$carga_hrr_nn','$cl_termo_nn','$prof_nn','$siape')");

        $seltcc=mysql_query("SELECT * FROM tcc WHERE nome LIKE '$codigo_empresa' and agente LIKE '$agente_nn' and tipo_termo LIKE '$tp_termo_nn' and carga_horaria LIKE '$carga_horaria' and classificacao_termo LIKE '$cl_termo_nn' and pro_orientador LIKE '$prof_nn' and siape LIKE '$siape' ");
          $conttcc=mysql_num_rows($seltcc);
          $arrraytcc=mysql_fetch_array($seltcc);
          $id_tcc=$arraytcc['id_tcc'];

          if($id_tcc != 0 ){


// CONSULTA PARA PEGAR O ID DO CURSO
$sql0=mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$id_aluno'");
$curso0=mysql_fetch_array($sql0);
  $id_curso0=$curso0['id_curso'];

    //Verifica se o clique de ação do botão 'cdt' e se não há algum arquivo no campo de arquivos, em seguida executa o código 
    if ($id_aluno != null) {
      //Cadastra na tabela termo_compromisso os dados que ele recebe do forulário, em seguida retorna a página 'Termo de Compromisso' 
      $inserir = mysql_query("INSERT INTO termo_compromisso VALUES ('','$id_curso0','$id_aluno','','$codigo_empresa','','$dt_ini_nn','$dt_fim_nn','','$agente_nn','$tp_termo_nn','$carga_hrr_nn','$hr_ini_nn','$hr_fim_nn','','$cl_termo_nn','','', '', '', '', '$prof_nn','$siape','','','ATIVO')");

    }

$sql2=mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$id_aluno2'");
$curso2=mysql_fetch_array($sql2);
  $id_curso2=$curso2['id_curso'];

    if ($id_aluno2 != null) {
      //Cadastra na tabela termo_compromisso os dados que ele recebe do forulário, em seguida retorna a página 'Termo de Compromisso' 
      $inserir2 = mysql_query("INSERT INTO termo_compromisso VALUES ('','$id_curso2','$id_aluno2','','$codigo_empresa','','$dt_ini_nn2','$dt_fim_nn2','','$agente_nn','$tp_termo_nn','$carga_hrr_nn','$hr_ini_nn2','$hr_fim_nn2','','$cl_termo_nn','','', '', '', '', '$prof_nn','$siape','','','ATIVO')");

    }

$sql3=mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$id_aluno3'");
$curso3=mysql_fetch_array($sql3);
  $id_curso3=$curso3['id_curso'];

    if ($id_aluno3 != null) {
      //Cadastra na tabela termo_compromisso os dados que ele recebe do forulário, em seguida retorna a página 'Termo de Compromisso' 
      $inserir3 = mysql_query("INSERT INTO termo_compromisso VALUES ('','$id_curso3','$id_aluno3','','$codigo_empresa','','$dt_ini_nn3','$dt_fim_nn3','','$agente_nn','$tp_termo_nn','$carga_hrr_nn','$hr_ini_nn3','$hr_fim_nn3','','$cl_termo_nn','','', '', '', '', '$prof_nn','$siape','','','ATIVO')");

    }

$sql4=mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$id_aluno4'");
$curso4=mysql_fetch_array($sql4);
  $id_curso4=$curso4['id_curso'];

    if ($id_aluno4 != null) {
      //Cadastra na tabela termo_compromisso os dados que ele recebe do forulário, em seguida retorna a página 'Termo de Compromisso' 
      $inserir4 = mysql_query("INSERT INTO termo_compromisso VALUES ('','$id_curso4','$id_aluno4','','$codigo_empresa','','$dt_ini_nn4','$dt_fim_nn4','','$agente_nn','$tp_termo_nn','$carga_hrr_nn','$hr_ini_nn4','$hr_fim_nn4','','$cl_termo_nn','','', '', '', '', '$prof_nn','$siape','','','ATIVO')");

    }
$sql5=mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$id_aluno5'");
$curso5=mysql_fetch_array($sql5);
  $id_curso5=$curso5['id_curso'];
    if ($id_aluno5 != null) {
      //Cadastra na tabela termo_compromisso os dados que ele recebe do forulário, em seguida retorna a página 'Termo de Compromisso' 
      $inserir5 = mysql_query("INSERT INTO termo_compromisso VALUES ('','$id_curso5','$id_aluno5','','$codigo_empresa','','$dt_ini_nn5','$dt_fim_nn5','','$agente_nn','$tp_termo_nn','$carga_hrr_nn','$hr_ini_nn5','$hr_fim_nn5','','$cl_termo_nn','','', '', '', '', '$prof_nn','$siape','','','ATIVO')");

    }
$sql6=mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$id_aluno6'");
$curso6=mysql_fetch_array($sql6);
  $id_curso6=$curso6['id_curso'];
    if ($id_aluno6 != null) {
      //Cadastra na tabela termo_compromisso os dados que ele recebe do forulário, em seguida retorna a página 'Termo de Compromisso' 
      $inserir6 = mysql_query("INSERT INTO termo_compromisso VALUES ('','$id_curso6','$id_aluno6','','$codigo_empresa','','$dt_ini_nn6','$dt_fim_nn6','','$agente_nn','$tp_termo_nn','$carga_hrr_nn','$hr_ini_nn6','$hr_fim_nn6','','$cl_termo_nn','','', '', '', '', '$prof_nn','$siape','','','ATIVO')");

    }
$sql7=mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$id_aluno7'");
$curso7=mysql_fetch_array($sql7);
  $id_curso7=$curso7['id_curso'];
    if ($id_aluno7 != null) {
      //Cadastra na tabela termo_compromisso os dados que ele recebe do forulário, em seguida retorna a página 'Termo de Compromisso' 
      $inserir7 = mysql_query("INSERT INTO termo_compromisso VALUES ('','$id_curso7','$id_aluno7','','$codigo_empresa','','$dt_ini_nn7','$dt_fim_nn7','','$agente_nn','$tp_termo_nn','$carga_hrr_nn','$hr_ini_nn7','$hr_fim_nn7','','$cl_termo_nn','','', '', '', '', '$prof_nn','$siape','','','ATIVO')");

    }

$sql8=mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$id_aluno8'");
$curso8=mysql_fetch_array($sql8);
  $id_curso8=$curso8['id_curso'];
    if ($id_aluno8 != null) {
      //Cadastra na tabela termo_compromisso os dados que ele recebe do forulário, em seguida retorna a página 'Termo de Compromisso' 
      $inserir8 = mysql_query("INSERT INTO termo_compromisso VALUES ('','$id_curso8','$id_aluno8','','$codigo_empresa','','$dt_ini_nn8','$dt_fim_nn8','','$agente_nn','$tp_termo_nn','$carga_hrr_nn','$hr_ini_nn8','$hr_fim_nn8','','$cl_termo_nn','','', '', '', '', '$prof_nn','$siape','','','ATIVO')");

    }
$sql9=mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$id_aluno9'");
$curso9=mysql_fetch_array($sql9);
  $id_curso9=$curso9['id_curso'];
    if ($id_aluno9 != null) {
      //Cadastra na tabela termo_compromisso os dados que ele recebe do forulário, em seguida retorna a página 'Termo de Compromisso' 
      $inserir9 = mysql_query("INSERT INTO termo_compromisso VALUES ('','$id_curso9','$id_aluno9','','$codigo_empresa','','$dt_ini_nn9','$dt_fim_nn9','','$agente_nn','$tp_termo_nn','$carga_hrr_nn','$hr_ini_nn9','$hr_fim_nn9','','$cl_termo_nn','','', '', '', '', '$prof_nn','$siape','','','ATIVO')");

    }
$sql10=mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$id_aluno10'");
$curso10=mysql_fetch_array($sql10);
  $id_curso10=$curso10['id_curso'];
    if ($id_aluno10 != null) {
      //Cadastra na tabela termo_compromisso os dados que ele recebe do forulário, em seguida retorna a página 'Termo de Compromisso' 
      $inserir10 = mysql_query("INSERT INTO termo_compromisso VALUES ('','$id_curso10','$id_aluno10','','$codigo_empresa','','$dt_ini_nn10','$dt_fim_nn10','','$agente_nn','$tp_termo_nn','$carga_hrr_nn','$hr_ini_nn10','$hr_fim_nn10','','$cl_termo_nn','','', '', '', '', '$prof_nn','$siape','','','ATIVO')");

    }
$sql11=mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$id_aluno11'");
$curso11=mysql_fetch_array($sql11);
  $id_curso11=$curso11['id_curso'];
    if ($id_aluno11 != null) {
      //Cadastra na tabela termo_compromisso os dados que ele recebe do forulário, em seguida retorna a página 'Termo de Compromisso' 
      $inserir11 = mysql_query("INSERT INTO termo_compromisso VALUES ('','$id_curso11','$id_aluno11','','$codigo_empresa','','$dt_ini_nn11','$dt_fim_nn11','','$agente_nn','$tp_termo_nn','$carga_hrr_nn','$hr_ini_nn11','$hr_fim_nn11','','$cl_termo_nn','','', '', '', '', '$prof_nn','$siape','','','ATIVO')");

    }
$sql12=mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$id_aluno12'");
$curso12=mysql_fetch_array($sql12);
  $id_curso12=$curso12['id_curso'];
    if ($id_aluno12 != null) {
      //Cadastra na tabela termo_compromisso os dados que ele recebe do forulário, em seguida retorna a página 'Termo de Compromisso' 
      $inserir12 = mysql_query("INSERT INTO termo_compromisso VALUES ('','$id_curso12','$id_aluno12','','$codigo_empresa','','$dt_ini_nn12','$dt_fim_nn12','','$agente_nn','$tp_termo_nn','$carga_hrr_nn','$hr_ini_nn12','$hr_fim_nn12','','$cl_termo_nn','','', '', '', '', '$prof_nn','$siape','','','ATIVO')");

    }
$sql13=mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$id_aluno13'");
$curso13=mysql_fetch_array($sql13);
  $id_curso13=$curso13['id_curso'];
    if ($id_aluno13 != null) {
      //Cadastra na tabela termo_compromisso os dados que ele recebe do forulário, em seguida retorna a página 'Termo de Compromisso' 
      $inserir13 = mysql_query("INSERT INTO termo_compromisso VALUES ('','$id_curso13','$id_aluno13','','$codigo_empresa','','$dt_ini_nn13','$dt_fim_nn13','','$agente_nn','$tp_termo_nn','$carga_hrr_nn','$hr_ini_nn13','$hr_fim_nn13','','$cl_termo_nn','','', '', '', '', '$prof_nn','$siape','','','ATIVO')");

    }
$sql14=mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$id_aluno14'");
$curso14=mysql_fetch_array($sql14);
  $id_curso14=$curso14['id_curso'];
    if ($id_aluno14 != null) {
      //Cadastra na tabela termo_compromisso os dados que ele recebe do forulário, em seguida retorna a página 'Termo de Compromisso' 
      $inserir14 = mysql_query("INSERT INTO termo_compromisso VALUES ('','$id_curso14','$id_aluno14','','$codigo_empresa','','$dt_ini_nn14','$dt_fim_nn14','','$agente_nn','$tp_termo_nn','$carga_hrr_nn','$hr_ini_nn14','$hr_fim_nn14','','$cl_termo_nn','','', '', '', '', '$prof_nn','$siape','','','ATIVO')");

    }
$sql15=mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$id_aluno15'");
$curso15=mysql_fetch_array($sql15);
  $id_curso15=$curso15['id_curso'];
    if ($id_aluno15 != null) {
      //Cadastra na tabela termo_compromisso os dados que ele recebe do forulário, em seguida retorna a página 'Termo de Compromisso' 
      $inserir15 = mysql_query("INSERT INTO termo_compromisso VALUES ('','$id_curso15','$id_aluno15','','$codigo_empresa','','$dt_ini_nn15','$dt_fim_nn15','','$agente_nn','$tp_termo_nn','$carga_hrr_nn','$hr_ini_nn15','$hr_fim_nn15','','$cl_termo_nn','','', '', '', '', '$prof_nn','$siape','','','ATIVO')");

    }
$sql16=mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$id_aluno16'");
$curso16=mysql_fetch_array($sql16);
  $id_curso16=$curso16['id_curso'];
    if ($id_aluno16 != null) {
      //Cadastra na tabela termo_compromisso os dados que ele recebe do forulário, em seguida retorna a página 'Termo de Compromisso' 
      $inserir16 = mysql_query("INSERT INTO termo_compromisso VALUES ('','$id_curso16','$id_aluno16','','$codigo_empresa','','$dt_ini_nn16','$dt_fim_nn16','','$agente_nn','$tp_termo_nn','$carga_hrr_nn','$hr_ini_nn16','$hr_fim_nn16','','$cl_termo_nn','','', '', '', '', '$prof_nn','$siape','','','ATIVO')");

    }
$sql17=mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$id_aluno17'");
$curso17=mysql_fetch_array($sql17);
  $id_curso17=$curso17['id_curso'];
    if ($id_aluno17 != null) {
      //Cadastra na tabela termo_compromisso os dados que ele recebe do forulário, em seguida retorna a página 'Termo de Compromisso' 
      $inserir17 = mysql_query("INSERT INTO termo_compromisso VALUES ('','$id_curso17','$id_aluno17','','$codigo_empresa','','$dt_ini_nn17','$dt_fim_nn17','','$agente_nn','$tp_termo_nn','$carga_hrr_nn','$hr_ini_nn17','$hr_fim_nn17','','$cl_termo_nn','','', '', '', '', '$prof_nn','$siape','','','ATIVO')");

    }
$sql18=mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$id_aluno18'");
$curso18=mysql_fetch_array($sql18);
  $id_curso18=$curso18['id_curso'];
    if ($id_aluno18 != null) {
      //Cadastra na tabela termo_compromisso os dados que ele recebe do forulário, em seguida retorna a página 'Termo de Compromisso' 
      $inserir18 = mysql_query("INSERT INTO termo_compromisso VALUES ('','$id_curso18','$id_aluno18','','$codigo_empresa','','$dt_ini_nn18','$dt_fim_nn18','','$agente_nn','$tp_termo_nn','$carga_hrr_nn','$hr_ini_nn18','$hr_fim_nn18','','$cl_termo_nn','','', '', '', '', '$prof_nn','$siape','','','ATIVO')");

    }
$sql19=mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$id_aluno19'");
$curso19=mysql_fetch_array($sql19);
  $id_curso19=$curso19['id_curso'];
    if ($id_aluno19 != null) {
      //Cadastra na tabela termo_compromisso os dados que ele recebe do forulário, em seguida retorna a página 'Termo de Compromisso' 
      $inserir19 = mysql_query("INSERT INTO termo_compromisso VALUES ('','$id_curso19','$id_aluno19','','$codigo_empresa','','$dt_ini_nn19','$dt_fim_nn19','','$agente_nn','$tp_termo_nn','$carga_hrr_nn','$hr_ini_nn19','$hr_fim_nn19','','$cl_termo_nn','','', '', '', '', '$prof_nn','$siape','','','ATIVO')");

    }
$sql20=mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$id_aluno20'");
$curso20=mysql_fetch_array($sql20);
  $id_curso20=$curso20['id_curso'];
    if ($id_aluno20 != null) {
      //Cadastra na tabela termo_compromisso os dados que ele recebe do forulário, em seguida retorna a página 'Termo de Compromisso' 
      $inserir20 = mysql_query("INSERT INTO termo_compromisso VALUES ('','$id_curso20','$id_aluno20','','$codigo_empresa','','$dt_ini_nn20','$dt_fim_nn20','','$agente_nn','$tp_termo_nn','$carga_hrr_nn','$hr_ini_nn20','$hr_fim_nn20','','$cl_termo_nn','','', '', '', '', '$prof_nn','$siape','','','ATIVO')");

    }
$sql21=mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$id_aluno21'");
$curso21=mysql_fetch_array($sql21);
  $id_curso21=$curso21['id_curso'];
    if ($id_aluno21 != null) {
      //Cadastra na tabela termo_compromisso os dados que ele recebe do forulário, em seguida retorna a página 'Termo de Compromisso' 
      $inserir21 = mysql_query("INSERT INTO termo_compromisso VALUES ('','$id_curso21','$id_aluno21','','$codigo_empresa','','$dt_ini_nn21','$dt_fim_nn21','','$agente_nn','$tp_termo_nn','$carga_hrr_nn','$hr_ini_nn21','$hr_fim_nn21','','$cl_termo_nn','','', '', '', '', '$prof_nn','$siape','','','ATIVO')");

    }
$sql22=mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$id_aluno22'");
$curso22=mysql_fetch_array($sql22);
  $id_curso22=$curso22['id_curso'];
    if ($id_aluno22 != null) {
      //Cadastra na tabela termo_compromisso os dados que ele recebe do forulário, em seguida retorna a página 'Termo de Compromisso' 
      $inserir22 = mysql_query("INSERT INTO termo_compromisso VALUES ('','$id_curso22','$id_aluno22','','$codigo_empresa','','$dt_ini_nn22','$dt_fim_nn22','','$agente_nn','$tp_termo_nn','$carga_hrr_nn','$hr_ini_nn22','$hr_fim_nn22','','$cl_termo_nn','','', '', '', '', '$prof_nn','$siape','','','ATIVO')");

    }
$sql23=mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$id_aluno23'");
$curso23=mysql_fetch_array($sql23);
  $id_curso23=$curso23['id_curso'];
    if ($id_aluno23 != null) {
      //Cadastra na tabela termo_compromisso os dados que ele recebe do forulário, em seguida retorna a página 'Termo de Compromisso' 
      $inserir23 = mysql_query("INSERT INTO termo_compromisso VALUES ('','$id_curso23','$id_aluno23','','$codigo_empresa','','$dt_ini_nn23','$dt_fim_nn23','','$agente_nn','$tp_termo_nn','$carga_hrr_nn','$hr_ini_nn23','$hr_fim_nn23','','$cl_termo_nn','','', '', '', '', '$prof_nn','$siape','','','ATIVO')");

    }
$sql24=mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$id_aluno24'");
$curso24=mysql_fetch_array($sql24);
  $id_curso24=$curso24['id_curso'];
    if ($id_aluno24 != null) {
      //Cadastra na tabela termo_compromisso os dados que ele recebe do forulário, em seguida retorna a página 'Termo de Compromisso' 
      $inserir24 = mysql_query("INSERT INTO termo_compromisso VALUES ('','$id_curso24','$id_aluno24','','$codigo_empresa','','$dt_ini_nn24','$dt_fim_nn24','','$agente_nn','$tp_termo_nn','$carga_hrr_nn','$hr_ini_nn24','$hr_fim_nn24','','$cl_termo_nn','','', '', '', '', '$prof_nn','$siape','','','ATIVO')");

    }
$sql25=mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$id_aluno25'");
$curso25=mysql_fetch_array($sql25);
  $id_curso25=$curso25['id_curso'];
    if ($id_aluno25 != null) {
      //Cadastra na tabela termo_compromisso os dados que ele recebe do forulário, em seguida retorna a página 'Termo de Compromisso' 
      $inserir25 = mysql_query("INSERT INTO termo_compromisso VALUES ('','$id_curso25','$id_aluno25','','$codigo_empresa','','$dt_ini_nn25','$dt_fim_nn25','','$agente_nn','$tp_termo_nn','$carga_hrr_nn','$hr_ini_nn25','$hr_fim_nn25','','$cl_termo_nn','','', '', '', '', '$prof_nn','$siape','','','ATIVO')");

    }
$sql26=mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$id_aluno26'");
$curso26=mysql_fetch_array($sql26);
  $id_curso26=$curso26['id_curso'];
    if ($id_aluno26 != null) {
      //Cadastra na tabela termo_compromisso os dados que ele recebe do forulário, em seguida retorna a página 'Termo de Compromisso' 
      $inserir26 = mysql_query("INSERT INTO termo_compromisso VALUES ('','$id_curso26','$id_aluno26','','$codigo_empresa','','$dt_ini_nn26','$dt_fim_nn26','','$agente_nn','$tp_termo_nn','$carga_hrr_nn','$hr_ini_nn26','$hr_fim_nn26','','$cl_termo_nn','','', '', '', '', '$prof_nn','$siape','','','ATIVO')");

    }
$sql27=mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$id_aluno27'");
$curso27=mysql_fetch_array($sql27);
  $id_curso27=$curso27['id_curso'];
    if ($id_aluno27 != null) {
      //Cadastra na tabela termo_compromisso os dados que ele recebe do forulário, em seguida retorna a página 'Termo de Compromisso' 
      $inserir27 = mysql_query("INSERT INTO termo_compromisso VALUES ('','$id_curso27','$id_aluno27','','$codigo_empresa','','$dt_ini_nn27','$dt_fim_nn27','','$agente_nn','$tp_termo_nn','$carga_hrr_nn','$hr_ini_nn27','$hr_fim_nn27','','$cl_termo_nn','','', '', '', '', '$prof_nn','$siape','','','ATIVO')");

    }
$sql28=mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$id_aluno28'");
$curso28=mysql_fetch_array($sql28);
  $id_curso28=$curso28['id_curso'];
    if ($id_aluno28 != null) {
      //Cadastra na tabela termo_compromisso os dados que ele recebe do forulário, em seguida retorna a página 'Termo de Compromisso' 
      $inserir28 = mysql_query("INSERT INTO termo_compromisso VALUES ('','$id_curso28','$id_aluno28','','$codigo_empresa','','$dt_ini_nn28','$dt_fim_nn28','','$agente_nn','$tp_termo_nn','$carga_hrr_nn','$hr_ini_nn28','$hr_fim_nn28','','$cl_termo_nn','','', '', '', '', '$prof_nn','$siape','','','ATIVO')");

    }
$sql29=mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$id_aluno29'");
$curso29=mysql_fetch_array($sql29);
  $id_curso29=$curso29['id_curso'];
    if ($id_aluno29 != null) {
      //Cadastra na tabela termo_compromisso os dados que ele recebe do forulário, em seguida retorna a página 'Termo de Compromisso' 
      $inserir29 = mysql_query("INSERT INTO termo_compromisso VALUES ('','$id_curso29','$id_aluno29','','$codigo_empresa','','$dt_ini_nn29','$dt_fim_nn29','','$agente_nn','$tp_termo_nn','$carga_hrr_nn','$hr_ini_nn29','$hr_fim_nn29','','$cl_termo_nn','','', '', '', '', '$prof_nn','$siape','','','ATIVO')");

    }
$sql30=mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$id_aluno30'");
$curso30=mysql_fetch_array($sql30);
  $id_curso30=$curso30['id_curso'];
    if ($id_aluno30 != null) {
      //Cadastra na tabela termo_compromisso os dados que ele recebe do forulário, em seguida retorna a página 'Termo de Compromisso' 
      $inserir30 = mysql_query("INSERT INTO termo_compromisso VALUES ('','$id_curso30','$id_aluno30','','$codigo_empresa','','$dt_ini_nn30','$dt_fim_nn30','','$agente_nn','$tp_termo_nn','$carga_hrr_nn','$hr_ini_nn30','$hr_fim_nn30','','$cl_termo_nn','','', '', '', '', '$prof_nn','$siape','','','ATIVO')");

    }
$sql31=mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$id_aluno31'");
$curso31=mysql_fetch_array($sql31);
  $id_curso31=$curso31['id_curso'];
    if ($id_aluno31 != null) {
      //Cadastra na tabela termo_compromisso os dados que ele recebe do forulário, em seguida retorna a página 'Termo de Compromisso' 
      $inserir31 = mysql_query("INSERT INTO termo_compromisso VALUES ('','$id_curso31','$id_aluno31','','$codigo_empresa','','$dt_ini_nn31','$dt_fim_nn31','','$agente_nn','$tp_termo_nn','$carga_hrr_nn','$hr_ini_nn31','$hr_fim_nn31','','$cl_termo_nn','','', '', '', '', '$prof_nn','$siape','','','ATIVO')");

    }
$sql32=mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$id_aluno32'");
$curso32=mysql_fetch_array($sql32);
  $id_curso32=$curso32['id_curso'];
    if ($id_aluno32 != null) {
      //Cadastra na tabela termo_compromisso os dados que ele recebe do forulário, em seguida retorna a página 'Termo de Compromisso' 
      $inserir32 = mysql_query("INSERT INTO termo_compromisso VALUES ('','$id_curso32','$id_aluno32','','$codigo_empresa','','$dt_ini_nn32','$dt_fim_nn32','','$agente_nn','$tp_termo_nn','$carga_hrr_nn','$hr_ini_nn32','$hr_fim_nn32','','$cl_termo_nn','','', '', '', '', '$prof_nn','$siape','','','ATIVO')");

    }
$sql33=mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$id_aluno33'");
$curso33=mysql_fetch_array($sql33);
  $id_curso33=$curso33['id_curso'];
    if ($id_aluno33 != null) {
      //Cadastra na tabela termo_compromisso os dados que ele recebe do forulário, em seguida retorna a página 'Termo de Compromisso' 
      $inserir33 = mysql_query("INSERT INTO termo_compromisso VALUES ('','$id_curso33','$id_aluno33','','$codigo_empresa','','$dt_ini_nn33','$dt_fim_nn33','','$agente_nn','$tp_termo_nn','$carga_hrr_nn','$hr_ini_nn33','$hr_fim_nn33','','$cl_termo_nn','','', '', '', '', '$prof_nn','$siape','','','ATIVO')");

    }
$sql34=mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$id_aluno34'");
$curso34=mysql_fetch_array($sql34);
  $id_curso34=$curso34['id_curso'];
    if ($id_aluno34 != null) {
      //Cadastra na tabela termo_compromisso os dados que ele recebe do forulário, em seguida retorna a página 'Termo de Compromisso' 
      $inserir34 = mysql_query("INSERT INTO termo_compromisso VALUES ('','$id_curso34','$id_aluno34','','$codigo_empresa','','$dt_ini_nn34','$dt_fim_nn34','','$agente_nn','$tp_termo_nn','$carga_hrr_nn','$hr_ini_nn34','$hr_fim_nn34','','$cl_termo_nn','','', '', '', '', '$prof_nn','$siape','','','ATIVO')");

    }
$sql35=mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$id_aluno35'");
$curso35=mysql_fetch_array($sql35);
  $id_curso35=$curso35['id_curso'];
    if ($id_aluno35 != null) {
      //Cadastra na tabela termo_compromisso os dados que ele recebe do forulário, em seguida retorna a página 'Termo de Compromisso' 
      $inserir35 = mysql_query("INSERT INTO termo_compromisso VALUES ('','$id_curso35','$id_aluno35','','$codigo_empresa','','$dt_ini_nn35','$dt_fim_nn35','','$agente_nn','$tp_termo_nn','$carga_hrr_nn','$hr_ini_nn35','$hr_fim_nn35','','$cl_termo_nn','','', '', '', '', '$prof_nn','$siape','','','ATIVO')");

    }

$sql36=mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$id_aluno36'");
$curso36=mysql_fetch_array($sql36);
  $id_curso36=$curso36['id_curso'];
    if ($id_aluno36 != null) {
      //Cadastra na tabela termo_compromisso os dados que ele recebe do forulário, em seguida retorna a página 'Termo de Compromisso' 
      $inserir36 = mysql_query("INSERT INTO termo_compromisso VALUES ('','$id_curso36','$id_aluno36','','$codigo_empresa','','$dt_ini_nn36','$dt_fim_nn36','','$agente_nn','$tp_termo_nn','$carga_hrr_nn','$hr_ini_nn36','$hr_fim_nn36','','$cl_termo_nn','','', '', '', '', '$prof_nn','$siape','','','ATIVO')");

    }
$sql37=mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$id_aluno37'");
$curso37=mysql_fetch_array($sql37);
  $id_curso37=$curso37['id_curso'];
    if ($id_aluno37 != null) {
      //Cadastra na tabela termo_compromisso os dados que ele recebe do forulário, em seguida retorna a página 'Termo de Compromisso' 
      $inserir37 = mysql_query("INSERT INTO termo_compromisso VALUES ('','$id_curso37','$id_aluno37','','$codigo_empresa','','$dt_ini_nn37','$dt_fim_nn37','','$agente_nn','$tp_termo_nn','$carga_hrr_nn','$hr_ini_nn37','$hr_fim_nn37','','$cl_termo_nn','','', '', '', '', '$prof_nn','$siape','','','ATIVO')");

    }
$sql38=mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$id_aluno38'");
$curso38=mysql_fetch_array($sql38);
  $id_curso38=$curso38['id_curso'];
    if ($id_aluno38 != null) {
      //Cadastra na tabela termo_compromisso os dados que ele recebe do forulário, em seguida retorna a página 'Termo de Compromisso' 
      $inserir38 = mysql_query("INSERT INTO termo_compromisso VALUES ('','$id_curso38','$id_aluno38','','$codigo_empresa','','$dt_ini_nn38','$dt_fim_nn38','','$agente_nn','$tp_termo_nn','$carga_hrr_nn','$hr_ini_nn38','$hr_fim_nn38','','$cl_termo_nn','','', '', '', '', '$prof_nn','$siape','','','ATIVO')");

    }
$sql39=mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$id_aluno39'");
$curso39=mysql_fetch_array($sql39);
  $id_curso39=$curso39['id_curso'];
    if ($id_aluno39 != null) {
      //Cadastra na tabela termo_compromisso os dados que ele recebe do forulário, em seguida retorna a página 'Termo de Compromisso' 
      $inserir39 = mysql_query("INSERT INTO termo_compromisso VALUES ('','$id_curso39','$id_aluno39','','$codigo_empresa','','$dt_ini_nn39','$dt_fim_nn39','','$agente_nn','$tp_termo_nn','$carga_hrr_nn','$hr_ini_nn39','$hr_fim_nn39','','$cl_termo_nn','','', '', '', '', '$prof_nn','$siape','','','ATIVO')");

    }
     header('location:termo_compromisso_coletivo.php');
    
    }
  }
}
     

 ?>