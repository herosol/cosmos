<!doctype html>
<html>
<head>
    <title><?= !empty($site_content['page_title'])?$site_content['page_title'].' - ':'Press Detail - '?><?= $site_settings->site_name?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>
<body id="home-page">
    <?php get_header(); ?>
<main>


<section id="press" class="common">
    <div class="contain">
        <h1 class="secHeading">Press Detail</h1>
        <div class="flexRow flex">
            <div class="col col1">
                <div class="newsBlk pressDetail ckEditor">
                    <div class="image"><img src="<?= get_site_image_src("press",$row->image); ?>" alt=""></div>
                    <div class="cntnt">
                        <div class="date"><?= format_date($row->date)?></div>
                        <h2><?= $row->title?></h2>
                        <?= $row->detail?>
                    </div>
                </div>
            </div>
            <div class="col col2">
                <ul class="articleLst flex">
                    <?php foreach ($recent_press as $key => $recent_press): ?>
                        <li>
                            <div class="articleBlk">
                                <div class="cntnt">
                                    <div class="date"><?= format_date($recent_press->date)?></div>
                                    <h4><a href="<?= site_url('press-detail/'.$recent_press->id)?>"><?= $recent_press->title?></a></h4>
                                </div>
                            </div>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- press -->


</main>
<?php $this->load->view('includes/footer');?>
</body>
</html>