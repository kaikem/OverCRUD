//DOM - TABELAS USU E EMP
const tabelaDeEmpresas = document.getElementById('tabelaempresas');
if(tabelaDeEmpresas !== null){
    var linhasTabelaEmpresas = tabelaDeEmpresas.rows;
};

const tabelaDeUsuarios = document.getElementById('tabelausuarios');
if(tabelaDeUsuarios !== null){
    var linhasTabelaUsuarios = tabelaDeUsuarios.rows;
};

//DOM - DIV DOS CARDS
var cardsHeadersH4 = document.querySelectorAll('#ch_empnome');
const divCards = document.getElementById('mostrarcards');
var cards = document.querySelectorAll('#card');


//FUNÇÕES DAS TABELAS
function ordenar(n){
    var switching, i, elemento1, elemento2, shouldSwitch, direcao, switchCount = 0;
    switching = true
    direcao = "asc";

    if(tabelaDeEmpresas !== null){
        while (switching){
            switching = false;
    
            for (i = 1; i < (linhasTabelaEmpresas.length - 1); i++) {
                shouldSwitch = false;
    
                elemento1 = linhasTabelaEmpresas[i].getElementsByTagName("TD")[n];
                elemento2 = linhasTabelaEmpresas[i + 1].getElementsByTagName("TD")[n];
    
                if (direcao == "asc") {
                    if (elemento1.innerHTML.toLowerCase() > elemento2.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    };
                } else if (direcao == "desc") {
                    if (elemento1.innerHTML.toLowerCase() < elemento2.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    };
                };
            };
    
            if (shouldSwitch) {
                linhasTabelaEmpresas[i].parentNode.insertBefore(linhasTabelaEmpresas[i + 1], linhasTabelaEmpresas[i]);
                switching = true;
                switchCount ++;
            } else {
                if (switchCount == 0 && direcao == "asc") {
                    direcao = "desc";
                  switching = true;
                };
            };
        };
    } else {
        while (switching){
            switching = false;
    
            for (i = 1; i < (linhasTabelaUsuarios.length - 1); i++) {
                shouldSwitch = false;
    
                elemento1 = linhasTabelaUsuarios[i].getElementsByTagName("TD")[n];
                elemento2 = linhasTabelaUsuarios[i + 1].getElementsByTagName("TD")[n];
    
                if (direcao == "asc") {
                    if (elemento1.innerHTML.toLowerCase() > elemento2.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    };
                } else if (direcao == "desc") {
                    if (elemento1.innerHTML.toLowerCase() < elemento2.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    };
                };
            };
    
            if (shouldSwitch) {
                linhasTabelaUsuarios[i].parentNode.insertBefore(linhasTabelaUsuarios[i + 1], linhasTabelaUsuarios[i]);
                switching = true;
                switchCount ++;
            } else {
                if (switchCount == 0 && direcao == "asc") {
                    direcao = "desc";
                  switching = true;
                };
            };
        };
    }
};


//FUNÇÕES DOS CARDS
function ordenarCres(){
    var shouldSwitch, card1, card2;
    const divCards = document.getElementById('mostrarcards');
    var cards = document.querySelectorAll('#card');
    var switching = true;

    while(switching){
        switching = false;
        for(i=0; i<(cards.length)-1; i++){
            shouldSwitch = false;
            card1 = cards[i];
            card2 = cards[i+1];
            
            if (card1.querySelector('#ch_empnome').innerText.toLowerCase() < card2.querySelector('#ch_empnome').innerText.toLowerCase()){
                shouldSwitch = true;
                break;
            };
        };
                
        if(shouldSwitch){
            card1.parentNode.insertBefore(card1, card2);
            switching = true;
        };
    };
};


function sortTable() {
    var switching, i, card1, card2, shouldSwitch;
    switching = true;

    while (switching) {
      switching = false;

      for (i = 0; i < (cards.length - 1); i++) {
        shouldSwitch = false;
        /* Get the two elements you want to compare,
        one from current row and one from the next: */
        card1 = cards[i];
        card2 = cards[i + 1];
        console.log(card1);
        console.log(card2);

        if (card1.querySelector('#ch_empnome').innerText.toLowerCase() > card2.querySelector('#ch_empnome').innerText.toLowerCase()) {
            console.log("VERIF TITULO");
          shouldSwitch = true;
          break;
        } else {
            shouldSwitch = false;
        };
      };

      if (shouldSwitch) {
        console.log("SWITCH 1");
        divCards.insertBefore(card2, card1);
        switching = true;
        console.log("SWITCH 2");
      };
    };
  };