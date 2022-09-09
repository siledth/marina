<div class="sidebar-bg"></div>
<div id="content" class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-inverse">
                <form action="<?=base_url()?>index.php/Reporte/bus_x_tpago_detallado" method="POST">
                    <div class="row" id="imp1">
                        <div class="col-1"></div>
                        <div class="col-10 mt-4">
                            <div class="card card-outline-danger text-center bg-white">
                                <div class="card-block">
                                    <blockquote class="card-blockquote" style="margin-bottom: -19px;">
                                        <p class="f-s-18 text-inverse f-w-600"> <?=$descripcion?>.</p>
                                        <p class="f-s-16">RIF.: <?=$rif?> <br>
                                        <h4 class="mt-2"> <b>CONDICIÓN DE PAGO</b></h3>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                        <h4 class="text-center"> <b>Parametros de Búsqueda</b></h4>
                        </div>
                        <div class="form-group row col-4 mt-3 ml-5">
                            <label class="col-md-4 col-form-label">Tipo de Pago:</label>
                            <div class="col-md-7">
                                <select class="form-control" name="t_pago" id="t_pago">
                                <option value="0">Todos</option>
                            
                                </select>
                            </div>
                        </div>
                        <div class="form-group mt-3 row">
                            <label class="col-md-3 col-form-label">Rango de Fecha:</label>
                            <div class="col-md-8">
                                <div class="input-group input-daterange">
                                    <input type="text" class="form-control" id="start" name="start" placeholder="Fecha desde" />
                                    <span class="input-group-addon">a</span>
                                    <input type="text" class="form-control" id="end" name="end" placeholder="Fecha hasta" />
                                </div>
                            </div>
                        </div>

                        <!-- <a onclick="buscar_total();" class="btn btn-success btn-icon btn-circle btn-lg">
                            <i style="color: white" class="mt-2 fas fa-search"></i>
                        </a> -->
                        <div class="col-1 text-center mt-3">
                            <button type="submit" class="btn btn-success btn-icon btn-circle btn-lg"><i style="color: white" class="mt-2 fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url() ?>/js/bien/reporte.js"></script>