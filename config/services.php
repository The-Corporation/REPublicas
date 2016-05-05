<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'mandrill' => [
        'secret' => env('MANDRILL_SECRET'),
    ],

    'ses' => [
        'key'    => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model'  => Republicas\Models\User::class,
        'key'    => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '1333745943307642',
        'client_secret' => 'f26b5fd24534153c3c182782df9777fb',
        'redirect' => 'http://dev.republicas.com/social/login/facebook/callback',
    ],

    'github' => [
        'client_id' => 'f706c6c03c319e2f77ad',
        'client_secret' => 'eb32c1e4e1b04ffc01aca05c2560015dcaab44f8',
        'redirect' => 'http://dev.republicas.com/social/login/github/callback',
    ],

    'twitter' => [
        'client_id' => 'a0xJ56y5mP9E9RCbvjFht3SrF',
        'client_secret' => 'MIkKfmOTpwhFXwKufdDuU1EoQfIgZebDJsrUGclJ9NQ1x36hHp',
        'redirect' => 'http://dev.republicas.com/social/login/twitter/callback',
    ],

];
