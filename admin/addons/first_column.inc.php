<div class="j-third-overflow j-card-4 j-fixed-first-column j-color4 j-padding"id="firstcol"style='line-height:27px;'>
    <br>
    <div class='j-xlarge'><b>Dashboard</b></div>
    <div class=""style='line-height:40px;'>
        <?php if($adid === 1){ ?>
            <a href="<?= file_location('admin_url','settings/');?>"class="">
            <div class='j-text-color1 j-row'><b><span class="j-large j-col s3"><i class="<?=icon('cog')?>"></i> </span> <span class='j-col s9'>Site Settings</span></b></div>
            </a>
            <a href="<?= file_location('admin_url','site_data/');?>"class="">
            <div class='j-text-color1 j-row'><b><span class="j-large j-col s3"><i class="<?=icon('address-card')?>"></i> </span> <span class='j-col s9'>Site Data</span></b></div>
            </a>
            <a href="<?= file_location('admin_url','admin/');?>"class="">
            <div class='j-text-color1 j-row'><b><span class="j-large j-col s3"><i class='<?=icon('users')?>'></i> </span> <span class='j-col s9'>Admin</span></b></div>
            </a>
        <?php } ?>
            <a href="<?= file_location('admin_url','news/');?>"class="">
            <div class='j-text-color1 j-row'><b><span class="j-large j-col s3"><i class='<?=icon('newspaper')?>'></i> </span> <span class='j-col s9'>News</span></b></div>
            </a>
            <a href="<?= file_location('admin_url','programme/');?>"class="">
            <div class='j-text-color1 j-row'><b><span class="j-large j-col s3"><i class='<?=icon('calendar-alt')?>'></i> </span> <span class='j-col s9'>Programmes</span></b></div>
            </a>
            <a href="<?= file_location('admin_url','partner/');?>"class="">
            <div class='j-text-color1 j-row'><b><span class="j-large j-col s3"><i class='<?=icon('handshake')?>'></i> </span> <span class='j-col s9'>Partners</span></b></div>
            </a>
            <a href="<?= file_location('admin_url','social_handle/');?>"class="">
            <div class='j-text-color1 j-row'><b><span class="j-large j-col s3"><i class='<?=icon('scribd','fab')?>'></i> </span> <span class='j-col s9'>Soc-Handles</span></b></div>
            </a>
            <a href="<?= file_location('admin_url','message/');?>"class="">
            <div class='j-text-color1 j-row'><b><span class="j-large j-col s3"><i class='<?=icon('envelope')?>'></i> </span> <span class='j-col s9'>Messages</span></b></div>
            </a>
            <a href="<?= file_location('admin_url','subscriber/');?>"class="">
            <div class='j-text-color1 j-row'><b><span class="j-large j-col s3"><i class='<?=icon('male')?>'></i> </span> <span class='j-col s9'>Subscribers</span></b></div>
            </a>
            <a href="<?= file_location('admin_url','transaction/');?>"class="">
            <div class='j-text-color1 j-row'><b><span class="j-large j-col s3"><i class='<?=icon('credit-card')?>'></i> </span> <span class='j-col s9'>Transactions</span></b></div>
            </a>
    </div>
</div>