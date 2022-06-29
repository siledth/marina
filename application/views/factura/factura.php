<div class="sidebar-bg"></div>
<div id="content" class="content">
    <div class="col-lg-12">
        <div class="row">
            <div class="panel panel-inverse">
                <div class="panel-body">

                    <form id="reg_bien" method="POST" class="form-horizontal">
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-10 mt-2">
                                <div class="card card-outline-danger text-center bg-white">
                                    <h4 class="mt-2"> <b><?=$descripcion?></b></h4>
                                    <h5>RIF.: <?=$rif?></h5>
                                    <h5>Fecha.: <?=$time ?> </h5>
                                </div>
                            </div>
                            <div class="form-group col-2">
                                <label>N° Factura <b title="Campo Obligatorio" style="color:red">*</b></label>
                                <input type="text" name="numfact" onkeyup="mayusculas(this);" class="form-control">
                            </div>
                            <div class="form-group col-7">
                                <label>Nombre/Rif Empresa <b title="Campo Obligatorio" style="color:red">*</b></label>
                                <input type="text" name="nombre" onkeyup="mayusculas(this);" class="form-control">
                            </div>
                            <div class="form-group col-3">
                                <label>Telefono <b title="Campo Obligatorio" style="color:red">*</b></label>
                                <input type="text" name="tele_1" onkeyup="mayusculas(this);" class="form-control">
                            </div>
                            <div class="col-6"></div>
                            <div class="form-group col-4">
                                <label>Embarcación/Matricula <b title="Campo Obligatorio"
                                        style="color:red">*</b></label>
                                <select style="width: 100%;" id="matricular" name="matricular" class="form-control">
                                    <option value="0">Seleccione</option>
                                    <?php foreach ($mat as $data): ?>
                                    <option value="<?=$data['matricula']?>"> <?=$data['matricula']?> $</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-2" >
                                <label>Dolar BCV <b title="Campo Obligatorio" style="color:red">*</b></label>
                                <?php foreach ($dolar as $data): ?>
                                <input type="text" name="dolar" id="dolar" class="form-control"
                                    value="<?=$data['desc_dolarc']?>">
                                <?php endforeach; ?>
                            </div>

                            <div class="col-12">
                                <hr style="border-top: 1px solid rgba(0, 0, 0, 0.39);">
                            </div>
                            <div class="col-12 text-center">
                                <h4 style="color:red;">Detalle de Factura</h4>
                            </div>
                            <div class="form-group col-3">
                                <label>Tarifa <b title="Campo Obligatorio" style="color:red">*</b></label>
                                <select style="width: 100%;" id="tarifa" name="tarifa" onchange="calcular_bienes();"
                                    class="form-control">
                                    <option value="0">Seleccione</option>
                                    <?php foreach ($tarifa as $data): ?>
                                        <option value="<?=$data['des_unidad']?>/<?=$data['desc_tarifa']?>">
                                        <?=$data['desc_tarifa']?>$ /
                                        <?=$data['desc_concepto']?>/<?=$data['desc_condicion']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-2">
                                <label>Dias <b title="Campo Obligatorio / Solo debe cambiar si es por días" style="color:red">* <i class="fas fa-info-circle"></i></b> </label>
                                <input id="dia" name="dia" onblur="calcular_bienes();" class="form-control"
                                    onkeypress="return valideKey(event);" value="30">
                            </div>
                            <div class="form-group col-2">
                                <label>Pies <b title="Campo Obligatorio" style="color:red">*</b></label>
                                <input id="pies" name="pies" onblur="calcular_bienes();" class="form-control"
                                    onkeypress="return valideKey(event);">
                            </div>
                            <div class="form-group col-5">
                                <label>Descripcion de Servicio <b title="Campo Obligatorio"
                                        style="color:red">*</b></label>
                                <input type="text" id="ob" name="ob" onkeyup="mayusculas(this);" class="form-control">
                            </div>

                            <div class="form-group col-2">
                                <label>Alícuota IVA Estimado<b style="color:red">*</b></label><br>
                                <select style="width: 100%;" name="id_alicuota_iva" id="id_alicuota_iva"
                                    onchange="calcular_bienes();" class="form-control">
                                    <option value="">SELECCIONE</option>
                                    <?php foreach ($iva as $data): ?>
                                    <option value="<?=$data['desc_alicuota_iva']?>/<?=$data['desc_porcentaj']?>">
                                        <?=$data['desc_porcentaj']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-2">
                                <label>Monto IVA Estimado<b style="color:red">*</b></label>
                                <input id="iva_estimado" name="iva_estimado" type="text" class="form-control" disabled>
                            </div>
                            <div class="form-group col-3">
                                <label>Monto total Estimado<b style="color:red">*</b></label>
                                <input id="monto_estimado" name="monto_estimado" type="text" class="form-control"
                                    disabled>
                            </div>
                            <div class="col-5 mt-2">
                                <div class="card card-outline-danger text-center bg-white">
                                    <div class="card-block">
                                        <blockquote class="card-blockquote" style="margin-bottom: -19px;">
                                            <div class="form-group col-12">
                                                <label>Total <b title="Campo Obligatorio"
                                                        style="color:red">*</b></label>
                                                <input id="canon" name="canon" type="text" class="form-control"
                                                    disabled>
                                            </div>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <hr style="border-top: 1px solid rgba(0, 0, 0, 0.39);">
                            </div>
                            <div class="col-12 text-center">
                            <h5 class="text-center"><b style="color:red;">NOTA:</b> La tabla debe tener al menos un
                                registro agregado, para proceder con la solicitud.</h5>
                            </div>
                            <div class="col-12 text-center">
                                <button type="button" onclick="agregar_ccnu_acc(this);" class="btn btn-lg btn-default">
                                    Agregar
                                </button>
                            </div>
                            <div class="table-responsive mt-4">
                                <h5 class="text-center">Lista de Requerimiento</h5>
                                <table id="target_req_acc" class="table table-bordered table-hover">
                                    <thead style="background:#e4e7e8;">
                                        <tr class="text-center">
                                            <th>Matricula</th>
                                            <th>Descripción</th>
                                            <th>Cantidad</th>
                                            <th>Tarifa $</th>
                                            <th>Dias</th>
                                            <th>Total $</th>
                                            <th>Total + iva $</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                            <div class="col-6"></div>
                            <div class="form-group row col-6">
                                <label class="col-form-label col-md-6 text-right" >Total IVA $</label>
                                <div class="col-md-6">
                                <input id="total_iva" name="total_iva" type="text" class="form-control text-center" disabled>
                                </div>
                            </div>
                            <div class="col-6"></div>
                            <div class="form-group row col-6">
                                <label class="col-form-label col-md-6 text-right" >Total + IVA $</label>
                                <div class="col-md-6">
                                    <input id="total_mas_iva" name="total_mas_iva" type="text" class="form-control text-center" disabled>
                                </div>
                            </div>
                            <div class="col-6"></div>
                            <div class="form-group row col-6">
                                <label class="col-form-label col-md-6 text-right" >Total en Bs</label>
                                <div class="col-md-6">
                                    <input id="total_bs" name="total_bs" type="text" class="form-control text-center" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row text-center mt-3">
                            <div class="col-6">
                                <button class="btn btn-circle waves-effect btn-lg waves-circle waves-float btn-success"
                                    type="button" onclick="guardar_bien();" id="btn_guar_2" name="button"
                                    disabled>Guardar</button>
                            </div>
                            <div class="col-6">
                                <a class="btn btn-circle waves-effect btn-lg waves-circle waves-float btn-primary"
                                    href="javascript:history.back()"> Volver</a>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="<?=base_url()?>/js/programacion.js"></script>
<script src="<?=base_url()?>/js/bien/agregar_fac.js"></script>
<script src="<?=base_url()?>/js/bien/calculos_bienes.js"></script>
<script src="<?=base_url()?>/js/bien/guardar_fact.js"></script>
<script type="text/javascript">
function mayusculas(e) {
    e.value = e.value.toUpperCase();
}
</script>
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