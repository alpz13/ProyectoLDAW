$(document).ready(function() {                       
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
});
