<?php

return [
    ['', ['action' => 'PublicController@index']],
    ['tasks', ['action' => 'PublicController@showList']],
    ['tasks/create', ['action' => 'PublicController@create']],
    ['tasks/store', ['action' => 'PublicController@store']]
];