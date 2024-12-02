<?php
//PATHING
require_once "pathing.php";

//VERIFICAÇÃO DE SESSÃO
require_once "$rootOvercrud/validations/session_validation.php";

//VERIFICAÇÃO DE ADMIN
if ($tipoUsu != '1') {
    require_once "$rootOvercrud/resources/logout.php";
};

//CONEXÃO COM BD
require_once "$rootOvercrud/components/ConexaoBD.php";

//FUNÇÃO DE MENSAGENS
require_once "$rootOvercrud/resources/support.php";

//TABELAS DO BD
require_once "$rootOvercrud/resources/listas.php";

//RECEBIMENTO DE IDUSUARIO
$idusuario = $_GET['idusuario'];
$usuario = [];

//VERIFICAÇÃO DE DADOS ENVIADOS PELO FORM
if (!isset($idusuario)) {
    require_once "$rootOvercrud/resources/logout.php";
};
?>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<!-- HEAD -->
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

            <!-- CONFIRMAÇÂO DA EDIÇÃO -->
            <div class="col-4 col-md-6 text-center">
                <?php
                if ($idusuario) {
                    //CONSULTA DE USUÁRIO POR ID
                    $sqlConsultaIdUsu = ConexaoBD::conectarBD()->prepare("SELECT * FROM usuarios WHERE idusuario='$idusuario'");
                    $sqlConsultaIdUsu->execute();

                    //VERIFICAÇÃO SE EXISTE USUÁRIO COM O ID
                    if ($sqlConsultaIdUsu->rowCount() > 0) {
                        $usuario = $sqlConsultaIdUsu->fetch(PDO::FETCH_ASSOC);

                        //VERIFICAÇÃO SE EXISTE ENDEREÇO PARA O USUÁRIO
                        $enderecoUsu = 0;
                        for ($i = 0; $i < count($listaEnd); $i++) {
                            if ($usuario['idenderecousu'] == $listaEnd[$i]['idendereco']) {
                                $enderecoUsu = $listaEnd[$i];
                            };
                        };
                    } else {
                        mensagemRetorno("Usuário(a) não existe no Banco de Dados!", "danger");
                        BotaoVoltar('usulista.php', "secondary");
                    };
                } else {
                    mensagemRetorno("Usuário(a) não encontrado(a) (atributo inexistente)!", "danger");
                    BotaoVoltar('usulista.php', "secondary");
                };
                ?>
            </div>

            <!-- FORMULÁRIO DE EDIÇÃO -->
            <div class="col-6 col-md-8 <?php if ($sqlConsultaIdUsu->rowCount() == 0) echo 'd-none'; ?>">
                <form class="needs-validation" action="./src/usueditar_action.php" method="POST" novalidate>
                    <input type="hidden" name="idusuario" value="<?= $usuario['idusuario'] ?>">
                    <input type="hidden" name="idendereco" value="<?= $enderecoUsu['idendereco'] ?>">
                    <!-- FIELDSET CONTA -->
                    <fieldset>
                        <legend>DADOS DA CONTA</legend>
                        <!-- CPF -->
                        <div class="form-group">
                            <label for="cpf" class="form-label">CPF:</label>
                            <input type="text" class="form-control" name="cpf" id="cpf" minlength="14" maxlength="14"
                                data-mask="000.000.000-00" value="<?= $usuario['cpf'] ?>" required>
                            <div class="invalid-feedback" id="cpfinvalido">CPF inválido</div>
                        </div>

                        <!-- SENHA
                        <div class="form-group">
                            <label for="password" class="form-label">Senha:</label>
                            <input type="password" class="form-control" name="password" id="password" maxlength="16"
                                minlength="8" value="<?= $usuario['password'] ?>" required>
                        </div>
                        -->

                        <!-- TIPO -->
                        <div class="form-group">
                            <label for="tipo" class="form-label">Tipo:</label>
                            <select class="form-select" name="tipo" id="tipo" ?>">
                                <option value="0" <?= $usuario['tipo'] == 0 ? 'selected' : '' ?>>Comum</option>
                                <option value="1" <?= $usuario['tipo'] == 1 ? 'selected' : '' ?>>Admin</option>
                            </select>
                        </div>
                    </fieldset>

                    <!-- FIELDSET PESSOAIS -->
                    <fieldset>
                        <legend>DADOS PESSOAIS</legend>
                        <!-- NOME -->
                        <div class="form-group">
                            <label for="nome" class="form-label">Nome:</label>
                            <input type="text" class="form-control" name="nome" id="nome" minlength="1" maxlength="64"
                                value="<?= $usuario['nome'] ?>" required>
                            <div class="invalid-feedback">O nome precisa ser preenchido</div>
                        </div>

                        <!-- TELEFONE -->
                        <div class="form-group">
                            <label for="telefone" class="form-label">Telefone:</label>
                            <input type="tel" class="form-control" name="telefone" id="telefone" minlength="14"
                                maxlength="15" data-mask="(00) 00000-0000" value="<?= $usuario['telefone'] ?>">
                            <div class="invalid-feedback">O telefone precisa ter entre 10 e 11 números</div>
                        </div>
                    </fieldset>

                    <!-- FIELDSET ENDEREÇO -->
                    <fieldset>
                        <legend>ENDEREÇO</legend>
                        <!-- CEP -->
                        <div class="form-group">
                            <label for="cep" class="form-label"><i class="fa-solid fa-location-dot"></i>
                                CEP:</label>
                            <input type="text" class="form-control" name="cep" id="cep" minlength="10" maxlength="10"
                                data-mask="00.000-000" oninput="buscaCep()" value="<?= $enderecoUsu['cep'] ?>" required>
                            <div class="invalid-feedback">CEP inválido</div>
                        </div>

                        <!-- CIDADE & ESTADO -->
                        <div class="form-group">
                            <label for="cidadeestado" class="form-label"><i class="fa-solid fa-city"></i>
                                Cidade e Estado:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="cidadeestado" id="cidadeestado"
                                    style="width: 65%;" minlength="1" maxlength="32"
                                    value="<?= $enderecoUsu['cidade'] ?>" required>
                                <span class="input-group-text">UF</span>
                                <select class="form-select" name="estadocidade" id="estadocidade"
                                    value="<?= $enderecoUsu['estado'] ?>" required>
                                    <option value="AC" <?= $enderecoUsu['estado'] == "AC" ? 'selected' : ''; ?>>AC
                                    </option>
                                    <option value="AL" <?= $enderecoUsu['estado'] == "AL" ? 'selected' : ''; ?>>AL
                                    </option>
                                    <option value="AP" <?= $enderecoUsu['estado'] == "AP" ? 'selected' : ''; ?>>AP
                                    </option>
                                    <option value="AM" <?= $enderecoUsu['estado'] == "AM" ? 'selected' : ''; ?>>AM
                                    </option>
                                    <option value="BA" <?= $enderecoUsu['estado'] == "BA" ? 'selected' : ''; ?>>BA
                                    </option>
                                    <option value="CE" <?= $enderecoUsu['estado'] == "CE" ? 'selected' : ''; ?>>CE
                                    </option>
                                    <option value="DF" <?= $enderecoUsu['estado'] == "DF" ? 'selected' : ''; ?>>DF
                                    </option>
                                    <option value="ES" <?= $enderecoUsu['estado'] == "ES" ? 'selected' : ''; ?>>ES
                                    </option>
                                    <option value="GO" <?= $enderecoUsu['estado'] == "GO" ? 'selected' : ''; ?>>GO
                                    </option>
                                    <option value="MA" <?= $enderecoUsu['estado'] == "MA" ? 'selected' : ''; ?>>MA
                                    </option>
                                    <option value="MT" <?= $enderecoUsu['estado'] == "MT" ? 'selected' : ''; ?>>CE
                                    </option>
                                    <option value="MS" <?= $enderecoUsu['estado'] == "MS" ? 'selected' : ''; ?>>MS
                                    </option>
                                    <option value="MG" <?= $enderecoUsu['estado'] == "MG" ? 'selected' : ''; ?>>MG
                                    </option>
                                    <option value="PA" <?= $enderecoUsu['estado'] == "PA" ? 'selected' : ''; ?>>GO
                                    </option>
                                    <option value="PB" <?= $enderecoUsu['estado'] == "PB" ? 'selected' : ''; ?>>PB
                                    </option>
                                    <option value="PR" <?= $enderecoUsu['estado'] == "PR" ? 'selected' : ''; ?>>PR
                                    </option>
                                    <option value="PE" <?= $enderecoUsu['estado'] == "PE" ? 'selected' : ''; ?>>PE
                                    </option>
                                    <option value="PI" <?= $enderecoUsu['estado'] == "PI" ? 'selected' : ''; ?>>PI
                                    </option>
                                    <option value="RJ" <?= $enderecoUsu['estado'] == "RJ" ? 'selected' : ''; ?>>RJ
                                    </option>
                                    <option value="RS" <?= $enderecoUsu['estado'] == "RS" ? 'selected' : ''; ?>>RS
                                    </option>
                                    <option value="RO" <?= $enderecoUsu['estado'] == "RO" ? 'selected' : ''; ?>>RO
                                    </option>
                                    <option value="RR" <?= $enderecoUsu['estado'] == "RR" ? 'selected' : ''; ?>>RR
                                    </option>
                                    <option value="SC" <?= $enderecoUsu['estado'] == "SC" ? 'selected' : ''; ?>>SC
                                    </option>
                                    <option value="SP" <?= $enderecoUsu['estado'] == "SP" ? 'selected' : ''; ?>>SP
                                    </option>
                                    <option value="SE" <?= $enderecoUsu['estado'] == "SE" ? 'selected' : ''; ?>>SE
                                    </option>
                                    <option value="TO" <?= $enderecoUsu['estado'] == "TO" ? 'selected' : ''; ?>>GO
                                    </option>
                                </select>
                                <div class="invalid-feedback">A cidade e o Estado precisam ser preenchidos</div>
                            </div>
                        </div>

                        <!-- LOGRADOURO -->
                        <div class="form-group">
                            <label for="logradouro" class="form-label"><i class="fa-solid fa-road"></i>
                                Endereço:</label>
                            <div class="input-group">
                                <!-- ENDEREÇO -->
                                <input type="text" class="form-control" name="logradouro" id="logradouro"
                                    style="width: 60%;" minlength="1" maxlength="64"
                                    value="<?= $enderecoUsu['logradouro'] ?>" required>
                                <span class="input-group-text">nº</span>
                                <!-- NÚMERO -->
                                <input type="text" class="form-control" name="numlogradouro" id="numlogradouro"
                                    minlength="1" maxlength="6" value="<?= $enderecoUsu['numlogradouro'] ?>" required>
                                <div class="invalid-feedback">O endereço e o número precisam ser preenchidos</div>
                            </div>
                        </div>

                        <!-- BAIRRO -->
                        <div class="form-group">
                            <label for="bairro" class="form-label"><i class="fa-solid fa-vector-square"></i>
                                Bairro:</label>
                            <input type="text" class="form-control" name="bairro" id="bairro" minlength="1"
                                maxlength="32" value="<?= $enderecoUsu['bairro'] ?>" required>
                            <div class="invalid-feedback">O bairro precisa ser preenchido</div>
                        </div>
                    </fieldset>

                    <!-- FIELDSET CARRO -->
                    <fieldset>
                        <legend>HABILITAÇÃO E VEÍCULO</legend>
                        <!-- CNH -->
                        <div class="form-group">
                            <label for="cnh" class="form-label">CNH:</label>
                            <input type="text" class="form-control" name="cnh" id="cnh" minlength="9" maxlength="11"
                                value="<?= $usuario['cnh'] ?>">
                            <div class="invalid-feedback">A CNH precisa ter entre 9 e 11 números</div>
                        </div>

                        <!-- CARRO -->
                        <div class="form-group">
                            <label for="carro" class="form-label">Carro:</label>
                            <input type="text" class="form-control" name="carro" id="carro" maxlength="32"
                                value="<?= $usuario['carro'] ?>">
                        </div>
                    </fieldset>

                    <!-- FIELDSET EMPREGADO -->
                    <fieldset>
                        <!-- EMPREGADO EM -->
                        <legend>EMPREGADO EM</legend>
                        <div class="form-group">
                            <label for="empregadoem" class="form-label">Empresa:</label>
                            <select class="form-select" name="empregadoem" id="empregadoem"
                                value="<?= $usuario['idempregadoem'] ?>">
                                <?php foreach ($listaEmp as $empresa): ?>
                                <option value="<?= $empresa['idempresa'] ?>"
                                    <?= $usuario['idempregadoem'] == $empresa['idempresa'] ? 'selected' : '' ?>>
                                    <?= $empresa['nome'] ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </fieldset>

                    <!-- BUTTONS -->
                    <div class="form-group my-3 text-center">
                        <a href="usulista.php" class="btn btn-secondary loginbtn">VOLTAR</a>
                        <input type="submit" class="btn btn-primary loginbtn" value="ATUALIZAR">
                    </div>
                </form>
            </div>

            <!-- FOOTER -->
            <?php require_once "$rootOvercrud/partials/footer.php" ?>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
        <script src="https://kit.fontawesome.com/9e35ffe1bb.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
        <script src="./js/darkmodetoggle.js"></script>
        <script src="./js/mudarDisplay.js"></script>
        <script src="./js/usuFormValidations.js"></script>
        <script src="./js/buscaCep.js"></script>
</body>

</html>