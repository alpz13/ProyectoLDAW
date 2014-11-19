$(document).ready(function() {
    $("#projectSearchId").hide();
    $("#usersAreaSearchId").hide();
    $("#usersCompetenceSearchId").hide();
    $("#projectAreaSearchId").hide();
    $("#projectCompetenceSearchId").hide();
    
    $("#divUsers").click(function() {
        $("#projectSearchId").slideUp('slow');
        $("#usersAreaSearchId").slideUp('slow');
        $("#usersCompetenceSearchId").slideUp('slow');
        $("#projectAreaSearchId").slideUp('slow');
        $("#projectCompetenceSearchId").slideUp('slow');
        $("#usersSearchId").slideDown('slow');
    });
    $("#divProject").click(function() {
        $("#usersSearchId").slideUp('slow');
        $("#usersAreaSearchId").slideUp('slow');
        $("#usersCompetenceSearchId").slideUp('slow');
        $("#projectAreaSearchId").slideUp('slow');
        $("#projectCompetenceSearchId").slideUp('slow');
        $("#projectSearchId").slideDown('slow');
    });
    $("#divUserArea").click(function() {
        $("#projectSearchId").slideUp('slow');
        $("#usersSearchId").slideUp('slow');
        $("#usersCompetenceSearchId").slideUp('slow');
        $("#projectAreaSearchId").slideUp('slow');
        $("#projectCompetenceSearchId").slideUp('slow');
        $("#usersAreaSearchId").slideDown('slow');
    });
    $("#divUserCompetence").click(function() {
        $("#projectSearchId").slideUp('slow');
        $("#usersAreaSearchId").slideUp('slow');
        $("#usersSearchId").slideUp('slow');
        $("#projectAreaSearchId").slideUp('slow');
        $("#projectCompetenceSearchId").slideUp('slow');
        $("#usersCompetenceSearchId").slideDown('slow');
    });
    $("#divProjectArea").click(function() {
        $("#projectSearchId").slideUp('slow');
        $("#usersAreaSearchId").slideUp('slow');
        $("#usersCompetenceSearchId").slideUp('slow');
        $("#usersSearchId").slideUp('slow');
        $("#projectCompetenceSearchId").slideUp('slow');
        $("#projectAreaSearchId").slideDown('slow');
    });
    $("#divProjectCompetence").click(function() {
        $("#projectSearchId").slideUp('slow');
        $("#usersAreaSearchId").slideUp('slow');
        $("#usersCompetenceSearchId").slideUp('slow');
        $("#projectAreaSearchId").slideUp('slow');
        $("#usersSearchId").slideUp('slow');
        $("#projectCompetenceSearchId").slideDown('slow');
    });
    
});