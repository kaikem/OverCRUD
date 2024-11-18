const cardsEmpresas = document.getElementById('mostrarcardsempresas');
const tabelaEmpresas = document.getElementById('mostrartabelaempresas');
const botaoDisplayTabela = document.getElementById('btndisplaytabela');
const botaoDisplayCards = document.getElementById('btndisplaycards');

function mudarDisplayParaTabela(){
    cardsEmpresas.classList.add('d-none');
    tabelaEmpresas.classList.remove('d-none');
    tabelaEmpresas.classList.add('d-flex');
    botaoDisplayTabela.classList.add('active');
    botaoDisplayCards.classList.remove('active');
};

function mudarDisplayParaCards(){
    cardsEmpresas.classList.remove('d-none');
    tabelaEmpresas.classList.remove('d-flex');
    tabelaEmpresas.classList.add('d-none');
    botaoDisplayCards.classList.add('active');
    botaoDisplayTabela.classList.remove('active');
};