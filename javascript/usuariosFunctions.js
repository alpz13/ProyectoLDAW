$(document).ready(function() {   
    $("#usuarioRegistrarC").hide();
    $("#usuarioEliminarC").hide();
    $("#usuarioModificarC").hide();
    
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
        url = $("#urlRegistro").val();
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
    
    $("#nuevoUsuario").click(function() {
        $("#usuarioEliminarC").slideUp('slow');
        $("#usuarioModificarC").slideUp('slow');
        $("#usuarioRegistrarC").slideDown('slow');
    });
    
    $("#eliminarUsuario").click(function() {
        $("#usuarioRegistrarC").slideUp('slow');
        $("#usuarioModificarC").slideUp('slow');
        $("#usuarioEliminarC").slideDown('slow');
    });
    
    $("#modificarUsuario").click(function() {
        $("#usuarioEliminarC").slideUp('slow');
        $("#usuarioRegistrarC").slideUp('slow');
        $("#usuarioModificarC").slideDown('slow');
    });
    
    $("#registraUsuarioC").click(function() {
        url = $("#urlUsuarios").val();
        nombre = $("#nombre").val();
        apellidoP = $("#apellidoP").val();
        apellidoM = $("#apellidoM").val();
        pass = $("#pass").val();
        passCon = $("#passCon").val();
        mail = $("#mail").val();
        $.post(url+"index.php/usuariosController/crearUsuario", {
            nombre : nombre,
            apellidoP : apellidoP,
            apellidoM : apellidoM,
            pass : pass,
            passCon : passCon,
            mail : mail
        },function(data) {
            $("#contenido").html(data);
        });
    });
    
    $("#usuarioSelectC").change(function() {
        url = $("#urlUsuarios").val();
        id = $("#usuarioSelectC").val();
        $.post(url+"index.php/usuariosController/mostrarEliminarUsuario", {
            id : id
        },function(data) {
            $("#contenido").html(data);
        });
    });
    
    $("#eliminarUsuarioConfig").click(function() {
        alert("hola");
    });
});
