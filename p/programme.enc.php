<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php'); // all functions
//for meta
$follow_type = 'follow';
$image_link = file_location('media_url','home/logo.png');
$image_type = substr($image_link,-3);
$page = "LATEST PPROGRAMME | ".strtoupper(get_xml_data('company_name'));
$page_name = $page." | ".get_xml_data('seo_tag');
$page_url = file_location('home_url','p/programme/');
$keywords = get_json_data('keywords','about_us')."|".$page_name;
$description = $page_name;
?>
<!DOCTYPE html>
<html>
<head><?php require_once(file_location('inc_path','meta.inc.php'));?><title><?=$page_name?></title></head>
<body id="body"class="j-color4"style="font-family:Roboto,sans-serif;">
	<div style='margin-bottom:70px;'><?php require_once(file_location('inc_path','navigation.inc.php')); //navigation?></div>
	<div class="j-row j-home-padding">
		<div class="j-col l8 s12">
			<center><div class='j-xlarge j-bolder'>LATEST PROGRAMME</div></center>
			<?php require_once(file_location('inc_path','news_programme_entries.inc.php'));?>
		</div>
		<div class="j-col l4 s12"><?php require_once(file_location('inc_path','second_column.inc.php'));?></div>
	</div>
	<div><?php require_once(file_location('inc_path','footer.inc.php')); //footer?></div>
	<span id='st'></span>
	<?php require_once(file_location('inc_path','js.inc.php')); //js?>
</body>
</html>