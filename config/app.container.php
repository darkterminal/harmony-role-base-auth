<?php

/**
 * 
 * Silahkan definisakn container buatan anda di bawah area ini.
*/
$container['auth'] = function($container){
    return new \App\Support\Auth\Auth;
};

$container['AuthController'] = function($container){
    return new \App\Controllers\Auth\AuthController($container);
};

$container['PasswordController'] = function($container){
    return new \App\Controllers\Auth\PasswordController($container);
};

$container['admin'] = function($container){
    return new \App\Support\Auth\Admin;
};

$container['AdminAuthController'] = function($container){
    return new \App\Controllers\Admin\AdminAuthController($container);
};

$container['AdminPasswordController'] = function($container){
    return new \App\Controllers\Admin\AdminPasswordController($container);
};