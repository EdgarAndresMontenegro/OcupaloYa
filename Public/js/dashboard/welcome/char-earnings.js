new Chart(document.getElementById("char-earnings"), {
    "type": "horizontalBar",
    "data": {
        "labels": ["Agosto", "Julio"],
        "datasets": [{
            "label": "Ganancias",
            "data": [ 22, 33 ],
            "fill": false,
            "backgroundColor": [ "rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)" ],
            "borderColor": [ "rgb(255, 99, 132)", "rgb(255, 159, 64)" ],
            "borderWidth": 1
        }]
    },
    "options": {
        "scales": {
            "xAxes": [{
                "ticks": {
                    "beginAtZero": true
                }
            }]
        },
        "legend": {
            "display": false,
        }
    }
});