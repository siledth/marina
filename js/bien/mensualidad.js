$(document).ready(function() {
    //para consultar y crear el numero de factura modifique
    var base_url =
        window.location.origin + "/marina/index.php/Mensualidades/cons_nro_factur";

    $.ajax({
        url: base_url,
        method: "post",
        dataType: "json",

        success: function(response) {
            if (response === null) {
                numero = "1";
            } else {
                numero_c = response["nro_factura"];
                numero = Number(numero_c) + 1;
            }

            function zeroFill(number, width) {
                width -= number.toString().length;
                if (width > 0) {
                    return (
                        new Array(width + (/\./.test(number) ? 2 : 1)).join("0") + number
                    );
                }
                return number + ""; // siempre devuelve tipo cadena
            }
            $("#numfact").val(zeroFill(numero, 10));
            //console.log(zeroFill(numero, 5));
        },
    });
});
function modal(id) {
    var id_mensualidad = id;

    var base_url =
        window.location.origin + "/marina/index.php/Mensualidades/consultar_mens";

    var base_url2 =
        window.location.origin + "/marina/index.php/Mensualidades/consultar_dol";

    $.ajax({
        url: base_url,
        method: "post",
        data: { id_mensualidad: id_mensualidad },
        dataType: "json",
        success: function(data) {
            console.log(data);
            $("#id_mesualidad_ver").val(id_mensualidad);
            $("#matricula").val(data["matricula"]);
            $("#pies").val(data["pies"]);
            $("#tarifa").val(data["id_tarifa"]);
            $("#dias").val(data["dia"]);
            $("#canon").val(data["canon"]);

            let canon = data["canon"];
            var newstr5 = canon.replace(".", "");
            var newstr6 = newstr5.replace(".", "");
            var newstr7 = newstr6.replace(".", "");
            var newstr8 = newstr7.replace(".", "");
            var canonn = newstr8.replace(",", ".");

          /*  $("#id_dolar").val(data["id_dolar"]);
            $("#dolar").val(data["valor"]);
            let dolar = data["valor"];
            var dolarr = dolar.replace(",", ".");
            let calculo = canonn * dolarr;
            var calculo_t = parseFloat(calculo).toFixed(2);
            var calculo_tt = Intl.NumberFormat("de-DE").format(calculo_t);
            $("#bs").val(calculo_tt);*/
        },
    });
}

function llenar_pago() {
    var tipo_pago = $("#id_tipo_pago").val();
    if (tipo_pago <= "3") {
        $("#campos").show();
    } else {
        $("#campos").hide();
    }
}
function calcular_dolar(){
    var dolar = $('#dolar').val();
    var canon = $('#canon').val();
    
   /* var newstr = dolar.replace('.', "");
    var newstr2 = newstr.replace('.', "");
    var newstr3 = newstr2.replace('.', "");
    var newstr4 = newstr3.replace('.', "");
    var dolarr = newstr4.replace('.', ".");*/

    var dolart = (dolar * canon);
    var dolart1 = parseFloat(dolart).toFixed(2);
    var bs = Intl.NumberFormat("de-DE").format(dolart1);
    $('#bs').val(bs);

}

function calcular_bol() {
    var cantidad_deu_bs = $("#bs").val();
    var cantidad_pagar_bs = $("#cantidad_pagar_bs").val();
    var valor_2 = $("#dolar").val();

    var newstr = cantidad_deu_bs.replace(".", "");
    var newstr2 = newstr.replace(".", "");
    var newstr3 = newstr2.replace(".", "");
    var newstr4 = newstr3.replace(".", "");
    var cant_deu_bs = newstr4.replace(",", ".");

    var newstr = cantidad_pagar_bs.replace(".", "");
    var newstr5 = newstr.replace(".", "");
    var newstr6 = newstr5.replace(".", "");
    var newstr7 = newstr6.replace(".", "");
    var cant_pag_bs = newstr7.replace(",", ".");
    console.log(cant_pag_bs);

    var dolarr = valor_2.replace(",", ".");

    // Total restante bs
    var restant_bs = cant_deu_bs - cant_pag_bs;
    var sub_total2 = parseFloat(restant_bs).toFixed(2);
    var sub_total3 = Intl.NumberFormat("de-DE").format(sub_total2);
    $("#total_bs_pag").val(sub_total3);

    // total a pagar om
    var sub_total_dolar = cant_pag_bs * dolarr;
    console.log(newstr);
    var sub_total_dolar4 = parseFloat(sub_total_dolar).toFixed(2);
    var sub_total_dolar5 = Intl.NumberFormat("de-DE").format(sub_total_dolar4);
    $("#cantidad_pagar_otra").val(sub_total_dolar5);

    // total restante om
    var sub_total_dolar = restant_bs * dolarr;
    var sub_total_dolar2 = parseFloat(sub_total_dolar).toFixed(2);
    var sub_total_dolar3 = Intl.NumberFormat("de-DE").format(sub_total_dolar2);
    $("#total_otra").val(sub_total_dolar3);
}

function calcular_dol() {
    var cantidad_deu_om = $("#canon").val();
    var cantidad_pagar_otra = $("#cantidad_pagar_otra").val();
    var valor_2 = $("#dolar").val();

    var newstr = cantidad_deu_om.replace(".", "");
    var newstr2 = newstr.replace(".", "");
    var newstr3 = newstr2.replace(".", "");
    var newstr4 = newstr3.replace(".", "");
    var cant_deu_om = newstr4.replace(",", ".");

    var newstr = cantidad_pagar_otra.replace(".", "");
    var newstr5 = newstr.replace(".", "");
    var newstr6 = newstr5.replace(".", "");
    var newstr7 = newstr6.replace(".", "");
    var cant_pag_otra = newstr7.replace(",", ".");

    var dolarr = valor_2.replace(",", ".");
    // Total a pagar de otra moneda
    var sub_total = cant_deu_om - cant_pag_otra;
    var sub_total2 = parseFloat(sub_total).toFixed(2);
    var sub_total3 = Intl.NumberFormat("de-DE").format(sub_total2);
    $("#total_otra").val(sub_total3);

    // Total a pagar en bs
    var sub_total_dolar1 = cant_pag_otra * dolarr;
    var sub_total_dolar2 = parseFloat(sub_total_dolar1).toFixed(2);
    var sub_total_dolar3 = Intl.NumberFormat("de-DE").format(sub_total_dolar2);
    $("#cantidad_pagar_bs").val(sub_total_dolar3);

    // Restante en bolvares
    var cantidad_deu_bs = $("#bs").val();
    var cantidad_deu_bs1 = cantidad_deu_bs.replace(".", "");
    var cantidad_deu_bs2 = cantidad_deu_bs1.replace(".", "");
    var cantidad_deu_bs3 = cantidad_deu_bs2.replace(".", "");
    var cantidad_deu_bs4 = cantidad_deu_bs3.replace(".", "");
    var cantidad_deu_bsf = cantidad_deu_bs4.replace(",", ".");

    var total_a_deber = cant_pag_otra * dolarr;
    var total_deber_bol = cantidad_deu_bsf - total_a_deber;
    var total_deber_bol2 = parseFloat(total_deber_bol).toFixed(2);
    var total_a_deb_bs = Intl.NumberFormat("de-DE").format(total_deber_bol2);
    $("#total_bs_pag").val(total_a_deb_bs);
}

function guardar_proc_pago() {
    event.preventDefault();
    swal
        .fire({
            title: "¿Registrar?",
            text: "¿Esta seguro de registrar el proceso de Pago?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            cancelButtonText: "Cancelar",
            confirmButtonText: "¡Si, guardar!",
        })
        .then((result) => {
            if (document.guardar_proc_pag.dolar.value.length==0){
                alert("No Puede dejar el campo Valor Dolar vacio, Ingrese un Monto")
                document.guardar_proc_pag.dolar.focus()
                return 0;
         } 
            if (document.guardar_proc_pag.cantidad_pagar_otra.value.length==0){
                alert("No Puede dejar el campo la Cantidad a pagar $ vacio, Ingrese un Monto")
                document.guardar_proc_pag.cantidad_pagar_otra.focus()
                return 0;
         }     	if (document.guardar_proc_pag.id_tipo_pago.selectedIndex==0){
            alert("Debe seleccionar un Tipo de pago.")
            document.guardar_proc_pag.id_tipo_pago.focus()
            return 0;
     }
            if (result.value == true) {
                event.preventDefault();
                var datos = new FormData($("#guardar_proc_pag")[0]);
                var base_url =
                    window.location.origin +
                    "/marina/index.php/Mensualidades/guardar_proc_pag";
                var base_url_2 =
                    window.location.origin + "/marina/index.php/Mensualidades/ver";
                $.ajax({
                    url: base_url,
                    method: "POST",
                    data: datos,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response == "true") {
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
                        }
                    },
                });
            }
        });
}

//Para adelanto de mensualidades
function calcular_dolar_a(){
    var dolar = $('#dolar_a').val();
    var canon = $('#canon_a').val();
    
   /* var newstr = dolar.replace('.', "");
    var newstr2 = newstr.replace('.', "");
    var newstr3 = newstr2.replace('.', "");
    var newstr4 = newstr3.replace('.', "");
    var dolarr = newstr4.replace('.', ".");*/

    var dolart = (dolar * canon);
    var dolart1 = parseFloat(dolart).toFixed(2);
    var bs = Intl.NumberFormat("de-DE").format(dolart1);
    $('#bs_a').val(bs);

}




function trae_inf() {
    var matricular = $("#matricular").val();

    var base_url =
        window.location.origin + "/marina/index.php/mensualidades/listar_info";
    
    $.ajax({
        url: base_url,
        method: "post",
        data: { matricular: matricular },
        dataType: "json",

        success: function(response) {
            $("#cedula").val(response["cedula"]);
            $("#nombre_a").val(response["nombrecom"]);
            $("#pies_a").val(response["pies"]);
            $("#tele_1_a").val(response["tele_1"]);
            $("#dias_a").val(response["dia"]);
            $("#tarifa_a").val(response["desc_concepto"]);
            $("#id_tarifa_a").val(response["id_tarifa"]);
            $("#tarifa_a1").val(response["desc_tarifa"]);
            $("#canon_a").val(response["canon"]);

            let canon = response["canon"];
            var newstr5 = canon.replace(".", "");
            var newstr6 = newstr5.replace(".", "");
            var newstr7 = newstr6.replace(".", "");
            var newstr8 = newstr7.replace(".", "");
            var canonn = newstr8.replace(",", ".");

           
        },
    });
}

function llenar_pago_a() {
    var tipo_pago = $("#id_tipo_pago_a").val();
    if (tipo_pago <= "2") {
        $("#campos_a").show();
    } else {
        $("#campos_a").hide();
    }
}

function calcular_bol_a() {
    var cantidad_deu_bs = $("#bs_a").val();
    var cantidad_pagar_bs = $("#cantidad_pagar_bs_a").val();
    var valor_2 = $("#dolar_1a").val();

    var newstr = cantidad_deu_bs.replace(".", "");
    var newstr2 = newstr.replace(".", "");
    var newstr3 = newstr2.replace(".", "");
    var newstr4 = newstr3.replace(".", "");
    var cant_deu_bs = newstr4.replace(",", ".");

    var newstr = cantidad_pagar_bs.replace(".", "");
    var newstr5 = newstr.replace(".", "");
    var newstr6 = newstr5.replace(".", "");
    var newstr7 = newstr6.replace(".", "");
    var cant_pag_bs = newstr7.replace(",", ".");

    var dolarr = valor_2.replace(",", ".");
    // Total restante bs
    var restant_bs = cant_deu_bs - cant_pag_bs;
    var sub_total2 = parseFloat(restant_bs).toFixed(2);
    var sub_total3 = Intl.NumberFormat("de-DE").format(sub_total2);
    $("#total_bs_pag_a").val(sub_total3);

    // total a pagar om
    var sub_total_dolar = cant_pag_bs / dolarr;
    var sub_total_dolar4 = parseFloat(sub_total_dolar).toFixed(2);
    var sub_total_dolar5 = Intl.NumberFormat("de-DE").format(sub_total_dolar4);
    $("#cantidad_pagar_otra_a").val(sub_total_dolar5);

    // total restante om
    var sub_total_dolar = restant_bs / dolarr;
    var sub_total_dolar2 = parseFloat(sub_total_dolar).toFixed(2);
    var sub_total_dolar3 = Intl.NumberFormat("de-DE").format(sub_total_dolar2);
    $("#total_otra_a").val(sub_total_dolar3);
}

function calcular_dol_a() {
    var cantidad_deu_om = $("#canon_a").val();
    var cantidad_pagar_otra = $("#cantidad_pagar_otra_a").val();
    var valor_2 = $("#dolar_a").val();

    var newstr = cantidad_deu_om.replace(".", "");
    var newstr2 = newstr.replace(".", "");
    var newstr3 = newstr2.replace(".", "");
    var newstr4 = newstr3.replace(".", "");
    var cant_deu_om = newstr4.replace(",", ".");

    var newstr = cantidad_pagar_otra.replace(".", "");
    var newstr5 = newstr.replace(".", "");
    var newstr6 = newstr5.replace(".", "");
    var newstr7 = newstr6.replace(".", "");
    var cant_pag_otra = newstr7.replace(",", ".");

    var dolarr = valor_2.replace(",", ".");
    // Total a pagar de otra moneda
    var sub_total = cant_deu_om - cant_pag_otra;
    var sub_total2 = parseFloat(sub_total).toFixed(2);
    var sub_total3 = Intl.NumberFormat("de-DE").format(sub_total2);
    $("#total_otra_a").val(sub_total3);

    // Total a pagar en bs
    var sub_total_dolar1 = cant_pag_otra * dolarr;
    var sub_total_dolar2 = parseFloat(sub_total_dolar1).toFixed(2);
    var sub_total_dolar3 = Intl.NumberFormat("de-DE").format(sub_total_dolar2);
    $("#cantidad_pagar_bs_a").val(sub_total_dolar3);

    // Restante en bolvares
    var cantidad_deu_bs = $("#bs_a").val();
    var cantidad_deu_bs1 = cantidad_deu_bs.replace(".", "");
    var cantidad_deu_bs2 = cantidad_deu_bs1.replace(".", "");
    var cantidad_deu_bs3 = cantidad_deu_bs2.replace(".", "");
    var cantidad_deu_bs4 = cantidad_deu_bs3.replace(".", "");
    var cantidad_deu_bsf = cantidad_deu_bs4.replace(",", ".");

    var total_a_deber = cant_pag_otra * dolarr;
    var total_deber_bol = cantidad_deu_bsf - total_a_deber;
    var total_deber_bol2 = parseFloat(total_deber_bol).toFixed(2);
    var total_a_deb_bs = Intl.NumberFormat("de-DE").format(total_deber_bol2);
    $("#total_bs_pag_a").val(total_a_deb_bs);
}

function guardar_adelanto_pag() {
    event.preventDefault();
    swal
        .fire({
            title: "¿Registrar?",
            text: "¿Esta seguro de registrar el adelanto de Pago?",
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
                var datos = new FormData($("#guardar_adelanto_pag")[0]);
                var base_url =
                    window.location.origin +
                    "/marina/index.php/Mensualidades/guardar_adelanto_pag";
                var base_url_2 =
                    window.location.origin + "/marina/index.php/Mensualidades/ver";
                $.ajax({
                    url: base_url,
                    method: "POST",
                    data: datos,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response == "true") {
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
                        }
                    },
                });
            }
        });
        
}