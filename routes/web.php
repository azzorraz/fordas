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

    '/user/edit' => [
    'controller' => 'UserController',
    'method' => 'edit'
    ],

    '/user/update' => [
        'controller' => 'UserController',
        'method' => 'update'
    ],

    '/user/reset-password' => [
    'controller' => 'UserController',
    'method' => 'resetPassword'
    ],

    '/user/update-password' => [
        'controller' => 'UserController',
        'method' => 'updatePassword'
    ],

    '/user/toggle-status' => [
    'controller' => 'UserController',
    'method' => 'toggleStatus'
    ],

    '/jenis-pengajuan' => [
    'controller' => 'JenisPengajuanController',
    'method' => 'index'
    ],

    '/jenis-pengajuan/create' => [
    'controller' => 'JenisPengajuanController',
    'method' => 'create'
    ],

    '/jenis-pengajuan/store' => [
        'controller' => 'JenisPengajuanController',
        'method' => 'store'
    ],

    '/jenis-pengajuan/edit' => [
    'controller' => 'JenisPengajuanController',
    'method' => 'edit'
    ],

    '/jenis-pengajuan/update' => [
        'controller' => 'JenisPengajuanController',
        'method' => 'update'
    ],

    '/jenis-pengajuan/toggle-status'=>[
    'controller'=>'JenisPengajuanController',
    'method'=>'toggleStatus'
    ],

];