function inserir(){
    setTimeout(() => {  document.getElementById('form').style="display:block;"; }, 100);
}
function fechaForm(){
    setTimeout(() => {  document.getElementById('form').style="display:none;"; }, 100);
}
function pesquisar(){
        setTimeout(() => {  document.getElementById('pesquisa').style="display:block;"; }, 100);
        document.getElementById('fechaPesquisa').style="display:auto;";
        document.getElementById('abrePesquisa').style="display:none;";
}
function fechaPesquisar(){
        setTimeout(() => {  document.getElementById('pesquisa').style="display:none;"; }, 100);
        document.getElementById('fechaPesquisa').style="display:none;";
        document.getElementById('abrePesquisa').style="display:auto;";
}