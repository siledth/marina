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
    <h2>Asignación de Maleteros</h2>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-inverse" data-sortable-id="form-validation-1">
                <form class="form-horizontal" id="guardar_ba" data-parsley-validate="true" method="POST"
                    enctype="multipart/form-data">
                    <div class="panel-body">
                        <div class="row">
                            <div class="form-group col-4">
                                <label>Seleccione un Maletero disponible</label><br>
                                <select id="id_maletero" name="id_maletero" class="default-select2 form-control"
                                    style="width: 300px;">
                                    <option value="0">-Seleccione -</option>
                                    <?php foreach ($maleteros as $data): ?>
                                        <option value="<?= $data['id'] ?>">
                                            <?= $data['descripcion'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label>Nombre y apellido<b title="Campo Obligatorio" style="color:red">*</b></label>
                                <input class="form-control" onkeypress="may(this);" type="text" name="nombre"
                                    id="nombre" placeholder="nombre maletero">
                            </div>
                            <div class="form-group col-6">
                                <label>CI / RIF<b title="Campo Obligatorio" style="color:red">*</b></label>
                                <input class="form-control" onkeypress="may(this);" type="text" name="cedrif"
                                    id="cedrif" placeholder="cedula o rif">
                            </div>
                            <div class="form-group col-6">
                                <label>Telefono de contacto<b title="Campo Obligatorio" style="color:red">*</b></label>
                                <input class="form-control" onkeypress="may(this);" type="text" name="tele" id="tele"
                                    placeholder="0414xxxxxx">
                            </div>
                            <div class="form-group col-6">
                                <label>Correo<b title="Campo Obligatorio" style="color:red">*</b></label>
                                <input class="form-control" onkeypress="may(this);" type="text" name="correo"
                                    id="correo" placeholder="correo electronico">
                            </div>
                            <div class="form-group col-6">
                                <label>Nombre de la lancha<b title="Campo Obligatorio" style="color:red">*</b></label>
                                <input class="form-control" onkeypress="may(this);" type="text" name="nombre_lancha"
                                    id="nombre_lancha" placeholder="nombre maletero">
                            </div>
                            <div class="form-group col-4">
                                <label>Tarifa</label><br>
                                <select id="id_tarifa" name="id_tarifa" class="default-select2 form-control"
                                    style="width: 300px;">
                                    <?php foreach ($tarifa as $data): ?>
                                        <option value="<?= $data['id_tarifa'] ?>">
                                            <?= $data['desc_concepto'] ?>/<?= $data['desc_tarifa'] ?>
                                        </option>
                                        <input class="form-control" type="hidden" name="pago" id="pago"
                                            value=" <?= $data['desc_tarifa'] ?>">

                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <!-- <div class="form-group col-4">
                                <label>Registrar pago</label><br>

                                <label>
                                    <input type="checkbox" id="toggleInputs"> Si
                                </label>

                            </div>
                            <div id="inputContainer" class="hidden">
                           
                                <input type="text" placeholder="Input 2">
                            </div> -->
                            <div class="col-6">
                                <label>Tipo de pago</label>
                                <select class="form-control" name="id_tipo_pago" id="id_tipo_pago"
                                    onclick="llenar_pago();">
                                    <option value="0">Seleccione</option>
                                    <?php foreach ($tipoPago as $data) : ?>
                                        <option value="<?= $data['id_tipo_pago'] ?>"><?= $data['descripcion'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>


                            <div class="row" id='campos' style="display: none;">
                                <div class="col-4">
                                    <label>Banco</label>
                                    <select class="form-control" name="id_banco" id="id_banco">
                                        <option value="0">Seleccione</option>
                                        <?php foreach ($banco as $data) : ?>
                                            <option value="<?= $data['id_banco'] ?>"><?= $data['codigo_b'] ?> /
                                                <?= $data['nombre_b'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label>Número de referencia:</label>
                                    <input class="form-control" type="text" name="nro_referencia" id="nro_referencia">
                                </div>
                                <div class="col-4">
                                    <label>Fecha de Tranferencia:</label>
                                    <input class="form-control" type="date" name="fechatrnas" id="fechatrnas">
                                </div>
                            </div>
                            <div class="form-group col-12">
                                <label>Nota</label><br>
                                <textarea name="nota" id="nota" rows="5" cols="100"></textarea>
                            </div>

                        </div>

                        </from>
                        <div class="form-group col 12 text-center">
                            <button type="button" onclick="guardar_mensualidad_maletero();" id="guardar" name="guardar"
                                class="btn btn-primary mb-3">Guardar</button>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="panel panel-inverse">
                            <div class="panel-heading"></div>
                            <div class="table-responsive">
                                <table id="data-tablepdfp" class="table table-bordered table-hover">
                                    <thead style="background:#e4e7e8">
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre del maletero</th>
                                            <th>asignado a </th>
                                            <th>lancha </th>

                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($asignacion as $data): ?>
                                            <tr class="odd gradeX" style="text-align:center">
                                                <td><?= $data['id_asignacion_maletero'] ?> </td>
                                                <td><?= $data['descripcion'] ?> </td>
                                                <td><?= $data['nombre'] ?> </td>
                                                <td><?= $data['nombre_lancha'] ?> </td>


                                                <td class="center">
                                                    <!-- <a href="<?php echo base_url(); ?>index.php/Pdf_maletero/pdfrt?id=<?php echo $lista['id_programacion']; ?>"
                                                    class="button">
                                                    <i class="fas   fa-lg fa-cloud-download-alt" title="Descargar "
                                                        style="color: blue;"></i>
                                                    <a /> -->

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