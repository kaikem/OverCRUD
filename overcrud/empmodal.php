<?php
foreach ($listaEmp as $empresa): ?>
<div class='modal fade' id='empmodal<?= $empresa['idempresa'] ?>'>
    <div class='modal-dialog'>
        <div class='modal-content'>
            <!-- HEADER DO MODAL -->
            <div class='modal-header'>
                <h1 class='modal-title text-uppercase fs-5'><?= $empresa['nome'] ?></h1>
                <button class='btn-close' data-bs-dismiss='modal'></button>
            </div>
            <!-- CORPO DO MODAL -->
            <div class='modal-body'>
                <!-- FANTASIA -->
                <p class="mb-0 text-secondary display-6 fs-4"> <i class="fa-solid fa-building"></i> Nome
                    Fantasia: </p>
                <div class="mt-0 mb-3 display-6 fs-5"> <?= $empresa['fantasia']; ?> </div>

                <!-- CNPJ -->
                <p class="mb-0 text-secondary display-6 fs-4"> <i class="fa-solid fa-briefcase"></i> CNPJ: </p>
                <div class="mt-0 mb-3 display-6 fs-5"> <?= $empresa['cnpj']; ?> </div>

                <!-- TELEFONE -->
                <p class="mb-0 text-secondary display-6 fs-4"> <i class="fa-solid fa-phone"></i> Telefone:</p>
                <div class="mt-0 mb-3 display-6 fs-5"> <?= $empresa['telefone']; ?> </div>

                <!-- ENDEREÇO -->
                <p class="mb-0 text-secondary display-6 fs-4"> <i class="fa-solid fa-location-dot"></i>Endereço: </p>
                <div class="mt-0 mb-3 display-6 fs-5"> <?= $empresa['endereco']; ?> </div>

                <!-- RESPONSÁVEL -->
                <p class="mb-0 text-secondary display-6 fs-4"> <i class="fa-solid fa-user-tie"></i>Responsável: </p>
                <div class="mt-0 mb-3 display-6 fs-5"> <?= $empresa['responsavel']; ?> </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>