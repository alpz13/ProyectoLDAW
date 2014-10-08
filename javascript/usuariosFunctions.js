$(document).ready(function() {   
    $("#usuarioRegistrarC").hide();
    $("#usuarioEliminarC").hide();
    $("#usuarioModificarC").hide();
    $("#buttonShow").hide();
    
    $("#enviarConfigurar").click(function() {
        nombre = $("#nombre").val();
        aPaterno = $("#aPaterno").val();
        aMaterno = $("#aMaterno").val();
        pass = $("#pass").val();
        passCon = $("#passCon").val();
        mail = $("#mail").val();
        foto = $("#urlFoto").val();
        url = $("#url").val();
        $.post(url+"index.php/usuariosController/actualizaUsuario", {
            nombre : nombre,
            aPaterno : aPaterno,
            aMaterno : aMaterno,
            pass : pass,
            passCon : passCon,
            mail : mail,
            foto : foto
        }, function(data) {
            $("#mensajeConfig").html(data);
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
        $.post(url+"index.php/usuariosController/registraUsuario", {
        },function(data) {
            $("#contenido").html(data);
        });
    });
    
    $("#loginUser").click(function() {
        url = $("#url");
        usuario = $("#usuario").val();
        passwd = $("#passwd").val();
        $.post(url+"index.php/principalController/home", {
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
        url = $("#urlUsuarios").val();
        nombre = $("#nombre").val();
        apellidoP = $("#apellidoP").val();
        apellidoM = $("#apellidoM").val();
        pass = $("#pass").val();
        passCon = $("#passCon").val();
        mail = $("#mail").val();
        foto = "";
        $.post(url+"index.php/usuariosController/crearUsuario", {
            nombre : nombre,
            apellidoP : apellidoP,
            apellidoM : apellidoM,
            pass : pass,
            passCon : passCon,
            mail : mail,
            foto : foto
        },function(data) {
            $("#contenido").html(data);
        });
    });
    
    $("#usuarioSelectC").change(function() {
        $("#buttonShow").show();
        url = $("#urlUsuarios").val();
        id = $("#usuarioSelectC").val();
        $.post(url+"index.php/usuariosController/mostrarEliminarUsuario", {
            id : id
        },function(data) {
            $("#contenido").html(data);
        });
    });
    
    $("#eliminarUsuarioConfig").click(function() {
        confirmar = confirm("Deseas eliminar el usuario seleccionado?");
        if(confirmar) {
            url = $("#urlUsuarios").val();
            id = $("#usuarioSelectC").val();
            $.post(url+"index.php/usuariosController/eliminarUsuario", {
                id : id
            }, function(data) {
                $("#contenido").html(data);
            });
        }
        $("#usuarioEliminarC").hide();
    });
    
    $("#usuarioModificarSelectC").change(function() {
        url = $("#urlUsuarios").val();
        id = $("#usuarioModificarSelectC").val();
        $.post(url+"index.php/usuariosController/modificarUsuarioShow", {
                id : id
            }, function(data) {
                $("#contenido").html(data);
        });
    });
});