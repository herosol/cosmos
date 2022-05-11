<!doctype html>
<html>
<head>
    <title><?= !empty($site_content['page_title'])?$site_content['page_title'].' - ':'Forgot Password - '?><?= $site_settings->site_name?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>
</head>
<body id="home-page">
    <?php $this->load->view('includes/header'); ?>
<main>


<section id="logOn">
    <div class="logBlk">
        <div class="inside">
            <form action="" method="post" autocomplete="off" class="frmAjax" id="frmForgot">
                <h2><?= $site_content['heading']?></h2>
                <p class="pre"><?= $site_content['short_desc']?></p>
                <div class="txtGrp">
                    <input type="text" id="email" name="email" class="txtBox" placeholder="Email Address" autofocus>
                </div>
                <div class="bTn text-center">
                    <!-- <button type="submit" class="webBtn colorBtn">Reset Password <i class="spinner hidden"></i></button> -->
                    <button type="button" class="webBtn colorBtn">Reset Password <i class="spinner hidden"></i></button>
                </div>
                <div class="alertMsg" style="display:none"></div>
            </form>
        </div>
    </div>
</section>
<!-- logOn -->


<!-- Main Js -->
    <script type="text/javascript" src="<?= base_url('assets/js/custom-validation.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/main.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/custom.js') ?>"></script>
</main>
<?php //require_once('includes/footer.php');?>
</body>
</html>