var tabelaSelecionada;

const tabelaDeEmpresas = document.getElementById('tabelaempresas');
if(tabelaDeEmpresas !== null){
    var linhasTabelaEmpresas = tabelaDeEmpresas.rows;
};

const tabelaDeUsuarios = document.getElementById('tabelausuarios');
if(tabelaDeUsuarios !== null){
    var linhasTabelaUsuarios = tabelaDeUsuarios.rows;
};

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