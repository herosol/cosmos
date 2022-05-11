<!doctype html>
<html>
<head>
<title>Credit card – <?= $site_settings->site_name?></title>
    <?php $this->load->view('includes/site-master'); ?>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
</head>
<body id="home-page">
    <?php get_header(); ?>
<main>


<section id="dash">
    <div id="credit">
        <div class="contain">
            <div class="head">
                <h1 class="secHeading">Credit card</h1>
            </div>
            <div class="inBlk">
                <div class="planBlk basic selected">
                    <div class="type semi"><?= $pkg_row->title?></div>
                    <div class="price">$<?= $pkg_row->price?> <small><?= $pkg_row->overview?></small></div>
                    <?= $pkg_row->detail?>
                </div>
                <div class="blk creditBlk">
                    <form action="" method="post" autocomplete="off" id="frmPayment">
                        <div class="topHead">
                            <h2 class="color">Pay with Credit card</h2>
                            <ul class="cardLst flex">
                                <li><img src="<?= base_url('assets/images/payment-visa.svg')?>" alt=""></li>
                                <li><img src="<?= base_url('assets/images/payment-master.svg')?>" alt=""></li>
                                <li><img src="<?= base_url('assets/images/payment-american-express.svg')?>" alt=""></li>
                                <li><img src="<?= base_url('assets/images/payment-discover.svg')?>" alt=""></li>
                                <li><img src="<?= base_url('assets/images/payment-jcb.svg')?>" alt=""></li>
                                <li><img src="<?= base_url('assets/images/payment-diners-club.svg')?>" alt=""></li>
                            </ul>
                        </div>
                        <div class="row formRow">
                            <noscript>
                                <div>
                                    <h4>JavaScript is not enabled!</h4>
                                    <p>This payment form requires your browser to have JavaScript enabled. Please activate JavaScript and reload this page. Check <a href="http://enable-javascript.com" target="_blank">enable-javascript.com</a> for more informations.</p>
                                </div>
                            </noscript>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">    
                                <input type="text" id="cardnumber" class="txtBox frmfield" value="" placeholder="Card Number" required="" autofocus="">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                <input type="text" id="card_holder_name" class="txtBox" placeholder="Card Holder" value="">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                <select class="txtBox selectpicker" id="exp_month" required="">
                                    <option value="">Month</option>
                                    <?php for($i=1;$i<=12;$i++):?>
                                        <option value="<?=sprintf('%02d', $i);?>" <?=(sprintf('%02d', $i)==$mem_data->mem_card_exp_month?'selected':'')?>><?=sprintf('%02d', $i);?></option>
                                    <?php endfor?>
                                </select>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                <select id="exp_year" class="txtBox selectpicker" required="">
                                    <option value="">Year</option>
                                    <?php for($i=date('Y');$i<=date('Y')+10;$i++): ?>
                                        <option value="<?=$i?>"<?=($i==$mem_data->mem_card_exp_year?' selected':'')?>><?=$i?></option>
                                    <?php endfor?>
                                </select>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                <input type="text" id="cvc" class="txtBox" placeholder="CVC?">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                <div class="lblBtn">
                                    <input type="checkbox" name="confirm" id="confirm" value="true">
                                    <label for="confirm">By clicking "<strong>Submit</strong>", I agree to PFSC’s
                                        <a href="<?= site_url('terms-conditions')?>" target="_blank">Terms & Conditions</a>
                                        and
                                        <a href="<?= site_url('privacy-policy')?>" target="_blank">Privacy Policy.</a>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="bTn">
                            <button type="submit" id="submit_button" class="webBtn colorBtn">Submit Payment <i class="fa fa-spinner fa-pulse fa-1x fa-fw hidden"></i></button>
                        </div>
                        <div class="alertMsg" id="alertMsg"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- dash -->

</main>
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
            let sbtn = form$.find("button[type='submit']");
            let frmIcon=form$.find("button[type='submit'] i.fa-spinner");
            if (response.error) {
                needToConfirm = false;
                sbtn.attr("disabled", false);
                frmIcon.addClass("hidden");

                $("#alertMsg").html('<div class="alert alert-danger alert-sm"><strong>Error:</strong> ' + response.error.message + '</div>');
                $("#alertMsg").focus();
            } else {
                let nonce = response['id'];
                // form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
                /*let sbtn=form$.find("button[type='submit']");
                let frmIcon=form$.find("button[type='submit'] i.fa-spinner");
                sbtn.attr("disabled", true);
                frmIcon.removeClass("hidden");*/
                let frmData = new FormData(form$[0]);
                let frmMsg=form$.find("div.alertMsg:first");
                frmData.append('nonce', nonce);
                $.ajax({
                    url: form$.attr('action'),
                    data : frmData,
                    dataType: 'JSON',
                    method: 'POST',
                    processData: false,
                    contentType: false,
                    success: function (rs) {
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
                        // console.log(rs);
                        alert('Network error has occurred please try again!');
                    },
                    complete: function (rs) {
                        needToConfirm = false;
                    }
                });
            }
        }

        $('#frmPayment').validate({
            rules: {
                card_holder_name: {
                    required: true,
                },
                cardnumber: {
                    required: true,
                    maxlength: 19
                },
                exp_month: {
                    required: true,
                },
                exp_year: {
                    required: true,
                },
                cvc: {
                    required: true,
                    maxlength: 4
                },/*
                confirm: {
                    required: true,
                },*/
                confirm: "required"
            },errorPlacement: function(){
                return false;
            }
        });
    })
</script>
</body>
</html>