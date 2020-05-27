<?php
require ('conn.php');
mysql_select_db('estagios');

@session_start();

$s_matricula=$_SESSION['sesaomatricula'];

$consultar=mysql_query("SELECT * FROM alunos where matricula like '$s_matricula'");
$result=mysql_num_rows($consultar);

if ($result == 0) {header('location:http://www.estagios.ufc.br/siges/public_html/');}

$linha=mysql_fetch_array($consultar);
$id_aluno = $linha['id_aluno'];
$nome_aluno = $linha['nome'];
$curso = utf8_encode($linha['curso']);
$cpf = $linha['cpf'];
$email = $linha['email'];
$fone = $linha['fone'];
$endereco = $linha['endereco'];
list($nome, $nome2, $nome3) = explode(' ', $nome_aluno);


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Agência de Estágios UFC | Vagas de Estágio</title>
  <link rel="shortcut icon" href="images/ico/icon.png"> 
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../CpanelAluno/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../CpanelAluno/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../CpanelAluno/dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../CpanelAluno/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../../CpanelAluno/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../../CpanelAluno/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../../CpanelAluno/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../CpanelAluno/plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../../CpanelAluno/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="../index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="brasao.png"></span>
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
          <img src="../../CpanelAluno/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo utf8_encode($nome.' '.$nome2.' '.$nome3); ?></p>
         <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php include 'barra_menu.php'; ?>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!--aqui mostra as vagas de estágio de acordo com o centro que é cadastrado junto com o curso no banco de dados da agência de estágio-->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <section class="content">
      <!-- Small boxes (Stat box) -->
<div class="row">
        <div class="col-md-12">
            <div class="col-md-2"></div>
          <div class="col-md-8">
            <div class="box box-default">
              <div class="box-header with-border collapsed-box">
                <i class="fa fa-group"></i>
                <h3 class="box-title">ESCOLHA UM GRUPO DE VAGAS PARA VISUALIZAR</h3>
              </div>
             <div class="box-body">
             <!--codigo para verificar a tabela de vagas_estagios2-->
              <!--mostrando os resultados de acordo com o grupo que foi escolhido no select-->

            <div class="col-md-12">
               <?php

               echo' <form action="page_todas_vagas.php" method="POST">
                  <td>
                              <div class="form-group">
                                 <select class="form-control select2" id="grupo" name="CD_CENTRO" style="width: 100%;">';
                            
                                   
                                    $sql10 = mysql_query("SELECT * FROM centros ORDER BY NM_CENTRO ASC");
                                    
                                    while($resultado10 = @mysql_fetch_object($sql10)){
                                       echo utf8_encode('<option value="'.$resultado10->CD_CENTRO.'">'.$resultado10->NM_CENTRO.'</option>');
                                    }
                              
                           echo '</select> 
                            </div>
                            <div class="row">
                            <div class="col-md-12">
                            <div class="col-xs-12">
                            <button type="submit" id="btn_cdt" class="btn btn-primary pull-right" name="consvaga" value="consultar"> Consultar </button>
                            </div>
                            </div>
                            </div>
                  </td>
                </form>';
                ?>
              </div>

          </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <!--codigo para verificar a tabela de vagas_estagios-->
            <!--codigo tambem para mostrar quais as vagas que estao cadastradas em seu centro cadastrado junto com seu curso na tabela de cursos no banco de dados-->
            <!--OBS- nao uso virgulas e acentos porque pode dar algum erro-->

        </div>
          
            <?php
              require ('conn.php');
              mysql_select_db('estagios');

              $busca = mysql_query("SELECT * FROM alunos where matricula like '$s_matricula'");
              $existe = mysql_num_rows($busca);
              $array = mysql_fetch_array($busca);
              $id_curso = $array['id_curso'];

              $busca1 = mysql_query("SELECT * FROM cursos where id_curso like '$id_curso'");
              $existe1 = mysql_num_rows($busca1);
              $array1 = mysql_fetch_array($busca1);
              $id_centro = $array1['id_centro'];


              $consulta = mysql_query("SELECT * FROM vagas_estagios WHERE CD_CENTRO LIKE '$id_centro'");
              $resultado_consulta = mysql_num_rows($consulta);
        echo'<div class="col-md-12">';
              if ($resultado_consulta != 0) {
       
                while ($sql=@mysql_fetch_array($consulta)) {
                  $cd_centro = $sql['CD_CENTRO'];
                  $descricao = $sql['descricao'];
                  $link = $sql['link'];
                  $foto_vaga = $sql['foto_vaga'];
                   $arquivo = $sql['foto_vaga2'];

                  $consulta1 = mysql_query("SELECT * FROM centros WHERE CD_CENTRO LIKE '$cd_centro'");
                  $var = mysql_fetch_object($consulta1);

                echo utf8_encode('
                  
                    <div class="col-md-3">
                      <div class="box box-primary" style="text-align: justify;">
                        <div class="box-body table-responsive no-padding" style="height: 350px; overflow:auto;">
                        <div class="box-body">
                          <dl>
                            <dt>GRUPO:</dt>
                            <dd>'.$var->NM_CENTRO.'</dd>');
                
                            if($foto_vaga == ""){

                            } else if($foto_vaga != ""){
                              echo '<dt>IMAGEM DA VAGA:</dt>
                              <center><dd><a target="_blank" href="../../CpanelAdm/pages/forms/vagas_foto/'.$foto_vaga.'"><img src="../../CpanelAdm/pages/forms/vagas_foto/'.$foto_vaga.'" class="img" height="200" width="200"></a>
                              </dd>
                             </center>';
                            }if($arquivo == ""){
                              
                            }else if($arquivo != ""){
                            echo '<dt>ARQUIVO PDF DA VAGA:</dt>';
                             echo'<center><td><a target="_blank" href="../../CpanelAdm/pages/forms/vagas_foto/'.$arquivo.'"><input type="button" class="btn btn-success" value="'.$arquivo.'" style="width:200px;"></a></td></center>';
                                    }
                       
                            echo utf8_encode('<dt>DESCRICÃO DA VAGA:</dt>
                            <dd>'.$descricao.'</dd>
                          </dl>
                        </div>
                      </div>

                          <div class="box">
                            <div class="box-header with-border">
                              <a href="'.$link.'" target="_blank"><button type="button" class="btn btn-block btn-success pull-left" style="width:50%;">IR PARA O SITE</button></a>
                            </div>
                          <div class="box">
                          </div>
                          </div>
                      </div>
                    </div>

                  ');
                }
        echo'</div>';
              } else if ($resultado_consulta == 0){
                echo '<div class="alert alert-danger alert-dismissable"><strong>ATENÇÃO!</strong> NENHUMA VAGA DISPONÍVEL EM SEU GRUPO!</div>';
              } 
                  ?>

             </div>
        </div>
    </section>
  </div>

  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright © 2017 - <a href="http://www.ufc.br">UFC</a> - Agência de Estágios | Todos os direitos reservardos</strong>
  </footer>
  </div>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->


<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="../../CpanelAluno/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="../../CpanelAluno/bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="../../CpanelAluno/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="../../CpanelAluno/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../../CpanelAluno/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../../CpanelAluno/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../CpanelAluno/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../../CpanelAluno/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../../CpanelAluno/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../../CpanelAluno/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../../CpanelAluno/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../CpanelAluno/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../CpanelAluno/dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../CpanelAluno/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../CpanelAluno/dist/js/demo.js"></script>
</body>
</html>
