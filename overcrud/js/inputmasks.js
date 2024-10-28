//MÁSCARA PARA TELEFONE
const handlePhone = (evento) => {
    let input = evento.target;
    input.value = phoneMask(input.value);
};

const phoneMask = (valor) => {
    if(!valor) return "";
    valor = valor.replace(/\D/g,'');
    valor = valor.replace(/(\d{2})(\d)/,"($1) $2");
    valor = valor.replace(/(\d)(\d{4})$/,"$1-$2");
    return valor;
};

