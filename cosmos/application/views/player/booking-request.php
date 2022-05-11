<!doctype html>
<html>
<head>
    <title>Booking Request – <?= $site_settings->site_name?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>
<body id="home-page">
    <?php get_header() ?>
<main>


<section id="bookNow" data-request>
    <div class="contain">
        <h1 class="secHeading">Booking Request</h1>
        <div class="outer">
            <div class="sideBlk">
                <div class="smalBlk blk">
                    <div class="sumyBlk">
                        <h4 class="color2">PFSC Vacations Details</h4>
                        <h5 class="ovrVew">In the sitter’s home.</h5>
                        <ul class="list">
                            <li>
                                <div>Nights:</div>
                                <div>1</div>
                            </li>
                            <li>
                                <div>Drop-Off Date:</div>
                                <div>
                                    <div>06/08/2020<div>12 AM - 1 AM</div></div>
                                </div>
                            </li>
                            <li>
                                <div>Pick-Up Date:</div>
                                <div>
                                    <div>06/09/2020<div>12 AM - 1 AM</div></div>
                                </div>
                            </li>
                            <li>
                                <div>Pets:</div>
                                <div>Chata kuta, Chotha Kuta, Dusra kuta, New Bili</div>
                            </li>
                        </ul>
                        <div class="tblBlk clcMn">
                            <table>
                                <tbody>
                                    <tr class="no_border">
                                        <td><strong>Holidays stay rate</strong> <small>$45/Night x 4 Pets x 1 Night</small></td>
                                        <td class="price">$180.00</td>
                                    </tr>
                                    <tr class="ext no_border">
                                        <td><strong>Pick-Up and Drop-Off:</strong></td>
                                        <td class="price">$10.00</td>
                                    </tr>
                                    
                                    <tr class="ext no_border">
                                        <td><strong>Bathing and Grooming:</strong></td>
                                        <td class="price">$15.00</td>
                                    </tr>
                                    
                                    <tr class="ext no_border">
                                        <td><strong>Play Dates</strong></td>
                                        <td class="price">$20.00</td>
                                    </tr>
                                    <tr class="ext no_border">
                                        <td><strong>PFSC Service Fee</strong></td>
                                        <td class="price" id="pfscFee">$45.00</td>
                                    </tr>
                                    <tr>
                                        <td class="bold">Subtotal:</td>
                                        <td class="price" id="gttl">$270.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="lblBtn">
                            <input type="checkbox" name="confirm" id="confirm">
                            <label for="confirm">By signing up, I agree to PFSC’s <a href="<?= site_url('terms-conditions')?>">Terms of Service,</a>
                                and
                                <a href="<?= site_url('privacy-policy')?>">Privacy Policy</a>.
                            </label>
                        </div>
                        <!-- <p class="small text-center">Booking and paying on PFSC is required per PFSC's <a href="<?= site_url('terms-conditions')?>">Terms of Service</a> — never pay in cash.</p> -->
                        <div class="bTn">
                            <button type="submit" class="webBtn colorBtn">Book it Now</button>
                        </div>
                        <div class="bTn">
                            <button type="submit" class="webBtn colorBtn red">Reject</button>
                            <button type="submit" class="webBtn colorBtn green">Accept</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dataBlk blk">
                <div class="_header">
                    <h3>Pay with Credit card</h3>
                </div>
                <form action="" method="post">
                    <div class="row formRow">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                            <h4>Name on Card</h4>
                            <input type="text" name="" id="" class="txtBox" placeholder="Name on Card">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                            <h4>Card Number</h4>
                            <input type="text" name="" id="" class="txtBox" placeholder="Card Number">
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 col-xx-3 txtGrp">
                            <h4>Expiration</h4>
                            <input type="text" name="" id="" class="txtBox" placeholder="MM/YYYY">
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 col-xx-3 txtGrp">
                            <h4>CVC?</h4>
                            <input type="text" name="" id="" class="txtBox" placeholder="CVC?">
                        </div>
                    </div>
                    <hr>
                    <h4>Billing Address</h4>
                    <div class="lblBtn txtGrp">
                        <input type="checkbox" name="billing" id="billing">
                        <label for="billing">Use my primary address as the billing address.</label>
                    </div>
                    <div class="row formRow">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                            <h4>Country</h4>
                            <select name="" class="txtBox selectpicker" data-live-search="true">
                                <option value="">Select</option>
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
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 col-xx-8 txtGrp">
                            <h4>Address Line 1</h4>
                            <input type="text" name="" id="" class="txtBox" placeholder="Address Line 1">
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-4 txtGrp">
                            <h4>Apt, Ste, Bldg, (Optional)</h4>
                            <input type="text" name="" id="" class="txtBox" placeholder="Apt, Ste, Bldg">
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-4 txtGrp">
                            <h4>City</h4>
                            <input type="text" name="" id="" class="txtBox" placeholder="City">
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-4 txtGrp">
                            <h4>State</h4>
                            <select name="" class="txtBox selectpicker" data-live-search="true">
                                <option value="">Select</option>
                                <option value="1">1</option>
                                <option value="2">3</option>
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-4 txtGrp">
                            <h4>Zip Code</h4>
                            <input type="text" name="" id="" class="txtBox" placeholder="Zip Code">
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                            <div class="bTn text-right"><button type="button" class="webBtn smBtn colorBtn saveCardBtn">Save Card</button></div>
                        </div>
                    </div>
                    <hr>
                    <h4>Promo Code</h4>
                    <div class="blk promoBlk">
                        <input type="text" name="" id="" class="txtBox" placeholder="Enter Code">
                        <button type="button" class="webBtn">Redeem</button>
                    </div>
                    <p class="txtGrp price_bold">24/7 support when booking through PFSC.</p>
                    <ul class="checkList">
                        <li>All services booked and paid through PFSC are covered by the <a href="<?= site_url('guarantee')?>">PFSC Guarantee</a></li>
                        <li>Access to advice from a qualified veterinary professional through PFSC's Trust & Safety team for your pet during the service.</li>
                    </ul>
                    <!-- <div class="bTn text-center txtGrp">
                        <button type="submit" class="webBtn colorBtn">Request to Book</button>
                    </div>
                    <p class="text-center small">By clicking "Request to Book", you are authorizing payment to your card for this stay. Final charges to your card will occur once the stay is delivered.</p> -->
                </form>
                <!-- <div data-form="main">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="javascript:void(0)" style="display: block;"><img src="https://herosolutions.com.pk/sarim/pfsc/uploads/services/f9a40a4780f5e1306c46f1c8daecee3b_1577441072_8654.svg" alt="PFSC Vacations"><span>PFSC Vacations</span></a></li>
                    </ul>
                    <div id="Drop-in-Visits" class="tab-pane<?= $services[0]->id==$service->id?' active in':'' ?>">
                        <form action="" method="post" autocomplete="off" id="frmBkng" class="frmAjax">
                            <div class="formRow row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <h4>How often do you need this service? (Drop-In)</h4>
                                    <div class="flexGrp">
                                        <button type="button" class="txtBox active" data-days="one-time"><i class="fi-dice"></i> One Time</button>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 active" data-days="one-time">
                                    <div class="formRow row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                            <h4>When would you like to drop-off?</h4>
                                            <p class="txtBox">05/12/2020</p>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                            <h4>Between what time?</h4>
                                            <div class="flexGrp">
                                                <p class="txtBox">From: 01:00</p>
                                                <em>→</em>
                                                <p class="txtBox">To: 01:00</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                            <h4>When would you like to pick-up?</h4>
                                            <p class="txtBox">06/12/2020</p>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                            <h4>Between what time?</h4>
                                            <div class="flexGrp">
                                                <p class="txtBox">From: 01:00</p>
                                                <em>→</em>
                                                <p class="txtBox">To: 01:00</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                            <h4>For these days</h4>
                                            <p class="txtBox">04/24/2020, 04/25/2020, 04/26/2020</p>
                                        </div>
                                    </div>
                                    <div class="formRow row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                            <h4>Add and select preferred times for your visits</h4>
                                            <div class="visitBlk">
                                                <h5>Apr24</h5>
                                                <p class="txtBox"><strong>Visit 1:</strong> 02:00 pm</p>
                                            </div>
                                            <div class="visitBlk">
                                                <h5>Apr25</h5>
                                                <p class="txtBox"><strong>Visit 1:</strong> 02:00 pm</p>
                                            </div>
                                            <div class="visitBlk">
                                                <h5>Apr26</h5>
                                                <p class="txtBox"><strong>Visit 1:</strong> 02:00 pm</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12" data-days="repeat">
                                    <div class="formRow row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                            <h4>For which days?</h4>
                                            <p class="txtBox">Monday, Tuesday, Sunday</p>
                                            <ul class="selectLst daysLst">
                                                <li><div data-checkbox="Sunday" class="lnk">S</div></li>
                                                <li><div data-checkbox="Monday" class="lnk">M</div></li>
                                                <li><div data-checkbox="Tuesday" class="lnk">T</div></li>
                                                <li><div data-checkbox="Wednesday" class="lnk">W</div></li>
                                                <li><div data-checkbox="Thursday" class="lnk">T</div></li>
                                                <li><div data-checkbox="Friday" class="lnk">F</div></li>
                                                <li><div data-checkbox="Saturday" class="lnk">S</div></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                            <h4>Add and select preferred times for your visits</h4>
                                            <div class="visitBlk">
                                                <h5>Monday</h5>
                                                <p class="txtBox"><strong>Visit 1:</strong> 05:00 pm</p>
                                            </div>
                                            <div class="visitBlk">
                                                <h5>Tuesday</h5>
                                                <p class="txtBox"><strong>Visit 1:</strong> 05:00 pm</p>
                                            </div>
                                            <div class="visitBlk">
                                                <h5>Sunday</h5>
                                                <p class="txtBox"><strong>Visit 1:</strong> 05:00 pm</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="petBlk">
                                <h4>My Pets</h4>
                                <div class="dropDown petDropDown">
                                    <ul class="dropCnt dropLst">
                                        <li>
                                            <a><img src="https://herosolutions.com.pk/sarim/pfsc/v/vp/0d7de1aca9299fe63f3e0041f02638a3_1586168550_9178.jpg" alt=""> <span>Chata kuta <small>(American Bully)</small></span></a>
                                        </li>
                                        <li>
                                            <a><img src="https://herosolutions.com.pk/sarim/pfsc/v/vp/05f971b5ec196b8c65b75d2ef8267331_1586168107_1920.jpg" alt=""> <span>Chotha Kuta <small>(American Bully)</small></span></a>
                                        </li>
                                        <li>
                                            <a><img src="https://herosolutions.com.pk/sarim/pfsc/v/vp/11b9842e0a271ff252c1903e7132cd68_1579085007_2678.jpg" alt=""> <span>Dusra kuta <small>(Afghan Hound)</small></span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="txtGrp extraUp">
                                <h4 class="color">Extras and Upgrades</h4>
                                <p>Treat yourself (and your dog) by upgrading your booking</p>
                                <div class="lblBtn">
                                    <p class="txtBox">Pick-up and Drop-off: <strong class="color">$25.00</strong></p>
                                </div>
                                <div class="lblBtn">
                                    <p class="txtBox">Bathing and Grooming: <strong class="color">$15.00</strong></p>
                                </div>
                                <div class="lblBtn">
                                    <p class="txtBox">Would you like the sitter to take your pet on a Play Date? <strong class="color">$20.00</strong></p>
                                </div>
                            </div>
                            <div class="txtGrp">
                                <h4>Notes:</h4>
                                <p class="txtBox">I work from home where I live with my partner Kev and our active fur-child Dusty the Labradoodle. We love dogs and have owned our own and looked after others. When we first came to Tassie we house and pet sat for 3 months, loving every minute with Nellie the corgi x border collie cross.</p>
                            </div>
                            <div class="lblBtn txtGrp">
                                <h4>Receive Photos:</h4>
                                <p class="txtBox">I'd like to receive photos of my pets during this stay.</p>
                            </div>
                        </form>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</section>
<!-- bookNow -->


</main>
<?php $this->load->view('includes/footer');?>
</body>
</html>