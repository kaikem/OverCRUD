<?php
//PATHING
$root = $_SERVER["DOCUMENT_ROOT"];
require_once "$root/overcrud/resources/pathing.php";

//ENDEREÇO DA PÁGINA ATUAL
$pagina = $_SERVER['REQUEST_URI'];

//TABELAS DO BD
require_once "$rootOvercrud/resources/listas.php";
?>

<div class='col-12 d-flex mb-3 justify-content-between align-items-center'>
    <!-- INPUT DE PESQUISA -->
    <div class='input-group w-50' id='pesquisalista'>
        <i class='fa-solid fa-magnifying-glass input-group-text p-2'></i>
        <select class="form-select form-select-sm fit-content" name="pesquisaselect" id="pesquisaselect">
            <option value="nome" selected>Nome</option>
            <option value="doc" class="<?= str_contains($pagina, 'usulista') ? 'd-flex' : 'd-none' ?>">CPF</option>
            <option value="empregado" class="<?= str_contains($pagina, 'usulista') ? 'd-flex' : 'd-none' ?>">Empregado
                Em</option>
            <option value="doc" class="<?= str_contains($pagina, 'emplista') ? 'd-flex' : 'd-none' ?>">CNPJ
            </option>
        </select>
        <input type='search' class='form-control' id='inputpesquisa' oninput="pesquisa()" placeholder='Pesquisar'>
    </div>

    <!-- BOTÕES DE ORDENAÇÃO -->
    <!-- ORDENAÇÃO POR NOME CRESCENTE -->
    <div class='btn-group btn-group-lg d-none' id='btnordem'>
        <button type='button' class='btn btn-outline-primary btn-lg rounded-start-3 border-3 p-2' id='btnordenarpornome'
            onclick='ordenarCards("asc")' title='Ordenar nomes A-Z'><i class='fa-solid fa-arrow-down-a-z'></i></button>

        <!-- ORDENAÇÃO POR NOME DECRESCENTE -->
        <button type='button' class='btn btn-outline-primary btn-lg rounded-end-3 border-3 p-2' id='btnordenarpornome'
            onclick='ordenarCards("dec")' title='Ordenar nomes Z-A'><i class='fa-solid fa-arrow-down-z-a'></i></button>
    </div>

    <!-- BOTÕES -->
    <div class='btn-group btn-group-lg'>
        <!-- BOTÃO DE CADASTRO -->
        <a href='<?= str_contains($pagina, 'usulista') ? './usucadastro.php' : './empcadastro.php' ?>'
            class='btn btn-outline-primary btn-lg rounded-3 border-3 p-2 me-2 <?= $linksAdm ?>' id='btncadastro'
            title='Cadastrar novo'><i class='fa-solid fa-plus'></i></a>

        <!-- BOTÃO TABELA -->
        <button type='button' class='btn btn-outline-primary btn-lg rounded-start-3 border-3 p-2 active'
            id='btndisplaytabela' onclick='mudarDisplayParaTabela(); pesquisa()' title='Modo Tabela'><i
                class='fa-solid fa-list'></i></button>

        <!-- BOTÃO CARDS -->
        <button type='button' class='btn btn-outline-primary btn-lg rounded-end-3 border-3 p-2' id='btndisplaycards'
            onclick='mudarDisplayParaCards(); pesquisa()' title='Modo Cards'><i
                class='fa-solid fa-table-cells'></i></button>
    </div>
</div>