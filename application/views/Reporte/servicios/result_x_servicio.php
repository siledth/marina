<div class="sidebar-bg"></div>
<div id="content" class="content">
    <div class="row">
        <div class="col-1 mb-3">
            <a class="btn btn-circle waves-effect  waves-circle waves-float btn-primary" href="javascript:history.back()"> Volver</a>
        </div>
        <div class="col-1 mb-3">
            <button class="btn btn-circle waves-effect waves-circle waves-float btn-primary" type="submit" onclick="printDiv('areaImprimir');" name="action">Imprimir</button>
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
                                </blockquote>
                            </div>
                        </div>
                    </div>
                    <div class="col-11 ml-5">
                        <table id="data-table-default" class="table table-striped table-bordered display responsive nowrap" style="width:100%">
                            <thead class="h5 text-center">
                                <tr>
                                    <th>Embarcación</th>
                                    <th>Pies</th>
                                    <th>Total</th>
                                    <th>Fecha de Facturación</th>
                                    <th>Observaciòn</th>
                                    <th>-</th>
                                </tr>
                            </thead>
                            <tbody class="h5" style="color: black;">
                                <?php if($results != 0){ ?>
                                    <?php foreach($results as $result):?>
                                        <tr class="odd gradeX" style="text-align:center">
                                            <td><?=$result['nombrebuque']?></td>
                                            <td><?=$result['pies']?></td>
                                            <td><?=$result['monto_estimado']?> </td>
                                            <td><?=$result['fechaingreso']?> </td>
                                            <td><?=$result['ob']?> </td>
                                            <td><?=$result['condicion']?> </td>
                                    </tr>
                                    <?php endforeach;?>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-4"></div>
                    <div class="form-group mt-3 mr-1 row">
                        <label class="col-md-6 col-form-label">Total Pies por Factura:</label>
                        <div class="col-md-6">
                            <div class="input-group input-daterange">
                            <input class="form-control text-center" type="text" value="<?=number_format($totl_pies_f, 2, ',', '.')?>" readonly>
                          </div>
                        </div>
                    </div>
                    <div class="form-group mt-3 row">
                        <label class="col-md-6 col-form-label"> Total General por Factura:</label>
                        <div class="col-md-6">
                            <div class="input-group input-daterange">
                            <input class="form-control text-center" type="text" value="<?=number_format($totl_monto_f, 2, ',', '.')?>" readonly>
                          </div>
                        </div>
                    </div>
                    <div class="col-4"></div>
                    <div class="form-group mt-3 mr-1 row">
                        <label class="col-md-6 col-form-label">Total Pies por Recibo:</label>
                        <div class="col-md-6">
                            <div class="input-group input-daterange">
                            <input class="form-control text-center" type="text" value="<?=number_format($totl_pies_r, 2, ',', '.')?>" readonly>
                          </div>
                        </div>
                    </div>
                    <div class="form-group mt-3 row">
                        <label class="col-md-6 col-form-label"> Total General por Recibo:</label>
                        <div class="col-md-6">
                            <div class="input-group input-daterange">
                            <input class="form-control text-center" type="text" value="<?=number_format($totl_monto_r, 2, ',', '.')?>" readonly>
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