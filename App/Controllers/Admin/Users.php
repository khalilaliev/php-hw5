<?php

namespace App\Controllers\Admin;

class Users
{
    public function index()
    {
      require __DIR__ . '/../../../App/views/admin/users/users.php';
    }

    public function create()
    {
      echo 'This is the Admin User create method';
    }
}
