<?php session_start();?>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/app-certificate/backend/auth/auth.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Science-Certificate</title>
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
                // print_r($_FILES['img']);
                // echo "<br>";
                // print_r($_POST);
                if (isset($_FILES['img']['tmp_name'])) {
                    $ext = (explode(".", $_FILES['img']['name']));
                    $new_name = uniqid() . "." . $ext[1];
                    $file_path = $_SERVER['DOCUMENT_ROOT'] . "/app-certificate/backend/images/event/" . $new_name;
                    if ($_FILES['img']['error'] == 0) {
                        move_uploaded_file($_FILES['img']['tmp_name'], $file_path);
                        $data['e_name'] = $_POST['e_name'];
                        $data['e_img'] = "/app-certificate/backend/images/event/".$new_name;
                        $data['e_show'] = 1;
                        print_r($data);
                        $ck = $mangeObj->addEvent($data);
                        if ($ck) {
                            $msg = "บันทึกข้อมูลสำเร็จ";
                            echo "<script>";
                            echo "alertSuccess('{$msg}','event.php')";
                            echo "</script>";
                        } else {
                            $msg = "บันทึกข้อมูลไม่สำเร็จ";
                            echo "<script>";
                            echo "alertError('{$msg}','event.php')";
                            echo "</script>";
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
                            <h1>Event</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Event</li>
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
                                    <i class="fas fa-plus"></i> Add Event
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <?php
                                            $data = $mangeObj->getEvent();
                                            foreach ($data as $ev) {
                                                echo "
                                                    <div class='col-md-2 col-6 p-1'>
                                                        <img src='{$ev['e_img']}' class='img-thumbnail shadow' alt='...'>
                                                        <p class='text-center'>{$ev['e_name']}</p>
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
                                <h4 class="modal-title">เพิ่ม Event</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="" method="post" enctype="multipart/form-data" id="from-post">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>ชื่องาน</label>
                                                <select class="form-control select2" style="width: 100%;" name="e_name">
                                                    <?php
                                                        $data = $mangeObj->getDataCerEvent();
                                                        foreach($data as $e){
                                                            echo "
                                                                <option value='{$e['event']}'>{$e['event']}</option>
                                                            ";
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputFile">File image Event</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="exampleInputFile" accept=".png, .jpg" name="img">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
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
        // $(function() {
        //     bsCustomFileInput.init();
        // });
    </script>
</body>

</html>