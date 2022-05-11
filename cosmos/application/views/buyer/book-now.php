<!doctype html>
<html>
<head>
    <title>Book Now – <?= $site_settings->site_name?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>
<body id="home-page">
    <?php get_header() ?>
<main>


<section id="bookNow">
    <div class="contain">
        <h1 class="secHeading">Book Now</h1>
        <div class="outer">
            <div class="sideBlk">
                <div class="smalBlk blk">
                    <div class="proBlk srchItm">
                        <div class="icoBlk">
                            <div class="ico"><img src="<?= get_image_src($row->mem_image, 150, true)?>" alt="<?= format_name($row->mem_fname, $row->mem_lname)?>"></div>
                            <div class="rateBlk">
                                <div class="rating"><div class="rateYo" data-rateyo-rating="<?= $avg_mem_rating?>" data-rateyo-read-only="true"></div><!-- <span><?= $review_count?></span> --></div>
                            </div>
                        </div>
                        <div class="txt">
                            <h2>
                                <?= format_name($row->mem_fname, $row->mem_lname)?>
                                <?php if (!empty($row->mem_bg_check)): ?>
                                    <span class="bg_check">
                                        <em><strong>Verified Background Check</strong>This sitter has successfully passed a basic background check by a third party provider.</em>
                                    </span>
                                <?php endif ?>
                                <?php if (!empty($pkg_row->membership)): ?>
                                    <span class="mem_check">
                                        <em><strong>Membership Approved</strong>This sitter has approved PFSC membership.</em>
                                    </span>
                                <?php endif ?>
                                <?php if (!empty($row->mem_inspected)): ?>
                                    <span class="home_inspect">
                                        <em><strong>Home Inspected</strong>This sitter has has been inspected.</em>
                                    </span>
                                <?php endif ?>
                            </h2>
                            <div class="slogan"><?= $row->mem_profile_heading?></div>
                            <div class="locate"><?= $row->mem_city?>, <?= $row->mem_state?>, <?= $row->mem_zip?></div>
                            <div class="price"><em><?= $services[0]->price?></em><small>/<?= $services[0]->price_label?></small></div>
                            <!-- <h4>Subtotal: <span class="color">$ <em id="gttl"><?= $services[0]->price?></em></span></h4> -->
                            <p id="plcy">Cancellation policy: <span class="txt_info color2"><?= ucfirst($services[0]->cancellation_policy)?><em><strong><?= ucfirst($services[0]->cancellation_policy)?></strong><?= $policies[ucfirst($services[0]->cancellation_policy)]?></em></span></p>
                        </div>
                    </div>
                    <div class="sumyBlk">
                        <h4 class="color2"><?= $services[0]->title?> Details</h4>
                        <h5 class="ovrVew"><?= $services[0]->price_overview?></h5>
                        <ul class="list">
                        </ul>
                        <div class="tblBlk clcMn">
                            <table>
                                <tbody>
                                    <!-- <tr id="adtnlPts" class="no_border hidden">
                                        <td>Additional Dogs <small>$0.00 x 1</small></td>
                                        <td class="price">$0.00</td>
                                    </tr>
                                    <tr id="puppies" class="no_border hidden">
                                        <td>Puppies <small>$0.00 x 1</small></td>
                                        <td class="price">$0.00</td>
                                    </tr>
                                    <tr id="adtnlCats" class="no_border">
                                        <td>Additional Cats <small>$0.00 x 1</small></td>
                                        <td class="price">$0.00</td>
                                    </tr>
                                    <tr id="cats">
                                        <td>Cats <small>$0.00 x 1</small></td>
                                        <td class="price">$0.00</td>
                                    </tr>
                                    <tr>
                                        <td>PFSC Service Fee</td>
                                        <td class="price" id="pfscFee">$0.00</td>
                                    </tr>
                                    <tr>
                                        <td class="bold">Subtotal:</td>
                                        <td class="price" id="gttl">$0.00</td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <ul class="faqLst blk">
                    <!-- <?php foreach ($help_questions as $key => $help_question): ?>
                        <li>
                            <h4><a href="<?= site_url('help-detail/'.$help_question->id)?>" target="_blank"><?= $help_question->title?></a></h4>
                            <i class="fi-external-link"></i>
                            <div class="cntnt">
                                <p><?= short_text($help_question->detail)?></p>
                            </div>
                        </li>
                    <?php endforeach ?> -->
                    <li>
                        <h4><a href="?" target="_blank">How can I cancel an arrangement?</a></h4>
                        <i class="fi-external-link"></i>
                    </li>
                    <li>
                        <h4><a href="?" target="_blank">Where are my payment details?</a></h4>
                        <i class="fi-external-link"></i>
                    </li>
                    <li>
                        <h4><a href="?" target="_blank">How do I contact the sitter?</a></h4>
                        <i class="fi-external-link"></i>
                    </li>
                    <li>
                        <h4><a href="?" target="_blank">How are the fees calculated?</a></h4>
                        <i class="fi-external-link"></i>
                    </li>
                </ul>
            </div>
            <div class="dataBlk blk">
                <div data-form="main">
                    <ul class="nav nav-tabs">
                        <?php foreach ($services as $key => $service): ?>
                            <?php if ($service->id==1): ?>
                                <li <?= $services[0]->id==$service->id?' class="active"':'' ?>><a data-toggle="tab" href="#PFSC-Vacations"><img src="<?= get_site_image_src("services",$service->image);?>" alt="<?= $service->title?>"><span><?= $service->title?></span></a></li>
                            <?php endif ?>
                            <?php if ($service->id==2): ?>
                                <li <?= $services[0]->id==$service->id?' class="active"':'' ?>><a data-toggle="tab" href="#House-Sitting"><img src="<?= get_site_image_src("services",$service->image);?>" alt="<?= $service->title?>"><span><?= $service->title?></span></a></li>
                            <?php endif ?>
                            <?php if ($service->id==3): ?>
                                <li <?= $services[0]->id==$service->id?' class="active"':'' ?>><a data-toggle="tab" href="#Drop-in-Visits"><img src="<?= get_site_image_src("services",$service->image);?>" alt="<?= $service->title?>"><span><?= $service->title?> <!-- Drop-in Visits<!-- <em> / Dog Walking</em> --></span></a></li>
                            <?php endif ?>
                            <?php if ($service->id==4): ?>
                                <li <?= $services[0]->id==$service->id?' class="active"':'' ?>><a data-toggle="tab" href="#PFSC-Day-Care"><img src="<?= get_site_image_src("services",$service->image);?>" alt="<?= $service->title?>"><span><?= $service->title?></span></a></li>
                            <?php endif ?>
                            <?php if ($service->id==5): ?>
                                <li <?= $services[0]->id==$service->id?' class="active"':'' ?>><a data-toggle="tab" href="#Grooming-and-Baths"><img src="<?= get_site_image_src("services",$service->image);?>" alt="<?= $service->title?>"><span><?= $service->title?></span></a></li>
                            <?php endif ?>
                        <?php endforeach ?>
                    </ul>
                    <div class="tab-content">
                        <?php
                            $time_option = show_time_option();
                            if ($services[count($services)-1]->id == 5)
                                $pfsc_service = $services[count($services)-1];
                        ?>
                        <?php foreach ($services as $key => $service): ?>
                            <?php if ($service->id==1): ?>
                                <div id="PFSC-Vacations" class="tab-pane<?= $services[0]->id==$service->id?' active in':'' ?>">
                                    <form action="" method="post" autocomplete="off" id="frmBkng" class="frmAjax">
                                        <input type="hidden" name="service" value="<?= $service->id?>">
                                        <div class="formRow row">
                                            <!-- <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-12 txtGrp">
                                                <h4>PFSC Vacations near</h4>
                                                <input type="text" name="zip" class="txtBox" placeholder="Zip code">
                                            </div> -->
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                                <h4>When would you like to drop-off?</h4>
                                                <input type="text" name="dropoff_date" class="txtBox datepicker" placeholder="Drop off"<?= $not_avail_days==''?'':' data-date-days-of-week-disabled="'.$not_avail_days.'"'?> data-date-start-date="0d" readonly="">
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                                <h4>Between what time?</h4>
                                                <div class="flexGrp">
                                                    <select name="dropoff_from_time1" class="txtBox selectpicker time">
                                                        <option disabled="" selected="">From</option>
                                                        <?= $time_option?>
                                                    </select>
                                                    <em>&#8594;</em>
                                                    <select name="dropoff_to_time1" class="txtBox selectpicker time">
                                                        <option disabled="" selected="">To</option>
                                                        <?= $time_option?>
                                                    </select>
                                                </div>
                                                <!-- <div class="flexGrp">
                                                    <input type="text" name="dropoff_from_time1" class="txtBox timepicker" placeholder="From">
                                                    <em>&#8594;</em>
                                                    <input type="text" name="dropoff_to_time1" class="txtBox timepicker" placeholder="To">
                                                </div> -->
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                                <h4>When would you like to pick-up?</h4>
                                                <input type="text" name="pickup_date" class="txtBox datepicker" placeholder="Pick up"<?= $not_avail_days==''?'':' data-date-days-of-week-disabled="'.$not_avail_days.'"'?> data-date-start-date="0d" readonly="">
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                                <h4>Between what time?</h4>
                                                <div class="flexGrp">
                                                    <select name="pickup_from_time1" class="txtBox selectpicker time">
                                                        <option disabled="" selected="">From</option>
                                                        <?= $time_option?>
                                                    </select>
                                                    <em>&#8594;</em>
                                                    <select name="pickup_to_time1" class="txtBox selectpicker time">
                                                        <option disabled="" selected="">To</option>
                                                        <?= $time_option?>
                                                    </select>
                                                </div>
                                                <!-- <div class="flexGrp">
                                                    <input type="text" name="pickup_from_time1" class="txtBox timepicker" placeholder="From">
                                                    <em>&#8594;</em>
                                                    <input type="text" name="pickup_to_time1" class="txtBox timepicker" placeholder="To">
                                                </div> -->
                                            </div>
                                        </div>
                                        <div class="petBlk">
                                            <h4>My Pets</h4>
                                            <!-- <select name="pet" class="txtBox petListing selectpicker" multiple title="Select Pets">
                                            </select> -->
                                            <div class="dropDown petDropDown">
                                                <div class="dropBtn txtBox">
                                                    <ul class="dropLst">
                                                        <li>Select Pets</li>
                                                    </ul>
                                                </div>
                                                <ul class="dropCnt dropLst">
                                                </ul>
                                                <input type="hidden" name="pets" value="">
                                            </div>
                                        </div>
                                        <div class="txtGrp">
                                            <a href="javascript:void(0)" class="newPet popBtn" data-popup="add-pet">+ Add another pet</a>
                                        </div>
                                        <div class="txtGrp extraUp">
                                            <h4 class="color">Extras and Upgrades</h4>
                                            <p>Treat yourself (and your dog) by upgrading your booking</p>
                                            <div class="txtGrp">
                                                <div class="lblBtn">
                                                    <input type="checkbox" name="pickdrop_extra" id="pickdrop_extra1" class="extra" data-pckup="sure" value="<?= $service->pick_drop_rate_plus?>">
                                                    <label for="pickdrop_extra1"><em>Pick-Up and Drop-Off: <strong class="color"><?= format_amount($service->pick_drop_rate_plus)?></strong></em>
                                                        <small>Save a trip and have your sitter pick up and drop off your dog at the beginning and end of their stay (Rate is for one round trip).</small>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="txtGrp">
                                                <div class="lblBtn">
                                                    <input type="checkbox" name="bathgroom_extra" id="bathgroom_extra1" class="extra" value="<?= empty($service->bathing_is_free)?$service->bathing_rate_plus:0;?>">
                                                    <label for="bathgroom_extra1"><em>Bathing and Grooming: <strong class="color"><?= empty($service->bathing_is_free)?format_amount($service->bathing_rate_plus):'Free';?></strong></em>
                                                        <small>Let the sitter help your pup relax with a gentle, all natural, organic shampoo and conditioning treatment, including the basics, ear cleaning, brush/detangle, hand blow out and de-shed, as well as a breed specific cut to your specifications.</small>
                                                    </label>
                                                </div>
                                            </div>
                                            <?php if ($pfsc_service): ?>
                                                <div class="txtGrp">
                                                    <!-- <h4>Play Dates</h4> -->
                                                    <div class="lblBtn">
                                                        <input type="checkbox" name="playdate_extra" id="playdate_extra1" class="extra" value="<?= $pfsc_service->price?>">
                                                        <label for="playdate_extra1"><em>Play Dates <strong class="color"><?= format_amount($pfsc_service->price)?></strong></em>
                                                            <small>Sitter will bring their fur kid to play with yours for a few hours while you are at work, all play dates must be with dogs of similar breeds and size.</small>
                                                        </label>
                                                    </div>
                                                </div>
                                            <?php endif ?>
                                        </div>
                                        <div class="txtGrp">
                                            <textarea name="detail" id="detail" class="txtBox" placeholder="Share a little info" required=""></textarea>
                                        </div>
                                        <div class="lblBtn txtGrp">
                                            <input type="checkbox" name="photos" id="photos" value="1">
                                            <label for="photos">I'd like to receive photos of my pets during this stay.</label>
                                        </div>
                                        <div class="bTn text-center txtGrp">
                                            <button type="submit" class="webBtn colorBtn">Submit Request  <i class="spinner hidden"></i></button>
                                        </div>
                                        <div class="alertMsg"></div>
                                        <p class="text-center small">Contact <?= format_name($row->mem_fname, $row->mem_lname)?> for free without obligation. You decide when to finalize the booking by paying with PFSC. All bookings are covered by The PFSC Guarantee, which includes veterinary coverage and more.</p>
                                    </form>
                                </div>
                            <?php endif ?>
                            <?php if ($service->id==2): ?>
                                <div id="House-Sitting" class="tab-pane<?= $services[0]->id==$service->id?' active in':'' ?>">
                                    <form action="" method="post" autocomplete="off" id="frmBkng" class="frmAjax">
                                        <input type="hidden" name="service" value="<?= $service->id?>">
                                        <div class="formRow row">
                                            <!-- <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-12 txtGrp">
                                                <h4>House Sitting near</h4>
                                                <input type="text" name="zip" class="txtBox" placeholder="Zip code">
                                            </div> -->
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                                <h4>When would you like to drop-off?</h4>
                                                <input type="text" name="start_date" class="txtBox datepicker" placeholder="Start date"<?= $not_avail_days==''?'':' data-date-days-of-week-disabled="'.$not_avail_days.'"'?> data-date-start-date="0d" readonly="">
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                                <h4>Between what time?</h4>
                                                <div class="flexGrp">
                                                    <select name="dropoff_from_time2" class="txtBox selectpicker time">
                                                        <option disabled="" selected="">From</option>
                                                        <?= $time_option?>
                                                    </select>
                                                    <em>&#8594;</em>
                                                    <select name="dropoff_to_time2" class="txtBox selectpicker time">
                                                        <option disabled="" selected="">To</option>
                                                        <?= $time_option?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                                <h4>When would you like to pick-up?</h4>
                                                <input type="text" name="end_date" class="txtBox datepicker" placeholder="End date"<?= $not_avail_days==''?'':' data-date-days-of-week-disabled="'.$not_avail_days.'"'?> data-date-start-date="0d" readonly="">
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                                <h4>Between what time?</h4>
                                                <div class="flexGrp">
                                                    <select name="pickup_from_time2" class="txtBox selectpicker time">
                                                        <option disabled="" selected="">From</option>
                                                        <?= $time_option?>
                                                    </select>
                                                    <em>&#8594;</em>
                                                    <select name="pickup_to_time2" class="txtBox selectpicker time">
                                                        <option disabled="" selected="">To</option>
                                                        <?= $time_option?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="petBlk">
                                            <h4>My Pets</h4>
                                            <!-- <select name="pet" class="txtBox petListing selectpicker" multiple title="Select Pets">
                                            </select> -->
                                            <div class="dropDown petDropDown">
                                                <div class="dropBtn txtBox">
                                                    <ul class="dropLst">
                                                        <li>Select Pets</li>
                                                    </ul>
                                                </div>
                                                <ul class="dropCnt dropLst">
                                                </ul>
                                                <input type="hidden" name="pets" value="">
                                            </div>
                                        </div>
                                        <div class="txtGrp">
                                            <a href="javascript:void(0)" class="newPet popBtn" data-popup="add-pet">+ Add another pet</a>
                                        </div>
                                        <div class="txtGrp extraUp">
                                            <h4 class="color">Extras and Upgrades</h4>
                                            <p>Treat yourself (and your dog) by upgrading your booking</p>
                                            <div class="txtGrp">
                                                <div class="lblBtn">
                                                    <input type="checkbox" name="bathgroom_extra" id="bathgroom_extra2" class="extra" value="<?= empty($service->bathing_is_free)?$service->bathing_rate_plus:0;?>">
                                                    <label for="bathgroom_extra2"><em>Bathing and Grooming: <strong class="color"><?= empty($service->bathing_is_free)?format_amount($service->bathing_rate_plus):'Free';?></strong></em>
                                                        <small>Let the sitter help your pup relax with a gentle, all natural, organic shampoo and conditioning treatment, including the basics, ear cleaning, brush/detangle, hand blow out and de-shed, as well as a breed specific cut to your specifications.</small>
                                                    </label>
                                                </div>
                                            </div>
                                            <?php if ($pfsc_service): ?>
                                                <div class="txtGrp">
                                                    <!-- <h4>Play Dates</h4> -->
                                                    <div class="lblBtn">
                                                        <input type="checkbox" name="playdate_extra" id="playdate_extra2" class="extra" value="<?= $pfsc_service->price?>">
                                                        <label for="playdate_extra2"><em>Play Dates <strong class="color"><?= format_amount($pfsc_service->price)?></strong></em>
                                                            <small>Sitter will bring their fur kid to play with yours for a few hours while you are at work, all play dates must be with dogs of similar breeds and size.</small>
                                                        </label>
                                                    </div>
                                                </div>
                                            <?php endif ?>
                                        </div>
                                        <div class="txtGrp">
                                            <textarea name="detail" id="detail" class="txtBox" placeholder="Tell them about your home and why they’ll enjoy staying at your place - remember to mention any extra responsibilities they’ll have while they’re there" required=""></textarea>
                                        </div>
                                        <div class="lblBtn txtGrp">
                                            <input type="checkbox" name="photos" id="photos" value="1">
                                            <label for="photos">I'd like to receive photos of my pets during this stay.</label>
                                        </div>
                                        <div class="bTn text-center txtGrp">
                                            <button type="submit" class="webBtn colorBtn">Submit Request  <i class="spinner hidden"></i></button>
                                        </div>
                                        <div class="alertMsg"></div>
                                        <p class="text-center small">Contact <?= format_name($row->mem_fname, $row->mem_lname)?> for free without obligation. You decide when to finalize the booking by paying with PFSC. All bookings are covered by The PFSC Guarantee, which includes veterinary coverage and more.</p>
                                    </form>
                                </div>
                            <?php endif ?>
                            <?php if ($service->id==3): ?>
                                <div id="Drop-in-Visits" class="tab-pane<?= $services[0]->id==$service->id?' active in':'' ?>">
                                    <form action="" method="post" autocomplete="off" id="frmBkng" class="frmAjax">
                                        <input type="hidden" name="service" value="<?= $service->id?>">
                                        <div class="formRow row">
                                            <!-- <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-12 txtGrp">
                                                <h4>Drop-In Visits near</h4>
                                                <input type="text" name="zip" class="txtBox" placeholder="Zip code">
                                            </div> -->
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                                <h4>How often do you need this service? (Drop-In)</h4>
                                                <div class="flexGrp">
                                                    <button type="button" class="txtBox active" data-days="one-time"><i class="fi-dice"></i> One Time</button>
                                                    <em></em>
                                                    <button type="button" class="txtBox" data-days="repeat"><i class="fi-sync"></i> <em>Repeat</em> Weekly</button>
                                                    <input type="hidden" name="days_type" value="one-time">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 active" data-days="one-time">
                                                <div class="formRow row">
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-4 txtGrp">
                                                        <h4>For these days</h4>
                                                        <input type="text" name="dates" class="txtBox multidatepicker" placeholder="Select Dates"<?= $not_avail_days==''?'':' data-date-days-of-week-disabled="'.$not_avail_days.'"'?> data-date-start-date="0d" readonly="">
                                                    </div>
                                                </div>
                                                <div class="formRow row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                                        <!-- <h4>Add and select preferred times for your visits</h4>
                                                        <div class="visitBlk">
                                                            <h5>Apr24</h5>
                                                            <ul class="flex">
                                                                <li><input type="text" name="" id="" class="txtBox timepicker" placeholder="Select Time"><i class="fi-trash"></i></li>
                                                            </ul>
                                                            <a href="javascript:void(0)"><i class="fi-plus"></i> Add a visit</a>
                                                        </div> -->
                                                    </div>
                                                </div>
                                                <!-- <h4>For these days</h4>
                                                <div class="flexGrp">
                                                    <input type="text" name="start_date" class="txtBox datepicker" placeholder="Select Dates"<?= $not_avail_days==''?'':' data-date-days-of-week-disabled="'.$not_avail_days.'"'?> data-date-start-date="0d" readonly="">
                                                    <em>&#8594;</em>
                                                    <input type="text" name="end_date" class="txtBox datepicker" placeholder="End date"<?= $not_avail_days==''?'':' data-date-days-of-week-disabled="'.$not_avail_days.'"'?> data-date-start-date="0d" readonly="">
                                                </div> -->
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12" data-days="repeat">
                                                <div class="formRow row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                                        <h4>For which days?</h4>
                                                        <ul class="selectLst daysLst">
                                                            <li><div data-checkbox="Sunday" class="lnk">S</div></li>
                                                            <li><div data-checkbox="Monday" class="lnk">M</div></li>
                                                            <li><div data-checkbox="Tuesday" class="lnk">T</div></li>
                                                            <li><div data-checkbox="Wednesday" class="lnk">W</div></li>
                                                            <li><div data-checkbox="Thursday" class="lnk">T</div></li>
                                                            <li><div data-checkbox="Friday" class="lnk">F</div></li>
                                                            <li><div data-checkbox="Saturday" class="lnk">S</div></li>
                                                        </ul>
                                                        <input type="hidden" name="days" value="">
                                                    </div>
                                                    <!-- <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-5 txtGrp">
                                                        <h4>Start date</h4>
                                                        <input type="text" name="rstart_date" class="txtBox datepicker" placeholder="Start date"<?= $not_avail_days==''?'':' data-date-days-of-week-disabled="'.$not_avail_days.'"'?> data-date-start-date="0d" readonly="">
                                                    </div> -->
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                                        <!-- <h4>Add and select preferred times for your visits</h4>
                                                        <div class="visitBlk">
                                                            <h5>Monday</h5>
                                                            <ul class="flex">
                                                                <li><input type="text" name="" id="" class="txtBox timepicker" placeholder="Select Time"><i class="fi-trash"></i></li>
                                                            </ul>
                                                            <a href="javascript:void(0)"><i class="fi-plus"></i> Add a visit</a>
                                                        </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="petBlk">
                                            <h4>My Pets</h4>
                                            <!-- <select name="pet" class="txtBox petListing selectpicker" multiple title="Select Pets">
                                            </select> -->
                                            <div class="dropDown petDropDown">
                                                <div class="dropBtn txtBox">
                                                    <ul class="dropLst">
                                                        <li>Select Pets</li>
                                                    </ul>
                                                </div>
                                                <ul class="dropCnt dropLst">
                                                </ul>
                                                <input type="hidden" name="pets" value="">
                                            </div>
                                        </div>
                                        <div class="txtGrp">
                                            <a href="javascript:void(0)" class="newPet popBtn" data-popup="add-pet">+ Add another pet</a>
                                        </div>
                                        <div class="txtGrp extraUp">
                                            <h4 class="color">Extras and Upgrades</h4>
                                            <p>Treat yourself (and your dog) by upgrading your booking</p>
                                            <div class="txtGrp">
                                                <div class="lblBtn">
                                                    <input type="checkbox" name="sixty_minut_extra" id="sixty_minut_extra3" class="extra" value="<?= $service->sixty_minute_rate_plus ?>">
                                                    <label for="sixty_minut_extra3"><em>60 Minute rate: <strong class="color"><?= format_amount($service->sixty_minute_rate_plus)?></strong></em>
                                                        <small>Add an extra 30 minutes to each scheduled visit for a total of 60 minutes per visit.</small>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="txtGrp">
                                                <div class="lblBtn">
                                                    <input type="checkbox" name="bathgroom_extra" id="bathgroom_extra3" class="extra" value="<?= empty($service->bathing_is_free)?$service->bathing_rate_plus:0;?>">
                                                    <label for="bathgroom_extra3"><em>Bathing and Grooming: <strong class="color"><?= empty($service->bathing_is_free)?format_amount($service->bathing_rate_plus):'Free';?></strong></em>
                                                        <small>Let the sitter help your pup relax with a gentle, all natural, organic shampoo and conditioning treatment, including the basics, ear cleaning, brush/detangle, hand blow out and de-shed, as well as a breed specific cut to your specifications.</small>
                                                    </label>
                                                </div>
                                            </div>
                                            <?php if ($pfsc_service): ?>
                                                <div class="txtGrp">
                                                    <!-- <h4>Play Dates</h4> -->
                                                    <div class="lblBtn">
                                                        <input type="checkbox" name="playdate_extra" id="playdate_extra3" class="extra" value="<?= $pfsc_service->price?>">
                                                        <label for="playdate_extra3"><em>Play Dates <strong class="color"><?= format_amount($pfsc_service->price)?></strong></em>
                                                            <small>Let the sitter help your pup relax with a gentle, all natural, organic shampoo and conditioning treatment, including the basics, ear cleaning, brush/detangle, hand blow out and de-shed, as well as a breed specific cut to your specifications.</small>
                                                        </label>
                                                    </div>
                                                </div>
                                            <?php endif ?>
                                        </div>
                                        <div class="txtGrp">
                                            <textarea name="detail" id="detail" class="txtBox" placeholder="Share a little info" required=""></textarea>
                                        </div>
                                        <div class="lblBtn txtGrp">
                                            <input type="checkbox" name="photos" id="photos" value="1">
                                            <label for="photos">I'd like to receive photos of my pets during this stay.</label>
                                        </div>
                                        <div class="bTn text-center txtGrp">
                                            <button type="submit" class="webBtn colorBtn">Submit Request  <i class="spinner hidden"></i></button>
                                        </div>
                                        <div class="alertMsg"></div>
                                        <p class="text-center small">Contact <?= format_name($row->mem_fname, $row->mem_lname)?> for free without obligation. You decide when to finalize the booking by paying with PFSC. All bookings are covered by The PFSC Guarantee, which includes veterinary coverage and more.</p>
                                    </form>
                                </div>
                            <?php endif ?>
                            <?php if ($service->id==4): ?>
                                <div id="PFSC-Day-Care" class="tab-pane<?= $services[0]->id==$service->id?' active in':'' ?>">
                                    <form action="" method="post" autocomplete="off" id="frmBkng" class="frmAjax">
                                        <input type="hidden" name="service" value="<?= $service->id?>">
                                        <div class="formRow row">
                                            <!-- <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-12 txtGrp">
                                                <h4>PFSC Day Care near</h4>
                                                <input type="text" name="zip" class="txtBox" placeholder="Zip code">
                                            </div> -->
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                                <h4>How often do you need this service? (PFSC Day Care)</h4>
                                                <div class="flexGrp">
                                                    <button type="button" class="txtBox active" data-days="one-time"><i class="fi-dice"></i> One Time</button>
                                                    <em></em>
                                                    <button type="button" class="txtBox" data-days="repeat"><i class="fi-sync"></i> <em>Repeat</em> Weekly</button>
                                                    <input type="hidden" name="days_type" value="one-time">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 active" data-days="one-time">
                                                <div class="formRow row">
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-4 txtGrp">
                                                        <h4>For these days</h4>
                                                        <input type="text" name="dates" class="txtBox multidatepicker" placeholder="Select Dates"<?= $not_avail_days==''?'':' data-date-days-of-week-disabled="'.$not_avail_days.'"'?> data-date-start-date="0d" readonly="">
                                                    </div>
                                                </div>
                                                <div class="formRow row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                                        <!-- <h4>Add and select preferred times for your visits</h4>
                                                        <div class="visitBlk">
                                                            <h5>Apr24</h5>
                                                            <ul class="flex">
                                                                <li><input type="text" name="" id="" class="txtBox timepicker" placeholder="Select Time"><i class="fi-trash"></i></li>
                                                            </ul>
                                                            <a href="javascript:void(0)"><i class="fi-plus"></i> Add a visit</a>
                                                        </div> -->
                                                    </div>
                                                </div>
                                                <!-- <h4>For these days</h4>
                                                <div class="flexGrp">
                                                    <input type="text" name="start_date" class="txtBox datepicker" placeholder="Start date"<?= $not_avail_days==''?'':' data-date-days-of-week-disabled="'.$not_avail_days.'"'?> data-date-start-date="0d" readonly="">
                                                    <em>&#8594;</em>
                                                    <input type="text" name="end_date" class="txtBox datepicker" placeholder="End date"<?= $not_avail_days==''?'':' data-date-days-of-week-disabled="'.$not_avail_days.'"'?> data-date-start-date="0d" readonly="">
                                                </div> -->
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12" data-days="repeat">
                                                <div class="formRow row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                                        <h4>For which days?</h4>
                                                        <ul class="selectLst daysLst">
                                                            <li><div data-checkbox="Sunday" class="lnk">S</div></li>
                                                            <li><div data-checkbox="Monday" class="lnk">M</div></li>
                                                            <li><div data-checkbox="Tuesday" class="lnk">T</div></li>
                                                            <li><div data-checkbox="Wednesday" class="lnk">W</div></li>
                                                            <li><div data-checkbox="Thursday" class="lnk">T</div></li>
                                                            <li><div data-checkbox="Friday" class="lnk">F</div></li>
                                                            <li><div data-checkbox="Saturday" class="lnk">S</div></li>
                                                        </ul>
                                                        <input type="hidden" name="days" value="">
                                                    </div>
                                                    <!-- <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-5 txtGrp">
                                                        <h4>Start date</h4>
                                                        <input type="text" name="rstart_date" class="txtBox datepicker" placeholder="Start date"<?= $not_avail_days==''?'':' data-date-days-of-week-disabled="'.$not_avail_days.'"'?> data-date-start-date="0d" readonly="">
                                                    </div> -->
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                                        <!-- <h4>Add and select preferred times for your visits</h4>
                                                        <div class="visitBlk">
                                                            <h5>Monday</h5>
                                                            <ul class="flex">
                                                                <li><input type="text" name="" id="" class="txtBox timepicker" placeholder="Select Time"><i class="fi-trash"></i></li>
                                                            </ul>
                                                            <a href="javascript:void(0)"><i class="fi-plus"></i> Add a visit</a>
                                                        </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="petBlk">
                                            <h4>My Pets</h4>
                                            <!-- <select name="pet" class="txtBox petListing selectpicker" multiple title="Select Pets">
                                            </select> -->
                                            <div class="dropDown petDropDown">
                                                <div class="dropBtn txtBox">
                                                    <ul class="dropLst">
                                                        <li>Select Pets</li>
                                                    </ul>
                                                </div>
                                                <ul class="dropCnt dropLst">
                                                </ul>
                                                <input type="hidden" name="pets" value="">
                                            </div>
                                        </div>
                                        <div class="txtGrp">
                                            <a href="javascript:void(0)" class="newPet popBtn" data-popup="add-pet">+ Add another pet</a>
                                        </div>
                                        <div class="txtGrp extraUp">
                                            <h4 class="color">Extras and Upgrades</h4>
                                            <p>Treat yourself (and your dog) by upgrading your booking</p>
                                            <!-- <div class="txtGrp">
                                                <div class="lblBtn">
                                                    <input type="checkbox" name="pickdrop_extra" id="pickdrop_extra4" class="extra" data-pckup="sure" value="<?= $service->pick_drop_rate_plus?>">
                                                    <label for="pickdrop_extra4">Pick-Up and Drop-Off: <strong class="color"><?= format_amount($service->pick_drop_rate_plus)?></strong>
                                                    </label>
                                                </div>
                                            </div> -->
                                            <div class="txtGrp">
                                                <div class="lblBtn">
                                                    <input type="checkbox" name="bathgroom_extra" id="bathgroom_extra4" class="extra" value="<?= empty($service->bathing_is_free)?$service->bathing_rate_plus:0;?>">
                                                    <label for="bathgroom_extra4"><em>Bathing and Grooming: <strong class="color"><?= empty($service->bathing_is_free)?format_amount($service->bathing_rate_plus):'Free';?></strong></em>
                                                        <small>Let the sitter help your pup relax with a gentle, all natural, organic shampoo and conditioning treatment, including the basics, ear cleaning, brush/detangle, hand blow out and de-shed, as well as a breed specific cut to your specifications.</small>
                                                    </label>
                                                </div>
                                            </div>
                                            <?php if ($pfsc_service): ?>
                                                <div class="txtGrp">
                                                    <!-- <h4>Play Dates</h4> -->
                                                    <div class="lblBtn">
                                                        <input type="checkbox" name="playdate_extra" id="playdate_extra4" class="extra" value="<?= $pfsc_service->price?>">
                                                        <label for="playdate_extra4"><em>Play Dates <strong class="color"><?= format_amount($pfsc_service->price)?></strong></em>
                                                            <small>Sitter will bring their fur kid to play with yours for a few hours while you are at work, all play dates must be with dogs of similar breeds and size.</small>
                                                        </label>
                                                    </div>
                                                </div>
                                            <?php endif ?>
                                        </div>
                                        <div class="txtGrp">
                                            <textarea name="detail" id="detail" class="txtBox" placeholder="Share a little info" required=""></textarea>
                                        </div>
                                        <div class="lblBtn txtGrp">
                                            <input type="checkbox" name="photos" id="photos" value="1">
                                            <label for="photos">I'd like to receive photos of my pets during this stay.</label>
                                        </div>
                                        <div class="bTn text-center txtGrp">
                                            <button type="submit" class="webBtn colorBtn">Submit Request  <i class="spinner hidden"></i></button>
                                        </div>
                                        <div class="alertMsg"></div>
                                        <p class="text-center small">Contact <?= format_name($row->mem_fname, $row->mem_lname)?> for free without obligation. You decide when to finalize the booking by paying with PFSC. All bookings are covered by The PFSC Guarantee, which includes veterinary coverage and more.</p>
                                    </form>
                                </div>
                            <?php endif ?>
                            <?php if ($service->id==5): ?>
                                <div id="Grooming-and-Baths" class="tab-pane<?= $services[0]->id==$service->id?' active in':'' ?>">
                                    <form action="" method="post" autocomplete="off" id="frmBkng" class="frmAjax">
                                        <input type="hidden" name="service" value="<?= $service->id?>">
                                        <div class="formRow row">
                                            <!-- <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-12 txtGrp">
                                                <h4>Grooming & Baths near</h4>
                                                <input type="text" name="zip" class="txtBox" placeholder="Zip code">
                                            </div> -->
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                                <h4>How often do you need this service? (Grooming & Baths)</h4>
                                                <div class="flexGrp">
                                                    <button type="button" class="txtBox active" data-days="one-time"><i class="fi-dice"></i> One Time</button>
                                                    <em></em>
                                                    <button type="button" class="txtBox" data-days="repeat"><i class="fi-sync"></i> <em>Repeat</em> Weekly</button>
                                                    <input type="hidden" name="days_type" value="one-time">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 active" data-days="one-time">
                                                <div class="formRow row">
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-4 txtGrp">
                                                        <h4>For these days</h4>
                                                        <input type="text" name="dates" class="txtBox multidatepicker" placeholder="Select Dates"<?= $not_avail_days==''?'':' data-date-days-of-week-disabled="'.$not_avail_days.'"'?> data-date-start-date="0d" readonly="">
                                                    </div>
                                                </div>
                                                <div class="formRow row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                                        <!-- <h4>Add and select preferred times for your visits</h4>
                                                        <div class="visitBlk">
                                                            <h5>Apr24</h5>
                                                            <ul class="flex">
                                                                <li><input type="text" name="" id="" class="txtBox timepicker" placeholder="Select Time"><i class="fi-trash"></i></li>
                                                            </ul>
                                                            <a href="javascript:void(0)"><i class="fi-plus"></i> Add a visit</a>
                                                        </div> -->
                                                    </div>
                                                </div>
                                                <!-- <h4>For these days</h4>
                                                <div class="flexGrp">
                                                    <input type="text" name="start_date" class="txtBox datepicker" placeholder="Start date"<?= $not_avail_days==''?'':' data-date-days-of-week-disabled="'.$not_avail_days.'"'?> data-date-start-date="0d" readonly="">
                                                    <em>&#8594;</em>
                                                    <input type="text" name="end_date" class="txtBox datepicker" placeholder="End date"<?= $not_avail_days==''?'':' data-date-days-of-week-disabled="'.$not_avail_days.'"'?> data-date-start-date="0d" readonly="">
                                                </div> -->
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12" data-days="repeat">
                                                <div class="formRow row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                                        <h4>For which days?</h4>
                                                        <ul class="selectLst daysLst">
                                                            <li><div data-checkbox="Sunday" class="lnk">S</div></li>
                                                            <li><div data-checkbox="Monday" class="lnk">M</div></li>
                                                            <li><div data-checkbox="Tuesday" class="lnk">T</div></li>
                                                            <li><div data-checkbox="Wednesday" class="lnk">W</div></li>
                                                            <li><div data-checkbox="Thursday" class="lnk">T</div></li>
                                                            <li><div data-checkbox="Friday" class="lnk">F</div></li>
                                                            <li><div data-checkbox="Saturday" class="lnk">S</div></li>
                                                        </ul>
                                                        <input type="hidden" name="days" value="">
                                                    </div>
                                                    <!-- <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-5 txtGrp">
                                                        <h4>Start date</h4>
                                                        <input type="text" name="rstart_date" class="txtBox datepicker" placeholder="Start date"<?= $not_avail_days==''?'':' data-date-days-of-week-disabled="'.$not_avail_days.'"'?> data-date-start-date="0d" readonly="">
                                                    </div> -->
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                                        <!-- <h4>Add and select preferred times for your visits</h4>
                                                        <div class="visitBlk">
                                                            <h5>Monday</h5>
                                                            <ul class="flex">
                                                                <li><input type="text" name="" id="" class="txtBox timepicker" placeholder="Select Time"><i class="fi-trash"></i></li>
                                                            </ul>
                                                            <a href="javascript:void(0)"><i class="fi-plus"></i> Add a visit</a>
                                                        </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="petBlk">
                                            <h4>My Pets</h4>
                                            <!-- <select name="pet" class="txtBox petListing selectpicker" multiple title="Select Pets">
                                            </select> -->
                                            <div class="dropDown petDropDown">
                                                <div class="dropBtn txtBox">
                                                    <ul class="dropLst">
                                                        <li>Select Pets</li>
                                                    </ul>
                                                </div>
                                                <ul class="dropCnt dropLst">
                                                </ul>
                                                <input type="hidden" name="pets" value="">
                                            </div>
                                        </div>
                                        <div class="txtGrp">
                                            <a href="javascript:void(0)" class="newPet popBtn" data-popup="add-pet">+ Add another pet</a>
                                        </div>
                                        <div class="txtGrp extraUp">
                                            <h4 class="color">Extras and Upgrades</h4>
                                            <p>Treat yourself (and your dog) by upgrading your booking</p>
                                            <!-- <div class="txtGrp">
                                                <div class="lblBtn">
                                                    <input type="checkbox" name="pickdrop_extra" id="pickdrop_extra5" class="extra" data-pckup="sure" value="<?= $service->pick_drop_rate_plus?>">
                                                    <label for="pickdrop_extra5">Pick-Up and Drop-Off: <strong class="color"><?= format_amount($service->pick_drop_rate_plus)?></strong>
                                                    </label>
                                                </div>
                                            </div> -->
                                            <div class="txtGrp">
                                                <div class="lblBtn">
                                                    <input type="checkbox" name="bathgroom_extra" id="bathgroom_extra5" class="extra" value="<?= empty($service->bathing_is_free)?$service->bathing_rate_plus:0;?>">
                                                    <label for="bathgroom_extra5"><em>Bathing and Grooming: <strong class="color"><?= empty($service->bathing_is_free)?format_amount($service->bathing_rate_plus):'Free';?></strong></em>
                                                        <small>Let the sitter help your pup relax with a gentle, all natural, organic shampoo and conditioning treatment, including the basics, ear cleaning, brush/detangle, hand blow out and de-shed, as well as a breed specific cut to your specifications.</small>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="txtGrp">
                                            <textarea name="detail" id="detail" class="txtBox" placeholder="Share a little info" required=""></textarea>
                                        </div>
                                        <div class="lblBtn txtGrp">
                                            <input type="checkbox" name="photos" id="photos" value="1">
                                            <label for="photos">I'd like to receive photos of my pets during this stay.</label>
                                        </div>
                                        <div class="bTn text-center txtGrp">
                                            <button type="submit" class="webBtn colorBtn">Submit Request  <i class="spinner hidden"></i></button>
                                        </div>
                                        <div class="alertMsg"></div>
                                        <p class="text-center small">Contact <?= format_name($row->mem_fname, $row->mem_lname)?> for free without obligation. You decide when to finalize the booking by paying with PFSC. All bookings are covered by The PFSC Guarantee, which includes veterinary coverage and more.</p>
                                    </form>
                                </div>
                            <?php endif ?>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="popup" data-popup="add-pet">
        <div class="tableDv">
            <div class="tableCell">
                <div class="contain">
                    <div class="_inner">
                        <div class="crosBtn"></div>
                        <h2>Add new Pet</h2>
                        <form action="<?= site_url('add-new-pet')?>" method="post" autocomplete="off" id="frmPet" class="frmAjax">
                            <input type="hidden" name="bknrd" value="no">
                            <div class="row formRow">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <h4>What type of pet?</h4>
                                    <ul class="selectLst">
                                        <li><div data-radio="dog" class="lnk">Dog</div></li>
                                        <li><div data-radio="cat" class="lnk">Cat</div></li>
                                    </ul>
                                    <input type="hidden" name="pet_type" id="pet_type" value="">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12">
                                    <hr>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                    <input type="text" name="name" id="name" class="txtBox" placeholder="Name">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                    <select name="breed" id="breed" class="txtBox selectpicker">
                                        <option disabled="" selected="">Dog breed(s)</option>
                                        <?php foreach ($pet_breeds as $key => $pet_breed): ?>
                                            <option value="<?= $pet_breed->id?>"><?= $pet_breed->breed?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-4 txtGrp">
                                    <input type="text" name="weight" id="weight" class="txtBox" placeholder="Weight (lbs)">
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-4 txtGrp">
                                    <select name="age_year" id="age_year" class="txtBox selectpicker">
                                        <option disabled="" selected="">Age (years)</option>
                                        <?php for($i=1; $i<12; $i++):?>
                                            <option value="<?= $i;?>" <?= ($i==$mem_data->mem_card_exp_month?'selected':'')?>><?= $i;?></option>
                                        <?php endfor?>
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-4 txtGrp">
                                    <select name="age_month" id="age_month" class="txtBox selectpicker">
                                        <option disabled="" selected="">Age (months)</option>
                                        <?php for($i=1;$i<12;$i++):?>
                                            <option value="<?= $i;?>" <?= ($i==$mem_data->mem_card_exp_month?'selected':'')?>><?= $i;?></option>
                                        <?php endfor?>
                                    </select>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <div class="gender flex">
                                        <span class="auto semi">Gender</span>
                                        <span class="lblBtn">
                                            <input type="radio" name="gender" id="male" value="male">
                                            <label for="male">Male</label>
                                        </span>
                                        <span class="lblBtn">
                                            <input type="radio" name="gender" id="female" value="female">
                                            <label for="female">Female</label>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12">
                                    <hr>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <h4>Upload file <a href="javascript:void(0)" class="delBtn">Delete all</a></h4>
                                    <button type="button" class="txtBox uploadmlImg" data-image-src="pet">Select file to upload</button>
                                    <div class="uploadBar hidden"><span></span></div>
                                    <div class="upLoadBlk txtBox">
                                        <div class="inside scrollbar">
                                            <ul class="imgLst flex">
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                    <h4>Spayed or Neutered?</h4>
                                    <ul class="selectLst">
                                        <li><div data-radio="1" class="lnk">Yes</div></li>
                                        <li><div data-radio="1" class="lnk">No</div></li>
                                    </ul>
                                    <input type="hidden" name="neutered" id="" value="">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                    <h4>Micro-chipped?</h4>
                                    <ul class="selectLst">
                                        <li><div data-radio="1" class="lnk">Yes</div></li>
                                        <li><div data-radio="0" class="lnk">No</div></li>
                                    </ul>
                                    <input type="hidden" name="micro_chipped" id="micro_chipped" value="">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                    <h4>Along well with dogs</h4>
                                    <ul class="selectLst">
                                        <li><div data-radio="1" class="lnk">Yes</div></li>
                                        <li><div data-radio="0" class="lnk">No</div></li>
                                    </ul>
                                    <input type="hidden" name="well_dogs" id="well_dogs" value="">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                    <h4>Along well with cats?</h4>
                                    <ul class="selectLst">
                                        <li><div data-radio="1" class="lnk">Yes</div></li>
                                        <li><div data-radio="0" class="lnk">No</div></li>
                                    </ul>
                                    <input type="hidden" name="well_cats" id="well_cats" value="">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                    <h4>Along well with children?</h4>
                                    <ul class="selectLst">
                                        <li><div data-radio="1" class="lnk">Yes</div></li>
                                        <li><div data-radio="0" class="lnk">No</div></li>
                                    </ul>
                                    <input type="hidden" name="well_children" id="well_children" value="">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                    <h4>House-trained</h4>
                                    <ul class="selectLst">
                                        <li><div data-radio="1" class="lnk">Yes</div></li>
                                        <li><div data-radio="0" class="lnk">No</div></li>
                                    </ul>
                                    <input type="hidden" name="house_trained" id="house_trained" value="">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <h4>Special requirements</h4>
                                    <textarea name="requirements" id="requirements" class="txtBox" placeholder="Write a little description"></textarea>
                                </div>
                            </div>
                            <input type="file" id="uploadFiles" name="" multiple="true" class="" style="display: none;" data-file="" accept="image/*">
                            <div class="bTn text-center">
                                <button type="submit" id="" class="webBtn colorBtn">Save <i class="spinner hidden"></i></button>
                            </div>
                            <div class="alertMsg" id="alertMsg"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- bookNow -->


<script type="text/javascript">
    $(function(){
        $(document).on('click', '.selectLst > li > [data-radio].lnk', function() {
            let radio = $(this).data('radio');
            // $(this).toggleClass('active');
            $(this).parents('ul:first').find('.lnk').addClass('active').not($(this)).removeClass('active');
            $(this).parents('.txtGrp').children('input[type="hidden"]').val(radio);
        });

        $(document).on('click', '.selectLst > li > [data-checkbox].lnk', function() {
            let checkbox = '';
            $(this).toggleClass('active');
            $(this).parents('ul:first').find('[data-radio].lnk').removeClass('active');

            $(this).parents('ul:first').find('[data-checkbox].active').each(function( index ) {
                checkbox += $( this ).data('checkbox') +',';
            });
            checkbox = checkbox.slice(0, -1);
            $(this).parents('.txtGrp').children('input[type="hidden"]').val(checkbox);
            show_multi_dates();
        });

        $('.imgLst').sortable();

        $(document).on('click', '#bookNow form button.txtBox', function() {
            let days = $(this).attr('data-days');
            $(this).parents('form:first').find('div[data-days]').removeClass('active').find('input').val('').end().find('[data-checkbox]').removeClass('active');
            $(this).parents('form:first').find('button[data-days]').removeClass('active');
            $(this).parents('form:first').find(this).addClass('active');
            $(this).parents('form:first').find('div[data-days = ' + days + ']').addClass('active');
            $(this).parents('.flexGrp:first').children('input[type="hidden"]').val(days);
            reset_summary();
            summary();
        });

        $(document).on('reset', '#frmPet', function (e) {
            $('body').removeClass('flow');
            $('.popup[data-popup="add-pet"]').fadeOut();
            $.ajax({
                url: base_url + 'get-my-pets',
                method: 'POST',
                dataType: 'json',
                success: function (data) {
                    if (!empty(data.found)) {
                        pets = data.pets;
                        show_pets();
                    }
                }
            })
        });

        let pets = <?= json_encode($pets)?>;
        let services = <?= json_encode($services)?>;
        let holiday_dates = <?= json_encode($dates)?>;
        let policies = <?= json_encode($policies)?>;
        let options = `<?= $time_option?>`;
        let sind = 0;

        $(document).on('click', '.nav-tabs > li', function() {
            sind = $(this).index();
            show_pets();
            summary();
            reset_summary();
        });
        
        $(document).on('change', '.tab-pane.active .extra, .tab-pane.active select.time', function() {
            summary();
        });

        $(document).on('click', '.tab-pane.active .petDropDown > ul > li', function(e) {
           let $selected_rows = $(this).parents('ul:first').find('input[type="checkbox"]:checked');
           if ($selected_rows.length==5) {
                e.preventDefault();
                return false;
           }
           let $options = '';
           let checkbox = '';
           if ($selected_rows.length) {
            $.each($selected_rows, function(i, row) {
                let index = $(this).parent('li').data('store');
                // let index = $(this).parent('li').index()
                let pet = pets[index];
                $options += `<li>
                <a><img src="${base_url +'v/vp/'+pet.image}" alt=""> <span>${pet.name} <small>(${pet.breed})</small></span></a>
                </li>`;
                checkbox += pet.id +',';
            });
           }
           else
            $options += `<li>Select Pets</li>`;
           $('.tab-pane.active .petDropDown > .dropBtn > ul').html($options);
           checkbox = checkbox.slice(0, -1);
           $(this).parents('.petDropDown').find('input[type="hidden"]').val(checkbox);
           summary();
        });

        $('.datepicker').on('changeDate', function(e) {
            summary();
        });

        $('.multidatepicker').on('changeDate', function (e) {
            show_multi_dates();
        });

        $(document).on('click', '.tab-pane.active .visitBlk a.addVst', function(e) {
            let name = $(this).parents('.visitBlk:first').find('ul.flex>li select:first').attr('name');
            let html = `
                <li>
                    <label for="">Visit</label>
                    <select name="${name}" class="txtBox selectpicker time">
                        <option disabled="" selected="">Time</option>
                        ${options}
                    </select>
                    <i class="fi-trash"></i>
                </li>`;
            $(this).parents('.visitBlk:first').find('ul.flex').append(html);
            $(this).parents('.visitBlk:first').find('ul.flex>li label').each(function(i) {
                $(this).text('Visit '+(i+1));
            });
            refresh_selectpicker();
        })

        $(document).on('click', '.tab-pane.active .visitBlk li i.fi-trash', function(e) {
            let labels = $(this).parents('.visitBlk:first');
            $(this).parents('li:first').remove();
            labels.find('ul.flex>li label').each(function(i) {
                $(this).text('Visit '+(i+1));
            });
            summary();
        })

        function show_multi_dates() {
            let days_type = $('.tab-pane.active input[name="days_type"]').val();
            let html = `<h4>Add and select preferred times for your visits</h4>`;
            let service = services[sind];
            if (days_type=='one-time') {
                let dates = $('.tab-pane.active input.multidatepicker').val().split(",  ");
                if (!empty(dates[0])) {
                    $.each(dates, function(i, e) {
                        if (service.id==3) {
                            html += `<div class="visitBlk">
                            <h5>${e}</h5>
                            <ul class="flex">
                                <li>
                                    <label for="">Visit 1</label>
                                    <select name="times[${i}][]" class="txtBox selectpicker time">
                                        <option disabled="" selected="">Time</option>
                                        ${options}
                                    </select>
                                </li>
                            </ul>
                            <a href="javascript:void(0)" class="addVst"><i class="fi-plus"></i> Add a visit</a>
                            </div>`;
                        } else {
                            html += `<div class="visitBlk">
                            <h5>${e}</h5>
                            <ul class="flex">
                                <li>
                                    <select name="dropoff_times[${i}]" class="txtBox selectpicker time">
                                        <option disabled="" selected="">Drop off Time</option>
                                        ${options}
                                    </select>
                                    <!--<input type="text" name="times[${i}]" class="txtBox timepicker" placeholder="Select Time"><i class="fi-trash"></i>-->
                                </li>
                                <li>
                                    <select name="pickup_times[${i}]" class="txtBox selectpicker time">
                                        <option disabled="" selected="">Pick up Time</option>
                                        ${options}
                                    </select>
                                    <!--<input type="text" name="times[${i}]" class="txtBox timepicker" placeholder="Select Time"><i class="fi-trash"></i>-->
                                </li>
                            </ul>
                            <!--<a href="javascript:void(0)"><i class="fi-plus"></i> Add a visit</a>-->
                            </div>`;
                            }
                    })
                }
                $('.tab-pane.active div[data-days="one-time"] .formRow:last > div:first').html(html);
            }else{
                let days = $('.tab-pane.active input[name="days"]').val().split(",");
                if (!empty(days[0])) {
                    $.each(days, function(i, e) {
                        if (service.id==3) {
                            html += `<div class="visitBlk">
                            <h5>${e}</h5>
                            <ul class="flex">
                                <li>
                                    <label for="">Visit 1</label>
                                    <select name="times[${i}][]" class="txtBox selectpicker time">
                                        <option disabled="" selected="">Visit 1</option>
                                        ${options}
                                    </select>
                                </li>
                            </ul>
                            <a href="javascript:void(0)" class="addVst"><i class="fi-plus"></i> Add a visit</a>
                            </div>`;
                        } else {
                            html += `<div class="visitBlk">
                            <h5>${e}</h5>
                            <ul class="flex">
                                <li>
                                    <select name="dropoff_times[${i}]" class="txtBox selectpicker time">
                                        <option disabled="" selected="">Drop off Time</option>
                                        ${options}
                                    </select>
                                    <!--<input type="text" name="times[${i}]" class="txtBox timepicker" placeholder="Select Time"><i class="fi-trash"></i>-->
                                </li>
                                <li>
                                    <select name="pickup_times[${i}]" class="txtBox selectpicker time">
                                        <option disabled="" selected="">Pick up Time</option>
                                        ${options}
                                    </select>
                                    <!--<input type="text" name="times[${i}]" class="txtBox timepicker" placeholder="Select Time"><i class="fi-trash"></i>-->
                                </li>
                            </ul>
                            <!--<a href="javascript:void(0)"><i class="fi-plus"></i> Add a visit</a>-->
                            </div>`;
                        }
                    })
                }
                $('.tab-pane.active div[data-days="repeat"] .formRow > div:last').html(html);
            }
            refresh_selectpicker();
            summary();
        }

        function show_pets() {
            let $options = '';
            let service = services[sind];

            $.each(pets, function(i, pet) {
                /*if($.inArray(service.id, ['1', '2', '3']) !== -1) {
                    if (service.service_for=='cat' && pet.pet_type!='cat')
                        return;
                    else if (service.service_for=='dog' && pet.pet_type!='dog')
                        return;
                }*/
                $options += `<li data-value="${pet.id}" data-store="${i}">
                    <input type="checkbox">
                    <a><img src="${base_url +'v/vp/'+pet.image}" alt=""> <span>${pet.name} <small>(${pet.breed})</small></span></a>
                </li>`;
            });
            $('.tab-pane.active .petDropDown > ul').html($options);
            $('.tab-pane.active .petDropDown > .dropBtn > ul').html('<li>Select Pets</li>');
            $('.tab-pane.active .petDropDown input[type="hidden"]').val('');

            $('.tab-pane.active ul.daysLst div.lnk').removeClass('active');
            $('.tab-pane.active input[name="days"]').val('');
            reset_summary();
        }

        function reset_summary() {
            $('.sumyBlk > ul.list').html('');
            /*$('#adtnlPts').html('').addClass('hidden');
            $('#puppies').html('').addClass('hidden');
            $('#pfscFee').html('$0.00');
            $('#gttl').html('$0.00');
            $('.ext').remove();*/
            $('.tab-pane.active .multidatepicker').val("").datepicker("update");
            $('.tab-pane.active div[data-days="one-time"] .formRow:last > div:first').html('');
            $('.tab-pane.active div[data-days="repeat"] .formRow > div:last').html('');
            // $('.tab-pane.active select.time').vale('');
            // reset_datepicker();
        }

        function summary() {
            let clcSumry = '';
            let $summary_detail = ''
            let service = services[sind];

            let sprice = floatval(service.price);
            let dogs_amount = 0;
            let additional_dogs_amount = 0;
            let puppies_amount = 0;
            let extented_dogs_amount = 0;
            let cats_amount = 0;
            let additional_cats_amount = 0;
            let extented_cats_amount = 0;
            let extras_amount = 0;
            let holiday_amount = 0;
            let pfscFee = 0;
            let stotal = 0;
            let total = 0;
            $('.price em').html(sprice);
            $('.price small').html('/' + service.price_label);

            let policy = usfirst(service.cancellation_policy);
            // $('#plcy').html('Cancellation policy: '+ usfirst(service.cancellation_policy));
            $('#plcy .txt_info').html(`<span class="txt_info color2">${policy}<em><strong>${policy}</strong>${policies[policy]}</em></span>`);

            $('.sumyBlk h4.color2').html(service.title + ' Details');
            $('.sumyBlk h5.ovrVew').html(service.price_overview);
            

            let $selected_rows = $('.tab-pane.active .petDropDown > ul').find('input[type="checkbox"]:checked');
            let $pet_names = '';
            let $dogs = 0;
            let $additional_dogs = 0
            let $puppies = 0
            let $cats = 0
            let $additional_cats = 0

            if ($selected_rows.length) {
                $.each($selected_rows, function(i, e) {
                    let index = $(this).parent('li').data('store')
                    let pet = pets[index];
                    $pet_names += `${pet.name}, `;
                    if(pet.pet_type=='dog' && empty(pet.age_year) && !empty(pet.age_month))
                        $puppies++;
                    else if(pet.pet_type=='cat')
                        $cats++;
                    else
                        $dogs++;                    
                });
            }
            $pet_names = $pet_names.slice(0, -2);

            let stays = 0;
            let stay_label = '';
            let extended_stays = 0;
            let extended_stay_label = '';
            let price_label = '';
            let holidays = 0;
            if (service.id==1) {
                let dropoff_date = $('.tab-pane.active input[name="dropoff_date"]').val();
                let pickup_date = $('.tab-pane.active input[name="pickup_date"]').val();
                let nights = dateDiffInDays(dropoff_date, pickup_date);
                $summary_detail += `<li>
                    <div>Nights:</div>
                    <div>${nights}</div>
                </li>`;

                price_label = 'Night';

                getDates(dropoff_date, pickup_date).forEach(function(date) {
                    if($.inArray(date.toISOString().split("T")[0], holiday_dates)!==-1)
                        holidays++;
                });
                nights -= holidays;

                if (nights<=service.extended_stay_days) {
                    stays = nights;
                    stay_label = stays>1?'Nights':'Night';
                } else {
                    stays = service.extended_stay_days;
                    stay_label = stays>1?'Nights':'Night';

                    extended_stays = nights-service.extended_stay_days;
                    extended_stay_label = extended_stays>1?'Nights':'Night';
                }
                /*if (nights<=service.extended_stay_days)
                    price = floatval(nights * price);
                else{
                    price = floatval(service.extended_stay_days * price);
                    price += floatval((nights-service.extended_stay_days) * service.extended_stay_rate);
                }*/
                

                let dropoff_from = $('.tab-pane.active select[name="dropoff_from_time1"] option:checked').text();
                dropoff_from = empty(dropoff_from)?'':dropoff_from;
                let dropoff_to = $('.tab-pane.active select[name="dropoff_to_time1"] option:checked').text();
                dropoff_to = empty(dropoff_to)?'':dropoff_to;

                let pickup_from = $('.tab-pane.active select[name="pickup_from_time1"] option:checked').text();
                pickup_from = empty(pickup_from)?'':pickup_from;
                let pickup_to = $('.tab-pane.active select[name="pickup_to_time1"] option:checked').text();
                pickup_to = empty(pickup_to)?'':pickup_to;
                $summary_detail += `
                <li>
                    <div>Drop-Off Date:</div>
                    <div>
                        <div>${dropoff_date}<div>${dropoff_from} - ${dropoff_to}</div></div>
                    </div>
                </li>
                <li>
                    <div>Pick-Up Date:</div>
                    <div>
                        <div>${pickup_date}<div>${pickup_from} - ${pickup_to}</div></div>
                    </div>
                </li>`;
            }else if(service.id==2) {
                let start_date = $('.tab-pane.active input[name="start_date"]').val();
                let end_date = $('.tab-pane.active input[name="end_date"]').val();
                let nights = dateDiffInDays(start_date, end_date);
                $summary_detail += `<li>
                    <div>Nights:</div>
                    <div>${nights}</div>
                </li>`;

                price_label = 'Night';

                
                getDates(start_date, end_date).forEach(function(date) {
                    if($.inArray(date.toISOString().split("T")[0], holiday_dates)!==-1)
                        holidays++;
                });
                nights -= holidays;


                if (nights<=service.extended_stay_days) {
                    stays = nights;
                    stay_label = stays>1?'Nights':'Night';
                } else {
                    stays = service.extended_stay_days;
                    stay_label = stays>1?'Nights':'Night';

                    extended_stays = nights-service.extended_stay_days;
                    extended_stay_label = extended_stays>1?'Nights':'Night';
                }
                
                /*if (nights<=service.extended_stay_days)
                    price = floatval(nights * price);
                else{
                    price = floatval(service.extended_stay_days * price);
                    price += floatval((nights-service.extended_stay_days) * service.extended_stay_rate);
                }*/
                let dropoff_from = $('.tab-pane.active select[name="dropoff_from_time2"] option:checked').text();
                dropoff_from = empty(dropoff_from)?'':dropoff_from;
                let dropoff_to = $('.tab-pane.active select[name="dropoff_to_time2"] option:checked').text();
                dropoff_to = empty(dropoff_to)?'':dropoff_to;

                let pickup_from = $('.tab-pane.active select[name="pickup_from_time2"] option:checked').text();
                pickup_from = empty(pickup_from)?'':pickup_from;
                let pickup_to = $('.tab-pane.active select[name="pickup_to_time2"] option:checked').text();
                pickup_to = empty(pickup_to)?'':pickup_to;

                $summary_detail += `
                <!--<li>
                    <div>Nights:</div>
                    <div>${nights}</div>
                </li>-->
                <li>
                <div>Start Date:</div>
                <div>
                    <div>${start_date}<div>${dropoff_from} - ${dropoff_to}</div></div>
                    </div>
                </li>
                <li>
                <div>End Date:</div>
                <div>
                    <div>${end_date}<div>${pickup_from} - ${pickup_to}</div></div>
                    </div>
                </li>`;
            }else if(service.id==3) {
                let days_type = $('.tab-pane.active input[name="days_type"]').val();
                price_label = 'Visit';
                if (days_type=='one-time') {
                    let dates = $('.tab-pane.active input.multidatepicker').val().split(",  ");
                    let visits = $('.tab-pane.active div[data-days="one-time"] .formRow:last > div:first .visitBlk select.time').length;

                    $summary_detail += `<li>
                    <li>
                        <div>Total Visits:</div>
                        <div>${visits}</div>
                    </li>`;

                    $.each(dates, function(i, date) {
                        if($.inArray(format_date(date, 'yy-mm-dd'), holiday_dates)!==-1) {
                            let times = $('.tab-pane.active .visitBlk').eq(i).find('select.time')
                            $.each(times, function(t) {
                                holidays++;
                            });
                        }
                    });
                    visits -= holidays;

                    if (visits<=service.extended_stay_days) {
                        stays = visits;
                        stay_label = stays>1?'Visits':'Visit';
                    } else {
                        stays = service.extended_stay_days;
                        stay_label = stays>1?'Visits':'Visit';

                        extended_stays = visits-service.extended_stay_days;
                        extended_stay_label = extended_stays>1?'Visits':'Visit';
                    }

                    /*if (visits<=service.extended_stay_days)
                        price = floatval(visits * price);
                    else{
                        price = floatval(service.extended_stay_days * price);
                        price += floatval((visits-service.extended_stay_days) * service.extended_stay_rate);
                    }*/

                    $summary_detail += `
                    <!--<li>
                        <div>Total Visits:</div>
                        <div>${visits}</div>
                    </li>-->
                    <li>
                        <div>Dates:</div>
                        <div>`;
                        $.each(dates, function(i, e) {
                            $summary_detail += `<div>${e}`;
                            let times = $('.tab-pane.active .visitBlk').eq(i).find('select.time')
                            $.each(times, function(ti, t) {
                                let time = $(this).find('option:checked').text();
                                time = empty(time)?'':time;
                                $summary_detail += ` <div>Visit${ti+1}: ${time} </div>`;
                            });
                            $summary_detail += `</div>`;
                        });
                    $summary_detail += `</div></li>`;
                }else{
                    let days = $('.tab-pane.active input[name="days"]').val().split(",");
                    let visits = $('.tab-pane.active div[data-days="repeat"] .formRow > div:last .visitBlk select.time').length;

                    $summary_detail += `<li>
                    <li>
                        <div>Total Visits:</div>
                        <div>${visits}</div>
                    </li>`;

                    /*
                    $.each(dates, function(i, date) {
                        console.log(date, $.inArray(format_date(date, 'yy-mm-dd'), holiday_dates))
                        if($.inArray(format_date(date, 'yy-mm-dd'), holiday_dates)!==-1)
                            holidays++;
                    });
                    visits -= holidays;
                    console.log('holiday',holidays)
                    */

                    if (visits<=service.extended_stay_days) {
                        stays = visits;
                        stay_label = stays>1?'Visits':'Visit';
                    } else {
                        stays = service.extended_stay_days;
                        stay_label = stays>1?'Visits':'Visit';

                        extended_stays = visits-service.extended_stay_days;
                        extended_stay_label = extended_stays>1?'Visits':'Visit';
                    }

                    /*if (visits<=service.extended_stay_days)
                        price = floatval(visits * price);
                    else{
                        price = floatval(service.extended_stay_days * price);
                        price += floatval((visits-service.extended_stay_days) * service.extended_stay_rate);
                    }*/

                    $summary_detail += `
                    <!--<li>
                        <div>Total Visits:</div>
                        <div>${visits}</div>
                    </li>-->
                    <li>
                        <div>Days:</div>
                        <div>`;
                        $.each(days, function(i, e) {
                            $summary_detail += `<div>${e}`;
                            let times = $('.tab-pane.active .visitBlk').eq(i).find('select.time')
                            $.each(times, function(t) {
                                let time = $(this).find('option:checked').text();
                                time = empty(time)?'':time;
                                $summary_detail += `<div>${time} </div>`;
                            });
                            $summary_detail += `</div>`;
                        });
                    $summary_detail += `</div></li>`;
                }
            }else if(service.id==4) {
                let days_type = $('.tab-pane.active input[name="days_type"]').val();
                price_label = 'Day';
                if (days_type=='one-time') {
                    let dates = $('.tab-pane.active input.multidatepicker').val().split(",  ");
                    let visits = $('.tab-pane.active div[data-days="one-time"] .formRow:last > div:first .visitBlk').length;
                    $summary_detail += `<li>
                    <li>
                        <div>Total Days:</div>
                        <div>${visits}</div>
                    </li>`;

                    $.each(dates, function(i, date) {
                        if($.inArray(format_date(date, 'yy-mm-dd'), holiday_dates)!==-1)
                            holidays++;
                    });
                    visits -= holidays;

                    stays = visits;
                    stay_label = stays>1?'Days':'Day';

                    // price = floatval(visits * price);
                    $summary_detail += `
                    <!--<li>
                        <div>Total Days:</div>
                        <div>${visits}</div>
                    </li>-->
                    <li>
                        <div>Dates:</div>
                        <div>`;
                        $.each(dates, function(i, e) {
                            let dropoff_time = $('.tab-pane.active .visitBlk').eq(i).find('select.time[name^="dropoff_times"] option:checked').text();
                            let pickup_time = $('.tab-pane.active .visitBlk').eq(i).find('select.time[name^="pickup_times"] option:checked').text();
                            dropoff_time = empty(dropoff_time)?'':dropoff_time;
                            pickup_time = empty(pickup_time)?'':pickup_time;
                            $summary_detail += `
                                <div>${e} - ${dropoff_time} - ${pickup_time} </div>`;
                        })
                    $summary_detail += `</div></li>`;
                }else{
                    let days = $('.tab-pane.active input[name="days"]').val().split(",");
                    let visits = $('.tab-pane.active div[data-days="repeat"] .formRow > div:last .visitBlk').length;

                    $summary_detail += `<li>
                    <li>
                        <div>Total Days:</div>
                        <div>${visits}</div>
                    </li>`;

                    stays = visits;
                    stay_label = stays>1?'Days':'Day';

                    // price = floatval(visits * price);
                    $summary_detail += `
                    <!--<li>
                        <div>Total Days:</div>
                        <div>${visits}</div>
                    </li>-->
                    <li>
                        <div>Days:</div>
                        <div>`;
                        $.each(days, function(i, e) {
                            let dropoff_time = $('.tab-pane.active .visitBlk').eq(i).find('select.time[name^="dropoff_times"] option:checked').text();
                            let pickup_time = $('.tab-pane.active .visitBlk').eq(i).find('select.time[name^="pickup_times"] option:checked').text();

                            dropoff_time = empty(dropoff_time)?'':dropoff_time;
                            pickup_time = empty(pickup_time)?'':pickup_time;
                            $summary_detail += `
                                <div>${e} - ${dropoff_time} - ${pickup_time} </div>`;
                        })
                    $summary_detail += `</div></li>`;
                }
            }else if(service.id==5) {
                let days_type = $('.tab-pane.active input[name="days_type"]').val();
                price_label = 'Day';
                if (days_type=='one-time') {
                    let dates = $('.tab-pane.active input.multidatepicker').val().split(",  ");
                    let visits = $('.tab-pane.active div[data-days="one-time"] .formRow:last > div:first .visitBlk').length;
                    $summary_detail += `<li>
                    <li>
                        <div>Total Days:</div>
                        <div>${visits}</div>
                    </li>`;

                    $.each(dates, function(i, date) {
                        if($.inArray(format_date(date, 'yy-mm-dd'), holiday_dates)!==-1)
                            holidays++;
                    });
                    visits -= holidays;

                    stays = visits;
                    stay_label = stays>1?'Days':'Day';

                    // price = floatval(visits * price);
                    $summary_detail += `
                    <!--<li>
                        <div>Total Days:</div>
                        <div>${visits}</div>
                    </li>-->
                    <li>
                        <div>Dates:</div>
                        <div>`;
                        $.each(dates, function(i, e) {
                            let dropoff_time = $('.tab-pane.active .visitBlk').eq(i).find('select.time[name^="dropoff_times"] option:checked').text();
                            let pickup_time = $('.tab-pane.active .visitBlk').eq(i).find('select.time[name^="pickup_times"] option:checked').text();

                            dropoff_time = empty(dropoff_time)?'':dropoff_time;
                            pickup_time = empty(pickup_time)?'':pickup_time;
                            $summary_detail += `
                                <div>${e} - ${dropoff_time} - ${pickup_time} </div>`;
                        })
                    $summary_detail += `</div></li>`;
                }else{
                    let days = $('.tab-pane.active input[name="days"]').val().split(",");
                    let visits = $('.tab-pane.active div[data-days="repeat"] .formRow > div:last .visitBlk').length;

                    $summary_detail += `<li>
                    <li>
                        <div>Total Days:</div>
                        <div>${visits}</div>
                    </li>`;

                    stays = visits;
                    stay_label = stays>1?'Days':'Day';

                    // price = floatval(visits * price);
                    $summary_detail += `
                    <!--<li>
                        <div>Total Days:</div>
                        <div>${visits}</div>
                    </li>-->
                    <li>
                        <div>Days:</div>
                        <div>`;
                        $.each(days, function(i, e) {
                            let dropoff_time = $('.tab-pane.active .visitBlk').eq(i).find('select.time[name^="dropoff_times"] option:checked').text();
                            let pickup_time = $('.tab-pane.active .visitBlk').eq(i).find('select.time[name^="pickup_times"] option:checked').text();

                            dropoff_time = empty(dropoff_time)?'':dropoff_time;
                            pickup_time = empty(pickup_time)?'':pickup_time;
                            $summary_detail += `
                                <div>${e} - ${dropoff_time} - ${pickup_time} </div>`;
                        })
                    $summary_detail += `</div></li>`;
                }
            }
            
            if ($dogs>0 && stays>0) {
                // price = floatval(sprice);
                dogs_amount = sprice*stays;
                clcSumry +=`<tr class="no_border">
                        <td><strong>First Dog</strong> <small>$${sprice}/${price_label} x 1 Dog x ${stays} ${stay_label}</small></td>
                        <td class="price">${formatter.format(dogs_amount)}</td>
                    </tr>`;
                $additional_dogs = intval($dogs - 1);
                if ($additional_dogs>0) {
                    let addional_dog_label = $additional_dogs>1?'Dogs':'Dog';
                    additional_dogs_amount += floatval(service.additional_dog_rate_plus * $additional_dogs*stays);
                    // price += floatval(service.additional_dog_rate_plus * $additional_dogs);
                    clcSumry +=`<tr class="no_border">
                        <td><strong>Additional dogs</strong> <small>$${service.additional_dog_rate_plus}/${price_label} x ${$additional_dogs} ${addional_dog_label} x ${stays} ${stay_label}</small></td>
                        <td class="price">${formatter.format(additional_dogs_amount)}</td>
                    </tr>`;
                }
            }
            if ($puppies>0 && stays>0) {
                // price += floatval(service.puppy_rate * $puppies);
                puppies_amount = service.puppy_rate*$puppies*stays;
                let puppy_label = $puppies>1?'Puppies':'Puppy';
                clcSumry +=`<tr class="no_border">
                        <td><strong>Puppies</strong> <small>$${service.puppy_rate}/${price_label} x ${$puppies} ${puppy_label} x ${stays} ${stay_label}</small></td>
                        <td class="price">${formatter.format(puppies_amount)}</td>
                    </tr>`;
            }
            if (extended_stays>0 && ($puppies+$dogs>0)) {
                let dog_label = $dogs+$puppies>1?'Dogs':'Dog';
                extented_dogs_amount = floatval(service.extended_stay_rate * ($dogs+$puppies)*extended_stays);
                clcSumry +=`<tr class="no_border">
                    <td><strong>Extended stay rate</strong> <small>$${service.extended_stay_rate}/${price_label} x ${$dogs+$puppies} ${dog_label} x ${extended_stays} ${extended_stay_label}</small></td>
                    <td class="price">${formatter.format(extented_dogs_amount)}</td>
                </tr>`;
            }
            if ($cats>0 && stays>0) {
                cats_amount = service.cat_care_rate*stays;
                clcSumry +=`<tr class="no_border">
                        <td><strong>First Cat</strong> <small>$${service.cat_care_rate}/${price_label} x 1 Cat x ${stays} ${stay_label}</small></td>
                        <td class="price">${formatter.format(cats_amount)}</td>
                    </tr>`;
                // price += floatval(service.cat_care_rate);
                $additional_cats = intval($cats - 1);
                if ($additional_cats>0) {
                    let addional_cat_label = $additional_cats>1?'Cats':'Cat';
                    additional_cats_amount += floatval(service.additional_cat_rate_plus * $additional_cats*stays);
                    // price += floatval(service.additional_cat_rate_plus * $additional_cats);
                    clcSumry +=`<tr class="no_border">
                        <td><strong>Additional cats</strong> <small>$${service.additional_cat_rate_plus}/${price_label} x ${$additional_cats} ${addional_cat_label} x ${stays} ${stay_label}</small></td>
                        <td class="price">${formatter.format(additional_cats_amount)}</td>
                    </tr>`;
                }
            }
            if (extended_stays>0 && $cats>0) {
                let cat_label = $cats>1?'Cats':'Cat';
                extented_cats_amount += floatval(service.extended_stay_rate * $cats*extended_stays);
                clcSumry +=`<tr class="no_border">
                <td><strong>Extended stay rate</strong> <small>$${service.extended_stay_rate}/${price_label} x ${cat_label} ${$cats} x ${extended_stays} ${extended_stay_label}</small></td>
                <td class="price">${formatter.format(extented_cats_amount)}</td>
                </tr>`;
            }

            if (holidays>0 && ($puppies+$dogs+$cats>0)) {
                let pet_label = $puppies+$dogs+$cats>1?'Pets':'Pet';
                stay_label = holidays>1?stay_label+'s':stay_label;
                holiday_amount = floatval(service.holiday_rate * ($puppies+$dogs+$cats)*holidays);
                clcSumry +=`<tr class="no_border">
                    <td><strong>Holidays stay rate</strong> <small>$${service.holiday_rate}/${price_label} x ${$puppies+$dogs+$cats} ${pet_label} x ${holidays} ${stay_label}</small></td>
                    <td class="price">${formatter.format(holiday_amount)}</td>
                </tr>`;
            }
            // console.log($dogs, $additional_dogs, $puppies, $cats, $additional_cats)

            let $extras = $('.tab-pane.active .extra:checked');
            $.each($extras, function(i, e) {
                let ext_amount = floatval(this.value);
                if ($(this).data('pckup'))
                    ext_amount = stays*ext_amount;
                extras_amount += ext_amount;
                let ext_label = $(this).parents('.lblBtn:first').find('label em').html().replace(/<strong.*?strong>/g, '');
                /*
                if (ext_label.indexOf(' $')>-1)
                    ext_label = ext_label.substring(0, ext_label.indexOf(' $'));
                */
                clcSumry += `
                <tr class="ext no_border">
                    <td><strong>${ext_label}</strong></td>
                    <td class="price">${formatter.format(ext_amount)}</td>
                </tr>
                `;
            });
            // $('.ext').remove();
            // $('#puppies').after(clcSumry);
            stotal = dogs_amount+additional_dogs_amount+puppies_amount+cats_amount+additional_cats_amount+extras_amount+extented_dogs_amount+extented_cats_amount+holiday_amount;
            
            let pfsc_fee = round((stotal * <?= $site_settings->site_percentage?>) / 100);
            total = stotal+pfsc_fee;
            $summary_detail += `<li>
                        <div>Pets:</div>
                        <div>${$pet_names}</div>
                    </li>`;
            $('.sumyBlk > ul.list').html($summary_detail);
            // $('#pfscFee').html(formatter.format(pfsc_fee));
            // $('#gttl').html(formatter.format(price + pfsc_fee));

            clcSumry += `<tr class="ext no_border">
                <td><strong>PFSC Service Fee</strong></td>
                <td class="price" id="pfscFee">${formatter.format(pfsc_fee)}</td>
            </tr>
            <tr>
                <td class="bold">Subtotal:</td>
                <td class="price" id="gttl">${formatter.format(total)}</td>
            </tr>`;
            $('.clcMn tbody').html(clcSumry);
        }
        show_pets();
        /*_____ FAQ's _____*/
        /*$(document).on('click', '.faqLst > li > h4', function() {
            $('.faqLst > li .cntnt').not($(this).parent('li').children('.cntnt').slideToggle()).slideUp();
            $(".faqLst > li i").not($(this).parent('li').children('i').toggleClass("fi-chevron-down").toggleClass("fi-chevron-up")).removeClass("fi-chevron-up").addClass("fi-chevron-down");
        });*/
    });
</script>


</main>
<?php $this->load->view('includes/footer');?>
</body>
</html>