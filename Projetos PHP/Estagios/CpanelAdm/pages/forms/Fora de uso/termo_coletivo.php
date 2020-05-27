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
  <title>Agência de Estágio | Termo de Compromisso</title>


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
    function adc_aluno(){
      var up = document.getElementById("adc_aluno").style.display = 'block';
       var up = document.getElementById("adc_aluno_externo").style.display = 'none';
    }
    function des_aluno(){
      var up = document.getElementById("adc_aluno").style.display = 'none';
      var up = document.getElementById("adc_aluno_externo").style.display = 'none';
    }
    function adc_aluno_ex(){
      var up = document.getElementById("adc_aluno_externo").style.display = 'block';
       var up = document.getElementById("adc_aluno").style.display = 'none';
    }
    function des_aluno_ex(){
      var up = document.getElementById("adc_aluno_externo").style.display = 'none';
      var up = document.getElementById("adc_aluno").style.display = 'none';
    }
    function alterar(){
      var up = document.getElementById("btn_02").style.display = 'block';
      var up = document.getElementById("btn_03").style.display = 'block';
      var up = document.getElementById("btn_01").style.display = 'none';
      var up = document.getElementById("habilitar").disabled = false;
      var up = document.getElementById("habilitar1").disabled = false;
      var up = document.getElementById("habilitar2").disabled = false;
      var up = document.getElementById("habilitar3").disabled = false;
      var up = document.getElementById("habilitar4").disabled = false;
      var up = document.getElementById("habilitar5").disabled = false;
      var up = document.getElementById("obs").disabled = false;
      var up = document.getElementById("desabilitar1").disabled = true;
      var up = document.getElementById("desabilitar2").disabled = true;
      var up = document.getElementById("desabilitar3").disabled = true;
      var up = document.getElementById("desabilitar4").disabled = true;
      var up = document.getElementById("desabilitar5").disabled = true;
      var up = document.getElementById("desabilitar6").disabled = true;
      var up = document.getElementById("desabilitar7").disabled = true;
      var up = document.getElementById("desabilitar8").disabled = true;
      var up = document.getElementById("desabilitar9").disabled = true;
      var up = document.getElementById("desabilitar10").disabled = true;
      var up = document.getElementById("desabilitar11").disabled = true;
      var up = document.getElementById("desabilitar12").disabled = true;
      var up = document.getElementById("desabilitar13").disabled = true;
      var up = document.getElementById("desabilitar14").disabled = true;
      var up = document.getElementById("desabilitar15").disabled = true;
      var up = document.getElementById("desabilitar16").disabled = true;
      var up = document.getElementById("desabilitar17").disabled = true;
      var up = document.getElementById("desabilitar18").disabled = true;        
    }
    function cancelar(){
      var up = document.getElementById("btn_02").style.display = 'none';
      var up = document.getElementById("btn_03").style.display = 'none';
      var up = document.getElementById("btn_01").style.display = 'block';
      var up = document.getElementById("habilitar").disabled = true;
      var up = document.getElementById("habilitar1").disabled = true;
      var up = document.getElementById("habilitar2").disabled = true;
      var up = document.getElementById("habilitar3").disabled = true;
      var up = document.getElementById("habilitar4").disabled = true;
      var up = document.getElementById("habilitar5").disabled = true;
      var up = document.getElementById("obs").disabled = true;
      var up = document.getElementById("desabilitar1").disabled = false;
      var up = document.getElementById("desabilitar2").disabled = false;
      var up = document.getElementById("desabilitar3").disabled = false;
      var up = document.getElementById("desabilitar4").disabled = false;
      var up = document.getElementById("desabilitar5").disabled = false;
      var up = document.getElementById("desabilitar6").disabled = false;
      var up = document.getElementById("desabilitar7").disabled = false;
      var up = document.getElementById("desabilitar8").disabled = false;
      var up = document.getElementById("desabilitar9").disabled = false;
      var up = document.getElementById("desabilitar10").disabled = false;
      var up = document.getElementById("desabilitar11").disabled = false;
      var up = document.getElementById("desabilitar12").disabled = false;
      var up = document.getElementById("desabilitar13").disabled = false;
      var up = document.getElementById("desabilitar14").disabled = false;
      var up = document.getElementById("desabilitar15").disabled = false;
      var up = document.getElementById("desabilitar16").disabled = false;
      var up = document.getElementById("desabilitar17").disabled = false;
      var up = document.getElementById("desabilitar18").disabled = false;
    }
    function adc(){
      var mudar = document.getElementById("btn_adc").style.display = 'none';  
      var mudar = document.getElementById("adc").style.display = 'block';  
      var mudar = document.getElementById("btn_cdt").style.display = 'block'; 
      var mudar = document.getElementById("btn_cancelar").style.display = 'block'; 
    } 
    function valor(){
      var a = document.getElementById("valor").value;
    }
    function cancelar2(){
      var mudar = document.getElementById("btn_adc").style.display = 'block';  
      var mudar = document.getElementById("adc").style.display = 'none';  
      var mudar = document.getElementById("btn_cdt").style.display = 'none';
      var mudar = document.getElementById("btn_cancelar").style.display = 'none';
    }

    function adc_0(){
      var mudar = document.getElementById("btn_0").style.display = 'none';  
      var mudar = document.getElementById("div_1").style.display = 'block';  
      var mudar = document.getElementById("btn_1").style.display = 'block';
      var mudar = document.getElementById("btn_limpar1").style.display = 'none';
    }
    function adc_1(){
      var mudar = document.getElementById("btn_1").style.display = 'none';  
      var mudar = document.getElementById("div_2").style.display = 'block';  
      var mudar = document.getElementById("btn_2").style.display = 'block';
      var mudar = document.getElementById("btn_limpar2").style.display = 'none';
    }
    function adc_2(){
      var mudar = document.getElementById("btn_2").style.display = 'none';  
      var mudar = document.getElementById("div_3").style.display = 'block';  
      var mudar = document.getElementById("btn_3").style.display = 'block';
      var mudar = document.getElementById("btn_limpar3").style.display = 'none';
    }
    function adc_3(){
      var mudar = document.getElementById("btn_3").style.display = 'none';  
      var mudar = document.getElementById("div_4").style.display = 'block';  
      var mudar = document.getElementById("btn_4").style.display = 'block';
      var mudar = document.getElementById("btn_limpar4").style.display = 'none';
    }
    function adc_4(){
      var mudar = document.getElementById("btn_4").style.display = 'none';  
      var mudar = document.getElementById("div_5").style.display = 'block';  
      var mudar = document.getElementById("btn_5").style.display = 'block';
      var mudar = document.getElementById("btn_limpar5").style.display = 'none';
    }
    function adc_5(){
      var mudar = document.getElementById("btn_5").style.display = 'none';  
      var mudar = document.getElementById("div_6").style.display = 'block';  
      var mudar = document.getElementById("btn_6").style.display = 'block';
      var mudar = document.getElementById("btn_limpar6").style.display = 'none';
    }
    function adc_6(){
      var mudar = document.getElementById("btn_6").style.display = 'none';  
      var mudar = document.getElementById("div_7").style.display = 'block';  
      var mudar = document.getElementById("btn_7").style.display = 'block';
      var mudar = document.getElementById("btn_limpar7").style.display = 'none';
    }
    function adc_7(){
      var mudar = document.getElementById("btn_7").style.display = 'none';  
      var mudar = document.getElementById("div_8").style.display = 'block';  
      var mudar = document.getElementById("btn_8").style.display = 'block';
      var mudar = document.getElementById("btn_limpar8").style.display = 'none';
    }
    function adc_8(){
      var mudar = document.getElementById("btn_8").style.display = 'none';  
      var mudar = document.getElementById("div_9").style.display = 'block';  
      var mudar = document.getElementById("btn_9").style.display = 'block';
      var mudar = document.getElementById("btn_limpar9").style.display = 'none';
    }
    function adc_9(){
      var mudar = document.getElementById("btn_9").style.display = 'none';  
      var mudar = document.getElementById("div_10").style.display = 'block';  
      var mudar = document.getElementById("btn_10").style.display = 'block';
      var mudar = document.getElementById("btn_limpar10").style.display = 'none';
    }
    function adc_10(){
      var mudar = document.getElementById("btn_10").style.display = 'none';  
      var mudar = document.getElementById("div_11").style.display = 'block';  
      var mudar = document.getElementById("btn_11").style.display = 'block';
      var mudar = document.getElementById("btn_limpar11").style.display = 'none';
    }
    function adc_11(){
      var mudar = document.getElementById("btn_11").style.display = 'none';  
      var mudar = document.getElementById("div_12").style.display = 'block';  
      var mudar = document.getElementById("btn_12").style.display = 'block';
      var mudar = document.getElementById("btn_limpar12").style.display = 'none';
    }
    function adc_12(){
      var mudar = document.getElementById("btn_12").style.display = 'none';  
      var mudar = document.getElementById("div_13").style.display = 'block';  
      var mudar = document.getElementById("btn_13").style.display = 'block';
      var mudar = document.getElementById("btn_limpar13").style.display = 'none';
    }
    function adc_13(){
      var mudar = document.getElementById("btn_13").style.display = 'none';  
      var mudar = document.getElementById("div_14").style.display = 'block';  
      var mudar = document.getElementById("btn_14").style.display = 'block';
      var mudar = document.getElementById("btn_limpar14").style.display = 'none';
    }
    function adc_14(){
      var mudar = document.getElementById("btn_14").style.display = 'none';  
      var mudar = document.getElementById("div_15").style.display = 'block';  
      var mudar = document.getElementById("btn_15").style.display = 'block';
      var mudar = document.getElementById("btn_limpar15").style.display = 'none';
    }
    function adc_15(){
      var mudar = document.getElementById("btn_15").style.display = 'none';  
      var mudar = document.getElementById("div_16").style.display = 'block';  
      var mudar = document.getElementById("btn_16").style.display = 'block';
      var mudar = document.getElementById("btn_limpar16").style.display = 'none';
    }
    function adc_16(){
      var mudar = document.getElementById("btn_16").style.display = 'none';  
      var mudar = document.getElementById("div_17").style.display = 'block';  
      var mudar = document.getElementById("btn_17").style.display = 'block';
      var mudar = document.getElementById("btn_limpar17").style.display = 'none';
    }
    function adc_17(){
      var mudar = document.getElementById("btn_17").style.display = 'none';  
      var mudar = document.getElementById("div_18").style.display = 'block';  
      var mudar = document.getElementById("btn_18").style.display = 'block';
      var mudar = document.getElementById("btn_limpar18").style.display = 'none';
    }
    function adc_18(){
      var mudar = document.getElementById("btn_18").style.display = 'none';  
      var mudar = document.getElementById("div_19").style.display = 'block';  
      var mudar = document.getElementById("btn_19").style.display = 'block';
      var mudar = document.getElementById("btn_limpar19").style.display = 'none';
    }
    function adc_19(){
      var mudar = document.getElementById("btn_19").style.display = 'none';  
      var mudar = document.getElementById("div_20").style.display = 'block';  
      var mudar = document.getElementById("btn_20").style.display = 'block';
      var mudar = document.getElementById("btn_limpar20").style.display = 'none';
    }
    function adc_20(){
      var mudar = document.getElementById("btn_20").style.display = 'none';  
      var mudar = document.getElementById("div_21").style.display = 'block';  
      var mudar = document.getElementById("btn_21").style.display = 'block';
      var mudar = document.getElementById("btn_limpar21").style.display = 'none';
    }
    function adc_21(){
      var mudar = document.getElementById("btn_21").style.display = 'none';  
      var mudar = document.getElementById("div_22").style.display = 'block';  
      var mudar = document.getElementById("btn_22").style.display = 'block';
      var mudar = document.getElementById("btn_limpar22").style.display = 'none';
    }
    function adc_22(){
      var mudar = document.getElementById("btn_22").style.display = 'none';  
      var mudar = document.getElementById("div_23").style.display = 'block';  
      var mudar = document.getElementById("btn_23").style.display = 'block';
      var mudar = document.getElementById("btn_limpar23").style.display = 'none';
    }
    function adc_23(){
      var mudar = document.getElementById("btn_23").style.display = 'none';  
      var mudar = document.getElementById("div_24").style.display = 'block';  
      var mudar = document.getElementById("btn_24").style.display = 'block';
      var mudar = document.getElementById("btn_limpar24").style.display = 'none';
    }
    function adc_24(){
      var mudar = document.getElementById("btn_24").style.display = 'none';  
      var mudar = document.getElementById("div_25").style.display = 'block';  
      var mudar = document.getElementById("btn_25").style.display = 'block';
      var mudar = document.getElementById("btn_limpar25").style.display = 'none';
    }
    function adc_25(){
      var mudar = document.getElementById("btn_25").style.display = 'none';  
      var mudar = document.getElementById("div_26").style.display = 'block';  
      var mudar = document.getElementById("btn_26").style.display = 'block';
      var mudar = document.getElementById("btn_limpar26").style.display = 'none';
    }
    function adc_26(){
      var mudar = document.getElementById("btn_26").style.display = 'none';  
      var mudar = document.getElementById("div_27").style.display = 'block';  
      var mudar = document.getElementById("btn_27").style.display = 'block';
      var mudar = document.getElementById("btn_limpar27").style.display = 'none';
    }
    function adc_27(){
      var mudar = document.getElementById("btn_27").style.display = 'none';  
      var mudar = document.getElementById("div_28").style.display = 'block';  
      var mudar = document.getElementById("btn_28").style.display = 'block';
      var mudar = document.getElementById("btn_limpar28").style.display = 'none';
    }
    function adc_28(){
      var mudar = document.getElementById("btn_28").style.display = 'none';  
      var mudar = document.getElementById("div_29").style.display = 'block';  
      var mudar = document.getElementById("btn_29").style.display = 'block';
      var mudar = document.getElementById("btn_limpar29").style.display = 'none';
    }
    function adc_29(){
      var mudar = document.getElementById("btn_29").style.display = 'none';  
      var mudar = document.getElementById("div_30").style.display = 'block';  
      var mudar = document.getElementById("btn_30").style.display = 'block';
      var mudar = document.getElementById("btn_limpar30").style.display = 'none';
    }
    function adc_30(){
      var mudar = document.getElementById("btn_30").style.display = 'none';  
      var mudar = document.getElementById("div_31").style.display = 'block';  
      var mudar = document.getElementById("btn_31").style.display = 'block';
      var mudar = document.getElementById("btn_limpar31").style.display = 'none';
    }
    function adc_31(){
      var mudar = document.getElementById("btn_31").style.display = 'none';  
      var mudar = document.getElementById("div_32").style.display = 'block';  
      var mudar = document.getElementById("btn_32").style.display = 'block';
      var mudar = document.getElementById("btn_limpar32").style.display = 'none';
    }
    function adc_32(){
      var mudar = document.getElementById("btn_32").style.display = 'none';  
      var mudar = document.getElementById("div_33").style.display = 'block';  
      var mudar = document.getElementById("btn_33").style.display = 'block';
      var mudar = document.getElementById("btn_limpar33").style.display = 'none';
    }
    function adc_33(){
      var mudar = document.getElementById("btn_33").style.display = 'none';  
      var mudar = document.getElementById("div_34").style.display = 'block';  
      var mudar = document.getElementById("btn_34").style.display = 'block';
      var mudar = document.getElementById("btn_limpar34").style.display = 'none';
    }
    function adc_34(){
      var mudar = document.getElementById("btn_34").style.display = 'none';  
      var mudar = document.getElementById("div_35").style.display = 'block';  
      var mudar = document.getElementById("btn_35").style.display = 'block';
      var mudar = document.getElementById("btn_limpar35").style.display = 'none';
    }
    function adc_35(){
      var mudar = document.getElementById("btn_35").style.display = 'none';  
      var mudar = document.getElementById("div_36").style.display = 'block';  
      var mudar = document.getElementById("btn_36").style.display = 'block';
      var mudar = document.getElementById("btn_limpar36").style.display = 'none';
    }
    function adc_36(){
      var mudar = document.getElementById("btn_36").style.display = 'none';  
      var mudar = document.getElementById("div_37").style.display = 'block';  
      var mudar = document.getElementById("btn_37").style.display = 'block';
      var mudar = document.getElementById("btn_limpar37").style.display = 'none';
    }
    function adc_37(){
      var mudar = document.getElementById("btn_37").style.display = 'none';  
      var mudar = document.getElementById("div_38").style.display = 'block';  
      var mudar = document.getElementById("btn_38").style.display = 'block';
      var mudar = document.getElementById("btn_limpar38").style.display = 'none';
    }
    function adc_38(){
      var mudar = document.getElementById("btn_38").style.display = 'none';  
      var mudar = document.getElementById("div_39").style.display = 'block';  
      var mudar = document.getElementById("btn_39").style.display = 'block';
      var mudar = document.getElementById("btn_limpar39").style.display = 'block';
    }
    function limpar(){
      var mudar = document.getElementById("div_0").style.display = 'block';  
      var mudar = document.getElementById("btn_0").style.display = 'block';  
      var mudar = document.getElementById("div_1").style.display = 'none';  
      var mudar = document.getElementById("btn_1").style.display = 'none';
      var mudar = document.getElementById("div_2").style.display = 'none';  
      var mudar = document.getElementById("btn_2").style.display = 'none';
      var mudar = document.getElementById("div_3").style.display = 'none';  
      var mudar = document.getElementById("btn_3").style.display = 'none';
      var mudar = document.getElementById("div_4").style.display = 'none';  
      var mudar = document.getElementById("btn_4").style.display = 'none';
      var mudar = document.getElementById("div_5").style.display = 'none';  
      var mudar = document.getElementById("btn_5").style.display = 'none';
      var mudar = document.getElementById("div_6").style.display = 'none';  
      var mudar = document.getElementById("btn_6").style.display = 'none';
      var mudar = document.getElementById("div_7").style.display = 'none';  
      var mudar = document.getElementById("btn_7").style.display = 'none';
      var mudar = document.getElementById("div_8").style.display = 'none';  
      var mudar = document.getElementById("btn_8").style.display = 'none';
      var mudar = document.getElementById("div_9").style.display = 'none';  
      var mudar = document.getElementById("btn_9").style.display = 'none';
      var mudar = document.getElementById("div_10").style.display = 'none';  
      var mudar = document.getElementById("btn_10").style.display = 'none';
      var mudar = document.getElementById("div_11").style.display = 'none';  
      var mudar = document.getElementById("btn_11").style.display = 'none';
      var mudar = document.getElementById("div_12").style.display = 'none';  
      var mudar = document.getElementById("btn_12").style.display = 'none';
      var mudar = document.getElementById("div_13").style.display = 'none';  
      var mudar = document.getElementById("btn_13").style.display = 'none';
      var mudar = document.getElementById("div_14").style.display = 'none';  
      var mudar = document.getElementById("btn_14").style.display = 'none';
      var mudar = document.getElementById("div_15").style.display = 'none';  
      var mudar = document.getElementById("btn_15").style.display = 'none';
      var mudar = document.getElementById("div_16").style.display = 'none';  
      var mudar = document.getElementById("btn_16").style.display = 'none';
      var mudar = document.getElementById("div_17").style.display = 'none';  
      var mudar = document.getElementById("btn_17").style.display = 'none';
      var mudar = document.getElementById("div_18").style.display = 'none';  
      var mudar = document.getElementById("btn_18").style.display = 'none';
      var mudar = document.getElementById("div_19").style.display = 'none';  
      var mudar = document.getElementById("btn_19").style.display = 'none';
      var mudar = document.getElementById("div_20").style.display = 'none';  
      var mudar = document.getElementById("btn_20").style.display = 'none';
      var mudar = document.getElementById("div_21").style.display = 'none';  
      var mudar = document.getElementById("btn_21").style.display = 'none';
      var mudar = document.getElementById("div_22").style.display = 'none';  
      var mudar = document.getElementById("btn_22").style.display = 'none';
      var mudar = document.getElementById("div_23").style.display = 'none';  
      var mudar = document.getElementById("btn_23").style.display = 'none';
      var mudar = document.getElementById("div_24").style.display = 'none';  
      var mudar = document.getElementById("btn_24").style.display = 'none';
      var mudar = document.getElementById("div_25").style.display = 'none';  
      var mudar = document.getElementById("btn_25").style.display = 'none';
      var mudar = document.getElementById("div_26").style.display = 'none';  
      var mudar = document.getElementById("btn_26").style.display = 'none';
      var mudar = document.getElementById("div_27").style.display = 'none';  
      var mudar = document.getElementById("btn_27").style.display = 'none';
      var mudar = document.getElementById("div_28").style.display = 'none';  
      var mudar = document.getElementById("btn_28").style.display = 'none';
      var mudar = document.getElementById("div_29").style.display = 'none';  
      var mudar = document.getElementById("btn_29").style.display = 'none';
      var mudar = document.getElementById("div_30").style.display = 'none';  
      var mudar = document.getElementById("btn_30").style.display = 'none';
      var mudar = document.getElementById("div_31").style.display = 'none';  
      var mudar = document.getElementById("btn_31").style.display = 'none';
      var mudar = document.getElementById("div_32").style.display = 'none';  
      var mudar = document.getElementById("btn_32").style.display = 'none';
      var mudar = document.getElementById("div_33").style.display = 'none';  
      var mudar = document.getElementById("btn_33").style.display = 'none';
      var mudar = document.getElementById("div_34").style.display = 'none';  
      var mudar = document.getElementById("btn_34").style.display = 'none';
      var mudar = document.getElementById("div_35").style.display = 'none';  
      var mudar = document.getElementById("btn_35").style.display = 'none';
      var mudar = document.getElementById("div_36").style.display = 'none';  
      var mudar = document.getElementById("btn_36").style.display = 'none';
      var mudar = document.getElementById("div_37").style.display = 'none';  
      var mudar = document.getElementById("btn_37").style.display = 'none';
      var mudar = document.getElementById("div_38").style.display = 'none';  
      var mudar = document.getElementById("btn_38").style.display = 'none';
      var mudar = document.getElementById("div_39").style.display = 'none';  
      var mudar = document.getElementById("btn_39").style.display = 'none';
      var mudar = document.getElementById("btn_limpar").style.display = 'none';

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

      <!-- Main content -->
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <!--<div class="col-md-8">-->
            <section class="content">
              <!-- SELECT2 EXAMPLE -->
              <div class="box box-primary">
                <div class="form-group">
                  <div class="box-header with-border">
                    <div class="box-body">
                      <h3 class="box-title">Cadastrar Termo Coletivo</h3>

<?php
echo '<form action="acao_tcc.php" method="POST">';
echo '<div id="dasinp1" style="display:block">';
  echo utf8_encode('
                  <div class="col-md-12">
                    <div class="col-md-6">
                        
                        <br><label>Concedente</label>
                        <div class="form-group">
                          <select class="form-control select2" name="concedente_n" style="width: 100%;" required>');
                            $sql4 = mysql_query("SELECT * FROM empresas");
                                  
                            while ($noticias4 = @mysql_fetch_object($sql4)) {
                              echo utf8_encode('<option value="'.$noticias4->CD_EMPRESA.'" >'.$noticias4->nome.'</option>');}
                              echo utf8_encode('          
                          </select>
                        </div>
                        <label> Professor Orientador </label>
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                            <input type="text" id="inputName" class="form-control" name="prof_n" >
                          </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <br><label> Agente </label>
                        <div class="form-group">
                          <select class="form-control select2"  name="agente_n" style="width: 100%;" required>
                            <option selected="selected"></option>');
                              $sql5 = mysql_query("SELECT * FROM agentes");
                              while($resultado5=mysql_fetch_object($sql5)){
                                echo utf8_encode('<option value="'.$resultado5->CD_AGENTE.'">'.$resultado5->NM_AGENTE.'</option>');
                              }

                              echo utf8_encode('
                          </select>
                        </div>
                        <label> SIAPE </label>
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                            <input type="text" id="inputName" class="form-control" name="siape">
                          </div>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-12">

                      <div class="col-md-4">
                        <label>Tipo do Termo</label>
                        <div class="form-group">
                          <select class="form-control select2" name="tp_trm_n" style="width: 100%;" required>
                            <option selected="selected"></option>
                            <option>T.A</option>
                            <option>T.C</option>         
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label> Carga Horaria Semanal </label>
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                            <input type="text" id="inputName" class="form-control" name="cg_hrr_n">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label>Classifica&ccedil;&atilde;o do Termo</label>
                        <div class="form-group">
                          <select class="form-control select2" name="cl_trm_n" style="width: 100%;" required>
                            <option selected="selected"></option>
                            <option>OBRIGATORIO</option>
                            <option>NÃO OBRIGATORIO</option>       
                          </select>
                        </div>
                      </div>
                    </div>
                  </div> 
                  </div>
                </div>
              </div>
            </div>


            <div class="box box-primary">
              <div class="form-group">
                <div class="box-header with-border">
                  <div class="box-body">
                    <h3 class="box-title">Dados dos Alunos</h3>
                  </div>
                  <div class="col-md-12" id="div_" style="display:block;">
                  	<div class="col-md-1">
                  		<br><p>01</p>
                  	</div>
                    <div class="col-md-3">
                      <label> Matricula do Aluno </label>
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="matricula" id="mat" placeholder="Matricula" size="20" maxlength="20" >
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <label> Hora de Início</label>
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                            <input type="text" id="inputName" class="form-control" name="hr_ini_n" id="hora" placeholder="H. Inicio" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                          </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                      <label> Hora Final </label>
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                          <input type="text" id="inputName" class="form-control" name="hr_fim_n" placeholder="H. Final" id="hora" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <label>Data de inicio</label>
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName" class="form-control" name="dt_ini_n" placeholder="D. Inicio" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                       <label> Data de T&eacute;rmino </label>
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="dt_fim_n" placeholder="D. T&eacute;rmino" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <button type="button" name="btn_adicionar" id="btn_0" onclick="adc_0();" style="display:block;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                  <div class="col-md-12" id="div_1" style="display:none;">
                  	<div class="col-md-1">
                  		<p>02</p>
                  	</div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="matricula1" id="mat" placeholder="Matricula" size="20" maxlength="20" >
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                            <input type="text" id="inputName" class="form-control" name="hr_ini_n1" id="hora"  placeholder="H. Inicio"placeholder="" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                          </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                          <input type="text" id="inputName" class="form-control" name="hr_fim_n1"placeholder="H. Final"  id="hora" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName" class="form-control" name="dt_ini_n1"  placeholder="D. Inicio" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="dt_fim_n1"  placeholder="D. T&eacute;rmino"id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                    </div>
                  </div>

                  <button type="button" name="btn_adicionar1" id="btn_1" onclick="adc_1();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                  <div class="col-md-12" id="div_2" style="display:none;">
                    <div class="col-md-1">
                  		<p>03</p>
                  	</div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="matricula2" id="mat" placeholder="Matricula" size="20" maxlength="20" >
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                            <input type="text" id="inputName" class="form-control" name="hr_ini_n2" id="hora"  placeholder="H. Inicio" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                          </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                          <input type="text" id="inputName" class="form-control" name="hr_fim_n2"placeholder="H. Final"  id="hora" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName" class="form-control" name="dt_ini_n2"  placeholder="D. Inicio" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="dt_fim_n2"  placeholder="D. T&eacute;rmino"id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                    </div>
                  </div>

                  <button type="button" name="btn_adicionar2" id="btn_2" onclick="adc_2();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                  <div class="col-md-12" id="div_3" id="div_"3 style="display:none;">
                    <div class="col-md-1">
                  		<p>04</p>
                  	</div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="matricula3" id="mat" placeholder="Matricula" size="20" maxlength="20" >
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                            <input type="text" id="inputName" class="form-control" name="hr_ini_n3" id="hora"  placeholder="H. Inicio" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                          </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                          <input type="text" id="inputName" class="form-control" name="hr_fim_n3"placeholder="H. Final"  id="hora" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName" class="form-control" name="dt_ini_n3"  placeholder="D. Inicio" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="dt_fim_n3"  placeholder="D. T&eacute;rmino"id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                    </div>
                  </div>

                  <button type="button" name="btn_adicionar3" id="btn_3" onclick="adc_3();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                  <div class="col-md-12" id="div_4" style="display:none;">
                    <div class="col-md-1">
                  		<p>05</p>
                  	</div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="matricula4" id="mat" placeholder="Matricula" size="20" maxlength="20" >
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                            <input type="text" id="inputName" class="form-control" name="hr_ini_n4" id="hora"  placeholder="H. Inicio" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                          </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                          <input type="text" id="inputName" class="form-control" name="hr_fim_n4"placeholder="H. Final"  id="hora" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName" class="form-control" name="dt_ini_n4"  placeholder="D. Inicio" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="dt_fim_n4"  placeholder="D. T&eacute;rmino"id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                    </div>
                  </div>

                  <button type="button" name="btn_adicionar4" id="btn_4" onclick="adc_4();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                  <div class="col-md-12" id="div_5" style="display:none;">
                    <div class="col-md-1">
                  		<p>06</p>
                  	</div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="matricula5" id="mat" placeholder="Matricula" size="20" maxlength="20" >
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                            <input type="text" id="inputName" class="form-control" name="hr_ini_n5" id="hora"  placeholder="H. Inicio" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                          </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                          <input type="text" id="inputName" class="form-control" name="hr_fim_n5"placeholder="H. Final"  id="hora" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName" class="form-control" name="dt_ini_n5"  placeholder="D. Inicio" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="dt_fim_n5"  placeholder="D. T&eacute;rmino"id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                    </div>
                  </div>

                  <button type="button" name="btn_adicionar5" id="btn_5" onclick="adc_5();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                  <div class="col-md-12" id="div_6" style="display:none;">
                    <div class="col-md-1">
                  		<p>07</p>
                  	</div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="matricula6" id="mat" placeholder="Matricula" size="20" maxlength="20" >
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                            <input type="text" id="inputName" class="form-control" name="hr_ini_n6" id="hora"  placeholder="H. Inicio" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                          </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                          <input type="text" id="inputName" class="form-control" name="hr_fim_n6"placeholder="H. Final"  id="hora" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName" class="form-control" name="dt_ini_n6"  placeholder="D. Inicio" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="dt_fim_n6"  placeholder="D. T&eacute;rmino"id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                    </div>
                  </div>

                  <button type="button" name="btn_adicionar6" id="btn_6" onclick="adc_6();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                  <div class="col-md-12" id="div_7" style="display:none;">
                    <div class="col-md-1">
                  		<p>08</p>
                  	</div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="matricula7" id="mat" placeholder="Matricula" size="20" maxlength="20" >
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                            <input type="text" id="inputName" class="form-control" name="hr_ini_n7" id="hora"  placeholder="H. Inicio" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                          </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                          <input type="text" id="inputName" class="form-control" name="hr_fim_n7"placeholder="H. Final"  id="hora" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName" class="form-control" name="dt_ini_n7"  placeholder="D. Inicio" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="dt_fim_n7"  placeholder="D. T&eacute;rmino"id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                    </div>
                  </div>

                  <button type="button" name="btn_adicionar7" id="btn_7" onclick="adc_7();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                  <div class="col-md-12" id="div_8" style="display:none;">
                    <div class="col-md-1">
                  		<p>09</p>
                  	</div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="matricula8" id="mat" placeholder="Matricula" size="20" maxlength="20" >
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                            <input type="text" id="inputName" class="form-control" name="hr_ini_n8" id="hora"  placeholder="H. Inicio" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                          </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                          <input type="text" id="inputName" class="form-control" name="hr_fim_n8"placeholder="H. Final"  id="hora" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName" class="form-control" name="dt_ini_n8"  placeholder="D. Inicio" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="dt_fim_n8"  placeholder="D. T&eacute;rmino"id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                    </div>
                  </div>
  
                  <button type="button" name="btn_adicionar8" id="btn_8" onclick="adc_8();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                  <div class="col-md-12" id="div_9" style="display:none;">
                    <div class="col-md-1">
                  		<p>10</p>
                  	</div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="matricula9" id="mat" placeholder="Matricula" size="20" maxlength="20" >
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                            <input type="text" id="inputName" class="form-control" name="hr_ini_n9" id="hora"  placeholder="H. Inicio" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                          </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                          <input type="text" id="inputName" class="form-control" name="hr_fim_n9"placeholder="H. Final"  id="hora" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName" class="form-control" name="dt_ini_n9"  placeholder="D. Inicio" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="dt_fim_n9"  placeholder="D. T&eacute;rmino"id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                    </div>
                  </div>

                  <button type="button" name="btn_adicionar9" id="btn_9" onclick="adc_9();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                  <div class="col-md-12" id="div_10" style="display:none;">
                    <div class="col-md-1">
                  		<p>11</p>
                  	</div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="matricula10" id="mat" placeholder="Matricula" size="20" maxlength="20" >
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                            <input type="text" id="inputName" class="form-control" name="hr_ini_n10" id="hora" placeholder="H. Inicio" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                          </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                          <input type="text" id="inputName" class="form-control" name="hr_fim_n10" placeholder="H. Final" " id="hora" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName" class="form-control" name="dt_ini_n10" placeholder="D. Inicio"  id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="dt_fim_n10" placeholder="D. T&eacute;rmino" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                    </div>
                  </div>

                  <button type="button" name="btn_adicionar10" id="btn_10" onclick="adc_10();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                  <div class="col-md-12" id="div_11" style="display:none;">
                    <div class="col-md-1">
                  		<p>12</p>
                  	</div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="matricula11" id="mat" placeholder="Matricula" size="20" maxlength="20" >
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                            <input type="text" id="inputName" class="form-control" name="hr_ini_n11" id="hora" placeholder="H. Inicio" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                          </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                          <input type="text" id="inputName" class="form-control" name="hr_fim_n11" placeholder="H. Final" " id="hora" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName" class="form-control" name="dt_ini_n11" placeholder="D. Inicio"  id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="dt_fim_n11" placeholder="D. T&eacute;rmino" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                    </div>
                  </div>

                  <button type="button" name="btn_adicionar11" id="btn_11" onclick="adc_11();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                  <div class="col-md-12" id="div_12" style="display:none;">
                    <div class="col-md-1">
                  		<p>13</p>
                  	</div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="matricula12" id="mat" placeholder="Matricula" size="20" maxlength="20" >
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                            <input type="text" id="inputName" class="form-control" name="hr_ini_n12" id="hora" placeholder="H. Inicio" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                          </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                          <input type="text" id="inputName" class="form-control" name="hr_fim_n12" placeholder="H. Final" " id="hora" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName" class="form-control" name="dt_ini_n12" placeholder="D. Inicio"  id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="dt_fim_n12" placeholder="D. T&eacute;rmino" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                    </div>
                  </div>

                  <button type="button" name="btn_adicionar12" id="btn_12" onclick="adc_12();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                  <div class="col-md-12" id="div_13" style="display:none;">
                    <div class="col-md-1">
                  		<p>14</p>
                  	</div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="matricula13" id="mat" placeholder="Matricula" size="20" maxlength="20" >
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                            <input type="text" id="inputName" class="form-control" name="hr_ini_n13" id="hora" placeholder="H. Inicio" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                          </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                          <input type="text" id="inputName" class="form-control" name="hr_fim_n13" placeholder="H. Final" " id="hora" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName" class="form-control" name="dt_ini_n13" placeholder="D. Inicio"  id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="dt_fim_n13" placeholder="D. T&eacute;rmino" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                    </div>
                  </div>

                  <button type="button" name="btn_adicionar13" id="btn_13" onclick="adc_13();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                  <div class="col-md-12" id="div_14" style="display:none;">
                    <div class="col-md-1">
                  		<p>15</p>
                  	</div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="matricula14" id="mat" placeholder="Matricula" size="20" maxlength="20" >
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                            <input type="text" id="inputName" class="form-control" name="hr_ini_n14" id="hora" placeholder="H. Inicio" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                          </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                          <input type="text" id="inputName" class="form-control" name="hr_fim_n14" placeholder="H. Final" " id="hora" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName" class="form-control" name="dt_ini_n14" placeholder="D. Inicio"  id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="dt_fim_n14" placeholder="D. T&eacute;rmino" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                    </div>
                  </div>

                  <button type="button" name="btn_adicionar14" id="btn_14" onclick="adc_14();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                  <div class="col-md-12" id="div_15" style="display:none;">
                    <div class="col-md-1">
                  		<p>16</p>
                  	</div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="matricula15" id="mat" placeholder="Matricula" size="20" maxlength="20" >
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                            <input type="text" id="inputName" class="form-control" name="hr_ini_n15" id="hora" placeholder="H. Inicio" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                          </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                          <input type="text" id="inputName" class="form-control" name="hr_fim_n15" placeholder="H. Final" " id="hora" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName" class="form-control" name="dt_ini_n15" placeholder="D. Inicio"  id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="dt_fim_n15" placeholder="D. T&eacute;rmino" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                    </div>
                  </div>

                  <button type="button" name="btn_adicionar15" id="btn_15" onclick="adc_15();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                  <div class="col-md-12" id="div_16" style="display:none;">
                    <div class="col-md-1">
                  		<p>17</p>
                  	</div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="matricula16" id="mat" placeholder="Matricula" size="20" maxlength="20" >
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                            <input type="text" id="inputName" class="form-control" name="hr_ini_n16" id="hora" placeholder="H. Inicio" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                          </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                          <input type="text" id="inputName" class="form-control" name="hr_fim_n16" placeholder="H. Final" " id="hora" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName" class="form-control" name="dt_ini_n16" placeholder="D. Inicio"  id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="dt_fim_n16" placeholder="D. T&eacute;rmino" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                    </div>
                  </div>

                  <button type="button" name="btn_adicionar16" id="btn_16" onclick="adc_16();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                  <div class="col-md-12" id="div_17" style="display:none;">
                    <div class="col-md-1">
                  		<p>18</p>
                  	</div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="matricula17" id="mat" placeholder="Matricula" size="20" maxlength="20" >
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                            <input type="text" id="inputName" class="form-control" name="hr_ini_n17" id="hora" placeholder="H. Inicio" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                          </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                          <input type="text" id="inputName" class="form-control" name="hr_fim_n17" placeholder="H. Final" " id="hora" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName" class="form-control" name="dt_ini_n17" placeholder="D. Inicio"  id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="dt_fim_n17" placeholder="D. T&eacute;rmino" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                    </div>
                  </div>

                  <button type="button" name="btn_adicionar17" id="btn_17" onclick="adc_17();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                  <div class="col-md-12" id="div_18" style="display:none;">
                    <div class="col-md-1">
                  		<p>19</p>
                  	</div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="matricula18" id="mat" placeholder="Matricula" size="20" maxlength="20" >
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                            <input type="text" id="inputName" class="form-control" name="hr_ini_n18" id="hora" placeholder="H. Inicio" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                          </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                          <input type="text" id="inputName" class="form-control" name="hr_fim_n18" placeholder="H. Final" " id="hora" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName" class="form-control" name="dt_ini_n18" placeholder="D. Inicio"  id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="dt_fim_n18" placeholder="D. T&eacute;rmino" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                    </div>
                  </div>

                  <button type="button" name="btn_adicionar18" id="btn_18" onclick="adc_18();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                  <div class="col-md-12" id="div_19" style="display:none;">
                    <div class="col-md-1">
                  		<p>20</p>
                  	</div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="matricula19" id="mat" placeholder="Matricula" size="20" maxlength="20" >
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                            <input type="text" id="inputName" class="form-control" name="hr_ini_n19" id="hora" placeholder="H. Inicio" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                          </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                          <input type="text" id="inputName" class="form-control" name="hr_fim_n19" placeholder="H. Final" " id="hora" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName" class="form-control" name="dt_ini_n19" placeholder="D. Inicio"  id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="dt_fim_n19" placeholder="D. T&eacute;rmino" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                    </div>
                  </div>

                  <button type="button" name="btn_adicionar19" id="btn_19" onclick="adc_19();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                  <div class="col-md-12" id="div_20" style="display:none;">
                    <div class="col-md-1">
                  		<p>21</p>
                  	</div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="matricula20" id="mat" placeholder="Matricula" size="20" maxlength="20" >
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                            <input type="text" id="inputName" class="form-control" name="hr_ini_n20" id="hora" placeholder="H. Inicio" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                          </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                          <input type="text" id="inputName" class="form-control" name="hr_fim_n20" placeholder="H. Final" " id="hora" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName" class="form-control" name="dt_ini_n20" placeholder="D. Inicio"  id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="dt_fim_n20" placeholder="D. T&eacute;rmino" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                    </div>
                  </div>

                  <button type="button" name="btn_adicionar20" id="btn_20" onclick="adc_20();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                  <div class="col-md-12" id="div_21" style="display:none;">
                    <div class="col-md-1">
                  		<p>22</p>
                  	</div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="matricula21" id="mat" placeholder="Matricula" size="20" maxlength="20" >
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                            <input type="text" id="inputName" class="form-control" name="hr_ini_n21" id="hora" placeholder="H. Inicio" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                          </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                          <input type="text" id="inputName" class="form-control" name="hr_fim_n21" placeholder="H. Final" " id="hora" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName" class="form-control" name="dt_ini_n21" placeholder="D. Inicio"  id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="dt_fim_n1"  placeholder="D. T&eacute;rmino"id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                    </div>
                  </div>

                  <button type="button" name="btn_adicionar21" id="btn_21" onclick="adc_21();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                  <div class="col-md-12" id="div_22" style="display:none;">
                    <div class="col-md-1">
                  		<p>23</p>
                  	</div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="matricula22" id="mat" placeholder="Matricula" size="20" maxlength="20" >
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                            <input type="text" id="inputName" class="form-control" name="hr_ini_n22" id="hora" placeholder="H. Inicio" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                          </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                          <input type="text" id="inputName" class="form-control" name="hr_fim_n22" placeholder="H. Final" " id="hora" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName" class="form-control" name="dt_ini_n22" placeholder="D. Inicio"  id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="dt_fim_n22" placeholder="D. T&eacute;rmino" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                    </div>
                  </div>

                  <button type="button" name="btn_adicionar22" id="btn_22" onclick="adc_22();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                  <div class="col-md-12" id="div_23" style="display:none;">
                    <div class="col-md-1">
                  		<p>24</p>
                  	</div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="matricula23" id="mat" placeholder="Matricula" size="20" maxlength="20" >
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                            <input type="text" id="inputName" class="form-control" name="hr_ini_n23" id="hora" placeholder="H. Inicio" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                          </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                          <input type="text" id="inputName" class="form-control" name="hr_fim_n3"" placeholder="H. Final"  id="hora" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName" class="form-control" name="dt_ini_n23" placeholder="D. Inicio"  id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="dt_fim_n23" placeholder="D. T&eacute;rmino" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                    </div>
                  </div>

                  <button type="button" name="btn_adicionar23" id="btn_23" onclick="adc_23();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                  <div class="col-md-12" id="div_24" style="display:none;">
                    <div class="col-md-1">
                  		<p>25</p>
                  	</div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="matricula24" id="mat" placeholder="Matricula" size="20" maxlength="20" >
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                            <input type="text" id="inputName" class="form-control" name="hr_ini_n24" id="hora" placeholder="H. Inicio" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                          </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                          <input type="text" id="inputName" class="form-control" name="hr_fim_n24" placeholder="H. Final" " id="hora" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName" class="form-control" name="dt_ini_n24" placeholder="D. Inicio"  id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="dt_fim_n24" placeholder="D. T&eacute;rmino" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                    </div>
                  </div>

                  <button type="button" name="btn_adicionar24" id="btn_24" onclick="adc_24();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                  <div class="col-md-12" id="div_25" style="display:none;">
                    <div class="col-md-1">
                  		<p>26</p>
                  	</div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="matricula25" id="mat" placeholder="Matricula" size="20" maxlength="20" >
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                            <input type="text" id="inputName" class="form-control" name="hr_ini_n25" id="hora" placeholder="H. Inicio" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                          </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                          <input type="text" id="inputName" class="form-control" name="hr_fim_n25" placeholder="H. Final" " id="hora" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName" class="form-control" name="dt_ini_n25" placeholder="D. Inicio"  id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="dt_fim_n25" placeholder="D. T&eacute;rmino" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                    </div>
                  </div>

                  <button type="button" name="btn_adicionar25" id="btn_25" onclick="adc_25();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                  <div class="col-md-12" id="div_26" style="display:none;">
                    <div class="col-md-1">
                  		<p>27</p>
                  	</div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="matricula26" id="mat" placeholder="Matricula" size="20" maxlength="20" >
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                            <input type="text" id="inputName" class="form-control" name="hr_ini_n26" id="hora" placeholder="H. Inicio" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                          </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                          <input type="text" id="inputName" class="form-control" name="hr_fim_n26" placeholder="H. Final" " id="hora" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName" class="form-control" name="dt_ini_n26" placeholder="D. Inicio"  id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="dt_fim_n26" placeholder="D. T&eacute;rmino" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                    </div>
                  </div>

                  <button type="button" name="btn_adicionar26" id="btn_26" onclick="adc_26();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                  <div class="col-md-12" id="div_27" style="display:none;">
                    <div class="col-md-1">
                  		<p>28</p>
                  	</div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="matricula27" id="mat" placeholder="Matricula" size="20" maxlength="20" >
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                            <input type="text" id="inputName" class="form-control" name="hr_ini_n27" id="hora" placeholder="H. Inicio" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                          </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                          <input type="text" id="inputName" class="form-control" name="hr_fim_n27" placeholder="H. Final" " id="hora" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName" class="form-control" name="dt_ini_n27" placeholder="D. Inicio"  id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="dt_fim_n27" placeholder="D. T&eacute;rmino" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                    </div>
                  </div>

                  <button type="button" name="btn_adicionar27" id="btn_27" onclick="adc_27();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                  <div class="col-md-12" id="div_28" style="display:none;">
                    <div class="col-md-1">
                  		<p>29</p>
                  	</div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="matricula28" id="mat" placeholder="Matricula" size="20" maxlength="20" >
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                            <input type="text" id="inputName" class="form-control" name="hr_ini_n8" id="hora"  placeholder="H. Inicio" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                          </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                          <input type="text" id="inputName" class="form-control" name="hr_fim_n28" placeholder="H. Final" " id="hora" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName" class="form-control" name="dt_ini_n28" placeholder="D. Inicio"  id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="dt_fim_n28" placeholder="D. T&eacute;rmino" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                    </div>
                  </div>

                  <button type="button" name="btn_adicionar28" id="btn_28" onclick="adc_28();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                  <div class="col-md-12" id="div_29" style="display:none;">
                    <div class="col-md-1">
                  		<p>30</p>
                  	</div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="matricula29" id="mat" placeholder="Matricula" size="20" maxlength="20" >
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                            <input type="text" id="inputName" class="form-control" name="hr_ini_n29" id="hora" placeholder="H. Inicio" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                          </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                          <input type="text" id="inputName" class="form-control" name="hr_fim_n29" placeholder="H. Final" " id="hora" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName" class="form-control" name="dt_ini_n29" placeholder="D. Inicio"  id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="dt_fim_n29" placeholder="D. T&eacute;rmino" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                    </div>
                  </div>

                  <button type="button" name="btn_adicionar29" id="btn_29" onclick="adc_29();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                  <div class="col-md-12" id="div_30" style="display:none;">
                    <div class="col-md-1">
                  		<p>31</p>
                  	</div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="matricula30" id="mat" placeholder="Matricula" size="20" maxlength="20" >
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                            <input type="text" id="inputName" class="form-control" name="hr_ini_n30" id="hora" placeholder="H. Inicio" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                          </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                          <input type="text" id="inputName" class="form-control" name="hr_fim_n30" placeholder="H. Final" " id="hora" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName" class="form-control" name="dt_ini_n30" placeholder="D. Inicio"  id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="dt_fim_n30" placeholder="D. T&eacute;rmino" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                    </div>
                  </div>

                  <button type="button" name="btn_adicionar30" id="btn_30" onclick="adc_30();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                  <div class="col-md-12" id="div_31" style="display:none;">
                    <div class="col-md-1">
                  		<p>32</p>
                  	</div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="matricula31" id="mat" placeholder="Matricula" size="20" maxlength="20" >
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                            <input type="text" id="inputName" class="form-control" name="hr_ini_n31" id="hora" placeholder="H. Inicio" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                          </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                          <input type="text" id="inputName" class="form-control" name="hr_fim_n31" placeholder="H. Final" " id="hora" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName" class="form-control" name="dt_ini_n31" placeholder="D. Inicio"  id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="dt_fim_n31" placeholder="D. T&eacute;rmino" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                    </div>
                  </div>

                  <button type="button" name="btn_adicionar31" id="btn_31" onclick="adc_31();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                  <div class="col-md-12" id="div_32" style="display:none;">
                    <div class="col-md-1">
                  		<p>33</p>
                  	</div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="matricula32" id="mat" placeholder="Matricula" size="20" maxlength="20" >
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                            <input type="text" id="inputName" class="form-control" name="hr_ini_n32" id="hora" placeholder="H. Inicio" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                          </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                          <input type="text" id="inputName" class="form-control" name="hr_fim_n32" placeholder="H. Final" " id="hora" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName" class="form-control" name="dt_ini_n32" placeholder="D. Inicio"  id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="dt_fim_n32" placeholder="D. T&eacute;rmino" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                    </div>
                  </div>

                  <button type="button" name="btn_adicionar32" id="btn_32" onclick="adc_32();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                  <div class="col-md-12" id="div_33" style="display:none;">
                    <div class="col-md-1">
                  		<p>34</p>
                  	</div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="matricula33" id="mat" placeholder="Matricula" size="20" maxlength="20" >
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                            <input type="text" id="inputName" class="form-control" name="hr_ini_n33" id="hora" placeholder="H. Inicio" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                          </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                          <input type="text" id="inputName" class="form-control" name="hr_fim_n33" placeholder="H. Final" " id="hora" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName" class="form-control" name="dt_ini_n33" placeholder="D. Inicio"  id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="dt_fim_n33" placeholder="D. T&eacute;rmino" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                    </div>
                  </div>

                  <button type="button" name="btn_adicionar33" id="btn_33" onclick="adc_33();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                  <div class="col-md-12" id="div_34" style="display:none;">
                    <div class="col-md-1">
                  		<p>35</p>
                  	</div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="matricula34" id="mat" placeholder="Matricula" size="20" maxlength="20" >
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                            <input type="text" id="inputName" class="form-control" name="hr_ini_n34" id="hora" placeholder="H. Inicio" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                          </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                          <input type="text" id="inputName" class="form-control" name="hr_fim_n34" placeholder="H. Final" " id="hora" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName" class="form-control" name="dt_ini_n34" placeholder="D. Inicio"  id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="dt_fim_n34" placeholder="D. T&eacute;rmino" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                    </div>
                  </div>

                  <button type="button" name="btn_adicionar34" id="btn_34" onclick="adc_34();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                  <div class="col-md-12" id="div_35" style="display:none;">
                    <div class="col-md-1">
                  		<p>36</p>
                  	</div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="matricula35" id="mat" placeholder="Matricula" size="20" maxlength="20" >
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                            <input type="text" id="inputName" class="form-control" name="hr_ini_n35" id="hora" placeholder="H. Inicio" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                          </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                          <input type="text" id="inputName" class="form-control" name="hr_fim_n35" placeholder="H. Final" " id="hora" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName" class="form-control" name="dt_ini_n35" placeholder="D. Inicio"  id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="dt_fim_n35" placeholder="D. T&eacute;rmino" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                    </div>
                  </div>

                  <button type="button" name="btn_adicionar35" id="btn_35" onclick="adc_35();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                  <div class="col-md-12" id="div_36" style="display:none;">
                    <div class="col-md-1">
                  		<p>37</p>
                  	</div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="matricula36" id="mat" placeholder="Matricula" size="20" maxlength="20" >
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                            <input type="text" id="inputName" class="form-control" name="hr_ini_n36" id="hora" placeholder="H. Inicio" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                          </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                          <input type="text" id="inputName" class="form-control" name="hr_fim_n36" placeholder="H. Final" " id="hora" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName" class="form-control" name="dt_ini_n36" placeholder="D. Inicio"  id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="dt_fim_n36" placeholder="D. T&eacute;rmino" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                    </div>
                  </div>

                  <button type="button" name="btn_adicionar36" id="btn_36" onclick="adc_36();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                  <div class="col-md-12" id="div_37" style="display:none;">
                    <div class="col-md-1">
                  		<p>38</p>
                  	</div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="matricula37" id="mat" placeholder="Matricula" size="20" maxlength="20" >
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                            <input type="text" id="inputName" class="form-control" name="hr_ini_n37" id="hora" placeholder="H. Inicio" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                          </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                          <input type="text" id="inputName" class="form-control" name="hr_fim_n37" placeholder="H. Final" " id="hora" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName" class="form-control" name="dt_ini_n37" placeholder="D. Inicio"  id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="dt_fim_n37" placeholder="D. T&eacute;rmino" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                    </div>
                  </div>

                  <button type="button" name="btn_adicionar37" id="btn_37" onclick="adc_37();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                  <div class="col-md-12" id="div_38" style="display:none;">
                    <div class="col-md-1">
                  		<p>39</p>
                  	</div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="matricula38" id="mat" placeholder="Matricula" size="20" maxlength="20" >
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                            <input type="text" id="inputName" class="form-control" name="hr_ini_n38" id="hora" placeholder="H. Inicio" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                          </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                          <input type="text" id="inputName" class="form-control" name="hr_fim_n38" placeholder="H. Final" " id="hora" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName" class="form-control" name="dt_ini_n38" placeholder="D. Inicio"  id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="dt_fim_n38" placeholder="D. T&eacute;rmino" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                    </div>
                  </div>

                  <button type="button" name="btn_adicionar38" id="btn_38" onclick="adc_38();" style="display:none;" class="btn btn-primary pull-right" style="margin-right:1%;">Adicionar</button>

                  <div class="col-md-12" id="div_39" style="display:none;">
                    <div class="col-md-1">
                  		<p>40</p>
                  	</div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="matricula39" id="mat" placeholder="Matricula" size="20" maxlength="20" >
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                            <input type="text" id="inputName" class="form-control" name="hr_ini_n39" id="hora" placeholder="H. Inicio" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                          </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                          <input type="text" id="inputName" class="form-control" name="hr_fim_n39" placeholder="H. Final" " id="hora" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName" class="form-control" name="dt_ini_n39" placeholder="D. Inicio"  id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                     </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input type="text" id="inputName"  class="form-control" name="dt_fim_n39" placeholder="D. T&eacute;rmino" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                        </div>
                      </div>
                    </div>
                  </div>

                   <button type="button" name="btn_limpar" id="btn_limpar" onclick="limpar();" class="btn btn-danger pull-right" style="display:none;">Limpar</button>	
                   <button type="submit" name="btn_cadastrar" class="btn btn-primary pull-right" style="margin-right:1%;" >Cadastrar</button>
        </form>
                    ');
?>
                  </div>
              
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>
                        
<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Versão</b> 2.0
    </div>
    <strong>Copyright &copy; 2017 <a href="http://ufc.br">UFC</a> - Agência de Estágios</strong> Todos os direitos reservados.
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
