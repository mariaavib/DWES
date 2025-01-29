function validarFormulario(event) {

    const nombre = document.getElementById('nombre').value;
    const contrasenia = document.getElementById('contrasenia').value;
    const contraseniaRepetida = document.getElementById('contraseniaRepetida').value;

    //Validación de campos vacíos
    if (nombre === "" || contrasenia === "" || contraseniaRepetida === "") {
        alert("Todos los campos deben ser rellenos");
        return false; 
    }

    //Validación de las contraseñas
    if (contrasenia !== contraseniaRepetida) {
        alert("Las contraseñas no son iguales");
    }

    return true; 
}