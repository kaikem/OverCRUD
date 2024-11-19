//VARIÁVEIS DOM
const formEmp = document.querySelector('.needs-validation');
const inputCnpj = document.getElementById('cnpj');
const cnpjInvalido = document.getElementById('cnpjinvalido');

//VALIDAÇÃO DE CPF
function ValidaCNPJ(cnpj) {
 
    cnpj = cnpj.replace(/[^\d]+/g,'');
 
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


//VERIFICAÇÕES NO SUBMIT
formEmp.addEventListener('submit', (evento)=>{
    var inputCnpjValue = document.getElementById('cnpj').value;
    var retornoCnpj = ValidaCNPJ(inputCnpjValue);
  
    if(!formEmp.checkValidity()){
        evento.preventDefault();
        evento.stopPropagation();
        alert("Dados incorretos! Por favor, verifique o formulário.");
    } else if(!retornoCnpj){
        evento.preventDefault();
        evento.stopPropagation();
        alert("CNPJ inválido! Por favor, verifique o número e tente novamente.");
        inputCnpj.classList.add('is-invalid');
        inputCnpj.classList.remove('is-valid');
    };
    formEmp.classList.add('was-validated');
});