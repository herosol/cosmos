<!doctype html>
<html>
<head>
    <title><?= !empty($site_content['page_title'])?$site_content['page_title'].' - ':'Need Help? - '?><?= $site_settings->site_name?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>
<body id="home-page">
    <?php get_header() ?>
<main>


<section id="help" class="common">
    <div class="contain">
        <div class="head">
            <div class="content">
                <h1 class="secHeading"><?= $site_content['heading']?></h1>
                <p class="pre"><?= $site_content['short_desc']?></p>
            </div>
            <div class="srchBlk">
                <div id="typing" class="hidden"></div>
                <div class="srch relative">
                    <input type="text" name="" id="search" class="txtBox" placeholder="Search any keyword here" autocomplete="off">
                    <i class="fi-search"></i>
                </div>
            </div>
        </div>
        <div class="blk ckEditor inBlk">
            <h2><?= $row->title?></h2>
            <?= $row->detail?>
        </div>
    </div>
</section>
<!-- help -->


<script type="text/javascript">
    $(function() {
        $(document).on('input', '#search', function () {
            var keyword = $(this).val().toLowerCase();
            var count = 0;
            if(keyword.length==0){
                $('#typing').addClass('hidden');
                $('div.active.in .inBlk').removeClass('hidden');
                return false;
            }
            $('div.active.in .inBlk').each(function () {
                var str = $(this).text().toLowerCase();
                var i = -1, x = 0;
                while(x!= -1){
                    x = str.indexOf(keyword, i+1)
                    i = x;
                    if(x!= -1){
                        count++;
                    }
                }
                if (str.indexOf(keyword) >= 0) {
                    $(this).removeClass('hidden');
                } else {
                    $(this).addClass('hidden');
                }
            });
            $('#typing').text('"'+keyword+'" keyword found in '+count+' search results').removeClass('hidden');
        });
        $(document).on('click', '.nav-tabs li', function(){
            $('div.active.in .inBlk').removeClass('hidden');
        });

        var hash = window.location.hash;
        hash && $('.nav.nav-tabs li a[href="' + hash + '"]').tab('show');
        $(document).on('click', '.nav.nav-tabs li a', function() {
            $(this).tab('show');
            var scrollmem = $('body').scrollTop();
            window.location.hash = this.hash;
            $('html,body').scrollTop(scrollmem);
        });

        $(document).on('click', '.hlpLst li a', function() {
            var tab=$(this).data('tab')
            $('.nav.nav-tabs li a[href="#' + tab + '"]').trigger('click');
        });
    });
</script>
</main>
<?php $this->load->view('includes/footer');?>
</body>
</html>