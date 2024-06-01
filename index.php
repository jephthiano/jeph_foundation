<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php'); // all functions
if(strstr(file_location('home_url',''),'000webhostapp')){$server = 'live';}
//for meta
$follow_type = 'follow';
$image_link = file_location('media_url','home/logo.png');
$image_type = substr($image_link,-3);
$page = "HOME | ".strtoupper(get_xml_data('company_name'));
$page_name = $page." | ".get_xml_data('seo_tag');
$page_url = file_location('home_url','');
$keywords = get_json_data('keywords','about_us')."|".$page_name;
$description = $page_name;
?>
<!DOCTYPE html>
<html>
<head><?php require_once(file_location('inc_path','meta.inc.php'));?><title><?=$page_name?></title></head>
<body id="body"class="j-color4"style="font-family:Roboto,sans-serif;"onload="sD(1)">
	<div><?php require_once(file_location('inc_path','navigation.inc.php')); //navigation?></div>
	<div><?php require_once(file_location('inc_path','slideshow.inc.php')); //slideshow?></div>
	<div><?php require_once(file_location('inc_path','impact.inc.php')); //impact?></div>
	<div><?php require_once(file_location('inc_path','mission.inc.php'));//mission?></div>
	<div><?php require_once(file_location('inc_path','news.inc.php'));//news?></div>
	<div><?php require_once(file_location('inc_path','programme.inc.php'));//programmes?></div>
	<div><?php require_once(file_location('inc_path','subscribe.inc.php'));//subscribe?></div>
	<div><?php if(isset($server) && $server === 'live'){require_once(file_location('inc_path','notice_modal.inc.php')); } //notice ?></div>
	<div><?php require_once(file_location('inc_path','footer.inc.php')); //footer?></div>
	<span id='st'></span>
	<?php require_once(file_location('inc_path','js.inc.php')); //js?>
</body>
</html>