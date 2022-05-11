<header class="ease">
    <div class="contain">
        <div class="logo ease">
            <a href="<?= site_url()?>"><img src="<?= SITE_IMAGES.'/images/'.$site_settings->site_logo.'?v-'.$site_settings->site_version?>" alt="<?= $site_settings->site_name?>"></a>
        </div>
        <div class="toggle"><span></span></div>
        <nav class="ease">
            <ul id="nav">
                <li class="<?php if($page=="index"){echo 'active';} ?>">
                    <a href="<?= site_url('index') ?>">Home</a>
                </li>
                <li class="<?php if($page=="search"){echo 'active';} ?>">
                    <a href="<?= site_url('search') ?>">Search Cosplayer</a>
                </li>
                <li class="<?php if(in_array($page, array("become-cosplayer", "cosplayer-signup"))){echo 'active';} ?>">
                    <a href="<?= site_url('become-cosplayer')?>">Become Cosplayer</a>
                </li>
            </ul>
            <ul id="logged">
                <li class="<?php if($page=="merchandise"){echo 'active';} ?>">
                    <a href="<?= site_url('merchandise') ?>">Marketplace</a>
                </li>
                <li class="<?php if($page=="blog"){echo 'active';} ?>">
                    <a href="<?= site_url('blog') ?>">Blog</a>
                </li>
                <li class="<?php if($page=="login"){echo 'active';} ?>">
                    <a href="<?= site_url('login') ?>">Log in</a>
                </li>
                <li class="<?php if($page=="signup"){echo 'active';} ?>">
                    <a href="<?= site_url('signup')?>">Sign up</a>
                </li>
            </ul>
        </nav>
    </div>
</header>
<!-- header -->


<div class="upperlay"></div>
<!-- <div id="pageloader">
    <span class="loader"></span>
</div> -->


<!-- <script type="text/javascript">
    $(function(){
        // header fix
        let offSet = $('body').offset().top;
        offSet = offSet + 5;
        $(window).scroll(function() {
            scrollPos = $(window).scrollTop();
            if (scrollPos >= offSet) {
                $('header').addClass('fix');
            } else {
                $('header').removeClass('fix');
            }
        });
    });
</script> -->
