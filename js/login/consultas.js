function buscar() {
    var cedula_prop = $("#cedula_prop").val();
    if (cedula_prop != '') {
        var base_url = window.location.origin + '/marina/index.php/Login/b_cedula'
        //var base_url = '/index.php/Login/b_cedula';
        console.log(base_url);
        $.ajax({
            url: base_url,
            method: 'post',
            data: { cedula_prop: cedula_prop },
            dataType: 'json',

            success: function (response) {
                console.log(response['cedula']);
            }
        });
    } else {
        document.getElementById("cedula_prop").focus();
    }

}