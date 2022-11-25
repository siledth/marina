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
                                <h4 class="mt-2"> <b>Ver recibo Transito</b></h4>
                            </div>
                            <div class="col-md-12" >
                                <div class="panel-body">
                                <h4  class="mt-2"> <b>Ver recibo Transito</b></h4>
                                    <table id="data-table-default" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th width="1%"></th>
                                                <th class="text-nowrap">Titular de pago</th>
                                                <th class="text-nowrap">Embarcación</th>
                                                <th class="text-nowrap">Matricula</th>
                                                <th class="text-nowrap">Total</th>
                                                
                                                <th class="text-nowrap">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($facturas as $lista):?>
                                                <tr class="odd gradeX">
                                                    <td><?=$lista['id']?></td>
                                                    <td><?=$lista['nombre']?></td>
                                                    <td><?=$lista['nombrep']?></td>
                                                    <td><?=$lista['matricula']?></td>
                                                    <td><?=$lista['total']?></td>
                                                    
                                                    <td>
                                                        <a class="button" href="<?php echo base_url() ?>index.php/Factura/ver_recibo_transito?id=<?php echo $lista['id'];?>" >
                                                            <i title="Ver" class="fas fa-lg fa-fw fa-list-alt" style="color: #00d41a;"></i>
                                                        <a/>
                                                        <?php if ($lista['id_status'] == 0): ?>
                                                            <a title="Anular" onclick="anular_factura(<?php echo $lista['id'];?>);" class="button">
                                                                <i class="fas fa-lg fa-fw fa-times-circle" style="color:#d84600"></i>
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
</div><script src="<?=base_url()?>/js/bien/reg_recib_trasi.js"></script>