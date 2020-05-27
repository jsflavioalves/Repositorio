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
  <script type="text/javascript">
      function aparece_btn() {
        var muda = document.getElementById('confirmar').style.display='block';
      }

    // MUDAR O ACTION DO FORMULÁRIO (DOIS SUBMIT's DENTRO DE UM MESMO FORM)
    function Enviar(opc){
      if(opc == 1){
      document.form.action = "acao_deleta_agendamento.php";
      document.form.submit();
      }
      if(opc == 2){
      document.form.action = "acao_gerar_comprovante.php";
      document.form.submit();
      }
    }

  </script>

<script type="text/javascript">

// FUNCÃO PARA BUSCAR AS DATAS DISPONÍVEL NAQUELE MÊS
function buscarData(valor) {

// Verificando Browser
if(window.XMLHttpRequest) {
   req = new XMLHttpRequest();
}
else if(window.ActiveXObject) {
   req = new ActiveXObject("Microsoft.XMLHTTP");
}

// Arquivo PHP juntamente com o valor digitado no campo (método GET)
var url = "acao_result_data.php?valor="+valor;

// Chamada do método open para processar a requisição
req.open("Get", url, true);

// Quando o objeto recebe o retorno, chamamos a seguinte função;
req.onreadystatechange = function() {

  // Exibe a mensagem "Buscando Noticias..." enquanto carrega
  if(req.readyState == 1) {
    document.getElementById('resultado').innerHTML = 'Buscando...';
  }

  // Verifica se o Ajax realizou todas as operações corretamente
  if(req.readyState == 4 && req.status == 200) {

  // Resposta retornada pelo busca.php
  var resposta = req.responseText;

  // Abaixo colocamos a(s) resposta(s) na div resultado
  document.getElementById('resultado').innerHTML = resposta;
  }
}
req.send(null);
}


// FUNCÃO PARA BUSCAR OS HORÁRIOS DISPONÍVEIS
function buscarHora(valor) {

// Verificando Browser
if(window.XMLHttpRequest) {
   req = new XMLHttpRequest();
}
else if(window.ActiveXObject) {
   req = new ActiveXObject("Microsoft.XMLHTTP");
}

// Arquivo PHP juntamente com o valor digitado no campo (método GET)
var url = "acao_result_hora.php?valor="+valor;

// Chamada do método open para processar a requisição
req.open("Get", url, true);

// Quando o objeto recebe o retorno, chamamos a seguinte função;
req.onreadystatechange = function() {

  // Exibe a mensagem "Buscando Noticias..." enquanto carrega
  if(req.readyState == 1) {
    document.getElementById('resultado2').innerHTML = 'Buscando...';
  }

  // Verifica se o Ajax realizou todas as operações corretamente
  if(req.readyState == 4 && req.status == 200) {

  // Resposta retornada pelo busca.php
  var resposta = req.responseText;

  // Abaixo colocamos a(s) resposta(s) na div resultado
  document.getElementById('resultado2').innerHTML = resposta;
  }
}
req.send(null);
}

  </script>
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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
          <?php
            require ('conn.php');
            mysql_select_db('estagios');

              $consulta = mysql_query("SELECT * FROM agendamentos WHERE matricula_aluno LIKE '$s_matricula'");
              $conta = mysql_num_rows($consulta);

              if($conta == 0){
                echo '<div class="alert alert-danger">
                        <p>NENHUM AGENDAMENTO CADASTRADO!</p>
                      </div>';


                // ESCOLHA DO MÊS
                echo '<div class="col-md-2"></div>
                      <div class="col-md-2">
                        <div class="box box-primary">
                          <div class="box-header">
                            <h3 class="box-title" style="margin-left: 55px;">Mês</h3>
                          </div> ';

                          echo '
                            <select class="form-control">
                            	<option selected disabled>Escolha o Mês</option>
	                            <option value="01" onclick="buscarData(this.value)">Janeiro</option>
	                            <option value="02" onclick="buscarData(this.value)">Fevereiro</option>
	                            <option value="03" onclick="buscarData(this.value)">Março</option>
	                            <option value="04" onclick="buscarData(this.value)">Abril</option>
	                            <option value="05" onclick="buscarData(this.value)">Maio</option>
	                            <option value="06" onclick="buscarData(this.value)">Junho</option>
	                            <option value="07" onclick="buscarData(this.value)">Julho</option>
	                            <option value="08" onclick="buscarData(this.value)">Agosto</option>
	                            <option value="09" onclick="buscarData(this.value)">Setembro</option>
	                            <option value="10" onclick="buscarData(this.value)">Outubro</option>
	                            <option value="11" onclick="buscarData(this.value)">Novembro</option>
	                            <option value="12" onclick="buscarData(this.value)">Dezembro</option>
                            </select>
                          ';  
      
                echo '</div>';
                
              // SE O ALUNO JÁ TIVER REALIZADO O AGENDAMENTO, MOSTRAR O MESMO 
              } else if($conta != 0){
                echo '<div class="alert alert-success">
                        <p>VOCÊ JÁ POSSUI UM AGENDAMENTO CADASTRADO!</p>
                      </div>';

                echo '<div class="col-md-12">
                      <br>
                <div class="box box-primary">
                  <div class="box-header">
                    <h3 class="box-title">Seu Agendamento</h3>
                  </div>';


             echo'<div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                      <tr>
                        <th>Nº AGENDAMENTO</th>
                        <th>MATRICULA_ALUNO</th>
                        <th>ALUNO</th>
                        <th>DATA</th> 
                        <th>HORA</th>
                        <th></th>
                      </tr>';

            $matricula = $_SESSION['sesaomatricula'];
            $sql = mysql_query("SELECT * FROM agendamentos WHERE matricula_aluno LIKE '$matricula'");
            $noticias = mysql_fetch_array($sql);
            echo utf8_encode('<form action="" method="POST" name="form" id="form" onSubmit="" target="_blank">
                      <tr>
                        <td style="text-align: center;">'.$noticias['id_agendamento'].'</td>
                        <td>'.$noticias['matricula_aluno'].'</td>
                        <td>'.$noticias['nome_aluno'].'</td>
                        <td>'.$noticias['data'].'</td>
                        <td>'.$noticias['hora'].'</td>

                        <input type="hidden" name="id_agendamento" value="'.$noticias['id_agendamento'].'">
                        <input type="hidden" name="matricula_aluno" value="'.$noticias['matricula_aluno'].'">
                        <input type="hidden" name="nome_aluno" value="'.$noticias['nome_aluno'].'">
                        <input type="hidden" name="data" value="'.$noticias['data'].'">
                        <input type="hidden" name="hora" value="'.$noticias['hora'].'">

                         <td>
                         <input type="submit" name="btn_cancelar" style="margin-right: 10px;" class="btn btn-danger pull-right" value="CANCELAR" onClick="Enviar(1);"> 
                        <input type="submit" name="btn_gerar" style="margin-right: 10px;" class="btn btn-success pull-right" value="IMPRIMIR" onClick="Enviar(2);">
                        </td> 
                      </tr>');
            }
               echo '</form>
                    </table>
                </div>
                ';
          ?>        
          
            <!-- xxxxxxxxxxxxxxxxxxxxx -->       
            <div id="resultado"></div>
            <div id="resultado2"></div>
            <!-- xxxxxxxxxxxxxxxxxxxx -->
          
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
<script src="../plugins/jQuery/jQuery-2.2.0.min.js"></script>
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
