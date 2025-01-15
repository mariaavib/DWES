window.addEventListener("load", async function (event) {
    //Primer formulario

    let selectClase = document.getElementById('clases');
    console.log("Página cargada");

    try {
        console.log("Enviando solicitud...");

        const response = await fetch('clases.php');
        console.log("Respuesta recibida");

        if (response.ok) {
            let result = await response.json();
            console.log(result);

            
            result.forEach(function(clase) {
                let option = document.createElement('option');
                option.value = clase.idClase;  
                option.innerHTML = clase.idClase;  
                selectClase.appendChild(option); 
            });
        }
    } catch (error) {
        console.error('Error al obtener las clases:', error);
    }

    //Segundo formulario
    let formulario = this.document.getElementById('formulario');

    try {
        console.log("Enviando solicitud...");

        const response2 = await fetch('pruebas.php');
        console.log("Respuesta recibida");

        if (response2.ok) {
            let result2 = await response2.json();
            for (let i = 0; i < result2.numPruebas; i++) {
                let h2 =this.document.createElement('h2');
                let select = this.document.createElement('select');
                select.id = `selectPruebas${i}`;
                select.disabled = true;
                h2.id = `prueba${i}`;
                h2.innerHTML =result2.nombres[i];
                formulario.appendChild(h2);
                formulario.appendChild(select);

            }
        }
    } catch (error) {
       
    }

    selectClase.addEventListener('input', async event =>{
        const valorSeleccionado  = event.target.value;
        const response = await this.fetch('alumnos.php?clase='+valorSeleccionado);
        if (response.ok) {
            let result = await response.json();
            console.log(result);
            let selectPrueba1 = this.document.getElementById('selectPruebas0');
            result.forEach(alumno => {
                let option = document.createElement('option');
                option.innerHTML = alumno.nombre;  
                selectPrueba1.appendChild(option); 
            });
            selectPrueba1.disabled = false;
        }
    })
});
