<?php

namespace App\Controllers\Admin;

class Dashboard
{
    public function index()
    {
      require __DIR__ . '/../../../App/views/admin/dashboard.php';
    }
}