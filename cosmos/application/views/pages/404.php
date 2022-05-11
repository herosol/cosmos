<!doctype html>
<html>
<head>
<title>404 Not Found – <?=$site_settings->site_name?></title>
<?php $this->load->view('includes/site-master'); ?>
</head>
<body id="home-page">
<?php //require_once('includes/header.php'); ?>
<main>


<section id="not404" class="flexBox" style="background-image: url('<?= base_url('assets/images/person-illustration.svg')?>'), url('<?= base_url('assets/images/dog_illustration.svg')?>'), url('<?= base_url('assets/images/bg_error-page.svg')?>')">
    <div class="flexDv">
        <div class="contain">
            <div class="inside flex">
                <div class="icon"><span class="price">404</span></div>
                <h1 class="secHeading">404 Page Not Found</h1>
                <p class="italic">Let's pretend.....!! You never saw this. <span><a href="<?= site_url()?>">Click here</a> to go back to Home page.</span></p>
            </div>
        </div>
    </div>
</section>
<!-- not404 -->


</main>
<?php //require_once('includes/footer.php');?>
</body>
</html>