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
                                    <p class="f-s-16">RIF.: <?=$rif?> <br>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-10 mt-3">
                        <h3 class="text-center">Listado de Barcos</h3>
                        <table id="data-table-default" class="table table-bordered table-hover">
                            <thead style="background:#e4e7e8">
                                <tr class="text-center">
                                    
                                    <th class="text-nowrap">Nombre del Buque</th>
                                    <th class="text-nowrap">Embarcación/Matricula</th>
                                    <th class="text-nowrap">canon</th>
                                    <th class="text-nowrap">Fecha Deuda</th>
                                    <th class="text-nowrap">Estatus</th>
                                    <th class="text-nowrap"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($canon as $lista):?>
                                <tr class="odd gradeX" style="text-align:center">
                                        <td><?=$lista['nombrebuque']?></td>
                                        <td><?=$lista['matricula']?></td>
                                        <td><?=$lista['pies']?></td>
                                        <td><?=$lista['canon']?></td>
                                        <td><?=$lista['fecha_pago']?></td>
                                    <td class="center">
                                       
                                    </td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                    <hr style=" border-top: 1px solid rgba(0, 0, 0, 0.17);">
                    <div class="col-1"></div>
                    <div class="col-6"></div>
                    <div class="col-2">
                        <label>Barcos Existente<b title="Campo Obligatorio" style="color:red">*</b></label>
                        <?php foreach ($total as $data): ?>
                        <input wide type="text" name="total1" id="total1" class="form-control" 
                            value="<?=$data['totalbarco']?>" style="text-align:center" readonly>
                        <?php endforeach; ?>
                    </div>
                    <div class="form-group col-2">
                        <label>Total de Ingresos $<b title="Campo Obligatorio" style="color:red">*</b></label>
                        <?php foreach ($total as $data): ?>
                        <input SIZE=20  type="text" name="total1" id="total12" class="form-control" 
                            value="<?=number_format($data['totalcanon']);?>$ " style="text-align:right" readonly>
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
