<div class="sidebar-bg"></div>
<div id="content" class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-inverse">
                <div class="row" id="imp1">
                    <div class="col-1"></div>
                    <div class="col-10 mt-4">
                        <div class="card card-outline-danger text-center bg-white">
                            <div class="card-block">
                                <blockquote class="card-blockquote" style="margin-bottom: -19px;">
                                    <p class="f-s-18 text-inverse f-w-600"> <?=$descripcion?>.</p>
                                    <p class="f-s-16">RIF.: <?=$rif?> <br>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row col-4">
                        <label class="col-md-4 col-form-label">Tipo de Pago</label>
                        <div class="col-md-7">
                            <select class="form-control" name="t_pago" id="t_pago">
                                <?php foreach ($tp_pagos as $tp_pago) : ?>
                                    <option value="<?= $tp_pago['id_tipo_pago'] ?>"><?= $tp_pago['descripcion'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Rango de Fecha</label>
                        <div class="col-md-8">
                            <div class="input-group input-daterange">
                                <input type="text" class="form-control" id="start" name="start" placeholder="Fecha desde" />
                                <span class="input-group-addon">a</span>
                                <input type="text" class="form-control" id="end" name="end" placeholder="Fecha hasta" />
                            </div>
                        </div>
                    </div>
                    <div class="col-1">
                        <a
                        onclick="buscar_total();" class="btn btn-success btn-icon btn-circle btn-lg">
                            <i style="color: white" class="mt-2 fas fa-search"></i>
                        </a>
                    </div>
                    <div class="col-12">
                        	<table id="data-table-default" class="table table-striped table-bordered">
								<thead>
									<tr class="text-center">
										<th>ID</th>
                                        <th>Matrícula</th>
                                        <th>Pies</th>
                                        <th>Canon</th>
                                        <th>Tipo de Pago</th>
										<th>Fecha</th>
										<th>Abonado en Bs.D</th>
									</tr>
								</thead>
								<tbody class="text-center" id="pruebaa">
								</tbody>
							</table>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url() ?>/js/bien/reporte.js"></script>