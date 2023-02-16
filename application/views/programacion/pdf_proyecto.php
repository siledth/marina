<div class="sidebar-bg"></div>
<div id="content" class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-inverse" data-sortable-id="form-validation-1" id="imp1">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-10 mt-4">
                            <div class="card card-outline-danger text-center bg-white">
                                <div class="card-block">
                                    <blockquote class="card-blockquote" style="margin-bottom: -19px;">
                                        <p class="f-s-18 text-inverse f-w-600"> <?=$descripcion?>.</p>
                                        <p class="f-s-16">RIF.: <?=$rif?> <br> </p>
                                    </blockquote>
                                </div>
                            </div> 
                        </div>
                        <?php foreach($inf_1 as $inf_1):?><?php endforeach;?>
                       

                        <div class="col-9 mt-2 form-group">
                            <label>Nombre del Barco <b style="color:red">*</b></label>
                            <input value="<?=$inf_1['nombrebuque']?>" type="text" class="form-control" disabled>
                        </div>
                        <div class="form-group mt-2  col-3">
                            <label>Matricula</label>
                            <input value="<?=$inf_1['matricula']?>" type="text" class="form-control" disabled>
                        </div>
                        <div class="form-group mt-2  col-2">
                            <label>Pies</label>
                            <input value="<?=$inf_1['pies']?>" type="text" class="form-control" disabled>
                        </div>
                        <div class="form-group mt-2  col-2">
                            <label>Tipo</label>
                            <input value="<?=$inf_1['tipo']?>" type="text" class="form-control" disabled>
                        </div>
                        <div class="form-group mt-2  col-2">
                            <label>Color</label>
                            <input value="<?=$inf_1['color']?>" type="text" class="form-control" disabled>
                        </div>
                        <div class="form-group mt-2  col-2">
                            <label>Eslora</label>
                            <input value="<?=$inf_1['eslora']?>" type="text" class="form-control" disabled>
                        </div>
                        <div class="form-group mt-2  col-2">
                            <label>Manga</label>
                            <input value="<?=$inf_1['manga']?>" type="text" class="form-control" disabled>
                        </div>
                        <div class="form-group mt-2  col-2">
                            <label>Puntal</label>
                            <input value="<?=$inf_1['puntal']?>" type="text" class="form-control" disabled>
                        </div>
                        <div class="form-group mt-2  col-2">
                            <label>Bruto</label>
                            <input value="<?=$inf_1['bruto']?>" type="text" class="form-control" disabled>
                        </div>
                        <div class="form-group mt-2  col-2">
                            <label>Neto</label>
                            <input value="<?=$inf_1['neto']?>" type="text" class="form-control" disabled>
                        </div>
                        <div class="form-group mt-2  col-2">
                            <label>Canon Mensual $ </label>
                            <input value="<?=$inf_1['canon']?>" type="text" class="form-control" disabled>
                        </div>
                        <div class="form-group mt-2  col-2">
                            <label>Ubicación</label>
                            <input value="<?=$inf_1['ubicacion']?>" type="text" class="form-control" disabled>
                        </div>
                        <div class="form-group mt-2  col-2">
                            <label>Fecha de Ingreso</label>
                            <input value="<?=$inf_1['fechaingreso']?>" type="text" class="form-control" disabled>
                        </div>
                       
                        <hr style="border-top: 1px solid rgba(0, 0, 0, 0.17);">
                        <div class="col-11" style="margin-left: 40px;">
                            <div class="table-responsive mt-3">
                                <div class="col-12 text-center">
                                    <h4 style="color:red;">Propietarios</h4>
                                </div>
                                <table id="target_ff" class="table table-bordered table-hover">
                                    <thead style="background:#e4e7e8;">
                                        <tr class="text-center">
                                            <th>Nombre propietario</th>
                                            <th>cedula</th>
                                            <th>telefono</th>
                                            <th>Correo</th>
                                            <th>Proietario</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($inf_2 as $inf_2):?>
                                        <tr class="odd gradeX" style="text-align:center">
                                            <td><?=$inf_2['nombrecom']?></td>
                                            <td><?=$inf_2['cedula']?></td>
                                            <td><?=$inf_2['tele_1']?></td>
                                            <td><?=$inf_2['email']?></td>
                                            <td><?=$inf_2['tipo']?></td>

                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <hr style="border-top: 1px solid rgba(0, 0, 0, 0.17);">
                        <div class="table-responsive mt-4">
                            <div class="col-12 mt-2 text-center">
                                <h4 style="color:red;">Información Tripulación</h4>
                            </div>
                            <table id="target_req" class="table table-bordered table-hover">
                                <thead style="background:#e4e7e8;">
                                    <tr class="text-center">
                                        <th>nombre.</th>
                                        <th>cedula</th>
                                        <th>telefono</th>
                                        <th>Cargo</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($inf_3 as $inf_3):?>
                                    <tr class="odd gradeX" style="text-align:center">
                                        <td><?=$inf_3['nombrecomt']?></td>
                                        <td><?=$inf_3['cedulat']?></td>
                                        <td><?=$inf_3['tele_1t']?></td>
                                        <td><?=$inf_3['cargot']?></td>


                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!--////////////////////////////SEGUNDA PARTE DE LA CARGA -->

                </div>
            </div>
            <div class="col 12 text-center">
                <button class="btn btn-default mt-1 mb-1" type="button" id="print"
                    onclick="printContent('imp1');">Imprimir </button>
            </div>
            <div class="col-12 text-center mt-3">
                <a class="btn btn-circle waves-effect btn-lg waves-circle waves-float btn-grey"
                    href="javascript:history.back()"> Volver</a>
            </div>
        </div>
    </div>
</div>
<script>
function printContent(imp1) {
    var restorepage = $('body').html();
    var printcontent = $('#' + imp1).clone();
    $('body').empty().html(printcontent);
    window.print();
    $('body').html(restorepage);
}
</script>