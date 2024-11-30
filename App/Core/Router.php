<?php

namespace App\Core;

class Router 
{
  const CONTROLLER_NAMESPACE = 'App\Controllers\\';

  public function run() 
  {
      $namespace = $this->get_namespace(); 
      if (!class_exists($namespace)) {
          $namespace = self::CONTROLLER_NAMESPACE . 'Error';
      }
      $controller = new $namespace;
      $method = $this->get_method();

      if (method_exists($controller, $method)) {
          $controller->$method();
      } else {
          echo "Method '$method' not found";
      }
  }

  private function get_namespace(): string
  {
    $controller_name = $this->prepare_controllers_name();
    if(is_string($controller_name)){
      $namespace = $controller_name;
    } else {
      $namespace = $controller_name[1];
    } 
    return self::CONTROLLER_NAMESPACE . ucfirst($namespace);
  } 

  private function prepare_controllers_name(): array | string
  {
    $result = 'Main';
    if(isset($_SERVER["REQUEST_URI"])){
      $result = explode('/', $_SERVER["REQUEST_URI"]);
    } 
    if(is_array($result) && empty($result[1])){
      return $result = 'Main';
    }
    return $result;
  }

  private function get_method(): string 
  {
    $uri_parts = explode('/', trim($_SERVER["REQUEST_URI"], '/'));
    return isset($uri_parts[1]) ? $uri_parts[1] : 'index';
  }

    
}