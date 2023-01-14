<?php 

       

    require_once '../db/connect.php';
    // if (!session_id()) {
    //     session_start();
    // }
    require_once 'config.php';

    try {
        $accessToken = $helper->getAccessToken();

    } catch (\Facebook\Exceptions\FacebookResponseException $e) {
        echo "Reaponse Exception" . $e->getMessage();
        exit(); 
    } catch (\Facebook\Exceptions\FacebookSDKException $e){
        echo "SDK Exception" . $e->getMessage();
        exit(); 
    }   

    if (!$accessToken ) {
        header("location: ../sociallogin.php");
        exit();
    }

    $Oauth2Client = $fclient->getOAuth2Client();

    if (!$accessToken->isLongLived()) {
        $accessToken = $Oauth2Client->getLongLivedAccessToken($accessToken);
    }
    $response = $fclient->get("me?fields=id,first_name,last_name,email,picture.type(large)", $accessToken);
    $userData = $response->getGraphNode()->asArray();

    // echo "<pre>";
    // var_dump($userData);
    $social_id = $userData['id'];
    $first_name = $userData['first_name'];
    $last_name = $userData['last_name'];
    $email = $userData['email'];
    $picture =$userData['picture']['url'];
    
    $check_name =mysqli_query($con,"select * from social_users where first_name ='$first_name'");
    $num_row= mysqli_num_rows($check_name);
    if($num_row >= 1){
        $update = mysqli_query($con,"update social_users set social_id = '$social_id',first_name = '$first_name',last_name = '$last_name',email = '$email',picture = '$picture' where social_id ='$social_id'");
        if ($update == 1) {
            $_SESSION['userData'] = $userData;
            $_SESSION['access_token'] = (string) $accessToken;

            header("location: ../moketest.php");
        }
    }
    else{
            $query = mysqli_query($con,"insert into social_users(social_id,first_name,last_name,email,picture) values('$social_id','$first_name','$last_name','$email','$picture')");
        // echo "<pre>";
        // print_r($first_name .'+'. $last_name .'+'. $email);
        if ($query == 1) {
            $_SESSION['userData'] = $userData;
            $_SESSION['access_token'] = (string) $accessToken;

            header("location: ../moketest.php");

        }
        else {
            echo 'error';
        }
    }
    
    
        
?>  