<div class="sidebar-bg"></div>
<div id="content" class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-inverse" data-sortable-id="form-validation-1">
                <div class="panel-heading">
                    <h4 class="panel-title">Registro de Buque </h4>
                    <div class="col-md-8 mt-2">
                        <?php if ($this->session->userdata('session')) { ?>
                        <li class="nav-item">
                            <a class="btn btn-light btn-lg" href="<?= base_url() ?>index.php/user/verpropietario"><i
                                    class="ion-plus"></i> Volver</a>
                        </li>
                        <?php } ?>
                    </div>
                </div>
                <div class="panel-body"> 
                    <form action="<?=base_url()?>index.php/Buque/savebuques" class="form-horizontal"
                        data-parsley-validate="true" name="demo-form" method="POST">
                        <div class="row">

                            <div class="form-group col-6">
                                <label>Nombre del Buque <b title="Campo Obligatorio" style="color:red">*</b></label>
                                <input type="text" name="nombrebuque" onkeyup="mayusculas(this);"
                                    class="form-control  <?php echo form_error('nombrebuque') ? 'is-invalid' : ''; ?>"
                                    onKeyUp="mayus(this);" value="<?php echo set_value('nombrebuque'); ?>">
                                <div class="invalid-feedback">
                                    <?php echo form_error('nombrebuque'); ?>
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label>Matrícula <b title="Campo Obligatorio" style="color:red">*</b></label>
                                <input type="text" name="matricula" onkeyup="mayusculas(this);"
                                    class="form-control  <?php echo form_error('matricula') ? 'is-invalid' : ''; ?>"
                                    onKeyUp="mayus(this);" value="<?php echo set_value('matricula'); ?>">
                                <div class="invalid-feedback">
                                    <?php echo form_error('matricula'); ?>
                                </div>
                            </div>
                            <div class="form-group col-1">
                                <label>Trailers <b title="Campo Obligatorio" style="color:red">*</b></label>

                                <select class="default-select2 form-control " id="trailer" name="trailer" readonly>
                                    <option value="Si">Si</option>
                                    <option value="No">No</option>
                                </select>

                            </div>
                            <div class="form-group col-2">
                                <label>Pies <b title="Campo Obligatorio" style="color:red">*</b></label>
                                <input type="text" id="pie" name="pie" placeholder="ingrese la Cédula sin punto ni coma"
                                    class="form-control  <?php echo form_error('pie') ? 'is-invalid' : ''; ?>"
                                    value="<?php echo set_value('pie'); ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('pie'); ?>
                                </div>
                            </div>

                            <div class="form-group col-2">
                                <label>Tipo <b title="Campo Obligatorio" style="color:red">*</b></label>
                                <input type="text" id="tipo" name="tipo" placeholder="Teléfono 1"
                                    class="form-control <?php echo form_error('tipo') ? 'is-invalid' : ''; ?>"
                                    value="<?php echo set_value('tipo'); ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('tipo'); ?>
                                </div>
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
                                    class="form-control <?php echo form_error('puntal') ? 'is-invalid' : ''; ?>"
                                    value="<?php echo set_value('puntal'); ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('puntal'); ?>
                                </div>
                            </div>
                            <div class="form-group col-2">
                                <label>Bruto <b title="Campo Obligatorio" style="color:red">*</b></label>
                                <input type="text" id="bruto" name="bruto" placeholder="bruto"
                                    class="form-control <?php echo form_error('bruto') ? 'is-invalid' : ''; ?>"
                                    value="<?php echo set_value('bruto'); ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('bruto'); ?>
                                </div>
                            </div>

                            <div class="form-group col-2">
                                <label>Neto <b title="Campo Obligatorio" style="color:red">*</b></label>
                                <input type="text" id="neto" name="neto" placeholder="neto"
                                    class="form-control <?php echo form_error('neto') ? 'is-invalid' : ''; ?>"
                                    value="<?php echo set_value('neto'); ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('neto'); ?>
                                </div>
                            </div>
                            
                            <div class="panel panel-inverse col-12">
                                <div class="panel-heading">
                                    <h4 class="text-center mb-1 mt-1 "><b>Datos del Propietario</b></h4>
                                </div>

                            </div>
                            <div class="form-group col-3">
                                <label>Nombre completo <b title="Campo Obligatorio" style="color:red">*</b></label>
                                <input type="text" name="nombrecom" onkeyup="mayusculas(this);"
                                    class="form-control  <?php echo form_error('nombrecom') ? 'is-invalid' : ''; ?>"
                                    placeholder="Nombre completo" onKeyUp="mayus(this);"
                                    value="<?php echo set_value('nombrecom'); ?>">
                                <div class="invalid-feedback">
                                    <?php echo form_error('nombrecom'); ?>
                                </div>
                            </div>
                            <div class="form-group col-3">
                                <label>Apellido Completo <b title="Campo Obligatorio" style="color:red">*</b></label>
                                <input type="text" name="apellido" onkeyup="mayusculas(this);"
                                    class="form-control  <?php echo form_error('apellido') ? 'is-invalid' : ''; ?>"
                                    placeholder="Nombre completo" onKeyUp="mayus(this);"
                                    value="<?php echo set_value('apellido'); ?>">
                                <div class="invalid-feedback">
                                    <?php echo form_error('apellido'); ?>
                                </div>

                            </div>
                            <div class="form-group col-1">
                                <label>Nacionalidad </label>
                                <select class="default-select2 form-control " id="tipo_ced" name="tipo_ced" readonly>
                                    <option value="v">V</option>
                                    <option value="e">E</option>
                                    <option value="p">P</option>
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
                            <div class="form-group col-6">
                                <label>Correo <b title="Campo Obligatorio" style="color:red">*</b></label>
                                <input type="text" name="email"
                                    class="form-control <?php echo form_error('email') ? 'is-invalid' : ''; ?>"
                                    aria-describedby="emailHelp" placeholder="Correo eléctronico"
                                    value="<?php echo set_value('email'); ?>">
                                <div class="invalid-feedback">
                                    <?php echo form_error('email'); ?>
                                </div>
                            </div>


                        </div>
                </div>
                <div class="form-group col 12 text-center">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<?php if ($this->session->flashdata('sa-error')) { ?>
<div hidden id="success"> <?= $this->session->flashdata('success') ?> </div>
<?php } ?>
<script type="text/javascript">
function mayusculas(e) {
    e.value = e.value.toUpperCase();
}
</script>


<script>
<?php if($this->session->flashdata("success")): ?>

Swal.fire({
    icon: 'success',
    title: 'Guardado Con exito',
    text: '<?php echo $this->session->flashdata("success"); ?>',
});
<?php endif; ?>
</script>
<script src="<?=base_url()?>/js/contratista/contratista.js"></script>