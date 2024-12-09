<?php

namespace App\Controllers;

class About 
{
  public function index()
  {
    require __DIR__ . '/../../App/views/public/about.php';
  }
  public function create()
  {
    echo 'This is About page and method Create';
  }
  public function update()
  {
    echo 'This is About page and method Update';
  }
  public function delete()
  {
    echo 'This is About page and method Delete';
  }
}