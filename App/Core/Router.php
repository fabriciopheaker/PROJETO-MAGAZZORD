<?php

namespace App\Core;

use App\Core\Response;

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

        if ($requestMethod === 'GET') {

          $params = new \stdClass();
          foreach ($matches as $key => $value) {
            $params->$key = $value;
          }

          if (class_exists($controllerClass)) {
            $controllerInstance = new $controllerClass();
            call_user_func_array([$controllerInstance, $method], [$params]);
            return;
          }
        } elseif ($requestMethod === 'POST') {

          $HandlePostData = Response::HandlePost();

          if ($HandlePostData !== null) {
            // INSTANCIA O CONTROLLER
            if (class_exists($controllerClass)) {
              $controllerInstance = new $controllerClass();

              // CHAMA O CONTROLLER E PASSA OS ARGUMENTOS
              call_user_func_array([$controllerInstance, $method], [$HandlePostData]);
            }
            return;
          } else {
            // Caso a solicitação POST não seja válida, exiba um erro
            header("HTTP/1.0 400 Bad Request");
            echo 'Erro 400 - Solicitação inválida';
            return;
          }
        }
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
    // Substitua os segmentos de parâmetros por grupos de captura regex
    $url = preg_replace('/\{(\w+)\}/', '(?P<$1>[^/]+)', $url);

    $pattern = '/^';
    $pattern .= str_replace('/', '\/', $url);
    $pattern .= '\/?'; // Adicionamos '\/?' para corresponder com ou sem a barra final
    $pattern .= '$/';
    return $pattern;
  }
}
