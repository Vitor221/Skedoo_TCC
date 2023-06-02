import Chart from 'chart.js/auto';

const ctx = document.getElementById("myChart");

const turmas = [
  @foreach ($TbTurmas as $Turmas)
  <tr>
      <td class="nome">{{ $Turmas->nm_turma }}</td>
      @if (isset($alunosPorTurma[$Turmas->cd_turma]))
          <td>{{ $alunosPorTurma[$Turmas->cd_turma]->total_alunos }}</td>
      @else
          <td>0</td>
      @endif
      <td>{{ $Turmas->cd_total_aluno }}</td>
  </tr>
@endforeach
]

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
