
function teste() {
    fetch('/dashboard')
        .then(response => response.json())
        .then(data => {
            var numAlunos = [];
            var numResponsaveis = [];
            var valoresRecebidos = [];
            numAlunos = Object.values(data.TbAlunos).map(item => parseInt(item))
            valoresRecebidos = Object.values(data.recebimentoPorMes).map(item => parseInt(item.total_recebido))
            numResponsaveis = Object.values(data.TbBairros).map(item => parseInt(item.total_responsaveis))
            var ctx = document.getElementById('myChart');
            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: Object.values(data.TbTurmas).map(item => "" + item.nm_turma + ","),
                    datasets: [{
                        name: 'Alunos por turma',
                        data: numAlunos,
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
                    labels: Object.values(data.TbBairros).map(item => "" + item.nome_bairro + ","),
                    datasets: [{
                        label: 'Responsaveis',
                        data: numResponsaveis,
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

            var ctl = document.getElementById('Linha');
            const stackedLine = new Chart(ctl, {
                type: 'line',
                data: {
                    labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                    datasets: [{
                        label: 'Dados do gráfico',
                        data: valoresRecebidos,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            stacked: true
                        }
                    }
                }
            });

        })
}

teste()
