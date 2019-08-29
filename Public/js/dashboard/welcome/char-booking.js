//line
var ctxL = document.getElementById("char-booking").getContext('2d');
var myLineChart = new Chart(ctxL, {
    type: 'line',
    data: {
        labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
        datasets: [{
            label: "Reservas",
            data: [65, 59, 80, 81, 56, 55, 40],
            backgroundColor: [
            'rgba(105, 0, 132, .2)',
            ],
            borderColor: [
            'rgba(200, 99, 132, .7)',
            ],
            borderWidth: 2
        }
        ]
    },
    options: {
        responsive: true,
        legend: {
            display: false,
        }
    }
});