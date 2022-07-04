<div class="sidebar-bg"></div>
<div id="content" class="content">
    <div class="col-lg-12">
        <div class="row">
            <div class="panel panel-inverse">
                <div class="panel-body">

                    <form id="reg_bien" method="POST" class="form-horizontal">
                        <div class="row">

                            <div class="col-1"></div>
                            <div class="col-10 mt-4">
                                <div class="card card-outline-danger text-center bg-white">
                                    <div class="card-block">
                                        <blockquote class="card-blockquote" style="margin-bottom: -19px;">
                                            <p class="f-s-18 text-inverse f-w-600">
                                                <?=$descripcion?>.</p>
                                            <p class="f-s-16">RIF.: <?=$rif?> <br>
                                            <p class="f-s-16">Fecha.: <?=$time ?> <br>
                                                <input type="hidden" name="acc_cargar" id="acc_cargar"
                                                    class="form-control" value="1">
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-3">
                                <label>Nombre del Buque <b title="Campo Obligatorio" style="color:red">*</b></label>
                                <input type="text" name="nombrebuque" onkeyup="mayusculas(this);" class="form-control">

                            </div>
                            <div class="form-group col-3">
                                <label>Matrícula <b title="Campo Obligatorio" style="color:red">*</b></label>
                                <input type="text" name="matricula" onkeyup="mayusculas(this);"
                                    class="form-control  <?php echo form_error('matricula') ? 'is-invalid' : ''; ?>"
                                    onKeyUp="mayus(this);" value="<?php echo set_value('matricula'); ?>">
                                <div class="invalid-feedback">
                                    <?php echo form_error('matricula'); ?>
                                </div>
                            </div>
                            <div class="form-group col-3">
                                <label>Ubicación <b title="Campo Obligatorio" style="color:red">*</b></label>
                                <input type="text" name="ubicacion" id="ubicacion" onkeyup="mayusculas(this);" class="form-control">

                            </div>
                            <div class="form-group col-1">
                                <label>Trailers <b title="Campo Obligatorio" style="color:red">*</b></label>

                                <select class="default-select2 form-control " id="trailer" name="trailer" readonly>
                                    <option value="No">No</option>
                                    <option value="Si">Si</option>
                                </select>

                            </div>
                            <div class="form-group col-2">
                                <label>Pies <b title="Campo Obligatorio" style="color:red">*</b></label>
                                <input id="pies" name="pies" onblur="calcular_bienes();" class="form-control" onkeypress="return valideKey(event);">

                            </div>

                            <div class="form-group col-2">
                                <label>Tipo <b title="Campo Obligatorio" style="color:red">*</b></label>
                                <select style="width: 100%;" id="tipob" name="tipob" class="form-control">
                                    <option value="0">Seleccione</option>
                                    <?php foreach ($fuente as $data): ?>
                                    <option value="<?=$data['desc_tipobarco']?>">
                                        <?=$data['desc_tipobarco']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-2">
                                <label>color <b title="Campo Obligatorio" style="color:red">*</b></label>
                                <input type="text" id="color" name="color" placeholder="color"
                                    class="form-control <?php echo form_error('color') ? 'is-invalid' : ''; ?>"
                                    value="<?php echo set_value('color'); ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('color'); ?>
                                </div>
                            </div>
                            <div class="form-group col-2">
                                <label>Eslora <b title="Campo Obligatorio" style="color:red">*</b></label>
                                <input type="text" id="eslora" name="eslora" placeholder="eslora"
                                    class="form-control <?php echo form_error('eslora') ? 'is-invalid' : ''; ?>"
                                    value="<?php echo set_value('eslora'); ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('eslora'); ?>
                                </div>
                            </div>
                            <div class="form-group col-2">
                                <label>Manga <b title="Campo Obligatorio" style="color:red">*</b></label>
                                <input type="text" id="manga" name="manga" placeholder="manga"
                                    class="form-control <?php echo form_error('manga') ? 'is-invalid' : ''; ?>"
                                    value="<?php echo set_value('manga'); ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('manga'); ?>
                                </div>
                            </div>
                            <div class="form-group col-2">
                                <label>Puntal <b title="Campo Obligatorio" style="color:red">*</b></label>
                                <input type="text" id="puntal" name="puntal" placeholder="puntal"
                                    class="form-control" />

                            </div>
                            <div class="form-group col-2">
                                <label>Bruto <b title="Campo Obligatorio" style="color:red">*</b></label>
                                <input type="text" id="bruto" name="bruto" placeholder="bruto" class="form-control" />

                            </div>
                            <div class="form-group col-2">
                                <label>Neto <b title="Campo Obligatorio" style="color:red">*</b></label>
                                <input type="text" id="neto" name="neto" placeholder="neto" class="form-control" />
                            </div>
                            <div class="form-group col-3">
                                <label>Tarifa <b title="Campo Obligatorio" style="color:red">*</b></label>
                                <select style="width: 100%;" id="tarifa" name="tarifa" onchange="calcular_bienes();" class="form-control">
                                    <option value="0">Seleccione</option>
                                    <?php foreach ($tarifa as $data): ?>
                                    <option value="<?=$data['id_tarifa']?>/<?=$data['desc_tarifa']?>">
                                    <?=$data['desc_tarifa']?> $/ <?=$data['desc_concepto']?>/<?=$data['desc_condicion']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-2">
                                <label>Dias <b title="Campo Obligatorio" style="color:red">*</b></label>
                                <input id="dia" name="dia" onblur="calcular_bienes();" class="form-control" onkeypress="return valideKey(event);" value="30">
                                <label>Solo Cambiar si es por dias <b title="Campo Obligatorio" style="color:red">*</b></label>
                            </div>
                            <div class="form-group col-2">
                                <label>Fecha de Pago <b title="Campo Obligatorio" style="color:red">*</b></label>
                                <input type="date" id="fecha_pago" name="fecha_pago"  class="form-control">
                            </div>
                            <div class="col-2 mt-2">
                                <div class="card card-outline-danger text-center bg-white">
                                    <div class="card-block">
                                        <blockquote class="card-blockquote" style="margin-bottom: -19px;">
                                            <div class="form-group col-10">
                                                <label >Canon Mensual <b title="Campo Obligatorio"
                                                        style="color:red">*</b></label>
                                                        <input id="canon" name="canon" type="text" class="form-control" disabled>
                                              
                                            </div>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <hr style="border-top: 1px solid rgba(0, 0, 0, 0.39);">
                            </div>
                            <div class="col-12 text-center">
                                <h4 style="color:red;">Informacion de Propietario</h4>
                            </div>
                            <div class="form-group col-12">
                                <label>Nombre completo <b title="Campo Obligatorio" style="color:red">*</b></label>
                                <input type="text" id="nombrecom" name="nombrecom" onkeyup="mayusculas(this);"
                                    class="form-control  <?php echo form_error('nombrecom') ? 'is-invalid' : ''; ?>"
                                    placeholder="Nombre completo" value="<?php echo set_value('nombrecom'); ?>">
                                <div class="invalid-feedback">
                                    <?php echo form_error('nombrecom'); ?>
                                </div>
                            </div>
                            <hr style="border-top: 1px solid rgba(0, 0, 0, 0.17);">
                            <div class="form-group col-1">
                                <label>Nacionalidad </label>
                                <select class="default-select2 form-control " id="tipo_ced" name="tipo_ced" readonly>
                                    <option value="V">V</option>
                                    <option value="E">E</option>
                                    <option value="P">P</option>
                                </select>

                            </div>
                            <div class="form-group col-3">
                                <label>Cédula de Identidad <b title="Campo Obligatorio" style="color:red">*</b></label>
                                <input type="text" id="cedula" name="cedula"
                                    placeholder="ingrese la Cédula sin punto ni coma"
                                    class="form-control  <?php echo form_error('cedula') ? 'is-invalid' : ''; ?>"
                                    value="<?php echo set_value('cedula'); ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('cedula'); ?>
                                </div>
                            </div>

                            <div class="form-group col-2">
                                <label>Teléfono <b title="Campo Obligatorio" style="color:red">*</b></label>
                                <input type="text" id="tele_1" name="tele_1" placeholder="Teléfono 1"
                                    class="form-control <?php echo form_error('tele_1') ? 'is-invalid' : ''; ?>"
                                    value="<?php echo set_value('tele_1'); ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('tele_1'); ?>
                                </div>
                            </div>
                            <div class="form-group col-4">
                                <label>Correo <b title="Campo Obligatorio" style="color:red">*</b></label>
                                <input type="text" name="email" id="email"
                                    class="form-control <?php echo form_error('email') ? 'is-invalid' : ''; ?>"
                                    aria-describedby="emailHelp" placeholder="Correo eléctronico"
                                    value="<?php echo set_value('email'); ?>">
                                <div class="invalid-feedback">
                                    <?php echo form_error('email'); ?>
                                </div>
                            </div>
                            <div class="form-group col-2">
                                <label>Tipo </label>
                                <select class="default-select2 form-control " id="tipo" name="tipo" readonly>
                                    <option value="0">Selecione</option>
                                    <option value="principal">Principal</option>
                                    <option value="socio">Socio</option>

                                </select>

                            </div>
                            <div class="col-12">
                                <h5 class="text-center"><b style="color:red;">NOTA:</b> Debe llenar todos lo items para
                                    llenar la tabla. <br>

                                </h5>
                            </div>
                            <div class="col-5"></div>
                            <div class="col-7 mt-4">
                                <button type="button" onclick="agregar_ff(this);" class="btn btn-lg btn-default"
                                    id="prueba2">
                                    Agregar <b>Propietario</b>
                                </button>
                            </div>
                            <div class="table-responsive mt-3">
                                <h5 class="text-center"><b style="color:red;">NOTA:</b> La tabla debe tener al menos un
                                    registro agregado, para proceder con la solicitud.</h5>
                                <table id="target_acc_ff" class="table table-bordered table-hover">
                                    <thead style="background:#e4e7e8;">
                                        <tr class="text-center">
                                            <th>Nombre y Apellido</th>
                                            <th>Nacionalidad</th>
                                            <th>Cedula</th>
                                            <th>Telefono</th>
                                            <th>Correo</th>
                                            <th>Tipo</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                            <div class="col-12">
                                <hr style="border-top: 1px solid rgba(0, 0, 0, 0.39);">
                            </div>
                            <div class="col-12 mt-2 text-center">
                                <h4 style="color:red;">Agregar Tripulación</h4>
                            </div>

                            <div class="form-group col-12">
                                <label>Nombre completo <b title="Campo Obligatorio" style="color:red">*</b></label>
                                <input type="text" id="nombrecomt" name="nombrecomt" class="form-control " />

                            </div>
                            <hr style="border-top: 1px solid rgba(0, 0, 0, 0.17);">
                            <div class="form-group col-1">
                                <label>Nacionalidad </label>
                                <select class="default-select2 form-control " id="tipo_cedt" name="tipo_cedt" readonly>
                                    <option value="0">Selecione</option>
                                    <option value="V">V</option>
                                    <option value="E">E</option>
                                    <option value="P">P</option>
                                </select>

                            </div>
                            <div class="form-group col-3">
                                <label>Cédula de Identidad <b title="Campo Obligatorio" style="color:red">*</b></label>
                                <input type="text" id="cedulat" name="cedulat"
                                    placeholder="ingrese la Cédula sin punto ni coma" class="form-control" />
                            </div>

                            <div class="form-group col-2">
                                <label>Teléfono <b title="Campo Obligatorio" style="color:red">*</b></label>
                                <input type="text" id="tele_1t" name="tele_1t" placeholder="Teléfono 1"
                                    class="form-control <?php echo form_error('tele_1') ? 'is-invalid' : ''; ?>"
                                    value="<?php echo set_value('tele_1'); ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('tele_1'); ?>
                                </div>
                            </div>
                            <div class="form-group col-4">
                                <label>Correo <b title="Campo Obligatorio" style="color:red">*</b></label>
                                <input type="text" name="emailt" id="emailt"
                                    class="form-control <?php echo form_error('email') ? 'is-invalid' : ''; ?>"
                                    aria-describedby="emailHelp" placeholder="Correo eléctronico"
                                    value="<?php echo set_value('email'); ?>">
                                <div class="invalid-feedback">
                                    <?php echo form_error('email'); ?>
                                </div>
                            </div>
                            <div class="form-group col-2">
                                <label>Cargo </label>
                                <input type="text" id="cargot" name="cargot" placeholder=""
                                    class="form-control <?php echo form_error('cargo') ? 'is-invalid' : ''; ?>"
                                    value="<?php echo set_value('cargo'); ?>" />

                            </div>

                            <div class="col-12">
                                <hr style="border-top: 1px solid rgba(0, 0, 0, 0.39);">
                            </div>
                            <h5 class="text-center"><b style="color:red;">NOTA:</b> La tabla debe tener al menos un
                                registro agregado, para proceder con la solicitud.</h5>

                            <div class="col-12 text-center">
                                <button type="button" onclick="agregar_ccnu_acc(this);" class="btn btn-lg btn-default">
                                    Agregar
                                </button>
                            </div>

                            <div class="table-responsive mt-4">
                                <h5 class="text-center">Lista de Requerimiento</h5>
                                <h5 class="text-center"><b style="color:red;">NOTA:</b> La tabla debe tener al menos un
                                    requerimiento agregado, para proceder con la solicitud.</h5>
                                <table id="target_req_acc" class="table table-bordered table-hover">
                                    <thead style="background:#e4e7e8;">
                                        <tr class="text-center">
                                            <th>Nompre y Apellido</th>
                                            <th>Nac.</th>
                                            <th>Cedula</th>
                                            <th>telf.</th>
                                            <th>Correp</th>
                                            <th>Cargo</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
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
<!-- <script src="<?=base_url()?>/js/programacion.js"></script> -->
<!-- <script src="<?=base_url()?>/js/bien/calculos_bienes.js"></script> -->
<!-- Agegar Propietario -->
<script src="<?=base_url()?>/js/bien/agregar_ff.js"></script>
<!-- Agegar Tripulacion -->
<script src="<?=base_url()?>/js/bien/agregar_ip.js"></script>
<!-- Calcular cannon -->
<script src="<?=base_url()?>/js/bien/calculo_canon.js"></script>
<!-- Registrar -->
<script src="<?=base_url()?>/js/bien/registro.js"></script>
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