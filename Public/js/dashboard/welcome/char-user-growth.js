//line
var ctxL = document.getElementById("char-user-growth").getContext('2d');
var myLineChart = new Chart(ctxL, {
    type: 'line',
    data: {
        labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
        datasets: [{
            label: "Particulares",
            data: [65, 59, 80, 81, 56, 55, 40],
            backgroundColor: [
            'rgba(105, 0, 132, .2)',
            ],
            borderColor: [
            'rgba(200, 99, 132, .7)',
            ],
            borderWidth: 2
        },
        {
            label: "Propietarios",
            data: [28, 48, 40, 19, 86, 27, 90],
            backgroundColor: [
            'rgba(0, 137, 132, .2)',
            ],
            borderColor: [
            'rgba(0, 10, 130, .7)',
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