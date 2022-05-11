<!doctype html>
<html>
<head>
    <title>Payment Method - <?= $site_settings->site_name?></title>
    <?php $this->load->view('includes/site-master'); ?>
     <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
</head>
<body id="home-page">
    <?php $this->load->view('includes/header'); ?>


    <section id="dash">
        <div class="contain-fluid">
            <div class="lBar ease">
                <?php $this->load->view('includes/sidebar'); ?>
            </div>
            <div id="payMthd" class="inSide">
                <!-- <div class="blk">
                    <div class="_header">
                        <h3>Payment Method</h3>
                        <a href="<?= site_url('payment-methods')?>" class="webBtn">Back</a>
                    </div>
                    <ul class="payLst text-center">
                        <li>
                            <a href="javascript:void(0)" data-pay-method="credit"><i class="fi-credit-card"></i><span>Credit Card</span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" data-pay-method="paypal"><i class="fi-paypal"></i><span>PayPal</span></a>
                        </li>
                    </ul>
                </div> -->
                <!-- <div class="blk" data-pay-method="credit"> -->
                <div class="blk">
                    <div class="_header">
                        <h3>Credit card</h3>
                        <ul class="cardLst">
                            <li><img src="<?= base_url('assets/images/card1.svg')?>" alt=""></li>
                            <li><img src="<?= base_url('assets/images/card2.svg')?>" alt=""></li>
                            <li><img src="<?= base_url('assets/images/card3.svg')?>" alt=""></li>
                            <li><img src="<?= base_url('assets/images/card4.svg')?>" alt=""></li>
                        </ul>
                    </div>
                    <form action="" method="post" autocomplete="off" id="frmPayment">
                        <input type="hidden" name="type" value="credit-card">

                        <div class="formBlk">
                            <div class="row formRow">
                                <noscript>
                                    <div>
                                        <h4>JavaScript is not enabled!</h4>
                                        <p>This payment form requires your browser to have JavaScript enabled. Please activate JavaScript and reload this page. Check <a href="http://enable-javascript.com" target="_blank">enable-javascript.com</a> for more informations.</p>
                                    </div>
                                </noscript>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                    <h4>Card number</h4>
                                    <input type="text" name="cardnumber" id="cardnumber" class="txtBox frmfield" value="" placeholder="" required="" autofocus="">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                    <h4>Card holder</h4>
                                    <input type="text" name="card_holder_name" id="card_holder_name" class="txtBox" placeholder="" value="">
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-4 txtGrp">
                                    <h4>Expiry Month</h4>
                                    <select class="txtBox selectpicker" name="exp_month" id="exp_month" required="">
                                        <?php for($i=1;$i<=12;$i++):?>
                                            <option value="<?=sprintf('%02d', $i);?>" <?=(sprintf('%02d', $i)==$mem_data->mem_card_exp_month?'selected':'')?>><?=sprintf('%02d', $i);?></option>
                                        <?php endfor?>
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-4 txtGrp">
                                    <h4>Expiry Year</h4>
                                    <select  name="exp_year" id="exp_year" class="txtBox selectpicker" required="">
                                        <?php for($i=date('Y');$i<=date('Y')+10;$i++):?>
                                            <option value="<?=$i?>"<?=($i==$mem_data->mem_card_exp_year?' selected':'')?>><?=$i?></option>
                                        <?php endfor?>
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-4 txtGrp">
                                    <h4>CVC ?</h4>
                                    <input type="text" name="cvc" id="cvc" class="txtBox" placeholder="">
                                </div>
                            </div>
                            <div class="bTn text-center">
                                <a href="<?= site_url('payment-methods')?>" class="webBtn">Back</a>
                                <button type="submit" id="submit_button" class="webBtn colorBtn">Submit <i class="fa-spinner hidden"></i></button>
                            </div>
                            <div class="alertMsg" id="alertMsg"></div>
                        </div>
                    </form>
                </div>
                <!-- <div class="blk" data-pay-method="paypal">
                    <div class="_header">
                        <h3>PayPal</h3>
                    </div>
                    <form action="" method="post" autocomplete="off" id="frmChangeEmail" class="frmAjax">
                        <input type="hidden" name="type" value="paypal">
                        <div class="formBlk">
                            <div class="row formRow">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                    <h4>Paypal address</h4>
                                    <input type="text" name="email" id="email" class="txtBox" placeholder="">
                                </div>
                            </div>
                            <div class="bTn text-center">
                                <button type="submit" class="webBtn colorBtn">Submit <i class="fa-spinner hidden"></i></button>
                            </div>
                            <div class="alertMsg" id="alertMsg"></div>
                        </div>
                    </form>
                </div> -->
            </div>
        </div>
    </section>
<!-- dash -->


<?php $this->load->view('includes/footer');?>
<script type="text/javascript">
    $(function(){
        $(document).on('submit', '#frmPayment', function (e) {
            e.preventDefault();

                needToConfirm = true;
                // createToken returns immediately - the supplied callback submits the form if there are no errors
                $(this).find('#submit_button').attr("disabled", true).find("i.fa-spinner").removeClass("hidden");
                Stripe.card.createToken({
                    number: $('#cardnumber').val(),
                    cvc: $('#cvc').val(),
                    exp_month: $('#exp_month').val(),
                    exp_year: $('#exp_year').val(),
                    name: $('#card_holder_name').val()
                }, stripeResponseHandler);
                return false; // submit from callback
        });
        Stripe.setPublishableKey('<?= API_PUBLIC_KEY; ?>');
        function stripeResponseHandler(status, response) {
            let form$ = $("#frmPayment");
            let sbtn=form$.find("button[type='submit']");
            let frmIcon=form$.find("button[type='submit'] i.fa-spinner");
            if (response.error) {
                needToConfirm = false;
                sbtn.attr("disabled", false);
                frmIcon.addClass("hidden");

                $("#alertMsg").html('<div class="alert alert-danger alert-sm"><strong>Error:</strong>1 ' + response.error.message + '</div>');
                $("#alertMsg").focus();
            } else {
                let nonce = response['id'];
                // console.log(nonce);
                // form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
                /*let sbtn=form$.find("button[type='submit']");
                let frmIcon=form$.find("button[type='submit'] i.fa-spinner");
                sbtn.attr("disabled", true);
                frmIcon.removeClass("hidden");*/
                let frmMsg=form$.find("div.alertMsg:first");
                $.ajax({
                    url: base_url+"payment-methods/add-new",
                    data : {'type':'credit-card','nonce':nonce},
                    dataType: 'JSON',
                    method: 'POST',
                    success: function (rs) {
                        console.log(rs);
                        $("html, body").animate({ scrollTop: 100 }, "slow");
                        frmMsg.html(rs.msg).slideDown(500);
                        if (rs.status == 1) {
                            setTimeout(function () {
                                frmIcon.addClass("hidden");
                                form$[0].reset();
                                window.location.href = rs.redirect_url;
                            }, 3000);
                        } else {
                            setTimeout(function () {
                                frmIcon.addClass("hidden");
                                sbtn.attr("disabled", false);
                            }, 3000);
                        }
                    },
                    error: function (rs) {
                        console.log(rs);
                    },
                    complete: function (rs) {
                        needToConfirm = false;
                    }
                });
            }
        }
    })
    
  </script>
</body>
</html>