<?php

namespace App\Core;

final class Router 
{
  const CONTROLLER_NAMESPACE = 'App\Controllers\\';
  private array $routes;

  public function __construct()
  {
    $this->routes = require __DIR__ . '/../config/controller.php';
  }

  public function run() 
  {
      $uri = $this->get_current_uri();

      if (isset($this->routes[$uri])) {
        $route = $this->routes[$uri];
        $this->dispatch($route['controller'], $route['method']);
      } else {
        $this->dispatch('Error', 'index');
      }
  }

  private function get_current_uri(): string
  {
      $uri = $_SERVER['REQUEST_URI'];
      $uri = strtok($uri, '?'); 
      return rtrim($uri, '/') ?: '/';
  }



  private function dispatch(string $controller_name, string $method)
  {
      $controller_class = self::CONTROLLER_NAMESPACE . ucfirst($controller_name);

        if (class_exists($controller_class)) {
          $controller = new $controller_class();

          if (method_exists($controller, $method)) {
              $controller->$method();
          } else {
              echo "Error: Method '$method' not found in controller '$controller_name'";
          }
      } else {
          echo "Error: Controller '$controller_name' not found.";
      }
  }

    
}