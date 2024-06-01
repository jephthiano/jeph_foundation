<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php');
$follow_type = 'no follow';
$image_link = file_location('media_url','home/logo.png'); $image_type = substr($image_link,-3);
$page_url = file_location('admin_url','settings/');
require_once(file_location('admin_inc_path','session_check.inc.php'));
$page = "WEBSITE SETTING";
$page_name = $page." | ".strtoupper(get_xml_data('company_name'));
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
				<br>
				<div class='j-container'>
					<h2 class='j-text-color1'style=''><b>WEBSITE SETTING</b></h2>
				</div>
			</center>
			<div class="j-container">
				<div>
					<div class='j-bolder j-large'>COLOR SETTINGS</div><br>
					<div>
						<div>
							<?php //primary color ?>
							<span class='j-bolder j-text-color1'style='margin-right:20px;'>PRIMARY COLOR:</span>
							<span class='j-padding j-text-color4'style="background-color:<?=get_json_data('primary_color','color')?>;height:30px;width:30px;"></span>
						</div><br>
						<div>
							<input type="text"class="j-left j-input j-medium j-border-2 j-border-color5 j-round-large"placeholder="Primary Color"
								name="pry_color"id="pry_color"value="<?=get_json_data('primary_color','color')?>"
								style="width:60%;max-width:200px;margin-right:20px;"/>
							<button type='submit'id='sbtn'class="primary_color j-btn j-medium j-color1 j-round-large j-bolder"onclick="css('color','primary_color',$('#pry_color').val());">Save</button>
						</div>
						<br>
						<div>
							<?php //secondary color ?>
							<span class='j-bolder j-text-color1'style='margin-right:20px;'>SECONDARY COLOR:</span>
							<span class='j-padding j-text-color4'style="background-color:<?=get_json_data('secondary_color','color')?>;height:30px;width:30px;"></span>
						</div><br>
						<div>
							<input type="text"class="j-left j-input j-medium j-border-2 j-border-color5 j-round-large"placeholder="Secondary Color"
								name="sec_color"id="sec_color"value="<?=get_json_data('secondary_color','color')?>"
								style="width:60%;max-width:200px;margin-right:20px;"/>
							<button type='submit'id='sbtn'class="secondary_color j-btn j-medium j-color1 j-round-large j-bolder"onclick="css('color','secondary_color',$('#sec_color').val());">Save</button>
						</div>
					</div>
				</div>
				<br>
				<div>
					<br>
					<div class='j-bolder j-large'>ABOUT US SETTINGS</div>
					<br>
					<div>
						<?php //keywords ?>
						<div class='j-bolder j-text-color1'style='margin-right:20px;'>WHO WE ARE:</div>
						<textarea placeholder="keywords"id='keywords'name="who_we_are"style="width:100%;max-width:400px;"rows="4"class="j-input j-medium j-border-2 j-border-color5 j-color4 j-round-large"
						><?=get_json_data('keywords','about_us')?></textarea><br>
						<button type='submit'id='sbtn'class="keywords j-btn j-medium j-color1 j-round-large j-bolder"onclick="css('about_us','keywords',$('#keywords').val());">Save</button>
					</div>
					<br>
					<div>
						<?php //who we are ?>
						<div class='j-bolder j-text-color1'style='margin-right:20px;'>WHO WE ARE:</div>
						<textarea placeholder="Who we are"id='who_we_are'name="who_we_are"style="width:100%;max-width:400px;"rows="4"class="j-input j-medium j-border-2 j-border-color5 j-color4 j-round-large"
						><?=get_json_data('who_we_are','about_us')?></textarea><br>
						<button type='submit'id='sbtn'class="who_we_are j-btn j-medium j-color1 j-round-large j-bolder"onclick="css('about_us','who_we_are',$('#who_we_are').val());">Save</button>
					</div>
					<br>
					<div>
						<?php //who we are ?>
						<div class='j-bolder j-text-color1'style='margin-right:20px;'>WHAT WE DO:</div>
						<textarea placeholder="What we do"id='what_we_do'name="what_we_do"style="width:100%;max-width:400px;"rows="4"class="j-input j-medium j-border-2 j-border-color5 j-color4 j-round-large"
						><?=get_json_data('what_we_do','about_us')?></textarea><br>
						<button type='submit'id='sbtn'class="what_we_do j-btn j-medium j-color1 j-round-large j-bolder"onclick="css('about_us','what_we_do',$('#what_we_do').val());">Save</button>
					</div>
					<br>
					<div>
						<?php //who we are ?>
						<div class='j-bolder j-text-color1'style='margin-right:20px;'>MISSION:</div>
						<textarea placeholder="Mission"id='mission'name="mission"style="width:100%;max-width:400px;"rows="4"class="j-input j-medium j-border-2 j-border-color5 j-color4 j-round-large"
						><?=get_json_data('mission','about_us')?></textarea><br>
						<button type='submit'id='sbtn'class="mission j-btn j-medium j-color1 j-round-large j-bolder"onclick="css('about_us','mission',$('#mission').val());">Save</button>
					</div>
					<br>
					<div>
						<?php //who we are ?>
						<div class='j-bolder j-text-color1'style='margin-right:20px;'>VISION:</div>
						<textarea placeholder="Vision"id='vision'name="vision"style="width:100%;max-width:400px;"rows="4"class="j-input j-medium j-border-2 j-border-color5 j-color4 j-round-large"
						><?=get_json_data('vision','about_us')?></textarea><br>
						<button type='submit'id='sbtn'class="vision j-btn j-medium j-color1 j-round-large j-bolder"onclick="css('about_us','vision',$('#vision').val());">Save</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<span id='st'></span>
</div>
<!-- BODY ENDS -->
<?php require_once(file_location('admin_inc_path','js.inc.php'));?>
</body>
</html>