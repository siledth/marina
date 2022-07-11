function modal(id) {
    var id_mensualidad = id;
    console.log(id_mensualidad);

    var base_url = window.location.origin + '/marina/index.php/Mensualidades/consultar_mens';

    $.ajax({
        url: base_url,
        method: 'post',
        data: { id_mensualidad: id_mensualidad },
        dataType: 'json',
        success: function(data) {
            console.log(data);
            $('#id_reg_factura_ver').val(id_mensualidad);
            $('#matricula').val(data['matricula']);
            $('#pies').val(data['pies']);
            $('#tarifa').val(data['tarifa']);
            $('#dias').val(data['dia']);
            $('#canon').val(data['canon']);
        }
    });
}