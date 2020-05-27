<?php 
require('../../../conn.php');
mysql_select_db('estagios');
session_start();
  $matricula = $_SESSION['sesaomatricula'];
  $cpf = $_SESSION['sesaocpf'];

  $sesao=mysql_query("SELECT*FROM usuarios_agencia where login like '$matricula' and senha like '$cpf'");
  $resulti=mysql_num_rows($sesao);

  if($resulti==0){header('location:http://www.estagios.ufc.br/siges/public_html/');}
  
  $sql=mysql_fetch_array($sesao);
  $nome=$sql['nome'];
  $funcao=$sql['funcao'];
  $foto=$sql['perfil'];

   ?>
   
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Ag&ecirc;ncia de Est&aacute;gio | Termo de Compromisso</title>


<!--   <link rel="shortcut icon" href="images/ico/icon.png">
  <!-- Tell the browser to be responsive to screen width -->
  <!-- <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../../plugins/datepicker/datepicker3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../../plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../../plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../../plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../../dist/css/style.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

       
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/iCheck/flat/blue.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <link href="http://harvesthq.github.io/chosen/chosen.css" rel="stylesheet"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
  <script src="http://harvesthq.github.io/chosen/chosen.jquery.js"></script>
  
  <!-- AUTO COMPLETE - JQUERY UI -->
  <link type="text/css" href="css/jquery-ui-1.8.5.custom.css" rel="stylesheet"/>
  <script type="text/javascript" src="../../plugins/jQuery/jQuery-2.2.0.min.js"></script>
  <script type="text/javascript" src="../../plugins/jQueryUI/jquery-ui.min.js"></script>

  <!-- CONFLITOS DE PLUGINS
  <script src="js/jquery-1.4.2.min.js" type="text/javascript"></script>
  <script src="js/jquery-ui-1.8.5.custom.min.js" type="text/javascript"></script> -->

   <script>
   function siim() {
      var mudar = document.getElementById("nome").style.display = 'none';
      var mudar = document.getElementById("dasinp").style.display = 'block';
      var mudar = document.getElementById("input1").disabled = true;
      var mudar = document.getElementById("busca").style.display = 'none';
      var mudar = document.getElementById("conteudo").style.display = 'block';
      var mudar = document.getElementById("td").style.display = 'block';
      var mudar = document.getElementById("btn_adc").style.display = 'block';
      var mudar = document.getElementById("dasinp1").style.display = 'block';


    }

    function abreResposta(formulario) {
      window.open("_blank","novaJanela","......"); 
      formulario.target = 'novaJanela';
      return true;      
     }


    function completar(){
      $(document).ready(function()
    {
      $('#desabilitar2').autocomplete(
      {
        source: "search.php",
        minLength: 1
      });

    });
    }
    function completar_con_aluno(){
      $(document).ready(function()
    {
      $('#aluno').autocomplete(
      {
        source: "search_consulta_aluno.php",
        minLength: 1
      });

    });
    }

  </script>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="../../brasao.png"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><strong>CLICK<i class="fa fa-caret-left"></i></strong> Est&aacute;gios</span>
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
          <img src="perfil/<?php echo $foto; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $nome; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php include 'barra_menu.php'; ?>
    </section>
    <!-- /.sidebar -->
  </aside>
    <div class="content-wrapper">
        <div class="content">
          <div class="row">
              <div class="col-md-12">
                  <section class="content">
                    <form action="acao_tce_s.php" enctype="multipart/form-data" method="POST">
<?php
// Verifica a ação do butão //
if(isset($_POST['btnqnt'])){

$valor = utf8_decode($_POST['aluno2']);
 
// Procura titulos no banco relacionados ao valor //
$sql = mysql_query("SELECT * FROM alunos WHERE nome LIKE '$valor' or matricula LIKE '$valor' GROUP BY nome");

  //realiza uma contagem dos alunos //
  $resultado = mysql_num_rows($sql);

    // Verifica se a contagem de '$resultado' é diferente de zero, se for exibe os formulários //
    if($resultado != 0){
  
      //transforma o registro do aluno em objeto //
      $noticias = @mysql_fetch_object($sql);
      
      //armazena o registro da coluna matricula na variavel $matricula //
      $matricula = $noticias->matricula;

          $sql0 = mysql_query("SELECT * FROM alunos WHERE matricula like '$matricula' ");
          $noticias0 = @mysql_fetch_object($sql0);

          // Procura titulos na tabela termo_compromisso relacionados ao valor da matricula do aluno //
          $sql1 = mysql_query("SELECT * FROM termo_compromisso WHERE matricula_aluno LIKE '$matricula' ORDER BY id_termo_compromisso DESC");
      
            //transforma o registro do termo de compromisso do aluno em objeto //
            $noticias1 = @mysql_fetch_object($sql1);

            //realiza uma contagem dos TCEs do aluno //
            $resultado1 = mysql_num_rows($sql1);

                //Formulário com os dados do Aluno //
                echo '<div class="box box-primary" id="dados" style="display: block;">
                              <div class="form-group">
                                <div class="box-header with-border">
                                  <div class="box-body">
                                      <h3 class="box-title">Dados do Aluno</h3>

                                      <div id="dasinp" style="display:block">';
                echo utf8_encode('<br><div class="form-group">
                            
                            <div class="input-group">
                              <div class="input-group-addon">
                              <i class="fa fa-user-plus"></i>
                              </div>
                              <input type="text" id="habilitar" onclick="alterar();" class="form-control" name="nm" value="'.$noticias0->nome.'" placeholder="Nome do Aluno" disabled>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" id="habilitar1" name="cpf" onclick="alterar();"  onkeypress="mascara( this, mcpf );" class="form-control" value="'.$noticias0->cpf.'" placeholder="cpf" disabled>
                            </div>
                          </div>
                          <div class="form-group">
                              <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" id="habilitar2" name="rg"  onclick="alterar();" class="form-control" value="'.$noticias0->rg.'" placeholder="RG" disabled>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                                </div>
                                <input type="email" id="habilitar3" name="email"  onclick="alterar();" class="form-control" value="'.$noticias0->email.'" placeholder="E-MAIL" disabled>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-exclamation-triangle"></i>
                                </div>
                                <input type="text" id="habilitar4" class="form-control" name="matricula" value="'.$noticias0->matricula.'"  placeholder="Nº matricula" disabled>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-user-plus"></i>
                                </div>
                                <select class="form-control select2" id="habilitar5" name="curso" style="width: 100%;" disabled><option>'.$noticias0->curso.'</option>');

                          //Seleciona todos os dados da tabela curso em ordem alfabética crescente //
                          $sql4 = mysql_query("SELECT * FROM cursos order by curso ASC");

                          //Estrutura de repetição: enquanto existirem registros na tabela curso referentes a consulta, estes serão impressos. Obs: São armazenados na variavel $resultado4 //
                          while($resultado4=mysql_fetch_object($sql4)){
                            echo utf8_encode('<option>'.$resultado4->curso.'</option>');
                          }   
  
              echo utf8_encode('</select>
                              </div>
                            </div>
                             <div class="form-group">
                              <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-user-plus"></i>
                                </div>
                             <select class="form-control select2" id="habilitargrupo" name="grupo" style="width: 100%;" disabled>'); 
                                            //Seleciona todos os dados da tabela 'permissoes_grupo' que 'matricula_aluno' forem iguais à variável '$noticias->matricula' //
                                            $grupo1 = mysql_query("SELECT * FROM permissoes_grupo WHERE matricula_aluno LIKE '$noticias->matricula'");

                                            // Armazenna em '$grupo2' um object da consulta anterior //
                                            $grupo2 = mysql_fetch_object($grupo1);

                                            $noticias3 = $grupo2->grupo; 

                                              // Lista através de opções, os resultados encontrados //
                                              echo utf8_encode('<option value="'.$noticias3.'">'.$noticias3.'</option>'); 

                                            //Seleciona todos os dados da tabela 'grupo_vagas' em ordem decrescente de acordo com a coluna 'descrição_grupo' //
                                            $consulta2 = mysql_query("SELECT * FROM grupo_vagas ORDER BY descricao_grupo ASC");

                                            // Realiza uma contagem dos resultados da consulta anterior //
                                            $result2 = mysql_num_rows($consulta2);

                                            //Estrutura de repetição: enquanto existirem registros na tabela 'grupo_vagas' referentes a consulta, estes serão impressos //
                                            while ($sql2 = mysql_fetch_array($consulta2)) {
                                              $descricao_grupo = $sql2['descricao_grupo'];

                                              echo utf8_encode('<option value="'.$descricao_grupo.'">'.$descricao_grupo.'</option>');
                                            }
  
          echo utf8_encode('</select>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-exclamation-triangle"></i>
                            </div>');

       echo utf8_encode(' <input type="textarea" id="obs" onclick="alterar();" class="form-control" name="obs" value="'.$noticias1->obs.'"  placeholder="Nenhuma Observação" disabled>');
        echo utf8_encode('</div>
                      </div>
                      <input type="hidden" name="cd_aluno" value="'.$noticias0->id_aluno.'">
                      <input type="hidden" name="mt_old" value="'.$noticias0->matricula.'">
                    </div>
                  </div>
                </div>
              </div>
            </div>') ;



  // Armazenamento da quantidade de termos à serem cadastrados na variável '$valor1' //
  $valor1=$_POST['qnt'];

  echo utf8_encode('      

                  <div class="box box-primary">
                    <div class="box-header">
                      <h3 class="box-title">Adicionar Termos de Compromisso</h3>
                   
                      <div id="adc" style="display:block;" class="box-body table-responsive no-padding">
                        <div class="row">
                        
                          <div class="col-xs-12">
                            
                              <table class="table table-hover">
                                <tr>
                                  <th>VALOR_BOLSA</th>
                                  <th>CONCEDENTE/EMPRESA</th>
                                  <th>SETOR_UFC</th>
                                  <th>DATA_INICIO</th>
                                  <th>DATA_TERMINO</th> 
                                  <th>RESCISÃO_DO_TCE</th>
                                  <th>CARGA_HORARIA</th>
                                  <th>HORA_ENTRADA</th>
                                  <th>HORA_SAIDA</th>
                                  <th>HORARIO_VARIADO</th>
                                  <th>TIPO_DE_TERMO</th>
                                  <th>CLASSIFICAÇÃO_DO_TERMO</th>
                                  <th>RELATORIO_SEMESTRAL</th>
                                  <th>DATA_RELATORIO 01</th>
                                  <th>DATA_RELATORIO 02</th>
                                  <th>DATA_RELATORIO 03</th>
                                  <th>DATA_RELATORIO 04</th>
                                  <th>AGENTE_DE_INTEGRAÇÂO</th>
                                  <th>PROF.ORIENTADOR</th>
                                  <th>SIAPE</th>
                                  <th>ARQUIVO</th>
                                  <th>OBSERVAÇÃO</th>
                                </tr>
                                ');

                            $x="1";
                            for($i = $valor1; $i > 0; $i--){
                                   
                                
                          echo ' <tr>
                                  <div class="col-xs-6">
                                    <td><input type="text" id="desabilitar1" class="form-control" name="valor_n'.$x++.'" placeholder="R$ 000.00" onkeypress="mascara( this, mvalor );" maxlength="14" required></td>
                                  </div>
                                  <td>
                                  <div class="col-xs-6">
                                    <select class="form-control select2" id="desabilitar2" name="concedente_n'.$x++.'"  style="width: 450px;">
                                    <option type="text"></option>';
                                   
                                    $sql20 = mysql_query("SELECT * FROM empresas ORDER BY nome ASC");
                                    
                                    while($resultado20 = @mysql_fetch_object($sql20)){
                                       echo utf8_encode('<option value="'.$resultado20->CD_EMPRESA.'">'.$resultado20->nome.'</option>');
                                    }
                      
                               echo'</select> 
                                     </div>
                                        </td>  
                                        <td>
                                        <div class="form-group">
                                           <select class="form-control select2" id="desabilitarsetor" name="setor_n'.$x++.'"  style="width: 200px;">
                                              <option selected="selected"></option>';
                                             
                                              $sql10 = mysql_query("SELECT * FROM Setor ORDER BY nome_setor ASC");
                                              
                                              while($resultado10 = @mysql_fetch_object($sql10)){
                                                 echo utf8_encode('<option value="'.$resultado10->id_setor.'">'.$resultado10->nome_setor.'</option>');
                                              }
                                
                                      echo '</select> 
                                        </div>
                                    </td>
                                      <div class="col-xs-6">
                                        <td><input type="text" id="desabilitar3" class="form-control" name="dt_ini_n'.$x++.'" placeholder="00-00-0000" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" required></td>
                                      </div>
                                      <div class="col-xs-6">
                                        <td><input type="text" id="desabilitar4" class="form-control" name="dt_fim_n'.$x++.'" placeholder="00-00-0000" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" required></td>
                                      </div>
                                      <div class="col-xs-6">
                                        <td><input type="text" id="desabilitar5" class="form-control" name="rescisao_n'.$x++.'" placeholder="00-00-0000" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" ></td>
                                      </div>
                                      <div class="col-xs-2">
                                        <td><input type="text" id="desabilitar9" class="form-control" name="carga_hrr_n'.$x++.'" placeholder="00 hs" required></td>
                                      </div>
                                      <div class="col-xs-6">
                                        <td><input type="text" id="desabilitar6" class="form-control" name="hr_ini_n'.$x++.'" placeholder="00:00" id="hora" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" ></td>
                                      </div>
                                      <div class="col-xs-6">
                                        <td><input type="text" id="desabilitar7" class="form-control" name="hr_fim_n'.$x++.'" placeholder="00:00" id="hora" OnKeypress="mascara(this, mhora)" size="5" maxlength="5"></td>
                                      </div>
                                      <td>
                                        <div class="form-group">
                                          <select class="form-control select2" id="desabilitar8" name="variavel_n'.$x++.'" style="width: 100%;" required>
                                            <option selected="selected"></option>
                                            <option>SIM</option>
                                            <option>NÃO</option>
                                          </select>
                                        </div>
                                      </td>
                                      <div class="col-xs-6">
                                        <td>
                                          <div class="form-group">
                                            <select class="form-control select2" id="desabilitar10" name="tp_termo_n'.$x++.'" style="width: 100%;" required>
                                              <option selected="selected"></option>
                                              <option>T.A</option>
                                              <option>T.C</option>
                                            </select>
                                          </div>
                                        </td>
                                      </div>
                                      <td>
                                        <div class="form-group">
                                          <select class="form-control select2" id="desabilitar11"  name="cl_termo_n'.$x++.'" style="width: 100%;" required>
                                            <option selected="selected"></option>
                                            <option>OBRIGATORIO</option>
                                            <option>NÃO OBRIGATORIO</option>
                                          </select>
                                        </div>
                                      </td>
                                      <td> 
                                        <div class="form-group">
                                          <select class="form-control select2" id="desabilitar12" name="relatorio_n'.$x++.'" style="width: 100%;" required>
                                            <option selected="selected"></option>
                                            <option>SIM</option>
                                            <option>NÃO</option>
                                          </select>
                                        </div>
                                      </td>
                                      <div class="col-xs-6">
                                        <td><input type="text" id="desabilitar15" class="form-control" name="data_relatorio_1'.$x++.'" placeholder="00-00-0000" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" ></td>
                                      </div>
                                      <div class="col-xs-6">
                                        <td><input type="text" id="desabilitar15" class="form-control" name="data_relatorio_2'.$x++.'" placeholder="00-00-0000" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" ></td>
                                      </div>
                                      <div class="col-xs-6">
                                        <td><input type="text" id="desabilitar15" class="form-control" name="data_relatorio_3'.$x++.'" placeholder="00-00-0000" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" ></td>
                                      </div>
                                      <div class="col-xs-6">
                                        <td><input type="text" id="desabilitar15" class="form-control" name="data_relatorio_4'.$x++.'" placeholder="00-00-0000" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" ></td>
                                      </div>
                                      <td>
                                        <div class="form-group">
                                          <select class="form-control select2" id="desabilitar13" name="agente_n'.$x++.'" style="width: 100%;" required>
                                            <option selected="selected"></option>';
                                           
                                            // Seleciona Todos os Registros da tabela 'Agentes'
                                            $sql5 = mysql_query("SELECT * FROM agentes");
                                            
                                            //Estrutura de repetição: enquanto existirem registros na tabela 'agentes' referentes a consulta, estes serão impressos. Obs: São armazenados na variavel $resultado5
                                            while($resultado5=mysql_fetch_object($sql5)){
                                               echo utf8_encode('<option value="'.$resultado5->CD_AGENTE.'">'.$resultado5->NM_AGENTE.'</option>');
                                            }
                                    
                                    echo '</select>
                                        </div>
                                      </td>
                                      <div class="col-xs-6">
                                        <td><input type="text" id="desabilitar14" class="form-control" name="prof_n'.$x++.'" placeholder="Prof. Orientador" required></td>
                                      </div>
                                      <div class="col-xs-6">
                                        <td><input type="number" id="desabilitar16" class="form-control" name="siape'.$x++.'" placeholder="SIAPE" style="width:150px;" required></td>
                                        <td><input name="pdf'.$x++.'" id="desabilitar17" class="realupload" type="file" id="arquivo_file" accept=”image/*”/></td>
                                        <td><input type="text" style="width:450px" id="desabilitar18" class="form-control" name="obs'.$x++.' " placeholder="Observacao"></td>
                                      </div>
                                      <input type="hidden" class="form-control" name="id_aluno" value="'.$noticias0->matricula.'">
                                    </tr>';
                            }  
                          echo'  </table>
                                </div>
                              </div>
                            </div>
                            <button type="submit" id="btn_cdt" class="btn btn-primary pull-right" name="cdt_tces" value="cadastrar" style="display:Block; margin:15px;"> Cadastrar </button>';

                            // Esta input serve para armazenar novamente a quantidade de termos, para que possa ser reutilizada durante a inserção no banco de dados //
                      echo '<input type="hidden" class="form-control" name="quant" value="'.$valor1.'">
                          </div>
                        </div>';

    }
    // Se o resultado da consulta '$sql' for IGUAL à zero o comando a seguir será executado //
    if ($resultado == 0) {
        echo utf8_encode('
                   <div class="note2 note-danger2"><h4 class="box-heading2"><Strong><font color="red">AVISO! </font></Strong></h4>
                   <p><font color="red">Nenhum Registro Encontrado.</font></p>
                   <a href="termo_compromisso.php"><button type="button" class="btn btn-danger pull-right">Cancelar</button></a>
                   </div>');
    } 
}
?>            </form>
            </section>
          </div>
        </div>
      </div>
    </div>

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Vers&atilde;o</b> 2.0
    </div>
    <strong>Copyright &copy; 2017 <a href="http://ufc.br">UFC</a> - Ag&ecirc;ncia de Est&aacute;gio</strong> Todos os direitos reservados.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recente atividades.</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Proximo Aniversario</h4>

                <p>Raynna - 22/04/2017</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cadastro de termo</h4>

                <p>Henrique Luiz - TCE (OBRIGATÓRIO).</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Email enviado</h4>

                <p>dora@example.com - resposta</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Declaração feita</h4>

                <p>Terminou estágio</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab"></div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">Configurações gerais</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              O uso do painel de relatório
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Algumas informações sobre esta opção de configurações gerais
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Permitir redirecionamento de correio
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Outros conjuntos de opções estão disponíveis
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expor o nome do autor em postos
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
             Permitir que o usuário para mostrar o seu nome nas postagens do blog
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Configurações de bate-papo</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Mostre-me como on-line
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Desligar notificações
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <div class="form-group">
            <label class="control-sidebar-subheading">
              Excluir o histórico de bate-papo
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 
<script src="../../plugins/jQuery/jQuery-2.2.0.min.js"></script> -->

<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../../plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<!-- <script src="../../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script> -->
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../../plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../../plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<!-- <script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script> -->
<!-- iCheck 1.0.1 -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>

<script src="../../dist/js/funcs_tce.js"></script>
<!-- Page script -->
<script src="../../dist/js/funcs_atualizar_tce.js"></script>

<script src="../../dist/js/funcs_ex_tce.js"></script>


<script src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
 
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
