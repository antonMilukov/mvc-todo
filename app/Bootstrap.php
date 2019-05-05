<?php
$config = parse_ini_file(APP_PATH.'/config/application.ini');
\App\Database\Manager::init($config['db']);

$route = \App\Route::getInstance(APP_PATH . '/routes/web.php');
$route->send();