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
                                <h3 class="mt-2"> <b><?=$descripcion?></b></h3>
                                <h3>RIF.: <?=$rif?></h3>
                                <h3>Fecha Impresión: <?=$time ?> </h3>
                            </div>
                        </div>
                        <div class="form-group col-10 mt-4">
                           <h2 class="text-center"> <b>Pago de Mensualidad</b></h2> 
                        </div>
                        <div class="form-group col-6">
                            <label><h3 > N° Recibo <b title="Campo Obligatorio" style="color:red">* </h3></b></label>
                            <h3><b>M<?=$inf_buque['nro_factura']?></b> </h3>
                        </div>
                        <div class="form-group col-2" style="font-size:20px">
                            <label>Estatus<b title="Campo Obligatorio" style="color:red">*</b></label>
                            <h3><b><?=$inf_buque['estatus']?></b> </h3>
                        </div>
                        <div class="form-group col-10 mt-4">
                           <h3 class="text-center"> <b> Pago de Arrendamiento de Mes</b></h3> 
                        </div>
                        <div class="form-group col-2" style="font-size:20px">
                            <label>Fecha<b title="Campo Obligatorio" style="color:red">*</b></label>
                            <h3><b><?=date("d-m-Y", strtotime($inf_buque['fecha_deuda']));?></b> </h3>
                        </div>
                        <div class="col-12">
                            <hr style="border-top: 1px solid rgba(0, 0, 0, 0.39);">
                        </div>
                        <div class="col-12 text-center">
                            <h3 style="color:red;">Propietario y Embarcación</h3>
                        </div>
                        <div class="col-3" style="font-size:20px">
                            <label>Cédula</label>
                            <h3><b><?=$inf_buque['cedula']?></b> </h3>
                        </div>
                        <div class="col-3" style="font-size:20px">
                            <label>Nombre y Apellido</label>
                            <h3><b><?=$inf_buque['nombrecom']?></b> </h3>
                        </div>
                        <div class="form-group col-2" style="font-size:20px">
                            <label>Telefono</label>
                            <h3><b><?=$inf_buque['tele_1']?></b> </h3>
                        </div>
                        <div class="form-group col-4" style="font-size:20px">
                            <label>Embarcación/Matricula</label>
                            <h3><b><?=$inf_buque['nombrebuque']?>/<?=$inf_buque['matricula']?></b> </h3>
                        </div>
                        <div class="col-4"></div>
                        <div class="form-group col-2" style="font-size:20px">
                            <label>Pies</label>
                            <h3><b><?=$inf_buque['pies']?></b> </h3>
                        </div>
                        
                        <div class="form-group col-2" style="font-size:20px">
                            <label>Tarifa $</label>
                            <h3><b><?=$inf_buque['tarifa']?>$</b> </h3>
                        </div>
                        <div class="form-group col-2" style="font-size:20px">
                            <label>Canon $</label>
                            <h3><b><?=$inf_buque['canon']?>$</b> </h3>
                        </div>
                        <div class="form-group col-10 mt-4" style="font-size:20px">
                            <label>Nota</label><b title=""
                                        style="color:red">  * </b>
                            <h3><b><?=$inf_buque['nota']?></b> </h3>
                        </div>
                        

                        <div class="col-12">
                            <hr style="border-top: 1px solid rgba(0, 0, 0, 0.39);">
                        </div>
                        <div class="col-12 text-center">
                            <h3 style="color:red;">Descripcion del Pago</h3>
                        </div>
                        <div class="col-12 mt-2">
                            <table id="data-table" class="table table-striped table-bordered" style="font-size:18px" >
                                <thead>
                                    <tr>
                                        
                                        <th class="text-nowrap">Forma de pago</th>
                                        <th class="text-nowrap">Nro. Referencia</th>
                                        <th class="text-nowrap">Total Abonado $</th>
                                        <th class="text-nowrap">Total Abonado Bs.f</th>
                                        <th class="text-nowrap">Restante $</th>
                                        <th class="text-nowrap">Restante Bs.f</th>
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