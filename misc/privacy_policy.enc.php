<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php'); // all functions
$data = "privacy policy";
//for meta
$follow_type = 'follow';
$image_link = file_location('media_url','home/logo.png');
$page = strtoupper($data)." | ".strtoupper(get_xml_data('company_name'));
$page_name = $page." | ".get_xml_data('seo_tag');
$page_url = file_location('home_url','/misc/privacy_policy/');
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
				
				 <div style='line-height:35px;'>
					<h4 class='j-xlarge'title="<?=ucfirst(get_xml_data('company_name'))?> Privacy policy"><b> 1. Privacy Policy</b></h4>
					<p class="j-large" style="padding-left: 30px">
						<?=ucwords(get_xml_data('company_name'))?> has created this website (<?=file_location('home_url','')?>) to make available information about
						the Foundation and our work. Thank you for visiting our website. This privacy policy tells you how we use personal
						information collected on this site. Please read this privacy policy before using the site or submitting any personal
						information. By using the site, you are accepting the practices described in this privacy policy. These practices may
						be changed, but changes will be posted and will only apply to activities and information received following the changes
						and not before. You are encouraged to review this privacy policy whenever you visit the site to ensure that you
						understand how any personal information you provide will be used.
						<br><br>
						Note: the privacy practices set forth in this privacy policy are for this website only. If you link to
						other websites, please review the privacy policies posted at those sites.
					</p>
					<h4 class='j-xlarge'title="Collection of Information"><b> 2. Collection of Information</b></h4>
					<p class="j-large" style="padding-left: 30px">
						We collect personally identifiable information, like names, postal addresses, email addresses, etc., when voluntarily
						submitted by our visitors. The information you provide is only used to fulfil your specific request, unless you
						give us permission to use it in another manner, for example to add you to one of our mailing lists.
					</p>
					<h4 class='j-xlarge'title="Cookie/Tracking Technology"><b> 3. Cookie/Tracking Technology </b></h4>
					<p class="j-large" style="padding-left: 30px">
						This Site may use cookie and tracking technology depending on the features offered. Cookie and tracking technology
						are useful for gathering information such as browser type and operating system, tracking the number of visitors to
						the Site, and understanding how visitors use the Site. Cookies can also help customize the Site for visitors.
						Personal information cannot be collected via cookies and other tracking technology, however, if you previously provided
						personally identifiable information, cookies may be tied to such information. Aggregate cookie and tracking information
						may be shared with third parties.
					</p>
					<h4 class='j-xlarge'title="Distribution of Information"><b> 4. Distribution of Information</b></h4>
					<p class="j-large" style="padding-left: 30px">
						We may share information with governmental agencies or other companies assisting us in fraud prevention or
						investigation. We may do so when:<br>
						<div class='j-large'style="padding-left: 50px">
							•	permitted or required by law; or,<br>
							•	trying to protect against or prevent actual or potential fraud or unauthorized transactions; or,<br>
							•	investigating fraud which has already taken place. The information is not provided to these companies for marketing purposes.
						</div>
					</p>
					<h4 class='j-xlarge'title="Data Security"><b> 5. Data Security</b></h4>
					<p class="j-large" style="padding-left: 30px">
						Your personally identifiable information is kept secure. Only authorized employees, agents and contractors
						(who have agreed to keep information secure and confidential) have access to this information. All emails and newsletters from this
						site allow you to opt out of further mailings.
					</p>
					<h4 class='j-xlarge'title="Privacy Contact Information"><b> 6. Privacy Contact Information</b></h4>
					<p class="j-large" style="padding-left: 30px;line-height: 35px;">
						<b><?=ucwords(get_xml_data('company_name'))?></b><br>
						<i><?=ucwords(get_xml_data('address'))?></i><br>
						<b style='font-family:sofia'>Tel:</b><a href="tel:<?=get_xml_data('phonenumber')?>"class="j-button"title='Oladejo Jephthah Phonenumber'><i class="<?=icon('phone')?>"></i><?=get_xml_data('phonenumber')?></a><br>
						<b style='font-family:sofia'>Email:</b><a href="mailto:<?=get_xml_data('business_email')?>"title='Oladejo Jephthah Email'class="j-button"><?=get_xml_data('business_email')?></a><br>
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