document.addEventListener('DOMContentLoaded', function() {
    iniciarApp();
});

function iniciarApp() {
    buscarPorFecha();
}

function buscarPorFecha(){
    const fechaInput = document.querySelector('#fecha');
    fechaInput.addEventListener('input', function(e) {
        // e.preventDefault();
        const fechaSeleccionada = e.target.value;
        
        if(!fechaSeleccionada) {
            window.location = `admin`;
        } else {

            window.location = `admin?fecha=${fechaSeleccionada}`;
        }

    });
}