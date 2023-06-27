const statusPag = document.getElementsByClassName("status-pagamento");
const formaPag = document.getElementsByClassName("forma-pagamento");
for (let i = 0; i < formaPag.length; i++) {
    const elementForma = formaPag[i];
    const valorForma = elementForma.innerHTML;
    if (valorForma == '1') {
        elementForma.innerHTML = 'Mensal';
    }
    if (valorForma == '2') {
        elementForma.innerHTML = 'Bimestral';
    }
    if (valorForma == '3') {
        elementForma.innerHTML = 'Trimestral';
    }
}
for (let i = 0; i < statusPag.length; i++) {
    const elementStatus = statusPag[i];
    const valorStatus = elementStatus.innerHTML;
    console.log('teste');
    const btn_confirmar = document.getElementById("confirmar" + elementStatus.id)
    console.log(btn_confirmar)
    if (valorStatus === '1') {
        elementStatus.innerHTML = 'pagamento confirmado';
        elementStatus.style.color = 'green';
        btn_confirmar.style.display="none";
    }
    if (valorStatus === '2') {
        elementStatus.innerHTML = 'pagamento não confirmado';
        btn_confirmar.style = 'display:auto;'
    }

    if (valorStatus === '3') {
        elementStatus.innerHTML = 'pagamento atrasado';
        elementStatus.style.color = 'red';
        btn_confirmar.style = 'background-color:red;'
        btn_confirmar.innerHTML = 'Confirmar com Atraso'
    }
}
function confirmaPagamento($id){
    fetch (`/financeiro/pagamento?pagamento=${$id}`)
    .then(response => response.json())
        .then(data => {
            console.log(data)
        })
        .catch(error => {
            console.error(error);
        });
    location.reload();
}