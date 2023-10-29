<?php

namespace Route\Routes;

use App\Controller\HomeController;
use App\Core\Router;


Router::get('/', [HomeController::class, 'index']);

Router::get('/teste', [HomeController::class, 'index2']);
