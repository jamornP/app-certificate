<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'].'/app-certificate/vendor/autoload.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/app-certificate/google-api/vendor/autoload.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/app-certificate/backend/auth/config.php');
use App\Model\Mangement;
$mangeObj = new Mangement;

if(isset($_GET["code"])){
    $toke = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);

}else{
    header('location: login.php');
    exit();
}

if(isset($toke["error"]) != "invalid_grant"){
    $oAuth = new Google_Service_Oauth2($gClient);
    $userData = $oAuth->userinfo_v2_me->get();
    
    echo $userData['email'];
    echo $userData['picture'];
    // echo $userData['picture'];
    $data = $mangeObj->getUser($userData['email'],$userData['picture']);
    if($data['role']=='superadmin'){
        // echo $data;
        header('Location: /app-certificate/backend/pages/index.php');
        exit();
    }elseif($data['role']=='admin'){
        header('Location: /app-certificate/backend/pages/index.php');
        exit();
    }else{
        header('Location: /app-certificate/backend/auth');
        exit();
    }
    // echo "<pre>";
    // var_dump($userData );
    // echo "</pre>";
}else{
    header('Location: index.php');
    exit();
}

?>