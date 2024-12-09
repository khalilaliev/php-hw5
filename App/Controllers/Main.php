<?php

namespace App\Controllers;

class Main 
{
  public function index()
  {
    require __DIR__ . '/../../App/views/public/main.php';
  }
  public function create()
  {
    echo 'This is Main page and method Create';
  }
  public function update()
  {
    echo 'This is Main page and method Update';
  }
  public function delete()
  {
    echo 'This is Main page and method Delete';
  }
}