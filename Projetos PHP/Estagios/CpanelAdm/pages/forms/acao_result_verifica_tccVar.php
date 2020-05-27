<?php
// Incluir aquivo de conexão
include("../../../conn.php");
 mysql_select_db('estagios');
// Recebe o valor enviado
$valor = $_GET['valor'];
 
// Procura titulos no banco relacionados ao valor
$sql = mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$valor'");

$resulatdo = mysql_num_rows($sql);
session_start();
$_SESSION['matricula'];
$_SESSION['matricula'] = $valor;
// Exibe todos os valores encontrados
if($resulatdo == 0){
/*  echo utf8_decode('<br><form action="page_inserir_aluno.php" method="POST" target="_blank">
                      <div class="alert alert-warning"><label> A Matricula </label> <label style="color:black;"> '. $_SESSION['matricula'] . '</label> <label> no Campo em Edição Não Existe. Deseja Cadastrar o(a) Aluno(a)?</label><button type="submit" style="float:right;font-size: 12px;"  class="btn btn-danger" name="Cadastrar">Cadastrar</button></div>'); */
             echo '  <div class="col-md-6">
                          <div class="box box-primary collapsed-box" id="atu" style="display: block;">
                            <div class="box-header with-border">
                                <h3 class="box-title">Horário Variado</h3>
                                <div class="box-tools pull-right">
                                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                  </button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group" id="btn3" style="display: block;">
                                  <form action="" method="POST" name="form" id="form" onSubmit="">
                                      <div class="form-group" id="pesquisa2">
                                        <div class="input-icon right" id="busca">
                                            <div class="col-md-12">
                                              <select class="form-control select2" name="id_tce_hv" style="width: 100%;" required> ';
}

// Acentuação
@header("Content-Type: text/html; charset=ISO-8859-1",true);
?>