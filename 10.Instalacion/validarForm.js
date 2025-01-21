function validarContrasenas() {
    var contrasenia = document.getElementById("contrasenia").value;
    var repetirContrasenia = document.getElementById("repetirContrasenia").value;
    if (contrasenia !== repetirContrasenia) {
        alert("Las contraseñas no coinciden");
        return false;
    }
    return true;
}