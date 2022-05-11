<!doctype html>
<html>
<head>
<title>My Orders – <?= $site_settings->site_name?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>
<body id="home-page">
    <?php get_header(); ?>
<main>


<section id="dash">
    <div id="jobs">
        <div class="contain">
            <div class="head">
                <h1 class="secHeading">My Orders</h1>
            </div>
            <div class="inside">
                <div class="jobBlk">
                    <ul class="lst">
                        <li>
                            <div class="icoBlk">
                                <div class="ico"><img src="<?= base_url('assets/images/users/1.jpg')?>" alt=""></div>
                                <div class="name">Annie's Organic Fruit Snacks <em>214243</em></div>
                            </div>
                        </li>
                        <li class="date">March 20, 2019</li>
                        <li class="price_bold">$250</li>
                        <li><span class="miniLbl green">Complete</span></li>
                    </ul>
                    <a href="<?= site_url('player/order-detail')?>"></a>
                </div>
                <div class="jobBlk">
                    <ul class="lst">
                        <li>
                            <div class="icoBlk">
                                <div class="ico"><img src="<?= base_url('assets/images/users/2.jpg')?>" alt=""></div>
                                <div class="name">Utz Braided Honey Wheat Twists Pretzels <em>214243</em></div>
                            </div>
                        </li>
                        <li class="date">March 20, 2019</li>
                        <li class="price_bold">$220</li>
                        <li><span class="miniLbl yellow">Pending</span></li>
                    </ul>
                    <a href="<?= site_url('player/order-detail')?>"></a>
                </div>
                <div class="jobBlk">
                    <ul class="lst">
                        <li>
                            <div class="icoBlk">
                                <div class="ico"><img src="<?= base_url('assets/images/users/3.jpg')?>" alt=""></div>
                                <div class="name">Prince & Spring Jackpot Popcorn Sea Salt <em>214243</em></div>
                            </div>
                        </li>
                        <li class="date">March 20, 2019</li>
                        <li class="price_bold">$150</li>
                        <li><span class="miniLbl green">Complete</span></li>
                    </ul>
                    <a href="<?= site_url('player/order-detail')?>"></a>
                </div>
                <div class="jobBlk">
                    <ul class="lst">
                        <li>
                            <div class="icoBlk">
                                <div class="ico"><img src="<?= base_url('assets/images/users/4.jpg')?>" alt=""></div>
                                <div class="name">BOOMCHICKAPOP Sea Salt Popcorn <em>214243</em></div>
                            </div>
                        </li>
                        <li class="date">March 20, 2019</li>
                        <li class="price_bold">$250</li>
                        <li><span class="miniLbl green">Complete</span></li>
                    </ul>
                    <a href="<?= site_url('player/order-detail')?>"></a>
                </div>
                <div class="jobBlk">
                    <ul class="lst">
                        <li>
                            <div class="icoBlk">
                                <div class="ico"><img src="<?= base_url('assets/images/users/5.jpg')?>" alt=""></div>
                                <div class="name">Charmin Ultra Soft Bathroom Tissue <em>214243</em></div>
                            </div>
                        </li>
                        <li class="date">March 20, 2019</li>
                        <li class="price_bold">$220</li>
                        <li><span class="miniLbl yellow">Pending</span></li>
                    </ul>
                    <a href="<?= site_url('player/order-detail')?>"></a>
                </div>
                <div class="jobBlk">
                    <ul class="lst">
                        <li>
                            <div class="icoBlk">
                                <div class="ico"><img src="<?= base_url('assets/images/users/6.jpg')?>" alt=""></div>
                                <div class="name">Hint Fruit Infused Water Variety Pack <em>214243</em></div>
                            </div>
                        </li>
                        <li class="date">March 20, 2019</li>
                        <li class="price_bold">$150</li>
                        <li><span class="miniLbl green">Complete</span></li>
                    </ul>
                    <a href="<?= site_url('player/order-detail')?>"></a>
                </div>
                <div class="jobBlk">
                    <ul class="lst">
                        <li>
                            <div class="icoBlk">
                                <div class="ico"><img src="<?= base_url('assets/images/users/7.jpg')?>" alt=""></div>
                                <div class="name">Kraft Velveeta Cheese <em>214243</em></div>
                            </div>
                        </li>
                        <li class="date">March 20, 2019</li>
                        <li class="price_bold">$250</li>
                        <li><span class="miniLbl green">Complete</span></li>
                    </ul>
                    <a href="<?= site_url('player/order-detail')?>"></a>
                </div>
                <div class="jobBlk">
                    <ul class="lst">
                        <li>
                            <div class="icoBlk">
                                <div class="ico"><img src="<?= base_url('assets/images/users/8.jpg')?>" alt=""></div>
                                <div class="name">McCormick Taco Seasoning Mix <em>214243</em></div>
                            </div>
                        </li>
                        <li class="date">March 20, 2019</li>
                        <li class="price_bold">$220</li>
                        <li><span class="miniLbl yellow">Pending</span></li>
                    </ul>
                    <a href="<?= site_url('player/order-detail')?>"></a>
                </div>
                <div class="jobBlk">
                    <ul class="lst">
                        <li>
                            <div class="icoBlk">
                                <div class="ico"><img src="<?= base_url('assets/images/users/5.jpg')?>" alt=""></div>
                                <div class="name">Utz Braided Honey Wheat Twists Pretzels <em>214243</em></div>
                            </div>
                        </li>
                        <li class="date">March 20, 2019</li>
                        <li class="price_bold">$150</li>
                        <li><span class="miniLbl green">Complete</span></li>
                    </ul>
                    <a href="<?= site_url('player/order-detail')?>"></a>
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