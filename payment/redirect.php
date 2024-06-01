<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php'); // all functions
$page = file_location('home_url','payment/confirm_payment/'.$_GET['reference']);
header("Location:$page");
?>