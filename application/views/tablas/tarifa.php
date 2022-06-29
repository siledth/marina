<link href="<?= base_url() ?>/css/buque.css?<?= time() ?>" rel="stylesheet" />
<div class="sidebar-bg"></div>
<div id="content" class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-inverse" data-sortable-id="form-validation-1">
                <div class="panel-heading">
                    <h4 class="panel-title">Servicios - Tarifas</h4>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal"
                            data-target="#exampleModal">
                            Nuevo
                        </button>
                        <!-- Modal insert -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Crear </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post" id="form">
                                            <div class="form-group">
                                                <label for="">Concepto</label>
                                                <input type="text" class="form-control" id="desc_concepto"
                                                    placeholder="Concepto">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Condición</label>
                                                <input type="text" class="form-control" id="desc_condicion"
                                                    placeholder="Condición">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Tarifa $</label>
                                                <input type="text" class="form-control" id="desc_tarifa"
                                                    placeholder="Tarifa">
                                            </div>
                                            <div class="form-group">
                                                <label>und</label>
                                                <select class="form-control" id="des_unidad">
                                                    <option value="PIE">PIE</option>
                                                    <option value="DIA">DIA</option>
                                                </select>
                                            </div>

                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cancelar</button>
                                        <button type="button" class="btn btn-primary" id="add">AGREGAR</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Edit Modal -->
                    <div class="modal fade" id="edit_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="post" id="update_form">
                                        <input type="hidden" id="edit_id_tarifa" name="edit_id_tarifa"value="">
                                        <div class="form-group">
                                            <label for="">Concepto</label>
                                            <input type="text" class="form-control" id="edit_desc_concepto">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Condición</label>
                                            <input type="text" class="form-control" id="edit_desc_condicion">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tarifa $</label>
                                            <input type="text" class="form-control" id="edit_desc_tarifa">
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" id="edit_des_unidad">
                                                <label>und</label>
                                                <option value="PIE">PIE</option>
                                                <option value="DIA">DIA</option>
                                            </select>
                                        </div>

                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-primary" id="update">Editar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-1"></div>
                <div class="col-12 mt-3">
                    <table id="records" class="table table-bordered table-hover">
                        <thead style="background:#e4e7e8">
                            <tr class="text-center">
                                <th>N°</th>
                                <th>Concepto</th>
                                <th>Condición</th>
                                <th>Tarifa $</th>
                                <th>Und</th>
                                <th>Fecha Modificación</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Toastr --> 
<script src="<?=base_url()?>/js/cloudflare.js"></script>
<script src="<?=base_url()?>/js/toastr.js"></script>

<!-- Add Records -->
<script>
$(document).on("click", "#add", function(e) {
    e.preventDefault();
    var desc_concepto = $("#desc_concepto").val();
    var desc_condicion = $("#desc_condicion").val();
    var desc_tarifa = $("#desc_tarifa ").val();
    var des_unidad = $("#des_unidad").val();
    var fecha = new Intl.DateTimeFormat("es-ES", {
        dateStyle: "short",
        timeStyle: "short"
    }).format(new Date());
    // alert(descripcion );
    if (desc_concepto == "") {
        alert("El campo NO puede estar vacio.");
    } else {
        $.ajax({
            url: "<?php echo base_url(); ?>index.php/Tarifa/save",
            type: "post",
            dataType: "json",
            data: {

                desc_concepto: desc_concepto,
                desc_condicion: desc_condicion,
                desc_tarifa: desc_tarifa,
                des_unidad: des_unidad,
                fecha: fecha


            },
            success: function(data) {
                if (data.responce == "success") {
                    $('#records').DataTable().destroy();
                    fetch();
                    $('#exampleModal').modal('hide');
                    toastr["success"](data.message);
                } else {
                    toastr["error"](data.message);
                }

            }
        });

        $("#form")[0].reset();

    }

});
// Delete Record

$(document).on("click", "#del", function(e) {
    e.preventDefault();

    var del_id = $(this).attr("value");

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger mr-2'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {

            $.ajax({
                url: "<?php echo base_url(); ?>index.php/Fuentefinanc/deletedolar",
                type: "post",
                dataType: "json",
                data: {
                    id_tarifa: id_tarifa
                },
                success: function(data) {
                    if (data.responce == "success") {
                        $('#records').DataTable().destroy();
                        fetch();
                        swalWithBootstrapButtons.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        );
                    } else {
                        swalWithBootstrapButtons.fire(
                            'Cancelled',
                            'Your imaginary file is safe :)',
                            'error'
                        );
                    }

                }
            });



        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your imaginary file is safe :)',
                'error'
            )
        }
    });

});

// Fetch Records

function fetch() {
    $.ajax({
        url: "<?php echo base_url(); ?>index.php/Tarifa/fetchtarifa",
        type: "post",
        dataType: "json",
        success: function(data) {
            if (data.responce == "success") {

                var i = "1";
                $('#records').DataTable({
                    "data": data.posts,
                    "responsive": true,
                    dom: "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    buttons: [
                        'copy', 'excel', 'pdf'
                    ],
                    "columns": [{
                            "render": function() {
                                return a = i++;
                            }
                        },

                        {
                            "data": "desc_concepto"
                        },
                        {
                            "data": "desc_condicion"
                        },
                        {
                            "data": "desc_tarifa"
                        },
                        {
                            "data": "des_unidad"
                        },
                        {
                            "data": "fecha"
                        },

                        {
                            "render": function(data, type, row, meta) {
                                var a = `
                                
                                <a href="#" value="${row.id_tarifa}" id="edit" class="btn btn-sm btn-outline-success"><i class="fas fa-edit"></i></a>
                            `;
                                return a;
                            }
                        }
                    ]
                });
            } else {
                toastr["error"](data.message);
            }

        }
    });

}

fetch();
// Edit Record
$(document).on("click", "#edit", function(e) {
    e.preventDefault();

    var edit_id_tarifa = $(this).attr("value");


    $.ajax({
        url: "<?php echo base_url(); ?>index.php/Tarifa/edittarifa",
        type: "post",
        dataType: "json",
        data: {
            edit_id_tarifa: edit_id_tarifa
        },
        success: function(data) {
            if (data.responce == "success") {
                $('#edit_modal').modal('show');
                $("#edit_id_tarifa").val(data.post.id_tarifa);
                $("#edit_desc_concepto").val(data.post.desc_concepto);
                $("#edit_desc_condicion").val(data.post.desc_condicion);
                $("#edit_desc_tarifa").val(data.post.desc_tarifa);
                $("#edit_des_unidad").val(data.post.des_unidad);

            } else {
                toastr["error"](data.message);
            }
        }
    });

});

// Update Record
$(document).on("click", "#update", function(e) {
    e.preventDefault();

    var edit_id_tarifa = $("#edit_id_tarifa").val();
    var edit_desc_concepto = $("#edit_desc_concepto").val();
    var edit_desc_condicion = $("#edit_desc_condicion").val();
    var edit_desc_tarifa = $("#edit_desc_tarifa").val();
    var edit_des_unidad = $("#edit_des_unidad").val();
    if (edit_desc_tarifa == "") {
        alert("No se puede Dejar el Campo Vaci aca");
    } else {
        $.ajax({
            url: "<?php echo base_url(); ?>index.php/Tarifa/updatetarifa",
            type: "post",
            dataType: "json",
            data: {
                edit_id_tarifa: edit_id_tarifa,
                edit_desc_concepto: edit_desc_concepto,
                edit_desc_condicion: edit_desc_condicion,
                edit_desc_tarifa: edit_desc_tarifa,
                edit_des_unidad: edit_des_unidad,

            },
            success: function(data) {
                if (data.responce == "success") {
                    $('#records').DataTable().destroy();
                    fetch();
                    $('#edit_modal').modal('hide');
                    toastr["success"](data.message);
                } else {
                    toastr["error"](data.message);
                }
            }
        });

    }

});
</script>