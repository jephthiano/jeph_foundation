<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php'); // all functions
$data = "terms of service";
//for meta
$follow_type = 'follow';
$image_link = file_location('media_url','home/logo.png');
$page = strtoupper($data)." | ".strtoupper(get_xml_data('company_name'));
$page_name = $page." | ".get_xml_data('seo_tag');
$page_url = file_location('home_url','/misc/term_of_use/');
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
					<h4 class='j-xlarge'><b>1.  Restrictions on Use of Content</b></h4>
					<p class="j-large" style="padding-left: 30px">
						The Site contains a variety of information, including (without limitation) information, data, text, software, music,
						sound, photographs, graphics, video, messages or other materials, that you upload, post or otherwise provide
						in connection with the Site ("Content"). Much of the Content on the Site is not available for downloading,
						such as our copyrighted works that we do not distribute or works of others that we are not permitted to distribute.
						However, we also may have Content that if so designated may be downloaded by you pursuant to these Terms
						("Available Content"). You may review, download, copy, distribute and use the available content solely for the purpose
						of furthering your mission in the ordinary course of your governmental or charitable purpose and attendant operations.
						you may not sell the available content or otherwise distribute it for a fee. you will not use or disclose it or the site
						to any third parties except as expressly permitted by these terms.

						<br><br>
						This Site is controlled by us from our offices within <?=get_xml_data('country')?>. If you choose to access this Site
						from locations outside <?=get_xml_data('country')?> you do so at your own risk and you are responsible for compliance with any local laws.
						You may not use or export anything (including information) from the Site in violation of <?=get_xml_data('country')?>
						export laws, regulations or the Terms.

					</p>
					<h4 class='j-xlarge'><b>2. Registration and Creating Profiles etc.</b></h4>
					<p class="j-large" style="padding-left: 30px">
						For some areas of the Site, you may have to complete a registration process or create a profile for use in applying for
						something (e.g., a job or a grant). Completion of the process will usually create an account with a user name and
						password or other identifier which you agree to guard as confidential information—if you are careless with it, others
						may be able to access the information. You agree to provide accurate, current and complete information at all times.
						You also agree that you will review, maintain, correct, and update such information in a timely manner to maintain its
						accuracy and completeness by using the means allowed for the relevant information or, when appropriate, by contacting
						us. If you provide (or the Foundation has reasonable grounds to believe that you provided) any information that is
						inaccurate, not current, or incomplete, the Foundation may suspend or terminate your access, application, grant or
						participation in a program, in addition to exercising all rights and remedies allowed by law.
						<br><br>
						You agree that all uses of the identifier established for you during a registration or similar process will be
						attributed to and legally bind you and may be relied upon by us and our agents, affiliates, and other third parties
						with whom we work in order to provide the Site, Content, services or pursue our mission (including but not limited
						to our and their respective affiliates, officers, employees and agents) (collectively "Third Parties"), as being a
						use made by you, even if someone else used your identifier.
					</p>
					<h4 class='j-xlarge'><b>3. Privacy Notice</b></h4>
					<p class="j-large" style="padding-left: 30px">
						Please refer to our Privacy & Cookies Notice, which describes our practices and policies related to the collection,
						use, and storage of personal data. Do not provide personal data about others unless you are authorized or required to
						do so by contract or applicable law. You may provide personal data on behalf of another person if you have provided
						them with a copy of this notice and any applicable supplemental privacy notice, and obtained their explicit consent.
						We may ask you to provide evidence of that notice and consent.
					</p>
					<h4 class='j-xlarge'><b>4.  Infringement of Our Rights or the Rights of Others</b></h4>
					<p class="j-large" style="padding-left: 30px">
						Our Site, including the Content, is protected by intellectual property laws and you agree to respect them. See
						the "Additional or Required Notices" section of these Terms for more information about our trademarks and copyrights.
						All rights not expressly granted to you are reserved. As for intellectual property rights of others, anyone who
						believes that their work has been infringed, may provide a notice to our copyright agent—see the Additional or
						Required Notices section of these Terms. It is our policy to terminate in appropriate circumstances any (if any)
						account or right of access for repeated infringement, and we also reserve the right to terminate for even one
						infringement.
					</p>
					<h4 class='j-xlarge'><b>5. Feedback</b></h4>
					<p class="j-large" style="padding-left: 30px">
						We hope that you will provide your Feedback (as defined below) so that we may better support, improve and pursue our
						charitable mission. However, you agree that you will not supply Feedback that infringes or violates the rights of
						others, and you hereby grant a License to the Foundation (as defined below) in your Feedback. You agree that we have
						no obligation to pay you or anyone else for Feedback or for the License to the Foundation. "Feedback" means all
						remarks, data, suggestions, methods, surveys, reports, processes and ideas (including patentable ideas) and other
						Content that you provide by using the Site or provide about it, Content or any aspect of our mission or operations,
						whether provided to us or persons working with us or the Feedback, and whether provided through the Site or media
						such as a chat room, survey, report, grant, software tool, bulletin board or otherwise.
					</p>
					<h4 class='j-xlarge'><b>6.  Indemnification</b></h4>
					<p class="j-large" style="padding-left: 30px">
						You agree to indemnify, defend and hold harmless the Foundation and Third Parties, from and against any and all
						losses, damage, liability and costs of every nature incurred by any of them in connection with any claim, damage or
						loss related to or arising out of: the Content, use of the Site or related sites, any assistance or services provided
						by us or Third Parties,  any alleged unauthorized use of the Site, or any breach or alleged breach by you of these
						Terms. You agree to cooperate fully in the defense of any of the foregoing. We reserve the right, at our own expense,
						to control exclusively the defense of any matter otherwise subject to indemnification by you and you will not settle
						any matter without our consent in a non-electronic record.  Your obligation to indemnify, defend and hold harmless
						shall be limited to the extent that you are afforded sovereign immunity under applicable federal, state or local laws.
						In such cases where your obligation to indemnify may be limited due to the requirements of federal, state or local laws,
						you shall be responsible for the ordinary negligent acts and omissions of your agents and employees causing harm to
						persons not a party to this agreement.
					</p>
					<h4 class='j-xlarge'><b>7. No Warranties, Conditions or Other Duties </b></h4>
					<p class="j-large" style="padding-left: 30px">
						The site  and all content (regardless of who generates it), site functionality, assistance and services provided by
						site, the foundation or third parties  (collectively, "complete site") are subject to change and provided by us or
						third parties "as is" without any warranty or condition, and without the undertaking of any duty, of any kind, either
						expressed or implied, including, but not limited to, any (if any) warranties or conditions of merchantability and
						fitness for a particular purpose, and any duty (if any) of workmanlike effort or lack of negligence. the complete
						site is provided:
						<br>
						(1) with all faults and the entire risk as to satisfactory quality, performance, accuracy and
						effort is with you; and
						<br>
						(2) without any assurance, or warranty, condition or duty of or regarding: functionality;
						privacy; security; accuracy; availability; lack of: negligence, interruption, viruses or of other harmful code,
						components or transmissions; or the nature or consequences of available content such as (without limitation)
						whether software or other content is subject to any particular license, or whether it is subject to any restrictions
						or consequences that might be triggered by any exercise of a right granted under these terms.
						<br><br>
						Also, there is no warranty by us or third parties of title or against infringement or interference with enjoyment of any
						aspect of the complete site. you agree that you will obtain (including through download) any content entirely at your own
						risk, and you will be solely responsible for any resulting infringement, breach of contract, consequence or damage,
						including (without limitation) to your computer system or loss of data.

						<br><br>
						Some jurisdictions do not allow the exclusion of implied warranties or limitations as specified here and, to the
						least extent as allowed by law, such exclusions and limitations may not apply to you.
					</p>
					<h4 class='j-xlarge'><b>8. No Incidental, Consequential or Certain Other Damages</b></h4>
					<p class="j-large" style="padding-left: 30px">
						To the full extent allowed by law, you agree that neither the doundation nor any of the third parties will be liable
						to you or anyone else for any special, consequential, incidental or punitive damages, damages for lost profits, for
						loss of privacy or security, for loss or reputation, for failure to meet any duty (including without limitation
						any duty of good faith or lack of negligence or of workmanlike effort), or for any other similar damages whatsoever
						that arise out of or are related to any aspect of the complete site or to any breach of these terms (including without
						limitation, the privacy notice), even if we or a third party has been advised of the possibility of such damages and
						even in the event of fault, tort (including negligence) or strict or products liability or misrepresentation.
					</p>
					<h4 class='j-xlarge'><b>9.  Linked Sites</b></h4>
					<p class="j-large" style="padding-left: 30px">
						Our Links to Other Sites: Our Site may contain links to Web sites of third parties. We provide these links as a
						convenience, but do not endorse the linked site or anything on it. While their information, products, services and
						information may be helpful to you, they are independent entities and we do not control or endorse them. You agree
						that any visits to linked sites are at your own risk and governed by their privacy notices, statements, or
						policies (if any).
						<br><br>
						Your Links to Our Site: You are not permitted to link or shortcut to our Site from your Web site, blog or similar
						application, without obtaining prior written permission from us.
					</p>
					<h4 class='j-xlarge'><b>10. Amendments</b></h4>
					<p class="j-large" style="padding-left: 30px">
						You agree that from time to time we may alter (including adding or eliminating all or parts of provisions) these Terms,
						including but not limited to the Privacy Notice ("Amendments"). Amended versions of these Terms will take effect on
						the date specified for the amended version ("Effective Date") and will apply to all information that was collected
						before or after the Effective Date, including information in databases. You have no continuing right to use the Site
						– it is like a store and each time you visit you will be subject to the version of the Terms in effect on your visit.
						Like terms on the door to a store, those terms will change from time to time and the changes will be effective when
						they appear in a replacement version of these Terms as posted by us on the Site. No other Amendments will be valid
						unless they are in a paper writing signed by us and by you.
						<br><br>
						Each time you return to the Site, you are responsible for checking the effective date of the then posted version of
						these Terms—if it is later than the date of the version last reviewed, the Terms have been changed and the new
						version should be reviewed before using the Site. Use of the site after the effective date will constitute your consent
						to the ammendments, so if you don not want to be bound by an amended version, do not use the site and cease all use of the
						content or services.
					</p>
					<h4 class='j-xlarge'><b>11. Legal and Other Notices or Disclosures.</b></h4>
					<p class="j-large" style="padding-left: 30px">
						Notice to You: You agree that we may give all notices we are required to give you by posting notice on the Site or,
						if we have your email address, by sending notice by email at our discretion, including (without limitation),
						disclosures that we are required to give you, legal notices, notice of subpoenas or other legal process (if any),
						and all other communications. When we communicate by email, we may use any email address you provide when
						communicating with us or that we otherwise have in our records, so only supply to us an email address at which you
						are willing to receive all communications, including “legal” or potentially sensitive communications such as
						information about a job or grant application. You agree to check for notices posted on the Site.
					</p>
					<h4 class='j-xlarge'><b>12. Termination or Cancellation; No Continuing Rights</b></h4>
					<p class="j-large" style="padding-left: 30px">
						You have no continuing right to use the Site and we may deny or suspend access, or terminate or cancel this agreement
						with or without cause and at any time and without prior notice. This is so even if you elect to store documents on this
						site such as your resume for use in a job application or a draft of a grant application, so make your own copies of
						anything to which you want to ensure access. We may give notice of termination or cancellation in the same way that we
						may provide other notices.
					</p>
					<h4 class='j-xlarge'><b>13. Entire Agreement; Miscellaneous</b></h4>
					<p class="j-large" style="padding-left: 30px">
						These Terms, including the Privacy Notice , Amendments and any:
						<br>
						(a) notices, terms and items incorporated into any of
						them;
						<br>
						(b) additional terms and conditions contained on the Site for particular activities or Content; and
						<br>
						(c) our
						disclosures and your consents provided on or in connection with the Site or any Content, service or other
						activity; constitute the entire agreement between you and the Foundation regarding the Complete Site or the
						subject matter of the foregoing (collectively, "Entire Agreement").
						<br><br>
						If any provision of the Entire Agreement is
						found by a court of competent jurisdiction to be invalid, its remaining provisions will remain in full force and
						effect, provided that the allocation of risks described herein is given effect to the fullest extent possible.
						The foregoing does not impair the enforceability of additional agreements you enter into such as an agreement
						for a grant.
					</p>
					<h4 class='j-xlarge'><b>14. Electronic Transactions</b></h4>
					<p class="j-large" style="padding-left: 30px">
						We and each of the Third Parties may deal with you electronically now and in the future in their respective discretion during the entire course
						of activities pursued with you (e.g., applying for, obtaining, implementing, terminating and enforcing a grant or
						anything else), including but not limited to having you electronically sign documents and receive electronic notices.
						We and each of the Third Parties also reserves the right to deal non-electronically and to require you to do so.
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