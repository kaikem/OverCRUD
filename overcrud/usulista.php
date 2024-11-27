<?php
//VERIFICAÇÃO DE SESSÃO
require_once './validations/session_validation.php';

//MODALS
require_once './partials/usumodal.php';
require_once './partials/usudeletemodal.php';

//ARRAYS DE DADOS
require_once './resources/listas.php';
?>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<?php
require_once './partials/head.php';
head('- Usuários');
?>

<body>
    <div class="container">
        <!-- ROW DA NAVBAR -->
        <div class="row" id="navbartop">
            <?php require_once './partials/navbartop.php' ?>
        </div>

        <!-- ROW DO CORPO -->
        <div class="row d-flex mt-5" id="appBody">

            <!-- TÍTULO DA SEÇÃO -->
            <h1 class="text-center text-primary display-6 my-5">LISTA DE USUÁRIOS</h1>

            <!-- PESQUISA & BOTÕES DE MODO DE DISPLAY -->
            <?php require_once './partials/searchbar.php' ?>

            <!-- LISTA (CARDS) -->
            <div class="row d-none" id="mostrarcards">
                <?php foreach ($listaUsu as $usuario) : ?>
                <div class="col-12 col-md-10 col-lg-6 col-xl-4 justify-content-center" id="card">
                    <!-- CARD -->
                    <div class="card mb-4 me-1" id="usucard" style="min-height: 41.8rem">
                        <!-- HEADER DO CARD -->
                        <div class="card-header d-flex text-center justify-content-center align-items-center"
                            style="min-height: 8rem; max-height: 8rem;">
                            <div class="d-flex flex-column">
                                <h4 class="text-uppercase" id="ch_nome"> <?= $usuario['nome']; ?> </h4>
                                <h6 class="text-secondary lead" id="ch_doc"> CPF: <?= $usuario['cpf']; ?> </h6>


                            </div>
                        </div>
                        <!-- CORPO DO CARD -->
                        <div class="card-body">
                            <div class="card-text">
                                <!-- STATUS -->
                                <p class="cardlabel mb-0 text-secondary display-6"> <i
                                        class="fa-solid fa-file-invoice"></i>
                                    Status da
                                    Conta: </p>
                                <div class="cardinfo mt-0 mb-2 display-6">
                                    <?php
                                        if ($usuario['status'] == 1) {
                                            echo "<p class='text-success mb-0'> ATIVO</p>";
                                        } else {
                                            echo "<p class='text-danger mb-0'> INATIVO</p>";
                                        };
                                        ?>
                                </div>

                                <!-- TIPO -->
                                <p class="cardlabel mb-0 text-secondary display-6"> <i
                                        class="fa-solid fa-file-invoice"></i>
                                    Tipo de
                                    Conta: </p>
                                <div class="cardinfo mt-0 mb-2 display-6">
                                    <?php
                                        if ($usuario['tipo'] == 0) {
                                            echo "Comum";
                                        } else {
                                            echo "Admin";
                                        };
                                        ?>
                                </div>

                                <!-- TELEFONE -->
                                <p class="cardlabel mb-0 text-secondary display-6"> <i class="fa-solid fa-phone"></i>
                                    Telefone:
                                </p>
                                <div class="cardinfo mt-0 mb-2 display-6">
                                    <?php
                                        if ($usuario['telefone'] == "" || $usuario['telefone'] == null) {
                                            echo "- NÃO POSSUI -";
                                        } else {
                                            echo $usuario['telefone'];
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
                                            if ($usuario['idenderecousu'] == $listaEnd[$i]['idendereco']) {
                                                echo "End.: ".$listaEnd[$i]['logradouro'].", nº ".$listaEnd[$i]['numlogradouro'];
                                            };
                                        };
                                    ?>
                                </div>
                                <div class="cardinfo mt-0 display-6">
                                    <?php
                                        for ($i = 0; $i < count($listaEnd); $i++) {
                                            if ($usuario['idenderecousu'] == $listaEnd[$i]['idendereco']) {
                                                echo "Bairro: ".$listaEnd[$i]['bairro'];
                                            };
                                        };
                                    ?>
                                </div>
                                <div class="cardinfo mt-0 mb-2 display-6">
                                    <?php
                                        for ($i = 0; $i < count($listaEnd); $i++) {
                                            if ($usuario['idenderecousu'] == $listaEnd[$i]['idendereco']) {
                                                echo "Cidade: ".$listaEnd[$i]['cidade']." - ".$listaEnd[$i]['estado'];
                                            };
                                        };
                                    ?>
                                </div>

                                <!-- CNH -->
                                <p class="cardlabel mb-0 text-secondary display-6"> <i class="fa-solid fa-id-card"></i>
                                    CNH: </p>
                                <div class="cardinfo mt-0 mb-2 display-6">
                                    <?php
                                        if ($usuario['cnh'] == "" || $usuario['cnh'] == null) {
                                            echo "- NÃO POSSUI -";
                                        } else {
                                            echo $usuario['cnh'];
                                        }
                                        ?>
                                </div>

                                <!-- CARRO -->
                                <p class="cardlabel mb-0 text-secondary display-6"> <i class="fa-solid fa-car"></i>
                                    Carro: </p>
                                <div class="cardinfo mt-0 mb-2 display-6">
                                    <?php
                                        if ($usuario['carro'] == "" || $usuario['carro'] == null) {
                                            echo "- NENHUM -";
                                        } else {
                                            echo $usuario['carro'];
                                        }
                                        ?>
                                </div>

                                <!-- EMPREGADO EM -->
                                <p class="cardlabel mb-0 text-secondary display-6"> <i
                                        class="fa-solid fa-briefcase"></i>
                                    Empregado em: </p>
                                <div class="cardinfo mt-0 mb-2 display-6">
                                    <?php
                                        for ($i = 0; $i < count($listaEmp); $i++) {
                                            if ($usuario['idempregadoem'] == $listaEmp[$i]['idempresa']) {
                                                echo $listaEmp[$i]['nome'];
                                            };
                                        };
                                        ?>
                                </div>
                            </div>
                        </div>
                        <!-- BOTÕES EDITAR & EXCLUIR -->
                        <div class="d-flex align-bottom justify-content-center gap-2 my-2 <?= $linksAdm ?>">
                            <!-- EXCLUIR -->
                            <a data-bs-toggle='modal' data-bs-target='#usudeletemodal<?= $usuario['idusuario'] ?>'>
                                <i class="fa-solid fa-trash btn btn-outline-danger border-3 p-2 rounded-circle"
                                    title="Deletar"></i>
                            </a>

                            <!-- EDITAR -->
                            <a href="usueditar.php?idusuario=<?= $usuario['idusuario']; ?>">
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
                <table id="tabelausuarios" class="table table-striped">
                    <!-- TABELA (CABEÇALHO) -->
                    <tr class="table-secondary text-center">
                        <th onclick="ordenar(0)" class="tableheader">NOME</th>
                        <th onclick="ordenar(1)" class="tableheader">CPF</th>
                        <th onclick="ordenar(2)" class="tableheader">TELEFONE</th>
                        <th onclick="ordenar(3)" class="tableheader">TIPO</th>
                        <th onclick="ordenar(4)" class="tableheader">STATUS</th>
                        <th> </th>
                        <th class="<?= $linksAdm ?>"> </th>
                        <th class="<?= $linksAdm ?>"> </th>
                    </tr>
                    <?php foreach ($listaUsu as $usuario): ?>
                    <!-- TABELA (DADOS DO USUÁRIO -->
                    <tr>
                        <td id="tr_nome"><?= $usuario['nome']; ?></td>
                        <td id="tr_doc"><?= $usuario['cpf']; ?></td>
                        <td>
                            <?php
                                if ($usuario['telefone'] == "" || $usuario['telefone'] == null) {
                                    echo "- NÃO POSSUI -";
                                } else {
                                    echo $usuario['telefone'];
                                }
                                ?>
                        </td>
                        <td>
                            <?php
                                if ($usuario['tipo'] == "1") {
                                    echo "<div class='text-primary'>ADMIN</div>";
                                } else {
                                    echo "Comum";
                                }
                                ?>
                        </td>
                        <td>
                            <?php
                                if ($usuario['status'] == 1) {
                                    echo "<div class='text-success'>ATIVO</div>";
                                } else {
                                    echo "<div class='text-danger'>INATIVO</div>";
                                };
                                ?>
                        </td>
                        <td>
                            <a class="modalanchor" data-bs-toggle="modal"
                                data-bs-target="#usumodal<?= $usuario['idusuario'] ?>">
                                <i class="fa-solid fa-circle-info text-primary px-0 py-2" title="Detalhes"></i>
                            </a>
                        </td>

                        <!-- BOTÕES EDITAR & EXCLUIR -->
                        <!-- EXCLUIR -->
                        <td class="<?= $linksAdm ?>">
                            <a data-bs-toggle='modal' data-bs-target='#usudeletemodal<?= $usuario['idusuario'] ?>'>
                                <i class="fa-solid fa-trash px-0 py-2" title="Deletar" id="deleteicon"></i>
                            </a>
                        </td>

                        <!-- EDITAR -->
                        <td class="<?= $linksAdm ?>">
                            <a href="usueditar.php?idusuario=<?= $usuario['idusuario']; ?>">
                                <i class="fa-solid fa-pen-to-square px-0 py-2" style="color: white;" title="Editar"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>

        </div>

        <!-- FOOTER -->
        <?php require_once './partials/footer.php' ?>
    </div>

    <!-- SCRIPTS JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/9e35ffe1bb.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="./js/darkmodetoggle.js"></script>
    <script src="./js/modals.js"></script>
    <script src="./js/usuMudarDisplay.js"></script>
    <script src="./js/ordenarNome.js"></script>
    <script src="./js/search.js"></script>
</body>

</html>