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

    'google' => [
        'client_id' => '799453836707-anqpbe2c8i6b69eva3nmcbu6ud9dlthg.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => '/auth/google/callback',
        'analytics_id'  =>  config('templatecookie.google_analytics'),
        'active' => true
    ],

    'facebook' => [
        'client_id' => '',
        'client_secret' =>'',
        'redirect' => '/auth/facebook/callback',
        'active' => false
    ],

    'twitter' => [
        'client_id' => '',
        'client_secret' => '',
        'redirect' => '/auth/twitter/callback',
        'active' => false
    ],

    'linkedin-openid' => [
        'client_id' => 'vfdfgsd',
        'client_secret' => 'gfgdfgfgf',
        'redirect' => '/auth/linkedin-openid/callback',
        'active' => true
    ],

    'github' => [
        'client_id' => 'a9e11417af8081a33862',
        'client_secret' => '38fb0bc271c684b9fc25b703ab97e9b9c7992c62',
        'redirect' => '/auth/github/callback',
        'active' => true
    ],
];
