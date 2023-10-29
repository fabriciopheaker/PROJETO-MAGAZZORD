<?php

namespace App\Core;



use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

class DoctrineConnect
{
    private $entityManager;

    public function __construct()
    {
        $config = Setup::createAnnotationMetadataConfiguration([__DIR__ . '/src/Entity'], true);
        $this->entityManager = EntityManager::create([
            'driver' => 'pdo_mysql',
            'host' => 'localhost',
            'port' => 3306,
            'dbname' => 'my_database',
            'user' => 'root',
            'password' => 'password',
        ], $config);
    }

    public function getEntityManager()
    {
        return $this->entityManager;
    }

    public function createQueryBuilder()
    {
        return $this->entityManager->createQueryBuilder();
    }

    public function executeQuery($queryBuilder)
    {
        return $queryBuilder->getQuery()->getResult();
    }
}
