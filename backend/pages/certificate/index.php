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
                                    <h3 class="card-title">สร้าง Certificate ขั้นตอนที่ 1</h3>
                                </div>
                                <div class="card-body p-0">
                                    <div class="bs-stepper linear">
                                        <div class="bs-stepper-header" role="tablist">

                                            <!-- <div class="step" data-target="#one">
                                                <button type="button" class="step-trigger" role="tab" aria-controls="one" id="one-trigger" aria-selected="true">
                                                    <span class="bs-stepper-circle">1</span>
                                                    <span class="bs-stepper-label">เลือกไฟล์ Excel</span>
                                                </button>
                                            </div>
                                            <div class="line"></div> -->
                                            <div class="step active" data-target="#two">
                                                <button type="button" class="step-trigger" role="tab" aria-controls="two" id="two-trigger" aria-selected="true" >
                                                    <span class="bs-stepper-circle">1</span>
                                                    <span class="bs-stepper-label">เลือก Background</span>
                                                </button>
                                            </div>
                                            <div class="line"></div>
                                            <div class="step" data-target="#tree">
                                                <button type="button" class="step-trigger" role="tab" aria-controls="tree" id="tree-trigger" aria-selected="false" disabled="disabled">
                                                    <span class="bs-stepper-circle">2</span>
                                                    <span class="bs-stepper-label">เลือก ลายเซ็นต์</span>
                                                </button>
                                            </div>
                                            <div class="line"></div>
                                            <div class="step" data-target="#four">
                                                <button type="button" class="step-trigger" role="tab" aria-controls="four" id="four-trigger" aria-selected="false" disabled="disabled">
                                                    <span class="bs-stepper-circle">3</span>
                                                    <span class="bs-stepper-label">เลือกรูปแบบข้อความ</span>
                                                </button>
                                            </div>

                                        </div>
                                        <form action="create.php" method="post" enctype="multipart/form-data" id="">
                                            <div class="bs-stepper-content vh-50">
                                                <!-- <div id="one" class="content" role="tabpanel" aria-labelledby="one-trigger">
                                                    <p>1. เลือกไฟล์ Excel</p>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="excel">File รายชื่อ </label>
                                                                <div class="input-group">
                                                                    <div class="custom-file">
                                                                        <input type="file" class="custom-file-input" id="excel" accept=".xls, .xlsx, .csv" name="excel">
                                                                        <label class="custom-file-label" for="excel">Choose file</label>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <span class="input-group-append"><button type="submit" class="btn btn-primary" name="read">ดูรายชื่อ</button></span>
                                                        </div>
                                                    </div>

                                                    <hr>
                                                    <a class="btn btn-primary" onclick="stepper.next()">Next</a>

                                                </div> -->
                                                <div id="two" class="content active dstepper-block" role="tabpanel" aria-labelledby="two-trigger">
                                                    <p>1. เลือก Background</p>
                                                    <div class="row">
                                                        <?php
                                                        $data = $mangeObj->getBg("data");
                                                        $i = 0;
                                                        foreach ($data as $bg) {
                                                            $i++;
                                                            echo "
                                                            <div class='col-lg-2 col-md-4 col-4 p-1'>
                                                                <div class='form-group clearfix'>
                                                                    <div class='icheck-success d-inline'>
                                                                        <input type='radio' id='bg{$i}' name='bg' value='{$bg['b_id']}' checked >  
                                                                        <label for='bg{$i}'>
                                                                            <img src='{$bg['b_path']}{$bg['b_name']}' class='img-thumbnail shadow' alt='...' >
                                                                        </label>
                                                                    </div>
                                                                    <p class='text-center'><a href='{$bg['b_path']}{$bg['b_name']}' target='_bank'><i class='nav-icon fas fa-eye'></i> preview</a></p>
                                                                </div>
                                                            </div>
                                                        ";
                                                        }
                                                        ?>
                                                    </div>
                                                    <hr>
                                                    <a class="btn btn-primary" onclick="stepper.next()">Next</a>
                                                </div>
                                                <div id="tree" class="content" role="tabpanel" aria-labelledby="tree-trigger">
                                                    <p>2. เลือก ลายเซ็นต์</p>
                                                    <div class="row">
                                                        <?php
                                                        $data = $mangeObj->getCa("data");
                                                        $i = 0;
                                                        foreach ($data as $ca) {
                                                            $i++;
                                                            echo "
                                                            <div class='col-lg-2 col-md-4 col-6 p-1'>
                                                                <div class='form-group clearfix'>
                                                                    <div class='icheck-success d-inline'>
                                                                        <input type='radio' id='ca{$i}' name='ca' value='{$ca['ca_id']}' checked>  
                                                                        <label for='ca{$i}'>
                                                                            <div  class='text-center'>
                                                                                <p class='text-center' style='margin-bottom: 1px;'>{$ca['ca_name']}</p>
                                                                                <p class='text-center' style='font-size: 14px; margin-bottom: 0;'>{$ca['ca_position']}</p>
                                                                                <p class='text-center' style='font-size: 10px;'>{$ca['ca_position2']}</p>
                                                                                <a href='{$ca['ca_path']}'  target='_bank'><i class='nav-icon fas fa-eye'></i> preview</a>
                                                                            </div>
                                                                            
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        ";
                                                        }
                                                        ?>
                                                    </div>
                                                    <hr>
                                                    <a class="btn btn-primary" onclick="stepper.previous()">Previous</a>
                                                    <a class="btn btn-primary" onclick="stepper.next()">Next</a>
                                                </div>
                                                <div id="four" class="content" role="tabpanel" aria-labelledby="four-trigger">
                                                    <p>3. เลือกรูปแบบ</p>
                                                    <div class="row">
                                                        <?php
                                                        $data = $mangeObj->getPHP("data");
                                                        $i = 0;
                                                        foreach ($data as $f) {
                                                            $i++;
                                                            echo "
                                                            <div class='col-lg-2 col-md-4 col-4 p-1'>
                                                                <div class='form-group clearfix'>
                                                                    <div class='icheck-success d-inline'>
                                                                        <input type='radio' id='f{$i}' name='filephp' value='{$f['f_id']}' checked>  
                                                                        <label for='f{$i}'>
                                                                            <img src='{$f['f_img']}' class='img-thumbnail shadow' alt='...' >
                                                                        </label>
                                                                    </div>
                                                                    <p class='text-center'><a href='{$f['f_img']}' target='_bank'><i class='nav-icon fas fa-eye'></i> preview</a></p>
                                                                </div>
                                                            </div>
                                                        ";
                                                        }
                                                        ?>
                                                    </div>
                                                    <hr>
                                                    <a class="btn btn-primary" onclick="stepper.previous()">Previous</a>
                                                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>

                                                </div>

                                            </div>
                                        </form>
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
        document.addEventListener('DOMContentLoaded', function() {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        })
    </script>
</body>

</html>