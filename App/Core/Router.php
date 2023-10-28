<?php

namespace App\Core;

class Router
{
  private static $routes = [];

  public static function get($url, $action)
  {
    self::addRoute('GET', $url, $action);
  }

  public static function post($url, $action)
  {
    self::addRoute('POST', $url, $action);
  }



  private static function addRoute($method, $url, $action)
  {
    self::$routes[] = [
      'method' => $method,
      'url' => $url,
      'action' => $action,
    ];
  }

  public static function captureRoute()
  {

    global $routes;

    $requestUrl = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    if ($requestUrl !== '/') {
      $requestUrl = rtrim($requestUrl, '/');
    }

    $requestMethod = $_SERVER['REQUEST_METHOD'];

    foreach (self::$routes as $route) {
      $pattern = self::buildPattern($route['url']);

      if (preg_match($pattern, $requestUrl, $matches) && $route['method'] === $requestMethod) {
        array_shift($matches);

        $action = $route['action'];
        $controllerClass = $action[0];
        $method = $action[1];
        error_log('cheuguei');
        // Verifica se a classe do controlador foi carregada corretamente pelo autoloader
        if (class_exists($controllerClass)) {
          // Crie a instância do controlador
          $controllerInstance = new $controllerClass();
          error_log(print_r($controllerInstance, true));
          // Chame a ação do controlador com os parâmetros capturados
          call_user_func_array([$controllerInstance, $method], $matches);
        } else {
          // Caso a classe não tenha sido encontrada, exiba uma página de erro 404
          header("HTTP/1.0 404 Not Found");
          echo 'Erro 404 - Página não encontrada';
        }
        return;
      }
    }

    // Caso a rota não seja encontrada, exibir uma página de erro 404
    header("HTTP/1.0 404 Not Found");
    echo 'Erro 404 - Página não encontrada';
  }

  public static function redirect($url, $redirectUrl)
  {
    self::addRoute('GET', $url, function () use ($redirectUrl) {
      header("Location: " . $redirectUrl);
      exit();
    });
  }

  private static function buildPattern($url)
  {
    $pattern = '/^';
    $pattern .= str_replace('/', '\/', $url);
    $pattern .= '\/?'; // Adicionamos '\/?' para corresponder com ou sem a barra final
    $pattern .= '$/';
    return $pattern;
  }
}
