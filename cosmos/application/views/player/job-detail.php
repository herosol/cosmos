<!doctype html>
<html>
<head>
<title>Job Detail – <?= $site_settings->site_name?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>
<body id="home-page">
<?php get_header(); ?>
<main>


<section id="dash">
    <div id="booking" class="bookDetail">
        <div class="contain">
            <div class="head">
                <h1 class="secHeading">Job Detail</h1>
            </div>
            <div class="inside">
                <div class="topBlk">
                    <div class="icoBlk">
                        <div class="ico"><img src="<?= get_image_src($row->mem_image, '150', true)?>" alt="<?= $row->mem_name?>" title="<?= $row->mem_name?>"></div>
                        <h4><?= $row->mem_name?> <!-- <span class="regular"><?= $row->service?></span> --></h4>
                    </div>
                    <ul class="blkLst text-center">
                        <li>
                            <div class="price_bold"><i class="fi-envelope"></i></div>
                            <em><a href="<?= site_url('messages/'.doEncode($row->mem_id))?>">Contact</a></em>
                        </li>
                        <li>
                            <div class="price_bold"><i class="fi-map"></i></div>
                            <?php if (in_array($row->service_id, array(1, 4))): ?>
                                <em><?= $row->mem_address1?>, <?= $row->mem_city?>, <?= $row->mem_state?>, <?= $row->mem_zip?></em>
                            <?php else: ?>
                                <em><?= $row->mem_address1?>, <?= $row->mem_city?>, <?= $row->mem_state?>, <?= $row->mem_zip?></em>
                            <?php endif ?>
                        </li>
                    </ul>
                </div>
                <!-- <div id="bookNow" data-request data-detail>
                    <div class="smalBlk blk">
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
                                                $times = json_decode($row->visits);
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
                                                $times = json_decode($row->visits);
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
                                                    </ul>
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
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div id="mapBlk">
                    <div id="map_canvas"></div>
                </div>
                <!-- <div class="jobBlk">
                    <ul class="lst">
                        <li>
                            <div class="icoBlk">
                                <div class="ico"><img src="<?= get_image_src($row->mem_image, 300, true)?>" alt="<?= $row->mem_name?>"></div>
                                <div class="name"><?= $row->mem_name?> <em><?= $row->service?></em></div>
                            </div>
                        </li>
                        <li class="price_bold"><?= format_amount($row->amount)?></li>
                        <li class="date"> <?= format_date($row->start_date)?><em>&#8594;</em> <?= format_date($row->end_date)?></li>
                    </ul>
                </div> -->
                <?php
                if ($row->canceled == 0 && $row->completed == 2):
                    $review = get_mem_review($row->owner_id, $row->id);
                    $review_reply = get_reply($review->id);
                ?>
                    <div class="reviewBlk">
                        <div class="review">
                            <div class="icoBlk">
                                <div class="ico"><img src="<?= get_image_src($review->mem_image, 300, true)?>" alt="<?= $review->mem_name?>"></div>
                            </div>
                            <div class="txt">
                                <div class="icoTxt">
                                    <div class="title">
                                        <h4><?= $review->mem_name?></h4>
                                        <div class="date"><?= format_date($review->date)?></div>
                                    </div>
                                    <div class="rateYo" data-rateyo-rating="<?= $review->rating?>" data-rateyo-read-only="true"></div>
                                </div>
                                <p><?= $review->comment?></p>
                                <div class="btnBlk">
                                    <?php if (!$review_reply): ?>
                                        <h5 class="regular">Respond to buyer's feedback.</h5>
                                        <div class="bTn">
                                            <button type="button" class="webBtn colorBtn smBtn popBtn" data-popup="leave-feedback">Leave Feedback</button>
                                        </div>
                                    <?php endif ?>
                                    <?php if ($review_reply): ?>
                                        <h5 class="regular"><?= $review_reply->comment?></h5>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif?>
                <?php if ($row->canceled == 0 && $row->completed == 0 && $row->on_location == 0): ?>
                    <div class="btnBlk text-center">
                        <h5 class="regular">Press the button when you're on location.</h5>
                        <div class="bTn">
                            <button type="button" class="webBtn colorBtn onLctn" data-store="<?= $row->encoded_id?>">I'm on Location</button>
                        </div>
                    </div>
                <?php endif ?>
                <?php if ($row->canceled == 0 && $row->on_location == 1): ?>
                    <div class="btnBlk text-center">
                        <h5 class="regular">You pressed that button at <?= format_date($row->location_time, 'M d, Y h:i:s a')?>.</h5>
                        <div class="bTn">
                            <button type="button" class="webBtn colorBtn" disabled="">I'm on Location</button>
                        </div>
                    </div>
                    <?php if ($row->completed == 1):?>
                        <div class="alertDiv accept">Job has been marked as completed!</div>
                    <?php endif?>
                    <?php if ($row->completed == 2):?>
                        <div class="alertDiv accept">Job has been completed!</div>
                    <?php endif?>
                <?php endif ?>
                <?php if ($row->canceled == 0 && $row->completed == 0 && $row->on_location == 1): ?>
                    <!-- <div class="blk">
                        <div class="_header">
                            <h3>Submit Information Appointment</h3>
                        </div>
                        <form action="<?= site_url('mark-complete-booking')?>" method="post" autocomplete="off" id="frmAptInfo" class="frmAjax">
                            <input type="hidden" name="store" value="<?= $row->encoded_id?>">
                            <div class="row formRow">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-4 txtGrp">
                                    <input type="text" name="pee" id="pee" class="txtBox" placeholder="PEE">
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-4 txtGrp">
                                    <input type="text" name="poo" id="poo" class="txtBox" placeholder="POO">
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-4 txtGrp">
                                    <input type="text" name="food" id="food" class="txtBox" placeholder="Food">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                    <input type="text" name="water" id="water" class="txtBox" placeholder="Water">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                    <input type="text" name="dog_intraction" id="dog_intraction" class="txtBox" placeholder="Dog interaction">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                    <input type="text" name="treat_breaks" id="treat_breaks" class="txtBox" placeholder="Treat breaks">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                    <input type="text" name="play_time" id="play_time" class="txtBox" placeholder="Playtime">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                    <input type="text" name="walk_distance" id="walk_distance" class="txtBox" placeholder="Approximate distance of walk">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                    <input type="text" name="walk_time" id="walk_time" class="txtBox" placeholder="Walk time">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <h4>Upload Photos <a href="javascript:void(0)" class="delBtn">Delete all</a></h4>
                                    <input type="file" id="uploadFiles" name="" multiple="true" class="" style="display: none;" data-file="" accept="image/*">
                                    <button type="button" class="txtBox uploadmlImg" data-image-src="booking">Select file to upload</button>
                                    <div class="uploadBar hidden"><span></span></div>
                                    <div class="upLoadBlk txtBox">
                                        <div class="inside scrollbar">
                                            <ul class="imgLst flex">
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <textarea name="additional_comment" id="additional_comment" class="txtBox" placeholder="Additional comments"></textarea>
                                </div>
                            </div>
                            <div class="bTn text-center">
                                <button type="submit" class="webBtn colorBtn">Finish Appointment <i class="spinner hidden"></i></button>
                            </div>
                            <div class="alertMsg"></div>
                        </form>
                    </div> -->
                <?php endif ?>
                <?php if ($row->canceled == 0 && $row->completed > 0 && $row->on_location == 1): ?>
                    <!-- <div class="blk">
                        <div class="_header">
                            <h3>Appointment Information </h3>
                        </div>
                        <ul class="list">
                            <li>
                                <div>PEE:</div>
                                <div><?= $row->pee?></div>
                            </li>
                            <li>
                                <div>POO:</div>
                                <div><?= $row->poo?></div>
                            </li>
                            <li>
                                <div>Food:</div>
                                <div><?= $row->food?></div>
                            </li>
                            <li>
                                <div>Water:</div>
                                <div><?= $row->water?></div>
                            </li>
                            <li>
                                <div>Dog Interaction:</div>
                                <div><?= $row->dog_intraction?></div>
                            </li>
                            <li>
                                <div>Treat Breaks:</div>
                                <div><?= $row->treat_breaks?></div>
                            </li>
                            <li>
                                <div>Playtime:</div>
                                <div><?= $row->play_time?></div>
                            </li>
                            <li>
                                <div>Distance of walk:</div>
                                <div><?= $row->walk_distance?></div>
                            </li>
                            <li>
                                <div>Walk Time:</div>
                                <div><?= $row->walk_time?></div>
                            </li>
                            <li>
                                <div>Comments:</div>
                                <div><?= $row->additional_comment?></div>
                            </li>
                            <li>
                                <div>Photos:</div>
                            </li>
                        </ul>
                        <div class="upLoadBlk txtBox">
                            <div class="inside scrollbar">
                                <ul class="imgLst flex">
                                    <?php foreach ($row->images as $key => $img): ?>
                                        <li>
                                            <div class="image"><img src="<?= get_image_src($img->image, 150, true)?>" alt=""></div>
                                        </li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                        </div>
                    </div> -->
                <?php endif ?>
                <!-- <div class="blk">
                    <div class="_header">
                        <h3>Details</h3>
                    </div>
                    <ul class="list">
                        <li>
                            <div>Service:</div>
                            <div>Dog Boarding</div>
                        </li>
                        <li>
                            <div>Drop off:</div>
                            <div>September 25, 2018</div>
                        </li>
                        <li>
                            <div>Pick up:</div>
                            <div>September 26, 2018</div>
                        </li>
                        <li>
                            <div>Amount:</div>
                            <div>$250</div>
                        </li>
                        <li>
                            <div>Location:</div>
                            <div>70 east sunrise highway, V35 - 80 Dto 1070-020 Lisboa, New York 11581.</div>
                        </li>
                        <li>
                            <div>Notes:</div>
                            <div>I work from home where I live with my partner Kev and our active fur-child Dusty the Labradoodle. We love dogs and have owned our own and looked after others. When we first came to Tassie we house and pet sat for 3 months, loving every minute with Nellie the corgi x border collie cross.</div>
                        </li>
                    </ul>
                    <div class="bTn text-center">
                        <button type="button" class="webBtn">Reject</button>
                        <button type="submit" class="webBtn colorBtn">Accept</button>
                    </div>
                </div>
                <div class="btnBlk text-center">
                    <h5 class="regular">Contact with Sitter</h5>
                    <div class="bTn">
                        <button type="button" class="webBtn colorBtn" disabled="">Contact Me</button>
                    </div>
                </div> -->
            </div>
        </div>
        <?php if (!$review_reply && $row->completed==2): ?>
            <div class="popup" data-popup="leave-feedback">
                <div class="tableDv">
                    <div class="tableCell">
                        <div class="contain">
                            <div class="_inner">
                                <?php $this->load->view('owner/leave-review')?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>
    </div>
</section>
<!-- dash -->


<!-- Google Map Api -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmqmsf3pVEVUoGAmwerePWzjUClvYUtwM&libraries=geometry,places&ext=.js"></script>
<script type="text/javascript" src="<?= base_url('assets/js/map.api.js')?>"></script>
</main>
<?php $this->load->view('includes/footer');?>
<script type="text/javascript">
    $(function() {
        let mapOptions = {
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            center: new google.maps.LatLng(33.9139599, -84.2968273),
            styles: grayStyles,
            zoom: 12
        };
        function initialize() {
            map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
        }
        google.maps.event.addDomListener(window, 'load', initialize);

        $(document).on('click', '.onLctn', function() {            
            let btn = $(this);
            let store = btn.data('store');
            if (store=='' || btn.attr("disabled"))
                return false;
            btn.attr("disabled", true);
            $.ajax({
                url: base_url+'on-location',
                data : {'store':store},
                dataType: 'JSON',
                method: 'POST',
                success: function (rs) {
                    if(rs.status===1)
                        location.reload(true)
                    else
                        alert('Something went wrong!')
                },
                error: function(rs){
                    console.log(rs);
                }
            })
        })
    })
</script>
</body>
</html>