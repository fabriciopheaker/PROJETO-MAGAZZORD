<?php

namespace Route\Routes;

use App\Core\Router;
use App\Controller\HomeController;
use App\Controller\PessoaController;



Router::get('/', [HomeController::class, 'index']);

Router::get('/buscarpessoas', [PessoaController::class, 'index']);
Router::post('/gravarpessoa', [PessoaController::class, 'create']);
