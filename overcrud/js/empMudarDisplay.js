const divCards = document.getElementById('mostrarcards');
const divTabela = document.getElementById('mostrartabela');
const botaoDisplayTabela = document.getElementById('btndisplaytabela');
const botaoDisplayCards = document.getElementById('btndisplaycards');
const botoesOrdenacao = document.getElementById('btnordem');

function mudarDisplayParaTabela(){
    divCards.classList.add('d-none');

    botoesOrdenacao.classList.add('d-none');

    divTabela.classList.remove('d-none');
    divTabela.classList.add('d-flex');

    botaoDisplayTabela.classList.add('active');
    botaoDisplayCards.classList.remove('active');
};

function mudarDisplayParaCards(){
    divCards.classList.remove('d-none');

    botoesOrdenacao.classList.remove('d-none');

    divTabela.classList.remove('d-flex');
    divTabela.classList.add('d-none');

    botaoDisplayCards.classList.add('active');
    botaoDisplayTabela.classList.remove('active');
};