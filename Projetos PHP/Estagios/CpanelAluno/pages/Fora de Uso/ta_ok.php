<section class="content">
  <div class="col-md-2">
  </div>
  <div class="row">
    <div class="col-md-8">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Termo Aditivo</h3>
        </div>
        <div class="box-body">
          <div class="form-group" id="btn3" style="display: block;">
            <div class="form-group" id="pesquisa4">
              <div class="input-icon right" id="busca4">
                  <input id="inputName" onkeyup="buscarNoticias4(this.value)" type="number" placeholder="DIGITE O ID DO TERMO DE COMPROMISSO" class="form-control" />
              </div>
              <form action="../../CpanelAluno/pages/inserir_ta.php" method="POST" onsubmit="javascript: abreResposta(this)"><div id="resultado4"></div></form>
              <div id="conteudo4" onclick="siim2();" style="display:none">
                <div class="box-tools">
                  <div class="input-group input-group-sm" style="width: 200px;">
                    <input id="inputName1" onkeyup="buscarNoticias4(this.value)" type="number" placeholder="DIGITE O ID DO TERMO DE COMPROMISSO" class="form-control" />
                    <div class="input-group-btn" id="conteudo4" onclick="siim2();">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <!-- /.box -->
      </div>
    </div>
  </div>
  <div class="col-md-2">
  </div>          
  <!-- /.row -->
</section>