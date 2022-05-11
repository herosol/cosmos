<!doctype html>
<html>
<head>
<title>Bank Account – <?= $site_settings->site_name?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>
<body id="home-page">
    <?php get_header(); ?>
<main>


<section id="dash">
    <div id="payment">
        <div class="contain">
                <?= showMsg()?>
            <div class="head">
                <h1 class="secHeading">Bank Account</h1>
                <div class="bTn">
                    <a href="javascript:void(0)" class="webBtn colorBtn crtPM">Add Payment Method</a>
                </div>
            </div>
            <div class="blk">
                <div class="_header">
                    <h3>Payment Method</h3>
                </div>
                <div class="blockLst">
                    <table>
                        <thead>
                            <tr>
                                <th>Bank Name</th>
                                <th>Acc Title</th>
                                <th>Acc Number</th>
                                <th width="90">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($rows)<1): ?>
                                <tr>
                                    <td colspan="4">No account added!
                                    </td>
                                </tr>    
                            <?php endif ?>
                            <?php foreach ($rows as $key => $row) :?>
                                <tr>
                                    <?php if (empty($row->paypal)): ?>
                                    <td>
                                         <?= $row->acc_bank_name?>
                                    </td>
                                    <td><?= $row->acc_title?></td>
                                    <td><?= $row->acc_number?></td>
                                    <?php else:?>
                                        <td colspan="3"><?= $row->paypal?></td>
                                    <?php endif?>
                                    <td width="30">
                                        <div class="dropDown">
                                            <div class="more dropBtn"><span></span></div>
                                            <ul class="dropCnt dropLst">
                                                <li><a href="javascript:void(0)" class="edtBtn">Edit</a></li>
                                                <li><a href="<?= site_url('payment-methods/delete/'.$row->encoded_id)?>" onclick="return confirm('Are you sure ?')">Delete Account</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="bank_cheque"><img src="<?= base_url('assets/images/bank_cheque.jpg')?>" alt=""></div>
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
                                    <!-- <h4>Payment info</h4> -->
                                    <!-- <ul class="checkLst flex">
                                        <li class="lblBtn">
                                            <input type="radio" name="payment" id="bank-account" checked="">
                                            <label for="bank-account">Bank Account</label>
                                        </li>
                                        <li class="lblBtn">
                                            <input type="radio" name="payment" id="paypal">
                                            <label for="paypal">PayPal</label>
                                        </li>
                                    </ul> -->
                                </div>
                                <form action="" method="post" autocomplete="off" id="frmBnkAct" class="frmAjax" data-payment="bank-account">
                                    <input type="hidden" name="store" id="store" value="">
                                    <div class="cardStrip">
                                        <h4>Bank Account</h4>
                                    </div>
                                    <div class="row formRow">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                            <select name="type" id="type" class="txtBox selectpicker">
                                                <option value="Checking">Checking</option>
                                                <option value="Saving">Savings</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                            <input type="text" name="account_title" id="account_title" class="txtBox" placeholder="Account Holder Name">
                                        </div>
                                        <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                            <input type="text" name="swift_code" id="swift_code" class="txtBox" placeholder="Swift Code">
                                        </div> -->
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                            <input type="text" name="routing_number" id="routing_number" class="txtBox" placeholder="Routing Number">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                            <input type="text" name="bank_name" id="bank_name" class="txtBox" placeholder="Bank Name">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                            <input type="text" name="account_number" id="account_number" class="txtBox" placeholder="Account Number">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                            <input type="text" name="caccount_number" id="caccount_number" class="txtBox" placeholder="Confirm Account No">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                            <input type="text" name="city" id="city" class="txtBox" placeholder="City">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                            <input type="text" name="state" id="state" class="txtBox" placeholder="State">
                                        </div>
                                        <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                            <select id="country" name="country" class="txtBox selectpicker" data-live-search="true">
                                                <option value="Country">Country</option>
                                                <?= get_countries_options('name');?>
                                            </select>
                                        </div> -->
                                    </div>
                                    <div class="bTn text-center">
                                        <button type="submit" class="webBtn colorBtn">Submit <i class="spinner hidden"></i></button>
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
            id = $(this).attr('id');
            $('.payType form[data-payment]').hide(); 
            $('.payType form[data-payment=' + id + ']').fadeIn();
        });


        $(document).on('click', '.crtPM', function() {
            $('body').addClass('flow');
            let frm = $('div[data-popup="credit-card"] form.frmAjax');
            refresh_selectpicker();
            frm.find(`[data-radio]`).removeClass('active');
            frm.find('input[type="hidden"]').val('');
            frm.find('ul.imgLst').html('');
            $('.popup[data-popup= "credit-card"]').fadeIn().find('h2').text('Add Payment Method').end().find('input:first').focus().end().find('form').attr('action', '').find('div.alertMsg').html('').end().end().find('form').get(0).reset();
        });

        let accounts = <?= json_encode($rows)?>;
        $(document).on('click', 'a.edtBtn', function(e) {
            let indx = $(this).parents('tr:first').index();
            
            let account = accounts[indx];
            let btn = $(this);
            // let store = $(this).parents('.jobBlk.vwDtl:first').data('store');
            let frm = $('div[data-popup="credit-card"] form.frmAjax');
            $('div[data-popup="credit-card"] h2').text('Edit Bank Account');
            frm.find('input[type="hidden"]').val('');
            frm.find('div.alertMsg').html('');
            
            
            frm.attr("action", 'edit-account');
            frm.find('select#type').val(account.acc_type);
            frm.find('input#store').val(account.encoded_id);

            frm.find('input#account_title').val(account.acc_title);
            frm.find('input#routing_number').val(account.acc_routing_number);
            frm.find('input#bank_name').val(account.acc_bank_name);
            frm.find('input#account_number').val(account.acc_number);
            frm.find('input#caccount_number').val(account.acc_number);
            frm.find('input#city').val(account.acc_city);
            frm.find('input#state').val(account.acc_state);
            // frm.find('select#country').val(account.acc_country);
                        
            $('body').addClass('flow');
            $('.popup[data-popup="credit-card"]').fadeIn().find('input:first').focus();
            refresh_selectpicker();
                   
        });
    });
</script>
</main>
<?php $this->load->view('includes/footer');?>
</body>
</html>