<?php

namespace App\Core;

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
}
