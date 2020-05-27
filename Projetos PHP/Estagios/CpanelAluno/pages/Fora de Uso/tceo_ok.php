<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-6">
        <div class="box box-default">
          <div class="box-header with-border">
            <i class="fa fa-warning"></i>
            <h3 class="box-title">Dados da Unidade Concedente</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="form-group" id="pesquisa">
                <div class="input-icon right" id="busca">
                    <input id="inputName" onkeyup="buscarNoticias(this.value)" type="text" placeholder="NOME DA EMPRESA" class="form-control" />
                </div>
                <form action="../../CpanelAluno/pages/inserir_tceo.php" method="POST" onsubmit="javascript: abreResposta(this)">
                <div id="resultado"></div>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        </div>

        <div class="col-lg-6" style="display:none;" id="divAluno" onclick="divAluno()">
        <div class="box box-default">
          <div class="box-header with-border">
            <i class="fa fa-warning"></i>
            <h3 class="box-title">Dados do Aluno</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="form-group">
                <div class="input-icon right">
                    <strong><input name="nomeAluno" id="inputName" type="text" <?php echo utf8_encode('value="'.$input.'"');?> class="form-control"  /></strong>
                </div>
            </div>
            <div class="form-group">
                <div class="input-icon right">
                    <strong><input name="cpf" id="cpf_aluno" <?php echo utf8_encode('value="'.$cpf.'"');?> type="text"  class="form-control"  /></strong>
                </div>
            </div>
            <div class="form-group">
                <div class="input-icon right">
                    <strong><input name="foneAluno" id="fone" <?php echo utf8_encode('value="'.$telefone.'"');?> type="text" class="form-control"  /></strong>
                </div>
            </div>
            <div class="form-group">
                <div class="input-icon right">
                   <strong> <input name="mae" id="inputName" type="text" <?php echo utf8_encode('value="'.$nome_mae.'"');?> class="form-control"  /></strong>
                </div>
            </div>
            <div class="form-group">
                <div class="input-icon right">
                   <strong> <input name="matricula" id="inputName" type="text" <?php echo utf8_encode('value="'.$matricula.'"');?> class="form-control"  /></strong>
                </div>
            </div>
            <div class="col-lg-7" style="float:left; padding:0; margin-right:2px;">
                <div class="form-group">
                    <div class="form-group">
                <div class="input-icon right">
                   <strong> <input name="curso" id="inputName" type="text" <?php echo utf8_encode('value="'.$curso.'"');?> class="form-control"  /></strong>
                </div>
            </div>
                </div>
            </div>
            <div class="col-lg-4" style="float:right; padding:0;">
                <div class="form-group">
                    <div class="input-icon right">
                        <!-- <strong>Semestre</strong> -->
                        <input name="semestre" id="inputName" type="number" placeholder="Semestre" class="form-control"  style="margin-right:0" required />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-icon right">
                    <strong><input name="enderecoAluno" id="inputName" type="text" <?php echo utf8_encode('value="'.$endereco.'"');?> class="form-control"  /></strong>
                </div>
            </div>
            <div class="form-group">
                <div class="input-icon right" style="width:70%;float:left">
                    <strong><input name="cidadeAluno" id="inputName"  type="text" <?php echo utf8_encode('value="'.$cidade.'"');?>  class="form-control"  /></strong>
                </div>
                <div class="input-icon right" style="width:25%;float:right">
                   <strong> <input name="ufAluno" id="inputName" type="text" <?php echo utf8_encode('value="'.$uf.'"');?> class="form-control"  /></strong>
                </div>
            </div>
            <div class="form-group">
                <div class="input-icon right">
                    <br><br><br><div class="btn btn-primary pull-right" onclick="divOrientador();" id="btn2">PROXIMO PASSO >></div>
                </div>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="col-lg-6" style="display:none;" id="div_orientador" onclick="divOrientador();" >
        <div class="box box-default">
          <div class="box-header with-border">
            <i class="fa fa-warning"></i>
            <h3 class="box-title">Dados do Professor Orientador</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="form-group">
                <div class="input-icon right">
                    <input name="nomeOrientador" id="inputName" type="text" placeholder="Nome"  class="form-control" required/></div>
            </div>
            <div class="form-group">
                <div class="input-icon right">
                    <input name="siape" id="inputEmail" type="text" placeholder="SIAPE"  class="form-control" required /></div>
            </div>
            <div class="form-group">
                <div class="input-icon right">
                    <input name="foneOrientador" id="fone2" onkeypress="telefone2(fone2)" maxlength="15" type="text"  placeholder="Fone" class="form-control" required /></div>
            </div>
            <div class="form-group">
                <div class="input-icon right">
                    <input name="lotacao" id="inputConfirmPassword" type="text" placeholder="Lotação"  class="form-control" required /></div>
            </div>
            <div class="form-group">
                <div class="input-icon right">
                    <br><div class="btn btn-primary pull-right" onclick="divOutros();" id="btn3">PROXIMO PASSO >></div>
                </div>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        </div>
        <div class="col-lg-6" style="display:none;" id="divOutros" onclick="divOutros();" >
        <div class="box box-default">
          <div class="box-header with-border">
            <i class="fa fa-warning"></i>
            <h3 class="box-title">Outros Dados</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="form-group">
                <div class="input-icon right">
                <textarea name="atividades" style="width:100%;height:45px;" style="text-transform:uppercase;" placeholder="ATIVIDADES PREVISTAS" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="input-icon right">
                <strong>Inicio do Estágio</strong>
                <strong><input name="dataInicio" id="dataEst" <?php echo utf8_encode('value="'.$data.'"');?> type="text"  class="form-control" /></div></strong>
            </div>
            <div class="form-group">
                <div class="input-icon right">
                <strong>Fim do Estágio</strong>
                <input name="dataFim" id="dataEst" onkeypress="dataEstagio(this)" maxlength="10" type="text" placeholder="dd/mm/aaaa" class="form-control" required /></div>
            </div>
                <div class="form-group">
                    <div class="input-icon right">
                        <!-- <strong>Compreendendo</strong> -->
                        <select name="meses" id="inputName" class="form-control" required>
                            <option selected="selected">Compreendendo</option>
                            <option>1 (Um) Mês</option>
                            <option>2 (Dois) Meses</option>
                            <option>3 (Três) Meses</option>                                            
                            <option>4 (Quatro) Meses</option>
                            <option>5 (Cinco) Meses</option>
                            <option>6 (Seis) Meses</option>
                            <option>7 (Sete) Meses</option>
                            <option>8 (Oito) Meses</option>
                            <option>9 (Nove) Meses</option>
                            <option>10 (Dez) Meses</option>
                            <option>11 (Onze) Meses</option>
                            <option>12 (Doze) Meses</option>
	                        <option>13 (Treze) Meses</option>
	                        <option>14 (Quatorze) Meses</option>
	                        <option>15 (Quinze) Meses</option>                                            
	                        <option>16 (Dezesseis) Meses</option>
	                        <option>17 (Dezessete) Meses</option>
	                        <option>18 (Dezoito) Meses</option>
	                        <option>19 (Dezenove) Meses</option>
	                        <option>20 (Vinte) Meses</option>
	                        <option>21 (Vinte e uma) Meses</option>
	                        <option>22 (Vinte e duas) Meses</option>
	                        <option>23 (Vinte e três) Meses</option>
	                        <option>24 (Vinte e quatro) Meses</option>
                        </select>
                    </div>
                </div>
                <strong>Carga Horaria Semanal</strong>
                <div class="form-group">
                    <div class="input-icon right">
                    <div class="input-group" id="op1">
                        <span class="input-group-addon">
                          <input type="checkbox" onclick="escolha01();">
                        </span>
                    <input type="text" class="form-control" title="40 HRS - SEM MATRICULA EM DISCIPLINA PRESENCIAL" value="ATE 40 HRS - SEM MATRICULA EM DISCIPLINA PRESENCIAL" >
                  </div>
                  <br>
                  <div class="input-group" id="op2">
                        <span class="input-group-addon">
                          <input type="checkbox" onclick="escolha02();">
                        </span>
                    <input type="text" title="30 HRS - COM MATRICULA EM DISCIPLINA PRESENCIAL" value="ATE 30 HRS - COM MATRICULA EM DISCIPLINA PRESENCIAL" class="form-control" >
                  </div>
                    <!-- <strong>Horas Semanais</strong> -->
                    <select name="horasSemanais"  id="escolha1" onclick="escolha1()" class="form-control"  style="display:none;" required>
                        <option selected="selected">Horas Semanais</option>
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
                    <select name="horasSemanais"  id="escolha2" onclick="escolha2()" class="form-control" required style="display:none;">
                        <option selected="selected">Horas Semanais</option>
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
                        

                    </select>
                    </div>
                </div>
            <div class="col-lg-5" style="float:left; padding:0; padding-top:7px;">
                <strong>Valor da Bolsa Auxilio</strong>
            </div>
            <div class="col-lg-7" style="float:right; padding:0;">
                <div class="input-group" style="width: 100% "><span class="input-group-addon">R$</span><input name="valor" type="text" onkeypress="mascara( this, mvalor );" maxlength="14" class="form-control" required/></div>
            </div>
            <div class="form-group">
                <div class="input-icon right">
                    <br><br><br><div class="btn btn-primary pull-right" onclick="divOutros2();" id="btn4">PROXIMO PASSO >></div>
                </div>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-12" style="display:none;" id="divOutros2" onclick="divOutros2();">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Horário do Estágio</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
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
                    <td>De <input type="text" name="segundaManhaIni" id="Hora" minlength="4"  OnKeypress="mascara(this, mhora)" size="5" maxlength="5" style="width: 30% ">hrs ás <input type="text" name="segundaManhaFim" id="Hora" minlength="4"  OnKeypress="mascara(this, mhora)" size="5" maxlength="5" style="width: 30% ">hrs</td>
                    <td>De <input type="text" name="segundaTardeIni" id="Hora" minlength="4"  OnKeypress="mascara(this, mhora)" size="5" maxlength="5" style="width: 30% ">hrs ás <input type="text" name="segundaTardeFim" id="Hora" minlength="4"  OnKeypress="mascara(this, mhora)" size="5" maxlength="5" style="width: 30% ">hrs</td>
                    <td>De <input type="text" name="segundaNoiteIni" id="Hora" minlength="4"  OnKeypress="mascara(this, mhora)" size="5" maxlength="5" style="width: 30% ">hrs ás <input type="text" name="segundaNoiteFim" id="Hora" minlength="4"  OnKeypress="mascara(this, mhora)" size="5" maxlength="5" style="width: 30% ">hrs</td>
                </tr>
                <tr>
                    <td>Terça</td>
                    <td>De <input type="text" name="tercaManhaIni" id="Hora" minlength="4"  OnKeypress="mascara(this, mhora)" size="5" maxlength="5" style="width: 30% ">hrs ás <input type="text" name="tercaManhaFim" id="Hora" minlength="4"  OnKeypress="mascara(this, mhora)" size="5" maxlength="5" style="width: 30% ">hrs</td>
                    <td>De <input type="text" name="tercaTardeIni" id="Hora" minlength="4"  OnKeypress="mascara(this, mhora)" size="5" maxlength="5" style="width: 30% ">hrs ás <input type="text" name="tercaTardeFim" id="Hora" minlength="4"  OnKeypress="mascara(this, mhora)" size="5" maxlength="5" style="width: 30% ">hrs</td>
                    <td>De <input type="text" name="tercaNoiteIni" id="Hora" minlength="4"  OnKeypress="mascara(this, mhora)" size="5" maxlength="5" style="width: 30% ">hrs ás <input type="text" name="tercaNoiteFim" id="Hora" minlength="4"  OnKeypress="mascara(this, mhora)" size="5" maxlength="5" style="width: 30% ">hrs</td>
                </tr>
                <tr>
                    <td>Quarta</td>
                    <td>De <input type="text" name="quartaManhaIni" id="Hora" minlength="4"  OnKeypress="mascara(this, mhora)" size="5" maxlength="5" style="width: 30% ">hrs ás <input type="text" name="quartaManhaFim" id="Hora" minlength="4"  OnKeypress="mascara(this, mhora)" size="5" maxlength="5" style="width: 30% ">hrs</td>
                    <td>De <input type="text" name="quartaTardeIni" id="Hora" minlength="4"  OnKeypress="mascara(this, mhora)" size="5" maxlength="5" style="width: 30% ">hrs ás <input type="text" name="quartaTardeFim" id="Hora" minlength="4"  OnKeypress="mascara(this, mhora)" size="5" maxlength="5" style="width: 30% ">hrs</td>
                    <td>De <input type="text" name="quartaNoiteIni" id="Hora" minlength="4"  OnKeypress="mascara(this, mhora)" size="5" maxlength="5" style="width: 30% ">hrs ás <input type="text" name="quartaNoiteFim" id="Hora" minlength="4"  OnKeypress="mascara(this, mhora)" size="5" maxlength="5" style="width: 30% ">hrs</td>
                </tr>
                <tr>
                    <td>Quinta</td>
                    <td>De <input type="text" name="quintaManhaIni" id="Hora" minlength="4"  OnKeypress="mascara(this, mhora)" size="5" maxlength="5" style="width: 30% ">hrs ás <input type="text" name="quintaManhaFim" id="Hora" minlength="4"  OnKeypress="mascara(this, mhora)" size="5" maxlength="5" style="width: 30% ">hrs</td>
                    <td>De <input type="text" name="quintaTardeIni" id="Hora" minlength="4"  OnKeypress="mascara(this, mhora)" size="5" maxlength="5" style="width: 30% ">hrs ás <input type="text" name="quintaTardeFim" id="Hora" minlength="4"  OnKeypress="mascara(this, mhora)" size="5" maxlength="5" style="width: 30% ">hrs</td>
                    <td>De <input type="text" name="quintaNoiteIni" id="Hora" minlength="4"  OnKeypress="mascara(this, mhora)" size="5" maxlength="5" style="width: 30% ">hrs ás <input type="text" name="quintaNoiteFim" id="Hora" minlength="4"  OnKeypress="mascara(this, mhora)" size="5" maxlength="5" style="width: 30% ">hrs</td>
                </tr>
                <tr>
                    <td>Sexta</td>
                    <td>De <input type="text" name="sextaManhaIni" id="Hora" minlength="4"  OnKeypress="mascara(this, mhora)" size="5" maxlength="5" style="width: 30% ">hrs ás <input type="text" name="sextaManhaFim" id="Hora" minlength="4"  OnKeypress="mascara(this, mhora)" size="5" maxlength="5" style="width: 30% ">hrs</td>
                    <td>De <input type="text" name="sextaTardeIni" id="Hora" minlength="4"  OnKeypress="mascara(this, mhora)" size="5" maxlength="5" style="width: 30% ">hrs ás <input type="text" name="sextaTardeFim" id="Hora" minlength="4"  OnKeypress="mascara(this, mhora)" size="5" maxlength="5" style="width: 30% ">hrs</td>
                    <td>De <input type="text" name="sextaNoiteIni" id="Hora" minlength="4"  OnKeypress="mascara(this, mhora)" size="5" maxlength="5" style="width: 30% ">hrs ás <input type="text" name="sextaNoiteFim" id="Hora" minlength="4"  OnKeypress="mascara(this, mhora)" size="5" maxlength="5" style="width: 30% ">hrs</td>
                </tr>
                <tr>
                    <td>Sábado</td>
                    <td>De <input type="text" name="sabadoManhaIni" id="Hora" minlength="4"  OnKeypress="mascara(this, mhora)" size="5" maxlength="5" style="width: 30% ">hrs ás <input type="text" name="sabadoManhaFim" id="Hora" minlength="4"  OnKeypress="mascara(this, mhora)" size="5" maxlength="5" style="width: 30% ">hrs</td>
                    <td>De <input type="text" name="sabadoTardeIni" id="Hora" minlength="4"  OnKeypress="mascara(this, mhora)" size="5" maxlength="5" style="width: 30% ">hrs ás <input type="text" name="sabadoTardeFim" id="Hora" minlength="4"  OnKeypress="mascara(this, mhora)" size="5" maxlength="5" style="width: 30% ">hrs</td>
                    <td>De <input type="text" name="sabadoNoiteIni" id="Hora" minlength="4"  OnKeypress="mascara(this, mhora)" size="5" maxlength="5" style="width: 30% ">hrs ás <input type="text" name="sabadoNoiteFim" id="Hora" minlength="4"  OnKeypress="mascara(this, mhora)" size="5" maxlength="5" style="width: 30% ">hrs</td>
                </tr>
                </tbody>
                
            </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </div>
    <?php 
        setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');
        $data_atual = strftime('%d de %B de %Y', strtotime('today'));
     ?>
    <input type="hidden" name="tipo_termo" value="OBRIGATORIO">
    <input type="hidden" name="id_aluno" <?php echo 'value='.$id.'' ?>>
    <input type="hidden" name="data_atual" <?php echo 'value='.$data_atual.'' ?>>
    <div class="col-md-12" id="btnTermo" style="display:none;" onclick="divOutros2();">
    <center><button type="submit" class="btn btn-primary" onclick="direct();">ENVIAR PARA CONFIRMAÇÃO</button></center>
    </div>
    </form>
    </div>