<div class='j-home-padding j-color4'style='padding-top:40px;padding-bottom:40px;'>
	<div class='j-bolder j-xlarge j-padding'>LATEST NEWS</div>
	<div class='j-row'>
		<?php
		require_once(file_location('inc_path','connection.inc.php'));
		@$conn = dbconnect('admin','PDO');
		$sql = "SELECT n_id from news_table WHERE n_status = 'active' ORDER BY n_id DESC LIMIT 3 ";
		$stmt = $conn->prepare($sql);
		$stmt->bindColumn('n_id',$news_id);
		$stmt->execute();
		$numRow = $stmt->rowCount();
		if($numRow > 0){
			while($stmt->fetch()){get_news($news_id);}// end of while
			?><a href="<?=file_location('home_url','n/news/')?>"class='j-btn j-color1 j-round j-bolder'style='margin-top:30px;margin-left:16px;'>See More News >></a><?php
		}else{ // if num_row is 0
			?><div class='j-large j-bolder j-padding'>No News at the moment, check again later</div><?php
		}
		?>
	</div>	
</div>