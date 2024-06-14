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

            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Check ชื่อซ้ำ</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Check ชื่อซ้ำ</li>
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
                                    Check ชื่อซ้ำ
                                </h3>
                            </div>

                            <div class="card-body">
                                <form action="" method="post" enctype="multipart/form-data" id="from-post">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>ชื่องาน</label>
                                                <select class="form-control select2" style="width: 100%;" name="event">
                                                    <?php
                                                        $data = $mangeObj->getDataEvent("data");
                                                        foreach($data as $e){
                                                            echo "
                                                                <option value='{$e['event']}'>{$e['event']}</option>
                                                            ";
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary" name="search">ค้นหา</button>
                                    </div>
                                    
                                </form>
                                <?php
                                    if(isset($_POST['search'])){
                                        // print_r($_POST);
                                        ?>         
                                            <div class="card card-primary card-outline mt-3">
                                                <br>
                                                <table id="example1" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr class='fs-12'>
                                                            <th>#</th>
                                                            <th>ชื่อ</th>
                                                            <th>ชื่อผลงาน</th>
                                                            <th>กิจกรรม</th>
                                                            <th>ระดับ</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $data = $mangeObj->getDataCerByEvent("data",$_POST['event']);
                                                            // print_r($data);
                                                            $i=0;
                                                            foreach($data as $st){
                                                                $i++;
                                                                // $countC = $mangeObj->getDataCerByBatch("count",$ba['ba_name']);
                                                                // $dateB = datethai_time($ba['ba_date']);
                                                                echo "
                                                                    <tr class='fs-14'>
                                                                        <td>{$i}</td>
                                                                        <td>{$st['name']}</td>
                                                                        <td>{$st['project']}</td>
                                                                        <td>{$st['activity']}</td>
                                                                        <td>{$st['level']}</td>
                                                                    </tr>
                                                                
                                                                ";
                                                            }
                                                        ?>
                                                        
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        <?php
                                    }
                                ?>        
                                
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