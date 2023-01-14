<?php 

    require_once 'config.php';

    if (isset($_SESSION['access_token'])) {
            header("location:index.php");
    }

    $redirectUrl= "http://localhost/AlRazzak/facebookLogin/fb-callback.php";
    $permission = ['email'];
    $loginUrl  = $helper->getLoginUrl($redirectUrl,$permission);
    //echo $loginUrl;


?>

<div>
<form action="">

    <input type="button" onclick="window.location ='<?php echo $loginUrl ?>' ;" value="login with facebbok">
</form>



</div>