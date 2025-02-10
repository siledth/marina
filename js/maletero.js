
//TODO MAYUSCULA
function may(e){
	e.value = e.value.toUpperCase();
}
//SOLO NÚMEROS
function valideKey(evt){
	var code = (evt.which) ? evt.which : evt.keyCode;
	if(code==8) { // backspace.
		return true;
	}else if(code>=48 && code<=57) { // is a number.
		return true;
	}else{ // other keys.
		return false;
	}
}

//CRUD BANCO
	//GUARDAR BANCO
	function guardar_b(){
		 
		var nombre_b = $("#nombre_b").val();

		if (nombre_b == '') {
			document.getElementById("nombre_b").focus();
		} else {
			event.preventDefault();
			swal.fire({
				title: '¿Registrar?',
				text: '¿Esta seguro de Guardar?',
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				cancelButtonText: 'Cancelar',
				confirmButtonText: '¡Si, guardar!'
			}).then((result) => {
				if (result.value == true) {
					event.preventDefault();
					var datos = new FormData($("#guardar_ba")[0]);
					var base_url =window.location.origin+'/marina/index.php/Maletero/registrar_b';
					// var base_url = '/index.php/Certificacion/registrar_b';
					$.ajax({
						url:base_url,
						method: 'POST',
						data: datos,
						contentType: false,
						processData: false,
						success: function(response){
							if(response != '') {
								swal.fire({
									title: 'Registro Exitoso',
									type: 'success',
									showCancelButton: false,
									confirmButtonColor: '#3085d6',
									confirmButtonText: 'Ok'
								}).then((result) => {
									if (result.value == true){
										location.reload();
									}
								});
							}
						}
					})
				}
			});
		}
	}
	//BUSCAR BANCO PARA EDITAR
	function modal_ver(id){
		var id = id;
		var base_url = window.location.origin+'/marina/index.php/Maletero/consulta_b';
		// var base_url = '/index.php/Certificacion/consulta_b';
		$.ajax({
			url: base_url,
			method:'post',
			data: {id: id},
			dataType:'json',

			success: function(response){
				$('#id').val(response['id']);
				$('#nombre_maletero_edit').val(response['descripcion']);
			 
			}
		});
	}
	//EDITAR BANCO
	function editar_b(){
		var id_banco = $("#id").val();
	 
		var nombre_b = $("#nombre_maletero_edit").val();

		var datos = new FormData($("#editar")[0]);
		if (nombre_b == '') {
			document.getElementById("nombre_b").focus();
		} else {
			event.preventDefault();
			swal.fire({
				title: 'Modificar?',
				text: '¿Esta seguro de Modificar este registro?',
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				cancelButtonText: 'Cancelar',
				confirmButtonText: '¡Si, guardar!'
			}).then((result) => {
				if (result.value == true) {
					event.preventDefault();
					var datos = new FormData($("#editar")[0]);
					var base_urls =window.location.origin+'/marina/index.php/Maletero/editar_b';
					//var base_urls = '/index.php/Certificacion/editar_b';
					$.ajax({
						url: base_urls,
						method:'post',
						data: {id_banco: id_banco,
							 
							nombre_b: nombre_b
						},
					dataType:'json',
						success: function(response){
							if(response != '') {
								swal.fire({
									title: 'Modificación Exitosa',
									type: 'success',
									showCancelButton: false,
									confirmButtonColor: '#3085d6',
									confirmButtonText: 'Ok'
								}).then((result) => {
									if (result.value == true){
										location.reload();
									}
								});
							}
						}
					})
				}
			});
		}
	}
	//ELIMINAR
	function eliminar_b(id){
		event.preventDefault();
		swal.fire({
			title: '¿Seguro que desea Deshabilitar el Contratista?',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			cancelButtonText: 'Cancelar',
			confirmButtonText: '¡Si, guardar!'
		}).then((result) => {
			if (result.value == true) {
				var id_exonerado = id
				//var base_url =window.location.origin+'/asnc/index.php/Certificaciones/eliminar_b';
				var base_url = '/index.php/Certificacion/eliminar_b';

				$.ajax({
					url:base_url,
					method: 'post',
					data:{
						id_exonerado: id_exonerado
					},
					dataType: 'json',
					success: function(response){
						if(response == 1) {
							swal.fire({
								title: 'Deshabilitar Exitosa',
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

    // function guardar_mensualidad_maletero(){
		 
	// 	if (event) {
    //     event.preventDefault();
    // }

    // // Verificar si se ha seleccionado un maletero
    // const maleteroElement = document.getElementById('id_maletero');
    // const nombreElement = document.getElementById('nombre');
    // const cedrifElement = document.getElementById('cedrif');
    // const telefElement = document.getElementById('tele');
    // const correoElement = document.getElementById('correo');
    // const nombre_lanchaElement = document.getElementById('nombre_lancha');



    // if (maleteroElement.selectedIndex === 0) {
    //     Swal.fire({
    //         title: 'Debe seleccionar un maletero.',
    //         type: 'warning',
    //         showCancelButton: false,
    //         confirmButtonColor: '#3085d6',
    //         confirmButtonText: 'Ok'
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //             maleteroElement.focus();
    //         }
    //     });
    //     return; // Detener la ejecución si no se selecciona un maletero
    // } 
    //   if (nombreElement.value.trim() === "") {
    //     Swal.fire({
    //         title: 'El campo Nombre y apellido es obligatorio.',
    //         type: 'warning',
    //         showCancelButton: false,
    //         confirmButtonColor: '#3085d6',
    //         confirmButtonText: 'Ok'
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //             nombreElement.focus();
    //         }
    //     });
    //     return false; // Detener la ejecución si el campo está vacío
    // }
    //  if (cedrifElement.value.trim() === "") {
    //     Swal.fire({
    //         title: 'El campo CI / RIF es obligatorio.',
    //         type: 'warning',
    //         showCancelButton: false,
    //         confirmButtonColor: '#3085d6',
    //         confirmButtonText: 'Ok'
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //             cedrifElement.focus();
    //         }
    //     });
    //     return false; // Detener la ejecución si el campo está vacío
    // }
    // if (telefElement.value.trim() === "") {
    //     Swal.fire({
    //         title: 'El campo Telefono de contacto es obligatorio.',
    //         type: 'warning',
    //         showCancelButton: false,
    //         confirmButtonColor: '#3085d6',
    //         confirmButtonText: 'Ok'
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //             telefElement.focus();
    //         }
    //     });
    //     return false; // Detener la ejecución si el campo está vacío
    // }
    //   if (correoElement.value.trim() === "") {
    //     Swal.fire({
    //         title: 'El campo correo electronico es obligatorio.',
    //         type: 'warning',
    //         showCancelButton: false,
    //         confirmButtonColor: '#3085d6',
    //         confirmButtonText: 'Ok'
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //             correoElement.focus();
    //         }
    //     });
    //     return false; // Detener la ejecución si el campo está vacío
    // }
    // if (nombre_lanchaElement.value.trim() === "") {
    //     Swal.fire({
    //         title: 'El campo Nombre de la lancha es obligatorio.',
    //         type: 'warning',
    //         showCancelButton: false,
    //         confirmButtonColor: '#3085d6',
    //         confirmButtonText: 'Ok'
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //             nombre_lanchaElement.focus();
    //         }
    //     });
    //     return false; // Detener la ejecución si el campo está vacío
    // }
	// 		swal.fire({
	// 			title: '¿Registrar?',
	// 			text: '¿Esta seguro de Guardar?',
	// 			type: 'warning',
	// 			showCancelButton: true,
	// 			confirmButtonColor: '#3085d6',
	// 			cancelButtonColor: '#d33',
	// 			cancelButtonText: 'Cancelar',
	// 			confirmButtonText: '¡Si, guardar!'
	// 		}).then((result) => {
	// 			if (result.value == true) {
	// 				event.preventDefault();
	// 				var datos = new FormData($("#guardar_ba")[0]);
	// 				var base_url =window.location.origin+'/marina/index.php/Maletero/registrar_maletero_asignacion';
	// 				// var base_url = '/index.php/Certificacion/registrar_b';
	// 				$.ajax({
	// 					url:base_url,
	// 					method: 'POST',
	// 					data: datos,
	// 					contentType: false,
	// 					processData: false,
	// 					success: function(response){
	// 						if(response != '') {
	// 							swal.fire({
	// 								title: 'Registro Exitoso',
	// 								type: 'success',
	// 								showCancelButton: false,
	// 								confirmButtonColor: '#3085d6',
	// 								confirmButtonText: 'Ok'
	// 							}).then((result) => {
	// 								if (result.value == true){
	// 									location.reload();
	// 								}
	// 							});
	// 						}
	// 					}
	// 				})
	// 			}
	// 		});
	// 	}
	
        function guardar_mensualidad_maletero() {
    if (event) {
        event.preventDefault();
    }
// Verificar si se ha seleccionado un maletero
    const maleteroElement = document.getElementById('id_maletero');
    const nombreElement = document.getElementById('nombre');
    const cedrifElement = document.getElementById('cedrif');
    const telefElement = document.getElementById('tele');
    const correoElement = document.getElementById('correo');
    const nombre_lanchaElement = document.getElementById('nombre_lancha');



    if (maleteroElement.selectedIndex === 0) {
        Swal.fire({
            title: 'Debe seleccionar un maletero.',
            type: 'warning',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
        }).then((result) => {
            if (result.isConfirmed) {
                maleteroElement.focus();
            }
        });
        return; // Detener la ejecución si no se selecciona un maletero
    } 
      if (nombreElement.value.trim() === "") {
        Swal.fire({
            title: 'El campo Nombre y apellido es obligatorio.',
            type: 'warning',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
        }).then((result) => {
            if (result.isConfirmed) {
                nombreElement.focus();
            }
        });
        return false; // Detener la ejecución si el campo está vacío
    }
     if (cedrifElement.value.trim() === "") {
        Swal.fire({
            title: 'El campo CI / RIF es obligatorio.',
            type: 'warning',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
        }).then((result) => {
            if (result.isConfirmed) {
                cedrifElement.focus();
            }
        });
        return false; // Detener la ejecución si el campo está vacío
    }
    if (telefElement.value.trim() === "") {
        Swal.fire({
            title: 'El campo Telefono de contacto es obligatorio.',
            type: 'warning',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
        }).then((result) => {
            if (result.isConfirmed) {
                telefElement.focus();
            }
        });
        return false; // Detener la ejecución si el campo está vacío
    }
      if (correoElement.value.trim() === "") {
        Swal.fire({
            title: 'El campo correo electronico es obligatorio.',
            type: 'warning',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
        }).then((result) => {
            if (result.isConfirmed) {
                correoElement.focus();
            }
        });
        return false; // Detener la ejecución si el campo está vacío
    }
    if (nombre_lanchaElement.value.trim() === "") {
        Swal.fire({
            title: 'El campo Nombre de la lancha es obligatorio.',
            type: 'warning',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
        }).then((result) => {
            if (result.isConfirmed) {
                nombre_lanchaElement.focus();
            }
        });
        return false; // Detener la ejecución si el campo está vacío
    }
    swal.fire({
        title: '¿Registrar?',
        text: '¿Está seguro de Guardar?',
        type: 'warning', // Cambié 'type' a 'icon' para versiones más recientes de SweetAlert
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: '¡Sí, guardar!'
    }).then((result) => {
        if (result.value == true) {
            event.preventDefault();
            var datos = new FormData($("#guardar_ba")[0]);
            var base_url = window.location.origin + '/marina/index.php/Maletero/registrar_maletero_asignacion';
            var base_url_3 = window.location.origin + '/marina/index.php/Pdf_maletero/pdfrt?id=';

            $.ajax({
                url: base_url,
                method: 'POST',
                data: datos,
                contentType: false,
                processData: false,
                success: function(response) {
                   //  console.log("ID :", response); 
                    // Asegúrate de que la respuesta sea un objeto JSON
                    try {
                        response = JSON.parse(response);
                    } catch (e) {
                        console.error("Error al parsear la respuesta:", e);
                        swal.fire({
                            title: 'Error',
                            text: 'Ocurrió un error inesperado. Intente nuevamente.',
                            type: 'error',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Ok'
                        });
                        return;
                    }

                    // Verificar si hay un error en la respuesta
                    if (response.error) {
                        // Mostrar el mensaje de error en SweetAlert
                        swal.fire({
                            title: '',
                            text: response.error, // Muestra el mensaje de error
                            type: 'error',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Ok'
                        });
                    } else {
                     console.log("ID :", response); 

                        // Si no hay error, mostrar mensaje de éxito
                        swal.fire({
                            title: 'Registro Exitoso',
                            text: 'El maletero ha sido registrado correctamente.',
                            type: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Ok'
                        }).then((result) => {
                            if (result.value) {
                                // Redirige a la URL generada
                                window.location.href = base_url_3 + response; // Asegúrate de que 'id_factura' esté en la respuesta
                                setTimeout(function() {
                                    window.location.reload(); // Recarga la página después de un tiempo
                                }, 1000);
                            }
                        });
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // Manejo de errores de la llamada AJAX
                    swal.fire({
                        title: 'Error',
                        text: 'Ocurrió un error al procesar la solicitud. Intente nuevamente.',
                        type: 'error',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Ok'
                    });
                }
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

function modal1(id) {
    var id_mov_consig = id;

    var base_url =
        window.location.origin + "/marina/index.php/Maletero/consultar_deuda2";

    var base_url2 =
        window.location.origin + "/marina/index.php/Mensualidades/consultar_dol";

    $.ajax({
        url: base_url,
        method: "post",
        data: { id_mov_consig: id_mov_consig },
        dataType: "json",
        success: function(data) {
            $("#id_mov_consig_ver").val(id_mov_consig);
            $("#descripcion").val(data["descripcion"]);
             $("#pago").val(data["pago"]);
            // $("#tarifa").val(data["id_tarifa"]);
            // $("#dias").val(data["dia"]);
            // $("#canon").val(data["canon"]);
//esto cambie
           
        },
    });
}


// fetch('https://pydolarve.org/api/v1/dollar?page=bcv')
//   .then(response => {
//     if (!response.ok) {
//       throw new Error('Error en la red');
//     }
//     return response.json();
//   })
//   .then(data => {
//     console.log(data); // Aquí puedes manejar los datos recibidos
//   })
//   .catch(error => {
//     console.error('Hubo un problema con la solicitud:', error);
//   });
function obtenerPago() {
    // Simulación de una consulta para obtener el valor de pago
    return new Promise((resolve, reject) => {
        // Simulando una llamada a la API
        setTimeout(() => {
            const pagoValue = 450 //este valor esta anclado
            resolve(pagoValue);
        }, 1000); // Simulando un retraso de 1 segundo
    });
}
// Función para obtener el valor del dólar
function obtenerDolar() {
    return fetch('https://pydolarve.org/api/v1/dollar?page=bcv')
        .then(response => {
            if (!response.ok) {
                throw new Error('Error en la red');
            }
            return response.json();
        })
        .then(data => {
            const usd = data.monitors.usd;
             document.getElementById('usd-title').textContent = 'dolar BCV';
            const usdPrice = data.monitors.usd.price; // Asigna el valor del dólar
            document.getElementById('usd-price').value = usdPrice; // Asigna el valor al input
            document.getElementById('usd-last-update').textContent = usd.last_update;
            return usdPrice;
        });
}


// fetch('https://pydolarve.org/api/v1/dollar?page=bcv')
//     .then(response => {
//         if (!response.ok) {
//             throw new Error('Error en la red');
//         }
//         return response.json();
//     })
//     .then(data => {
//         // Acceder a la información del dólar estadounidense
//         const usd = data.monitors.usd;

//         // Mostrar la información en el HTML
//         document.getElementById('usd-title').textContent = 'dolar BCV';
//         // document.getElementById('usd-price').textContent = usd.price;
//        document.getElementById('usd-price').value = usd.price;
    
//         document.getElementById('usd-last-update').textContent = usd.last_update;
//         calcularTotal();
//     })
//     .catch(error => {
//         console.error('Hubo un problema con la solicitud:', error);
//     });

    // Función para multiplicar los valores de los inputs
// function calcularTotal() {
//     // Obtener los valores de los inputs
    
//     const pago = parseFloat(document.getElementById('pago')) || 0;
//     const usdPrice = parseFloat(document.getElementById('usd-price').value) || 0;

//     // Multiplicar los valores
//     const total = pago * usdPrice;

//     // Mostrar el resultado en el input totalbs
//     document.getElementById('totalbs').value = total.toFixed(2); // Formatear a 2 decimales
// }

// // Llamar a la función para calcular el total después de que los valores se establezcan
// calcularTotal();
function calcularTotal(pago, usdPrice) {
    console.log('Valor de pago:', pago); // Agregar console.log para depuración
    console.log('Valor de USD Price:', usdPrice); // Agregar console.log para depuración
    const total = pago * usdPrice;
    document.getElementById('totalbs').value = total.toFixed(2); // Formatear a 2 decimales
}

// Llamar a ambas funciones y calcular el total
Promise.all([obtenerPago(), obtenerDolar()])
    .then(([pago, usdPrice]) => {
        document.getElementById('pago').value = pago; // Asigna el valor de pago al input
        calcularTotal(pago, usdPrice); // Calcula el total
    })
    .catch(error => {
        console.error('Hubo un problema con la solicitud:', error);
    });

    function guardar_pago_maletero() {
    event.preventDefault();
    swal
        .fire({
            title: "¿Registrar?",
            text: "¿Esta seguro de registrar el proceso de Pago ",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            cancelButtonText: "Cancelar",
            confirmButtonText: "¡Si, guardar!",
        })
        .then((result) => {
            
             	if (document.guardar_proc_pag.id_tipo_pago.selectedIndex==0){
            alert("Debe seleccionar un Tipo de pago.")
            document.guardar_proc_pag.id_tipo_pago.focus()
            return 0;
     }
            if (result.value == true) {
                event.preventDefault();
                var datos = new FormData($("#guardar_proc_pag")[0]);
                var base_url =
                    window.location.origin +
                    "/marina/index.php/Maletero/guardar_proc_pag_maleter";
                // var base_url_2 =
                //     window.location.origin + "/marina/index.php/Mensualidades/ver";
          var base_url_3 = window.location.origin + '/marina/index.php/Pdf_maletero/pdfrt?id=';

                $.ajax({
                    url: base_url,
                    method: "POST",
                    data: datos,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        var menj = 'Numero de Recibo: ';
    console.log('Valor de pago:', response); // Agregar console.log para depuración

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
                                   setTimeout(function() {
                                    window.location.reload(); // Recarga la página después de un tiempo
                                }, 1000);
                                }
                            });
                        }
                    },
                });
            }
        });
}