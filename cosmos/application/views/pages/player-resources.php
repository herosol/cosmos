<!doctype html>
<html>
<head>
    <title><?= !empty($site_content['page_title'])?$site_content['page_title'].' - ':'Sitter Resources - '?><?= $site_settings->site_name?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>
<body id="home-page">
    <?php get_header() ?>
<main>


<section id="resources" class="common">
    <div class="contain">
        <div class="content text-center">
            <h1 class="secHeading"><?= $site_content['heading']?></h1>
            <p class="pre"><?= $site_content['short_desc']?></p>
        </div>
        <ul class="listing flex">
            <?php foreach ($rows as $key => $row): ?>
                <li>
                    <div class="inner">
                        <div class="icon"><img src="<?=  get_site_image_src("categories",$row->image); ?>" alt=""></div>
                        <div class="cntnt">
                            <h3><a href="?"><?= $row->title?></a></h3>
                            <p><?= short_text($row->detail)?></p>
                            <a href="<?= site_url('player-resource-list/'.$row->id)?>" class="learnBtn">View all articles <i class="fi-arrow-right"></i></a>
                        </div>
                    </div>
                </li>
            <?php endforeach?>
        </ul>
    </div>
</section>
<!-- resources -->


</main>
<?php $this->load->view('includes/footer');?>
</body>
</html>