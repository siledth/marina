function modal(id) {
    var matricula = 'AGSI-D-9005';
   // alert(+matricula);
    var base_url =
        window.location.origin + "/marina/index.php/Buque/consultar_embarcacion";

  
    $.ajax({
        url: base_url,
        method: "post",
        data: { matricula: matricula },
        dataType: "json",
        success: function(data) {
            console.log(data);
            $("#matricula_ver").val(matricula);
           
        },
    });
}