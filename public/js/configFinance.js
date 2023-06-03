import Chart from "chart.js/auto";

$.ajax({
    url: "/dados-grafico",
    method: "GET",
    sucess: function (response) {
        const ctx = document.getElementById("myChart");

        new Chart(ctx, {
            type: "doughnut",
            data: {
                labels: turmas,
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
    },
});
