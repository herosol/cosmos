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
            <?php if (count($rows)<1): ?>
                <div class="col">
                    <div class="newsBlk">
                        <div class="cntnt">
                            <p class="text-center">No sitter resource</p>
                        </div>
                    </div>
                </div>
            <?php endif ?>
            <?php foreach ($rows as $key => $row): ?>
                <div class="col">
                    <div class="newsBlk">
                        <div class="image"><a href="<?= site_url('sitter-resource-detail/'.$row->id)?>" style="display: block;"><img src="<?=  get_site_image_src("resources",$row->image,'thumb_'); ?>" alt=""></a></div>
                        <div class="cntnt">
                            <div class="date"><?= format_date($row->date)?></div>
                            <h2><a href="<?= site_url('sitter-resource-detail/'.$row->id)?>"><?= $row->title?></a></h2>
                            <p><?= short_text($row->detail)?></p>
                            <a href="<?= site_url('sitter-resource-detail/'.$row->id)?>" class="learnBtn">Learn more <i class="fi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            <?php endforeach?>
        </div>
        <ul class="pagination">
            <?= $links?>
        </ul>
    </div>
</section>
<!-- resources -->


</main>
<?php $this->load->view('includes/footer');?>
</body>
</html>