<?php
session_start();
unset($_SESSION['old']);
$form = $_GET['form'] ?? 'login';
$_SESSION['active_form'] = $form;
header("Location: login-register.php");
exit();