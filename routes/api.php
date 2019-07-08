<?php

Route::post('user/login','userController@login');

Route::get('user/me',[
    'uses'=>'userController@me',
//    'middleware'=>
]);

Route::post ('user/me',[
    'uses'=>'userController@me',
    'middleware'=>['auth:api']
]);

Route::post ('user/register',[
    'uses'=>'userController@register',
    'middleware'=>['auth:api']
]);

Route::post ('listUsers',[
    'uses'=>'userController@listUsers',
    'middleware'=>['auth:api']
//    'middleware'=>['auth:api','is_admin']
//    'middleware'=>['auth:api','can:is_admin']
]);

