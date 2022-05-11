<!doctype html>
<html>
<head>
<title>Become a Cosplayer – <?= $site_settings->site_name?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>
<body id="home-page">
    <?php get_header(); ?>
<main>


<section id="dash">
    <div id="sit">
        <div class="contain">
            <?= showMsg()?>
            <form action="" method="post" id="becomePlayer" class="frmAjax">
                <div class="content">
                    <h1 class="secHeading">Tell us a bit about yourself</h1>
                    <p class="pre">Thanks for your interest in Cosmos To give you best experience possible, we'd love to know what brought you here. Note: your responses will be kept private.</p>
                </div>
                <div class="svcBlk">
                    <h2>Making money on Cosmos</h2>
                    <!-- <p>You’ll set your own rates and keep 90% of your earnings. The remaining 10% is used to help cover ongoing support, educational opportunities, and promotion of your business.</p> -->
                    <div class="inter">
                        <div class="row formRow">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                <h4>First Name</h4>
                                <input type="text" name="fname" id="fname" value="<?= ($mem_data->mem_fname ? $mem_data->mem_fname : '')?>" class="txtBox" placeholder="First Name" autofocus>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                <h4>Last Name</h4>
                                <input type="text" name="lname" id="lname" value="<?= ($mem_data->mem_lname? $mem_data->mem_lname : '')?>" class="txtBox" placeholder="Last Name">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                <h4>Email</h4>
                                <div class="verifyBlk">
                                    <input type="text" id="email" name="email" class="txtBox shwFld" value="<?= $mem_data->mem_email? $mem_data->mem_email : ''?>" placeholder="Email Address" readonly>
                                    <a href="javascript:void(0)" class="fi fi-check"></a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                <h4>Nickname</h4>
                                <input type="text" name="profile_heading" id="profile_heading" class="txtBox shwFld" value="<?= $mem_data->mem_profile_heading ? $mem_data->mem_profile_heading : ''?>" placeholder="Nickname">
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
                                <input type="text" name="address" id="address" class="txtBox" placeholder="Address" value="<?= $mem_data->mem_address1 ? $mem_data->mem_address1 : ''?>">
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
                                    <?= get_availablity_options('name')?>
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
                                                <option value="<?= $char->id?>"><?= $char->title?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                <h4>Upload file <a href="javascript:void(0)" class="delBtn">Delete all</a></h4>
                                <button type="button" class="txtBox uploadmlImg" data-image-src="member">Select file to upload</button>
                                <div class="upLoadBlk txtBox">
                                    <div class="inside scrollbar">
                                        <ul class="imgLst flex">
                                            <li>
                                                <div class="image"><img src="<?= base_url('assets/images/news-item01.jpg')?>" alt=""><div class="closeBtn"></div></div>
                                            </li>
                                            <li>
                                                <div class="image"><img src="<?= base_url('assets/images/news-item02.jpg')?>" alt=""><div class="closeBtn"></div></div>
                                            </li>
                                            <li>
                                                <div class="image"><img src="<?= base_url('assets/images/news-item03.jpg')?>" alt=""><div class="closeBtn"></div></div>
                                            </li>
                                            <li>
                                                <div class="image"><img src="<?= base_url('assets/images/news-item04.jpg')?>" alt=""><div class="closeBtn"></div></div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            -->
                        </div>
                        <input type="file" id="uploadFiles" name="" multiple="true" class="" style="display: none;" data-file="" data-character="" accept="image/*">
                    </div>
                </div>
                <div class="bTn text-center">
                    <button type="submit" class="webBtn colorBtn">Submit <i class="fi-arrow-right"></i> <i class="spinner hidden"></i></button>
                </div>
                <div class="alertMsg" style="display:none"></div>
            </form>
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
        </div>
    </div>
</section>
<!-- dash -->


<!-- datepicker -->
<link type="text/css" rel="stylesheet" href="<?= base_url('assets/dbdatepicker/DateTimePicker.css?v-'.$site_settings->site_version)?>">
<script type="text/javascript">
    $(function(){
        let old_characters;
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
        })
    });
</script>
<script type="text/javascript" src="<?= base_url('assets/dbdatepicker/DateTimePicker.min.js') ?>"></script>
<script type="text/javascript">
    $(function(){
        $(document).on('click', '#cncl-membership', function() {
            if(confirm('Are you sure, You want to cancel?')){
                let $this = $(this);
                $this.attr('disabled', true);
                $.post(base_url+'cancel-membership', function(rs){
                    $this.attr('disabled', false);
                    $this.remove();
                })
            };
        })
        $(document).on('change','.svcBlk .aditionBtn .switchBtn > input[type="checkbox"]',function() {
            $(this).parents('.svcBlk').children('.inner').next('.aditionDv').slideToggle();
        });

        $("#dob").DateTimePicker({
            dateFormat:"MM-dd-yyyy"
        });

        $('.imgLst').sortable();

        function rate() {
            $('.svcBlk.rateBlk .txtGrp').each(function(){
                v = $(this).find('.txtBox').val();
                em = (v / 100 * 80).toFixed(2);
                $(this).find('small').children('em').text(em);
                // console.log(em);
            });
        }

        rate();
        
        $(document).on('keyup', '.svcBlk.rateBlk .txtGrp .txtBox', function() {
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

        $(document).on('click', '.inspectionLst > li:nth-child(2) > .lnk', function() {
            $(this).removeClass('active');
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
            let frmbtn = $(this);
            if (frmbtn.attr("disabled"))
                return false;
            let progress = frmbtn.data('step');
            let fldSet = frmbtn.parents('fieldset');
            let frm = frmbtn.parents('form').get(0);
            if($(frm).valid()){

                needToConfirm = true;
                // let frmbtn = fldSet.find("button[type='button'].nextBtn");
                let frmIcon = frmbtn.find("i.spinner");
                let frmMsg=fldSet.find("div.alertMsg:first");

                let formData = new FormData(frm);
                formData.append('progress', progress);

                frmbtn.attr("disabled", true);
                frmMsg.html('').hide();
                frmIcon.removeClass("hidden");
                $.ajax({
                    url: $(frm).attr('action'),
                    data : formData,
                    processData: false,
                    contentType: false,
                    dataType: 'JSON',
                    method: 'POST'
                })
                .done(function(rs) {
                    if (rs.status == 1) {

                        /*frmMsg.html(rs.msg).slideDown(500);
                        if(rs.scroll_to_msg)
                            $('html, body').animate({ scrollTop: frmMsg.offset().top-300}, 'slow');
                        if(rs.hide_msg)
                            frmMsg.slideUp(500);*/
                        frmIcon.addClass("hidden");
                        if(rs.redirect_url) {
                            window.location.href = rs.redirect_url;   
                        }else {
                            frmbtn.attr("disabled", false);

                            let currStep = fldSet;
                            let nextStep = currStep.next('fieldset');
                            currStep.hide();
                            nextStep.fadeIn();
                            nextStep.find('input:first').focus();
                            $('html, body').animate({ scrollTop: 0}, 'slow');
                        }
                    } else {
                        frmMsg.html(rs.msg).slideDown(500);
                        if(rs.scroll_to_msg)
                            $('html, body').animate({ scrollTop: frmMsg.offset().top-300}, 'slow');
                        setTimeout(function () {
                            if(rs.hide_msg)
                                frmMsg.slideUp(500);
                            frmbtn.attr("disabled", false);
                            frmIcon.addClass("hidden");
                            if(rs.redirect_url)
                                window.location.href = rs.redirect_url;   
                        }, 1500);
                    }
                })
                .fail(function(rs) {
                    console.log(rs);
                    // alert('Network error has occurred please try again!');
                })
                .always(function() {
                    needToConfirm = false;
                });

                /*let currStep = $(this).parents('fieldset');
                let nextStep = currStep.next('fieldset');
                currStep.hide();
                nextStep.fadeIn();
                nextStep.find('input:first').focus();*/
            }
        });

        $('.prevBtn').click(function(e) {
            let currStep = $(this).parents('fieldset');
            let prevStep = currStep.prev('fieldset');
            currStep.hide();
            prevStep.fadeIn();
            prevStep.find('input:first').focus();
        });

        $(document).on('change','.svcBlk .switchBtn > input[type="checkbox"]',function() {
            let cls = $(this).attr('class');
            let chkVl = !this.checked;
            $('.svcBlk.'+cls).toggleClass('hidden').find('input').attr('disabled',chkVl);
            // $('.svcBlk.rateBlk.'+cls).toggleClass('hidden').find('input[name^="prices"]').attr('disabled',chkVl);
        });

        /*
        $(document).on('click',"button[type='button'].nextBtn:last()",function(){
            $('#ttrInf').html('');
            $('input[type="text"].shwFld').each(function(i,obj){
                var fld_name=$(this).attr('placeholder');
                var fld_val=$(this).val()
                $('#ttrInf').append('<li><strong>'+fld_name+':</strong><span>'+fld_val+'</span></li>');
            })
            $('#ttrInf').append('<li><strong>'+$('textarea.shwFld').attr('placeholder')+':</strong><span>'+($('textarea.shwFld').val())+'</span></li>');
            // $('#ttrInf').append('<li><strong>'+$('textarea.shwFld').attr('placeholder')+':</strong><span>'+(editor.getData())+'</span></li>');
        })
        */

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
</main>
<?php $this->load->view('includes/footer');?>
</body>
</html>