<?php require $_SERVER['DOCUMENT_ROOT'] . "/app-certificate/vendor/autoload.php"; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/app-certificate/function/function.php"; ?>
<?php

// use App\Model\Auth;
// $authObj = new Auth;
use App\Model\Mangement;
$mangeObj = new Mangement;
date_default_timezone_set('Asia/Bangkok');
?>
<nav class="main-header navbar navbar-expand navbar-dark">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="" class="nav-link"><i class="fas fa-home"></i> Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/app-certificate/backend/pages/certificate" class="nav-link"><i class="far fa-id-card"></i>  Create Certificate</a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item ">
            <a href="" class="nav-link ">
            <i class="fa fa-power-off"></i> Logout
            </a>
            
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li> -->
    </ul>
</nav>