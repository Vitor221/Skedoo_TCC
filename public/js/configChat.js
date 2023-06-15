var baseURL = "https://chat-skedoo-2ae51-default-rtdb.firebaseio.com/";
var novaMensagem = "";
var id_remetente = "";
var id_destinatario = "";
var id_chat = "";
var divMensagens = document.getElementById("div-mensagens");

function getRemetente() {
    fetch("/remetente", { mode: "no-cors" })
        .then((response) => response.text())
        .then((data) => {
            return (id_remetente = parseInt(data));
        });
}
getRemetente();

function getID(id) {
    id_destinatario = id;
    document.getElementById("nomeChat").innerHTML = document.getElementById(
        "nm" + id
    ).innerHTML;
    divMensagens.innerHTML =
        "<h3 style='height:100%; width:100%; text-align:center; display: flex; justify-content: center; align-items: center;'>Carregando...</h3>";
    atualizarMensagens();
    fechaPesquisar();
    setTimeout(autoScroll, 1000);
}

function enviarMensagem() {
    entrada = document.getElementById("mensagem");
    mensagemdig = entrada.value;
    if (mensagemdig == "") {
        return;
    }
    entradaData = document.getElementById("data-atual").innerHTML;
    entradaHora = document.getElementById("hora-atual").innerHTML;

    if (id_remetente > id_destinatario) {
        id_chat = id_remetente.toString() + id_destinatario.toString();
    } else {
        id_chat = id_destinatario.toString() + id_remetente.toString();
    }
    parseInt(id_chat);
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
                destinatario: id_destinatario,
                chat: id_chat,
                visualizada: false
            }),
        }
    );
    entrada.value = "";
    atualizarMensagens();
    setTimeout(autoScroll, 1000);
}
function atualizarMensagens() {
    if (id_remetente > id_destinatario) {
        id_chat = id_remetente.toString() + id_destinatario.toString();
    } else {
        id_chat = id_destinatario.toString() + id_remetente.toString();
    }
    mensagensURL = `${baseURL}/mensagens.json`;
    fetch(mensagensURL)
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            Object.entries(data).forEach(([key, mensagem]) => {             
                if (
                    mensagem.remetente == id_destinatario &&
                    mensagem.destinatario == id_remetente &&
                    mensagem.visualizada == false
                ) {
                    const mensagemURL = `${baseURL}/mensagens/${key}.json`;
                    fetch(mensagemURL, {
                        method: 'PATCH',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({
                            visualizada: true
                        })
                    });
                }
                if (mensagem.remetente == id_remetente && mensagem.destinatario == id_destinatario) {
                    if (mensagem.visualizada == true) {
                        novaMensagem +=
                            "<div class='mensagem enviada'><p>" +
                            mensagem.mensagem +
                            "</p><span class='infomensagem'>" +
                            mensagem.data +
                            "<i class='uil uil-eye'></i></span></div>";
                    } else {
                        novaMensagem +=
                            "<div class='mensagem enviada'><p>" +
                            mensagem.mensagem +
                            "</p><span class='infomensagem'>" +
                            mensagem.data +
                            "<i class='uil uil-eye-slash'></i></span></div>";
                    }
                }
                if (
                    mensagem.remetente == id_destinatario &&
                    mensagem.destinatario == id_remetente
                ) {
                    novaMensagem +=
                        "<div class='mensagem recebida'><p>" +
                        mensagem.mensagem +
                        "</p><span>" +
                        mensagem.data +
                        "</span></div>";
                }
            });
            if (divMensagens.innerHTML != "" || novaMensagem != "") {
                divMensagens.innerHTML = novaMensagem;
                novaMensagem = "";
            }
            if (divMensagens.innerHTML == "" && novaMensagem == "") {
                divMensagens.innerHTML =
                    "<h3 style='height:100%; width:100%; text-align:center; display: flex; justify-content: center; align-items: center;'>Sem mensagens...</h3>";
            }
        })
        .catch((error) => {
            divMensagens.innerHTML =
                "<h3 style='height:100%; width:100%; text-align:center; display: flex; justify-content: center; align-items: center;'>Sem mensagens...</h3>";
            console.error(error);
        });
}

function autoScroll() {
    divMensagens.scrollTop = divMensagens.scrollHeight;
}
function removerTagsHTML(input) {
    var textoSemTags = input.value.replace(/<\/?[^>]+(>|$)/g, "");
    input.value = textoSemTags;
}

setInterval(atualizarMensagens, 1000);

//js pesquisa 

function pesquisar() {
    document.getElementById('pesquisa').style = "display:auto;"
    document.getElementById('abrePesquisa').style = "display:none;"
    document.getElementById('fechaPesquisa').style = "display:auto;"
    document.getElementById('resultados').style = "display:auto;"
}
function usuarios() {
    document.getElementById('div-usuarios').style = "display:block"
}
function fechaUsuarios() {
    document.getElementById('div-usuarios').style = "display:none"
}
function fechaPesquisar() {
    document.getElementById('pesquisa').style = "display:none;"
    document.getElementById('abrePesquisa').style = "display:auto;"
    document.getElementById('fechaPesquisa').style = "display:none;"
    document.getElementById('resultados').style = "display:none;"
    document.getElementById('search-input').value = ""
    pesquisando();
}

let pesquisaAtiva = false;

function pesquisando() {
    if (pesquisaAtiva) {
        return;
    }

    pesquisaAtiva = true;

    const nome = document.getElementById('search-input').value;
    document.getElementById('resultados').innerHTML = "";

    fetch(`/chat/usuarios?nome=${nome}`)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            const resultadosElement = document.getElementById('resultados');
            Object.values(data).forEach((item) => {
                const cdCadastro = item.cd_cadastro;
                const buttonElement = document.createElement('button');
                buttonElement.className = 'usuario resultado';
                buttonElement.value = cdCadastro;
                buttonElement.setAttribute('onclick', `getID(${cdCadastro})`);
                const pElement = document.createElement('p');
                pElement.id = `nm${cdCadastro}`;
                pElement.textContent = item.nm_responsavel;
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

