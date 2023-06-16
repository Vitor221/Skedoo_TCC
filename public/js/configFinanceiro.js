const statusPag = document.getElementsByClassName("status-pagamento");

for (let i = 0; i < statusPag.length; i++) {
  const element = statusPag[i];
  const valor = element.innerHTML;
  const btn_confirmar = document.getElementById('confirmar'+element.id)
  if (valor === '1') {
    element.innerHTML = 'Pago';
    element.style.color = 'green';
    btn_confirmar.style = 'display:none;'
  }
  if (valor === '2') {
    element.innerHTML = 'A Pagar';
  }

  if (valor === '3') {
    element.innerHTML = 'Atrasado';
    element.style.color = 'red';
    btn_confirmar.style = 'background-color:red;'
  }

  console.log(valor);
}
