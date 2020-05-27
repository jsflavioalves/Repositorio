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
  <title>Agência de Estágios UFC | Perfil</title>
  <link rel="shortcut icon" href="images/ico/icon.png"> 
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../CpanelProfessor/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../CpanelProfessor/dist/css/AdminLTE.min.css">
  
  <link rel="stylesheet" href="../../CpanelProfessor/dist/css/skins/_all-skins.min.css">

  <script src="../dist/js/divsOcultas.js"></script>

  <script type="text/javascript">
    function fone_prof(x){
      if(x.value.length == 0){
        x.value = x.value + '(';
      }
      if(x.value.length == 3){
        x.value = x.value + ')';
      }
      if(x.value.length == 4){
        x.value = x.value + ' ';
      }
      if(x.value.length == 10 ){
        x.value = x.value + '-';
      }
    }


  </script>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="../../CpanelProfessor/brasao.png"></span>
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
          <img src="../../CpanelProfessor/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
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
<!--codigo usado para mostrar as informações cadastradas do usuário, tendo a possibilidade de fazer alterações em dados específicos que o ADMIN deixar-->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../../CpanelProfessor/dist/img/user2-160x160.jpg" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $nome_prof ?></h3>

              <p class="text-muted text-center"><?php echo $lotacao;?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>SIAPE: </b><b><?php echo $siape; ?></b>
                </li>
                <li class="list-group-item">
                  <b>CPF: </b><b><?php echo $cpf; ?></b>
                </li>
                <li class="list-group-item">
                  <b>TELEFONE: </b><b><?php echo $fone; ?></b>
                </li>
              </ul>
              <?php 
                if ($siape == null) {
                  echo '<a class="btn btn-primary btn-block" onclick="habilitar_input()"><b>ATUALIZAR DADOS</b></a>';
                }
                if ($siape != null) {
                  echo '<a class="btn btn-primary btn-block" onclick="habilita_ok()"><b>ATUALIZAR DADOS</b></a>';
                }
              ?>

              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <!--o codigo de php logo a seguir, está em forma de condição lógica ou seja, caso o usuário tenha alguma informação vazia, ele terá a possibilidade de fazer a alteração em qualquer campo de dados, caso contrário, ele fará apenas nos campos que forem livres para alterações-->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#settings" data-toggle="tab">DADOS DO PROFESSOR</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="settings">
                  <?php 
                    if ($siape == null) {
                      echo '<form class="form-horizontal" action="acao_atualizar_dados.php" method="POST">

                            <div class="form-group">
                              <label for="inputName" class="col-sm-2 control-label">NOME</label>

                              <div class="col-sm-10">
                                <input onclick="habilitar_input();" name="editar_nome" type="text" class="form-control" value="'.$nome_prof.'" id="editar_nome" disabled>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputName" class="col-sm-2 control-label">SIAPE</label>

                              <div class="col-sm-10">
                                <input onclick="habilitar_input();" name="editar_siape" type="text" class="form-control" value="'.$siape.'" id="editar_siape" disabled>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputName" class="col-sm-2 control-label">CPF</label>

                              <div class="col-sm-10">
                                <input onclick="habilitar_input();" name="editar_cpf" type="text" class="form-control" value="'.$cpf.'" id="editar_cpf" disabled>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputName" class="col-sm-2 control-label">EMAIL</label>

                              <div class="col-sm-10">
                                <input onclick="habilitar_input();" name="editar_email" type="text" class="form-control" value="'.$email.'" id="editar_email" disabled>
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="inputName" class="col-sm-2 control-label">TELEFONE</label>

                              <div class="col-sm-10">
                                <input onclick="habilitar_input();" name="editar_telefone" type="text" class="form-control" value="'.$fone.'" id="editar_fone" onkeypress="fone_prof(this);" maxlength="15" disabled>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputSkills" class="col-sm-2 control-label">LOTAÇÃO</label>

                              <div class="col-sm-10">
                                <input onclick="habilitar_input();" name="editar_lotacao" type="text" class="form-control" value="'.$lotacao.'" id="editar_lotacao" disabled>
                              </div>
                            </div>
                            <div class="form-group">
                               <div class="col-md-12">
                                <input name="id_professor" type="hidden" class="form-control" value="'.$id_professor.'">
                                <div class="col-sm-2"></div>
                               <div class="col-md-10">
                                <button onclick="habilitar_input();" id="salvar" style="display:none; margin-left:-10px;" type="submit" class="btn btn-primary pull-left">SALVAR</button>
                                <a href="profile.php"><button onclick="habilitar_input();" id="cancelar" style="display:none; margin-left:80px;" type="button" class="btn btn-danger pull-hight">CANCELAR</button></a>
                                 </div>
                              </div>

                              </div>
                            </form>';
                    }
                    if ($siape != null) {
                      echo '<form class="form-horizontal" action="acao_atualizar_dados2.php" method="POST">
                            <div class="form-group">
                              <label for="inputName" class="col-sm-2 control-label">NOME</label>

                              <div class="col-sm-10">
                                <input onclick="habilitar_ok();" name="editar_nome2" type="text" class="form-control" value="'.$nome_prof.'" id="nome" disabled>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputName" class="col-sm-2 control-label">SIAPE</label>

                              <div class="col-sm-10">
                                <input onclick="habilitar_ok();" name="editar_siape2" type="text" class="form-control" value="'.$siape.'" id="siape" disabled>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputName" class="col-sm-2 control-label">CPF</label>

                              <div class="col-sm-10">
                                <input onclick="habilitar_ok();" name="editar_cpf2" type="text" class="form-control" value="'.$cpf.'" id="cpf" disabled>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputName" class="col-sm-2 control-label">EMAIL</label>

                              <div class="col-sm-10">
                                <input onclick="habilitar_ok();" name="editar_email2" type="text" class="form-control" value="'.$email.'" id="email" disabled>
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="inputName" class="col-sm-2 control-label">TELEFONE</label>

                              <div class="col-sm-10">
                                <input onclick="habilitar_ok();" name="editar_telefone" type="text" class="form-control" value="'.$fone.'" id="editar_telefone" onkeypress="fone_prof(this);" maxlength="15" disabled>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputSkills" class="col-sm-2 control-label">LOTAÇÃO</label>

                              <div class="col-sm-10">
                                <input onclick="habilitar_ok();" name="editar_lotacao2" type="text" class="form-control" value="'.$lotacao.'" id="lotacao" disabled>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-md-12">
                                <input name="id_professor2" type="hidden" class="form-control" value="'.$id_professor.'">
                                <div class="col-sm-2"></div>
                               <div class="col-md-10">
                                <button onclick="habilitar_ok();" id="salvar" name="salvar" style="display:none;margin-left:-10px;" type="submit" class="btn btn-primary pull-left">SALVAR</button>
                                 <a href="profile.php"><button onclick="habilitar_ok();" id="cancelar" style="display:none; margin-left:80px;" type="button" class="btn btn-danger pull-hight">CANCELAR</button></a>
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
<script src="../../CpanelProfessor/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../CpanelProfessor/bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../../CpanelProfessor/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../CpanelProfessor/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../CpanelProfessor/dist/js/demo.js"></script>
</body>
</html>
