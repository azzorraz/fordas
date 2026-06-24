<?php

return [

    '/' => [
        'controller' => 'AuthController',
        'method' => 'login'
    ],

    '/login' => [
        'controller' => 'AuthController',
        'method' => 'login'
    ],

    '/dashboard' => [
        'controller' => 'DashboardController',
        'method' => 'index'
    ],

    '/logout' => [
    'controller' => 'AuthController',
    'method' => 'logout'
    ],

    '/sekolah' => [
    'controller' => 'SekolahController',
    'method' => 'index'
    ],

    '/sekolah/create' => [
    'controller' => 'SekolahController',
    'method' => 'create'
    ],

    '/sekolah/store' => [
    'controller' => 'SekolahController',
    'method' => 'store'
    ],

    '/sekolah/edit' => [
    'controller' => 'SekolahController',
    'method' => 'edit'
    ],

    '/sekolah/update' => [
        'controller' => 'SekolahController',
        'method' => 'update'
    ],

    '/sekolah/delete' => [
    'controller' => 'SekolahController',
    'method' => 'delete'
    ],

    '/user' => [
    'controller' => 'UserController',
    'method' => 'index'
    ],

    '/user/create' => [
    'controller' => 'UserController',
    'method' => 'create'
    ],

    '/user/store' => [
    'controller' => 'UserController',
    'method' => 'store'
    ],

];