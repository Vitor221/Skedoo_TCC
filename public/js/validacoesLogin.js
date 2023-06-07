const form = document.getElementById("form");

form.addEventListener("submit", function(event) {

    const nmLogin = document.getElementById("nm_login");
    const cdSenha = document.getElementById("cd_senha");
    var erroLogin = document.getElementById("erroLogin");
    var erroSenha = document.getElementById("erroSenha");
    var erroTotal = document.getElementById("erroTotal");

    const login = nmLogin.value;
    const senha = cdSenha.value;

    let isValid = true;

    if(login.trim() === '') {
        erroLogin.textContent = "Campo login é obrigatório";
        erroLogin.style.color = "red";
        event.preventDefault();
    }

    if(senha.trim() === '') {
        erroSenha.textContent = "Campo senha é obrigatório";
        erroSenha.style.color = "red";
        event.preventDefault();
    }

    if(login.trim() !== '' && senha.trim() !== '' && !isValid) {
        erroTotal.textContent = "Login e senha inválidos";
        erroTotal.style.color = "red";
        event.preventDefault();
    }

    if(isValid) {
        form.submit;
    }
});
