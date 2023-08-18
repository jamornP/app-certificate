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
        <?php date_default_timezone_set('Asia/Bangkok'); ?>

        <div class="content-wrapper">
            <?php
                if (isset($_POST['submit'])) {
                    ?>
                    <div class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1 class="m-0">Create Certificate</h1>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active">Create Certificate</li>
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
                                            <h3 class="card-title">สร้าง Certificate ขั้นตอนที่ 2</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <?php
                                                $bg = $mangeObj->getBgById($_POST['bg']);
                                                echo "
                                                    <div class='col-lg-2 col-md-4 col-6 p-1'>
                                                        <div class='text-center align-items-end'>
                                                            <img src='{$bg['b_path']}{$bg['b_name']}' class='img-thumbnail shadow' alt='...' >
                                                            <p class='text-center'><a href='{$bg['b_path']}{$bg['b_name']}' target='_bank'><i class='nav-icon fas fa-eye'></i> preview</a></p>
                                                        </div>
                                                    </div>
                                                ";
                                                $ca = $mangeObj->getCaById($_POST['ca']);
                                                echo "
                                                    <div class='col-lg-2 col-md-4 col-6 p-1'>
                                                        <div class='text-center pt-4'>
                                                            <img src='{$ca['ca_path']}' class='img-thumbnail shadow' alt='...' >
                                                            <p class='text-center pt-1'><a href='{$ca['ca_path']}' target='_bank'><i class='nav-icon fas fa-eye'></i> preview</a></p>
                                                        </div>
                                                    </div>
                                                ";
                                                $file = $mangeObj->getPHPById($_POST['filephp']);
                                                echo "
                                                    <div class='col-lg-2 col-md-4 col-6 p-1'>
                                                        <div class='text-center align-items-end'>
                                                            <img src='{$file['f_img']}' class='img-thumbnail shadow' alt='...' >
                                                            <p class='text-center'><a href='{$file['f_img']}' target='_bank'><i class='nav-icon fas fa-eye'></i> preview</a></p>
                                                        </div>
                                                    </div>
                                                ";
                                                ?>
                                            </div>
                                        </div>
                                        <form action="<?php echo $file['f_path'];?>" method="post" enctype="multipart/form-data" id="from-post">
                                            <div class="row p-4">
                                                <div class="col-sm-6 col-md-12 col-lg-6">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="excel">File รายชื่อ </label>
                                                            <div class="input-group">
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input" id="excel" accept=".xls, .xlsx, .csv" name="excel" autofocus>
                                                                    <label class="custom-file-label" for="excel">Choose file</label>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="activity_name">ชื่อ กิจกรรม</label>
                                                            <input type="text" class="form-control" id="activity_name" placeholder="Activity name" name="activity_name" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">ชื่อ Folder</label>
                                                            <?php 
                                                                $num = $mangeObj->getBatchName();
                                                                $folder_name = FolderName($num);
                                                            ?>
                                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Folder name" name="folder" value="<?php echo $folder_name;?>" readonly>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="batch">batch number</label>
                                                            <?php 
                                                                $num = $mangeObj->getBatchName();
                                                                $batch_name = BatchName($num);
                                                            ?>
                                                            <input type="text" class="form-control" id="batch" placeholder="Batch name" name="batch_name" value="<?php echo $batch_name;?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                <input type="hidden" class="form-control" name="bg" id="" value="<?php echo $bg['b_path'] . $bg['b_name']; ?>">
                                                <input type="hidden" class="form-control" name="ca" id="" value="<?php echo $ca['ca_path']; ?>">
                                                <input type="hidden" class="form-control" name="filephp" id="" value="<?php echo $file['f_path']; ?>">
                                                <input type="hidden" class="form-control" name="ca_name" id="" value="<?php echo $ca['ca_name']; ?>">
                                                <input type="hidden" class="form-control" name="ca_position" id="" value="<?php echo $ca['ca_position']; ?>">
                                                <input type="hidden" class="form-control" name="ca_position2" id="" value="<?php echo $ca['ca_position2']; ?>">
                                                <input type="hidden" class="form-control" name="batch_date" id="" value="<?php echo date("Y-m-d H:i:s"); ?>">
                                                <input type="hidden" class="form-control" name="batch_num" id="" value="<?php echo $num+1; ?>">
                                            <div class="row p-4">
                                                <div class="col-sm-6 col-md-12 col-lg-6 text-right">
                                                    <button type="submit" class="btn btn-danger" name="submit">สร้าง Certificate</button>
                                                    <button type="submit" class="btn btn-warning" name="review">ดูตัวอย่าง Certificate</button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="card-footer">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </section>
                    <?php 
                } 
            ?>
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
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
</body>

</html>