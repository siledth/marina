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
                    <div class="form-group col-1">
                        <img style="width: 150%" height="100%" src=" <?= base_url() ?>Plantilla/img/logo.jpeg"
                            alt="Card image">
                    </div>
                    <div class="col-1"></div>
                    <div class="col-10 mt-2">
                        <div class="card card-outline-danger text-center bg-white">
                            <h4 class="mt-2"> <b><?=$descripcion?></b></h4>
                            <h5>RIF.: <?=$rif?></h5>
                            <h5>Fecha Impresión: <?=$time ?> </h5>
                        </div>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-11 mt-3 ml-5">
                        <h3 class="text-center">Reporte de Embarcaciones que poseen Cuentas Por cobrar </h3>
                        <table id="data-table-default" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th width="5%" class="text-nowrap">Nombre de la Embarcación</th>
                                    <th width="15%" class="text-nowrap">Matricula</th>
                                    <th width="5%" class="text-nowrap">Pies</th>
                                    <th width="5%" class="text-nowrap">Total</th>
                                    <th width="15%" class="text-nowrap" style="text-align:center">Mes</th>
                                    <th width="5%" class="text-nowrap">Ubicación</th>
                                

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($canon as $lista) : ?>
                                <tr class="odd gradeX">
                                    <td><?= $lista['nombrebuque'] ?></td>
                                    <td><?= $lista['matricula'] ?></td>
                                    <td><?= $lista['pies'] ?></td>
                                    <td><?= $lista['total'] ?></td>
                                    <td style="text-align:center"><?= $lista['string_agg']?></td>
                                    <td><?= $lista['desc_concepto'] ?></td>
                                  

                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <hr style=" border-top: 1px solid rgba(0, 0, 0, 0.17);">
                    <div class="col-1"></div>

                    <div class="col-3">
                        <label>Total de Pie<b title="Campo Obligatorio" style="color:red">*</b></label>
                        <?php foreach ($total as $data): ?>
                        <input wide type="text" name="total1" id="total1" class="form-control"
                            value="<?=$data['pies']?>" style="text-align:right" readonly>
                        <?php endforeach; ?>
                    </div>
                    <div class="form-group col-3">
                        <label>Total de Cuentas por Cobrar $<b title="Campo Obligatorio" style="color:red">*</b></label>
                        <?php foreach ($total as $data): ?>
                        <input SIZE="5" type="text" name="total1" id="total12" class="form-control"
                            value="<?=number_format($data['canon']);?>$ " style="text-align:right" readonly>
                        <?php endforeach; ?>
                    </div>


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