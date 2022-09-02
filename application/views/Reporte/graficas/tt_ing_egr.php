<div class="sidebar-bg"></div>
<div id="content" class="content">
    <div class="col-lg-12">
        <div class="panel panel-inverse">
            <form action="<?=base_url()?>index.php/Reporte/bus_x_tpago" method="POST">
                <div class="row" id="imp1">
                    <div class="col-1"></div>
                    <div class="col-10 mt-4">
                        <div class="card card-outline-danger text-center bg-white">
                            <div class="card-block">
                                <blockquote class="card-blockquote" style="margin-bottom: -19px;">
                                    <p class="f-s-18 text-inverse f-w-600"> <?=$descripcion?>.</p>
                                    <p class="f-s-16">RIF.: <?=$rif?> <br>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <h4 class="text-center"> <b>Parametros de Búsqueda</b></h4>
                    </div>
                    <div class="form-group mt-3 ml-5 row col-8">
                        <label class="col-md-3 col-form-label">Rango de Fecha:</label>
                        <div class="col-md-9">
                            <div class="input-group input-daterange">
                                <input type="text" class="form-control" id="start" name="start" placeholder="Fecha desde" />
                                <span class="input-group-addon">a</span>
                                <input type="text" class="form-control" id="end" name="end" placeholder="Fecha hasta" />
                            </div>
                        </div>
                    </div>
                    <div class="col-1 text-center mt-3">
                        <a onclick="buscar_total();" class="btn btn-success btn-icon btn-circle btn-lg">
                            <i style="color: white" class="mt-2 fas fa-search"></i>
                        </a>
                    </div>

                    <div class="col-12">
                        <h4 class="text-center" id="mensaje" style="display:none"> <b style="color:red">Nota:</b>Por favor espere mientras se genera la información Completa</h4>
                    </div>
                    <div class="col-2"></div>
                    <div class="col-lg-8">
                        <div class="panel panel-inverse" data-sortable-id="chart-js-4">
                            <div class="panel-heading">
                                <h4 class="panel-title text-center">Resultados de la Gráfica</h4>
                            </div>
                            <div class="panel-body">
                                <div>
                                    <canvas id="miGrafico"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="<?= base_url() ?>/js/bien/reporte.js"></script>