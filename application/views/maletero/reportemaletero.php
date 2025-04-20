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
    <h2>Reporte de Maleteros</h2>
    <div class="row">


        <div class="col-lg-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">Estadísticas de Maleteros</h4>
                </div>
                <div class="table-responsive">
                    <table id="data-tablepdfp" class="table table-bordered table-hover">
                        <thead style="background:#e4e7e8">
                            <tr>
                                <th>Total Maleteros</th>
                                <th>Total Maleteros Asignados</th>
                                <th>Total Maleteros Disponibles</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($totales)): ?>
                                <?php foreach ($totales as $data): ?>
                                    <tr class="odd gradeX" style="text-align:center">
                                        <td><?= $data['totalm'] ?? 0 ?></td>
                                        <td><?= $data['totalasignado'] ?? 0 ?></td>
                                        <td><?= $data['totaldisponible'] ?? 0 ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="3" class="text-center">No hay datos disponibles</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Segunda tabla (estado financiero) -->
        <div class="col-lg-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">Estado Financiero</h4>
                </div>
                <div class="table-responsive">
                    <table id="data-table5" class="table table-bordered table-hover">
                        <thead style="background:#e4e7e8">
                            <tr>
                                <th>Total Deuda Pendiente</th>
                                <th>Total Pagado</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr class="odd gradeX" style="text-align:center">
                                <td class="text-danger"><?= number_format($finanzas['total_deuda'], 2) ?></td>
                                <td class="text-success"><?= number_format($finanzas['total_pagado'], 2) ?></td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Tabla detallada -->
        <div class="col-lg-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">Detalle por Maletero</h4>
                </div>
                <div class="table-responsive">
                    <table id="data-table6" class="table table-bordered table-hover">
                        <thead style="background:#e4e7e8">
                            <tr>
                                <th>Maletero</th>
                                <th>Asignado a:</th>
                                <th>Deuda Pendiente</th>
                                <th>Total Pagado</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($detalles as $item): ?>
                                <tr>
                                    <td><?= $item['maletero'] ?></td>
                                    <td><?= $item['nombre'] ?></td>
                                    <td class="text-danger"><?= number_format($item['deuda'], 2) ?></td>
                                    <td class="text-success"><?= number_format($item['pagado'], 2) ?></td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>