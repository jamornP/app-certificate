<?php require $_SERVER['DOCUMENT_ROOT'] . "/app-certificate/vendor/autoload.php"; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/app-certificate/function/function.php"; ?>
<?php
use App\Model\Mangement;
$mangeObj = new Mangement;
date_default_timezone_set('Asia/Bangkok');

if(isset($_GET['del'])){
    if(isset($_GET['ac'])){
        $ac = $_GET['ac'];
        $id = $_GET['id'];
        if($ac=='delca'){
            $p = "batch-data.php?ba={$_GET['ba']}";
            echo "
                <script type='text/javascript'>
                    let isExecuted = confirm('คุณแน่ใจว่าต้องการลบข้อมูลรายการนี้ ?');
                    if (isExecuted == true) {
                        location.href='save.php?ac2={$ac}&id={$id}&ba={$_GET['ba']}';
                    } else {
                        location.href='{$p}';
                    }
                    console.log(isExecuted);
                </script>
            ";
        }elseif($ac=='delbatch'){
            $p = "batch.php";
            echo "
                <script type='text/javascript'>
                    let isExecuted = confirm('คุณแน่ใจว่าต้องการลบข้อมูลรายการนี้ ?');
                    if (isExecuted == true) {
                        location.href='save.php?ac2={$ac}&id={$id}';
                    } else {
                        location.href='{$p}';
                    }
                    console.log(isExecuted);
                </script>
            ";
        }
        
    }
}
if(isset($_GET['ac2'])){
    if($_GET['ac2']=="delca"){
        if(isset($_GET['id'])){
            $ca = $mangeObj->getDataById($_GET['id']);
            $ca_file = $_SERVER['DOCUMENT_ROOT'] .$ca['link'];
            // echo $ca_file;
             $ck = $mangeObj->delDataById($_GET['id']);
            
            $p = "batch-data.php?ba={$_GET['ba']}";
            if($ck){
                @unlink($ca_file);
                $dc = $mangeObj->getDataCerByBatch("count",$_GET['ba']);
                if($dc>0){
                    echo "
                        <script type='text/javascript'>
                            location.href='{$p}';
                        </script>
                    ";
                }else{
                    $dcFolder = $mangeObj->getBatchById($_GET['ba']);
                    $folder = $dcFolder['folder'];
                    // echo $folder;
                    $dirf = $_SERVER['DOCUMENT_ROOT'] ."/app-certificate/upload/certificate/".$folder;
                    // echo $dirf;
                    @rmdir("$dirf");
                    $dck = $mangeObj->delBatch($_GET['ba']);
                    if($dck){
                        echo "
                            <script type='text/javascript'>
                                location.href='batch.php?msg=ok';
                            </script>
                        ";
                    }else{
                        echo "
                            <script type='text/javascript'>
                                location.href='{$p}&msg=error';
                            </script>
                        ";
                    }
                }
                
            }

        }
    }
    if($_GET['ac2']=="delbatch"){
        if(isset($_GET['id'])){
            $data = $mangeObj->getDataCerByBatch("data",$_GET['id']);
            foreach($data as $ca){
                $ca_file = $_SERVER['DOCUMENT_ROOT'] .$ca['link'];
                $ck = $mangeObj->delDataById($ca['dc_id']);
                if($ck){
                    @unlink($ca_file);
                }
            }
            $ck = $mangeObj->delDataByBatch($_GET['id']);
            if($ck){
                $dcFolder = $mangeObj->getBatchById($_GET['id']);
                $folder = $dcFolder['folder'];
                $dirf = $_SERVER['DOCUMENT_ROOT'] ."/app-certificate/upload/certificate/".$folder;
                @rmdir("$dirf");
                $dck = $mangeObj->delBatch($_GET['id']);
                if($dck){
                    echo "
                        <script type='text/javascript'>
                            location.href='batch.php?msg=ok';
                        </script>
                    ";
                }else{
                    echo "
                        <script type='text/javascript'>
                            location.href='batch.php?msg=error';
                        </script>
                    ";
                }
            }
        }

    }
}
?>