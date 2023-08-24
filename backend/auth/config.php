<?php
    session_start();
    require_once($_SERVER['DOCUMENT_ROOT'] .'/app-certificate/google-api/vendor/autoload.php');
    $gClient = new Google_Client();
    $gClient->setClientId("584689131463-qgtl775eq4d7ql9murb4kchhudr0lck4.apps.googleusercontent.com");
    $gClient->setClientSecret("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");
    $gClient->setApplicationName("App-Certificate");
    if(isset($_SESSION['linux'])){
        if($_SESSION['linux']){
            $gClient->setRedirectUri("http://sciserv01.sci.kmitl.ac.th/app-certificate/backend/auth/controller.php");
        }else{
            $gClient->setRedirectUri("http://localhost/app-certificate/backend/auth/controller.php");
        }
    }else{
        $gClient->setRedirectUri("http://sciserv01.sci.kmitl.ac.th/app-certificate/backend/auth/controller.php");
    }
    $gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");

    $login_url = $gClient->createAuthUrl();

?>