$(document).ready(function () {
    let url = "../../content/js/getUrlParam.js";

    $.getScript(url, function () {
        $(document).ready(function () {
            let $url = '../../funciones/setvisitas.php?id=' + params['id'];
            $.get($url, function (data) {
                if (data.error != 0) {
                    alert("Ha habido un error al registrar la visita");
                }
            });
        });
    });

});