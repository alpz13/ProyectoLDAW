$(document).ready(function() {
    $("#registro").hide();
    $("#forgottenPass").hide();
//    $("#login").hide();
    
//    $("#loginButton").click(function() {
//        //$("#principalDiv").slideUp();
//        $("#registro").slideUp('slow');
//        setTimeout(function() {
//            $("#login").slideDown(); 
//        }, 500);
//    });
    $("#registerButton").click(function() {
        //$("#principalDiv").slideUp();
        $("#login").slideUp('slow');
        setTimeout(function() {
           $("#registro").slideDown('slow'); 
        }, 500);
    });
    $('[name="back"').click(function() {
        $("#registro").slideUp('slow');
        $("#forgottenPass").slideUp('slow');
        setTimeout(function() {
           $("#login").slideDown('slow'); 
        }, 500);
    });
    
    $("#registrarUsuario").click(function() {
        type = $("#registrarUsuario").attr('data-type');

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
    
    $("#forgotten").click(function() {
        $("#forgottenPass").slideDown('slow');
    });
    
    $("#sendEmail").click(function() {
        url = $("#url").val();
        email = $("#emailForgotten").val();
        $.post(url+"index.php/principalController/sendPassword", {
            email : email
        }, function(data) {
            $("#forgottenMsg").html(data);
            $("#forgottenPass").hide();
            ("#emailForgotten").val('');
        });
    });

});

