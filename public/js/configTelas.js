function inserir(){
    setTimeout(() => {  document.getElementById('form').style="display:block;"; }, 100);
    fechaPesquisar();
}
function fechaForm(){
    setTimeout(() => {  document.getElementById('form').style="display:none;"; }, 100);
    document.getElementById('select_form').style = 'display:none;'
    $sf2 = document.getElementById('select_form_value').value
    if($sf2){
        document.getElementById('select_form_2').style = 'display:none;'
    }
}
function inserirTurma(){
    setTimeout(() => {  document.getElementById('formTurma').style="display:block;"; }, 100);
    fechaPesquisar();
}
function fechaFormTurma(){
    setTimeout(() => {  document.getElementById('formTurma').style="display:none;"; }, 100);
    document.getElementById('select_form').style = 'display:none;'
    $sf2 = document.getElementById('select_form_value').value
    if($sf2){
        document.getElementById('select_form_2').style = 'display:none;'
    }
}
function pesquisar(){
        setTimeout(() => {  document.getElementById('pesquisa').style="display:block;"; }, 100);
        document.getElementById('fechaPesquisa').style="display:auto;";
        document.getElementById('abrePesquisa').style="display:none;";
        fechaForm();
}
function fechaPesquisar(){
        setTimeout(() => {  document.getElementById('pesquisa').style="display:none;"; }, 100);
        document.getElementById('fechaPesquisa').style="display:none;";
        document.getElementById('abrePesquisa').style="display:auto;";
}
function selectForm(){
    $selectValue = document.getElementById('select_form_value').value
    $sf2 = document.getElementById('select_form_value').value
    if($selectValue == 1){
        document.getElementById('select_form').style = 'display:auto;'
        if($sf2){
            document.getElementById('select_form_2').style = 'display:none;'
        }
    }
    if($selectValue == 0){
        document.getElementById('select_form').style = 'display:none;'
        if($sf2){
            document.getElementById('select_form_2').style = 'display:auto;'
        }
    }
    console.log($selectValue)
    if($selectValue == '#'){
        document.getElementById('select_form').style = 'display:none;'
        document.getElementById('select_form_2').style = 'display:none;'
    }
}

function limpa_formulário_cep() {
    //Limpa valores do formulário de cep.
    document.getElementById('rua').value=("");
    document.getElementById('bairro').value=("");
    document.getElementById('cidade').value=("");
    document.getElementById('uf').value=("");
}

function meu_callback(conteudo) {
if (!("erro" in conteudo)) {
    //Atualiza os campos com os valores.
    document.getElementById('rua').value=(conteudo.logradouro);
    document.getElementById('bairro').value=(conteudo.bairro);
    document.getElementById('cidade').value=(conteudo.localidade);
    document.getElementById('uf').value=(conteudo.uf);
} //end if.
else {
    //CEP não Encontrado.
    limpa_formulário_cep();
    alert("CEP não encontrado.");
}
}

function pesquisacep(valor) {

//Nova variável "cep" somente com dígitos.
var cep = valor.replace(/\D/g, '');

//Verifica se campo cep possui valor informado.
if (cep != "") {

    //Expressão regular para validar o CEP.
    var validacep = /^[0-9]{8}$/;

    //Valida o formato do CEP.
    if(validacep.test(cep)) {

        //Preenche os campos com "..." enquanto consulta webservice.
        document.getElementById('rua').value="...";
        document.getElementById('bairro').value="...";
        document.getElementById('cidade').value="...";
        document.getElementById('uf').value="...";

        //Cria um elemento javascript.
        var script = document.createElement('script');

        //Sincroniza com o callback.
        script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

        //Insere script no documento e carrega o conteúdo.
        document.body.appendChild(script);

    } //end if.
    else {
        //cep é inválido.
        limpa_formulário_cep();
        alert("Formato de CEP inválido.");
    }
} //end if.
else {
    //cep sem valor, limpa formulário.
    limpa_formulário_cep();
}
}