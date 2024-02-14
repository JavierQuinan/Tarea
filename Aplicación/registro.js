document.getElementById('formulario').addEventListener('submit', function(e) {
    e.preventDefault(); 

    let formulario = new FormData(document.getElementById('formulario')); 

    fetch('ingresar.php', {  
        method: 'POST',
        body: formulario
    })
    .then(response => response.json())  
    .then(data => {
        if(data.success) {
            alert('El usuario ingresó correctamente los datos.');
            cargarDatosAdicionales();
            limpiarCamposFormulario();
        } else {
            mostrarError('Hubo un error al ingresar los datos. Por favor, inténtelo de nuevo más tarde.');
            console.error('Respuesta del servidor:', data.error);
        }
    })    
    .catch(() => mostrarError('Error durante el envío del formulario. Por favor, inténtelo de nuevo más tarde.'));
});

function cargarDatosAdicionales() {
    fetch('additionalData.json') 
    .then(response => response.json()) 
    .then(data => {
        console.log('Datos cargados:', data);
    })
    .catch(error => console.error('Error al cargar los datos:', error));
}

function limpiarCamposFormulario() {
    document.getElementById('txt_usuario').value = '';
    document.getElementById('txt_nombre_apellido').value = '';
    document.getElementById('int_edad').value = '';
}

function mostrarError(mensaje) {
    alert(mensaje);
}
