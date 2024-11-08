<?php
//VERIFICAÇÃO DE SESSÃO
require_once 'sessionverif.php';

//CONEXÃO COM BD
require_once 'config.php';

//TABELAS DO BD
require_once 'sqltables.php';

//MODAL EMPRESA
require_once 'empmodal.php';
?>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css" />
    <title>OverCRUD - Empresas</title>
</head>

<body>
    <div class="container">
        <!-- ROW DA NAVBAR -->
        <div class="row" id="navbarTop">
            <?php require_once 'navbarTop.php' ?>
        </div>

        <!-- ROW DO CORPO -->
        <div class="row d-flex mt-5" id="appBody">
            <!-- TÍTULO DA SEÇÃO -->
            <h1 class="text-center display-6 my-5">LISTA DE EMPRESAS</h1>

            <!-- PESQUISA & BOTÕES DE MODO DE DISPLAY -->
            <div class='col-12 d-flex mb-3 justify-content-between'>
                <!-- INPUT DE PESQUISA -->
                <div class="input-group w-50" id="pesquisalista">
                    <i class="fa-solid fa-magnifying-glass input-group-text p-2"></i>
                    <input type="search" class="form-control" placeholder="Pesquise por nome">
                </div>
                <!-- BOTÕES DE MODO DE DISPLAY -->
                <div class='btn-group btn-group-lg'>
                    <button type="button"
                        class='btn btn-outline-primary text-white btn-lg rounded-start-3 border-3 p-2 active'
                        id="btndisplaytabela" onclick="mudarDisplayParaTabela()"><i
                            class="fa-solid fa-list"></i></button>
                    <button type="button" class='btn btn-outline-primary text-white btn-lg rounded-end-3 border-3 p-2'
                        id="btndisplaycards" onclick="mudarDisplayParaCards()"><i
                            class="fa-solid fa-table-cells"></i></button>
                </div>
            </div>

            <!-- LISTA (CARDS) -->
            <div class="row d-none" id="mostrarCardsEmpresas">
                <?php foreach ($listaEmp as $empresa) : ?>
                <div class=" col-12 col-md-10 col-lg-6 col-xl-4 justify-content-center
                <?php echo $empresa['idempresa'] == '0' ? 'd-none' : '' ?>">
                    <!-- CARD -->
                    <div class="card mb-4 me-1 shadow" id="empcard" style="min-height: 30rem;">
                        <!-- HEADER DO CARD -->
                        <div class="card-header d-flex text-center justify-content-center align-items-center"
                            style="min-height: 8rem; max-height: 8rem;">
                            <div class="d-flex flex-column">
                                <h4 class="text-uppercase" id="empnome"> <?= $empresa['nome']; ?> </h4>
                                <h6 class="text-secondary lead" id="empcnpj"> CNPJ: <?= $empresa['cnpj']; ?> </h6>
                            </div>
                        </div>
                        <!-- CORPO DO CARD -->
                        <div class="card-body">
                            <div class="card-text">
                                <p class="mb-0 text-secondary display-6 fs-4"> <i class="fa-solid fa-building"></i> Nome
                                    Fantasia: </p>
                                <div class="mt-0 mb-2 display-6 fs-5"> <?= $empresa['fantasia']; ?> </div>
                                <p class="mb-0 text-secondary display-6 fs-4"> <i class="fa-solid fa-phone"></i>
                                    Telefone:
                                </p>
                                <div class="mt-0 mb-2 display-6 fs-5"> <?= $empresa['telefone']; ?> </div>
                                <p class="mb-0 text-secondary display-6 fs-4"> <i class="fa-solid fa-location-dot"></i>
                                    Endereço: </p>
                                <div class="mt-0 mb-2 display-6 fs-5"> <?= $empresa['endereco']; ?> </div>
                                <p class="mb-0 text-secondary display-6 fs-4"> <i class="fa-solid fa-user-tie"></i>
                                    Responsável: </p>
                                <div class="mt-0 mb-2 display-6 fs-5"> <?= $empresa['responsavel']; ?> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <!-- LISTA (TABELA) -->
            <div class="" id="mostrarTabelaEmpresas">
                <table id="tabelaEmpresas" class="table table-striped">
                    <!-- TABELA (CABEÇALHO) -->
                    <tr class="table-secondary text-center">
                        <th>NOME</th>
                        <th>NOME FANTASIA</th>
                        <th>CNPJ</th>
                        <th> </th>
                        <th class="<?= $linksAdm ?>"> </th>
                        <th class="<?= $linksAdm ?>"> </th>
                    </tr>
                    <?php foreach ($listaEmp as $empresa): ?>
                    <!-- TABELA (DADOS DA EMPRESA) -->
                    <tr class="table <?php echo $empresa['idempresa'] == '0' ? 'd-none' : '' ?>">
                        <td><?= $empresa['nome']; ?></td>
                        <td><?= $empresa['fantasia']; ?></td>
                        <td><?= $empresa['cnpj']; ?></td>
                        <td>
                            <a class="modalanchor" data-bs-toggle="modal"
                                data-bs-target="#empmodal<?= $empresa['idempresa'] ?>">
                                <i class="fa-solid fa-circle-info text-primary px-0 py-2" title="Detalhes"></i>
                            </a>
                        </td>
                        <td class="<?= $linksAdm ?>">
                            <a href="emp_deletar.php?idempresa=<?= $empresa['idempresa']; ?>">
                                <i class="fa-solid fa-trash px-0 py-2" title="Deletar" id="deleteicon"></i>
                            </a>
                        </td>
                        <td class="<?= $linksAdm ?>">
                            <a href="emp_editar.php?idempresa=<?= $empresa['idempresa']; ?>">
                                <i class="fa-solid fa-pen-to-square px-0 py-2" title="Editar"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>

        <!-- FOOTER -->
        <?php require_once 'footer.php' ?>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/9e35ffe1bb.js" crossorigin="anonymous"></script>
    <script src="./js/darkmodetoggle.js"></script>
    <script src="./js/modals.js"></script>
    <script src="./js/empMudarDisplay.js"></script>
</body>

</html>