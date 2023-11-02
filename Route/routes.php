<?php

namespace Route\Routes;

use App\Core\Router;
use App\Controller\HomeController;
use App\Controller\PessoaController;



Router::get('/', [HomeController::class, 'index']);

Router::get('/buscarpessoas', [PessoaController::class, 'index']);
Router::get('/buscarpessoa/{NOME}', [PessoaController::class, 'find']);

Router::post('/gravarpessoa', [PessoaController::class, 'create']);
Router::post('/deletarpessoa', [PessoaController::class, 'destroy']);
Router::post('/editarpessoa', [PessoaController::class, 'update']);
