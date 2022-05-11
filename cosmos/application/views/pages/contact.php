<!doctype html>
<html>
<head>
    <title><?= !empty($site_content['page_title'])?$site_content['page_title'].' - ':'Contact - '?><?= $site_settings->site_name?></title>
    <?php $this->load->view('includes/site-master'); ?>

    <!-- <script src='https://www.google.com/recaptcha/api.js'></script>
    <script type="text/javascript">var recaptcha=true;</script> -->
</head>
<body id="home-page">
    <?php get_header() ?>
<main>


<section id="contact" class="common">
    <div class="contain">
        <div class="flexRow flex">
            <div class="col col1">
                <div class="content">
                    <h1 class="secHeading"><?= $site_content['first_heading']?></h1>
                    <p class="pre"><?= $site_content['detail']?></p>
                    <h4><?= $site_content['second_heading']?></h4>
                    <ul class="infoLst">
                        <?php if($site_settings->site_phone!=''):?>
                            <li><i class="fi-phone"></i><a href="tel:<?= $site_settings->site_phone ?>"> <?= $site_settings->site_phone ?></a></li>
                        <?php endif?>
                        <?php if($site_settings->site_email!=''):?>
                            <li><i class="fi-envelope"></i><a href="mailto:<?= $site_settings->site_email ?>"><?= $site_settings->site_email ?></a></li>
                        <?php endif?>
                        <?php if($site_settings->site_domain!=''):?>
                            <li><i class="fi-earth"></i><a href="<?= site_url() ?>"><?= $site_settings->site_domain ?></a></li>
                        <?php endif?>
                        <?php if($site_settings->site_address!=''):?>
                            <li><i class="fi-map-marker"></i><span><?= $site_settings->site_address ?></span></li>
                        <?php endif?>
                    </ul>
                </div>
            </div>
            <div class="col col2">
                <form action="" method="post" autocomplete="off" class="frmAjax" id="frmContact">
                    <div class="head">
                        <h4 class="color"><?= $site_content['third_heading']?></h4>
                    </div>
                    <!-- <h3 class="bold">Drop us a Message</h3> -->
                    <div class="row formRow">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                            <input class="txtBox" id="name" name="name" type="text" placeholder="Full Name" autofocus>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                            <input class="txtBox" id="phone" name="phone" type="text" placeholder="Phone Number">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                            <input class="txtBox" id="subject" name="subject" type="text" placeholder="Subject">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                            <input class="txtBox" id="email" name="email" type="email" placeholder="Email Address" required="">
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                            <textarea class="txtBox" id="comment" name="msg" placeholder="Message"></textarea>
                        </div>
                    </div>
                    <!-- <div id="recaptcha" class="g-recaptcha" data-sitekey="<?=RECAPTCHA_SITE_KEY?>" data-size="invisible" data-callback="onSubmit"></div> -->
                    <div class="bTn"><button type="submit" class="webBtn colorBtn">Send Message <i class="fa fa-spinner fa-pulse fa-1x fa-fw hidden"></i></button></div>
                    <div class="alertMsg" style="display:none"></div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- contact -->


</main>
<?php $this->load->view('includes/footer'); ?>
</body>
</html>