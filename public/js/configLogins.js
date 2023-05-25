
function atualizarData() {
    fetch('/obter-nova-data')
        .then(response => response.text())
        .then(data => {
            document.getElementById('data-atual').innerHTML = data;
        })
        .catch(error => {
            console.error('Erro ao obter a nova data:', error);
        });
}
atualizarData();

// Atualizando a data a cada 1 segundo
setInterval(atualizarData, 1000);
