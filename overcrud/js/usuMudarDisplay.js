const cardsUsuarios = document.getElementById('mostrarcards');
const tabelaUsuarios = document.getElementById('mostrartabela');
const botaoDisplayTabela = document.getElementById('btndisplaytabela');
const botaoDisplayCards = document.getElementById('btndisplaycards');
const botoesOrdenacao = document.getElementById('btnordem');

function mudarDisplayParaTabela(){
    cardsUsuarios.classList.add('d-none');

    botoesOrdenacao.classList.add('d-none');

    tabelaUsuarios.classList.remove('d-none');
    tabelaUsuarios.classList.add('d-flex');

    botaoDisplayTabela.classList.add('active');
    botaoDisplayCards.classList.remove('active');
};

function mudarDisplayParaCards(){
    cardsUsuarios.classList.remove('d-none');

    botoesOrdenacao.classList.remove('d-none');

    tabelaUsuarios.classList.remove('d-flex');
    tabelaUsuarios.classList.add('d-none');

    botaoDisplayCards.classList.add('active');
    botaoDisplayTabela.classList.remove('active');
};