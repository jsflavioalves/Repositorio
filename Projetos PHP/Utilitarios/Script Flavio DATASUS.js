var ARR = ['44198485372','02992354325','04246669369','01028858345','04230601395','99308290320','01678446360','02047180317','04328565362','03748031378','46589813353','03662603322','04126814396','04132752305','04610247305','93227256304','07185723353','95235280253','03688469380','67280390315','08948529498','05585602373','00137708378','03578653322','09119248334','04589537338','60485715341','04822588378','04590197324','73959391749','01055119353','03431545360','05244283367','01148348301','04994244332','04933200327','04934759310','03422406336','05435517338','02676461192','05073580311','05755792348','05415676325','03903031356','60423491393','66261694249','01113877367','03684409316','04334011330','05537743361','04320933389','05958209302','04348742308','08396740402','00354583301','01944989560','96238887320','03330994355','04483747304','04252784336','05444599384','00745100376','93353804315','01762905329','71088300197','03208803389', '06149575322','05081182559','04584458359','02413258388','03148228367','03755326337','04230074328','03941651366','64407500387','03303755396','03777466301','04991813360','04225315371','38008246391','60574468366','05271283330','05373730394','83825592391','05084267318','01339587360','03465718399','00469227338','04889343385','02461077312','04250300323','03611126373','00480942269','03164064306','04202584341','03623101303','00580437213','01874529388','02081690241','05333994323','93065450534','02181526397','02915475326','51401169287','02394279397','60736373306','02564704301'];
var index = -1;

//chama-se assim: next();
function next(){
	console.log('index;cpf;nome;cns;cbo;cnes;equipe;uf;coMun;noMun');	
	next();
}
function next(){
	index++;
	if(ARR[index])
		get1(ARR[index]);
}
function get1(cpf){
	$.ajax({
		method: "GET",
		url: "http://cnes.datasus.gov.br/services/profissionais?cpf=" + cpf  
	})
	.done(function( data ) {
		if(data == "" || data.length == 0) {
			var cpf = ARR[index];
			console.log(index + ';' + cpf);
			next();
		}
		else {
			if(data[0].cns) {
				var id = data[0].id;
				get11(id);
			}
			else {
				console.log('erro 01 parou em cpf: ' + cpf);
			}
		}
	})
	.fail(function() {
		var cpf = ARR[index];
		console.log(index + ';' + cpf);
		next();
    });
}
function get11(id){
	$.ajax({
		method: "GET",
		url: "http://cnes.datasus.gov.br/services/profissionais-equipes/" + id  
	})
	.done(function( data ) {
		if(data == "") {
			alert("Não encontrado get11!");
		}
		else {
			if(data.vinculos.length > 0 && data.vinculos[0]) {
				var cpf = ARR[index];
				var nome = data.nome;
				var cns = data.cns;
				var cbo = data.vinculos[0].cbo;
				var cnes = data.vinculos[0].cnes;
				var equipe = data.vinculos[0].coEquipe;
				var uf = data.vinculos[0].estado;
				var coMun = data.vinculos[0].coMunicipio;
				var noMun = data.vinculos[0].noMunicipio;
				console.log(index + ';' + cpf + ';' + nome + ';' + cns + ';' + cbo + ';' + cnes + ';' + equipe + ';' + uf + ';' + coMun + ';' + noMun);
				next();
			} 
			else{
				console.log('não tem vinculo');
			}
		}		
	})
	.fail(function() {
		var cpf = ARR[index];
		//console.log(index + ';' + cpf);
		//next();
		get2(id);
    });
}
function get2(id){
	$.ajax({
		method: "GET",
		url: "http://cnes.datasus.gov.br/services/profissionais/" + id  
	})
	.done(function( data ) {
		if(data == "") {
			alert("Não encontrado get2!");
		}
		else {
			if(data.vinculos.length > 0 && data.vinculos[0]) {
				var cpf = ARR[index];
				var nome = data.nome;
				var cns = data.cns;
				var cbo = data.vinculos[0].cbo;
				var cnes = data.vinculos[0].cnes;
				var equipe = '';
				var uf = data.vinculos[0].estado;
				var coMun = data.vinculos[0].coMun;
				var noMun = data.vinculos[0].noMun;
				console.log(index + ';' + cpf + ';' + nome + ';' + cns + ';' + cbo + ';' + cnes + ';' + equipe + ';' + uf + ';' + coMun + ';' + noMun);
				next();
			} 
			else{
				console.log('não tem vinculo');
			}
		}		
	})
	.fail(function() {
		var cpf = ARR[index];
		console.log(index + ';' + cpf);
		next();
    });
}