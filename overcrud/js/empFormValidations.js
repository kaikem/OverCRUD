//-----------------------------------------------------------------
//VARIÁVEIS DOM
//empresa
const formEmp = document.querySelector('.needs-validation');
const inputCnpj = document.getElementById('cnpj');
const inputNome = document.getElementById('nome');
const inputFantasia = document.getElementById('fantasia');
const inputResponsavel = document.getElementById('responsavel');
const inputTelefone = document.getElementById('telefone');

//endereço
const inputCep = document.getElementById('cep');
const inputCidade = document.getElementById('cidadeestado');
const inputEstado = document.getElementById('estadocidade');
const inputLogradouro = document.getElementById('logradouro');
const inputNumlogradouro = document.getElementById('numlogradouro');
const inputBairro = document.getElementById('bairro');


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


//-----------------------------------------------------------------
//VALIDAÇÃO DE CNPJ
function validaCNPJ() {
    let inputCnpjValue = inputCnpj.value;

    cnpj = inputCnpjValue.replace(/[^\d]+/g,'');
 
    if(cnpj == '') return false;
     
    if (cnpj.length != 14)
        return false;
 
    // Elimina CNPJs invalidos conhecidos
    if (cnpj == "00000000000000" || 
        cnpj == "11111111111111" || 
        cnpj == "22222222222222" || 
        cnpj == "33333333333333" || 
        cnpj == "44444444444444" || 
        cnpj == "55555555555555" || 
        cnpj == "66666666666666" || 
        cnpj == "77777777777777" || 
        cnpj == "88888888888888" || 
        cnpj == "99999999999999")
        return false;
         
    // Valida DVs
    tamanho = cnpj.length - 2
    numeros = cnpj.substring(0,tamanho);
    digitos = cnpj.substring(tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(0))
        return false;
         
    tamanho = tamanho + 1;
    numeros = cnpj.substring(0,tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(1))
          return false;
           
    return true;  
};

//Atualizar status do CNPJ na página
function atualizaCNPJ(){
    let inputCnpjValue = document.getElementById('cnpj').value;
    let retornoCnpj = validaCNPJ(inputCnpjValue);

    if(!retornoCnpj){
        inputCnpj.classList.add('is-invalid');
        inputCnpj.classList.remove('is-valid');
        return false;
    }else{
        inputCnpj.classList.remove('is-invalid');
        inputCnpj.classList.add('is-valid');
        return true;
    };
};


//-----------------------------------------------------------------
//VALIDAÇÕES DE INPUTS
//nome
function validaNome(){
    let inputNomeValue = document.getElementById('nome').value;
    if(inputNomeValue.length<1){
        inputNome.classList.add('is-invalid');
        inputNome.classList.remove('is-valid');
        return false;
    }else{
        inputNome.classList.remove('is-invalid');
        inputNome.classList.add('is-valid');
        return true;
    };
}

//fantasia
function validaFantasia(){
    let inputFantasiaValue = document.getElementById('fantasia').value;
    if(inputFantasiaValue.length<1){
        inputFantasia.classList.add('is-invalid');
        inputFantasia.classList.remove('is-valid');
        return false;
    }else{
        inputFantasia.classList.remove('is-invalid');
        inputFantasia.classList.add('is-valid');
        return true;
    };
}

//responsável
function validaResponsavel(){
    let inputResponsavelValue = document.getElementById('responsavel').value;
    if(inputResponsavelValue.length<1){
        inputResponsavel.classList.add('is-invalid');
        inputResponsavel.classList.remove('is-valid');
        return false;
    }else{
        inputResponsavel.classList.remove('is-invalid');
        inputResponsavel.classList.add('is-valid');
        return true;
    };
};

//cep
function validaCep(){
    let inputCepValue = document.getElementById('cep').value;
    if(inputCepValue.length<10){
        inputCep.classList.add('is-invalid');
        inputCep.classList.remove('is-valid');
        return false;
    }else{
        inputCep.classList.remove('is-invalid');
        inputCep.classList.add('is-valid');
        return true;
    };
};

//cidade
function validaCidade(){
    let inputCidadeValue = document.getElementById('cidadeestado').value;
    if(inputCidadeValue.length<1){
        inputCidade.classList.add('is-invalid');
        inputCidade.classList.remove('is-valid');
        return false;
    }else{
        inputCidade.classList.remove('is-invalid');
        inputCidade.classList.add('is-valid');
        return true;
    };
};

//estado
function validaEstado(){
    let inputEstadoValue = document.getElementById('estadocidade').value;
    if(inputEstadoValue==""){
        inputEstado.classList.add('is-invalid');
        inputEstado.classList.remove('is-valid');
        return false;
    }else{
        inputEstado.classList.remove('is-invalid');
        inputEstado.classList.add('is-valid');
        return true;
    };
};

//logradouro
function validaLogradouro(){
    let inputLogradouroValue = document.getElementById('logradouro').value;
    if(inputLogradouroValue.length<1){
        inputLogradouro.classList.add('is-invalid');
        inputLogradouro.classList.remove('is-valid');
        return false;
    }else{
        inputLogradouro.classList.remove('is-invalid');
        inputLogradouro.classList.add('is-valid');
        return true;
    };
};

//numlogradouro
function validaNumlogradouro(){
    let inputNumlogradouroValue = document.getElementById('numlogradouro').value;
    if(inputNumlogradouroValue.length<1){
        inputNumlogradouro.classList.add('is-invalid');
        inputNumlogradouro.classList.remove('is-valid');
        return false;
    }else{
        inputNumlogradouro.classList.remove('is-invalid');
        inputNumlogradouro.classList.add('is-valid');
        return true;
    };
};

//bairro
function validaBairro(){
    let inputBairroValue = document.getElementById('bairro').value;
    if(inputBairroValue.length<1){
        inputBairro.classList.add('is-invalid');
        inputBairro.classList.remove('is-valid');
        return false;
    }else{
        inputBairro.classList.remove('is-invalid');
        inputBairro.classList.add('is-valid');
        return true;
    };
};


//-----------------------------------------------------------------
//VERIFICAÇÕES NO SUBMIT
formEmp.addEventListener('submit', (evento)=>{
    //let inputCnpjValue = document.getElementById('cnpj').value;
    let retornoCnpj = atualizaCNPJ();
    let retornoNome = validaNome();
    let retornoFantasia = validaFantasia();
    let retornoCep = validaCep();
    let retornoCidade = validaCidade();
    let retornoEstado = validaEstado();
    let retornoLogradouro = validaLogradouro();
    let retornoNumlogradouro = validaNumlogradouro();
    let retornoBairro = validaBairro();
    let retornoResponsavel = validaResponsavel();

    //resposável
    if(!retornoResponsavel){
        evento.preventDefault();
        evento.stopPropagation();
        inputResponsavel.focus();
    }else {
        inputResponsavel.classList.remove('is-invalid');
        inputResponsavel.classList.add('is-valid');
    };

    //bairro
    if(!retornoBairro){
        evento.preventDefault();
        evento.stopPropagation();
        inputBairro.focus();
    }else {
        inputBairro.classList.remove('is-invalid');
        inputBairro.classList.add('is-valid');
    };

    //numlogradouro
    if(!retornoNumlogradouro){
        evento.preventDefault();
        evento.stopPropagation();
        inputNumlogradouro.focus();
    }else {
        inputNumlogradouro.classList.remove('is-invalid');
        inputNumlogradouro.classList.add('is-valid');
    };

    //logradouro
    if(!retornoLogradouro){
        evento.preventDefault();
        evento.stopPropagation();
        inputLogradouro.focus();
    }else {
        inputLogradouro.classList.remove('is-invalid');
        inputLogradouro.classList.add('is-valid');
    };

    //estado
    if(!retornoEstado){
        evento.preventDefault();
        evento.stopPropagation();
        inputEstado.focus();
    }else {
        inputEstado.classList.remove('is-invalid');
        inputEstado.classList.add('is-valid');
    };

    //cidade
    if(!retornoCidade){
        evento.preventDefault();
        evento.stopPropagation();
        inputCidade.focus();
    }else {
        inputCidade.classList.remove('is-invalid');
        inputCidade.classList.add('is-valid');
    };
    
    //cep
    if(!retornoCep){
        evento.preventDefault();
        evento.stopPropagation();
        inputCep.focus();
    }else {
        inputCep.classList.remove('is-invalid');
        inputCep.classList.add('is-valid');
    };

    //fantasia
    if(!retornoFantasia){
        evento.preventDefault();
        evento.stopPropagation();
        inputFantasia.focus();
    }else {
        inputFantasia.classList.remove('is-invalid');
        inputFantasia.classList.add('is-valid');
    };

    //nome
    if(!retornoNome){
        evento.preventDefault();
        evento.stopPropagation();
        inputNome.focus();
    }else {
        inputNome.classList.remove('is-invalid');
        inputNome.classList.add('is-valid');
    };

    //cnpj
    if(!retornoCnpj){
        evento.preventDefault();
        evento.stopPropagation();
        inputCnpj.focus();
    }else {
        inputCnpj.classList.remove('is-invalid');
        inputCnpj.classList.add('is-valid');
    };
    
    //form validity
    if(!formEmp.checkValidity()){
        evento.preventDefault();
        evento.stopPropagation();
        alert("Dados faltantes/incorretos! Por favor, verifique o formulário.");
    };
});