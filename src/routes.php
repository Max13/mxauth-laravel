<?php

namespace MX;

Route::post('mx', function () {
    return 'Test OK';
});

Route::post('login', '\MX\AuthController@hijackLogin');
