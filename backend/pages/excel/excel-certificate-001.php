<?php
    if(isset($_GET['f_name']) && isset($_GET['sh_name'])){
        header("Content-Type: application/xls;  charset=utf-8");
        header("Content-Disposition: attachment; filename=".$_GET['f_name']."; worksheet1=".$_GET['sh_name']);
        header("Pragma: no-cache");
        header("Expires: 0");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>excel cer-0001</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        /* table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        } */
    </style>
</head>
<body>
    <table class="table-bordered">
        <thead>
            <tr class="bg-warning">
                <th>ที่</th>
                <th>ชื่อ-นามสกุล</th>
                <th>โรงเรียน</th>
                <th>ชื่อผลงาน</th>
                <th>อาจารย์ที่ปรึกษา</th>
                <th>กิจกรรมประกวด</th>
                <th>ระดับ</th>
                <th>รางวัลที่ได้</th>
                <th>งาน</th>
                <th>วันที่จัดงาน</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>นายจามร เพ็งสวย</td>
                <td>โรงเรียนบ่อกรุวิทยา</td>
                <td>ระบบสร้าง E-Certificate Online</td>
                <td>อาจารย์ที่ปรึกษา รศ.ดร.อภิลักษณ์ เอียดเอื้อ และ ดร.จตุพร มีศิลป์</td>
                <td>การแข่งขันพัฒนา Software เพื่อช่วยในการดำเนินงาานที่ทำในปัจจุบัน</td>
                <td>ระดับมัธยมศึกษาตอนปลาย</td>
                <td>รางวัลชนะเลิศ</td>
                <td>นิทรรศการวันวิทยาสาสตร์ Science today is Technology Tomorrow ประจำปี 2566</td>
                <td>ระหว่างวันที่ 4 - 5 สิงหาคม พ.ศ.2566</td>
            </tr>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>