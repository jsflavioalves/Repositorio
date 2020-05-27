<?php
require ('conn.php');
mysql_select_db('estagios');
@session_start();

/* $cpf=$_SESSION['sesaocpf']; */
$matricula=$_SESSION['sesaomatricula'];

$consultar=mysql_query("SELECT * FROM alunos where matricula like '$matricula'");
$result=mysql_num_rows($consultar);

if ($result == 0) {header('location:http://www.estagios.ufc.br/siges/public_html/');}

$linha=mysql_fetch_array($consultar);
$id_aluno = utf8_encode($linha['id_aluno']);
$nome_aluno = utf8_encode($linha['nome']);
$cpf = utf8_encode($linha['cpf']);
$rg = utf8_encode($linha['rg']);
$matricula = utf8_encode($linha['matricula']);
$nome_mae = utf8_encode($linha['nome_mae']);
$curso = utf8_encode($linha['curso']);
$email = utf8_encode($linha['email']);
$telefone = utf8_encode($linha['telefone']);
$endereco = utf8_encode($linha['endereco']);
$cidade = utf8_encode($linha['cidade']);
$uf = utf8_encode($linha['uf']);
list($nome, $nome2, $nome3) = explode(' ', $nome_aluno);


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Agência de Estágios UFC | Perfil</title>
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
  
  <link rel="stylesheet" href="../../CpanelAluno/dist/css/skins/_all-skins.min.css">

  <script src="../../CpanelAluno/dist/js/divsOcultas.js"></script>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="../../CpanelAluno/brasao.png"></span>
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
          <p style="font-size: 15px; margin-bottom: 2px;"><?php echo utf8_encode($nome.' '.$nome2.' '.$nome3); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php include 'barra_menu.php'; ?>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!--capacidade de fazer alteração nos dados cadastrados do aluno, mas só poderá alterar apenas os campos que o ADMIN permitir-->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../../CpanelAluno/dist/img/user2-160x160.jpg" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $nome_aluno; ?></h3>

              <p class="text-muted text-center"><?php echo $curso;?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>CPF: </b><b><?php echo $cpf; ?></b>
                </li>
                <li class="list-group-item">
                  <b>RG: </b><b><?php echo $rg; ?></b>
                </li>
                <li class="list-group-item">
                  <b>TELEFONE: </b><b><?php echo $telefone; ?></b>
                </li>
              </ul>
              <?php 
                if ($rg == null) {
                  echo '<a class="btn btn-primary btn-block" onclick="habilitar_input()"><b>ATUALIZAR DADOS</b></a>';
                }
                if ($rg != null) {
                  echo '<a class="btn btn-primary btn-block" onclick="habilita_ok()"><b>ATUALIZAR DADOS</b></a>';
                }
              ?>

              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#settings" data-toggle="tab">DADOS DO ALUNO</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="settings">
                  <?php 
                    if ($rg == null) {
                      echo '<form class="form-horizontal" action="acao_atualizar_dados2.php" method="POST">
                            <div class="form-group">
                              <label for="inputName" class="col-sm-2 control-label">NOME</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" value="'.$nome_aluno.'" style="text-transform:uppercase" disabled>
                              </div><br>
                            </div>
                            <div class="form-group">
                              <label for="inputEmail" class="col-sm-2 control-label">EMAIL</label>
                              <div class="col-sm-10">
                                <input onclick="habilitar_input();" name="editar_email" type="text" class="form-control" value="'.$email.'" id="editar_email" disabled>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputCPF" class="col-sm-2 control-label">CPF</label>

                              <div class="col-sm-10">
                                <input onclick="habilitar_input();" name="editar_cpf" type="text" class="form-control" value="'.$cpf.'" id="editar_cpf" disabled>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputName" class="col-sm-2 control-label">RG</label>

                              <div class="col-sm-10">
                                <input onclick="habilitar_input();" name="editar_rg" type="text" class="form-control" value="'.$rg.'" id="editar_rg" disabled>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputName" class="col-sm-2 control-label">MATRICULA</label>

                              <div class="col-sm-10">
                                <input onclick="habilitar_input();" name="editar_matricula" type="text" class="form-control" value="'.$matricula.'" id="editar_matricula" disabled>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputName" class="col-sm-2 control-label">CURSO</label>

                              <div class="col-sm-10">
                                <input onclick="habilitar_input();" name="editar_curso" type="text" class="form-control" value="'.$curso.'" id="editar_curso" disabled>
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="inputName" class="col-sm-2 control-label">NOME DA MÃE</label>

                              <div class="col-sm-10">
                                <input onclick="habilitar_input();" name="editar_nome_mae" type="text" class="form-control" value="'.$nome_mae.'" id="editar_nome_mae" disabled>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputSkills" class="col-sm-2 control-label">TELEFONE</label>

                              <div class="col-sm-10">
                                <input onclick="habilitar_input();" name="editar_telefone" type="text" class="form-control" value="'.$telefone.'" id="editar_telefone" onkeypress="fone_pro(editar_telefone);" maxlength="15" disabled>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputSkills" class="col-sm-2 control-label">ENDEREÇO</label>

                              <div class="col-sm-10">
                                <input onclick="habilitar_input();" name="editar_endereco" type="text" class="form-control" value="'.$endereco.'" id="editar_endereco" style="text-transform:uppercase" disabled>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputName" class="col-sm-2 control-label">CIDADE</label>

                              <div class="col-sm-10">
                                <input onclick="habilitar_input();" name="editar_cidade" type="text" class="form-control" value="'.$cidade.'" id="editar_cidade" disabled>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputName" class="col-sm-2 control-label">UF</label>

                              <div class="col-sm-10">
                                <input onclick="habilitar_input();" name="editar_uf" type="text" class="form-control" value="'.$uf.'" id="editar_uf" disabled>
                              </div>
                            </div>
                            <div class="form-group">
                             <div class="col-md-12">
                                <input name="matricula" type="hidden" class="form-control" value="'.$id_aluno.'">
                                <div class="col-sm-2"></div>
                               <div class="col-md-10">
                                <button onclick="habilitar_input();" id="salvar" style="display:none; margin-left:-10px;" type="submit" class="btn btn-primary pull-left">SALVAR</button>
                                 <a href="profile.php"><button onclick="habilitar_input();" id="cancelar" style="display:none; margin-left:80px;" type="submit" class="btn btn-danger pull-hight">CANCELAR</button></a>
                                 </div>
                              </div>
                              </div>
                            </form>';
                    }
                    if ($rg != null) {
                      echo '<form class="form-horizontal" action="acao_atualizar_dados2.php" method="POST">
                            <div class="form-group">
                              <label for="inputName" class="col-sm-2 control-label">NOME</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" value="'.$nome_aluno.'" style="text-transform:uppercase" disabled>
                              </div><br>
                            </div>
                             <div class="form-group">
                              <label for="inputEmail" class="col-sm-2 control-label">EMAIL</label>

                      			<div class="col-sm-10">
                                <input type="text" class="form-control" value="'.$email.'" style="text-transform:uppercase" disabled>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputCPF" class="col-sm-2 control-label">CPF</label>

                              <div class="col-sm-10">
                                <input type="text" class="form-control" value="'.$cpf.'" style="text-transform:uppercase" disabled>
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label for="inputName" class="col-sm-2 control-label">RG</label>

                              <div class="col-sm-10">
                               <input type="text" class="form-control" value="'.$rg.'" style="text-transform:uppercase" disabled>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputName" class="col-sm-2 control-label">MATRICULA</label>

                              <div class="col-sm-10">
                                 <input onclick="habilita_ok();" name="editar_matricula" type="text" class="form-control" value="'.$matricula.'" id="editar_matricula" disabled> 
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputName" class="col-sm-2 control-label">CURSO</label>

                              <div class="col-sm-10">
                                <input onclick="habilita_ok();" name="editar_curso" type="text" class="form-control" value="'.$curso.'" id="editar_curso" disabled>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputSkills" class="col-sm-2 control-label">TELEFONE</label>

                              <div class="col-sm-10">
                                <input onclick="habilita_ok();" name="editar_telefone" type="text" class="form-control" value="'.$telefone.'" id="editar_telefone" onkeypress="telefone_pro2(editar_telefone2);" maxlength="15" disabled>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputSkills" class="col-sm-2 control-label">ENDEREÇO</label>

                              <div class="col-sm-10">
                                <input onclick="habilita_ok();" name="editar_endereco" type="text" class="form-control" value="'.$endereco.'" id="editar_endereco" style="text-transform:uppercase" disabled>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputName" class="col-sm-2 control-label">CIDADE</label>

                              <div class="col-sm-10">
                                <input onclick="habilita_ok();" name="editar_cidade" type="text" class="form-control" value="'.$cidade.'" id="editar_cidade" disabled>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputName" class="col-sm-2 control-label">UF</label>

                              <div class="col-sm-10">
                                <input onclick="habilita_ok();" name="editar_uf" type="text" class="form-control" value="'.$uf.'" id="editar_uf2" disabled>
                              </div>
                            </div>
                            <div class="form-group">
                               <div class="col-md-12">
                                <input name="matricula" type="hidden" class="form-control" value="'.$id_aluno.'">
                                 <div class="col-sm-2"></div>
                               <div class="col-md-10">
                                <button onclick="habilitar_input();" id="salvar" style="display:none;margin-left:-10px;" type="submit" class="btn btn-primary pull-left">SALVAR</button>
                                 <a href="profile.php"><button onclick="habilitar_ok();" id="cancelar" style="display:none; margin-left:80px;" type="submit" class="btn btn-danger pull-hight">CANCELAR</button></a>
                                 </div>
                              </div>
                            </div>
                            </form>';
                    }
                  ?>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright © 2017 - <a href="http://www.ufc.br">UFC</a> - Agência de Estágios | Todos os direitos reservardos</strong>
  </footer>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="../../CpanelAluno/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../CpanelAluno/bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../../CpanelAluno/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../CpanelAluno/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../CpanelAluno/dist/js/demo.js"></script>
</body>
</html>
