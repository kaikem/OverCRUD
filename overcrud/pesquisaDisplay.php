<?php

$pagina = $_SERVER['REQUEST_URI'];
echo $pagina;
if (str_contains($pagina, 'usulista')) {
    echo "TRUE";
} else {
    echo "FALSE";
};
//<?= str_contains($pagina, 'usulista') ? 'usucadastro.php;' 'empcadastro.php;'; 
?>

<div class='col-12 d-flex mb-3 justify-content-between align-items-center'>
    <!-- INPUT DE PESQUISA -->
    <div class='input-group w-50' id='pesquisalista'>
        <i class='fa-solid fa-magnifying-glass input-group-text p-2'></i>
        <input type='search' class='form-control' id='inputpesquisa' placeholder='Pesquisa por documento'>
    </div>

    <!-- BOTÕES DE ORDENAÇÃO -->
    <!-- ORDENAÇÃO POR NOME CRESCENTE -->
    <div class='btn-group btn-group-lg d-none' id='btnordem'>
        <button type='button' class='btn btn-outline-secondary btn-lg rounded-start-3 border-3 p-2'
            id='btnordenarpornome' onclick='ordenarPorNomeCres()' title='Ordenar nomes A-Z'><i
                class='fa-solid fa-arrow-down-a-z'></i></button>

        <!-- ORDENAÇÃO POR NOME DECRESCENTE -->
        <button type='button' class='btn btn-outline-secondary btn-lg rounded-end-3 border-3 p-2' id='btnordenarpornome'
            onclick='ordenarPorNomeDecres()' title='Ordenar nomes Z-A'><i
                class='fa-solid fa-arrow-down-z-a'></i></button>
    </div>

    <!-- BOTÕES -->
    <div class='btn-group btn-group-lg'>
        <!-- BOTÃO DE CADASTRO -->
        <a href='usucadastro.php' class='btn btn-outline-primary btn-lg rounded-3 border-3 p-2 me-2' id='btncadastro'
            title='Cadastrar novo'><i class='fa-solid fa-plus'></i></a>

        <!-- BOTÃO TABELA -->
        <button type='button' class='btn btn-outline-primary btn-lg rounded-start-3 border-3 p-2 active'
            id='btndisplaytabela' onclick='mudarDisplayParaTabela()' title='Modo Tabela'><i
                class='fa-solid fa-list'></i></button>

        <!-- BOTÃO CARDS -->
        <button type='button' class='btn btn-outline-primary btn-lg rounded-end-3 border-3 p-2' id='btndisplaycards'
            onclick='mudarDisplayParaCards()' title='Modo Cards'><i class='fa-solid fa-table-cells'></i></button>
    </div>
</div>
";