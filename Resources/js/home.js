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


  $('#buscarContato').click(() => {
    $('#loaderContato').prop("hidden", false);
    indexContatos()
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
    $('#table').bootstrapTable('append', json_dados);
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

function injetarDadosContato(json) {
  let Divtable = document.getElementById('DivtableContato');
  Divtable.hidden = false;
  $('#tableContato').bootstrapTable('removeAll');
  $('#tableContato').bootstrapTable('load', json);

}


function TipoFormat(value, row, index) {
  let badge = `<span class="badge rounded-pill text-bg-primary p-2">Email</span>`
  if (value) {
    badge = `<span class="badge rounded-pill text-bg-danger p-2">Telefone</span>`
  }

  return badge

}


function OperateFormat(value, row, index) {
  let butons = `
  <div class="d-flex justify-content-center"> 

  <a href="pessoa/${row.ID}"   class="text-primary mx-1">
  <i class="ri-user-search-line iconeOperat"></i> 
</a>`;
  return butons;
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
    $('#table').bootstrapTable('append', json_dados);
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


async function indexContatos() {
  let json = await getDados('buscarcontatos');
  if (json) {
    $('#loaderContato').prop("hidden", true);
    injetarDadosContato(json)
  }
}
