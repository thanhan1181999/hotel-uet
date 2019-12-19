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
        'client_id' => '610585633012694',
        'client_secret' => 'b42ddd34d63d96720e0ab8e989cbdb41',
        'redirect' => 'http://localhost/btl/public/callback/facebook',
    ],
    'google' => [
        'client_id' => '934276136656-ani38dg1tmeusg658omtm8ke1s3073o0.apps.googleusercontent.com',
        'client_secret' => 'qBdN_iVRhC8F42cMLbCp5hIF',
        'redirect' => 'http://localhost/btl/public/callback/google',
    ],
];
