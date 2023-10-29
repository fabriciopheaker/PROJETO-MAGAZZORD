<?php

namespace App\Core;


use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class DoctrineConf
{
  private const DB_NAME = 'magazzord';
  private const USER = 'root';
  private const PASSWORD = 'root';
  private const HOST = 'MAGAZORD-BD';
  private const DRIVER = 'pdo_mysql';
  private const PATH = __DIR__ . "/../Database";
  private static $instance;
  private $entityManager;

  private function __construct()
  {
    $conn = [
      'dbname'   => self::DB_NAME,
      'user'     => self::USER,
      'password' => self::PASSWORD,
      'host'     => self::HOST,
      'driver'   => self::DRIVER,
      'path' => self::PATH,
    ];

    $config = Setup::createYAMLMetadataConfiguration([__DIR__ . '/../Model/'], true);
    $this->entityManager = EntityManager::create($conn, $config);
  }


  public static function getConfig()
  {
    return [
      'dbname'   => self::DB_NAME,
      'user'     => self::USER,
      'password' => self::PASSWORD,
      'host'     => self::HOST,
      'driver'   => self::DRIVER,
      'path' => self::PATH,
    ];
  }

  public static function getInstance()
  {
    if (self::$instance === null) {
      self::$instance = new self();
    }
    return self::$instance;
  }

  public function getEntityManager()
  {
    return $this->entityManager;
  }



  public function checkConnection()
  {
    try {
      $this->entityManager->getConnection()->connect();
      echo "Conexão com o banco de dados estabelecida com sucesso!";
    } catch (\Exception $e) {
      echo "Erro na conexão com o banco de dados: " . $e->getMessage();
    }
  }
}
