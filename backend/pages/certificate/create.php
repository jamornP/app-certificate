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
            <?php
            // print_r($_POST);
            // echo "<br>";
            // print_r($_FILES);

            if (isset($_POST['submit'])) {
                print_r($_POST);
                echo "<br>";
               
            }

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
                                            <div class='col-lg-2 col-md-4 col-4 p-1'>
                                                <div class='form-group clearfix'>
                                                    <div class='icheck-success d-inline'>
                                                        <label for='bg'>
                                                            <img src='{$bg['b_path']}{$bg['b_name']}' class='img-thumbnail shadow' alt='...' >
                                                        </label>
                                                    </div>
                                                    <p class='text-center'><a href='{$bg['b_path']}{$bg['b_name']}' target='_bank'><i class='nav-icon fas fa-eye'></i> preview</a></p>
                                                </div>
                                            </div>
                                        ";
                                        $ca= $mangeObj->getCaById($_POST['ca']);
                                        echo "
                                            <div class='col-lg-2 col-md-4 col-4 p-1'>
                                                <div class='form-group clearfix'>
                                                    <div class='icheck-success d-inline'>
                                                        <label for='ca'>
                                                            <img src='{$ca['ca_path']}' class='img-thumbnail shadow' alt='...' >
                                                        </label>
                                                    </div>
                                                    <p class='text-center'><a href='{$ca['ca_path']}' target='_bank'><i class='nav-icon fas fa-eye'></i> preview</a></p>
                                                </div>
                                            </div>
                                        ";
                                        $file= $mangeObj->getPHPById($_POST['filephp']);
                                        echo "
                                            <div class='col-lg-2 col-md-4 col-4 p-1'>
                                                <div class='form-group clearfix'>
                                                    <div class='icheck-success d-inline'>
                                                        <label for='file'>
                                                            <img src='{$file['f_img']}' class='img-thumbnail shadow' alt='...' >
                                                        </label>
                                                    </div>
                                                    <p class='text-center'><a href='{$file['f_img']}' target='_bank'><i class='nav-icon fas fa-eye'></i> preview</a></p>
                                                </div>
                                            </div>
                                        ";
                                    ?>
                                    </div>
                                </div>
                                <div class="row p-4">
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
                                <div class="card-footer">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <?php
                                                if (isset($_POST['read']) && $_FILES['excel']['error'] == 0) {
                                                    require_once($_SERVER['DOCUMENT_ROOT'] . "/app-certificate/lib/PHPExcel/Classes/PHPExcel.php");
                                                    $tmpFile = $_FILES['excel']['tmp_name'];
                                                    $objPHPExcel = PHPExcel_IOFactory::load($tmpFile);
                                                    $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
                                                    function get($c)
                                                    {
                                                        $k = array("A" => "num", "B" => "project", "C" => "school", "D" => "level", "E" => "student", "F" => "teacher");
                                                        return $k[$c];
                                                    }

                                                    $i = 1;
                                                    $j = 0;
                                                    foreach ($cell_collection as $cell) {

                                                        // ค่าสำหรับดูว่าเป็นคอลัมน์ไหน เช่น A B C ....
                                                        $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
                                                        // คำสำหรับดูว่าเป็นแถวที่เท่าไหร่ เช่น 1 2 3 .....
                                                        $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
                                                        // ค่าของข้อมูลในเซลล์นั้นๆ เช่น A1 B1 C1 ....
                                                        $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();

                                                        if ($i == (int)$row) {
                                                            if ($j == 0) {
                                                                echo "<th>{$data_value}</th>";
                                                            } else {
                                                                $col = get($column);
                                                                echo "<td>{$data_value}</td>";
                                                                $dataSt[$j][$col] = $data_value;
                                                            }
                                                        } else {
                                                            echo "</tr>";
                                                            $i++;
                                                            $j++;
                                                            echo "<tr><td>{$j}</td>";
                                                            $col = get($column);
                                                            $dataSt[$j][$col] = $j;
                                                        }
                                                    }
                                                }
                                                
                                                ?>
                                        </tbody>
                                    </table>
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