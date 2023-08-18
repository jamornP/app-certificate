<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Project</title>
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
            <?php
            if (isset($_POST['add'])) {
                // print_r($_FILES['file-php']);
                // echo "<br>";
                // print_r($_FILES['f_img']);
                // echo "<br>";
                // print_r($_POST);
                // echo "<br>";
                // print_r($_FILES['f_excel']);
                if (isset($_FILES['file-php']['tmp_name'])) {
                    $ext = (explode(".", $_FILES['file-php']['name']));
                    $new_name = $_POST['f_name'] . "." . $ext[1];
                    $file_path = $_SERVER['DOCUMENT_ROOT'] . "/app-certificate/backend/pages/gencer/" . $new_name;
                    if ($_FILES['file-php']['error'] == 0) {
                        move_uploaded_file($_FILES['file-php']['tmp_name'], $file_path);
                        $data['f_name'] = $new_name;
                        $data['f_path'] = "/app-certificate/backend/pages/gencer/" . $new_name;;
                        if (isset($_FILES['f_img']['tmp_name'])) {
                            $ext2 = (explode(".", $_FILES['f_img']['name']));
                            $new_name2 = $_POST['f_name'] . "." . $ext2[1];
                            $file_path2 = $_SERVER['DOCUMENT_ROOT'] . "/app-certificate/backend/images/example/" . $new_name2;
                            if ($_FILES['f_img']['error'] == 0) {
                                move_uploaded_file($_FILES['f_img']['tmp_name'], $file_path2);
                                $data['f_img'] = "/app-certificate/backend/images/example/" . $new_name2;
                                if (isset($_FILES['f_excel']['tmp_name'])) {
                                    $ext3 = (explode(".", $_FILES['f_excel']['name']));
                                    $new_name3 = "excel-".$_POST['f_name'] . "." . $ext3[1];
                                    $file_path3 = $_SERVER['DOCUMENT_ROOT'] . "/app-certificate/backend/pages/excel/" . $new_name3;
                                    if ($_FILES['f_excel']['error'] == 0) {
                                        move_uploaded_file($_FILES['f_excel']['tmp_name'], $file_path3);
                                        $data['f_excel'] = "/app-certificate/backend/pages/excel/" . $new_name3;
                                        $data['status'] = 1;
                                        $ck = $mangeObj->addPHP($data);
                                        if ($ck) {
                                            $msg = "บันทึกข้อมูลสำเร็จ";
                                            echo "<script>";
                                            echo "alertSuccess('{$msg}','file-php.php')";
                                            echo "</script>";
                                        } else {
                                            $msg = "บันทึกข่อมูลไม่สำเร็จ";
                                            echo "<script>";
                                            echo "alertError('{$msg}','file-php.php')";
                                            echo "</script>";
                                        }
                                    }
                                }
                            }
                        }
                    } else {
                        echo "No file";
                    }
                } else {
                    echo "No file";
                }
            }
            ?>
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>File PHP</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">File PHP</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>


            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline card-info">
                            <div class="card-header ml-auto">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add">
                                    <i class="fas fa-plus"></i> Add PHP
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <?php
                                            $data = $mangeObj->getPHP("data");
                                            foreach ($data as $f) {
                                                echo "
                                                    <div class='col-md-3 col-6 p-1'>
                                                        <img src='{$f['f_img']}' class='img-thumbnail shadow' alt='...'>
                                                        <p class='text-center'>{$f['f_name']}</p>
                                                    </div>
                                                ";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">

                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modal-add">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">เพิ่ม File PHP</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="" method="post" enctype="multipart/form-data" id="from-post">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="f_name">ชื่อ File PHP</label>
                                                <input type="text" class="form-control" id="f_name" placeholder="ชื่อ File" name="f_name" autofocus required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="filePHP">File PHP</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="filePHP" accept=".php" name="file-php" required>
                                                        <label class="custom-file-label" for="filePHP">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="img">รูปแบบ Certificate</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="img" accept=".png, .jpg" name="f_img" required>
                                                        <label class="custom-file-label" for="img">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="excel">File Excel</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="excel" accept=".xls,.xlsx,.csv" name="f_excel" required>
                                                        <label class="custom-file-label" for="excel">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="add">เพิ่ม</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
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
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
</body>

</html>