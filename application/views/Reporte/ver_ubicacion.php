<div class="sidebar-bg"></div>
<div id="content" class="content">
    <div class="row">
        <div class="col-1 mb-3">
            <button class="btn btn-circle waves-effect waves-circle waves-float btn-primary" type="submit"
                onclick="printDiv('areaImprimir');" name="action">Imprimir</button>
        </div>
        <div class="col-lg-12">
            <div class="panel panel-inverse">
                <div class="row" id="imp1">
                    <div class="col-1"></div>
                    <div class="col-10 mt-4">
                        <div class="card card-outline-danger text-center bg-white">
                            <div class="card-block">
                                <blockquote class="card-blockquote" style="margin-bottom: -19px;">
                                    <p class="f-s-18 text-inverse f-w-600"> <?=$descripcion?>.</p>
                                    <p class="f-s-16">RIF.: <?=$desde?> <br>
                                    <p class="f-s-16">RIF.: <?=$hasta?> <br>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-11 mt-3 ml-5">
                        <div class="form-group row col-6">
                            <label class="col-form-label col-md-6 text-right">Total Embarcaciones</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control text-center" value="<?=$fecha?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row col-6">
                            <label class="col-form-label col-md-6 text-right">Total Embarcaciones en Agua</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control text-center" value="<?=$agua?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row col-6">
                            <label class="col-form-label col-md-6 text-right">Total Embarcaciones en Tierra</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control text-center" value="<?=$tierra?>" readonly>
                            </div>
                        </div>
                        
                    </div>

                    <div class="form-group col-5">
                            <label>Total Muelle 1A <b title="Campo Obligatorio" style="color:red">*</b></label>
                            <h3><input type="text" class="form-control text-center" value="<?=$muelle1a?>" readonly> </h3>
                        </div>
                        <div class="form-group col-5">
                            <label>PATIO 1 <b title="Campo Obligatorio" style="color:red">*</b></label>
                            <h3><h3><input type="text" class="form-control text-center" value="<?=$patio1?>" readonly> </h3> </h3>
                        </div>
                        <div class="form-group col-5">
                            <label>Total Muelle 2A <b title="Campo Obligatorio" style="color:red">*</b></label>
                            <h3><h3><input type="text" class="form-control text-center" value="<?=$muelle2a?>" readonly> </h3> </h3>
                        </div>
                        <div class="form-group col-5">
                            <label>PATIO 2 <b title="Campo Obligatorio" style="color:red">*</b></label>
                            <h3><h3><input type="text" class="form-control text-center" value="<?=$patio2?>" readonly> </h3> </h3>
                        </div>
                        <div class="form-group col-4">
                            <label>Total Muelle MUELLE B <b title="Campo Obligatorio" style="color:red">*</b></label>
                            <h3><h3><input type="text" class="form-control text-center" value="<?=$muelleb?>" readonly> </h3> </h3>
                        </div>
                        <div class="form-group col-4">
                            <label>Total Muelle MUELLE C <b title="Campo Obligatorio" style="color:red">*</b></label>
                            <h3><h3><input type="text" class="form-control text-center" value="<?=$muellec?>" readonly> </h3> </h3>
                        </div>
                        <div class="form-group col-4">
                            <label>MUELLE D <b title="Campo Obligatorio" style="color:red">*</b></label>
                            <h3><h3><input type="text" class="form-control text-center" value="<?=$muelled?>" readonly> </h3> </h3>
                        </div>
                        
                    <hr style=" border-top: 1px solid rgba(0, 0, 0, 0.17);">
                    <div class="col-1"></div>
                    <div class="col-6"></div>




                </div>
                <div class="col-12 text-center mt-3 mb-3">
                    <a class="btn btn-circle waves-effect btn-lg waves-circle waves-float btn-primary"
                        href="javascript:history.back()"> Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>

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

<script type="text/javascript">
function printDiv(nombreDiv) {
    var contenido = document.getElementById('imp1').innerHTML;
    var contenidoOriginal = document.body.innerHTML;

    document.body.innerHTML = contenido;

    window.print();

    document.body.innerHTML = contenidoOriginal;
}
</script>