<?php
function footer($voltar)
{
    echo "
    <footer class='mt-5 mb-2'>
        <div class='row d-flex flex-column justify-content-center align-items-center text-center'>
            <hr>
            <img src='$voltar/img/logo_footer.png' alt='Overdrive Softwares e Consultoria' style='width: 18rem'>
            <a href='mailto:contato@overdriveconsultoria.com.br' class='mt-2' id='emailfooter'>contato@overdriveconsultoria.com.br</a>
        </div>
    </footer>
    ";
}