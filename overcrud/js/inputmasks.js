//------------------------------------------------------------------
//MÁSCARA PARA TELEFONE
const handlePhone = (evento) => {
    let inputPhone = evento.target;
    inputPhone.value = phoneMask(inputPhone.value);
};

const phoneMask = (valor) => {
    if(!valor) return "";
    valor = valor.replace(/\D/g,'');
    valor = valor.replace(/(\d{2})(\d)/,"($1) $2");
    valor = valor.replace(/(\d)(\d{4})$/,"$1-$2");
    return valor;
};


//------------------------------------------------------------------
//MÁSCARA PARA CPF
const handleCpf = (evento) => {
    let inputCpf = evento.target;
    inputCpf.value = cpfMask(inputCpf.value);
};

function cpfMask(valor){
    valor = valor.replace(/\D/g,"");
    valor = valor.replace(/(\d{3})(\d)/,"$1.$2")   ;
    valor = valor.replace(/(\d{3})(\d)/,"$1.$2");
    valor = valor.replace(/(\d{3})(\d{1,2})$/,"$1-$2");
    return valor;
}


//------------------------------------------------------------------
//MÁSCARA PARA CNPJ
const handleCnpj = (evento) => {
    let inputCnpj = evento.target;
    inputCnpj.value = cnpjMask(inputCnpj.value);
};

function cnpjMask(valor){
    valor = valor.replace(/\D/g,"");
    valor = valor.replace(/^(\d{2})(\d)/,"$1.$2");
    valor = valor.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3");
    valor = valor.replace(/\.(\d{3})(\d)/,".$1/$2");
    valor = valor.replace(/(\d{4})(\d)/,"$1-$2");
    return valor;
};

