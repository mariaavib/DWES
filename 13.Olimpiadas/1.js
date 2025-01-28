window.addEventListener("load", async function (event) {
    //Primer formulario

    let selectClase = document.getElementById('clases');
    console.log("Página cargada");

    try {
        //console.log("Enviando solicitud...");

        const response = await fetch('clases.php');
        //console.log("Respuesta recibida");

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
            let boton = document.createElement('button');
            boton.innerHTML = 'Enviar';
            boton.id = 'enviar';
            boton.disabled = true;
            formulario.appendChild(boton);
        }
    } catch (error) {
        console.error("Error al cargar las pruebas:", error);
    }

    let valorSeleccionado = null;
    let selectPrueba1 = document.getElementById('selectPruebas0');
    let selectPrueba2 = document.getElementById('selectPruebas1');
    let selectPrueba3 = document.getElementById('selectPruebas2');
    let boton = document.getElementById('enviar');
    
    selectClase.addEventListener('input', async event => {
        valorSeleccionado = event.target.value;
        console.log("Clase seleccionada:", valorSeleccionado);

        const response = await fetch('alumnos.php?clase=' + valorSeleccionado);
        if (response.ok) {
            const result = await response.json();
            console.log(result);
            selectPrueba1.innerHTML = ''; // Limpiar opciones anteriores

            let primerOption = document.createElement('option');
            primerOption.innerHTML = 'Selecciona un alumno';
            primerOption.selected = true;
            primerOption.disabled = true;
            selectPrueba1.appendChild(primerOption);

            result.forEach(alumno => {
                let option = document.createElement('option');
                option.innerHTML = alumno.nombre;
                selectPrueba1.appendChild(option);
            });
            selectPrueba1.disabled = false;
        }
    });

    selectPrueba1.addEventListener('input', async event => {
        const response = await fetch('alumnos.php?clase=' + valorSeleccionado);
        if (response.ok) {
            const result = await response.json();
            console.log(result);
            selectPrueba2.innerHTML = ''; // Limpiar opciones anteriores
            selectPrueba2.disabled = false;

            let primerOption = document.createElement('option');
            primerOption.innerHTML = 'Selecciona un alumno';
            primerOption.selected = true;
            primerOption.disabled = true;
            selectPrueba2.appendChild(primerOption);

            result.forEach(alumno => {
                if (alumno.nombre !== selectPrueba1.value && alumno.nombre !== selectPrueba2.value && alumno.nombre !== selectPrueba3.value) {
                    let option = document.createElement('option');
                    option.innerHTML = alumno.nombre;
                    selectPrueba2.appendChild(option);
                }
            });
        }
    });

    selectPrueba2.addEventListener('input', async event => {
        const response = await fetch('alumnos.php?clase=' + valorSeleccionado);
        if (response.ok) {
            const result = await response.json();
            console.log(result);
            selectPrueba3.innerHTML = ''; // Limpiar opciones anteriores
            selectPrueba3.disabled = false;

            let primerOption = document.createElement('option');
            primerOption.innerHTML = 'Selecciona un alumno';
            primerOption.selected = true;
            primerOption.disabled = true;
            selectPrueba3.appendChild(primerOption);

            result.forEach(alumno => {
                if (alumno.nombre !== selectPrueba1.value && alumno.nombre !== selectPrueba2.value) {
                    let option = document.createElement('option');
                    option.innerHTML = alumno.nombre;
                    selectPrueba3.appendChild(option);
                }
            });
        }
    });

    selectPrueba3.addEventListener('input', event => {
        boton.disabled = false; // Habilitar botón una vez seleccionados todos
        console.log("Valores seleccionados:");
        console.log("Clase:", selectClase.value);
        console.log("Alumno 1:", selectPrueba1.value);
        console.log("Alumno 2:", selectPrueba2.value);
        console.log("Alumno 3:", selectPrueba3.value);
    });


});
