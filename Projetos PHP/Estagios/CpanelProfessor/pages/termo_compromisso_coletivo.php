<?php
require ('conn.php');
mysql_select_db('estagios');

session_start();
$siape=$_SESSION['siape'];

$consultar=mysql_query("SELECT * FROM professor_orientador WHERE siape LIKE '$siape'");
$result=mysql_num_rows($consultar);

if ($result == 0) {
  header('location:http://www.estagios.ufc.br/siges/public_html/');
}
$linha=mysql_fetch_array($consultar);
$id_professor = $linha['id_professor'];
$nome_prof = utf8_encode($linha['nome']);
$siape = $linha['siape'];
$fone = $linha['fone'];
$email = $linha['email'];
$lotacao = $linha['lotacao'];
$cpf = $linha['cpf'];

list($nome, $nome2, $nome3) = explode(' ', $nome_prof);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Agência de Estágios UFC | TCC</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- IMPORTAÇÃOES -->

  <!--   <link rel="shortcut icon" href="images/ico/icon.png"> -->
  <!-- Tell the browser to be responsive to screen width -->
  <!-- <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"> -->
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../dist/css/style.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">   
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <link href="http://harvesthq.github.io/chosen/chosen.css" rel="stylesheet"/>

  <!--/////////// IMPORTAÇÕES JAVA SCRIPT ///////////-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
  <script src="http://harvesthq.github.io/chosen/chosen.jquery.js"></script>
  
  <!-- AUTO COMPLETE - JQUERY UI -->
  <link type="text/css" href="css/jquery-ui-1.8.5.custom.css" rel="stylesheet"/>
  <script type="text/javascript" src="../plugins/jQuery/jQuery-2.2.0.min.js"></script>
  <script type="text/javascript" src="../plugins/jQueryUI/jquery-ui.min.js"></script>
  
  <script>
    function completar_TCC(){
      $(document).ready(function()
    {
      $('#emp').autocomplete(
      {
        source: "search_completa_tcc.php",
        minLength: 1
      });

    });
    }


    //////////////////////////////////////////// FUNÇÕES PARA ADIÇÃO DE REGISTROS ////////////////////////////////////////////
    function adc_0(){
      var mudar = document.getElementById("btn_0").style.display = 'none';  
      var mudar = document.getElementById("div_2").style.display = 'block';  
      var mudar = document.getElementById("btn_2").style.display = 'block';
         }
    function adc_2(){
      var mudar = document.getElementById("btn_2").style.display = 'none';  
      var mudar = document.getElementById("div_4").style.display = 'block';  
      var mudar = document.getElementById("btn_4").style.display = 'block';
         }
    function adc_4(){
      var mudar = document.getElementById("btn_4").style.display = 'none';  
      var mudar = document.getElementById("div_5").style.display = 'block';  
      var mudar = document.getElementById("btn_5").style.display = 'block';
         }
    function adc_5(){
      var mudar = document.getElementById("btn_5").style.display = 'none';  
      var mudar = document.getElementById("div_6").style.display = 'block';  
      var mudar = document.getElementById("btn_6").style.display = 'block';
         }
    function adc_6(){
      var mudar = document.getElementById("btn_6").style.display = 'none';  
      var mudar = document.getElementById("div_7").style.display = 'block';  
      var mudar = document.getElementById("btn_7").style.display = 'block';
         }
    function adc_7(){
      var mudar = document.getElementById("btn_7").style.display = 'none';  
      var mudar = document.getElementById("div_9").style.display = 'block';  
      var mudar = document.getElementById("btn_9").style.display = 'block';
         }
    function adc_9(){
      var mudar = document.getElementById("btn_9").style.display = 'none';  
      var mudar = document.getElementById("div_10").style.display = 'block';  
      var mudar = document.getElementById("btn_10").style.display = 'block';
     
    }
    function adc_10(){
      var mudar = document.getElementById("btn_10").style.display = 'none';  
      var mudar = document.getElementById("div_11").style.display = 'block';  
      var mudar = document.getElementById("btn_11").style.display = 'block';
     
    }
    function adc_11(){
      var mudar = document.getElementById("btn_11").style.display = 'none';  
      var mudar = document.getElementById("div_12").style.display = 'block';  
      var mudar = document.getElementById("btn_12").style.display = 'block';
     
    }
    function adc_12(){
      var mudar = document.getElementById("btn_12").style.display = 'none';  
      var mudar = document.getElementById("div_13").style.display = 'block';  
      var mudar = document.getElementById("btn_13").style.display = 'block';
     
    }
    function adc_13(){
      var mudar = document.getElementById("btn_13").style.display = 'none';  
      var mudar = document.getElementById("div_14").style.display = 'block';  
      var mudar = document.getElementById("btn_14").style.display = 'block';
     
    }
    function adc_14(){
      var mudar = document.getElementById("btn_14").style.display = 'none';  
      var mudar = document.getElementById("div_15").style.display = 'block';  
      var mudar = document.getElementById("btn_15").style.display = 'block';
     
    }
    function adc_15(){
      var mudar = document.getElementById("btn_15").style.display = 'none';  
      var mudar = document.getElementById("div_16").style.display = 'block';  
      var mudar = document.getElementById("btn_16").style.display = 'block';
     
    }
    function adc_16(){
      var mudar = document.getElementById("btn_16").style.display = 'none';  
      var mudar = document.getElementById("div_17").style.display = 'block';  
      var mudar = document.getElementById("btn_17").style.display = 'block';
     
    }
    function adc_17(){
      var mudar = document.getElementById("btn_17").style.display = 'none';  
      var mudar = document.getElementById("div_18").style.display = 'block';  
      var mudar = document.getElementById("btn_18").style.display = 'block';
     
    }
    function adc_18(){
      var mudar = document.getElementById("btn_18").style.display = 'none';  
      var mudar = document.getElementById("div_19").style.display = 'block';  
      var mudar = document.getElementById("btn_19").style.display = 'block';
     
    }
    function adc_19(){
      var mudar = document.getElementById("btn_19").style.display = 'none';  
      var mudar = document.getElementById("div_20").style.display = 'block';  
      var mudar = document.getElementById("btn_20").style.display = 'block';
     
    }
    function adc_20(){
      var mudar = document.getElementById("btn_20").style.display = 'none';  
      var mudar = document.getElementById("div_22").style.display = 'block';  
      var mudar = document.getElementById("btn_22").style.display = 'block';
     
    }
    function adc_22(){
      var mudar = document.getElementById("btn_22").style.display = 'none';  
      var mudar = document.getElementById("div_24").style.display = 'block';  
      var mudar = document.getElementById("btn_24").style.display = 'block';
     
    }
    function adc_24(){
      var mudar = document.getElementById("btn_24").style.display = 'none';  
      var mudar = document.getElementById("div_25").style.display = 'block';  
      var mudar = document.getElementById("btn_25").style.display = 'block';
     
    }
    function adc_25(){
      var mudar = document.getElementById("btn_25").style.display = 'none';  
      var mudar = document.getElementById("div_26").style.display = 'block';  
      var mudar = document.getElementById("btn_26").style.display = 'block';
     
    }
    function adc_26(){
      var mudar = document.getElementById("btn_26").style.display = 'none';  
      var mudar = document.getElementById("div_27").style.display = 'block';  
      var mudar = document.getElementById("btn_27").style.display = 'block';
     
    }
    function adc_27(){
      var mudar = document.getElementById("btn_27").style.display = 'none';  
      var mudar = document.getElementById("div_29").style.display = 'block';  
      var mudar = document.getElementById("btn_29").style.display = 'block';
     
    }
    function adc_29(){
      var mudar = document.getElementById("btn_29").style.display = 'none';  
      var mudar = document.getElementById("div_30").style.display = 'block';  
      var mudar = document.getElementById("btn_30").style.display = 'block';
     
    }
    function adc_30(){
      var mudar = document.getElementById("btn_30").style.display = 'none';  
      var mudar = document.getElementById("div_31").style.display = 'block';
      var mudar = document.getElementById("btn_31").style.display = 'block';       
    }


    function adc_31(){
      var mudar = document.getElementById("btn_31").style.display = 'none';  
      var mudar = document.getElementById("div_32").style.display = 'block';  
      var mudar = document.getElementById("btn_32").style.display = 'block';
         }
    function adc_32(){
      var mudar = document.getElementById("btn_32").style.display = 'none';  
      var mudar = document.getElementById("div_33").style.display = 'block';  
      var mudar = document.getElementById("btn_33").style.display = 'block';
         }
    function adc_33(){
      var mudar = document.getElementById("btn_33").style.display = 'none';  
      var mudar = document.getElementById("div_34").style.display = 'block';  
      var mudar = document.getElementById("btn_34").style.display = 'block';
         }
    function adc_34(){
      var mudar = document.getElementById("btn_34").style.display = 'none';  
      var mudar = document.getElementById("div_35").style.display = 'block';  
      var mudar = document.getElementById("btn_35").style.display = 'block';
         }
    function adc_35(){
      var mudar = document.getElementById("btn_35").style.display = 'none';  
      var mudar = document.getElementById("div_36").style.display = 'block';  
      var mudar = document.getElementById("btn_36").style.display = 'block';
         }
    function adc_36(){
      var mudar = document.getElementById("btn_36").style.display = 'none';  
      var mudar = document.getElementById("div_37").style.display = 'block';  
      var mudar = document.getElementById("btn_37").style.display = 'block';
         }
    function adc_37(){
      var mudar = document.getElementById("btn_37").style.display = 'none';  
      var mudar = document.getElementById("div_38").style.display = 'block';  
      var mudar = document.getElementById("btn_38").style.display = 'block';
         }
    function adc_38(){
      var mudar = document.getElementById("btn_38").style.display = 'none';  
      var mudar = document.getElementById("div_39").style.display = 'block';  
      var mudar = document.getElementById("btn_39").style.display = 'block';
         }
    function adc_39(){
      var mudar = document.getElementById("btn_39").style.display = 'none';  
      var mudar = document.getElementById("div_40").style.display = 'block';  
      var mudar = document.getElementById("btn_40").style.display = 'block';
     
    }
    function adc_40(){
      var mudar = document.getElementById("btn_40").style.display = 'none';  
      var mudar = document.getElementById("div_41").style.display = 'block';  
      var mudar = document.getElementById("btn_41").style.display = 'block';
     
    }
    function adc_41(){
      var mudar = document.getElementById("btn_41").style.display = 'none';  
      var mudar = document.getElementById("div_42").style.display = 'block';  
      var mudar = document.getElementById("btn_42").style.display = 'block';
     
    }
    function adc_42(){
      var mudar = document.getElementById("btn_42").style.display = 'none';  
      var mudar = document.getElementById("div_43").style.display = 'block';  
      var mudar = document.getElementById("btn_43").style.display = 'block';
     
    }
    function adc_43(){
      var mudar = document.getElementById("btn_43").style.display = 'none';  
      var mudar = document.getElementById("div_44").style.display = 'block';  
      var mudar = document.getElementById("btn_44").style.display = 'block';
     
    }
    function adc_44(){
      var mudar = document.getElementById("btn_44").style.display = 'none';  
      var mudar = document.getElementById("div_45").style.display = 'block';  
      var mudar = document.getElementById("btn_45").style.display = 'block';
     
    }
    function adc_45(){
      var mudar = document.getElementById("btn_45").style.display = 'none';  
      var mudar = document.getElementById("div_46").style.display = 'block';  
      var mudar = document.getElementById("btn_46").style.display = 'block';
     
    }
    function adc_46(){
      var mudar = document.getElementById("btn_46").style.display = 'none';  
      var mudar = document.getElementById("div_47").style.display = 'block';  
      var mudar = document.getElementById("btn_47").style.display = 'block';
     
    }
    function adc_47(){
      var mudar = document.getElementById("btn_47").style.display = 'none';  
      var mudar = document.getElementById("div_48").style.display = 'block';  
      var mudar = document.getElementById("btn_48").style.display = 'block';
     
    }
    function adc_48(){
      var mudar = document.getElementById("btn_48").style.display = 'none';  
      var mudar = document.getElementById("div_49").style.display = 'block';  
      var mudar = document.getElementById("btn_49").style.display = 'block';
     
    }
    function adc_49(){
      var mudar = document.getElementById("btn_49").style.display = 'none';  
      var mudar = document.getElementById("div_50").style.display = 'block';  
      var mudar = document.getElementById("btn_50").style.display = 'block';
     
    }
    function adc_50(){
      var mudar = document.getElementById("btn_50").style.display = 'none';  
      var mudar = document.getElementById("div_52").style.display = 'block';  
      var mudar = document.getElementById("btn_52").style.display = 'block';
     
    }
    function adc_52(){
      var mudar = document.getElementById("btn_52").style.display = 'none';  
      var mudar = document.getElementById("div_54").style.display = 'block';  
      var mudar = document.getElementById("btn_54").style.display = 'block';
     
    }
    function adc_54(){
      var mudar = document.getElementById("btn_54").style.display = 'none';  
      var mudar = document.getElementById("div_55").style.display = 'block';  
      var mudar = document.getElementById("btn_55").style.display = 'block';
     
    }
    function adc_55(){
      var mudar = document.getElementById("btn_55").style.display = 'none';  
      var mudar = document.getElementById("div_56").style.display = 'block';  
      var mudar = document.getElementById("btn_56").style.display = 'block';
     
    }
    function adc_56(){
      var mudar = document.getElementById("btn_56").style.display = 'none';  
      var mudar = document.getElementById("div_57").style.display = 'block';  
      var mudar = document.getElementById("btn_57").style.display = 'block';
     
    }
    function adc_57(){
      var mudar = document.getElementById("btn_57").style.display = 'none';  
      var mudar = document.getElementById("div_59").style.display = 'block';  
      var mudar = document.getElementById("btn_59").style.display = 'block';
     
    }
    function adc_59(){
      var mudar = document.getElementById("btn_59").style.display = 'none';  
      var mudar = document.getElementById("div_60").style.display = 'block';  
  
    }
    //////////////////////////////////////////// TÉRMINO DAS FUNÇÕES PARA ADIÇÃO DE REGISTROS ////////////////////////////////////////////

    
  </script>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="../brasao.png"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><strong>CLICK<i class="fa fa-caret-left"></i></strong> Estágios</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <?php include 'barra_topo.php'; ?>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $nome.' '.$nome2.' '.$nome3; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php include 'barra_menu.php'; ?>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <section class="content">
              <!-- FORMULÁRIO QUE RECEBE AS INFORMAÇÕES DA EMPRESA -->
              <div class="box box-primary">
                <div class="form-group">
                  <div class="box-header with-border">
                    <div class="box-body">
                      <h3 class="box-title">Cadastrar Termo Coletivo</h3>

<?php
  //RECEBENDO O SIAPE //
    $siape2 = $_SESSION['siape'];
    $prof2 = mysql_query("SELECT * FROM professor_orientador WHERE siape LIKE '$siape2'");
    $nomeprof = mysql_fetch_object($prof2);

  //GERADOR DE CÓDIGO //
    $ger = "123456789ABCDEFGHIJKLMNOPQRSTUVXZ".time().date("GisYmd");
    $cod = md5($ger);
    $codigo = strtoupper(substr($cod, 0, 6));

    setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');
    $data = strftime('%d-%m-%Y', strtotime('today'));

    // Formulário de envio - "acao_tcc.php" //
echo '<form action="acao_inserir_tcc.php" method="POST">';
echo '<div id="dasinp1" style="display:block">';
  echo utf8_encode('
                  <div class="col-md-12">
                    <div class="col-md-6">
                        
                        <br><label>Concedente</label>
                          <div class="form-group">
                            <input id="emp" onkeypress="completar_TCC()" type="text" name="concedente_n" class="form-control" />
                          </div>
                        <label> Agente </label>
                        <div class="form-group">
                          <select class="form-control select2"  name="agente_n" style="width: 100%;" required>
                            <option selected="selected"></option>');

                              // SELECIONA E LISTA TODOS OS REGISTROS DA TABELA AGENTES //
                              $sql5 = mysql_query("SELECT * FROM agentes");
                              while($resultado5=mysql_fetch_object($sql5)){
                                echo utf8_encode('<option value="'.$resultado5->CD_AGENTE.'">'.$resultado5->NM_AGENTE.'</option>');
                              }

                              echo utf8_encode('
                          </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <br><label> Professor Orientador </label>
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-street-view"></i></div>
                            <input type="hidden" id="inputName" class="form-control" name="prof_n" value="'.$nomeprof->nome.'">
                             <input type="text" id="inputName" class="form-control" value="'.$nomeprof->nome.'" disabled>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-6">
                          <label> SIAPE </label>
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-list-alt"></i></div>
                              <input type="hidden" id="inputName" class="form-control" name="siape" value="'.$siape2.'">
                              <input type="text" id="inputName" class="form-control" value="'.$siape2.'" disabled>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label> Carga Horaria Semanal </label>
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                              <input type="text" id="inputName" class="form-control" name="cg_hrr_n">
                            </div>
                          </div>
                        </div>
                    </div>
                  </div>');
          echo '
                  <div class="col-md-12">
                      <div class="col-md-3">
                        <label>Classifica&ccedil;&atilde;o do Termo</label>
                        <div class="form-group">
                          <select class="form-control select2" name="cl_trm_n" style="width: 100%;" required>
                            <option selected="selected"></option>
                            <option>OBRIGATORIO</option>
                            <option>N&Atilde;O OBRIGATORIO</option>       
                          </select>
                        </div>
                      </div> ';
          echo utf8_encode('
                      <div class="col-md-3">
                        <label>Tipo do Termo</label>
                          <div class="form-group">
                            <select class="form-control select2" name="tp_trm_n" style="width: 100%;" required>
                              <option selected="selected"></option>
                              <option>T.A</option>
                              <option>T.C</option>         
                            </select>
                          </div>
                      </div>
                      <div class="col-md-3">
                        <label> Data do Cadastro </label>
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            <input type="text" class="form-control" name="vazio" value="'.$data.'" disabled>
                            <input type="hidden" class="form-control" name="dt_cadastro" value="'.$data.'" >
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">');
                echo '<label> Código do Termo </label>
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                            <input type="text" class="form-control" name="vazio2" value="'.$codigo.'" disabled>
                            <input type="hidden" class="form-control" name="cd_cadastro" value="'.$codigo.'">
                          </div>
                        </div>
                      </div>
                      <!-- ///////// AVISO !! ///////// -->
                      <center><p><font color="red">NOTA: Anote o Código do TCC &mdash; Uso em Futuras Ações.</font></p><center> ';
   echo '         </div>
                </div> 
              </div>
            </div>
          </div>
        </div>';

            // FORMULÁRIO QUE RECEBE AS INFORMAÇÕES DOS ALUNOS À SEREM CADASTRADOS //


            ///////////////////////////////////////////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////////////////////////////////////////
            /////////// HA UMA REPETIÇÃO DE CÓDIGOS, PORÉM ESTES DISTINGUEM -SE EM NÚMEROS. ///////////
            ///////////                                                                     ///////////
            ///////////                                                                     ///////////
            ///////////                            ATENÇÃO!!                                ///////////
            ///////////      OBSERVE-O E O PROCURE ENTENDER COM CALMA OU SIMPLESMENTE       ///////////
            ///////////         ACHE OUTRA FORMA DE EXECUTA-LO COM MAIS FACILIDADE          ///////////
            ///////////                                                                     ///////////
            ///////////////////////////////////////////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////////////////////////////////////////

   echo '   <div class="box box-primary">
              <div class="form-group">
                <div class="box-header with-border">
                  <div class="box-body">
                    <h3 class="box-title">Dados dos Alunos</h3>
                  </div><br>
                            <div class="col-md-12" id="div_" style="display:block;">
                              <div class="col-md-2">
                                <label> Matricula do Aluno </label>
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="matricula" id="mat" placeholder="Matricula" maxlength="16" onkeyup="buscarNoticias_va(this.value)" size="20" maxlength="20" >
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <label>Horário Variavel</label>
                                <div class="form-group">
                                  <select class="form-control select2" name="variavel_n" required>
                                    <option>NÃO</option>
                                    <option>SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <label> Hora de Entrada</label>
                                  <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                      <input type="text" id="inputName" class="form-control" name="hr_ini_n" id="hora" placeholder="H. Entrada" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                <label> Hora de Saída </label>
                                 <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="hr_fim_n" id="hora" placeholder="H. Saída" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <label>Data de inicio</label>
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="dt_ini_n" id="data" placeholder="D. Inicio" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                 <label> Data de T&eacute;rmino </label>
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="dt_fim_n" id="data" placeholder="D. T&eacute;rmino" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                              </div>
                            </div>
                            
                            <button type="button" name="btn_adicionar" id="btn_0" onclick="adc_0();" style="display:block;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                            
                            <div class="col-md-12" id="div_2" style="display:none;">
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="matricula2" id="mat" placeholder="Matricula" maxlength="16" onkeyup="buscarNoticias_va(this.value)" size="20" maxlength="20" >
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <select class="form-control select2" name="variavel_n2" required>
                                    <option>NÃO</option>
                                    <option>SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                      <input type="text" id="inputName" class="form-control" name="hr_ini_n2" id="hora"  placeholder="H. Entrada" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="hr_fim_n2" id="hora" placeholder="H. Saída"" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="dt_ini_n2"  id="data" placeholder="D. Inicio" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="dt_fim_n2"  id="data" placeholder="D. T&eacute;rmino" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                              </div>
                            </div>

                            <button type="button" name="btn_adicionar2" id="btn_2" onclick="adc_2();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>


                            


                            <div class="col-md-12" id="div_4" style="display:none;">
                         
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="matricula4" id="mat" placeholder="Matricula" maxlength="16" onkeyup="buscarNoticias_va(this.value)" size="20" maxlength="20" >
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <select class="form-control select2" name="variavel_n4" required>
                                    <option>NÃO</option>
                                    <option>SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                      <input type="text" id="inputName" class="form-control" name="hr_ini_n4" id="hora"  placeholder="H. Entrada" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="hr_fim_n4" id="hora" placeholder="H. Saída"" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="dt_ini_n4"  id="data" placeholder="D. Inicio" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="dt_fim_n4"  id="data" placeholder="D. T&eacute;rmino" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                              </div>
                            </div>

                            <button type="button" name="btn_adicionar4" id="btn_4" onclick="adc_4();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                            <div class="col-md-12" id="div_5" style="display:none;">
                         
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="matricula5" id="mat" placeholder="Matricula" maxlength="16" onkeyup="buscarNoticias_va(this.value)" size="20" maxlength="20" >
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <select class="form-control select2" name="variavel_n5" required>
                                    <option>NÃO</option>
                                    <option>SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                      <input type="text" id="inputName" class="form-control" name="hr_ini_n5" id="hora"  placeholder="H. Entrada" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="hr_fim_n5" id="hora" placeholder="H. Saída"" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="dt_ini_n5"  id="data" placeholder="D. Inicio" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="dt_fim_n5"  id="data" placeholder="D. T&eacute;rmino" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                              </div>
                            </div>

                            <button type="button" name="btn_adicionar5" id="btn_5" onclick="adc_5();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                            <div class="col-md-12" id="div_6" style="display:none;">
                         
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="matricula6" id="mat" placeholder="Matricula" maxlength="16" onkeyup="buscarNoticias_va(this.value)" size="20" maxlength="20" >
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <select class="form-control select2" name="variavel_n6" required>
                                    <option>NÃO</option>
                                    <option>SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                      <input type="text" id="inputName" class="form-control" name="hr_ini_n6" id="hora"  placeholder="H. Entrada" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="hr_fim_n6" id="hora" placeholder="H. Saída"" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="dt_ini_n6"  id="data" placeholder="D. Inicio" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="dt_fim_n6"  id="data" placeholder="D. T&eacute;rmino" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                              </div>
                            </div>

                            <button type="button" name="btn_adicionar6" id="btn_6" onclick="adc_6();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                            <div class="col-md-12" id="div_7" style="display:none;">
                         
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="matricula7" id="mat" placeholder="Matricula" maxlength="16" onkeyup="buscarNoticias_va(this.value)" size="20" maxlength="20" >
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <select class="form-control select2" name="variavel_n7" required>
                                    <option>NÃO</option>
                                    <option>SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                      <input type="text" id="inputName" class="form-control" name="hr_ini_n7" id="hora"  placeholder="H. Entrada" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="hr_fim_n7" id="hora" placeholder="H. Saída"" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="dt_ini_n7"  id="data" placeholder="D. Inicio" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="dt_fim_n7"  id="data" placeholder="D. T&eacute;rmino" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                              </div>
                            </div>

                            <button type="button" name="btn_adicionar7" id="btn_7" onclick="adc_7();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                            
                            
                            <div class="col-md-12" id="div_9" style="display:none;">
                         
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="matricula9" id="mat" placeholder="Matricula" maxlength="16" onkeyup="buscarNoticias_va(this.value)" size="20" maxlength="20" >
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <select class="form-control select2" name="variavel_n9" required>
                                    <option>NÃO</option>
                                    <option>SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                      <input type="text" id="inputName" class="form-control" name="hr_ini_n9" id="hora"  placeholder="H. Entrada" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="hr_fim_n9" id="hora" placeholder="H. Saída"" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="dt_ini_n9"  id="data" placeholder="D. Inicio" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="dt_fim_n9"  id="data" placeholder="D. T&eacute;rmino" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                              </div>
                            </div>

                            <button type="button" name="btn_adicionar9" id="btn_9" onclick="adc_9();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                            <div class="col-md-12" id="div_10" style="display:none;">
                         
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="matricula10" id="mat" placeholder="Matricula" maxlength="16" onkeyup="buscarNoticias_va(this.value)" size="20" maxlength="20" >
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <select class="form-control select2" name="variavel_n10" required>
                                    <option>NÃO</option>
                                    <option>SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                      <input type="text" id="inputName" class="form-control" name="hr_ini_n10" id="hora" placeholder="H. Entrada" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="hr_fim_n10" id="hora" placeholder="H. Saída" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="dt_ini_n10" id="data" placeholder="D. Inicio"" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="dt_fim_n10" id="data" placeholder="D. T&eacute;rmino" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                              </div>
                            </div>

                            <button type="button" name="btn_adicionar10" id="btn_10" onclick="adc_10();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                            <div class="col-md-12" id="div_11" style="display:none;">
                         
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="matricula11" id="mat" placeholder="Matricula" maxlength="16" onkeyup="buscarNoticias_va(this.value)" size="20" maxlength="20" >
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <select class="form-control select2" name="variavel_n11" required>
                                    <option>NÃO</option>
                                    <option>SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                      <input type="text" id="inputName" class="form-control" name="hr_ini_n11" id="hora" placeholder="H. Entrada" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="hr_fim_n11" id="hora" placeholder="H. Saída" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="dt_ini_n11" id="data" placeholder="D. Inicio"" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="dt_fim_n11" id="data" placeholder="D. T&eacute;rmino" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                              </div>
                            </div>

                            <button type="button" name="btn_adicionar11" id="btn_11" onclick="adc_11();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                            <div class="col-md-12" id="div_12" style="display:none;">
                         
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="matricula12" id="mat" placeholder="Matricula" maxlength="16" onkeyup="buscarNoticias_va(this.value)" size="20" maxlength="20" >
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <select class="form-control select2" name="variavel_n12" required>
                                    <option>NÃO</option>
                                    <option>SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                      <input type="text" id="inputName" class="form-control" name="hr_ini_n12" id="hora" placeholder="H. Entrada" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="hr_fim_n12" id="hora" placeholder="H. Saída" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="dt_ini_n12" id="data" placeholder="D. Inicio"" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="dt_fim_n12" id="data" placeholder="D. T&eacute;rmino" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                              </div>
                            </div>

                            <button type="button" name="btn_adicionar12" id="btn_12" onclick="adc_12();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                            <div class="col-md-12" id="div_13" style="display:none;">
                         
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="matricula13" id="mat" placeholder="Matricula" maxlength="16" onkeyup="buscarNoticias_va(this.value)" size="20" maxlength="20" >
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <select class="form-control select2" name="variavel_n13" required>
                                    <option>NÃO</option>
                                    <option>SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                      <input type="text" id="inputName" class="form-control" name="hr_ini_n13" id="hora" placeholder="H. Entrada" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="hr_fim_n13" id="hora" placeholder="H. Saída" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="dt_ini_n13" id="data" placeholder="D. Inicio"" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="dt_fim_n13" id="data" placeholder="D. T&eacute;rmino" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                              </div>
                            </div>

                            <button type="button" name="btn_adicionar13" id="btn_13" onclick="adc_13();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                            <div class="col-md-12" id="div_14" style="display:none;">
                         
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="matricula14" id="mat" placeholder="Matricula" maxlength="16" onkeyup="buscarNoticias_va(this.value)" size="20" maxlength="20" >
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <select class="form-control select2" name="variavel_n14" required>
                                    <option>NÃO</option>
                                    <option>SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                      <input type="text" id="inputName" class="form-control" name="hr_ini_n14" id="hora" placeholder="H. Entrada" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="hr_fim_n14" id="hora" placeholder="H. Saída" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="dt_ini_n14" id="data" placeholder="D. Inicio"" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="dt_fim_n14" id="data" placeholder="D. T&eacute;rmino" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                              </div>
                            </div>

                            <button type="button" name="btn_adicionar14" id="btn_14" onclick="adc_14();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                            <div class="col-md-12" id="div_15" style="display:none;">
                         
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="matricula15" id="mat" placeholder="Matricula" maxlength="16" onkeyup="buscarNoticias_va(this.value)" size="20" maxlength="20" >
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <select class="form-control select2" name="variavel_n15" required>
                                    <option>NÃO</option>
                                    <option>SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                      <input type="text" id="inputName" class="form-control" name="hr_ini_n15" id="hora" placeholder="H. Entrada" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="hr_fim_n15" id="hora" placeholder="H. Saída" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="dt_ini_n15" id="data" placeholder="D. Inicio"" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="dt_fim_n15" id="data" placeholder="D. T&eacute;rmino" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                              </div>
                            </div>

                            <button type="button" name="btn_adicionar15" id="btn_15" onclick="adc_15();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                            <div class="col-md-12" id="div_16" style="display:none;">
                         
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="matricula16" id="mat" placeholder="Matricula" maxlength="16" onkeyup="buscarNoticias_va(this.value)" size="20" maxlength="20" >
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <select class="form-control select2" name="variavel_n16" required>
                                    <option>NÃO</option>
                                    <option>SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                      <input type="text" id="inputName" class="form-control" name="hr_ini_n16" id="hora" placeholder="H. Entrada" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="hr_fim_n16" id="hora" placeholder="H. Saída" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="dt_ini_n16" id="data" placeholder="D. Inicio"" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="dt_fim_n16" id="data" placeholder="D. T&eacute;rmino" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                              </div>
                            </div>

                            <button type="button" name="btn_adicionar16" id="btn_16" onclick="adc_16();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                            <div class="col-md-12" id="div_17" style="display:none;">
                         
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="matricula17" id="mat" placeholder="Matricula" maxlength="16" onkeyup="buscarNoticias_va(this.value)" size="20" maxlength="20" >
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <select class="form-control select2" name="variavel_n17" required>
                                    <option>NÃO</option>
                                    <option>SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                      <input type="text" id="inputName" class="form-control" name="hr_ini_n17" id="hora" placeholder="H. Entrada" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="hr_fim_n17" id="hora" placeholder="H. Saída" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="dt_ini_n17" id="data" placeholder="D. Inicio"" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="dt_fim_n17" id="data" placeholder="D. T&eacute;rmino" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                              </div>
                            </div>

                            <button type="button" name="btn_adicionar17" id="btn_17" onclick="adc_17();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                            <div class="col-md-12" id="div_18" style="display:none;">
                         
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="matricula18" id="mat" placeholder="Matricula" maxlength="16" onkeyup="buscarNoticias_va(this.value)" size="20" maxlength="20" >
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <select class="form-control select2" name="variavel_n18" required>
                                    <option>NÃO</option>
                                    <option>SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                      <input type="text" id="inputName" class="form-control" name="hr_ini_n18" id="hora" placeholder="H. Entrada" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="hr_fim_n18" id="hora" placeholder="H. Saída" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="dt_ini_n18" id="data" placeholder="D. Inicio"" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="dt_fim_n18" id="data" placeholder="D. T&eacute;rmino" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                              </div>
                            </div>

                            <button type="button" name="btn_adicionar18" id="btn_18" onclick="adc_18();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                            <div class="col-md-12" id="div_19" style="display:none;">
                         
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="matricula19" id="mat" placeholder="Matricula" maxlength="16" onkeyup="buscarNoticias_va(this.value)" size="20" maxlength="20" >
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <select class="form-control select2" name="variavel_n19" required>
                                    <option>NÃO</option>
                                    <option>SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                      <input type="text" id="inputName" class="form-control" name="hr_ini_n19" id="hora" placeholder="H. Entrada" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="hr_fim_n19" id="hora" placeholder="H. Saída" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="dt_ini_n19" id="data" placeholder="D. Inicio"" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="dt_fim_n19" id="data" placeholder="D. T&eacute;rmino" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                              </div>
                            </div>

                            <button type="button" name="btn_adicionar19" id="btn_19" onclick="adc_19();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                            <div class="col-md-12" id="div_20" style="display:none;">
                         
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="matricula20" id="mat" placeholder="Matricula" maxlength="16" onkeyup="buscarNoticias_va(this.value)" size="20" maxlength="20" >
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <select class="form-control select2" name="variavel_n20" required>
                                    <option>NÃO</option>
                                    <option>SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                      <input type="text" id="inputName" class="form-control" name="hr_ini_n20" id="hora" placeholder="H. Entrada" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="hr_fim_n20" id="hora" placeholder="H. Saída" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="dt_ini_n20" id="data" placeholder="D. Inicio"" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="dt_fim_n20" id="data" placeholder="D. T&eacute;rmino" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                              </div>
                            </div>

                            <button type="button" name="btn_adicionar20" id="btn_20" onclick="adc_20();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                            

                            <div class="col-md-12" id="div_22" style="display:none;">
                         
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="matricula22" id="mat" placeholder="Matricula" maxlength="16" onkeyup="buscarNoticias_va(this.value)" size="20" maxlength="20" >
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <select class="form-control select2" name="variavel_n22" required>
                                    <option>NÃO</option>
                                    <option>SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                      <input type="text" id="inputName" class="form-control" name="hr_ini_n22" id="hora" placeholder="H. Entrada" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="hr_fim_n22" id="hora" placeholder="H. Saída" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="dt_ini_n22" id="data" placeholder="D. Inicio"" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="dt_fim_n22" id="data" placeholder="D. T&eacute;rmino" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                              </div>
                            </div>

                            <button type="button" name="btn_adicionar22" id="btn_22" onclick="adc_22();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                            

                            <div class="col-md-12" id="div_24" style="display:none;">
                         
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="matricula24" id="mat" placeholder="Matricula" maxlength="16" onkeyup="buscarNoticias_va(this.value)" size="20" maxlength="20" >
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <select class="form-control select2" name="variavel_n24" required>
                                    <option>NÃO</option>
                                    <option>SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                      <input type="text" id="inputName" class="form-control" name="hr_ini_n24" id="hora" placeholder="H. Entrada" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="hr_fim_n24" id="hora" placeholder="H. Saída" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="dt_ini_n24" id="data" placeholder="D. Inicio"" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="dt_fim_n24" id="data" placeholder="D. T&eacute;rmino" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                              </div>
                            </div>

                            <button type="button" name="btn_adicionar24" id="btn_24" onclick="adc_24();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                            <div class="col-md-12" id="div_25" style="display:none;">
                         
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="matricula25" id="mat" placeholder="Matricula" maxlength="16" onkeyup="buscarNoticias_va(this.value)" size="20" maxlength="20" >
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <select class="form-control select2" name="variavel_n25" required>
                                    <option>NÃO</option>
                                    <option>SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                      <input type="text" id="inputName" class="form-control" name="hr_ini_n25" id="hora" placeholder="H. Entrada" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="hr_fim_n25" id="hora" placeholder="H. Saída" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="dt_ini_n25" id="data" placeholder="D. Inicio"" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="dt_fim_n25" id="data" placeholder="D. T&eacute;rmino" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                              </div>
                            </div>

                            <button type="button" name="btn_adicionar25" id="btn_25" onclick="adc_25();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                            <div class="col-md-12" id="div_26" style="display:none;">
                         
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="matricula26" id="mat" placeholder="Matricula" maxlength="16" onkeyup="buscarNoticias_va(this.value)" size="20" maxlength="20" >
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <select class="form-control select2" name="variavel_n26" required>
                                    <option>NÃO</option>
                                    <option>SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                      <input type="text" id="inputName" class="form-control" name="hr_ini_n26" id="hora" placeholder="H. Entrada" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="hr_fim_n26" id="hora" placeholder="H. Saída" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="dt_ini_n26" id="data" placeholder="D. Inicio"" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="dt_fim_n26" id="data" placeholder="D. T&eacute;rmino" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                              </div>
                            </div>

                            <button type="button" name="btn_adicionar26" id="btn_26" onclick="adc_26();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                            <div class="col-md-12" id="div_27" style="display:none;">
                         
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="matricula27" id="mat" placeholder="Matricula" maxlength="16" onkeyup="buscarNoticias_va(this.value)" size="20" maxlength="20" >
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <select class="form-control select2" name="variavel_n27" required>
                                    <option>NÃO</option>
                                    <option>SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                      <input type="text" id="inputName" class="form-control" name="hr_ini_n27" id="hora" placeholder="H. Entrada" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="hr_fim_n27" id="hora" placeholder="H. Saída" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="dt_ini_n27" id="data" placeholder="D. Inicio"" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="dt_fim_n27" id="data" placeholder="D. T&eacute;rmino" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                              </div>
                            </div>

                            <button type="button" name="btn_adicionar27" id="btn_27" onclick="adc_27();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                            

                            <div class="col-md-12" id="div_29" style="display:none;">
                         
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="matricula29" id="mat" placeholder="Matricula" maxlength="16" onkeyup="buscarNoticias_va(this.value)" size="20" maxlength="20" >
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <select class="form-control select2" name="variavel_n29" required>
                                    <option>NÃO</option>
                                    <option>SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                      <input type="text" id="inputName" class="form-control" name="hr_ini_n29" id="hora" placeholder="H. Entrada" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="hr_fim_n29" id="hora" placeholder="H. Saída" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="dt_ini_n29" id="data" placeholder="D. Inicio"" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="dt_fim_n29" id="data" placeholder="D. T&eacute;rmino" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                              </div>
                            </div>

                            <button type="button" name="btn_adicionar29" id="btn_29" onclick="adc_29();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                            <div class="col-md-12" id="div_30" style="display:none;">
                         
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="matricula30" id="mat" placeholder="Matricula" maxlength="16" onkeyup="buscarNoticias_va(this.value)" size="20" maxlength="20" >
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <select class="form-control select2" name="variavel_n30" required>
                                    <option>NÃO</option>
                                    <option>SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                      <input type="text" id="inputName" class="form-control" name="hr_ini_n30" id="hora" placeholder="H. Entrada" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="hr_fim_n30" id="hora" placeholder="H. Saída" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="dt_ini_n30" id="data" placeholder="D. Inicio"" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="dt_fim_n30" id="data" placeholder="D. T&eacute;rmino" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                              </div>
                            </div>

                            <button type="button" name="btn_adicionar30" id="btn_30" onclick="adc_30();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                            <!-- ################################################################################################################################################ -->

                            <div class="col-md-12" id="div_31" style="display:none;">
                         
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="matricula31" id="mat" placeholder="Matricula" maxlength="16" onkeyup="buscarNoticias_va(this.value)" size="20" maxlength="20" >
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <select class="form-control select2" name="variavel_n31" required>
                                    <option>NÃO</option>
                                    <option>SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                      <input type="text" id="inputName" class="form-control" name="hr_ini_n31" id="hora" placeholder="H. Entrada" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="hr_fim_n31" id="hora" placeholder="H. Saída" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="dt_ini_n31" id="data" placeholder="D. Inicio"" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="dt_fim_n31" id="data" placeholder="D. T&eacute;rmino" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                              </div>
                            </div>

                            <button type="button" name="btn_adicionar31" id="btn_31" onclick="adc_31();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                            <div class="col-md-12" id="div_32" style="display:none;">
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="matricula32" id="mat" placeholder="Matricula" maxlength="16" onkeyup="buscarNoticias_va(this.value)" size="20" maxlength="20" >
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <select class="form-control select2" name="variavel_n32" required>
                                    <option>NÃO</option>
                                    <option>SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                      <input type="text" id="inputName" class="form-control" name="hr_ini_n32" id="hora"  placeholder="H. Entrada" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="hr_fim_n32" id="hora" placeholder="H. Saída"" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="dt_ini_n32"  id="data" placeholder="D. Inicio" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="dt_fim_n32"  id="data" placeholder="D. T&eacute;rmino" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                              </div>
                            </div>

                            <button type="button" name="btn_adicionar32" id="btn_32" onclick="adc_32();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                            <div class="col-md-12" id="div_33" style="display:none;">
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="matricula33" id="mat" placeholder="Matricula" maxlength="16" onkeyup="buscarNoticias_va(this.value)" size="20" maxlength="20" >
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <select class="form-control select2" name="variavel_n33" required>
                                    <option>NÃO</option>
                                    <option>SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                      <input type="text" id="inputName" class="form-control" name="hr_ini_n33" id="hora"  placeholder="H. Entrada" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="hr_fim_n33" id="hora" placeholder="H. Saída"" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="dt_ini_n33"  id="data" placeholder="D. Inicio" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="dt_fim_n33"  id="data" placeholder="D. T&eacute;rmino" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                              </div>
                            </div>

                            <button type="button" name="btn_adicionar33" id="btn_33" onclick="adc_33();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                            <div class="col-md-12" id="div_34" style="display:none;">
                         
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="matricula34" id="mat" placeholder="Matricula" maxlength="16" onkeyup="buscarNoticias_va(this.value)" size="20" maxlength="20" >
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <select class="form-control select2" name="variavel_n34" required>
                                    <option>NÃO</option>
                                    <option>SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                      <input type="text" id="inputName" class="form-control" name="hr_ini_n34" id="hora"  placeholder="H. Entrada" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="hr_fim_n34" id="hora" placeholder="H. Saída"" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="dt_ini_n34"  id="data" placeholder="D. Inicio" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="dt_fim_n34"  id="data" placeholder="D. T&eacute;rmino" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                              </div>
                            </div>

                            <button type="button" name="btn_adicionar34" id="btn_34" onclick="adc_34();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                            <div class="col-md-12" id="div_35" style="display:none;">
                         
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="matricula35" id="mat" placeholder="Matricula" maxlength="16" onkeyup="buscarNoticias_va(this.value)" size="20" maxlength="20" >
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <select class="form-control select2" name="variavel_n35" required>
                                    <option>NÃO</option>
                                    <option>SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                      <input type="text" id="inputName" class="form-control" name="hr_ini_n35" id="hora"  placeholder="H. Entrada" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="hr_fim_n35" id="hora" placeholder="H. Saída"" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="dt_ini_n35"  id="data" placeholder="D. Inicio" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="dt_fim_n35"  id="data" placeholder="D. T&eacute;rmino" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                              </div>
                            </div>

                            <button type="button" name="btn_adicionar35" id="btn_35" onclick="adc_35();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                            <div class="col-md-12" id="div_36" style="display:none;">
                         
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="matricula36" id="mat" placeholder="Matricula" maxlength="16" onkeyup="buscarNoticias_va(this.value)" size="20" maxlength="20" >
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <select class="form-control select2" name="variavel_n36" required>
                                    <option>NÃO</option>
                                    <option>SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                      <input type="text" id="inputName" class="form-control" name="hr_ini_n36" id="hora"  placeholder="H. Entrada" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="hr_fim_n36" id="hora" placeholder="H. Saída"" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="dt_ini_n36"  id="data" placeholder="D. Inicio" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="dt_fim_n36"  id="data" placeholder="D. T&eacute;rmino" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                              </div>
                            </div>

                            <button type="button" name="btn_adicionar36" id="btn_36" onclick="adc_36();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                            <div class="col-md-12" id="div_37" style="display:none;">
                         
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="matricula37" id="mat" placeholder="Matricula" maxlength="16" onkeyup="buscarNoticias_va(this.value)" size="20" maxlength="20" >
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <select class="form-control select2" name="variavel_n37" required>
                                    <option>NÃO</option>
                                    <option>SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                      <input type="text" id="inputName" class="form-control" name="hr_ini_n37" id="hora"  placeholder="H. Entrada" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="hr_fim_n37" id="hora" placeholder="H. Saída"" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="dt_ini_n37"  id="data" placeholder="D. Inicio" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="dt_fim_n37"  id="data" placeholder="D. T&eacute;rmino" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                              </div>
                            </div>

                            <button type="button" name="btn_adicionar37" id="btn_37" onclick="adc_37();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                            <div class="col-md-12" id="div_38" style="display:none;">
                         
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="matricula38" id="mat" placeholder="Matricula" maxlength="16" onkeyup="buscarNoticias_va(this.value)" size="20" maxlength="20" >
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <select class="form-control select2" name="variavel_n38" required>
                                    <option>NÃO</option>
                                    <option>SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                      <input type="text" id="inputName" class="form-control" name="hr_ini_n38" id="hora"  placeholder="H. Entrada" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="hr_fim_n38" id="hora" placeholder="H. Saída"" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="dt_ini_n38"  id="data" placeholder="D. Inicio" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="dt_fim_n38"  id="data" placeholder="D. T&eacute;rmino" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                              </div>
                            </div>

                            <button type="button" name="btn_adicionar38" id="btn_38" onclick="adc_38();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                            <div class="col-md-12" id="div_39" style="display:none;">
                         
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="matricula39" id="mat" placeholder="Matricula" maxlength="16" onkeyup="buscarNoticias_va(this.value)" size="20" maxlength="20" >
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <select class="form-control select2" name="variavel_n39" required>
                                    <option>NÃO</option>
                                    <option>SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                      <input type="text" id="inputName" class="form-control" name="hr_ini_n39" id="hora"  placeholder="H. Entrada" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="hr_fim_n39" id="hora" placeholder="H. Saída"" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="dt_ini_n39"  id="data" placeholder="D. Inicio" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="dt_fim_n39"  id="data" placeholder="D. T&eacute;rmino" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                              </div>
                            </div>

                            <button type="button" name="btn_adicionar39" id="btn_39" onclick="adc_39();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                            <div class="col-md-12" id="div_40" style="display:none;">
                         
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="matricula40" id="mat" placeholder="Matricula" maxlength="16" onkeyup="buscarNoticias_va(this.value)" size="20" maxlength="20" >
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <select class="form-control select2" name="variavel_n40" required>
                                    <option>NÃO</option>
                                    <option>SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                      <input type="text" id="inputName" class="form-control" name="hr_ini_n40" id="hora" placeholder="H. Entrada" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="hr_fim_n40" id="hora" placeholder="H. Saída" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="dt_ini_n40" id="data" placeholder="D. Inicio"" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="dt_fim_n40" id="data" placeholder="D. T&eacute;rmino" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                              </div>
                            </div>

                            <button type="button" name="btn_adicionar40" id="btn_40" onclick="adc_40();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                            <div class="col-md-12" id="div_41" style="display:none;">
                         
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="matricula41" id="mat" placeholder="Matricula" maxlength="16" onkeyup="buscarNoticias_va(this.value)" size="20" maxlength="20" >
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <select class="form-control select2" name="variavel_n41" required>
                                    <option>NÃO</option>
                                    <option>SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                      <input type="text" id="inputName" class="form-control" name="hr_ini_n41" id="hora" placeholder="H. Entrada" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="hr_fim_n41" id="hora" placeholder="H. Saída" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="dt_ini_n41" id="data" placeholder="D. Inicio"" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="dt_fim_n41" id="data" placeholder="D. T&eacute;rmino" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                              </div>
                            </div>

                            <button type="button" name="btn_adicionar41" id="btn_41" onclick="adc_41();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                            <div class="col-md-12" id="div_42" style="display:none;">
                         
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="matricula42" id="mat" placeholder="Matricula" maxlength="16" onkeyup="buscarNoticias_va(this.value)" size="20" maxlength="20" >
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <select class="form-control select2" name="variavel_n42" required>
                                    <option>NÃO</option>
                                    <option>SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                      <input type="text" id="inputName" class="form-control" name="hr_ini_n42" id="hora" placeholder="H. Entrada" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="hr_fim_n42" id="hora" placeholder="H. Saída" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="dt_ini_n42" id="data" placeholder="D. Inicio"" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="dt_fim_n42" id="data" placeholder="D. T&eacute;rmino" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                              </div>
                            </div>

                            <button type="button" name="btn_adicionar42" id="btn_42" onclick="adc_42();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                            <div class="col-md-12" id="div_43" style="display:none;">
                         
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="matricula43" id="mat" placeholder="Matricula" maxlength="16" onkeyup="buscarNoticias_va(this.value)" size="20" maxlength="20" >
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <select class="form-control select2" name="variavel_n43" required>
                                    <option>NÃO</option>
                                    <option>SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                      <input type="text" id="inputName" class="form-control" name="hr_ini_n43" id="hora" placeholder="H. Entrada" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="hr_fim_n43" id="hora" placeholder="H. Saída" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="dt_ini_n43" id="data" placeholder="D. Inicio"" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="dt_fim_n43" id="data" placeholder="D. T&eacute;rmino" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                              </div>
                            </div>

                            <button type="button" name="btn_adicionar43" id="btn_43" onclick="adc_43();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                            <div class="col-md-12" id="div_44" style="display:none;">
                         
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="matricula44" id="mat" placeholder="Matricula" maxlength="16" onkeyup="buscarNoticias_va(this.value)" size="20" maxlength="20" >
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <select class="form-control select2" name="variavel_n44" required>
                                    <option>NÃO</option>
                                    <option>SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                      <input type="text" id="inputName" class="form-control" name="hr_ini_n44" id="hora" placeholder="H. Entrada" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="hr_fim_n44" id="hora" placeholder="H. Saída" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="dt_ini_n44" id="data" placeholder="D. Inicio"" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="dt_fim_n44" id="data" placeholder="D. T&eacute;rmino" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                              </div>
                            </div>

                            <button type="button" name="btn_adicionar44" id="btn_44" onclick="adc_44();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                            <div class="col-md-12" id="div_45" style="display:none;">
                         
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="matricula45" id="mat" placeholder="Matricula" maxlength="16" onkeyup="buscarNoticias_va(this.value)" size="20" maxlength="20" >
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <select class="form-control select2" name="variavel_n45" required>
                                    <option>NÃO</option>
                                    <option>SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                      <input type="text" id="inputName" class="form-control" name="hr_ini_n45" id="hora" placeholder="H. Entrada" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="hr_fim_n45" id="hora" placeholder="H. Saída" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="dt_ini_n45" id="data" placeholder="D. Inicio"" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="dt_fim_n45" id="data" placeholder="D. T&eacute;rmino" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                              </div>
                            </div>

                            <button type="button" name="btn_adicionar45" id="btn_45" onclick="adc_45();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                            <div class="col-md-12" id="div_46" style="display:none;">
                         
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="matricula46" id="mat" placeholder="Matricula" maxlength="16" onkeyup="buscarNoticias_va(this.value)" size="20" maxlength="20" >
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <select class="form-control select2" name="variavel_n46" required>
                                    <option>NÃO</option>
                                    <option>SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                      <input type="text" id="inputName" class="form-control" name="hr_ini_n46" id="hora" placeholder="H. Entrada" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="hr_fim_n46" id="hora" placeholder="H. Saída" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="dt_ini_n46" id="data" placeholder="D. Inicio"" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="dt_fim_n46" id="data" placeholder="D. T&eacute;rmino" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                              </div>
                            </div>

                            <button type="button" name="btn_adicionar46" id="btn_46" onclick="adc_46();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                            <div class="col-md-12" id="div_47" style="display:none;">
                         
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="matricula47" id="mat" placeholder="Matricula" maxlength="16" onkeyup="buscarNoticias_va(this.value)" size="20" maxlength="20" >
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <select class="form-control select2" name="variavel_n47" required>
                                    <option>NÃO</option>
                                    <option>SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                      <input type="text" id="inputName" class="form-control" name="hr_ini_n47" id="hora" placeholder="H. Entrada" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="hr_fim_n47" id="hora" placeholder="H. Saída" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="dt_ini_n47" id="data" placeholder="D. Inicio"" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="dt_fim_n47" id="data" placeholder="D. T&eacute;rmino" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                              </div>
                            </div>

                            <button type="button" name="btn_adicionar47" id="btn_47" onclick="adc_47();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                            <div class="col-md-12" id="div_48" style="display:none;">
                         
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="matricula48" id="mat" placeholder="Matricula" maxlength="16" onkeyup="buscarNoticias_va(this.value)" size="20" maxlength="20" >
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <select class="form-control select2" name="variavel_n48" required>
                                    <option>NÃO</option>
                                    <option>SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                      <input type="text" id="inputName" class="form-control" name="hr_ini_n48" id="hora" placeholder="H. Entrada" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="hr_fim_n48" id="hora" placeholder="H. Saída" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="dt_ini_n48" id="data" placeholder="D. Inicio"" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="dt_fim_n48" id="data" placeholder="D. T&eacute;rmino" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                              </div>
                            </div>

                            <button type="button" name="btn_adicionar48" id="btn_48" onclick="adc_48();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                            <div class="col-md-12" id="div_49" style="display:none;">
                         
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="matricula49" id="mat" placeholder="Matricula" maxlength="16" onkeyup="buscarNoticias_va(this.value)" size="20" maxlength="20" >
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <select class="form-control select2" name="variavel_n49" required>
                                    <option>NÃO</option>
                                    <option>SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                      <input type="text" id="inputName" class="form-control" name="hr_ini_n49" id="hora" placeholder="H. Entrada" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="hr_fim_n49" id="hora" placeholder="H. Saída" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="dt_ini_n49" id="data" placeholder="D. Inicio"" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="dt_fim_n49" id="data" placeholder="D. T&eacute;rmino" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                              </div>
                            </div>

                            <button type="button" name="btn_adicionar49" id="btn_49" onclick="adc_49();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                            <div class="col-md-12" id="div_50" style="display:none;">
                         
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="matricula50" id="mat" placeholder="Matricula" maxlength="16" onkeyup="buscarNoticias_va(this.value)" size="20" maxlength="20" >
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <select class="form-control select2" name="variavel_n50" required>
                                    <option>NÃO</option>
                                    <option>SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                      <input type="text" id="inputName" class="form-control" name="hr_ini_n50" id="hora" placeholder="H. Entrada" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="hr_fim_n50" id="hora" placeholder="H. Saída" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="dt_ini_n50" id="data" placeholder="D. Inicio"" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="dt_fim_n50" id="data" placeholder="D. T&eacute;rmino" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                              </div>
                            </div>

                            <button type="button" name="btn_adicionar50" id="btn_50" onclick="adc_50();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                            

                            <div class="col-md-12" id="div_52" style="display:none;">
                         
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="matricula52" id="mat" placeholder="Matricula" maxlength="16" onkeyup="buscarNoticias_va(this.value)" size="20" maxlength="20" >
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <select class="form-control select2" name="variavel_n52" required>
                                    <option>NÃO</option>
                                    <option>SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                      <input type="text" id="inputName" class="form-control" name="hr_ini_n52" id="hora" placeholder="H. Entrada" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="hr_fim_n52" id="hora" placeholder="H. Saída" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="dt_ini_n52" id="data" placeholder="D. Inicio"" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="dt_fim_n52" id="data" placeholder="D. T&eacute;rmino" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                              </div>
                            </div>

                            <button type="button" name="btn_adicionar52" id="btn_52" onclick="adc_52();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                            

                            <div class="col-md-12" id="div_54" style="display:none;">
                         
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="matricula54" id="mat" placeholder="Matricula" maxlength="16" onkeyup="buscarNoticias_va(this.value)" size="20" maxlength="20" >
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <select class="form-control select2" name="variavel_n54" required>
                                    <option>NÃO</option>
                                    <option>SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                      <input type="text" id="inputName" class="form-control" name="hr_ini_n54" id="hora" placeholder="H. Entrada" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="hr_fim_n54" id="hora" placeholder="H. Saída" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="dt_ini_n54" id="data" placeholder="D. Inicio"" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="dt_fim_n54" id="data" placeholder="D. T&eacute;rmino" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                              </div>
                            </div>

                            <button type="button" name="btn_adicionar54" id="btn_54" onclick="adc_54();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                            <div class="col-md-12" id="div_55" style="display:none;">
                         
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="matricula55" id="mat" placeholder="Matricula" maxlength="16" onkeyup="buscarNoticias_va(this.value)" size="20" maxlength="20" >
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <select class="form-control select2" name="variavel_n55" required>
                                    <option>NÃO</option>
                                    <option>SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                      <input type="text" id="inputName" class="form-control" name="hr_ini_n55" id="hora" placeholder="H. Entrada" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="hr_fim_n55" id="hora" placeholder="H. Saída" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="dt_ini_n55" id="data" placeholder="D. Inicio"" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="dt_fim_n55" id="data" placeholder="D. T&eacute;rmino" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                              </div>
                            </div>

                            <button type="button" name="btn_adicionar55" id="btn_55" onclick="adc_55();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                            <div class="col-md-12" id="div_56" style="display:none;">
                         
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="matricula56" id="mat" placeholder="Matricula" maxlength="16" onkeyup="buscarNoticias_va(this.value)" size="20" maxlength="20" >
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <select class="form-control select2" name="variavel_n56" required>
                                    <option>NÃO</option>
                                    <option>SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                      <input type="text" id="inputName" class="form-control" name="hr_ini_n56" id="hora" placeholder="H. Entrada" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="hr_fim_n56" id="hora" placeholder="H. Saída" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="dt_ini_n56" id="data" placeholder="D. Inicio"" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="dt_fim_n56" id="data" placeholder="D. T&eacute;rmino" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                              </div>
                            </div>

                            <button type="button" name="btn_adicionar56" id="btn_56" onclick="adc_56();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                            <div class="col-md-12" id="div_57" style="display:none;">
                         
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="matricula57" id="mat" placeholder="Matricula" maxlength="16" onkeyup="buscarNoticias_va(this.value)" size="20" maxlength="20" >
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <select class="form-control select2" name="variavel_n57" required>
                                    <option>NÃO</option>
                                    <option>SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                      <input type="text" id="inputName" class="form-control" name="hr_ini_n57" id="hora" placeholder="H. Entrada" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="hr_fim_n57" id="hora" placeholder="H. Saída" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="dt_ini_n57" id="data" placeholder="D. Inicio"" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="dt_fim_n57" id="data" placeholder="D. T&eacute;rmino" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                              </div>
                            </div>

                            <button type="button" name="btn_adicionar57" id="btn_57" onclick="adc_57();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                            

                            <div class="col-md-12" id="div_59" style="display:none;">
                         
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="matricula59" id="mat" placeholder="Matricula" maxlength="16" onkeyup="buscarNoticias_va(this.value)" size="20" maxlength="20" >
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <select class="form-control select2" name="variavel_n59" required>
                                    <option>NÃO</option>
                                    <option>SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                      <input type="text" id="inputName" class="form-control" name="hr_ini_n59" id="hora" placeholder="H. Entrada" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="hr_fim_n59" id="hora" placeholder="H. Saída" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="dt_ini_n59" id="data" placeholder="D. Inicio"" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="dt_fim_n59" id="data" placeholder="D. T&eacute;rmino" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                              </div>
                            </div>

                            <button type="button" name="btn_adicionar59" id="btn_59" onclick="adc_59();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                            <div class="col-md-12" id="div_60" style="display:none;">
                         
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="matricula60" id="mat" placeholder="Matricula" maxlength="16" onkeyup="buscarNoticias_va(this.value)" size="20" maxlength="20" >
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <select class="form-control select2" name="variavel_n60" required>
                                    <option>NÃO</option>
                                    <option>SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                      <input type="text" id="inputName" class="form-control" name="hr_ini_n60" id="hora" placeholder="H. Entrada" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="hr_fim_n60" id="hora" placeholder="H. Saída" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName" class="form-control" name="dt_ini_n60" id="data" placeholder="D. Inicio"" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                               </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="inputName"  class="form-control" name="dt_fim_n60" id="data" placeholder="D. T&eacute;rmino" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                  </div>
                                </div>
                              </div>
                            </div>

                            <button type="submit" name="btn_cadastrar" onclick="deslabilitar()" class="btn btn-primary pull-right" style="margin-right:1%;" >Cadastrar</button>
                          
                        </form>
                    ';
?>
                  </div>
                  <div class="col-md-1"></div>
                  <div class="col-md-10">
                    <div id="resultado_av"></div>
                  </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
     
    <strong>Copyright © 2017 - <a href="http://www.ufc.br">UFC</a> - Agência de Estágios | Todos os direitos reservardos</strong>
  </footer>
</div>
<!--//// jAVA SCRIPT ////-->

<!-- jQuery 2.2.0 
<script src="../plugins/jQuery/jQuery-2.2.0.min.js"></script> -->

<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<!-- <script src="../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.extensions.js"></script> -->
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<!-- <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script> -->
<!-- iCheck 1.0.1 -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>

<script src="../dist/js/funcs_tce.js"></script>
<!-- Page script -->
<script src="../dist/js/funcs_atualizar_tce.js"></script>

<script src="../dist/js/funcs_ex_tce.js"></script>
<script src="../dist/js/funcs_tcc_verificar_aluno.js"></script>

<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<!-- MÁSCARAS -->
<script>
  function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
function mcep(v){
    v=v.replace(/\D/g,"")                    //Remove tudo o que não é dígito
    v=v.replace(/^(\d{5})(\d)/,"$1-$2")         //Esse é tão fácil que não merece explicações
    return v
}
function mhora(v){
    v=v.replace(/\D/g,"");                    //Remove tudo o que não é dígito
    v=v.replace(/(\d{2})(\d)/,"$1:$2");        
                                           
    return v;
}
function mdata(v){
    v=v.replace(/\D/g,"");                    //Remove tudo o que não é dígito
    v=v.replace(/(\d{2})(\d)/,"$1-$2");       
    v=v.replace(/(\d{2})(\d)/,"$1-$2");       
                                             
    v=v.replace(/(\d{2})(\d{2})$/,"$1$2");
    return v;
}
function mrg(v){
  v=v.replace(/\D/g,'');
  v=v.replace(/^(\d{10})(\d)/g,"$1-$2");
  return v;
}
function mcpf(v){
  v=v.replace(/\D/g,'');
  v=v.replace(/(\d{9})(\d)/g,"$1-$2");
  v=v.replace(/(\d{6})(\d)/g,"$1.$2");
  v=v.replace(/(\d{3})(\d)/g,"$1.$2");
  return v;
}
function mfone(v){
  v=v.replace(/\D/g,"");
  v=v.replace(/(\d{6})(\d)/g,"$1$2-");
  v=v.replace(/^(\d{1})(\d)/g,"($1$2) ");
  return v;
}
function mvalor(v){
    v=v.replace(/\D/g,"");//Remove tudo o que não é dígito
    v=v.replace(/(\d)(\d{8})$/,"$1.$2");//coloca o ponto dos milhões
    v=v.replace(/(\d)(\d{5})$/,"$1.$2");//coloca o ponto dos milhares
        
    v=v.replace(/(\d)(\d{2})$/,"$1,$2");//coloca a virgula antes dos 2 últimos dígitos
    return v;
}
           
function Verifica_Hora(v){ 
hrs = (document.forms[0].Hora.value.substring(0,2)); 
min = (document.forms[0].Hora.value.substring(3,5)); 
               
estado = ""; 
if ((hrs < 00 ) || (hrs > 23) || ( min < 00) ||( min > 59)){ 
estado = "errada"; 
} 
               
if (document.forms[0].Hora.value == "") { 
estado = "errada"; 
} 
 
if (estado == "errada") { 
alert("Hora inválida!"); 
document.forms[0].Hora.focus(); 
} 
}
</script>
</body>
</html>





