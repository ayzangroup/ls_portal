<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
	    'client_id' => '1634124189976796',
	    'client_secret' => '924ce202c2be13d9fafc470b1db71286',
	    'redirect' => 'https://developer.launderservices.com/auth/facebook/callback',
    ],

    'google' => [
        'client_id' => '102303258599-slp21ql8qeak8eosubcnqad56sqdtc48.apps.googleusercontent.com',
        'client_secret' => 'vHByDC_30O7iofh0fOgLYJDR',
        'redirect' => 'https://developer.launderservices.com/auth/google/callback',
    ],




];
