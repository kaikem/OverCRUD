<?php
//PATHING
$root = $_SERVER["DOCUMENT_ROOT"];
require_once "$root/overcrud/pathing.php";

//VERIFICAÇÃO DE SESSÃO
require_once "$rootOvercrud/validations/session_validation.php";

//VERIFICAÇÃO DE ADMIN
if ($tipoUsu != '1') {
    require_once "$rootOvercrud/resources/logout.php";
};

//CONEXÃO COM BD
require_once "$rootOvercrud/components/ConexaoBD.php";

//FUNÇÕES DE SUPORTE
require_once "$rootOvercrud/resources/support.php";

//CLASSES
require_once "$rootOvercrud/components/Usuario.php";
require_once "$rootOvercrud/components/Endereco.php";

//RECEBIMENTO DE DADOS DO FORMULÁRIO
$idusuario = $_POST['idusuario'];
$cpf = $_POST['cpf'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$cnh = $_POST['cnh'];
$carro = $_POST['carro'];
$tipo = $_POST['tipo'];
$status = 0;
$empregadoEm = $_POST['empregadoem'];
$idenderecousu = $_POST['idendereco'];

$idendereco = $_POST['idendereco'];
$cep = $_POST['cep'];
$cidade = $_POST['cidadeestado'];
$estado = $_POST['estadocidade'];
$logradouro = $_POST['logradouro'];
$numlogradouro = $_POST['numlogradouro'];
$bairro = $_POST['bairro'];

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
    require_once "$rootOvercrud/resources/logout.php";
};
?>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<?php
require_once "$rootOvercrud/partials/head.php";
head('- Editar Usuário');
?>

<body>
    <div class="container">
        <!-- ROW DA NAVBAR -->
        <div class="row" id="navbartop">
            <?php require_once "$rootOvercrud/partials/navbartop.php" ?>
        </div>

        <!-- ROW DO CORPO -->
        <div class="row d-flex justify-content-center mt-5" id="appBody">

            <!-- TÍTULO DA SEÇÃO -->
            <h1 class="text-center text-primary display-6 my-5">EDITAR USUÁRIO(A)</h1>

            <!-- CONFIRMAÇÃO DE EDIÇÃO -->
            <div class="col-4 col-md-6 text-center">
                <?php
                //VERIFICAÇÃO DE EXISTÊNCIA DE ENDEREÇO
                $sqlVerifEnd = ConexaoBD::conectarBD()->query("SELECT * FROM enderecos WHERE cep='$cep' AND cidade='$cidade' AND estado='$estado' AND logradouro='$logradouro' AND numlogradouro='$numlogradouro' AND bairro='$bairro'");

                if ($sqlVerifEnd->rowCount() === 0) {
                    //PREPARAÇÃO E INSERÇÃO DE DADOS DO ENDEREÇO
                    $sqlInserirEnd = ConexaoBD::conectarBD()->prepare("INSERT INTO enderecos (cep, cidade, estado, logradouro, numlogradouro, bairro) VALUES ('$cep', '$cidade', '$estado', '$logradouro', '$numlogradouro', '$bairro')");
                    $sqlInserirEnd->execute();
                };

                //IDENDERECO DO ENDEREÇO NECESSÁRIO
                $sqlGetIdEnd = ConexaoBD::conectarBD()->query("SELECT MIN(idendereco) FROM enderecos WHERE cep='$cep' AND cidade='$cidade' AND estado='$estado' AND logradouro='$logradouro' AND numlogradouro='$numlogradouro' AND bairro='$bairro'");
                if ($sqlGetIdEnd->rowCount() > 0) {
                    $idendereco = $sqlGetIdEnd->fetchAll(PDO::FETCH_ASSOC);
                    $idenderecousu = $idendereco[0]["MIN(idendereco)"];
                };

                //ATUALIZAÇÃO DE CAMPOS NO BANCO DE DADOS
                $sqlAtualizarUsu = ConexaoBD::conectarBD()->prepare("UPDATE usuarios SET nome='$nome', telefone='$telefone', cpf='$cpf', cnh='$cnh', carro='$carro', idempregadoem='$empregadoEm', tipo='$tipo', status='$status', idenderecousu='$idenderecousu' WHERE idusuario='$idusuario'");
                $sqlAtualizarUsu->execute();

                mensagemRetorno("Os dados de <b> " . $novoUsuario->getNome() . " (CPF " . $novoUsuario->getNome() . ")</b> foram atualizados com sucesso!", "success");

                //BOTÃO VOLTAR
                BotaoVoltar('../usulista.php', "secondary");
                ?>

            </div>

            <!-- FOOTER -->
            <?php require_once "$rootOvercrud/partials/footer.php" ?>
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