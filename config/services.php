<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'facebook' => [
        'client_id' => '446832622912027',
        'client_secret' => '613f044c29bb3fcd09ce297ff4201aaa',
        'redirect' => 'http://hotel-uet.herokuapp.com/callback/facebook',
    ],
    'google' => [
        'client_id' => '692122075312-o0undop48v1prso5n8a2dvovek2nugd3.apps.googleusercontent.com',
        'client_secret' => 'b_HHo_fI1X35pZ7aI8-t1I9A',
        'redirect' => 'http://hotel-uet.herokuapp.com/callback/google',
    ],
];
