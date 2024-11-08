<?php
//VERIFICAÇÃO DE SESSÃO
require_once 'sessionverif.php';

//CONEXÃO COM BD
require_once 'config.php';

//TABELAS DO BD
require_once 'sqltables.php';

//MODAL USUÁRIO
require_once 'usumodal.php';
?>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css" />
    <title>OverCRUD - Usuários</title>
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
            <h1 class="text-center display-6 my-5">LISTA DE USUÁRIOS</h1>

            <!-- PESQUISA & BOTÕES DE MODO DE DISPLAY -->
            <?php require_once 'pesquisaDisplay.php' ?>

            <!-- LISTA (CARDS) -->
            <div class="row d-none" id="mostrarCardsUsuarios">
                <?php foreach ($listaUsu as $usuario) : ?>
                <div class="col-12 col-md-10 col-lg-6 col-xl-4 justify-content-center">
                    <!-- CARD -->
                    <div class="card mb-4 me-1 shadow" id="empcard" style="min-height: 36.1rem">
                        <!-- HEADER DO CARD -->
                        <div class="card-header d-flex text-center justify-content-center align-items-center"
                            style="min-height: 8rem; max-height: 8rem;">
                            <div class="d-flex flex-column">
                                <h4 class="text-uppercase" id="usunome"> <?= $usuario['nome']; ?> </h4>
                                <h6 class="text-secondary lead" id="usucpf"> CPF: <?= $usuario['cpf']; ?> </h6>

                                <?php
                                    if ($usuario['status'] == 1) {
                                        echo "<h6 class='text-success'> Status: ATIVO</h6>";
                                    } else {
                                        echo "<h6 class='text-danger'> Status: INATIVO</h6>";
                                    };
                                    ?>
                            </div>
                        </div>
                        <!-- CORPO DO CARD -->
                        <div class="card-body">
                            <div class="card-text">
                                <!-- TIPO -->
                                <p class="mb-0 text-secondary display-6 fs-4"> <i class="fa-solid fa-file-invoice"></i>
                                    Tipo de
                                    Conta: </p>
                                <div class="mt-0 mb-2 display-6 fs-5">
                                    <?php
                                        if ($usuario['tipo'] == 0) {
                                            echo "Comum";
                                        } else {
                                            echo "Admin";
                                        };
                                        ?>
                                </div>

                                <!-- TELEFONE -->
                                <p class="mb-0 text-secondary display-6 fs-4"> <i class="fa-solid fa-phone"></i>
                                    Telefone:
                                </p>
                                <div class="mt-0 mb-2 display-6 fs-5">
                                    <?php
                                        if ($usuario['telefone'] == "" || $usuario['telefone'] == null) {
                                            echo "- NÃO POSSUI -";
                                        } else {
                                            echo $usuario['telefone'];
                                        }
                                        ?>
                                </div>

                                <!-- ENDEREÇO -->
                                <p class="mb-0 text-secondary display-6 fs-4"> <i class="fa-solid fa-location-dot"></i>
                                    Endereço: </p>
                                <div class="mt-0 mb-2 display-6 fs-5"> <?= $usuario['endereco']; ?> </div>

                                <!-- CNH -->
                                <p class="mb-0 text-secondary display-6 fs-4"> <i class="fa-solid fa-id-card"></i>
                                    CNH: </p>
                                <div class="mt-0 mb-2 display-6 fs-5">
                                    <?php
                                        if ($usuario['cnh'] == "" || $usuario['cnh'] == null) {
                                            echo "- NÃO POSSUI -";
                                        } else {
                                            echo $usuario['cnh'];
                                        }
                                        ?>
                                </div>

                                <!-- CARRO -->
                                <p class="mb-0 text-secondary display-6 fs-4"> <i class="fa-solid fa-car"></i>
                                    Carro: </p>
                                <div class="mt-0 mb-2 display-6 fs-5">
                                    <?php
                                        if ($usuario['carro'] == "" || $usuario['carro'] == null) {
                                            echo "- NENHUM -";
                                        } else {
                                            echo $usuario['carro'];
                                        }
                                        ?>
                                </div>

                                <!-- EMPREGADO EM -->
                                <p class="mb-0 text-secondary display-6 fs-4"> <i class="fa-solid fa-briefcase"></i>
                                    Empregado em: </p>
                                <div class="mt-0 mb-2 display-6 fs-5">
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
                    </div>

                </div>
                <?php endforeach; ?>
            </div>

            <!-- LISTA (TABELA) -->
            <div class="" id="mostrarTabelaUsuarios">
                <table id="tabelaUsuarios" class="table table-striped">
                    <!-- TABELA (CABEÇALHO) -->
                    <tr class="table-secondary text-center">
                        <th>NOME</th>
                        <th>CPF</th>
                        <th>CNH</th>
                        <th>TELEFONE</th>
                        <th>STATUS</th>
                        <th> </th>
                        <th class="<?= $linksAdm ?>"> </th>
                        <th class="<?= $linksAdm ?>"> </th>
                    </tr>
                    <?php foreach ($listaUsu as $usuario): ?>
                    <!-- TABELA (DADOS DA EMPRESA) -->
                    <tr class="table">
                        <td><?= $usuario['nome']; ?></td>
                        <td><?= $usuario['cpf']; ?></td>
                        <td>
                            <?php
                                if ($usuario['cnh'] == "" || $usuario['cnh'] == null) {
                                    echo "- NÃO POSSUI -";
                                } else {
                                    echo $usuario['cnh'];
                                }
                                ?>
                        </td>
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
                        <td class="<?= $linksAdm ?>">
                            <a href="emp_deletar.php?idusuario=<?= $usuario['idusuario']; ?>">
                                <i class="fa-solid fa-trash px-0 py-2" title="Deletar" id="deleteicon"></i>
                            </a>
                        </td>
                        <td class="<?= $linksAdm ?>">
                            <a href="emp_editar.php?idusuario=<?= $usuario['idusuario']; ?>">
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

    <!-- SCRIPTS JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/9e35ffe1bb.js" crossorigin="anonymous"></script>
    <script src="./js/darkmodetoggle.js"></script>
    <script src="./js/modals.js"></script>
    <script src="./js/usuMudarDisplay.js"></script>
</body>

</html>