$(document).ready(function () {
  $('#buscarPessoa').click(() => {
    $('#loader').prop("hidden", false);
    let nome = $('#NOME').val().trim();
    if (nome) {
      findPessoa(nome)
    } else {
      indexPessoas()
    }

  })


  $('#SALVAR').click(() => {
    let id = $('#ID_EDIT').val();
    if (id) {
      let json_dados = {
        ID: id,
        NOME: $('#NOME_CADASTRO').val(),
        CPF: $('#CPF_CADASTRO').val(),
      }

      GravarPessoaEditada(json_dados)
    } else {
      gravarPessoa()

    }
  })


});

async function indexPessoas() {
  let json = await getDados('buscarpessoas');
  if (json) {
    $('#loader').prop("hidden", true);
    injetarDados(json)
  }
}

async function findPessoa(nome) {

  let json = await getDados('buscarpessoa/' + nome);
  if (json) {
    $('#loader').prop("hidden", true);
    injetarDados(json)
  }
}



async function gravarPessoa() {
  let json_dados = {
    NOME: $('#NOME_CADASTRO').val(),
    CPF: $('#CPF_CADASTRO').val()
  }
  let gravar = await PostDados('gravarpessoa', JSON.stringify(json_dados))
  if (gravar.status = 200) {
    $('#cadastrar-modal').modal('hide');
    setTimeout(function () {
      swal("Sucesso!", "Gravado com Sucesso!", "success");
    }, 1000);
  }
  else {
    $('#cadastrar-modal').modal('hide');
    setTimeout(function () {
      swal("Whoops!", "Aconteceu algum error!", "error");
    }, 1000);
  }
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
  <a href="javascript:void(0)" onclick='EditarPessoa(${JSON.stringify(row)})' class="text-info mx-1" >
    <i class="uil-edit iconeOperat" ></i> 
  </a>
  <a href="javascript:void(0)" onclick='DeletarPessoa(${JSON.stringify(row)})'    class="text-danger mx-1">
    <i class="uil-times-circle iconeOperat"></i> 
  </a>
  </div>`;
  return butons;
  onclick = 'verCurso(${JSON.stringify(element)})'
}

function EditarPessoa(json) {
  $('#cadastrar-modal').modal('show');
  $('#ID_EDIT').val(json.ID);
  $('#NOME_CADASTRO').val(json.NOME);
  $('#CPF_CADASTRO').val(json.CPF);
}

async function GravarPessoaEditada(json_dados) {

  let gravar = await PostDados('editarpessoa', JSON.stringify(json_dados))
  if (gravar.status = 200) {
    $('#cadastrar-modal').modal('hide');
    swal("Sucesso!", "Registro Atualizado com Sucesso!", "success");
  } else {
    swal("Whoops!", "Aconteceu algum error!", "error");
  }

}

async function DeletarPessoa(json) {
  let json_dados = {
    ID: json.ID,
  }
  let gravar = await PostDados('deletarpessoa', JSON.stringify(json_dados))
  if (gravar.status = 200) {
    swal("Sucesso!", "Deletado com Sucesso!", "success");
  } else {
    swal("Whoops!", "Aconteceu algum error!", "error");
  }

}