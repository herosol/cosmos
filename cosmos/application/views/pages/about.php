<!doctype html>
<html>
<head>
    <title><?= !empty($site_content['page_title'])?$site_content['page_title'].' - ':'About us - '?><?= $site_settings->site_name?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>
<body id="home-page">
    <?php get_header() ?>
<main>


<section id="about" class="common">
    <div class="block company">
        <div class="contain">
            <div class="flexRow flex">
                <div class="col col1">
                    <div class="image"><img src="<?= get_site_image_src('images', $site_content['image'])?>" alt=""></div>
                </div>
                <div class="col col2">
                    <div class="content">
                        <h1 class="secHeading"><?= $site_content['first_heading']?></h1>
                        <?= $site_content['first_detail']?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="block weAre">
        <div class="contain text-center">
            <div class="content">
                <h1 class="secHeading"><?= $site_content['second_heading']?></h1>
                <p class="pre"><?= $site_content['second_short_desc']?></p>
            </div>
            <ul class="lst flex ckEditor">
                <?php for($i=1;$i<=6;$i++):?>
                    <li>
                        <div class="inner">
                            <div class="icon"><img src="<?= get_site_image_src('images',$site_content['second_image'.$i])?>" alt=""></div>
                            <?= $site_content['second_text'.$i]?>
                        </div>
                    </li>
                <?php endfor?>
            </ul>
        </div>
    </div>
    <div id="listing">
        <div class="contain">
            <div class="flexRow flex">
                <div class="col">
                    <div class="inBlk">
                        <?= $site_content['third_left']?>
                    </div>
                </div>
                <div class="col">
                    <div class="inBlk">
                        <?= $site_content['third_right']?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="block founder">
        <div class="contain">
            <h1 class="secHeading text-center"><?= $site_content['fourth_heading']?></h1>
            <ul class="founderLst flex">
                <?php foreach ($founders as $founder) :?>
                    <li>
                        <div class="inner">
                            <div class="ico"><img src="<?=  get_site_image_src("founders/",$founder->image,'thumb_'); ?>" alt=""></div>
                            <div class="cntnt">
                                <h3><?= $founder->name?> <span><?= $founder->designation?></span></h3>
                                <p><?= $founder->overview?></p>
                            </div>
                        </div>
                    </li>
                <?php endforeach?>
            </ul>
        </div>
    </div>
    <!-- <div class="block contactUs">
        <div class="contain">
            <div class="content text-center">
                <h1 class="secHeading">Contact us</h1>
                <p>If you have any questions or consultation, please reach us at <a href="mailto:surfsclub@gmail.com">surfsclub@gmail.com</a>. We will provide the best requested information as soon as possible.</p>
            </div>
        </div>
    </div> -->
</section>
<!-- about -->


</main>
<?php $this->load->view('includes/footer');?>
</body>
</html>