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
                        <?php foreach($inf_6 as $inf_6):?>
                        <div class="col-9 mt-2 form-group">
                            <label>DE: <b style="color:red">*</b></label>
                            <input value="<?=$inf_6['nombrecom']?>" type="text" class="form-control" >
                        </div>
                        <?php endforeach;?>


                        
                        <?php foreach($inf_1 as $inf_1):?><?php endforeach;?>
                       

                        <div class="col-9 mt-2 form-group">
                            <label>Propietario de la Embarcación <b style="color:red">*</b></label>
                            <input value="<?=$inf_1['nombrebuque']?>" type="text" class="form-control" disabled>
                        </div>
                        <div class="form-group mt-2  col-3">
                            <label>Matricula</label>
                            <input value="<?=$inf_1['matricula']?>" type="text" class="form-control" disabled>
                        </div>
                        <div class="form-group mt-2  col-3">
                            <label>Para</label>
                            <input  type="text" class="form-control">
                            Coordinador de la Marina Caraballeda
                        </div>                      
                       
                        <hr style="border-top: 1px solid rgba(0, 0, 0, 0.17);">
                        <div class="col-11" style="margin-left: 40px;">
                        <?php foreach($inf_5 as $inf_5):?> 
                            <div class="table-responsive mt-3">
                                <div class="col-12 text-center">
                                    <h4 style="color:black;">Yo  <?=$inf_5['nombrecom']?> , titular de la Cedula de Identidad N° <?=$inf_5['tipo_ced']?>-<?=$inf_5['cedula']?> 
                                Propietario de la Embarcación antes mencionada, remito la misma para informar el roll de tripulación y personas autorizadas para ingresar solo a mi embarcación:       </h4>
                                </div>
                                
                                        <?php endforeach;?>
                                   
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
                                        <th>Se autoriza ingresar a la marina</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($inf_3 as $inf_3):?>
                                    <tr class="odd gradeX" style="text-align:center">
                                        <td><?=$inf_3['nombrecomt']?></td>
                                        <td><?=$inf_3['cedulat']?></td>
                                        <td><?=$inf_3['tele_1t']?></td>
                                        <td><?=$inf_3['cargot']?></td>
                                        <td><?=$inf_3['autor']?></td> 


                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group mt-2  col-3">
                            
                            <label>Sin mas que agregar</label><br></p>
                           
                        </div>
                        
                        <div class="col-12 text-center">
                                    <h4 style="color:black;"> __________________      </h4><br>
                                    <h4 style="color:black;"> Firma      </h4><br>
                                    <h4 style="color:black;">Cedula     </h4><br>
                                    <h4 style="color:black;"> Telefono     </h4><br>
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