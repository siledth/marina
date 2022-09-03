<div class="sidebar-bg"></div>
<div id="content" class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-inverse">
                <form action="<?=base_url()?>index.php/Reporte/ubicar" method="POST">
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
                        <div class="col-12">


                            <div class="fechas">
                                <input type="date" id="desde" name="desde" class="dt-fecha">desde
                                <input type="date" id="hasta" name="hasta" class="dt-fecha">
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