
const validateForm = () => {
    var pass  = document.getElementById('password').value;
    var rePass = document.getElementById('repassword').value;

    if (pass != rePass)
    {

        alert('Las contraseñas no coinciden');
        event.preventDefault();
    }
}