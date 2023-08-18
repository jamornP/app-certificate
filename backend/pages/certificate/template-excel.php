<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>app-certificate</title>
    <!-- link -->
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/app-certificate/backend/component/link.php");   ?>

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- load -->
        <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/app-certificate/backend/component/load.php");   ?>
        <!-- nav -->
        <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/app-certificate/backend/component/navbar.php");   ?>
        <!-- menu-left -->
        <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/app-certificate/backend/component/menu-left.php");   ?>


        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Template Excel</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Template Excel</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-default">
                                <div class="card-header bg-primary">
                                    <h3 class="card-title">Download Template Excel</h3>
                                </div>
                                <div class="card-body p-2">
                                
                                    <p>คลิก Download ใต้ภาพที่ต้องการ</p>
                                    <div class="row">
                                        <?php
                                        $data = $mangeObj->getPHP("data");
                                        $i = 0;
                                        foreach ($data as $f) {
                                            $ext = (explode(".", $f['f_name']));
                                            $new_name = $ext[0] . ".xls";
                                            $i++;
                                            echo "
                                            <div class='col-lg-2 col-md-4 col-4 p-1'>
                                                <div class='form-group clearfix'>
                                                    <div class='icheck-success d-inline'>
                                                        <label for='f{$i}'>
                                                            <img src='{$f['f_img']}' class='img-thumbnail shadow' alt='...' >
                                                        </label>
                                                    </div>
                                                    <p class='text-center'>{$f['f_name']}</p>
                                                    <p class='text-center'><a href='{$f['f_img']}' target='_bank'><i class='nav-icon fas fa-eye'></i> preview</a></p>
                                                    <p class='text-center'><a class='btn btn-info' href='{$f['f_excel']}?f_name={$new_name}&sh_name=data'><i class='nav-icon fas fa-download'></i> Download</a></p>
                                                </div>
                                            </div>
                                        ";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </section>

        </div>

        <!-- footer -->
        <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/app-certificate/backend/component/footer.php");   ?>
        <!-- sidebar -->
        <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/app-certificate/backend/component/sidebar.php");   ?>
    </div>


    <!-- script -->
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/app-certificate/backend/component/script.php");   ?>
    <script>
        // document.addEventListener('DOMContentLoaded', function() {
        //     window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        // })
    </script>
</body>

</html>