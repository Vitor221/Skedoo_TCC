const ctx = document.getElementById("myChart");

new Chart(ctx, {
    type: "doughnut",
    data: {
        labels: [
            "Berçário I",
            "Berçário II",
            "Maternal I",
            "Maternal II",
            "Fase I",
            "Fase II",
        ],
        datasets: [
            {
                label: "Alunos por turma",
                data: [12, 19, 3, 5, 2, 3],
                borderWidth: 1,
            },
        ],
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
            },
        },
    },
});
