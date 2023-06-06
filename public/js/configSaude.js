let pesquisaAtiva = false;
function getInfo(id){
    fetch(`/saude/aluno?id=${id}`)
    .then(response => response.json())
    .then(data => {
        document.getElementById('nome').value= data[0].nm_aluno
    })
    document.getElementById('resultados').style="display:none;"
}
function pesquisando() {
    if (pesquisaAtiva) {
        return;
    }
    pesquisaAtiva = true;
    const nome = document.getElementById('nome').value;
    document.getElementById('resultados').innerHTML = "";
    document.getElementById('resultados').style="display:auto;"

    fetch(`/saude/alunos?nome=${nome}`)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            const resultadosElement = document.getElementById('resultados');
            Object.values(data).forEach((item) => {
                const cdAluno = item.cd_aluno;
                const buttonElement = document.createElement('div');
                buttonElement.className = 'usuario resultado';
                buttonElement.value = cdAluno;
                buttonElement.setAttribute('onclick', `getInfo(${cdAluno})`);
                const pElement = document.createElement('p');
                pElement.id = `nm${cdAluno}`;
                pElement.textContent = item.nm_aluno;
                buttonElement.appendChild(pElement);
                resultadosElement.appendChild(buttonElement);
            });

            pesquisaAtiva = false;
        })
        .catch(error => {
            pesquisaAtiva = false;
            console.error(error);
        });
}
