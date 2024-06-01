<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php');
require_once(file_location('admin_inc_path','session_start.inc.php'));
if(isset($_SESSION['admin_id']) && content_data('admin_table','ad_id',test_input(ssl_decrypt_input($_SESSION['admin_id'])),'ad_id') !== false){
	$GLOBALS['adid'] = (int)test_input(ssl_decrypt_input(($_SESSION['admin_id'])));
	if(content_data('admin_table','ad_id',test_input(ssl_decrypt_input($_SESSION['admin_id'])),'ad_id') === "suspended"){ require_once(file_location('admin_inc_path','session_redirection.inc.php')); }
}else{
	require_once(file_location('admin_inc_path','session_redirection.inc.php'));
}
?>