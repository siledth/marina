$(document).ready(function(){
    //para consultar y crear el numero de factura
    var base_url = window.location.origin+'/marina/index.php/Factura/cons_nro_factura';

    $.ajax({
        url: base_url,
        method:'post',
        dataType:'json',

        success: function(response){
            console.log(response);
            if (response === null) {
                numero = '1'
            }else{
                numero_c = response['id'];
                numero = Number(numero_c) + 1
            }
            
            function zeroFill( number, width ){
              width -= number.toString().length;
              if ( width > 0 )
              {
                return new Array( width + (/\./.test( number ) ? 2 : 1) ).join( '0' ) + number;
              }
              return number + ""; // siempre devuelve tipo cadena
            }
            console.log(numero);
            $('#numfact').val(zeroFill(numero, 5));
            //console.log(zeroFill(numero, 5));
        }
    });
}); 

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
            var base_url =window.location.origin+'/marina/index.php/Factura/registrar';
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

function anular_factura(id_fact){
    event.preventDefault();
    swal.fire({
        title: '¿Seguro que desea anular la factura selecionada?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: '¡Si, Anular!'
    }).then((result) => {
        if (result.value == true) {
            var id_factura = id_fact

            var base_url =window.location.origin+'/marina/index.php/Factura/anular_factura';

            $.ajax({
                url:base_url,
                method: 'post',
                data:{
                    id_factura: id_factura
                },
                dataType: 'json',
                success: function(response){
                    if(response == 1) {
                        swal.fire({
                            title: 'Proceso Exitoso',
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