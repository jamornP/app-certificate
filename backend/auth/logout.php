<?php
session_start();
session_destroy();

header("location: /app-certificate/backend/auth");
exit();
?>