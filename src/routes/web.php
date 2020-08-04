<?php

$this->router->get('/', ['App\Controllers\MainController', 'actionIndex']);
$this->router->get('/sign-in', ['App\Controllers\MainController', 'actionSignIn']);
$this->router->get('/sign-up', ['App\Controllers\MainController', 'actionSignUp']);
$this->router->get('/account', ['App\Controllers\MainController', 'actionAccount']);

$this->router->post('/submit/sign-up', ['App\Controllers\AccountController', 'actionSignUpSubmit']);
$this->router->post('/submit/sign-in', ['App\Controllers\AccountController', 'actionSignInSubmit']);
$this->router->post('/submit/account', ['App\Controllers\AccountController', 'actionAccountChangeSubmit']);
$this->router->any('/exit', ['App\Controllers\AccountController', 'actionExitAccount']);