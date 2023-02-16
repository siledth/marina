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
                            <img style="width: 150%" height="100%" src=" <?= base_url() ?>Plantilla/img/logo.jpeg"
                                alt="Card image">
                        </div>
                        <div class="col-1"></div>
                        <div class="col-10 mt-2">
                            <div class="card card-outline-danger text-center bg-white">
                                <h4 class="mt-2"> <b><?=$descripcion?></b></h4>
                                <h4>RIF.: <?=$rif?></h4>
                                <h4>Fecha Impresión: <?=$time ?> </h4>
                            </div>
                        </div>
                        <div class="form-group col-10 mt-4">
                           <h4 class="text-center"> <b>Pago de Mensualidad</b></h4> 
                        </div>
                        <div class="form-group col-4">
                            <label><h5> N° Recibo <b title="Campo Obligatorio" style="color:red">* </h5></b></label>
                            <h5><b>M<?=$inf_buque['nro_factura']?></b> </h5>
                        </div>
                        <div class="form-group col-2" style="font-size:20px">
                            <label>Estatus<b title="Campo Obligatorio" style="color:red">*</b></label>
                            <h5><b><?=$inf_buque['estatus']?></b> </h5>
                        </div>
                        <?php if ($inf_buque['id_status'] == 2)  : ?>
                        <div class="form-group col-2" style="font-size:20px">
                            <label>Fecha de pago<b title="Campo Obligatorio" style="color:red">*</b></label>
                            <h5><b><?=date("d-m-Y", strtotime($inf_buque['fechapago']));?></b> </h5>
                        </div>
                        <?php endif; ?>
                        <div class="form-group col-10 mt-4">
                           <h5 class="text-center"> <b> Pago de Arrendamiento de Mes</b></h5> 
                        </div>
                        <div class="form-group col-2" style="font-size:20px">
                            <label>Fecha<b title="Campo Obligatorio" style="color:red">*</b></label>
                            <h5><b><?=date("d-m-Y", strtotime($inf_buque['fecha_deuda']));?></b> </h5>
                        </div>
                        <div class="col-12">
                            <hr style="border-top: 1px solid rgba(0, 0, 0, 0.39);">
                        </div>
                        <div class="col-12 text-center">
                            <h5 style="color:red;">Propietario y Embarcación</h5>
                        </div>
                        <div class="col-3" style="font-size:20px">
                            <label>Cédula</label>
                            <h5><b><?=$inf_buque['cedula']?></b> </h5>
                        </div>
                        <div class="col-3" style="font-size:20px">
                            <label>Nombre y Apellido</label>
                            <h5><b><?=$inf_buque['nombrecom']?></b> </h5>
                        </div>
                        <div class="form-group col-2" style="font-size:20px">
                            <label>Telefono</label>
                            <h5><b><?=$inf_buque['tele_1']?></b> </h5>
                        </div>
                        <div class="form-group col-4" style="font-size:20px">
                            <label>Embarcación/Matricula</label>
                            <h5><b><?=$inf_buque['nombrebuque']?>/<?=$inf_buque['matricula']?></b> </h5>
                        </div>
                        <div class="col-4"></div>
                        <div class="form-group col-2" style="font-size:20px">
                            <label>Pies</label>
                            <h5><b><?=$inf_buque['pies']?></b> </h5>
                        </div>
                        
                        <div class="form-group col-2" style="font-size:20px">
                            <label>Tarifa $</label>
                            <h5><b><?=$inf_buque['tarifa']?>$</b> </h5>
                        </div>
                        <div class="form-group col-2" style="font-size:20px">
                            <label>Canon $</label>
                            <h5><b><?=$inf_buque['canon']?>$</b> </h5>
                        </div>
                        <div class="form-group col-10 mt-4" style="font-size:20px">
                            <label>Nota</label><b title=""
                                        style="color:red">  * </b>
                            <h5><b><?=$inf_buque['nota']?></b> </h5>
                        </div>
                        

                        <div class="col-12">
                            <hr style="border-top: 1px solid rgba(0, 0, 0, 0.39);">
                        </div>
                        <div class="col-12 text-center">
                            <h5 style="color:red;">Descripcion del Pago</h5>
                        </div>
                        <div class="col-12 mt-2">
                            <table id="data-table" class="table table-striped table-bordered" style="font-size:15px" >
                                <thead>
                                    <tr>    
                                        <th>Forma de pago</th>
                                        <th>Nro. Referencia</th>
                                        <th>Total Abonado $</th>
                                        <th>Total Abonado Bs.f</th>
                                        <th>Restante $</th>
                                        <th>Restante Bs.f</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($inf_pago as $lista):?>
                                        <tr class="odd gradeX">
                                            <td><?=$lista['descripcion']?></td>
                                            <td><?=$lista['nro_referencia']?></td>
                                            <td><?=$lista['total_abonado_om']?></td>
                                            <td><?=$lista['total_abonado_bs']?></td>
                                            <td><?=$lista['restante_om']?></td>
                                            <td><?=$lista['restante_bs']?> </td>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
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