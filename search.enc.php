<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php'); // all functions
if(isset($_GET['sear']) && isset($_GET['type'])){ //getting the value of the get 
	$sear = ($_GET['sear']);
	$ty = ($_GET['type']);
	if(!empty($sear) || !empty($ty)){$searchtext = $sear;$type = $ty;}else{trigger_error_manual(404);}
	if($type !== 'programme' && $type !== 'news'){trigger_error_manual(404);}
}else{
	trigger_error_manual(404);
}
// creating connection
require_once(file_location('inc_path','connection.inc.php'));
@$conn = dbconnect('admin','PDO');
//for meta
$follow_type = 'follow';
$image_link = file_location('media_url','home/logo.png');
$image_type = substr($image_link,-3);
$page = "SEARCH | ".strtoupper(get_xml_data('company_name'));
$page_name = $page." | ".get_xml_data('seo_tag');
$page_url = file_location('home_url',"search/{$type}/{$searchtext}/");
$keywords = get_json_data('keywords','about_us')."|".$page_name;
$description = $searchtext." | ".$page_name;
?>
<!DOCTYPE html>
<html>
<head><?php require_once(file_location('inc_path','meta.inc.php'));?><title><?=ucwords($searchtext)?></title></head>
<body id="body"class="j-color4"style="font-family:Roboto,sans-serif;">
	<div style='margin-bottom:70px;'><?php require_once(file_location('inc_path','navigation.inc.php')); //navigation?></div>
	<div class="j-row j-home-padding">
		<div class="j-col l8 s12">
			<?php require_once(file_location('inc_path','news_programme_entries.inc.php'));?>
		</div>
		<div class="j-col l4 s12">
		<?php require_once(file_location('inc_path','second_column.inc.php'));?>
		</div>
	</div>
	<div><?php require_once(file_location('inc_path','footer.inc.php')); //footer?></div>
	<span id='st'></span>
	<?php require_once(file_location('inc_path','js.inc.php')); //js?>
</body>
</html>