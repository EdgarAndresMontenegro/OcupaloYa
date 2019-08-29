//doughnut
var ctxD = document.getElementById("char-type-immovable").getContext('2d');
var myLineChart = new Chart(ctxD, {
    type: 'doughnut',
    data: {
        labels: ["Habitación", "Cupo universitario", "Casa", "Apartamento", "Local", "Oficina", "Finca", "Lote", "Bodega", "Parqueadero"],
        datasets: [{
            data: [300, 50, 100, 40, 120, 300, 50, 100, 40, 120],
            backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
            hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774", "#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
        }]
    },
    options: {
        responsive: true
    }
});