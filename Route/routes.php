<?php

namespace Route\Routes;

use App\Core\Router;
use App\Controller\HomeController;
use App\Controller\PessoaController;
use App\Controller\ContatoController;



Router::get('/', [HomeController::class, 'index']);

Router::get('/buscarpessoas', [PessoaController::class, 'index']);
Router::get('/buscarcontatos', [ContatoController::class, 'index']);


Router::get('/buscarpessoa/{NOME}', [PessoaController::class, 'find']);
Router::get('/pessoa/{ID}', [PessoaController::class, 'show']);
Router::post('/gravarpessoa', [PessoaController::class, 'create']);
Router::post('/deletarpessoa', [PessoaController::class, 'destroy']);
Router::post('/editarpessoa', [PessoaController::class, 'update']);

Router::post('/pessoa/{ID}/gravarcontato', [ContatoController::class, 'create']);
Router::get('/pessoa/{ID}/buscarcontato', [ContatoController::class, 'findAll']);
Router::post('/pessoa/{ID}/deletarcontato', [ContatoController::class, 'destroy']);
Router::post('/pessoa/{ID}/editarcontato', [ContatoController::class, 'update']);
