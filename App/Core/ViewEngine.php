<?php

namespace App\Core;

class ViewEngine
{
  public static function render($nome, $nomeClass = null, $dados = [])
  {
    if ($nomeClass && $dados) {
      echo "<script>let {$nomeClass} = {$dados} </script>";
    }
    require(APP_PATH . "/App/View/{$nome}.php");
  }
}
