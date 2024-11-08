<?php

echo "
            <div class='col-12 d-flex mb-3 justify-content-between'>
                <!-- INPUT DE PESQUISA -->
                <div class='input-group w-50' id='pesquisalista'>
                    <i class='fa-solid fa-magnifying-glass input-group-text p-2'></i>
                    <input type='search' class='form-control' placeholder='Pesquise por nome'>
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