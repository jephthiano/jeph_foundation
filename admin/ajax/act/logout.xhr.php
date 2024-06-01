<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/addons/function.inc.php");// all functions
$admin = new admin();
$log_out = $admin->log_out();
if($log_out === true){
	$data["status"] = true;$data["message"] = file_location('admin_url','login/');
}elseif($log_out === false){
	$data["status"] = false;$data["message"] = "Error occur while running request";
}
echo json_encode($data);
?>