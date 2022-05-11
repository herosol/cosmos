<!doctype html>
<html>
<head>
    <title><?= !empty($site_content['page_title'])?$site_content['page_title'].' - ':'Product Detail - '?><?= $site_settings->site_name?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>
<body id="home-page">
    <?php get_header(); ?>
<main>


<section id="detail" class="common">
    <div class="contain">
        <div class="flexRow flex">
            <div class="col col1">
                <div class="miniSlider relative">
                    <ul id="lightSlider">
                        <li data-src="<?= base_url('assets/images/store/1.jpg')?>" data-thumb="<?= base_url('assets/images/store/1.jpg')?>">
                            <img src="<?= base_url('assets/images/store/1.jpg')?>" alt="">
                        </li>
                        <li data-src="<?= base_url('assets/images/store/2.jpg')?>" data-thumb="<?= base_url('assets/images/store/2.jpg')?>">
                            <img src="<?= base_url('assets/images/store/2.jpg')?>" alt="">
                        </li>
                        <li data-src="<?= base_url('assets/images/store/3.jpg')?>" data-thumb="<?= base_url('assets/images/store/3.jpg')?>">
                            <img src="<?= base_url('assets/images/store/3.jpg')?>" alt="">
                        </li>
                        <li data-src="<?= base_url('assets/images/store/4.jpg')?>" data-thumb="<?= base_url('assets/images/store/4.jpg')?>">
                            <img src="<?= base_url('assets/images/store/4.jpg')?>" alt="">
                        </li>
                        <li data-src="<?= base_url('assets/images/store/5.jpg')?>" data-thumb="<?= base_url('assets/images/store/5.jpg')?>">
                            <img src="<?= base_url('assets/images/store/5.jpg')?>" alt="">
                        </li>
                        <li data-src="<?= base_url('assets/images/store/6.jpg')?>" data-thumb="<?= base_url('assets/images/store/6.jpg')?>">
                            <img src="<?= base_url('assets/images/store/6.jpg')?>" alt="">
                        </li>
                    </ul>
                    <button type="button" id="zoomBtn" class="fi-search-plus"></button>
                </div>
            </div>
            <div class="col col2">
                <div class="content">
                    <h1 class="secHeading">Annie's Organic Fruit Snacks</h1>
                    <div class="itemPrice price">$13.99</div>
                    <h5>Available: <span class="color">In stock</span></h5>
                    <hr>
                    <form method="post" action="<?= site_url('shopping-cart')?>">
                        <div class="btnLst flex">
                            <select name="" id="" class="txtBox selectpicker">
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                                <option value="32">32</option>
                                <option value="33">33</option>
                                <option value="34">34</option>
                                <option value="35">35</option>
                                <option value="36">36</option>
                                <option value="37">37</option>
                                <option value="38">38</option>
                                <option value="39">39</option>
                                <option value="40">40</option>
                                <option value="41">41</option>
                                <option value="42">42</option>
                                <option value="43">43</option>
                                <option value="44">44</option>
                                <option value="45">45</option>
                                <option value="46">46</option>
                                <option value="47">47</option>
                                <option value="48">48</option>
                                <option value="49">49</option>
                                <option value="50">50</option>
                                <option value="51">51</option>
                                <option value="52">52</option>
                                <option value="53">53</option>
                                <option value="54">54</option>
                                <option value="55">55</option>
                                <option value="56">56</option>
                                <option value="57">57</option>
                                <option value="58">58</option>
                                <option value="59">59</option>
                                <option value="60">60</option>
                                <option value="61">61</option>
                                <option value="62">62</option>
                                <option value="63">63</option>
                                <option value="64">64</option>
                                <option value="65">65</option>
                                <option value="66">66</option>
                                <option value="67">67</option>
                                <option value="68">68</option>
                                <option value="69">69</option>
                                <option value="70">70</option>
                                <option value="71">71</option>
                                <option value="72">72</option>
                                <option value="73">73</option>
                                <option value="74">74</option>
                                <option value="75">75</option>
                                <option value="76">76</option>
                                <option value="77">77</option>
                                <option value="78">78</option>
                                <option value="79">79</option>
                                <option value="80">80</option>
                                <option value="81">81</option>
                                <option value="82">82</option>
                                <option value="83">83</option>
                                <option value="84">84</option>
                                <option value="85">85</option>
                                <option value="86">86</option>
                                <option value="87">87</option>
                                <option value="88">88</option>
                                <option value="89">89</option>
                                <option value="90">90</option>
                                <option value="91">91</option>
                                <option value="92">92</option>
                                <option value="93">93</option>
                                <option value="94">94</option>
                                <option value="95">95</option>
                                <option value="96">96</option>
                                <option value="97">97</option>
                                <option value="98">98</option>
                                <option value="99">99</option>
                            </select>
                            <button type="submit" class="webBtn colorBtn"><i class="fi-cart"></i> Add to cart</button>
                            <button type="button" class="webBtn"><i class="fi-heart-o"></i> Add to Favorite</button>
                        </div>
                    </form>
                    <hr>
                    <h4 class="color">Description:</h4>
                    <div class="ckEditor">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus natus quisquam laboriosam! Ullam ea tempore quo ipsam vel architecto magni fugiat recusandae voluptatibus, voluptate ex fuga eligendi laborum consectetur blanditiis.</p>
                        <ul>
                            <li>Socket: 1151</li>
                            <li>CPU: Core i5 , Core i7 , Core i9</li>
                            <li>Chipset: Intel Z390</li>
                            <li>Memory: Up to 64 GB</li>
                            <li>Storage: Up to 8 hard drives or SSD drives</li>
                            <li>Graphics: Supports up to 2 video cards</li>
                        </ul>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
    <div id="similar">
        <div class="contain">
            <div class="content text-center">
                <h1 class="secHeading">Similar Products</h1>
            </div>
            <div id="owl-similar" class="owl-carousel owl-theme">
                <div class="inner">
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
                <div class="inner">
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
                <div class="inner">
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
                <div class="inner">
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
                <div class="inner">
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
            </div>
        </div>
    </div>
</section>
<!-- detail -->


</main>
<?php $this->load->view('includes/footer'); ?>
</body>
</html>