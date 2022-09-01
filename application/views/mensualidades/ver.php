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
                            <div class="col-1 mb-3">
                                <a data-toggle="modal" data-target="#exampleModal1" class="btn btn-green btn-circle waves-effect waves-circle waves-float">
                                    Adelantar pago de Mensualidad
                                </a>
                            </div>

                            <div class="col-md-12">
                                <div class="panel-body">
                                    <div class="col-12 text-center">
                                        <h4>Mensualidades de acuerdo al día</h4>
                                    </div>

                                    <table id="data-table-default" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th width="1%"></th>
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
                                                        <a class="button" href="<?php echo base_url() ?>index.php/Mensualidades/verPago?id=<?php echo $lista['id_mensualidad']; ?>">
                                                            <i title="Ver Pago" class="fas fa-lg fa-fw fa-eye" style="color: midnightblue;"></i>
                                                        <a />
                                                        <?php if (($lista['id_factura'] == 0) && $lista['id_status'] == 2) : ?>
                                                            <a class="button" href="<?php echo base_url() ?>index.php/Mensualidades/generar_fac?id=<?php echo $lista['id_mensualidad']; ?>">
                                                                <i title="Generar Factura" class="fas fa-lg fa-fw fa-file-import" style="color: crimson;"></i>
                                                            <a />
                                                        <?php endif; ?>
                                                        <?php if (($lista['id_factura'] == 0) && $lista['id_status'] >= 2) : ?>
                                                            <a class="button" onclick="eliminar_pago(<?php echo $lista['id_mensualidad'] ?>);">
                                                                <i title="Eliminar Pago" class="fas fa-lg fa-fw fa-trash" style="color: red;"></i>
                                                            <a />
                                                        <?php endif; ?>
                                                        <?php if ($lista['id_factura'] != 0) : ?>
                                                            <a class="button" href="<?php echo base_url() ?>index.php/Factura/verFactura?id=<?php echo $lista['id_factura']; ?>">
                                                                <i title="Ver Factura" class="far fa-lg fa-fw fa-file-pdf" style="color: brown;"></i>
                                                            <a />
                                                            <a class="button" onclick="eliminar_factura(<?php echo $lista['id_factura']?> + '/' + <?php echo $lista['id_mensualidad']?> );">
                                                                <i title="Eliminar Factura" class="fas fa-lg fa-fw fa-trash" style="color: orange;"></i>
                                                            <a />
                                                        <?php endif; ?>
                                                        <?php if ($lista['id_status'] != 2) : ?>
                                                            <a onclick="modal(<?php echo $lista['id_mensualidad'] ?>);" data-toggle="modal" data-target="#exampleModal" style="color: white">
                                                                <i title="Pagar" class="fas fa-lg fa-fw fa-donate" style="color: darkgreen;"></i>
                                                            </a>
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

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar Pago</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="guardar_proc_pag" name="guardar_proc_pag" data-parsley-validate="true" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-2">
                            <label>N° Recibo <b title="Campo Obligatorio" style="color:red">*</b></label>
                            <input type="text" name="numfact" id="numfact" onkeyup="mayusculas(this);" class="form-control" readonly>
                        </div>
                        <div class="form-group col-2">
                            <label>ID - Mensualidad</label>
                            <input class="form-control" type="text" name="id_mesualidad_ver" id="id_mesualidad_ver" readonly>
                        </div>
                        <div class="col-10"></div>
                        <div class="form-group col-4">
                            <label>Matricula</label>
                            <input class="form-control" type="text" name="matricula" id="matricula" readonly>
                        </div>
                        <div class="form-group col-2">
                            <label>Pies</label>
                            <input class="form-control" type="text" name="pies" id="pies" readonly>
                        </div>
                        <div class="form-group col-2">
                            <label>Días</label>
                            <input class="form-control" type="text" name="dias" id="dias" readonly>
                        </div>
                        <div class="form-group col-2">
                            <label>Tarifa</label>
                            <input class="form-control" type="text" name="tarifa" id="tarifa" readonly>
                        </div>
                        <div class="form-group col-2">
                            <label>Valor Dolar</label>
                            <input class="form-control" type="hidden" name="id_dolar" id="id_dolar" value="1" readonly>
                            <input class="form-control" type="text" name="dolar" id="dolar" onchange="calcular_dolar();">
                        </div>
                        <div class="form-group col-3">
                            <label>Canon</label>
                            <input class="form-control" type="text" name="canon" id="canon" readonly>
                        </div>
                        <div class="form-group col-3">
                            <label>Monto en Bs. F</label>
                            <input class="form-control" type="text" name="bs" id="bs" readonly>
                        </div>
                        <div class="form-group col-3">
                            <label>Cantidad a pagar $</label>
                            <input class="form-control" type="text" id="cantidad_pagar_otra" name="cantidad_pagar_otra" onblur="calcular_dol();" onkeypress="return valideKey(event);">
                        </div>
                        <div class="form-group col-3">
                            <label>Cantidad a pagar Bs. F</label>
                            <input class="form-control" type="text" id="cantidad_pagar_bs" name="cantidad_pagar_bs" onkeypress="return valideKey(event);" readonly>
                        </div>
                        <div class="form-group col-3">
                            <label>Cantidad restante $</label>
                            <input class="form-control" type="text" id="total_otra" name="total_otra" readonly>
                        </div>
                        <div class="form-group col-3">
                            <label>Cantidad restante Bs. F</label>
                            <input class="form-control" type="text" id="total_bs_pag" name="total_bs_pag" readonly>
                        </div>
                        <div class="col-3">
                            <label>Tipo de pago</label>
                            <select class="form-control" name="id_tipo_pago" id="id_tipo_pago" onclick="llenar_pago();">
                                <option value="0">Seleccione</option>
                                <?php foreach ($tipoPago as $data) : ?>
                                    <option value="<?= $data['id_tipo_pago'] ?>"><?= $data['descripcion'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row" id='campos' style="display: none;">
                        <div class="col-4">
                            <label>Banco</label>
                            <select class="form-control" name="id_banco" id="id_banco">
                                <option value="0">Seleccione</option>
                                <?php foreach ($banco as $data) : ?>
                                    <option value="<?= $data['id_banco'] ?>"><?= $data['codigo_b'] ?> / <?= $data['nombre_b'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-4">
                            <label>Número de referencia:</label>
                            <input class="form-control" type="text" name="nro_referencia" id="nro_referencia">
                        </div>
                        <div class="col-4">
                            <label>Fecha de Tranferencia:</label>
                            <input class="form-control" type="date" name="fechatrnas" id="fechatrnas">
                        </div>
                    </div>
                    <div class="form-group col-3">
                        <label>Nota</label>
                        <textarea name="nota" id="nota" rows="5" cols="100"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="javascript:window.location.reload()" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" id="guardar_pago_fin" onclick="guardar_proc_pago();" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar Pago Adelantado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="guardar_adelanto_pag" data-parsley-validate="true" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-10"></div>
                        <div class="form-group col-3">
                            <label>N° Recib <b title="Campo Obligatorio" style="color:red">*</b></label>
                            <input type="text" name="numfactura" id="numfactura" onkeyup="mayusculas(this);" class="form-control" readonly>
                        </div>
                        <div class="form-group col-4">
                            <label>Embarcación/Matricula <b title="Campo Obligatorio" style="color:red">*</b></label>
                            <select style="width: 100%;" onclick="trae_inf();" id="matricular" name="matricular" class="form-control" data-show-subtext="true" data-live-search="true">
                                <option value="0">Seleccione</option>
                                <?php foreach ($mat as $data) : ?>
                                    <option value="<?= $data['matricula'] ?>">
                                        <?= $data['matricula'] ?> / <?= $data['nombrebuque'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-4">
                            <label>Nombre</label>
                            <input class="form-control" type="text" name="nombre_a" id="nombre_a" readonly>
                        </div>
                        <div class="form-group col-2">
                            <label>Pies</label>
                            <input class="form-control" type="text" name="pies_a" id="pies_a" readonly>
                        </div>
                        <div class="form-group col-2">
                            <label></label>
                            <input class="form-control" type="hidden" name="dias_a" id="dias_a" readonly>
                        </div>
                        <div class="form-group col-4">
                            <label>Tarifa</label>
                            <input class="form-control" type="hidden" name="id_tarifa_a" id="id_tarifa_a" readonly>
                            <input class="form-control" type="text" name="tarifa_a" id="tarifa_a" readonly>
                            <input class="form-control" type="hidden" name="tarifa_a1" id="tarifa_a1" readonly>
                        </div>
                        <div class="form-group col-2">
                            <label>Valor Dolar</label>
                            <input class="form-control" type="hidden" name="id_dolar_a" id="id_dolar_a" value="1" readonly>
                            <input class="form-control" type="text" name="dolar_a" id="dolar_a" onchange="calcular_dolar_a();">
                        </div>

                        <div class="form-group col-3">
                            <label>Canon</label>
                            <input class="form-control" type="text" name="canon_a" id="canon_a" readonly>
                        </div>
                        <div class="form-group col-3">
                            <label>Monto en Bs. F</label>
                            <input class="form-control" type="text" name="bs_a" id="bs_a" readonly>
                        </div>
                        <div class="form-group col-3">
                            <label>Cantidad a pagar $</label>
                            <input class="form-control" type="text" id="cantidad_pagar_otra_a" name="cantidad_pagar_otra_a" onblur="calcular_dol_a();" onkeypress="return valideKey(event);">
                        </div>
                        <div class="form-group col-3">
                            <label>Cantidad a pagar Bs. F</label>
                            <input class="form-control" type="text" id="cantidad_pagar_bs_a" name="cantidad_pagar_bs_a" onkeypress="return valideKey(event);" readonly>
                        </div>
                        <div class="form-group col-3">
                            <label>Cantidad restante $</label>
                            <input class="form-control" type="text" id="total_otra_a" name="total_otra_a" readonly>
                        </div>
                        <div class="form-group col-3">
                            <label>Cantidad restante Bs. F</label>
                            <input class="form-control" type="text" id="total_bs_pag_a" name="total_bs_pag_a" readonly>
                        </div>
                        <div class="col-3">
                            <label>Tipo de pago</label>
                            <select class="form-control" name="id_tipo_pago_a" id="id_tipo_pago_a" onclick="llenar_pago_a();">
                                <option value="0">Seleccione</option>
                                <?php foreach ($tipoPago as $data) : ?>
                                    <option value="<?= $data['id_tipo_pago'] ?>"><?= $data['descripcion'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row" id='campos_a' style="display: none;">
                        <div class="col-4">
                            <label>Banco</label>
                            <select class="form-control" name="id_banco_a" id="id_banco_a">
                                <option value="0">Seleccione</option>
                                <?php foreach ($banco as $data) : ?>
                                    <option value="<?= $data['id_banco'] ?>"><?= $data['codigo_b'] ?> / <?= $data['nombre_b'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-3">
                            <label>Número de referencia:</label>
                            <input class="form-control" type="text" name="nro_referencia_a" id="nro_referencia_a">
                        </div>
                        <div class="col-4">
                            <label>Fecha de Tranferencia:</label>
                            <input class="form-control" type="date" name="fechatrnas_a" id="fechatrnas_a">
                        </div>
                    </div>
                    <div class="form-group col-3">
                        <label>Nota</label>
                        <textarea name="nota_a" id="nota_a" rows="5" cols="100"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="javascript:window.location.reload()" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" id="guardar_adelanto_pag_b" onclick="guardar_adelanto_pag();" class="btn btn-primary">Guardar</button>
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