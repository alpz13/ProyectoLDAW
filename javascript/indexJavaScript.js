$(document).ready(function() {
    $("#registro").hide();
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
    $("#back").click(function() {
        $("#registro").slideUp('slow');
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
        $('.overlay-container').fadeIn(function() {
            window.setTimeout(function(){
                $('.window-container.'+type).addClass('window-container-visible');
            }, 100);
            
        });
    });

});

