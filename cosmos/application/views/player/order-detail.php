<!doctype html>
<html>
<head>
<title>Order Detail – <?= $site_settings->site_name?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>
<body id="home-page">
    <?php get_header(); ?>
<main>


<section id="dash">
    <div id="orders">
    	<div class="contain">
            <div class="head">
                <h1 class="secHeading">Order Detail</h1>
            </div>
            <div class="blk">
                <div class="_header">
                    <h3>Order Detail</h3>
                </div>
                <div class="flexRow flex">
                    <div class="col col1">
                        <h4>Address information</h4>
                        <ul class="list">
                            <li>
                                <strong>Name:</strong>
                                <em>John Wick</em>
                            </li>
                            <li>
                                <strong>Email Address:</strong>
                                <em>johnwick857@gmail.com</em>
                            </li>
                            <li>
                                <strong>Phone Number:</strong>
                                <em>+1239746564</em>
                            </li>
                            <li>
                                <strong>City/State:</strong>
                                <em>California</em>
                            </li>
                            <li>
                                <strong>Zip Code:</strong>
                                <em>40100</em>
                            </li>
                            <li>
                                <strong>Address:</strong>
                                <em>70 east sunrise highway, V35 - 80 Dto 1070-020 Lisboa, New York 11581.</em>
                            </li>
                            <li>
                                <strong>Country:</strong>
                                <em>USA</em>
                            </li>
                        </ul>
                        <hr>
                        <h4>Shipping information</h4>
                        <ul class="list">
                            <li>
                                <strong>Contact person:</strong>
                                <em>Jennifer Kem</em>
                            </li>
                            <li>
                                <strong>Contact person phone:</strong>
                                <em>+1239746564</em>
                            </li>
                            <li>
                                <strong>City/State:</strong>
                                <em>California</em>
                            </li>
                            <li>
                                <strong>Postal Code:</strong>
                                <em>40100</em>
                            </li>
                            <li>
                                <strong>Address:</strong>
                                <em>70 east sunrise highway, V35 - 80 Dto 1070-020 Lisboa, New York 11581.</em>
                            </li>
                        </ul>
                    </div>
                    <div class="col col2">
                        <h4>Order Delivery Info</h4>
                        <div class="blk">
                            <form action="" method="post">
                                <div class="txtGrp">
                                    <h4>Tracking No</h4>
                                    <input type="text" name="" id="" class="txtBox" placeholder="Tracking No">
                                </div>
                                <div class="txtGrp">
                                    <h4>Vendor</h4>
                                    <input type="text" name="" id="" class="txtBox" placeholder="Vendor">
                                </div>
                                <div class="txtGrp">
                                    <h4>Comments</h4>
                                    <textarea type="text" name="" id="" class="txtBox" placeholder="Write something here"></textarea>
                                </div>
                                <div class="bTn text-center">
                                    <button type="submit" class="webBtn colorBtn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="blk">
                <div class="_header">
                    <h3>Order Detail</h3>
                </div>
                <div class="flexRow flex">
                    <div class="col col1">
                        <h4>Address information</h4>
                        <ul class="list">
                            <li>
                                <strong>Name:</strong>
                                <em>John Wick</em>
                            </li>
                            <li>
                                <strong>Email Address:</strong>
                                <em>johnwick857@gmail.com</em>
                            </li>
                            <li>
                                <strong>Phone Number:</strong>
                                <em>+1239746564</em>
                            </li>
                            <li>
                                <strong>City/State:</strong>
                                <em>California</em>
                            </li>
                            <li>
                                <strong>Zip Code:</strong>
                                <em>40100</em>
                            </li>
                            <li>
                                <strong>Address:</strong>
                                <em>70 east sunrise highway, V35 - 80 Dto 1070-020 Lisboa, New York 11581.</em>
                            </li>
                            <li>
                                <strong>Country:</strong>
                                <em>USA</em>
                            </li>
                        </ul>
                        <hr>
                        <h4>Shipping information</h4>
                        <ul class="list">
                            <li>
                                <strong>Contact person:</strong>
                                <em>Jennifer Kem</em>
                            </li>
                            <li>
                                <strong>Contact person phone:</strong>
                                <em>+1239746564</em>
                            </li>
                            <li>
                                <strong>City/State:</strong>
                                <em>California</em>
                            </li>
                            <li>
                                <strong>Postal Code:</strong>
                                <em>40100</em>
                            </li>
                            <li>
                                <strong>Address:</strong>
                                <em>70 east sunrise highway, V35 - 80 Dto 1070-020 Lisboa, New York 11581.</em>
                            </li>
                        </ul>
                    </div>
                    <div class="col col2">
                        <h4>Order Delivery Info</h4>
                        <div class="blk">
                            <div class="txtGrp">
                                <h4>Tracking No</h4>
                                <p>AJ789POL</p>
                            </div>
                            <div class="txtGrp">
                                <h4>Vendor</h4>
                                <p>John Wick</p>
                            </div>
                            <div class="txtGrp">
                                <h4>Comments</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae repellat aut quibusdam consequuntur beatae, sequi eum, minus quisquam soluta exercitationem deleniti enim consequatur at a provident, nesciunt tempora temporibus sed.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="blk" id="shopTbl">
                <div class="shopTable">
                    <table>
                        <thead>
                            <tr>
                                <th colspan="2">Product</th>
                                <th width="120">Quantity</th>
                                <th width="100">Price</th>
                                <th width="100">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td data-title="Product">
                                    <div class="pro_cart">
                                        <div class="ico"><img src="<?= base_url('assets/images/store/1.jpg')?>" alt=""></div>
                                        <div class="pro_name">
                                            <h4>Annie's Organic Fruit Snacks</h4>
                                            <p>Variety Pack, 42 x 0.8 oz</p>
                                        </div>
                                    </div>
                                </td>
                                <td data-title="Review"><button type="button" class="webBtn smBtn popBtn" data-popup="leave-review">Leave Review</button></td>
                                <td data-title="Quantity">1</td>
                                <td data-title="Price">
                                    <div class="price">$19.90</div>
                                </td>
                                <td data-title="Total">
                                    <div class="price">$19.90</div>
                                </td>
                            </tr>
                            <tr>
                                <td data-title="Product">
                                    <div class="pro_cart">
                                        <div class="ico"><img src="<?= base_url('assets/images/store/5.jpg')?>" alt=""></div>
                                        <div class="pro_name">
                                            <h4>Prince & Spring Jackpot Popcorn Sea Salt</h4>
                                            <p>Single Size, 24 Bags</p>
                                        </div>
                                    </div>
                                </td>
                                <td data-title="Review"><button type="button" class="webBtn smBtn popBtn" data-popup="leave-review">Leave Review</button></td>
                                <td data-title="Quantity">2</td>
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
            </div>
        </div>
        <div class="popup" data-popup="leave-review">
            <div class="tableDv">
                <div class="tableCell">
                    <div class="contain">
                        <div class="_inner">
                            <div class="crosBtn"></div>
                            <h2>Leave Feedback</h2>
                            <form action="" method="post">
                                <div class="jobBlk">
                                    <ul class="lst">
                                        <li>
                                            <div class="icoBlk">
                                                <div class="ico"><img src="<?= base_url('assets/images/store/2.jpg')?>" alt=""></div>
                                                <div class="name">Annie's Organic Fruit Snacks <div class="rateYo" data-rateyo-star-width="20px"></div></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="txtGrp">
                                    <h4>Description</h4>
                                    <textarea name="" id="" class="txtBox" placeholder="Write a little description"></textarea>
                                </div>
                                <div class="bTn text-center">
                                    <button type="submit" class="webBtn colorBtn">Submit</button>
                                </div>
                            </form>
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