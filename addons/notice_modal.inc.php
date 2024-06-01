<?php
$company = ucwords(get_xml_data('company_name'));
$message = "
			<center class='j-large j-text-color1'><b>NOTICE</b></center><hr>
			<div class='j-text-color3 j-justify'>
				Welcome to {$company}, Please read the following carefully before using the web app. And please note that the web app may
				undergo changes at anytime.<br>
				Also please note that the infomation and media on this web application are not real nor are they true,
				they are meant for development and testing purpose<br><br>
				{$company} is a web application developed by Oladejo Jephthah. The Application is responsive and scalable,it has different views
				for different screen sizes.<br><br>
				This project is based on foundation website. and it can be run by charity/foundation organization.<br>
				It features include:<br>
				° Admin section with different admin level<br>
				° Admin controls everything from the admin section<br>
				° Option for donation with payment gateway<br>
				° News and progarmmes section for users<br>
				° Users can comment on each news<br>
				° Users can share news with one click<br>
				° Many more features.<br><br>
				You can now proceed to surf the foundation website application, thanks for your time.<br><br>
				If You need one or any other web application for your project or business, please visit my portfolio<br>
				<center><a href='https://jephthiano.000webhostapp.com'target='_blank'class='j-btn j-color1 j-round-large'>Visit Porfolio</a><center>
			</div>
			";
?>
<div id='notice_modal'class='j-modal'>
	<div class='j-card-4 j-modal-content j-color4 j-bolder'style='width:96%;max-width:600px;'>
		<div class='j-padding'><?=$message?></div>
		<center class='j-padding'>
			<div class='j-clickable j-text-color1 j-round j-border j-border-color1 j-padding'style='width:100%'onclick=$('#notice_modal').hide();>
				Close
			</div>
			<br>
		</center>
	</div>
</div>