
function atualizarData() {
    fetch('/novadata')
        .then(response => response.text())
        .then(data => {
            document.getElementById('data-atual').innerHTML = data;
        })
        .catch(error => {
            console.error('Erro ao obter a nova data:', error);
        });
}
function atualizarHora() {
    fetch('/novahora')
        .then(response => response.text())
        .then(data => {
            document.getElementById('hora-atual').innerHTML = data;
        })
        .catch(error => {
            console.error('Erro ao obter a nova data:', error);
        });
}
atualizarData();
atualizarHora();

// Atualizando a data a cada 1 segundo
setInterval(atualizarData, 1000);
setInterval(atualizarHora, 1000);
