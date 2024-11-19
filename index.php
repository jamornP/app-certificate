<?php require $_SERVER['DOCUMENT_ROOT'] . "/app-certificate/vendor/autoload.php"; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/app-certificate/function/function.php"; ?>
<?php

use App\Model\Mangement;
$mangeObj = new Mangement;
date_default_timezone_set('Asia/Bangkok');
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Science-Certificate</title>
    <link rel="icon" type="image/png" sizes="16x16" href="/app-certificate/favicons/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/app-certificate/favicons/favicon-32x32.png">
    <link rel="apple-touch-icon" sizes="57x57" href="/app-certificate/favicons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/app-certificate/favicons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/app-certificate/favicons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/app-certificate/favicons/apple-touch-icon-76x76.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/app-certificate/favicons/apple-touch-icon-96x96.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/app-certificate/favicons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/app-certificate/favicons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/app-certificate/favicons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/app-certificate/favicons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/app-certificate/favicons/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/app-certificate/favicons/android-icon-192x192.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;200;300&display=swap">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/app-certificate/plugins/fontawesome-free/css/all.min.css">
    <!-- Fonts -->
    <link rel="stylesheet" href="/app-certificate/css/font.css">
    <link rel="stylesheet" href="/app-certificate/css/color.css">
     <!-- Style -->
    <link rel="stylesheet" href="/app-certificate/backend/component/style.css">
</head>
<body>
    <nav class="navbar navbar-dark" style="background-color : #ff7a00">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
        <img src="/app-certificate/backend/images/logo/logo-white.png" alt="Science Logo" class="" style="display:table; margin: 0 auto; max-width:200px;">
        </a>
    </div>
    </nav>
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
               <h4>เลือก Certificate ที่ต้องการ</h4> 
            </div>
            <div class="card-body bg-12">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <?php
                            $data = $mangeObj->getEventShow();
                            foreach ($data as $ev) {
                                $sql = "event={$ev['e_name']}";
                                echo "
                                    
                                    <div class='col-md-3 col-6 p-1 h-100'>
                                        <a href='#' onclick='gotoSearch({$ev['e_id']});'>
                                            <img src='{$ev['e_img']}' class='img-thumbnail shadow' alt='...'>
                                            <p class='text-center'>{$ev['e_name']}</p>
                                        </a>
                                    </div>
                                ";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function gotoSearch(value){
        $.ajax({
            url: 'event.php',
            method: 'POST',
            data: {
                ev: value
            },success: (response) => {
                console.log('good');
                if(response.RespCode == 200){
                    window.location.href = 'search.php'
                }
            }, error: (err) => {
                console.log('bad', err);
            }
        });
    }
</script>
</body>
</html>