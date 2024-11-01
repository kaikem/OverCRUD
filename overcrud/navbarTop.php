<?php
echo "
            <!-- NAVBAR -->
            <nav class='navbar navbar-expand-md text-bg-secondary fixed-top p-1' style='--bs-bg-opacity: .95;'>
                <div class='container'>                   
                    <!-- LOGO & LINKS -->
                    <div class='row align-items-center'>
                        <!-- COLUNA 01 (LOGOTIPO) -->
                        <div class='d-none col-lg-4 d-lg-flex p-0'>
                            <!-- LOGOTIPO GRANDE -->
                            <a href='home.php' class='navbar-brand p-0'><img src='./img/logo_white3.png' alt='OverCRUD'
                                    style='width: 75%;'></a>
                        </div>
                        <div class='d-none col-md-3 d-md-flex d-lg-none p-0'>
                            <!-- LOGOTIPO PEQUENO -->
                            <a href='home.php' class='navbar-brand p-0'><img src='./img/logo_white_mini.png' alt='OverCRUD'
                                    style='width: 25%;'></a>
                        </div>

                        <!-- COLUNA 02 (LINKS) -->
                        <div class='col-6 col-md-7 col-lg-6'>
                            <!-- HAMBURUER BUTTON -->
                            <button type='button' class='navbar-toggler' data-bs-toggle='collapse'
                                data-bs-target='#navbarMain'>
                                <span class='navbar-toggler-icon'></span>
                            </button>
                            <!-- LINKS NAVBAR -->
                            <div class='collapse navbar-collapse justify-content-end' id='navbarMain'>
                                <ul class='navbar-nav gap-3'>
                                    <li class='navbar-item d-flex d-md-none'>
                                        <a href='home.php' class='nav-link fs-5'>Home</a>
                                    </li>
                                    <li class='navbar-item dropdown'>
                                        <a href='#' class='nav-link fs-5 dropdown-toggle'
                                            data-bs-toggle='dropdown'>Empresas</a>
                                        <ul class='dropdown-menu dropdown-menu-dark'>
                                            <li> <a href='emplista.php' class='dropdown-item'>Consultar empresas</a>
                                            </li>
                                            <li> <a href='empcadastro.php' class='dropdown-item'>Cadastrar Nova</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class='navbar-item dropdown'>
                                        <a href='#' class='nav-link fs-5 dropdown-toggle'
                                            data-bs-toggle='dropdown'>Usuários</a>
                                        <ul class='dropdown-menu dropdown-menu-dark'>
                                            <li> <a href='usulista.php' class='dropdown-item'>Consultar usuários</a>
                                            </li>
                                            <li> <a href='usucadastro.php' class='dropdown-item'>Cadastrar Novo</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class='navbar-item'>
                                        <a href='#' class='nav-link fs-5'>Contato</a>
                                    </li>
                                    <li class='navbar-item'>
                                        <a href='#' class='nav-link fs-5'>Sobre</a>
                                    </li>
                                    <li class='navbar-item d-flex d-md-none'>
                                        <a href='home.php' class='nav-link text-danger fs-5 fw-bold' data-bs-toggle='modal' data-bs-target='#modallogout'>SAIR</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- COLUNA 03 (DARKMODE & SAIR) -->
                        <div class='d-none col-md-2 d-md-flex justify-content-end'>
                            <!-- DARKMODE -->
                            <div class='btn-group btn-grup-sm'>
                                <button class='btn btn-dark rounded-start-5 p-1 darkmodebtnint' data-bs-theme-value='dark'>Dark</button>
                                <button class='btn btn-light rounded-end-5 p-1 darkmodebtnint' data-bs-theme-value='light'>Light</button>
                            </div>
                            <!-- SAIR -->
                            <a class='btn btn-danger rounded-circle p-1 ms-3 sairbtn' data-bs-toggle='modal'
                                data-bs-target='#modallogout'>Sair</a>
                        </div>

</div>
</div>
</nav>

<!-- MODAL -->
<div class='modal fade' id='modallogout'>
    <div class='modal-dialog modal-sm'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h1 class='modal-title fs-5'>SAIR DO SISTEMA</h1>
            </div>
            <div class='modal-body text-center'>Tem certeza que deseja sair?</div>
            <div class='modal-footer'>
                <button class='btn btn-secondary' data-bs-dismiss='modal'>Voltar</button>
                <a class='btn btn-danger' href='logout.php'>Sair</a>
            </div>
        </div>
    </div>
</div>
";