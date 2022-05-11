<!doctype html>
<html>
<head>
    <title><?= !empty($site_content['page_title'])?$site_content['page_title'].' - ':'Home - '?><?= $site_settings->site_name?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>
<body id="home-page">
    <?php get_header(); ?>
<main>


<section id="banner" class="flexBox" style="background-image: url('<?= SITE_IMAGES.'images/'.$site_content['image1']?>')">
</section>
<!-- banner -->


<section id="form">
    <div class="contain">
        <form action="<?= site_url('search')?>" method="post" main-search>
            <div class="inside">
                <div class="txtGrp">
                    <label for="country">Areas of Availability</label>
                    <select name="country" id="country" class="txtBox selectpicker">
                        <option value="0">Select</option>
                        <?= get_countries_options('name')?>
                    </select>
                </div>
                <!-- <div class="txtGrp">
                    <label for="character">Characters</label>
                    <select name="character" id="character" class="txtBox selectpicker">
                        <option value="0">Select</option>
                        <?php foreach ($characters as $key => $char): ?>
                            <option value="<?= $char->id?>"><?= $char->title?></option>
                        <?php endforeach ?>
                    </select>
                </div> -->
                <div class="txtGrp">
                    <label for="character">Characters</label>
                    <input type="text" name="character" id=""character class="txtBox" placeholder="Search character">
                </div>
                <div class="txtGrp">
                    <label for="date">Availability</label>
                    <input type="text" name="date" id=""date class="txtBox datepicker" placeholder="Select">
                </div>
                <button type="submit" class="webBtn colorBtn"><i class="fi-search"></i> <?= $site_content['banner_button_text']?></button>
            </div>
        </form>
    </div>
</section>
<!-- form -->


<!-- <section id="blocks">
    <div class="contain">
        <div class="content text-center">
            <h1 class="secHeading"><?= $site_content['cosmos_heading']?></h1>
        </div>
        <ul class="tileLst flex">
            <?php for($i=1; $i<=6; $i++):?>
                <li>
                    <div class="inner">
                        <div class="icon"><img src="<?= SITE_IMAGES.'images/'.$site_content['cosmos_image'.$i]?>" alt=""></div>
                        <div class="cntnt">
                            <h4><?= $site_content['cosmos_heading'.$i]?></h4>
                            <p><?= $site_content['cosmos_text'.$i]?></p>
                        </div>
                    </div>
                </li>
            <?php endfor?>
        </ul>
    </div>
</section> -->
<!-- blocks -->


<?php if (count($players) > 0): ?>
<section id="stars">
    <div class="contain">
        <h1 class="secHeading text-center"><?= $site_content['star_heading']?></h1>
        <div class="flexRow flex">
            <?php foreach ($players as $key => $player): ?>
                <div class="col">
                    <div class="inner">
                        <div class="image" style="background-image: url('<?= get_image_src($player->mem_image, '300', true)?>')"></div>
                        <div class="txt">
                            <h4><?= format_name($player->mem_fname, $player->mem_lname)?> <span class="city"><?= $player->mem_profile_heading?></span></h4>
                            <div class="rateYo" data-rateyo-rating="4"></div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            <!--
            <div class="col">
                <div class="inner">
                    <div class="image" style="background-image: url('<?= base_url('assets/images/stars/star1.jpg')?>')"></div>
                    <div class="txt">
                        <h4>Felissa Clawella <span class="city">Professional Cosplayer</span></h4>
                        <div class="rateYo" data-rateyo-rating="4"></div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="inner">
                    <div class="image" style="background-image: url('<?= base_url('assets/images/stars/star2.jpg')?>')"></div>
                    <div class="txt">
                        <h4>Jack W. Howlett <span class="city">Special Effects Artist</span></h4>
                        <div class="rateYo" data-rateyo-rating="4"></div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="inner">
                    <div class="image" style="background-image: url('<?= base_url('assets/images/stars/star3.jpg')?>')"></div>
                    <div class="txt">
                        <h4>Emmanuelle Freeze <span class="city">Professional Cosplayer</span></h4>
                        <div class="rateYo" data-rateyo-rating="4"></div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="inner">
                    <div class="image" style="background-image: url('<?= base_url('assets/images/stars/star4.jpg')?>')"></div>
                    <div class="txt">
                        <h4>Jessica Danvers <span class="city">Professional Cosplayer</span></h4>
                        <div class="rateYo" data-rateyo-rating="4"></div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="inner">
                    <div class="image" style="background-image: url('<?= base_url('assets/images/stars/star5.jpg')?>')"></div>
                    <div class="txt">
                        <h4>Steven Crane <span class="city">Special Effects Artist</span></h4>
                        <div class="rateYo" data-rateyo-rating="4"></div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="inner">
                    <div class="image" style="background-image: url('<?= base_url('assets/images/stars/star6.jpg')?>')"></div>
                    <div class="txt">
                        <h4>Diana Mazonian <span class="city">Professional Cosplayer</span></h4>
                        <div class="rateYo" data-rateyo-rating="4"></div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="inner">
                    <div class="image" style="background-image: url('<?= base_url('assets/images/stars/star7.jpg')?>')"></div>
                    <div class="txt">
                        <h4>Debbie D-Undead <span class="city">Special Effects Artist</span></h4>
                        <div class="rateYo" data-rateyo-rating="4"></div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="inner">
                    <div class="image" style="background-image: url('<?= base_url('assets/images/stars/star8.jpg')?>')"></div>
                    <div class="txt">
                        <h4>Leyla Skyrunner <span class="city">Professional Cosplayer</span></h4>
                        <div class="rateYo" data-rateyo-rating="4"></div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="inner">
                    <div class="image" style="background-image: url('<?= base_url('assets/images/stars/star9.jpg')?>')"></div>
                    <div class="txt">
                        <h4>John Wick <span class="city">Special Effects Artist</span></h4>
                        <div class="rateYo" data-rateyo-rating="4"></div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="inner">
                    <div class="image" style="background-image: url('<?= base_url('assets/images/stars/star10.jpg')?>')"></div>
                    <div class="txt">
                        <h4>Leyla Skyrunner <span class="city">Professional Cosplayer</span></h4>
                        <div class="rateYo" data-rateyo-rating="4"></div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</section>
<!-- stars -->
<?php endif ?>


<section id="store">
    <div class="contain">
        <div class="content text-center">
            <h1 class="secHeading"><?= $site_content['marketplace_heading']?></h1>
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
        </div>
    </div>
</section>
<!-- store -->


<section id="highlights">
    <h1 class="secHeading text-center"><?= $site_content['highlights_heading']?>Cosmos Highlights</h1>
    <div class="contain">
        <div class="flexRow flex">
            <?php for($i=1; $i<=4; $i++):?>
                <div class="col">
                    <div class="inner">
                        <div class="image"><img src="<?= SITE_IMAGES.'images/'.$site_content['highlights_image'.$i]?>" alt=""></div>
                        <div class="txt">
                            <div class="icon"><img src="<?= SITE_IMAGES.'images/'.$site_content['highlights_icon_image'.$i]?>" alt=""></div>
                            <h4><?= $site_content['highlights_heading'.$i]?></h4>
                            <p><?= $site_content['highlights_text'.$i]?></p>
                        </div>
                    </div>
                </div>
            <?php endfor?>
        </div>
    </div>
</section>
<!-- highlights -->


<section id="how">
    <div class="contain text-center">
        <div class="inside relative" style="background-image: url('<?= SITE_IMAGES.'images/'.$site_content['image2']?>')">
            <div class="content">
                <h1 class="secHeading"><?= $site_content['how_heading']?></h1>
                <p class="pre"><?= $site_content['how_short_desc']?></p>
            </div>
            <ul class="lst flex">
                <?php for($i=1; $i<=3; $i++):?>
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
</section>
<!-- how -->

<section id="match">
    <div class="contain">
        <div class="flexRow flex">
            <div class="col col1">
                <?php for($i=1;$i<=2;$i++):?>
                    <div class="member member<?= $i?>">
                        <div class="ico"><img src="<?= get_site_image_src('images',$site_content['match_image'.$i],'',true)?>" alt=""></div>
                        <div class="txt"><?= $site_content['match_text'.$i]?></div>
                    </div>
                <?php endfor?>
            </div>
            <div class="col col2">
                <div class="content">
                    <h1 class="secHeading"><?= $site_content['match_heading']?></h1>
                    <p><?= $site_content['match_short_desc']?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- match -->

<section id="location">
    <div class="contain">
        <h1 class="secHeading text-center"><?= $site_content['cities_heading']?></h1>
        <ul class="lst flex">
            <?php foreach ($cities as $key => $city): ?>
                <li><a href="<?= site_url('search?city='.$city->city)?>"><?= $city->city?>, <?= $city->state?></a></li>
            <?php endforeach ?>
        </ul>
    </div>
</section>
<!-- location -->


<script type="text/javascript">
    $(function(){
        $(document).on('click', '.selectLst > li > .lnk', function() {
            var radio = $(this).data('radio');
            // $(this).parents('.selectLst').find('.lnk').removeClass('active');
            $(this).toggleClass('active');
            $(this).parents('.txtGrp').children('input[type="hidden"]').val(radio);
        });
        $(document).on('click', '#banner form button.txtBox', function(){
            var days = $(this).attr('data-days');
            $(this).parents('form').find('div[data-days]').removeClass('active');
            $(this).parents('form').find('button[data-days]').removeClass('active');
            $(this).parents('form').find(this).addClass('active');
            $(this).parents('form').find('div[data-days = ' + days + ']').addClass('active');
        });

        /*$(document).on('click', '[data-form="main"] .head .lblBtn > *', function(){
            $('[data-form="cat"]').show();
            $('[data-form="dog"]').hide();
        });*/

        $(document).on('change', 'input[name="animal"]', function(e){
            if (!$("#dog").prop('checked') && $("#cat").prop('checked')){
                $('[data-form="dog"]').hide();
                $('[data-form="cat"]').show();
                $('[data-form="main"] .nav-tabs > li:nth-child(n+4)').addClass('none');
                $('a[href="#Drop-in-Visits"] em').addClass('hidden');
            }
            else{
                $('[data-form="dog"]').show();
                $('[data-form="cat"]').hide();
                $('[data-form="main"] .nav-tabs > li:nth-child(n+4)').removeClass('none');
                $('a[href="#Drop-in-Visits"] em').removeClass('hidden');
            }

            $("#cat").prop('checked') ? $('input[name="cat"').val('cat'): $('input[name="cat"').val('');
            $("#dog").prop('checked') ? $('input[name="dog"').val('dog'): $('input[name="dog"').val('');
        });
    });
</script>
</main>
<?php $this->load->view('includes/footer'); ?>
</body>
</html>