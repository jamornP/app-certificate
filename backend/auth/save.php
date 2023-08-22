<?php require $_SERVER['DOCUMENT_ROOT'] . "/app-certificate/vendor/autoload.php"; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/app-certificate/function/function.php"; ?>
<?php
use App\Model\Mangement;
$mangeObj = new Mangement;
date_default_timezone_set('Asia/Bangkok');

// print_r($_POST);
if(isset($_POST['login'])){
    $data['u_email']=$_POST['u_email'];
    $data['u_password']=$_POST['u_password'];
    $ck = $mangeObj->checkUser($data);
    echo $ck;
    if ($ck) {
        header('Location: /app-certificate/backend/pages');
        exit();
    } else {
        header('Location: /app-certificate/backend/auth');
        exit();
    }
}else{
    header('Location: /app-certificate/backend/auth');
    exit();
}

?>