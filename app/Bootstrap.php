<?php
\App\Services\Session\SessionManager::getInstance();

$config = parse_ini_file(APP_PATH.'/config/application.ini');
\App\Services\Database\Manager::init($config['db']);

\Illuminate\Pagination\Paginator::currentPathResolver(function () {
    return \App\Services\Route\Route::getURI();
});

//@todo services - auth -> check
$auth = App\Services\Auth\AuthManager::getInstance();
$r = $auth->checkAuth();

$route = \App\Services\Route\Route::getInstance(APP_PATH . '/routes/web.php');
$route->send();