<?php
ob_start();
session_start();
require $_SERVER['DOCUMENT_ROOT'] . "/app-certificate/vendor/autoload.php"; 
require $_SERVER['DOCUMENT_ROOT'] . "/app-certificate/function/function.php"; 


use App\Model\Mangement;
$mangeObj = new Mangement;
date_default_timezone_set('Asia/Bangkok');

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$object = new stdClass();
// ตรวจสอบว่ามีการส่งข้อมูลผ่าน POST หรือไม่
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // รับค่าจาก AJAX
    $e_id = $_POST['ev'] ?? null;

    $dataEv = $mangeObj->getEventById($e_id);

    // กำหนดค่าใน $_SESSION
    if ($dataEv) {
        $_SESSION['event'] = $dataEv['e_name'];
        $object->RespCode = 200;
        $object->RespMessage = 'success';
        $object->Result = $dataEv;
        $object->Log = 'OK';
    } else {
        if(isset($_SESSION['event'])){
            unset($_SESSION['event']);
        }
        $object->RespCode = 400;
        $object->RespMessage = 'error';
        $object->Log = 1;
    }
}
echo json_encode($object);
http_response_code(200);
ob_end_flush(); 
?>