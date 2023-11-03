<!doctype html>
<html lang="pt_BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../../Resources/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../Resources/css/icons.min.css">
  <link rel="stylesheet" href="../../node_modules/bootstrap-table/dist/bootstrap-table.min.css">
  <link rel="stylesheet" href="../../Resources/css/main.css">

  <!-- Latest compiled and minified CSS -->

</head>

<body class="bg-light">
  <header>
    <nav class="bg-dark navbar navbar-expand-lg border-bottom border-body" data-bs-theme="dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/">Home</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <main class=" container-fluid">

    <section class="my-5">

      <!-- BOTAO CADASTRO  -->
      <div class="my-3 d-flex justify-content-end">
        <a class="rounded-circle botaoModal text-center d-flex justify-content-center align-items-center" href="" type="button" data-bs-toggle="modal" data-bs-target="#cadastrar-modal"><i class="uil-user-plus ms-1" id="icone"></i></a>
      </div>

      <div class="row">
        <div class="col-sm-12">
          <!-- Profile -->
          <div class="card profile rounded-5">
            <div class="card-body profile-user-box">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <div class="mx-3" id="IMAGEM">
                        <img src="../../Resources/imagem/image.png" alt="" class="img-thumbnail imagem">
                      </div>
                    </div>
                    <div class="col">
                      <div>
                        <h2 class="mt-1 mb-1 text-white text-uppercase" id="NOME">
                        </h2>

                        <ul class="mb-0 list-inline text-light">

                          <li class="list-inline-item">
                            <p class="mb-0 font-13 text-white-50">CPF
                            </p>
                            <h5 class="mb-1 text-white text-center" id="CPF"></h5>

                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-sm-4 d-flex justify-content-end">
                      <i class="ri-contacts-fill text-sm-end iconeProfile"></i>

                    </div>
                  </div>

                </div> <!-- end col-->

                <!-- end col-->
              </div> <!-- end row -->

            </div> <!-- end card-body/ profile-user-box-->
          </div><!--end profile/ card -->
        </div> <!-- end col-->
      </div>
    </section>

    <section>
      <div id="BUSCAR-CONTATO">
        <!-- LOADING -->
        <div id="Divtable" class="border shadow-lg mb-5 border-primary-subtle mt-5 border rounded-5 shadow-lg bg-light">
          <div class="card-header bg-primary">

          </div>
          <div class="card-body my-3 mx-3 ">
            <table id="table" class="table-striped" data-show-columns="true" data-search="true" data-search-highlight="true" data-show-columns-search="true" data-click-to-select="true" data-minimum-count-columns="2" data-sort-class="table-active" data-sortable="true" data-buttons-class="primary" data-show-copy-rows="true" data-show-print="true" data-mobile-responsive="true" data-locale="pt-BR" data-toggle="table" data-sort-class="table-active" data-pagination="true" data-buttons-align="left" data-unique-id="ID">
              <thead class="m-0">
                <tr class=" text-center">
                  <th data-formatter="OperateFormat">OPERAÇÕES </th>
                  <th data-field="CONTATO" data-sortable="true" class="text-uppercase text-center">CONTATO</th>
                  <th data-field="TIPO_CONTATO" data-formatter="TipoFormat" data-sortable="true" class="text-uppercase text-center">TIPO</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>

          </div>
        </div>


      </div>
    </section>
  </main>

  <!-- MODAL -->
  <div class="modal" tabindex="-1" id="cadastrar-modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">CADASTRAR CONTATO</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="formGravacao">
            <input id="ID_EDIT" type="text" hidden>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">CONTATO</span>
              <input id="CONTATO_CADASTRO" type="text" class="form-control" placeholder="Nome" aria-label="Username" aria-describedby="basic-addon1" required>
            </div>
            <div class="input-group mb-3">
              <div class="form-floating">
                <select id="TIPO_CADASTRO" class="form-select" id="floatingSelect" required>
                  <option value="select" selected>Selecione</option>
                  <option value="0">Email</option>
                  <option value="1">Telefone/Celular</option>
                </select>
                <label for="floatingSelect">Tipo de Contato</label>
              </div>
            </div>
          </form>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" id="FECHAR" data-bs-dismiss="modal">Fechar</button>
          <button type="submit" class="btn btn-primary" id="SALVAR">Salvar</button>
        </div>
      </div>
    </div>
  </div>


</body>

<script src="../../node_modules/jquery/dist/jquery.min.js"></script>
<script src="../../node_modules/bootstrap-table/dist/bootstrap-table.js"> </script>
<script src="../../node_modules/bootstrap-table/dist/extensions/filter-control/bootstrap-table-filter-control.min.js"> </script>
<script src="../../node_modules/bootstrap-table/dist/extensions/filter-control/utils.min.js"> </script>
<script src="../../Resources/js/bootstrap.min.js"></script>


<script src="../../node_modules/bootstrap-table/dist/extensions/export/bootstrap-table-export.min.js"> </script>

<script src="../../node_modules/bootstrap-table/dist/bootstrap-table-locale-all.min.js"> </script>
<script src="../../node_modules/bootstrap-table/dist/extensions/print/bootstrap-table-print.min.js"> </script>

<script src="../../node_modules/axios/dist/axios.min.js"> </script>
<script src="../../Resources/js/custom.js"></script>

<script src="../../node_modules/sweetalert/dist/sweetalert.min.js"> </script>




<script src="../../Resources/js/perfil.js"></script>
</body>

</html>