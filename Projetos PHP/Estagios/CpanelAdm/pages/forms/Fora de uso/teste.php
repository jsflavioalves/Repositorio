<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script>
	window.onload = function(){
	var entidade = document.getElementById('imagem');
  	var ampliar = document.getElementById('ampliar');
  	var diminuir = document.getElementById('diminuir');

  	// Altere o número para a apliação/redução desejada
  	var fator_lupa = 2;
  	ampliar.onclick = function () { entidade.style.width = (this.clientWidth * fator_lupa) + "px"; };

  	var fator_lupa = 2;
  	diminuir.onclick = function () { entidade.style.width = (this.clientWidth / fator_lupa) + "px"; };

  
}

	</script>
</head>
<body>
	<img src="vagas_foto/UFC.png" id="imagem">
	<button id="ampliar">AMPLIAR</button>
	<button id="diminuir">DIMINUIR</button>
</body>
</html>