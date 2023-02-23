<div class="sidebar-bg"></div>
<div id="content" class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-inverse">
                <form action="<?=base_url()?>index.php/Reporte/bus_ubicacion" method="POST">
                    <div class="row" id="imp1">
                        <div class="col-1"></div>
                        <div class="col-10 mt-4">
                            <div class="card card-outline-danger text-center bg-white">
                                <div class="card-block">
                                    <blockquote class="card-blockquote" style="margin-bottom: -19px;">
                                        <p class="f-s-18 text-inverse f-w-600"> <?=$propietario['nombrecom']?>.</p>
                                        <p class="f-s-16">RIF.: <?=$rif?> <br>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                        <div class="row col-12">
                            <div class="col-6">
                                <h5>Información del buque</h5>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
