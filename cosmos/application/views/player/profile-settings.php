<!doctype html>
<html>
<head>
<title>Profile Settings – <?= $site_settings->site_name?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>
<body id="home-page">
    <?php get_header(); ?>
<main>


<section id="dash">
    <div id="profileSet">
        <div class="contain">
            <div class="head">
                <h1 class="secHeading">Profile Settings</h1>
            </div>
            <!-- <form action="" method="post">
                <div class="blk">
                    <div class="_header">
                        <h3>Contact Info</h3>
                    </div>
                    <div class="formBlk">
                        <div class="row formRow">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                <div class="verifyBlk">
                                    <input type="text" name="" id="" class="txtBox" placeholder="Email Address">
                                    <a href="javascript:void(0)" class="popBtn" data-popup="edit-email">Edit</a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                <div class="verifyBlk">
                                    <input type="text" name="" id="" class="txtBox" placeholder="Phone Number">
                                    <a href="javascript:void(0)" class="popBtn" data-popup="edit-phone">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="popup small-popup" data-popup="edit-email">
                        <div class="tableDv">
                            <div class="tableCell">
                                <div class="contain">
                                    <div class="_inner">
                                        <div class="crosBtn"></div>
                                        <h2>Edit your email address</h2>
                                        <div class="txtGrp">
                                            <input type="text" name="" id="" class="txtBox" placeholder="Email Address">
                                        </div>
                                        <div class="bTn text-center"><button type="submit" class="webBtn colorBtn blockBtn">Save</button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="popup small-popup" data-popup="edit-phone">
                        <div class="tableDv">
                            <div class="tableCell">
                                <div class="contain">
                                    <div class="_inner">
                                        <div class="crosBtn"></div>
                                        <h2>Edit your phone number</h2>
                                        <div class="txtGrp">
                                            <input type="text" name="" id="" class="txtBox" placeholder="Phone Number">
                                        </div>
                                        <div class="bTn text-center"><button type="button" class="webBtn colorBtn blockBtn popBtn" data-popup="verify-phone">Verify</button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
            </form> -->

            <div class="blk">
                <div class="_header">
                    <h3>Verify Phone</h3>
                </div>
                <form action="<?= site_url('change-phone')?>" method="post" autocomplete="off" class="frmAjax" id="frmPhone">
                    <div class="formBlk">
                        <p class="small"><?= $site_settings->site_name?> is going to send you a text message for Phone verification if you want to verify your phone number, Please make sure you already save that phone number before verification.</p>
                        <p class="small"><strong>Note: </strong> You can't be shown in result without verifying your phone.</p>
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
                            <!-- <button type="submit" class="webBtn colorBtn">Save <i class="spinner hidden"></i></button> -->
                            <button type="button" class="webBtn colorBtn">Save <i class="spinner hidden"></i></button>
                        </div>
                    </div>
                    <div class="alertMsg" style="display: none;"></div>
                </form>
            </div>

            <div class="blk">
                <div class="_header">
                    <h3>Profile Info</h3>
                </div>
                <form action="" method="post" autocomplete="off" class="frmAjax" id="frmSetting">
                    <div class="formBlk">
                        <div class="flexRow flex">
                            <div class="col col1">
                                <div class="upLoadDp">
                                    <div class="proDp ico">
                                        <img src="<?= get_image_src($mem_data->mem_image,'300',true)?>" alt="" id="userImage">
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
                                        <h4>Nickname</h4>
                                        <input type="text" name="profile_heading" id="profile_heading" class="txtBox" value="<?= $mem_data->mem_profile_heading ? $mem_data->mem_profile_heading : ''?>" placeholder="Profile Nickname">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                        <h4>Date of Birth</h4>
                                        <div id="dob"></div>
                                        <input type="text" name="dob" id="dob" class="txtBox" data-field="date" readonly value="<?= $mem_data->mem_dob ? format_date($mem_data->mem_dob, 'm-d-Y') : ''?>" placeholder="Date of birth">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                        <h4>Rate</h4>
                                        <input type="number" min="0" name="rate" id="rate" class="txtBox" placeholder="Hourly rate" value="<?= $mem_data->mem_rate ? $mem_data->mem_rate : ''?>">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                        <h4>Address</h4>
                                        <input type="text" id="address" name="address" class="txtBox" value="<?= $mem_data->mem_address1 ? $mem_data->mem_address1 : ''?>" placeholder="Address">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                        <h4>City</h4>
                                        <input type="text" name="city" id="city" class="txtBox" value="<?= $mem_data->mem_city ? $mem_data->mem_city : ''?>" placeholder="City">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                        <h4>Zip code</h4>
                                        <input type="text" id="zip" name="zip" class="txtBox" value="<?= $mem_data->mem_zip ? $mem_data->mem_zip : ''?>" placeholder="Zip Code">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                        <h4>Country</h4>
                                        <select name="country" id="country" class="txtBox selectpicker" data-live-search="true">
                                            <option value="" disabled="" selected="">Select</option>
                                            <?= get_countries_options('id', $mem_data->mem_country_id)?>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                        <h4>Areas of Availability</h4>
                                        <select name="availability[]" id="availability" class="txtBox selectpicker" data-live-search="true" multiple="true" title="Areas of Availability">
                                            <?php $availability = empty($mem_data->mem_availability) ? '' : @explode(',', $mem_data->mem_availability)?>
                                            <?= get_availablity_options('name', $availability)?>
                                        </select>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                        <h4>Short Bio</h4>
                                        <textarea name="profile_bio" id="profile_bio" class="txtBox" placeholder="Profile Bio"><?= $mem_data->mem_about ? $mem_data->mem_about : ''?></textarea>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                        <h4>Facebook</h4>
                                        <input type="text" name="fb_link" id="fb_link" class="txtBox" value="<?= $mem_data->mem_fb_link ? $mem_data->mem_fb_link : ''?>" placeholder="facebook">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                        <h4>Instagram</h4>
                                        <input type="text" name="instagram_link" id="instagram_link" class="txtBox" value="<?= $mem_data->mem_instagram_link ? $mem_data->mem_instagram_link : ''?>" placeholder="Instagram">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                        <div class="row chracterBlk">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                                <h4>Character</h4>
                                                <select name="characters[]" id="character" class="txtBox selectpicker" multiple="true" title="List of which characters you play?">
                                                    <?php foreach ($characters as $key => $char): ?>
                                                        <option value="<?= $char->id?>" <?= in_array($char->id, $mem_characters) ? ' selected' : ''?>><?= $char->title?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                            <?php foreach ($characters as $key => $char): ?>
                                                <?php if (in_array($char->id, $mem_characters)): ?>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp" id="char<?= $char->id?>">
                                                        <h4><?= $char->title?> <!-- <a href="javascript:void(0)" class="delBtn">Delete all</a> --></h4>
                                                        <button type="button" class="txtBox uploadmlImg" data-image-src="character" data-character="<?= $char->id?>">Select file to upload</button>
                                                        <div class="uploadBar hidden"><span></span></div>
                                                        <div class="upLoadBlk txtBox">
                                                            <div class="inside scrollbar">
                                                                <ul class="imgLst flex">
                                                                    <?php foreach ($character_images[$char->id] as $pic) :?>
                                                                        <li>
                                                                            <input type="hidden" name="images[<?= $char->id?>][]" value="<?= $pic->image?>">
                                                                            <div class="image"><img src="<?= get_image_src($pic->image, 300); ?>" alt=""><div class="closeBtn"></div></div>
                                                                        </li>
                                                                    <?php endforeach ?>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                </div>
                                <input type="file" id="prof_PicUpdate" name="uploadFile" accept="image/*" class="" style="display: none;" data-file="">
                                <input type="file" id="uploadFiles" name="" multiple="true" class="" style="display: none;" data-file="" data-character="" accept="image/*">
                                <div class="bTn text-center">
                                    <button type="submit" class="webBtn colorBtn">Save <i class="spinner hidden"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="alertMsg" style="display: none;"></div>
                </form>
            </div>

            <!-- 
            <div class="blk">
                <div class="_header">
                    <h3>Required Gallery Photo</h3>
                </div>
                <form action="<?= site_url('save-gallery')?>" method="post" autocomplete="off" class="frmAjax">
                    <div class="formBlk">
                        <div class="formRow row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                <h4>Upload file <a href="javascript:void(0)" class="delBtn">Delete all</a></h4>
                                <button type="button" class="txtBox uploadmlImg" data-image-src="member">Select file to upload</button>
                                <div class="uploadBar hidden"><span></span></div>
                                <div class="upLoadBlk txtBox">
                                    <div class="inside scrollbar">
                                        <ul class="imgLst flex">
                                            <?php foreach ($mem_data->images as $pic) :?>
                                                <li>
                                                    <input type="hidden" name="images[]" value="<?= $pic->image?>">
                                                    <div class="image"><img src="<?= get_image_src($pic->image,300); ?>" alt=""><div class="closeBtn"></div></div>
                                                </li>
                                            <?php endforeach ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="file" id="uploadFiles" name="" multiple="true" class="" style="display: none;" data-file="" accept="image/*">
                        <div class="bTn text-center">
                            <button type="submit" class="webBtn colorBtn">Save <i class="spinner hidden"></i></button>
                        </div>
                    </div>
                    <div class="alertMsg" style="display:none"></div>
                </form>
            </div>
             -->

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
<?php $this->load->view('includes/footer');?>
<!-- datepicker -->
<link type="text/css" rel="stylesheet" href="<?= base_url('assets/dbdatepicker/DateTimePicker.css?v-'.$site_settings->site_version)?>">
<script type="text/javascript" src="<?= base_url('assets/dbdatepicker/DateTimePicker.min.js') ?>"></script>
<script type="text/javascript">
    $(function(){
        let old_characters = <?= json_encode($mem_characters)?>;
        $(document).on('change', '#character', function(e) {
            let seleced_characters = $(this).val();
            $(this).find('option:selected').each(function(i, e) {
                let title = this.text;
                let character = this.value;

                if ($.inArray(character, old_characters) == -1) {
                    $('.chracterBlk').append(`<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp" id="char${character}">
                        <h4>${title} <!--<a href="javascript:void(0)" class="delBtn">Delete all</a>--></h4>
                        <button type="button" class="txtBox uploadmlImg" data-image-src="character" data-character="${character}">Select file to upload</button>
                        <div class="uploadBar hidden"><span></span></div>
                        <div class="upLoadBlk txtBox">
                            <div class="inside scrollbar">
                                <ul class="imgLst flex">
                                </ul>
                            </div>
                        </div>
                    </div>`);
                }
            });

            $.each(old_characters, function( ind, value ) {
                if ($.inArray(value, seleced_characters) == -1)
                    $(`#char${value}`).remove();
            });

            old_characters = seleced_characters;
        });

        $("#dob").DateTimePicker({
            dateFormat:"MM-dd-yyyy"
        });
        $(document).on('click', '#profileSet .dayLst li .switchBtn', function(){
            if($(this).children('input[type="checkbox"]').is(':checked')){
                $(this).parents('.inner').removeClass('notAvail');
                $(this).parents('.inner').find('input[type="text"]').val('').attr('disabled',false);
            } else{
                $(this).parents('.inner').addClass('notAvail');
                $(this).parents('.inner').find('input[type="text"]').attr('disabled',true);
            }
        });

        $('.phoneLst > li > input').keyup(function(){
            $(this).parent().next().children().focus();
            // console.log();
        });
        $('.imgLst').sortable();
    });
</script>
</body>
</html>