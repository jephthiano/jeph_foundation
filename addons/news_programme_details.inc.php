<div class='jcolor4 j-container j-display-conainer'>
  <?php
  $details_type === 'news' ? get_news($id,'details') : get_programme($id,'details');
  require_once(file_location('inc_path','share_modal.inc.php'));
  // share this story
  ?>
  <div>
    <div class='j-bolder j-text-color1'>Share this Story</div>
    <span class="j-button j-tiny j-card-4 j-color1 j-round"onclick="$('#sharemodal').show();">SHARE <i class="<?=icon('share-alt')?>"></i></span>
  </div>
</div>