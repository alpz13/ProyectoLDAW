$(document).ready(function() {
    $("#registro").hide();
    $("#login").hide();
    
    $("#loginButton").click(function() {
        $("#principalDiv").slideUp('slow');
        $("#registro").slideUp('slow');
        $("#login").slideDown('slow');
    });
    $("#registerButton").click(function() {
        $("#principalDiv").slideUp('slow');
        $("#login").slideUp('slow');
        $("#registro").slideDown('slow');
    });
});

