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
        <div class="blk">
            <div class="flexRow flex">
                <div class="col inBlk">
                    <h4>Getting Started</h4>
                    <ul class="listing">
                        <li><a href="?">How do I become a cosplayer on Cosmos?</a></li>
                        <li><a href="?">Becoming a Cosplayer: Frequently Asked Questions</a></li>
                        <li><a href="?">Getting Started as a Cosmos Now Cosplayer</a></li>
                    </ul>
                </div>
                <div class="col inBlk">
                    <h4>Booking and Jobs</h4>
                    <ul class="listing">
                        <li><a href="?">Make Changes to a Booking</a></li>
                        <li><a href="?">How do I book with an buyer?</a></li>
                        <li><a href="?">How do I contact a client?</a></li>
                    </ul>
                </div>
                <div class="col inBlk">
                    <h4>My Profile and Services</h4>
                    <ul class="listing">
                        <li><a href="?">What are the different types of Cosmos Now services?</a></li>
                        <li><a href="?">How to Manage Your Cosplay Status</a></li>
                        <li><a href="?">How do I set different cosplay roles per booking?</a></li>
                    </ul>
                </div>
                <div class="col inBlk">
                    <h4>Payments</h4>
                    <ul class="listing">
                        <li><a href="?">Viewing and Managing Payments</a></li>
                        <li><a href="?">How do I get paid through the app?</a></li>
                        <li><a href="?">How do I get paid for bookings?</a></li>
                    </ul>
                </div>
                <div class="col inBlk">
                    <h4>Trust and Safety</h4>
                    <ul class="listing">
                        <li><a href="?">How can I have a safe, stress-free events?</a></li>
                        <li><a href="?">What do buyer need to know about the Cosmos Guarantee?</a></li>
                        <li><a href="?">How does the cosplayer profile review process work?</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- <div class="blk">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#Pet-Sitters">Pet Sitters</a></li>
                <li><a data-toggle="tab" href="#Pet-Owners">Pet Owners</a></li>
            </ul>
            <div class="tab-content">
                <div id="Pet-Sitters" class="tab-pane fade active in">
                    <div class="flexRow flex">
                        <?php $lists = array();?>
                        <?php foreach ($sitter_categories as $sitter_cat): ?>
                            <div class="col inBlk">
                                <h4><?= $sitter_cat->title?></h4>
                                <?php 
                                $cat_help = get_cat_help($sitter_cat->id);
                                $lists[$sitter_cat->id] = $cat_help
                                ?>
                                <ul class="listing">
                                    <?php foreach ($cat_help as $key => $help): ?>
                                        <li><a href="<?= site_url('help-detail/'.$help->id)?>"><?= $help->title?></a></li> 
                                        <?php if($key==2): break; endif?>
                                    <?php endforeach ?>
                                </ul>
                                <button type="button" class="learnBtn" data-store="<?= $sitter_cat->id?>"  data-cat="<?= $sitter_cat->title?>" data-popup="articles">See all articles</button>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
                <div id="Pet-Owners" class="tab-pane fade">
                    <div class="flexRow flex">
                        <?php foreach ($owner_categories as $key => $owner_cat): ?>
                            <div class="col inBlk">
                                <h4><?= $owner_cat->title?></h4>
                                <?php 
                                $cat_help = get_cat_help($owner_cat->id);
                                $lists[$owner_cat->id] = $cat_help
                                ?>
                                <ul class="listing">
                                    <?php foreach ($cat_help as $key => $help): ?>
                                        <li><a href="<?= site_url('help-detail/'.$help->id)?>"><?= $help->title?></a></li> 
                                        <?php if($key==2): break; endif?>
                                    <?php endforeach ?>
                                </ul>
                                <button type="button" class="learnBtn" data-store="<?= $owner_cat->id?>"  data-cat="<?= $owner_cat->title?>" data-popup="articles">See all articles</button>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="popup" data-popup="articles">
            <div class="tableDv">
                <div class="tableCell">
                    <div class="contain">
                        <div class="_inner">
                            <div class="crosBtn"></div>
                            <h2>Account and Profile</h2>
                            <ul class="listing">
                                <li><a href="help-detail.php">★ How do I reset my password?</a></li>
                                <li><a href="help-detail.php">★ How do I update my phone number?</a></li>
                                <li><a href="help-detail.php">How do I view and manage requests from my PFSC account?</a></li>
                                <li><a href="help-detail.php">How do I deactivate my PFSC account?</a></li>
                                <li><a href="help-detail.php">What are my privacy rights as a US resident?</a></li>
                                <li><a href="help-detail.php">How do I exercise my rights under PIPEDA?</a></li>
                                <li><a href="help-detail.php">How do I sign in to my account?</a></li>
                                <li><a href="help-detail.php">How do I update my address?</a></li>
                                <li><a href="help-detail.php">How do I add, edit, or remove a dog profile?</a></li>
                                <li><a href="help-detail.php">What are favorites and how do I manage them?</a></li>
                                <li><a href="help-detail.php">What are PFSC phone numbers and how do I use them?</a></li>
                                <li><a href="help-detail.php">How do I create a cat profile?</a></li>
                                <li><a href="help-detail.php">How can I edit or remove photos from my profile?</a></li>
                                <li><a href="help-detail.php">How do I refer pet owners and earn credit?</a></li>
                                <li><a href="help-detail.php">How do I change my name in my account?</a></li>
                                <li><a href="help-detail.php">Can PFSC send me text message and SMS notifications?</a></li>
                                <li><a href="help-detail.php">How does account sharing work for pet owners?</a></li>
                                <li><a href="help-detail.php">How do I reactivate my PFSC account?</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
    <div class="blocks pitch">
        <div class="contain text-center">
            <div class="content">
                <h1 class="secHeading"><?= $site_content['last_heading']?></h1>
                <div class="bTn">
                    <a href="mailto:<?= $site_settings->site_email ?>" class="webBtn"><?= $site_content['last_btn1_text']?></a>
                    <a href="<?= site_url('contact-us')?>" class="webBtn colorBtn"><?= $site_content['last_btn2_text']?></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- help -->


<script type="text/javascript">
    $(function() {
        let lists = <?= json_encode($lists)?>;
        $(document).on('click', 'button[data-popup="articles"]', function(e) {
            let store = $(this).data('store');
            let cat = $(this).data('cat');
            let list_html= '';

            let detail_popup = $ ('.popup[data-popup="articles"]');
            
            $.each(lists[store],function(i, o){
                list_html += `<li><a href="`+base_url+`help-detail/`+o.id+`">`+o.title+`</a></li>`;
            });
            detail_popup.find('._inner h2').html(cat);
            detail_popup.find('._inner ul.listing').html(list_html);
            detail_popup.fadeIn();
        })
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
            var tab=$(this).data('tab');
            $('.nav.nav-tabs li a[href="#' + tab + '"]').trigger('click');
        });
    });
</script>
</main>
<?php $this->load->view('includes/footer');?>
</body>
</html>