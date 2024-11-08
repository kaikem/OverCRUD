$('#empmodal').on('show.bs.modal', function (event) {
    var card = $(event.relatedTarget) // card that triggered the modal
    var recipient = card.data('whatever') // Extract info from data-* attributes
    var modal = $(this)
    modal.find('.modal-title').text('New message to ' + recipient)
    modal.find('.modal-body input').val(recipient)
  });

  /*
                  <div class="card my-3 mx-1 shadow" id="empcard" style="min-height: 14rem;" data-bs-toggle="modal" data-bs-target="#empmodal" data-bs-whatever="">
                    <!-- MODAL -->
                    <div class="modal fade" id="empmodal">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-4" id="empmodaltitle">
                                        <?= $empresa['nome']; ?>
                                        <?= $empresa['cnpj']; ?>
                                    </h1>
                                    <button class="btn-close" data-bs-dimiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <p class="mb-0"> <span class="fw-bold">Nome Fantasia: </span> <?= $empresa['fantasia']; ?> </p>
                                    <p class="mb-0"> <span class="fw-bold">Telefone: </span> <?= $empresa['telefone']; ?> </p>
                                    <p class="mb-0"> <span class="fw-bold">Endereço: </span> <?= $empresa['endereco']; ?> </p>
                                    <p class="mb-0"> <span class="fw-bold">Responsável: </span> <?= $empresa['responsavel']; ?> </p>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-warning">Editar</button>
                                    <button class="btn btn-danger">Excluir</button>
                                </div>
                            </div>
                        </div>
                    </div>
  */