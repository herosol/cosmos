<!doctype html>
<html>
<head>
<title>My Services – <?= $site_settings->site_name?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>
<body id="home-page">
    <?php get_header(); ?>
<main>


<section id="dash">
    <div id="svcs">
        <div class="contain">
            <form action="" method="post" autocomplete="off" class="frmAjax">
                <!-- 
                <fieldset>
                    <div class="content">
                        <h1 class="secHeading">Tell us a bit about yourself</h1>
                        <p class="pre">Thanks for your interest in PFSC To give you best experience possible, we'd love to know what brought you here. Note: your responses will be kept private.</p>
                    </div>
                    <div class="svcBlk">
                        <h2>Making money on Puppy Friends Social Club</h2>
                        <p>You’ll set your own rates and keep <?= (100-$site_settings->site_commission)?>% of your earnings. The remaining <?= $site_settings->site_commission?>% is used to help cover ongoing support, educational opportunities, and promotion of your business.</p>
                        <ul class="icoLst flex text-center">
                            <?php foreach ($services as $key => $service): ?>
                                <li>
                                    <div class="icon"><img src = "<?=  get_site_image_src("services",$service->image); ?>"></div>
                                    <h6><?= $service->title?></h6>
                                </li>
                            <?php endforeach ?>
                        </ul>
                        <div class="inter">
                            <div class="row formRow">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <h4>Why are you becoming a PFSC sitter?</h4>
                                    <select name="sitter_reason" id="sitter_reason" class="txtBox">
                                        <option value="">Select an answer</option>
                                        <?php foreach ($why_questions as $key => $why): ?>

                                            <option value="<?= $why->question?>"<?= $why->question==$mem_data->mem_sitter_reason?' selected':''?>><?= $why->question?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <h4>Expected average income each month?</h4>
                                    <select name="monthly_income" id="monthly_income" class="txtBox">
                                        <option value="">Select an answer</option>
                                        <?php foreach ($income_questions as $key => $income): ?>

                                            <option value="<?= $income->question?>"<?= $income->question==$mem_data->mem_monthly_income?' selected':''?>><?= $income->question?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <h4>Are you willing to have a home inspection by one of our team?</h4>
                                    <ul class="selectLst inspectionLst">
                                        <li><div data-radio="yes" class="lnk<?= $mem_data->mem_inspection=='yes'?' active':''?>">Yes</div></li>
                                        <li><div data-radio="yes" class="lnk popBtn" data-popup="inspection">No</div></li>
                                    </ul>
                                    <input type="hidden" name="inspection" id="" value="yes">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="popup small-popup" data-popup="inspection">
                        <div class="tableDv">
                            <div class="tableCell">
                                <div class="contain">
                                    <div class="_inner">
                                        <div class="crosBtn"></div>
                                        <h2>Home inspection</h2>
                                        <h4 class="regular color2">Sorry only candidates willing to have home inspection can join the club.</h4>
                                        <p class="small">Only if you answer <u class="color">Yes</u> to this question, you can proceed to create a profile.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bTn text-center">
                        <button type="button" class="webBtn colorBtn nextBtn">Next <i class="spinner hidden"></i></button>
                    </div>
                </fieldset>
                 -->

                <fieldset>
                    <div class="content">
                        <h1 class="secHeading">Which services would you like to offer?</h1>
                        <p class="pre">Set services to active that you want to appear in search and receive new business for. Use away mode when you are on vacation, or can't respond to new requests.</p>
                    </div>
                    <?php foreach ($services as $key => $service): ?>
                        <div class="svcBlk">
                            <div class="inner">
                                <div class="icoBlk">
                                    <div class="icon"><img src="<?= get_site_image_src("services", $service->image);?>" alt=""></div>
                                </div>
                                <div class="txt">
                                    <h5 class="title">
                                        <?= $service->title?>
                                        <?php if ($service->highest_earning): ?>
                                            <em class="miniLbl green">Highest Earners</em>
                                        <?php endif ?>
                                    </h5>
                                    <h6 class="subtitle"><?= $service->overview?></h6>
                                    <?= $key==0?$service->detail:''?>
                                </div>
                                <div class="switchBtn">
                                    <input type="checkbox" name="services[<?= $service->id?>]" id="service<?= $key?>" class="bindCls<?= $key?>" value="<?= $service->id?>"<?= is_mem_service($this->session->mem_id, $service->id)?' checked=""':''?>>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                    <div class="bTn text-center">
                        <button type="button" class="webBtn colorBtn nextBtn">Next <i class="fi-arrow-right"></i></button>
                    </div>
                </fieldset>

                <fieldset>
                    <div class="content">
                        <h1 class="secHeading">What would you like to charge for your services?</h1>
                        <p class="pre">You'll keep <?= (100-$site_settings->site_commission)?>% of your earnings. The other <?= $site_settings->site_commission?>% helps cover ongoing support, educational opportunities, and ongoing promotion of your business.</p>
                    </div>
                    <?php foreach ($services as $key => $service): ?>
                        <?php $is_mem_service = is_mem_service($this->session->mem_id, $service->id); ?>
                        <div class="svcBlk rateBlk bindCls<?= $key?><?= $is_mem_service?'':' hidden'?>">
                            <div class="inner">
                                <div class="icoBlk">
                                    <div class="icon"><img src="<?= get_site_image_src("services",$service->image);?>" alt=""></div>
                                </div>
                                <div class="txt">
                                    <h5 class="title"><?= $service->title?></h5>
                                    <h6 class="subtitle"><?= $service->overview?></h6>
                                    <!-- <h6 class="subtitle"><?= $service->price_overview?></h6> -->
                                    <?= $service->price_detail?>
                                    <div class="aditionBtn flex">
                                        <h5 class="color2">Add Additional Services & Rates</h5>
                                        <div class="switchBtn">
                                            <input type="checkbox" name="adition_svc<?= $service->id?>" id="adition_svc<?= $service->id?>" value="1" <?= $is_mem_service && !empty($is_mem_service->additional_services)?' checked':''?>>
                                        </div>
                                    </div>
                                </div>
                                <div class="txtGrp">
                                    <input type="text" name="prices[<?= $service->id?>]" id="price<?= $service->id?>" class="txtBox" placeholder="0" value="<?= empty($is_mem_service->price)?$service->default_price:$is_mem_service->price?>"<?= $is_mem_service?'':' disabled'?>>
                                    <small>You keep <em></em></small>
                                </div>
                            </div>
                            <?php switch ($service->id) {
                                case 1:
                                    echo '<div class="inter aditionDv"'.($is_mem_service && !empty($is_mem_service->additional_services)?' style="display: block"':'').'>
                                        <ul class="aditionLst">
                                            <li>
                                                <div><strong>Holiday Rate</strong>This rate overrides your default rate during the holidays. <br> This is your custom rate per dog per night.</div>
                                                <div><div class="txtGrp"><input type="text" name="holiday_rate1" id="holiday_rate1" class="price txtBox" value="'.(empty($is_mem_service->holiday_rate)?'':$is_mem_service->holiday_rate).'" placeholder="0" required></div></div>
                                            </li>
                                            <li>
                                                <div><strong>Additional Dog Rate</strong>Applies to each additional dog from the same client. <br> This is your custom rate per dog per night.</div>
                                                <div><div class="txtGrp"><input type="text" name="additional_dog_rate1" id="additional_dog_rate1" class="price txtBox" value="'.(empty($is_mem_service->additional_dog_rate_plus)?'':$is_mem_service->additional_dog_rate_plus).'" placeholder="0" required></div></div>
                                            </li>
                                            <li>
                                                <div><strong>Extended Stay Rate</strong>Applies to longer stays. <br> This is your custom rate per dog per night.</div>
                                                <div>
                                                    <div class="flex">
                                                        <div class="txtGrp dayBox"><input type="text" name="extended_stay_days1" id="extended_stay_days1" class="price txtBox" value="'.(empty($is_mem_service->extended_stay_days)?'':$is_mem_service->extended_stay_days).'" placeholder="0" required></div>
                                                        <em class="txtBox">days x</em>
                                                        <div class="txtGrp"><input type="text" name="extended_stay_rate1" id="extended_stay_rate1" class="price txtBox" value="'.(empty($is_mem_service->extended_stay_rate)?'':$is_mem_service->extended_stay_rate).'" placeholder="0" required></div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div><strong>Puppy Rate</strong>For dogs under 1 year old. <br> This is your custom rate per dog per night.</div>
                                                <div><div class="txtGrp"><input type="text" name="puppy_rate1" id="puppy_rate1" class="price txtBox" value="'.(empty($is_mem_service->puppy_rate)?'':$is_mem_service->puppy_rate).'" placeholder="0" required></div></div>
                                            </li>
                                            <li>
                                                <div><strong>Bathing / Grooming</strong>For bathing and grooming pets. <br> This is your custom rate per booking.</div>
                                                <div>
                                                    <div class="txtGrp"><input type="text" name="bathing_rate1" id="bathing_rate1" class="price txtBox" value="'.(empty($is_mem_service->bathing_rate_plus)?'':$is_mem_service->bathing_rate_plus).'" placeholder="0" required></div>
                                                    <div class="lblBtn"><label><input type="checkbox" name="bathing_is_free1" id="bathing_is_free1" class="txtBox" value="1"'.(empty($is_mem_service->bathing_is_free)?'':' checked').'> Offer for free</label></div>
                                                </div>
                                            </li>
                                            <li>
                                                <div><strong>Pick up and Drop off</strong>For picking up and dropping off pets. <br> This is your custom rate per booking.</div>
                                                <div><div class="txtGrp"><input type="text" name="pick_drop_rate1" id="pick_drop_rate1" class="price txtBox" value="'.(empty($is_mem_service->pick_drop_rate_plus)?'':$is_mem_service->pick_drop_rate_plus).'" placeholder="0" required></div></div>
                                            </li>
                                            <li>
                                                <div><strong>Cat Care</strong>For watching cats. <br> This is your custom rate per cat.</div>
                                                <div><div class="txtGrp"><input type="text" name="cat_care_rate1" id="cat_care_rate1" class="price txtBox" value="'.(empty($is_mem_service->cat_care_rate)?$service->default_cat_care_rate:$is_mem_service->cat_care_rate).'" placeholder="0" required></div></div>
                                            </li>
                                            <li>
                                                <div><strong>Additional Cat Rate</strong>Applies to each additional cat from the same client. <br> This is your custom rate per cat per night.</div>
                                                <div><div class="txtGrp"><input type="text" name="additional_cat_rate1" id="additional_cat_rate1" class="price txtBox" value="'.(empty($is_mem_service->additional_cat_rate_plus)?'':$is_mem_service->additional_cat_rate_plus).'" placeholder="0" required></div></div>
                                            </li>
                                        </ul>
                                    </div>';
                                    break;
                                case 2:
                                    echo '<div class="inter aditionDv"'.($is_mem_service && !empty($is_mem_service->additional_services)?' style="display: block"':'').'>
                                            <ul class="aditionLst">
                                            <li>
                                                <div><strong>Holiday Rate</strong>This rate overrides your default rate during the holidays. <br> This is your custom rate per dog per night.</div>
                                                <div><div class="txtGrp"><input type="text" name="holiday_rate2" id="holiday_rate2" class="price txtBox" value="'.(empty($is_mem_service->holiday_rate)?'':$is_mem_service->holiday_rate).'" placeholder="0" required></div></div>
                                            </li>
                                            <li>
                                                <div><strong>Additional Dog Rate</strong>Applies to each additional dog from the same client. <br> This is your custom rate per dog per night.</div>
                                                <div><div class="txtGrp"><input type="text" name="additional_dog_rate2" id="additional_dog_rate2" class="price txtBox" value="'.(empty($is_mem_service->additional_dog_rate_plus)?'':$is_mem_service->additional_dog_rate_plus).'" placeholder="0" required></div></div>
                                            </li>
                                            <li>
                                                <div><strong>Extended Stay Rate</strong>Applies to longer stays. <br> This is your custom rate per dog per night.</div>
                                                <div>
                                                    <div class="flex">
                                                        <div class="txtGrp dayBox"><input type="text" name="extended_stay_days2" id="extended_stay_days2" class="price txtBox" value="'.(empty($is_mem_service->extended_stay_days)?'':$is_mem_service->extended_stay_days).'" placeholder="0" required></div>
                                                        <em class="txtBox">days x</em>
                                                        <div class="txtGrp"><input type="text" name="extended_stay_rate2" id="extended_stay_rate2" class="price txtBox" value="'.(empty($is_mem_service->extended_stay_rate)?'':$is_mem_service->extended_stay_rate).'" placeholder="0" required></div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div><strong>Puppy Rate</strong>For dogs under 1 year old. <br> This is your custom rate per dog per night.</div>
                                                <div><div class="txtGrp"><input type="text" name="puppy_rate2" id="puppy_rate2" class="price txtBox" value="'.(empty($is_mem_service->puppy_rate)?'':$is_mem_service->puppy_rate).'" placeholder="0" required></div></div>
                                            </li>
                                            <li>
                                                <div><strong>Bathing / Grooming</strong>For bathing and grooming pets. <br> This is your custom rate per booking.</div>
                                                <div>
                                                    <div class="txtGrp"><input type="text" name="bathing_rate2" id="bathing_rate2" class="price txtBox" value="'.(empty($is_mem_service->bathing_rate_plus)?'':$is_mem_service->bathing_rate_plus).'" placeholder="0" required></div>
                                                    <div class="lblBtn"><label><input type="checkbox" name="bathing_is_free2" id="bathing_is_free2" class="txtBox" value="1"'.(empty($is_mem_service->bathing_is_free)?'':' checked').'> Offer for free</label></div>
                                                </div>
                                            </li>
                                            <li>
                                                <div><strong>Cat Care</strong>For watching cats. <br> This is your custom rate per cat.</div>
                                                <div><div class="txtGrp"><input type="text" name="cat_care_rate2" id="cat_care_rate2" class="price txtBox" value="'.(empty($is_mem_service->cat_care_rate)?$service->default_cat_care_rate:$is_mem_service->cat_care_rate).'" placeholder="0" required></div></div>
                                            </li>
                                            <li>
                                                <div><strong>Additional Cat Rate</strong>Applies to each additional cat from the same client. <br> This is your custom rate per cat per night.</div>
                                                <div><div class="txtGrp"><input type="text" name="additional_cat_rate2" id="additional_cat_rate2" class="price txtBox" value="'.(empty($is_mem_service->additional_cat_rate_plus)?'':$is_mem_service->additional_cat_rate_plus).'" placeholder="0" required></div></div>
                                            </li>
                                        </ul>
                                    </div>';
                                    break;
                                case 3:
                                    echo '<div class="inter aditionDv"'.($is_mem_service && !empty($is_mem_service->additional_services)?' style="display: block"':'').'>
                                            <ul class="aditionLst">
                                            <li>
                                                <div><strong>60 minute Rate</strong>This will be added to your 30-minute standard rate. <br> This is your custom rate per visit.</div>
                                                <div><div class="txtGrp"><input type="text" name="sixty_minute_rate3" id="sixty_minute_rate3" class="price txtBox" value="'.(empty($is_mem_service->sixty_minute_rate_plus)?$service->default_sixty_minute_rate_plus:$is_mem_service->sixty_minute_rate_plus).'" placeholder="0" required></div></div>
                                            </li>
                                            <li>
                                                <div><strong>Holiday Rate</strong>This rate overrides your default rate during the holidays. <br> This is your custom rate per dog per night.</div>
                                                <div><div class="txtGrp"><input type="text" name="holiday_rate3" id="holiday_rate3" class="price txtBox" value="'.(empty($is_mem_service->holiday_rate)?'':$is_mem_service->holiday_rate).'" placeholder="0" required></div></div>
                                            </li>
                                            <li>
                                                <div><strong>Additional Dog Rate</strong>Applies to each additional dog from the same client. <br> This is your custom rate per dog per night.</div>
                                                <div><div class="txtGrp"><input type="text" name="additional_dog_rate3" id="additional_dog_rate3" class="price txtBox" value="'.(empty($is_mem_service->additional_dog_rate_plus)?'':$is_mem_service->additional_dog_rate_plus).'" placeholder="0" required></div></div>
                                            </li>
                                            <li>
                                                <div><strong>Extended Stay Rate</strong>Applies to longer stays. <br> This is your custom rate per dog per night.</div>
                                                <div>
                                                    <div class="flex">
                                                        <div class="txtGrp dayBox"><input type="text" name="extended_stay_days3" id="extended_stay_days3" class="price txtBox" value="'.(empty($is_mem_service->extended_stay_days)?'':$is_mem_service->extended_stay_days).'" placeholder="0" required></div>
                                                        <em class="txtBox">days x</em>
                                                        <div class="txtGrp"><input type="text" name="extended_stay_rate3" id="extended_stay_rate3" class="price txtBox" value="'.(empty($is_mem_service->extended_stay_rate)?'':$is_mem_service->extended_stay_rate).'" placeholder="0" required></div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div><strong>Puppy Rate</strong>For dogs under 1 year old. <br> This is your custom rate per dog per night.</div>
                                                <div><div class="txtGrp"><input type="text" name="puppy_rate3" id="puppy_rate3" class="price txtBox" value="'.(empty($is_mem_service->puppy_rate)?'':$is_mem_service->puppy_rate).'" placeholder="0" required></div></div>
                                            </li>
                                            <li>
                                                <div><strong>Bathing / Grooming</strong>For bathing and grooming pets. <br> This is your custom rate per booking.</div>
                                                <div>
                                                    <div class="txtGrp"><input type="text" name="bathing_rate3" id="bathing_rate3" class="price txtBox" value="'.(empty($is_mem_service->bathing_rate_plus)?'':$is_mem_service->bathing_rate_plus).'" placeholder="0" required></div>
                                                    <div class="lblBtn"><label><input type="checkbox" name="bathing_is_free3" id="bathing_is_free3" class="txtBox" value="1"'.(empty($is_mem_service->bathing_is_free)?'':' checked').'> Offer for free</label></div>
                                                </div>
                                            </li>
                                            <li>
                                                <div><strong>Cat Care</strong>For watching cats. <br> This is your custom rate per cat.</div>
                                                <div><div class="txtGrp"><input type="text" name="cat_care_rate3" id="cat_care_rate3" class="price txtBox" value="'.(empty($is_mem_service->cat_care_rate)?$service->default_cat_care_rate:$is_mem_service->cat_care_rate).'" placeholder="0" required></div></div>
                                            </li>
                                            <li>
                                                <div><strong>Additional Cat Rate</strong>Applies to each additional cat from the same client. <br> This is your custom rate per cat per night.</div>
                                                <div><div class="txtGrp"><input type="text" name="additional_cat_rate3" id="additional_cat_rate3" class="price txtBox" value="'.(empty($is_mem_service->additional_cat_rate_plus)?'':$is_mem_service->additional_cat_rate_plus).'" placeholder="0" required></div></div>
                                            </li>
                                        </ul>
                                    </div>';
                                    break;
                                case 4:
                                    echo '<div class="inter aditionDv"'.($is_mem_service && !empty($is_mem_service->additional_services)?' style="display: block"':'').'>
                                            <ul class="aditionLst">
                                            <li>
                                                <div><strong>Holiday Rate</strong>This rate overrides your default rate during the holidays. <br> This is your custom rate per dog per night.</div>
                                                <div><div class="txtGrp"><input type="text" name="holiday_rate4" id="holiday_rate4" class="price txtBox" value="'.(empty($is_mem_service->holiday_rate)?'':$is_mem_service->holiday_rate).'" placeholder="0" required></div></div>
                                            </li>
                                            <li>
                                                <div><strong>Additional Dog Rate</strong>Applies to each additional dog from the same client. <br> This is your custom rate per dog per night.</div>
                                                <div><div class="txtGrp"><input type="text" name="additional_dog_rate4" id="additional_dog_rate4" class="price txtBox" value="'.(empty($is_mem_service->additional_dog_rate_plus)?'':$is_mem_service->additional_dog_rate_plus).'" placeholder="0" required></div></div>
                                            </li>
                                            <li>
                                                <div><strong>Puppy Rate</strong>For dogs under 1 year old. <br> This is your custom rate per dog per night.</div>
                                                <div><div class="txtGrp"><input type="text" name="puppy_rate4" id="puppy_rate4" class="price txtBox" value="'.(empty($is_mem_service->puppy_rate)?'':$is_mem_service->puppy_rate).'" placeholder="0" required></div></div>
                                            </li>
                                            <li>
                                                <div><strong>Bathing / Grooming</strong>For bathing and grooming pets. <br> This is your custom rate per booking.</div>
                                                <div>
                                                    <div class="txtGrp"><input type="text" name="bathing_rate4" id="bathing_rate4" class="price txtBox" value="'.(empty($is_mem_service->bathing_rate_plus)?'':$is_mem_service->bathing_rate_plus).'" placeholder="0" required></div>
                                                    <div class="lblBtn"><label><input type="checkbox" name="bathing_is_free4" id="bathing_is_free4" class="txtBox" value="1"'.(empty($is_mem_service->bathing_is_free)?'':' checked').'> Offer for free</label></div>
                                                </div>
                                            </li>
                                            <!--<li>
                                                <div><strong>Pick up and Drop off</strong>For picking up and dropping off pets. <br> This is your custom rate per booking.</div>
                                                <div><div class="txtGrp"><input type="text" name="pick_drop_rate4" id="pick_drop_rate4" class="price txtBox" value="'.(empty($is_mem_service->pick_drop_rate_plus)?'':$is_mem_service->pick_drop_rate_plus).'" placeholder="0" required></div></div>
                                            </li>-->
                                        </ul>
                                    </div>';
                                    break;
                                case 5:
                                    echo '<div class="inter aditionDv"'.($is_mem_service && !empty($is_mem_service->additional_services)?' style="display: block"':'').'>
                                            <ul class="aditionLst">
                                            <li>
                                                <div><strong>Holiday Rate</strong>This rate overrides your default rate during the holidays. <br> This is your custom rate per dog per night.</div>
                                                <div><div class="txtGrp"><input type="text" name="holiday_rate5" id="holiday_rate5" class="price txtBox" value="'.(empty($is_mem_service->holiday_rate)?'':$is_mem_service->holiday_rate).'" placeholder="0" required></div></div>
                                            </li>
                                            <li>
                                                <div><strong>Additional Dog Rate</strong>Applies to each additional dog from the same client. <br> This is your custom rate per dog per night.</div>
                                                <div><div class="txtGrp"><input type="text" name="additional_dog_rate5" id="additional_dog_rate5" class="price txtBox" value="'.(empty($is_mem_service->additional_dog_rate_plus)?'':$is_mem_service->additional_dog_rate_plus).'" placeholder="0" required></div></div>
                                            </li>
                                            <li>
                                                <div><strong>Puppy Rate</strong>For dogs under 1 year old. <br> This is your custom rate per dog per night.</div>
                                                <div><div class="txtGrp"><input type="text" name="puppy_rate5" id="puppy_rate5" class="price txtBox" value="'.(empty($is_mem_service->puppy_rate)?'':$is_mem_service->puppy_rate).'" placeholder="0" required></div></div>
                                            </li>
                                            <li>
                                                <div><strong>Bathing / Grooming</strong>For bathing and grooming pets. <br> This is your custom rate per booking.</div>
                                                <div>
                                                    <div class="txtGrp"><input type="text" name="bathing_rate5" id="bathing_rate5" class="price txtBox" value="'.(empty($is_mem_service->bathing_rate_plus)?'':$is_mem_service->bathing_rate_plus).'" placeholder="0" required></div>
                                                    <div class="lblBtn"><label><input type="checkbox" name="bathing_is_free5" id="bathing_is_free5" class="txtBox" value="1"'.(empty($is_mem_service->bathing_is_free)?'':' checked').'> Offer for free</label></div>
                                                </div>
                                            </li>
                                            <!--<li>
                                                <div><strong>Pick up and Drop off</strong>For picking up and dropping off pets. <br> This is your custom rate per booking.</div>
                                                <div><div class="txtGrp"><input type="text" name="pick_drop_rate5" id="pick_drop_rate5" class="price txtBox" value="'.(empty($is_mem_service->pick_drop_rate_plus)?'':$is_mem_service->pick_drop_rate_plus).'" placeholder="0" required></div></div>
                                            </li>-->
                                        </ul>
                                    </div>';
                                    break;
                            }?>
                        </div>
                    <?php endforeach ?>
                    <div class="bTn text-center">
                        <button type="button" class="webBtn prevBtn"><i class="fi-arrow-left"></i> Back</button>
                        <button type="button" class="webBtn colorBtn nextBtn">Next <i class="fi-arrow-right"></i></button>
                        <!-- <button type="submit" class="webBtn colorBtn">Save & Continue <i class="spinner hidden"></i></button> -->
                    </div>
                    <!-- <div class="alertMsg" style="display: none;"></div> -->
                </fieldset>

                <fieldset>
                    <div class="content">
                        <h1 class="secHeading">Tell us about your pet-sitting preferences</h1>
                        <p class="pre">Note: if you offer more than one service on a given day, you may want to keep the numbers low. For example, if you have 2 spots for dog boarding and 2 for doggy day care, you could get requests for up to 4 pets at a time.</p>
                    </div>
                    <?php $is_mem_service = is_mem_service($this->session->mem_id, 1); ?>
                    <div class="svcBlk bindCls0<?= $is_mem_service?'':' hidden'?>">
                        <div class="inner">
                            <div class="icoBlk">
                                <div class="icon"><img src="<?= get_site_image_src("services",$services[0]->image);?>" alt=""></div>
                            </div>
                            <div class="txt">
                                <h5 class="title"><?= $services[0]->title;?></h5>
                                <h6 class="subtitle"><?= $services[0]->overview;?></h6>
                            </div>
                        </div>
                        <div class="inter">
                            <div class="formRow row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <h4>Do you provide this service for?</h4>
                                    <ul class="selectLst">
                                        <li><div data-radio="dog" class="lnk<?= $is_mem_service->service_for=='dog'?' active':''?>">Dogs</div></li>
                                        <li><div data-radio="cat" class="lnk<?= $is_mem_service->service_for=='cat'?' active':''?>">Cats</div></li>
                                        <li><div data-radio="both" class="lnk<?= $is_mem_service->service_for=='both'?' active':''?>">Both</div></li>
                                    </ul>
                                    <input type="hidden" name="service_for1" id="service_for1" value="<?= $is_mem_service->service_for?>">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <h4>How many spaces do you have available each day?(Note: Maximum of 4 dogs is allowed per day)</h4>
                                    <input type="text" name="available_spaces1" id="available_spaces1" value="<?= $is_mem_service->available_spaces?>" class="txtBox" placeholder="0 Dogs">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <h4>Are you home full-time during the week?</h4>
                                    <ul class="selectLst">
                                        <li><div data-radio="1" class="lnk<?= !empty($is_mem_service->full_time_home)?' active':''?>">Yes</div></li>
                                        <li><div data-radio="0" class="lnk<?= empty($is_mem_service->full_time_home)?' active':''?>">No</div></li>
                                    </ul>
                                    <input type="hidden" name="full_time_home1" id="full_time_home1" value="<?= $is_mem_service->full_time_home?>">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <h4>When hosting dogs in your home, how frequently can you provide potty breaks?</h4>
                                    <ul class="selectLst">
                                        <li><div data-radio="0-2" class="lnk<?= $is_mem_service->potty_break=='0-2'?' active':''?>">0-2 hours</div></li>
                                        <li><div data-radio="2-4" class="lnk<?= $is_mem_service->potty_break=='2-4'?' active':''?>">2-4 hours</div></li>
                                        <li><div data-radio="4-8" class="lnk<?= $is_mem_service->potty_break=='4-8'?' active':''?>">4-8 hours</div></li>
                                        <li><div data-radio="8+" class="lnk<?= $is_mem_service->potty_break=='8+'?' active':''?>">8+ hours</div></li>
                                    </ul>
                                    <input type="hidden" name="potty_break1" id="potty_break1" value="<?= $is_mem_service->potty_break?>">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <h4>Do you want to enable flexible availability?</h4>
                                    <ul class="selectLst">
                                        <li><div data-radio="1" class="lnk<?= !empty($is_mem_service->flex_availability)?' active':''?>">Yes</div></li>
                                        <li><div data-radio="0" class="lnk<?= empty($is_mem_service->flex_availability)?' active':''?>">No</div></li>
                                    </ul>
                                    <input type="hidden" name="flex_availability1" id="flex_availability1" value="<?= $is_mem_service->flex_availability?>">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <h4>What is your Cancellation policy for <?= $services[0]->title;?></h4>
                                    <ul class="selectLst">
                                        <?php foreach ($policies as $key => $policy): ?>
                                            <li>
                                                <div data-radio="<?= strtolower($policy->title)?>" class="lnk txt_info<?= $is_mem_service->cancellation_policy==strtolower($policy->title)?' active':''?>"><?= $policy->title?><em><strong><?= $policy->title?></strong><?= $policy->detail?></em></div>
                                            </li>
                                        <?php endforeach ?>
                                    </ul>
                                    <input type="hidden" name="cancellation_policy1" id="cancellation_policy1" value="<?= $is_mem_service->cancellation_policy?>">
                                </div>
                            </div>
                            <p class="small text-center">Allow me to book 1 dog above my normal capacity if the stay is 4 nights or longer and I'll only be above capacity for 30% (or less) of the stay.</p>
                        </div>
                    </div>
                    <?php $is_mem_service = is_mem_service($this->session->mem_id, 2); ?>
                    <div class="svcBlk bindCls1<?= $is_mem_service?'':' hidden'?>">
                        <div class="inner">
                            <div class="icoBlk">
                                <div class="icon"><img src="<?= get_site_image_src("services",$services[1]->image);?>" alt=""></div>
                            </div>
                            <div class="txt">
                                <h5 class="title"><?= $services[1]->title;?></h5>
                                <h6 class="subtitle"><?= $services[1]->overview;?></h6>
                            </div>
                        </div>
                        <div class="inter">
                            <div class="formRow row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <h4>Do you provide this service for?</h4>
                                    <ul class="selectLst">
                                        <li><div data-radio="dog" class="lnk<?= $is_mem_service->service_for=='dog'?' active':''?>">Dogs</div></li>
                                        <li><div data-radio="cat" class="lnk<?= $is_mem_service->service_for=='cat'?' active':''?>">Cats</div></li>
                                        <li><div data-radio="both" class="lnk<?= $is_mem_service->service_for=='both'?' active':''?>">Both</div></li>
                                    </ul>
                                    <input type="hidden" name="service_for2" id="service_for2" value="<?= $is_mem_service->service_for?>">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <h4>What is the maximum distance you'll travel to get to a client's home?(Miles)</h4>
                                    <input type="text" name="travel_radius2" id="travel_radius2" value="<?= $is_mem_service->travel_radius?>" class="txtBox" placeholder="Miles">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <h4>For your House Sitting bookings, will you be staying at your client's home full-time on weekdays?</h4>
                                    <ul class="selectLst">
                                        <li><div data-radio="1" class="lnk<?= !empty($is_mem_service->full_time_home)?' active':''?>">Yes</div></li>
                                        <li><div data-radio="0" class="lnk<?= empty($is_mem_service->full_time_home)?' active':''?>">No</div></li>
                                    </ul>
                                    <input type="hidden" name="full_time_home2" id="full_time_home2" value="<?= $is_mem_service->full_time_home?>">
                                </div>
                                <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                    <h4>Per day visits?</h4>
                                    <input type="text" name="per_day_visits2" id="per_day_visits2" class="txtBox" value="<?= $is_mem_service->per_day_visits?>" placeholder="Visits">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                    <h4>Per day walks?</h4>
                                    <input type="text" name="per_day_walks2" id="per_day_walks2" class="txtBox" value="<?= $is_mem_service->per_day_walks?>" placeholder="Visits">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <h4>Dog Walking time? <small class="color">(check all that apply)</small></h4>
                                    <?php $dog_walk_time2 = @explode(',', $is_mem_service->dog_walk_time)?>
                                    <ul class="selectLst">
                                        <li><div data-checkbox="6am-11am" class="lnk<?= in_array('6am-11am', $dog_walk_time2)?' active':''?>">6am-11am</div></li>
                                        <li><div data-checkbox="11am-3pm" class="lnk<?= in_array('11am-3pm', $dog_walk_time2)?' active':''?>">11am-3pm</div></li>
                                        <li><div data-checkbox="3pm-10pm" class="lnk<?= in_array('3pm-10pm', $dog_walk_time2)?' active':''?>">3pm-10pm</div></li>
                                        <li><div data-checkbox="10pm–1am" class="lnk<?= in_array('10pm–1am', $dog_walk_time2)?' active':''?>">10pm–1am</div></li>
                                    </ul>
                                    <input type="hidden" name="dog_walk_time2" id="dog_walk_time2" value="<?= $is_mem_service->dog_walk_time?>">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <h4>Drop-In Visits time? <small class="color">(check all that apply)</small></h4>
                                    <?php $available_times2 = @explode(',', $is_mem_service->available_times)?>
                                    <ul class="selectLst">
                                        <li><div data-checkbox="6am-11am" class="lnk<?= in_array('6am-11am', $available_times2)?' active':''?>">6am-11am</div></li>
                                        <li><div data-checkbox="11am-3pm" class="lnk<?= in_array('11am-3pm', $available_times2)?' active':''?>">11am-3pm</div></li>
                                        <li><div data-checkbox="3pm-10pm" class="lnk<?= in_array('3pm-10pm', $available_times2)?' active':''?>">3pm-10pm</div></li>
                                        <li><div data-checkbox="10pm–1am" class="lnk<?= in_array('10pm–1am', $available_times2)?' active':''?>">10pm–1am</div></li>
                                    </ul>
                                    <input type="hidden" name="available_times2" id="available_times2" value="<?= $is_mem_service->available_times?>">
                                </div> -->
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <h4>When taking care of dogs in your client's home, how frequently can you provide potty breaks?</h4>
                                    <ul class="selectLst">
                                        <li><div data-radio="0-2" class="lnk<?= $is_mem_service->potty_break=='0-2'?' active':''?>">0-2 hours</div></li>
                                        <li><div data-radio="2-4" class="lnk<?= $is_mem_service->potty_break=='2-4'?' active':''?>">2-4 hours</div></li>
                                        <li><div data-radio="4-8" class="lnk<?= $is_mem_service->potty_break=='4-8'?' active':''?>">4-8 hours</div></li>
                                        <li><div data-radio="8+" class="lnk<?= $is_mem_service->potty_break=='8+'?' active':''?>">8+ hours</div></li>
                                    </ul>
                                    <input type="hidden" name="potty_break2" id="potty_break2" value="<?= $is_mem_service->potty_break?>">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <h4>What is your cancellation policy for <?= $services[1]->title;?>?</h4>
                                    <ul class="selectLst">
                                        <?php foreach ($policies as $key => $policy): ?>
                                            <li>
                                                <div data-radio="<?= strtolower($policy->title)?>" class="lnk txt_info<?= $is_mem_service->cancellation_policy==strtolower($policy->title)?' active':''?>"><?= $policy->title?><em><strong><?= $policy->title?></strong><?= $policy->detail?></em></div>
                                            </li>
                                        <?php endforeach ?>
                                    </ul>
                                    <input type="hidden" name="cancellation_policy2" id="cancellation_policy2" value="<?= $is_mem_service->cancellation_policy?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $is_mem_service = is_mem_service($this->session->mem_id, 3); ?>
                    <div class="svcBlk bindCls2<?= $is_mem_service?'':' hidden'?>">
                        <div class="inner">
                            <div class="icoBlk">
                                <div class="icon"><img src="<?= get_site_image_src("services",$services[2]->image);?>" alt=""></div>
                            </div>
                            <div class="txt">
                                <h5 class="title"><?= $services[2]->title;?></h5>
                                <h6 class="subtitle"><?= $services[2]->overview;?></h6>
                            </div>
                        </div>
                        <div class="inter">
                            <div class="formRow row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <h4>Do you provide this service for?</h4>
                                    <ul class="selectLst">
                                        <li><div data-radio="dog" class="lnk<?= $is_mem_service->service_for=='dog'?' active':''?>">Dogs</div></li>
                                        <li><div data-radio="cat" class="lnk<?= $is_mem_service->service_for=='cat'?' active':''?>">Cats</div></li>
                                        <li><div data-radio="both" class="lnk<?= $is_mem_service->service_for=='both'?' active':''?>">Both</div></li>
                                    </ul>
                                    <input type="hidden" name="service_for3" id="service_for3" value="<?= $is_mem_service->service_for?>">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <h4>What is the maximum distance you'll travel to get to a client's home?(Miles)</h4>
                                    <input type="text" name="travel_radius3" id="travel_radius3" value="<?= $is_mem_service->travel_radius?>" class="txtBox" placeholder="Miles">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                    <h4>How many drop-in visits can you do per day?</h4>
                                    <input type="text" name="per_day_visits3" id="per_day_visits3" class="txtBox" value="<?= $is_mem_service->per_day_visits?>" placeholder="Visits">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                    <h4>How many walks can you do per day?</h4>
                                    <input type="text" name="per_day_walks3" id="per_day_walks3" class="txtBox" value="<?= $is_mem_service->per_day_walks?>" placeholder="Visits">
                                </div>
                                <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                    <h4>Staying at client's home?</h4>
                                    <ul class="selectLst">
                                        <li><div data-radio="1" class="lnk<?= !empty($is_mem_service->staying_at_client)?' active':''?>">Yes</div></li>
                                        <li><div data-radio="0" class="lnk<?= !empty($is_mem_service) && $is_mem_service->staying_at_client==0?' active':''?>">No</div></li>
                                    </ul>
                                    <input type="hidden" name="staying_at_client3" id="staying_at_client3" value="<?= $is_mem_service->staying_at_client?>">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <h4>Dog Walking time? <small class="color">(check all that apply)</small></h4>
                                    <?php $dog_walk_time3 = @explode(',', $is_mem_service->dog_walk_time)?>
                                    <ul class="selectLst">
                                        <li><div data-checkbox="6am-11am" class="lnk<?= in_array('6am-11am', $dog_walk_time3)?' active':''?>">6am-11am</div></li>
                                        <li><div data-checkbox="11am-3pm" class="lnk<?= in_array('11am-3pm', $dog_walk_time3)?' active':''?>">11am-3pm</div></li>
                                        <li><div data-checkbox="3pm-10pm" class="lnk<?= in_array('3pm-10pm', $dog_walk_time3)?' active':''?>">3pm-10pm</div></li>
                                        <li><div data-checkbox="10pm–1am" class="lnk<?= in_array('10pm–1am', $dog_walk_time3)?' active':''?>">10pm–1am</div></li>
                                    </ul>
                                    <input type="hidden" name="dog_walk_time3" id="dog_walk_time3" value="<?= $is_mem_service->dog_walk_time?>">
                                </div> -->
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <h4>What times are you available for Drop in visits / Dog Walking on weekdays? <small class="color">(check all that apply)</small></h4>
                                    <?php $available_times3 = @explode(',', $is_mem_service->available_times)?>
                                    <ul class="selectLst">
                                        <li><div data-checkbox="6am-11am" class="lnk<?= in_array('6am-11am', $available_times3)?' active':''?>">6am-11am</div></li>
                                        <li><div data-checkbox="11am-3pm" class="lnk<?= in_array('11am-3pm', $available_times3)?' active':''?>">11am-3pm</div></li>
                                        <li><div data-checkbox="3pm-10pm" class="lnk<?= in_array('3pm-10pm', $available_times3)?' active':''?>">3pm-10pm</div></li>
                                        <li><div data-checkbox="10pm–1am" class="lnk<?= in_array('10pm–1am', $available_times3)?' active':''?>">10pm–1am</div></li>
                                    </ul>
                                    <input type="hidden" name="available_times3" id="available_times3" value="<?= $is_mem_service->available_times?>">
                                </div>
                                <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <h4>Potty breaks?</h4>
                                    <ul class="selectLst">
                                        <li><div data-radio="0-2" class="lnk<?= $is_mem_service->potty_break=='0-2'?' active':''?>">0-2 hours</div></li>
                                        <li><div data-radio="2-4" class="lnk<?= $is_mem_service->potty_break=='2-4'?' active':''?>">2-4 hours</div></li>
                                        <li><div data-radio="4-8" class="lnk<?= $is_mem_service->potty_break=='4-8'?' active':''?>">4-8 hours</div></li>
                                        <li><div data-radio="8+" class="lnk<?= $is_mem_service->potty_break=='8+'?' active':''?>">8+ hours</div></li>
                                    </ul>
                                    <input type="hidden" name="potty_break3" id="potty_break3" value="<?= $is_mem_service->potty_break?>">
                                </div> -->
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <h4>What is your cancellation policy for <?= $services[2]->title;?>?</h4>
                                    <ul class="selectLst">
                                        <?php foreach ($policies as $key => $policy): ?>
                                            <li>
                                                <div data-radio="<?= strtolower($policy->title)?>" class="lnk txt_info<?= $is_mem_service->cancellation_policy==strtolower($policy->title)?' active':''?>"><?= $policy->title?><em><strong><?= $policy->title?></strong><?= $policy->detail?></em></div>
                                            </li>
                                        <?php endforeach ?>
                                    </ul>
                                    <input type="hidden" name="cancellation_policy3" id="cancellation_policy3" value="<?= $is_mem_service->cancellation_policy?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $is_mem_service = is_mem_service($this->session->mem_id, 4); ?>
                    <div class="svcBlk bindCls3<?= $is_mem_service?'':' hidden'?>">
                        <div class="inner">
                            <div class="icoBlk">
                                <div class="icon"><img src="<?= get_site_image_src("services",$services[3]->image);?>" alt=""></div>
                            </div>
                            <div class="txt">
                                <h5 class="title"><?= $services[3]->title;?></h5>
                                <h6 class="subtitle"><?= $services[3]->overview;?></h6>
                            </div>
                        </div>
                        <div class="inter">
                            <div class="formRow row">
                                <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <h4>Dogs size?</h4>
                                    <?php $dog_size4 = @explode(',', $is_mem_service->dog_size)?>
                                    <ul class="selectLst">
                                        <li><div data-checkbox="small" class="lnk<?= in_array('small', $dog_size4)?' active':''?>">Small <small>0-15lbs</small></div></li>
                                        <li><div data-checkbox="medium" class="lnk<?= in_array('medium', $dog_size4)?' active':''?>">Medium <small>16-40lbs</small></div></li>
                                        <li><div data-checkbox="large" class="lnk<?= in_array('large', $dog_size4)?' active':''?>">Large <small>41-100lbs</small></div></li>
                                        <li><div data-checkbox="giant" class="lnk<?= in_array('giant', $dog_size4)?' active':''?>">Giant <small>101+lbs</small></div></li>
                                    </ul>
                                    <input type="hidden" name="dog_size4" id="dog_size4" value="<?= $is_mem_service->dog_size?>">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                    <h4>Host cats?</h4>
                                    <ul class="selectLst">
                                        <li><div data-radio="1" class="lnk<?= !empty($is_mem_service->host_cat)?' active':''?>">Yes</div></li>
                                        <li><div data-radio="0" class="lnk<?= !empty($is_mem_service) && $is_mem_service->host_cat==0?' active':''?>">No</div></li>
                                    </ul>
                                    <input type="hidden" name="host_cat4" id="host_cat4" value="<?= $is_mem_service->host_cat?>">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                    <h4>Host puppies under 1 year old?</h4>
                                    <ul class="selectLst">
                                        <li><div data-radio="1" class="lnk<?= !empty($is_mem_service->host_puppy_under_one)?' active':''?>">Yes</div></li>
                                        <li><div data-radio="0" class="lnk<?= !empty($is_mem_service) && $is_mem_service->host_puppy_under_one==0?' active':''?>">No</div></li>
                                    </ul>
                                    <input type="hidden" name="host_puppy_under_one4" id="host_puppy_under_one4" value="<?= $is_mem_service->host_puppy_under_one?>">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                    <h4>Neutered/Spayed dogs?</h4>
                                    <ul class="selectLst">
                                        <li><div data-radio="1" class="lnk<?= !empty($is_mem_service->neutered_dog)?' active':''?>">Yes</div></li>
                                        <li><div data-radio="0" class="lnk<?= !empty($is_mem_service) && $is_mem_service->neutered_dog==0?' active':''?>">No</div></li>
                                    </ul>
                                    <input type="hidden" name="neutered_dog4" id="neutered_dog4" value="<?= $is_mem_service->neutered_dog?>">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                    <h4>Crate trained?</h4>
                                    <ul class="selectLst">
                                        <li><div data-radio="1" class="lnk<?= !empty($is_mem_service->crate_trained)?' active':''?>">Yes</div></li>
                                        <li><div data-radio="0" class="lnk<?= !empty($is_mem_service) && $is_mem_service->crate_trained==0?' active':''?>">No</div></li>
                                    </ul>
                                    <input type="hidden" name="crate_trained4" id="crate_trained4" value="<?= $is_mem_service->crate_trained?>">
                                </div> -->

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <h4>Do you provide this service for?</h4>
                                    <ul class="selectLst">
                                        <li><div data-radio="dog" class="lnk<?= $is_mem_service->service_for=='dog'?' active':''?>">Dogs</div></li>
                                        <li><div data-radio="cat" class="lnk<?= $is_mem_service->service_for=='cat'?' active':''?>">Cats</div></li>
                                        <li><div data-radio="both" class="lnk<?= $is_mem_service->service_for=='both'?' active':''?>">Both</div></li>
                                    </ul>
                                    <input type="hidden" name="service_for4" id="service_for4" value="<?= $is_mem_service->service_for?>">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <h4>How many spaces do you have available each day?(Note: Maximum of 4 dogs is allowed per day)</h4>
                                    <input type="text" name="available_spaces4" id="available_spaces4" value="<?= $is_mem_service->available_spaces?>" class="txtBox" placeholder="0 Dogs">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <h4>Are you home full-time during the week?</h4>
                                    <ul class="selectLst">
                                        <li><div data-radio="1" class="lnk<?= !empty($is_mem_service->full_time_home)?' active':''?>">Yes</div></li>
                                        <li><div data-radio="0" class="lnk<?= empty($is_mem_service->full_time_home)?' active':''?>">No</div></li>
                                    </ul>
                                    <input type="hidden" name="full_time_home4" id="full_time_home4" value="<?= $is_mem_service->full_time_home?>">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <h4>When hosting dogs in your home, how frequently can you provide potty breaks?</h4>
                                    <ul class="selectLst">
                                        <li><div data-radio="0-2" class="lnk<?= $is_mem_service->potty_break=='0-2'?' active':''?>">0-2 hours</div></li>
                                        <li><div data-radio="2-4" class="lnk<?= $is_mem_service->potty_break=='2-4'?' active':''?>">2-4 hours</div></li>
                                        <li><div data-radio="4-8" class="lnk<?= $is_mem_service->potty_break=='4-8'?' active':''?>">4-8 hours</div></li>
                                        <li><div data-radio="8+" class="lnk<?= $is_mem_service->potty_break=='8+'?' active':''?>">8+ hours</div></li>
                                    </ul>
                                    <input type="hidden" name="potty_break4" id="potty_break4" value="<?= $is_mem_service->potty_break?>">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <h4>What is your cancellation policy for <?= $services[3]->title;?>?</h4>
                                    <ul class="selectLst">
                                        <?php foreach ($policies as $key => $policy): ?>
                                            <li>
                                                <div data-radio="<?= strtolower($policy->title)?>" class="lnk txt_info<?= $is_mem_service->cancellation_policy==strtolower($policy->title)?' active':''?>"><?= $policy->title?><em><strong><?= $policy->title?></strong><?= $policy->detail?></em></div>
                                            </li>
                                        <?php endforeach ?>
                                    </ul>
                                    <input type="hidden" name="cancellation_policy4" id="cancellation_policy4" value="<?= $is_mem_service->cancellation_policy?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $is_mem_service = is_mem_service($this->session->mem_id, 5); ?>
                    <div class="svcBlk bindCls4<?= $is_mem_service?'':' hidden'?>">
                        <div class="inner">
                            <div class="icoBlk">
                                <div class="icon"><img src="<?= get_site_image_src("services",$services[4]->image);?>" alt=""></div>
                            </div>
                            <div class="txt">
                                <h5 class="title"><?= $services[4]->title;?></h5>
                                <h6 class="subtitle"><?= $services[4]->overview;?></h6>
                            </div>
                        </div>
                        <div class="inter">
                            <div class="formRow row">
                                <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <h4>Dogs size?</h4>
                                    <?php $dog_size5 = @explode(',', $is_mem_service->dog_size)?>
                                    <ul class="selectLst">
                                        <li><div data-checkbox="small" class="lnk<?= in_array('small', $dog_size5)?' active':''?>">Small <small>0-15lbs</small></div></li>
                                        <li><div data-checkbox="medium" class="lnk<?= in_array('medium', $dog_size5)?' active':''?>">Medium <small>16-40lbs</small></div></li>
                                        <li><div data-checkbox="large" class="lnk<?= in_array('large', $dog_size5)?' active':''?>">Large <small>41-100lbs</small></div></li>
                                        <li><div data-checkbox="giant" class="lnk<?= in_array('giant', $dog_size5)?' active':''?>">Giant <small>101+lbs</small></div></li>
                                    </ul>
                                    <input type="hidden" name="dog_size5" id="dog_size5" value="<?= $is_mem_service->dog_size?>">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                    <h4>Accept cats?</h4>
                                    <ul class="selectLst">
                                        <li><div data-radio="1" class="lnk<?= !empty($is_mem_service->accept_cat)?' active':''?>">Yes</div></li>
                                        <li><div data-radio="0" class="lnk<?= !empty($is_mem_service) && $is_mem_service->accept_cat==0?' active':''?>">No</div></li>
                                    </ul>
                                    <input type="hidden" name="accept_cat5" id="accept_cat5" value="<?= $is_mem_service->accept_cat?>">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                    <h4>Host puppies under 1 year old?</h4>
                                    <ul class="selectLst">
                                        <li><div data-radio="1" class="lnk<?= !empty($is_mem_service->host_puppy_under_one)?' active':''?>">Yes</div></li>
                                        <li><div data-radio="0" class="lnk<?= !empty($is_mem_service) && $is_mem_service->host_puppy_under_one==0?' active':''?>">No</div></li>
                                    </ul>
                                    <input type="hidden" name="host_puppy_under_one5" id="host_puppy_under_one5" value="<?= $is_mem_service->host_puppy_under_one?>">
                                </div> -->
                                
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <h4>What is the maximum distance you'll travel to get to a client's home?(Miles)</h4>
                                    <input type="text" name="travel_radius5" id="travel_radius5" value="<?= $is_mem_service->travel_radius?>" class="txtBox" placeholder="Miles">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <h4>What times are you available for Play Dates on weekdays? <small class="color">(check all that apply)</small></h4>
                                    <?php $available_times5 = @explode(',', $is_mem_service->available_times)?>
                                    <ul class="selectLst">
                                        <li><div data-checkbox="6am-11am" class="lnk<?= in_array('6am-11am', $available_times5)?' active':''?>">6am-11am</div></li>
                                        <li><div data-checkbox="11am-3pm" class="lnk<?= in_array('11am-3pm', $available_times5)?' active':''?>">11am-3pm</div></li>
                                        <li><div data-checkbox="3pm-10pm" class="lnk<?= in_array('3pm-10pm', $available_times5)?' active':''?>">3pm-10pm</div></li>
                                        <li><div data-checkbox="10pm–1am" class="lnk<?= in_array('10pm–1am', $available_times5)?' active':''?>">10pm–1am</div></li>
                                    </ul>
                                    <input type="hidden" name="available_times5" id="available_times5" value="<?= $is_mem_service->available_times?>">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <h4>What is your Cancellation policy for <?= $services[4]->title;?>?</h4>
                                    <ul class="selectLst">
                                        <?php foreach ($policies as $key => $policy): ?>
                                            <li>
                                                <div data-radio="<?= strtolower($policy->title)?>" class="lnk txt_info<?= $is_mem_service->cancellation_policy==strtolower($policy->title)?' active':''?>"><?= $policy->title?><em><strong><?= $policy->title?></strong><?= $policy->detail?></em></div>
                                            </li>
                                        <?php endforeach ?>
                                    </ul>
                                    <input type="hidden" name="cancellation_policy5" id="cancellation_policy5" value="<?= $is_mem_service->cancellation_policy?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bTn text-center">
                        <button type="button" class="webBtn prevBtn"><i class="fi-arrow-left"></i> Back</button>
                        <button type="button" class="webBtn colorBtn nextBtn">Next <i class="fi-arrow-right"></i></button>
                    </div>
                </fieldset>

                <fieldset>
                    <div class="content">
                        <h1 class="secHeading">Tell us about your pet-sitting preferences</h1>
                        <p class="pre">Note: if you offer more than one service on a given day, you could get requests for up to 4 pets at a time or you can be booked for up to two services in one day.</p>
                    </div>
                    <div class="svcBlk">
                        <div class="inner">
                            <div class="icoBlk">
                                <div class="icon"><img src="<?= base_url('assets/images/icon-home.svg')?>" alt=""></div>
                            </div>
                            <div class="txt">
                                <h5 class="title">Hosting Preferences</h5>
                                <h5 class="title">(PFSC Vacations, PFSC Day Care)</h5>
                                <h6 class="subtitle">You provide pet care services in your home.</h6>
                            </div>
                        </div>
                        <div class="inter">
                            <div class="formRow row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <h4>What size dogs will you host in your home?</h4>
                                    <?php $host_dog_size = @explode(',', $mem_data->mem_host_dog_size)?>
                                    <ul class="selectLst">
                                        <li><div data-checkbox="small" class="lnk<?= in_array('small', $host_dog_size)?' active':''?>">Small <small>0-15lbs</small></div></li>
                                        <li><div data-checkbox="medium" class="lnk<?= in_array('medium', $host_dog_size)?' active':''?>">Medium <small>16-40lbs</small></div></li>
                                        <li><div data-checkbox="large" class="lnk<?= in_array('large', $host_dog_size)?' active':''?>">Large <small>41-100lbs</small></div></li>
                                        <li><div data-checkbox="giant" class="lnk<?= in_array('giant', $host_dog_size)?' active':''?>">Giant <small>101+lbs</small></div></li>
                                    </ul>
                                    <input type="hidden" name="host_dog_size" id="host_dog_size" value="<?= $mem_data->mem_host_dog_size?>">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                    <h4>Do you want to host cats?</h4>
                                    <ul class="selectLst">
                                        <li><div data-radio="1" class="lnk<?= !empty($mem_data->mem_host_cat)?' active':''?>">Yes</div></li>
                                        <li><div data-radio="0" class="lnk<?= $mem_data->mem_host_cat==='0'?' active':''?>">No</div></li>
                                    </ul>
                                    <input type="hidden" name="host_cat" id="host_cat" value="<?= $mem_data->mem_host_cat?>">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                    <h4>Do you want to host puppies under 1 year old?</h4>
                                    <ul class="selectLst">
                                        <li><div data-radio="1" class="lnk<?= !empty($mem_data->mem_host_puppy_under_one)?' active':''?>">Yes</div></li>
                                        <li><div data-radio="0" class="lnk<?= $mem_data->mem_host_puppy_under_one==='0'?' active':''?>">No</div></li>
                                    </ul>
                                    <input type="hidden" name="host_puppy_under_one" id="host_puppy_under_one" value="<?= $mem_data->mem_host_puppy_under_one?>">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                    <h4>Do you plan to host dogs from different families at the same time?</h4>
                                    <ul class="selectLst">
                                        <li><div data-radio="1" class="lnk<?= !empty($mem_data->mem_different_families_dog)?' active':''?>">Yes</div></li>
                                        <li><div data-radio="0" class="lnk<?= $mem_data->mem_different_families_dog==='0'?' active':''?>">No</div></li>
                                    </ul>
                                    <input type="hidden" name="different_families_dog" id="different_families_dog" value="<?= $mem_data->mem_different_families_dog?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="svcBlk">
                        <div class="inner">
                            <div class="icoBlk">
                                <div class="icon"><img src="<?= base_url('assets/images/icon-food.svg')?>" alt=""></div>
                            </div>
                            <div class="txt">
                                <h5 class="title">Travelling Preferences</h5>
                                <h5 class="title">(House sitting, Drop in visits / Dog Walking, PFSC Play Dates)</h5>
                                <h6 class="subtitle">You provide pet care services at the client's home.</h6>
                            </div>
                        </div>
                        <div class="inter">
                            <div class="formRow row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <h4>What size dogs do you accept?</h4>
                                    <?php $accept_dog_size = @explode(',', $mem_data->mem_accept_dog_size)?>
                                    <ul class="selectLst">
                                        <li><div data-checkbox="small" class="lnk<?= in_array('small', $accept_dog_size)?' active':''?>">Small <small>0-15lbs</small></div></li>
                                        <li><div data-checkbox="medium" class="lnk<?= in_array('medium', $accept_dog_size)?' active':''?>">Medium <small>16-40lbs</small></div></li>
                                        <li><div data-checkbox="large" class="lnk<?= in_array('large', $accept_dog_size)?' active':''?>">Large <small>41-100lbs</small></div></li>
                                        <li><div data-checkbox="giant" class="lnk<?= in_array('giant', $accept_dog_size)?' active':''?>">Giant <small>101+lbs</small></div></li>
                                    </ul>
                                    <input type="hidden" name="accept_dog_size" id="accept_dog_size" value="<?= $mem_data->mem_accept_dog_size?>">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                    <h4>Do you accept cats?</h4>
                                    <ul class="selectLst">
                                        <li><div data-radio="1" class="lnk<?= !empty($mem_data->mem_accept_cat)?' active':''?>">Yes</div></li>
                                        <li><div data-radio="0" class="lnk<?= $mem_data->mem_accept_cat==='0'?' active':''?>">No</div></li>
                                    </ul>
                                    <input type="hidden" name="accept_cat" id="accept_cat" value="<?= $mem_data->mem_accept_cat?>">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                    <h4>Do you accept puppies under 1 year old?</h4>
                                    <ul class="selectLst">
                                        <li><div data-radio="1" class="lnk<?= !empty($mem_data->mem_accept_puppy_under_one)?' active':''?>">Yes</div></li>
                                        <li><div data-radio="0" class="lnk<?= $mem_data->mem_accept_puppy_under_one==='0'?' active':''?>">No</div></li>
                                    </ul>
                                    <input type="hidden" name="accept_puppy_under_one" id="accept_puppy_under_one" value="<?= $mem_data->mem_accept_puppy_under_one?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bTn text-center">
                        <button type="button" class="webBtn prevBtn"><i class="fi-arrow-left"></i> Back</button>
                        <button type="button" class="webBtn colorBtn nextBtn">Next <i class="fi-arrow-right"></i></button>
                    </div>
                </fieldset>

                <fieldset>
                    <div class="content">
                        <h1 class="secHeading">Sitter Profile</h1>
                    </div>
                    <div class="svcBlk">
                        <h2>Tell us about your home</h2>
                        <div class="inter">
                            <div class="formRow row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <h4>Have a house?</h4>
                                    <ul class="selectLst">
                                        <li><div data-radio="House" class="lnk<?= 'House'==$mem_data->mem_home_type?' active':''?>">House</div></li>
                                        <li><div data-radio="Apartment" class="lnk<?= 'Apartment'==$mem_data->mem_home_type?' active':''?>">Apartment</div></li>
                                        <li><div data-radio="Farm" class="lnk<?= 'Farm'==$mem_data->mem_home_type?' active':''?>">Farm</div></li>
                                    </ul>
                                    <input type="hidden" name="home_type" id="home_type" value="<?= $mem_data->mem_home_type?>">
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 col-xx-12 txtGrp">
                                    <h4>Have a yard?</h4>
                                    <ul class="selectLst">
                                        <li><div data-radio="Fenced" class="lnk<?= 'Fenced'==$mem_data->mem_have_yard?' active':''?>">Fenced</div></li>
                                        <li><div data-radio="Unfenced" class="lnk<?= 'Unfenced'==$mem_data->mem_have_yard?' active':''?>">Unfenced</div></li>
                                        <li><div data-radio="No" class="lnk<?= 'No'==$mem_data->mem_have_yard?' active':''?>">Don't have</div></li>
                                    </ul>
                                    <input type="hidden" name="have_yard" id="have_yard" value="<?= $mem_data->mem_have_yard?>">
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 col-xx-12 txtGrp">
                                    <h4>Does anyone smoke?</h4>
                                    <ul class="selectLst">
                                        <li><div data-radio="1" class="lnk<?= !empty($mem_data->mem_non_smoke_house)?' active':''?>">Yes</div></li>
                                        <li><div data-radio="0" class="lnk<?= $mem_data->mem_non_smoke_house==='0'?' active':''?>">No</div></li>
                                    </ul>
                                    <input type="hidden" name="smoke" id="smoke" value="<?= $mem_data->mem_non_smoke_house?>">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <h4>Children in home?</h4>
                                    <ul class="selectLst">
                                        <li><div data-radio="0-5" class="lnk<?= '0-5'==$mem_data->mem_children?' active':''?>">0-5 age</div></li>
                                        <li><div data-radio="6-12" class="lnk<?= '6-12'==$mem_data->mem_children?' active':''?>">6-12 age</div></li>
                                        <li><div data-radio="No" class="lnk<?= 'No'==$mem_data->mem_children?' active':''?>">No child</div></li>
                                    </ul>
                                    <input type="hidden" name="children" id="children" value="<?= $mem_data->mem_children?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="svcBlk">
                        <h2>Tell us about your pets</h2>
                        <p>You'll have a chance to tell us about any dogs in your home later on.</p>
                        <div class="inter">
                            <div class="formRow row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-12 txtGrp">
                                    <h4>Doesn't own a cat</h4>
                                    <ul class="selectLst">
                                        <li><div data-radio="1" class="lnk<?= !empty($mem_data->mem_not_dog)?' active':''?>">Yes</div></li>
                                        <li><div data-radio="0" class="lnk<?= $mem_data->mem_not_dog==='0'?' active':''?>">No</div></li>
                                    </ul>
                                    <input type="hidden" name="dog" id="dog" value="<?= $mem_data->mem_not_dog?>">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-12 txtGrp">
                                    <h4>Doesn't own a cat</h4>
                                    <ul class="selectLst">
                                        <li><div data-radio="1" class="lnk<?= !empty($mem_data->mem_not_cat)?' active':''?>">Yes</div></li>
                                        <li><div data-radio="0" class="lnk<?= $mem_data->mem_not_cat==='0'?' active':''?>">No</div></li>
                                    </ul>
                                    <input type="hidden" name="cat" id="cat" value="<?= $mem_data->mem_not_cat?>">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-12 txtGrp">
                                    <h4>Caged pets?</h4>
                                    <ul class="selectLst">
                                        <li><div data-radio="1" class="lnk<?= !empty($mem_data->mem_caged_pet)?' active':''?>">Yes</div></li>
                                        <li><div data-radio="0" class="lnk<?= $mem_data->mem_caged_pet==='0'?' active':''?>">No</div></li>
                                    </ul>
                                    <input type="hidden" name="caged_pet" id="caged_pet" value="<?= $mem_data->mem_caged_pet?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="svcBlk">
                        <h2>What's your dog-sitting style?</h2>
                        <div class="inter">
                            <div class="formRow row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-12 txtGrp">
                                    <h4>Allowed on furniture?</h4>
                                    <ul class="selectLst">
                                        <li><div data-radio="1" class="lnk<?= !empty($mem_data->mem_allow_furniture)?' active':''?>">Yes</div></li>
                                        <li><div data-radio="0" class="lnk<?= $mem_data->mem_allow_furniture==='0'?' active':''?>">No</div></li>
                                    </ul>
                                    <input type="hidden" name="allow_furniture" id="allow_furniture" value="<?= $mem_data->mem_allow_furniture?>">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-12 txtGrp">
                                    <h4>Allowed on bed?</h4>
                                    <ul class="selectLst">
                                        <li><div data-radio="1" class="lnk<?= !empty($mem_data->mem_allow_bed)?' active':''?>">Yes</div></li>
                                        <li><div data-radio="0" class="lnk<?= $mem_data->mem_allow_bed==='0'?' active':''?>">No</div></li>
                                    </ul>
                                    <input type="hidden" name="allow_bed" id="allow_bed" value="<?= $mem_data->mem_allow_bed?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bTn text-center">
                        <button type="button" class="webBtn prevBtn"><i class="fi-arrow-left"></i> Back</button>
                        <button type="button" class="webBtn colorBtn nextBtn">Next <i class="fi-arrow-right"></i></button>
                    </div>
                </fieldset>

                
                
                <!-- 
                <fieldset>
                    <div class="content">
                        <h1 class="secHeading">Additional Details</h1>
                    </div>
                    <div class="svcBlk">
                        <h2>Tell us about additional details.</h2>
                        <div class="inter">
                            <div class="filters">
                                <div class="inBlk">
                                    <h4>Housing conditions</h4>
                                    <ul class="ctgLst">
                                        <li>
                                            <input type="checkbox" id="has_home" name="has_home" value="1"<?= empty($mem_data->mem_has_home)?'':' checked'?>>
                                            <label for="has_home">Has house (excludes apartments)</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="has_fenced_yard" name="has_fenced_yard" value="1"<?= empty($mem_data->mem_has_fenced_yard)?'':' checked'?>>
                                            <label for="has_fenced_yard">Has fenced yard</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="has_allow_furniture" name="has_allow_furniture" value="1"<?= empty($mem_data->mem_has_allow_furniture)?'':' checked'?>>
                                            <label for="has_allow_furniture">Dogs allowed on furniture</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="has_allow_bed" name="has_allow_bed" value="1"<?= empty($mem_data->mem_has_allow_bed)?'':' checked'?>>
                                            <label for="has_allow_bed">Dogs allowed on bed</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="has_non_smoke_house" name="has_non_smoke_house" value="1"<?= empty($mem_data->mem_has_non_smoke_house)?'':' checked'?>>
                                            <label for="has_non_smoke_house">Non-smoking home</label>
                                        </li>
                                    </ul>
                                </div>
                                <div class="inBlk">
                                    <h4>Pets in the home</h4>
                                    <ul class="ctgLst">
                                        <li>
                                            <input type="checkbox" id="has_not_dog" name="has_not_dog" value="1"<?= empty($mem_data->mem_has_not_dog)?'':' checked'?>>
                                            <label for="has_not_dog">Doesn't own a dog</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="has_not_cat" name="has_not_cat" value="1"<?= empty($mem_data->mem_has_not_cat)?'':' checked'?>>
                                            <label for="has_not_cat">Doesn't own a cat</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="has_one_client" name="has_one_client" value="1"<?= empty($mem_data->mem_has_one_client)?'':' checked'?>>
                                            <label for="has_one_client">Accepts only one client at a time</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="has_caged_pet" name="has_caged_pet" value="1"<?= empty($mem_data->mem_has_caged_pet)?'':' checked'?>>
                                            <label for="has_caged_pet">Does not own caged pets</label>
                                        </li>
                                    </ul>
                                </div>
                                <div class="inBlk">
                                    <h4>Children in the home</h4>
                                    <ul class="ctgLst">
                                        <li>
                                            <input type="radio" id="childrenno" name="has_children" value="No"<?= $mem_data->mem_has_children=='No'?' checked':''?>>
                                            <label for="childrenno">Has no children</label>
                                        </li>
                                        <li>
                                            <input type="radio" id="children05" name="has_children" value="0-5"<?= $mem_data->mem_has_children=='0-5'?' checked':''?>>
                                            <label for="children05">No children 0-5 years old</label>
                                        </li>
                                        <li>
                                            <input type="radio" id="children612" name="has_children" value="6-12"<?= $mem_data->mem_has_children=='6-12'?' checked':''?>>
                                            <label for="children612">No children 6-12 years old</label>
                                        </li>
                                    </ul>
                                </div>
                                <div class="inBlk">
                                    <h4>Additional services</h4>
                                    <ul class="ctgLst">
                                        <li>
                                            <input type="checkbox" id="has_puppy_care" name="has_puppy_care" value="1"<?= empty($mem_data->mem_has_puppy_care)?'':' checked'?>>
                                            <label for="has_puppy_care">Puppy care</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="has_cat_care" name="has_cat_care" value="1"<?= empty($mem_data->mem_has_cat_care)?'':' checked'?>>
                                            <label for="has_cat_care">Cat care</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="has_play_dates" name="has_play_dates" value="1"<?= empty($mem_data->mem_has_play_dates)?'':' checked'?>>
                                            <label for="has_play_dates">Play Dates</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="has_first_aid_certified" name="has_first_aid_certified" value="1"<?= empty($mem_data->mem_has_first_aid_certified)?'':' checked'?>>
                                            <label for="has_first_aid_certified">Dog first-aid certified</label>
                                        </li>
                                    </ul>
                                </div>
                                
                                <div class="inBlk">
                                    <h4>Sitter memberships</h4>
                                    <ul class="ctgLst">
                                        <li>
                                            <input type="checkbox" id="has_apse_member" name="has_apse_member" value="1"<?= empty($mem_data->mem_has_apse_member)?'':' checked'?>>
                                            <label for="has_apse_member">APSE member</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="has_petsit_member" name="has_petsit_member" value="1"<?= empty($mem_data->mem_has_petsit_member)?'':' checked'?>>
                                            <label for="has_petsit_member">PetsitUSA member</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="has_volunteer_member" name="has_volunteer_member" value="1"<?= empty($mem_data->mem_has_volunteer_member)?'':' checked'?>>
                                            <label for="has_volunteer_member">Volunteer / Donor</label>
                                        </li>
                                    </ul>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="bTn text-center">
                        <button type="button" class="webBtn prevBtn"><i class="fi-arrow-left"></i> Back</button>
                        <button type="button" class="webBtn colorBtn nextBtn">Next <i class="fi-arrow-right"></i></button>
                    </div>
                </fieldset>
                 -->
                


                <fieldset>
                    <div class="content">
                        <h1 class="secHeading">What else should dog owners know about you?</h1>
                    </div>
                    <div class="svcBlk">
                        <h2>Tell us about additional details.</h2>
                        <div class="inter">
                            <div class="formRow row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <h4>What sort of activities will a dog enjoy on a stay with you?</h4>
                                    <textarea name="stay_activities" id="stay_activities" class="txtBox" placeholder="Where will you go on walks? What fun activities will you do together?"><?= $mem_data->mem_stay_activities ?></textarea>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <h4>What would you like to know about a dog before sitting him or her? Do you have any breed preferences?</h4>
                                    <textarea name="breed_prefrences" id="breed_prefrences" class="txtBox" placeholder=""><?= $mem_data->mem_breed_prefrences ?></textarea>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <h4>Do you know dog first aid and/or CPR?</h4>
                                    <ul class="selectLst">
                                        <li><div data-radio="1" class="lnk<?= !empty($mem_data->mem_dog_first_aid)?' active':''?>">Yes</div></li>
                                        <li><div data-radio="0" class="lnk<?= $mem_data->mem_dog_first_aid==='0'?' active':''?>">No</div></li>
                                    </ul>
                                    <input type="hidden" name="dog_first_aid" id="dog_first_aid" value="<?= $mem_data->mem_dog_first_aid?>">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <h4>Can you administer oral medication to dogs?</h4>
                                    <ul class="selectLst">
                                        <li><div data-radio="1" class="lnk<?= !empty($mem_data->mem_oral_medication)?' active':''?>">Yes</div></li>
                                        <li><div data-radio="0" class="lnk<?= $mem_data->mem_oral_medication==='0'?' active':''?>">No</div></li>
                                    </ul>
                                    <input type="hidden" name="oral_medication" id="oral_medication" value="<?= $mem_data->mem_oral_medication?>">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <h4>Can you administer injected medication to dogs?</h4>
                                    <ul class="selectLst">
                                        <li><div data-radio="1" class="lnk<?= !empty($mem_data->mem_injected_medication)?' active':''?>">Yes</div></li>
                                        <li><div data-radio="0" class="lnk<?= $mem_data->mem_injected_medication==='0'?' active':''?>">No</div></li>
                                    </ul>
                                    <input type="hidden" name="injected_medication" id="injected_medication" value="<?= $mem_data->mem_injected_medication?>">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <h4>Do you have experience taking care of senior dogs?</h4>
                                    <ul class="selectLst">
                                        <li><div data-radio="1" class="lnk<?= !empty($mem_data->mem_senior_dog_care)?' active':''?>">Yes</div></li>
                                        <li><div data-radio="0" class="lnk<?= $mem_data->mem_senior_dog_care==='0'?' active':''?>">No</div></li>
                                    </ul>
                                    <input type="hidden" name="senior_dog_care" id="senior_dog_care" value="<?= $mem_data->mem_senior_dog_care?>">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <h4>Do you have experience taking care of special needs dogs?</h4>
                                    <ul class="selectLst">
                                        <li><div data-radio="1" class="lnk<?= !empty($mem_data->mem_special_need_dog)?' active':''?>">Yes</div></li>
                                        <li><div data-radio="0" class="lnk<?= $mem_data->mem_special_need_dog==='0'?' active':''?>">No</div></li>
                                    </ul>
                                    <input type="hidden" name="special_need_dog" id="special_need_dog" value="<?= $mem_data->mem_special_need_dog?>">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <h4>Can you provide daily exercise for high-energy dogs?</h4>
                                    <ul class="selectLst">
                                        <li><div data-radio="1" class="lnk<?= !empty($mem_data->mem_daily_exercise)?' active':''?>">Yes</div></li>
                                        <li><div data-radio="0" class="lnk<?= $mem_data->mem_daily_exercise==='0'?' active':''?>">No</div></li>
                                    </ul>
                                    <input type="hidden" name="daily_exercise" id="daily_exercise" value="<?= $mem_data->mem_daily_exercise?>">
                                </div>
                                <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <h4>Are you a member of any of the following organization? Select all that apply.</h4>
                                    <ul class="selectLst">
                                        <li><div data-radio="1" class="lnk">APSE</div></li>
                                        <li><div data-radio="2" class="lnk">dog*tec</div></li>
                                        <li><div data-radio="3" class="lnk">IAABC</div></li>
                                        <li><div data-radio="4" class="lnk">Petsit USA</div></li>
                                    </ul>
                                    <input type="hidden" name="full_time_home" id="full_time_home" value="">
                                </div> -->
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <h4>Are you willing to accept stays longer than one week?</h4>
                                    <ul class="selectLst">
                                        <li><div data-radio="1" class="lnk<?= !empty($mem_data->mem_week_longer_stay)?' active':''?>">Yes</div></li>
                                        <li><div data-radio="0" class="lnk<?= $mem_data->mem_week_longer_stay==='0'?' active':''?>">No</div></li>
                                    </ul>
                                    <input type="hidden" name="week_longer_stay" id="week_longer_stay" value="<?= $mem_data->mem_week_longer_stay?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bTn text-center">
                        <button type="button" class="webBtn prevBtn"><i class="fi-arrow-left"></i> Back</button>
                        <button type="submit" class="webBtn colorBtn">Save & Continue <i class="spinner hidden"></i></button>
                    </div>
                    <div class="alertMsg" style="display: none;"></div>
                </fieldset>
                
                <!-- 
                <fieldset>
                    <div id="membership">
                        <div class="contain">
                            <h1 class="secHeading text-center">Sitter Membership</h1>
                            <ul class="lst flex">
                                <li>
                                    <div class="planBlk basic selected">
                                        <div class="type semi">Basic</div>
                                        <div class="price">$75 <small>One time sign up</small></div>
                                        <ul class="list">
                                            <li>One Time Signup Fee $75  Covers Cost Of Background Check</li>
                                            <li>All Providers upon Background Check Approval will be home inspected and a professional photo shoot to attract more attention to your profile. Basic care providers pets are covered under the PFS Insurance Plan however responsible to meet deductible.</li>
                                        </ul>
                                        <div class="bTn">
                                            <button type="submit">Choose <i class="fi-arrow-right"></i></button>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="planBlk pro">
                                        <div class="type semi">PFSC Member</div>
                                        <div class="price">$50 <small>Discounted sign up</small></div>
                                        <ul class="list">
                                            <li>One Time Discounted Sign Up Fee $50 plus yearly Membership Dues $100</li>
                                            <li>(Can Be paid payments $ 15  off each vacation until Balance is met * Not sure how to word That*)</li>
                                            <li>All Providers upon Background Check Approval will be home inspected and a professional photo shoot to attract more attention to your profile. Paid Members Have a Verified symbol and are seen first when Pet Parents are searching for a PFSC Sitter PFSC Member sitters are covered under the PFSC Insurance Plan with Zero deductible should your resident fur kid be injured by a vacationing Pup.</li>
                                        </ul>
                                        <div class="bTn">
                                            <button type="submit">Choose <i class="fi-arrow-right"></i></button>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </fieldset>
                 -->
            </form>
        </div>
    </div>
</section>
<!-- dash -->


<script type="text/javascript">
    $(function(){
        function rate(){
            $('.svcBlk.rateBlk .txtGrp').each(function(){
                v = $(this).find('.txtBox').val();
                em = (v / 100 * 80).toFixed(2);
                $(this).find('small').children('em').text(em);
                // console.log(em);
            });
        }

        rate();

        $(document).on('keyup', '.svcBlk.rateBlk .txtGrp .txtBox', function(){
            rate();
        });

        $(document).on('click', '.selectLst > li > [data-radio].lnk', function() {
            let radio = $(this).data('radio');
            // $(this).toggleClass('active');
            $(this).parents('ul').find('.lnk').addClass('active').not($(this)).removeClass('active');
            $(this).parents('.txtGrp').children('input[type="hidden"]').val(radio);
        });

        $(document).on('click', '.selectLst > li > [data-checkbox].lnk', function() {
            let checkbox = '';
            $(this).toggleClass('active');
            $(this).parents('ul').find('[data-radio].lnk').removeClass('active');

            $(this).parents('ul').find('[data-checkbox].active').each(function( index ) {
                checkbox += $( this ).data('checkbox') +',';
            });
            checkbox = checkbox.slice(0, -1);
            $(this).parents('.txtGrp').children('input[type="hidden"]').val(checkbox);
        });

        $(document).on('change','.svcBlk .switchBtn > input[type="checkbox"]',function() {
            let cls = $(this).attr('class');
            let chkVl = !this.checked;
            $('.svcBlk.'+cls).toggleClass('hidden').find('input').attr('disabled',chkVl);
            // $('.svcBlk.rateBlk.'+cls).toggleClass('hidden').find('input[name^="prices"]').attr('disabled',chkVl);
        });

        $(document).on('change','.svcBlk .aditionBtn .switchBtn > input[type="checkbox"]',function() {
            $(this).parents('.svcBlk').children('.inner').next('.aditionDv').slideToggle();
        });

        $(window).keydown(function(event) {
            if(event.keyCode == 13) {
                event.preventDefault();
                $(event.target).parents("fieldset").find(".nextBtn").trigger("click");
                return false;
            }
            /*else if(event.keyCode == 8) {
                event.preventDefault();
                $(event.target).parents("fieldset").find('.prevBtn').trigger("click");
                return false;
            }*/
        });

        $('.nextBtn').click(function(e) {
            let currStep = $(this).parents('fieldset');
            let nextStep = currStep.next('fieldset');
            currStep.hide();
            nextStep.fadeIn();
            nextStep.find('input:first').focus();
        });

        $('.prevBtn').click(function(e) {
            let currStep = $(this).parents('fieldset');
            let prevStep = currStep.prev('fieldset');
            currStep.hide();
            prevStep.fadeIn();
            prevStep.find('input:first').focus();
        });
    });
</script>
</main>
<?php $this->load->view('includes/footer');?>
</body>
</html>