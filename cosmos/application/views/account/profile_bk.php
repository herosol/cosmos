<!doctype html>
<html>
<head>
<title>Profile – <?=$site_settings->site_name?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>
<body id="home-page">
    <?php get_header() ?>
<main>


<section id="profile">
	<div class="fixedBtn">
        <button type="button" id="availBtn" class="webBtn"><i class="fi-calendar"></i></button>
        <button type="button" id="proBtn" class="webBtn colorBtn"><i class="fi-check"></i> Hire <?= $row->mem_fname?></button>
    </div>
	<div class="contain">
		<div class="flexRow flex">
			<div class="col col1">
				<div class="miniSlider">
					<ul id="lightSlider" class="relative">
		                <?php foreach ($row->images as $key => $img): ?>
		                	<li data-src="<?= get_image_src($img->image)?>" data-thumb="<?= get_image_src($img->image,'150')?>">
		                		<img src="<?= get_image_src($img->image)?>" alt="">
		                		<?php if (!empty($img->admin) && empty($mem_data->mem_inspected)): ?>
		                			<div class="caption">Home Inspection</div>
		                		<?php endif ?>
		                	</li>
		                <?php endforeach ?>
		                <!-- <li class="miniBtn bTn">
		                	<button type="button" id="zoomBtn" class="webBtn smBtn">View Photos</button>
		                </li> -->
		            </ul>
	            </div>
	            <div id="descrip">
		            <div class="client">
		            	<h3>About <?= $row->mem_fname?></h3>
		            	<p><?= $row->mem_about?></p>
		            	<hr>
		            	<h3>About <?= $row->mem_fname?>'s Home</h3>
		            	<ul class="_list ico_list flex">
		            		<li><img src="<?= site_url('assets/images/icon-home.svg')?>" alt="">Lives in a House</li>
							<li><img src="<?= site_url('assets/images/icon-no-smoking.svg')?>" alt="">Non-Smoking Household</li>
							<li><img src="<?= site_url('assets/images/icon-no-child.svg')?>" alt="">No Children Present</li>
							<li><img src="<?= site_url('assets/images/icon-yard.svg')?>" alt="">Has a Fenced Yard</li>
							<li><img src="<?= site_url('assets/images/icon-dogi.svg')?>" alt="">Has 1 Dog, No Other Pets</li>
		            	</ul>
		            	<hr>
		            	<h3>Hosting Preferences</h3>
		            	<!-- <ul class="_list flex">
		            		<li>0-15 lbs</li>
							<li>16-40 lbs</li>
							<li>41-100 lbs</li>
							<li>101+ lbs</li>
		            	</ul> -->
		            	<ul class="sizeLst text-center">
							<li>
								<img src="<?= site_url('assets/images/size_cat.svg')?>" alt="">
								Cat<small>&nbsp;</small>
							</li>
							<li>
								<img src="<?= site_url('assets/images/size_small.svg')?>" alt="">
								Small<small>0-15lbs</small>
							</li>
							<li>
								<img src="<?= site_url('assets/images/size_medium.svg')?>" alt="">
								Medium<small>16-40lbs</small>
							</li>
							<li>
								<img src="<?= site_url('assets/images/size_large.svg')?>" alt="">
								Large<small>41-100lbs</small>
							</li>
							<li class="disabled">
								<img src="<?= site_url('assets/images/size_gaint.svg')?>" alt="">
								Gaint<small>101+lbs</small>
							</li>
		            	</ul>
		            	<hr>
		            	<h3>Traveling Preferences</h3>
		            	<!-- <ul class="_list flex">
		            		<li>0-15 lbs</li>
							<li>16-40 lbs</li>
							<li>41-100 lbs</li>
							<li>101+ lbs</li>
		            	</ul> -->
		            	<ul class="sizeLst text-center">
							<li>
								<img src="<?= site_url('assets/images/size_cat.svg')?>" alt="">
								Cat<small>&nbsp;</small>
							</li>
							<li>
								<img src="<?= site_url('assets/images/size_small.svg')?>" alt="">
								Small<small>0-15lbs</small>
							</li>
							<li>
								<img src="<?= site_url('assets/images/size_medium.svg')?>" alt="">
								Medium<small>16-40lbs</small>
							</li>
							<li>
								<img src="<?= site_url('assets/images/size_large.svg')?>" alt="">
								Large<small>41-100lbs</small>
							</li>
							<li class="disabled">
								<img src="<?= site_url('assets/images/size_gaint.svg')?>" alt="">
								Gaint<small>101+lbs</small>
							</li>
		            	</ul>
		            	<hr>
		            	<h5>Additional Skills</h5>
		            	<ul class="_list flex">
		            		<li>Senior Dog Experience</li>
		            		<li>Can provide daily exercise</li>
		            	</ul>
		            	<h5>Stats</h5>
		            	<ul class="_list flex">
		            		<li>&lt;1h Response time</li>
		            		<li>100% Response rate</li>
		            		<li>SMS <em class="miniLbl green">Verified</em></li>
		            		<li>Email <em class="miniLbl green">Verified</em></li>
		            	</ul>
		            	<h5>In <?= $row->mem_fname?>'s Home</h5>
		            	<ul class="_list flex">
		            		<li>Dogs Allowed On Bed</li>
							<li>Potty Breaks Every 0-2 Hours</li>
							<li>Dogs Allowed On Furniture</li>
		            	</ul>
		            </div>
		            <?php if (!empty($row->mem_video) && empty($mem_data->mem_inspected)): ?>
		            	<hr />
		            	<div class="head">
		            		<h3>Home Inspection Video</h3>
		            	</div>
		            	<div class="vidBlk">
		            		<video>
		            			<source src="<?= SITE_VPATH.'attachments/'.$row->mem_video?>" type="video/mp4" />
		            		</video>
		            		<div class="videoBtn play"></div>
		            	</div>
		            <?php endif ?>
		            <hr />
		            <div class="reviews">
	                    <div class="head">
	                        <h3><?= $review_count?> Reviews</h3>
	                        <div class="rateYo" data-rateyo-rating="<?= $avg_mem_rating?>" data-rateyo-read-only="true"></div>
	                    </div>
	                    <?php foreach ($mem_reviews as $review_row): ?>
                            <div class="review">
                            	<div class="icoBlk">
                            		<div class="ico"><img src="<?= get_image_src($review_row->mem_image,150,true)?>" alt=""></div>
                            	</div>
                            	<div class="txt">
                            		<div class="icoTxt">
                            			<div class="title">
                            				<h4><?= $review_row->mem_name?></h4>
                            				<div class="date"><?= format_date($review_row->date)?></div>
                            			</div>
                            			<div class="rateYo" data-rateyo-rating="<?= $review_row->rating?>" data-rateyo-read-only="true"></div>
                            		</div>
                            		<p><?= $review_row->comment?></p>
                            		<?php if ($reply= get_reply($review_row->id)): ?>
                            			<div class="subReview">
                            				<div class="ico"><img src="<?= get_image_src($reply->mem_image, 150, true)?>" alt=""></div>
                            				<div class="subBlk">
                            					<h5><?= $reply->mem_name?></h5>
                            					<p><?= $reply->comment?></p>
                            				</div>
                            			</div>
                            		<?php endif ?>
                            	</div>
                            </div>
                        <?php endforeach ?>
					</div>
	            </div>
				<div class="location">
					<div id="mapBlk">
						<div id="map_canvas"></div>
					</div>
					<p class="blk">All stays booked on Puppy Friends Social Club receive our <a href="<?= base_url('guarantee')?>">PFSC Guarantee</a>, 24/7 support, and our <a href="<?= base_url('reservation-protection')?>">reservation protection</a>.</p>
				</div>
			</div>
			<div class="col col2">
				<div class="proBlk">
					<div class="srchItm">
						<div class="icoBlk">
							<div class="ico"><img src="<?= get_image_src($row->mem_image, '150', true)?>" alt="<?= format_name($row->mem_fname, $row->mem_lname)?>" title="<?= format_name($row->mem_fname, $row->mem_lname)?>"></div>
						</div>
						<div class="txt">
							<h2>
								<?= format_name($row->mem_fname,$row->mem_lname)?>
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
							<?php if ($this->session->mem_type!='sitter'): ?>
								<?= favorite_btn($row->mem_id, 'sitter')?>
							<?php endif ?>
							<div class="rateBlk">
								<div class="rating"><div class="rateYo" data-rateyo-rating="<?= $avg_mem_rating?>" data-rateyo-read-only="true"></div><span><?= $review_count?></span></div>
							</div>
						</div>
					</div>
					<hr>
					<div id="proSide">
						<div class="crosBtn"></div>
						<div class="btmBlk text-center">
							<?php if ($this->session->mem_type!='sitter'): ?>
							<div class="bTn">
								<?php $msg_url='login'?>
								<?php $bk_url='login'?>
								<?php if ($this->session->has_userdata('mem_type') && !empty($mem_data->mem_verified)):?>
									<?php $msg_url = 'messages/'.$encoded_id?>
									<?php $bk_url='book-now/'.$encoded_id?>
								<?php endif?>
								<?php if ($this->session->mem_type!='sitter'): ?>
									<!-- <li><a href="<?= site_url($msg_url)?>" class="webBtn">Message Now</a></li>
									
									<li><a href="<?= site_url($bk_url)?>" class="webBtn colorBtn">Book Lesson</a></li> -->
	
									<a href="<?= site_url('messages/'.$encoded_id)?>" class="webBtn colorBtn">Contact Me</a>
									<!-- <a href="javascript:void(0)" class="webBtn colorBtn popBtn" data-popup="contact-me">Contact Me</a> -->
	
									<a href="<?= site_url('book-now/'.$encoded_id)?>" class="webBtn">Book Now</a>
								<?php endif ?>
							</div>
							<hr>
							<?php endif ?>
							<div class="lstng text-left">
								<h4 class="color2">Services</h4>
								<ul class="aditionLst text-left">
									<?php foreach ($services as $key => $service): ?>
										<li>
											<div><strong><?= $service->title?></strong><?= $service->price_overview?></div>
											<div><span class="price">$<?= $service->price?> <small><?= $service->price_label?></small></span></div>
										</li>
									<?php endforeach ?>
								</ul>
								<div class="text-center semi">
									<a href="javascript:void(0)" class="color popBtn" data-popup="services">See Additional Services & Rates</a>
								</div>
							</div>
						</div>
						<div class="smTxt text-center">
							<h5>Cancellation policy: Flexible</h5>
							<p class="small">Full refund if cancelled before noon one day before the booking, 50% refund afterwards</p>
						</div>
					</div>
				</div>
				<div class="smTxt text-center">
					<h5>Cancellation policy: Flexible</h5>
					<p class="small">Full refund if cancelled before noon one day before the booking, 50% refund afterwards</p>
				</div>
				
				<div id="availblty" class="availblty">
					<div class="crosBtn"></div>
					<div class="inr">
						<h4 class="color2">Availability</h4>
						<?php $days = get_week_days()?>
						<?php foreach ($days as $day_key => $day): ?>
							<?php $not_available_days .= (empty($sitter_timings[$day_key]->day) || $sitter_timings[$day_key]->day==$day) && empty($sitter_timings[$day_key]->available)?"'".$day_key."',":''?>
						<?php endforeach ?>
						<div class="datepicker" data-date-days-of-week-disabled="<?= trim($not_available_days, ',')?>"></div>
					</div>
					<div class="smTxt text-center">
						<ul class="calendar_legend flex">
							<li><span class="avail">Available</span></li>
							<li><span class="unavail">Unavailable</span></li>
						</ul>
						<h5>Calendar last updated 3 days ago</h5>
					</div>
				</div>
				<div class="text-center">
					<p class="small"><a href="javascript:void(0)" class="popBtn" data-popup="report-profile"><i class="fi-flag fi-2x"></i> Report this profile</a></p>
				</div>
			</div>
		</div>
	</div>
	<div class="popup" data-popup="services">
        <div class="tableDv">
            <div class="tableCell">
                <div class="contain">
                    <div class="_inner">
                        <div class="crosBtn"></div>
                        <h2>Additional Services & Rates</h2>
                        <?php foreach ($services as $key => $service): ?>
                        	<div class="svcBlk">
                        		<div class="inner">
                        			<div class="icoBlk">
                        				<div class="icon"><img src="<?= get_site_image_src("services",$service->image);?>" alt=""></div>
                        			</div>
                        			<div class="txt">
                        				<h5 class="title"><?= $service->title?></h5>
                        				<h6 class="subtitle"><?= $service->price_overview?></h6>
                        			</div>
                        			<div class="priceDv">
                        				<div class="price">$ <?= $service->price?></div>
                        			</div>
                        		</div>
                        		<?php switch ($service->id) {
	                                case 1:
	                                	if (!empty($service->additional_services)) {
	                                    	echo '<div class="inter">
												<ul class="aditionLst">
		                                            <li>
		                                                <div><strong>Holiday Rate</strong>per night</div>
		                                                <div><span class="price">$ '.$service->holiday_rate.'</span></div>
		                                            </li>
		                                            <li>
		                                                <div><strong>Additional Dog Rate</strong>per night per additional dog</div>
		                                                <div><span class="price">+$ '.$service->additional_dog_rate_plus.'</span></div>
		                                            </li>
		                                            <li>
		                                                <div><strong>Extended Stay Rate</strong>per night</div>
		                                                <div>'.$service->extended_stay_days.' days x <span class="price">$ '.$service->extended_stay_rate.'</span></div>
		                                            </li>
		                                            <li>
		                                                <div><strong>Puppy Rate</strong>per night</div>
		                                                <div><span class="price">$ '.$service->puppy_rate.'</span></div>
		                                            </li>
		                                            <li>
		                                                <div><strong>Bathing / Grooming</strong>per bath</div>
		                                                <div><span class="price">+$ '.(empty($service->bathing_is_free)?$service->bathing_rate_plus:'Free').'</span></div>
		                                            </li>
		                                            <li>
		                                                <div><strong>Pick up and Drop off</strong>per round trip</div>
		                                                <div><span class="price">+$ '.$service->pick_drop_rate_plus.'</span></div>
		                                            </li>
		                                            <li>
		                                                <div><strong>Cat Care</strong>per night</div>
		                                                <div><span class="price">$ '.$service->cat_care_rate.'</span></div>
		                                            </li>
		                                            <li>
		                                                <div><strong>Additional Cat Rate</strong>per night</div>
		                                                <div><span class="price">+$ '.$service->additional_cat_rate_plus.'</span></div>
		                                            </li>
		                                        </ul>
	                                    	</div>';
	                                    }
	                                    break;
	                                case 2:
		                                if (!empty($service->additional_services)) {
		                                    echo '<div class="inter">
													<ul class="aditionLst">
			                                            <li>
			                                                <div><strong>Holiday Rate</strong>per night</div>
			                                                <div><span class="price">$ '.$service->holiday_rate.'</span></div>
			                                            </li>
			                                            <li>
			                                                <div><strong>Additional Dog Rate</strong>per night per additional dog</div>
			                                                <div><span class="price">+$ '.$service->additional_dog_rate_plus.'</span></div>
			                                            </li>
			                                            <li>
			                                                <div><strong>Extended Stay Rate</strong>per night</div>
			                                                <div>'.$service->extended_stay_days.' days x <span class="price">$ '.$service->extended_stay_rate.'</span></div>
			                                            </li>
			                                            <li>
			                                                <div><strong>Puppy Rate</strong>per night</div>
			                                                <div><span class="price">$ '.$service->puppy_rate.'</span></div>
			                                            </li>
			                                            <li>
			                                                <div><strong>Bathing / Grooming</strong>per bath</div>
			                                                <div><span class="price">+$ '.(empty($service->bathing_is_free)?$service->bathing_rate_plus:'Free').'</span></div>
			                                            </li>
			                                            <li>
			                                                <div><strong>Cat Care</strong>per night</div>
			                                                <div><span class="price">$ '.$service->cat_care_rate.'</span></div>
			                                            </li>
			                                            <li>
			                                                <div><strong>Additional Cat Rate</strong>per night</div>
			                                                <div><span class="price">+$ '.$service->additional_cat_rate_plus.'</span></div>
			                                            </li>
		                                        </ul>
		                                    </div>';
		                                }
	                                    break;
	                                case 3:
		                                if (!empty($service->additional_services)) {
		                                	echo '<div class="inter">
			                                	<ul class="aditionLst">
				                                	<li>
					                                	<div><strong>60 minut Rate</strong>per visit</div>
					                                	<div><span class="price">$ '.$service->sixty_minute_rate_plus.'</span></div>
				                                	</li>
				                                	<li>
					                                	<div><strong>Holiday Rate</strong>per night</div>
					                                	<div><span class="price">$ '.$service->holiday_rate.'</span></div>
				                                	</li>
				                                	<li>
					                                	<div><strong>Additional Dog Rate</strong>per night per additional dog</div>
					                                	<div><span class="price">+$ '.$service->additional_dog_rate_plus.'</span></div>
				                                	</li>
		                                            <li>
		                                                <div><strong>Extended Stay Rate</strong>per night</div>
		                                                <div>'.$service->extended_stay_days.' days x <span class="price">$ '.$service->extended_stay_rate.'</span></div>
		                                            </li>
				                                	<li>
					                                	<div><strong>Puppy Rate</strong>per night</div>
					                                	<div><span class="price">$ '.$service->puppy_rate.'</span></div>
				                                	</li>
		                                            <li>
		                                                <div><strong>Bathing / Grooming</strong>per bath</div>
		                                                <div><span class="price">+$ '.(empty($service->bathing_is_free)?$service->bathing_rate_plus:'Free').'</span></div>
		                                            </li>
				                                	<li>
					                                	<div><strong>Cat Care</strong>per visit</div>
					                                	<div><span class="price">$ '.$service->cat_care_rate.'</span></div>
				                                	</li>
		                                            <li>
		                                                <div><strong>Additional Cat Rate</strong>per visit</div>
		                                                <div><span class="price">+$ '.$service->additional_cat_rate_plus.'</span></div>
		                                            </li>
			                                	</ul>
		                                	</div>';
		                                }
	                                    break;
	                                case 4:
		                                if (!empty($service->additional_services)) {
		                                    echo '<div class="inter">
													<ul class="aditionLst">
			                                            <li>
			                                                <div><strong>Holiday Rate</strong>per night</div>
			                                                <div><span class="price">$ '.$service->holiday_rate.'</span></div>
			                                            </li>
			                                            <li>
			                                                <div><strong>Additional Dog Rate</strong>per night per additional dog</div>
			                                                <div><span class="price">+$ '.$service->additional_dog_rate_plus.'</span></div>
			                                            </li>
			                                            <li>
			                                                <div><strong>Puppy Rate</strong>per night</div>
			                                                <div><span class="price">$ '.$service->puppy_rate.'</span></div>
			                                            </li>
			                                            <li>
			                                                <div><strong>Bathing / Grooming</strong>per bath</div>
			                                                <div><span class="price">+$ '.(empty($service->bathing_is_free)?$service->bathing_rate_plus:'Free').'</span></div>
			                                            </li>
			                                            <li>
			                                                <div><strong>Pick up and Drop off</strong>per round trip</div>
			                                                <div><span class="price">+$ '.$service->pick_drop_rate_plus.'</span></div>
			                                            </li>
			                                        </ul>
		                                    	</div>';
	                                    }
	                                    break;
	                                case 5:
		                                if (!empty($service->additional_services)) {
		                                    echo '<div class="inter">
													<ul class="aditionLst">
			                                            <li>
			                                                <div><strong>Holiday Rate</strong>per night</div>
			                                                <div><span class="price">$ '.$service->holiday_rate.'</span></div>
			                                            </li>
			                                            <li>
			                                                <div><strong>Additional Dog Rate</strong>per night per additional dog</div>
			                                                <div><span class="price">+$ '.$service->additional_dog_rate_plus.'</span></div>
			                                            </li>
			                                            <li>
			                                                <div><strong>Puppy Rate</strong>per night</div>
			                                                <div><span class="price">$ '.$service->puppy_rate.'</span></div>
			                                            </li>
			                                            <li>
			                                                <div><strong>Bathing / Grooming</strong>per bath</div>
			                                                <div><span class="price">+$ '.(empty($service->bathing_is_free)?$service->bathing_rate_plus:'Free').'</span></div>
			                                            </li>
			                                            <li>
			                                                <div><strong>Pick up and Drop off</strong>per round trip</div>
			                                                <div><span class="price">+$ '.$service->pick_drop_rate_plus.'</span></div>
			                                            </li>
			                                        </ul>
			                                    </div>';
		                                }
	                                    break;
	                            }?>
                        	</div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<div class="popup small-popup" data-popup="contact-me">
        <div class="tableDv">
            <div class="tableCell">
                <div class="contain">
                    <div class="_inner">
                        <div class="crosBtn"></div>
                        <h2>Contact me</h2>
                        <form action="" method="post">
        		            <div class="formRow row">
				                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
		        		            <textarea name="" id="" class="txtBox" placeholder="Write something here"></textarea>
				                </div>
				            </div>
        		            <div class="bTn">
        		                <button type="submit" class="webBtn colorBtn">Send</button>
        		            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<div class="popup small-popup report-profile" data-popup="report-profile">
        <div class="tableDv">
            <div class="tableCell">
                <div class="contain">
                    <div class="_inner">
                        <div class="crosBtn"></div>
                        <h2>Report Profile</h2>
                        <form action="" method="post">
        		            <div class="formRow row">
				                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
		        		            <textarea name="" id="" class="txtBox" placeholder="Tell us something why you report this profile?"></textarea>
				                </div>
				            </div>
        		            <div class="bTn text-center">
        		                <button type="submit" class="webBtn colorBtn">Send</button>
        		            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- profile -->


<!-- Google Map Api -->
<script type="text/javascript">
    $(function(){
        /*$(document).on('click', '.selectLst > li > .lnk', function() {
            var radio = $(this).data('radio');
            // $(this).parents('.selectLst').find('.lnk').removeClass('active');
            $(this).toggleClass('active');
            $(this).parents('.frmGrp').children('input[type="hidden"]').val(radio);
        });
        $(document).on('click', '#profile form button.txtBox', function(){
			var days = $(this).attr('data-days');
            $(this).parents('form').find('div[data-days]').removeClass('active');
            $(this).parents('form').find('button[data-days]').removeClass('active');
            $(this).parents('form').find(this).addClass('active');
            $(this).parents('form').find('div[data-days = ' + days + ']').addClass('active');
        });*/
		$(document).on('click', '#profile #proBtn', function(){
            $('#profile #proSide').fadeIn();
            $('body').addClass('flow');
        });
		$(document).on('click', '#profile #availBtn', function(){
            $('#profile #availblty').fadeIn();
            $('body').addClass('flow');
        });
		$(document).on('click', '#profile #proSide > .crosBtn, #profile #availblty > .crosBtn', function(){
            $('#profile #proSide').fadeOut();
            $('#profile #availblty').fadeOut();
            $('body').removeClass('flow');
        });
    });
    function initMap() {
    	let myLatLng = {lat: 33.9139599, lng: -84.2968273};
    	let image = {
	        url: base_url + "assets/images/map-marker.png", // url
	        scaledSize: new google.maps.Size(60, 60), // scaled size
	        origin: new google.maps.Point(0, 0), // origin
	        anchor: new google.maps.Point(25, 50) // anchor
	    };

    	let map = new google.maps.Map(document.getElementById('map_canvas'), {
    		center: myLatLng,
    		zoom: 16,
    		styles: grayStyles
    	});

    	let marker = new google.maps.Marker({
    		position: myLatLng,
    		map: map,
    		icon: image,
    		title: '<?= format_name($row->mem_fname,$row->mem_lname)?>'
    	});
    }
</script>
<script type="text/javascript" src="<?= base_url('assets/js/map.api.js')?>"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmqmsf3pVEVUoGAmwerePWzjUClvYUtwM&callback=initMap&libraries=geometry,places&ext=.js"></script>
</main>
<?php $this->load->view('includes/footer'); ?>
</body>
</html>