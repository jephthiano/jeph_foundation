<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php');// all functions
$follow_type = 'no follow';
$image_link = file_location('media_url','home/logo.png');
?>
<!DOCTYPE html>
<html>
<head><?php require_once(file_location('inc_path','meta.inc.php'));?><title>Not Found</title></head>
<body id="body"class=""style="font-family: Roboto,sans-serif;width:100%;">
<div class="j-row-padding"><?php redirection('reload');?></div>
</body>
</html>