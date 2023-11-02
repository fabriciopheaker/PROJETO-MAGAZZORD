$(document).ready(function () {
  $('#buscarPessoa').click(() => {
    $('#loader').prop("hidden", false);
    pesquisarPessoa()
  })


  $('#SALVAR').click(() => {
    gravarPessoa()
  })


});

async function pesquisarPessoa() {
  let json = await getDados('buscarpessoas');
  if (json) {
    $('#loader').prop("hidden", true);
    injetarDados(json)
  }
}

async function gravarPessoa() {

  let json_dados = {
    NOME: $('#NOME').val(),
    CPF: $('#CPF').val()
  }

  let gravar = await PostDados('gravarpessoa', JSON.stringify(json_dados))
  console.log(gravar)
}

function injetarDados(json) {
  let Divtable = document.getElementById('Divtable');
  Divtable.hidden = false;
  $(table).bootstrapTable('removeAll');
  $(table).bootstrapTable('load', json);

}



function OperateFormat(value, row, index) {
  let butons = `
  <div class="d-flex justify-content-center"> 

  <a href="pessoa/analisar/${row.ID}"   class="text-primary mx-1">
  <i class="ri-user-search-line iconeOperat"></i> 
</a>
  <a href="pessoa/analisar/${row.ID}" class="text-info mx-1" >
    <i class="uil-edit iconeOperat" ></i> 
  </a>
  <a href="pessoa/analisar/${row.ID}"   class="text-danger mx-1">
    <i class="uil-times-circle iconeOperat"></i> 
  </a>
  </div>`;
  return butons;




}