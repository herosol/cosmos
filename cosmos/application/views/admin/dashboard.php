
<div class="row">
    <?php if(access(1)):?>
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a href="<?= site_url(ADMIN.'/buyers') ?>">
            <div class="tile-stats tile-white">
                <div class="icon"><i class="entypo-user"></i></div>
                <div class="num" data-start="0" data-end="<?=$total_buyers?>" data-postfix="" data-duration="1500" data-delay="0"><?=$total_buyers?></div>
                <h3>Total Buyers </h3>
                <p>Total Buyers in our website </p>
            </div>
        </a>
    </div>
    <?php endif?>
    <?php if(access(2)):?>
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a href="<?= site_url(ADMIN.'/players') ?>">
            <div class="tile-stats tile-green">
                <div class="icon"><i class="entypo-user"></i></div>
                <div class="num" data-start="0" data-end="<?=$total_players?>" data-postfix="" data-duration="1500" data-delay="0"><?=$total_players?></div>
                <h3>Total Players </h3>
                <p>Total Players in our website </p>
            </div>
        </a>
    </div>
    <?php endif?>
    <?php if(is_admin()):?>
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a href="<?= site_url(ADMIN.'/settings') ?>">
            <div class="tile-stats tile-black">
                <div class="icon"><i class="fa fa-cogs"></i></div>
                <div class="num" data-start="0" data-end="0" data-postfix="" data-duration="1500" data-delay="1800"> Settings</div>

                <h3>Change Settings</h3>
                <p>on our site right now.</p>
            </div>
        </a>		
    </div>
    <?php endif?>
</div>
