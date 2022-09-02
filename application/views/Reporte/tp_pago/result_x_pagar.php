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
                                    <th>Matricula</th>
                                    <th>Pies</th>
                                    <th>Canon</th>
                                    <th>Tipo de pago</th>
                                    <th>Fecha deuda</th>
                                    <th>Total Bs.F</th>
                                </tr>
                            </thead>
                            <tbody class="h5" style="color: black;">
                                <?php if($results != 0){ ?>
                                    <?php foreach($results as $result):?>
                                        <tr class="odd gradeX" style="text-align:center">
                                            <td><?=$result['matricula']?></td>
                                            <td><?=$result['pies']?></td>
                                            <td><?=$result['canon']?> </td>
                                            <td><?=$result['dtp_pago']?> </td>
                                            <td><?=$result['fecha_deuda']?> </td>
                                            <td><?=$result['total_bs']?> </td>
                                    </tr>
                                    <?php endforeach;?>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-1"></div>
                    <div class="form-group mt-3 mr-1 row">
                        <label class="col-md-4 col-form-label">Total Pies:</label>
                        <div class="col-md-8">
                            <div class="input-group input-daterange">
                            <input class="form-control text-center" type="text" value="<?=number_format($results_2['pies'], 2, ',', '.')?>" readonly>
                          </div>
                        </div>
                    </div>
                    <div class="form-group mt-3 mr-1 row">
                        <label class="col-md-4 col-form-label"> Total Canon:</label>
                        <div class="col-md-8">
                            <div class="input-group input-daterange">
                            <input class="form-control text-center" type="text" value="<?=number_format($results_2['canon'], 0, ',', '.')?>" readonly>
                          </div>
                        </div>
                    </div>
                    <div class="form-group mt-3 row">
                        <label class="col-md-4 col-form-label"> Total General:</label>
                        <div class="col-md-8">
                            <div class="input-group input-daterange">
                            <input class="form-control text-center" type="text" value="<?=number_format($results_2['total_bs'], 2, ',', '.')?>" readonly>
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