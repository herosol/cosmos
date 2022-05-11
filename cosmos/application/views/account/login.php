<!doctype html>
<html>
<head>
    <title><?= !empty($site_content['page_title'])?$site_content['page_title'].' - ':'Login - '?><?= $site_settings->site_name?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>
<body id="home-page">
    <?php $this->load->view('includes/header'); ?>
<main>


<section id="logOn">
    <div class="logBlk">
        <div class="inside">
            <form action="" method="post" autocomplete="off" class="frmAjax" id="frmLogin">
                <h2><?= $site_content['heading']?></h2>
                <p class="pre"><?= $site_content['short_desc']?></p>
                <div class="socialBtn flex">
                    <a href="<?= site_url('google-login'); ?>" target="_blank" class="gmBtn"><img src="<?= base_url('assets/images/google-icon.svg')?>" alt="">Sign in with Google</a>
                    <a href="<?= site_url('facebook-login'); ?>" target="_blank" class="fbBtn"><img src="<?= base_url('assets/images/facebook-icon.svg')?>" alt="">Sign in with Facebook</a>
                </div>
                <div class="oRLine"><span>OR</span></div>
                <div class="txtGrp">
                    <input type="email" id="email" name="email" class="txtBox" placeholder="Email Address" autofocus>
                </div>
                <div class="txtGrp">
                    <input type="password" id="password" name="password" class="txtBox" placeholder="Password">
                </div>
                <div class="rememberMe">
                    <div class="lblBtn pull-left">
                        <input type="checkbox" name="remeberMe" id="rememberMe">
                        <label for="rememberMe">Remember me</label>
                    </div>
                    <a href="<?= site_url('forgot-password')?>" id="pass" class="pull-right color">Forgot Password ?</a>
                    <div class="clearfix"></div>
                </div>
                <div class="bTn text-center">
                    <button type="submit" class="webBtn colorBtn">Login to your account <i class="spinner hidden"></i></button>
                </div>
                <div class="alertMsg" style="display:none"></div>
            </form>
        </div>
    </div>
</section>
<!-- logOn -->


<!-- Main Js -->
<script type="text/javascript" src="<?= base_url('assets/js/custom-validation.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/custom.js') ?>"></script>
<?php //require_once('includes/footer.php');?>
</main>
</body>
</html>