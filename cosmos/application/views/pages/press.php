<!doctype html>
<html>
<head>
    <title><?= !empty($site_content['page_title'])?$site_content['page_title'].' - ':'Press Room - '?><?= $site_settings->site_name?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>
<body id="home-page">
    <?php get_header(); ?>
<main>


<section id="press" class="common">
    <div class="contain">
        <h1 class="secHeading"><?= $site_content['heading']?></h1>
        <ul class="lst flex">
            <?php foreach ($rows as $key => $press): ?>
                <li>
                    <div class="newsBlk">
                        <div class="image"><a href="<?= site_url('press-detail/'.$press->id)?>" style="display: block;"><img src="<?=  get_site_image_src("press",$press->image,'thumb_'); ?>" alt=""></a></div>
                        <div class="cntnt">
                            <div class="date"><?= format_date($press->date)?></div>
                            <h2><a href="<?= site_url('press-detail/'.$press->id)?>"><?= $press->title?></a></h2>
                            <p><?= short_text($press->detail)?></p>
                            <a href="<?= site_url('press-detail/'.$press->id)?>" class="learnBtn">Learn more <i class="fi-arrow-right"></i></a>
                        </div>
                    </div>
                </li>
            <?php endforeach?>
        </ul>
        <ul class="pagination">
            <?= $links?>
        </ul>
    </div>
</section>
<!-- blog -->


</main>
<?php $this->load->view('includes/footer');?>
</body>
</html>