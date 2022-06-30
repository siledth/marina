function guardar_bien(){
    event.preventDefault();
    swal.fire({
        title: '¿Registrar?',
        text: '¿Esta seguro de Registrar ?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: '¡Si, guardar!'
    }).then((result) => {
        if (result.value == true) {

            event.preventDefault();
            var datos = new FormData($("#reg_bien")[0]);
            var base_url =window.location.origin+'/marina/index.php/Factura/registrar_recibo';
         //   var base_url = '/index.php/Programacion/registrar_bien';
            $.ajax({
                url:base_url,
                method: 'POST',
                data: datos,
                contentType: false,
                processData: false,
                success: function(response){
                    if(response == 'true') {
                        swal.fire({
                            title: 'Registro Exitoso',
                            type: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Ok'
                        }).then((result) => {
                            if (result.value == true) {
                                location.reload();
                            }
                        });
                    }
                }
            })
        }
    });
}
