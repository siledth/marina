
function agregar_ccnu_acc(button) {
	var row = button.parentNode.parentNode;
  	var cells = row.querySelectorAll('td:not(:last-of-type)');
  	agregar_ccnu_accToCartTable(cells);

}

function remove_proy_acc() { 
	var row = this.parentNode.parentNode;
    document.querySelector('#target_req_acc tbody').removeChild(row);
    $("#dia").val($("#dia").data("default-value"));
	
	$("#tarifa").val($("#tarifa").data("default-value"));	
	$("#pies").val('');
	$("#canon").val('');
    $("#monto_estimado").val('');
    
    
    
	
}

function agregar_ccnu_accToCartTable(cells){
	var pies = $("#pies").val();
	var tarifa = $("#tarifa").val();
 	var dia = $("#dia").val();
	var canon = $("#canon").val();
    var matricular = $("#matricular").val();
    var ob = $("#ob").val();
    var monto_estimado = $("#monto_estimado").val();
    
    
    
 
	if (pies == '' || tarifa == '' || matricular == ''  ){

		if (pies== '') {
			document.getElementById("pies").focus();
		}
		else if (tarifa =='') {
			document.getElementById("tarifa").focus();
		}
		else if (matricular == '') {
			document.getElementById("matricula").focus();
		}
		
	}else{
		var newRow = document.createElement('tr');
		var increment = increment +1;
		newRow.className='myTr';
		newRow.innerHTML = `
       <td>${matricular}<input type="text" name="matricular[]" id="ins-subtype-${increment}" hidden value="${matricular}"></td>
       <td>${ob}<input type="text" name="ob[]" id="ins-subtype-${increment}" hidden value="${ob}"></td>
       <td>${pies}<input type="text" name="pies[]" id="ins-type-${increment}" hidden value="${pies}"></td>
		<td>${tarifa}<input type="text" name="tarifa[]" id="ins-type-${increment}" hidden value="${tarifa}"></td>
		<td>${dia}<input type="text" name="dia[]" id="ins-subtype-${increment}" hidden value="${dia}"></td>
        <td>${canon}<input type="text" name="canon[]" id="ins-subtype-${increment}" hidden value="${canon}"></td>
        <td>${monto_estimado}<input type="text" name="monto_estimado[]" id="ins-subtype-${increment}" hidden value="${monto_estimado}"></td>
       
        
		
		`;

		var cellremove_proy_accBtn = createCell();

		cellremove_proy_accBtn.appendChild(createremove_proy_accBtn())
		newRow.appendChild(cellremove_proy_accBtn);
		document.querySelector('#target_req_acc tbody').appendChild(newRow);
		$("#pies").val($("#pies").data("default-value"));
       
		$("#tarifa").val($("#tarifa").data("default-value"));
		
        $("#canon").val('');
        $("#monto_estimado").val('');
        
        
        

		$("#btn_guar_2").prop('disabled', false);
	}
}

function createremove_proy_accBtn() {
    var btnremove_proy_acc = document.createElement('button');
    btnremove_proy_acc.className = 'btn btn-xs btn-danger';
    btnremove_proy_acc.onclick = remove_proy_acc;
    btnremove_proy_acc.innerText = 'Descartar';
    return btnremove_proy_acc;
}

function createCell(text) {
	var td = document.createElement('td');
  if(text) {
  	td.innerText = text;
  }
  return td;
}
