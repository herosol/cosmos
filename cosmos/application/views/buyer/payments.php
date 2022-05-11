<!doctype html>
<html>
<head>
<title>Payments – <?= $site_settings->site_name?></title>
    <?php $this->load->view('includes/site-master'); ?>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
</head>
<body id="home-page">
    <?php get_header(); ?>
<main>


<section id="dash">
    <div id="payment">
        <div class="contain">
            <?= showMsg()?>
            <div class="head">
                <h1 class="secHeading">Payments</h1>
                <div class="bTn">
                    <a href="javascript:void(0)" class="webBtn colorBtn popBtn" data-popup="credit-card">Add Payment Method</a>
                </div>
            </div>
            <!-- <div class="blans text-center">
                <h4 class="regular">Current Balance: <span class="price">$00.0</span></h4>
                <h4 class="regular">Payouts: <span class="price">$1,258.5</span></h4>
                <h4 class="regular">Deliveries: <span>50</span></h4>
            </div> -->
            <div class="blk">
                <div class="_header">
                    <h3>Payment Method</h3>
                </div>
                <div class="blockLst">
                    <table>
                        <tbody>
                            <?php if (count($rows)<1): ?>
                                <tr>
                                    <td colspan="3">No Payment Method</td>
                                </tr>
                            <?php endif ?>
                            <?php foreach ($rows as $key => $row) :?>
                                <?php if (empty($row->paypal)): ?>
                                    <tr>
                                        <td>
                                            <div class="inner">
                                                <div class="icon"><img src="<?= base_url('assets/images/cards/'.$row->image)?>" alt=""></div>
                                                <div class="pin"><em>&#9679; &#9679; &#9679; &#9679; &#9679;</em> <?= $row->last_digits?></div>
                                                <?php if (!empty($row->default_method)): ?>
                                                    <span class="miniLbl green">Default</span>
                                                <?php endif ?>
                                            </div>
                                        </td>
                                        <td><?= $row->expiry?></td>
                                        <td width="30">
                                            <div class="dropDown">
                                                <div class="more dropBtn"><span></span></div>
                                                <ul class="dropCnt dropLst">
                                                    <li><a href="<?= site_url('payment-methods/make-default/'.$row->encoded_id)?>">Make Default</a></li>
                                                    <li><a href="<?= site_url('payment-methods/delete/'.$row->encoded_id)?>" onclick="return confirm('Are you sure ?')">Delete Account</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <tr>
                                        <td>
                                            <div class="inner">
                                                <div class="icon"><img src="<?= base_url('assets/images/'.$row->image)?>" alt=""></div>
                                                <div class="icon"><i class="fi-paypal"></i></div>
                                                <div class="pin"><?= $row->paypal?></div>
                                                <?php if (!empty($row->default_method)): ?>
                                                    <span class="miniLbl green">Default</span>
                                                <?php endif ?>
                                            </div>
                                        </td>
                                        <td><?= $row->expiry?></td>
                                        <td width="30">
                                            <div class="dropDown">
                                                <div class="more dropBtn"><span></span></div>
                                                <ul class="dropCnt dropLst">
                                                    <li><a href="<?= site_url('payment-methods/make-default/'.$row->encoded_id)?>">Make Default</a></li>
                                                    <li><a href="<?= site_url('payment-methods/delete/'.$row->encoded_id)?>" onclick="return confirm('Are you sure ?')">Delete Account</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif ?>
                            <?php endforeach?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- <div class="blk">
                <div class="_header">
                    <h3>Your Payouts</h3>
                </div>
                <div class="blockLst">
                    <table>
                        <thead>
                            <tr>
                                <th>Cleared Payouts</th>
                                <th width="140">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>September 25, 2018</td>
                                <td class="price_bold">$250</td>
                            </tr>
                            <tr>
                                <td>September 25, 2018</td>
                                <td class="price_bold">$220</td>
                            </tr>
                            <tr>
                                <td>September 25, 2018</td>
                                <td class="price_bold">$150</td>
                            </tr>
                            <tr>
                                <td>September 25, 2018</td>
                                <td class="price_bold">$140</td>
                            </tr>
                            <tr>
                                <td>September 25, 2018</td>
                                <td class="price_bold">$180</td>
                            </tr>
                            <tr>
                                <td>September 25, 2018</td>
                                <td class="price_bold">$390</td>
                            </tr>
                            <tr>
                                <td>September 25, 2018</td>
                                <td class="price_bold">$280</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <ul class="pagination">
                <li><a href="?">1</a></li>
                <li><a href="?" class="active">2</a></li>
                <li><a href="?">3</a></li>
                <li><a href="?">4</a></li>
                <li><a href="?">5</a></li>
            </ul> -->
        </div>
        <div class="popup" data-popup="credit-card">
            <div class="tableDv">
                <div class="tableCell">
                    <div class="contain">
                        <div class="_inner">
                            <div class="crosBtn"></div>
                            <h2>Add Payment Method</h2>
                            <div class="payType">
                                <div class="topHead">
                                    <h4>Payment info</h4>
                                    <!-- <ul class="checkLst flex">
                                        <li class="lblBtn">
                                            <input type="radio" name="payment" id="credit-card" checked="">
                                            <label for="credit-card">Credit Card</label>
                                        </li>
                                        <li class="lblBtn">
                                            <input type="radio" name="payment" id="paypal">
                                            <label for="paypal">PayPal</label>
                                        </li>
                                    </ul> -->
                                </div>
                                <form action="" method="post" autocomplete="off" id="frmPayment" data-payment="credit-card">
                                    <div class="cardStrip">
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
                                    <div class="row formRow">
                                        <noscript>
                                            <div>
                                                <h4>JavaScript is not enabled!</h4>
                                                <p>This payment form requires your browser to have JavaScript enabled. Please activate JavaScript and reload this page. Check <a href="http://enable-javascript.com" target="_blank">enable-javascript.com</a> for more informations.</p>
                                            </div>
                                        </noscript>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                            <input type="text" name="cardnumber" id="cardnumber" class="txtBox frmfield" value=""  placeholder="Card Number" required="" autofocus="">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                            <input type="text" name="card_holder_name" id="card_holder_name" class="txtBox" placeholder="Card Holder">
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
                                    </div>
                                    <div class="bTn text-center">
                                        <button type="submit" id="submit_button" class="webBtn colorBtn">Submit <i class="spinner hidden"></i></button>
                                    </div>
                                    <div class="alertMsg" id="alertMsg"></div>
                                </form>
                                <!-- 
                                <form action="<?= site_url('save-paypal')?>" method="post" autocomplete="off" id="frmPaypal" class="frmAjax" data-payment="paypal">
                                    <div class="cardStrip">
                                        <h4>Paypal</h4>
                                        <ul class="cardLst flex">
                                            <li><img src="<?= base_url('assets/images/paypal.svg')?>" alt=""></li>
                                        </ul>
                                    </div>
                                    <div class="row formRow">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                            <input type="text" name="paypal" id="paypal" class="txtBox" value="" placeholder="Paypal address">
                                        </div>
                                    </div>
                                    <div class="bTn text-center">
                                        <button type="submit" class="webBtn colorBtn">Submit <i class="spinner hidden"></i></button>
                                    </div>
                                    <div class="alertMsg" style="display:none"></div>
                                </form>
                                 -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- dash -->


<script type="text/javascript">
    $(function(){
        $(document).on('click', '.checkLst li input[type="radio"]', function(){
            let id = $(this).attr('id');
            $('.payType form[data-payment]').hide(); 
            $('.payType form[data-payment=' + id + ']').fadeIn();
        });
        
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
                // form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
                /*let sbtn=form$.find("button[type='submit']");
                let frmIcon=form$.find("button[type='submit'] i.spinner");
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
</main>
<?php $this->load->view('includes/footer');?>
</body>
</html>