<?php
// Incluir aquivo de conexão
include("conn.php");
mysql_select_db('estagios');
 
// Recebe o valor enviado
$valor = utf8_decode($_GET['valor']);
 
// Procura titulos no banco relacionados ao valor
$sql0 = mysql_query("SELECT * FROM empresas WHERE nome LIKE '%$valor%' or cnpj like '%$valor%' ORDER BY CD_EMPRESA ASC limit 20");

$resulatdo = mysql_num_rows($sql0);


 
// Exibe todos os valores encontrados
if($resulatdo != 0){
   
    while($noticias0 = mysql_fetch_array($sql0)){

       $agt_int=$noticias0['AGENTE_INTEGRADOR'];
       $nome=$noticias0['nome'];
       $CD_EMPRESA=$noticias0['CD_EMPRESA'];

if ($agt_int!=null) {
echo utf8_encode('<a onclick="siim2()" id="nome"><div class="alert alert-success" style="cursor:pointer; margin-top:5px;">' . $nome . ' - TEM CONVENIO POR AGENTE: '.$agt_int.'
  </div></a>');
                    }


      

      setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');
        $dia = strftime('%d', strtotime('today'));
        $mes = strftime('%m', strtotime('today'));
        $ano = strftime('%Y', strtotime('today'));

        $sql1 = mysql_query("SELECT * FROM termo_convenio WHERE CD_EMPRESA LIKE '$CD_EMPRESA' ORDER BY CD_CONVENIO DESC");

      $noticias1 = mysql_fetch_array($sql1);
        //CONSULTA O ULTIMO TERMO DO ALUNO
        //PEGA OS DADOS DO TERMO
      $dt_inicio=$noticias1['dt_inicio'];
      $data_fim=$noticias1['dt_fim'];

        
     

        //DIVIDE A DATA FINAL DE ESTÁGIO EM DIA MÊS E ANO
        $dia_final = substr($data_fim, 0, 2);
        $mes_final = substr($data_fim, 3, 2);
        $ano_final = substr($data_fim, 6, 4);




    //VERIFICA SE O PODE FAZER OUTRO TERMO
        if ($ano_final != '' and $ano > $ano_final and $agt_int=='') {
          echo utf8_encode('<a onclick="siim2()" id="nome"><div class="alert alert-danger" style="cursor:pointer; margin-top:5px;">' .$nome. ' - ACABOU O CONVENIO EM '.$data_fim.'</div></a>');
        } if ($ano_final == $ano and $mes > $mes_final and $agt_int=='') {
          echo utf8_encode('<a onclick="siim2()" id="nome"><div class="alert alert-danger" style="cursor:pointer; margin-top:5px;">' .$nome. ' - ACABOU O CONVENIO EM '.$data_fim.'</div></a>');
        } if ($ano == $ano_final and $mes == $mes_final and $dia >= $dia_final and $agt_int=='') {
          echo utf8_encode('<a onclick="siim2()" id="nome"><div class="alert alert-danger" style="cursor:pointer; margin-top:5px;">' .$nome. ' - ACABOU O CONVENIO EM '.$data_fim.'</div></a>');
        } 

        if ($ano < $ano_final) {
    echo utf8_encode('<a onclick="siim2()" id="nome"><div class="alert alert-success" style="cursor:pointer; margin-top:5px;">' .$nome. ' - TEM CONVENIO DE '. $dt_inicio.' ATE '.$data_fim.'</div></a>');       
        } 

       if ($ano_final == $ano and $mes < $mes_final) {
echo utf8_encode('<a onclick="siim2()" id="nome"><div class="alert alert-success" style="cursor:pointer; margin-top:5px;">' .$nome. ' - TEM CONVENIO DE '. $dt_inicio.' ATE '.$data_fim.'</div></a>');        
       } 
       if ($ano == $ano_final and $mes == $mes_final and $dia <= $dia_final) {
echo utf8_encode('<a onclick="siim2()" id="nome"><div class="alert alert-success" style="cursor:pointer; margin-top:5px;">' .$nome. ' - TEM CONVENIO DE '. $dt_inicio.' ATE '.$data_fim.'</div></a>');        
       }


        if ($ano_final == '' and $agt_int=='' ) {
      echo utf8_encode('<a onclick="siim2()" id="nome"><div class="alert alert-danger" style="cursor:pointer; margin-top:5px;">' .$nome. ' - NAO TEM REGISTRO DE CONVENIO.</div></a>');
        } 


  
 }   
}
if ($resulatdo == 0) {
    echo '<div class="note2 note-danger2"><h4 class="box-heading2"><Strong><font color="red">Aviso! Empresa Não Conveniada</font></Strong></h4>
               <p><font color="red">A empresa solicitada não é conveniada com a UFC, para mais detalhes entre em contato com a Agência de Estágios da UFC.</font></p>
               </div>';
  } 

?>