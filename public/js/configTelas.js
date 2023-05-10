function inserir(){
    setTimeout(() => {  document.getElementById('form').style="display:block;"; }, 100);
    fechaPesquisar();
}
function inserirAluno(){
    setTimeout(() => {  document.getElementById('form_aluno').style="display:block;"; }, 100);
}
function fechaForm(){
    setTimeout(() => {  document.getElementById('form').style="display:none;"; }, 100);
    document.getElementById('select_form').style = 'display:none;'
    $sf2 = document.getElementById('select_form_value').value
    if($sf2){
        document.getElementById('select_form_2').style = 'display:none;'
    }
}
function fechaFormAluno(){
    $infoNomeAluno = document.getElementById('infoAlunoNome').value;
    setTimeout(() => {  document.getElementById('form_aluno').style="display:none;"; }, 100);
    if($infoNomeAluno == ""){
        document.getElementById('nomeAluno').value=""
    }
    document.getElementById("select_form_value").selectedIndex = "0";
    selectForm()
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

    if($selectValue == '#'){
        document.getElementById('select_form').style = 'display:none;'
        document.getElementById('select_form_2').style = 'display:none;'
    }
}
function adicionarAlunoResponsavel(){
    $nomeAluno = document.getElementById('nomeAluno').value
    $turma = document.getElementById('turma').value
    document.getElementById('infoAluno').style='display:auto;'
    document.getElementById('infoAlunoNome').innerHTML=$nomeAluno
    document.getElementById('infoAlunoTurma').innerHTML=$turma
}