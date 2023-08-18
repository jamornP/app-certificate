<?php require $_SERVER['DOCUMENT_ROOT'] . "/app-certificate/vendor/autoload.php"; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/app-certificate/lib/TCPDF-master/tcpdf.php"; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/app-certificate/function/function.php"; ?>
<?php

    // use App\Model\Certificate\Data;

    // $personObj = new Data;


    // print_r($person);
    // --------------------------------------------------------
    // ข้อมูล
    $bg = "sciday2022-gold.png";
    $name = "นายจามร เพ็งสวย";
    $school = "โรงเรียน KMITL";
    $award = "ได้รับรางวัล ชนะเลิศอันดับที่ ๑";
    $activity = "การประกวดโครงงานวิทยาศาสตร์";
    $level = "ระดับมัธยมศึกษาตอนปลาย";
    $date_at = datethaifull(date("Y-m-d"));
    $project = "เรื่อง โปรแกรมสร้าง Certificate ของคณะวิทยาศาสตร์";
    $teacher = "ครูที่ปรึกษา "."นายสมชาย สิงหาคม และ นางสาวมุกดา จำนองธรรม";
    $event = "นิทรรศการวันวิทยาสาสตร์ Science today is Technology Tomorrow";
    $event_date = "ระหว่างวันที่ 4 - 5 สิงหาคม พ.ศ.2566";
    $ca = "../../images/ca/su.png";
    $ca_name = "รองศาสตราจารย์ ดร.สุธี ชุติไพจิตร";
    $ca_position = "คณบดี คณะวิทยาศาสตร์";
    $ca_position2 = "สถาบันเทคโนโลยีพระจอมเกล้าเจ้าคุณทหารลาดกระบัง";
    // =======================================================

    // if (isset($_POST['excample'])) {
        $i = 0;
        // $person = $personObj->getData2One();
        // $date_at = datethaifull($person['date_at']);
        $pdf = new TCPDF("L", "mm", "A4", true, 'UTF-8', false);
        // remove default header/footer
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        // set font
        $pdf->SetFont('thsarabun', '', 14, '', true);
        // set page margin
        $pdf->SetMargins(0, 0, 0, 0);

        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


        $i++;

        // $name = $person['name'];
        
        // add a page
        $pdf->AddPage();
        // disable auto-page-break //false หน้าเดียว //true หลายยหน้า
        $pdf->SetAutoPageBreak(false, 0);
        // set bacground image
        $img_file = $_SERVER['DOCUMENT_ROOT'] . 'project/backend/images/bg/' . $bg;
        $pdf->Image($img_file, 0, 0, 0, 210, '', '', '', false, 300, '', false, false, 0);
        
        $pdf->setFont('thsarabun', 'B');
    $pdf->setTextColor(0, 98, 133);
    $pdf->setFontSize(26);
    $pdf->MultiCell(0, 0, 'คณวิทยาศาสตร์', 0, 'C', 0, 1, 0, 40);
    $pdf->setFontSize(22);
    $pdf->MultiCell(0, 0, 'สถาบันเทคโนโลยีพระจอมเกล้าเจ้าคุณทหารลาดกระบัง', 0, 'C', 0, 1, 0, 49);

    $pdf->setFont('thsarabun', '');
    $pdf->setTextColor(0, 98, 133);
    $pdf->setFontSize(20);
    $pdf->MultiCell(0, 0, 'ประกาศนียบัตรนี้ให้ไว้เพื่อแสดงว่า'.$img_file, 0, 'C', 0, 1, 0, 60);
    // ชื่อ
    $pdf->setFont('thsarabun', 'B');
    $pdf->setTextColor(28, 46, 75);
    $pdf->setFontSize(28);
    $pdf->MultiCell(0, 0, $name, 0, 'C', 0, 1, 0, 70);
    // โรงเรียน
    $pdf->setFont('thsarabun', '');
    $pdf->setTextColor(40, 46, 75);
    $pdf->setFontSize(20);
    $pdf->MultiCell(0, 0, $school, 0, 'C', 0, 1, 0, 82);
    // รางวัล
    $pdf->setFont('thsarabun', 'B');
    $pdf->setTextColor(40, 46, 75);
    $pdf->setFontSize(30);
    $pdf->MultiCell(0, 0, $award, 0, 'C', 0, 1, 0, 93);
    // รายการแข่ง
    $pdf->setFont('thsarabun', '');
    $pdf->setTextColor(40, 46, 75);
    $pdf->setFontSize(24);
    $pdf->MultiCell(0, 0, $activity.' '.$level, 0, 'C', 0, 1, 0, 108);
    // ชื่อผลงาน
    $pdf->setFont('thsarabun', '');
    $pdf->setTextColor(40, 46, 75);
    $pdf->setFontSize(20);
    $pdf->MultiCell(0, 0, $project, 0, 'C', 0, 1, 0, 117);
    // ชื่ออาจารย์ที่ปรึกษา
    $pdf->setFont('thsarabun', '');
    $pdf->setTextColor(40, 46, 75);
    $pdf->setFontSize(18);
    $pdf->MultiCell(0, 0, $teacher, 0, 'C', 0, 1, 0, 125);
    // ชื่องาน
    $pdf->setFont('thsarabun', 'B');
    $pdf->setTextColor(40, 46, 75);
    $pdf->setFontSize(24);
    $pdf->MultiCell(0, 0, $event, 0, 'C', 0, 1, 0, 137);
    // วันที่จัดงาน
    $pdf->setFont('thsarabun', 'B');
    $pdf->setTextColor(40, 46, 75);
    $pdf->setFontSize(20);
    $pdf->MultiCell(0, 0, $event_date, 0, 'C', 0, 1, 0, 146);

    // CA
    $pdf->setFont('thsarabun', '');
    $pdf->setTextColor(40, 46, 75);
    $pdf->setFontSize(18);
    $pdf->MultiCell(0, 0, $ca_name, 0, 'C', 0, 1, 0, 182);
    $pdf->setFont('thsarabun', '');
    $pdf->setTextColor(40, 46, 75);
    $pdf->setFontSize(14);
    $pdf->MultiCell(0, 0, $ca_position, 0, 'C', 0, 1, 0, 189);
    $pdf->setFont('thsarabun', '');
    $pdf->setTextColor(40, 46, 75);
    $pdf->setFontSize(14);
    $pdf->MultiCell(0, 0, $ca_position2, 0, 'C', 0, 1, 0, 194);

        // $img_file = $_SERVER['DOCUMENT_ROOT'] . '/sci-certificate/background/' . $bg;
        // $pdf->Image($img_file, 0, 0, 0, 210, '', '', '', false, 300, '', false, false, 0);


        $style = [
            'border' => 1,
            'vpadding' => 'auto',
            'hpadding' => 'auto',
            'fgcolor' => [0, 0, 0],
            'bgcolor' => [247, 247, 247],
            'module_width' => 1, // width of a single module in points
            'module_height' => 1 // height of a single module in points
        ];
        // QRCODE,M : QR-CODE Medium error correction
        $pdf->write2DBarcode('http://sciserv01.sci.kmitl.ac.th/sci-certificate/', 'QRCODE,M', 5, 172, 30, 30, $style, 'N');

        //สร้าง pdf
        $pdf->Output('preview.pdf', 'I');


        $pdf->Close();
    // }
    // if (isset($_POST['create'])) {
    //     $dirf = "../upload/certificate/{$_POST['folder']}";
    //     // echo $dirf;
    //     //window
    //     if (is_dir($dirf)) {
    //     } else {
    //         mkdir("$dirf", 0777);
    //         $ck = $personObj->addGenCer($_POST['folder'], "สมาคมวิทยาศาสตร์");
    //     }
    //     $i = 0;
    //     $persons = $personObj->getData2();
    //     foreach ($persons as $person) {
    //         // $date_at = datethaifull($person['date_at']);
    //         $pdf = new TCPDF("L", "mm", "A4", true, 'UTF-8', false);
    //         // remove default header/footer
    //         $pdf->setPrintHeader(false);
    //         $pdf->setPrintFooter(false);
    //         // set font
    //         $pdf->SetFont('thsarabun', '', 14, '', true);
    //         // set page margin
    //         $pdf->SetMargins(0, 0, 0, 0);

    //         $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


    //         $i++;

    //         $name = $person['name'];
    //         // $name = "จามร";
    //         // add a page
    //         $pdf->AddPage();
    //         // disable auto-page-break //false หน้าเดียว //true หลายยหน้า
    //         $pdf->SetAutoPageBreak(false, 0);
    //         // set bacground image
    //         $img_file = $_SERVER['DOCUMENT_ROOT'] . '/sci-certificate/background/' . $bg;
    //         $pdf->Image($img_file, 0, 0, 0, 210, '', '', '', false, 300, '', false, false, 0);
    //         $pdf->SetFont('thsarabun', 'B');
    //         $pdf->SetTextColor(0, 0, 0);
    //         $pdf->SetFontSize(36);
    //         $pdf->MultiCell(0, 0, "สมาคมวิทยาศาสตร์แห่งประเทศไทยในพระบรมราชูปถัมภ์ ", 0, 'C', 0, 1, 0, 50);
    //         $pdf->SetFontSize(36);
    //         $pdf->MultiCell(0, 0, "สภาคณบดีวิทยาศาสตร์แห่งประเทศไทย", 0, 'C', 0, 1, 0, 62);
    //         $pdf->SetFontSize(36);
    //         $pdf->MultiCell(0, 0, "และคณะวิทยาศาสตร์ สถาบันเทคโนโลยีพระจอมเกล้าเจ้าคุณทหารลาดกระบัง", 0, 'C', 0, 1, 0, 74);

    //         $pdf->SetFont('thsarabun', 'B');
    //         $pdf->SetTextColor(0, 0, 0);
    //         $pdf->SetFontSize(26);
    //         $pdf->MultiCell(0, 0, "ขอมอบประกาศนียบัตรนี้ให้ไว้เพื่อแสดงว่า", 0, 'C', 0, 1, 0, 90);

    //         $pdf->SetFont('thsarabun', 'B');
    //         $pdf->SetFontSize(30);
    //         $pdf->SetTextColor(0, 0, 0);
    //         // MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)
    //         $pdf->MultiCell(0, 0, $name, 0, 'C', 0, 1, 0, 102);


    //         $pdf->SetFont('thsarabun', 'B');
    //         $pdf->SetTextColor(0, 0, 0);
    //         $pdf->SetFontSize(26);
    //         $pdf->MultiCell(0, 0, 'ได้สอบผ่านการทดสอบสมรรถนะและทักษะที่จำเป็น', 0, 'C', 0, 1, 0, 118);
    //         $pdf->SetFont('thsarabun', 'B');
    //         $pdf->SetTextColor(0, 0, 0);
    //         $pdf->SetFontSize(26);
    //         $pdf->MultiCell(0, 0, 'สำหรับบัณฑิตด้านวิทยาศาสตร์และเทคโนโลยี สาขา' . $person['department'], 0, 'C', 0, 1, 0, 128);


    //         $pdf->SetFont('thsarabun', 'B');
    //         $pdf->SetTextColor(0, 0, 0);
    //         $pdf->SetFontSize(26);
    //         $pdf->MultiCell(0, 0, 'ให้ไว้ ณ วันที่ 10 สิงหาคม พ.ศ.2566', 0, 'C', 0, 1, 0, 142);

    //         //สร้างไฟล์
    //         $fol = "\\sci-certificate\\upload\\certificate\\{$_POST['folder']}\\"; //window
    //         // $fol = "/sci-certificate/upload/certificate/{$_POST['folder']}"; //linux
    //         $filename = "{$_POST['folder']}-{$person['id']}-{$person['id']}.pdf";
    //         $filelocation = $_SERVER['DOCUMENT_ROOT'] . $fol; //windows
    //         // $filelocation = "/home/jamorn" . $fol; //Linux

    //         $fileNL = $filelocation . "\\" . $filename; //Windows
    //         // $fileNL = $filelocation . "/" . $filename; //Linux

    //         $serv = "/certificate/" . $_POST['folder'] . "/" . $filename;



    //         $style = [
    //             'border' => 1,
    //             'vpadding' => 'auto',
    //             'hpadding' => 'auto',
    //             'fgcolor' => [0, 0, 0],
    //             'bgcolor' => [247, 247, 247],
    //             'module_width' => 1, // width of a single module in points
    //             'module_height' => 1 // height of a single module in points
    //         ];
    //         // QRCODE,M : QR-CODE Medium error correction
    //         $pdf->write2DBarcode('http://sciserv01.sci.kmitl.ac.th/sci-certificate/upload/certificate/' . $_POST['folder'] . '/' . $filename, 'QRCODE,M', 5, 172, 30, 30, $style, 'N');

    //         //สร้าง pdf
    //         $pdf->Output($fileNL, 'F');
    //         $dataU['id'] = $person['id'];
    //         $dataU['file_cer'] = $serv;
    //         $show = $i . ". " . $person['name'];
    //         // echo "{$show}<br>";
    //         $up = $personObj->updateCer01($dataU);
    //     }
    //     $pdf->Close();
    //     header("location: /sci-certificate/pages/m_certificate.php");
    //     exit(0);
    // }
?>