<!doctype html>
<html>
<head>
    <title>Request Detail – <?= $site_settings->site_name?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>
<body id="home-page">
    <?php get_header() ?>
<main>


<section id="bookNow" data-request data-detail>
    <div class="contain">
        <h1 class="secHeading">Request Detail</h1>
        <div class="outer">
            <div class="sideBlk">
                <div class="smalBlk blk">
                    <div class="proBlk srchItm">
                        <div class="icoBlk">
                            <div class="ico"><img src="<?= get_image_src($row->mem_image, 150, true)?>"></div>
                        </div>
                        <div class="txt">
                            <h2><?= $row->mem_name?></h2>
                            <div class="locate"><?= $row->mem_city?>, <?= $row->mem_state?>, <?= $row->mem_zip?></div>
                        </div>
                    </div>
                    <div class="sumyBlk">
                        <h4 class="color2"><?= $row->title?> Details</h4>
                        <h5 class="ovrVew"><?= $row->price_overview?></h5>
                        <ul class="list">
                            <li>
                                <div><?= ucfirst($row->price_label)?>s:</div>
                                <div><?= $row->num_stays?></div>
                            </li>
                            <?php
                            switch ($row->service_id) {
                                case 1:
                                    echo '<li>
                                        <div>Drop-Off Date:</div>
                                        <div>
                                            <div>'.$row->start_date.'<div>'.$row->dropoff_from_time.' - '.$row->dropoff_to_time.'</div></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div>Pick-Up Date:</div>
                                        <div>
                                            <div>'.$row->end_date.'<div>'.$row->pickup_from_time.' - '.$row->pickup_to_time.'</div></div>
                                        </div>
                                    </li>';
                                    break;
                                case 2:
                                    echo '<li>
                                        <div>Start Date:</div>
                                        <div>
                                            <div>'.$row->start_date.'<div>'.$row->dropoff_from_time.' - '.$row->dropoff_to_time.'</div></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div>End Date:</div>
                                        <div>
                                            <div>'.$row->end_date.'<div>'.$row->pickup_from_time.' - '.$row->pickup_to_time.'</div></div>
                                        </div>
                                    </li>';
                                    break;
                                case 3:
                                    echo '<li>
                                        <div>Dates:</div>
                                        <div>';
                                        if ($row->days_type=='one-time') {
                                            $dates = @explode(', ', $row->dates);
                                            $times = json_decode($row->visits);
                                            foreach ($dates as $key => $date) {
                                                echo '<div>'.$date;
                                                    foreach ($times[$key] as $time) {
                                                        echo '<div>'.$time.'</div>';
                                                    }
                                                echo '</div>';
                                            }
                                        }else {
                                            $days = @explode(', ', $row->days);
                                            $times = json_decode($row->visits);
                                            foreach ($days as $key => $day) {
                                                echo '<div>'.$day;
                                                    foreach ($times[$key] as $time) {
                                                        echo '<div>'.$time.'</div>';
                                                    }
                                                echo '</div>';
                                            }
                                        }
                                    echo '</div></li>';
                                    break;
                                case 4:
                                    echo '<li>
                                        <div>Dates:</div>
                                        <div>';
                                        $dropoff_times = json_decode($row->dropoff_times);
                                        $pickup_times = json_decode($row->pickup_times);
                                        if ($row->days_type=='one-time') {
                                            $dates = @explode(', ', $row->dates);

                                            foreach ($dates as $key => $date) {
                                                echo '<div>'.$date.'<div>'.$dropoff_times[$key].' - '.$pickup_times[$key].'</div></div>';
                                            }
                                        }else {
                                            $days = @explode(', ', $row->days);
                                            // $times = json_decode($row->visits);
                                            foreach ($days as $key => $day) {
                                                echo '<div>'.$day.'<div>'.$dropoff_times[$key].' - '.$pickup_times[$key].'</div></div>';
                                            }
                                        }
                                    echo '</div></li>';
                                    break;
                                case 5:
                                    echo '<li>
                                        <div>Dates:</div>
                                        <div>';
                                        $dropoff_times = json_decode($row->dropoff_times);
                                        $pickup_times = json_decode($row->pickup_times);
                                        if ($row->days_type=='one-time') {
                                            $dates = @explode(', ', $row->dates);

                                            foreach ($dates as $key => $date) {
                                                echo '<div>'.$date.'<div>'.$dropoff_times[$key].' - '.$pickup_times[$key].'</div></div>';
                                            }
                                        }else {
                                            $days = @explode(', ', $row->days);
                                            // $times = json_decode($row->visits);
                                            foreach ($days as $key => $day) {
                                                echo '<div>'.$day.'<div>'.$dropoff_times[$key].' - '.$pickup_times[$key].'</div></div>';
                                            }
                                        }
                                    echo '</div></li>';
                                    break;
                            }
                            ?>
                        </ul>
                        <div class="petBlk">
                            <h4>My Pets</h4>
                            <div class="dropDown petDropDown">
                                <ul class="dropCnt dropLst">
                                    <?php foreach ($row->pet_rows as $key => $pet): ?>
                                        <li>
                                            <a>
                                                <img src="<?= get_image_src($pet->image, 150, true)?>" alt="<?= $pet->name?>">
                                                <span><?= $pet->name?> <small>(<?= $pet->breed?>)</small></span>
                                                <ul class="flex">
                                                    <li><em><img src="<?= base_url('assets/images/icon-gender.svg')?>" alt=""><?= ucfirst($pet->gender)?></em></li>
                                                    <li><em><img src="<?= base_url('assets/images/icon-temperature.svg')?>" alt="">30°</em></li>
                                                    <li><em><img src="<?= base_url('assets/images/icon-beat.svg')?>" alt="">90</em></li>
                                                    <li><em><img src="<?= base_url('assets/images/icon-weight.svg')?>" alt=""><?= $pet->weight?>bs</em></li>
                                                </ul
                                                ><!--<em><strong><?= ucfirst($pet->gender)?></strong>, <?= $pet->weight?>bs</em>-->
                                            </a>
                                        </li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                        </div>
                        <div class="tblBlk clcMn">
                            <table>
                                <tbody>
                                    <?php $calc_row = calc_booking_total($row, 'sitter');?>
                                    
                                    <?php $total_pets = $row->puppies+$row->cats+$row->dogs;?>
                                    <?php $total_stays = $row->num_stays-$row->num_holidays;?>
                                    <?php if ($row->dogs>0 && $total_stays>0): ?>
                                        <?php $stays_label = $total_stays>1?ucfirst($row->price_label).'s':ucfirst($row->price_label);?>
                                        <tr class="no_border">
                                            <td><strong>First Dog</strong> <small>$<?= $row->rate?>/<?= ucfirst($row->price_label)?> x 1 Dog x <?= $total_stays?> <?= $stays_label?></small></td>
                                            <td class="price"><?= format_amount($calc_row['dog_total'])?></td>
                                        </tr>
                                        <?php if ($row->dogs-1>0): ?>
                                            <?php $stotal += ($row->additional_dog_rate*$total_stays*($row->dogs-1));?>
                                            <?php $pet_label = $row->dogs-1>1?'Dogs':'Dog';?>
                                            <tr class="no_border">
                                                <td><strong>Additional dogs</strong> <small>$<?= $row->additional_dog_rate?>/<?= ucfirst($row->price_label)?> x <?= $row->dogs-1?> <?= $pet_label?> x <?= $total_stays?> <?= $stays_label?></small></td>
                                                <td class="price"><?= format_amount($calc_row['additional_dog_total'])?></td>
                                            </tr>
                                        <?php endif ?>
                                    <?php endif ?>
                                    <?php if ($row->puppies>0): ?>
                                            <?php $pet_label = $row->puppies>1?'Puppies':'puppy';?>
                                            <tr class="no_border">
                                                <td><strong>Puppies</strong> <small>$<?= $row->puppy_rate?>/<?= ucfirst($row->price_label)?> x <?= $row->puppies?> <?= $pet_label?> x <?= $total_stays?> <?= $stays_label?></small></td>
                                                <td class="price"><?= format_amount($calc_row['puppies_total'])?></td>
                                            </tr>
                                    <?php endif ?>

                                    <?php if ($row->extended_stays>0 && ($row->puppies+$row->dogs)>0): ?>
                                        <?php $pet_label = ($row->puppies+$row->dogs)>1?'Dogs':'Dog';?>
                                        <?php $stays_label = $row->extended_stays>1?ucfirst($row->price_label).'s':ucfirst($row->price_label);?>
                                        <tr class="no_border">
                                            <td><strong>Extended stay rate</strong> <small>$<?= $row->extended_stay_rate?>/<?= ucfirst($row->price_label)?> x <?= ($row->puppies+$row->dogs)?> <?= $pet_label?> x <?= $row->extended_stays?> <?= $stays_label?></small></td>
                                            <td class="price"><?= format_amount($calc_row['extended_dog_total'])?></td>
                                        </tr>
                                    <?php endif ?>

                                    <?php if ($row->cats>0 && $total_stays>0): ?>
                                        <?php $stays_label = $total_stays>1?ucfirst($row->price_label).'s':ucfirst($row->price_label);?>
                                        <tr class="no_border">
                                            <td><strong>First Cat</strong> <small>$<?= $row->cat_care_rate?>/<?= ucfirst($row->price_label)?> x 1 Cat x <?= $total_stays?> <?= $stays_label?></small></td>
                                            <td class="price"><?= format_amount($calc_row['cat_total'])?></td>
                                        </tr>
                                        <?php if ($row->cats-1>0): ?>
                                            <?php $pet_label = $row->cats-1>1?'Cats':'Cat';?>
                                            <tr class="no_border">
                                                <td><strong>Additional cats</strong> <small>$<?= $row->additional_cat_rate?>/<?= ucfirst($row->price_label)?> x <?= $row->cats-1?> <?= $pet_label?> x <?= $row->num_holidays?> <?= $stays_label?></small></td>
                                                <td class="price"><?= format_amount($calc_row['additional_cat_total'])?></td>
                                            </tr>
                                        <?php endif ?>
                                    <?php endif ?>
                                    <?php if ($row->extended_stays>0 && $row->cats>0): ?>
                                        <?php $pet_label = $row->cats>1?'Cats':'Cat';?>
                                        <?php $stays_label = $row->extended_stays>1?ucfirst($row->price_label).'s':ucfirst($row->price_label);?>
                                        <tr class="no_border">
                                            <td><strong>Extended stay rate</strong> <small>$<?= $row->extended_stay_rate?>/<?= ucfirst($row->price_label)?> x <?= $row->cats?> <?= $pet_label?> x <?= $row->extended_stays?> <?= $stays_label?></small></td>
                                            <td class="price"><?= format_amount($calc_row['extended_cat_total'])?></td>
                                        </tr>
                                    <?php endif ?>
                                    <?php if ($row->holiday_rate>0 && $row->num_holidays>0): ?>
                                        <?php $pet_label = $total_pets>1?'Pets':'Pet';?>
                                        <?php $stays_label = $row->num_holidays>1?ucfirst($row->price_label).'s':ucfirst($row->price_label);?>
                                        <tr class="no_border">
                                            <td><strong>Holidays stay rate</strong> <small>$<?= $row->holiday_rate?>/<?= ucfirst($row->price_label)?> x <?= $total_pets?> <?= $pet_label?> x <?= $row->num_holidays?> <?= $stays_label?></small></td>
                                            <td class="price"><?= format_amount($calc_row['holiday_total'])?></td>
                                        </tr>
                                    <?php endif ?>

                                    <?php if ($row->pickup_extra>0): ?>
                                        <tr class="ext no_border">
                                            <td><strong>Pick-Up and Drop-Off:</strong></td>
                                            <td class="price"><?= format_amount($calc_row['pickup_extra'])?></td>
                                        </tr>
                                    <?php endif ?>
                                    <?php if ($row->sixty_minuts_extra>0): ?>
                                        <tr class="ext no_border">
                                            <td><strong>60 Minute rate:</strong></td>
                                            <td class="price"><?= format_amount($calc_row['sixty_minuts_extra'])?></td>
                                        </tr>
                                    <?php endif ?>
                                    <?php if ($row->bathing_extra>0): ?>
                                        <tr class="ext no_border">
                                            <td><strong>Bathing and Grooming:</strong></td>
                                            <td class="price"><?= format_amount($calc_row['bathing_extra'])?></td>
                                        </tr>
                                    <?php endif ?>
                                    <?php if ($row->play_dates_exta>0): ?>
                                        <tr class="no_border">
                                            <td><strong>Play Dates</strong></td>
                                            <td class="price"><?= format_amount($calc_row['play_dates_exta'])?></td>
                                        </tr>
                                    <?php endif ?>
                                    <tr class="ext no_border bold">
                                        <td>PFSC Commission</td>
                                        <td class="price"><?= format_amount($calc_row['pfsc_commission'])?></td>
                                    </tr>
                                    <tr>
                                        <td class="bold">Your Earning:</td>
                                        <td class="price" id="gttl"><?= format_amount($calc_row['total'])?></td>
                                    </tr>
                            </table>
                        </div>
                        <p class="small text-center">Booking and paying on PFSC is required per PFSC's <a href="<?= site_url('terms-conditions')?>">Terms of Service</a> — never pay in cash.</p>
                        <!-- <div class="bTn">
                            <button type="submit" class="webBtn colorBtn">Book it Now</button>
                        </div> -->
                        <?php if ($row->status==0): ?>
                            <div class="bTn">
                                <a href="javascript:void(0)" class="webBtn colorBtn red actn-btn" data-store="<?= $encoded_id?>" data-link="reject-booking-request">Decline <i class="spinner hidden"></i></a>
                                <a href="javascript:void(0)" class="webBtn colorBtn green actn-btn" data-store="<?= $encoded_id?>" data-link="accept-booking-request">Accept <i class="spinner hidden"></i></a>

                                <!-- <button type="submit" class="webBtn colorBtn red">Reject</button>
                                <button type="submit" class="webBtn colorBtn green">Accept</button> -->
                            </div>
                        <?php elseif ($row->status==1): ?>
                            <div class="alertDiv accept">Request has been accepted!</div>
                        <?php elseif ($row->status == 2): ?>
                            <div class="alertDiv accept">Booking has been Confirmed!</div>
                        <?php elseif ($row->status==3): ?>
                            <div class="alertDiv reject">Request has been Declined.</div>
                        <?php endif ?>
                        <?php if ($row->status == 2 && $row->canceled==1): ?>
                            <div class="alertDiv reject">Booking has been Canceled.</div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
            <!-- <div class="dataBlk blk">
                <div data-form="main">
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
                </div>
            </div> -->
        </div>
    </div>
</section>
<!-- bookNow -->


</main>
<?php $this->load->view('includes/footer');?>
</body>
<?php if ($row->status==0): ?>
    
<script type="text/javascript">
    $(function() {
        var ajaxSearch = false;
        $(document).on('click','a.actn-btn',function(e){
            e.preventDefault()
            if(ajaxSearch)
                return;
            
            var btn = $(this);
            var store = btn.data('store');
            var link = btn.data('link');
            if (store=='' || link=='')
                return false;
            if (btn.data("disabled"))
                return false;
            if (link=='reject-booking-request')
               if(!confirm('Are you sure ?'))
                return false;
            needToConfirm = true;

            btn.data("disabled", "disabled");
            btn.find("i.spinner").removeClass('hidden');
            $.ajax({
                url: base_url+'/'+link,
                data : {'store':store},
                dataType: 'JSON',
                method: 'POST',
                success: function (rs) {
                    if(rs.status===1){
                        setTimeout(function(){
                            btn.parents('div.bTn').after(rs.data);
                            btn.parents('div.bTn').prev('p').remove().end().remove();
                        },1000)
                    }
                    else
                        alert('Something went wrong!')
                },
                error: function(rs){
                    console.log(rs);
                },
                complete: function (rs) {
                    ajaxSearch = false;
                    needToConfirm = false;
                }
            })
        });
    })
</script>
<?php endif ?>
</html>