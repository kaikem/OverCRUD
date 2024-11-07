<?php
//VERIFICAÇÃO DE SESSÃO
require_once 'sessionverif.php';

//CONEXÃO COM BD
require_once 'config.php';

//TABELAS DO BD
require_once 'sqltables.php';

//MODAL EMPRESA
foreach ($listaEmp as $empresa): ?>
<div class='modal fade' id='empmodal<?= $empresa['idempresa'] ?>'>
    <div class='modal-dialog'>
        <div class='modal-content'>
            <!-- HEADER DO MODAL -->
            <div class='modal-header'>
                <h1 class='modal-title text-uppercase fs-5 '><?= $empresa['nome'] ?></h1>
                <button class='btn-close' data-bs-dismiss='modal'></button>
            </div>
            <!-- CORPO DO MODAL -->
            <div class='modal-body'>
                <!-- CNPJ -->
                <p class="mb-0 text-secondary display-6 fs-4"> <i class="fa-solid fa-briefcase"></i> CNPJ: </p>
                <div class="mt-0 mb-2 display-6 fs-5"> <?= $empresa['cnpj']; ?> </div>

                <!-- FANTASIA -->
                <p class="mb-0 text-secondary display-6 fs-4"> <i class="fa-solid fa-building"></i> Nome
                    Fantasia: </p>
                <div class="mt-0 mb-2 display-6 fs-5"> <?= $empresa['fantasia']; ?> </div>

                <!-- TELEFONE -->
                <p class="mb-0 text-secondary display-6 fs-4"> <i class="fa-solid fa-phone"></i> Telefone:</p>
                <div class="mt-0 mb-2 display-6 fs-5"> <?= $empresa['telefone']; ?> </div>

                <!-- ENDEREÇO -->
                <p class="mb-0 text-secondary display-6 fs-4"> <i class="fa-solid fa-location-dot"></i>Endereço: </p>
                <div class="mt-0 mb-2 display-6 fs-5"> <?= $empresa['endereco']; ?> </div>

                <!-- RESPONSÁVEL -->
                <p class="mb-0 text-secondary display-6 fs-4"> <i class="fa-solid fa-user-tie"></i>Responsável: </p>
                <div class="mt-0 mb-2 display-6 fs-5"> <?= $empresa['responsavel']; ?> </div>
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
            <!-- LISTA (TABELA) -->
            <table id="ListaEmpresas" class="table table-striped">
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
                            <i class="fa-solid fa-circle-info p-0" title="Detalhes" id="infoicon"></i>
                        </a>
                    </td>
                    <td class="<?= $linksAdm ?>">
                        <a href="emp_deletar.php?idempresa=<?= $empresa['idempresa']; ?>">
                            <i class="fa-solid fa-trash p-0" title="Deletar" id="deleteicon"></i>
                        </a>
                    </td>
                    <td class="<?= $linksAdm ?>">
                        <a href="emp_editar.php?idempresa=<?= $empresa['idempresa']; ?>">
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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/9e35ffe1bb.js" crossorigin="anonymous"></script>
    <script src="./js/darkmodetoggle.js"></script>
    <script src="./js/modals.js"></script>
</body>

</html>