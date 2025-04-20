<!-- Incluye SweetAlert CSS y JS -->
<style>
.hidden {
    display: none;
}
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="sidebar-bg"></div>
<div id="content" class="content">
    <h2> Pagos realizados Maleteros</h2>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-inverse" data-sortable-id="form-validation-1">


                <div class="col-lg-12">
                    <div class="panel panel-inverse">
                        <div class="panel-heading"></div>
                        <div class="table-responsive">
                            <table id="data-tablepdfp" class="table table-bordered table-hover">
                                <thead style="background:#e4e7e8">
                                    <tr>

                                        <th>Nombre del maletero</th>
                                        <th>asignado a </th>
                                        <th>lancha </th>

                                        <th>Descargar recibo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($asignacion as $data): ?>
                                    <tr class="odd gradeX" style="text-align:center">

                                        <td><?= $data['descripcion'] ?> </td>
                                        <td><?= $data['nombre'] ?> </td>
                                        <td><?= $data['nombre_lancha'] ?> </td>


                                        <td class="center">
                                            <a href="<?php echo base_url(); ?>index.php/Pdf_maletero/pdfrt?id=<?php echo $data['id_factura']; ?>"
                                                class="button">
                                                <i class="fas   fa-lg fa-cloud-download-alt" title="Descargar "
                                                    style="color: blue;"></i>
                                                <a />

                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="<?= base_url() ?>/js/maletero.js"></script>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar maleteros</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" data-sortable-id="form-validation-1">
                        <form class="form-horizontal" id="editar" data-parsley-validate="true" method="POST"
                            enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group col-4">
                                    <label>ID</label>
                                    <input class="form-control" type="text" name="id" id="id" readonly>
                                </div>
                                <div class="col-8"></div>

                                <div class="form-group col-8">
                                    <label>Nombre del maletero </label>
                                    <input type="text" class="form-control" onkeypress="may(this);"
                                        id="nombre_maletero_edit" name="nombre_maletero_edit">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="javascript:window.location.reload()" class="btn btn-secondary"
                            data-dismiss="modal">Cerrar</button>
                        <button type="button" onclick="editar_b();" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- <script>
        const checkbox = document.getElementById('toggleInputs');
        const inputContainer = document.getElementById('inputContainer');

        checkbox.addEventListener('change', function() {
            if (this.checked) {
                inputContainer.classList.remove('hidden');
            } else {
                inputContainer.classList.add('hidden');
            }
        });
        </script> -->