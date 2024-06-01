<div id='slideshow'title='slideshow'class="">
	<div class='j-display-container'>
		<img class='s  j-slideshow-height'src='<?=file_location("media_url","slideshow/image1.png")?>'alt='<?=ucwords(get_xml_data('company_name'))?> Image1'style='width:100%;'/>
		<?php for($i = 2; $i <= 5; $i++){ ?>
		<img class='s j-slideshow-height'src='<?=file_location("media_url","slideshow/image{$i}.png")?>'alt='<?=ucwords(get_xml_data('company_name'))?> Image<?=$i?>'style='width:100%;display:none;'/>
		<?php } ?>
		<span class="j-display-left j-btn j-text-color4 j-xlarge j-bolder"id='prev'onclick="pD(-1)"style='background-color:rgba(0,0,0,0.5);'>&#10094;</span>
		<span class="j-display-right j-btn j-text-color4 j-xlarge j-bolder"id='next'onclick="pD(1)"style='background-color:rgba(0,0,0,0.5);'>&#10095</span>
	</div>
</div>