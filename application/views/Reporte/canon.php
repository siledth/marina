<div class="sidebar-bg"></div>
<div id="content" class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-inverse">
                <div class="row">
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
                    <div class="col-1"></div>
                    <div class="col-10 mt-3">
                        <h3 class="text-center">Tabla Referente a Planillas Generadas</h3>
                        <table id="data-table-default" class="table table-bordered table-hover">
                            <thead style="background:#e4e7e8">
                                <tr class="text-center">
                                    
                                    <th class="text-nowrap">Nombre del Buque</th>
                                    <th class="text-nowrap">Embarcación/Matricula</th>
                                    <th class="text-nowrap">canon</th>
                                    <th class="text-nowrap">Fecha Deuda</th>
                                    <th class="text-nowrap">Estatus</th>
                                    <th class="text-nowrap">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($canon as $lista):?>
                                <tr class="odd gradeX" style="text-align:center">
                                        <td><?=$lista['nombrebuque']?></td>
                                        <td><?=$lista['matricula']?></td>
                                        <td><?=$lista['pies']?></td>
                                        <td><?=$lista['canon']?></td>
                                        <td><?=$lista['fecha_pago']?></td>
                                    <td class="center">
                                        <a href="<?php echo base_url();?>index.php/programacion/ver_programacion_proy?id=<?php echo $ver_proyecto['matricula'];?>"
                                            class="button">
                                            <i class="fas fa-lg fa-fw fa-eye" style="color: green;"></i>
                                            <a />
                                            <a href="<?php echo base_url();?>index.php/programacion/ver_programacion_planilla?id=<?php echo $ver_proyecto['matricula'];?>"
                                                class="button">
                                                <i class="fas fa-lg fa-fw fa-edit"></i>
                                                <a />


                                                <a href="<?php echo base_url();?>index.php/Buque/delete?id=<?php echo $ver_proyecto['matricula'];?>"
                                                    class="button"><i class="fas fa-lg fa-fw  fa-trash-alt"
                                                        style="color:red"></i><a />

                                    </td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                    <hr style=" border-top: 1px solid rgba(0, 0, 0, 0.17);">
                    <div class="col-1"></div>
                    <div class="col-1"></div>

                    <div class="col-12 text-center mt-3 mb-3">
                        <a class="btn btn-circle waves-effect btn-lg waves-circle waves-float btn-primary"
                            href="javascript:history.back()"> Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
function valideKey(evt) {
    var code = (evt.which) ? evt.which : evt.keyCode;
    if (code == 8) { // backspace.
        return true;
    } else if (code >= 48 && code <= 57) { // is a number.
        return true;
    } else { // other keys.
        return false;
    }
}
</script>
<?php if ($this->session->flashdata('sa-success2')) { ?>
<div hidden id="sa-success2"> <?= $this->session->flashdata('sa-success2') ?> </div>
<?php } ?>
<script src="<?=base_url()?>js/eliminar.js"></script>