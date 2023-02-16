$(document).ready(function() {
    //para consultar y crear el numero de factura modifique
    var base_url =
        window.location.origin + "/marina/index.php/Mensualidades/cons_nro_adelanto";

    $.ajax({
        url: base_url,
        method: "post",
        dataType: "json",

        success: function(response) {
            console.log(response);
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
            $("#numfactura").val(zeroFill(numero, 10));
            //console.log(zeroFill(numero, 10));
        },
    });
});