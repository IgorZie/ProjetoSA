function showPassword() {
    const eye = window.document.getElementById('eye')
    const eyeSlash = document.getElementById('eye-slash')
    const fieldPassword = document.getElementById('senha')

    if (eye.style.display === 'none') {
        eye.style.display = 'block'
        eyeSlash.style.display = 'none'
        fieldPassword.type = 'text'
    } else {
        eye.style.display = 'none'
        eyeSlash.style.display = 'block'
        fieldPassword.type = 'password'
    }
}

function voltar() {
    window.location.href = "http://localhost/ProjetoSA/HomePage/index.php";
}

function conferirSenha() {
    let senha = document.getElementById('senha').value;
    let senha2 = document.getElementById('senha2').value;
    let nome = document.getElementById('nome').value;
    let apelido = document.getElementById('apelido').value;
    let sexo = document.getElementById('sexo').value;
    let email = document.getElementById('email').value;
    let dataNasc = document.getElementById('dataNasc').value;
    let estado = document.getElementById('estado').value;
    let cidade = document.getElementById('cidade').value;

    if (senha != senha2 || senha2 != senha) {
        alert("As senhas não são iguais, verifique os campos senha");
        formulario.senha.focus();
        return false;
    }

    if (nome == "" || apelido == "" || email == "" || sexo == "" || dataNasc == "" || estado == "" || cidade == ""){
        alert('Preencha todos os campos');
    } else {
        alert('Cadastrado com sucesso!');
    }

}


        

