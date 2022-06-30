
function agregar_ff(button) {
	var row = button.parentNode.parentNode;
  	var cells = row.querySelectorAll('td:not(:last-of-type)');
  	agregar_ffToCartTable(cells);
}

function remove_ff_acc() {
	var row = this.parentNode.parentNode;
    document.querySelector('#target_acc_ff tbody').removeChild(row);
	var par = $("#porcentaje").val('');
	$("#nombrecom").val($("#nombrecom").data("default-value"));
}

function agregar_ffToCartTable(cells){
	//var pp = $("#nombrecom").val();
	//var pp1 = pp.split("/")[0];
   	//var pp2 = pp.split("/")[1];
	//var pp3 = pp.split("/")[2];
	var nombrecom = $("#nombrecom").val();
	var tipo_ced = $("#tipo_ced").val();
	var cedula = $("#cedula").val();
	var tele_1 = $("#tele_1").val();
	var email = $("#email").val();
	var tipo = $("#tipo").val();


	if (nombrecom == '' || cedula == '' || tele_1 == '' ){
		if (nombrecom== '') {
			document.getElementById("nombrecom").focus();
		}else if (cedula== '') {
			document.getElementById("cedula").focus();
		}
		else if (tele_1 == '') {
			document.getElementById("tele_1").focus();
		}
	}else{
		var newRow = document.createElement('tr');
		var increment = increment +1;
		newRow.className='myTr';
		newRow.innerHTML = `
		<td>${nombrecom}<input type="text" name="nombrecom[]" id="ins-type-${increment}" hidden value="${nombrecom}"></td>
		<td>${tipo_ced}<input type="text" name="tipo_ced[]" id="ins-type-${increment}" hidden value="${tipo_ced}"></td>
		<td>${cedula}<input type="text" name="cedula[]" id="ins-type-${increment}" hidden value="${cedula}"></td>
		<td>${tele_1}<input type="text" name="tele_1[]" id="ins-type-${increment}" hidden value="${tele_1}"></td>

		<td>${email}<input type="text" name="email[]" id="ins-type-${increment}" hidden value="${email}"></td>
		<td>${tipo}<input type="text" name="tipo[]" id="ins-type-${increment}" hidden value="${tipo}"></td>
		`;

		var cellremove_ff_accBtn = createCell();

		cellremove_ff_accBtn.appendChild(createremove_ff_accBtn())
		newRow.appendChild(cellremove_ff_accBtn);
		document.querySelector('#target_acc_ff tbody').appendChild(newRow);


		
	}
}

function createremove_ff_accBtn() {
    var btnremove_ff_acc = document.createElement('button');
    btnremove_ff_acc.className = 'btn btn-xs btn-danger';
    btnremove_ff_acc.onclick = remove_ff_acc;
    btnremove_ff_acc.innerText = 'Descartar';
    return btnremove_ff_acc;
}

function createCell(text) {
	var td = document.createElement('td');
  if(text) {
  	td.innerText = text;
  }
  return td;
}
