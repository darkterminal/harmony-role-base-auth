<?php

use App\Middleware\System\GuestMiddleware;
use App\Middleware\System\AuthMiddleware;
use App\Middleware\System\AdminMiddleware;


$app->get('/', function($request, $response){
	
    return $this->view->render($response, 'welcome.twig');

})->setName('home');

$app->group('/auth', function(){

	$this->get('/signin', 'AuthController:getSignIn')->setName('auth.signin');
	$this->post('/signin', 'AuthController:postSignIn');

	$this->get('/signup', 'AuthController:getSignUp')->setName('auth.signup');
	$this->post('/signup', 'AuthController:postSignUp');

	$this->get('/forgot-password', 'PasswordController:forgotPassword')->setName('auth.forgot.password');
	$this->post('/forgot-password', 'PasswordController:postForgotPassword');

	$this->get('/reset-password', 'PasswordController:resetPassword')->setName('auth.reset.password');
	$this->post('/reset-password', 'PasswordController:postResetPassword');

})->add(new GuestMiddleware($container));

$app->group('/admin', function(){

	$this->get('/signin', 'AdminAuthController:getSignIn')->setName('admin.signin');
	$this->post('/signin', 'AdminAuthController:postSignIn');

	$this->get('/signup', 'AdminAuthController:getSignUp')->setName('admin.signup');
	$this->post('/signup', 'AdminAuthController:postSignUp');

	$this->get('/forgot-password', 'AdminPasswordController:forgotPassword')->setName('admin.forgot.password');
	$this->post('/forgot-password', 'AdminPasswordController:postForgotPassword');

	$this->get('/reset-password', 'AdminPasswordController:resetPassword')->setName('admin.reset.password');
	$this->post('/reset-password', 'AdminPasswordController:postResetPassword');

})->add(new GuestMiddleware($container));

$app->group('/auth', function() {

	$this->get('/password/change', 'PasswordController:getChangePassword')->setName('auth.password.change');
	$this->post('/password/change', 'PasswordController:postChangePassword');

	$this->get('/home', 'AuthController:index')->setName('auth.home');

	$this->get('/signout', 'AuthController:getSignOut')->setName('auth.signout');

})->add(new AuthMiddleware($container));

$app->group('/admin', function() {

	$this->get('/password/change', 'AdminPasswordController:getChangePassword')->setName('admin.password.change');
	$this->post('/password/change', 'AdminPasswordController:postChangePassword');

	$this->get('/home', 'AdminAuthController:index')->setName('admin.home');

	$this->get('/signout', 'AdminAuthController:getSignOut')->setName('admin.signout');

})->add(new AdminMiddleware($container));