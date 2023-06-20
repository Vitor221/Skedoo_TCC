const statusPag = document.getElementsByClassName("status-pagamento");
const formaPag = document.getElementsByClassName("forma-pagamento");
for (let i = 0; i < formaPag.length; i++) {
    const elementForma = formaPag[i];
    const valorForma = elementForma.innerHTML;
    if (valorForma == '1') {
        elementForma.innerHTML = 'À vista';
    }
    if (valorForma == '2') {
        elementForma.innerHTML = 'À prazo';
    }
}
for (let i = 0; i < statusPag.length; i++) {
    const elementStatus = statusPag[i];
    const valor = elementStatus.innerHTML;
    const btn_confirmar = document.getElementById('confirmar' + elementStatus.id)
    if (valor === '1') {
        elementStatus.innerHTML = 'pagamento confirmado';
        elementStatus.style.color = 'green';
        btn_confirmar.style = 'display:none;'
    }
    if (valor === '2') {
        elementStatus.innerHTML = 'pagamento não confirmado';
    }

    if (valor === '3') {
        elementStatus.innerHTML = 'pagamento atrasado';
        elementStatus.style.color = 'red';
        btn_confirmar.style = 'background-color:red;'
        btn_confirmar.innerHTML = 'Confirmar com Atraso'
    }
    console.log(valor);
}
function confirmaPagamento($id){
    fetch (`/financeiro/pagamento?pagamento=${$id[0].cd_pagamento}`)
    location.reload();
}