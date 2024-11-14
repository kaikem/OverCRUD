//VALIDAÇÃO DE CPF
const cpfValido = document.getElementById('cpfvalido');
const cpfInvalido = document.getElementById('cpfinvalido');
const form = document.getElementById('formusucadastro');
const inputCpf = document.getElementById('cpf');

function validaCPF(cpf) {
  //VARIÁVEIS DE INTERESSE
  var Soma = 0
  var Resto


  //REMOVER PONTOS E TRAÇOS
  var strCPF = String(cpf).replace(/[^d]/g, '');
  alert(strCPF);
  

  //VERIFICAÇÃO DE TAMANHO
  if (strCPF.length !== 11) {
    cpfInvalido.classList.remove('d-none');
    cpfInvalido.classList.add('d-flex');
  };

  //VERIFICAÇÃO DE NÚMEROS REPETIDOS
  if ([
    '00000000000',
    '11111111111',
    '22222222222',
    '33333333333',
    '44444444444',
    '55555555555',
    '66666666666',
    '77777777777',
    '88888888888',
    '99999999999',
    ].indexOf(strCPF) !== -1)
    return false;


  //CÁLCULO DA VARIÁVEL RESTO
  for (i=1; i<=9; i++)
    Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);

  Resto = (Soma * 10) % 11


  //SE RESTO = 10 OU 11 PRECISA SER ZERADO
  if ((Resto == 10) || (Resto == 11)) 
    Resto = 0


  //RESTO DEVE SER DIFERENTE DO VALOR DO 10º CARACTERE
  if (Resto != parseInt(strCPF.substring(9, 10)) )
    return false


  //DEFINIR SOMA PARA NOVA VALIDÇÃO COM RESTO
  Soma = 0

  for (i = 1; i <= 10; i++)
    Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i)

  Resto = (Soma * 10) % 11


  //SE RESTO = 10 OU 11 PRECISA SER ZERADO
  if ((Resto == 10) || (Resto == 11)) Resto = 0;


  //RESTO DEVE SER DIFERENTE DO VALOR DO 11º CARACTERE
  if (Resto != parseInt(strCPF.substring(10, 11) ) ) return false;


  //CPF VÁLIDO
  return true;
};