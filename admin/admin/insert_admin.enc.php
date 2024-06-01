<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php');
$follow_type = 'no follow';
$image_link = file_location('media_url','home/logo.png'); $image_type = substr($image_link,-3);
$page_url = file_location('admin_url','admin/insert_admin/');
$page = "INSERT ADMIN";
$page_name = $page." | ".strtoupper(get_xml_data('company_name'));
require_once(file_location('admin_inc_path','session_check.inc.php'));
if($adid !== 1 || content_data('admin_table','ad_level',$adid,'ad_id') != 2){trigger_error_manual(404);}
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
				<a href="<?=file_location('admin_url','admin/')?>" class="j-btn j-color1 j-right j-bolder j-round j-card-4">Show All Admins</a>
				<br class='j-clearfix'>
				<h2 class='j-text-color1 j-center'><b>INSERT NEW ADMIN</b></h2>
			</center>
				<div class="j-container">
					<div id='preview'class='j-border-color5 j-border-2 j-circle j-color5 j-vertical-center-container'style='width:100px;height:100px;'
						 onclick='ti($("#image"))'>
						<span class='j-text-color4 j-bold j-vertical-center-element'style='font-size:40px;'>+</span>
					</div>
					<form onsubmit="event.preventDefault();"class=''>
						<input type="file"name="image"id="image"class="j-round j-hide"onchange="pi(this,document.getElementById('preview'));">
						<br>
						<label class=""><b>Email</b> <span class='j-text-color1 mg'id='eme'>*</span></label><br>		
						<input type="email"class="j-input j-medium j-border-2 j-border-color5 j-round-large"placeholder="Email"
						  name="em"id="em"value=""style="width:100%;max-width:400px"/><br>
						  
						<label class=""><b>Username</b> <span class='j-text-color1 mg'id='une'>*</span></label><br>		
						<input type="text"class="j-input j-medium j-border-2 j-border-color5 j-round-large"placeholder="Username"
						  name="un"id="un"value=""style="width:100%;max-width:400px"/><br>
						
						<label class=""><b>Fullname</b> <span class='j-text-color1 mg'id='fne'>*</span></label><br>		
						<input type="text"class=" j-input j-medium j-border-2 j-border-color5 j-round-large"placeholder="Fullname"
						  name="fn"id="fn"value=""style="width:100%;max-width:400px"/><br>
						
						<label class=""><b>Password</b> <span class='j-text-color1 mg'id='pse'>*</span></label><br>		
						<input type="password"class=" j-input j-medium j-border-2 j-border-color5 j-round-large"placeholder="Password"
						  name="ps"id="ps"value=""style="width:100%;max-width:400px"/><br>
						  
						<label class=""><b>Level</b> <span class='j-text-color1 mg'id='lve'>*</span></label><br>
						<select id="lv"name="lv"class="j-select j-border-2 j-border-color5 j-color4 j-round-large"style="width:100%;max-width:400px;">
							<?php get_level(2)?>
						</select><br><br>
						<button type='submit'id='sbtn'class="j-btn j-medium j-color1 j-round-large j-bolder">Insert New Admin</button>
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