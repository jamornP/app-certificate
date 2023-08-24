<?php session_start();?>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/app-certificate/vendor/autoload.php"; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/app-certificate/lib/TCPDF-master/tcpdf.php"; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/app-certificate/function/function.php"; ?>
<?php
    use App\Model\Mangement;
    $mangeObj = new Mangement;
    date_default_timezone_set('Asia/Bangkok');
    // Review Certificate =================================
    if (isset($_POST['review'])) {

        $i = 0;

        $pdf = new TCPDF("L", "mm", "A4", true, 'UTF-8', false);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetFont('thsarabun', '', 14, '', true);
        $pdf->SetMargins(0, 0, 0, 0);
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        $i++;
        // ข้อมูล
        $bg = $_POST['bg'];
        $name = "ชื่อ นามสกุล";
        $school = "โรงเรียน";
        $team = "ทีม " . "";
        $award = "ได้รับรางวัล ";
        $activity = "การแข่งขัน ";
        $level = "";
        $date_at = datethaifull(date("Y-m-d"));
        $project = "";
        $teacher = "";
        $event = "นิทรรศการวันวิทยาศาสตร์ ประจำปี 2566";
        $event2 = '"Science Today is Technology Tomorrow"';
        $event_date = "ระหว่างวันที่ 4 - 5 สิงหาคม พ.ศ. 2566";
        $ca = $_POST['ca'];
        $ca_name = $_POST['ca_name'];
        $ca_position = $_POST['ca_position'];
        $ca_position2 = $_POST['ca_position2'];


        $pdf->AddPage();
        $pdf->setAutoPageBreak(false, 0);
        // พื้นหลัง
        $pdf->Image($_SERVER['DOCUMENT_ROOT'] . $bg, 0, 0, 0, 210, '', '', '', false, 150, '', false, false, 0);
        // ลายเซ็นต์
        $pdf->Image($_SERVER['DOCUMENT_ROOT'] . $ca, 110, 142, 0, 50, '', '', '', false, 300, '', false, false, 0);
        // หัวเรื่อง
        $pdf->setFont('thsarabun', 'B');
        $pdf->setTextColor(0, 98, 133);
        $pdf->setFontSize(26);
        $pdf->MultiCell(0, 0, 'คณะวิทยาศาสตร์', 0, 'C', 0, 1, 0, 40);
        $pdf->setFontSize(22);
        $pdf->MultiCell(0, 0, 'สถาบันเทคโนโลยีพระจอมเกล้าเจ้าคุณทหารลาดกระบัง', 0, 'C', 0, 1, 0, 49);

        $pdf->setFont('thsarabun', '');
        $pdf->setTextColor(0, 98, 133);
        $pdf->setFontSize(20);
        $pdf->MultiCell(0, 0, 'ประกาศนียบัตรนี้ให้ไว้เพื่อแสดงว่า', 0, 'C', 0, 1, 0, 60);
        // ชื่อ
        $pdf->setFont('thsarabun', 'B');
        $pdf->setTextColor(28, 46, 75);
        $pdf->setFontSize(28);
        $pdf->MultiCell(0, 0, $name, 0, 'C', 0, 1, 0, 73);
        // โรงเรียน
        $pdf->setFont('thsarabun', '');
        $pdf->setTextColor(40, 46, 75);
        $pdf->setFontSize(20);
        $pdf->MultiCell(0, 0, $school, 0, 'C', 0, 1, 0, 85);
        // รางวัล
        $pdf->setFont('thsarabun', 'B');
        $pdf->setTextColor(40, 46, 75);
        $pdf->setFontSize(30);
        $pdf->MultiCell(0, 0, $award, 0, 'C', 0, 1, 0, 103);
        // รายการแข่ง
        $pdf->setFont('thsarabun', '');
        $pdf->setTextColor(40, 46, 75);
        $pdf->setFontSize(24);
        $pdf->MultiCell(0, 0, $activity . ' ' . $level, 0, 'C', 0, 1, 0, 118);
        // ชื่องาน
        $pdf->setFont('thsarabun', 'B');
        $pdf->setTextColor(40, 46, 75);
        $pdf->setFontSize(24);
        $pdf->MultiCell(0, 0, $event, 0, 'C', 0, 1, 0, 132);
        // ชื่องาน
        $pdf->setFont('thsarabun', 'B');
        $pdf->setTextColor(40, 46, 75);
        $pdf->setFontSize(24);
        $pdf->MultiCell(0, 0, $event2, 0, 'C', 0, 1, 0, 139);
        // วันที่จัดงาน
        $pdf->setFont('thsarabun', 'B');
        $pdf->setTextColor(40, 46, 75);
        $pdf->setFontSize(20);
        $pdf->MultiCell(0, 0, $event_date, 0, 'C', 0, 1, 0, 147);
        // CA
        $pdf->setFont('thsarabun', '');
        $pdf->setTextColor(40, 46, 75);
        $pdf->setFontSize(18);
        $pdf->MultiCell(0, 0, $ca_name, 0, 'C', 0, 1, 0, 179);
        $pdf->setFont('thsarabun', '');
        $pdf->setTextColor(40, 46, 75);
        $pdf->setFontSize(14);
        $pdf->MultiCell(0, 0, $ca_position, 0, 'C', 0, 1, 0, 186);
        $pdf->setFont('thsarabun', '');
        $pdf->setTextColor(40, 46, 75);
        $pdf->setFontSize(14);
        $pdf->MultiCell(0, 0, $ca_position2, 0, 'C', 0, 1, 0, 191);

        // QR COde
        $style = [
            'border' => 1,
            'vpadding' => 'auto',
            'hpadding' => 'auto',
            'fgcolor' => [0, 0, 0],
            'bgcolor' => [247, 247, 247],
            'module_width' => 1,
            'module_hight' => 1
        ];
        $pdf->write2DBarcode('http://sciserv01.sci.kmitl.ac.th/sci-certificate/', 'QRCODE,M', 10, 172, 30, 30, $style, 'N');
        $pdf->Output('preview.pdf', 'I');
        $pdf->Close();
    }
    // Gen Certificate ===================================
    if (isset($_POST['submit'])) {
        
        if ($_FILES['excel']['error'] == 0) {
            require_once($_SERVER['DOCUMENT_ROOT'] . "/app-certificate/lib/PHPExcel/Classes/PHPExcel.php");
            $tmpFile = $_FILES['excel']['tmp_name'];
            $objPHPExcel = PHPExcel_IOFactory::load($tmpFile);
            $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
            function get($c)
            {
                $k = array("A" => "num", "B" => "student", "C" => "school", "D" => "activity", "E" => "award", "F" => "event","G"=>"event2","H"=>"event_date","I"=>"pro_id");
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
                        // echo "<th>{$data_value}</th>";
                    } else {
                        $col = get($column);
                        // echo "<td>{$data_value}</td>";
                        $dataSt[$j][$col] = $data_value;
                    }
                } else {
                    // echo "</tr>";
                    $i++;
                    $j++;
                    // echo "<tr><td>{$j}</td>";
                    $col = get($column);
                    $dataSt[$j][$col] = $j;
                }
            }
            // echo "<pre>";
            // print_r($dataSt);
            // echo "</pre>";
        }
        if(isset($dataSt)){
            // ----------------------------------------------Data Add Batch------------------------------------------            
            $dataB['ba_start']=date("Y-m-d H:i:s");
            $dataB['num']=$_POST['batch_num'];
            $dataB['ba_name']=$_POST['batch_name'];
            $dataB['ba_date']=$_POST['batch_date'];
            $dataB['activity_name']=$_POST['activity_name'];
            $dataB['folder']=$_POST['folder'];
            $dataB['u_id']=$_SESSION['u_id'];
            
            // ที่เก็บ
            $dirf = "../../../upload/certificate/{$_POST['folder']}";
            if (is_dir($dirf)) {
            } else {
                mkdir("$dirf", 0777);
                // $ck = $personObj->addGenCer($_POST['folder'], "สมาคมวิทยาศาสตร์");
            }
            $i = 0;
            foreach ($dataSt as $st) {
                $pdf = new TCPDF("L", "mm", "A4", true, 'UTF-8', false);
                $pdf->setPrintHeader(false);
                $pdf->setPrintFooter(false);
                $pdf->SetFont('thsarabun', '', 14, '', true);
                $pdf->SetMargins(0, 0, 0, 0);
                $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
                $i++;
                // ข้อมูล
                $bg = $_POST['bg'];
                $folder = $_POST['folder'];
                $num = $st['num'];
                $name = $st['student'];
                $school = $st['school'];
                $award = $st['award'];
                $activity = $st['activity'];
                $level = "";
                $date_at = datethaifull(date("Y-m-d"));
                $project = "";
                $teacher = "";
                $event = $st['event'];
                $event2 = $st['event2'];
                $event_date = $st['event_date'];
                $ca = $_POST['ca'];
                $ca_name = $_POST['ca_name'];
                $ca_position = $_POST['ca_position'];
                $ca_position2 = $_POST['ca_position2'];
                $pro_id = $st['pro_id'];



                $pdf->AddPage();
                $pdf->setAutoPageBreak(false, 0);
                // พื้นหลัง
                $pdf->Image($_SERVER['DOCUMENT_ROOT'] . $bg, 0, 0, 0, 210, '', '', '', false, 150, '', false, false, 0);
                // ลายเซ็นต์
                $pdf->Image($_SERVER['DOCUMENT_ROOT'] . $ca, 110, 142, 0, 50, '', '', '', false, 300, '', false, false, 0);
                // หัวเรื่อง
                $pdf->setFont('thsarabun', 'B');
                $pdf->setTextColor(0, 98, 133);
                $pdf->setFontSize(26);
                $pdf->MultiCell(0, 0, 'คณะวิทยาศาสตร์', 0, 'C', 0, 1, 0, 40);
                $pdf->setFontSize(22);
                $pdf->MultiCell(0, 0, 'สถาบันเทคโนโลยีพระจอมเกล้าเจ้าคุณทหารลาดกระบัง', 0, 'C', 0, 1, 0, 49);

                $pdf->setFont('thsarabun', '');
                $pdf->setTextColor(0, 98, 133);
                $pdf->setFontSize(20);
                $pdf->MultiCell(0, 0, 'ประกาศนียบัตรนี้ให้ไว้เพื่อแสดงว่า', 0, 'C', 0, 1, 0, 60);
                // ชื่อ
                $pdf->setFont('thsarabun', 'B');
                $pdf->setTextColor(28, 46, 75);
                $pdf->setFontSize(28);
                $pdf->MultiCell(0, 0, $name, 0, 'C', 0, 1, 0, 73);
                // โรงเรียน
                $pdf->setFont('thsarabun', '');
                $pdf->setTextColor(40, 46, 75);
                $pdf->setFontSize(20);
                $pdf->MultiCell(0, 0, $school, 0, 'C', 0, 1, 0, 85);
                // รางวัล
                $pdf->setFont('thsarabun', 'B');
                $pdf->setTextColor(40, 46, 75);
                $pdf->setFontSize(30);
                $pdf->MultiCell(0, 0, $award, 0, 'C', 0, 1, 0, 103);
                // รายการแข่ง
                $pdf->setFont('thsarabun', '');
                $pdf->setTextColor(40, 46, 75);
                $pdf->setFontSize(24);
                $pdf->MultiCell(0, 0, $activity . ' ' . $level, 0, 'C', 0, 1, 0, 122);
                 // ชื่องาน
                $pdf->setFont('thsarabun', 'B');
                $pdf->setTextColor(40, 46, 75);
                $pdf->setFontSize(24);
                $pdf->MultiCell(0, 0, $event, 0, 'C', 0, 1, 0, 132);
                // ชื่องาน
                $pdf->setFont('thsarabun', 'B');
                $pdf->setTextColor(40, 46, 75);
                $pdf->setFontSize(24);
                $pdf->MultiCell(0, 0, $event2, 0, 'C', 0, 1, 0, 139);
                // วันที่จัดงาน
                $pdf->setFont('thsarabun', 'B');
                $pdf->setTextColor(40, 46, 75);
                $pdf->setFontSize(20);
                $pdf->MultiCell(0, 0, $event_date, 0, 'C', 0, 1, 0, 147);
                // CA
                $pdf->setFont('thsarabun', '');
                $pdf->setTextColor(40, 46, 75);
                $pdf->setFontSize(18);
                $pdf->MultiCell(0, 0, $ca_name, 0, 'C', 0, 1, 0, 179);
                $pdf->setFont('thsarabun', '');
                $pdf->setTextColor(40, 46, 75);
                $pdf->setFontSize(14);
                $pdf->MultiCell(0, 0, $ca_position, 0, 'C', 0, 1, 0, 186);
                $pdf->setFont('thsarabun', '');
                $pdf->setTextColor(40, 46, 75);
                $pdf->setFontSize(14);
                $pdf->MultiCell(0, 0, $ca_position2, 0, 'C', 0, 1, 0, 191);

                
                //สร้างไฟล์
                if($_SESSION['linux']){
                    $fol = "app-certificate/upload/certificate/{$folder}/"; //linux
                    $filename = "01-{$folder}-{$st['num']}.pdf";
                    $filelocation = $_SERVER['DOCUMENT_ROOT'] . $fol; //Linux

                    $fileNL = $filelocation . $filename; //Windows,linux
                    $serv = "/upload/certificate/{$folder}/" . $filename;
                }else{
                    $fol = "\\app-certificate\\upload\\certificate\\" . $folder . "\\"; //window
                    $filename = "01-{$folder}-{$st['num']}.pdf";
                    $filelocation = $_SERVER['DOCUMENT_ROOT'] . $fol; //windows
    
                    $fileNL = $filelocation . $filename; //Windows,linux
                    $serv = "/upload/certificate/{$folder}/" . $filename;
                }
                // $fol = "\\app-certificate\\upload\\certificate\\" . $folder . "\\"; //window
                // // $fol = "app-certificate/upload/certificate/{$folder}/"; //linux
                // $filename = "01-{$folder}-{$st['num']}.pdf";
                // $filelocation = $_SERVER['DOCUMENT_ROOT'] . $fol; //windows
                // // $filelocation = $_SERVER['DOCUMENT_ROOT'] . $fol; //Linux

                // $fileNL = $filelocation . $filename; //Windows
                // // $fileNL = $filelocation . "/" . $filename; //Linux
                // $serv = "/upload/certificate/{$folder}/" . $filename;

                // QR COde
                $style = [
                    'border' => 1,
                    'vpadding' => 'auto',
                    'hpadding' => 'auto',
                    'fgcolor' => [0, 0, 0],
                    'bgcolor' => [247, 247, 247],
                    'module_width' => 1,
                    'module_hight' => 1
                ];
                // QRCODE,M : QR-CODE Medium error correction
                $pdf->write2DBarcode('http://sciserv01.sci.kmitl.ac.th/app-certificate/upload/certificate/' . $folder . '/' . $filename, 'QRCODE,M', 5, 172, 30, 30, $style, 'N');

                //สร้าง pdf
                $pdf->Output($fileNL, 'F');
                // $pdf->write2DBarcode('http://sciserv01.sci.kmitl.ac.th/sci-certificate/', 'QRCODE,M', 10, 172, 30, 30, $style, 'N');
                // $pdf->Output('preview.pdf', 'I');

                $dataC['ba_name']=$_POST['batch_name'];
                $dataC['num']=$num;
                $dataC['name']=$name;
                $dataC['school']=$school;
                $dataC['project']="";
                $dataC['teacher']="";
                $dataC['team']="";
                $dataC['activity']=$activity;
                $dataC['level']=$level;
                $dataC['award']=$award;
                $dataC['event']=$event;
                $dataC['event_date']=$event_date;
                $dataC['ca_name']=$ca_name;
                $dataC['link']='/app-certificate/upload/certificate/' . $folder . '/' . $filename;
                $dataC['pro_id']=$pro_id;
                $ckC = $mangeObj->addDataCertificate($dataC);
                
            } 
            $dataB['ba_end']=date("Y-m-d H:i:s");
            $ck=$mangeObj->addBatch($dataB);           
            $pdf->Close();
            header("location: /app-certificate/backend/pages/");
        }
        
    }
?>