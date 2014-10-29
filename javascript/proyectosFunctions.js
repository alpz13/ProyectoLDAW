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

function requestProyect(id) {
    confirmar = confirm("Did you wish to participate in the selected project?");
    if(confirmar) {
        url = $("#url").val();
        idProyecto = id;
        $.post(url+"index.php/proyectosController/requestProyect", {
            idProyecto : idProyecto,
            value : 1
        }, function(data) {
            alert(data);
        });
    }
}

function seeRequests(id) {
    idSupervisor = id;
    url = $("#url").val();
    $.post(url+"index.php/proyectosController/seeRequest", {
            idSupervisor : idSupervisor
        }, function(data) {
            //$("#seeRequests").html(data);
            document.getElementById('seeRequests').innerHTML = data;
    });
}

function seeUser(idUser) {
    alert(idUser);
}

function seeProject(idProject) {
    alert(idProject);
}

function acceptProyect(idProyect, idUser, idRequest) {
    confirmar = confirm("Did you wish to add the selected user to the proyect?");
    if(confirmar) {
        url = $("#url").val();
        $.post(url+"index.php/proyectosController/acceptRequest", {
            idProyect : idProyect,
            idUser : idUser,
            idRequest : idRequest
        }, function(data) {
            alert(data);
            location.reload();
        });
    }
}