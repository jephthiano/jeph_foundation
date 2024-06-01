<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php');
$follow_type = 'no follow';
$image_link = file_location('media_url','home/logo.png'); $image_type = substr($image_link,-3);
$page_url = file_location('admin_url','partner/update_partner/'.$_GET['page']);
$page = "UPDATE PARTNER";
$page_name = $page." | ".strtoupper(get_xml_data('company_name'));
require_once(file_location('admin_inc_path','session_check.inc.php'));
if(isset($_GET['page']) AND is_numeric($_GET['page'])){ //getting the value of the get 
	$cid = test_input(removenum($_GET['page']));
	if(!empty($cid)){	
		$id = content_data('social_handle_table','s_id',$cid,'s_id');
	}else{
		trigger_error_manual(404);
	}
}else{
	trigger_error_manual(404);
}
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
			<!--ADMIN SECTION BEGINS -->
			<center>
				<br><br>
				<a href="<?=file_location('admin_url','partner/')?>" class="j-btn j-color1 j-left j-round j-card-4 j-bolder">Show All Partners</a>
				<a href="<?=file_location('admin_url','partner/insert_partner/')?>"class='j-btn j-color1 j-right j-round j-card-4 j-bolder'>Insert New Partner</a>
			</center>
				<br><br>
				<div class="j-container">
					<?php
					if($id === false){
						page_not_available('short');
					}else{
						?>
						<h2 class='j-text-color1 j-center'><b>UPDATE PARTNER</b></h2>
						<div>
							<div id='preview'class='j-border-color5 j-border j-circle j-color5 j-vertical-center-container'style='width:100px;height:100px;'
								 onclick="$('#partner_pics_modal').show();">
								<img src='<?=file_location('media_url',get_media('partner',$id))?>'alt=''class='j-circle j-card-4'style='width:100px;height:100px;border:solid 2px white'>
								<span class='j-text-color4 j-bold j-vertical-center-element'style='font-size:40px;'>+</span>
							</div>
							<br><br>
							<?php image_modal('partner',$id)?>
						</div>
						<form onsubmit="event.preventDefault();"class=''>
							<label class="j-large"><b>Name</b> <span class='j-text-color1 mg'id="nme">*</span></label><br class='j-clearfix'>
							<input type="text"class="j-input j-medium j-border-2 j-border-color5 j-round-large"placeholder="Name"
								name="nm"id="nm"value="<?=(content_data('partner_table','p_name',$id,'p_id'))?>"style="width:100%;max-width:400px"/>
							<br class='j-clearfix'><br>
							
							<input type='hidden'name='tid'value='<?=addnum($id)?>'/>
							<button type='submit'id='sbtn'class="j-btn j-medium j-color1 j-round-large j-bolder">Update Partner</button>
						</form>
						<?php
					}
					?>
				</div>
				<span id="st"></span>
				<br><br>
		</div>
	</div>
</div>
<!-- BODY ENDS -->
<?php require_once(file_location('admin_inc_path','js.inc.php'));?>
</body>
</html>