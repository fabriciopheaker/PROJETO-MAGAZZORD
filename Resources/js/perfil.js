$(document).ready(function () {

  $('#NOME').text(perfil[0].NOME)
  $('#CPF').text(perfil[0].CPF)

  $('#SALVAR').click(function (event) {


  })


  $('#SALVAR').click((event) => {
    event.preventDefault();
    let id = $('#ID_EDIT').val();
    if (id) {
      let json_dados = {
        ID: id,
        CONTATO: $('#CONTATO_CADASTRO').val(),
        TIPO_CONTATO: $('#TIPO_CADASTRO').val(),
      }
      GravarContatoEditado(json_dados)
    } else {
      gravarContato();

    }
  })











  BuscarContatos()

  $('#FECHAR').click(() => {
    $('#formGravacao input').val('');
    $('#formGravacao select').val('select')
  })

});



async function gravarContato() {
  let json_dados =
  {
    CONTATO: $('#CONTATO_CADASTRO').val(),
    TIPO_CONTATO: $('#TIPO_CADASTRO').val(),
    ID_PESSOA: perfil[0].ID
  }

  let gravar = await PostDados('gravarcontato', JSON.stringify(json_dados))
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

async function BuscarContatos() {

  let json = await getDados('/buscarcontato');
  if (json) {
    injetarDados(json)
  }
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

  <a href="javascript:void(0)" onclick='EditarContato(${JSON.stringify(row)})' class="text-info mx-1" >
    <i class="uil-edit iconeOperat" ></i> 
  </a>
  <a href="javascript:void(0)" onclick='DeletarConta(${JSON.stringify(row)})'    class="text-danger mx-1">
    <i class="uil-times-circle iconeOperat"></i> 
  </a>
  </div>`;
  return butons;

}




function EditarContato(json) {
  $('#cadastrar-modal').modal('show');
  $('#ID_EDIT').val(json.ID);
  $('#CONTATO_CADASTRO').val(json.CONTATO);
  if (json.TIPO_CONTATO) {
    $('#TIPO_CADASTRO').val(1);
  } else {
    $('#TIPO_CADASTRO').val(0);
  }

}

async function GravarContatoEditado(json_dados) {

  let gravar = await PostDados('editarcontato', JSON.stringify(json_dados))
  if (gravar.status = 200) {
    $('#cadastrar-modal').modal('hide');
    swal("Sucesso!", "Registro Atualizado com Sucesso!", "success");
    $('#table').bootstrapTable('append', json_dados);
  } else {
    swal("Whoops!", "Aconteceu algum error!", "error");
  }

}

async function DeletarConta(json) {
  let json_dados = {
    ID: json.ID,
  }
  let gravar = await PostDados('deletarcontato', JSON.stringify(json_dados))

  if (gravar.status = 200) {
    swal("Sucesso!", "Deletado com Sucesso!", "success");
  } else {
    swal("Whoops!", "Aconteceu algum error!", "error");
  }

}