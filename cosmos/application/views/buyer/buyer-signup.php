<!doctype html>
<html>
<head>
<title>Buyer Sign up – <?= $site_settings->site_name?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>
<body id="home-page">
    <?php get_header(); ?>
<main>


<section id="dash">
    <div id="sit">
        <div class="contain">
            <form action="" method="post" id="becomeSitter" class="frmAjax">
                <fieldset>
                    <div class="content">
                        <h1 class="secHeading">Tell us a bit about yourself</h1>
                        <p class="pre">Thanks for your interest in PFSC To give you best experience possible, we'd love to know what brought you here. Note: your responses will be kept private.</p>
                    </div>
                    <div class="svcBlk">
                        <div class="upLoadDp txtGrp">
                            <div class="proDp ico">
                                <img src="<?= get_image_src($mem_data->mem_image,'300',true)?>" alt="" id="userImage">
                            </div>
                            <div class="text-center"><button type="button" class="webBtn smBtn" id="uploadDp" data-image-src="dp"><i class="fi-user-alt"></i> Change Photo</button></div>
                            <div class="noHats text-center">(Please upload your photo, no hats and sunglasses)</div>
                        </div>
                        <div class="inter">
                            <h4>Account Detail</h4>
                            <div class="row formRow">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                    <input type="text" name="fname" id="fname" value="<?= ($mem_data->mem_fname?$mem_data->mem_fname:'')?>" class="txtBox shwFld" placeholder="First Name" autofocus>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                    <input type="text" name="lname" id="lname" value="<?= ($mem_data->mem_lname?$mem_data->mem_lname:'')?>" class="txtBox shwFld" placeholder="Last Name">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                    <div class="verifyBlk">
                                        <input type="text" id="email" name="email" class="txtBox shwFld" value="<?= $mem_data->mem_email?$mem_data->mem_email:''?>" placeholder="Email Address" readonly>
                                        <a href="javascript:void(0)" class="fi fi-check"></a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                    <input type="text" name="company" id="company" value="<?= ($mem_data->mem_company?$mem_data->mem_company:'')?>" class="txtBox shwFld" placeholder="Company (optional)">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <input type="text" id="address1" name="address1" class="txtBox" value="<?= $mem_data->mem_address1?$mem_data->mem_address1:''?>" placeholder="Address 1">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <input type="text" id="address2" name="address2" class="txtBox" value="<?= $mem_data->mem_address2?$mem_data->mem_address2:''?>" placeholder="Address 2">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                    <input type="text" name="city" id="city" class="txtBox" value="<?= $mem_data->mem_city?$mem_data->mem_city:''?>" placeholder="City">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                    <select name="state" id="state" class="txtBox selectpicker" data-live-search="true">
                                        <option value="">State</option>
                                        <?= get_states_options('code', $mem_data->mem_state)?>
                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                    <input type="text" id="zip" name="zip" class="txtBox shwFld" value="<?= $mem_data->mem_zip?$mem_data->mem_zip:''?>" placeholder="Zip Code">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                    <select name="country" id="country" class="txtBox">
                                        <option value="us">United State</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="file" id="prof_PicUpdate" name="uploadFile" accept="image/*" class="" style="display: none;" data-file="">
                    <!-- 
                    <div class="svcBlk">
                        <h2>Your email address</h2>
                        <p>We won't share or display this on your profile.</p>
                        <div class="inter">
                            <div class="verifyBlk">
                                <input type="text" name="" id="" class="txtBox" value="dummyEmail789@gmail.com" placeholder="Email Address">
                                <a href="javascript:void(0)" class="popBtn" data-popup="edit-email">Edit</a>
                            </div>
                        </div>
                    </div>
                    <div class="popup small-popup" data-popup="edit-email">
                        <div class="tableDv">
                            <div class="tableCell">
                                <div class="contain">
                                    <div class="_inner">
                                        <div class="crosBtn"></div>
                                        <h2>Edit your Email Address</h2>
                                        <div class="txtGrp">
                                            <input type="text" name="" id="" class="txtBox" placeholder="Email Address">
                                        </div>
                                        <div class="bTn text-center"><button type="submit" class="webBtn colorBtn blockBtn">Save</button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     -->
                     <div class="bTn text-center">
                        <button type="button" class="webBtn colorBtn nextBtn">Next <i class="fi-arrow-right"></i></button>
                        <!-- <button type="button" class="webBtn colorBtn nextBtn">Save & Continue <i class="fi-arrow-right"></i></button> -->
                    </div>
                </fieldset>
                <fieldset>
                    <div class="content">
                        <h1 class="secHeading">Add your Phone Number</h1>
                        <p class="pre">PFSC requires a verified phone number for important updates.</p>
                    </div>
                    <div class="svcBlk">
                        <h2>Primary Phone Number</h2>
                        <p>Note: your phone number won't be displayed on your profile.</p>
                        <div class="inter txtGrp">
                            <div class="verifyBlk phoneVerify">
                                <input type="text" name="phone" id="phone" class="txtBox" value="<?= ($mem_data->mem_phone?$mem_data->mem_phone:'')?>" autofocus>
                                <?php if (empty($mem_data->mem_phone_verified)): ?>
                                    <a href="javascript:void(0)" class="ntVerify webBtn">Verify Phone</a>
                                <?php else: ?>
                                    <a href="javascript:void(0)" class="fi fi-check"></a>
                                <?php endif ?>
                                <!-- <a href="javascript:void(0)" class="popBtn" data-popup="verify-phone">Verify Phone</a> -->
                            </div>
                            <div class="invald hide" id="phnMsg"></div>
                        </div>
                    </div>
                    <div class="svcBlk">
                        <h2>Add Emergency Contact</h2>
                        <p>Who can we contact, other than you, in case of an emergency?</p>
                        <div class="inter">
                            <div class="formRow row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                    <h4>Contact Name</h4>
                                    <input type="text" name="contact_name" id="contact_name" class="txtBox" value="<?= ($mem_data->mem_contact_name?$mem_data->mem_contact_name:'')?>" placeholder="Full Name">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                    <h4>Contact Phone Number</h4>
                                    <input type="text" name="contact_phone" id="contact_phone" class="txtBox" value="<?= ($mem_data->mem_contact_phone?$mem_data->mem_contact_phone:'')?>" placeholder="Phone Number">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 
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
                     -->
                    <div class="bTn text-center">
                        <button type="submit" class="webBtn colorBtn">Save & Submit  <i class="spinner hidden"></i></button>
                    </div>
                    <div class="alertMsg" style="display: none;"></div>
                </fieldset>
            </form>
        </div>
    </div>
</section>
<div class="popup small-popup" data-popup="verify-phone">
    <div class="tableDv">
        <div class="tableCell">
            <div class="contain">
                <div class="_inner">
                    <div class="crosBtn"></div>
                    <h2>Please verify your phone number</h2>
                    <p class="text-center">Enter 6 digit verification code to confirm you got the text message</p>
                    <form action="<?= site_url("phone-verification")?>" method="post" autocomplete="off" class="frmAjax" id="frmPhonevld">
                        <input type="hidden" name="phone" value="">
                        <div class="txtGrp">
                            <ul class="phoneLst">
                                <?php for($i=0;$i<6;$i++):?> 
                                    <li>
                                        <input type="text" name="code[<?=$i?>]" maxlength="1" class="txtBox arrFld" placeholder="">
                                    </li>
                                <?php endfor?>
                            </ul>
                            <div class="text-center showCode" style="display: none"><a href="javascript:void(0)" class="color">Didn't get a code?</a></div>
                        </div>
                        <div class="bTn text-center">
                            <button type="submit" class="webBtn colorBtn">Verify <i class="spinner hidden"></i></button>
                        </div>
                        <div class="alertMsg" style="display:none"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- dash -->


</main>
    <?php $this->load->view('includes/footer');?>

<script type="text/javascript">
    $(function(){
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

        $(document).on('input','input[name^=code]:last',function(e){
            $(this).parents('form#frmPhonevld').submit()
        })
        $(document).on('click','div.showCode>a',function(e){
            e.preventDefault();
            $('.crosBtn').click();
            $('#phone').focus();
            $(this).slideUp();
        })

        $(document).on('reset','form#frmPhonevld',function(e){
            $('body').removeClass('flow');
            $(".popup[data-popup='verify-phone']").fadeOut().find('form').get(0).reset();
            $('.verifyBlk a').removeClass('ntVerify').addClass('fi fi-check').html('');
        })

        $(document).on('click','a.ntVerify',function(e){
            e.preventDefault()
            let phn = $(this).parents('.verifyBlk').find('#phone').val();
            if ($(this).parents('.verifyBlk').find('#phone').hasClass('error') || phn=='')
                return false;
            $('form#frmPhonevld div.showCode').slideUp();
            if(confirm("To make sure that "+phn+" is yours, <?= $site_settings->site_name?> is going to send you a text message with a 6-digit verification code.")) {
                $(".popup[data-popup='verify-phone']").find('form input.arrFld').val('');
                $.ajax({
                    url: base_url+'verify-phone-code',
                    data : {'cmd':'send-code', 'phone':phn},
                    dataType: 'JSON',
                    method: 'POST',
                    success: function (rs) {
                        if(rs.status===1){
                            $('body').addClass('flow');
                            $(".popup[data-popup='verify-phone']").fadeIn().find('ul input:first').focus();
                            $('form#frmPhonevld input[name="phone"]').val(phn)
                            setTimeout(function(){
                                $('#frmPhonevld div.showCode').slideDown();
                            },60000)
                        }
                        else
                            alert(rs.msg);
                    },
                    error: function(rs){
                        console.log(rs);
                    },
                    complete: function(){}
                })
            }
        })
    });
</script>
</body>
</html>