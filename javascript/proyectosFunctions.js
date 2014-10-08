$(document).ready(function() {
    $("#divButtonEliminar").hide();
    
    $("#proyectosSelect").change(function() {
        $("#divButtonEliminar").show();
        url = $("#urlProyectosE").val();
        idProyecto = $("#proyectosSelect").val();
        $.post(url+"index.php/proyectosController/buscarProyecto", {
            idProyecto : idProyecto
        }, function(data) {
            $("#contenido").html(data);
        });
    });
    
    $("#eliminarButtonP").click(function() {
        confirmar = confirm("¿Está seguro de eliminar el proyecto seleccionado?");
        if(confirmar) {
            url = $("#urlProyectosE").val();
            idProyecto = $("#proyectosSelect").val();
            $.post(url+"index.php/proyectosController/eliminarProyecto", {
                idProyecto : idProyecto
            }, function(data) {
                $("#contenido").html(data);
            });
        }
    });
});