<!doctype html>
<html>
<head>
<title>Review & Payment – <?= $site_settings->site_name?></title>
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
                <h1 class="secHeading">Review & Payment</h1>
            </div>
            <div class="blk inBlk">
                <?php $total=0?>
                <?php if (empty($pkg_row->one_time)): ?>
                    <div class="_header topBlk">
                        <?php 
                        $monthly_ren = date('d M, Y', (time()+86400*30));
                        $yearly_ren = date('d M, Y', (time()+86400*365));
                        ?>
                        <h3>Choose your subscription type ?</h3>
                        <span class="lblBtn">
                            <input type="radio" name="type" id="monthly" checked="" value="monthly" data-price="<?= $pkg_row->monthly_price?>">
                            <label for="monthly">Monthly</label>
                        </span>
                        <span class="lblBtn">
                            <input type="radio" name="type" id="yearly" value="yearly" data-price="<?= $pkg_row->yearly_price?>">
                            <label for="yearly">Yearly</label>
                        </span>
                    </div>
                <?php endif ?>
                <div class="planBlk basic selected">
                    <div class="headSet">
                        <h4>
                            <?= $pkg_row->title?> <small><?= $pkg_row->overview?></small>
                            <?php if (empty($pkg_row->one_time)): ?>
                                <em>Next Renewal Date: <strong class="color2" id="renewalDate"><?= $monthly_ren?></strong></em>
                            <?php endif?>
                        </h4>
                        <?php if ($pkg_row->price>0): ?>
                            <?php $total += floatval($pkg_row->price)?>
                            <div class="price" id="pkgPrice"><?= format_amount($pkg_row->price)?></div>
                        <?php else: ?>
                            <div class="price" id="pkgPrice">$<?= $pkg_row->monthly_price?>/Month</div>
                        <?php endif ?>
                    </div>
                    <ul class="list">
                        <?php $detail = unserialize($pkg_row->detail);?>
                        <?php for ($i = 1; $i <= count($detail); $i++): ?>
                        <li><?= $detail[$i]->list_item?>
                        <?php if (isset($detail[$i]->list_item_tip) && !empty($detail[$i]->list_item_tip)): ?>
                            <span class="info">
                                <i class="fi-question-circle"></i>
                                <div class="infoIn">
                                    <p class="semi"><?= $detail[$i]->list_item_tip?></p>
                                </div>
                            </span>
                        <?php endif ?>
                        </li>
                        <?php endfor ?>
                    </ul>
                </div>
                <div class="tblBlk">
                    <table>
                        <tbody class="semi">
                            <?php if ($pkg_row->device_price>0): ?>
                                <?php $total += floatval($pkg_row->device_price)?>
                                <tr>
                                    <td>Device cost:</td>
                                    <td width="140"><span class="price"><?= format_amount($pkg_row->device_price)?></span></td>
                                </tr>
                            <?php endif ?>
                            <?php if (empty($pkg_row->one_time)): ?>
                                <?php $total += floatval($pkg_row->monthly_price)?>
                                <tr>
                                    <td>Recurring Total:</td>
                                    <td width="140"><span class="price" id="recTotal"><?= format_amount($pkg_row->monthly_price)?>/Month</span></td>
                                </tr>
                            <?php endif ?>
                            <tr>
                                <td>Total:</td>
                                <td width="140"><span class="price" id="total"><?= format_amount($total)?></span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- <div class="inBlk">
                <div class="planBlk basic selected">
                    <div class="type semi"><?= $pkg_row->title?></div>
                    <div class="price">$<?= $pkg_row->price?> <small><?= $pkg_row->overview?></small></div>
                    <?= $pkg_row->detail?>
                </div> -->
            </div>
            <div class="blk creditBlk">
                <div class="_header topBlk">
                    <h3>Payment</h3>
                    <ul class="checkLst flex">
                        <li class="lblBtn">
                            <input type="radio" name="payment" id="credit-card" checked="">
                            <label for="credit-card">Credit card</label>
                        </li>
                        <li class="lblBtn">
                            <input type="radio" name="payment" id="paypal">
                            <label for="paypal">PayPal</label>
                        </li>
                    </ul>
                </div>
                <div data-payment="credit-card">
                    <div class="topHead">
                        <h4>Credit card</h4>
                        <ul class="cardLst flex">
                            <li><img src="<?= base_url('assets/images/payment-visa.svg')?>" alt=""></li>
                            <li><img src="<?= base_url('assets/images/payment-master.svg')?>" alt=""></li>
                            <li><img src="<?= base_url('assets/images/payment-american-express.svg')?>" alt=""></li>
                            <li><img src="<?= base_url('assets/images/payment-discover.svg')?>" alt=""></li>
                            <li><img src="<?= base_url('assets/images/payment-jcb.svg')?>" alt=""></li>
                            <li><img src="<?= base_url('assets/images/payment-diners-club.svg')?>" alt=""></li>
                        </ul>
                    </div>
                    <form action="" method="post" autocomplete="off" id="frmPayment">
                        <div class="row formRow">
                            <noscript>
                                <div>
                                    <h4>JavaScript is not enabled!</h4>
                                    <p>This payment form requires your browser to have JavaScript enabled. Please activate JavaScript and reload this page. Check <a href="http://enable-javascript.com" target="_blank">enable-javascript.com</a> for more informations.</p>
                                </div>
                            </noscript>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">    
                                <input type="text" id="cardnumber" class="txtBox frmfield" value="" placeholder="Card Number" required="" autofocus="">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                <input type="text" id="card_holder_name" class="txtBox" placeholder="Card Holder" value="">
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-4 txtGrp">
                                <select class="txtBox selectpicker" id="exp_month" required="">
                                    <option value="">Month</option>
                                    <?php for($i=1;$i<=12;$i++):?>
                                        <option value="<?=sprintf('%02d', $i);?>" <?=(sprintf('%02d', $i)==$mem_data->mem_card_exp_month?'selected':'')?>><?=sprintf('%02d', $i);?></option>
                                    <?php endfor?>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-4 txtGrp">
                                <select id="exp_year" class="txtBox selectpicker" required="">
                                    <option value="">Year</option>
                                    <?php for($i=date('Y');$i<=date('Y')+10;$i++): ?>
                                        <option value="<?=$i?>"<?=($i==$mem_data->mem_card_exp_year?' selected':'')?>><?=$i?></option>
                                    <?php endfor?>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-4 txtGrp">
                                <input type="text" id="cvc" class="txtBox" placeholder="CVC?">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                <div class="lblBtn text-center">
                                    <input type="checkbox" name="confirm" id="confirm" value="true">
                                    <label for="confirm">By clicking "<strong>Submit</strong>", I agree to PFSC’s
                                        <a href="<?= site_url('terms-conditions')?>" target="_blank">Terms & Conditions</a>
                                        and
                                        <a href="<?= site_url('privacy-policy')?>" target="_blank">Privacy Policy.</a>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="bTn text-center">
                            <button type="submit" id="submit_button" class="webBtn colorBtn">Submit Payment <i class="spinner hidden"></i></button>
                        </div>
                        <div class="alertMsg" id="alertMsg"></div>
                    </form>
                </div>
                <div data-payment="paypal">
                    <div class="topHead">
                        <h4>PayPal</h4>
                        <ul class="cardLst flex">
                            <li><img src="<?= base_url('assets/images/paypal.svg')?>" alt=""></li>
                        </ul>
                    </div>
                    <form action="<?= site_url("pay-now/".$pkg_row->id) ?>" method="post">
                        <input type="hidden" name="pkg_type" value="monthly">
                        <div class="row formRow">
                            <div class="bTn text-center">
                                <button type="submit" id="submit_button" class="webBtn colorBtn">Pay Now <i class="spinner hidden"></i></button>
                            </div>
                        </div>
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

        $(document).on('change', 'input[name="type"]', function (e) {
            $('div[data-payment="paypal"] > form > input[name="pkg_type"]').val(this.value);
            let price = <?= $pkg_row->price?>;
            let device = <?= $pkg_row->device_price?>;

            let recuring_price = $(this).data('price');
            let monthly = '<?= $monthly_ren?>';
            let yearly = '<?= $yearly_ren?>';
            let renewalDate = this.value == 'yearly'?yearly:monthly;
            let price_postfix = this.value == 'yearly'?'/Year':'/Month';
            let total = 0;

            $('#renewalDate').html(renewalDate);
            if (price>0) {
                total += floatval(price);
                $('#pkgPrice').html(formatter.format(price));
            } else {
                $('#pkgPrice').html(formatter.format(recuring_price) + price_postfix);
            }
            total += recuring_price+floatval(device);
            $('#recTotal').html(formatter.format(recuring_price) + price_postfix);
            $('#total').html(formatter.format(total));
        })

        $(document).on('submit', '#frmPayment', function (e) {
            e.preventDefault();

            needToConfirm = true;
            // createToken returns immediately - the supplied callback submits the form if there are no errors
            $(this).find('#submit_button').attr("disabled", true).find("i.spinner").removeClass("hidden");
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
            let frmIcon=form$.find("button[type='submit'] i.spinner");
            if (response.error) {
                needToConfirm = false;
                sbtn.attr("disabled", false);
                frmIcon.addClass("hidden");

                $("#alertMsg").html('<div class="alert alert-danger alert-sm"><strong>Error:</strong> ' + response.error.message + '</div>');
                $("#alertMsg").focus();
            } else {
                let nonce = response['id'];
                let type = $('input[name="type"]').val();

                // form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
                /*let sbtn=form$.find("button[type='submit']");
                let frmIcon=form$.find("button[type='submit'] i.spinner");
                sbtn.attr("disabled", true);
                frmIcon.removeClass("hidden");*/
                let frmData = new FormData(form$[0]);
                let frmMsg = form$.find("div.alertMsg:first");
                frmData.append('nonce', nonce);
                frmData.append('pkg_type', type);
                $.ajax({
                    url: form$.attr('action'),
                    data : frmData,
                    dataType: 'JSON',
                    method: 'POST',
                    processData: false,
                    contentType: false,
                    success: function (rs) {
                        $('html, body').animate({ scrollTop: frmMsg.offset().top-300}, 'slow');
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
        $(document).on('click', '.checkLst li input[type="radio"]', function(){
            attrID = $(this).attr('id');
            $('#credit div[data-payment]').hide(); 
            $('#credit div[data-payment=' + attrID + ']').fadeIn();
        });
    });
</script>
</body>
</html>