<?php
session_start();
session_unset();
session_destroy();
header("Location: ./login-and-register/login-register.php");
exit();
?>