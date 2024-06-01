<div id="nav"class="j-bar j-card-4 j-animate-left j-text-color4 j-fixed-top j-home-padding"style="margin:0px;font-size:12px;z-index:1;height:60px;background-color:rgba(0,0,0,0.5);">
		<?php //code for large screen ?>
			<a href="<?= file_location('home_url','');?>"class="j-bar-item"style='padding:0px;'>
				<img src="<?=file_location('media_url','home/logo.png')?>"class=''alt="<?=get_xml_data('company_name')?> LOGO IMAGE"style="width:150px;height:60px;">
			</a>
			<a  id="mo" href="javascript:void(0)" class="j-bar-item j-buton j-right j-xlarge j-hide-large j-hide-xlarge"style='padding:8px 8px;'onclick="ad()">&#9776;</a>
			<?php // search for small?>
			<span id='srht'class="j-bar-item j-padding-16 j-hide-large j-hide-xlarge j-hide-medium j-right"onclick="n('nav',$('#nav'),$('#sp'))">
				<i class="j-large <?=icon('search')?>"></i>
			</span>
			<?php // search for large?>
			<span class="j-bar-item j-hide-small"style='padding:13px 10px 7px 10px;'>
				<input type="search"name="txtsearch"id="txtsearch"class="searchinput j-input j-small j-border j-border-color5 j-round"
					onsearch="sb($('#txtsearch').val(),$('#sel').val());"placeholder="Search <?=ucwords(get_xml_data('company_name'))?>"style="display:inline;width:300px"/>
				<select name='sel'id='sel'class='j-round j-select'style='display:inline;max-width:50px;'>
					<option class='j-large'value='news'>News</option><option class='j-large'value='programme'>Programme</option>
				</select>
				<span class="j-large j-clickable j-padding j-round j-color4"id="search" style="padding: 0px 0px;position:relative;top:3px;left:0px;"
					onclick="sb($('#txtsearch').val(),$('#sel').val());">
					<i class="<?= icon('search');?>"></i>
				</span>
			</span>
			<div class="j-right j-text-color4 j-medium j-hide-small j-hide-medium">
				<a href="<?= file_location('home_url','misc/about_us/');?>" class="j-button j-padding-16 j-bar-item">
					About Us<i style='margin-left: 5px;'class="j-large <?=icon('caret-down')?>"></i>
				</a>
				<a href="<?= file_location('home_url','n/news/');?>" class="j-bar-item j-button j-padding-16">News</a>
				<a href="<?= file_location('home_url','p/programme/');?>" class="j-bar-item j-button j-padding-16">Programme</a>
				<a href="<?= file_location('home_url','payment/donate/');?>" class="j-bar-item">
					<div class='j-button j-color1 j-round-large'><b>Donate Now</b></div>
				</a>
			</div>
		<?// code for small screen ?>
		<div class=" j-hide-large j-hide-xlarge"style='background-color:rgba(0,0,0,0.5);'><br><br><br>
			<div id="a" class="j-bar-block j-sidebar j-collapse j-animate-top j-bolder j-text-color4 clickable"
				 style="max-height:250px;right:0;background-color:rgba(0,0,0,0.5);display:none">
				<a href="<?= file_location('home_url','misc/about_us/');?>"style="opacity:100%;"class="j-bar-item j-button j-padding-16">About Us</a>
				<a href="<?= file_location('home_url','n/news/');?>"style="opacity:100%;"class="j-bar-item j-button j-padding-16">News</a>		
				<a href="<?= file_location('home_url','p/programme/');?>"style="opacity:100%;"class="j-bar-item j-button j-padding-16">Programme</a>
				<a href="<?= file_location('home_url','payment/donate/');?>"style="opacity:100%;"class="j-bar-item j-button j-padding-16 j-color1 j-round-large">Donate To The Foundation</a>
			</div>
		</div>
</div>
<?php // search for small ?>
<div id='sp'class="j-card-4 j-fixed-top j-animate-top j-hide-medium j-hide-large j-hide-xlarge"
	style="margin:0px;font-size:12px;z-index:1;height:60px;width:100%;display:none;background-color:rgba(0,0,0,1);">
	<input type="text"name="txtsearch2"id="txtsearch2"class="searchinput j-input j-small j-round j-border-0 j-color3 j-text-color4"
		onsearch="sb($('#txtsearch2').val(),$('#sel2').val());"onkeyup="sc($('#txtsearch2'),$('#search2'));"placeholder="Search <?=ucwords(get_xml_data('company_name'))?>"style="width:70%;height:inherit;display:inline;"/>
		<select name='sel2'id='sel2'class='j-select j-color3'style='display:inline;max-width:50px;'>
			<option class='j-large'value='news'>News</option><option class='j-large'value='programme'>Programme</option>
		</select>
	<span id="search2"class="j-right"style="position:relative;top:5px;left:0px;width:10%;height:inherit;padding-top:5px;">
		<span class='j-xlarge j-text-color4' onclick="n('sea',$('#nav'),$('#sp'))">&times</span>
	</span>
</div>