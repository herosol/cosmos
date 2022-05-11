<!doctype html>
<html>
<head>
    <title><?= !empty($site_content['page_title'])?$site_content['page_title'].' - ':'Checkout - '?><?= $site_settings->site_name?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>
<body id="home-page">
    <?php get_header(); ?>
<main>


<section id="checkout" class="common">
    <div class="block">
        <div class="contain">
            <div class="checkBlk">
                <div class="dpBlk">
                    <div class="ico"><img src="<?= base_url('assets/images/users/1.jpg')?>" alt=""></div>
                    <h5>John Wick</h5>
                    <div class="rateYo" data-rateyo-rating="4"></div>
                    <div class="bTn"><a href="javascript:void(0)" class="webBtn smBtn">Checkout</a></div>
                </div>
                <div class="sideBlk">
                    <div class="shopTable">
                        <table>
                            <thead>
                                <tr>
                                    <th width="120">ID</th>
                                    <th>Product</th>
                                    <th width="120">Quantity</th>
                                    <th width="100">Price</th>
                                    <th width="100">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td data-title="ID">1977954</td>
                                    <td data-title="Product">
                                        <div class="pro_cart">
                                            <div class="ico"><img src="<?= base_url('assets/images/store/1.jpg')?>" alt=""></div>
                                            <div class="pro_name">
                                                <h4>Annie's Organic Fruit Snacks</h4>
                                                <p>Variety Pack, 42 x 0.8 oz</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-title="Quantity">2</td>
                                    <td data-title="Price">
                                        <div class="price">$19.90</div>
                                    </td>
                                    <td data-title="Total">
                                        <div class="price">$19.90</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td data-title="ID">1795392</td>
                                    <td data-title="Product">
                                        <div class="pro_cart">
                                            <div class="ico"><img src="<?= base_url('assets/images/store/5.jpg')?>" alt=""></div>
                                            <div class="pro_name">
                                                <h4>Prince &amp; Spring Jackpot Popcorn Sea Salt</h4>
                                                <p>Single Size, 24 Bags</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-title="Quantity">2</td>
                                    <td data-title="Price">
                                        <div class="price">$8.79</div>
                                    </td>
                                    <td data-title="Total">
                                        <div class="price">$8.79</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="blk">
                        <div class="_header">
                            <h3>Shipping information</h3>
                        </div>
                        <div class="row formRow">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-12 txtGrp">
                                <input type="text" name="" id="" class="txtBox" placeholder="Contact person">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-12 txtGrp">
                                <input type="text" name="" id="" class="txtBox" placeholder="Contact person phone">
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-4 txtGrp">
                                <select name="" id="" class="txtBox selectpicker" data-live-search="true">
                                    <option value="Country">Country</option>
                                    <option value="London">London</option>
                                    <option value="Birmingham">Birmingham</option>
                                    <option value="Leeds">Leeds</option>
                                    <option value="Glasgow">Glasgow</option>
                                    <option value="Sheffield">Sheffield</option>
                                    <option value="Bradford">Bradford</option>
                                    <option value="Liverpool">Liverpool</option>
                                    <option value="Edinburgh">Edinburgh</option>
                                    <option value="Manchester">Manchester</option>
                                    <option value="Bristol">Bristol</option>
                                    <option value="Kirklees">Kirklees</option>
                                    <option value="Fife">Fife</option>
                                    <option value="Wirral">Wirral</option>
                                    <option value="North Lanarkshire">North Lanarkshire</option>
                                    <option value="Wakefield">Wakefield</option>
                                    <option value="Cardiff">Cardiff</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-4 txtGrp">
                                <input type="text" name="" id="" class="txtBox" placeholder="City or State">
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-4 txtGrp">
                                <input type="text" name="" id="" class="txtBox" placeholder="Postal Code">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-12 txtGrp">
                                <input type="text" name="" id="" class="txtBox" placeholder="Address 1">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-12 txtGrp">
                                <input type="text" name="" id="" class="txtBox" placeholder="Address 2">
                            </div>
                        </div>
                        <hr>
                        <div class="_header">
                            <h3>Payment</h3>
                        </div>
                        <div data-payment="credit-card">
                            <div class="topHead">
                                <h4>Credit card</h4>
                                <ul class="cardLst">
                                    <li><img src="<?= base_url('assets/images/payment-visa.svg')?>" alt=""></li>
                                    <li><img src="<?= base_url('assets/images/payment-master.svg')?>" alt=""></li>
                                    <li><img src="<?= base_url('assets/images/payment-american-express.svg')?>" alt=""></li>
                                    <li><img src="<?= base_url('assets/images/payment-discover.svg')?>" alt=""></li>
                                </ul>
                            </div>
                            <div class="row formRow">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                    <input type="text" name="" id="" class="txtBox" placeholder="Card Number">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                    <input type="text" name="" id="" class="txtBox" placeholder="Card Holder">
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-4 txtGrp">
                                    <select name="" id="" class="txtBox selectpicker" data-live-search="true">
                                        <option value="Month">Month</option>
                                        <option value="January">January</option>
                                        <option value="February">February</option>
                                        <option value="March">March</option>
                                        <option value="April">April</option>
                                        <option value="May">May</option>
                                        <option value="June">June</option>
                                        <option value="July">July</option>
                                        <option value="August">August</option>
                                        <option value="September">September</option>
                                        <option value="October">October</option>
                                        <option value="November">November</option>
                                        <option value="December">December</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-4 txtGrp">
                                    <select name="" id="" class="txtBox selectpicker" data-live-search="true">
                                        <option value="Year">Year</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                        <option value="2027">2027</option>
                                        <option value="2028">2028</option>
                                        <option value="2029">2029</option>
                                        <option value="2030">2030</option>
                                        <option value="2031">2031</option>
                                        <option value="2032">2032</option>
                                        <option value="2033">2033</option>
                                        <option value="2034">2034</option>
                                        <option value="2035">2035</option>
                                        <option value="2036">2036</option>
                                        <option value="2037">2037</option>
                                        <option value="2038">2038</option>
                                        <option value="2039">2039</option>
                                        <option value="2040">2040</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-4 txtGrp">
                                    <input type="text" name="" id="" class="txtBox" placeholder="CVC?">
                                </div>
                            </div>
                        </div>
                        <div class="rememberMe txtGrp">
                            <div class="lblBtn">
                                <input type="checkbox" name="confirm" id="confirm">
                                <label for="confirm">By clicking "Place order", I agree to Cosmos
                                    <a href="<?= site_url('terms-conditions')?>">Terms & Conditions</a>
                                    and
                                    <a href="<?= site_url('privacy-policy')?>">Privacy Policy.</a>
                                </label>
                            </div>
                        </div>
                        <div class="bTn text-center">
                            <button type="submit" class="webBtn colorBtn">Place order</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="checkBlk">
                <div class="dpBlk">
                    <div class="ico"><img src="<?= base_url('assets/images/users/5.jpg')?>" alt=""></div>
                    <h5>Samentha Hucen</h5>
                    <div class="rateYo" data-rateyo-rating="4"></div>
                    <div class="bTn"><a href="javascript:void(0)" class="webBtn smBtn">Checkout</a></div>
                </div>
                <div class="sideBlk">
                    <div class="shopTable">
                        <table>
                            <thead>
                                <tr>
                                    <th width="120">ID</th>
                                    <th>Product</th>
                                    <th width="120">Quantity</th>
                                    <th width="100">Price</th>
                                    <th width="100">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td data-title="ID">1795392</td>
                                    <td data-title="Product">
                                        <div class="pro_cart">
                                            <div class="ico"><img src="<?= base_url('assets/images/store/3.jpg')?>" alt=""></div>
                                            <div class="pro_name">
                                                <h4>Utz Braided Honey Wheat Twists Pretzels</h4>
                                                <p>Single Size, 24 Bags</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-title="Quantity">2</td>
                                    <td data-title="Price">
                                        <div class="price">$8.79</div>
                                    </td>
                                    <td data-title="Total">
                                        <div class="price">$8.79</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td data-title="ID">1795392</td>
                                    <td data-title="Product">
                                        <div class="pro_cart">
                                            <div class="ico"><img src="<?= base_url('assets/images/store/7.jpg')?>" alt=""></div>
                                            <div class="pro_name">
                                                <h4>BOOMCHICKAPOP Sea Salt Popcorn</h4>
                                                <p>Single Size, 24 Bags</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-title="Quantity">2</td>
                                    <td data-title="Price">
                                        <div class="price">$8.79</div>
                                    </td>
                                    <td data-title="Total">
                                        <div class="price">$8.79</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="blk">
                        <div class="_header">
                            <h3>Shipping information</h3>
                        </div>
                        <div class="row formRow">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-12 txtGrp">
                                <input type="text" name="" id="" class="txtBox" placeholder="Contact person">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-12 txtGrp">
                                <input type="text" name="" id="" class="txtBox" placeholder="Contact person phone">
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-4 txtGrp">
                                <select name="" id="" class="txtBox selectpicker" data-live-search="true">
                                    <option value="Country">Country</option>
                                    <option value="London">London</option>
                                    <option value="Birmingham">Birmingham</option>
                                    <option value="Leeds">Leeds</option>
                                    <option value="Glasgow">Glasgow</option>
                                    <option value="Sheffield">Sheffield</option>
                                    <option value="Bradford">Bradford</option>
                                    <option value="Liverpool">Liverpool</option>
                                    <option value="Edinburgh">Edinburgh</option>
                                    <option value="Manchester">Manchester</option>
                                    <option value="Bristol">Bristol</option>
                                    <option value="Kirklees">Kirklees</option>
                                    <option value="Fife">Fife</option>
                                    <option value="Wirral">Wirral</option>
                                    <option value="North Lanarkshire">North Lanarkshire</option>
                                    <option value="Wakefield">Wakefield</option>
                                    <option value="Cardiff">Cardiff</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-4 txtGrp">
                                <input type="text" name="" id="" class="txtBox" placeholder="City or State">
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-4 txtGrp">
                                <input type="text" name="" id="" class="txtBox" placeholder="Postal Code">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-12 txtGrp">
                                <input type="text" name="" id="" class="txtBox" placeholder="Address 1">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-12 txtGrp">
                                <input type="text" name="" id="" class="txtBox" placeholder="Address 2">
                            </div>
                        </div>
                        <hr>
                        <div class="_header">
                            <h3>Payment</h3>
                        </div>
                        <div data-payment="credit-card">
                            <div class="topHead">
                                <h4>Credit card</h4>
                                <ul class="cardLst">
                                    <li><img src="<?= base_url('assets/images/payment-visa.svg')?>" alt=""></li>
                                    <li><img src="<?= base_url('assets/images/payment-master.svg')?>" alt=""></li>
                                    <li><img src="<?= base_url('assets/images/payment-american-express.svg')?>" alt=""></li>
                                    <li><img src="<?= base_url('assets/images/payment-discover.svg')?>" alt=""></li>
                                </ul>
                            </div>
                            <div class="row formRow">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                    <input type="text" name="" id="" class="txtBox" placeholder="Card Number">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                    <input type="text" name="" id="" class="txtBox" placeholder="Card Holder">
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-4 txtGrp">
                                    <select name="" id="" class="txtBox selectpicker" data-live-search="true">
                                        <option value="Month">Month</option>
                                        <option value="January">January</option>
                                        <option value="February">February</option>
                                        <option value="March">March</option>
                                        <option value="April">April</option>
                                        <option value="May">May</option>
                                        <option value="June">June</option>
                                        <option value="July">July</option>
                                        <option value="August">August</option>
                                        <option value="September">September</option>
                                        <option value="October">October</option>
                                        <option value="November">November</option>
                                        <option value="December">December</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-4 txtGrp">
                                    <select name="" id="" class="txtBox selectpicker" data-live-search="true">
                                        <option value="Year">Year</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                        <option value="2027">2027</option>
                                        <option value="2028">2028</option>
                                        <option value="2029">2029</option>
                                        <option value="2030">2030</option>
                                        <option value="2031">2031</option>
                                        <option value="2032">2032</option>
                                        <option value="2033">2033</option>
                                        <option value="2034">2034</option>
                                        <option value="2035">2035</option>
                                        <option value="2036">2036</option>
                                        <option value="2037">2037</option>
                                        <option value="2038">2038</option>
                                        <option value="2039">2039</option>
                                        <option value="2040">2040</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-4 txtGrp">
                                    <input type="text" name="" id="" class="txtBox" placeholder="CVC?">
                                </div>
                            </div>
                        </div>
                        <div class="rememberMe txtGrp">
                            <div class="lblBtn">
                                <input type="checkbox" name="confirm" id="confirm">
                                <label for="confirm">By clicking "Place order", I agree to Cosmos
                                    <a href="<?= site_url('terms-conditions')?>">Terms & Conditions</a>
                                    and
                                    <a href="<?= site_url('privacy-policy')?>">Privacy Policy.</a>
                                </label>
                            </div>
                        </div>
                        <div class="bTn text-center">
                            <button type="submit" class="webBtn colorBtn">Place order</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- checkout -->


<script type="text/javascript">
    $(function(){
        $(document).on('click', '.checkBlk > .dpBlk .bTn > a', function(){
            $(this).parents('.checkBlk').find('.sideBlk > .blk').slideToggle();
        });
    });
</script>
</main>
<?php $this->load->view('includes/footer'); ?>
</body>
</html>