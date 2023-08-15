<?php require $_SERVER['DOCUMENT_ROOT'] . "/app-certificate/vendor/autoload.php"; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/app-certificate/lib/TCPDF-master/tcpdf.php"; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/app-certificate/function/function.php"; ?>
<?php
$i = 0;

$pdf = new TCPDF("L", "mm", "A4", true, 'UTF-8', false);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetFont('thsarabun', '', 14, '', true);
$pdf->SetMargins(0, 0, 0, 0);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
$i++;
// ข้อมูล
$bg = "sciday2022-bronze.png";
$name = "ชื่อ นามสกุล";
$school = "โรงเรียน";
$award = "ได้รับรางวัล ";
$activity = "กิจกรรม";
$level = "ระดับ";
$date_at = datethaifull(date("Y-m-d"));
$project = "ชื่อผลงาน";
$teacher = "ครูที่ปรึกษา";
$event = "นิทรรศการวันวิทยาสาสตร์ Science today is Technology Tomorrow";
$event_date = "ระหว่างวันที่ 4 - 5 สิงหาคม พ.ศ.2566";
$ca = "su.png";
$ca_name = "รองศาสตราจารย์ ดร.สุธี ชุติไพจิตร";
$ca_position = "คณบดี คณะวิทยาศาสตร์";
$ca_position2 = "สถาบันเทคโนโลยีพระจอมเกล้าเจ้าคุณทหารลาดกระบัง";



$pdf->AddPage();
$pdf->setAutoPageBreak(false, 0);
// พื้นหลัง
$pdf->Image($_SERVER['DOCUMENT_ROOT'] . 'project/backend/images/bg/' . $bg, 0, 0, 0, 210, '', '', '', false, 150, '', false, false, 0);
// ลายเซ็นต์
$pdf->Image($_SERVER['DOCUMENT_ROOT'] . 'project/backend/images/ca/' . $ca, 110, 142, 0, 50, '', '', '', false, 300, '', false, false, 0);
// หัวเรื่อง
$pdf->setFont('thsarabun', 'B');
$pdf->setTextColor(0, 98, 133);
$pdf->setFontSize(26);
$pdf->MultiCell(0, 0, 'คณวิทยาศาสตร์', 0, 'C', 0, 1, 0, 40);
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
?>