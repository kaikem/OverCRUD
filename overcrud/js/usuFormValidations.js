//-----------------------------------------------------------------
//VARIÁVEIS DOM
//usuário
const formUsu = document.querySelector('.needs-validation');
const inputCpf = document.getElementById('cpf');
const inputSenha = document.getElementById('password');
const inputSenhaConf = document.getElementById('passwordconf');
const inputNome = document.getElementById('nome');
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
//VALIDAÇÃO DE CPF
function validaCPF(cpf) {
	let inputCpfValue = inputCpf.value;	

	cpf = inputCpfValue.replace(/[^\d]+/g,'');	

	if(cpf == '') return false;	

	// Elimina CPFs invalidos conhecidos	
	if (cpf.length != 11 || 
		cpf == "00000000000" || 
		cpf == "11111111111" || 
		cpf == "22222222222" || 
		cpf == "33333333333" || 
		cpf == "44444444444" || 
		cpf == "55555555555" || 
		cpf == "66666666666" || 
		cpf == "77777777777" || 
		cpf == "88888888888" || 
		cpf == "99999999999")
			return false;		
	// Valida 1o digito	
	add = 0;	
	for (i=0; i < 9; i ++)		
		add += parseInt(cpf.charAt(i)) * (10 - i);	
		rev = 11 - (add % 11);	
		if (rev == 10 || rev == 11)		
			rev = 0;	
		if (rev != parseInt(cpf.charAt(9)))		
			return false;		

	// Valida 2o digito	
	add = 0;	
	for (i = 0; i < 10; i ++)		
		add += parseInt(cpf.charAt(i)) * (11 - i);	
	rev = 11 - (add % 11);	
	if (rev == 10 || rev == 11)	
		rev = 0;	
	if (rev != parseInt(cpf.charAt(10)))
		return false;		
	return true;   
}

//Atualizar status do CPF na página
function atualizaCPF(){
    let inputCpfValue = document.getElementById('cpf').value;
    let retornoCpf = validaCPF(inputCpfValue);

    if(!retornoCpf){
        inputCpf.classList.add('is-invalid');
        inputCpf.classList.remove('is-valid');
        return false;
    }else{
        inputCpf.classList.remove('is-invalid');
        inputCpf.classList.add('is-valid');
        return true;
    };
};


//-----------------------------------------------------------------
//VALIDAÇÃO DA COMPARAÇÃO DE SENHAS
function comparaSenha(){
	const inputSenhaConf = document.getElementById('passwordconf');
	const senha = document.getElementById('password').value;
	const senhaConf = document.getElementById('passwordconf').value;

	if(senha !== senhaConf && senhaConf !== ''){
        inputSenhaConf.classList.add('is-invalid');
        inputSenhaConf.classList.remove('is-valid');	
		return false;
	} else {
		inputSenhaConf.classList.remove('is-invalid');
        inputSenhaConf.classList.add('is-valid');	
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

//senha
function validaSenha(){
    let inputSenhaValue = document.getElementById('password').value;
    if(inputSenhaValue.length<8){
        inputSenha.classList.add('is-invalid');
        inputSenha.classList.remove('is-valid');
        return false;
    }else{
        inputSenha.classList.remove('is-invalid');
        inputSenha.classList.add('is-valid');
        return true;
    };
}

//senhaconf
function validaSenhaconf(){
    let inputSenhaconfValue = document.getElementById('passwordconf').value;
    if(inputSenhaconfValue.length<8){
        inputSenhaConf.classList.add('is-invalid');
        inputSenhaConf.classList.remove('is-valid');
        return false;
    }else{
        inputSenhaConf.classList.remove('is-invalid');
        inputSenhaConf.classList.add('is-valid');
        return true;
    };
}

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
formUsu.addEventListener('submit', (evento)=>{
    let retornoCpf = atualizaCPF();
	let retornoSenha = validaSenha();
	let retornoSenhaConf = validaSenhaconf();
	let retornoComparaSenha = comparaSenha();
    let retornoNome = validaNome();
    let retornoCep = validaCep();
    let retornoCidade = validaCidade();
    let retornoEstado = validaEstado();
    let retornoLogradouro = validaLogradouro();
    let retornoNumlogradouro = validaNumlogradouro();
    let retornoBairro = validaBairro();
	
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

    //nome
    if(!retornoNome){
        evento.preventDefault();
        evento.stopPropagation();
        inputNome.focus();
    }else {
        inputNome.classList.remove('is-invalid');
        inputNome.classList.add('is-valid');
    };

	//senhaconfComparação
	if(!retornoComparaSenha) {
        evento.preventDefault();
        evento.stopPropagation();
        inputSenhaConf.focus();
	};

	//senhaconf
	if(!retornoSenhaConf) {
        evento.preventDefault();
        evento.stopPropagation();
        inputSenhaConf.focus();
	};

	//senha
	if(!retornoSenha) {
        evento.preventDefault();
        evento.stopPropagation();
        inputSenha.focus();
	};

    //cpf
    if(!retornoCpf){
        evento.preventDefault();
        evento.stopPropagation();
        inputCpf.focus();
    }else {
        inputCpf.classList.remove('is-invalid');
        inputCpf.classList.add('is-valid');
    };
    
    //form validity
    if(!formUsu.checkValidity()){
        evento.preventDefault();
        evento.stopPropagation();
        alert("Dados faltantes/incorretos! Por favor, verifique o formulário.");
    };
});