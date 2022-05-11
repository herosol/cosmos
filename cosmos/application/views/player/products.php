<!doctype html>
<html>
<head>
<title>My Products – <?= $site_settings->site_name?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>
<body id="home-page">
    <?php get_header(); ?>
<main>


<section id="dash">
    <div id="products">
        <div class="contain">
            <div class="head">
                <h1 class="secHeading">My Products</h1>
                <div class="bTn"><a href="<?= site_url('player/add-product')?>" class="webBtn colorBtn">Add New Product</a></div>
            </div>
            <div class="flexRow flex">
                <div class="col">
                    <div class="iTem">
                        <div class="image">
                            <a href="<?= site_url('product-detail')?>" class="overlay">
                                <img src="<?= base_url('assets/images/store/1.jpg')?>" alt="">
                            </a>
                        </div>
                        <div class="dropDown">
                            <div class="more dropBtn"><span></span></div>
                            <ul class="dropCnt dropLst right">
                                <li><a href="javascript:void(0)" class="edtBtn">Edit</a></li>
                                <li><a href="?">Delete</a></li>
                            </ul>
                        </div>
                        <div class="txt">
                            <h4><a href="<?= site_url('product-detail')?>">Annie's Organic Fruit Snacks</a></h4>
                            <ul class="ctgry">
                                <li>Variety Pack</li>
                                <li>42 x 0.8 oz</li>
                            </ul>
                            <div class="priceBlk">
                                <div class="price">$16.99</div>
                                <div class="rateYo" data-rateyo-rating="4"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="iTem">
                        <div class="image">
                            <a href="<?= site_url('product-detail')?>" class="overlay">
                                <img src="<?= base_url('assets/images/store/2.jpg')?>" alt="">
                            </a>
                        </div>
                        <div class="dropDown">
                            <div class="more dropBtn"><span></span></div>
                            <ul class="dropCnt dropLst right">
                                <li><a href="javascript:void(0)" class="edtBtn">Edit</a></li>
                                <li><a href="?">Delete</a></li>
                            </ul>
                        </div>
                        <div class="txt">
                            <h4><a href="<?= site_url('product-detail')?>">Utz Braided Honey Wheat Twists Pretzels</a></h4>
                            <ul class="ctgry">
                                <li>56 oz</li>
                            </ul>
                            <div class="priceBlk">
                                <div class="price">$8.79</div>
                                <div class="rateYo" data-rateyo-rating="4"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="iTem">
                        <div class="image">
                            <a href="<?= site_url('product-detail')?>" class="overlay">
                                <img src="<?= base_url('assets/images/store/3.jpg')?>" alt="">
                            </a>
                        </div>
                        <div class="dropDown">
                            <div class="more dropBtn"><span></span></div>
                            <ul class="dropCnt dropLst right">
                                <li><a href="javascript:void(0)" class="edtBtn">Edit</a></li>
                                <li><a href="?">Delete</a></li>
                            </ul>
                        </div>
                        <div class="txt">
                            <h4><a href="<?= site_url('product-detail')?>">Prince & Spring Jackpot Popcorn Sea Salt</a></h4>
                            <ul class="ctgry">
                                <li>Single Size</li>
                                <li>24 Bags</li>
                            </ul>
                            <div class="priceBlk">
                                <div class="price">$949</div>
                                <div class="rateYo" data-rateyo-rating="4"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="iTem">
                        <div class="image">
                            <a href="<?= site_url('product-detail')?>" class="overlay">
                                <img src="<?= base_url('assets/images/store/4.jpg')?>" alt="">
                            </a>
                        </div>
                        <div class="dropDown">
                            <div class="more dropBtn"><span></span></div>
                            <ul class="dropCnt dropLst right">
                                <li><a href="javascript:void(0)" class="edtBtn">Edit</a></li>
                                <li><a href="?">Delete</a></li>
                            </ul>
                        </div>
                        <div class="txt">
                            <h4><a href="<?= site_url('product-detail')?>">BOOMCHICKAPOP Sea Salt Popcorn</a></h4>
                            <ul class="ctgry">
                                <li>24 Ct</li>
                            </ul>
                            <div class="priceBlk">
                                <div class="price">$11.99</div>
                                <div class="rateYo" data-rateyo-rating="4"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="iTem">
                        <div class="image">
                            <a href="<?= site_url('product-detail')?>" class="overlay">
                                <img src="<?= base_url('assets/images/store/5.jpg')?>" alt="">
                            </a>
                        </div>
                        <div class="dropDown">
                            <div class="more dropBtn"><span></span></div>
                            <ul class="dropCnt dropLst right">
                                <li><a href="javascript:void(0)" class="edtBtn">Edit</a></li>
                                <li><a href="?">Delete</a></li>
                            </ul>
                        </div>
                        <div class="txt">
                            <h4><a href="<?= site_url('product-detail')?>">Charmin Ultra Soft Bathroom Tissue</a></h4>
                            <ul class="ctgry">
                                <li>Septic Safe Mega Rolls</li>
                                <li>24 Ct</li>
                            </ul>
                            <div class="priceBlk">
                                <div class="price">$13.99</div>
                                <div class="rateYo" data-rateyo-rating="4"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="iTem">
                        <div class="image">
                            <a href="<?= site_url('product-detail')?>" class="overlay">
                                <img src="<?= base_url('assets/images/store/6.jpg')?>" alt="">
                            </a>
                        </div>
                        <div class="dropDown">
                            <div class="more dropBtn"><span></span></div>
                            <ul class="dropCnt dropLst right">
                                <li><a href="javascript:void(0)" class="edtBtn">Edit</a></li>
                                <li><a href="?">Delete</a></li>
                            </ul>
                        </div>
                        <div class="txt">
                            <h4><a href="<?= site_url('product-detail')?>">Hint Fruit Infused Water Variety Pack</a></h4>
                            <ul class="ctgry">
                                <li>12 x 16 oz</li>
                            </ul>
                            <div class="priceBlk">
                                <div class="price">$7.99</div>
                                <div class="rateYo" data-rateyo-rating="4"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="iTem">
                        <div class="image">
                            <a href="<?= site_url('product-detail')?>" class="overlay">
                                <img src="<?= base_url('assets/images/store/7.jpg')?>" alt="">
                            </a>
                        </div>
                        <div class="dropDown">
                            <div class="more dropBtn"><span></span></div>
                            <ul class="dropCnt dropLst right">
                                <li><a href="javascript:void(0)" class="edtBtn">Edit</a></li>
                                <li><a href="?">Delete</a></li>
                            </ul>
                        </div>
                        <div class="txt">
                            <h4><a href="<?= site_url('product-detail')?>">Kraft Velveeta Cheese</a></h4>
                            <ul class="ctgry">
                                <li>Original</li>
                                <li>2 x 32 oz</li>
                            </ul>
                            <div class="priceBlk">
                                <div class="price">$9.99</div>
                                <div class="rateYo" data-rateyo-rating="4"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="iTem">
                        <div class="image">
                            <a href="<?= site_url('product-detail')?>" class="overlay">
                                <img src="<?= base_url('assets/images/store/8.jpg')?>" alt="">
                            </a>
                        </div>
                        <div class="dropDown">
                            <div class="more dropBtn"><span></span></div>
                            <ul class="dropCnt dropLst right">
                                <li><a href="javascript:void(0)" class="edtBtn">Edit</a></li>
                                <li><a href="?">Delete</a></li>
                            </ul>
                        </div>
                        <div class="txt">
                            <h4><a href="<?= site_url('product-detail')?>">McCormick Taco Seasoning Mix</a></h4>
                            <ul class="ctgry">
                                <li>24 oz</li>
                            </ul>
                            <div class="priceBlk">
                                <div class="price">$12.89</div>
                                <div class="rateYo" data-rateyo-rating="4"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="iTem">
                        <div class="image">
                            <a href="<?= site_url('product-detail')?>" class="overlay">
                                <img src="<?= base_url('assets/images/store/9.jpg')?>" alt="">
                            </a>
                        </div>
                        <div class="dropDown">
                            <div class="more dropBtn"><span></span></div>
                            <ul class="dropCnt dropLst right">
                                <li><a href="javascript:void(0)" class="edtBtn">Edit</a></li>
                                <li><a href="?">Delete</a></li>
                            </ul>
                        </div>
                        <div class="txt">
                            <h4><a href="<?= site_url('product-detail')?>">Utz Braided Honey Wheat Twists Pretzels</a></h4>
                            <ul class="ctgry">
                                <li>56 oz</li>
                            </ul>
                            <div class="priceBlk">
                                <div class="price">$8.79</div>
                                <div class="rateYo" data-rateyo-rating="4"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="iTem">
                        <div class="image">
                            <a href="<?= site_url('product-detail')?>" class="overlay">
                                <img src="<?= base_url('assets/images/store/10.jpg')?>" alt="">
                            </a>
                        </div>
                        <div class="dropDown">
                            <div class="more dropBtn"><span></span></div>
                            <ul class="dropCnt dropLst right">
                                <li><a href="javascript:void(0)" class="edtBtn">Edit</a></li>
                                <li><a href="?">Delete</a></li>
                            </ul>
                        </div>
                        <div class="txt">
                            <h4><a href="<?= site_url('product-detail')?>">Charmin Ultra Soft Bathroom Tissue</a></h4>
                            <ul class="ctgry">
                                <li>Septic Safe Mega Rolls</li>
                                <li>24 Ct</li>
                            </ul>
                            <div class="priceBlk">
                                <div class="price">$13.99</div>
                                <div class="rateYo" data-rateyo-rating="4"></div>
                            </div>
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