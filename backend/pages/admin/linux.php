<?php
session_start();
$_SESSION['linux']=true;
echo "
    <script type='text/javascript'>
        location.href='/app-certificate/backend/pages/certificate';
    </script>
";
?>