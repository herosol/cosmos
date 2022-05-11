<!doctype html>
<html>
<head>
<title>Profile Settings – <?= $site_settings->site_name?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>
<body id="home-page">
    <?php get_header() ?>
<main>


<section id="dash">
    <div id="profileSet">
        <div class="contain">
            <div class="head">
                <h1 class="secHeading">Profile Settings</h1>
            </div>
            <form action="" method="post" autocomplete="off" class="frmAjax" id="frmSetting">
                <?= showMsg()?>
                <div class="blk">
                    <div class="_header">
                        <h3>Profile Info</h3>
                    </div>
                    <div class="formBlk">
                        <div class="flexRow flex">
                            <div class="col col1">
                                <div class="upLoadDp">
                                    <div class="proDp ico">
                                        <img src="<?= get_image_src($mem_data->mem_image, '300', true)?>" alt="" id="userImage">
                                    </div>
                                    <div class="text-center"><button type="button" class="webBtn smBtn" id="uploadDp" data-image-src="dp"><i class="fi-user-alt"></i> Change Photo</button></div>
                                    <div class="noHats text-center">(Please upload your photo, no hats and sunglasses)</div>
                                </div>
                            </div>
                            <div class="col col2">
                                <h4 class="color">Account Details</h4>
                                <div class="row formRow">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                        <h4>First Name</h4>
                                        <input type="text" name="fname" id="fname" value="<?= ($mem_data->mem_fname?$mem_data->mem_fname:'')?>" class="txtBox" placeholder="First Name" autofocus>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                        <h4>Last Name</h4>
                                        <input type="text" name="lname" id="lname" value="<?= ($mem_data->mem_lname?$mem_data->mem_lname:'')?>" class="txtBox" placeholder="Last Name">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                        <h4>Email</h4>
                                        <div class="verifyBlk">
                                            <input type="text" id="email" name="email" class="txtBox" value="<?= $mem_data->mem_email?$mem_data->mem_email:''?>" placeholder="Email Address">
                                            <?php if (!empty($mem_data->mem_email)): ?>
                                                <?php if (empty($mem_data->mem_verified)): ?>
                                                    <a href="<?= site_url('email-verification')?>" class="ntVerify">Verify</a>
                                                <?php else: ?>
                                                    <a href="javascript:void(0)" class="fi fi-check"></a>
                                                <?php endif ?>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                        <h4>Company (optional)</h4>
                                        <input type="text" name="company" id="company" value="<?= ($mem_data->mem_company?$mem_data->mem_company : '')?>" class="txtBox shwFld" placeholder="Company (optional)">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                        <h4>Address</h4>
                                        <input type="text" id="address" name="address" class="txtBox" value="<?= $mem_data->mem_address1 ? $mem_data->mem_address1 : ''?>" placeholder="Address">
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-4 txtGrp">
                                        <h4>City</h4>
                                        <input type="text" name="city" id="city" class="txtBox" value="<?= $mem_data->mem_city ? $mem_data->mem_city : ''?>" placeholder="City">
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-4 txtGrp">
                                        <h4>Zip code</h4>
                                        <input type="text" id="zip" name="zip" class="txtBox" value="<?= $mem_data->mem_zip ? $mem_data->mem_zip : ''?>" placeholder="Zip Code">
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-4 txtGrp">
                                        <h4>Country</h4>
                                        <select name="country" id="country" class="txtBox selectpicker" data-live-search="true">
                                            <option value="" disabled="" selected="">Select</option>
                                            <?= get_countries_options('id', $mem_data->mem_country_id)?>
                                        </select>
                                    </div>
                                </div>
                                <input type="file" id="prof_PicUpdate" name="uploadFile" accept="image/*" class="" style="display: none;" data-file="">
                                <div class="bTn text-center">
                                    <!-- <button type="reset" class="webBtn">Cancel</button> -->
                                    <button type="submit" class="webBtn colorBtn">Save <i class="spinner hidden"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="alertMsg" style="display: none;"></div>
                </div>
            </form>
            <div class="blk">
                <div class="_header">
                    <h3>Verify Phone</h3>
                </div>
                <form action="<?= site_url('change-phone')?>" method="post" autocomplete="off" class="frmAjax" id="frmPhone">
                    <div class="formBlk">
                        <p><?= $site_settings->site_name?> is going to send you a text message for Phone verification if you want to verify your phone number, Please make sure you already save that phone number before verification.</p>
                        <div class="row formRow">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 col-xx-3"></div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                <div class="verifyBlk">
                                    <input type="text" name="phone" id="phone" class="txtBox" value="<?= $mem_data->mem_phone?$mem_data->mem_phone:''?>">
                                    <?php if (!empty($mem_data->mem_phone)): ?>
                                        <?php if (empty($mem_data->mem_phone_verified)): ?>
                                            <a href="<?= site_url('phone-verification')?>" class="ntVerify">Verify Phone</a>
                                        <?php else: ?>
                                            <a href="javascript:void(0)" class="fi fi-check"></a>
                                        <?php endif ?>
                                    <?php endif ?>
                                </div>
                                <div class="invald hide" id="phnMsg"></div>
                            </div>
                        </div>
                        <div class="bTn text-center">
                            <button type="submit" class="webBtn colorBtn">Save <i class="spinner hidden"></i></button>
                        </div>
                    </div>
                    <div class="alertMsg" style="display: none;"></div>
                </form>
                <div class="popup small-popup" data-popup="verify-phone">
                    <div class="tableDv">
                        <div class="tableCell">
                            <div class="contain">
                                <div class="_inner">
                                    <div class="crosBtn"></div>
                                    <h2>Please verify your phone number</h2>
                                    <div class="txtGrp">
                                        <ul class="phoneLst">
                                            <li>
                                                <input type="text" name="" id="" class="txtBox" placeholder="">
                                            </li>
                                            <li>
                                                <input type="text" name="" id="" class="txtBox" placeholder="">
                                            </li>
                                            <li>
                                                <input type="text" name="" id="" class="txtBox" placeholder="">
                                            </li>
                                            <li>
                                                <input type="text" name="" id="" class="txtBox" placeholder="">
                                            </li>
                                            <li>
                                                <input type="text" name="" id="" class="txtBox" placeholder="">
                                            </li>
                                            <li>
                                                <input type="text" name="" id="" class="txtBox" placeholder="">
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="bTn text-center"><button type="submit" class="webBtn colorBtn blockBtn">Verify</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="blk">
                <div class="_header">
                    <h3>Change Password</h3>
                    <div class="info">
                        <i class="fi-question-circle"></i>
                        <div class="infoIn">
                            <p class="semi">Your password must contain the following:</p>
                            <ol class="_list2">
                                <li>At least 8 characters in length (a strong password has at least 14 characters)</li>
                                <li>At least 1 letter and at least 1 number or symbol</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <form action="<?= site_url('change-password')?>" method="post" autocomplete="off" class="frmAjax" id="frmChangePass">
                    <div class="formBlk">
                        <div class="row formRow">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-4 txtGrp">
                                <input type="password" id="pswd" name="pswd" value="" class="txtBox" placeholder="Current password">
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-4 txtGrp">
                                <input type="password" id="npswd" name="npswd" value="" class="txtBox pwstrnt" placeholder="New password">
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-4 txtGrp">
                                <input type="password" id="cpswd" name="cpswd" value="" class="txtBox" placeholder="Confirm new password">
                            </div>
                        </div>
                        <div class="bTn text-center">
                            <button type="reset" class="webBtn">Cancel</button>
                            <button type="submit" class="webBtn colorBtn">Change <i class="spinner hidden"></i></button>
                        </div>
                    </div>
                    <div class="alertMsg" style="display:none"></div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- dash -->


</main>
    <script type="text/javascript" src="<?= base_url('assets/js/additional-methods.js')?>"></script>
    <?php $this->load->view('includes/footer'); ?>
</body>
</html>