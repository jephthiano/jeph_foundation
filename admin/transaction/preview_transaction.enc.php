<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php');
$follow_type = 'no follow';
$image_link = file_location('media_url','home/logo.png'); $image_type = substr($image_link,-3);
$page_url = file_location('admin_url','transaction/preview_transaction/'.$_GET['page']);
$page = "PREVIEW TRANSACTION";
$page_name = $page." | ".strtoupper(get_xml_data('company_name'));
require_once(file_location('admin_inc_path','session_check.inc.php'));
if(isset($_GET['page']) AND is_numeric($_GET['page'])){ //getting the value of the get 
	$cid = test_input(removenum($_GET['page']));
	if(!empty($cid)){	
		$id = content_data('transaction_table','t_id',$cid,'t_id');
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
				<div class='j-padding'>
					<a href="<?=file_location('admin_url','transaction/')?>" class="j-btn j-color1 j-left j-round j-card-4 j-bolder">Show All Transactions</a>
					<a href="<?=file_location('admin_url','transaction/success/')?>"class='j-btn j-color1 j-center j-round j-card-4 j-bolder'>Show Successful Transactions</a>
					<a href="<?=file_location('admin_url','transaction/failed/')?>"class='j-btn j-color1 j-right j-round j-card-4 j-bolder'>Show Failed Transactions</a>
				</div>
				</center>
				<br class='j-clearfix'>
				<div class="j-container j-large">
					<?php
					if($id === false){
						page_not_available('short');
					}else{
						?>
						<h2 class='j-text-color1 j-center'><b>TRANSACTION DETAILS</b></h2>
						<span class="j-right j-clickable j-text-color1" onclick="$('#transaction<?=$id?>').show()"><i class="j-xlarge <?=icon('cog')?>"></i></span>
						<br class='j-clearfix'>
						<div class='j-card-4 j-color4 j-padding'style='line-height: 35px;'>
							<div class='j-large j-bolder j-text-color1'>DONOR DETAILS</div>
							<div><span class='j-bolder'>Name:</span> <span class='j-margin'><?=ucwords((content_data('transaction_table','t_name',$id,'t_id')))?></span></div>
							<div><span class='j-bolder'>Email:</span> <span class='j-margin'><?=ucwords((content_data('transaction_table','t_email',$id,'t_id')))?></span></div>
							<div><span class='j-bolder'>Phone Number:</span> <span class='j-margin'><?=ucwords((content_data('transaction_table','t_phonenumber',$id,'t_id')))?></span></div>
						</div>
						<br>
						<div class='j-card-4 j-color4 j-padding'style='line-height: 35px;'>
							<div class='j-large j-bolder j-text-color1'>DONATION DETAILS</div>
							<div><span class='j-bolder'>Ref_id:</span> <span class='j-margin'><?=ucwords((content_data('transaction_table','t_ref_id',$id,'t_id')))?></span></div>
							<div><span class='j-bolder'>Amount:</span> <span class='j-margin'><?=money((content_data('transaction_table','t_amount',$id,'t_id')))?></span></div>
							<div><span class='j-bolder'>Currency:</span> <span class='j-margin'><?=ucwords((content_data('transaction_table','t_currency',$id,'t_id')))?></span></div>
						</div>
						<br>
						<div class='j-card-4 j-color4 j-padding'style='line-height: 35px;'>
							<div class='j-large j-bolder j-text-color1'>ACCOUNT DETAILS</div>
							<div><span class='j-bolder'>Payment Method:</span> <span class='j-margin'><?=ucwords((content_data('transaction_table','t_payment_method',$id,'t_id')))?></span></div>
							<div><span class='j-bolder'>Bank:</span> <span class='j-margin'><?=ucwords((content_data('transaction_table','t_bank',$id,'t_id')))?></span></div>
							<div><span class='j-bolder'>Brand:</span> <span class='j-margin'><?=ucwords((content_data('transaction_table','t_brand',$id,'t_id')))?></span></div>
							<div><span class='j-bolder'>Account Name:</span> <span class='j-margin'><?=ucwords((content_data('transaction_table','t_account_name',$id,'t_id')))?></span></div>
							<div><span class='j-bolder'>Account Number:</span> <span class='j-margin'><?=replace_with_asterisk((content_data('transaction_table','t_account_number',$id,'t_id')))?></span></div>
						</div>
						<br>
						<div class='j-card-4 j-color4 j-padding'style='line-height: 35px;'>
							<div class='j-large j-bolder j-text-color1'>OTHER DETAILS</div>
							<div><span class='j-bolder'>Status:</span> <span class='j-margin'><?=ucwords((content_data('transaction_table','t_status',$id,'t_id')))?></span></div>
							<div><span class='j-bolder'>Ipaddress:</span> <span class='j-margin'><?=(content_data('transaction_table','t_ipaddress',$id,'t_id'))?></span></div>
							<div><span class='j-bolder'>Date:</span> <span class='j-margin'><?=showdate(content_data('transaction_table','t_regdatetime',$id,'t_id'),'')?></span></div>
						</div>
						
						<?php
					}
					?>
				</div>
				<br><br>
				<span id="st"></span>
			<?php if($adid === 1 && $id !== false){ preview_modal('transaction',$id); } ?>
		</div>
	</div>
</div>
<!-- BODY ENDS -->
<?php require_once(file_location('admin_inc_path','js.inc.php'));?>
</body>
</html>