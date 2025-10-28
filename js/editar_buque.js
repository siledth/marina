// /js/editar_buque.js
// Requiere jQuery, Bootstrap (modals) y (opcional) SweetAlert2.
// BASE_URL debe estar definida en la vista: const BASE_URL = '...';

(function () {
  // ====== ENDPOINTS ======
  const URL_GET    = BASE_URL + 'index.php/Buque/get_buque';
  const URL_UPDATE = BASE_URL + 'index.php/Buque/update_buque';

  // ====== HELPERS ======
  function tarifaSeleccionadaValor() {
    var sel = document.getElementById('eb_id_tarifa');
    if (!sel || !sel.value) return null;
    var opt = sel.options[sel.selectedIndex];
    var val = opt ? opt.getAttribute('data-valor') : null;
    var f = val ? parseFloat(val) : null;
    return (f !== null && !isNaN(f)) ? f : null;
  }

  function recalcularCanon() {
    var pies   = parseInt(document.getElementById('eb_pies').value || '0', 10);
    var tarifa = tarifaSeleccionadaValor();
    if (!isNaN(pies) && tarifa !== null) {
      var canon = pies * tarifa;
      document.getElementById('eb_canon').value = canon.toFixed(2);
      document.getElementById('eb_tarifa_valor').value = tarifa.toFixed(2);
    } else {
      document.getElementById('eb_canon').value = '';
      document.getElementById('eb_tarifa_valor').value = '';
    }
  }

  function updateUbicacionHint() {
    const sel  = document.getElementById('eb_ubicacion');
    const hint = document.getElementById('ubicacion_hint');
    if (!sel || !hint) return;
    const opt = sel.options[sel.selectedIndex];
    const max = opt ? opt.getAttribute('data-maximo') : null;
    hint.textContent = max ? ('Capacidad máx.: ' + max) : '';
  }

  function llenarFormulario(d) {
    // Hidden
    $('#eb_id').val(d.id || '');

    // Campos básicos
    $('#eb_nombre').val(d.nombrebuque || '');
    $('#eb_matricula').val(d.matricula || '');
    $('#eb_trailer').val(d.trailer || '');
    $('#eb_pies').val(d.pies || '');
    $('#eb_tipo').val(d.tipo || '');
    $('#eb_color').val(d.color || '');
    $('#eb_eslora').val(d.eslora || '');
    $('#eb_manga').val(d.manga || '');
    $('#eb_puntal').val(d.puntal || '');
    $('#eb_bruto').val(d.bruto || '');
    $('#eb_neto').val(d.neto || '');

    // Selects dependientes
    $('#eb_id_tarifa').val(d.id_tarifa || '');
    $('#eb_ubicacion').val(d.ubicacion || '');

    // Otros
    
    $('#eb_vencimiento').val(d.vencimiento || '');
     

    // Cálculos / hints
    recalcularCanon();
    updateUbicacionHint();
  }

  // ====== EVENTOS ======

  // Abrir modal al hacer click en "Editar"
  $(document).on('click', '.btn-edit-buque', function () {
    var id = $(this).data('id');
    if (!id) return;

    // Resetea el form del modal
    var form = document.getElementById('formEditarBuque');
    if (form) form.reset();
    $('#eb_id').val(id);

    // Trae datos por AJAX
    fetch(URL_GET + '?id=' + encodeURIComponent(id))
      .then(r => r.json())
      .then(json => {
        if (json.error) {
          if (window.Swal) Swal.fire('Atención', json.error, 'error');
          else alert(json.error);
          return;
        }
        llenarFormulario(json.data);
        $('#modalEditarBuque').modal('show');
      })
      .catch(err => {
        console.error(err);
        if (window.Swal) Swal.fire('Error', 'No se pudo obtener el buque', 'error');
        else alert('No se pudo obtener el buque');
      });
  });

  // Recalcular canon en tiempo real
  $('#eb_pies').on('input',  recalcularCanon);
  $('#eb_id_tarifa').on('change', recalcularCanon);

  // Actualizar hint de ubicación al cambiar selección
  $('#eb_ubicacion').on('change', updateUbicacionHint);

  // Guardar cambios
  $('#formEditarBuque').on('submit', function (e) {
    e.preventDefault();
    var fd = new FormData(this);

    fetch(URL_UPDATE, {
      method: 'POST',
      body: fd
    })
      .then(r => r.json())
      .then(json => {
        if (json.error) {
          if (window.Swal) Swal.fire('Atención', json.error, 'error');
          else alert(json.error);
          return;
        }
        if (window.Swal) {
          Swal.fire('Listo', json.message || 'Actualizado', 'success')
            .then(() => location.reload());
        } else {
          alert(json.message || 'Actualizado');
          location.reload();
        }
      })
      .catch(err => {
        console.error(err);
        if (window.Swal) Swal.fire('Error', 'No se pudo actualizar', 'error');
        else alert('No se pudo actualizar');
      });
  });

})();
