    <?php



// if (!session_id()) {

    session_start();

// }



require_once 'vendor/autoload.php';



$fclient = new \Facebook\Facebook([

    'app_id' => '808253042930657',

    'app_secret' => '53ec210d807fb2d7f598ec8182e9c4f3',

    'default_graph_version' => 'v2.10'

]);





$helper = $fclient->getRedirectLoginHelper();

if (isset($_GET['state'])) {
    $helper->getPersistentDataHandler()->set('state', $_GET['state']);
}


?>