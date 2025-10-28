<div class="sidebar-bg"></div>
<div id="content" class="content">
    <div class="col-lg-12">
        <div class="row">
            <div class="panel panel-inverse">
                <div class="panel-body">

                    <!-- ===================== CABECERA ===================== -->
                    <div class="row">
                        <div class="col-12 card card-outline-danger text-center bg-white">
                            <h4 class="mt-2"><b><?= $descripcion ?></b></h4>
                            <h5>RIF.: <?= $rif ?></h5>
                            <h5>Fecha.: <?= $time ?></h5>
                        </div>
                    </div>

                    <!-- ===================== FILTROS ===================== -->
                    <div class="row mt-4 mb-4">
                        <div class="col-12">
                            <div class="card p-3" style="background:#f7f7f7;">
                                <h5 class="mb-3">Seleccionar Filtros</h5>

                                <?php if (!empty($range_error)): ?>
                                    <div class="alert alert-danger"><?= $range_error ?></div>
                                <?php endif; ?>

                                <form id="form-filtros" method="get"
                                    action="<?= base_url('index.php/Mensualidades/ver_t'); ?>">

                                    <!-- Opción 1: Rango -->
                                    <div class="mb-3">
                                        <h6 class="mb-2"><b>Opción 1:</b> Rango de fecha (máximo 60 días)</h6>
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label for="desde">Desde</label>
                                                <input type="date" class="form-control" id="desde" name="desde"
                                                    value="<?= isset($filters['desde']) ? $filters['desde'] : '' ?>">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="hasta">Hasta</label>
                                                <input type="date" class="form-control" id="hasta" name="hasta"
                                                    value="<?= isset($filters['hasta']) ? $filters['hasta'] : '' ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <!-- Opción 2: Matrícula -->
                                    <div class="mb-3">
                                        <h6 class="mb-2"><b>Opción 2:</b> Selecciona una embarcación</h6>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="matricula">Matrícula</label>
                                                <select id="matricula" name="matricula" class="form-control"
                                                    style="width:100%;"
                                                    data-placeholder="Escribe para buscar una embarcación">
                                                    <option value=""></option>
                                                    <?php foreach ($mat as $m): ?>
                                                        <?php
                                                        $value = isset($m['matricula']) ? $m['matricula'] : '';
                                                        $label = isset($m['nombrebuque']) ? $m['nombrebuque'] . ' — ' . $value : $value;
                                                        $sel   = (isset($filters['matricula']) && $filters['matricula'] === $value) ? 'selected' : '';
                                                        ?>
                                                        <option value="<?= $value ?>" <?= $sel ?>><?= $label ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <small class="text-muted">Este filtro permite elegir <b>una</b>
                                                    embarcación a la vez.</small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-2">
                                        <button type="submit" class="btn btn-primary">Aplicar filtros</button>
                                        <?php if (!empty($filters['desde']) || !empty($filters['hasta']) || !empty($filters['matricula'])): ?>
                                            <a href="<?= base_url('index.php/Mensualidades/ver_t'); ?>"
                                                class="btn btn-default ml-2">Limpiar</a>
                                        <?php endif; ?>
                                    </div>

                                    <small class="text-muted d-block mt-2">
                                        Puedes usar <b>solo</b> el rango de fecha, <b>solo</b> la embarcación, o ambos.
                                    </small>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- ===================== TABLA ===================== -->
                    <?php if ($applied && empty($range_error)): ?>
                        <div class="col-md-12">
                            <div class="panel-body">
                                <div class="col-12 text-center">
                                    <h4>Históricos de Mensualidades Pagadas</h4>
                                </div>

                                <table id="data-tablepdfp" data-order='[[ 0, "desc" ]]'
                                    class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre de la Embarcación</th>
                                            <th>Matrícula</th>
                                            <th>Canon</th>
                                            <th>Fecha Deuda</th>
                                            <th>Estatus</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($ver_deudas as $lista): ?>
                                            <tr class="odd gradeX">
                                                <td><?= $lista['id_mensualidad'] ?></td>
                                                <td><?= $lista['nombrebuque'] ?></td>
                                                <td><?= $lista['matricula'] ?></td>
                                                <td><?= $lista['canon'] ?></td>
                                                <td><?= date("d-m-Y", strtotime($lista['fecha_deuda'])); ?></td>
                                                <td><?= $lista['descripcion'] ?></td>
                                                <td>
                                                    <a class="button"
                                                        href="<?= base_url('index.php/Mensualidades/verPago?id=' . $lista['id_mensualidad']); ?>">
                                                        <i title="Ver Pago" class="fas fa-lg fa-fw fa-eye"
                                                            style="color: midnightblue;"></i>
                                                    </a>

                                                    <?php if (($lista['id_factura'] == 0) && $lista['id_status'] == 2): ?>
                                                        <a class="button"
                                                            href="<?= base_url('index.php/Mensualidades/generar_fac?id=' . $lista['id_mensualidad']); ?>">
                                                            <i title="Generar Factura" class="fas fa-lg fa-fw fa-file-import"
                                                                style="color: crimson;"></i>
                                                        </a>
                                                    <?php endif; ?>

                                                    <?php if (($lista['id_factura'] == 0) && $lista['id_status'] >= 2): ?>
                                                        <a class="button" onclick="eliminar_pago(<?= $lista['id_mensualidad'] ?>);">
                                                            <i title="Eliminar Pago" class="fas fa-lg fa-fw fa-trash"
                                                                style="color: red;"></i>
                                                        </a>
                                                    <?php endif; ?>

                                                    <?php if ($lista['id_factura'] != 0): ?>
                                                        <a class="button"
                                                            href="<?= base_url('index.php/Factura/verFactura?id=' . $lista['id_factura']); ?>">
                                                            <i title="Ver Factura" class="far fa-lg fa-fw fa-file-pdf"
                                                                style="color: brown;"></i>
                                                        </a>
                                                        <a class="button"
                                                            onclick="eliminar_factura('<?= $lista['id_factura'] ?>/<?= $lista['id_mensualidad'] ?>');">
                                                            <i title="Eliminar Factura" class="fas fa-lg fa-fw fa-trash"
                                                                style="color: orange;"></i>
                                                        </a>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="col-12">
                            <div class="alert alert-info text-center mt-3">
                                Aplica un filtro (rango de fechas ≤ 60 días y/o matrícula) para mostrar resultados.
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- (opcional) Select2 CDN si no lo tienes ya en tu layout -->
<!--
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
-->

<!-- Scripts existentes de tu vista -->
<script src="<?= base_url() ?>/js/bien/guardar_fact.js"></script>
<script src="<?= base_url() ?>/js/bien/mensualidad.js"></script>
<script src="<?= base_url() ?>/js/bien/numeroadelanto.js"></script>

<!-- Validación + Select2 + UX -->
<script>
    (function() {
        const form = document.getElementById('form-filtros');
        if (!form) return;

        // Habilitar búsqueda en el select (single) con Select2
        if (window.jQuery && $('#matricula').length) {
            $('#matricula').select2({
                width: 'resolve',
                placeholder: $('#matricula').data('placeholder') || 'Escribe para buscar',
                allowClear: true,
                minimumInputLength: 0
            });
        }

        // Validación de fechas (si se usan): ambas + <= 60 días
        form.addEventListener('submit', function(e) {
            const desde = document.getElementById('desde').value;
            const hasta = document.getElementById('hasta').value;

            if ((desde && !hasta) || (!desde && hasta)) {
                e.preventDefault();
                alert('Si filtra por fechas, debe seleccionar "Desde" y "Hasta".');
                return false;
            }
            if (desde && hasta) {
                const d1 = new Date(desde + 'T00:00:00');
                const d2 = new Date(hasta + 'T00:00:00');
                if (d2 < d1) {
                    e.preventDefault();
                    alert('"Hasta" no puede ser menor que "Desde".');
                    return false;
                }
                const diffDays = Math.floor((d2 - d1) / (1000 * 60 * 60 * 24));
                if (diffDays > 60) {
                    e.preventDefault();
                    alert('El rango de fechas no puede ser mayor a 60 días.');
                    return false;
                }
            }
        });

        // UX opcional: si selecciona matrícula, limpiar fechas
        if (window.jQuery && $('#matricula').length) {
            $('#matricula').on('change', function() {
                if ($(this).val()) {
                    $('#desde').val('');
                    $('#hasta').val('');
                }
            });
        }
        // UX opcional: si escribe fechas, limpiar matrícula
        ['desde', 'hasta'].forEach(id => {
            const el = document.getElementById(id);
            if (!el) return;
            el.addEventListener('change', function() {
                if (document.getElementById('desde').value || document.getElementById('hasta').value) {
                    if (window.jQuery && $('#matricula').length) {
                        $('#matricula').val(null).trigger('change');
                    } else {
                        const sel = document.getElementById('matricula');
                        if (sel) sel.value = '';
                    }
                }
            });
        });
    })();
</script>