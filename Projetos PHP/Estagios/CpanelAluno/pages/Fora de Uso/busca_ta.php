<?php
// Incluir aquivo de conexão
include("../../CpanelAluno/pages/conn.php");
mysql_select_db('estagios');
 
// Recebe o valor enviado
$valor_2 = $_GET['valor'];
 
// Procura titulos no banco relacionados ao valor
$sql = mysql_query("SELECT * FROM termo_compromisso WHERE id_termo_compromisso LIKE '$valor_2' and obs = ''");

$resulatdo = mysql_num_rows($sql);

// Exibe todos os valores encontrados
if($resulatdo != 0){
  $noticias = @mysql_fetch_object($sql);

  //CONSULTA OS DADOS DO ALUNO ATRAVES DA MATRICULA CADASTRADA NO TERMO
  $sql2 = mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$noticias->matricula_aluno'");

  $noticias2 = @mysql_fetch_object($sql2);

  //EXIBE O NOME DO ALUNO A DATA DE INICIO E FIM DO ESTAGIOS (QUANDO CLICA NO NOME ESSA DIV DESAPARECE E A DIV ABAIXO APARECE)
  echo utf8_encode('<BR><a onclick="siim2()" id="nome2"><div class="alert alert-success"> Aluno: ' . $noticias2->nome . ' - '.$noticias->dt_inicio.' - '.$noticias->dt_fim.'</div></a>');

  //QUANDO HÁ UM CLIQUE NA DIV ACIMA ESSA DIV APARECE COM TODOS OS DADOS QUE PODEM SE MUDADOS NO TERMO ADITIVO
  echo '<div id="dasinp2" onclick="siim2();" style="display:none">';
  echo '<div class="col-lg-12">
    <div class="alert alert-success"><strong>SELECIONE APENAS OS DADOS QUE SERÃO MUDADOS</strong></div>
        <div class="col-lg-12" id="divNADA" onclick="mudarHorario();"  style="display:block;"></div>
        <div class="col-lg-12" id="divOutros" onclick="divOutros();" >
            <div class="box box-default">
              <div class="box-header with-border">
                <i class="fa fa-warning"></i>
                <h3 class="box-title">Termo Aditivo</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="form-group">
                    <div class="input-icon right">
                    <strong>Data de Incio do Aditivo Apartir:</strong>
                        <div class="input-group">
                            <input name="dataInicio" type="text" id="dataEst"  onclick="divBTN();" onkeypress="dataEstagio(this)" maxlength="10" placeholder="dd/mm/aaaa" class="form-control" required/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-icon right">
                    <strong>Data do Fim do Estágio</strong>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <input type="checkbox" onclick="mudar();"/>
                            </span>
                            <input name="dataFiim" value="'.$noticias->dt_fim.'" type="text" id="dataFim" onclick="mudar()" onkeypress="dataEstagio(this)" maxlength="10" placeholder="dd/mm/aaaa" class="form-control" disabled/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-icon right">
                        <strong>Valor da Bolsa Auxilio</strong>
                        <div class="input-group" style="width: 60% ">
                            <span class="input-group-addon">
                                <input type="checkbox" onclick="mudarValor();"/>
                            </span>
                            <span class="input-group-addon">R$</span>
                            <input name="valor" value="'.$noticias->valor.'" id="valor" type="text" onkeypress="mascara( this, mvalor );"  onclick="mudarValor()" class="form-control" disabled/>
                            <span class="input-group-addon">,00</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-icon right">
                    <strong>Horas Semanais</strong>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <input type="checkbox" onclick="mudarHoras();"/>
                        </span>
                        <select name="carga_horaria" value="'.$noticias->carga_horaria.'" id="horas" onclick="mudarHoras()" class="form-control" disabled>
                           <option>1 (Uma)</option>
                        <option>2 (Duas)</option>
                        <option>3 (Três)</option>                                            
                        <option>4 (Quatro)</option>
                        <option>5 (Cinco)</option>
                        <option>6 (Seis)</option>
                        <option>7 (Sete)</option>
                        <option>8 (Oito)</option>
                        <option>9 (Nove)</option>
                        <option>10 (Dez)</option>
                        <option>11 (Onze)</option>
                        <option>12 (Doze)</option>
                        <option>13 (Treze)</option>
                        <option>14 (Quatorze)</option>
                        <option>15 (Quinze)</option>                                            
                        <option>16 (Dezesseis)</option>
                        <option>17 (Dezessete)</option>
                        <option>18 (Dezoito)</option>
                        <option>19 (Dezenove)</option>
                        <option>20 (Vinte)</option>
                        <option>21 (Vinte e uma)</option>
                        <option>22 (Vinte e duas)</option>
                        <option>23 (Vinte e três)</option>
                        <option>24 (Vinte e quatro)</option>
                        <option>25 (Vinte e cinco)</option>
                        <option>26 (Vinte e seis)</option>
                        <option>27 (Vinte e sete)</option>
                        <option>28 (Vinte e oito)</option>
                        <option>29 (Vinte e nove)</option>
                        <option>30 (Trinta)</option>
                        <option>31 (Trinta e Uma)</option>
                        <option>32 (Trinta e Duas)</option>
                        <option>33 (Trinta e Três)</option>                                            
                        <option>34 (Trinta e Quatro)</option>
                        <option>35 (Trinta e Cinco)</option>
                        <option>36 (Trinta e Seis)</option>
                        <option>37 (Trinta e Sete)</option>
                        <option>38 (Trinta e Oito)</option>
                        <option>39 (Trinta e Nove)</option>
                        <option>40 (Quarenta)</option>
                        </select>
                    </div> 
                    </div>
                </div>
                <div class="form-group" id="selectHorario">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <input type="checkbox" onclick="mudarHorario();"/>
                        </span>
                        <input type="text" value="Mudar Horário de Estágio" style="cursor:default;" class="form-control" disabled/>
                    </div>
                </div>
              </div>
              <!-- /.box-body -->
            </div>
        </div></center>
        <div class="col-md-12" id="horarios" onclick="mudarHorario()" style="display:none;">
            <div class="box box-default">
              <div class="box-header with-border">
                <i class="fa fa-warning"></i>
                <h3 class="box-title">Horário do Estágio</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table class="table table-hover table-bordered" id="tabela">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Manhã</th>
                        <th>Tarde</th>
                        <th>Noite</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Segunda</td>
                        <td>De <input type="text" name="segundaManhaIni" id="Hora" maxlength="5" minlength="5" style="width: 30% ">hrs ás <input type="text" name="segundaManhaFim" id="Hora" maxlength="5" minlength="5" style="width: 30% ">hrs</td>
                        <td>De <input type="text" name="segundaTardeIni" id="Hora" maxlength="5" minlength="5" style="width: 30% ">hrs ás <input type="text" name="segundaTardeFim" id="Hora" maxlength="5" minlength="5" style="width: 30% ">hrs</td>
                        <td>De <input type="text" name="segundaNoiteIni" id="Hora" maxlength="5" minlength="5" style="width: 30% ">hrs ás <input type="text" name="segundaNoiteFim" id="Hora" maxlength="5" minlength="5" style="width: 30% ">hrs</td>
                    </tr>
                    <tr>
                        <td>Terça</td>
                        <td>De <input type="text" name="tercaManhaIni" id="Hora" maxlength="5" minlength="5" style="width: 30% ">hrs ás <input type="text" name="tercaManhaFim" id="Hora" maxlength="5" minlength="5" style="width: 30% ">hrs</td>
                        <td>De <input type="text" name="tercaTardeIni" id="Hora" maxlength="5" minlength="5" style="width: 30% ">hrs ás <input type="text" name="tercaTardeFim" id="Hora" maxlength="5" minlength="5" style="width: 30% ">hrs</td>
                        <td>De <input type="text" name="tercaNoiteIni" id="Hora" maxlength="5" minlength="5" style="width: 30% ">hrs ás <input type="text" name="tercaNoiteFim" id="Hora" maxlength="5" minlength="5" style="width: 30% ">hrs</td>
                    </tr>
                    <tr>
                        <td>Quarta</td>
                        <td>De <input type="text" name="quartaManhaIni" id="Hora" maxlength="5" minlength="5" style="width: 30% ">hrs ás <input type="text" name="quartaManhaFim" id="Hora" maxlength="5" minlength="5" style="width: 30% ">hrs</td>
                        <td>De <input type="text" name="quartaTardeIni" id="Hora" maxlength="5" minlength="5" style="width: 30% ">hrs ás <input type="text" name="quartaTardeFim" id="Hora" maxlength="5" minlength="5" style="width: 30% ">hrs</td>
                        <td>De <input type="text" name="quartaNoiteIni" id="Hora" maxlength="5" minlength="5" style="width: 30% ">hrs ás <input type="text" name="quartaNoiteFim" id="Hora" maxlength="5" minlength="5" style="width: 30% ">hrs</td>
                    </tr>
                    <tr>
                        <td>Quinta</td>
                        <td>De <input type="text" name="quintaManhaIni" id="Hora" maxlength="5" minlength="5" style="width: 30% ">hrs ás <input type="text" name="quintaManhaFim" id="Hora" maxlength="5" minlength="5" style="width: 30% ">hrs</td>
                        <td>De <input type="text" name="quintaTardeIni" id="Hora" maxlength="5" minlength="5" style="width: 30% ">hrs ás <input type="text" name="quintaTardeFim" id="Hora" maxlength="5" minlength="5" style="width: 30% ">hrs</td>
                        <td>De <input type="text" name="quintaNoiteIni" id="Hora" maxlength="5" minlength="5" style="width: 30% ">hrs ás <input type="text" name="quintaNoiteFim" id="Hora" maxlength="5" minlength="5" style="width: 30% ">hrs</td>
                    </tr>
                    <tr>
                        <td>Sexta</td>
                        <td>De <input type="text" name="sextaManhaIni" id="Hora" maxlength="5" minlength="5" style="width: 30% ">hrs ás <input type="text" name="sextaManhaFim" id="Hora" maxlength="5" minlength="5" style="width: 30% ">hrs</td>
                        <td>De <input type="text" name="sextaTardeIni" id="Hora" maxlength="5" minlength="5" style="width: 30% ">hrs ás <input type="text" name="sextaTardeFim" id="Hora" maxlength="5" minlength="5" style="width: 30% ">hrs</td>
                        <td>De <input type="text" name="sextaNoiteIni" id="Hora" maxlength="5" minlength="5" style="width: 30% ">hrs ás <input type="text" name="sextaNoiteFim" id="Hora" maxlength="5" minlength="5" style="width: 30% ">hrs</td>
                    </tr>
                    <tr>
                        <td>Sábado</td>
                        <td>De <input type="text" name="sabadoManhaIni" id="Hora" maxlength="5" minlength="5" style="width: 30% ">hrs ás <input type="text" name="sabadoManhaFim" id="Hora" maxlength="5" minlength="5" style="width: 30% ">hrs</td>
                        <td>De <input type="text" name="sabadoTardeIni" id="Hora" maxlength="5" minlength="5" style="width: 30% ">hrs ás <input type="text" name="sabadoTardeFim" id="Hora" maxlength="5" minlength="5" style="width: 30% ">hrs</td>
                        <td>De <input type="text" name="sabadoNoiteIni" id="Hora" maxlength="5" minlength="5" style="width: 30% ">hrs ás <input type="text" name="sabadoNoiteFim" id="Hora" maxlength="5" minlength="5" style="width: 30% ">hrs</td>
                    </tr>
                    </tbody>
                    
                </table>
              </div>
              <!-- /.box-body -->
            </div>
        </div>

     </div>
    <?php 
        setlocale(LC_ALL, "pt_BR", "pt_BR.utf-8", "pt_BR.utf-8", "portuguese");
        date_default_timezone_set("America/Sao_Paulo");
        $data_atual = strftime("%d de %B de %Y", strtotime("today"));
    ?>
    <input type="hidden" value="'.$noticias->dt_fim.'" name="dataFiim" id="dt_fim_hidden">
    <input type="hidden" value="'.$noticias->valor.'" name="valor" id="valor_hidden">
    <input type="hidden" value="naum_mudou" name="naum" id="naum_hidden">
    <input type="hidden" value="'.$noticias->carga_horaria.'" name="carga_horaria" id="carga_horaria_hidden">
    <input type="hidden" value="'.$noticias2->matricula.'" name="matricula_aluno">
    <input type="hidden" value="'.$noticias->id_termo_compromisso.'" name="id_valor">
    <center><button type="submit" class="btn btn-primary">ENVIAR</button></center>
                 ';
              
  echo '</div>';  
}
if ($resulatdo == 0) {
    echo utf8_encode('<option>NENHUM RESULTADO ENCONTRADO!</option>');} 

// Acentuação
@header("Content-Type: text/html; charset=ISO-8859-1",true);
?>