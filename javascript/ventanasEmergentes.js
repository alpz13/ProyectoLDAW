function mostrarVentana()
{
    var ventana = document.getElementById('VentanaEmergente'); // Accedemos al contenedor
    ventana.style.marginTop = "100px"; 
    ventana.style.marginLeft = ((document.body.clientWidth-350) / 2) +  "px"; 
    ventana.style.display = 'block'; 
}

function ocultarVentana()
{
    var ventana = document.getElementById('VentanaEmergente'); // Accedemos al contenedor
    ventana.style.display = 'none'; 
}