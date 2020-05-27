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
function cnpj2(cnpj) {
    if (cnpj.value.length == 2) {
        cnpj.value = cnpj.value+'.';
    };
    if (cnpj.value.length == 6) {
        cnpj.value = cnpj.value+'.';
    };
    if (cnpj.value.length == 10) {
        cnpj.value = cnpj.value+'/';
    };
    if (cnpj.value.length == 15) {
        cnpj.value = cnpj.value+'-';
    };
}
function processo2 (mask) {
  if (mask.value.length == 6) {
      mask.value = mask.value+'/';
  };
  if (mask.value.length == 9) {
      mask.value = mask.value+'-';
  };
}
function processo3 (mask3) {
  if (mask3.value.length == 6) {
      mask3.value = mask3.value+'/';
  };
  if (mask3.value.length == 9) {
      mask3.value = mask3.value+'-';
  };
}

function inserir_conv(mascara) {
  if (mascara.value.length == 2) {
      mascara.value = mascara.value+'-';
  };
  if (mascara.value.length == 5) {
      mascara.value = mascara.value+'-';
  };
}
function inserir_conv1(mascara1) {
  if (mascara1.value.length == 2) {
      mascara1.value = mascara1.value+'-';
  };
  if (mascara1.value.length == 5) {
      mascara1.value = mascara1.value+'-';
  };
}
function data3(conv) {
  if (conv.value.length == 2) {
      conv.value = conv.value+'/';
  };
  if (conv.value.length == 5) {
      conv.value = conv.value+'/';
  };
}
function data4(conv1) {
  if (conv1.value.length == 2) {
      conv1.value = conv1.value+'/';
  };
  if (conv1.value.length == 5) {
      conv1.value = conv1.value+'/';
  };
}
function data5(conv2) {
  if (conv2.value.length == 2) {
      conv2.value = conv2.value+'/';
  };
  if (conv2.value.length == 5) {
      conv2.value = conv2.value+'/';
  };
}
function data6(conv3) {
  if (conv3.value.length == 2) {
      conv3.value = conv3.value+'/';
  };
  if (conv3.value.length == 5) {
      conv3.value = conv3.value+'/';
  };
}
function data7(conv4) {
  if (conv4.value.length == 2) {
      conv4.value = conv4.value+'/';
  };
  if (conv4.value.length == 5) {
      conv4.value = conv4.value+'/';
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