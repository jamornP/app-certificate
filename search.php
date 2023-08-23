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
               <h4><?php echo $_GET['event'];?></h4> 
               <?php $_SESSION['event']=$_GET['event'];?>
            </div>
            <div class="card-body">
                <form class="d-flex" action="" method="POST">
                    <input class="form-control me-2" type="search" placeholder="ใส่ชื่ออย่างเดียว" aria-label="Search" name="search" autofocus="">
                    <input class="form-control me-2" type="hidden" name="e_name" value="<?php echo $_SESSION['event'];?>">
                    <button class="btn btn-outline-success" type="submit" name="submit">Search</button>
                </form>
            </div>
            
        </div>
        <?php
            if(isset($_POST['submit'])){ 
                ?>
                <div class="card shadow mt-3">
                    
                    <div class="card-body">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>ชื่อ-นามสกุล</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $data = $mangeObj->getCertificate($_POST['search'],$_POST['e_name']);
                           
                            if(count($data)>0){
                                foreach($data as $st){
                                    echo "
                                        <tr>
                                            <td class='text-primary'>{$st['name']}</td>
                                            <td class='text-end'><a href='{$st['link']}' class='btn btn-danger' target='_blank'><i class='fas fa-download'></i> Download</a></td>
                                        </tr>
                                    ";
                                }
                            }else{
                                echo "
                                    <tr>
                                        <td colspan='2' class='text-center text-danger'><i class='fas fa-ban'></i> ไม่พบข้อมูล</td>
                                    </tr>
                                ";
                            }
                            
                            
                        ?>
                            
                        </tbody>
                    </table>
                        
                    </div>
                </div>
                <?php
            }
        ?>
    </div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>
</html>