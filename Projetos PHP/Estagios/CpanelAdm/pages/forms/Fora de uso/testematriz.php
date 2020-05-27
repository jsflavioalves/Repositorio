<?php
$frutas = array (
    "frutas" => array("a"=>"laranja", "b"=>"banana", "c"=>"maçã"),
    "numeros" => array(1, 2, 3, 4, 5, 6),
    "buracos" => array("primeiro", 5 => "segundo", "terceiro")
);
print_r($frutas);

$array = array(1, 1, 1, 1,  1, 8 => 1,  4 => 1, 19, 3 => 13);
print_r($array);



$firstquarter = array(1 => 'Janeiro', 'Fevereiro', 'Março');
print_r($firstquarter);




?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<br><br>


					<div id="conteudo" style="display:block">
                      <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                          <!-- FUNÇÃO (funcs_tce.js) E BUSCA (busca_tce.php) -->
                          <input onkeyup="buscarNoticias11(this.value)" type="text" placeholder="QUANTIDADE11" class="form-control" />
                          <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <form action="acao_tce.php" enctype="multipart/form-data" method="POST">
                    <div id="resultado_tce">
                      
                      
                    </div>

                    </form>

<form action="testematrizphp.php" enctype="multipart/form-data" method="POST">

<input type="text" class="form-control" name="valor" placeholder="QUANTIDADE">
<input type="submit" name="adc" value="adcionar">

</form>



</body>
</html>