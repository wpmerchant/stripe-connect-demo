<?php

require dirname(__DIR__) . '/configuration.php';

// Get Authorization URL
$options['scope'] = array('scope' => 'read_write');
$authUrl = $provider->getAuthorizationUrl($options);
$_SESSION['oauth2state'] = $provider->getState();

// Initilialize Twig classes to be used to render auth complete and index.html views
$loader = new Twig_Loader_Filesystem(dirname(__DIR__) . '/templates');
$twig = new Twig_Environment($loader);

// show the Stripe Connect button on a Twig view
echo $twig->render('index.html', array('auth_url' => $authUrl));
exit();
