<!doctype html>
<html>
<head>
<title>My Transactions - <?=$site_settings->site_name?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>
<body id="home-page">
    <?php $this->load->view('includes/header'); ?>


<section id="dash">
    <div class="contain-fluid">
        <div class="lBar ease">
            <?php $this->load->view('includes/sidebar'); ?>
        </div>
        <div id="myTrans" class="inSide">
            <div class="alertMsg" id="alertMsg"></div>
            <div class="blans">
                <h4 class="regular">Total Payouts: <span class="price">$<?= num($total_payout)?></span></h4>
                <h4 class="regular">Completed Lessons: <span><?= total_tutor_lessons($this->session->mem_id)?></span></h4>
                <h4 class="regular">Current Balance: <span class="price">$<?= num($balance_due)?></span></h4>
                <?php if($balance_due>0):?>
                    <button type="button" id="withdraw" class="webBtn greenBtn">Withdraw Money <i class="spinner hidden"></i></button>
                <?php endif?>
            </div>
            <div class="blk">
                <div class="_header">
                    <h3>My Transactions</h3>
                </div>
                <div class="tableBlk">
                    <table class="dataTable">
                        <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th class="desktop tablet-p" width="140">Amount</th>
                                <th class="sortBy">Date</th>
                                <!-- <th class="desktop" width="80">Status</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($rows as $key => $row) :?>
                                <tr data-link="<?= $row->encoded_id ?>">
                                    <td><?= $row->mem_name?></td>
                                    <td>$<?= num($row->amount)?></td>
                                    <td><?= format_date($row->date,'F d, Y')?></td>
                                    <!-- <td><?= get_paid_status($row->status)?></td> -->
                                </tr>
                            <?php endforeach?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="popup detail-pupup" data-popup="view-detail">
                <div class="tableDv">
                    <div class="tableCell">
                        <div class="contain">
                            <div class="_inner">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- dash -->


<!-- Main Js -->
<script type="text/javascript" src="<?= base_url('assets/js/main.js')?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/custom-validation.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/custom.js') ?>"></script>
<?php //$this->load->view('includes/footer');?>
<script type="text/javascript">
    $(function(){
        <?php if($balance_due>0):?>
            $(document).on('click','#withdraw',function(e){
                $(this).prop('disabled',true);
                $(this).find('i.spinner').removeClass('hidden');
                $.ajax({
                    url: base_url+'withdraw',
                    dataType: 'JSON',
                    method: 'POST',
                    success: function (rs) {
                        console.log(rs)
                        $('#alertMsg').html(rs.msg).slideDown(500);
                        if(rs.status==1){
                            setTimeout(function(){
                                window.location.reload();
                            },3000)
                        }
                    }
                })
            })
        <?php endif?>
        $(document).on('click', '#myTrans .tableBlk tr', function() {
            needToConfirm = true;
            var store = $(this).data('link');
            if (store=='')
                return false;

            $.ajax({
                url: base_url+'transaction-detail',
                data : {'store':store},
                dataType: 'JSON',
                method: 'POST',
                success: function (rs) {
                    if(rs.status===1){
                        $('body').addClass('flow');
                        var detail_popup=$(".popup[data-popup='view-detail']");
                        detail_popup.find('._inner').html(rs.data);
                        detail_popup.fadeIn();
                    }
                    else
                        alert('Something went wrong!')
                },
                error: function(rs){
                    console.log(rs);
                },
                complete: function (rs) {
                    needToConfirm = false;
                }
            })
        });
    })
</script>
</body>
</html>