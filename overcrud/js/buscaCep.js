const form = document.querySelector('.needs-validation');

function buscaCep() {
    let inputCep = document.querySelector('input[name=cep]');
    let cep = inputCep.value.replace(/[^0-9]/g, '');
    const cep_teste = document.getElementById('cepTesteUser');

    if(cep.length == 8) {
        let url = 'http://viacep.com.br/ws/' + cep + '/json';
        let xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4) {
                if (xhr.status == 200)
                    preencheCampos(JSON.parse(xhr.responseText));
            };
        };
        xhr.send();
    } else {
        //cep_teste.innerText = 'CEP inválido'
        //cep_teste.style.color = 'var(--red-dark)'

        document.querySelector('input[name=logradouro]').value = ''
        document.querySelector('input[name=bairro]').value = ''
        document.querySelector('input[name=cidadeestado]').value = ''
        document.querySelector('select[name=estadocidade]').value = ''
    }
}

function preencheCampos(json) {
    //onst cep_teste = document.getElementById('cepTesteUser')

    if(json.localidade !== undefined){
        //cep_teste.innerText = 'CEP válido'
        //cep_teste.style.color = '#0c6800'

        document.querySelector('input[name=logradouro]').value = json.logradouro
        document.querySelector('input[name=bairro]').value = json.bairro
        document.querySelector('input[name=cidadeestado]').value = json.localidade
        document.querySelector('select[name=estadocidade]').value = json.uf
    }; /*else {
        form.classList.add('was-validated');
    }*/
};