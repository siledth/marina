
function agregar_ccnu_acc(button) {
	var row = button.parentNode.parentNode;
  	var cells = row.querySelectorAll('td:not(:last-of-type)');
  	agregar_ccnu_accToCartTable(cells);

}

function remove_proy_acc() { 
	var row = this.parentNode.parentNode;
    document.querySelector('#target_req_acc tbody').removeChild(row);
	$("#nombrecomt").val($("#nombrecomt").data("default-value"));
	$("#tipo_cedt").val($("#tipo_cedt").data("default-value"));
	$("#cedulat").val('');
	$("#tele_1t").val('');
	$("#emailt").val('');
	$("#cargot").val('');
	
}

function agregar_ccnu_accToCartTable(cells){
	var nombrecomt = $("#nombrecomt").val();
	var tipo_cedt = $("#tipo_cedt").val();
 	var cedulat = $("#cedulat").val();
	var tele_1t = $("#tele_1t").val();
 	var emailt  = $("#emailt").val();
   	var cargot  = $("#cargot").val();
	var autor  = $("#autor").val();
   	
	if (nombrecomt == '' || cedulat == '' || cargot == ''  ){

		if (nombrecomt== '') {
			document.getElementById("nombrecomt").focus();
		}
		else if (cedulat =='') {
			document.getElementById("cedulat").focus();
		}
		else if (cargot == '') {
			document.getElementById("cargot").focus();
		}
		
	}else{
		var newRow = document.createElement('tr');
		var increment = increment +1;
		newRow.className='myTr';
		newRow.innerHTML = `
		<td>${nombrecomt}<input type="text" name="nombrecomt[]" id="ins-type-${increment}" hidden value="${nombrecomt}"></td>

		<td>${tipo_cedt}<input type="text" name="tipo_cedt[]" id="ins-type-${increment}" hidden value="${tipo_cedt}"></td>

		<td>${cedulat}<input type="text" name="cedulat[]" id="ins-subtype-${increment}" hidden value="${cedulat}"></td>
		<td>${tele_1t}<input type="text" name="tele_1t[]" id="ins-subtype-${increment}" hidden value="${tele_1t}"></td>

		<td>${emailt}<input type="text" hidden name="emaitl[]" id="ins-pres-${increment}" value="${emailt}"></td>

		<td>${cargot}<input type="text" hidden name="cargot[]" id="ins-pres-${increment}" value="${cargot}"></td>
		<td>${autor}<input type="text" hidden name="autor[]" id="ins-pres-${increment}" value="${autor}"></td>

		
		`;

		var cellremove_proy_accBtn = createCell();

		cellremove_proy_accBtn.appendChild(createremove_proy_accBtn())
		newRow.appendChild(cellremove_proy_accBtn);
		document.querySelector('#target_req_acc tbody').appendChild(newRow);
		$("#nombrecomt").val($("#nombrecomt").data("default-value"));
		$("#tipo_cedt").val($("#tipo_cedt").data("default-value"));

		$("#cedulat").val('');
		$("#tele_1t").val('');
		$("#emailt").val('');
		$("#cargot").val('');
		

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
