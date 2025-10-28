<style>
    .table-danger {
        background: #f8d7da !important;
    }

    .table-warning {
        background: #fff3cd !important;
    }
</style>
<div class="sidebar-bg"></div>
<div id="content" class="content">
    <div class="row">
        <div class="col-lg-12" id="imp1">
            <div class="panel panel-inverse">
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-10 mt-4">
                        <div class="card card-outline-danger text-center bg-white">
                            <div class="card-block">
                                <blockquote class="card-blockquote" style="margin-bottom: -19px;">
                                    <p class="f-s-18 text-inverse f-w-600"> <?= $descripcion ?>.</p>
                                    <p class="f-s-16">RIF.: <?= $rif ?> <br>


                                </blockquote>
                            </div>
                        </div>
                        <div class="col 12 text-center">
                            <button class="btn btn-default mt-1 mb-1" type="button" id="print"
                                onclick="printContent('imp1');">Imprimir </button>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <div class="row">
                            <div class="col-4">
                                <button onclick="location.href='<?php echo base_url() ?>index.php/Buque/agregar'"
                                    type="button" class="btn btn-lg btn-default" name="button">
                                    Generar Planilla
                                </button>
                            </div>
                        </div>

                        <br>

                    </div>

                    <div class="col-1"></div>
                    <div class="col-10 mt-3">
                        <h3 class="text-center">Tabla Referente a Planillas Generadas</h3>
                        <table id="data-table-default" class="table table-bordered table-hover">
                            <thead style="background:#e4e7e8">
                                <tr class="text-center">
                                    <th>Embarcación</th>
                                    <th>Placa de la Embarcación</th>
                                    <th>Ubicación</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $hoy = $hoy ?? date('Y-m-d');
                                $limite = date('Y-m-d', strtotime($hoy . ' +5 day'));
                                foreach ($ver_proyectos as $ver_proyecto):
                                    $vto = $ver_proyecto['vencimiento'];
                                    $tr_class = '';

                                    if (empty($vto)) {
                                        $tr_class = 'table-danger';                 // sin fecha -> rojo
                                    } else {
                                        if ($vto < $hoy) {
                                            $tr_class = 'table-danger';             // vencida -> rojo
                                        } elseif ($vto <= $limite) {
                                            $tr_class = 'table-warning';            // por vencer (<=5 días) -> amarillo
                                        }
                                    }
                                ?>
                                    <tr class="odd gradeX text-center <?= $tr_class ?>">
                                        <td><?= $ver_proyecto['nombrebuque'] ?></td>
                                        <td><?= $ver_proyecto['matricula'] ?></td>
                                        <td><?= $ver_proyecto['descripcion'] ?></td>
                                        <td class="center">
                                            <!-- tus botones -->
                                            <a href="javascript:void(0)" class="button btn-edit-buque"
                                                data-id="<?= (int)$ver_proyecto['id'] ?>" title="Editar">
                                                <i class="fas fa-lg fa-fw  fa-edit"></i>
                                            </a>
                                            <a href="<?php echo base_url(); ?>index.php/programacion/ver_programacion_proy?id=<?php echo $ver_proyecto['matricula']; ?>"
                                                class="button">
                                                <i class="fas fa-lg fa-fw fa-eye" style="color: green;"></i>
                                                <a />
                                                <a href="<?php echo base_url(); ?>index.php/programacion/ver_programacion_planilla?id=<?php echo $ver_proyecto['matricula']; ?>"
                                                    class="button">
                                                    <i class='fas fa-align-justify'> </i>
                                                    <a />
                                                    <a href="<?php echo base_url(); ?>index.php/buque/editar_proy?id=<?php echo $ver_proyecto['id']; ?>/<?php echo $ver_proyecto['matricula']; ?>"
                                                        class="button">
                                                        <i class="fas fa-lg fa-fw  fa-edit"></i>
                                                        <a />

                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <hr style=" border-top: 1px solid rgba(0, 0, 0, 0.17);">
                    <div class="col-1"></div>
                    <div class="col-1"></div>

                    <div class="col-12 text-center mt-3 mb-3">
                        <a class="btn btn-circle waves-effect btn-lg waves-circle waves-float btn-primary"
                            href="javascript:history.back()"> Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MODAL EDITAR BUQUE -->
<div class="modal fade" id="modalEditarBuque" tabindex="-1" role="dialog" aria-labelledby="labelEditarBuque"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#f5f1ff">
                <h5 class="modal-title" id="labelEditarBuque">Editar Embarcación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="formEditarBuque" onsubmit="return false;">
                <div class="modal-body">
                    <input type="hidden" name="id" id="eb_id">

                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Nombre del buque *</label>
                            <input type="text" class="form-control" name="nombrebuque" id="eb_nombre" readonly required>
                        </div>

                        <div class="form-group col-md-4">
                            <label>Matrícula</label>
                            <input type="text" class="form-control" name="matricula" id="eb_matricula" readonly>
                        </div>

                        <div class="form-group col-md-4">
                            <label>Trailer</label>
                            <select class="form-control" name="trailer" id="eb_trailer">
                                <option value="">Seleccione</option>
                                <option value="Si">Si</option>
                                <option value="No">No</option>
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label>Pies *</label>
                            <input type="number" min="1" class="form-control" name="pies" id="eb_pies" required>
                        </div>

                        <div class="form-group col-md-3">
                            <label>Tipo de barco</label>
                            <select class="form-control" name="tipo" id="eb_tipo">
                                <option value="">Seleccione</option>
                                <?php foreach ($tipos as $t): ?>
                                    <option value="<?= htmlspecialchars($t['desc_tipobarco']) ?>">
                                        <?= htmlspecialchars($t['desc_tipobarco']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label>Color</label>
                            <input type="text" class="form-control" name="color" id="eb_color">
                        </div>

                        <div class="form-group col-md-3">
                            <label>Eslora</label>
                            <input type="text" class="form-control" name="eslora" id="eb_eslora">
                        </div>

                        <div class="form-group col-md-3">
                            <label>Manga</label>
                            <input type="text" class="form-control" name="manga" id="eb_manga">
                        </div>

                        <div class="form-group col-md-3">
                            <label>Puntal</label>
                            <input type="text" class="form-control" name="puntal" id="eb_puntal">
                        </div>

                        <div class="form-group col-md-3">
                            <label>Bruto</label>
                            <input type="text" class="form-control" name="bruto" id="eb_bruto">
                        </div>

                        <div class="form-group col-md-3">
                            <label>Neto</label>
                            <input type="text" class="form-control" name="neto" id="eb_neto">
                        </div>

                        <div class="form-group col-md-3">
                            <label>Ubicación</label>
                            <select class="form-control" name="ubicacion" id="eb_ubicacion">
                                <option value="">Seleccione</option>
                                <?php foreach ($ubicaciones as $u): ?>
                                    <option value="<?= (int)$u['id'] ?>"
                                        data-maximo="<?= htmlspecialchars($u['maximo']) ?>">
                                        <?= htmlspecialchars($u['descripcion']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <small id="ubicacion_hint" class="text-muted"></small>
                        </div>





                        <div class="form-group col-md-6">
                            <label>Fecha de Vencimiento de la licencia</label>
                            <input type="date" class="form-control" name="vencimiento" id="eb_vencimiento">
                        </div>


                        <div class="form-group col-md-4">
                            <label>Tarifa vigente *</label>
                            <select class="form-control" name="id_tarifa" id="eb_id_tarifa" required>
                                <option value="">Seleccione</option>
                                <?php foreach ($tarifas as $tf): ?>
                                    <option value="<?= (int)$tf['id_tarifa'] ?>"
                                        data-valor="<?= htmlspecialchars($tf['desc_tarifa']) ?>">
                                        <?= htmlspecialchars($tf['desc_concepto']) ?> -
                                        <?= htmlspecialchars($tf['desc_condicion']) ?>
                                        (<?= htmlspecialchars($tf['desc_tarifa']) ?> por
                                        <?= htmlspecialchars($tf['des_unidad']) ?>)
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label>Valor tarifa (guardado)</label>
                            <input type="text" class="form-control" id="eb_tarifa_valor" readonly>
                        </div>

                        <div class="form-group col-md-4">
                            <label>Canon (pies × tarifa)</label>
                            <input type="text" class="form-control" id="eb_canon" readonly>
                        </div>







                    </div>
                </div>

                <div class="modal-footer" style="background:#f5f1ff">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" id="btnGuardarBuque">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /MODAL -->

<script>
    const BASE_URL = '<?= base_url() ?>';
</script>
<script src="<?= base_url() ?>/js/editar_buque.js"></script>

<script type="text/javascript">
    function valideKey(evt) {
        var code = (evt.which) ? evt.which : evt.keyCode;
        if (code == 8) { // backspace.
            return true;
        } else if (code >= 48 && code <= 57) { // is a number.
            return true;
        } else { // other keys.
            return false;
        }
    }
</script>
<script>
    function printContent(imp1) {
        var restorepage = $('body').html();
        var printcontent = $('#' + imp1).clone();
        $('body').empty().html(printcontent);
        window.print();
        $('body').html(restorepage);
    }
</script>