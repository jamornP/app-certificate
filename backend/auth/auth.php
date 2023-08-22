
<?php
    if(isset($_SESSION['certificate-login']) && $_SESSION['certificate-login']==true){
       
    }else{
        header('Location: /app-certificate/backend/auth');
        exit();
    }
?>