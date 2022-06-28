<div class="sidebar-bg"></div>
<div id="content" class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-inverse" data-sortable-id="form-validation-1">
                <div class="panel-heading">
                    <h4 class="panel-title">Registro de Prpietarios </h4>
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
                    <form action="<?=base_url()?>index.php/User/propietar" class="form-horizontal"
                        data-parsley-validate="true" name="demo-form" method="POST">
                        <div class="row">
                                                      
                            <div class="form-group col-6">
                                <label>Nombre completo <b title="Campo Obligatorio" style="color:red">*</b></label>
                                <input type="text" name="nombrecom" onkeyup="mayusculas(this);"
                                    class="form-control  <?php echo form_error('nombrecom') ? 'is-invalid' : ''; ?>"
                                    placeholder="Nombre completo" onKeyUp="mayus(this);"
                                    value="<?php echo set_value('nombrecom'); ?>">
                                <div class="invalid-feedback">
                                    <?php echo form_error('nombrecom'); ?>
                                </div>
                            </div>
                            <div class="form-group col-6">
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

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