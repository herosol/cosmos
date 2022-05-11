
<footer>
    <div class="contain">
        <div class="flexRow flex">
            <!-- <div class="col">
                <div class="footerLogo">
                    <a href="<?= site_url()?>"><img src="<?= SITE_IMAGES.'/images/'.$site_settings->site_logo.'?v-'.$site_settings->site_version?>" alt="<?= $site_settings->site_name?>"></a>
                </div>
                <h4>About PFSC</h4>
                <p class="pre"><?= $site_settings->site_about ?> <a href="<?= site_url('about-us')?>" class="semi">Learn More</a></p>
            </div> -->
            <!-- <div class="col">
                <h4>About Cosmos</h4>
                <ul class="lst">
                    <li><a href="<?= site_url('services')?>">Services</a></li>
                    <li><a href="<?= site_url('become-pet-sitter')?>">Become a Cosmos</a></li>
                    <li><a href="<?= site_url('safety')?>">Safety</a></li>
                    <li><a href="<?= site_url('guarantee')?>">Cosmos Guarantee</a></li>
                    <li><a href="<?= site_url('reservation-protection')?>">Reservation Protection</a></li>
                </ul>
            </div>
            <div class="col">
                <h4>Learn More!</h4>
                <ul class="lst">
                    <li><a href="<?= site_url('blog')?>">Our Blog</a></li>
                    <li><a href="<?= site_url('press')?>">Press</a></li>
                    <li><a href="<?= site_url('sitter-resources')?>">Cosmos Resources</a></li>
                    <li><a href="<?= site_url('advertise')?>">Advertise with us</a></li>
                </ul>
            </div>
            <div class="col">
                <h4>Need Help?</h4>
                <ul class="lst">
                    <li><a href="<?= site_url('help')?>">Help Center!</a></li>
                    <li><a href="<?= site_url('contact-us')?>">Contact us</a></li>
                </ul>
            </div> -->
            <div class="col">
                <h4>About Cosmos</h4>
                <ul class="lst">
                    <li><a href="<?= site_url('about-us')?>">About us</a></li>
                    <li><a href="<?= site_url('become-cosplayer')?>">Become a Cosplayer</a></li>
                    <li><a href="<?= site_url('press')?>">Press</a></li>
                    <li><a href="<?= site_url('blog')?>">Our Blog</a></li>
                </ul>
            </div>
            <div class="col">
                <h4>Customer Service</h4>
                <ul class="lst">
                    <li><a href="<?= site_url('cosplayer-resources')?>">Resources</a></li>
                    <li><a href="<?= site_url('guarantee')?>">Cosmos Guarantee</a></li>
                    <li><a href="<?= site_url('reservation-protection')?>">Reservation Protection</a></li>
                    <li><a href="<?= site_url('contact-us')?>">Contact us</a></li>
                </ul>
            </div>
            <div class="col">
                <h4>Contact Information</h4>
                <ul class="lst infoLst">
                    <?php if($site_settings->site_address!=''):?>
                        <li><i class="fi-map-marker"></i><span><?= $site_settings->site_address ?></span></li>
                    <?php endif?>
                    <?php if($site_settings->site_phone!=''):?>
                        <li><i class="fi-phone"></i><a href="tel:<?= $site_settings->site_phone ?>"> <?= $site_settings->site_phone ?></a></li>
                    <?php endif?>
                    <?php if($site_settings->site_email!=''):?>
                        <li><i class="fi-envelope"></i><a href="mailto:<?= $site_settings->site_email ?>"><?= $site_settings->site_email ?></a></li>
                    <?php endif?>
                </ul>
            </div>
            <div class="col">
                <!-- <h4><?= getPref('newsletter','pref_title')?></h4> -->
                <h4>Join our mailing list</h4>
                <form  action="<?= site_url('newsletter')?>" method="post" autocomplete="off" class="frmAjax">
                    <!-- <label for="email"><?= getPref('newsletter','pref_detail')?></label> -->
                    <div class="alertMsg" style="display:none"></div>
                    <div class="inside">
                        <input type="email" name="email" id="email" class="txtBox" placeholder="Enter your email address" required="">
                        <button type="submit" class="webBtn colorBtn">Subscribe! <i class="spinner hidden"></i></button>
                    </div>
                    <label for="email">Stay up to date with the latest news and deals!</label>
                </form>
                <h4>Follow us</h4>
                <ul class="social flex">
                    <?php if($site_settings->site_facebook!=''):?>
                        <li><a href="<?= $site_settings->site_facebook ?>" target="_blank" class="facebook"><i class="fi-facebook-square"></i></a></li>
                    <?php endif?>
                    <?php if($site_settings->site_twitter!=''):?>
                        <li><a href="<?= $site_settings->site_twitter ?>" target="_blank" class="twitter"><i class="fi-twitter-square"></i></a></li>
                    <?php endif?>
                    <?php if($site_settings->site_instagram!=''):?>
                        <li><a href="<?= $site_settings->site_instagram ?>" target="_blank" class="instagram"><i class="fi-instagram"></i></a></li>
                    <?php endif?>
                    <?php if($site_settings->site_youtube!=''):?>
                        <li><a href="<?= $site_settings->site_youtube ?>" target="_blank" class="youtube"><i class="fi-youtube"></i></a></li>
                    <?php endif?>
                </ul>
            </div>
        </div>
    </div>
    <div class="copyright relative">
        <div class="contain">
            <div class="inner">
                <p>Copyright © <?= date('Y')?> <a href="<?= site_url()?>"><?= $site_settings->site_name?>.</a></p>
                <ul class="list relative">
                    <li><a href="<?= site_url('cookie-policy')?>">Cookie Policy</a></li>
                    <li><a href="<?= site_url('privacy-policy')?>">Privacy Policy</a></li>
                    <li><a href="<?= site_url('terms-conditions')?>">Terms & Conditions</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- footer -->

<!-- Main Js -->
<script type="text/javascript" src="<?= base_url('assets/js/main.js?v-'.$site_settings->site_version)?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/custom-validation.js?v-'.$site_settings->site_version) ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/custom.js?v-'.$site_settings->site_version) ?>"></script>