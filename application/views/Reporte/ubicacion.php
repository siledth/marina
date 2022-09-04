<div class="sidebar-bg"></div>
<div id="content" class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-inverse" data-sortable-id="form-validation-1">
                <form action="<?=base_url()?>index.php/Reporte/ubicar" data-parsley-validate="true" method="POST">
                    <div class="row" id="imp1">
                        <div class="col-1"></div>
                        <div class="col-10 mt-4">
                            <div class="card card-outline-danger text-center bg-white">
                                <div class="card-block">
                                    <blockquote class="card-blockquote" style="margin-bottom: -19px;">
                                        <p class="f-s-18 text-inverse f-w-600"> <?=$descripcion?>.</p>
                                        <p class="f-s-16">RIF.: <?=$rif?> <br>
                                        <h4 class="mt-2"> <b>Reporte por ubicación </b></h4>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                        <div class="p-2 flex-fill bd-highlight" id="camposFechas">

                        <h2 class="mt-2"> <b>Seleccione Los Rangos de Fecha </b></h2>
                            <div class="form-group">
                                <label for="txtDesde"><i class="ion-calendar"></i> Desde</label>
                                <input type="date"
                                    class="form-control <?php echo form_error('desde') ? 'is-invalid' : ''; ?>"
                                    placeholder="Desde" id="desde" name="desde"/>
                                <div class="invalid-feedback">
                                    <?php echo form_error('desde'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtHasta"><i class="ion-calendar"></i> Hasta</label>
                                <input type="date"
                                    class="form-control <?php echo form_error('hasta') ? 'is-invalid' : ''; ?>"
                                    placeholder="Hasta" id="hasta" name="hasta" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('hasta'); ?>
                                </div>
                            </div>


                        </div>

                        <div class="col-1 text-center mt-3">

                            <div type="submit" class="ml-auto p-2 bd-highlight"><button
                                    class="btn btn-primary btn-lg"><i class="ion-search"> </i>Filtrar</button></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php if ($this->session->flashdata('sa-error')) { ?>
  <div hidden id="success"> <?= $this->session->flashdata('success') ?> </div>
<?php } ?>