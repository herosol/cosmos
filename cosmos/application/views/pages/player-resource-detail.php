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
        <div class="flexRow flex">
            <div class="col">
                <div class="newsBlk resourceDetail ckEditor">
                    <div class="image"><img src="<?=  get_site_image_src("resources",$row->image); ?>" alt=""></div>
                    <div class="cntnt">
                        <div class="date"><?= format_date($row->date)?></div>
                        <h2><?= $row->title?></h2>
                        <?= $row->detail?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- resources -->


</main>
<?php $this->load->view('includes/footer');?>
</body>
</html>