function  showPassword(){
    const eye = window.document.getElementById('eye')
    const eyeSlash = document.getElementById('eye-slash')
    const fieldPassword = document.getElementById('field-password')

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

function  showPassword2(){
    const eye = window.document.getElementById('eye2')
    const eyeSlash = document.getElementById('eye-slash2')
    const fieldPassword = document.getElementById('field-password2')

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
