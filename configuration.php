<?php

require __DIR__ . '/vendor/autoload.php';

// start session to use session vars in auth and complete index.php files
session_start();

// use Dotenv to securely store stripe configuration info - make sure the .env file isn't included in the git repo.  Add .env to .gitignore.  Add your stripe info to the .env file
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

// these variables are required for this functionality to work
// an exception will be thrown if they are absent
try {
    $dotenv->required(['LIVE_CLIENT_ID', 'LIVE_CLIENT_SECRET', 'TEST_CLIENT_SECRET', 'TEST_CLIENT_ID']);
} catch (Exception $e) {
    var_dump($e);
    exit();
}

// get the stripe configuration settings from the .env file
$clientId = getenv('LIVE_CLIENT_ID');
$clientSecret = getenv('LIVE_CLIENT_SECRET');
$testClientId = getenv('TEST_CLIENT_ID');
$testClientSecret = getenv('TEST_CLIENT_SECRET');

// Create live OAuth provider
$provider = new \AdamPaterson\OAuth2\Client\Provider\Stripe([
    'clientId' => $clientId,
    'clientSecret' => $clientSecret,
    'redirectUri' => 'https://www.wpmerchant.com/stripe-connect-new/complete/',
        ]);

// Create test OAuth provider
$test_provider = new \AdamPaterson\OAuth2\Client\Provider\Stripe([
    'clientId' => $testClientId,
    'clientSecret' => $testClientSecret,
    'redirectUri' => 'https://www.wpmerchant.com/stripe-connect-new/complete/',
        ]);
