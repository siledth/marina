<link href="<?= base_url() ?>/css/buque.css?<?= time() ?>" rel="stylesheet" />
<div class="sidebar-bg"></div>
<div id="content" class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-inverse" data-sortable-id="form-validation-1">
                <div class="panel-heading">
                    <h4 class="panel-title">Desincorporar o incorporar una Embarcación</h4>
                </div>
                <div class="row">

                    <!-- Edit Modal -->
                    <div class="modal fade" id="edit_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Incorporar / Desincorporar</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="post" id="update_form">
                                        <input type="hidden" id="edit_id" name="edit_id" value="">
                                        <div class="form-group">
                                            <select class="form-control" id="edit_desincorporar">
                                                <label>Seleccionar</label>
                                                <option>Seleccionar</option>
                                                <option value="0">Desincorporar</option>
                                                <option value="1">Incorporar</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Observación</label>
                                            <input type="text" class="form-control" id="edit_observacion">
                                        </div>

                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-primary" id="update">Desincorporar</button>
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
                                <th>nombrebuque</th>
                                <th>Matricula</th>
                                <th>estatus</th>
                                <th>Observaciónn</th>
                                <th>Fecha de actualizacion de estatus</th>
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
<script src="<?= base_url() ?>/js/cloudflare.js"></script>
<script src="<?= base_url() ?>/js/toastr.js"></script>

<!-- Add Records -->
<script>
    // Delete Record


    // Fetch Records

    function fetch() {
        $.ajax({
            url: "<?php echo base_url(); ?>index.php/Buque/fetchtdesin",
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
                                "data": "nombrebuque"
                            },
                            {
                                "data": "matricula"
                            },
                            {
                                "data": "estado_desincorporacion"
                            },
                            {
                                "data": "observacion"
                            },
                            {
                                "data": "fecha_desincorporacion"
                            },


                            {
                                "render": function(data, type, row, meta) {
                                    var a = `
                                
                                <a href="#" value="${row.id}" id="edit" class="btn btn-sm btn-outline-success"><i class="fas fa-edit"></i></a>
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

        var edit_id = $(this).attr("value");


        $.ajax({
            url: "<?php echo base_url(); ?>index.php/Buque/editdesin",
            type: "post",
            dataType: "json",
            data: {
                edit_id: edit_id
            },
            success: function(data) {
                if (data.responce == "success") {
                    $('#edit_modal').modal('show');
                    $("#edit_id").val(data.post.id);
                    $("#edit_desincorporar").val(data.post.desincorporar);
                    $("#edit_observacion").val(data.post.observacion);

                } else {
                    toastr["error"](data.message);
                }
            }
        });

    });

    // Update Record
    $(document).on("click", "#update", function(e) {
        e.preventDefault();

        var edit_id = $("#edit_id").val();
        var edit_desincorporar = $("#edit_desincorporar").val();
        var edit_observacion = $("#edit_observacion").val();

        if (edit_observacion == "") {
            alert("No se puede Dejar el Campo Vacio");
        } else {
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/Buque/updatedesin",
                type: "post",
                dataType: "json",
                data: {
                    edit_id: edit_id,
                    edit_desincorporar: edit_desincorporar,
                    edit_observacion: edit_observacion,


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