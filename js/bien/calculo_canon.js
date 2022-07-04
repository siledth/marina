function calcular_bienes(){

    var pies = $('#pies').val();
    var dia = $('#dia').val();
    var cantidad2 = 30;
    var tarifas = $('#tarifa').val();
    let explode = tarifas.split('/');
    let id_tarifa = explode[0];
    let tarifa = explode[1];
    
   // $('#cant_total_distribuir').val(cant_total_distribuir);

    if (pies < 1) {
        swal({
            title: "¡ATENCION!",
            text: "los pies no pueden ser menor que 1! Por favor modifique para seguir con la carga.",
            type: "warning",
            showCancelButton: false,
            confirmButtonColor: "#00897b",
            confirmButtonText: "CONTINUAR",
            closeOnConfirm: false
        }, function(){
            swal("Deleted!", "Your imaginary file has been deleted.", "success");
        });

        $("#canon").prop('canon', true);
        $("#id_alicuota_iva").prop('disabled', true);
       
    }else{
        $("#canon").prop('disabled', false);
        $("#id_alicuota_iva").prop('disabled', false);
        
        //Remplazar decimales para caculos
            var pies = $('#pies').val();
            var newstr = pies.replace('.', "");
            var newstr2 = newstr.replace('.', "");
            var newstr3 = newstr2.replace('.', "");
            var newstr4 = newstr3.replace('.', "");
            var precio = newstr4.replace(',', ".");

            var tota = (((tarifa * precio)/cantidad2)) * dia;
            var tota2 = parseFloat(tota).toFixed(2);
            var canon = Intl.NumberFormat("de-DE").format(tota2);
            $('#canon').val(canon);


            var id_alicuota_iva = $('#id_alicuota_iva').val();
            var separar = id_alicuota_iva.split("/");
            var porcentaje = parseFloat(separar['0']);

            var newstr5 = canon.replace('.', "");
            var newstr6 = newstr5.replace('.', "");
            var newstr7 = newstr6.replace('.', "");
            var newstr8 = newstr7.replace('.', "");
            var precio_total_ac = newstr8.replace(',', ".");
    
            var monto_iva_estimado = precio_total_ac*porcentaje;
            var iva_estimado = parseFloat(monto_iva_estimado).toFixed(2);
            var iva_estimado = Intl.NumberFormat("de-DE").format(iva_estimado);
            $('#iva_estimado').val(iva_estimado);
    
            var newstr9 = iva_estimado.replace('.', "");
            var newstr10 = newstr9.replace('.', "");
            var newstr11 = newstr10.replace('.', "");
            var newstr12 = newstr11.replace('.', "");
            var iva_estimado_ac = newstr12.replace(',', ".");
    
            var monto_t_estimado = Number(precio_total_ac) + Number(iva_estimado_ac);
            var monto_total_estimadoo = parseFloat(monto_t_estimado).toFixed(2);
            var monto_total_estimado = Intl.NumberFormat("de-DE").format(monto_total_estimadoo);
            $('#monto_estimado').val(monto_total_estimado);
        
    }
}

function control(){
    var acc_cargar_acc = $('#cambiar').val();

    if (acc_cargar_acc === '1') {
        $("#acc_acc").hide();
        $("#proyecto_acc").show();
    }else if (acc_cargar_acc === '2') {
        $("#proyecto_acc").hide();
        $("#acc_acc").show();
    }
}
