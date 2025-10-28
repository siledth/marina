// public/js/alertas_buque.js
// Requiere jQuery (para dropdown Bootstrap). SweetAlert2 es opcional.

(function(){
  // Ajusta si tu método se llama distinto (por ejemplo, si creaste un route "buque/alertas")
  const ENDPOINT = (typeof BASE_URL !== 'undefined' ? BASE_URL : '/') + 'index.php/Buque/alertas_json';

  function escapeHtml(s){
    return String(s || '').replace(/[&<>"']/g, function(m){
      return ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'})[m];
    });
  }

  function buildItem(label, data, type) {
    const icon  = (type === 'warning') ? 'fa-exclamation-triangle' : 'fa-times-circle';
    const color = (type === 'warning') ? '#856404' : '#721c24';
    const vto   = data.vencimiento ? ` — Vence: ${escapeHtml(data.vencimiento)}` : '';
    const url   = (typeof BASE_URL!=='undefined'?BASE_URL:'/') + 'index.php/Buque/Plantilla';

    return `
      <a href="${url}" class="dropdown-item media">
        <div class="media-left">
          <i class="fa ${icon} media-object" style="color:${color}"></i>
        </div>
        <div class="media-body">
          <h6 class="media-heading" style="margin:0;">${label}: ${escapeHtml(data.nombrebuque || '')}</h6>
          <div style="font-size:12px;color:#666;">Mat: ${escapeHtml(data.matricula || '')}${vto}</div>
        </div>
      </a>
    `;
  }

  function renderDropdown(resp){
    const nbadge   = document.getElementById('nbadge');
    const nresumen = document.getElementById('nresumen');
    const nitems   = document.getElementById('nitems');
    if (!nbadge || !nresumen || !nitems) return;

    const {
      vencidas = [],
      por_vencer = [],
      sin_fecha = [],
      vencidas_count = 0,
      por_vencer_count = 0,
      sin_fecha_count = 0
    } = resp || {};

    // Badge: SOLO "por vencer"
    if (por_vencer_count > 0) {
      nbadge.textContent = por_vencer_count;
      nbadge.style.display = 'inline-block';
    } else {
      nbadge.style.display = 'none';
    }

    // Resumen SOLO aquí (no en #nitems)
    nresumen.innerHTML = `
      <strong>Resumen:</strong><br>
      🟠 Por vencer (≤5 días): <b>${por_vencer_count}</b><br>
      🔴 Vencidas: <b>${vencidas_count}</b><br>
      ⛔ Sin fecha: <b>${sin_fecha_count}</b>
    `;

    // Limpiar lista e insertar SOLO ítems detallados (máx 10)
    nitems.innerHTML = '';
    let added = 0;
    const pushList = (arr, type, label) => {
      for (let i=0; i<arr.length && added<10; i++, added++){
        nitems.insertAdjacentHTML('beforeend', buildItem(label, arr[i], type));
      }
    };

    // Orden: por vencer, vencidas, sin fecha
    pushList(por_vencer, 'warning', 'Por vencer');
    pushList(vencidas,   'danger',  'Vencida');
    pushList(sin_fecha,  'danger',  'Sin fecha');

    if (added === 0) {
      nitems.insertAdjacentHTML('beforeend',
        `<div class="text-center p-2" style="color:#666;">Sin elementos para mostrar</div>`
      );
    }

    // (Opcional) Popup si hay críticos
    try {
      const totalCritico = por_vencer_count + vencidas_count;
      if (window.Swal && totalCritico > 0) {
        const msgs = [];
        if (por_vencer_count) msgs.push(`🟠 ${por_vencer_count} por vencer`);
        if (vencidas_count)   msgs.push(`🔴 ${vencidas_count} vencida(s)`);
        Swal.fire({
          title: 'Alertas de vencimiento',
          html: msgs.join('<br>'),
          icon: 'warning',
          confirmButtonText: 'OK'
        });
      }
    } catch(e){}
  }

  function fetchAlerts(){
    fetch(ENDPOINT + '?dias=5', {cache:'no-store'})
      .then(r => {
        if (!r.ok) throw new Error('HTTP ' + r.status);
        return r.json();
      })
      .then(renderDropdown)
      .catch(err => {
        console.error('alertas_buque:', err);
        const nresumen = document.getElementById('nresumen');
        const nbadge = document.getElementById('nbadge');
        if (nresumen) nresumen.innerHTML = `<span style="color:#c00;">No se pudieron cargar las notificaciones</span>`;
        if (nbadge) nbadge.style.display = 'none';
      });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', fetchAlerts);
  } else {
    fetchAlerts();
  }

  // refresco cada 15 minutos (opcional)
  setInterval(fetchAlerts, 15*60*1000);
})();
