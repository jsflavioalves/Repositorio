
var req;

// FUNÇÃO PARA BUSCA NOTICIA
function buscarNoticias_bls_tcen(valor) {

// Verificando Browser
if(window.XMLHttpRequest) {
   req = new XMLHttpRequest();
}
else if(window.ActiveXObject) {
   req = new ActiveXObject("Microsoft.XMLHTTP");
}

// Arquivo PHP juntamente com o valor digitado no campo (método GET)
var url = "busca_bls_tcen.php?valor="+valor;

// Chamada do método open para processar a requisição
req.open("Get", url, true);

// Quando o objeto recebe o retorno, chamamos a seguinte função;
req.onreadystatechange = function() {

	// Exibe a mensagem "Buscando Noticias..." enquanto carrega
	if(req.readyState == 1) {
		document.getElementById('resultado_bls_tcen').innerHTML = 'Buscando...';
	}

	// Verifica se o Ajax realizou todas as operações corretamente
	if(req.readyState == 4 && req.status == 200) {

	// Resposta retornada pelo busca_bls_tcen.php
	var resposta = req.responseText;

	// Abaixo colocamos a(s) resposta(s) na div resultado_bls_tcen
	document.getElementById('resultado_bls_tcen').innerHTML = resposta;
	}
}
req.send(null);
}

// FUNÇÃO PARA EXIBIR NOTICIA
function exibirConteudo_bls_tcen(id) {
 
// Verificando Browser
if(window.XMLHttpRequest) {
   req = new XMLHttpRequest();
}
else if(window.ActiveXObject) {
   req = new ActiveXObject("Microsoft.XMLHTTP");
}
 
// Arquivo PHP juntamento com a id da noticia (método GET)
var url = "exibir.php?nome="+nome;
 
// Chamada do método open para processar a requisição
req.open("Get", url, true);
 
// Quando o objeto recebe o retorno, chamamos a seguinte função;
req.onreadystatechange = function() {
 
	// Exibe a mensagem "Aguarde..." enquanto carrega
	if(req.readyState == 1) {
		document.getElementById('conteudo_bls_tcen').innerHTML = 'Aguarde...';
	}
 
	// Verifica se o Ajax realizou todas as operações corretamente
	if(req.readyState == 4 && req.status == 200) {
 
	// Resposta retornada pelo exibir.php
	var resposta = req.responseText;
 
	// Abaixo colocamos a resposta na div conteudo_bls_tcen
	document.getElementById('conteudo_bls_tcen').innerHTML = resposta;
	}
}
req.send(null);
}