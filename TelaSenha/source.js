function  showPassword(){
    const eye = window.document.getElementById('eye')
    const eyeSlash = document.getElementById('eye-slash')
    const fieldPassword = document.getElementById('senha')

    if(eye.style.display === 'none'){
        eye.style.display = 'block'
        eyeSlash.style.display = 'none'
        fieldPassword.type = 'text'
    } else {
        eye.style.display = 'none'
        eyeSlash.style.display = 'block'
        fieldPassword.type = 'password'
    }
}

function conferirSenha() {
    let chave = document.getElementById('chave').value;
    let senha = document.getElementById('senha').value;
    let senha2 = document.getElementById('senha2').value;

    if (chave == ""){
        alert("Preencha o campo da chave de recuperação");
        formulario.chave.focus();
        return false;
    }
    
    if (senha != senha2 || senha2 != senha) {
        alert("As senhas não são iguais, verifique os campos senha");
        formulario.senha.focus();
        return false;
    }

}