$(document).ready(function() {
    //para consultar y crear el numero de factura
    var base_url =
        window.location.origin + "/marina/index.php/Factura/cons_nro_recibo";

    $.ajax({
        url: base_url,
        method: "post",
        dataType: "json",

        success: function(response) {
            if (response === null) {
                numero = "1";
            } else {
                numero_c = response["id"];
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
            $("#numfact").val(zeroFill(numero, 5));
            //console.log(zeroFill(numero, 5));
        },
    });
});

function guardar_bien() {
    event.preventDefault();
    swal
        .fire({
            title: "¿Registrar?",
            text: "¿Esta seguro de Registrar ?",
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
                var datos = new FormData($("#reg_bien")[0]);
                var base_url =
                    window.location.origin + "/marina/index.php/Factura/registrar_transito_recibo";
                //   var base_url = '/index.php/Programacion/registrar_bien';
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
                                        location.reload();
                                    }
                                });
                        }
                    },
                });
            }
        });
}

function llenar_pago() {
    var tipo_pago = $("#id_tipo_pago").val();
    if (tipo_pago <= "2") {
        $("#campos").show();
    } else {
        $("#campos").hide();
    }
}

/*function hab_campo() {
    var otro = document.getElementById("cssRadio5").checked;
    if (otro == true) {
        $("#hab_campo_esp").show();
    } else {
        $("#hab_campo_esp").hide();
    }
}*/

function anular_factura(id_fact) {
    event.preventDefault();
    swal
        .fire({
            title: "¿Seguro que desea anular la factura selecionada?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            cancelButtonText: "Cancelar",
            confirmButtonText: "¡Si, Anular!",
        })
        .then((result) => {
            if (result.value == true) {
                var id_factura = id_fact;

                var base_url =
                    window.location.origin + "/marina/index.php/Factura/anular_trasito";

                $.ajax({
                    url: base_url,
                    method: "post",
                    data: {
                        id_factura: id_factura,
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response == 1) {
                            swal
                                .fire({
                                    title: "Proceso Exitoso",
                                    type: "success",
                                    showCancelButton: false,
                                    confirmButtonColor: "#3085d6",
                                    confirmButtonText: "Ok",
                                })
                                .then((result) => {
                                    if (result.value == true) {
                                        location.reload();
                                    }
                                });
                        }
                    },
                });
            }
        });
}