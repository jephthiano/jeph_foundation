<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php'); // all functions
$data = "about us";
//for meta
$follow_type = 'follow';
$image_link = file_location('media_url','home/logo.png');
$page = strtoupper($data)." | ".strtoupper(get_xml_data('company_name'));
$page_name = $page." | ".get_xml_data('seo_tag');
$page_url = file_location('home_url','/misc/about_us/');
$keywords = get_json_data('keywords','about_us').'|'.$page_name;
$description = $page_name;
?>
<!DOCTYPE html>
<html>
<head><?php require_once(file_location('inc_path','meta.inc.php'));?><title><?=$page_name?></title></head>
<body id="body"class="j-light-gray"style="font-family:Roboto,sans-serif;">
	<?php require_once(file_location('inc_path','navigation.inc.php'));//navigation?>
	<div class='j-center j-misc-padding'style="margin-top:20px;">
		<div class='j-xxlarge j-text-color1 j-bolder'><?=ucwords(get_xml_data('company_name'))?></div>
		<div class='j-xlarge j-text-color3 j-bolder'><?=ucwords($data)?></div>
	</div>
	<div class='j-misc-padding'>
			<div class='j-color j-padding'>
				
				 <div>
					<p class=""id='who_we_are'>
						<div class='j-xlarge'><b>Who We Are</b></div>
						<div class='j-large'><?=ucfirst(get_json_data('who_we_are','about_us'))?></div>
					</p>
					<p class=""id=''>
						<div class='j-xlarge'><b>Our Vision</b></div>
						<div class='j-large'><?=ucfirst(get_json_data('vision','about_us'))?></div>
					</p>
					<p class=""id=''>
						<div class='j-xlarge'><b>Our Mission</b></div>
						<div class='j-large'><?=ucfirst(get_json_data('mission','about_us'))?></div>
					</p>
					<p class=""id='what_we_do'>
						<div class='j-xlarge'><b>What We do</b></div>
						<div class='j-large'><?=ucfirst(get_json_data('what_we_do','about_us'))?></div>
					</p>
				 </div>
			</div>
	</div>
	<br>
	<div><?php require_once(file_location('inc_path','footer.inc.php')); //footer?></div>
	<span id='st'></span>
	<?php require_once(file_location('inc_path','js.inc.php')); //js?>
</body>
</html>