    <?php

// if (!session_id()) {

    session_start();

// }

require_once 'vendor/autoload.php';

$fclient = new \Facebook\Facebook([
    'app_id' => '499765648436916',

    'app_secret' => '05c7cf68d5abb3615757f74c96672bd0',

    'default_graph_version' => 'v2.10',
]);

$helper = $fclient->getRedirectLoginHelper();

if (isset($_GET['state'])) {
    $helper->getPersistentDataHandler()->set('state', $_GET['state']);
}

?>