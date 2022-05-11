<!doctype html>
<html>
<head>
    <title><?= !empty($site_content['page_title'])?$site_content['page_title'].' - ':'Blog Detail - '?><?= $site_settings->site_name?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>
<body id="home-page">
    <?php get_header(); ?>
<main>


<section id="blog" class="common">
    <div class="contain">
        <h1 class="secHeading">Blog Detail</h1>
        <div class="flexRow flex">
            <div class="col col1">
                <div class="newsBlk blogDetail ckEditor">
                    <div class="image"><img src="<?=  get_site_image_src("blog",$row->image); ?>" alt=""></div>
                    <div class="cntnt">
                        <div class="date"><?= format_date($row->date)?></div>
                        <h2><?= $row->title?></h2>
                        <?= $row->detail?>
                    </div>
                </div>
            </div>
            <?php $this->load->view('includes/blog-right');?>
        </div>
    </div>
</section>
<!-- blog -->


</main>
<?php $this->load->view('includes/footer');?>
</body>
</html>