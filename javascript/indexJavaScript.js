$(document).ready(function() {
    $("#registro").hide();
    $("#login").hide();
    
    $("#loginButton").click(function() {
        $("#principalDiv").slideUp();
        $("#registro").slideUp();
        setTimeout(function() {
            $("#login").slideDown(); 
        }, 500);
    });
    $("#registerButton").click(function() {
        $("#principalDiv").slideUp();
        $("#login").slideUp();
        setTimeout(function() {
           $("#registro").slideDown(); 
        }, 500);
    });
    
    $("#registrarUsuario").click(function() {
        url = $("#url").val();
        nombre = $("#nombre").val();
        apellidoP = $("#apellidoP").val();
        apellidoM = $("#apellidoM").val();
        pass = $("#pass").val();
        passCon = $("#passCon").val();
        mail = $("#mail").val();
        foto = "";
        $.post(url+"index.php/usuariosController/registraUsuario", {
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
});

