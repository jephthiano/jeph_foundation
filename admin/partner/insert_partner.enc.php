<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php');
$follow_type = 'no follow';
$image_link = file_location('media_url','home/logo.png'); $image_type = substr($image_link,-3);
$page_url = file_location('admin_url','/partner/insert_partner/');
$page = "INSERT PARTNER";
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
	<div class="j-col s12 l10"><br>
		<div id="maincol"class='j-main-col'>
			<center>
				<br><br>
				<a href="<?=file_location('admin_url','partner/')?>" class="j-btn j-color1 j-right j-round j-card-4 j-bolder">Show All Partners</a>
				<br class='j-clearfix'><br>
			</center>
			<h2 class='j-text-color1 j-center'><b>INSERT NEW PARTNER</b></h2>
				<div class="j-container">
					<div id='preview'class='j-border-color5 j-border j-circle j-color5 j-vertical-center-container'style='width:100px;height:100px;'
						 onclick='ti($("#image"))'>
						<span class='j-text-color4 j-bold j-vertical-center-element'style='font-size:40px;'>+</span>
					</div>
					<form onsubmit="event.preventDefault();"class=''>
						<input type="file"name="image"id="image"class="j-round j-hide"onchange="pi(this,document.getElementById('preview'));">
						<br>
						<label class="j-large"><b>Name</b> <span class='j-text-color1 mg'id="nme">*</span></label><br class='j-clearfix'>
						<input type="text"class="j-left j-input j-medium j-border-2 j-border-color5 j-round-large"placeholder="Name"
							name="nm"id="nm"value=""style="width:100%;max-width:400px"/><br class='j-clearfix'><br>
						<button type='submit'id='sbtn'class="j-btn j-medium j-color1 j-round-large j-bolder">Insert Partner</button>
					</form>
					<span id="st"></span>
					<br><br>
				</div>
		</div>
	</div>
</div>
<!-- BODY ENDS -->
<?php require_once(file_location('admin_inc_path','js.inc.php'));?>
</body>
</html>