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
    
    $("#updateButton").click(function() {
        url = $("#url").val();
        idProyecto = $("#idProyecto").val();
        nombre = $("#nombre").val();
        descripcion = $("#descripcion").val();
        //**Se asignan los valores de areas
        security = $('[name="security"]').is(":checked");
        web = $('[name="web"]').is(":checked");
        db = $('[name="db"]').is(":checked");
        network = $('[name="network"]').is(":checked");
        desktop = $('[name="desktop"]').is(":checked");
        //**Se asignan los valores de competencias
        team = $('[name="team"]').is(":checked");
        comunication = $('[name="comunication"]').is(":checked");
        work = $('[name="work"]').is(":checked");
        initiative = $('[name="initiative"]').is(":checked");
        leader = $('[name="leader"]').is(":checked");
        //**Se verifica si está o no habilitado
        habilitado = $("#habilitado").is(":checked");
        $.post(url+"index.php/proyectosController/updateProject", {
            id : idProyecto,
            nombre : nombre,
            descripcion : descripcion,
            security : security,
            web : web,
            db : db,
            network : network,
            desktop : desktop,
            team : team,
            comunication : comunication,
            work : work,
            initiative : initiative,
            leader : leader,
            habilitado : habilitado
        }, function(data) {
            $("#msgUpdate").html(data);
            $("#msgUpdate").show('slow');
        });
    });
    
    $('[name="deleteProject"]').click(function() {
        confirmar = confirm("Are you sure you want to delete the selected project?");
        if(confirmar) {
            url = $("#url").val();
            idProyecto = $(this).attr('ident');
            $.post(url+"index.php/proyectosController/deleteAllProject", {
                idProyecto : idProyecto
            }, function(data) {
                $("#contenido").html(data);
                $("#contenido").slideDown('slow');
//                setTimeout(function () {
//                    location.reload();
//                }, 2000);
            });
        }
    }); 
    
    $('[name="denyProject"]').click(function() {
        user = $(this).attr('ident');
        project = $(this).attr('ident2');
        id = "div"+project+user;
        $('[name="'+id+'"]').slideDown('slow');
    });
    
    $('[name="commentButton"]').click(function() {
        user = $(this).attr('ident3');
        project = $(this).attr('ident4');
        id = "commentText"+project+user;
        comments = $('[name="'+id+'"]').val();
        url = $("#url").val();
        $.post(url+"index.php/proyectosController/sendComments", {
            idUsuario : user,
            idProject : project,
            comment : comments,
            flag : 3
        }, function(data) {
            $("#msgConfirm").html(data);
            $("#msgConfirm").slideDown('slow');
            $("#principalRequests").slideDown('slow');
        });
    });
    
    //*************************************************//
    //Funciones para ventanas emergentes
    $('[name="projectButton"]').click(function() {
        //**Primero llena el div**
        idProyecto = $(this).attr('ident');
        url = $("#url").val();
        $.post(url+"index.php/proyectosController/seeProject", {
            idProyecto : idProyecto
        }, function(data) {
            $("#searchValues").html(data);
        });
        
        //**Muestra el div**
        type = $(this).attr('data-type');
        $('.overlay-container').fadeIn(function() {		
            window.setTimeout(function(){
                $('.window-container.'+type).addClass('window-container-visible');
            }, 100);
        });
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

function modifyProyect(num, u) {
    id = num;
    url = u;
    $.post(url+"index.php/proyectosController/getProyectModify", {
        idProyect : id
    }, function(data) {
        alert("hola") ;
    });
}