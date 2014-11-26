$(document).ready(function() {       
    $("#usuarioRegistrarC").hide();
    $("#usuarioEliminarC").hide();
    $("#usuarioModificarC").hide();
    $("#buttonShow").hide();
    $("#divProyectosAreas").hide();
    $("#divProyectosCompetencias").hide();
    
    $("#enviarConfigurar").click(function() {
        $("#mensajeConfig").hide();
        nombre = $("#nombre").val();
        aPaterno = $("#aPaterno").val();
        aMaterno = $("#aMaterno").val();
        pass = $("#pass").val();
        passCon = $("#passCon").val();
        mail = $("#mail").val();
        foto = $("#urlFoto").val();
        url = $("#url").val();
        $.post(url+"index.php/usuarioscontroller/actualizaUsuario", {
            nombre : nombre,
            aPaterno : aPaterno,
            aMaterno : aMaterno,
            pass : pass,
            passCon : passCon,
            mail : mail,
            foto : foto
        }, function(data) {
            $("#mensajeConfig").html(data);
            $("#mensajeConfig").slideDown('slow');
            foto = document.getElementById("urlFoto");
            foto.innerHTML = "../../files/defaultFoto.jpg";
        });
    });
    
    $("#registrarUsuario").click(function() {
        url = $("#url").val();
        nombre = $("#nombre").val();
        apellidoP = $("#apellidoP").val();
        apellidoM = $("#apellidoM").val();
        pass = $("#pass").val();
        passCon = $("#passCon").val();
        mail = $("#mail").val();        
        $.post(url+"index.php/usuarioscontroller/registraUsuario", {
        },function(data) {
            alert(data);
        });
    });
    
    $("#loginUser").click(function() {
        url = $("#url");
        usuario = $("#usuario").val();
        passwd = $("#passwd").val();
        $.post(url+"index.php/principalcontroller/home", {
            usuario : usuario,
            passwd : passwd
        }, function(data) {
            $("$contenido").html(data);
        });
    });
    
    $("#nuevoUsuario").click(function() {
        $("#usuarioEliminarC").slideUp('slow');
        $("#usuarioModificarC").slideUp('slow');
        $("#buttonShow").hide();
        $("#usuarioRegistrarC").slideDown('slow');
        $("#contenido").html("");
    });
    
    $("#eliminarUsuario").click(function() {
        $("#usuarioRegistrarC").slideUp('slow');
        $("#usuarioModificarC").slideUp('slow');
        $("#usuarioEliminarC").slideDown('slow');
        $("#contenido").html("");
    });
    
    $("#modificarUsuario").click(function() {
        $("#usuarioEliminarC").slideUp('slow');
        $("#usuarioRegistrarC").slideUp('slow');
        $("#buttonShow").hide();
        $("#usuarioModificarC").slideDown('slow');
        $("#contenido").html("");
    });
    
    $("#registraUsuarioC").click(function() {
        $("#contenido").hide();
        url = $("#urlUsuarios").val();
        nombre = $("#nombre").val();
        apellidoP = $("#apellidoP").val();
        apellidoM = $("#apellidoM").val();
        pass = $("#pass").val();
        passCon = $("#passCon").val();
        mail = $("#mail").val();
        type = $("#userType").val();
        foto = "";
        $.post(url+"index.php/usuarioscontroller/crearUsuario", {
            nombre : nombre,
            apellidoP : apellidoP,
            apellidoM : apellidoM,
            pass : pass,
            passCon : passCon,
            mail : mail,
            type : type,
            foto : foto
        },function(data) {
            $("#contenido").html(data);
            $("#contenido").slideDown('slow');
        });
    });
    
    $("#usuarioSelectC").change(function() {
        $("#buttonShow").show();
        url = $("#urlUsuarios").val();
        id = $("#usuarioSelectC").val();
        $.post(url+"index.php/usuarioscontroller/mostrarEliminarUsuario", {
            id : id
        },function(data) {
            $("#contenido").html(data);
        });
    });
    
    $("#eliminarUsuarioConfig").click(function() {
        confirmar = confirm("Are you sure you want to delete the selected user?");
        if(confirmar) {
            $("#contenido").hide();
            url = $("#urlUsuarios").val();
            id = $("#usuarioSelectC").val();
            $.post(url+"index.php/usuarioscontroller/eliminarUsuario", {
                id : id
            }, function(data) {
                $("#contenido").html(data);
                $("#contenido").slideDown('slow');
            });
        }
        $("#usuarioEliminarC").hide();
        $("#buttonShow").hide();
    });
    
    $("#usuarioModificarSelectC").change(function() {
        $("#contenidoModificar").hide();
        url = $("#urlUsuarios").val();
        id = $("#usuarioModificarSelectC").val();
        $.post(url+"index.php/usuarioscontroller/modificarUsuarioShow", {
                id : id
            }, function(data) {
                $("#contenidoModificar").html(data);
                $("#contenidoModificar").slideDown('slow');
        });
    });
    
    $("#proyectosCompetencias").click(function() {
        $("#divProyectosCompetencias").slideToggle('slow');
    });
    
    $("#proyectosAreas").click(function() {
        $("#divProyectosAreas").slideToggle('slow');
    });
    
    $("#proyectosActuales").click(function() {
        $("#divProyectosActuales").slideToggle('slow');
    });
    
    //*************************************************//
    //Funciones para ventanas emergentes
    $('[name="profileButton"]').click(function() {
        //**Primero llena el div**
        idUsuario = $(this).attr('ident');
        url = $("#url").val();
        $.post(url+"index.php/usuarioscontroller/seeProfile", {
            idUsuario : idUsuario
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
