<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php');
require_once(file_location('inc_path','all_tables.inc.php')); // create all tables
$follow_type = 'no follow';
$image_link = file_location('media_url','home/logo.png'); $image_type = substr($image_link,-3);
$page = "CONTROL PANEL";
$page_name = $page." | ".strtoupper(get_xml_data('company_name'));
require_once(file_location('admin_inc_path','session_check.inc.php'));
?>
<!DOCTYPE html>
<html>
<head>
<?php require_once(file_location('inc_path','meta.inc.php'));?>		
<title>CPANEL | HOME</title>
</head>
<body class="" style="font-family:Roboto,sans-serif;width:100%;"onload="">
<?php require_once(file_location('admin_inc_path','navigation.inc.php'));?>
<!-- BODY STARTS-->
<div class="j-row">
	<div class="j-col s12 l2 j-hide-small j-hide-medium">o
		<?php require_once(file_location('admin_inc_path','first_column.inc.php'));?>
	</div>
	<div class="j-col s12 l10  j-padding"><br>
		<div id="maincol">
			<!--ADMIN SECTION BEGINS -->
			<center>
				<br>
				<div class='j-container'>
					<h2 class='j-text-color1'style=''><b><?=$page_name?></b></h2>
					<?php if($adid === 1){ ?>
					<a href="<?=file_location('admin_url','site_data/')?>"class='j-text-color4 j-left j-color1 j-btn j-round j-bolder j-itallic j-large'><i class='<?=icon('address-card')?>'></i> Website Data</a>
					<a href="<?=file_location('admin_url','settings/')?>"class='j-text-color4 j-right j-color1 j-btn j-round j-bolder j-itallic j-large'><i class='<?=icon('cog')?>'></i> Site Settings</a>
					<?php }?>
				</div>
				<div class="j-container">
					<?php if($adid === 1){ ?>
					<a href="<?=file_location('admin_url','admin/')?>"class='j-btn j-color1 j-text-color4 j-round j-container j-margin-cpanel'style="padding:20px 40px;">
					<b><span class='j-large'>Admin</span><span class='j-padding'>(<?=get_numrow('admin_table')?>)</span></b>
					<br>
					<span class="j-xxlarge <?=icon('users')?>"> </span> 
					</a>
					<?php }?>
					<a href="<?=file_location('admin_url','news/')?>"class='j-btn j-color1 j-text-color4 j-round j-container j-margin-cpanel'style="padding:20px 40px;">
					<b><span class='j-large'>News</span><span class='j-padding'>(<?=get_numrow('news_table')?>)</span></b>
					<br>
					<span class="j-xxlarge <?=icon('newspaper')?>"> </span> 
					</a>
					<a href="<?=file_location('admin_url','programme/')?>"class='j-btn j-color1 j-text-color4 j-round j-container j-margin-cpanel'style="padding:20px 40px;">
					<b><span class='j-large'>Programmes</span><span class='j-padding'>(<?=get_numrow('programme_table')?>)</span></b>
					<br>
					<span class="j-xxlarge <?=icon('calendar-alt')?>"> </span> 
					</a>
					<a href="<?=file_location('admin_url','partner/')?>"class='j-btn j-color1 j-text-color4 j-round j-container j-margin-cpanel'style="padding:20px 40px;">
					<b><span class='j-large'>Partners</span><span class='j-padding'>(<?=get_numrow('partner_table')?>)</span></b>
					<br>
					<span class="j-xxlarge <?=icon('handshake')?>"> </span> 
					</a>
					<a href="<?=file_location('admin_url','social_handle/')?>"class='j-btn j-color1 j-text-color4 j-round j-container j-margin-cpanel'style="padding:20px 40px;">
					<b><span class='j-large'>Social Handles</span><span class='j-padding'>(<?=get_numrow('social_handle_table')?>)</span></b>
					<br>
					<span class="j-xxlarge <?=icon('scribd','fab')?>"> </span> 
					</a>
					<a href="<?=file_location('admin_url','message/')?>"class='j-btn j-color1 j-text-color4 j-round j-container j-margin-cpanel'style="padding:20px 40px;">
					<b><span class='j-large'>Messages</span><span class='j-padding'>(<?=get_numrow('message_table')?>)</span></b>
					<br>
					<span class="j-xxlarge <?=icon('envelope')?>"> </span> 
					</a>
					<a href="<?=file_location('admin_url','subscriber/')?>"class='j-btn j-color1 j-text-color4 j-round j-container j-margin-cpanel'style="padding:20px 40px;">
					<b><span class='j-large'>Subscribers</span><span class='j-padding'>(<?=get_numrow('subscribe_table')?>)</span></b>
					<br>
					<span class="j-xxlarge <?=icon('male')?>"> </span> 
					</a>
					<a href="<?=file_location('admin_url','transaction/')?>"class='j-btn j-color1 j-text-color4 j-round j-container j-margin-cpanel'style="padding:20px 40px;">
					<b><span class='j-large'>Transactions</span><span class='j-padding'>(<?=get_numrow('transaction_table')?>)</span></b>
					<br>
					<span class="j-xxlarge <?=icon('credit-card')?>"> </span> 
					</a>
				</div>
			</center>
		</div>
	</div>
</div>
<span id='st'></span>
<!-- BODY ENDS -->
<?php require_once(file_location('admin_inc_path','js.inc.php'));?>
</body>
</html>