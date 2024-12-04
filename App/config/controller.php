<?php

return [
  '/' => [
      'controller' => 'Main',
      'method' => 'index',
  ],
  '/about' => [
      'controller' => 'About',
      'method' => 'index',
  ],
  '/about/create' => [
      'controller' => 'About',
      'method' => 'create',
  ],
  '/about/update' => [
      'controller' => 'About',
      'method' => 'update',
  ],
  '/gallery' => [
      'controller' => 'Gallery',
      'method' => 'index',
  ],
  '/gallery/show' => [
      'controller' => 'Gallery',
      'method' => 'show',
  ],
];
