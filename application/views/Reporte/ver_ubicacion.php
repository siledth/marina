<div class="sidebar-bg"></div>
<div id="content" class="content">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-1 mb-3">
                <a class="btn btn-circle waves-effect  waves-circle waves-float btn-primary"
                    href="javascript:history.back()"> Volver</a>
            </div>
            <div class="col-1 mb-3">
                <button class="btn btn-circle waves-effect waves-circle waves-float btn-primary" type="submit"
                    onclick="printDiv('areaImprimir');" name="action">Imprimir</button>
            </div> 
        </div>
        <div class="row" id="imp1">
            <div class="panel panel-inverse">
                <div class="panel-body">
                    <div class="row">
                        <div class="form-group col-1">
                            <img style="width: 200%" height="100%" src=" <?= base_url() ?>Plantilla/img/logo.jpeg"
                                alt="Card image">
                        </div>
                        <div class="col-1"></div>
                        <div class="col-10 mt-2">
                            <div class="card card-outline-danger text-center bg-white">
                                <h4 class="mt-2"> <b>Corporación Ormux 2020, CA</b></h3>
                                <h5>RIF.: <?=$rif?></h5>
                                <h5>Fecha Impresión: <?=$time ?> </h5>
                                <h5>Desde: <?=$desde ?> </h5>
                                <h5>Hasta: <?=$hasta ?> </h5>
                            </div>
                        </div>
                        <div class="form-group col-5">
                            <label>Total Embarcaciones <b title="Campo Obligatorio" style="color:red">*</b></label>
                            <h3><b><?=$fecha?></b> </h3>
                                                  
                        </div>
                        
                        <div class="form-group col-3">
                            <label>Total Embarcaciones En Agua <b title="Campo Obligatorio" style="color:red">*</b></label>
                            <h3><b><?= $agua?></b> </h3>
     
                            
                        </div>
                        <div class="form-group col-3">
                            <label>Total Embarcaciones En Tierra <b title="Campo Obligatorio" style="color:red">*</b></label>
                            <h3><b><?=$tierra?></b> </h3> 
                                
                        </div>
                                                
                      
                        <div class="col-12 text-center">
                        <hr style="border-top: 1px solid rgba(0, 0, 0, 0.39);">
                            <h4 style="color:red;"> Embarcación en Agua</h4>
                           
                        </div>
                        <div class="col-3">
                            <label>Total Muelle 1A</label>
                            <h3><b><?=$muelle1a?></b> </h3>
                                
                        </div>
                        <div class="col-3">
                            <label>Total Muelle 2A </label>
                            <h3><b><?=$muelle2a?></b> </h3>
                                
                        </div>
                        <div class="form-group col-2">
                            <label>Total Muelle MUELLE B<b title="Campo Obligatorio" style="color:red">*</b></label>
                            <h3><b><?=$muelleb?></b> </h3>
                               
                        </div>
                  
                        <div class="form-group col-4">
                            <label>Total Muelle MUELLE C<b title="Campo Obligatorio" style="color:red">*</b></label>
                            <h3><b><?=$muellec?></b></h3> 
                                
                        </div>
                        <div class="form-group col-7">
                            <label> Total Muelle D<b title="Campo Obligatorio" style="color:red">*</b></label>
                            <h3><b><?=$muelled?></b> </h3> 
                                
                        </div> 
                        <div class="form-group col-3">
                           
                        </div>
                       
                      
                        <div class="col-12 text-center">
                        <hr style="border-top: 1px solid rgba(0, 0, 0, 0.39);">
                            <h4 style="color:red;"> Embarcación en Patio</h3>
                        
                        </div>
                        <div class="form-group col-3">
                            <label> Total Patio 1<b title="Campo Obligatorio" style="color:red">*</b></label>
                            <h3><b><?=$patio1?></b> </h3> 
                              
                        </div> 
                        <div class="form-group col-3">
                            <label> Total Patio 2<b title="Campo Obligatorio" style="color:red">*</b></label>
                            <h3><b><?=$patio2?></b> </h3> 
                               
                        </div> 
                        
                       
                       

                        <div class="col-12">
                            <hr style="border-top: 1px solid rgba(0, 0, 0, 0.39);">
                        </div>
                        
                        
                        
                        
                        
                        
                        <div class="col-6"></div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
function printDiv(nombreDiv) {
    var contenido = document.getElementById('imp1').innerHTML;
    var contenidoOriginal = document.body.innerHTML;

    document.body.innerHTML = contenido;

    window.print();

    document.body.innerHTML = contenidoOriginal;
}
</script>