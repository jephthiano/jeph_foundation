<div>
    <br><br>
    <?php //TOP NEWS ?>
    <div class="j-card j-color4" style='margin:0px 5px 30px 5px;'>
        <div class="j-container j-padding j-color3"><h4>Popular News</h4></div>
        <ul class="j-ul j-hoverable j-color4">
            <?php
            require_once(file_location('inc_path','connection.inc.php'));
            @$conn = dbconnect('admin','PDO');
            $status = 'active';
            $sql = "SELECT n_id from news_table WHERE n_status = :status ORDER BY RAND() LIMIT 5";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':status',$status,PDO::PARAM_STR);
            $stmt->bindColumn('n_id',$news_id);
            $stmt->execute();
            $numRow = $stmt->rowCount();
            if($numRow > 0){
                while($stmt->fetch()){get_news($news_id,'sidebar');}// end of while
            }else{ // if num_row is 0
                ?><div class='j-center'>No content to display</div><?php
            }
            ?>
        </ul>
    </div>
    <?php //TOP PROGRAMME ?>
    <div class="j-card j-color4" style='margin:0px 5px 30px 5px;'>
        <div class="j-container j-padding j-color3"><h4>Popular Programme</h4></div>
        <ul class="j-ul j-hoverable j-color4">
            <?php
            require_once(file_location('inc_path','connection.inc.php'));
            @$conn = dbconnect('admin','PDO');
            $status = 'active';
            $sql = "SELECT p_id from programme_table WHERE p_status = :status ORDER BY p_id DESC LIMIT 5";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':status',$status,PDO::PARAM_STR);
            $stmt->bindColumn('p_id',$programme_id);
            $stmt->execute();
            $numRow = $stmt->rowCount();
            if($numRow > 0){
                while($stmt->fetch()){get_programme($programme_id,'sidebar');}// end of while
            }else{ // if num_row is 0
                ?><div class='j-center'>No content to display</div><?php
            }
            ?>
        </ul>
    </div>
    <?php //FOLLOW US ?>
    <div class="j-card j-color4" style='margin:0px 5px 30px 5px;'>
        <div class="j-container j-padding j-color3"><h4>Follow Us</h4></div>
        <div class="j-container j-xlarge j-padding j-color5">
            <div class=""><?php get_all_social_handle('j-color4','j-text-color7')?></div>
        </div>
    </div>
    <?php //NEWSLETTER ?>
    <div class="j-card j-color4" style='margin:0px 5px 30px 5px;'>
        <div class="j-container j-padding j-color3"><h4>Subscribe To Our Newletter</h4></div>
        <div class="j-text-color3 j-panel">Join our mailing list to receive updates on the latest news and programmes.</div>
        <div class="j-container">
            <form class=''>
                <span class='mg j-text-color1'id='nme'></span>
                <input type='text'id='nm'name='nm'class="ip j-input j-color4 j-color4 j-round-large j-border-2 j-border-color5"placeholder='Name'style="width:100%;"/><br>
                <span class='mg j-text-color1'id='eme'></span>
                <input type='email'id='em'name='em'class="ip j-input j-color4 j-color4 j-round-large j-border-2 j-border-color5"placeholder='Email'style="width:100%;"/><br>
                <div style='padding-bottom: 20px;'class='j-itallic'>By clicking Subscribe, agree to receive notifications, updates, publications, alerts and newsletters from <?=ucwords(get_xml_data('company_name'))?>.</div>
                <button type='submit'id='sbtn'class="j-btn j-medium j-color1 j-round-large j-bolder">Subscribe</button>
            </form>
		</div><br>
    </div>
</div>
<?php $second_column = 'set';?>