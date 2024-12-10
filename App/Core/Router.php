<?php

namespace App\Core;

final class Router 
{
  const CONTROLLER_NAMESPACE = 'App\Controllers\\';
  const ADMIN_NAMESPACE = 'App\Controllers\Admin\\';

  private array $routes;

  public function __construct()
  {
    $this->routes = require __DIR__ . '/../config/controller.php';
  }

  public function run() 
  {
      $uri = $this->get_current_uri();

      if (str_starts_with($uri, '/admin')) {
            $this->handle_admin_routes($uri);
        } else {
            $this->handle_public_routes($uri);
        }
  }

  private function get_current_uri(): string
  {
      $uri = $_SERVER['REQUEST_URI'];
      $uri = strtok($uri, '?'); 
      return rtrim($uri, '/') ?: '/';
  }

  private function handle_admin_routes(string $uri)
  {
        $admin_uri = str_replace('/admin', '', $uri) ?: '/'; 
        if (isset($this->routes['admin'][$admin_uri])) {
            $route = $this->routes['admin'][$admin_uri];
            $this->dispatch(self::ADMIN_NAMESPACE . $route['controller'], $route['method']);
        } else {
            $this->dispatch(self::ADMIN_NAMESPACE . 'Error', 'index');
        }
  }

  private function handle_public_routes(string $uri)
  {
        if (isset($this->routes['public'][$uri])) {
            $route = $this->routes['public'][$uri];
            $this->dispatch(self::CONTROLLER_NAMESPACE . $route['controller'], $route['method']);
        } else {
            $this->dispatch(self::CONTROLLER_NAMESPACE . 'Error', 'index');
        }
  }

  private function dispatch(string $controller_class, string $method)
  {
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