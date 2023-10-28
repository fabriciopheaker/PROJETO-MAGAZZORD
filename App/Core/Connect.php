<?php


namespace App\Core;

use PDO;
use PDOException;

class Connect
{
  private static $instance;
  private const HOST = '127.0.0.1';
  private const DBNAME = 'revvo';
  private const USER = 'root';
  private const PASS = 'root';

  private const OPTIONS = [

    //
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",

    /* AQUI TODO ERRO QUE ACONTECER EM VEZ DE ACONTECER UM WARRNING VAI ACONTECER UM EXCEPTION */
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,

    /*QUALQUER RESULTADO VAI VIM COMO UM OBJETO ANONIMO */
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,

    /** Essa função serve para trabalhar com a case natural ou seja os nomes das colunas serão retornados da maneira como foram definidos na consulta SQL*/
    PDO::ATTR_CASE => PDO::CASE_NATURAL

  ];


  public static function getInstance(): PDO
  {
    /* Utilizando o Singleton para única instância*/
    if (empty(self::$instance)) {
      try {
        self::$instance = new PDO("mysql:host=" . self::HOST . ";dbname=" . self::DBNAME, self::USER, self::PASS, self::OPTIONS);
      } catch (PDOException $exception) {

        die("<h1> Whooops! Erro ao conectar....</h1>{$exception->getMessage()}");
      }
    }
    return self::$instance;
  }






  /** metodos construtor e clone foram privados e finais para evitar manipulação e para que der mais consistência a classe */
  private function __construct()
  {
  }
  private function __clone()
  {
  }
}
