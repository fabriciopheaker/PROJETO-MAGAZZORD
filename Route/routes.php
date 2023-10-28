<?php

namespace Route\Routes;

use App\Controller\Controller;
use App\Core\Router;


Router::get('/', [Controller::class, 'teste']);
