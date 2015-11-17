<?php

require dirname(__DIR__) . '/configuration.php';

// If there isn't a code, echo an error
if (!isset($_GET['code'])) {
    exit('No Code Provided');
}

// Check given state against previously stored one to mitigate CSRF attack
if (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {
    echo $_GET['state'] . ':' . $_SESSION['oauth2state'];
    unset($_SESSION['oauth2state']);
    exit('Invalid State');
}

// Get live access token (using the authorization code grant)
$token = $provider->getAccessToken('authorization_code', [
    'code' => $_GET['code']
        ]);

// Get refresh token
$refreshToken = $token->refresh_token;

// Get test access token (using the refresh token grant)
$test_token = $test_provider->getAccessToken('refresh_token', [
    'refresh_token' => $refreshToken
        ]);

// Initilialize Twig classes to be used to render auth complete and index.html views
$loader = new Twig_Loader_Filesystem(dirname(__DIR__) . '/templates');
$twig = new Twig_Environment($loader);

// Show the Authorized User's Live and Test Stripe Credentials
echo $twig->render('complete.html', array('token' => $token, 'test_token' => $test_token));

exit();
