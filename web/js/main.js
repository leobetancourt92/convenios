$(document).ready(function () {
    // $('#mvcIcon').hide();
    $('#mvcIcon .mvcPointer').click(function () {
        $('#mvcMain').toggle(150);
        $('#mvcIcon').toggle(150);
    });
    $('#mvcMain .mvcPointer').click(function () {
        $('#mvcMain').toggle(150);
        $('#mvcIcon').toggle(150);
    });
});

//paginador


function paginador(objeto, url) {
    window.location.href = url + '?page=' + $(objeto).val();

}