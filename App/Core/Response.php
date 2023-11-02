<?php

namespace App\Core;

use stdClass;

class Response
{
  public static function json($dados)
  {
    $dados = json_encode($dados);
    return print_r($dados);
  }

  public static function HandlePost()
  {
    $data = file_get_contents('php://input');
    return json_decode($data);
  }
  public static function Error()
  {
    $error = new stdClass();
    $error->header = header("HTTP/1.0 500 Bad Request");
    return print_r($error, true);
  }
}
