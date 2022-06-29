<link href="<?= base_url() ?>/css/buque.css?<?= time() ?>" rel="stylesheet" />
<div class="sidebar-bg"></div>
<div id="content" class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-inverse" data-sortable-id="form-validation-1">
                <div class="panel-heading">
                    <h4 class="panel-title">Tipo de Cliente</h4>
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
                                                <label for="">Tipo Cliente</label>
                                                <input type="text" class="form-control" id="desc_tipocliente"
                                                    placeholder="Tipo Cliente">
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
                                        <input type="hidden" id="edit_id_tipocliente"  value="">
                                        <div class="form-group">
                                            <label for="">Tipo Cliente</label>
                                            <input type="text" class="form-control" id="edit_desc_tipocliente">
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
                <div class="col-10 mt-3">
                    <table id="records" class="table table-bordered table-hover">
                        <thead style="background:#e4e7e8">
                            <tr class="text-center">
                                <th>Número de fila</th>
                                <th>Descripción</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div><script src="<?=base_url()?>/js/cloudflare.js"></script>
<script src="<?=base_url()?>/js/toastr.js"></script>

<!-- Add Records -->
<script>
$(document).on("click", "#add", function(e) {
    e.preventDefault();
    var desc_tipocliente = $("#desc_tipocliente").val();
  // alert(descripcion );
    if (desc_tipocliente == "") {
        alert("El campo NO puede estar vacio.");
    } else {
        $.ajax({
            url: "<?php echo base_url(); ?>index.php/Fuentefinanc/saveedocivil",
            type: "post",
            dataType: "json",
            data: {
                
                desc_tipocliente: desc_tipocliente


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

// Fetch Records

function fetch() {
    $.ajax({
        url: "<?php echo base_url(); ?>index.php/Fuentefinanc/fetcheedocivil",
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
                            "data": "desc_tipocliente"
                        },

                        {
                            "render": function(data, type, row, meta) {
                                var a = `

                                    <a href="#" value="${row.id_tipocliente}" id="edit" class="btn btn-sm btn-outline-success"><i class="fas fa-edit"></i></a>
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

    var edit_id_tipocliente = $(this).attr("value");

    $.ajax({
        url: "<?php echo base_url(); ?>index.php/Fuentefinanc/editedocivil",
        type: "post",
        dataType: "json",
        data: {
            edit_id_tipocliente: edit_id_tipocliente
        },
        success: function(data) {
            if (data.responce == "success") {
                $('#edit_modal').modal('show');
                $("#edit_id_tipocliente").val(data.post.id_tipocliente);
                $("#edit_desc_tipocliente").val(data.post.desc_tipocliente);

            } else {
                toastr["error"](data.message);
            }
        }
    });

});

// Update Record
$(document).on("click", "#update", function(e) {
                e.preventDefault();

                var edit_id_tipocliente = $("#edit_id_tipocliente").val();
                var edit_desc_tipocliente = $("#edit_desc_tipocliente").val();
                if (edit_id_tipocliente == "" || edit_desc_tipocliente == "") {
                    alert("No se puede Dejar el Campo Vacio, REQUERIDO");
                } else {
                    $.ajax({
                        url: "<?php echo base_url(); ?>index.php/Fuentefinanc/updateedocivil",
                        type: "post",
                        dataType: "json",
                        data: {
                            edit_id_tipocliente: edit_id_tipocliente,
                            edit_desc_tipocliente: edit_desc_tipocliente,
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
