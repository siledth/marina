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
    <h2> Pagar Deudas Maleteros</h2>
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
                                        <th>#</th>
                                        <th>Nombre del maletero</th>
                                        <th>asignado a </th>
                                        <th>lancha </th>
                                        <th>Monto deuda </th>

                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($asignacion as $data): ?>
                                    <tr class="odd gradeX" style="text-align:center">
                                        <td><?= $data['id_mov_consig'] ?> </td>
                                        <td><?= $data['descripcion'] ?> </td>
                                        <td><?= $data['nombre'] ?> </td>
                                        <td><?= $data['nombre_lancha'] ?> </td>
                                        <td><?= $data['pago'] ?> </td>



                                        <td class="center">
                                            <?php if ($data['id_status'] != 0) : ?>
                                            <a href="<?php echo base_url(); ?>index.php/Pdf_maletero/pdfrt?id=<?php echo $data['id_factura']; ?>"
                                                class="button">
                                                <i class="fas   fa-lg fa-cloud-download-alt" title="Descargar "
                                                    style="color: blue;"></i>
                                                <a />
                                                <?php endif; ?>

                                                <?php if ($data['id_status'] != 2) : ?>
                                                <a onclick="modal1(<?php echo $data['id_mov_consig'] ?>);"
                                                    data-toggle="modal" data-target="#exampleModal"
                                                    style="color: white">
                                                    <i title="Pagar" class="fas fa-lg fa-fw fa-donate"
                                                        style="color: darkgreen;"></i>
                                                </a>
                                                <?php endif; ?>

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
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Registrar Pago</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" id="guardar_proc_pag" name="guardar_proc_pag"
                            data-parsley-validate="true" method="POST" enctype="multipart/form-data">
                            <div class="row">

                                <div class="form-group col-2">
                                    <label>ID - </label>
                                    <input class="form-control" type="text" name="id_mov_consig_ver"
                                        id="id_mov_consig_ver" readonly>
                                </div>
                                <div class="col-4">
                                    <label>Fecha </label>
                                    <input class="form-control" type="text" name="fechapago" id="fechapago"
                                        value="<?= $time ?>" readonly>

                                </div>
                                <div class="col-10"></div>
                                <div class="form-group col-4">
                                    <label>Nombre Maletero</label><br>
                                    <input class="form-control" type="text" name="descripcion" id="descripcion"
                                        readonly>
                                </div>


                                <div class="form-group col-2">
                                    <label>Tarifa</label><br>
                                    <input class="form-control" type="text" name="pago" id="pago" readonly>
                                </div>

                                <div class="form-group col-6" id="usd-info">
                                    <p><strong>Tasa:</strong> <span id="usd-title"></span></p>
                                    <input class="form-control" type="text" name="usd-price" id="usd-price" readonly>

                                    <!-- <p><strong>Precio:</strong> <span id="usd-price"></span></p> -->

                                    <p><strong>Última actualización:</strong> <span id="usd-last-update"></span></p>
                                    <input class="form-control" type="text" name="totalbs" id="totalbs" readonly>
                                </div>
                                <div class="col-3">
                                    <label>Tipo de pago</label>
                                    <select class="form-control" name="id_tipo_pago" id="id_tipo_pago"
                                        onclick="llenar_pago();">
                                        <option value="0">Seleccione</option>
                                        <?php foreach ($tipoPago as $data) : ?>
                                        <option value="<?= $data['id_tipo_pago'] ?>"><?= $data['descripcion'] ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
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
                                    <label>Monto :</label>
                                    <input class="form-control" type="text" name="Monto" id="Monto">
                                </div>
                                <div class="col-4">
                                    <label>Fecha de Tranferencia:</label>
                                    <input class="form-control" type="date" name="fechatrnas" id="fechatrnas">
                                </div>
                            </div>
                            <div class="form-group col-3">
                                <label>Nota</label>
                                <textarea name="nota" id="nota" rows="5" cols="50"></textarea>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="javascript:window.location.reload()" class="btn btn-secondary"
                            data-dismiss="modal">Cerrar</button>
                        <button type="button" id="guardar_pago_fin" onclick="guardar_pago_maletero();"
                            class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </div>