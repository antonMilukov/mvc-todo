<?php

return [
    ['', ['action' => 'PublicController@index']],
    ['tasks', ['action' => 'PublicController@showList']],
    ['tasks/create', ['action' => 'PublicController@createTask']],
    ['tasks/store', ['action' => 'PublicController@storeTask']],
    ['login', ['action' => 'AuthController@login']],
    ['logout', ['action' => 'AuthController@logout']],
    ['login-send', ['action' => 'AuthController@loginSend']]
];