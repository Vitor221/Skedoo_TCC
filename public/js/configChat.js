var baseURL = "https://chat-skedoo-2ae51-default-rtdb.firebaseio.com/";
var mensagensURL = baseURL + "mensagens.json"
var novaMensagem = ""
var id_destinatario = "200052"
function enviarMensagem() {
    entrada = document.getElementById("mensagem");
    entradaData = document.getElementById("data-atual").innerHTML;
    entradaHora = document.getElementById("hora-atual").innerHTML;
    mensagemdig = entrada.value;
    fetch("/remetente", {mode:"no-cors"})
        .then((response) => response.text())
        .then((data) => {
            id_remetente = data;
            fetch(
                "https://chat-skedoo-2ae51-default-rtdb.firebaseio.com/mensagens.json",
                {
                    method: "POST",
                    headers: { "Content-type": "application/json" },
                    body: JSON.stringify({
                        mensagem: mensagemdig,
                        data: entradaData,
                        hora: entradaHora,
                        remetente: id_remetente,
                        destinatario : id_destinatario
                    }),
                }
            );
        });
    entrada.value = "";
    atualizarMensagens()
}
function atualizarMensagens() {
    campo = "remetente";
    fetch("/remetente", {mode:"no-cors"})
        .then((response) => response.text())
        .then((data) => {
            id_remetente = data;
            destinatarioCodificado = encodeURIComponent(id_destinatario);
            remetenteCodificado = encodeURIComponent(id_remetente);
            url =`${mensagensURL}?orderBy="destinatario"&equalTo="${remetenteCodificado}"||orderBy="remetente"&equalTo="${remetenteCodificado}"&print='pretty'`;
            console.log(url)
            fetch(mensagensURL)
                .then((response) => response.json())
                .then((data) => {
                  console.log(data)
                  Object.values(data).forEach((mensagem) => {
                    if(mensagem.remetente == id_remetente && mensagem.destinatario == id_destinatario){
                      novaMensagem +="<div class='mensagem enviada'><p>"+mensagem.mensagem +"</p><span>" +mensagem.data+"</span></div>";
                    }
                    if(mensagem.remetente == id_destinatario && mensagem.destinatario == id_remetente){
                      novaMensagem +="<div class='mensagem recebida'><p>"+mensagem.mensagem+"</p><span>" +mensagem.data+"</span></div>";
                    }
                  });
                  document.getElementById("div-mensagens").innerHTML = novaMensagem
                  novaMensagem=""
                })
                .catch((error) => {
                    console.error(error);
                });
        });
}
atualizarMensagens();
