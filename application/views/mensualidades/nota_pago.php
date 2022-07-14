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
                                <h5>RIF.: <?=$rif?></h5>
                                <h5>Fecha Impresión: <?=$time ?> </h5>
                            </div>
                        </div>
                        <div class="form-group col-10 mt-4">
                           <h4 class="text-center"> <b>Pago de Mensualidad</b></h4> 
                        </div>
                        <div class="form-group col-2">
                            <label>Estatus<b title="Campo Obligatorio" style="color:red">*</b></label>
                            <h4><b><?=$inf_buque['estatus']?></b> </h4>
                        </div>
                        <div class="col-12">
                            <hr style="border-top: 1px solid rgba(0, 0, 0, 0.39);">
                        </div>
                        <div class="col-12 text-center">
                            <h4 style="color:red;">Propietario y Embarcación</h4>
                        </div>
                        <div class="col-3">
                            <label>Cédula</label>
                            <h4><b><?=$inf_buque['cedula']?></b> </h4>
                        </div>
                        <div class="col-3">
                            <label>Nombre y Apellido</label>
                            <h4><b><?=$inf_buque['nombrecom']?></b> </h4>
                        </div>
                        <div class="form-group col-2">
                            <label>Telefono</label>
                            <h4><b><?=$inf_buque['tele_1']?></b> </h4>
                        </div>
                        <div class="form-group col-4">
                            <label>Embarcación/Matricula</label>
                            <h4><b><?=$inf_buque['matricula']?></b> </h4>
                        </div>
                        <div class="col-4"></div>
                        <div class="form-group col-2">
                            <label>Pies</label>
                            <h4><b><?=$inf_buque['pies']?></b> </h4>
                        </div>
                        <div class="form-group col-2">
                            <label>Días</label>
                            <h4><b><?=$inf_buque['dia']?></b> </h4>
                        </div>
                        <div class="form-group col-2">
                            <label>Tarifa</label>
                            <h4><b><?=$inf_buque['tarifa']?></b> </h4>
                        </div>
                        <div class="form-group col-2">
                            <label>Canon</label>
                            <h4><b><?=$inf_buque['canon']?></b> </h4>
                        </div>

                        <div class="col-12">
                            <hr style="border-top: 1px solid rgba(0, 0, 0, 0.39);">
                        </div>
                        <div class="col-12 text-center">
                            <h4 style="color:red;">Descripcion del pago</h4>
                        </div>
                        <div class="col-12 mt-2">
                            <table id="data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th width="1%">ID</th>
                                        <th class="text-nowrap">Tipo de pago</th>
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
                                            <td><?=$lista['id_mov_consig']?></td>
                                            <td><?=$lista['id_tipo_pago']?></td>
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