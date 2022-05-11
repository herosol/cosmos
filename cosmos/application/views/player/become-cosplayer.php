<!doctype html>
<html>
<head>
    <title><?= !empty($site_content['page_title'])?$site_content['page_title'].' - ':'Become Pet Sitter - '?><?= $site_settings->site_name?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>
<body id="home-page">
<?php get_header(); ?>
<main>


<section id="become">
    <div id="tblock">
        <div class="contain">
            <div class="flexRow flex">
                <div class="col col1">
                    <div class="content">
                        <h1 class="secHeading"><?= $site_content['heading']?></h1>
                        <p><p class="pre"><?= $site_content['short_desc']?></p>
                        <div class="bTn"><a href="<?= site_url('cosplayer-signup')?>" class="webBtn colorBtn"><?= $site_content['button_text']?> <i class="fi-arrow-right"></i></a></div>
                    </div>
                </div>
                <div class="col col2">
                    <div class="image"><img src="<?= SITE_IMAGES.'images/'.$site_content['image1']?>" alt=""></div>
                </div>
            </div>
        </div>
    </div>
    <div id="how">
        <div class="contain text-center">
            <div class="inside relative" style="background-image: url('<?= base_url('assets/images/wallhaven-k9g61q.jpg')?>')">
                <div class="content">
                    <h1 class="secHeading"><?= $site_content['how_heading']?></h1>
                    <p class="pre"><?= $site_content['how_short_desc']?></p>
                </div>
                <ul class="lst flex">
                    <?php for($i=1;$i<=3;$i++):?>
                        <li>
                            <div class="inner">
                                <div class="icon"><img src="<?= SITE_IMAGES.'images/'.$site_content['how_image'.$i]?>" alt=""></div>
                                <div class="cntnt">
                                    <h3><?= $site_content['how_heading'.$i]?></h3>
                                    <p><?= $site_content['how_text'.$i]?></p>
                                </div>
                            </div>
                        </li>
                    <?php endfor?>
                </ul>
            </div>
        </div>
    </div>
    <!-- <?php if (count($testimonials)>0): ?>
        <div id="folio">
            <div class="contain text-center">
                <div class="outer">
                    <div class="inside relative">
                        <div id="owl-folio" class="owl-carousel owl-theme">
                            <?php foreach ($testimonials as $key => $testimonial): ?>
                                <div class="inner">
                                    <div class="ico"><img src="<?= get_site_image_src('testimonials',$testimonial->image,'thumb_',true)?>" alt=""></div>
                                    <div class="txt">
                                        <p><?= $testimonial->text?></p>
                                        <h4><?= $testimonial->name?></h4>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <div class="image"><img src="<?= SITE_IMAGES.'images/'.$site_content['image2']?>" alt=""></div>
                </div>
            </div>
        </div>
    <?php endif ?> -->
    <div id="listing">
        <div class="contain">
            <div class="flexRow flex">
                <div class="col">
                    <div class="inBlk">
                        <!-- <?= $site_content['left_txt']?> -->
                        <h3>Cosmos services</h3>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusantium mollitia totam cum ut? Voluptatibus fugit illo laboriosam quaerat ipsam sapiente quis explicabo assumenda, maxime, quos sunt aliquam est corrupti nesciunt!</p>
                    </div>
                </div>
                <div class="col">
                    <div class="inBlk">
                        <!-- <?= $site_content['right_txt']?> -->
                        <h3>Safety first. Always.</h3>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusantium mollitia totam cum ut? Voluptatibus fugit illo laboriosam quaerat ipsam sapiente quis explicabo assumenda, maxime, quos sunt aliquam est corrupti nesciunt!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="ouTer">
        <div class="content">
            <div class="txt">
                <h1 class="secHeading">Get paid to <em>play with dogs</em></h1>
                <p class="pre">Thanks for your interest in PFSC! To give you the best experience possible, we'd love to know what brought you here. PFSC makes it easy and promotes you to the nation’s largest network of pet parents.</p>
                <h4>We work tirelessly to ensure tails keep wagging and pet parents’ minds are at ease.</h4>
                <ul class="list">
                    <li>Every PFSC service you offer is covered by the PFSC Guarantee</li>
                    <li>Safe, secure, and convenient online payments</li>
                    <li>General background checks offered for every pet sitter and dog walker</li>
                    <li>A world-class support team that has your back around the clock</li>
                    <li>Ongoing pet care education for dog sitters</li>
                </ul>
            </div>
        </div>
        <form action="" method="post">
            <h2>Tell us a bit about yourself</h2>
            <p class="pre">Receive requests as soon as your profile is approved.</p>
            <div class="txtGrp">
                <input type="text" name="" id="" class="txtBox" placeholder="Company">
            </div>
            <div class="txtGrp">
                <input type="text" name="" id="" class="txtBox" placeholder="Full Name">
            </div>
            <div class="txtGrp">
                <input type="text" name="" id="" class="txtBox" placeholder="Email Address">
            </div>
            <div class="txtGrp">
                <select name="" id="" class="txtBox">
                    <option value="">Why are you becoming a sitter?</option>
                    <option value="sole-source-of-income">Build a dog-sitting business as my sole source of income</option>
                    <option value="extra-income">Dog sit to earn additional income</option>
                    <option value="fun">Dog sit primarily for fun</option>
                    <option value="short-term-extra-cash">Dog sit temporarily (less than 6 months) for extra cash</option>
                    <option value="expand-my-business">Expand my established dog-sitting business</option>
                </select>
            </div>
            <div class="bTn text-center">
                <button type="submit" class="webBtn colorBtn">Become Pet Sitter</button>
            </div>
            <div class="imgLst">
                <img src="<?= base_url('
                assets/images/half_dot_left.svg')?>" alt="">
                <img src="<?= base_url('
                assets/images/half_dot_right.svg')?>" alt="">
                <img src="<?= base_url('
                assets/images/dot_bottom.svg')?>" alt="">
            </div>
        </form>
    </div> -->
</section>
<!-- become -->


</main>
<?php $this->load->view('includes/footer');?>
</body>
</html>