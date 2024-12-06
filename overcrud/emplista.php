<?php

//PATHING
require_once "./resources/pathing.php";
$voltar = ".";

//VERIFICAÇÃO DE SESSÃO
require_once "$rootOvercrud/validations/session_validation.php";
if ($_SESSION['valido'] == "erro") {
    logoutPagina($voltar);
}

//ARRAYS DE DADOS
require_once "$rootOvercrud/resources/listas.php";
?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<!-- HEAD & MODALS -->
<?php
//HEAD
require_once "$rootOvercrud/partials/head.php";
head('- Empresas', $voltar);

//MODALS
require_once "$rootOvercrud/partials/empmodal.php";
require_once "$rootOvercrud/partials/empdeletemodal.php";
?>

<body>
    <div class="container">
        <!-- ROW DA NAVBAR -->
        <div class="row" id="navbartop">
            <?php
            require_once "$rootOvercrud/partials/navbartop.php";
            navbarTop($voltar, $linksAdm);
            ?>
        </div>

        <!-- ROW DO CORPO -->
        <div class="row d-flex mt-5" id="appBody">

            <!-- TÍTULO DA SEÇÃO -->
            <h1 class="text-center text-primary display-6 my-5" id="sessiontitle">LISTA DE EMPRESAS</h1>

            <!-- PESQUISA & BOTÕES DE MODO DE DISPLAY -->
            <?php require_once "$rootOvercrud/partials/searchbar.php" ?>

            <!-- LISTA (CARDS) -->
            <div class="row d-none" id="mostrarcards">
                <?php foreach ($listaEmp as $empresa) : ?>
                <!-- CARD -->
                <div class="col-12 col-md-10 col-lg-6 col-xl-4 justify-content-center
                <?php echo $empresa['idempresa'] == '0' ? 'd-none' : '' ?>" id="card">
                    <div class="card mb-4 me-1" id="empcard" style="min-height: 33.4rem;">
                        <!-- HEADER DO CARD -->
                        <div class="card-header d-flex text-center justify-content-center align-items-center"
                            style="min-height: 8rem; max-height: 8rem;">
                            <div class="d-flex flex-column">
                                <h4 class="text-uppercase" id="ch_nome"> <?= $empresa['nome']; ?> </h4>
                                <h6 class="text-secondary lead" id="ch_doc"> CNPJ: <?= $empresa['cnpj']; ?> </h6>
                            </div>
                        </div>
                        <!-- CORPO DO CARD -->
                        <div class="card-body">
                            <div class="card-text" id="cardinfo">
                                <!-- FANTASIA -->
                                <p class="cardlabel mb-0 text-secondary display-6"> <i class="fa-solid fa-building"></i>
                                    Nome
                                    Fantasia: </p>
                                <div class="cardinfo mt-0 mb-2 display-6"> <?= $empresa['fantasia']; ?> </div>

                                <!-- TELEFONE -->
                                <p class="cardlabel mb-0 text-secondary display-6"> <i class="fa-solid fa-phone"></i>
                                    Telefone:
                                </p>
                                <div class="cardinfo mt-0 mb-2 display-6">
                                    <?php
                                        if ($empresa['telefone'] == "" || $empresa['telefone'] == null) {
                                            echo "- NÃO POSSUI -";
                                        } else {
                                            echo $empresa['telefone'];
                                        }
                                        ?>
                                </div>

                                <!-- ENDEREÇO -->
                                <p class="cardlabel mb-0 text-secondary display-6"> <i
                                        class="fa-solid fa-location-dot"></i>
                                    Endereço: </p>
                                <div class="cardinfo mt-0 display-6">
                                    <?php
                                        for ($i = 0; $i < count($listaEnd); $i++) {
                                            if ($empresa['idenderecoemp'] == $listaEnd[$i]['idendereco']) {
                                                echo "End.: " . $listaEnd[$i]['logradouro'] . ", nº " . $listaEnd[$i]['numlogradouro'];
                                            };
                                        };
                                        ?>
                                </div>
                                <div class="cardinfo mt-0 display-6">
                                    <?php
                                        for ($i = 0; $i < count($listaEnd); $i++) {
                                            if ($empresa['idenderecoemp'] == $listaEnd[$i]['idendereco']) {
                                                echo "Bairro: " . $listaEnd[$i]['bairro'];
                                            };
                                        };
                                        ?>
                                </div>
                                <div class="cardinfo mt-0 mb-2 display-6">
                                    <?php
                                        for ($i = 0; $i < count($listaEnd); $i++) {
                                            if ($empresa['idenderecoemp'] == $listaEnd[$i]['idendereco']) {
                                                echo "Cidade: " . $listaEnd[$i]['cidade'] . " - " . $listaEnd[$i]['estado'];
                                            };
                                        };
                                        ?>
                                </div>

                                <!-- RESPONSÁVEL -->
                                <p class="cardlabel mb-0 text-secondary display-6"> <i class="fa-solid fa-user-tie"></i>
                                    Responsável: </p>
                                <div class="cardinfo mt-0 mb-2 display-6"> <?= $empresa['responsavel']; ?> </div>

                            </div>
                        </div>
                        <!-- BOTÕES EDITAR & EXCLUIR -->
                        <div class="d-flex align-bottom justify-content-center gap-2 mt-2 mb-3 <?= $linksAdm ?>">
                            <!-- EXCLUIR -->
                            <a data-bs-toggle='modal' data-bs-target='#empdeletemodal<?= $empresa['idempresa'] ?>'>
                                <i class="fa-solid fa-trash btn btn-outline-danger border-3 p-2 rounded-circle"
                                    title="Excluir"></i>
                            </a>

                            <!-- EDITAR -->
                            <a href="empeditar.php?idempresa=<?= $empresa['idempresa']; ?>">
                                <i class="fa-solid fa-pen-to-square btn btn-outline-warning border-3 p-2 rounded-circle"
                                    title="Editar"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- LISTA (TABELA) -->
            <div class="" id="mostrartabela">
                <table id="tabelaempresas" class="table table-striped">
                    <!-- TABELA (CABEÇALHO) -->
                    <tr class="table-secondary text-center">
                        <th onclick="ordenar(0)" class="tableheader">NOME <i class="fa-solid fa-sort"></i></th>
                        <th onclick="ordenar(1)" class="tableheader">NOME FANTASIA <i class="fa-solid fa-sort"></i></th>
                        <th onclick="ordenar(2)" class="tableheader">CNPJ <i class="fa-solid fa-sort"></i></th>
                        <th> </th>
                        <th class="<?= $linksAdm ?>"> </th>
                        <th class="<?= $linksAdm ?>"> </th>
                    </tr>
                    <?php foreach ($listaEmp as $empresa): ?>
                    <!-- TABELA (DADOS DA EMPRESA) -->
                    <tr class="<?php echo $empresa['idempresa'] == '0' ? 'd-none' : '' ?>">
                        <td id="tr_nome"><?= $empresa['nome']; ?></td>
                        <td><?= $empresa['fantasia']; ?></td>
                        <td id="tr_doc"><?= $empresa['cnpj']; ?></td>
                        <td>
                            <a class="modalanchor" data-bs-toggle="modal"
                                data-bs-target="#empmodal<?= $empresa['idempresa'] ?>">
                                <i class="fa-solid fa-circle-info text-info px-0 py-2" title="Detalhes"></i>
                            </a>
                        </td>
                        <!-- BOTÕES EDITAR & EXCLUIR -->
                        <!-- EXCLUIR -->
                        <td class="<?= $linksAdm ?>">
                            <a data-bs-toggle='modal' data-bs-target='#empdeletemodal<?= $empresa['idempresa'] ?>'>
                                <i class="fa-solid fa-trash px-0 py-2 text-danger" title="Excluir" id="deleteicon"></i>
                            </a>
                        </td>

                        <!-- EDITAR -->
                        <td class="<?= $linksAdm ?>">
                            <a href="empeditar.php?idempresa=<?= $empresa['idempresa']; ?>">
                                <i class="fa-solid fa-pen-to-square px-0 py-2 text-warning" id="editbtn" title="Editar"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>

        <!-- FOOTER -->
        <?php
        require_once "$rootOvercrud/partials/footer.php";
        footer($voltar);
        ?>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/9e35ffe1bb.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="./js/darkmodetoggle.js"></script>
    <script src="./js/modals.js"></script>
    <script src="./js/mudarDisplay.js"></script>
    <script src="./js/ordenarNome.js"></script>
    <script src="./js/search.js"></script>
</body>

</html>