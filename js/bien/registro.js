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

        if (document.reg_bien.nombrebuque.value.length==0){
            alert("No Puede dejar el campo Nombre de Embarcacion vacio, Ingrese un Nombre")
            document.reg_bien.nombrebuque.focus()
            return 0;
     } 
     if (document.reg_bien.matricula.value.length==0){
        alert("No Puede dejar el campo matricula vacio, Ingrese una matricula")
        document.reg_bien.matricula.focus()
        return 0;
 }
 if (document.reg_bien.ubicacion.value.length==0){
    alert("No Puede dejar el campo ubicacion vacio, Ingrese una ubicacion")
    document.reg_bien.ubicacion.focus()
    return 0;
}
if (document.reg_bien.pies.value.length==0){
    alert("No Puede dejar el campo Pie vacio, Ingrese un Pie")
    document.reg_bien.pies.focus()
    return 0;
}   
if (document.reg_bien.canon.value.length==0){
    alert("No Puede dejar el campo canon vacio, Ingrese un canon")
    document.reg_bien.canon.focus()
    return 0;
} 
if (document.reg_bien.fecha_pago.value.length==0){
    alert("No Puede dejar el campo  fecha Pago, Ingrese un fecha Pago")
    document.reg_bien.fecha_pago.focus()
    return 0;
} 


        if (result.value == true) {

            event.preventDefault();
            var datos = new FormData($("#reg_bien")[0]);
            var base_url =window.location.origin+'/marina/index.php/Buque/registrar_buque';
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
