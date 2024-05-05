<div class="sidebar-bg"></div>
<div id="content" class="content">
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
                                    <h4 class="mt-2"> <b>Condición de Pago detallado</b></h3>
                                </blockquote>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="panel-body">
                            <div class="col-12 text-center">
                                <h4>Condición de Pago detallado</h4>
                            </div>

                            <table id="data-table-default" class="table table-striped table-bordered">
                                <thead>
                                    <tr>

                                        <th width="5%" class="text-nowrap">Embarcación</th>
                                        <th width="5%" class="text-nowrap">Pies</th>
                                        <th width="5%" class="text-nowrap">Canon</th>
                                        <th width="15%" class="text-nowrap">Tipo de pago</th>
                                        <th width="10%" class="text-nowrap">Total Bs.F</th>
                                        <th width="10%" class="text-nowrap">Total o parcial $</th>
                                        <th width="10%" class="text-nowrap">N.referencia</th>
                                        <th width="10%" class="text-nowrap">Banco</th>
                                        <th width="5%" class="text-nowrap">fecha trans</th>
                                        <th width="5%" class="text-nowrap">Menusalidad</th>
                                        <th width="5%" class="text-nowrap">Fecha pago.</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($results != 0){ ?>
                                    <?php foreach ($results as $result) : ?>
                                    <tr class="odd gradeX">
                                        <td><?=$result['nombrebuque']?></td>
                                        <td><?=$result['pies']?></td>
                                        <td><?=$result['canon']?> </td>
                                        <td><?=$result['descripcion']?> </td>
                                        <td><?=$result['total_abonado_bs']?> </td>
                                        <td><?=$result['total_abonado_om']?> </td>
                                        <td><?=$result['nro_referencia']?> </td>
                                        <td><?=$result['nombre_b']?> </td>
                                        <td><?=date("d/m/Y", strtotime($result['fechatrnas']));?> </td>
                                        <td><?=date("d/m/Y", strtotime($result['fecha_deuda']));?> </td>
                                        <td><?=date("d/m/Y", strtotime($result['fecha_reg']));?> </td>

                                    </tr>
                                    <?php endforeach; ?>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-1"></div>
                    <div class="row">
                        <div class="form-group col-2">
                            <label>Total Pies: </label>
                            <input class="form-control text-center" type="text"
                                    value="<?=number_format($results_2['pies'], 0, ',', '.')?>" readonly>
                        </div>
                        <div class="form-group col-2">
                            <label>Total Canon:</label>
                            <input class="form-control text-center" type="text"
                                    value="<?=number_format($results_2['canon2'], 0, ',', '.')?>" readonly>
                        </div>
                        <div class="col-2">
                            <label>Total General $: </label>
                            <input class="form-control text-center" type="text"
                                    value="<?=number_format($results_2['canon2'], 0, ',', '.')?>" readonly>
                        </div>
                          <div class="col-3">
                            <label>Total General BS: </label>
                            <input class="form-control text-center" type="text"
                                    value="<?=number_format($results_2['total_bs'], 2, ',', '.')?>" readonly>
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