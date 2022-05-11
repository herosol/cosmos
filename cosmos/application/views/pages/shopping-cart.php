<!doctype html>
<html>
<head>
    <title><?= !empty($site_content['page_title'])?$site_content['page_title'].' - ':'Shopping cart - '?><?= $site_settings->site_name?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>
<body id="home-page">
    <?php get_header(); ?>
<main>


<section id="cart" class="common">
    <div class="contain">
        <form method="post" action="<?= site_url('checkout')?>">
            <div class="blk">
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
                                        <div class="ico"><img src="<?= base_url('assets/images/users/1.jpg')?>" alt=""></div>
                                        <div class="pro_name">
                                            <h4>Annie's Organic Fruit Snacks</h4>
                                            <p>Variety Pack, 42 x 0.8 oz</p>
                                        </div>
                                    </div>
                                </td>
                                <td data-title="Quantity">
                                    <input type="text" name="qty" value="1" class="qty">
                                </td>
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
                                        <div class="ico"><img src="<?= base_url('assets/images/users/5.jpg')?>" alt=""></div>
                                        <div class="pro_name">
                                            <h4>Prince & Spring Jackpot Popcorn Sea Salt</h4>
                                            <p>Single Size, 24 Bags</p>
                                        </div>
                                    </div>
                                </td>
                                <td data-title="Quantity">
                                    <input type="text" name="qty" value="1" class="qty">
                                </td>
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
                                        <div class="ico"><img src="<?= base_url('assets/images/users/3.jpg')?>" alt=""></div>
                                        <div class="pro_name">
                                            <h4>Utz Braided Honey Wheat Twists Pretzels</h4>
                                            <p>Single Size, 24 Bags</p>
                                        </div>
                                    </div>
                                </td>
                                <td data-title="Quantity">
                                    <input type="text" name="qty" value="1" class="qty">
                                </td>
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
                                        <div class="ico"><img src="<?= base_url('assets/images/users/7.jpg')?>" alt=""></div>
                                        <div class="pro_name">
                                            <h4>BOOMCHICKAPOP Sea Salt Popcorn</h4>
                                            <p>Single Size, 24 Bags</p>
                                        </div>
                                    </div>
                                </td>
                                <td data-title="Quantity">
                                    <input type="text" name="qty" value="1" class="qty">
                                </td>
                                <td data-title="Price">
                                    <div class="price">$8.79</div>
                                </td>
                                <td data-title="Total">
                                    <div class="price">$8.79</div>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot class="semi">
                            <tr>
                                <td colspan="4">Shipping:</td>
                                <td><span class="price">$19.00</span></td>
                            </tr>
                            <tr>
                                <td colspan="4">Subtotal:</td>
                                <td><span class="price">$208.00</span></td>
                            </tr>
                            <tr>
                                <td colspan="4">Total:</td>
                                <td><span class="price">$208.00</span></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="bTn text-right">
                    <a href="<?= site_url('merchandise')?>" class="webBtn">Continue Shopping</a>
                    <button type="submit" class="webBtn colorBtn">Proceed</button>
                </div>
            </div>
        </form>
        <div class="policyBlk">
            <h1 class="secHeading">Buy with Confidence</h1>
            <ul class="list flex">
                <li>
                    <div class="inner">
                        <h4>Return Policy</h4>
                        <p>If you’re not happy with your purchase, rest assured, we offer a 30 day return policy that starts from the day you receive your computer. Every desktop ships with a standard 3 year limited warranty backed with lifetime U.S. based toll free technical support.</p>
                    </div>
                </li>
                <li>
                    <div class="inner">
                        <h4>Secure</h4>
                        <p>All of your information that is submitted over the web to our secure server is protected with a industry safe 128 bit encryption code and backed with $250,000 consumer protection. All of our servers are certified with a SSL (Secure Server Certificate) and scanned and certified daily by McAfee's HackerSafe service.</p>
                    </div>
                </li>
                <li>
                    <div class="inner">
                        <h4>Complete Privacy</h4>
                        <p>Digital Storm values your privacy. We will never share, sell, or rent any of your personal information to any outside party. For more information about how we handle your information, please view our <a href="<?= site_url('privacy-policy')?>" target="_blank">Privacy Policy</a>.</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</section>
<!-- cart -->


</main>
<?php $this->load->view('includes/footer'); ?>
</body>
</html>