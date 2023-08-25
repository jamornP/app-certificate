<?php session_start();?>
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

            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Data Certificate</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Data Certificate</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <?php
            if(isset($_GET['msg'])){
                if($_GET['msg']=="ok"){
                    $msg = "ลบมูลสำเร็จ";
                    $p = "batch.php";
                    echo "<script>";
                    echo "alertSuccess('{$msg}','{$p}')";
                    echo "</script>";
                }
                if($_GET['msg']=="error"){
                    $msg = "ลบมูลไม่สำเร็จ";
                    $p = "batch.php";
                    echo "<script>";
                    echo "alertError('{$msg}','{$p}')";
                    echo "</script>";
                }
            }

            ?>

            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <h3 class="card-title">
                                    รายการสร้าง Certificate
                                </h3>
                            </div>

                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Batch Name</th>
                                            <th>Date</th>
                                            <th>Activity Name</th>
                                            <th>Folder</th>
                                            <th>Count</th>
                                            <th>Time</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                        <?php
                                            $data = $mangeObj->getBatchAll();
                                            // print_r($data);
                                            foreach($data as $ba){
                                                $countC = $mangeObj->getDataCerByBatch("count",$ba['ba_name']);
                                                $dateB = datethai_time($ba['ba_date']);
                                                $time = time_dif_TH($ba['ba_start'],$ba['ba_end']);
                                                echo "
                                                    <tr class=''>
                                                        <td><a href='batch-data.php?ba={$ba['ba_name']}'>{$ba['ba_name']}</a></td>
                                                        <td>{$dateB}</td>
                                                        <td>{$ba['activity_name']}</td>
                                                        <td>{$ba['folder']}</td>
                                                        <td>{$countC}</td>
                                                        <td>{$time}</td>
                                                        <td><a href='save.php?del&ac=delbatch&id={$ba['ba_name']}' class='text-danger'><i class='fas fa-trash-alt '></i> Del</a></td>
                                                    </tr>
                                                
                                                ";
                                            }
                                        ?>
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">
                                <?php
                                    $countData = $mangeObj->getDataCerByAll("count");
                                    $c = number_format( $countData, 0 );
                                    echo "<a class=''>จำนวน Certificate ทั้งหมดในระบบ &nbsp;&nbsp;&nbsp;<b class='text-danger'>{$c}</b> &nbsp;&nbsp;&nbsp;ใบ</a>";
                                ?>
                                
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

</body>

</html>