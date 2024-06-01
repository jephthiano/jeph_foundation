<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php');
$follow_type = 'no follow';
$image_link = file_location('media_url','home/logo.png'); $image_type = substr($image_link,-3);
$page_url = file_location('admin_url','site_data/');
$page = "WEBSITE DATA";
$page_name = $page." | ".strtoupper(get_xml_data('company_name'));
require_once(file_location('admin_inc_path','session_check.inc.php'));
?>
<!DOCTYPE html>
<html>
<head>
<?php require_once(file_location('inc_path','meta.inc.php'));?>
<title><?=$page_name?></title>
</head>
<body class="" style="font-family:Roboto,sans-serif;width:100%;"onload="">
<?php require_once(file_location('admin_inc_path','navigation.inc.php'));?>
<!-- BODY STARTS-->
<div class="j-row">
	<div class="j-col s12 l2 j-hide-small j-hide-medium">o
		<?php require_once(file_location('admin_inc_path','first_column.inc.php'));?>
	</div>
	<div class="j-col s12 l10  j-padding"><br>
		<div id="maincol"class='j-main-col'>
			<!--ADMIN SECTION BEGINS -->
			<center>
				<br><br>
				<div class='j-container'>
					<?php if($adid === 1){ ?>
					<a href="<?=file_location('admin_url','settings/')?>"class='j-text-color4 j-right j-color1 j-btn j-round j-bolder j-itallic j-large'>Site Settings</a>
					<?php }?>
				</div>
			</center>
			<div class="j-padding">
				<h2 class='j-text-color1 j-center'style=''><b>WEBSITE DATA</b></h2>
				<div class='j-xlarge j-bolder'>Color</div>
				<div>
					<div>
						<span class='j-bolder j-large'style='margin-right:20px;'>Primary Color: </span>
						<span class='j-padding j-text-color4'style="background-color:<?=get_json_data('primary_color','color')?>;height:30px;width:30px;"></span>
					</div><br>
					<div>
						<span class='j-bolder j-large'style='margin-right:20px;'>Secondary Color: </span>
						<span class='j-padding j-text-color4'style="background-color:<?=get_json_data('secondary_color','color')?>;height:30px;width:30px;"></span>
					</div>
				</div>
				<br>
				<div class='j-xlarge j-bolder'>About <?=ucwords(get_xml_data('company_name'))?></div>
				<div>
					<div class='j-bolder j-large'>Keywords</div>
					<div><?=ucwords(get_json_data('keywords','about_us'))?></div>
				</div><br>
				<div>
					<div class='j-bolder j-large'>Who We Are</div>
					<div><?=ucwords(get_json_data('who_we_are','about_us'))?></div>
				</div><br>
				<div>
					<div class='j-bolder j-large'>What We Do</div>
					<div><?=ucwords(get_json_data('what_we_do','about_us'))?></div>
				</div><br>
				<div>
					<div class='j-bolder j-large'>Mission</div>
					<div><?=ucwords(get_json_data('mission','about_us'))?></div>
				</div><br>
				<div>
					<div class='j-bolder j-large'>Vision</div>
					<div><?=ucwords(get_json_data('vision','about_us'))?></div>
				</div><br>
			</div>
		</div>
	</div>
</div>
<span id='st'></span>
<!-- BODY ENDS -->
<?php require_once(file_location('admin_inc_path','js.inc.php'));?>
</body>
</html>