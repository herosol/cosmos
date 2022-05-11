<!doctype html>
<html>
<head>
<title>Credit card – Puppy Friends Social Club</title>
<?php require_once('../includes/site-master.php'); ?>
</head>
<body id="home-page">
<?php require_once('../includes/header-buyer.php'); ?>
<main>


<section id="dash">
    <div id="credit">
        <div class="contain">
            <div class="head">
                <h1 class="secHeading">Credit card</h1>
            </div>
            <div class="inBlk">
                <div class="planBlk basic selected">
                    <div class="type semi">Basic</div>
                    <div class="price">$12<em>/Month</em> <small>$130/Year</small></div>
                    <ul class="list">
                        <li>Network Access
                            <span class="info">
                                <i class="fi-question-circle"></i>
                                <div class="infoIn">
                                    <p class="semi">Access to our network of home inspected and insured care providers.</p>
                                </div>
                            </span>
                        </li>
                        <li>Fur Kid is covered
                            <span class="info">
                                <i class="fi-question-circle"></i>
                                <div class="infoIn">
                                    <p class="semi">Membership means your Fur Kid is covered with 0 deductible while in PFSC care.</p>
                                </div>
                            </span>
                        </li>
                        <li>PFSC Hat</li>
                        <li>10% discount on PFSC Merchandise</li>
                        <li>Discounts on PFSC events</li>
                    </ul>
                </div>
                <div class="blk creditBlk">
                    <form action="" method="post">
                        <div class="topHead">
                            <h2 class="color">Pay with Credit card</h2>
                            <ul class="cardLst flex">
                                <li><img src="../images/payment-visa.svg" alt=""></li>
                                <li><img src="../images/payment-master.svg" alt=""></li>
                                <li><img src="../images/payment-american-express.svg" alt=""></li>
                                <li><img src="../images/payment-discover.svg" alt=""></li>
                                <li><img src="../images/payment-jcb.svg" alt=""></li>
                                <li><img src="../images/payment-diners-club.svg" alt=""></li>
                            </ul>
                        </div>
                        <div class="row formRow">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                <input type="text" name="" id="" class="txtBox" placeholder="Card Number">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                <input type="text" name="" id="" class="txtBox" placeholder="Card Holder">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                <select name="" id="" class="txtBox selectpicker">
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
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                <select name="" id="" class="txtBox selectpicker">
                                    <option value="Year">Year</option>
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
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                <input type="text" name="" id="" class="txtBox" placeholder="CVC?">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                <div class="lblBtn">
                                    <input type="checkbox" name="confirm" id="confirm">
                                    <label for="confirm">By clicking "<strong>Submit</strong>", I agree to PFSC’s
                                        <a href="<?= $baseurl ?>terms-and-conditions.php">Terms & Conditions</a>
                                        and
                                        <a href="<?= $baseurl ?>privacy-policy.php">Privacy Policy.</a>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="bTn">
                            <button type="submit" class="webBtn colorBtn">Submit Payment <i class="fi-arrow-right"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- dash -->


</main>
<?php require_once('../includes/footer.php');?>
</body>
</html>