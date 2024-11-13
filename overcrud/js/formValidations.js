//FORMULÁRIO
const form = document.querySelector('.needs-validation');

//VERIFICAÇÕES NO SUBMIT
form.addEventListener('submit', (evento)=>{
    if(!form.checkValidity()){
        evento.preventDefault();
        alert("Dados incorretos! Por favor, verifique o formulário.");
    };
    form.classList.add('was-validated');
});