//DOM - TABELAS USU E EMP
const tabelaDeEmpresas = document.getElementById('tabelaempresas');
if(tabelaDeEmpresas !== null){
    var linhasTabelaEmpresas = tabelaDeEmpresas.rows;
};

const tabelaDeUsuarios = document.getElementById('tabelausuarios');
if(tabelaDeUsuarios !== null){
    var linhasTabelaUsuarios = tabelaDeUsuarios.rows;
};


//FUNÇÕES
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


/*
function ordenarPorNomeCres(){
    var shouldSwitch, elemento1, elemento2;
    var switching = true;

    if(tabelaDeEmpresas !== null){
        while(switching){
            switching = false;
            for(i=1; i<(linhasTabelaEmpresas.length-1); i++){
                shouldSwitch = false;
                elemento1 = linhasTabelaEmpresas[i].getElementsByTagName("TD")[0];
                elemento2 = linhasTabelaEmpresas[i + 1].getElementsByTagName("TD")[0];
            
                if (elemento1.innerHTML.toLowerCase() > elemento2.innerHTML.toLowerCase()){
                    shouldSwitch = true;
                    break;
                };
            };
                
            if(shouldSwitch){
                linhasTabelaEmpresas[i].parentNode.insertBefore(linhasTabelaEmpresas[i + 1], linhasTabelaEmpresas[i]);
                switching = true;
            };
        };
    } else {
        while(switching){
            switching = false;
            for(i=1; i<(linhasTabelaUsuarios.length-1); i++){
                shouldSwitch = false;
                elemento1 = linhasTabelaUsuarios[i].getElementsByTagName("TD")[0];
                elemento2 = linhasTabelaUsuarios[i + 1].getElementsByTagName("TD")[0];
            
                if (elemento1.innerHTML.toLowerCase() > elemento2.innerHTML.toLowerCase()){
                    shouldSwitch = true;
                    break;
                };
            };
                
            if(shouldSwitch){
                linhasTabelaUsuarios[i].parentNode.insertBefore(linhasTabelaUsuarios[i + 1], linhasTabelaUsuarios[i]);
                switching = true;
            };
        };
    }
};

function ordenarPorNomeDecres(){
    var shouldSwitch, elemento1, elemento2;
    var switching = true;

    if(tabelaDeEmpresas !== null){
        while(switching){
            switching = false;
            for(i=1; i<(linhasTabelaEmpresas.length-1); i++){
                shouldSwitch = false;
                elemento1 = linhasTabelaEmpresas[i].getElementsByTagName("TD")[0];
                elemento2 = linhasTabelaEmpresas[i + 1].getElementsByTagName("TD")[0];
            
                if (elemento1.innerHTML.toLowerCase() > elemento2.innerHTML.toLowerCase()){
                    shouldSwitch = true;
                    break;
                };
            };
                
            if(shouldSwitch){
                linhasTabelaEmpresas[i].parentNode.insertAfter(linhasTabelaEmpresas[i + 1], linhasTabelaEmpresas[i]);
                switching = true;
            };
        };
    } else {
        while(switching){
            switching = false;
            for(i=1; i<(linhasTabelaUsuarios.length-1); i++){
                shouldSwitch = false;
                elemento1 = linhasTabelaUsuarios[i].getElementsByTagName("TD")[0];
                elemento2 = linhasTabelaUsuarios[i + 1].getElementsByTagName("TD")[0];
            
                if (elemento1.innerHTML.toLowerCase() > elemento2.innerHTML.toLowerCase()){
                    shouldSwitch = true;
                    break;
                };
            };
                
            if(shouldSwitch){
                linhasTabelaUsuarios[i].parentNode.insertAfter(linhasTabelaUsuarios[i + 1], linhasTabelaUsuarios[i]);
                switching = true;
            };
        };
    }
};
*/