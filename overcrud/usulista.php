<?php
//VERIFICAÇÃO DE SESSÃO
require_once 'sessionverif.php';

//CONEXÃO COM BD
require_once 'config.php';

//TABELAS DO BD
require_once 'sqltables.php';

//MODAL USUÁRIO
foreach ($listaUsu as $usuario): ?>
<div class='modal fade' id='usumodal<?= $usuario['idusuario'] ?>'>
    <div class='modal-dialog'>
        <div class='modal-content'>
            <!-- HEADER DO MODAL -->
            <div class='modal-header'>
                <h1 class='modal-title text-uppercase fs-5'><?= $usuario['nome'] ?></h1>
                <button class='btn-close' data-bs-dismiss='modal'></button>
            </div>
            <!-- CORPO DO MODAL -->
            <div class='modal-body'>
                <!-- STATUS -->
                <p class="mb-0 text-secondary display-6 fs-4"> <i class="fa-solid fa-chart-line"></i> Status: </p>
                <?php
                    if ($usuario['status'] == 1) {
                        echo "<div class='mt-0 mb-3 display-6 fs-5 text-success'> ATIVO</div>";
                    } else {
                        echo "<div class='mt-0 mb-3 display-6 fs-5 text-danger'> INATIVO</div>";
                    };
                    ?>

                <!-- CPF -->
                <p class="mb-0 text-secondary display-6 fs-4"> <i class="fa-solid fa-person"></i> CPF: </p>
                <div class="mt-0 mb-3 display-6 fs-5"> <?= $usuario['cpf']; ?> </div>

                <!-- TELEFONE -->
                <p class="mb-0 text-secondary display-6 fs-4"> <i class="fa-solid fa-phone"></i> Telefone:</p>
                <div class="mt-0 mb-3 display-6 fs-5">
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
                <div class="mt-0 mb-3 display-6 fs-5"> <?= $usuario['endereco']; ?> </div>

                <!-- CNH -->
                <p class="mb-0 text-secondary display-6 fs-4"> <i class="fa-solid fa-id-card"></i>
                    CNH: </p>
                <div class="mt-0 mb-3 display-6 fs-5">
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
                <div class="mt-0 mb-3 display-6 fs-5">
                    <?php
                        if ($usuario['carro'] == "" || $usuario['carro'] == null) {
                            echo "- NENHUM -";
                        } else {
                            echo $usuario['carro'];
                        }
                        ?>
                </div>

                <!-- TIPO -->
                <p class="mb-0 text-secondary display-6 fs-4"> <i class="fa-solid fa-file-invoice"></i>
                    Tipo de
                    Conta: </p>
                <div class="mt-0 mb-3 display-6 fs-5">
                    <?php
                        if ($usuario['tipo'] == 0) {
                            echo "Comum";
                        } else {
                            echo "Admin";
                        };
                        ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

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
            <table id="ListaUsuarios" class="table table-striped">
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
                            <i class="fa-solid fa-circle-info p-0" title="Detalhes" id="infoicon"></i>
                        </a>
                    </td>
                    <td class="<?= $linksAdm ?>">
                        <a href="emp_deletar.php?idusuario=<?= $usuario['idusuario']; ?>">
                            <i class="fa-solid fa-trash p-0" title="Deletar" id="deleteicon"></i>
                        </a>
                    </td>
                    <td class="<?= $linksAdm ?>">
                        <a href="emp_editar.php?idusuario=<?= $usuario['idusuario']; ?>">
                            <i class="fa-solid fa-pen-to-square p-0" title="Editar"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>

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
</body>

</html>