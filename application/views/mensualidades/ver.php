<div class="sidebar-bg"></div>
<div id="content" class="content">
    <div class="col-lg-12">
        <div class="row">
            <div class="panel panel-inverse">
                <div class="panel-body"> 
                    <form id="reg_bien" method="POST" class="form-horizontal">
                        <div class="row">
                            <div class="col-12 card card-outline-danger text-center bg-white">
                                <h4 class="mt-2"> <b><?=$descripcion?></b></h4>
                                <h5>RIF.: <?=$rif?></h5>
                                <h5>Fecha.: <?=$time ?> </h5>
                            </div>
                            <div class="col-md-12" >
                                <div class="panel-body">
                                    <div class="col-12 text-center"> <h4>Mensualidades de acuerdo al día</h4> </div>
                                   
                                    <table id="data-table-default" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th width="1%"></th>
                                                <th class="text-nowrap">Nombre del Buque</th>
                                                <th class="text-nowrap">Embarcación/Matricula</th>
                                                <th class="text-nowrap">canon</th>
                                                <th class="text-nowrap">Fecha Deuda</th>
                                                <th class="text-nowrap">Estatus</th>
                                                <th class="text-nowrap">Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($ver_deudas as $lista):?>
                                                <tr class="odd gradeX">
                                                    <td><?=$lista['id_mensualidad']?></td>
                                                    <td><?=$lista['nombrebuque']?></td>
                                                    <td><?=$lista['matricula']?></td>
                                                    <td><?=$lista['canon']?></td>
                                                    <td><?=$lista['fecha_deuda']?></td>
                                                    <td><?=$lista['descripcion']?></td>
                                                    <td>
                                                    <?php if ($lista['id_factura'] != 0): ?>
                                                        <a class="button" href="<?php echo base_url() ?>index.php/Factura/verFactura?id=<?php echo $lista['id_factura'];?>" >
                                                            <i title="Ver" class="fas fa-lg fa-fw fa-eye" style="color: #00d41a;"></i>
                                                        <a/>
                                                        <?php endif; ?>

                                                        <a onclick="modal(<?php echo $lista['id_mensualidad']?>);" data-toggle="modal" data-target="#exampleModal" style="color: white" class="btn btn-success btn-circle waves-effect waves-circle waves-float">
                                                            Pagar
                                                        </a>
                                                    </td>
                                                </tr>
                                                
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?=base_url()?>/js/bien/guardar_fact.js"></script>
<script src="<?=base_url()?>/js/bien/mensualidad.js"></script>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar Pago</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="guardar_proc_pag" data-parsley-validate="true" method="POST" enctype="multipart/form-data">
					<div class="row">
						<div class="form-group col-2">
							<label>ID Registro de Factura</label>
							<input class="form-control" type="text" name="id_reg_factura_ver" id="id_reg_factura_ver" readonly>
						</div>
						<div class="col-10"></div>
						<div class="form-group col-4">
							<label>Matricula</label>
							<input class="form-control" type="text" name="matricula" id="matricula" readonly>
						</div>
						<div class="form-group col-2">
							<label>Pies</label>
							<input class="form-control" type="text" name="pies" id="pies" readonly>
						</div>
                        <div class="form-group col-2">
							<label>Días</label>
							<input class="form-control" type="text" name="dias" id="dias" readonly>
						</div>
						<div class="form-group col-2">
							<label>Tarifa</label>
							<input class="form-control" type="text" name="tarifa" id="tarifa" readonly>
						</div>
                        <div class="form-group col-2">
							<label>Canon</label>
							<input class="form-control" type="text" name="canon" id="canon" readonly>
						</div>
						<div class="form-group col-2">
							<label>Valor:</label>
							<input class="form-control" type="hidden" name="id_moneda_ver" id="id_moneda_ver" readonly>
							<input class="form-control" type="text" name="valor_2" id="valor_2" readonly>
						</div>
						<div class="col-4">
                            <label>Tipo de pago</label>
                            <select class="form-control" name="id_tipo_pago" id="id_tipo_pago" onclick="llenar_pago();">
                                <option value="1">A deuda</option>
                                <option value="2">Transferencia</option>
                                <option value="3">Pago Móvil</option>
                                <option value="4">Efectivo</option>
                                <option value="5">Efectivo en Otra Moneda</option>
                            </select>
                        </div>
						<div class="form-group col-4">
							<label>Cantidad a pagar Bs. F</label>
							<input class="form-control" type="text" id="cantidad_pagar_bs" name="cantidad_pagar_bs" onblur="calcular_bol();" onkeypress="return valideKey(event);">
						</div>
						<div class="form-group col-4">
							<label>Cantidad a pagar Otra Moneda</label>
							<input class="form-control" type="text" id="cantidad_pagar_otra" name="cantidad_pagar_otra" onblur="calcular_dol();" onkeypress="return valideKey(event);">
						</div>
						<div class="col-4">
                            <label>Número de referencia:</label>
                            <input class="form-control" type="text" name="nro_referencia" id="nro_referencia" readonly>
                        </div>
						<div class="form-group col-4">
							<label>Cantidad restante Bs. F</label>
							<input class="form-control" type="text" id="total_bs_pag" name="total_bs_pag" readonly>
						</div>
						<div class="form-group col-4">
							<label>Cantidad restante Otra Moneda</label>
							<input class="form-control" type="text" id="total_otra" name="total_otra" readonly>
						</div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="javascript:window.location.reload()" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" onclick="guardar_proc_pago();" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>