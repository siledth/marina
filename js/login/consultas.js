function buscar() {
    //capturo el campo de cèdula
    var cedula_prop = $("#cedula_prop").val();
    if (cedula_prop != ''){
        var base_url = window.location.origin + '/marina/index.php/Login/b_cedula_usu'
        var base_url2 = window.location.origin + '/marina/index.php/Login/b_cedula'
        //var base_url = '/index.php/Login/b_cedula';
        //Lo primero es validar que esa cédula no exista como usuario
        $.ajax({
            url: base_url,
            method: 'post',
            data: { cedula_prop: cedula_prop },
            dataType: 'json',
            success: function (response) {
                //Si existe como usuario, devuelvo
                if (response === 'existe') {
                    swal.fire({
                        title: 'Usuario ya existe',
                        text: 'Por favor comunicarse con el personal administrativo',
                        type: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        if (result.value == true){
                           location.reload();
                        }
                    });
                    //Si no existe, procedo a consultar datos del propietario
                }else{
                    $.ajax({
                        url: base_url2,
                        method: 'post',
                        data: { cedula_prop: cedula_prop },
                        dataType: 'json',
                        //Si existe como propietario, cargo datos
                        success: function (response) {
                            if (response != null) {
                                $('#nombre').val(response['nombrecom']);
                                $('#tele_1').val(response['tele_1']);
                                $('#email').val(response['email']);
                                $('#tipo').val(response['tipo']);
                                $('#matricula').val(response['matricula']);
                            //Si no existe, limpio los campos para registro
                            }else{
                                $("#mensaj").css("display", "block");
                                $("#nombre").val('');
                                $("#tele_1").val('');
                                $("#email").val('');
                                $("#tipo").val('');
                                $("#matricula").val('');
                                $("#rif").val('');
                            }
                        }
                    });
                }
            }
        })
    } else {
        document.getElementById("cedula_prop").focus();    
    }
}

function guardar(){
    var cedula_prop = $("#cedula_prop").val();
    var nombre = $("#nombre").val();
    var email = $("#email").val();
    var tipo = $("#tipo").val();
    var matricula = $("#matricula").val();
    var rif = $("#rif").val();
    var tele_1 = $("#tele_1").val();
    var propietario = $("#propietario").val();

    event.preventDefault();
    swal
        .fire({
            title: "¿Registrar?",
            text: "¿Esta seguro de Registrarse?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            cancelButtonText: "Cancelar",
            confirmButtonText: "¡Si, guardar!",
        })
        .then((result) => {
            if (result.value == true) {
                event.preventDefault();
                var base_url = window.location.origin + '/marina/index.php/Login/registrar_prp'
                //   var base_url = '/index.php/Programacion/registrar_bien';
                $.ajax({
                    url: base_url,
                    method: 'post',
                    data: {cedula_prop: cedula_prop,
                           nombre: nombre,
                           email:email,
                           tipo: tipo,
                           matricula:matricula,
                           rif: rif,
                           tele_1:tele_1,
                           propietario:propietario
                        },
                    dataType: 'json',
                    success: function(response) {
                        var menj = 'La contraseña se envío por correo electronico.';
                    
                         if(response != '') {
                             swal.fire({
                                 title: 'Registro Exitoso ',
                                 text: menj,
                                 type: 'success',
                                 showCancelButton: false,
                                 confirmButtonColor: '#3085d6',
                                 confirmButtonText: 'Ok'
                             }).then((result) => {
                                 if (result.value == true){
                                    location.reload();
                                 }
                             });
                         }
                    },
                });
            }
        });
}