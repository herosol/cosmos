<!doctype html>
<html>
<head>
    <title><?= !empty($site_content['page_title'])?$site_content['page_title'].' - ':'Merchandise - '?><?= $site_settings->site_name?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>
<body id="home-page">
    <?php get_header(); ?>
<main>


<section id="shop" class="common">
    <div class="circleBtn">
        <button type="button" id="rsltBtn" class="webBtn">Result</button>
        <button type="button" id="fltrBtn" class="webBtn">Filter</button>
    </div>
    <div class="block">
        <div class="contain">
            <div class="flexRow flex">
                <div class="col col1">
                    <div class="filters">
                        <form action="" method="">
                            <h3>Filters <button type="reset">Reset all</button></h3>
                            <div class="inBlk">
                                <h4>Categories</h4>
                                <ul class="ctgLst">
                                    <li>
                                        <input type="checkbox" id="categories_all" name="categories" checked="">
                                        <label for="categories_all">All / Any</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="categories_Dresses" name="categories">
                                        <label for="categories_Dresses">Dresses <span>(16)</span></label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="categories_Sarees" name="categories">
                                        <label for="categories_Sarees">Sarees <span>(22)</span></label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="categories_Shorts" name="categories">
                                        <label for="categories_Shorts">Shorts & Skirts <span>(35)</span></label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="categories_Jeans" name="categories">
                                        <label for="categories_Jeans">Jeans <span>(12)</span></label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="categories_Shirts" name="categories">
                                        <label for="categories_Shirts">Shirts <span>(15)</span></label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="categories_Caps" name="categories">
                                        <label for="categories_Caps">Caps/Hats <span>(32)</span></label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="categories_Glasses" name="categories">
                                        <label for="categories_Glasses">Glasses <span>(7)</span></label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="categories_Shoes" name="categories">
                                        <label for="categories_Shoes">Shoes <span>(18)</span></label>
                                    </li>
                                </ul>
                            </div>
                            <div class="inBlk">
                                <h4>Price</h4>
                                <input type="text" name="" id="price" value="">
                            </div>
                            <div class="inBlk">
                                <h4>Rating</h4>
                                <ul class="ctgLst ratingLst">
                                    <li>
                                        <input type="radio" id="start_four_five" name="start_rating">
                                        <div class="rateYo" data-rateyo-read-only="true" data-rateyo-rating="4.5" data-rateyo-star-width="16px"></div>
                                        <label for="start_four_five">4.5 & up</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="start_four" name="start_rating">
                                        <div class="rateYo" data-rateyo-read-only="true" data-rateyo-rating="4" data-rateyo-star-width="16px"></div>
                                        <label for="start_four">4.0 & up</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="start_three_five" name="start_rating">
                                        <div class="rateYo" data-rateyo-read-only="true" data-rateyo-rating="3.5" data-rateyo-star-width="16px"></div>
                                        <label for="start_three_five">3.5 & up</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="start_three" name="start_rating">
                                        <div class="rateYo" data-rateyo-read-only="true" data-rateyo-rating="3" data-rateyo-star-width="16px"></div>
                                        <label for="start_three">3.0 & up</label>
                                    </li>
                                </ul>
                            </div>
                            <div class="inBlk">
                                <h4>Size</h4>
                                <ul class="ctgLst">
                                    <li>
                                        <input type="checkbox" id="size_all" name="size" checked="">
                                        <label for="size_all">All / Any</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="size_Medium" name="series">
                                        <label for="size_Medium">Medium <span>(5)</span></label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="size_Large" name="series">
                                        <label for="size_Large">Large <span>(9)</span></label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="size_Extra" name="series">
                                        <label for="size_Extra">Extra Large <span>(5)</span></label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="size_Small" name="series">
                                        <label for="size_Small">Small <span>(9)</span></label>
                                    </li>
                                </ul>
                            </div>
                            <div class="inBlk">
                                <h4>Cities</h4>
                                <ul class="ctgLst">
                                    <li>
                                        <input type="checkbox" id="cities_all" name="cities" checked="">
                                        <label for="cities_all">All / Any</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="cities_Irvine" name="cities">
                                        <label for="cities_Irvine">Irvine, CA <span>(12)</span></label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="cities_Santa" name="cities">
                                        <label for="cities_Santa">Santa Monica, CA <span>(16)</span></label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="cities_Jersey" name="cities">
                                        <label for="cities_Jersey">Jersey City, NJ, <span>(11)</span></label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="cities_Marietta" name="cities">
                                        <label for="cities_Marietta">Marietta, GA <span>(4)</span></label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="cities_Brooklyn" name="cities">
                                        <label for="cities_Brooklyn">Brooklyn, NY <span>(12)</span></label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="cities_Huntington" name="cities">
                                        <label for="cities_Huntington">Huntington Beach, CA <span>(8)</span></label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="cities_Atlanta" name="cities">
                                        <label for="cities_Atlanta">Atlanta, GA <span>(1)</span></label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="cities_Duluth" name="cities">
                                        <label for="cities_Duluth">Duluth, GA <span>(17)</span></label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="cities_Albany" name="cities">
                                        <label for="cities_Albany">Albany, NY <span>(13)</span></label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="cities_Island" name="cities">
                                        <label for="cities_Island">Long Island, NY <span>(1)</span></label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="cities_Rochester" name="cities">
                                        <label for="cities_Rochester">Rochester, NY <span>(12)</span></label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="cities_Los" name="cities">
                                        <label for="cities_Los">Los Angeles, CA <span>(10)</span></label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="cities_Diego" name="cities">
                                        <label for="cities_Diego">San Diego, CA <span>(9)</span></label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="cities_Francisco" name="cities">
                                        <label for="cities_Francisco">San Francisco, CA <span>(7)</span></label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="cities_Beach" name="cities">
                                        <label for="cities_Beach">Long Beach, CA <span>(12)</span></label>
                                    </li>
                                </ul>
                            </div>
                            <div class="inBlk">
                                <h4>Availability</h4>
                                <ul class="ctgLst">
                                    <li>
                                        <input type="checkbox" id="avail_all" name="avail" checked="">
                                        <label for="avail_all">All / Any</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="avail_Available" name="avail">
                                        <label for="avail_Available">Available</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="avail_New" name="avail">
                                        <label for="avail_New">New Arrivals</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="avail_Online" name="avail">
                                        <label for="avail_Online">Online Only</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="avail_Brands" name="avail">
                                        <label for="avail_Brands">Brands</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="avail_Clearance" name="avail">
                                        <label for="avail_Clearance">Clearance Sale</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="avail_Discount" name="avail">
                                        <label for="avail_Discount">Discount Store</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="avail_Editor" name="avail">
                                        <label for="avail_Editor">Editor's Pick</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="avail_Coming" name="avail">
                                        <label for="avail_Coming">Coming Soon</label>
                                    </li>
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col col2">
                    <div class="topHead">
                        <h1 class="secHeading">Merchandise</h1>
                        <div class="miniBtn">
                            <select name="" id="" class="txtBox">
                                <option value="0">Sort By</option>
                                <option value="0">Newest</option>
                                <option value="1">On Sale</option>
                                <option value="2">Price (Low to High)</option>
                            </select>
                        </div>
                    </div>
                    <div class="flexRow flex">
                        <div class="col">
                            <div class="iTem">
                                <div class="image">
                                    <a href="<?= site_url('product-detail')?>" class="overlay">
                                        <img src="<?= base_url('assets/images/store/1.jpg')?>" alt="">
                                    </a>
                                    <a href="<?= site_url('shopping-cart')?>" class="webBtn colorBtn">Add to Cart</a>
                                </div>
                                <div class="ico"><img src="<?= base_url('assets/images/users/1.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="heart"></div>
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
                                    <a href="<?= site_url('shopping-cart')?>" class="webBtn colorBtn">Add to Cart</a>
                                </div>
                                <div class="ico"><img src="<?= base_url('assets/images/users/2.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="heart"></div>
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
                                    <a href="<?= site_url('shopping-cart')?>" class="webBtn colorBtn">Add to Cart</a>
                                </div>
                                <div class="ico"><img src="<?= base_url('assets/images/users/3.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="heart"></div>
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
                                    <a href="<?= site_url('shopping-cart')?>" class="webBtn colorBtn">Add to Cart</a>
                                </div>
                                <div class="ico"><img src="<?= base_url('assets/images/users/4.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="heart"></div>
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
                                    <a href="<?= site_url('shopping-cart')?>" class="webBtn colorBtn">Add to Cart</a>
                                </div>
                                <div class="ico"><img src="<?= base_url('assets/images/users/5.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="heart"></div>
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
                                    <a href="<?= site_url('shopping-cart')?>" class="webBtn colorBtn">Add to Cart</a>
                                </div>
                                <div class="ico"><img src="<?= base_url('assets/images/users/6.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="heart"></div>
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
                                    <a href="<?= site_url('shopping-cart')?>" class="webBtn colorBtn">Add to Cart</a>
                                </div>
                                <div class="ico"><img src="<?= base_url('assets/images/users/7.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="heart"></div>
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
                                    <a href="<?= site_url('shopping-cart')?>" class="webBtn colorBtn">Add to Cart</a>
                                </div>
                                <div class="ico"><img src="<?= base_url('assets/images/users/8.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="heart"></div>
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
                                    <a href="<?= site_url('shopping-cart')?>" class="webBtn colorBtn">Add to Cart</a>
                                </div>
                                <div class="ico"><img src="<?= base_url('assets/images/users/1.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="heart"></div>
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
                                    <a href="<?= site_url('shopping-cart')?>" class="webBtn colorBtn">Add to Cart</a>
                                </div>
                                <div class="ico"><img src="<?= base_url('assets/images/users/2.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="heart"></div>
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
                                        <img src="<?= base_url('assets/images/store/1.jpg')?>" alt="">
                                    </a>
                                    <a href="<?= site_url('shopping-cart')?>" class="webBtn colorBtn">Add to Cart</a>
                                </div>
                                <div class="ico"><img src="<?= base_url('assets/images/users/3.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="heart"></div>
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
                                        <img src="<?= base_url('assets/images/store/2.jpg')?>" alt="">
                                    </a>
                                    <a href="<?= site_url('shopping-cart')?>" class="webBtn colorBtn">Add to Cart</a>
                                </div>
                                <div class="ico"><img src="<?= base_url('assets/images/users/4.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="heart"></div>
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
                                        <img src="<?= base_url('assets/images/store/3.jpg')?>" alt="">
                                    </a>
                                    <a href="<?= site_url('shopping-cart')?>" class="webBtn colorBtn">Add to Cart</a>
                                </div>
                                <div class="ico"><img src="<?= base_url('assets/images/users/5.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="heart"></div>
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
                                        <img src="<?= base_url('assets/images/store/4.jpg')?>" alt="">
                                    </a>
                                    <a href="<?= site_url('shopping-cart')?>" class="webBtn colorBtn">Add to Cart</a>
                                </div>
                                <div class="ico"><img src="<?= base_url('assets/images/users/6.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="heart"></div>
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
                                        <img src="<?= base_url('assets/images/store/5.jpg')?>" alt="">
                                    </a>
                                    <a href="<?= site_url('shopping-cart')?>" class="webBtn colorBtn">Add to Cart</a>
                                </div>
                                <div class="ico"><img src="<?= base_url('assets/images/users/7.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="heart"></div>
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
                                        <img src="<?= base_url('assets/images/store/6.jpg')?>" alt="">
                                    </a>
                                    <a href="<?= site_url('shopping-cart')?>" class="webBtn colorBtn">Add to Cart</a>
                                </div>
                                <div class="ico"><img src="<?= base_url('assets/images/users/8.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="heart"></div>
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
                                        <img src="<?= base_url('assets/images/store/7.jpg')?>" alt="">
                                    </a>
                                    <a href="<?= site_url('shopping-cart')?>" class="webBtn colorBtn">Add to Cart</a>
                                </div>
                                <div class="ico"><img src="<?= base_url('assets/images/users/1.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="heart"></div>
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
                                        <img src="<?= base_url('assets/images/store/8.jpg')?>" alt="">
                                    </a>
                                    <a href="<?= site_url('shopping-cart')?>" class="webBtn colorBtn">Add to Cart</a>
                                </div>
                                <div class="ico"><img src="<?= base_url('assets/images/users/2.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="heart"></div>
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
                                        <img src="<?= base_url('assets/images/store/9.jpg')?>" alt="">
                                    </a>
                                    <a href="<?= site_url('shopping-cart')?>" class="webBtn colorBtn">Add to Cart</a>
                                </div>
                                <div class="ico"><img src="<?= base_url('assets/images/users/3.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="heart"></div>
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
                                        <img src="<?= base_url('assets/images/store/10.jpg')?>" alt="">
                                    </a>
                                    <a href="<?= site_url('shopping-cart')?>" class="webBtn colorBtn">Add to Cart</a>
                                </div>
                                <div class="ico"><img src="<?= base_url('assets/images/users/4.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="heart"></div>
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
                                        <img src="<?= base_url('assets/images/store/1.jpg')?>" alt="">
                                    </a>
                                    <a href="<?= site_url('shopping-cart')?>" class="webBtn colorBtn">Add to Cart</a>
                                </div>
                                <div class="ico"><img src="<?= base_url('assets/images/users/5.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="heart"></div>
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
                                        <img src="<?= base_url('assets/images/store/2.jpg')?>" alt="">
                                    </a>
                                    <a href="<?= site_url('shopping-cart')?>" class="webBtn colorBtn">Add to Cart</a>
                                </div>
                                <div class="ico"><img src="<?= base_url('assets/images/users/6.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="heart"></div>
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
                                    <a href="<?= site_url('shopping-cart')?>" class="webBtn colorBtn">Add to Cart</a>
                                </div>
                                <div class="ico"><img src="<?= base_url('assets/images/users/7.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="heart"></div>
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
                                        <img src="<?= base_url('assets/images/store/4.jpg')?>" alt="">
                                    </a>
                                    <a href="<?= site_url('shopping-cart')?>" class="webBtn colorBtn">Add to Cart</a>
                                </div>
                                <div class="ico"><img src="<?= base_url('assets/images/users/8.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="heart"></div>
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
                                        <img src="<?= base_url('assets/images/store/5.jpg')?>" alt="">
                                    </a>
                                    <a href="<?= site_url('shopping-cart')?>" class="webBtn colorBtn">Add to Cart</a>
                                </div>
                                <div class="ico"><img src="<?= base_url('assets/images/users/1.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="heart"></div>
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
                                        <img src="<?= base_url('assets/images/store/6.jpg')?>" alt="">
                                    </a>
                                    <a href="<?= site_url('shopping-cart')?>" class="webBtn colorBtn">Add to Cart</a>
                                </div>
                                <div class="ico"><img src="<?= base_url('assets/images/users/2.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="heart"></div>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- shop -->


<!-- Ion Slider -->
<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/ion.slider.min.css')?>">
<script type="text/javascript" src="<?= base_url('assets/js/ion.slider.min.js')?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/ion.slider.skins.js')?>"></script>
<script type="text/javascript">
    $(function(){
        $('#price').ionRangeSlider({
            skin: 'square',
            from: 1,
            to: 150,
            min: 1,
            max: 150,
            type: 'double',
            prettify: function (num) {
                return '$'+num;
            },
            grid: true
        });
    });
</script>
<script type="text/javascript">
    $(function() {
        $(document).on('click', '.circleBtn', function() {
            $(this).toggleClass('change');
            $('body').toggleClass('flow');
            $('#shop .filters').toggleClass('active');
        });
    });
</script>
</main>
<?php $this->load->view('includes/footer'); ?>
</body>
</html>