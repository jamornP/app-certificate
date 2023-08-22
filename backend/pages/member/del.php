<?php require $_SERVER['DOCUMENT_ROOT'] . "/app-certificate/vendor/autoload.php"; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/app-certificate/function/function.php"; ?>
<?php
use App\Model\Mangement;
$mangeObj = new Mangement;
date_default_timezone_set('Asia/Bangkok');


if(isset($_GET['del'])){
    echo "
        <script type='text/javascript'>
            let isExecuted = confirm('คุณแน่ใจว่าต้องการลบข้อมูลรายการนี้ ?');
            if (isExecuted == true) {
                location.href='/app-certificate/backend/pages/member/del.php?ck_del=ok&u_id={$_GET['id']}';
            } else {
                location.href='/app-certificate/backend/pages/member';
            }
            console.log(isExecuted);
        </script>
    ";
}
if(isset($_GET['ck_del']) && $_GET['ck_del']=='ok'){
    $ck = $mangeObj->delUser($_GET['u_id']);
    if ($ck) {
        header('Location: /app-certificate/backend/pages/member/index.php?del=ok');
        exit();
    } else {
        header('Location: /app-certificate/backend/pages/member/index.php?del=error');
        exit();
    }
}
?>