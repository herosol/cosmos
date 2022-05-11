<!doctype html>
<html>
<head>
    <title><?= !empty($site_content['page_title'])?$site_content['page_title'].' - ':"PFSC's Booking Protection - "?><?= $site_settings->site_name?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>
<body id="home-page">
    <?php get_header(); ?>
<main>


<section id="terms" class="common">
    <div class="contain">
        <div class="blk ckEditor">
            <div class="_header">
                <h3><?= $site_content['heading']?></h3>
            </div>
            <?= $content_row->full_code?>
        </div>
    </div>
</section>
<!-- terms -->


</main>
<?php $this->load->view('includes/footer'); ?>
</body>
</html>