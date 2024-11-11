<?php
foreach ($listaEmp as $empresa): ?>
    <div class='modal fade' id='empdeletemodal<?= $empresa['idempresa'] ?>'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <!-- HEADER DO MODAL -->
                <div class='modal-header'>
                    <h1 class='modal-title text-uppercase fs-5'>Excluir empresa</h1>
                </div>
                <!-- CORPO DO MODAL -->
                <div class='modal-body'>
                    Tem certeza que quer excluir a empresa <b><?= $empresa['nome'] ?> (CNPJ: <?= $empresa['cnpj'] ?>)</b>?
                </div>
                <div class='modal-footer'>
                    <button class='btn btn-secondary' data-bs-dismiss='modal'>Voltar</button>
                    <a class='btn btn-danger'
                        href='empdelete_action.php?idempresa=<?= $empresa['idempresa']; ?>'>Excluir</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>