<?php session_start(); ?>
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
            if(isset($_GET['del'])){
                if($_GET['del']=='ok'){
                    $msg = "ลบข้อมูลสำเร็จ";
                    echo "<script>";
                    echo "alertSuccess('{$msg}','index.php')";
                    echo "</script>";
                }else{
                    $msg = "ลบข้อมูลไม่สำเร็จ";
                    echo "<script>";
                    echo "alertError('{$msg}','index.php')";
                    echo "</script>";
                }               
            }
            if (isset($_POST['add'])) {
                // print_r($_FILES['bg']);
                // echo "<br>";
                // print_r($_POST);
                $data['u_email']=$_POST['u_email'];
                $data['u_password']=$_POST['u_password'];
                $data['u_name']=$_POST['u_name'];
                $data['role']="admin";
                $ck = $mangeObj->addUser($data);
                if ($ck) {
                    $msg = "บันทึกข้อมูลสำเร็จ";
                    echo "<script>";
                    echo "alertSuccess('{$msg}','index.php')";
                    echo "</script>";
                } else {
                    $msg = "บันทึกข้อมูลไม่สำเร็จ";
                    echo "<script>";
                    echo "alertError('{$msg}','index.php')";
                    echo "</script>";
                }
                
            }
            ?>
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Member</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Member</li>
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
                                    <i class="fas fa-plus"></i> Add Member
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th>ที่</th>
                                                <th>ชื่อ นามสกุล</th>
                                                <th>Email</th>
                                                <th>role</th>
                                                <th>จัดการ</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $dataU = $mangeObj->getAllUser();
                                                    $i = 0;
                                                    foreach($dataU as $u){
                                                        $i++;
                                                        echo "
                                                            <tr>
                                                                <td>{$i}</td>
                                                                <td>{$u['u_name']}</td>
                                                                <td>{$u['u_email']}</td>
                                                                <td>{$u['role']}</td>
                                                                <td><a href='del.php?del=del&id={$u['u_id']}'>ลบ</a></td>
                                                            </tr>
                                                        ";
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
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
                                <h4 class="modal-title">เพิ่ม Member</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="" method="post" enctype="multipart/form-data" id="from-post">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="u_email">Email <b class="text-danger">*</b></label>
                                                <input type="text" class="form-control" id="u_email" placeholder="Email" name="u_email" autofocus>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="u_password">Password</label>
                                                <input type="password" class="form-control" id="u_password" placeholder="Password" name="u_password">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="u_name">ชื่อ สกุล</label>
                                                <input type="text" class="form-control" id="u_name" placeholder="ชื่อ นามสกุล" name="u_name">
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
        // $(function() {
        //     bsCustomFileInput.init();
        // });
    </script>
</body>

</html>