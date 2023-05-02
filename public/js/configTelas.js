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