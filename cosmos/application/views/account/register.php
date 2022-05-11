<!doctype html>
<html>
<head>
    <title><?= !empty($site_content['page_title'])?$site_content['page_title'].' - ':'Sign up - '?><?= $site_settings->site_name?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>
<body id="home-page">
    <?php $this->load->view('includes/header'); ?>
<main>


<section id="logOn">
    <div class="logBlk">
        <div class="inside">
            <form action="" method="post" autocomplete="off" class="frmAjax" id="frmSignup">
                <h2><?= $site_content['heading']?></h2>
                <p class="pre"><?= $site_content['short_desc']?></p>
                <div class="socialBtn flex">
                    <a href="<?= site_url('google-login'); ?>" target="_blank" class="gmBtn"><img src="<?= base_url('assets/images/google-icon.svg')?>" alt="">Sign up with Google</a>
                    <a href="<?= site_url('facebook-login'); ?>" target="_blank" class="fbBtn"><img src="<?= base_url('assets/images/facebook-icon.svg')?>" alt="">Sign up with Facebook</a>
                </div>
                <div class="oRLine"><span>OR</span></div>
                <div class="txtGrp">
                    <input type="text" id="fname" name="fname" class="txtBox" placeholder="First Name" autofocus>
                </div>
                <div class="txtGrp">
                    <input type="text" name="lname" id="lname" class="txtBox" placeholder="Last Name">
                </div>
                <div class="txtGrp">
                    <input type="email" id="email" name="email" class="txtBox" placeholder="Email Address">
                </div>
                <!--
                    <div class="txtGrp">
                        <input type="text" id="phone" name="phone" class="txtBox">
                        <div class="invald hide" id="phnMsg"></div>
                    </div>
                -->
                <div class="txtGrp">
                    <input type="text" id="zip" name="zip" class="txtBox" placeholder="Zip Code">
                </div>
                <div class="txtGrp">
                    <select name="country" id="country" class="txtBox selectpicker" data-live-search="true">
                        <option value="" selected="" disabled="">Country</option>
                        <?= get_countries_options('id')?>
                    </select>
                </div>
                <div class="txtGrp">
                    <select name="hear_about" id="hear_about" class="txtBox">
                        <option value="" disabled="" selected="">How did you hear from us?</option>
                        <option value="From a friend, or colleague">From a friend, or colleague</option>
                        <option value="Search Engine (Google, Bing)">Search Engine (Google, Bing)</option>
                        <option value="Online Ad">Online Ad</option>
                        <option value="TV, Radio commercial">TV, Radio commercial</option>
                        <option value="Social Media">Social Media</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="txtGrp hidden othrRsn">
                    <input type="text" name="other_reason" id="other_reason" class="txtBox" placeholder="Specify other reason" required="" disabled="">
                </div>
                <div class="txtGrp">
                    <input type="password" id="password" name="password" class="txtBox pwstrnt" placeholder="Create a password">
                </div>
                <div class="txtGrp">
                    <input type="password" id="cpassword" name="cpassword" class="txtBox" placeholder="Confirm Password">
                </div>
                <div class="rememberMe">
                    <div class="lblBtn">
                        <input type="checkbox" name="confirm" id="confirm">
                        <label for="confirm">By signing up, I agree to Cosplay Cosmos’s <a href="<?= site_url('terms-conditions')?>">Terms of Service,</a>
                            and
                            <a href="<?= site_url('privacy-policy')?>">Privacy Policy</a>, confirm that I am 18 years of age or older, and consent to receiving email communication.
                        </label>
                    </div>
                </div>
                <div class="bTn text-center">
                    <button type="submit" class="webBtn colorBtn">Create your account <i class="spinner hidden"></i></button>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- logOn -->


<!-- Main Js -->
<script type="text/javascript" src="<?= base_url('assets/js/custom-validation.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/main.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/custom.js') ?>"></script>
<script type="text/javascript">
    $(function() {
        $(document).on('change', '#hear_about', function(e) {
            let vl = $(this).val();
            if (vl == 'Other')
                $('.othrRsn').removeClass('hidden').find('input').prop('disabled', false).focus();
            else
                $('.othrRsn').addClass('hidden').find('input').prop('disabled', true);

        })
    })
</script>
</main>
<?php //require_once('includes/footer.php');?>
</body>
</html>