<?php

/* Optional endpoints */
if (env('POLR_ALLOW_ACCT_CREATION')) {
    $router->get('/signup', ['as' => 'signup', 'uses' => 'UserController@displaySignupPage']);
    $router->post('/signup', ['as' => 'psignup', 'uses' => 'UserController@performSignup']);
}

/* GET endpoints */
$router->get('/', ['as' => 'index', 'uses' => 'IndexController@showIndexPage']);
$router->get('/logout', ['as' => 'logout', 'uses' => 'UserController@performLogoutUser']);
$router->get('/login', ['as' => 'login', 'uses' => 'UserController@displayLoginPage']);
$router->get('/about-polr', ['as' => 'about', 'uses' => 'StaticPageController@displayAbout']);

$router->get('/lost_password', ['as' => 'lost_password', 'uses' => 'UserController@displayLostPasswordPage']);
$router->get('/activate/{username}/{recovery_key}', ['as' => 'activate', 'uses' => 'UserController@performActivation']);
$router->get('/reset_password/{username}/{recovery_key}', ['as' => 'reset_password', 'uses' => 'UserController@performPasswordReset']);

$router->get('/admin', ['as' => 'admin', 'uses' => 'AdminController@displayAdminPage']);

$router->get('/setup', ['as' => 'setup', 'uses' => 'SetupController@displaySetupPage']);
$router->post('/setup', ['as' => 'psetup', 'uses' => 'SetupController@performSetup']);
$router->get('/setup/finish', ['as' => 'setup_finish', 'uses' => 'SetupController@finishSetup']);

$router->get('/{short_url}', ['uses' => 'LinkController@performRedirect']);
$router->get('/{short_url}/{secret_key}', ['uses' => 'LinkController@performRedirect']);

$router->get('/admin/stats/{short_url}', ['uses' => 'StatsController@displayStats']);

/* POST endpoints */
$router->post('/login', ['as' => 'plogin', 'uses' => 'UserController@performLogin']);
$router->post('/shorten', ['as' => 'pshorten', 'uses' => 'LinkController@performShorten']);
$router->post('/lost_password', ['as' => 'plost_password', 'uses' => 'UserController@performSendPasswordResetCode']);
$router->post('/reset_password/{username}/{recovery_key}', ['as' => 'preset_password', 'uses' => 'UserController@performPasswordReset']);

$router->post('/admin/action/change_password', ['as' => 'change_password', 'uses' => 'AdminController@changePassword']);
