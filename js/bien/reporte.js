function buscar_total() {
    var start = $('#start').val();
    var end = $('#end').val();

    var base_url = window.location.origin + '/marina/index.php/Reporte/p_tt_ing_egr';

    $("#mensaje").show();

    $.ajax({
        url: base_url,
        method: "POST",
        data: { start, end },
        dataType: 'json',
        success: function(data) {
            var total = [];
            var condicion = [];
            var color = [COLOR_PURPLE_TRANSPARENT_7, COLOR_BLUE_TRANSPARENT_7, COLOR_GREEN_TRANSPARENT_7, COLOR_GREY_TRANSPARENT_7, COLOR_BLACK_TRANSPARENT_7];
            var bordercolor = [COLOR_PURPLE, COLOR_BLUE, COLOR_GREEN, COLOR_GREY, COLOR_BLACK];

            for (var i in data) {
                total.push(data[i].total);
                condicion.push(data[i].condicion);
            }

            var chartdata = {
                labels: condicion,
                datasets: [{
                    label: condicion,
                    backgroundColor: color,
                    borderColor: color,
                    borderWidth: 2,
                    hoverBackgroundColor: color,
                    hoverBorderColor: bordercolor,
                    data: total,
                }]
            };

            var mostrar = $("#miGrafico");
            var grafico = new Chart(mostrar, {
                type: 'doughnut',
                data: chartdata,
                options: {
                    animation: {
                        duration: 500,
                        easing: "easeOutQuart",
                        onComplete: function() {
                            var ctx = this.chart.ctx;
                            ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontFamily, 'normal', Chart.defaults.global.defaultFontFamily);
                            ctx.textAlign = 'center';
                            ctx.textBaseline = 'bottom';
                            this.data.datasets.forEach(function(dataset) {
                                for (var i = 0; i < dataset.data.length; i++) {
                                    var model = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._model,
                                        total = dataset._meta[Object.keys(dataset._meta)[0]].total,
                                        mid_radius = model.innerRadius + (model.outerRadius - model.innerRadius) / 2,
                                        start_angle = model.startAngle,
                                        end_angle = model.endAngle,
                                        mid_angle = start_angle + (end_angle - start_angle) / 2;
                                    var x = mid_radius * Math.cos(mid_angle);
                                    var y = mid_radius * Math.sin(mid_angle);
                                    ctx.fillStyle = '#000000';
                                    if (i == 3) { ctx.fillStyle = '#444'; }
                                    var val = dataset.data[i];
                                    var percent = String(Math.round(val / total * 100)) + "%";
                                    if (val != 0) {
                                        ctx.fillText(dataset.data[i], model.x + x, model.y + y);
                                        ctx.fillText(percent, model.x + x, model.y + y + 15);
                                    }
                                }
                            });
                        }
                    }
                }
            });
        },
        error: function(data) {
            console.log(data);
        }
    });
}

function buscar_total_2() {
    var start = $('#start').val();
    var end = $('#end').val();

    var base_url = window.location.origin + '/marina/index.php/Reporte/p_tt_ing_tar';

    $("#mensaje").show();

    $.ajax({
        url: base_url,
        method: "POST",
        data: { start, end },
        dataType: 'json',
        success: function(data) {
            var total = [];
            var desc_concepto = [];
            var color = [COLOR_PURPLE_TRANSPARENT_7, COLOR_BLUE_TRANSPARENT_7, COLOR_GREEN_TRANSPARENT_7, COLOR_GREY_TRANSPARENT_7, COLOR_BLACK_TRANSPARENT_7];
            var bordercolor = [COLOR_PURPLE, COLOR_BLUE, COLOR_GREEN, COLOR_GREY, COLOR_BLACK];

            for (var i in data) {
                total.push(data[i].total);
                desc_concepto.push(data[i].desc_concepto);
            }

            var chartdata = {
                labels: desc_concepto,
                datasets: [{
                    label: desc_concepto,
                    backgroundColor: color,
                    borderColor: color,
                    borderWidth: 2,
                    hoverBackgroundColor: color,
                    hoverBorderColor: bordercolor,
                    data: total,
                }]
            };

            var mostrar = $("#miGrafico2");
            var grafico = new Chart(mostrar, {
                type: 'pie',
                data: chartdata,
                options: {
                    animation: {
                        duration: 500,
                        easing: "easeOutQuart",
                        onComplete: function() {
                            var ctx = this.chart.ctx;
                            ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontFamily, 'normal', Chart.defaults.global.defaultFontFamily);
                            ctx.textAlign = 'center';
                            ctx.textBaseline = 'bottom';
                            this.data.datasets.forEach(function(dataset) {
                                for (var i = 0; i < dataset.data.length; i++) {
                                    var model = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._model,
                                        total = dataset._meta[Object.keys(dataset._meta)[0]].total,
                                        mid_radius = model.innerRadius + (model.outerRadius - model.innerRadius) / 2,
                                        start_angle = model.startAngle,
                                        end_angle = model.endAngle,
                                        mid_angle = start_angle + (end_angle - start_angle) / 2;
                                    var x = mid_radius * Math.cos(mid_angle);
                                    var y = mid_radius * Math.sin(mid_angle);
                                    ctx.fillStyle = '#000000';
                                    if (i == 3) { ctx.fillStyle = '#444'; }
                                    var val = dataset.data[i];
                                    var percent = String(Math.round(val / total * 100)) + "%";
                                    if (val != 0) {
                                        ctx.fillText(dataset.data[i], model.x + x, model.y + y);
                                        ctx.fillText(percent, model.x + x, model.y + y + 15);
                                    }
                                }
                            });
                        }
                    }
                }
            });
        },
        error: function(data) {
            console.log(data);
        }
    });
}

function buscar_total_3() {
    var start = $('#start').val();
    var end = $('#end').val();

    var base_url = window.location.origin + '/marina/index.php/Reporte/f_p_tt_ing_tar';

    $("#mensaje").show();

    $.ajax({
        url: base_url,
        method: "POST",
        data: { start, end },
        dataType: 'json',
        success: function(data) {
            var total = [];
            var desc_concepto = [];
            var color = [COLOR_PURPLE_TRANSPARENT_7, COLOR_BLUE_TRANSPARENT_7, COLOR_GREEN_TRANSPARENT_7, COLOR_GREY_TRANSPARENT_7, COLOR_BLACK_TRANSPARENT_7];
            var bordercolor = [COLOR_PURPLE, COLOR_BLUE, COLOR_GREEN, COLOR_GREY, COLOR_BLACK];

            for (var i in data) {
                total.push(data[i].total);
                desc_concepto.push(data[i].desc_concepto);
            }

            var chartdata = {
                labels: desc_concepto,
                datasets: [{
                    label: desc_concepto,
                    backgroundColor: color,
                    borderColor: color,
                    borderWidth: 2,
                    hoverBackgroundColor: color,
                    hoverBorderColor: bordercolor,
                    data: total,
                }]
            };

            var mostrar = $("#miGrafico3");
            var grafico = new Chart(mostrar, {
                type: 'pie',
                data: chartdata,
                options: {
                    animation: {
                        duration: 500,
                        easing: "easeOutQuart",
                        onComplete: function() {
                            var ctx = this.chart.ctx;
                            ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontFamily, 'normal', Chart.defaults.global.defaultFontFamily);
                            ctx.textAlign = 'center';
                            ctx.textBaseline = 'bottom';
                            this.data.datasets.forEach(function(dataset) {
                                for (var i = 0; i < dataset.data.length; i++) {
                                    var model = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._model,
                                        total = dataset._meta[Object.keys(dataset._meta)[0]].total,
                                        mid_radius = model.innerRadius + (model.outerRadius - model.innerRadius) / 2,
                                        start_angle = model.startAngle,
                                        end_angle = model.endAngle,
                                        mid_angle = start_angle + (end_angle - start_angle) / 2;
                                    var x = mid_radius * Math.cos(mid_angle);
                                    var y = mid_radius * Math.sin(mid_angle);
                                    ctx.fillStyle = '#000000';
                                    if (i == 3) { ctx.fillStyle = '#444'; }
                                    var val = dataset.data[i];
                                    var percent = String(Math.round(val / total * 100)) + "%";
                                    if (val != 0) {
                                        ctx.fillText(dataset.data[i], model.x + x, model.y + y);
                                        ctx.fillText(percent, model.x + x, model.y + y + 15);
                                    }
                                }
                            });
                        }
                    }
                }
            });
        },
        error: function(data) {
            console.log(data);
        }
    });
}