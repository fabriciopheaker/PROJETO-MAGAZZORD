<?php
require_once(__DIR__ . '/vendor/autoload.php');

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use App\Core\DoctrineConf;




/* \App\Core\ */

$doctrineConf = DoctrineConf::getInstance();

$entityManager = $doctrineConf->getEntityManager();

return ConsoleRunner::createHelperSet($entityManager);


/* 
    Comandos
    vendor\bin\doctrine list

*/