<?php
// Incluir aquivo de conexão
include("conn.php");
mysql_select_db('estagios');
 
// Recebe o valor enviado
$valor = $_GET['valor'];
 
// Procura titulos no banco relacionados ao valor
$sql = mysql_query("SELECT * FROM empresas WHERE nome LIKE '%$valor%' ");

$resultado = mysql_num_rows($sql);
$noticias = @mysql_fetch_object($sql);
$agente = $noticias->AGENTE_INTEGRADOR;

$sql1 = mysql_query("SELECT * FROM termo_convenio WHERE CD_EMPRESA LIKE '$noticias->CD_EMPRESA' ");
$resultado1 = mysql_num_rows($sql1);
$noticias1 = @mysql_fetch_object($sql1);
$data_cvn=$noticias1->dt_fim;

//PEGA A DATA AUTOMATICAMENTE DO COMPUTADOR
date_default_timezone_set('America/Sao_Paulo');
$data = date('Y-m-d');


if($resultado != 0 and $data <= $data_cvn){
	echo '<a onclick="conveniadas_tceo()" id="nome"><div class="alert alert-success" style="cursor:pointer; margin-top:5px;">' . @$noticias->nome . '</div></a>';

	echo '<div id="dados" onclick="conveniadas_tceo();" style="display:none">';
	echo '
        <div class="form-group">
            <div class="input-icon right">
               <strong> <input name="nomeEmpresa" id="inputName" type="text" value="'.$noticias->nome.'" class="form-control" required/></strong>
            </div>
        </div>
       
        <div class="form-group">
            <div class="input-icon right">
               <strong> <input name="cnpj" id="inputName" type="text" placeholder="CNPJ/CPF(PESSOA FISICA)" title="CNPJ EX: 00.000.000/0000-00, CPF EX: 000.000.000-00" value="'.$noticias->cnpj.'" class="form-control" required/></strong>
            </div>
        </div>
       
        <div class="form-group">
            <div class="input-icon right">
                <strong><input name="foneEmpresa" id="inputName" type="text" placeholder="DIGITE O TELEFONE, EX: (XX) 99999-9999" title="(XX) 99999-9999" value="'.$noticias->tel.'" class="form-control" required/></strong>
            </div>
        </div>
       
        <div class="form-group">
            <div class="input-icon right">
                <strong><input name="enderecoEmpresa" id="inputName" type="text" value="'.$noticias->endereco.'" class="form-control" required/></strong>
            </div>
        </div>
        
        <div class="form-group">
            <div class="input-icon right">
                <input id="inputName" type="text" name="cidadeEmpresa" class="form-control" placeholder="Cidade E UF, EX: FORTALEZA/CE" style="text-transform:uppercase" required />
            </div>
        </div>
        
        <div class="form-group">
            <div class="input-icon right">
                <input id="inputName" type="text" name="setor" placeholder="Setor" class="form-control" style="text-transform:uppercase" required />
            </div>
        </div>
        
        <div class="form-group">
            <div class="input-icon right">
                <input id="inputName" type="text" name="representante" placeholder="Representante Legal da Empresa" class="form-control" style="text-transform:uppercase" required />
            </div>
        </div>
        
        <div class="form-group">
            <div class="input-icon right">
                <input name="supervisor" id="supervisor" type="text" placeholder="Supervisor" class="form-control" style="text-transform:uppercase" required />
                <br><div class="btn btn-primary pull-right" onclick="divAluno();" id="btn1">PROXIMO PASSO >></div>
            </div>
        </div>';
	echo '</div>';	
} if($resultado != 0 and $agente != ''){
    echo '<a onclick="conveniadas_tceo()" id="nome"><div class="alert alert-success" style="cursor:pointer; margin-top:5px;">' . @$noticias->nome . '</div></a>';

    echo '<div id="dados" onclick="conveniadas_tceo();" style="display:none">';
    echo '
        <div class="form-group">
            <div class="input-icon right">
                <input name="nomeEmpresa" id="inputName" type="text" value="'.$noticias->nome.'" class="form-control" required/>
            </div>
        </div>
        
        <div class="form-group">
            <div class="input-icon right">
               <strong> <input name="cnpj" id="inputName" type="text" placeholder="CNPJ/CPF(PESSOA FISICA)" title="CNPJ EX: 00.000.000/0000-00, CPF EX: 000.000.000-00" value="'.$noticias->cnpj.'" class="form-control" required/></strong>
            </div>
        </div>
        
        <div class="form-group">
            <div class="input-icon right">
                <strong><input name="foneEmpresa" id="inputName" type="text" placeholder="DIGITE O TELEFONE" title="(XX) 99999-9999" value="'.$noticias->tel.'" class="form-control" required/></strong>
            </div>
        </div>
        
        <div class="form-group">
            <div class="input-icon right">
                <input name="enderecoEmpresa" id="inputName" type="text" value="'.$noticias->endereco.'" class="form-control" required/>
            </div>
        </div>
        
        <div class="form-group">
            <div class="input-icon right">
                <input id="inputName" type="text" name="cidadeEmpresa" class="form-control" placeholder="Cidade/UF" style="text-transform:uppercase" required />
            </div>
        </div>
       
        <div class="form-group">
            <div class="input-icon right">
                <input id="inputName" type="text" name="setor" placeholder="Setor" class="form-control" style="text-transform:uppercase" required />
            </div>
        </div>
       
        <div class="form-group">
            <div class="input-icon right">
                <input id="inputName" type="text" name="representante" placeholder="Representante Legal da Empresa" class="form-control" style="text-transform:uppercase" required />
            </div>
        </div>
        
        <div class="form-group">
            <div class="input-icon right">
                <input name="supervisor" id="supervisor" type="text" placeholder="Supervisor" class="form-control" style="text-transform:uppercase" required />
                <br><div class="btn btn-primary pull-right" onclick="divAluno();" id="btn1">PROXIMO PASSO >></div>
            </div>
        </div>';
    echo '</div>';  
} 
if($resultado!=0 and $agente=='' and $data_cvn==''){
        echo utf8_decode('<div class="alert alert-danger" style="margin-top:5px;"><h4 class="box-heading2">Aviso! Empresa Não Tem Resgistro de Convenio</h4>
           <p>A empresa solicitada não é conveniada com a UFC ou a virgência Acabou , para mais detalhes entre em contato com a Agência de Estágios da UFC.</p>
           </div>');} 

if($resultado==0){
		echo utf8_decode('<div class="alert alert-danger" style="margin-top:5px;"><h4 class="box-heading2">Aviso! Empresa Não Conveniada</h4>
           <p>A empresa solicitada não é conveniada com a UFC ou a virgência Acabou , para mais detalhes entre em contato com a Agência de Estágios da UFC.</p>
           </div>');}	

// Acentuação
@header("Content-Type: text/html; charset=ISO-8859-1",true);
?>