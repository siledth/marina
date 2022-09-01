<div class="sidebar-bg"></div>
<div id="content" class="content">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-1 mb-3">
                <a class="btn btn-circle waves-effect  waves-circle waves-float btn-primary"
                    href="javascript:history.back()"> Volver</a>
            </div>
            <div class="col-1 mb-3">
                <button class="btn btn-circle waves-effect waves-circle waves-float btn-primary" type="submit"
                    onclick="printDiv('areaImprimir');" name="action">Imprimir</button>
            </div> 
        </div>
        <div class="row" id="imp1">
            <div class="panel panel-inverse">
                <div class="panel-body">
                    <div class="row">
                        <div class="form-group col-1">
                            <img style="width: 200%" height="100%" src=" <?= base_url() ?>Plantilla/img/logo.jpeg"
                                alt="Card image">
                        </div>
                        <div class="col-1"></div>
                        <div class="col-10 mt-2">
                            <div class="card card-outline-danger text-center bg-white">
                                <h4 class="mt-2"> <b>Corporación Ormux 2020, CA</b></h4>
                                <h5>RIF.: <?=$rif?></h5>
                                <h5>Fecha Impresión: <?=$time ?> </h5>
                                <h4 class="mt-2"> <b>Recibos Para Embarcaciones Transitoria</b></h4>
                            </div>
                        </div>
                        <div class="form-group col-9">
                            <label>N° Recibo <b title="Campo Obligatorio" style="color:red">*</b></label>
                            <h4><b><?=$factura_ind['nro_factura']?></b> </h4>
                        </div>
                        <div class="form-group col-3">
                            <label>Fecha de la Factura <b title="Campo Obligatorio" style="color:red">*</b></label>
                            <h4><b><?= date("d/m/Y", strtotime($factura_ind['fechaingreso']));?></b> </h4>
                            
                        </div>
                        <?php if ($factura_ind['id_status'] == 1): ?>
                        <div class="form-group col-3">
                            <label>status <b title="Campo Obligatorio" style="color:red">*</b></label>
                            <h2><b><?= $factura_ind['descripcion']?></b> </h2>
                            
                        </div>
                        <?php endif; ?>
                       
                        <div class="col-12">
                            <hr style="border-top: 1px solid rgba(0, 0, 0, 0.39);">
                        </div>
                        <div class="col-12 text-center">
                            <h4 style="color:red;">Propietario y Embarcación</h4>
                        </div>
                        <div class="col-3">
                            <label>Cédula</label>, 
                            <h4><b><?=$factura_ind['cedula']?></b> </h4>
                        </div>
                        <div class="col-3">
                            <label>Nombre y Apellido</label>
                            <h4><b><?=$factura_ind['nombrep']?></b> </h4>
                        </div>
                        <div class="form-group col-2">
                            <label>Telefono <b title="Campo Obligatorio" style="color:red">*</b></label>
                            <h4><b><?=$factura_ind['tele_1']?></b> </h4>
                        </div>
                        <div class="form-group col-4">
                            <label>Embarcación/Matricula <b title="Campo Obligatorio" style="color:red">*</b></label>
                            <h4><b><?=$factura_ind['nombre']?>/</b><b><?=$factura_ind['matricula']?></b> </h4> 
                        </div>
                        
                       
                        <div class="form-group col-3">
                            <label>Dolar BCV <b title="Campo Obligatorio" style="color:red">*</b></label>
                            <h4><b><?=$factura_ind['valor_iva']?></b> </h4>
                        </div>
                        <div class="col-12">
                            <hr style="border-top: 1px solid rgba(0, 0, 0, 0.39);">
                        </div>
                        <div class="col-12 text-center">
                            <h4 style="color:red;">Detalle del Pago</h4>
                        </div>
                        <div class="form-group col-3">
                            <label>Tipo de Pago</label>
                            <h4><b><?=$factura_ind['tipopago']?></b> </h4>
                        </div>
                        <?php if ($factura_ind['tipopago'] <= 2) {?>
                            <div class="form-group col-3">
                                <label>Nro. de Referencia</label>
                                <h4><b><?=$factura_ind['nro_referencia']?></b> </h4>
                            </div>
                            <div class="form-group col-3">
                                <label>Banco</label>
                                <h4><b><?=$factura_ind['banco']?></b> </h4>
                            </div>
                            <div class="form-group col-3">
                                <label>Fecha de Tranferencia</label>
                                <h4><b><?=date("d/m/Y", strtotime($factura_ind['fechatrnas']));?></b> </h4>
                            </div>
                        <?php } ?>

                        <div class="col-12">
                            <hr style="border-top: 1px solid rgba(0, 0, 0, 0.39);">
                        </div>
                        <div class="col-12 text-center">
                            <h4 style="color:red;">Detalle de Factura</h4>
                        </div>
                        <div class="table-responsive">
                            <h5 class="text-center">Lista de Requerimiento</h5>
                            <table id="target_req_acc" class="table table-bordered table-hover">
                                <thead style="background:#e4e7e8;">
                                    <tr class="text-center">
                                        <th>Matricula</th>
                                        <th>Descripción</th>
                                        <th>Cantidad</th>
                                        <th>Tarifa $</th>
                                        
                                        <th>Total $</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($factura_ind_tabla as $lista):?>
                                    <tr class="odd gradeX">
                                        <td><?=$lista['matricula']?></td>
                                        <td><?=$lista['ob']?></td>
                                        <td><?=$lista['dia']?></td>
                                        <td><?=$lista['tarifa']?></td>
                                        <td><?=$lista['canon']?></td>
                                        
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-6"></div>
                        <div class="form-group row col-6">
                            <label class="col-form-label col-md-6 text-right">Total IVA </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control text-center"
                                    value="<?=$factura_ind['total_iva']?>" readonly>
                            </div>
                        </div>
                        <div class="col-6"></div>
                        <div class="form-group row col-6">
                            <label class="col-form-label col-md-6 text-right">Total BS </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control text-center"
                                    value="<?=$factura_ind['total_bs']?>" readonly>
                            </div>
                        </div>
                        <div class="col-6"></div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
function printDiv(nombreDiv) {
    var contenido = document.getElementById('imp1').innerHTML;
    var contenidoOriginal = document.body.innerHTML;

    document.body.innerHTML = contenido;

    window.print();

    document.body.innerHTML = contenidoOriginal;
}
</script>