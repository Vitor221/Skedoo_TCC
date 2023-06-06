function teste() {
    fetch('/dashboard')
        .then(response => response.json())
        .then(data => {
            console.log(data[0].nm_turma)
            var ctx = document.getElementById('myChart');
            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: [
                        Object.values(data).forEach(item) => {
                            ""+data.nm_turma+"",
                        }
                    ],
                    datasets: [{
                        label: 'Alunos por turma',
                        data: [6, 16, 12, 11, 8],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            var ctb = document.getElementById('myBar');

            var myBar = new Chart(ctb, {
                type: 'bar',
                data: {
                    labels: ['Conjunto Residencial Humaitá', 'Parque Continental'],
                    datasets: [{
                        label: 'Alunos por bairro',
                        data: [34, 29],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 205, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(201, 203, 207, 0.2)'
                        ],
                        borderColor: [
                            'rgb(255, 99, 132)',
                            'rgb(255, 159, 64)',
                            'rgb(255, 205, 86)',
                            'rgb(75, 192, 192)',
                            'rgb(54, 162, 235)',
                            'rgb(153, 102, 255)',
                            'rgb(201, 203, 207)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        })
}

teste()
// console.log(data)
// var ctx = document.getElementById('myChart');
// var myChart = new Chart(ctx, {
// type: 'doughnut',
// data: {
//     labels: ['Maternal I', 'Maternal II', 'Fase I', 'Fase II'],
//     datasets: [{
//         label: 'Alunos por turma',
//         data: [6, 16, 12, 11, 8],
//         borderWidth: 1
//     }]
// },
// options: {
//     scales: {
//         y: {
//             beginAtZero: true
//         }
//     }
// }
// });

// var ctb = document.getElementById('myBar');

// var myBar = new Chart(ctb, {
// type: 'bar',
// data: {
//     labels: ['Conjunto Residencial Humaitá', 'Parque Continental'],
//     datasets: [{
//         label: 'Alunos por bairro',
//         data: [34, 29],
//         backgroundColor: [
//             'rgba(255, 99, 132, 0.2)',
//             'rgba(255, 159, 64, 0.2)',
//             'rgba(255, 205, 86, 0.2)',
//             'rgba(75, 192, 192, 0.2)',
//             'rgba(54, 162, 235, 0.2)',
//             'rgba(153, 102, 255, 0.2)',
//             'rgba(201, 203, 207, 0.2)'
//         ],
//         borderColor: [
//             'rgb(255, 99, 132)',
//             'rgb(255, 159, 64)',
//             'rgb(255, 205, 86)',
//             'rgb(75, 192, 192)',
//             'rgb(54, 162, 235)',
//             'rgb(153, 102, 255)',
//             'rgb(201, 203, 207)'
//         ],
//         borderWidth: 1
//     }]
// },
// options: {
//     scales: {
//         y: {
//             beginAtZero: true
//         }
//     }
// }
// });