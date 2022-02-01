<div class="sidebar-bg"></div>
<div id="content" class="content">
    <h2>Modificación Barco</h2>
    <div class="row">
        <div class="col-lg-12">
            
            <div class="col-lg-12">
                <div class="panel panel-inverse">
                <div class="panel-heading"></div>
				<div class="table-responsive">
					<table id="records" class="table table-bordered table-hover">
						<thead style="background:#e4e7e8">
							<tr>
								<th>Nombre Barco</th>
                                <th>Matricula</th>
								<th>Acción</th>
							</tr>
						</thead>
						<tbody>
                            <?php foreach($buque as $data):?>
                            <tr class="odd gradeX" style="text-align:center">
                               
                                <td><?=$data['nombrebuque']?> </td>
                                <td><?=$data['matricula']?> </td>
                              
                                
                                <td class="center">
									<a class="button">
                                        <i title="Editar" onclick="modal_ver_tc(<?php echo $data['id']?>);" data-toggle="modal" data-target="#exampleModal" class="fas fa-lg fa-fw fa-edit" style="color:green"></i>
                                    <a/>
									
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
					</table>
				</div>
            </div>
        </div>
	</div>
</div>

<script src="<?=base_url()?>/js/mod_buque.js"></script>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modificación de Barco</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" data-sortable-id="form-validation-1">
				<form class="form-horizontal" id="editar" data-parsley-validate="true" method="POST" enctype="multipart/form-data">
			    	<div class="row">
                        <div class="form-group col-4">
                            <label></label>
                            <input class="form-control" type="hidden" name="id" id="id" readonly>
                        </div>
                        <div class="form-group col-4">
                            <label>Matricula</label>
                            <input class="form-control" type="text" name="matricula_edit" id="matricula_edit" readonly>
                        </div>
                        <div class="col-8"></div>
                        <div class="form-group col-12">
                            <label>Nombre del Buque </label>
                            <input type="text" class="form-control"  onkeypress="may(this);" id="nombrebuque_edit" name="nombrebuque_edit">
                        </div>
                        <div class="col-4"></div>
                        <div class="form-group col-12">
                            <label>Color</label>
                            <input type="text" class="form-control"  onkeypress="may(this);" id="color_edit" name="color_edit">
                        </div>
                        <div class="form-group col-12">
                            <label>Ubicacion</label>
                            <input type="text" class="form-control"  onkeypress="may(this);" id="ubicacion_edit" name="ubicacion_edit">
                        </div>
                        <div class="form-group col-12">
                            <label>Trailer</label>
                            <input type="text" class="form-control"  onkeypress="may(this);" id="trailer_edit" name="trailer_edit">
                        </div>
					</div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="javascript:window.location.reload()" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" onclick="editar_tc();" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
