$(document).ready(function() {
    $('#patient').click(function() {
        $('#add').css("display", "block");
        $('#view').css("display", "none");
        $('#vaccinated').css("display", "none");
    });
    $('#viewall').click(function() {
        $('#view').css("display", "block");
        $('#add').css("display", "none");
        $('#vaccinated').css("display", "none");
    });
    $('#vac').click(function() {
        $('#vaccinated').css("display", "block");
        $('#add').css("display", "none");
        $('#view').css("display", "none");
    });
    $('#val').click(function() {
        $('#add').css("display", "block");
        $('#vaccinatedchild').css("display", "none");
        $('#vaccinated').css("display", "none");
        $('#view').css("display", "none");
    });
});