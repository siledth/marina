<div class="sidebar-bg"></div>
<div id="content" class="content">
    <div class="col-lg-12">
    <div class="row">
		<div class="col-1 mb-3">
        	<a class="btn btn-circle waves-effect  waves-circle waves-float btn-primary" href="javascript:history.back()"> Volver</a>
      	</div>
		<div class="col-1 mb-3">
	        <button class="btn btn-circle waves-effect waves-circle waves-float btn-primary" type="submit" onclick="printDiv('areaImprimir');" name="action">Imprimir</button>
	    </div>
	</div>
        <div class="row" id="imp1"> 
            <div class="panel panel-inverse">
                <div class="panel-body"> 
                    <div class="row">
                    <div class="form-group col-1">
                            <img style="width: 150%" height="100%" src=" <?= base_url() ?>Plantilla/img/logo.jpeg"
                                alt="Card image">
                        </div>
                        <div class="col-1"></div>
                        <div class="col-10 mt-2">
                            <div class="card card-outline-danger text-center bg-white">
                                <h4 class="mt-2"> <b><?=$descripcion?></b></h4>
                                <h5>RIF.: <?=$rif?></h5>
                                <h5>Fecha Impresión: <?=$time ?> </h5>
                            </div>
                        </div>
                        <div class="form-group col-2">
                            <label>N° Recibo <b title="Campo Obligatorio" style="color:red">*</b></label>
                            <h4><b><?=$factura_ind['nro_factura']?></b> </h4>    
                        </div>
                       <div class="form-group col-6">
                            <label>Fecha del Recibo <b title="Campo Obligatorio" style="color:red">*</b></label>
                            <h4><b><?= date("d/m/Y", strtotime($factura_ind['fechaingreso']));?></b> </h4>
                            
                        </div>
                       
                       
                       

                        <div class="col-10">
                            <hr style="border-top: 1px solid rgba(0, 0, 0, 0.39);">
                        </div>
                        <div class="col-12 text-center">
                            <h4 style="color:red;">Propietario y Embarcación</h4>
                        </div>
                        <div class="col-3">
                            <label>Cédula</label>
                            <h4><b><?=$factura_ind['cedula']?></b> </h4>
                        </div>
                        <div class="col-3">
                            <label>Nombre y Apellido</label>
                            <h4><b><?=$factura_ind['nombrecom']?></b> </h4>
                        </div>
                        <div class="form-group col-2">
                            <label>Telefono <b title="Campo Obligatorio" style="color:red">*</b></label>
                            <h4><b><?=$factura_ind['tele_1']?></b> </h4>
                        </div>
                        <div class="form-group col-4">
                            <label>Matricula de la Embarcación <b title="Campo Obligatorio" style="color:red">*</b></label>
                            <h4><b><?=$factura_ind['nombrebuque']?>/<?=$factura_ind['matricula']?></b> </h4>
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
                            <?php if (($factura_ind['id_banco'] >= 0) && $factura_ind['id_tipo_pago'] <= 2) : ?>
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
                            <?php endif; ?>
                        <?php } ?>

                        <div class="col-12">
                            <hr style="border-top: 1px solid rgba(0, 0, 0, 0.39);">
                        </div>
                        <div class="col-12 text-center">
                            <h4 style="color:red;">Detalle de Recibo</h4>
                        </div>
                        <div class="table-responsive">
                            <h5 class="text-center">Lista de Requerimiento</h5>
                            <table id="target_req_acc" class="table table-bordered table-hover" style="font-size:18px">
                                <thead style="background:#e4e7e8;">
                                    <tr class="text-center">
                               
                                        <th>Descripción</th>
                                        <th>Cantidad</th>
                                        <th>Tarifa $</th>
                                        <th>Total $</th>
                                        <th>Total + iva $</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($factura_ind_tabla as $lista):?>
                                    <tr class="odd gradeX">
                                      
                                        <td><?=$lista['ob']?></td>
                                        <td><?=$lista['dia']?></td>
                                        <td><?=$lista['tarifa']?></td>
                                      
                                        <td><?=$lista['canon']?></td>
                                        <td><?=$lista['monto_estimado']?></td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-6"></div>
                        <div class="form-group row col-6">
                            <label class="col-form-label col-md-6 text-right" >Total IVA $</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control text-center" value="<?=$factura_ind['total_iva']?>" readonly>
                            </div>
                        </div>
                        <div class="col-6"></div>
                        <div class="form-group row col-6">
                            <label class="col-form-label col-md-6 text-right" >Total $</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control text-center" value="<?=$factura_ind['total_mas_iva']?>" readonly>
                            </div>
                        </div>
                        <div class="col-6"></div>
                        <div class="form-group row col-6">
                            <label class="col-form-label col-md-6 text-right" >Total en Bs</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control text-center" value="<?=$factura_ind['total_bs']?>" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function printDiv(nombreDiv){
        var contenido= document.getElementById('imp1').innerHTML;
        var contenidoOriginal= document.body.innerHTML;

        document.body.innerHTML = contenido;

        window.print();

        document.body.innerHTML = contenidoOriginal;
    }
</script>