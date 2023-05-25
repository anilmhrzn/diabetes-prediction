<?php
session_start();
session_destroy();
header("Location: http://localhost/Main_Project/public/pages/main.php");


?>