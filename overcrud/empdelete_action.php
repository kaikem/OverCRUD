<?php
//VERIFICAÇÃO DE SESSÃO
require_once 'sessionverif.php';

//CONEXÃO COM BD
require_once 'config.php';

//FUNÇÃO DE MENSAGENS
require_once 'support.php';

//TABELAS DO BD
require_once 'sqltables.php';

//MODALS
require_once 'empmodal.php';
require_once 'empdeletemodal.php';

//RECEBIMENTO DE IDEMPRESA
$idempresa = $_GET['idempresa'];
$empresa = [];
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
    <title>OverCRUD - Exclusão de Empresas</title>
</head>

<body>
    <div class="container">
        <!-- ROW DA NAVBAR -->
        <div class="row" id="navbarTop">
            <?php require_once 'navbarTop.php' ?>
        </div>

        <!-- ROW DO CORPO -->
        <div class="row d-flex justify-content-center mt-5" id="appBody">

            <!-- TÍTULO DA SEÇÃO -->
            <h1 class="text-center text-primary display-6 my-5">EXCLUIR EMPRESA</h1>

            <!-- CONFIRMAÇÃO DE EXCLUSÃO -->
            <div class="col-4 col-md-6 text-center">
                <?php
                if ($idempresa) {
                    $sqlConsulta = $pdo->query("SELECT * FROM empresas WHERE idempresa='$idempresa'");

                    if ($sqlConsulta->rowCount() > 0) {
                        $empresa = $sqlConsulta->fetch(PDO::FETCH_ASSOC);
                        mensagemRetorno("Empresa <b>{$empresa['nome']}</b> excluída com sucesso!", "success");

                        $sqlExcluir = $pdo->prepare("DELETE FROM empresas WHERE idempresa='$idempresa'");
                        $sqlExcluir->execute();
                    } else {
                        mensagemRetorno("Empresa não existe no Banco de Dados!", "danger");
                    }
                } else {
                    mensagemRetorno("Empresa não encontrada (atributo inexistente)!", "danger");
                };
                ?>

                <!-- BOTÃO VOLTAR -->
                <a href="emplista.php" class="d-block btn btn-warning">VOLTAR</a>
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