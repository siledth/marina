<div class="sidebar-bg"></div>
<div id="content" class="content">
    <div class="col-lg-12">
        <div class="row">
            <div class="panel panel-inverse">
                <div class="panel-body"> 
                    <form id="reg_bien" method="POST" class="form-horizontal">
                        <div class="row">
                            <div class="col-12 card card-outline-danger text-center bg-white">
                                <h4 class="mt-2"> <b><?=$descripcion?></b></h4>
                                <h5>RIF.: <?=$rif?></h5>
                                <h5>Fecha.: <?=$time ?> </h5>
                            </div>
                            <div class="col-md-12" >
                                <div class="panel-body">
                                    <div class="col-12 text-center"> <h4>Mensualidades de acuerdo al día</h4> </div>
                                   
                                    <table id="data-table-default" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th width="1%"></th>
                                                <th class="text-nowrap">Nombre del Buque</th>
                                                <th class="text-nowrap">Embarcación/Matricula</th>
                                                <th class="text-nowrap">canon</th>
                                                <th class="text-nowrap">Fecha Deuda</th>
                                                <th class="text-nowrap">Estatus</th>
                                                <th class="text-nowrap">Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($ver_deudas as $lista):?>
                                                <tr class="odd gradeX">
                                                    <td><?=$lista['id_mensualidad']?></td>
                                                    <td><?=$lista['nombrebuque']?></td>
                                                    <td><?=$lista['matricula']?></td>
                                                    <td><?=$lista['canon']?></td>
                                                    <td><?=$lista['fecha_deuda']?></td>
                                                    <td><?=$lista['descripcion']?></td>
                                                    <td>
                                                    <?php if ($lista['id_factura'] != 0): ?>
                                                        <a class="button" href="<?php echo base_url() ?>index.php/Factura/verFactura?id=<?php echo $lista['id_factura'];?>" >
                                                            <i title="Ver" class="fas fa-lg fa-fw fa-eye" style="color: #00d41a;"></i>
                                                        <a/>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><script src="<?=base_url()?>/js/bien/guardar_fact.js"></script>