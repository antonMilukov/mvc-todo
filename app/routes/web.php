<?php
/**
 * Routes for web application
 */
return [
    ['', ['action' => 'PublicController@index']],
    ['tasks', ['action' => 'PublicController@showList']],
    ['tasks/create', ['action' => 'PublicController@createTask']],

    ['admin/tasks/create', ['action' => 'AdminController@createTask', 'isNeedAuth' => true]],
    ['admin/tasks/edit', ['action' => 'AdminController@editTask', 'isNeedAuth' => true]],
    ['admin/tasks/store', ['action' => 'AdminController@storeTask', 'isNeedAuth' => true]],

    ['tasks/store', ['action' => 'PublicController@storeTask']],
    ['login', ['action' => 'AuthController@login']],
    ['logout', ['action' => 'AuthController@logout']],
    ['login-send', ['action' => 'AuthController@loginSend']]
];