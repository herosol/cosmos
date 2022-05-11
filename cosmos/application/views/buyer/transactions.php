<!doctype html>
<html>
<head>
<title>My Transactions – <?= $site_settings->site_name?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>
<body id="home-page">
    <?php get_header(); ?>
<main>


<section id="dash">
    <div id="trans">
        <div class="contain">
            <div class="head">
                <h1 class="secHeading">My Transactions</h1>
            </div>
            <div class="blk">
                <div class="blockLst">
                    <table>
                        <thead>
                            <tr>
                                <th>Transaction Number.</th>
                                <th>Note</th>
                                <th width="140">Amount</th>
                                <th>Date</th>
                                <!-- <th width="80">Status</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($rows)<1): ?>
                                <tr>
                                    <td colspan="4">No transaction</td>
                                </tr>
                            <?php endif ?>
                            <?php foreach ($rows as $key => $row) :?>
                                <tr>
                                    <td><?= $row->id?></td>
                                    <td><?= $row->note?></td>
                                    <td class="price_bold"><?= format_amount($row->amount)?></td>
                                    <td><?= format_date($row->date,'F d, Y')?></td>
                                    <!-- <td><span class="miniLbl green">Complete</span></td> -->
                                </tr>
                            <?php endforeach?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- <ul class="pagination">
                <li><a href="?">1</a></li>
                <li><a href="?" class="active">2</a></li>
                <li><a href="?">3</a></li>
                <li><a href="?">4</a></li>
                <li><a href="?">5</a></li>
            </ul> -->
        </div>
    </div>
</section>
<!-- dash -->


</main>
<?php $this->load->view('includes/footer');?>
</body>
</html>