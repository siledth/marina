<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<div class="sidebar-bg"></div>
<div id="content" class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-inverse" data-sortable-id="form-validation-1">
                <div class="panel-heading">


                    <div class="row">
                        <div class="col-md-8 mt-2">

                        <label for="">Modificar Propietarios</label>
                            
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
                                        <input type="hidden" id="edit_cedula" name="edit_cedula" value="">
                                        <div class="form-group">
                                            <label for="">Ingrese Nombre</label>
                                            <input type="text" class="form-control" id="edit_nombrecom">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Ingrese telefono</label>
                                            <input type="text" class="form-control" id="edit_tele_1">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Correo</label>
                                            <input type="text" class="form-control" id="edit_email">
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
                                        <th>Cedula</th>
                                        <th>Nombre</th>
                                        <th>Telefono</th>
                                        <th>Correo</th>
                                        <th>Tipo</th>
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
                url: "<?php echo base_url(); ?>index.php/User/fetchverpropie",
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
                                    "data": "cedula"
                                },
                                {
                                    "data": "nombrecom"
                                },
                               
                                {
                                    "data": "tele_1"
                                },
                                {
                                    "data": "email"
                                },
                                {
                                    "data": "tipo"
                                },
                                {
                                    "render": function(data, type, row, meta) {
                                        var a = `

                                    <a href="#" value="${row.cedula}" id="edit" class="btn btn-sm btn-outline-success"><i class="fas fa-edit"></i></a>
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

            var edit_cedula = $(this).attr("value");

            $.ajax({
                url: "<?php echo base_url(); ?>index.php/User/editverpropie",
                type: "post",
                dataType: "json",
                data: {
                    edit_cedula: edit_cedula
                },
                success: function(data) {
                    if (data.responce == "success") {
                        $('#edit_modal').modal('show');
                        $("#edit_cedula").val(data.post.cedula);
                        $("#edit_nombrecom").val(data.post.nombrecom);
                        $("#edit_tele_1").val(data.post.tele_1);
                        $("#edit_email").val(data.post.email);
                    } else {
                        toastr["error"](data.message);
                    }
                }
            });

        });

        // Update Record

        $(document).on("click", "#update", function(e) {
            e.preventDefault();

            var edit_cedula = $("#edit_cedula").val();
            var edit_nombrecom = $("#edit_nombrecom").val();
            var edit_tele_1 = $("#edit_tele_1").val();
            var edit_email = $("#edit_email").val();

            if (edit_cedula == "" || edit_nombrecom == "" || edit_tele_1 == "") {
                alert("Requerido");
            } else {
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/User/updateverpropie",
                    type: "post",
                    dataType: "json",
                    data: {
                        edit_cedula: edit_cedula,
                        edit_nombrecom: edit_nombrecom,
                        edit_tele_1: edit_tele_1,
                        edit_email: edit_email
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