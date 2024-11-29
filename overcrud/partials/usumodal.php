<?php
//PATHING
$root = $_SERVER["DOCUMENT_ROOT"];
require_once "$root/overcrud/pathing.php";

//TABELAS DO BD
require_once "$rootOvercrud/resources/listas.php";

foreach ($listaUsu as $usuario): ?>
<div class='modal fade' id='usumodal<?= $usuario['idusuario'] ?>'>
    <div class='modal-dialog'>
        <div class='modal-content'>
            <!-- HEADER DO MODAL -->
            <div class='modal-header'>
                <h1 class='modal-title text-uppercase fs-5'><i class="fa-solid fa-user"></i> <?= $usuario['nome'] ?>
                </h1>
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
                <p class="mb-0 text-secondary display-6 fs-4"> <i class="fa-solid fa-location-dot"></i> Endereço: </p>
                <div class="mt-0 display-6 fs-5">
                    <?php
                        for ($i = 0; $i < count($listaEnd); $i++) {
                            if ($usuario['idenderecousu'] == $listaEnd[$i]['idendereco']) {
                                echo "End.: " . $listaEnd[$i]['logradouro'] . ", nº " . $listaEnd[$i]['numlogradouro'];
                            };
                        };
                        ?>
                </div>
                <div class="mt-0 display-6 fs-5">
                    <?php
                        for ($i = 0; $i < count($listaEnd); $i++) {
                            if ($usuario['idenderecousu'] == $listaEnd[$i]['idendereco']) {
                                echo "Bairro: " . $listaEnd[$i]['bairro'];
                            };
                        };
                        ?>
                </div>
                <div class="mt-0 mb-3 display-6 fs-5">
                    <?php
                        for ($i = 0; $i < count($listaEnd); $i++) {
                            if ($usuario['idenderecousu'] == $listaEnd[$i]['idendereco']) {
                                echo "Cidade: " . $listaEnd[$i]['cidade'] . " - " . $listaEnd[$i]['estado'];
                            };
                        };
                        ?>
                </div>

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

                <!-- EMPREGADO EM -->
                <p class="mb-0 text-secondary display-6 fs-4"> <i class="fa-solid fa-briefcase"></i>
                    Empregado(a) em: </p>
                <div class="mt-0 mb-3 display-6 fs-5">
                    <?php
                        for ($i = 0; $i < count($listaEmp); $i++) {
                            if ($usuario['idempregadoem'] == $listaEmp[$i]['idempresa']) {
                                echo $listaEmp[$i]['nome'];
                            };
                        };
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