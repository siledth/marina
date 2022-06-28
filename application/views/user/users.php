<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">-->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<div class="sidebar-bg"></div>
<div id="content" class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-inverse" data-sortable-id="form-validation-1">
                <div class="panel-heading">


                    <div class="row">
                        <div class="col-md-8 mt-2">


                            <?php if ($this->session->userdata('session')) { ?>
                            <li class="nav-item">
                                <a class="btn btn-light btn-lg" href="<?= base_url() ?>index.php/User/int"><i
                                        class="ion-plus"></i> Registrar Nuevo Usuario</a>
                            </li>
                            <?php } ?>
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
                                        <input type="hidden" id="edit_record_id" name="edit_record_id" value="">
                                        <div class="form-group">
                                            <label for="">Ingrese el nuevo usario</label>
                                            <input type="text" class="form-control" id="edit_nombre">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Ingrese Apellido</label>
                                            <input type="text" class="form-control" id="edit_apellido">
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
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-md-10 mt-4">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="records">
                                <thead style="background:#e4e7e8">
                                    <tr>
                                        <th>N°</th>
                                        <th>Usuario</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Telefono</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

      
        <!-- Add Records -->
        <script>
        // Fetch Records

        function fetch() {
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/User/fetchusuario",
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
                                    "data": "nombre"
                                },
                                {
                                    "data": "apellido"
                                },
                                {
                                    "data": "nombrecom"
                                },
                                {
                                    "data": "tele_1"
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
                title: 'esta seguro',
                text: "no puede revertir !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'si!',
                cancelButtonText: 'No, Cancelar!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {

                    $.ajax({
                        url: "<?php echo base_url(); ?>index.php/User/deletealicuota",
                        type: "post",
                        dataType: "json",
                        data: {
                            del_id: del_id
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

        // Edit Record

        $(document).on("click", "#edit", function(e) {
            e.preventDefault();

            var edit_id = $(this).attr("value");

            $.ajax({
                url: "<?php echo base_url(); ?>index.php/User/editausuario",
                type: "post",
                dataType: "json",
                data: {
                    edit_id: edit_id
                },
                success: function(data) {
                    if (data.responce == "success") {
                        $('#edit_modal').modal('show');
                        $("#edit_record_id").val(data.post.id);
                        $("#edit_nombre").val(data.post.nombre);
                        $("#edit_apellido").val(data.post.apellido);
                    } else {
                        toastr["error"](data.message);
                    }
                }
            });

        });

        // Update Record

        $(document).on("click", "#update", function(e) {
            e.preventDefault();

            var edit_record_id = $("#edit_record_id").val();
            var edit_nombre = $("#edit_nombre").val();
            var edit_apellido = $("#edit_apellido").val();

            if (edit_record_id == "" || edit_nombre == "" || edit_apellido == "") {
                alert("Requerido");
            } else {
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/User/updateusuario",
                    type: "post",
                    dataType: "json",
                    data: {
                        edit_record_id: edit_record_id,
                        edit_nombre: edit_nombre,
                        edit_apellido: edit_apellido
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