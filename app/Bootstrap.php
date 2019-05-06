<?php
/** init Session */
\App\Services\Session\SessionManager::getInstance();

/** @var init Database $config */
$config = parse_ini_file(APP_PATH.'/config/application.ini');
\App\Services\Database\Manager::init($config['db']);

/** @var init Auth: also checks is user authorized $auth */
$auth = App\Services\Auth\AuthManager::getInstance();
$r = $auth->checkAuth();

/** init settings for paginator */
\Illuminate\Pagination\Paginator::currentPathResolver(function () {
    return \App\Services\Route\Route::getURI();
});

/** @var init routes and return response $route */
$route = \App\Services\Route\Route::getInstance(APP_PATH . '/routes/web.php');
$route->send();