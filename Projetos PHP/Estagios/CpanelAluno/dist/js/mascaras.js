function cnpj (busca) {
    if (busca.value.length == 2) {
        busca.value = busca.value+'.';
    };
    if (busca.value.length == 6) {
        busca.value = busca.value+'.';
    };
    if (busca.value.length == 10) {
        busca.value = busca.value+'/';
    };
    if (busca.value.length == 15) {
        busca.value = busca.value+'-';
    };
}
function cpf (cpf1) {
    if (cpf1.value.length == 3) {
        cpf1.value = cpf1.value+'.';
    };
    if (cpf1.value.length == 7) {
        cpf1.value = cpf1.value+'.';
    };
    if (cpf1.value.length == 11) {
        cpf1.value = cpf1.value+'-';
    };
}
function cpf2 (cpf_aluno) {
    if (cpf_aluno.value.length == 3) {
        cpf_aluno.value = cpf_aluno.value+'.';
    };
    if (cpf_aluno.value.length == 7) {
        cpf_aluno.value = cpf_aluno.value+'.';
    };
    if (cpf_aluno.value.length == 11) {
        cpf_aluno.value = cpf_aluno.value+'-';
    };
}
function telefone(fone) {
    if (fone.value.length == 0) {
        fone.value = '('+fone.value;
    };
    if (fone.value.length == 3) {
        fone.value = fone.value+') ';
    };
    if (fone.value.length == 10) {
        fone.value = fone.value+'-';
    };
}
function telefone2(fone2) {
    if (fone2.value.length == 0) {
        fone2.value = '('+fone2.value;
    };
    if (fone2.value.length == 3) {
        fone2.value = fone2.value+') ';
    };
    if (fone2.value.length == 10) {
        fone2.value = fone2.value+'-';
    };
}
function fone_pro(editar_telefone) {
    if (editar_telefone.value.length == 0) {
        editar_telefone.value = '('+editar_telefone.value;
    };
    if (editar_telefone.value.length == 3) {
        editar_telefone.value = editar_telefone.value+') ';
    };
    if (editar_telefone.value.length == 10) {
        editar_telefone.value = editar_telefone.value+'-';
    };
}
function telefone_pro2(editar_telefone2) {
    if (editar_telefone2.value.length == 0) {
        editar_telefone2.value = '('+editar_telefone2.value;
    };
    if (editar_telefone2.value.length == 3) {
        editar_telefone2.value = editar_telefone2.value+') ';
    };
    if (editar_telefone2.value.length == 10) {
        editar_telefone2.value = editar_telefone2.value+'-';
    };
}
function telefone3(fone3) {
    if (fone3.value.length == 0) {
        fone3.value = '('+fone3.value;
    };
    if (fone3.value.length == 3) {
        fone3.value = fone3.value+') ';
    };
    if (fone3.value.length == 10) {
        fone3.value = fone3.value+'-';
    };
}
function apolic(apol) {
    if (apol.value.length == 3) {
        apol.value = apol.value+'.';
    };
    if (apol.value.length == 9) {
        apol.value = apol.value+'.';
    };
    if (apol.value.length == 15) {
        apol.value = apol.value+'-';
    };
}
function dataEstagio(dataEst) {
    if (dataEst.value.length == 2) {
        dataEst.value = dataEst.value+'/';
    };
    if (dataEst.value.length == 5) {
        dataEst.value = dataEst.value+'/';
    };
}
function cargaH(carga) {
    if (carga.value.length == 1) {
        carga.value = carga.value+' (';
    };
    if (carga.value.length == 5) {
        carga.value = carga.value+') Mês (es)';
    };
}
function Mascara_Hora(Hora){ 
var hora01 = ''; 
hora01 = hora01 + Hora; 
if (hora01.length == 2){ 
hora01 = hora01 + ':'; 
document.forms[0].Hora.value = hora01; 
} 
if (hora01.length == 5){ 
Verifica_Hora(); 
} 
} 
           
function Verifica_Hora(){ 
hrs = (document.forms[0].Hora.value.substring(0,2)); 
min = (document.forms[0].Hora.value.substring(3,5)); 
               
estado = ""; 
if ((hrs < 00 ) || (hrs > 23) || ( min < 00) ||( min > 59)){ 
estado = "errada"; 
} 
               
if (document.forms[0].Hora.value == "") { 
estado = "errada"; 
} 
 
if (estado == "errada") { 
alert("Hora inválida!"); 
document.forms[0].Hora.focus(); 
} 
} 