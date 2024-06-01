<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php'); // all functions
if(isset($_GET['title'])){// getting the value in $_GET  and assigning the value of id
	$raw_title = ($_GET['title']);
	$id = content_data('news_table','n_id',($raw_title),'n_title');
	if($id === false){trigger_error_manual();}
	if(content_data('news_table','n_status',($raw_title),'n_title') === 'pending'){trigger_error_manual();}
}else{
	trigger_error_manual();
}
//meta
$follow_type = 'follow';
$image_link = file_location('media_url',get_media('news',$id));
$image_type = substr($image_link,-3);
$page = ucwords(($raw_title))." | ".strtoupper(get_xml_data('company_name'));
$page_name = $page." | ".get_xml_data('seo_tag');
$page_url = file_location('home_url','n/n/'.urlencode(($raw_title)));
$keywords = get_json_data('keywords','about_us')."|".$page_name;
$description = $page_name;
?>
<!DOCTYPE html>
<html>
<head><?php require_once(file_location('inc_path','meta.inc.php'));?><title><?=$page_name?></title>
<?php //AddToAny js cdn ?><script async src="https://static.addtoany.com/menu/page.js"></script></head>
<body id="body" class="j-light-gray" style="font-family:Roboto,sans-serif;">
	<div style='margin-bottom:70px;'><?php require_once(file_location('inc_path','navigation.inc.php')); //navigation?></div>
	<div class='j-home-padding'>
		<div class="j-row">
			<div class="j-col l8 s12">
				<?php $details_type = 'news';require_once(file_location('inc_path','news_programme_details.inc.php'));?>
			</div>
			<div class="j-col l4 s12"><?php require_once(file_location('inc_path','second_column.inc.php'));?></div>
		</div>
		<?php back_to_top() //back to the top?>
	</div>
	<?php require_once(file_location('inc_path','footer.inc.php')); //footer?>
	<?php //AddToAny js plugins ?>
	<script async src="<?=file_location('home_url','plugins/addtoany.js')?>"></script>
	<?php require_once(file_location('inc_path','js.inc.php')); //js?>
</body>
</html>