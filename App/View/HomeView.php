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
        </div>
      </div>
    </nav>
  </header>
  <main class=" container-fluid">
    <section class="container mt-5">


      <div class="card text-center">
        <div class="card-header">
          <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
              <a class="nav-link active" data-bs-toggle="tab" href="#pessoa">Pessoa</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="tab" href="#contato">Contato</a>
            </li>
          </ul>
        </div>
        <div class="card-body">
          <div class="tab-content">
            <div id="pessoa" class="tab-pane fade show active">
              <!-- BUSCAR PESSOA -->
              <div id="BUSCAR-PESSOA">
                <!-- BOTAO CADASTRO  -->
                <div class="my-3 d-flex justify-content-end">
                  <a class="rounded-circle botaoModal text-center d-flex justify-content-center align-items-center" href="" type="button" data-bs-toggle="modal" data-bs-target="#cadastrar-modal"><i class="uil-user-plus ms-1" id="icone"></i></a>
                </div>
                <form id="PESQUISAR_PESSOA" class="col-lg-12 col-md-8 col-sm-6 card mb-3  shadow-lg ">
                  <div class="card">
                    <div class="card-header bg-secondary py-3">
                      <h1 class="h4 text-light">Buscar Pessoa</h1>
                    </div>
                    <div class="card-body mx-5">
                      <label class="form-label">Nome</label>
                      <input id="NOME" type="text" class="form-control">
                    </div>
                    <div class="card-footer">
                      <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-primary" id="buscarPessoa">Buscar</button>
                      </div>
                    </div>
                  </div>
                </form>

                <!-- LOADING -->

                <div class="d-flex justify-content-center my-5" style="display: none;">
                  <div id="loader" hidden class="spinner-border" role="status" style="width: 7rem; height: 7rem;">
                    <span class="visually-hidden">Loading...</span>
                  </div>
                </div>

                <div id="Divtable" class="border shadow-lg mb-5 border-primary-subtle mt-5 border rounded-5 shadow-lg bg-light" hidden="true">
                  <div class="card-header bg-primary">

                  </div>
                  <div class="card-body my-3 mx-3 ">
                    <table id="table" class="table-striped" data-show-columns="true" data-search="true" data-search-highlight="true" data-show-columns-search="true" data-click-to-select="true" data-minimum-count-columns="2" data-sort-class="table-active" data-sortable="true" data-buttons-class="primary" data-show-copy-rows="true" data-show-print="true" data-mobile-responsive="true" data-locale="pt-BR" data-toggle="table" data-sort-class="table-active" data-pagination="true" data-buttons-align="left" data-unique-id="ID">
                      <thead class="m-0">
                        <tr class=" text-center">
                          <th data-formatter="OperateFormat">OPERAÇÕES </th>
                          <th data-field="ID" class="text-uppercase text-center">ID </th>
                          <th data-field="NOME" data-sortable="true" class="text-uppercase text-center">NOME</th>
                          <th data-field="CPF" data-sortable="true" class="text-uppercase text-center">CPF</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>




            </div>
            <div id="contato" class="tab-pane fade">

              <!-- BUSCAR CONTATO  -->
              <div id="BUSCAR-CONTATO">

                <form id="PESQUISAR_PESSOA" class="col-lg-12 col-md-8 col-sm-6 card mb-3  shadow-lg ">
                  <div class="card">
                    <div class="card-header bg-secondary py-3">
                      <h1 class="h4 text-light">Buscar Contato</h1>
                    </div>
                    <div class="card-body mx-5">
                      <label class="form-label">Contato</label>
                      <input id="CONTATO" type="text" class="form-control">
                    </div>
                    <div class="card-footer">
                      <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-primary" id="buscarContato">Buscar</button>
                      </div>
                    </div>
                  </div>
                </form>

                <!-- LOADING -->

                <div class="d-flex justify-content-center my-5" style="display: none;">
                  <div id="loaderContato" hidden class="spinner-border" role="status" style="width: 7rem; height: 7rem;">
                    <span class="visually-hidden">Loading...</span>
                  </div>
                </div>

                <div id="DivtableContato" class="border shadow-lg mb-5 border-primary-subtle mt-5 border rounded-5 shadow-lg bg-light" hidden="true">
                  <div class="card-header bg-primary">

                  </div>
                  <div class="card-body my-3 mx-3 ">
                    <table id="tableContato" class="table-striped" data-show-columns="true" data-search="true" data-search-highlight="true" data-show-columns-search="true" data-click-to-select="true" data-minimum-count-columns="2" data-sort-class="table-active" data-sortable="true" data-buttons-class="primary" data-show-copy-rows="true" data-show-print="true" data-mobile-responsive="true" data-locale="pt-BR" data-toggle="table" data-sort-class="table-active" data-pagination="true" data-buttons-align="left" data-unique-id="ID">
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


            </div>
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
          <h5 class="modal-title">CADASTRAR PESSOA</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="formGravacao">
            <input id="ID_EDIT" type="text" hidden>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">NOME</span>
              <input id="NOME_CADASTRO" type="text" class="form-control" placeholder="Nome" aria-label="Username" aria-describedby="basic-addon1" required>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">CPF</span>
              <input id="CPF_CADASTRO" type="text" class="form-control" placeholder="CPF" aria-label="Username" aria-describedby="basic-addon1" require>
            </div>
          </form>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-primary" id="SALVAR">Salvar</button>
        </div>
      </div>
    </div>
  </div>














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




  <script src="../../Resources/js/home.js"></script>
</body>

</html>