<!doctype html>
<html>
<head>
    <title><?= !empty($site_content['page_title'])?$site_content['page_title'].' - ':'Sitter Guidelines - '?><?= $site_settings->site_name?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>
<body id="home-page">
    <?php get_header(); ?>
<main>


<section id="dash">
    <div id="guide">
        <div class="blocks company">
            <div class="contain">
                <div class="flexRow flex">
                    <div class="col col1">
                        <div class="image"><img src="<?= get_site_image_src('images',$site_content['image1'])?>" alt=""></div>
                    </div>
                    <div class="col col2">
                        <div class="content">
                            <h1 class="secHeading"><?= $site_content['first_heading']?></h1>
                            <p class="pre"><?= $site_content['first_short_desc']?></p>
                            <div class="txt">
                                <p><?= $site_content['first_detail']?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="blocks strip text-center">
            <div class="contain">
                <h1 class="secHeading"><?= $site_content['second_heading']?></h1>
                <p><?= $site_content['second_detail']?></p>
            </div>
        </div>
        <div class="blocks tangle text-center">
            <div class="contain">
                <h1 class="secHeading"><?= $site_content['third_heading']?></h1>
                <ul class="lst flex">
                    <li>
                        <div class="inner">
                            <div class="cntnt">
                                <h3 class="color2"><?= $site_content['third_left_heading']?></h3>
                                <p><?= $site_content['third_left_detail']?></p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="inner">
                            <div class="cntnt">
                                <h3 class="color2"><?= $site_content['third_right_heading']?></h3>
                                <p><?= $site_content['third_right_detail']?></p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="blocks audience">
            <div class="contain">
                <div class="outer">
                    <div class="image"><img src="<?= get_site_image_src('images',$site_content['image2'])?>" alt=""></div>
                    <div class="content">
                        <div class="txt">
                            <h1 class="secHeading"><?= $site_content['fourth_heading']?></h1>
                            <p><?= $site_content['fourth_detail']?></p>
                            <h4 class="text-right color"><?= $site_content['fourth_name']?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="blocks listing">
            <div class="contain">
                <div class="flexRow flex">
                    <div class="col">
                        <div class="inBlk">
                            <?= $site_content['fifth_left']?>
                        </div>
                    </div>
                    <div class="col">
                        <div class="inBlk">
                            <?= $site_content['fifth_right']?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- dash -->


</main>
<?php $this->load->view('includes/footer');?>
</body>
</html>