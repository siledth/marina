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

                        
                        <div class="p-2 flex-fill bd-highlight" >
                            <div>
                                <div class="form-group">
                                    <label for="txtDesde"><i class="ion-calendar"></i> Desde</label>
                                    <input type="date" class="form-control" placeholder="Desde"name="desde" id="desde" />
                                    <small id="errDesde" class="form-text text-danger"></small>
                                </div>
                                <div class="form-group">
                                    <label for="txtHasta"><i class="ion-calendar"></i> Hasta</label>
                                    <input type="date" class="form-control" placeholder="Hasta" name="hasta" id="hasta" />
                                    <small id="errHasta" class="form-text text-danger"></small>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-1 text-center mt-3">

                            <div type="submit" class="ml-auto p-2 bd-highlight"><button class="btn btn-primary btn-lg"
                                   ><i class="ion-search"> </i>Filtrar</button></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>