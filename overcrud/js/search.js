//VARIÁVEIS DO DOM
const searchInput = document.getElementById('inputpesquisa');
var paginaAtual = String(window.location.href);
var selectPesquisa = document.getElementById('pesquisaselect');
var selectValor  = document.getElementById('pesquisaselect').value;
selectPesquisa.addEventListener('change', ()=>{
    selectValor = selectPesquisa.value;
});

//FUNÇÃO DE PESQUISA
function pesquisa() {  
    var pesquisa = searchInput.value;
    console.log(selectValor);
    if(!divCards.classList.contains('d-none')){
        for(i=0; i<cardsHTML.length; i++){
            if(!(cardsHTML[i].querySelector('#ch_'+selectValor).innerText.toLowerCase()).includes(pesquisa)){
                cardsHTML[i].classList.add('d-none');
            } else {
                if(!(cardsHTML[i].querySelector('#ch_nome').innerText.toLowerCase() == ' - nenhuma - ')){
                    cardsHTML[i].classList.remove('d-none');
                };
            };
        };
    } else {
        if(paginaAtual=='http://localhost/overcrud/usulista.php'){
            for(i=1; i<linhasTabelaUsuarios.length; i++){
                if(!(linhasTabelaUsuarios[i].querySelector('#tr_'+selectValor).innerText.toLowerCase()).includes(pesquisa)){
                    linhasTabelaUsuarios[i].classList.add('d-none');
                } else {
                    linhasTabelaUsuarios[i].classList.remove('d-none');
                };
            };
        } else {
            for(i=1; i<linhasTabelaEmpresas.length; i++){
                if(!(linhasTabelaEmpresas[i].querySelector('#tr_'+selectValor).innerText.toLowerCase()).includes(pesquisa)){
                    linhasTabelaEmpresas[i].classList.add('d-none');
                } else {
                    if(!(linhasTabelaEmpresas[i].querySelector('#tr_nome').innerText.toLowerCase() == '- nenhuma -')){
                        linhasTabelaEmpresas[i].classList.remove('d-none');
                    };
                };
            };
        };
    };
};