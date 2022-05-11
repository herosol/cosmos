<div class="col col2">
    <div class="ctgryBlk">
        <h4>Categories</h4>
        <ul class="ctgryLst">
            <li>
                <a href="<?= site_url('blog')?>">All</a>
            </li>
            <?php foreach ($categories as $key => $cat): ?>
                <li>
                    <a href="<?= site_url('blog/'.$cat->id)?>"><?= $cat->title?></a>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
    <ul class="articleLst flex">
        <?php foreach ($recent_blogs as $key => $recent_blog): ?>
            <li>
                <div class="articleBlk">
                    <div class="icon"><a href="<?= site_url('blog-detail/'.$recent_blog->id)?>"><img src="<?=  get_site_image_src("blog",$recent_blog->image,'thumb_'); ?>" alt=""></a></div>
                    <div class="cntnt">
                        <div class="date"><?= format_date($recent_blog->date)?></div>
                        <h4><a href="<?= site_url('blog-detail/'.$recent_blog->id)?>"><?= $recent_blog->title?></a></h4>
                    </div>
                </div>
            </li>
        <?php endforeach ?>
    </ul>
</div>