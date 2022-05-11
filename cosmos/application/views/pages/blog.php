<!doctype html>
<html>
<head>
    <title><?= !empty($site_content['page_title'])?$site_content['page_title'].' - ':'Blog Articles - '?><?= $site_settings->site_name?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>
<body id="home-page">
    <?php get_header(); ?>
<main>


<section id="blog" class="common">
    <div class="contain">
        <h1 class="secHeading"><?= $site_content['heading']?></h1>
        <div class="flexRow flex">
            <div class="col col1">
                <?php if (count($rows) < 1): ?>
                    <p>No blog post</p>

                <?php endif ?>
                <ul class="lst flex">
                    <?php foreach ($rows as $key => $blog): ?>
                        <li>
                            <div class="newsBlk">
                                <div class="image"><a href="<?= site_url('blog-detail/'.$blog->id)?>" style="display: block;"><img src="<?=  get_site_image_src("blog", $blog->image, '300p_'); ?>" alt=""></a></div>
                                <div class="cntnt">
                                    <div class="date"><?= format_date($blog->date)?></div>
                                    <h2><a href="<?= site_url('blog-detail/'.$blog->id)?>"><?= $blog->title?></a></h2>
                                    <p><?= short_text($blog->detail)?></p>
                                    <a href="<?= site_url('blog-detail/'.$blog->id)?>" class="learnBtn">Learn more <i class="fi-arrow-right"></i></a>
                                </div>
                            </div>
                        </li>
                    <?php endforeach?>
                </ul>
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