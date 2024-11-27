<?php
//VERIFICAÇÃO DE SESSÃO
require_once '../validations/session_validation.php';

//VERIFICAÇÃO DE ADMIN
if ($tipoUsu != '1') {
    require_once '../resources/logout.php';
};

//CONEXÃO COM BD
require_once '../components/ConexaoBD.php';

//FUNÇÕES DE SUPORTE
require_once '../resources/support.php';

//CLASSES
require_once '../components/Usuario.php';
require_once '../components/Endereco.php';

//RECEBIMENTO DE DADOS DO FORMULÁRIO
$idusuario = $_POST['idusuario'];
$cpf = $_POST['cpf'];
$tipo = $_POST['tipo'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$cep = $_POST['cep'];
$cidade = $_POST['cidadeestado'];
$estado = $_POST['estadocidade'];
$logradouro = $_POST['logradouro'];
$numlogradouro = $_POST['numlogradouro'];
$bairro = $_POST['bairro'];
$cnh = $_POST['cnh'];
$carro = $_POST['carro'];
$empregadoEm = $_POST['empregadoem'];
$status = 0;

$novoUsuario = new Usuario();
$novoUsuario->setNome($nome);
$novoUsuario->setTelefone($telefone);
$novoUsuario->setCpf($cpf);
$novoUsuario->setCnh($cnh);
$novoUsuario->setCarro($carro);
$novoUsuario->setIdempregadoem($empregadoEm);
$novoUsuario->setTipo($tipo);
$novoUsuario->setStatus($status);

$novoEndereco = new Endereco();
$novoEndereco->setCep($cep);
$novoEndereco->setCidade($cidade);
$novoEndereco->setEstado($estado);
$novoEndereco->setLogradouro($logradouro);
$novoEndereco->setNumlogradouro($numlogradouro);
$novoEndereco->setBairro($bairro);

//VERIFICAÇÃO DE EMPREGADO EM
if ($empregadoEm != 0) {
    $status = 1;
    $novoUsuario->setStatus($status);
};

//VERIFICAÇÃO DE DADOS ENVIADOS PELO FORM
if (!isset($idusuario)) {
    require_once '../resources/logout.php';
};
?>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<?php
require_once './partials/head.php';
head('- Editar Usuário');
?>

<body>
    <div class="container">
        <!-- ROW DA NAVBAR -->
        <div class="row" id="navbartop">
            <?php require_once '../partials/navbartop.php' ?>
        </div>

        <!-- ROW DO CORPO -->
        <div class="row d-flex justify-content-center mt-5" id="appBody">

            <!-- TÍTULO DA SEÇÃO -->
            <h1 class="text-center text-primary display-6 my-5">EDITAR USUÁRIO(A)</h1>

            <!-- CONFIRMAÇÃO DE EDIÇÃO -->
            <div class="col-4 col-md-6 text-center">
                <?php
                //ATUALIZAÇÃO DE CAMPOS NO BANCO DE DADOS
                $sqlAtualizar = ConexaoBD::conectarBD()->prepare("UPDATE usuarios SET nome='$nome', telefone='$telefone', cpf='$cpf', cep='$cep', cidade='$cidade', estado='$estado', logradouro='$logradouro', numlogradouro='$numlogradouro', bairro='$bairro', cnh='$cnh', carro='$carro', idempregadoem='$empregadoEm', tipo='$tipo', status='$status' WHERE idusuario='$idusuario'");
                $sqlAtualizar->execute();

                mensagemRetorno("Os dados de <b>$nome (CPF $cpf)</b> foram atualizados com sucesso!", "success");

                //BOTÃO VOLTAR
                BotaoVoltar('../usulista.php', "secondary");
                ?>

            </div>

            <!-- FOOTER -->
            <?php require_once '../partials/footer.php' ?>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
        <script src="https://kit.fontawesome.com/9e35ffe1bb.js" crossorigin="anonymous"></script>
        <script src="./js/darkmodetoggle.js"></script>
        <script src="./js/modals.js"></script>
        <script src="./js/mudarDisplay.js"></script>
</body>

</html>