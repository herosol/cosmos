<!doctype html>
<html>
<head>
<title>My Earnings – <?= $site_settings->site_name?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>
<body id="home-page">
    <?php get_header(); ?>
<main>


<section id="dash">
    <div id="trans">
        <div class="contain">
            <!-- <?php if (count($rows)<1): ?>
                <?= showMsg('info', 'Please add Bank Account to withdraw Amount!')?>
            <?php endif ?> -->
            <div class="head">
                <h1 class="secHeading">My Earnings</h1>
            </div>
            <div class="blk">
                <ul class="blans">
                    <li>Deliveries: <span><?= total_player_deliveries($this->session->mem_id)?></span></li>
                    <li>Pending Balance: <span class="price"><?= format_amount($pending_blnc)?></span></li>
                    <li>Payouts: <span class="price"><?= format_amount($total_payout)?></span></li>
                    <li>Available Balance: <span class="price"><?= format_amount($available_blnc)?></span></li>
                    <?php if($available_blnc>0 && count($rows)>0):?>
                        <li class="auto"><a href="javascript:void(0)" class="popBtn webBtn smBtn" data-popup="credit-card">Withdraw Funds</a></li>
                    <?php endif?>
                </ul>
            </div>
            <div class="blk">
                <div class="_header">
                    <h3>Your Payouts</h3>
                    <ul class="nav nav-tabs semi">
                        <li class="active"><a data-toggle="tab" href="#Pending">Pending</a></li>
                        <li><a data-toggle="tab" href="#Available">Available</a></li>
                        <li><a data-toggle="tab" href="#Processing">Processing</a></li>
                        <li><a data-toggle="tab" href="#Cleared">Cleared</a></li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div id="Pending" class="tab-pane fade active in">
                        <div class="blockLst">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Pending Balance</th>
                                        <th width="140">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (count($pending_balances)<1): ?>
                                        <tr>
                                            <td colspan="2" class="text-center">No pending balance</td>
                                        </tr>
                                    <?php endif ?>
                                    <?php foreach ($pending_balances as $key => $pending_blnc) :?>
                                        <tr>
                                            <td><?= format_date($pending_blnc->date,'F d, Y')?></td>
                                            <td class="price_bold"><?= format_amount($pending_blnc->amount)?></td>
                                        </tr>
                                    <?php endforeach?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="Available" class="tab-pane fade">
                        <div class="blockLst">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Available Balance</th>
                                        <th width="140">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (count($available_balances)<1): ?>
                                        <tr>
                                            <td colspan="2" class="text-center">No available balance</td>
                                        </tr>
                                    <?php endif ?>
                                    <?php foreach ($available_balances as $key => $avail_blnc) :?>
                                        <tr>
                                            <td><?= format_date($avail_blnc->date,'F d, Y')?></td>
                                            <td class="price_bold"><?= format_amount($avail_blnc->amount)?></td>
                                        </tr>
                                    <?php endforeach?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="Processing" class="tab-pane fade">
                        <div class="blockLst">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Processing Payouts</th>
                                        <th width="140">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (count($processing_payouts)<1): ?>
                                        <tr>
                                            <td colspan="2" class="text-center">No processing payouts</td>
                                        </tr>
                                    <?php endif ?>
                                    <?php foreach ($processing_payouts as $key => $processing_payout) :?>
                                        <tr>
                                            <td><?= format_date($processing_payout->date,'F d, Y')?></td>
                                            <td class="price_bold"><?= format_amount($processing_payout->amount)?></td>
                                        </tr>
                                    <?php endforeach?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="Cleared" class="tab-pane fade">
                        <div class="blockLst">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Cleared Payouts</th>
                                        <th width="140">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (count($cleared_payouts)<1): ?>
                                        <tr>
                                            <td colspan="2" class="text-center">No cleared payouts</td>
                                        </tr>
                                    <?php endif ?>
                                    <?php foreach ($cleared_payouts as $key => $cleared_payout) :?>
                                        <tr>
                                            <td><?= format_date($cleared_payout->paid_date,'F d, Y')?></td>
                                            <td class="price_bold">$<?= num($cleared_payout->amount)?></td>
                                        </tr>
                                    <?php endforeach?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- <div class="blockLst">
                    <table>
                        <thead>
                            <tr>
                                <th>Pending Balance</th>
                                <th width="140">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($pending_balances)<1): ?>
                                <tr>
                                    <td colspan="2" class="text-center">No pending balance</td>
                                </tr>
                            <?php endif ?>
                            <?php foreach ($pending_balances as $key => $pending_blnc) :?>
                                <tr>
                                    <td><?= format_date($pending_blnc->date,'F d, Y')?></td>
                                    <td class="price_bold"><?= format_amount($pending_blnc->amount)?></td>
                                </tr>
                            <?php endforeach?>
                        </tbody>
                        <thead>
                            <tr>
                                <th>Available Balance</th>
                                <th width="140">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($available_balances)<1): ?>
                                <tr>
                                    <td colspan="2" class="text-center">No available balance</td>
                                </tr>
                            <?php endif ?>
                            <?php foreach ($available_balances as $key => $avail_blnc) :?>
                                <tr>
                                    <td><?= format_date($avail_blnc->date,'F d, Y')?></td>
                                    <td class="price_bold"><?= format_amount($avail_blnc->amount)?></td>
                                </tr>
                            <?php endforeach?>
                        </tbody>
                        <thead>
                            <tr>
                                <th>Processing Payouts</th>
                                <th width="140">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($processing_payouts)<1): ?>
                                <tr>
                                    <td colspan="2" class="text-center">No processing payouts</td>
                                </tr>
                            <?php endif ?>
                            <?php foreach ($processing_payouts as $key => $processing_payout) :?>
                                <tr>
                                    <td><?= format_date($processing_payout->date,'F d, Y')?></td>
                                    <td class="price_bold"><?= format_amount($processing_payout->amount)?></td>
                                </tr>
                            <?php endforeach?>
                        </tbody>
                        <thead>
                            <tr>
                                <th>Cleared Payouts</th>
                                <th width="140">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($cleared_payouts)<1): ?>
                                <tr>
                                    <td colspan="2" class="text-center">No cleared payouts</td>
                                </tr>
                            <?php endif ?>
                            <?php foreach ($cleared_payouts as $key => $cleared_payout) :?>
                                <tr>
                                    <td><?= format_date($cleared_payout->paid_date,'F d, Y')?></td>
                                    <td class="price_bold">$<?= num($cleared_payout->amount)?></td>
                                </tr>
                            <?php endforeach?>
                        </tbody>
                    </table>
                </div> -->
            </div>
            <!-- 
            <div class="blk">
                <div class="blockLst">
                    <table>
                        <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th width="140">Amount</th>
                                <th>Date</th>
                                <th width="80">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>John Wick</td>
                                <td class="price_bold">$250</td>
                                <td>September 25, 2018</td>
                                <td><span class="miniLbl green">Complete</span></td>
                            </tr>
                            <tr>
                                <td>Abraham Adam</td>
                                <td class="price_bold">$220</td>
                                <td>September 25, 2018</td>
                                <td><span class="miniLbl yellow">Pending</span></td>
                            </tr>
                            <tr>
                                <td>Jenifer Kem</td>
                                <td class="price_bold">$150</td>
                                <td>September 25, 2018</td>
                                <td><span class="miniLbl green">Complete</span></td>
                            </tr>
                            <tr>
                                <td>Samira Jones</td>
                                <td class="price_bold">$140</td>
                                <td>September 25, 2018</td>
                                <td><span class="miniLbl red">Canceled</span></td>
                            </tr>
                            <tr>
                                <td>Preety Zinta</td>
                                <td class="price_bold">$180</td>
                                <td>September 25, 2018</td>
                                <td><span class="miniLbl yellow">Pending</span></td>
                            </tr>
                            <tr>
                                <td>Tai Chi</td>
                                <td class="price_bold">$390</td>
                                <td>September 25, 2018</td>
                                <td><span class="miniLbl green">Complete</span></td>
                            </tr>
                            <tr>
                                <td>Christoper Smith</td>
                                <td class="price_bold">$280</td>
                                <td>September 25, 2018</td>
                                <td><span class="miniLbl red">Canceled</span></td>
                            </tr>
                            <tr>
                                <td>Julian Adam</td>
                                <td class="price_bold">$170</td>
                                <td>September 25, 2018</td>
                                <td><span class="miniLbl yellow">Pending</span></td>
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
            </ul>
             -->
        </div>
        <?php if($available_blnc>0 && count($rows)>0):?>
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
                                    <!-- 
                                    <ul class="checkLst flex">
                                        <li class="lblBtn">
                                            <input type="radio" name="payment" id="bank-account" checked="">
                                            <label for="bank-account">Bank Account</label>
                                        </li>
                                        <li class="lblBtn">
                                            <input type="radio" name="payment" id="paypal">
                                            <label for="paypal">PayPal</label>
                                        </li>
                                    </ul>
                                     -->
                                </div>
                                <form action="<?= site_url('withdraw')?>" method="post" autocomplete="off" class="frmAjax" data-payment="bank-account">
                                    <div class="cardStrip">
                                        <h4>Bank Account</h4>
                                    </div>
                                    <div class="row formRow">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                            <select id="payment_method" name="payment_method" class="txtBox" required="">
                                                <option value="">Select</option>
                                                <?php foreach ($rows as $key => $row) :?>
                                                    <option value="<?= $row->id?>"><?= $row->acc_bank_name.' - '.$row->acc_number?></option>
                                                <?php endforeach?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="bTn text-center">
                                        <button type="submit" class="webBtn colorBtn">Submit <i class="spinner hidden"></i></button>
                                    </div>
                                    <div class="alertMsg" id="alertMsg"></div>
                                </form>
                                <!-- 
                                <form action="" method="post" data-payment="paypal">
                                    <div class="cardStrip">
                                        <h4>Paypal</h4>
                                        <ul class="cardLst flex">
                                            <li><img src="../images/paypal.svg" alt=""></li>
                                        </ul>
                                    </div>
                                    <div class="row formRow">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                                            <input type="text" name="" id="" class="txtBox" placeholder="PayPal Address">
                                        </div>
                                    </div>
                                    <div class="bTn text-center">
                                        <button type="submit" class="webBtn colorBtn">Submit</button>
                                    </div>
                                </form>
                                 -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif?>
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
    });
</script>
</main>
<?php $this->load->view('includes/footer');?>
</body>
</html>