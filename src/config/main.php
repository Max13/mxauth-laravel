<?php

return [

    /*
    |--------------------------------------------------------------------------
    | PPF static salt
    |--------------------------------------------------------------------------
    |
    | This salt is static for this app.
    | We could take the domain name, but it may be not static during an app lifetime
    |
    */

    'ssalt' => env('PPF_SSALT'),

    /*
    |--------------------------------------------------------------------------
    | PPF secured salt
    |--------------------------------------------------------------------------
    |
    | This salt will be regenerated every year.
    | When a user doesn't exist, this salt will be used.
    |
    */

    'salt' => env('PPF_SALT'),

    /*
    |--------------------------------------------------------------------------
    | PPF cost and block size (for scrypt)
    |--------------------------------------------------------------------------
    |
    | 15 + 12: ~ 450 on modern phone/computer
    |
    */

   'cost' => env('PPF_COST', 15),

   'block' => env('PPF_BLOCK', 12),

];
