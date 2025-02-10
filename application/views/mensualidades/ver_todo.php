<div class="sidebar-bg"></div>
<div id="content" class="content">
    <div class="col-lg-12">
        <div class="row">
            <div class="panel panel-inverse">
                <div class="panel-body">
                    <form id="reg_bien" method="POST" class="form-horizontal">
                        <div class="row">
                            <div class="col-12 card card-outline-danger text-center bg-white">
                                <h4 class="mt-2"> <b><?= $descripcion ?></b></h4>
                                <h5>RIF.: <?= $rif ?></h5>
                                <h5>Fecha.: <?= $time ?> </h5>
                            </div>
                            <div class="col-9"></div>


                            <div class="col-md-12">
                                <div class="panel-body">
                                    <div class="col-12 text-center">
                                        <h4>Historicos de Mensualidades pagadas </h4>
                                    </div>

                                    <table id="data-tablepdfp" data-order='[[ 0, "desc" ]]'
                                        class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th width="1%">#</th>
                                                <th width="15%" class="text-nowrap">Nombre de la Embarcación</th>
                                                <th width="25%" class="text-nowrap">Matricula</th>
                                                <th width="10%" class="text-nowrap">Canon</th>
                                                <th width="15%" class="text-nowrap">Fecha Deuda</th>
                                                <th width="15%" class="text-nowrap">Estatus</th>
                                                <th width="20%" class="text-nowrap">Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($ver_deudas as $lista) : ?>
                                            <tr class="odd gradeX">
                                                <td><?= $lista['id_mensualidad'] ?></td>
                                                <td><?= $lista['nombrebuque'] ?></td>
                                                <td><?= $lista['matricula'] ?></td>
                                                <td><?= $lista['canon'] ?></td>
                                                <td><?= date("d-m-Y", strtotime($lista['fecha_deuda'])); ?></td>

                                                <td><?= $lista['descripcion'] ?></td>
                                                <td>
                                                    <a class="button"
                                                        href="<?php echo base_url() ?>index.php/Mensualidades/verPago?id=<?php echo $lista['id_mensualidad']; ?>">
                                                        <i title="Ver Pago" class="fas fa-lg fa-fw fa-eye"
                                                            style="color: midnightblue;"></i>
                                                        <a />
                                                        <?php if (($lista['id_factura'] == 0) && $lista['id_status'] == 2) : ?>
                                                        <a class="button"
                                                            href="<?php echo base_url() ?>index.php/Mensualidades/generar_fac?id=<?php echo $lista['id_mensualidad']; ?>">
                                                            <i title="Generar Factura"
                                                                class="fas fa-lg fa-fw fa-file-import"
                                                                style="color: crimson;"></i>
                                                            <a />
                                                            <?php endif; ?>
                                                            <?php if (($lista['id_factura'] == 0) && $lista['id_status'] >= 2) : ?>
                                                            <a class="button"
                                                                onclick="eliminar_pago(<?php echo $lista['id_mensualidad'] ?>);">
                                                                <i title="Eliminar Pago"
                                                                    class="fas fa-lg fa-fw fa-trash"
                                                                    style="color: red;"></i>
                                                                <a />
                                                                <?php endif; ?>
                                                                <?php if ($lista['id_factura'] != 0) : ?>
                                                                <a class="button"
                                                                    href="<?php echo base_url() ?>index.php/Factura/verFactura?id=<?php echo $lista['id_factura']; ?>">
                                                                    <i title="Ver Factura"
                                                                        class="far fa-lg fa-fw fa-file-pdf"
                                                                        style="color: brown;"></i>
                                                                    <a />
                                                                    <a class="button"
                                                                        onclick="eliminar_factura(<?php echo $lista['id_factura']?> + '/' + <?php echo $lista['id_mensualidad']?> );">
                                                                        <i title="Eliminar Factura"
                                                                            class="fas fa-lg fa-fw fa-trash"
                                                                            style="color: orange;"></i>
                                                                        <a />
                                                                        <?php endif; ?>


                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
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
</div>




<script src="<?= base_url() ?>/js/bien/guardar_fact.js"></script>
<script src="<?= base_url() ?>/js/bien/mensualidad.js"></script>
<script src="<?= base_url() ?>/js/bien/numeroadelanto.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $("#matricular").select2({
        dropdownParent: $("#exampleModal1")
    });
});

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

$("#cantidad_pagar_bs").on({
    "focus": function(event) {
        $(event.target).select();
    },
    "keyup": function(event) {
        $(event.target).val(function(index, value) {
            return value.replace(/\D/g, "")
                .replace(/([0-9])([0-9]{2})$/, '$1,$2')
                .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
        });
    }
});

$("#cantidad_pagar_bs_a").on({
    "focus": function(event) {
        $(event.target).select();
    },
    "keyup": function(event) {
        $(event.target).val(function(index, value) {
            return value.replace(/\D/g, "")
                .replace(/([0-9])([0-9]{2})$/, '$1,$2')
                .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
        });
    }
});

/*$("#cantidad_pagar_otra").on({
     "focus": function (event) {
         $(event.target).select();
     },
     "keyup": function (event) {
         $(event.target).val(function (index, value ) {
             return value.replace(/\D/g, "")
                         .replace(/([0-9])([0-9]{2})$/, '$1,$2')
                         .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
         });
     }
 });

 $("#cantidad_pagar_otra_a").on({
     "focus": function (event) {
         $(event.target).select();
     },
     "keyup": function (event) {
         $(event.target).val(function (index, value ) {
             return value.replace(/\D/g, "")
                         .replace(/([0-9])([0-9]{2})$/, '$1,$2')
                         .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
         });
     }
 });*/
</script>