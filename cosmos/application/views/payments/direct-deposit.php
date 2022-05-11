<!doctype html>
<html>
<head>
    <title>Direct Deposit - <?= $site_settings->site_name?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>
<body id="home-page">
    <?php $this->load->view('includes/header'); ?>


    <section id="dash">
        <div class="contain-fluid">
            <div class="lBar ease">
                <?php $this->load->view('includes/sidebar'); ?>
            </div>
            <div id="payMthd" class="inSide">
                <div class="blans text-center">
                    <h4 class="regular">Current Balance <span class="price">$<?= num($balance_due)?></span></h4>
                    <h4 class="regular">Payouts <span class="price">$<?= num($total_payout)?></span></h4>
                    <h4 class="regular">Lessons Completed <span><?= total_tutor_lessons($this->session->mem_id)?></span></h4>
                </div>
                <div class="blk">
                    <div class="_header">
                        <h3>Payments</h3>
                        <a href="<?= site_url('add-bank-account
                        ')?>" class="webBtn colorBtn">Add new Payment Method</a>
                    </div>
                    <?= showMsg()?>
                    <div class="tableBlk noAttrs">
                        <table class="dataTable" data-msg="No payment method added">
                            <thead>
                                <tr>
                                    <th class="desktop tablet-l">Bank Name</th>
                                    <th class="desktop tablet-l tablet-p">Acc Title</th>
                                    <th class="desktop tablet-l tablet-p mobile-l mobile-p">Acc Number</th>
                                    <th class="desktop tablet-l tablet-p mobile-l mobile-p no-sort" width="80">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($rows as $key => $row) :?>
                                    <tr>
                                        <td>
                                            <div class="inner">
                                                <!-- <div class="icon"><img src="<?= base_url('assets/images/visa.png')?>" alt=""></div> -->
                                                <div class="pin"><?= $row->acc_bank_name?></div>
                                                <?php if (!empty($row->default_method)): ?>
                                                    <span class="miniLbl green">Default</span>
                                                <?php endif ?>
                                            </div>
                                        </td>
                                        <td><?= $row->acc_title?></td>
                                        <td><?= $row->acc_number?></td>
                                        <td>
                                            <div class="dropDown">
                                                <a href="javascript:void(0)" class="webBtn smBtn dropBtn">Edit</a>
                                                <ul class="dropCnt dropLst">
                                                    <li><a href="<?= site_url('make-default/'.$row->encoded_id)?>">Make Default</a></li>
                                                    <li><a href="<?= site_url('delete-method/'.$row->encoded_id)?>" onclick="return confirm('Are you sure ?')">Delete Account</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="blk">
                    <div class="_header">
                        <h3>Your Payouts</h3>
                    </div>
                    <p>Automatic deposits every Monday, free of charge, 2-3 days for the deposits to show on your bank statement.</p>
                    <div class="tableBlk">
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
                                        <td>$<?= num($processing_payout->amount)?></td>
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
                                        <td>$<?= num($cleared_payout->amount)?></td>
                                    </tr>
                                <?php endforeach?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- dash -->


    <?php $this->load->view('includes/footer');?>
</body>
</html>