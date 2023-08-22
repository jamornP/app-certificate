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
                            <h1>Batch Data Certificate</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Batch Data Certificate</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>


            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Batch Data Certificate
                                </h3>
                            </div>

                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr class='fs-12'>
                                            <th>#</th>
                                            <th>Batch Name</th>
                                            <th>Name</th>
                                            <th>School</th>
                                            <th>Activity</th>
                                            <th>Award</th>
                                            <th>Event</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $data = $mangeObj->getDataCerByBatch("data",$_GET['ba']);
                                            // print_r($data);
                                            foreach($data as $st){
                                                // $countC = $mangeObj->getDataCerByBatch("count",$ba['ba_name']);
                                                // $dateB = datethai_time($ba['ba_date']);
                                                echo "
                                                    <tr class='fs-14'>
                                                        <td>{$st['num']}</td>
                                                        <td class='fs-12'>{$st['ba_name']}</td>
                                                        <td><a href='{$st['link']}' target='_bank'>{$st['name']}</a></td>
                                                        <td class='fs-12'>{$st['school']}</td>
                                                        <td class='fs-12'>{$st['activity']}</td>
                                                        <td class='fs-12'>{$st['award']}</td>
                                                        <td class='fs-12'>{$st['event']}</td>
                                                    </tr>
                                                
                                                ";
                                            }
                                        ?>
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">

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