const cardsEmpresas = document.querySelector('.mostrarCardsEmpresas');
const tabelaEmpresas = document.querySelector('.mostrarTabelaEmpresas');
const botaoDisplayTabela = document.getElementById('displaytabela');
const botaoDisplayCards = document.getElementById('displaycards');

function mudarDisplayParaTabela(){
    cardsEmpresas.classList.add('d-none');
    cardsEmpresas.classList.remove('d-flex');
    tabelaEmpresas.classList.add('d-flex');
    tabelaEmpresas.classList.remove('d-none');
    botaoDisplayTabela.classList.add('active');
    botaoDisplayCards.classList.remove('active');
};

function mudarDisplayParaCards(){
    cardsEmpresas.classList.add('d-flex');
    cardsEmpresas.classList.remove('d-none');
    tabelaEmpresas.classList.add('d-none');
    tabelaEmpresas.classList.remove('d-flex');
    botaoDisplayCards.classList.add('active')
    botaoDisplayTabela.classList.remove('active');
};