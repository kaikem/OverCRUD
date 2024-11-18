<?php

echo "
            <div class='col-12 d-flex mb-3 justify-content-between align-items-center'>
                <!-- INPUT DE PESQUISA -->
                <div class='input-group w-50' id='pesquisalista'>
                    <i class='fa-solid fa-magnifying-glass input-group-text p-2'></i>
                    <input type='search' class='form-control' id='inputpesquisa' placeholder='Pesquisa por documento'>
                </div>

                <!-- BOTÕES DE ORDENAÇÃO -->
                <!-- ORDENAÇÃO POR NOME CRESCENTE -->
                <div>
                <button type='button' class='btn btn-outline-secondary rounded-3 border-2 p-2'
                        id='btnordenarpornome' onclick='ordenarPorNomeCres()' title='Ordenar nomes A-Z'><i class='fa-solid fa-arrow-down-a-z'></i></button>
                
                <!-- ORDENAÇÃO POR NOME DECRESCENTE -->
                <button type='button' class='btn btn-outline-secondary rounded-3 border-2 p-2'
                        id='btnordenarpornome' onclick='ordenarPorNomeDecres()' title='Ordenar nomes Z-A'><i class='fa-solid fa-arrow-down-z-a'></i></button>
                </div>

                <!-- BOTÕES DE MODO DE DISPLAY -->
                <div class='btn-group btn-group-lg'>
                    <button type='button'
                        class='btn btn-outline-primary btn-lg rounded-start-3 border-3 p-2 active'
                        id='btndisplaytabela' onclick='mudarDisplayParaTabela()'><i
                            class='fa-solid fa-list'></i></button>
                    <button type='button' class='btn btn-outline-primary btn-lg rounded-end-3 border-3 p-2'
                        id='btndisplaycards' onclick='mudarDisplayParaCards()'><i
                            class='fa-solid fa-table-cells'></i></button>
                </div>
            </div>
            ";

