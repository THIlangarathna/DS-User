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
        'client_id' => ('1910878942411902'),
        'client_secret' => ('2409f38f18c4543fb221f50e839cc74a'),
        'redirect' => 'http://35.223.106.12/api/auth/facebook/callback',
    ],

    'google' => [
        'client_id' => ('850703002665-to3ksh0447s7fok3nunl3rlpqlv930sm.apps.googleusercontent.com'),
        'client_secret' => ('UPL6caPPimue8oiE6BLFUg7S'),
        'redirect' => 'http://35.223.106.12/api/auth/google/callback',
    ],

];
