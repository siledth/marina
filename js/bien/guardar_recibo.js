$(document).ready(function(){
    //para consultar y crear el numero de factura
    var base_url = window.location.origin+'/marina/index.php/Factura/cons_nro_factur';

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
            $('#numfact').val(zeroFill(numero, 10));
            //console.log(zeroFill(numero, 5));
        }
    });
}); 
function llenar_pago() {
    var tipo_pago = $("#id_tipo_pago").val();
    if (tipo_pago <= "2") {
        $("#campos").show();
    } else {
        $("#campos").hide();
    }
}
/*function hab_campo(){
    var otro = document. getElementById('cssRadio5').checked;
    if (otro == true) {
        $("#hab_campo_esp").show();
    }else {
        $('#hab_campo_esp').hide();
    }
}*/
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
            var base_url_3 =
                    window.location.origin + "/marina/index.php/Factura/ver_reci?id=";
         //   var base_url = '/index.php/Programacion/registrar_bien';
            $.ajax({
                url:base_url,
                method: 'POST',
                data: datos,
                contentType: false,
                processData: false,
                success: function(response){var menj = 'Numero de Recibo : ';
                /* if (response == "true") {
                     swal
                         .fire({
                             title: "Registro Exitoso",
                             type: "success",
                             showCancelButton: false,
                             confirmButtonColor: "#3085d6",
                             confirmButtonText: "Ok",
                         })
                         .then((result) => {
                             if (result.value == true) {
                                 window.location.href = base_url_2;
                             }
                         });
                 }*/
                 if(response != '') {
                     swal.fire({
                         title: 'Registro Exitoso ',
                         text: menj + response,
                         type: 'success',
                         showCancelButton: false,
                         confirmButtonColor: '#3085d6',
                         confirmButtonText: 'Ok'
                     }).then((result) => {
                         if (result.value == true){
                             window.location.href = base_url_3 + response;
                         }
                     });
                 }
                }
            })
        }
    });
}
