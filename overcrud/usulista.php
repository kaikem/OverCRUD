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
                            <i class="fa-solid fa-circle-info px-0 py-2" title="Detalhes" id="infoicon"></i>
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